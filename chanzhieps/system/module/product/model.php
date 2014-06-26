<?php
/**
 * The model file of product module of chanzhiEPS.
 *
 * @copyright   Copyright 2013-2013 青岛息壤网络信息有限公司 (QingDao XiRang Network Infomation Co,LTD www.xirangit.com)
 * @license     http://api.chanzhi.org/goto.php?item=license
 * @author      Xiying Guan <guanxiying@xirangit.com>
 * @package     product
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
class productModel extends model
{
    /** 
     * Get an product by id.
     * 
     * @param  int      $productID 
     * @param  bool     $replaceTag 
     * @access public
     * @return bool|object
     */
    public function getByID($productID, $replaceTag = true)
    {   
        /* Get product self. */
        $product = $this->dao->select('*')->from(TABLE_PRODUCT)->where('id')->eq($productID)->fetch();
        if(!$product) return false;

        /* Add link to content if necessary. */
        if($replaceTag) $product->content = $this->loadModel('tag')->addLink($product->content);

        /* Get it's categories. */
        $product->categories = $this->dao->select('t1.*')
            ->from(TABLE_CATEGORY)->alias('t1')
            ->leftJoin(TABLE_RELATION)->alias('t2')->on('t2.category = t1.id')
            ->where('t2.type')->eq('product')
            ->andWhere('t2.id')->eq($productID)
            ->fetchAll('id');

        /* Get product path to highlight main nav. */
        $path = '';
        foreach($product->categories as $category) $path .= $category->path;
        $product->path = explode(',', trim($path, ','));

        /* Get product attributes. */
        $product->attributes = $this->getAttributesByID($productID);

        /* Get it's files. */
        $product->files = $this->loadModel('file')->getByObject('product', $productID);

        $product->images = $this->file->getByObject('product', $productID, $isImage = true );

        $product->image = new stdclass();
        $product->image->list    = $product->images;
        $product->image->primary = !empty($product->image->list) ? $product->image->list[0] : '';
         
        return $product;
    }   

    /**
     * Get attributes by product id. 
     * 
     * @param  int    $productID 
     * @access public
     * @return void
     */
    public function getAttributesByID($productID)
    {
        return $this->dao->select('*')->from(TABLE_PRODUCT_CUSTOM)
            ->where('product')->eq($productID)
            ->orderBy('`order`')
            ->fetchAll('order');
    }

    /** 
     * Get product list.
     * 
     * @param  array   $categories 
     * @param  string  $orderBy 
     * @param  object  $pager 
     * @access public
     * @return array
     */
    public function getList($categories, $orderBy, $pager = null)
    {
        /* Get products(use groupBy to distinct products).  */
        $products = $this->dao->select('t1.*, t2.category')->from(TABLE_PRODUCT)->alias('t1')
            ->leftJoin(TABLE_RELATION)->alias('t2')->on('t1.id = t2.id')
            ->where('1 = 1')
            ->beginIF($categories)->andWhere('t2.category')->in($categories)->fi()
            ->beginIF(RUN_MODE == 'front')->andWhere('t1.status')->eq('normal')->fi()
            ->groupBy('t2.id')
            ->orderBy($orderBy)
            ->page($pager)
            ->fetchAll('id');
        if(!$products) return array();

        /* Get categories for these products. */
        $categories = $this->dao->select('t2.id, t2.name, t2.alias, t1.id AS product')
            ->from(TABLE_RELATION)->alias('t1')
            ->leftJoin(TABLE_CATEGORY)->alias('t2')->on('t1.category = t2.id')
            ->where('t2.type')->eq('product')
            ->beginIF($categories)->andWhere('t1.category')->in($categories)->fi()
            ->fetchGroup('product', 'id');

        /* Assign categories to it's product. */
        foreach($products as $product) $product->categories = !empty($categories[$product->id]) ? $categories[$product->id] : array();

        /* Get images for these products. */
        $images = $this->loadModel('file')->getByObject('product', array_keys($products), $isImage = true);

        /* Assign images to it's product. */
        foreach($products as $product)
        {
            if(empty($images[$product->id])) continue;
            $product->image = new stdclass();
            if(isset($images[$product->id]))  $product->image->list = $images[$product->id];
            if(!empty($product->image->list)) $product->image->primary = $product->image->list[0];
        }
        
        /* Assign summary to it's product. */
        foreach($products as $product) $product->summary = empty($product->summary) ? helper::substr(strip_tags($product->content), 250) : $product->summary;

        return $products;
    }

    /**
     * Get product pairs.
     * 
     * @param string $categories 
     * @param string $orderBy 
     * @param object $pager 
     * @access public
     * @return array
     */
    public function getPairs($categories, $orderBy, $pager = null)
    {
        return $this->dao->select('t1.id, t1.name, t1.alias')->from(TABLE_PRODUCT)->alias('t1')
            ->leftJoin(TABLE_RELATION)->alias('t2')
            ->on('t1.id = t2.id')
            ->beginIF($categories)->where('t2.category')->in($categories)->fi()
            ->orderBy($orderBy)
            ->page($pager, false)
            ->fetchAll('id');
    }

    /**
     * Get product pair.
     * 
     * @param string $categories 
     * @access public
     * @return array
     */
    public function getPair($categories)
    {
        return $this->dao->select('t1.id, name')->from(TABLE_PRODUCT)->alias('t1')
            ->leftJoin(TABLE_RELATION)->alias('t2')
            ->on('t1.id = t2.id')
            ->beginIF($categories)->where('t2.category')->in($categories)->fi()
            ->orderBy('id_desc')
            ->fetchPairs('id', 'name');
    }

    /**
     * get latest products. 
     *
     * @param array      $categories
     * @param int        $count
     * @access public
     * @return array
     */
    public function getLatest($categories, $count)
    {
        $family = array();
        $this->loadModel('tree');

        if(!is_array($categories)) $categories = explode(',', $categories);
        foreach($categories as $category) $family = array_merge($family, $this->tree->getFamily($category));

        $this->app->loadClass('pager', true);
        $pager = new pager($recTotal = 0, $recPerPage = $count, 1);
        return $this->getList($family, 'id_desc', $pager);
    }

    /**
     * get hot products. 
     *
     * @param array      $categories
     * @param int        $count
     * @access public
     * @return array
     */
    public function getHot($categories, $count)
    {
        $family = array();
        $this->loadModel('tree');

        if(!is_array($categories)) $categories = explode(',', $categories);
        foreach($categories as $category) $family = array_merge($family, $this->tree->getFamily($category));

        $this->app->loadClass('pager', true);
        $pager = new pager($recTotal = 0, $recPerPage = $count, 1);
        return $this->getList($family, 'views_desc', $pager);
    }

    /**
     * Get the prev and next product.
     * 
     * @param  int    $current  the current product id.
     * @param  int    $category the category id.
     * @access public
     * @return array
     */
    public function getPrevAndNext($current, $category)
    {
       $prev = $this->dao->select('t1.id, name, alias')->from(TABLE_PRODUCT)->alias('t1')
           ->leftJoin(TABLE_RELATION)->alias('t2')->on('t1.id = t2.id')
           ->where('t2.category')->eq($category)
            ->beginIF(RUN_MODE == 'front')->andWhere('t1.status')->eq('normal')->fi()
           ->andWhere('t2.id')->lt($current)
           ->orderBy('t2.id_desc')
           ->limit(1)
           ->fetch();

       $next = $this->dao->select('t1.id, name, alias')->from(TABLE_PRODUCT)->alias('t1')
           ->leftJoin(TABLE_RELATION)->alias('t2')->on('t1.id = t2.id')
           ->where('t2.category')->eq($category)
            ->beginIF(RUN_MODE == 'front')->andWhere('t1.status')->eq('normal')->fi()
           ->andWhere('t2.id')->gt($current)
           ->orderBy('t2.id')
           ->limit(1)
           ->fetch();

        return array('prev' => $prev, 'next' => $next);
    }

    /**
     * Create a product.
     * 
     * @access public
     * @return int|bool
     */
    public function create()
    {
        $now = helper::now();
        $product = fixer::input('post')
            ->join('categories', ',')
            ->stripTags('content', $this->config->allowedTags->admin)
            ->setDefault('price', 0)
            ->setDefault('amount', 0)
            ->setDefault('promotion', 0)
            ->add('author', $this->app->user->account)
            ->add('addedDate', $now)
            ->add('editedDate', $now)
            ->get();

        $product->alias    = seo::unify($product->alias, '-');
        $product->keywords = seo::unify($product->keywords, ',');

        $this->dao->insert(TABLE_PRODUCT)
            ->data($product, $skip = 'categories,uid,label,value')
            ->autoCheck()
            ->batchCheck($this->config->product->require->create, 'notempty')
            ->checkIF($product->mall, 'mall', 'URL')
            ->exec();
        $productID = $this->dao->lastInsertID();

        if(!$this->saveAttributes($productID)) return false;

        $this->loadModel('file')->updateObjectID($this->post->uid, $productID, 'product');
        $this->file->copyFromContent($this->post->content, $productID, 'product');

        if(dao::isError()) return false;

        $this->loadModel('tag')->save($product->keywords);
        $this->processCategories($productID, $this->post->categories);
        return $productID;
    }

    /**
     * Update a product.
     * 
     * @param  int $productID 
     * @access public
     * @return void
     */
    public function update($productID)
    {
        $product = fixer::input('post')
            ->join('categories', ',')
            ->stripTags('content', $this->config->allowedTags->admin)
            ->setDefault('price', 0)
            ->setDefault('amount', 0)
            ->setDefault('promotion', 0)
            ->add('editor', $this->app->user->account)
            ->add('editedDate', helper::now())
            ->get();

        $product->alias    = seo::unify($product->alias, '-');
        $product->keywords = seo::unify($product->keywords, ',');

        $this->dao->update(TABLE_PRODUCT)
            ->data($product, $skip = 'categories,uid,label,value')
            ->autoCheck()
            ->batchCheck($this->config->product->require->edit, 'notempty')
            ->checkIF($product->mall, 'mall', 'URL')
            ->where('id')->eq($productID)
            ->exec();

        if(!$this->saveAttributes($productID)) return false;

        $this->loadModel('file')->updateObjectID($this->post->uid, $productID, 'product');
        $this->file->copyFromContent($this->post->content, $productID, 'product');

        if(dao::isError()) return false;

        $this->loadModel('tag')->save($product->keywords);
        $this->processCategories($productID, $this->post->categories);

        return !dao::isError();
    }

    /**
     * Save one product's attributes.
     * 
     * @param  int    $productID 
     * @access public
     * @return void
     */
    public function saveAttributes($productID)
    {
        $lables = $this->post->label;
        $values = $this->post->value;

        $data = new stdclass();
        $data->product = $productID;

        $this->dao->delete()->from(TABLE_PRODUCT_CUSTOM)->where('product')->eq($productID)->exec();

        foreach($lables as $key => $label)
        {
            $data->label = $label;
            $data->order = $key;
            $data->value = isset($values[$key]) ? $values[$key] : '';
            $this->dao->replace(TABLE_PRODUCT_CUSTOM)->data($data)->exec();
        }
        return !dao::isError();
    }
        
    /**
     * Delete a product.
     * 
     * @param  int      $productID 
     * @access public
     * @return void
     */
    public function delete($productID, $null = null)
    {
        $product = $this->getByID($productID);
        if(!$product) return false;

        $this->dao->delete()->from(TABLE_RELATION)->where('id')->eq($productID)->andWhere('type')->eq('product')->exec();
        $this->dao->delete()->from(TABLE_PRODUCT)->where('id')->eq($productID)->exec();
        $this->dao->delete()->from(TABLE_PRODUCT_CUSTOM)->where('product')->eq($productID)->exec();

        return !dao::isError();
    }

    /**
     * Process categories for a product.
     * 
     * @param  int    $productID 
     * @param  array  $categories 
     * @access public
     * @return void
     */
    public function processCategories($productID, $categories = array())
    {
       if(!$productID) return false;
       $type = 'product'; 

       /* First delete all the records of current product from the releation table.  */
       $this->dao->delete()->from(TABLE_RELATION)
           ->where('type')->eq($type)
           ->andWhere('id')->eq($productID)
           ->autoCheck()
           ->exec();

       /* Then insert the new data. */
       foreach($categories as $category)
       {
           if(!$category) continue;

           $data = new stdclass();
           $data->type     = $type; 
           $data->id       = $productID;
           $data->category = $category;

           $this->dao->insert(TABLE_RELATION)->data($data)->exec();
       }
    }
}
