<?php
/**
 * The model file of contact module of RanZhi.
 *
 * @copyright   Copyright 2013-2014 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     LGPL
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     contact
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
class contactModel extends model
{
    /**
     * Get contact by id.
     * 
     * @param  int    $id 
     * @access public
     * @return object
     */
    public function getByID($id)
    {
        $customerIdList = $this->loadModel('customer')->getMine();
        if(empty($customerIdList)) return null;

        return $this->dao->select('t1.*, t2.customer, t2.maker, t2.title, t2.dept, t2.join')->from(TABLE_CONTACT)->alias('t1')
            ->leftJoin(TABLE_RESUME)->alias('t2')->on('t1.resume = t2.id')
            ->where('t1.id')->eq($id)
            ->andWhere('t2.customer')->in($customerIdList)
            ->limit(1)
            ->fetch();
    }

    /**
     * Get my contact id list.
     * 
     * @access public
     * @return array
     */
    public function getMine()
    {
        $contactList = $this->dao->select('*')->from(TABLE_CONTACT)
            ->beginIF(!isset($this->app->user->rights['crm']['manageall']) and ($this->app->user->admin != 'super'))
            ->where('createdBy')->eq($this->app->user->account)
            ->fi()
            ->fetchAll('id');

        return array_keys($contactList);
    }


    /** 
     * Get contact list.
     * 
     * @param  int     $customer
     * @param  string  $orderBy 
     * @param  object  $pager 
     * @access public
     * @return array
     */
    public function getList($customer = 0, $orderBy = 'maker_desc', $pager = null)
    {
        $customerIdList = $this->loadModel('customer')->getMine();
        if(empty($customerIdList)) return array();

        $resumes = array();
        if($customer) $resumes = $this->dao->select('*')->from(TABLE_RESUME)->where('customer')->eq($customer)->andWhere('deleted')->eq(0)->fetchAll('contact');

        $contacts = $this->dao->select('t1.*, t2.customer, t2.maker, t2.title, t2.dept, t2.join, t2.left')->from(TABLE_CONTACT)->alias('t1')
            ->leftJoin(TABLE_RESUME)->alias('t2')->on('t1.resume = t2.id')
            ->where('t1.deleted')->eq(0)
            ->andWhere('t2.customer')->in($customerIdList)
            ->beginIF($customer)->andWhere('t1.id')->in(array_keys($resumes))->fi()
            ->orderBy($orderBy)
            ->page($pager)
            ->fetchAll('id');

        foreach($resumes as $contactID => $resume)
        {
            if(isset($contacts[$contactID]))
            {
                $contacts[$contactID]->customer = $resume->customer;
                $contacts[$contactID]->maker    = $resume->maker;
                $contacts[$contactID]->title    = $resume->title;
                $contacts[$contactID]->dept     = $resume->dept;
                $contacts[$contactID]->join     = $resume->join;
                $contacts[$contactID]->left     = $resume->left;
            }
        }

        return $contacts;
    }

    /**
     * Get common selecter of contact.
     * 
     * @param  int     $customer 
     * @param  bool    $emptyOption 
     * @access public
     * @return void
     */
    public function getPairs($customer = 0, $emptyOption = true)
    {
        $customerIdList = $this->loadModel('customer')->getMine();
        if(empty($customerIdList)) return array();

        $contacts = $this->dao->select('t1.*')->from(TABLE_CONTACT)->alias('t1')
            ->leftJoin(TABLE_RESUME)->alias('t2')->on('t1.id = t2.contact')
            ->where('t1.deleted')->eq(0)
            ->beginIF($customer)->andWhere('t2.customer')->eq($customer)->FI()
            ->andWhere('t2.customer')->in($customerIdList)
            ->fetchPairs('id', 'realname');

        if($emptyOption)  $contacts = array(0 => '') + $contacts;

        return $contacts;
    }

    /**
     * Get customer option menu of a contact.
     * 
     * @param  int    $contactID 
     * @access public
     * @return array
     */
    public function getCustomerPairs($contactID)
    {
        $customerIdList = $this->loadModel('customer')->getMine();
        if(empty($customerIdList)) return array();

        return $this->dao->select('customer,name')
            ->FROM(TABLE_RESUME)->alias('r')
            ->leftJoin(TABLE_CUSTOMER)->alias('c')->on('r.customer=c.id')
            ->where('r.contact')->eq($contactID)
            ->andWhere('r.customer')->in($customerIdList)
            ->andWhere('c.deleted')->eq(0)->fetchPairs();
    }

    /**
     * Create a contact.
     * 
     * @param  object $contact   //create with the data of contact.
     * @access public
     * @return void
     */
    public function create($contact = null)
    {
        if(empty($contact))
        {
            $contact = fixer::input('post')
                ->add('createdBy', $this->app->user->account)
                ->remove('newCustomer,type,size,status,level,name,files')
                ->get();

            if($this->post->newCustomer)
            {
                $customer = new stdclass();
                $customer->name        = $this->post->name ? $this->post->name : $contact->realname;
                $customer->type        = $this->post->type;
                $customer->size        = $this->post->size;
                $customer->status      = $this->post->status;
                $customer->level       = $this->post->level;
                $customer->desc        = $contact->desc;
                $customer->createdBy   = $this->app->user->account;
                $customer->createdDate = helper::now();

                $customerID = $this->loadModel('customer')->create($customer);

                if(dao::isError()) return false;
                $contact->customer = $customerID;
                $this->loadModel('action')->create('customer', $customerID, 'Created');
            }
        }

        $this->dao->insert(TABLE_CONTACT)
            ->data($contact, 'customer,title,dept,maker,join')
            ->autoCheck()
            ->batchCheck($this->config->contact->require->create, 'notempty')
            ->checkIF($contact->email, 'email', 'email')
            ->exec();

        if(!dao::isError())
        {
            $contactID = $this->dao->lastInsertID();

            $resume = new stdclass();
            $resume->contact  = $contactID;
            $resume->customer = $contact->customer;
            $resume->maker    = isset($contact->maker) ? $contact->maker : 0;
            $resume->dept     = isset($contact->dept) ? $contact->dept : '';
            $resume->title    = isset($contact->title) ? $contact->title : '';
            $resume->join     = isset($contact->join) ? $contact->join : '';

            $this->dao->insert(TABLE_RESUME)->data($resume)->exec();
            if(!dao::isError()) $this->dao->update(TABLE_CONTACT)->set('resume')->eq($this->dao->lastInsertID())->where('id')->eq($contactID)->exec();

            return $contactID;
        }

        return false;
    }

    /**
     * Update a contact.
     * 
     * @param  int    $contactID 
     * @access public
     * @return string
     */
    public function update($contactID)
    {
        $oldContact = $this->getByID($contactID);
        $now        = helper::now();

        $contact = fixer::input('post')
            ->add('editedBy', $this->app->user->account)
            ->add('editedDate', $now)
            ->setDefault('birthday', '0000-00-00')
            ->setIF($this->post->avatar == '', 'avatar', $oldContact->avatar)
            ->setIF($this->post->weibo == 'http://weibo.com/', 'weibo', '')
            ->setIF($this->post->site == 'http://', 'site', '')
            ->remove('files')
            ->get();

        if($contact->site and strpos($contact->site, '://') === false )  $contact->site  = 'http://' . $contact->site;
        if($contact->weibo and strpos($contact->weibo, 'http://weibo.com/') === false ) $contact->weibo = 'http://weibo.com/' . $contact->weibo;

        $this->dao->update(TABLE_CONTACT)
            ->data($contact, 'customer,dept,maker,title,join')
            ->autoCheck()
            ->batchCheck($this->config->contact->require->edit, 'notempty')
            ->checkIF($contact->email, 'email', 'email')
            ->where('id')->eq($contactID)
            ->exec();

        if(!dao::isError())
        {
            $resume = new stdclass();
            $resume->contact  = $contactID;
            $resume->customer = $contact->customer;
            $resume->dept     = $contact->dept;
            $resume->maker    = isset($contact->maker) ? $contact->maker : 0;
            $resume->title    = $contact->title;
            $resume->join     = $contact->join;

            if($oldContact->customer != $contact->customer)
            {
                $this->dao->insert(TABLE_RESUME)->data($resume)->exec();
                if(!dao::isError()) $this->dao->update(TABLE_CONTACT)->set('resume')->eq($this->dao->lastInsertID())->where('id')->eq($contactID)->exec();
            }
            else
            {
                $this->dao->update(TABLE_RESUME)->data($resume)->where('id')->eq($oldContact->resume)->exec();
            }

            return commonModel::createChanges($oldContact, $contact);
        }

        return false;
    }

    /**
     * Update contact avatar. 
     * 
     * @param  int    $contactID 
     * @access public
     * @return void
     */
    public function updateAvatar($contactID)
    {
        if(!$_FILES) return array('result' => true, 'contactID' => $contactID);

        $fileModel = $this->loadModel('file');

        if(!$this->file->checkSavePath()) return array('result' => false, 'message' => $this->lang->file->errorUnwritable);
        
        /* Delete old files. */
        $oldFiles = $this->dao->select('id')->from(TABLE_FILE)->where('objectType')->eq('avatar')->andWhere('objectID')->eq($contactID)->fetchAll('id');
        if($oldFiles)
        {
            foreach($oldFiles as $file) $fileModel->delete($file->id);
            if(dao::isError()) return array('result' => false, 'message' => $this->lang->contact->failedAvatar);
        }
        
        /* Upload new avatar. */
        $uploadResult = $fileModel->saveUpload('avatar', $contactID);
        if(!$uploadResult) return array('result' => false, 'message' => $this->lang->contact->failedAvatar);
        
        $fileIdList = array_keys($uploadResult);
        $file       = $fileModel->getById($fileIdList[0]);
        
        $avatarPath = $this->config->webRoot . 'data/upload/' . $file->pathname;
        $this->dao->update(TABLE_CONTACT)->set('avatar')->eq($avatarPath)->where('id')->eq($contactID)->exec();
        if(!dao::isError()) return array('result' => true, 'contactID' => $contactID);

        return array('result' => false, 'message' => $this->lang->contact->failedAvatar);
    }
}
