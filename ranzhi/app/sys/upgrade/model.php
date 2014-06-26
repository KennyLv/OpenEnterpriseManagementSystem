<?php
/**
 * The model file of upgrade module of RanZhi.
 *
 * @copyright   Copyright 2013-2014 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     LGPL
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     upgrade
 * @version     $Id: model.php 9925 2014-06-13 09:10:56Z guanxiying $
 * @link        http://www.ranzhi.org
 */
?>
<?php
class upgradeModel extends model
{
    /**
     * Errors.
     * 
     * @static
     * @var array 
     * @access public
     */
    static $errors = array();

    /**
     * Security: can execute upgrade or not.
     * 
     * @access public
     * @return array  array('result' => success|fail, 'okFile');
     */
    public function canUpgrade()
    {
        $okFile = dirname($this->app->getDataRoot()) . DS . 'ok';
        if(!file_exists($okFile) or time() - filemtime($okFile) > 600)
        {
            return array('result' => 'fail', 'okFile' => $okFile);
        }

        return array('result' => 'success');
    }

    /**
     * The execute method. According to the $fromVersion call related methods.
     * 
     * @param  string $fromVersion 
     * @access public
     * @return void
     */
    public function execute($fromVersion)
    {
        switch($fromVersion)
        {
            case '1_0_beta':
                $this->execSQL($this->getUpgradeFile('1.0.beta'));
                $this->createCashEntry();
            case '1_1_beta':
                $this->execSQL($this->getUpgradeFile('1.1.beta'));
                $this->createTeamEntry();
            default: if(!$this->isError()) $this->loadModel('setting')->updateVersion($this->config->version);
        }

        $this->deletePatch();
    }

    /**
     * Create the confirm contents.
     * 
     * @param  string $fromVersion 
     * @access public
     * @return string
     */
    public function getConfirm($fromVersion)
    {
        $confirmContent = '';
        switch($fromVersion)
        {
            case '1_0_beta': $confirmContent .= file_get_contents($this->getUpgradeFile('1.0.beta'));
            case '1_1_beta': $confirmContent .= file_get_contents($this->getUpgradeFile('1.1.beta'));
        }
        return $confirmContent;
    }

    /**
     * Delete the patch record.
     * 
     * @access public
     * @return void
     */
    public function deletePatch()
    {
        return true;
        $this->dao->delete()->from(TABLE_EXTENSION)->where('type')->eq('patch')->exec();
    }

    /**
     * Get the upgrade sql file.
     * 
     * @param  string $version 
     * @access public
     * @return string
     */
    public function getUpgradeFile($version)
    {
        return $this->app->getBasepath() . 'db' . DS . 'upgrade' . $version . '.sql';
    }

    /**
     * Execute a sql.
     * 
     * @param  string  $sqlFile 
     * @access public
     * @return void
     */
    public function execSQL($sqlFile)
    {
        $mysqlVersion = $this->loadModel('install')->getMysqlVersion();

        /* Read the sql file to lines, remove the comment lines, then join theme by ';'. */
        $sqls = explode("\n", file_get_contents($sqlFile));
        foreach($sqls as $key => $line) 
        {
            $line       = trim($line);
            $sqls[$key] = $line;
            if(strpos($line, '--') !== false or empty($line)) unset($sqls[$key]);
        }
        $sqls = explode(';', join("\n", $sqls));

        foreach($sqls as $sql)
        {
            $sql = trim($sql);
            if(empty($sql)) continue;

            if($mysqlVersion <= 4.1)
            {
                $sql = str_replace('DEFAULT CHARSET=utf8', '', $sql);
                $sql = str_replace('CHARACTER SET utf8 COLLATE utf8_general_ci', '', $sql);
            }

            try
            {
                $this->dbh->exec($sql);
            }
            catch (PDOException $e) 
            {
                self::$errors[] = $e->getMessage() . "<p>The sql is: $sql</p>";
            }
        }
    }

    /**
     * Judge any error occers.
     * 
     * @access public
     * @return bool
     */
    public function isError()
    {
        return !empty(self::$errors);
    }

    /**
     * Get errors during the upgrading.
     * 
     * @access public
     * @return array
     */
    public function getError()
    {
        $errors = self::$errors;
        self::$errors = array();
        return $errors;
    }

    /**
     * create cash entry.
     * 
     * @access public
     * @return void
     */
    public function createCashEntry()
    {
        $entry = new stdclass();

        $entry->name     = 'cash';
        $entry->code     = 'cash';
        $entry->open     = 'iframe';
        $entry->order    = 2;
        $entry->ip       = '*';
        $entry->key      = '438d85f2c2b04372662c63ebfb1c4c2f';
        $entry->logo     = $this->config->webRoot . 'theme/default/images/ips/app-cash.png';
        $entry->login    = '../cash';
        $entry->ip       = '*';
        $entry->control  = 'simple';
        $entry->size     = 'max';
        $entry->position = 'default';

        $block = REQUESTTYPE == 'GET' ? 'cash/index.php?m=block&f=index' : 'cash/block-index.html';
        $entry->block = $this->config->webRoot . $block;

        $this->dao->insert(TABLE_ENTRY)->data($entry)->exec();
    }

    /**
     * create team entry.
     * 
     * @access public
     * @return void
     */
    public function createTeamEntry()
    {
        $entry = new stdclass();

        $entry->name     = 'team';
        $entry->code     = 'team';
        $entry->open     = 'iframe';
        $entry->order    = 4;
        $entry->ip       = '*';
        $entry->key      = '6c46d9fe76a1afa1cd61f946f1072d1e';
        $entry->logo     = $this->config->webRoot . 'theme/default/images/ips/app-team.png';
        $entry->login    = '../team';
        $entry->ip       = '*';
        $entry->control  = 'simple';
        $entry->size     = 'max';
        $entry->position = 'default';

        $block = REQUESTTYPE == 'GET' ? 'team/index.php?m=block&f=index' : 'team/block-index.html';
        $entry->block = $this->config->webRoot . $block;

        $this->dao->insert(TABLE_ENTRY)->data($entry)->exec();
    }
}
