<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class TestController extends AppController
{

    public function beforeFilter(\Cake\Event\Event $event)
    {
        parent::beforeFilter($event);
        $this->viewBuilder()->layout('angularjs');
    }

    public function isAuthorized($user)
    {
        $action = $this->request->params['action'];

        // The add and index actions are always allowed.
        if (in_array($action, ['index'])) {
            return true;
        }
//        // All other actions require an id.
//        if (empty($this->request->params['pass'][0])) {
//            return false;
//        }
//
//        // Check that the bookmark belongs to the current user.
//        $id = $this->request->params['pass'][0];
//        $bookmark = $this->Bookmarks->get($id);
//        if ($bookmark->user_id == $user['id']) {
//            return true;
//        }
        return parent::isAuthorized($user);
    }
    
    public function index () {
        
    }

}
