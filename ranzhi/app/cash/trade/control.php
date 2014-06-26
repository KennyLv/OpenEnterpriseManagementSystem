<?php
/**
 * The control file of trade module of RanZhi.
 *
 * @copyright   Copyright 2013-2014 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     LGPL
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     trade
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
class trade extends control
{
    /** 
     * The index page, locate to the browse page.
     * 
     * @access public
     * @return void
     */
    public function index()
    {
        $this->locate(inlink('browse'));
    }

    /**
     * Browse trade.
     * 
     * @param string $orderBy     the order by
     * @param int    $recTotal 
     * @param int    $recPerPage 
     * @param int    $pageID 
     * @access public
     * @return void
     */
    public function browse($orderBy = 'date_desc', $recTotal = 0, $recPerPage = 20, $pageID = 1)
    {   
        $this->app->loadClass('pager', $static = true);
        $pager = new pager($recTotal, $recPerPage, $pageID);

        $expenseTypes = $this->loadModel('tree')->getPairs(0, 'out');
        $incomeTypes  = $this->loadModel('tree')->getPairs(0, 'in');

        $this->view->title   = $this->lang->trade->browse;
        $this->view->trades  = $this->trade->getList($orderBy, $pager);
        $this->view->pager   = $pager;
        $this->view->orderBy = $orderBy;

        $this->view->depositorList = $this->loadModel('depositor')->getPairs();
        $this->view->productList   = $this->loadModel('product', 'crm')->getPairs();
        $this->view->customerList  = $this->loadModel('customer', 'crm')->getPairs();
        $this->view->deptList      = $this->loadModel('tree')->getPairs(0, 'dept');
        $this->view->categories    = $this->lang->trade->categoryList + $expenseTypes + $incomeTypes;
        $this->view->users         = $this->loadModel('user')->getPairs();

        $this->display();
    }   

    /**
     * Create a contact.
     * 
     * @param  string $type 
     * @access public
     * @return void
     */
    public function create($type = '')
    {
        if($_POST)
        {
            $tradeID = $this->trade->create($type); 
            if(dao::isError())$this->send(array('result' => 'fail', 'message' => dao::getError()));

            $this->loadModel('action')->create('trade', $tradeID, 'Created', '');

            $this->send(array('result' => 'success', 'message' => $this->lang->saveSuccess, 'locate' => inlink('browse')));
        }

        $this->view->title         = $this->lang->trade->{$type};
        $this->view->type          = $type;
        $this->view->depositorList = $this->loadModel('depositor')->getPairs();
        $this->view->productList   = $this->loadModel('product', 'crm')->getPairs();
        $this->view->orderList     = $this->loadModel('order', 'crm')->getPairs($customerID = 0);
        $this->view->customerList  = $this->loadModel('customer', 'crm')->getPairs($mode = 'query', "relation in ('client','partner')");
        $this->view->traderList    = $this->loadModel('customer', 'crm')->getPairs($mode = 'query', "relation in ('provider','partner')");
        $this->view->contractList  = $this->loadModel('contract', 'crm')->getPairs($customerID = 0);
        $this->view->deptList      = $this->loadModel('tree')->getOptionMenu('dept', 0, $removeRoot = true);
        $this->view->users         = $this->loadModel('user')->getPairs();

        if($type == 'out') $this->view->categories = $this->loadModel('tree')->getPairs(0, 'out');
        if($type == 'in')  $this->view->categories = $this->loadModel('tree')->getPairs(0, 'in');

        $this->display();
    }

    /**
     * Batch create trade.
     * 
     * @access public
     * @return void
     */
    public function batchCreate()
    {
        if($_POST)
        {
            $tradeIDList = $this->trade->batchCreate();
            if(dao::isError()) $this->send(array('result' => 'fail', 'message' => dao::getError()));

            $this->loadModel('action');
            foreach($tradeIDList as $tradeID) $this->action->create('trade', $tradeID, 'Created');

            $this->send(array('result' => 'success', 'message' => $this->lang->saveSuccess, 'locate' => inlink('browse')));
        }

        $this->view->depositors    = $this->loadModel('depositor')->getPairs();
        $this->view->users         = $this->loadModel('user')->getPairs();
        $this->view->customerList  = $this->loadModel('customer', 'crm')->getPairs();
        $this->view->expenseTypes  = $this->loadModel('tree')->getPairs(0, 'out');
        $this->view->incomeTypes   = $this->loadModel('tree')->getPairs(0, 'in');

        $this->display();
    }

    /**
     * Edit a trade.
     * 
     * @param  int    $tradeID 
     * @access public
     * @return void
     */
    public function edit($tradeID)
    {
        $trade = $this->trade->getByID($tradeID);
        if(empty($trade)) die();

        if($_POST)
        {
            $changes = $this->trade->update($tradeID);
            if(dao::isError())$this->send(array('result' => 'fail', 'message' => dao::getError()));

            if($changes)
            {
                $actionID = $this->loadModel('action')->create('trade', $tradeID, 'Edited', '');
                $this->action->logHistory($actionID, $changes);
            }
            
            $this->send(array('result' => 'success', 'message' => $this->lang->saveSuccess, 'locate' => inlink('browse')));
        }
        
        $objectType = array();
        if($trade->order)    $objectType[] = 'order';
        if($trade->contract) $objectType[] = 'contract';
        $this->view->objectType = $objectType;
       
        $this->view->title         = $this->lang->trade->edit;
        $this->view->trade         = $trade;
        $this->view->depositorList = $this->loadModel('depositor')->getPairs();
        $this->view->customerList  = $this->loadModel('customer', 'crm')->getPairs($mode = 'query', "relation in ('client','partner')");
        $this->view->traderList    = $this->loadModel('customer', 'crm')->getPairs($mode = 'query', "relation in ('provider','partner')");
        $this->view->productList   = $this->loadModel('product', 'crm')->getPairs();
        $this->view->orderList     = $this->loadModel('order', 'crm')->getPairs($customerID = 0);
        $this->view->contractList  = $this->loadModel('contract', 'crm')->getPairs($customerID = 0);
        $this->view->users         = $this->loadModel('user')->getPairs();
        $this->view->deptList      = $this->loadModel('tree')->getOptionMenu('dept', 0, $removeRoot = true);
       
        if($trade->type == 'out') $this->view->categories = $this->loadModel('tree')->getPairs(0, 'out');
        if($trade->type == 'in')  $this->view->categories = $this->loadModel('tree')->getPairs(0, 'in');

        $this->display();
    }

    /**
     * Transfer.
     * 
     * @access public
     * @return void
     */
    public function transfer()
    {
        if($_POST)
        {
            $result = $this->trade->transfer(); 
            if(!$result['result']) $this->send(array('result' => 'fail', 'message' => $result['message']));
            $this->send(array('result' => 'success', 'message' => $this->lang->saveSuccess, 'locate' => inlink('browse')));
        }

        $this->view->title         = $this->lang->trade->transfer;
        $this->view->depositorList = $this->loadModel('depositor')->getList();
        $this->view->deptList      = $this->loadModel('tree')->getOptionMenu('dept', 0, $removeRoot = true);
        $this->view->users         = $this->loadModel('user')->getPairs();

        $this->display();
    }

    /**
     * manage detail of a trade.
     * 
     * @param  int    $tradeID 
     * @access public
     * @return void
     */
    public function detail($tradeID)
    {
        $trade = $this->trade->getByID($tradeID);

        if($_POST)
        {
            $result = $this->trade->saveDetail($tradeID); 
            if(!$result) $this->send(array('result' => 'fail', 'message' => dao::getError()));
            $this->send(array('result' => 'success', 'message' => $this->lang->saveSuccess, 'locate' => inlink('browse')));
        }

        $details = $this->trade->getDetail($tradeID);
        if(empty($details))
        {
            $detail = $trade;
            $detail->desc = '';
            $detail->money = '';
            $details[] = $detail;
        }

        $this->view->title         = $this->lang->trade->detail;
        $this->view->modalWidth    = 760;
        $this->view->trade         = $trade;
        $this->view->details       = $details;
        $this->view->depositorList = $this->loadModel('depositor')->getPairs();
        $this->view->productList   = $this->loadModel('product', 'crm')->getPairs();
        $this->view->orderList     = $this->loadModel('order', 'crm')->getPairs($customerID = 0);
        $this->view->customerList  = $this->loadModel('customer', 'crm')->getPairs();
        $this->view->contractList  = $this->loadModel('contract', 'crm')->getPairs($customerID = 0);
        $this->view->users         = $this->loadModel('user')->getPairs();

        if($trade->type == 'out') $this->view->categories = $this->loadModel('tree')->getPairs(0, 'out');
        if($trade->type == 'in')  $this->view->categories = $this->loadModel('tree')->getPairs(0, 'in');

        $this->display();
    }

    /**
     * Delete a trade.
     * 
     * @param  int      $tradeID 
     * @access public
     * @return void
     */
    public function delete($tradeID)
    {
        if($this->trade->delete($tradeID)) $this->send(array('result' => 'success'));
        $this->send(array('result' => 'fail', 'message' => dao::getError()));
    }
}
