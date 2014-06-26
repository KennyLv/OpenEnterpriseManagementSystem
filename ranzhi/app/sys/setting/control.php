<?php
/**
 * The control file of setting module of RanZhi.
 *
 * @copyright   Copyright 2013-2014 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     LGPL
 * @author      Yidong Wang <yidong@cnezsoft.com>
 * @package     setting
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
class setting extends control
{
    /**
     * Set lang. 
     * 
     * @param  string    $module 
     * @param  string    $field 
     * @access public
     * @return void
     */
    public function lang($module, $field)
    {
        $this->app->loadLang($module);

        $clientLang = $this->app->getClientLang();
        $appName    = $this->app->getAppName(); 

        if(!empty($_POST))
        {
            $lang = $_POST['lang'];
            $this->setting->deleteItems("lang=$lang&app=$appName&module=$module&section=$field", $type = 'lang');

            foreach($_POST['keys'] as $index => $key)
            {   
                $value  = $_POST['values'][$index];
                if(!$value or !$key) continue;
                $system = $_POST['systems'][$index];
                $this->setting->setItem("{$lang}.{$appName}.{$module}.{$field}.{$key}.{$system}", $value, $type = 'lang');
            }

            if(dao::isError()) $this->send(array('result' => 'fail', 'message' => dao::getError()));
            $this->send(array('result' => 'success', 'message' => $this->lang->saveSuccess, 'locate' => inlink('lang', "module=$module&field=$field")));
        }   

        $dbFields    = $this->setting->getItems("lang=$clientLang,all&app=$appName&module=$module&section=$field", 'lang');
        $systemField = array();
        foreach($dbFields as $dbField) $systemField[$dbField->key] = $dbField->system;

        $this->view->fieldList   = $this->lang->$module->$field;
        $this->view->module      = $module;
        $this->view->field       = $field;
        $this->view->clientLang  = $clientLang;
        $this->view->systemField = $systemField;
        $this->display();
    }

    /** 
     * Restore the default lang. Delete the related items.
     * 
     * @param  string $module 
     * @param  string $field 
     * @access public
     * @return void
     */
    public function reset($module, $field)
    {   
        $appName = $this->app->getAppName(); 
        $this->setting->deleteItems("app=$appName&module=$module&section=$field", $type = 'lang');
        $this->send(array('result' => 'success'));
    }   
}
