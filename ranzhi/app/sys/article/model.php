<?php
/**
 * The model file of article module of RanZhi.
 *
 * @copyright   Copyright 2013-2014 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     LGPL
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     article
 * @version     $Id: model.php 9830 2014-06-09 05:43:03Z guanxiying $
 * @link        http://www.ranzhi.org
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
     * Get article list.
     * 
     * @param  string    $type 
     * @param  array     $categories 
     * @param  string    $mode 
     * @param  string    $param 
     * @param  string    $orderBy 
     * @param  object    $pager 
     * @access public
     * @return array
     */
    public function getList($type, $categories, $mode = null, $param = null, $orderBy, $pager = null)
    {
        /* Get articles(use groupBy to distinct articles).  */
        $articles = $this->dao->select('t1.*, t2.category')->from(TABLE_ARTICLE)->alias('t1')
            ->leftJoin(TABLE_RELATION)->alias('t2')->on('t1.id = t2.id')
            ->where('t1.type')->eq($type)
            ->beginIf($categories)->andWhere('t2.category')->in($categories)->fi()
            ->beginIf($mode == 'query' and $param)->andWhere($param)->fi()
            ->groupBy('t2.id')
            ->orderBy($orderBy)
            ->page($pager)
            ->fetchAll('id');
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

        return $articles;
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
            ->andWhere('t1.createdDate')->le(helper::now())
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
     * @param array      $categories
     * @param int        $count
     * @access public
     * @return array
     */
    public function getHot($categories, $count, $type = 'article')
    {
        $this->app->loadClass('pager', $static = true);
        $pager = new pager($recTotal = 0, $recPerPage = $count, $pageID = 1);
        return $this->getList($type, $categories, 'views_desc', $pager);
    }

    /**
     * get latest articles. 
     *
     * @param array      $categories
     * @param int        $count
     * @access public
     * @return array
     */
    public function getLatest($categories, $count, $type = 'article')
    {
        $this->app->loadClass('pager', $static = true);
        $pager = new pager($recTotal = 0, $recPerPage = $count, $pageID = 1);
        return $this->getList($type, $categories, 'id_desc', $pager);
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
       $prev = $this->dao->select('t1.id, title')->from(TABLE_ARTICLE)->alias('t1')
           ->leftJoin(TABLE_RELATION)->alias('t2')->on('t1.id = t2.id')
           ->where('t2.category')->eq($category)
           ->andWhere('t1.status')->eq('normal')
           ->andWhere('t2.id')->lt($current)
           ->orderBy('t2.id_desc')
           ->limit(1)
           ->fetch();

       $next = $this->dao->select('t1.id, title')->from(TABLE_ARTICLE)->alias('t1')
           ->leftJoin(TABLE_RELATION)->alias('t2')->on('t1.id = t2.id')
           ->where('t2.category')->eq($category)
           ->andWhere('t1.createdDate')->le(helper::now())
           ->andWhere('t1.status')->eq('normal')
           ->andWhere('t2.id')->gt($current)
           ->orderBy('t2.id')
           ->limit(1)
           ->fetch();

        return array('prev' => $prev, 'next' => $next);
    }

    /**
     * Get author List 
     * 
     * @param  string $type 
     * @access public
     * @return array
     */
    public function getAuthorList($type = 'article')
    {
        return $this->dao->select('u.*')
            ->from(TABLE_ARTICLE)->alias('a')
            ->leftJoin(TABLE_USER)->alias('u')->on("a.author=u.account")
            ->where('a.type')->eq($type)->fetchAll('account');
    }

    /**
     * Get month List.
     * 
     * @param  string $type 
     * @access public
     * @return array
     */
    public function getMonthList($type = 'article')
    {
        return $this->dao->select('left(createdDate, 7) as month')
            ->from(TABLE_ARTICLE)
            ->where('type')->eq($type)->fetchAll('month');
    }

    /**
     * Get tag List.
     * 
     * @param  string $type 
     * @access public
     * @return array
     */
    public function getTagList($type = 'article')
    {
        $articles = $this->dao->select('id,keywords')->from(TABLE_ARTICLE)->where('type')->eq($type)->fetchAll('id');
        $tags =array();
        foreach($articles as $article) $tags = array_merge($tags, explode(',', $article->keywords));
        return $tags;
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
            ->setDefault('createdDate', $now)
            ->add('editedDate', $now)
            ->add('author', $this->app->user->account)
            ->add('type', $type)
            ->add('order', 0)
            ->add('keywords', helper::unify($this->post->keywords, ','))
            ->stripTags('content', $this->config->allowedTags->admin)
            ->get();

        $this->dao->insert(TABLE_ARTICLE)
            ->data($article, $skip = 'categories,uid')
            ->autoCheck()
            ->batchCheck($this->config->article->require->create, 'notempty')
            ->exec();

        $articleID = $this->dao->lastInsertID();

        $this->loadModel('file')->updateObjectID($this->post->uid, $articleID, $type);

        if(dao::isError()) return false;

        $this->loadModel('tag')->save($article->keywords);

        $this->processCategories($articleID, $type, $this->post->categories);
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
            ->add('keywords', helper::unify($this->post->keywords, ','))
            ->add('editedDate', helper::now())
            ->get();

        $this->dao->update(TABLE_ARTICLE)
            ->data($article, $skip = 'categories,uid')
            ->autoCheck()
            ->batchCheck($this->config->article->require->edit, 'notempty')
            ->where('id')->eq($articleID)
            ->exec();

        $this->loadModel('file')->updateObjectID($this->post->uid, $articleID, $type);

        if(dao::isError()) return false;

        $this->loadModel('tag')->save($article->keywords);
        $this->processCategories($articleID, $type, $this->post->categories);

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
     * Print files.
     * 
     * @param  object $files 
     * @access public
     * @return void
     */
    public function printFiles($files)
    {
        if(empty($files)) return false;

        $imagesHtml = '';
        $filesHtml  = '';
        foreach($files as $file)
        {
            $file->title = $file->title . ".$file->extension";
            if($file->isImage)
            {
                $imagesHtml .= "<li class='file-image file-{$file->extension}'>" . html::a(helper::createLink('file', 'download', "fileID=$file->id&mose=left"), html::image($file->fullURL), "target='_blank' data-toggle='lightbox'") . '</li>';
            }
            else
            {
                $filesHtml .= "<li class='file file-{$file->extension}'>" . html::a(helper::createLink('file', 'download', "fileID=$file->id&mouse=left"), $file->title, "target='_blank'") . '</li>';
            }
        }
        echo "<ul class='article-files clearfix'>" . $imagesHtml . $filesHtml . '</ul>';
    }
}
