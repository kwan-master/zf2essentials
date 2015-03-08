<?php
namespace Market\Factory;

use Market\Form\PostFormFilter;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class PostFormFilterFactory implements FactoryInterface{

    public function createService(ServiceLocatorInterface $serviceManager){

        $categories = $serviceManager->get('categories');

        $filter = new PostFormFilter();
        $filter->setCategories($categories);
        $filter->buildFilter();

        return $filter;
    }
}