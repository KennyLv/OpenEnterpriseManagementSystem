<?php
/**
 * The model file for block module of RanZhi.
 *
 * @copyright   Copyright 2013-2014 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     LGPL
 * @author      Yidong Wang <yidong@cnezsoft.com>
 * @package     block
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
class blockModel extends model
{
    /** 
     * Save params 
     * 
     * @param  int    $index 
     * @access public
     * @return void
     */
    public function save($index)
    {   
        $account = $this->app->user->account;
        $data    = fixer::input('post')->get();

        $data->type = 'system';

        $this->loadModel('setting')->setItem($account . '.crm.index.block.b' . $index, helper::jsonEncode($data));
    }

    /**
     * Get block list.
     * 
     * @access public
     * @return string
     */
    public function getBlockList()
    {
        return json_encode($this->lang->block->availableBlocks);
    }

    /**
     * Get order params.
     * 
     * @access public
     * @return string
     */
    public function getOrderParams()
    {
        $this->app->loadLang('order');

        $params = new stdclass();
        $params->num['name']        = $this->lang->block->num;
        $params->num['default']     = 15; 
        $params->num['control']     = 'input';

        $params->orderBy['name']    = $this->lang->block->orderBy;
        $params->orderBy['default'] = 'id_desc';
        $params->orderBy['options'] = $this->lang->block->orderByList->order;
        $params->orderBy['control'] = 'select';

        $statusList = array('' => '') + $this->lang->order->statusList;
        $params->status['name']    = $this->lang->order->status;
        $params->status['options'] = $statusList;
        $params->status['control'] = 'select';
        $params->status['attr']    = 'multiple';

        return json_encode($params);
    }

    /**
     * Get task params.
     * 
     * @access public
     * @return string
     */
    public function getTaskParams()
    {
        $this->app->loadLang('task');

        $params = new stdclass();
        $params->num['name']    = $this->lang->block->num;
        $params->num['default'] = 15; 
        $params->num['control'] = 'input';

        $params->orderBy['name']    = $this->lang->block->orderBy;
        $params->orderBy['default'] = 'id_desc';
        $params->orderBy['options'] = $this->lang->block->orderByList->task;
        $params->orderBy['control'] = 'select';

        $params->status['name']    = $this->lang->task->status;
        $params->status['options'] = $this->lang->task->statusList;
        $params->status['control'] = 'select';
        $params->status['attr']    = 'multiple';

        return json_encode($params);
    }

    /**
     * Get contract params.
     * 
     * @access public
     * @return string
     */
    public function getContractParams()
    {
        $this->app->loadLang('contract');

        $params = new stdclass();
        $params->num['name']    = $this->lang->block->num;
        $params->num['default'] = 15; 
        $params->num['control'] = 'input';

        $params->orderBy['name']    = $this->lang->block->orderBy;
        $params->orderBy['default'] = 'id_desc';
        $params->orderBy['options'] = $this->lang->block->orderByList->contract;
        $params->orderBy['control'] = 'select';

        unset($this->lang->contract->statusList[0]);
        $statusList = array('' => '') + $this->lang->contract->statusList;
        $params->status['name']    = $this->lang->contract->status;
        $params->status['options'] = $statusList;
        $params->status['control'] = 'select';
        $params->status['attr']    = 'multiple';

        return json_encode($params);
    }
}
