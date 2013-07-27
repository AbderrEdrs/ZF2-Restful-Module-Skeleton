<?php

namespace Main\Controller;

use Zend\Json\Json;

use Zend\Http\Request;
use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\Json\Decoder;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Input;
use Zend\Validator;


/**
 *
 */
class InfoController extends AbstractRestfulController
{
    /**
     * Return list of resources
     *
     * @return array
     */



    public function getList()
    {
        return array('ciao' => 'mondo-updated');
    }

    /**
     * Return single resource
     *
     * @param mixed $id
     * @return mixed
     */
    public function get($id)
    {

    }


    /**
     * Delete an existing resource
     *
     * @param  mixed $id
     * @return mixed
     */
    public function delete($id)
    {

    }

    public function update($id, $data)
    {

    }

    public function create($data = null)
    {

    }
}
