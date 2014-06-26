<?php
/**
 * The model file for contract of RanZhi.
 *
 * @copyright   Copyright 2013-2014 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     LGPL
 * @author      Yidong Wang <yidong@cnezsoft.com>
 * @package     contract
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
class contractModel extends model
{
    /**
     * Get contract by ID.
     * 
     * @param  int    $contractID 
     * @access public
     * @return object.
     */
    public function getByID($contractID)
    {
        $contract = $this->dao->select('*')->from(TABLE_CONTRACT)->where('id')->eq($contractID)->fetch();
        if($contract)
        {
            $contract->order = array();
            $contractOrders = $this->dao->select('*')->from(TABLE_CONTRACTORDER)->where('contract')->eq($contractID)->fetchAll();
            foreach($contractOrders as $contractOrder) $contract->order[] = $contractOrder->order;

            $contract->files = $this->loadModel('file')->getByObject('contract', $contractID);
        }

        return $contract;
    }

    /**
     * Get contract list.
     * 
     * @param  int    $customer
     * @param  string $orderBy 
     * @param  object $pager 
     * @access public
     * @return array
     */
    public function getList($customer = 0, $orderBy = 'id_desc', $pager = null)
    {
        return $this->dao->select('*')->from(TABLE_CONTRACT)
            ->where('deleted')->eq(0)
            ->beginIF($customer)->andWhere('customer')->eq($customer)->fi()
            ->orderBy($orderBy)
            ->page($pager)
            ->fetchAll();
    }

    /**
     * Get contract pairs.
     * 
     * @param  int    $customerID
     * @access public
     * @return array
     */
    public function getPairs($customerID)
    {
        return $this->dao->select('id, name')->from(TABLE_CONTRACT)
            ->where(1)
            ->beginIF($customerID)->where('customer')->eq($customerID)->fi()
            ->andWhere('deleted')->eq(0)
            ->fetchPairs('id', 'name');
    }

    /**
     * Create contract.
     * 
     * @access public
     * @return int|bool
     */
    public function create()
    {
        $contract = fixer::input('post')
            ->add('createdBy', $this->app->user->account)
            ->add('createdDate', helper::now())
            ->add('status', 'normal')
            ->add('delivery', 'wait')
            ->add('return', 'wait')
            ->setDefault('order', array())
            ->setDefault('real', array())
            ->setDefault('begin', '0000-00-00')
            ->setDefault('end', '0000-00-00')
            ->join('handlers', ',')
            ->stripTags('items', $this->config->allowedTags->admin)
            ->get();

        $this->dao->insert(TABLE_CONTRACT)->data($contract, 'order,uid,files,labels,real')
            ->autoCheck()
            ->batchCheck($this->config->contract->require->create, 'notempty')
            ->checkIF($contract->end != '0000-00-00', 'end', 'ge', $contract->begin)
            ->exec();

        $contractID = $this->dao->lastInsertID();

        if(!dao::isError())
        {
            foreach($contract->order as $key => $orderID)
            {
                if($orderID)
                {
                    $data = new stdclass();
                    $data->contract = $contractID;
                    $data->order    = $orderID;
                    $this->dao->insert(TABLE_CONTRACTORDER)->data($data)->exec();

                    $order = new stdclass();
                    $order->status     = 'signed';
                    $order->real       = $contract->real[$key];
                    $order->signedBy   = $contract->signedBy;
                    $order->signedDate = $contract->signedDate;
                    $this->dao->update(TABLE_ORDER)->data($order)->where('id')->eq($orderID)->exec();

                    if(dao::isError()) return false;
                    $this->loadModel('action')->create('order', $orderID, 'Signed', '', $contract->real[$key]);
                }
            }

            $this->loadModel('file')->saveUpload('contract', $contractID);

            return $contractID;
        }

        return false;
    }

    /**
     * Update contract.
     * 
     * @param  int    $contractID 
     * @access public
     * @return bool
     */
    public function update($contractID)
    {
        $now      = helper::now();
        $contract = $this->getByID($contractID);
        $data     = fixer::input('post')
            ->join('handlers', ',')
            ->add('editedBy', $this->app->user->account)
            ->add('editedDate', $now)
            ->setDefault('order', array())
            ->setDefault('real', array())
            ->setDefault('customer', $contract->customer)
            ->setDefault('signedDate', '0000-00-00')
            ->setDefault('finishedDate', '0000-00-00')
            ->setDefault('canceledDate', '0000-00-00')
            ->setDefault('deliveredDate', '0000-00-00')
            ->setDefault('returnedDate', '0000-00-00')
            ->setDefault('begin', '0000-00-00')
            ->setDefault('end', '0000-00-00')
            ->setIF($this->post->deliveredBy, 'delivery', 'done')
            ->setIF(($this->post->deliveredBy and !$this->post->deliveredDate), 'deliveredDate', substr($now, 0, 10))
            ->setIF($this->post->returnedBy, 'return', 'done')
            ->setIF(($this->post->returnedBy and !$this->post->returnedDate), 'returnedDate', substr($now, 0, 10))
            ->remove('uid,files,labels')
            ->stripTags('items', $this->config->allowedTags->admin)
            ->get();

        $this->dao->update(TABLE_CONTRACT)->data($data, 'order,real')
            ->where('id')->eq($contractID)
            ->autoCheck()
            ->batchCheck($this->config->contract->require->edit, 'notempty')
            ->checkIF($contract->end != '0000-00-00', 'end', 'ge', $contract->begin)
            ->exec();
        
        if(!dao::isError())
        {
            $oldOrders = $this->loadModel('order')->getListByID($data->order);
            $real = array();
            foreach($data->order as $key => $orderID) $real[$key] = $oldOrders[$orderID]->real;

            if($contract->order != $data->order || $real != $data->real)
            {
                $this->dao->delete()->from(TABLE_CONTRACTORDER)->where('contract')->eq($contractID)->exec();
                foreach($data->order as $key => $orderID)
                {
                    $oldOrder = $this->loadModel('order')->getByID($orderID);

                    $contractOrder = new stdclass();
                    $contractOrder->contract = $contractID;
                    $contractOrder->order    = $orderID;
                    $this->dao->insert(TABLE_CONTRACTORDER)->data($contractOrder)->exec();

                    $order = new stdclass();
                    $order->real       = $data->real[$key];
                    $order->signedBy   = $data->signedBy;
                    $order->signedDate = $data->signedDate;

                    $this->dao->update(TABLE_ORDER)->data($order)->where('id')->eq($orderID)->exec();

                    if(dao::isError()) return false;

                    $changes  = commonModel::createChanges($oldOrder, $order);
                    $actionID = $this->loadModel('action')->create('order', $orderID, 'Edited');
                    $this->action->logHistory($actionID, $changes);
                }
            }

            $this->loadModel('file')->saveUpload('contract', $contractID);

            return commonModel::createChanges($contract, $data);
        }

        return false;
    }

    /**
     * The delivery of the contract.
     * 
     * @param  int    $contractID 
     * @access public
     * @return bool
     */
    public function delivery($contractID)
    {
        $contract = fixer::input('post')
            ->add('delivery', 'done')
            ->setDefault('deliveredBy', $this->app->user->account)
            ->setDefault('deliveredDate', helper::now())
            ->join('handlers', ',')
            ->get();

        $this->dao->update(TABLE_CONTRACT)->data($contract, $skip = 'uid, comment')
            ->autoCheck()
            ->where('id')->eq($contractID)
            ->exec();

        return !dao::isError();
    }

    /**
     * Receive payments of the contract.
     * 
     * @param  int    $contractID 
     * @access public
     * @return bool
     */
    public function receive($contractID)
    {
        $contract = fixer::input('post')
            ->add('return', 'done')
            ->setDefault('returnedBy', $this->app->user->account)
            ->setDefault('returnedDate', helper::now())
            ->join('handlers', ',')
            ->get();

        $this->dao->update(TABLE_CONTRACT)->data($contract, $skip = 'uid, comment')
            ->autoCheck()
            ->where('id')->eq($contractID)
            ->exec();

        return !dao::isError();
    }

    /**
     * Cancel contract.
     * 
     * @param  int    $contractID 
     * @access public
     * @return bool
     */
    public function cancel($contractID)
    {
        $contract = new stdclass();
        $contract->status       = 'canceled';
        $contract->canceledBy   = $this->app->user->account;
        $contract->canceledDate = helper::now();

        $this->dao->update(TABLE_CONTRACT)->data($contract, $skip = 'uid, comment')
            ->autoCheck()
            ->where('id')->eq($contractID)
            ->exec();

        return !dao::isError();
    }

    /**
     * Finish contract.
     * 
     * @param  int    $contractID 
     * @access public
     * @return bool
     */
    public function finish($contractID)
    {
        $contract = new stdclass();
        $contract->status       = 'closed';
        $contract->finishedBy   = $this->app->user->account;
        $contract->finishedDate = helper::now();

        $this->dao->update(TABLE_CONTRACT)->data($contract, $skip = 'uid, comment')
            ->autoCheck()
            ->where('id')->eq($contractID)
            ->exec();

        return !dao::isError();
    }

    /**
     * Build operate menu.
     * 
     * @param  object $contract 
     * @param  string $class 
     * @param  string $type 
     * @access public
     * @return string
     */
    public function buildOperateMenu($contract, $class = '', $type = 'browse')
    {
        $menu  = '';

        if($contract->return == 'wait' and $contract->status == 'normal')
        {
            $menu .= html::a(helper::createLink('contract', 'receive',  "contract=$contract->id"), $this->lang->contract->return, "data-toggle='modal' class='$class'");
        }
        else
        {
            $menu .= "<a href='###' disabled='disabled' class='disabled  $class'>" . $this->lang->contract->return . '</a> ';
        }

        if($contract->delivery == 'wait' and $contract->status == 'normal')
        {
            $menu .= html::a(helper::createLink('contract', 'delivery', "contract=$contract->id"), $this->lang->contract->delivery, "data-toggle='modal' class='$class'");
        }
        else
        {
            $menu .= "<a href='###' disabled='disabled' class='disabled $class'>" . $this->lang->contract->delivery . '</a> ';
        }

        if($contract->status == 'normal' and $contract->return == 'done' and $contract->delivery == 'done')
        {
            $menu .= html::a(helper::createLink('contract', 'finish', "contract=$contract->id"), $this->lang->finish, "data-toggle='modal' class='$class'");
        }
        else
        {
            $menu .= "<a href='###' disabled='disabled' class='disabled $class'>" . $this->lang->finish . '</a> ';
        }

        if($contract->status == 'normal' and !($contract->return == 'done' and $contract->delivery == 'done'))
        {
            $menu .= html::a(helper::createLink('contract', 'cancel', "contract=$contract->id"), $this->lang->cancel, "data-toggle='modal' class='$class'");
        }
        else
        {
            $menu .= "<a href='###' disabled='disabled' class='disabled $class'>" . $this->lang->cancel . '</a> ';
        }

        $menu .= html::a(helper::createLink('contract', 'edit', "contract=$contract->id"), $this->lang->edit, "class='$class'");

        $deleter = $type == 'browse' ? 'reloadDeleter' : 'deleter';
        if($contract->status == 'normal' and !($contract->return == 'done' and $contract->delivery == 'done'))
        {
            $menu   .= html::a(helper::createLink('contract', 'delete', "contract=$contract->id"), $this->lang->delete, "class='$deleter $class'");
        }
        else
        {
            $menu .= "<a href='###' disabled='disabled' class='disabled $class'>" . $this->lang->delete . '</a> ';
        }

        return $menu;
    }
}
