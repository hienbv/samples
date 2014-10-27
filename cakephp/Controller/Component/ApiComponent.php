<?php

App::uses('Component', 'Controller');

/**
 * API component
 * 
 * @author OanhNN <oanhnn@rikkeisoft.com>
 */
class ApiComponent extends Component
{

    public function initialize(Controller $controller)
    {
        parent::initialize($controller);
        $this->controller = $controller;
    }

    /**
     * Set view vars and _serialize var for JSON or XML response
     * 
     * @param int $code
     * @param mixed $data
     * @param string $message
     */
    public function response($code, $data, $message = '')
    {
        $serialize = array('code', 'data');
        if (!empty($message)) {
            $this->controller->set('message', $message);
            $serialize[] = 'message';
        }
        $this->controller->set('code', $code);
        $this->controller->set('data', (object) $data);
        $this->controller->set('_serialize', $serialize);
    }
}
