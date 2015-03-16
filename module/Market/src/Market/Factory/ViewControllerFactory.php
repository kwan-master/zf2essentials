<?php
namespace Market\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Market\Controller\ViewController;

class ViewControllerFactory implements FactoryInterface{

    public function createService(ServiceLocatorInterface $controllerManager){

        $services = $controllerManager->getServiceLocator();

        $service = $services->get("ServiceManager");

        $categories = $service->get('categories');

        $post = new ViewController();
       // $post->setCategories($categories);


       // $post->setPostForm($service->get("market-post-form"));
        $post->setListingsTable($service->get("listings-table"));

        return $post;
    }
}