<?php
/**
 * The model file of resume module of RanZhi.
 *
 * @copyright   Copyright 2013-2014 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     LGPL
 * @author      Yidong Wang <yidong@cnezsoft.com>
 * @package     resume
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
class resumeModel extends model
{ 
    /**
     * Get by id.
     * 
     * @param  int    $resumeID 
     * @access public
     * @return object
     */
    public function getByID($resumeID)
    {
        return $this->dao->select('*')->from(TABLE_RESUME)->where('id')->eq($resumeID)->fetch();
    }

    /**
     * Get list.
     * 
     * @param  int    $contactID 
     * @access public
     * @return array
     */
    public function getList($contactID)
    {
        return $this->dao->select('*')->FROM(TABLE_RESUME)->where('contact')->eq($contactID)->andWhere('deleted')->eq(0)->orderBy('id')->fetchAll();
    }

    /**
     * Create resume. 
     * 
     * @param  int    $contactID 
     * @param  object $resume 
     * @access public
     * @return int
     */
    public function create($contactID, $resume = null)
    {
        if(empty($resume))
        {
            $resume = fixer::input('post')
                ->add('contact', $contactID)
                ->remove('newCustomer,type,size,status,level,name')
                ->get();

            if($this->post->newCustomer)
            {
                $customer = new stdclass();
                $customer->name        = $this->post->name;
                $customer->type        = $this->post->type;
                $customer->size        = $this->post->size;
                $customer->status      = $this->post->status;
                $customer->level       = $this->post->level;
                $customer->createdBy   = $this->app->user->account;
                $customer->createdDate = helper::now();

                $customerID = $this->loadModel('customer')->create($customer);

                if(dao::isError()) return false;
                $resume->customer = $customerID;
                $this->loadModel('action')->create('customer', $resume->customer, 'Created');
            }
        }

        $this->dao->insert(TABLE_RESUME)->data($resume)
            ->autoCheck()
            ->batchCheck($this->config->resume->require->create, 'notempty')
            ->exec();

        if(!dao::isError())
        {
            $resumeID = $this->dao->lastInsertID();
            $this->dao->update(TABLE_CONTACT)->set('resume')->eq($resumeID)->where('id')->eq($contactID)->exec();

            return $resumeID;
        }

        return false;
    }

    /**
     * Update resume.
     * 
     * @param  int    $resumeID 
     * @access public
     * @return string
     */
    public function update($resumeID)
    {
        $oldResume = $this->getByID($resumeID);
        $resume    = fixer::input('post')->get();

        $this->dao->update(TABLE_RESUME)->data($resume)->where('id')->eq($resumeID)->exec();

        return commonModel::createChanges($oldResume, $resume);
    }
}
