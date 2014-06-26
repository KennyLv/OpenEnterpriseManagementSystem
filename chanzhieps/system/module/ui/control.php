<?php
/**
 * The control file of ui module of chanzhiEPS.
 *
 * @copyright   Copyright 2013-2013 青岛息壤网络信息有限公司 (QingDao XiRang Network Infomation Co,LTD www.xirangit.com)
 * @license     http://api.chanzhi.org/goto.php?item=license
 * @author      Xiying Guan <guanxiying@xirangit.com>
 * @package     ui
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
class ui extends control
{

    /**
     * Set theme
     *
     * @param $theme
     * @access public
     * return void
     **/
     public function setTheme($theme = '')
     {
         if($theme and isset($this->lang->ui->themes[$theme]))
         {  
            $result = $this->loadModel('setting')->setItems('system.common.site', array('theme' => $theme ));
            if($result) $this->send(array('result' => 'success', 'message' => $this->lang->setSuccess));
            $this->send(array('result' => 'fail', 'message' => $this->lang->fail));
         }

         $this->view->title = $this->lang->ui->setTheme;
         $this->display();
     }

    /**
     * custom theme
     *
     * @param $theme
     * @access public
     * return void
     **/
     public function customTheme($theme = '')
     {
        if($theme and isset($this->lang->ui->themes[$theme]) and $this->lang->ui->themes[$theme]['custom'])
        {
            if($_POST)
            {
                $customCssFile  = $this->config->site->ui->customCssFile;
                $savePath       = dirname($customCssFile);
                if(!is_dir($savePath)) mkdir($savePath, 0755, true);
                file_put_contents($customCssFile, $this->post->css);

                $setting = fixer::input('post')->remove('css,theme')->get();
                $result  = $this->loadModel('setting')->setItems('system.common.site', array('themeSetting' =>json_encode($setting)));
                $this->loadModel('setting')->setItems('system.common.site', array('customVersion' => time()));
                $this->send(array('result' => 'success', 'message' => $this->lang->ui->themeSaved));
            }
        }

        if($this->config->site->themeSetting) $this->config->themeSetting = json_decode($this->config->site->themeSetting);

        $this->view->theme = $theme;
        $this->display();
     }

    /**
     * set logo.
     * 
     * @access public
     * @return void
     */
    public function setLogo()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $return = $this->ui->setOptionWithFile($section = 'logo', $htmlTagName = 'logo');
            
            if($return['result']) $this->send(array('result' => 'success', 'message' => $this->lang->setSuccess, 'locate'=>inlink('setLogo')));
            if(!$return['result']) $this->send(array('result' => 'fail', 'message' => $return['message']));
        }

        $this->view->title = $this->lang->ui->setLogo;
        $this->view->logo  = isset($this->config->site->logo) ? json_decode($this->config->site->logo) : false;

        $this->display();
    }

    /**
     * Upload favicon.
     * 
     * @access public
     * @return void
     */
    public function setFavicon()
    {   
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {   
            $return = $this->ui->setOptionWithFile($section = 'favicon', $htmlTagName = 'favicon', $allowedFileType = 'ico');
            
            if($return['result']) $this->send(array('result' => 'success', 'message' => $this->lang->setSuccess, 'locate'=>inlink('setFavicon')));
            if(!$return['result']) $this->send(array('result' => 'fail', 'message' => $return['message']));
         }

        $this->view->title   = $this->lang->ui->setFavicon;
        $this->view->favicon = isset($this->config->site->favicon) ? json_decode($this->config->site->favicon) : false;

        $this->display();
    }

    /**
     * Delete favicon 
     * 
     * @access public          
     * @return void            
     */ 
    public function deleteFavicon() 
    {
        $favicon = isset($this->config->site->favicon) ? json_decode($this->config->site->favicon) : false;

        $this->loadModel('setting')->deleteItems("owner=system&module=common&section=site&key=favicon");
        if($favicon) $this->loadModel('file')->delete($favicon->fileID);

        $this->locate(inlink('setFavicon'));
    }

    /**
     * Delete logo. 
     * 
     * @access public          
     * @return void            
     */ 
    public function deleteLogo() 
    {
        $logo = isset($this->config->site->logo) ? json_decode($this->config->site->logo) : false;

        $this->loadModel('setting')->deleteItems("owner=system&module=common&section=site&key=logo");
        if($logo) $this->loadModel('file')->delete($logo->fileID);

        $this->locate(inlink('setLogo'));
    }
}
