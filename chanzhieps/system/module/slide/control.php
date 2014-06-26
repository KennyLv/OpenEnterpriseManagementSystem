<?php
/**
 * The control file of slide module of chanzhiEPS.
 *
 * @copyright   Copyright 2013-2013 青岛息壤网络信息有限公司 (QingDao XiRang Network Infomation Co,LTD www.xirangit.com)
 * @license     http://api.chanzhi.org/goto.php?item=license
 * @author      Xiying Guan <guanxiying@xirangit.com>
 * @package     slide
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
class slide extends control
{
    /**
     * Browse slides in admin.
     * 
     * @access public
     * @return void
     */
    public function admin()
    {
        $this->view->title  = $this->lang->slide->admin;
        $this->view->slides = $this->slide->getList();
        $this->display();
    }

    /**
     * Create a slide.
     *
     * @access public 
     * @return void
     */
    public function create()
    {
        if($_POST)
        {
            if($this->post->backgroundType == 'image')
            {   
                if(empty($_FILES)) $this->send(array('result' => 'fail', 'message' => $this->lang->slide->noImageSelected));

                $image = $this->slide->uploadImage();
                if(!$image) $this->send(array('result' => 'fail', 'message' => $this->lang->fail));
            }
            else
            {
                $image = null;
            }

            if($this->slide->create($image))
            {
                $this->send(array('result' => 'success', 'message' => $this->lang->saveSuccess, 'locate' => $this->inlink('admin')));
            }

            $this->send(array('result' => 'fail', 'message' => dao::getError()));
        }

        $this->display(); 
    }

    /**
     * Edit a slide.
     *
     * @param int $id
     * @access public
     * @return void
     */
    public function edit($id)
    {
        if($_POST)
        {
            if($this->slide->update($id))
            $this->send(array('result' => 'success', 'message' => $this->lang->saveSuccess, 'locate'=>$this->inLink('admin')) );
            $this->send(array('result' => 'fail', 'message' => dao::getError()));
        }

        $this->view->id    = $id;
        $this->view->slide = $this->slide->getByID($id);
        $this->display();
    }

    /**
     * Delete a slide.
     *
     * @param int $id
     * @retturn void
     */
    public function delete($id)
    {
        if($this->slide->delete($id)) $this->send(array('result' => 'success'));
        $this->send(array('result' => 'fail', 'message' => dao::getError()));
    }

    /**
     * Sort slides.
     *
     * @access public
     * @return void
     */
    public function sort()
    {
        if($this->slide->sort()) $this->send(array('result' => 'success', 'message' => $this->lang->slide->successSort));
        $this->send(array('result' => 'fail', 'message' => dao::getError()));
    }
}
