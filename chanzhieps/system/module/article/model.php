<?php
/**
 * The model file of article module of chanzhiEPS.
 *
 * @copyright   Copyright 2013-2013 青岛息壤网络信息有限公司 (QingDao XiRang Network Infomation Co,LTD www.xirangit.com)
 * @license     http://api.chanzhi.org/goto.php?item=license
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     article
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
class articleModel extends model
{
    /** 
     * Get an article by id.
     * 
     * @param  int      $articleID 
     * @param  bool     $replaceTag 
     * @access public
     * @return bool|object
     */
    public function getByID($articleID, $replaceTag = true)
    {   
        /* Get article self. */
        $article = $this->dao->select('*')->from(TABLE_ARTICLE)->where('alias')->eq($articleID)->fetch();
        if(!$article) $article = $this->dao->select('*')->from(TABLE_ARTICLE)->where('id')->eq($articleID)->fetch();

        if(!$article) return false;
        
        /* Add link to content if necessary. */
        if($replaceTag) $article->content = $this->loadModel('tag')->addLink($article->content);

        /* Get it's categories. */
        $article->categories = $this->dao->select('t2.*')
            ->from(TABLE_RELATION)->alias('t1')
            ->leftJoin(TABLE_CATEGORY)->alias('t2')->on('t1.category = t2.id')
            ->where('t1.type')->eq($article->type)
            ->andWhere('t1.id')->eq($articleID)
            ->fetchAll('id');

        /* Get article path to highlight main nav. */
        $path = '';
        foreach($article->categories as $category) $path .= $category->path;
        $article->path = explode(',', trim($path, ','));

        /* Get it's files. */
        $article->files = $this->loadModel('file')->getByObject($article->type, $articleID);

        return $article;
    }   

    /**
     * Get page by ID.
     * 
     * @param  int    $pageID 
     * @access public
     * @return void
     */
    public function getPageByID($pageID)
    {
        /* Get article self. */
        $page = $this->dao->select('*')->from(TABLE_ARTICLE)->where('alias')->eq($pageID)->andWhere('type')->eq('page')->fetch();
        if(!$page) $page = $this->dao->select('*')->from(TABLE_ARTICLE)->where('id')->eq($pageID)->fetch();

        if(!$page) return false;
        
        /* Add link to content if necessary. */
        $page->content = $this->loadModel('tag')->addLink($page->content);
        
        /* Get it's files. */
        $page->files = $this->loadModel('file')->getByObject('page', $page->id);

        return $page;
    }

    /** 
     * Get article list.
     * 
     * @param  array   $categories 
     * @param  string  $orderBy 
     * @param  object  $pager 
     * @access public
     * @return array
     */
    public function getList($type, $categories, $orderBy, $pager = null)
    {
        if($type == 'page')
        {
            $articles = $this->dao->select('*')->from(TABLE_ARTICLE)
                ->where('type')->eq('page')
                ->orderBy('id_desc')
                ->page($pager)
                ->fetchAll('id');
        }
        else
        {
            /* Get articles(use groupBy to distinct articles).  */
            $articles = $this->dao->select('t1.*, t2.category')->from(TABLE_ARTICLE)->alias('t1')
                ->leftJoin(TABLE_RELATION)->alias('t2')->on('t1.id = t2.id')
                ->where('t1.type')->eq($type)
                ->beginIf(defined('RUN_MODE') and RUN_MODE == 'front')
                ->andWhere('t1.addedDate')->le(helper::now())
                ->andWhere('t1.status')->eq('normal')
                ->fi()
                ->beginIf($categories)->andWhere('t2.category')->in($categories)->fi()
                ->groupBy('t2.id')
                ->orderBy($orderBy)
                ->page($pager)
                ->fetchAll('id');
        }
        if(!$articles) return array();

        /* Get categories for these articles. */
        $categories = $this->dao->select('t2.id, t2.name, t2.alias, t1.id AS article')
            ->from(TABLE_RELATION)->alias('t1')
            ->leftJoin(TABLE_CATEGORY)->alias('t2')->on('t1.category = t2.id')
            ->where('t2.type')->eq($type)
            ->beginIf($categories)->andWhere('t1.category')->in($categories)->fi()
            ->fetchGroup('article', 'id');

        /* Assign categories to it's article. */
        foreach($articles as $article) $article->categories = isset($categories[$article->id]) ? $categories[$article->id] : array();

        /* Get images for these articles. */
        $images = $this->loadModel('file')->getByObject($type, array_keys($articles), $isImage = true);

        /* Assign images to it's article. */
        foreach($articles as $article)
        {
            if(empty($images[$article->id])) continue;

            $article->image = new stdclass();
            $article->image->list    = $images[$article->id];
            $article->image->primary = $article->image->list[0];
        }

        /* Assign summary to it's article. */
        foreach($articles as $article) $article->summary = empty($article->summary) ? helper::substr(strip_tags($article->content), 200, '...') : $article->summary;

        /* Assign comments to it's article. */
        $articleIdList = array_keys($articles);
        $comments = $this->dao->select("objectID, count(*) as count")->from(TABLE_MESSAGE)
            ->where('type')->eq('comment')
            ->andWhere('objectType')->eq('article')
            ->andWhere('objectID')->in($articleIdList)
            ->groupBy('objectID')
            ->fetchPairs('objectID', 'count');
        foreach($articles as $article) $article->comments = isset($comments[$article->id]) ? $comments[$article->id] : 0;
 
        return $articles;
    }

    /**
     * Get page pairs.
     * 
     * @param string $pager 
     * @access public
     * @return array
     */
    public function getPagePairs($pager = null)
    {
        return $this->dao->select('id, title')->from(TABLE_ARTICLE)
            ->where('type')->eq('page')
            ->andWhere('addedDate')->le(helper::now())
            ->andWhere('status')->eq('normal')
            ->orderBy('id_desc')
            ->page($pager, false)
            ->fetchPairs();
    }

    /**
     * Get article pairs.
     * 
     * @param string $modules 
     * @param string $orderBy 
     * @param string $pager 
     * @access public
     * @return array
     */
    public function getPairs($categories, $orderBy, $pager = null)
    {
        return $this->dao->select('t1.id, t1.title, t1.alias')->from(TABLE_ARTICLE)->alias('t1')
            ->leftJoin(TABLE_RELATION)->alias('t2')->on('t1.id = t2.id')
            ->where('1=1')
            ->beginIf(defined('RUN_MODE') and RUN_MODE == 'front')
            ->andWhere('t1.addedDate')->le(helper::now())
            ->andWhere('t1.status')->eq('normal')
            ->fi()
            ->beginIF($categories)->andWhere('t2.category')->in($categories)->fi()
            ->orderBy($orderBy)
            ->page($pager, false)
            ->fetchAll('id');
    }

    /**
     * get hot articles. 
     *
     * @param string|array    $categories
     * @param int             $count
     * @param string          $type
     * @access public
     * @return array
     */
    public function getHot($categories, $count, $type = 'article')
    {
        $family = array();
        $this->loadModel('tree');

        if(!is_array($categories)) $categories = explode(',', $categories);
        foreach($categories as $category) $family = array_merge($family, $this->tree->getFamily($category));

        $this->app->loadClass('pager', true);
        $pager = new pager($recTotal = 0, $recPerPage = $count, 1);
        return $this->getList($type, $family, 'views_desc', $pager);
    }

    /**
     * get latest articles. 
     *
     * @param string|array     $categories
     * @param int              $count
     * @param string           $type
     * @access public
     * @return array
     */
    public function getLatest($categories, $count, $type = 'article')
    {
        $family = array();
        $this->loadModel('tree');

        if(!is_array($categories)) $categories = explode(',', $categories);
        foreach($categories as $category) $family = array_merge($family, $this->tree->getFamily($category));

        $this->app->loadClass('pager', true);
        $pager = new pager($recTotal = 0, $recPerPage = $count, 1);
        return $this->getList($type, $family, 'id_desc', $pager);
    }

    /**
     * Get the prev and next ariticle.
     * 
     * @param  int    $current  the current article id.
     * @param  int    $category the category id.
     * @access public
     * @return array
     */
    public function getPrevAndNext($current, $category)
    {
        $current = $this->getByID($current);
        $prev = $this->dao->select('t1.id, title, alias')->from(TABLE_ARTICLE)->alias('t1')
           ->leftJoin(TABLE_RELATION)->alias('t2')->on('t1.id = t2.id')
           ->where('t2.category')->eq($category)
           ->andWhere('t1.status')->eq('normal')
           ->andWhere('t1.addedDate')->lt($current->addedDate)
           ->orderBy('t1.addedDate_desc')
           ->limit(1)
           ->fetch();

       $next = $this->dao->select('t1.id, title, alias')->from(TABLE_ARTICLE)->alias('t1')
           ->leftJoin(TABLE_RELATION)->alias('t2')->on('t1.id = t2.id')
           ->where('t2.category')->eq($category)
           ->andWhere('t1.addedDate')->le(helper::now())
           ->andWhere('t1.status')->eq('normal')
           ->andWhere('t1.addedDate')->gt($current->addedDate)
           ->orderBy('t1.addedDate')
           ->limit(1)
           ->fetch();

        return array('prev' => $prev, 'next' => $next);
    }

    /**
     * Create an article.
     * 
     * @param  string $type 
     * @access public
     * @return int|bool
     */
    public function create($type)
    {
        $now = helper::now();
        $article = fixer::input('post')
            ->join('categories', ',')
            ->setDefault('addedDate', $now)
            ->add('editedDate', $now)
            ->add('type', $type)
            ->add('order', 0)
            ->stripTags('content', $this->config->allowedTags->admin)
            ->get();

        $article->keywords = seo::unify($article->keywords, ',');
        $article->alias    = seo::unify($article->alias, '-');

        $this->dao->insert(TABLE_ARTICLE)
            ->data($article, $skip = 'categories,uid')
            ->autoCheck()
            ->batchCheckIF($type != 'page', $this->config->article->require->create, 'notempty')
            ->batchCheckIF($type == 'page', $this->config->article->require->page, 'notempty')
            ->checkIF(($type == 'page') and $this->post->alias, 'alias', 'unique', "type='page'")
            ->exec();
        $articleID = $this->dao->lastInsertID();

        $this->loadModel('file')->updateObjectID($this->post->uid, $articleID, $type);
        $this->file->copyFromContent($this->post->content, $articleID, $type);

        if(dao::isError()) return false;

        /* Save article keywords. */
        $this->loadModel('tag')->save($article->keywords);

        if($type != 'page') $this->processCategories($articleID, $type, $this->post->categories);
        return $articleID;
    }

    /**
     * Update an article.
     * 
     * @param string   $articleID 
     * @access public
     * @return void
     */
    public function update($articleID, $type = 'article')
    {
        $article  = $this->getByID($articleID);
        $category = array_keys($article->categories);

        $article = fixer::input('post')
            ->stripTags('content', $this->config->allowedTags->admin)
            ->join('categories', ',')
            ->add('editor', $this->app->user->account)
            ->add('editedDate', helper::now())
            ->get();

        $article->keywords = seo::unify($article->keywords, ',');
        $article->alias    = seo::unify($article->alias, '-');
        
        $this->dao->update(TABLE_ARTICLE)
            ->data($article, $skip = 'categories,uid')
            ->autoCheck()
            ->batchCheckIF($type != 'page', $this->config->article->require->edit, 'notempty')
            ->batchCheckIF($type == 'page', $this->config->article->require->page, 'notempty')
            ->checkIF(($type == 'page') and $this->post->alias, 'alias', 'unique', "type='page'")
            ->where('id')->eq($articleID)
            ->exec();

        $this->loadModel('file')->updateObjectID($this->post->uid, $articleID, $type);
        $this->file->copyFromContent($this->post->content, $articleID, $type);

        if(dao::isError()) return false;

        $this->loadModel('tag')->save($article->keywords);
        if($type != 'page') $this->processCategories($articleID, $type, $this->post->categories);

        return !dao::isError();
    }
        
    /**
     * Delete an article.
     * 
     * @param  int      $articleID 
     * @access public
     * @return void
     */
    public function delete($articleID, $null = null)
    {
        $article = $this->getByID($articleID);
        if(!$article) return false;

        $this->dao->delete()->from(TABLE_RELATION)->where('id')->eq($articleID)->andWhere('type')->eq($article->type)->exec();
        $this->dao->delete()->from(TABLE_ARTICLE)->where('id')->eq($articleID)->exec();

        return !dao::isError();
    }

    /**
     * Process categories for an article.
     * 
     * @param  int    $articleID 
     * @param  string $tree
     * @param  array  $categories 
     * @access public
     * @return void
     */
    public function processCategories($articleID, $type = 'article', $categories = array())
    {
       if(!$articleID) return false;

       /* First delete all the records of current article from the releation table.  */
       $this->dao->delete()->from(TABLE_RELATION)
           ->where('type')->eq($type)
           ->andWhere('id')->eq($articleID)
           ->autoCheck()
           ->exec();

       /* Then insert the new data. */
       foreach($categories as $category)
       {
           if(!$category) continue;

           $data = new stdclass();
           $data->type     = $type; 
           $data->id       = $articleID;
           $data->category = $category;
           $this->dao->insert(TABLE_RELATION)->data($data)->exec();
       }
    }

    /**
     * Create preview link. 
     * 
     * @param  int    $articleID 
     * @access public
     * @return string
     */
    public function createPreviewLink($articleID)
    {
        $article = $this->getByID($articleID);
        $module  = $article->type;
        $param   = "articleID=$articleID";
        if($article->type != 'page')
        {
            $categories    = $article->categories;
            $categoryAlias = current($categories)->alias;
            $alias         = "category=$categoryAlias&name=$article->alias";
        }
        else
        {
            $alias = "name=$article->alias";
        }

        return commonModel::createFrontLink($module, 'view', $param, $alias);
    }
}
