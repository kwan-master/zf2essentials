<?php

namespace Market\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;



class PostController extends AbstractActionController{

    public $categories;
    public $postForm;

    use ListingsTableTrait;

    public function indexAction(){

        $data = $this->params()->fromPost();


        $view = new ViewModel(array("postForm"=> $this->postForm,"categories"=> $this->categories));
        $view->setTemplate("market/post/index.phtml");
        if($this->getRequest()->isPost()){

            $this->postForm->setData($data);

            if($this->postForm->isValid()){


                $this->listingsTable->addPosting($data);
                $this->flashMessenger()->addMessage("Thanks for posting");
                $this->redirect()->toRoute("home");
            }else{
                $invalid = new ViewModel();
                $invalid->setTemplate("market/post/invalid.phtml");
                $invalid->addChild($view,"main");
                return $invalid;
            }
        }


       // $view->setTemplate("market/post/invalid.phtml");

        return $view;
        //return new ViewModel(array("categories"=> $this->categories));
    }

    public function setCategories($categories = array()){
        $this->categories = $categories;
    }

    public function setPostForm($post){
        $this->postForm = $post;
    }
}