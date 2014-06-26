<?php
/**
 * The control file of action module of RanZhi.
 *
 * @copyright   Copyright 2013-2014 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     LGPL
 * @author      Yidong Wang <yidong@cnezsoft.com>
 * @package     action
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
class action extends control
{
    /**
     * browse history actions and records. 
     * 
     * @param  string    $objectType
     * @param  int       $objectID 
     * @param  string    action
     * @access public
     * @return void
     */
    public function history($objectType, $objectID, $action = '')
    {
        $this->view->actions    = $this->loadModel('action')->getList($objectType, $objectID, $action);
        $this->view->objectType = $objectType;
        $this->view->objectID   = $objectID;
        $this->display();
    }

    /**
     * Edit comment of an action.
     * 
     * @param  int    $actionID 
     * @access public
     * @return void
     */
    public function editComment($actionID)
    {
        if(!strip_tags($this->post->lastComment)) $this->send(array('result' => 'success', 'locate' => $this->server->http_referer));
        $this->action->updateComment($actionID);
        $this->send(array('result' => 'success', 'message' => $this->lang->saveSuccess, 'locate' => $this->server->http_referer));
    }

    /**
     * Create one record of an object.
     * 
     * @param  string    $objectType  order|contact|customer
     * @param  int       $objectID 
     * @param  int       $customer 
     * @access public
     * @return void
     */
    public function createRecord($objectType, $objectID, $customer = 0)
    {
        if($_POST)
        {
            if($this->post->contract)
            {
                $objectType = 'contract';
                $objectID   = $this->post->contract;
            }

            if($this->post->order)
            {
                $objectType = 'order';
                $objectID   = $this->post->order;
            }

            if($this->post->customer) $customer = $this->post->customer;
            $this->action->createRecord($objectType, $objectID, $customer, $this->post->contact);

            if(dao::isError()) $this->send(array('result' => 'fail', 'message' => dao::getError()));
            $this->send(array('result' => 'success', 'message' => $this->lang->saveSuccess, 'locate' => $this->server->http_referer));
        }
        
        if($objectType == 'contact')
        {
            $this->view->customers = $this->loadModel('contact')->getCustomerPairs($objectID);
        }

        if($objectType == 'customer')
        {
            $this->view->orders    = array('') + $this->loadModel('order')->getPairs($objectID);
            $this->view->contracts = array('') + $this->loadModel('contract')->getPairs($objectID);
        }

        $this->view->title      = $this->lang->action->record->create;
        $this->view->objectType = $objectType;
        $this->view->objectID   = $objectID;
        $this->view->customer   = $customer;
        $this->view->contacts   = $this->loadModel('contact', 'crm')->getPairs($customer);
        $this->display();
    }

   /**
     * Edit one record of an object.
     * 
     * @param  int    $recordID
     * @access public
     * @return void
     */
    public function editRecord($recordID, $from = '')
    {
        $record = $this->loadModel('action')->getByID($recordID);
        if($record->action != 'record') exit;
        $object = $this->loadModel($record->objectType)->getByID($record->objectID);

        if($_POST)
        {
            $action = fixer::input('post')->get();
            $this->action->update($action, $recordID);
            if(dao::isError()) $this->send(array('result' => 'fail', 'message' => dao::getError()));
            $this->send(array('result' => 'success', 'message' => $this->lang->saveSuccess, 'locate' => $this->server->http_referer));
        }

        $this->view->title    = $this->lang->action->record->edit;
        $this->view->from     = $from;
        $this->view->record   = $record;
        $this->view->contacts = $this->loadModel('contact')->getPairs($record->objectType == 'customer' ? $object->id : $object->customer);
        $this->display();
    }
}
