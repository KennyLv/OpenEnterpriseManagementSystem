<?php
/**
 * The model file of cache module of ZenTaoCMS.
 *
 * @copyright   Copyright 2013-2013 青岛息壤网络信息有限公司 (QingDao XiRang Network Infomation Co,LTD www.xirangit.com)
 * @license     http://api.chanzhi.org/goto.php?item=license 
 * @author      Yidong Wang <yidong@cnezsoft.com>
 * @package     cache
 * @version     $Id$
 * @link        http://www.zentao.net
 */
class cacheModel extends model
{
    /**
     * Construct 
     * 
     * @access public
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->cacheRoot = $this->app->getTmpRoot() . 'cache';
        if(!is_dir($this->cacheRoot)) mkdir($this->cacheRoot, 0755, true);
    }

    /**
     * Create config cache.
     * 
     * @access public
     * @return bool
     */
    public function createConfigCache()
    {
        $cacheFile = $this->setConfigCacheFile();

        if(!is_writable($this->cacheRoot)) return false;
        if(is_file($cacheFile) and !is_writable($cacheFile)) return false;

        $siteConfigs = $this->loadModel('setting')->getItems('owner=system&module=common&section=site&key=lang');
        $configCache = "<?php\n";
        foreach($siteConfigs as $config)
        {
            $configCache .= "\$config->default->{$config->key} = '$config->value';\n";
        }

        file_put_contents($cacheFile, $configCache);
        return true;
    }

    /**
     * Set configCache file.
     * 
     * @access public
     * @return string
     */
    public function setConfigCacheFile()
    {
        return $this->cacheRoot . DS . 'config.php';
    }
}
