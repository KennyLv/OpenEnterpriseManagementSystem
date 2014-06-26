<?php
/**
 * The control file of reply module of chanzhiEPS.
 *
 * @copyright   Copyright 2013-2013 青岛息壤网络信息有限公司 (QingDao XiRang Network Infomation Co,LTD www.xirangit.com)
 * @license     http://api.chanzhi.org/goto.php?item=license
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     reply
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
class reply extends control
{
    /**
     * Reply a thread.
     * 
     * @param  int      $threadID 
     * @access public
     * @return void
     */
    public function post($threadID)
    {
        if($this->app->user->account == 'guest') die(js::locate($this->createLink('user', 'login')));

        if($_POST)
        {
            /* If no captcha but is garbage, return the error info. */
            if($this->post->captcha === false and $this->loadModel('captcha')->isEvil($_POST['content']))
            {
                $this->send(array('result' => 'fail', 'reason' => 'needChecking', 'captcha' => $this->captcha->create4Reply()));
            }

            $replyID = $this->reply->post($threadID);

            if(dao::isError()) $this->send(array('result' => 'fail', 'message' => dao::getError()));
            $this->send(array('result' => 'success', 'message' => $this->lang->saveSuccess, 'locate' => $this->createLink('thread', 'locate', "threadID=$threadID&replyID=$replyID")));
        }
    }

    /**
     * Manage replies.
     * 
     * @access public
     * @return void
     */
    public function admin($orderBy = 'addedDate_desc', $recTotal = 0, $recPerPage = 20, $pageID = 1)
    {
        $this->app->loadClass('pager', $static = true);
        $pager   = new pager($recTotal, $recPerPage, $pageID);
        $replies = $this->reply->getList($orderBy, $pager);

        $this->lang->reply->menu       = $this->lang->forum->menu;
        $this->lang->menuGroups->reply = 'forum';

        if($this->get->tab == 'feedback')
        {
            $this->lang->reply->menu = $this->lang->feedback->menu;
            $this->lang->menuGroups->reply = 'feedback';
        }

        $this->view->title   = $this->lang->reply->admin;
        $this->view->replies = $replies;
        $this->view->pager   = $pager;
        $this->display(); 
    }

    /**
     * Edit a reply.
     * 
     * @param string $replyID 
     * @access public
     * @return void
     */
    public function edit($replyID)
    {
        if($this->app->user->account == 'guest') die(js::locate($this->createLink('user', 'login')));

        /* Judge current user has priviledge to edit the reply or not. */
        $reply = $this->reply->getByID($replyID);
        if(!$reply) die(js::locate('back'));

        $thread = $this->loadModel('thread')->getByID($reply->thread);
        if(!$this->thread->canManage($thread->board, $reply->author)) die(js::locate('back'));
        
        if($_POST)
        {
            /* If no captcha but is garbage, return the error info. */
            if($this->post->captcha === false and $this->loadModel('captcha')->isEvil($_POST['content']))
            {
                $this->send(array('result' => 'fail', 'reason' => 'needChecking', 'captcha' => $this->captcha->create4Thread()));
            }

            $this->reply->update($replyID);
            if(dao::isError()) $this->send(array('result' => 'fail', 'message' => dao::getError()));

            $this->send(array('result' => 'success', 'locate' => $this->createLink('thread', 'view', "threaID=$thread->id")));
        }

        $this->view->title  = $this->lang->reply->edit . $this->lang->colon . $thread->title;
        $this->view->reply  = $reply;
        $this->view->thread = $thread;
        $this->view->board  = $this->loadModel('tree')->getById($thread->board);

        $this->display();
    }

    /**
     * Delete a reply.
     * 
     * @param  int      $replyID 
     * @access public
     * @return void
     */
    public function delete($replyID)
    {
        $reply = $this->reply->getByID($replyID);
        if(!$reply) $this->send(array('result' => 'fail', 'message' => 'Not found'));

        $thread = $this->loadModel('thread')->getByID($reply->thread);
        if(!$this->thread->canManage($thread->board)) $this->send(array('result' => 'fail'));

        if(RUN_MODE == 'admin')
        {
            $locate = helper::createLink('reply', 'admin');
        }
        else
        {
            $locate = helper::createLink('thread', 'view', "threadID=$reply->thread");
        }
        if($this->reply->delete($replyID)) $this->send(array('result' => 'success', 'locate' => $locate));

        $this->send(array('result' => 'fail', 'message' => dao::getError()));
    }

    /**
     * Delete a file.
     * 
     * @param  int    $replyID 
     * @param  int    $fileID 
     * @access public
     * @return void
     */
    public function deleteFile($replyID, $fileID)
    {
        if($this->app->user->account == 'guest') $this->send(array('result'=>'fail', 'message'=> 'guest'));

        $reply = $this->reply->getByID($replyID);
        if(!$reply) $this->send(array('result'=>'fail', 'message'=> 'data error'));

        $thread = $this->loadModel('thread')->getByID($reply->thread);
        if(!$thread) $this->send(array('result'=>'fail', 'message'=> 'data error'));

        /* Judge current user has priviledge to edit the reply or not. */
        if($this->thread->canManage($thread->board, $reply->author))
        {
            if($this->loadModel('file')->delete($fileID)) $this->send(array('result'=>'success'));
        }
        $this->send(array('result'=>'fail', 'message'=> 'error'));
    }
}
