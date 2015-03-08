<?php

namespace Market\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;


class PostController extends AbstractActionController{

    public $categories;

    public function indexAction(){

        $view = new ViewModel(array("categories"=> $this->categories));
        $view->setTemplate("market/post/invalid.phtml");

        return $view;
        //return new ViewModel(array("categories"=> $this->categories));
    }

    public function setCategories($categories = array()){
        $this->categories = $categories;
    }
}