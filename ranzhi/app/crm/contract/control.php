<?php
/**
 * The control file for contract of RanZhi.
 *
 * @copyright   Copyright 2013-2014 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     LGPL
 * @author      Yidong Wang <yidong@cnezsoft.com>
 * @package     contract
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
class contract extends control
{
    /**
     * Contract index page. 
     * 
     * @access public
     * @return void
     */
    public function index()
    {
        $this->locate(inlink('browse'));
    }

    /**
     * Browse all contracts; 
     * 
     * @param  string $orderBy 
     * @param  int    $recTotal 
     * @param  int    $recPerPage 
     * @param  int    $pageID 
     * @access public
     * @return void
     */
    public function browse($orderBy = 'id_desc', $recTotal = 0, $recPerPage = 20, $pageID = 1)
    {   
        $this->app->loadClass('pager', $static = true);
        $pager = new pager($recTotal, $recPerPage, $pageID);

        /* Save session for return link. */
        $this->session->set('contractLink', $this->app->getURI(true));

        $this->view->contracts = $this->contract->getList(0, $orderBy, $pager);
        $this->view->customers = $this->loadModel('customer')->getPairs($mode = 'relation', $param = 'client');
        $this->view->pager     = $pager;
        $this->view->orderBy   = $orderBy;

        $this->display();
    }

    /**
     * Create contract. 
     * 
     * @param  int    $customerID
     * @param  int    $orderID 
     * @access public
     * @return void
     */
    public function create($customerID = 0, $orderID = 0)
    {
        if($_POST)
        {
            $contractID = $this->contract->create();
            if(dao::isError()) $this->send(array('result' => 'fail', 'message' => dao::getError()));

            $this->loadModel('action')->create('contract', $contractID, 'Created');

            $this->send(array('result' => 'success', 'message' => $this->lang->saveSuccess, 'locate' => inlink('browse')));
        }

        if($orderID && $customerID)
        {
            $this->view->customer     = $customerID;
            $this->view->currentOrder = $this->loadModel('order')->getByID($orderID);
            $this->view->orders       = $this->order->getList($mode = 'query', "customer={$customerID} and o.status = 'normal'");
        }

        $this->view->title      = $this->lang->contract->create;
        $this->view->orderID    = $orderID;
        $this->view->customers  = $this->loadModel('customer')->getPairs($mode = 'relation', $param = 'client');
        $this->view->users      = $this->loadModel('user')->getPairs();
        $this->display();
    }

    /**
     * Edit contract.
     * 
     * @param  int    $contractID 
     * @access public
     * @return void
     */
    public function edit($contractID)
    {
        if($_POST)
        {
            $changes = $this->contract->update($contractID);
            if(dao::isError()) $this->send(array('result' => 'fail', 'message' => dao::getError()));

            if($changes)
            {
                $actionID = $this->loadModel('action')->create('contract', $contractID, 'Edited');
                $this->action->logHistory($actionID, $changes);
            }

            $this->send(array('result' => 'success', 'message' => $this->lang->saveSuccess, 'locate' => inlink('view', "contractID=$contractID")));
        }

        $contract = $this->contract->getByID($contractID);
        $this->view->contract       = $contract; 
        $this->view->contractOrders = $this->loadModel('order')->getListByID($contract->order);
        $this->view->orders         = array('' => '') + $this->order->getList($mode = 'customer', $contract->customer);
        $this->view->customers      = $this->loadModel('customer')->getPairs($mode = 'relation', $param = 'client');
        $this->view->contacts       = $this->loadModel('contact')->getPairs($contract->customer);
        $this->view->users          = $this->loadModel('user')->getPairs();
        $this->display();
    }

    /**
     * The delivery of the contract.
     * 
     * @param  int    $contractID 
     * @access public
     * @return void
     */
    public function delivery($contractID)
    {
        if(!empty($_POST))
        {
            $this->contract->delivery($contractID);
            if(dao::isError()) $this->send(array('result' => 'fail', 'message' => dao::getError()));

            $this->loadModel('action')->create('contract', $contractID, 'Delivered', $this->post->comment);

            $link = $this->session->contractLink ? $this->session->contractLink : inlink('view', "contractID=$contractID");
            $this->send(array('result' => 'success', 'message' => $this->lang->saveSuccess, 'locate' => $link));
        }

        $this->view->title      = $this->lang->contract->delivery;
        $this->view->contractID = $contractID;
        $this->view->users      = $this->loadModel('user')->getPairs();
        $this->display();
    }

    /**
     * Receive payments of the contract.
     * 
     * @param  int    $contractID 
     * @access public
     * @return void
     */
    public function receive($contractID)
    {
        if(!empty($_POST))
        {
            $this->contract->receive($contractID);
            if(dao::isError()) $this->send(array('result' => 'fail', 'message' => dao::getError()));

            $this->loadModel('action')->create('contract', $contractID, 'Returned', $this->post->comment);
            
            $link = $this->session->contractLink ? $this->session->contractLink : inlink('view', "contractID=$contractID");
            $this->send(array('result' => 'success', 'message' => $this->lang->saveSuccess, 'locate' => $link));
        }

        $this->view->title      = $this->lang->contract->return;
        $this->view->contractID = $contractID;
        $this->view->users      = $this->loadModel('user')->getPairs();
        $this->display();
    }

    /**
     * Cancel contract.
     * 
     * @param  int    $contractID 
     * @access public
     * @return void
     */
    public function cancel($contractID)
    {
        if(!empty($_POST))
        {
            $this->contract->cancel($contractID);
            if(dao::isError()) $this->send(array('result' => 'fail', 'message' => dao::getError()));

            $this->loadModel('action')->create('contract', $contractID, 'Canceled', $this->post->comment);
            
            $link = $this->session->contractLink ? $this->session->contractLink : inlink('view', "contractID=$contractID");
            $this->send(array('result' => 'success', 'message' => $this->lang->saveSuccess, 'locate' => $link));
        }

        $this->view->title      = $this->lang->cancel;
        $this->view->contractID = $contractID;
        $this->display();
    }

    /**
     * Finish contract.
     * 
     * @param  int    $contractID 
     * @access public
     * @return void
     */
    public function finish($contractID)
    {
        if(!empty($_POST))
        {
            $this->contract->finish($contractID);
            if(dao::isError()) $this->send(array('result' => 'fail', 'message' => dao::getError()));

            $this->loadModel('action')->create('contract', $contractID, 'Finished', $this->post->comment);

            $link = $this->session->contractLink ? $this->session->contractLink : inlink('view', "contractID=$contractID");
            $this->send(array('result' => 'success', 'message' => $this->lang->saveSuccess, 'locate' => $link));
        }

        $this->view->title      = $this->lang->finish;
        $this->view->contractID = $contractID;
        $this->display();
    }

    /**
     * View contract. 
     * 
     * @param  int    $contractID 
     * @access public
     * @return void
     */
    public function view($contractID)
    {
        $contract = $this->contract->getByID($contractID);

        /* Save session for return link. */
        $this->session->set('contractLink', $this->app->getURI(true));

        $this->view->orders    = $this->loadModel('order')->getListById($contract->order);
        $this->view->customers = $this->loadModel('customer')->getPairs($mode = 'relation', $param = 'client');
        $this->view->contacts  = $this->loadModel('contact')->getPairs($contract->customer);
        $this->view->products  = $this->loadModel('product')->getPairs();
        $this->view->users     = $this->loadModel('user')->getPairs();
        $this->view->contract  = $contract;
        $this->view->actions   = $this->loadModel('action')->getList('contract', $contractID);

        $this->display();
    }

    /**
     * Delete contract. 
     * 
     * @param  int    $contractID 
     * @access public
     * @return void
     */
    public function delete($contractID)
    {
        $this->contract->delete(TABLE_CONTRACT, $contractID);
        if(dao::isError()) $this->send(array('result' => 'fail', 'message' => dao::getError()));
        $this->send(array('result' => 'success', 'locate' => inlink('browse')));
    }

    /**
     * Get order.
     *
     * @param  int       $customerID
     * @param  string    $status
     * @access public
     * @return string
     */
    public function getOrder($customerID, $status = '')
    {
        $orders = $this->loadModel('order')->getOrderForCustomer($customerID, $status);

        $html = "<div class='form-group'><span class='col-sm-8'><select name='order[]' class='select-order form-control'>";

        foreach($orders as $order)
        {
            if(!$order)
            {
                $html .= "<option value='' data-real=''></option>";
                continue;
            }

            $html .= "<option value='{$order->id}' data-real='{$order->plan}'>{$order->title}</option>";
        }

        $html .= '</select></span>';
        $html .= "<span class='col-sm-3'>" . html::input('real[]', '', "class='order-real form-control' placeholder='{$this->lang->contract->placeholder->real}'") . "</span>";
        $html .= "<span class='col-sm-1'>" . html::a('javascript:;', "<i class='icon-plus'></i>", "class='plus'") . html::a('javascript:;', "<i class='icon-minus'></i>", "class='minus'") . "</span></div>";

        echo $html;
    }
}
