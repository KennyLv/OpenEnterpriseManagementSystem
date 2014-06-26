<?php
/**
 * The control file of address module of RanZhi.
 *
 * @copyright   Copyright 2013-2014 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     LGPL
 * @author      Yidong Wang <yidong@cnezsoft.com>
 * @package     address
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
class address extends control
{
    /**
     * Browse address. 
     * 
     * @param  string $objectType 
     * @param  int    $objectID 
     * @access public
     * @return void
     */
    public function browse($objectType, $objectID)
    {
        $this->view->title      = $this->lang->address->common;
        $this->view->modalWidth = 800;
        $this->view->addresses  = $this->address->getList($objectType, $objectID);
        $this->view->areaList   = $this->loadModel('tree')->getOptionMenu('area');
        $this->view->objectType = $objectType;
        $this->view->objectID   = $objectID;

        $this->display();
    }

    /**
     * Change customer for contact.
     * 
     * @param  string $objectType 
     * @param  int    $objectID 
     * @access public
     * @return void
     */
    public function create($objectType, $objectID)
    {
        if($_POST)
        {
            $this->address->create($objectType, $objectID);
            if(dao::isError()) $this->send(array('result' => 'fail', 'message' => dao::getError()));
            $this->loadModel('action')->create($objectType, $objectID, "createAddress");
            $this->send(array('result' => 'success', 'message' => $this->lang->saveSuccess, 'locate' => inlink('browse', "objectType=$objectType&objectID=$objectID")));
        }

        $this->view->title      = $this->lang->address->create;
        $this->view->objectID   = $objectID;
        $this->view->objectType = $objectType;
        $this->view->area       = $this->loadModel('tree')->getOptionMenu('area');
        $this->display();
    }

    /**
     * Edit address.
     * 
     * @param  int    $addressID 
     * @access public
     * @return void
     */
    public function edit($addressID)
    {
        $address = $this->address->getByID($addressID);
        if($_POST)
        {
            $changes = $this->address->update($addressID);
            if(dao::isError()) $this->send(array('result' => 'fail', 'message' => dao::getError()));

            if($changes)
            {
                $actionID = $this->loadModel('action')->create($address->objectType, $address->objectID, 'editAddress');
                $this->action->logHistory($actionID, $changes);
            }
            $this->send(array('result' => 'success', 'message' => $this->lang->saveSuccess, 'locate' => inlink('browse', "objectType=$address->objectType&objectID=$address->objectID")));
        }

        $this->view->title   = $this->lang->address->edit;
        $this->view->area    = $this->loadModel('tree')->getOptionMenu('area');
        $this->view->address = $address;
        $this->display();
    }

    /**
     * Delete address.
     * 
     * @param  int    $addressID 
     * @access public
     * @return void
     */
    public function delete($addressID)
    {
        $this->address->delete($addressID);
        if(dao::isError())$this->send(array('result' => 'fail', 'message' => dao::getError()));
        $this->send(array('result' => 'success'));
    }
}
