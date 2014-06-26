<?php
/**
 * The model file of block module of RanZhi.
 *
 * @copyright   Copyright 2013-2014 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     LGPL
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     block
 * @version     $Id$
 * @link        http://www.zentao.net
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
        $data    = fixer::input('post')->add('type', 'system')->get();

        $this->loadModel('setting')->setItem($account . '.team.index.block.b' . $index, helper::jsonEncode($data));
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
     * Get blog params.
     * 
     * @access public
     * @return string
     */
    public function getBlogParams()
    {
        $params = new stdclass();
        $params->num['name']    = $this->lang->block->num;
        $params->num['default'] = 15; 
        $params->num['control'] = 'input';

        return json_encode($params);
    }

    /**
     * Get thread params.
     * 
     * @access public
     * @return string
     */
    public function getThreadParams()
    {
        $params = new stdclass();
        $params->num['name']    = $this->lang->block->num;
        $params->num['default'] = 15; 
        $params->num['control'] = 'input';

        return json_encode($params);
    }
}
