<?php
/**
 * The model file of install module of RanZhi.
 *
 * @copyright   Copyright 2013-2014 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     LGPL
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     install 
 * @version     $Id: model.php 9923 2014-06-13 08:03:38Z guanxiying $
 * @link        http://www.ranzhi.org
 */
?>
<?php
class installModel extends model
{
    /**
     * Get the php version.
     * 
     * @access public
     * @return string
     */
    public function getPhpVersion()
    {
        return PHP_VERSION;
    }

    /**
     * Check php version.
     * 
     * @access public
     * @return bool
     */
    public function checkPHP()
    {
        return $result = version_compare(PHP_VERSION, '5.2.0') >= 0 ? 'ok' : 'fail';
    }

    /**
     * Check pdo extension.
     * 
     * @access public
     * @return bool
     */
    public function checkPDO()
    {
        return $result = extension_loaded('pdo') ? 'ok' : 'fail';
    }

    /**
     * Check pdo_mysql extension.
     * 
     * @access public
     * @return bool
     */
    public function checkPDOMySQL()
    {
        return $result = extension_loaded('pdo_mysql') ? 'ok' : 'fail';
    }

    /**
     * Get the temp root.
     * 
     * @access public
     * @return array
     */
    public function getTmpRoot()
    {
        $result['path']    = $this->app->getTmpRoot();
        $result['exists']  = is_dir($result['path']);
        $result['writable']= is_writable($result['path']);
        return $result;
    }

    /**
     * Check the temp root.
     * 
     * @access public
     * @return bool
     */
    public function checkTmpRoot()
    {
        $tmpRoot = $this->app->getTmpRoot();
        return $result = (is_dir($tmpRoot) and is_writable($tmpRoot)) ? 'ok' : 'fail';
    }

    /**
     * Get the data root.
     * 
     * @access public
     * @return array
     */
    public function getDataRoot()
    {
        $result['path']    = $this->app->getDataRoot();
        $result['exists']  = is_dir($result['path']);
        $result['writable']= is_writable($result['path']);
        return $result;
    }

    /**
     * Check the data root.
     * 
     * @access public
     * @return bool
     */
    public function checkDataRoot()
    {
        $dataRoot = $this->app->getDataRoot();
        return $result = (is_dir($dataRoot) and is_writable($dataRoot)) ? 'ok' : 'fail';
    }

    /**
     * Get the ini file info.
     * 
     * @access public
     * @return string
     */
    public function getIniInfo()
    {
        $iniInfo = '';
        ob_start();
        phpinfo(1);
        $lines = explode("\n", strip_tags(ob_get_contents()));
        ob_end_clean();
        foreach($lines as $line) if(strpos($line, 'ini') !== false) $iniInfo .= $line . "\n";
        return $iniInfo;
    }

    /**
     * Check the user config.
     * 
     * @access public
     * @return object
     */
    public function checkConfig()
    {
        $return = new stdclass();
        $return->result = 'ok';

        /* Connect db. */
        $this->setDBParam();
        $this->dbh = $this->connectDB();
        if(!is_object($this->dbh))
        {
            $return->result = 'fail';
            $return->error  = $this->lang->install->errorConnectDB . $this->dbh;
            return $return;
        }

        /* Get the mysql version. */
        $version = $this->getMysqlVersion();

        /* If the db don't exists, try create it. */
        if(!$this->dbExists())
        {
            if(!$this->createDB($version))
            {
                $return->result = 'fail';
                $return->error  = $this->lang->install->errorCreateDB;
                return $return;
            }
        }
        elseif($this->post->clearDB == false)
        {
            $return->result = 'fail';
            $return->error  = $this->lang->install->errorDBExists;
            return $return;
        }

        /* Create the tables. */
        if(!$this->createTable($version))
        {
            $return->result = 'fail';
            $return->error  = $this->lang->install->errorCreateTable;
            return $return;
        }

        return $return;
    }

    /**
     * Set the database param.
     * 
     * @access public
     * @return void
     */
    public function setDBParam()
    {
        $this->config->db->host     = $this->post->dbHost;
        $this->config->db->name     = $this->post->dbName;
        $this->config->db->user     = $this->post->dbUser;
        $this->config->db->password = $this->post->dbPassword;
        $this->config->db->port     = $this->post->dbPort;
        $this->config->db->prefix   = $this->post->dbPrefix;
    }

    /**
     * Connect to db.
     * 
     * @access public
     * @return object
     */
    public function connectDB()
    {
        $dsn = "mysql:host={$this->config->db->host}; port={$this->config->db->port};";
        try 
        {
            $dbh = new PDO($dsn, $this->config->db->user, $this->config->db->password);
            $dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $dbh->exec("SET NAMES {$this->config->db->encoding}");
            return $dbh;
        }
        catch (PDOException $exception)
        {
             return $exception->getMessage();
        }
    }

    /**
     * Check the database exits or not.
     * 
     * @access public
     * @return bool
     */
    public function dbExists()
    {
        $sql = "SHOW DATABASES like '{$this->config->db->name}'";
        return $this->dbh->query($sql)->fetch();
    }

    /**
     * Get the mysql version.
     * 
     * @access public
     * @return string
     */
    public function getMysqlVersion()
    {
        $sql = "SELECT VERSION() AS version";
        $result = $this->dbh->query($sql)->fetch();
        return substr($result->version, 0, 3);
    }

    /**
     * Create database.
     * 
     * @param  string $version 
     * @access public
     * @return bool
     */
    public function createDB($version)
    {
        $sql = "CREATE DATABASE `{$this->config->db->name}`";
        if($version > 4.1) $sql .= " DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci";
        return $this->dbh->query($sql);
    }

    /**
     * Create tables.
     * 
     * @param  string $version 
     * @access public
     * @return bool
     */
    public function createTable($version)
    {
        $dbFile = $this->app->getBasePath() . 'db' . DS . 'ranzhi.sql';
        $tables = explode(';', file_get_contents($dbFile));
        foreach($tables as $table)
        {
            $table = trim($table);
            if(empty($table)) continue;

            if(strpos($table, 'DROP') !== false and $this->post->clearDB != false)
            {
                $table = str_replace('--', '', $table);
            }
            $table = preg_replace('/`(\w+)_/', $this->config->db->name . ".`\${1}_" . $this->config->db->prefix, $table);

            if(!$this->dbh->query($table)) return false;
        }
        return true;
    }

    /**
     * Create content of my.php from the post form.
     * 
     * @access public
     * @return string
     */
    public function getConfigContent()
    {
        return <<<EOT
<?php
\$config->installed    = true;
\$config->debug        = false;
\$config->requestType  = '{$this->post->requestType}';
\$config->db->host     = '{$this->post->dbHost}';
\$config->db->port     = '{$this->post->dbPort}';
\$config->db->name     = '{$this->post->dbName}';
\$config->db->user     = '{$this->post->dbUser}';
\$config->db->password = '{$this->post->dbPassword}';
EOT;
    }

    /**
     * Save my.php config file.
     * 
     * @access public
     * @return object
     */
    public function saveMyPHP()
    {
        $configRoot    = $this->app->getConfigRoot();
        $configContent = $this->getConfigContent();

        $return = new stdclass();
        $return->myPHP   = $this->app->getConfigRoot() . 'my.php';
        $return->saved   = is_writable($configRoot) && file_put_contents($return->myPHP, $configContent);
        $return->content = $configContent;

        return $return;
    }

    /**
     * Install entry.
     * 
     * @access public
     * @return void
     */
    public function installEntry()
    {
        include $this->app->getConfigRoot() . "my.php";
        /* Remove all entries. */
        $this->dao->delete('*')->from(TABLE_ENTRY)->exec();

        /* Add new entry. */
        /* Add crm. */
        $entry = new stdclass();
        $entry->name     = 'crm';
        $entry->code     = 'crm';
        $entry->open     = 'iframe';
        $entry->key      = 'epet8b8ae1g89rxzquf4ubv37ul5tite';
        $entry->ip       = '*';
        $entry->logo     = $this->config->webRoot . 'theme/default/images/ips/app-crm.png';
        $entry->login    = '../crm';
        $entry->control  = 'simple';
        $entry->size     = 'max';
        $entry->position = 'default';

        $block = $config->requestType == 'GET' ? 'crm/index.php?m=block&f=index' : 'crm/block-index.html';
        $entry->block = $this->config->webRoot . $block;

        $this->dao->insert(TABLE_ENTRY)->data($entry)->exec();

        /* Add cash. */
        $entry->name  = 'cash';
        $entry->code  = 'cash';
        $entry->key   = '438d85f2c2b04372662c63ebfb1c4c2f';
        $entry->logo  = $this->config->webRoot . 'theme/default/images/ips/app-cash.png';
        $entry->login = '../cash';

        $block = $config->requestType == 'GET' ? 'cash/index.php?m=block&f=index' : 'cash/block-index.html';
        $entry->block = $this->config->webRoot . $block;

        $this->dao->insert(TABLE_ENTRY)->data($entry)->exec();

        /* Add oa. */
        $entry->name  = 'oa';
        $entry->code  = 'oa';
        $entry->key   = '1a673c4c3c85fadcf0333e0a4596d220';
        $entry->logo  = $this->config->webRoot . 'theme/default/images/ips/app-oa.png';
        $entry->login = '../oa';

        $block = $config->requestType == 'GET' ? 'oa/index.php?m=block&f=index' : 'oa/block-index.html';
        $entry->block = $this->config->webRoot . $block;

        $this->dao->insert(TABLE_ENTRY)->data($entry)->exec();

        /* Add team. */
        $entry->name  = 'team';
        $entry->code  = 'team';
        $entry->key   = '6c46d9fe76a1afa1cd61f946f1072d1e';
        $entry->logo  = $this->config->webRoot . 'theme/default/images/ips/app-team.png';
        $entry->login = '../team';

        $block = $config->requestType == 'GET' ? 'team/index.php?m=block&f=index' : 'team/block-index.html';
        $entry->block = $this->config->webRoot . $block;

        $this->dao->insert(TABLE_ENTRY)->data($entry)->exec();
    }

    /**
     * Create a site and it's admin account.
     * 
     * @access public
     * @return void
     */
    public function createAdmin()
    {
        if($this->post->password == '') die(js::error($this->lang->install->errorEmptyPassword));

        $join  = helper::now();
        $admin = new stdclass();
        $admin->account  = $this->post->account;
        $admin->realname = $this->post->account;
        $admin->password = $this->loadModel('user')->createPassword($this->post->password, $admin->account);
        $admin->admin    = 'super';
        $admin->join     = $join;
        $this->dao->insert(TABLE_USER)->data($admin)->autoCheck()->check('account', 'notempty')->exec();
    }
}
