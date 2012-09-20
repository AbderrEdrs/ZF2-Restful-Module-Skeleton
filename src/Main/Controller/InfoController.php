<?php

namespace Main\Controller;

use Zend\Json\Json;

use Album\Model\AlbumTable;
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
        $t= $this->getServiceLocator()->get('albumTable');
        $list = $t->fetchAll();
        foreach ($list as $v){
            $c[] = $v;
        }
        return $c;
        //die (var_dump($c));
    }

    /**
     * Return single resource
     *
     * @param mixed $id
     * @return mixed
     */
    public function get($id) {
        $t= $this->getServiceLocator()->get('albumTable');
        $u = $t->getAlbum($id);
        return $u;
    }


    /**
     * Delete an existing resource
     *
     * @param  mixed $id
     * @return mixed
     */
    public function delete($id) {
        $d = $this->getServiceLocator()->get('albumTable');
        $d->deleteAlbum($id);
        return 'fatto';
    }
    public function update($id, $data) {
        $json = "{ \"artist\":\"gianluca\", \"title\":\"cantocantocanto\" }";
        $array = \Zend\Json\Decoder::decode($json);
        $artist = new Input('artist');
        $artist->getValidatorChain()->addValidator(new Validator\StringLength(array('min' => '5', 'max' => '20')));
        $title = new Input('title');
        $title->getValidatorChain()->addValidator(new Validator\StringLength(array('min' => '5', 'max' => '20')));
        $inputFilter = new InputFilter();
        $inputFilter->add($artist);
        $inputFilter->add($title);
        $inputFilter->setData((array)$array);
        if ($inputFilter->isValid()) {
            echo "is valid\n";
            $i = $this->getServiceLocator()->get('albumTable');
            $i->updateRestfulAlbum($array, $id);
            return $array;
        } else {
            echo "is not valid ciao\n";
            foreach ($inputFilter->getInvalidInput() as $error) {
                return (print_r ($error->getMessages()));
            }
        }
        //  var_dump($array);
    }

public function create($data = null) {
        $json = "{ \"artist\":\"sern\", \"title\":\"enruy7u\" }";
        $array = \Zend\Json\Decoder::decode($json);

        $artist = new Input('artist');
        $artist->getValidatorChain()->addValidator(new Validator\StringLength(array('min' => '5', 'max' => '20')));

        $title = new Input('title');
        $title->getValidatorChain()->addValidator(new Validator\StringLength(array('min' => '5', 'max' => '20')));
        $inputFilter = new InputFilter();
        $inputFilter->add($artist);
        $inputFilter->add($title);
        $inputFilter->setData((array)$array);
        if ($inputFilter->isValid()) {
            echo "is valid\n";
            $i = $this->getServiceLocator()->get('albumTable');
            $i->saveRestfulAlbum($array);
            return $array;
        } else {
            echo "is not valid\n";
            foreach ($inputFilter->getInvalidInput() as $error) {
                return (print_r ($error->getMessages()));
            }
        }
        //  var_dump($array);
    }
}
