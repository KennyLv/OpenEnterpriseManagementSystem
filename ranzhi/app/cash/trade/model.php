<?php
/**
 * The model file of trade module of RanZhi.
 *
 * @copyright   Copyright 2013-2014 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     LGPL
 * @author      Xiying Guan <guanxiying@xirangit.com>
 * @package     contact
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
class tradeModel extends model
{
    /**
     * Get trade by id.
     * 
     * @param  int    $id 
     * @access public
     * @return object
     */
    public function getByID($id)
    {
        return $this->dao->select('*')->from(TABLE_TRADE)->where('id')->eq($id)->limit(1)->fetch();
    }

    /** 
     * Get trade list.
     * 
     * @param  string  $orderBy 
     * @param  object  $pager 
     * @access public
     * @return array
     */
    public function getList($orderBy, $pager = null)
    {
        return $this->dao->select('*')->from(TABLE_TRADE)->where('parent')->eq('')->orderBy($orderBy)->page($pager)->fetchAll('id');
    }

    /** 
     * Get trade detail.
     * 
     * @access public
     * @return array
     */
    public function getDetail($tradeID)
    {
        return $this->dao->select('*')->from(TABLE_TRADE)->where('parent')->eq($tradeID)->fetchAll();
    }

    /**
     * Create a trade.
     * 
     * @param  string    $type   in|out
     * @access public
     * @return void
     */
    public function create($type)
    {
        $now = helper::now();
        
        $trade = fixer::input('post')
            ->add('type', $type)
            ->add('createdBy', $this->app->user->account)
            ->add('createdDate', $now)
            ->add('editedBy', $this->app->user->account)
            ->add('editedDate', $now)
            ->add('handlers', trim(join(',', $this->post->handlers), ','))
            ->setIf($this->post->type == 'in', 'contract', '')
            ->setIf($this->post->type == 'in', 'order', '')
            ->setIf(!$this->post->objectType or !in_array('order', $this->post->objectType), 'order', 0)
            ->setIf(!$this->post->objectType or !in_array('contract', $this->post->objectType), 'contract', 0)
            ->removeIf($type == 'out', 'objectType')
            ->get();


        $depositor = $this->loadModel('depositor')->getByID($trade->depositor);
        $trade->currency = $depositor->currency;

        $this->dao->insert(TABLE_TRADE)
            ->data($trade, $skip = 'createTrader,traderName')
            ->autoCheck()
            ->batchCheck($this->config->trade->require->create, 'notempty')
            ->checkIF(!$this->post->createTrader, 'trader', 'notempty')
            ->exec();

        $tradeID = $this->dao->lastInsertID();

        if($this->post->createTrader and $type == 'out')
        {
            $trader = new stdclass();
            $trader->relation = 'provider';
            $trader->name     = $this->post->traderName;

            $this->dao->insert(TABLE_CUSTOMER)->data($trader)->check('name', 'notempty')->exec();
            $trader = $this->dao->lastInsertID();

            $this->dao->update(TABLE_TRADE)->set('trader')->eq($trader)->where('id')->eq($tradeID)->exec();
        }

        return $tradeID;

    }

    /**
     * Batch create.
     * 
     * @access public
     * @return array
     */
    public function batchCreate()
    {
        $now    = helper::now();
        $trades = array();

        $depositorList = $this->loadModel('depositor')->getList();

        /* Get data. */
        foreach($this->post->type as $key => $type)
        {
            if(empty($type)) break;

            $trade = new stdclass();
            $trade->type        = $type;
            $trade->depositor   = $this->post->depositor[$key];
            $trade->money       = $this->post->money[$key];
            $trade->handlers    = $this->post->handlers[$key];
            $trade->date        = $this->post->date[$key] ? $this->post->date[$key] : '0000-00-00';
            $trade->desc        = strip_tags(nl2br($this->post->desc[$key]), $this->config->allowedTags->admin);
            $trade->currency    = $depositorList[$trade->depositor]->currency;
            $trade->createdBy   = $this->app->user->account;
            $trade->createdDate = $now;

            $handlers = $this->loadModel('user')->getByAccount($trade->handlers);
            if($handlers) $trade->dept = $handlers->dept;

            $trades[] = $trade;
        }

        $tradeIDList = array();
        foreach($trades as $trade)
        {
            $this->dao->insert(TABLE_TRADE)->data($trade)->autoCheck()->exec();
            if(!dao::isError()) $tradeIDList[] = $this->dao->lastInsertID();
        }

        return $tradeIDList;
    }

    /**
     * Update a trade.
     * 
     * @param  int    $tradeID 
     * @access public
     * @return string|bool
     */
    public function update($tradeID)
    {
        $oldDepositor = $this->getByID($tradeID);

        $trade = fixer::input('post')
            ->add('type', $oldDepositor->type)
            ->setIf(!$this->post->objectType or !in_array('order', $this->post->objectType),    'order', 0)
            ->setIf(!$this->post->objectType or !in_array('contract', $this->post->objectType), 'contract', 0)
            ->add('handlers', trim(join(',', $this->post->handlers), ','))
            ->add('editedBy', $this->app->user->account)
            ->add('editedDate', helper::now())
            ->remove('objectType')
            ->get();

        $handlers = $this->loadModel('user')->getByAccount($trade->handlers);
        if($handlers) $trade->dept = $handlers->dept;


        $this->dao->update(TABLE_TRADE)
            ->data($trade, $skip = 'createTrader,traderName')
            ->autoCheck()
            ->batchCheck($this->config->trade->require->edit, 'notempty')
            ->checkIF(!$this->post->createTrader, 'trader', 'notempty')
            ->where('id')->eq($tradeID)->exec();

        if($this->post->createTrader and $type == 'out')
        {
            $trader = new stdclass();
            $trader->relation = 'provider';
            $trader->name     = $this->post->traderName;

            $this->dao->insert(TABLE_CUSTOMER)->data($trader)->check('name', 'notempty')->exec();
            $trader = $this->dao->lastInsertID();

            $this->dao->update(TABLE_TRADE)->set('trader')->eq($trader)->where('id')->eq($tradeID)->exec();
        }

        if(!dao::isError()) return commonModel::createChanges($oldDepositor, $trade);

        return false;
    }

    /**
     * Transfer.
     * 
     * @access public
     * @return int|bool
     */
    public function transfer()
    {
        if($this->post->receipt == $this->post->payment) return array('result' => false, 'message' => $this->lang->trade->notEqual);

        $receiptDepositor = $this->loadModel('depositor')->getByID($this->post->receipt);
        $paymentDepositor = $this->loadModel('depositor')->getByID($this->post->payment);

        $diffCurrency = $receiptDepositor->currency != $paymentDepositor->currency;

        $now = helper::now();

        $payment = fixer::input('post')
            ->add('type', 'transferout')
            ->add('category', 'transferout')
            ->add('depositor', $this->post->payment)
            ->add('currency', $paymentDepositor->currency)
            ->add('handlers', trim(join(',', $this->post->handlers), ','))
            ->add('createdBy', $this->app->user->account)
            ->add('createdDate', $now)
            ->add('editedDate', $now)
            ->setIF($diffCurrency, 'money', $this->post->transferOut)
            ->get();

        $receipt = $payment;
        $fee     = $payment;

        $this->dao->insert(TABLE_TRADE)
            ->data($payment, $skip = 'receipt, payment, fee, transferIn, transferOut')
            ->autoCheck()
            ->check('handlers', 'notempty')
            ->batchCheckIF($diffCurrency, 'transferOut,transferIn', 'notempty')
            ->batchCheckIF($diffCurrency, 'transferOut,transferIn', 'float')
            ->checkIF(!$diffCurrency, 'money', 'notempty')
            ->exec();

        if(dao::isError()) return array('result' => false, 'message' => dao::getError());

        $paymentID = $this->dao->lastInsertID();
        $this->loadModel('action')->create('trade', $paymentID, 'Created');

        $receipt->type      = 'transferin';
        $receipt->category  = 'transferin';
        $receipt->depositor = $this->post->receipt;
        $receipt->currency  = $receiptDepositor->currency;
        if($diffCurrency) $receipt->money = $this->post->transferIn;

        $this->dao->insert(TABLE_TRADE)
            ->data($receipt, $skip = 'receipt, payment, fee, transferIn, transferOut')
            ->autoCheck()
            ->check('handlers', 'notempty')
            ->batchCheckIF($diffCurrency, 'transferOut, transferIn', 'notempty')
            ->checkIF(!$diffCurrency, 'money', 'notempty')
            ->exec();

        if(dao::isError()) return array('result' => false, 'message' => dao::getError());

        $receiptID = $this->dao->lastInsertID();
        $this->loadModel('action')->create('trade', $receiptID, 'Created');

        if($this->post->fee)
        {
            $fee->type     = 'fee';
            $fee->category = 'fee';
            $fee->money    = $this->post->fee;
            $fee->desc     = sprintf($this->lang->trade->feeDesc, $fee->date, $paymentDepositor->abbr, $receiptDepositor->abbr);
            if($diffCurrency) $fee->desc = sprintf($this->lang->trade->feeDesc, $fee->date, $paymentDepositor->abbr, $receiptDepositor->abbr);

            $this->dao->insert(TABLE_TRADE)->data($fee, $skip = 'receipt, payment, fee, transferIn, transferOut')->exec();
            if(dao::isError()) return array('result' => false, 'message' => dao::getError());

            $feeID = $this->dao->lastInsertID();
            $this->loadModel('action')->create('trade', $feeID, 'Created');
        }

        return array('result' => true);
    }

    /**
     * Save details of a trade. 
     * 
     * @param  int    $tradeID 
     * @access public
     * @return void
     */
    public function saveDetail($tradeID)
    {
        $trade = $this->getByID($tradeID);
        $trade->parent = $tradeID;

        $now = helper::now();
        $trade->createdDate = $now;
        $trade->createdBy   = $this->app->user->account;
        $trade->editedDate  = $now;
        $trade->editedBy    = $this->app->user->account;
        $trade->category    = 0;
        $trade->handlers    = '';

        $this->dao->delete()->from(TABLE_TRADE)->where('parent')->eq($tradeID)->exec();

        foreach($this->post->money as $key => $money)
        {
            if($money !== '')
            {
                $trade->money    = $money;
                if(isset($this->post->category[$key])) $trade->category = join(',', $this->post->category[$key]);
                if(isset($this->post->handlers[$key])) $trade->handlers = join(',', $this->post->handlers[$key]);
                $trade->desc     = $this->post->desc[$key];
                $this->dao->insert(TABLE_TRADE)->data($trade, 'id')->exec();
            }
        }
        return !dao::isError();
    }

    /**
     * Delete a trade.
     * 
     * @param  int      $tradeID 
     * @access public
     * @return void
     */
    public function delete($tradeID, $null = null)
    {
        $trade = $this->getByID($tradeID);
        if(!$trade) return false;

        $this->dao->delete()->from(TABLE_TRADE)->where('id')->eq($tradeID)->exec();

        return !dao::isError();
    }
}
