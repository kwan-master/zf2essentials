<?php

namespace Market\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;


class ViewController extends AbstractActionController{

    use ListingsTableTrait;

    public function indexAction(){


        $category = $this->params()->fromRoute("category");

        $lists = $this->listingsTable->getListingsByCategory($category);


        return new ViewModel(array("category" =>$category,"lists" => $lists));
    }


    public function itemAction(){

        $itemId = $this->params()->fromRoute("itemId");

        $item = $this->listingsTable->getListingById($itemId);

        if(empty($itemId)){
            $this->flashMessenger()->addMessage("Item Not Found");

            return  $this->redirect()->toRoute("market");
        }


        return new ViewModel(array("itemId" =>$itemId,"item" => $item));

    }
}