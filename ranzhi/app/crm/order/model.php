<?php
/**
 * The model file of order module of RanZhi.
 *
 * @copyright   Copyright 2013-2014 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     LGPL
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     order
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
class orderModel extends model
{
    /**
     * Get order by id.
     * 
     * @param  int    $id 
     * @access public
     * @return object|bool
     */
    public function getByID($id)
    {
        $customerIdList = $this->loadModel('customer')->getMine();
        if(empty($customerIdList)) return null;

        $order = $this->dao->select('*')->from(TABLE_ORDER)->where('id')->eq($id)->andWhere('customer')->in($customerIdList)->fetch(); 
        if(!$order) return false;

        $product = $this->loadModel('product')->getByID($order->product);
        if(!$product) return false;

        return $order;
    }

    /**
     * Get my order id list.
     * 
     * @access public
     * @return array
     */
    public function getMine()
    {
        $orderList = $this->dao->select('*')->from(TABLE_ORDER)
            ->beginIF(!isset($this->app->user->rights['crm']['manageall']) and ($this->app->user->admin != 'super'))
            ->where('createdBy')->eq($this->app->user->account)
            ->fi()
            ->fetchAll('id');

        return array_keys($orderList);
    }

    /** 
     * Get order list.
     * 
     * @param  string  $mode 
     * @param  mix     $param 
     * @param  string  $orderBy 
     * @param  object  $pager 
     * @access public
     * @return array
     */
    public function getList($mode = 'all', $param = null, $orderBy = 'id_desc', $pager = null)
    {
        $customerIdList = $this->loadModel('customer')->getMine();
        if(empty($customerIdList)) return null;

        $orders = $this->dao->select('o.*, c.name as customerName, c.level as level, p.name as productName')->from(TABLE_ORDER)->alias('o')
            ->leftJoin(TABLE_CUSTOMER)->alias('c')->on("o.customer=c.id")
            ->leftJoin(TABLE_PRODUCT)->alias('p')->on("o.product=p.id")
            ->where(1)
            ->beginIF($mode != 'all' and $mode != 'query')->andWhere($mode)->eq($param)->fi()
            ->beginIF($mode == 'query')->andWhere($param)->fi()
            ->andWhere('o.customer')->in($customerIdList)
            ->orderBy($orderBy)->page($pager)->fetchAll('id');

        foreach($orders as $order) $order->title = sprintf($this->lang->order->titleLBL, $order->id, $order->customerName, $order->productName); 

        return $orders;
    }

    /** 
     * Get order list By idList.
     * 
     * @param  array   $idList 
     * @access public
     * @return array
     */
    public function getListByID($idList)
    {
        $orders = $this->dao->select('o.*, c.name as customerName, p.name as productName')->from(TABLE_ORDER)->alias('o')
            ->leftJoin(TABLE_CUSTOMER)->alias('c')->on("o.customer=c.id")
            ->leftJoin(TABLE_PRODUCT)->alias('p')->on("o.product=p.id")
            ->where('o.id')->in($idList)
            ->fetchAll('id');

        foreach($orders as $order) $order->title = sprintf($this->lang->order->titleLBL, $order->id, $order->customerName, $order->productName); 

        return $orders;
    }

    /** 
     * Get order pairs.
     * 
     * @param  int      $customer 
     * @param  string   $status 
     * @access public
     * @return array
     */
    public function getPairs($customer, $status = '')
    {
        $customerIdList = $this->loadModel('customer')->getMine();
        if(empty($customerIdList)) return null;

        $orders = $this->dao->select('o.id, o.createdDate, c.name as customerName, p.name as productName')->from(TABLE_ORDER)->alias('o')
            ->leftJoin(TABLE_CUSTOMER)->alias('c')->on("o.customer=c.id")
            ->leftJoin(TABLE_PRODUCT)->alias('p')->on("o.product=p.id")
            ->where(1)
            ->beginIF($customer)->andWhere('customer')->eq($customer)->fi()
            ->beginIF($status)->andWhere('status')->eq($status)->fi()
            ->andWhere('o.customer')->in($customerIdList)
            ->fetchAll('id');

        foreach($orders as $key => $order) $orders[$key] = sprintf($this->lang->order->titleLBL, $order->id, $order->customerName, $order->productName); 

        return $orders;
    }

    /**
     * Get orders of the customer for create contract.
     * 
     * @param  int      $customerID 
     * @param  string   $status 
     * @access public
     * @return array
     */
    public function getOrderForCustomer($customerID, $status = '')
    {
        $orders = $this->dao->select('id, `plan`, customer, product, createdDate')->from(TABLE_ORDER)
            ->where(1)
            ->beginIF($customerID)->andWhere('customer')->eq($customerID)->fi()
            ->beginIF($status)->andWhere('status')->eq($status)->fi()
            ->fetchAll('id');

        $customers = $this->loadModel('customer')->getPairs($mode = 'relation', $param = 'client');
        $products  = $this->loadModel('product')->getPairs();

        foreach($orders as $order)
        {
           $order->title = sprintf($this->lang->order->titleLBL, $order->id, $customers[$order->customer], $products[$order->product]); 
        }

        return array('0' => '') + $orders;
    }

    /**
     * Get amount.
     * 
     * @param  int|string|array    $idList 
     * @access public
     * @return float
     */
    public function getAmount($idList)
    {
        $orders = $this->dao->select('*')->from(TABLE_ORDER)->where('id')->in($idList)->fetchAll();

        $amount = 0;
        foreach($orders as $order)
        {
            $amount += $order->real == '0.00' ? $order->plan : $order->real;
        }

        return $amount;
    }

    /**
     * Get contract of an order.
     * 
     * @param  int    $orderID 
     * @access public
     * @return object
     */
    public function getContract($orderID)
    {
        return $this->dao->select('*')
            ->from(TABLE_CONTRACTORDER)->alias('t1')
            ->leftJoin(TABLE_CONTRACT)->alias('t2')->on('t1.contract=t2.id')
            ->where('`order`')->eq($orderID)
            ->fetch();
    }

    /**
     * Create an order.
     * 
     * @access public
     * @return int
     */
    public function create()
    {
        $now = helper::now();
        $order = fixer::input('post')
            ->add('createdBy', $this->app->user->account)
            ->add('createdDate', $now)
            ->setDefault('status', 'normal')
            ->setDefault('assignedBy', $this->app->user->account)
            ->setDefault('assignedTo', $this->app->user->account)
            ->setDefault('assignedDate', $now)
            ->get();

        $this->dao->insert(TABLE_ORDER)
            ->data($order)
            ->autoCheck()
            ->batchCheck($this->config->order->require->create, 'notempty')
            ->exec();

        $orderID = $this->dao->lastInsertID();

        $member = new stdclass();
        $member->order   = $orderID;
        $member->account = $this->app->user->account;
        $member->role    = $this->app->user->role;
        $member->join    = helper::today();

        return $orderID;
    }

    /**
     * Update an order.
     * 
     * @param  int $orderID 
     * @access public
     * @return void
     */
    public function update($orderID)
    {
        $oldOrder = $this->getByID($orderID);
        $now      = helper::now();
        $order    = fixer::input('post')
            ->setDefault('nextDate', '0000-00-00')
            ->setDefault('signedDate', '0000-00-00')
            ->setDefault('closedDate', '0000-00-00 00:00:00')

            ->setIF($this->post->signedBy, 'status', 'signed')
            ->setIF($this->post->closedBy, 'status', 'closed')

            ->setIF($this->post->status == 'closed' and !$this->post->closedBy, 'closedBy', $this->app->user->account)
            ->setIF($this->post->status == 'closed' and !$this->post->closedDate, 'closedDate', $now)

            ->setIF($this->post->status == 'signed' and !$this->post->signedBy, 'signedBy', $this->app->user->account)
            ->setIF($this->post->status == 'signed' and !$this->post->signedDate, 'signedDate', substr($now, 0, 10))

            ->get();

        $this->dao->update(TABLE_ORDER)
            ->data($order, $skip = 'referer')
            ->autoCheck()
            ->batchCheck($this->config->order->require->edit, 'notempty')
            ->where('id')->eq($orderID)
            ->exec();

        if(dao::isError()) return false;

        return commonModel::createChanges($oldOrder, $order);
    }

    /**
     * Close an order.
     * 
     * @param  int    $orderID 
     * @access public
     * @return bool
     */
    public function close($orderID)
    {
        $now   = helper::now();
        $order = fixer::input('post')
            ->add('closedDate', $now)
            ->add('closedBy', $this->app->user->account)
            ->add('status', 'closed')
            ->add('assignedTo', 'closed')
            ->get();

        $this->dao->update(TABLE_ORDER)->data($order, $skip = 'uid, closedNote')
            ->autoCheck()
            ->where('id')->eq($orderID)->exec();

        return !dao::isError();
    }

    /**
     * Activate an order.
     * 
     * @param  int    $orderID 
     * @access public
     * @return bool
     */
    public function activate($orderID)
    {
        $order = fixer::input('post')
            ->add('activatedDate', helper::now())
            ->add('activatedBy', $this->app->user->account)
            ->add('closedBy', '')
            ->add('closedReason', '')
            ->setDefault('status', 'normal')
            ->get();

        $this->dao->update(TABLE_ORDER)->data($order, $skip='uid, comment')->autoCheck()->where('id')->eq($orderID)->exec();

        return !dao::isError();
    }

    /**
     * Assign an order to a member again.
     * 
     * @param  int    $orderID 
     * @access public
     * @return void
     */
    public function assign($orderID)
    {
        $now = helper::now();
        $order = fixer::input('post')
            ->setDefault('assignedBy', $this->app->user->account)
            ->setDefault('assignedDate', $now)
            ->get();

        $this->dao->update(TABLE_ORDER)
            ->data($order, $skip = 'uid, comment')
            ->autoCheck()
            ->where('id')->eq($orderID)
            ->exec();

        return !dao::isError();
    }

    /**
     * Build operate menu of an order.
     * 
     * @param  object    $order 
     * @access public
     * @return string
     */
    public function buildOperateMenu($order)
    {
        $menu = '';
        $menu .= html::a(inlink('view', "orderID=$order->id"), $this->lang->view);
        $menu .= html::a(helper::createLink('action', 'createRecord', "objectType=order&objectID={$order->id}&customer={$order->customer}"), $this->lang->order->record, "data-toggle='modal'");

        if($order->status == 'normal')   $menu .= html::a(helper::createLink('contract', 'create', "customerID={$order->customer}&orderID={$order->id}"), $this->lang->order->sign);
        if($order->status != 'normal') $menu .= html::a('###', $this->lang->order->sign, "disabled='disabled' class='disabled'");

        $menu .= html::a(inlink('assign', "orderID=$order->id"), $this->lang->assign, "data-toggle='modal'");
        $menu .= html::a(inlink('edit',   "orderID=$order->id"), $this->lang->edit);

        if($order->status != 'closed')
        {
            $menu .= html::a(inlink('close', "orderID=$order->id"), $this->lang->close, "data-toggle='modal'");
            $menu .= html::a('###', $this->lang->activate, "disabled='disabled' class='disabled'");
        }
        else
        {
            if($order->closedReason == 'payed') $menu .= html::a('###', $this->lang->close, "disabled='disabled' class='disabled'");
            if($order->closedReason == 'payed') $menu .= html::a('###', $this->lang->activate, "disabled='disabled' class='disabled'");
            if($order->closedReason != 'payed') $menu .= html::a(inlink('activate', "orderID=$order->id"), $this->lang->activate, "data-toggle='modal'");
        }

        return $menu;
    }
}
