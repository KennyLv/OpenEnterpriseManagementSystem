<?php
/**
 * The helper class file of ZenTaoPHP framework.
 *
 * The author disclaims copyright to this source code.  In place of
 * a legal notice, here is a blessing:
 *
 *  May you do good and not evil.
 *  May you find forgiveness for yourself and forgive others.
 *  May you share freely, never taking more than you give.
 */

/**
 * The helper class, contains the tool functions.
 *
 * @package framework
 */
class helper
{
    /**
     * Set the member's value of one object.
     * <code>
     * <?php
     * $lang->db->user = 'wwccss';
     * helper::setMember('lang', 'db.user', 'chunsheng.wang');
     * ?>
     * </code>
     * @param string    $objName    the var name of the object.
     * @param string    $key        the key of the member, can be parent.child.
     * @param mixed     $value      the value to be set.
     * @static
     * @access public
     * @return bool
     */
    static public function setMember($objName, $key, $value)
    {
        global $$objName;
        if(!is_object($$objName) or empty($key)) return false;
        $key   = str_replace('.', '->', $key);
        $value = serialize($value);
        $code  = ("\$${objName}->{$key}=unserialize(<<<EOT\n$value\nEOT\n);");
        eval($code);
        return true;
    }

    /**
     * Create a link to a module's method.
     * 
     * This method also mapped in control class to call conveniently.
     * <code>
     * <?php
     * helper::createLink('hello', 'index', 'var1=value1&var2=value2');
     * helper::createLink('hello', 'index', array('var1' => 'value1', 'var2' => 'value2');
     * ?>
     * </code>
     * @param string       $moduleName     module name
     * @param string       $methodName     method name
     * @param string|array $vars           the params passed to the method, can be array('key' => 'value') or key1=value1&key2=value2) or key1=value1&key2=value2
     * @param string|array $alias          the alias  params passed to the method, can be array('key' => 'value') or key1=value1&key2=value2) or key1=value1&key2=value2
     * @param string       $viewType       the view type
     * @static
     * @access public
     * @return string the link string.
     */
    static public function createLink($moduleName, $methodName = 'index', $vars = '', $alias = array(), $viewType = '')
    {
        global $app, $config;

        /* Set vars and alias. */
        if(!is_array($vars)) parse_str($vars, $vars);
        if(!is_array($alias)) parse_str($alias, $alias);
        
        /* Seo modules return directly. */
        if(helper::inSeoMode() and method_exists('uri', 'create' . $moduleName . $methodName))
        {
            $link = call_user_func_array('uri::create' . $moduleName . $methodName, array('param'=> $vars, 'alias'=>$alias));
            if($link) return $link;
        }
        
        /* Set the view type. */
        if(empty($viewType)) $viewType = $app->getViewType();
        $link = $config->requestType == 'PATH_INFO' ? $config->webRoot : $_SERVER['SCRIPT_NAME'];

        /* The PATH_INFO type. */
        if($config->requestType == 'PATH_INFO')
        {
            /* If the method equal the default method defined in the config file and the vars is empty, convert the link. */
            if($methodName == $config->default->method and empty($vars))
            {
                /* If the module also equal the default module, change index-index to index.html. */
                if($moduleName == $config->default->module)
                {
                    $link .= 'index.' . $viewType;
                }
                elseif($viewType == $app->getViewType())
                {
                    $link .= $moduleName . '/';
                }
                else
                {
                    $link .= $moduleName . '.' . $viewType;
                }
            }
            else
            {
                $link .= "$moduleName{$config->requestFix}$methodName";
                foreach($vars as $value) $link .= "{$config->requestFix}$value";
                $link .= '.' . $viewType;
            }
        }
        elseif($config->requestType == 'GET')
        {
            $link .= "?{$config->moduleVar}=$moduleName&{$config->methodVar}=$methodName";
            if($viewType != 'html') $link .= "&{$config->viewVar}=" . $viewType;
            foreach($vars as $key => $value) $link .= "&$key=$value";
        }

        return $link;
    }

    /**
     * Import a file instend of include or requie.
     * 
     * @param string    $file   the file to be imported.
     * @static
     * @access public
     * @return bool
     */
    static public function import($file)
    {
        static $includedFiles = array();
        if(!isset($includedFiles[$file]))
        {
            $return = include $file;
            if(!$return) return false;
            $includedFiles[$file] = true;
            return true;
        }
        return true;
    }

    /**
     * Set the model file of one module. If there's an extension file, merge it with the main model file.
     * 
     * @param   string $moduleName the module name
     * @static
     * @access  public
     * @return  string the model file
     */
    static public function setModelFile($moduleName)
    {
        global $app;

        /* Set the main model file and extension path and files. */
        $mainModelFile = $app->getModulePath($moduleName) . 'model.php';
        $modelExtPaths = $app->getModuleExtPath($moduleName, 'model');

        $extFiles = array();
        foreach($modelExtPaths as $modelExtPath)
        {
            $extFiles = array_merge($extFiles, helper::ls($modelExtPath, '.php'));
        }

        /* If no extension file, return the main file directly. */
        if(empty($extFiles)) return $mainModelFile;

        /* Else, judge whether needed update or not .*/
        $mergedModelDir  = $app->getTmpRoot() . 'model' . DS . $app->siteCode{0} . DS . $app->siteCode . DS;
        $mergedModelFile = $mergedModelDir . $app->siteCode . '.' . $moduleName . '.php';
        $needUpdate      = false;
        $lastTime        = file_exists($mergedModelFile) ? filemtime($mergedModelFile) : 0;
        if(!is_dir($mergedModelDir)) mkdir($mergedModelDir, 0755, true);
        foreach($extFiles as $extFile)
        {
            if(filemtime($extFile) > $lastTime)
            {
                $needUpdate = true;
                break;
            }
        }
        if(filemtime($mainModelFile) > $lastTime) $needUpdate = true;

        /* If need'nt update, return the cache file. */
        if(!$needUpdate) return $mergedModelFile;

        /* Update the cache file. */
        if($needUpdate)
        {
            $modelClass    = $moduleName . 'Model';
            $extModelClass = 'ext' . $modelClass;
            $modelLines    = "<?php\n";
            $modelLines   .= "helper::import('$mainModelFile');\n";
            $modelLines   .= "class $extModelClass extends $modelClass \n{\n";

            /* Cycle all the extension files. */
            foreach($extFiles as $extFile)
            {
                $extLines = trim(file_get_contents($extFile));
                if(strpos($extLines, '<?php') !== false) $extLines = ltrim($extLines, '<?php');
                if(strpos($extLines, '?>')    !== false) $extLines = rtrim($extLines, '?>');
                $modelLines .= $extLines . "\n";
            }

            /* Create the merged model file. */
            $modelLines .= "}";
            file_put_contents($mergedModelFile, $modelLines);

            return $mergedModelFile;
        }
    }

    /**
     * Create the in('a', 'b') string.
     * 
     * @param   string|array $ids   the id lists, can be a array or a string with ids joined with comma.
     * @static
     * @access  public
     * @return  string  the string like IN('a', 'b').
     */
    static public function dbIN($ids)
    {
        if(is_array($ids)) return "IN ('" . join("','", $ids) . "')";
        return "IN ('" . str_replace(',', "','", str_replace(' ', '',$ids)) . "')";
    }

    /**
     * Create safe base64 encoded string for the framework.
     * 
     * @param   string  $string   the string to encode.
     * @static
     * @access  public
     * @return  string  encoded string.
     */
    static public function safe64Encode($string)
    {
        return strtr(base64_encode($string), '/', '.');
    }

    /**
     * Decode the string encoded by safe64Encode.
     * 
     * @param   string  $string   the string to decode
     * @static
     * @access  public
     * @return  string  decoded string.
     */
    static public function safe64Decode($string)
    {
        return base64_decode(strtr($string, '.', '/'));
    }

    /**
     * Json encode and addslashe if magic_quotes_gpc is on. 
     * 
     * @param   mixed  $data   the object to encode
     * @static
     * @access  public
     * @return  string  decoded string.
     */
    static public function jsonEncode($data)
    {
        return (version_compare(phpversion(), '5.4', '<') and get_magic_quotes_gpc()) ? addslashes(json_encode($data)) : json_encode($data);
    }

    /**
     *  Compute the diff days of two date.
     * 
     * @param   date  $date1   the first date.
     * @param   date  $date2   the sencode date.
     * @access  public
     * @return  int  the diff of the two days.
     */
    static public function diffDate($date1, $date2)
    {
        return round((strtotime($date1) - strtotime($date2)) / 86400, 0);
    }

    /**
     *  Get now time use the DT_DATETIME1 constant defined in the lang file.
     * 
     * @access  public
     * @return  datetime  now
     */
    static public function now()
    {
        return date(DT_DATETIME1);
    }

    /**
     *  Get today according to the  DT_DATE1 constant defined in the lang file.
     * 
     * @access  public
     * @return  date  today
     */
    static public function today()
    {
        return date(DT_DATE1);
    }

    /**
     *  Judge a date is zero or not.
     * 
     * @access  public
     * @return  bool
     */
    static public function isZeroDate($date)
    {
        return substr($date, 0, 4) == '0000';
    }

    /**
     *  Get files match the pattern under one directory.
     * 
     * @access  public
     * @return  array   the files match the pattern
     */
    static public function ls($dir, $pattern = '')
    {
        $files = array();
        $dir = realpath($dir);
        if(is_dir($dir)) $files = glob($dir . DIRECTORY_SEPARATOR . '*' . $pattern);
        if($files) return $files;
        return array();
    }

    /**
     * Change directory.
     * 
     * @param  string $path 
     * @static
     * @access public
     * @return void
     */
    static function cd($path = '')
    {
        static $cwd = '';
        if($path)
        {
            $cwd = getcwd();
            chdir($path);
        }
        else
        {
            chdir($cwd);
        }
    }

    /**
     * Remove UTF8 Bom 
     * 
     * @param  string    $string
     * @access public
     * @return string
     */
    public static function removeUTF8Bom($string)
    {
        if(substr($string, 0, 3) == pack('CCC', 239, 187, 191)) return substr($string, 3); 
        return $string;
    }

    /**
     * Get siteCode from domain.
     * @param  string $domain
     * @return string $siteCode
     **/ 
    public static function getSiteCode($domain)
    {
        global $config;

        $domain = str_replace('-', '_', $domain);    // Replace '-' by '_'.
        if(strpos($domain, ':') !== false) $domain = substr($domain, 0, strpos($domain, ':'));    // Remove port from domain.

        $items = explode('.', $domain);
        $postfix = str_replace($items[0] . '.', '', $domain);
        if(strpos($config->domainPostfix, "|$postfix|") !== false) return $items[0];
        
        $postfix = str_replace($items[0] . '.' . $items[1] . '.', '', $domain);
        if(strpos($config->domainPostfix, "|$postfix|") !== false) return $items[1];

        return $siteCode = $domain;
    }
    
    /**
     * Enhanced substr version: support multibyte languages like Chinese.
     *
     * @param string $string
     * @param int $length 
     * @param string $append 
     * @return string 
     **/
    public static function substr($string, $length, $append = '')
    {
        if (strlen($string) <= $length ) $append = '';
        if(function_exists('mb_substr')) return mb_substr($string, 0, $length, 'utf-8') . $append;

        preg_match_all("/./su", $string, $data);
        return join("", array_slice($data[0],  0, $length)) . $append;
    }

    /**
     * Check in seo mode or not.
     *
     * return bool
     */
     public static function inSeoMode()
     {
        global $config;
        return $config->requestType == 'PATH_INFO' and $config->seoMode;
     }

    /**
     * Check is ajax request 
     * 
     * @access public
     * @return void
     */
    public static function isAjaxRequest()
    {
        return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest';
    }
}

/**
 *  The short alias of helper::createLink() method. 
 *
 * @param  string        $methodName  the method name
 * @param  string|array  $vars        the params passed to the method, can be array('key' => 'value') or key1=value1&key2=value2)
 * @param  string|array  $alias       the params passed to the method, can be array('key' => 'value') or key1=value1&key2=value2)
 * @param  string        $viewType    
 * @return string the link string.
 */
function inLink($methodName = 'index', $vars = '', $alias = '', $viewType = '')
{
    global $app;
    return helper::createLink($app->getModuleName(), $methodName, $vars, $alias, $viewType);
}

/**
 *  Static cycle a array 
 *
 * @param array  $items     the array to be cycled.
 * @return mixed
 */
function cycle($items)
{
    static $i = 0;
    if(!is_array($items)) $items = explode(',', $items);
    if(!isset($items[$i])) $i = 0;
    return $items[$i++];
}

/**
 * Get current microtime.
 * 
 * @access protected
 * @return float current time.
 */
function getTime()
{
    list($usec, $sec) = explode(" ", microtime());
    return ((float)$usec + (float)$sec);
}

/**
 * dump a var.
 * 
 * @param mixed $var 
 * @access public
 * @return void
 */
function a($var)
{
    echo "<xmp class='a-left'>";
    print_r($var);
    echo "</xmp>";
}

/**
 * Judge the server ip is local or not.
 * 
 * @access public
 * @return void
 */
function isLocalIP()
{
    $serverIP = $_SERVER['SERVER_ADDR'];
    if($serverIP == '127.0.0.1') return true;
    return !filter_var($serverIP, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE);
}

/**
 * Key for chanzhi.
 * 
 * @access public
 * @return string
 */
function k()
{
    global $config, $lang;

    $siteCode = $config->site->code;
    $codeLen  = strlen($siteCode);
    $keywords = explode(';', $lang->k);
    $count    = count($keywords);

    $sum = 0;
    for($i = 0; $i < $codeLen; $i++) $sum += ord($siteCode{$i});

    $key = $sum % $count;
    return $keywords[$key];
}

/**
 * Get web root. 
 * 
 * @param  bool     $full 
 * @access public
 * @return string
 */
function getWebRoot($full = false)
{
    $path = $_SERVER['SCRIPT_NAME'];
    if(RUN_MODE == 'shell')
    {
        $url  = parse_url($_SERVER['argv'][1]);
        $path = empty($url['path']) ? '/' : rtrim($url['path'], '/');
        $path = empty($path) ? '/' : $path;
    }
    if($full)
    {
        $http = (isset($_SERVER['HTTPS']) and strtolower($_SERVER['HTTPS']) != 'off') ? 'https://' : 'http://';
        return $http . $_SERVER['HTTP_HOST'] . substr($path, 0, (strrpos($path, '/') + 1));
    }
    return substr($path, 0, (strrpos($path, '/') + 1));
}

/**
 * Check admin entry. 
 * 
 * @access public
 * @return string
 */
function checkAdminEntry()
{
    if(strpos($_SERVER['PHP_SELF'], '/admin.php') === false) return true; 

    $path  = dirname($_SERVER['SCRIPT_FILENAME']);
    $files = scandir($path);
    $defaultFiles = array('admin.php', 'index.php', 'install.php', 'loader.php', 'upgrade.php');
    foreach($files as $file)
    {
        if(strpos($file, '.php') !== false and !in_array($file, $defaultFiles))
        {
            $contents = file_get_contents($path . '/' . $file);
            if(strpos($contents, "'RUN_MODE', 'admin'") && strpos($_SERVER['PHP_SELF'], '/admin.php') !== false) die(header('location: index.php'));
        }
    }
}

/**
 * Format time.
 * 
 * @param  int    $time 
 * @param  string $format 
 * @access public
 * @return void
 */
function formatTime($time, $format = '')
{
    $time = str_replace('0000-00-00', '', $time);
    $time = str_replace('00:00:00', '', $time);
    if($format) return date($format, strtotime($time));
    return trim($time);
}
