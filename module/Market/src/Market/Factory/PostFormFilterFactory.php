<?php
namespace Market\Factory;

use Market\Form\PostFilter;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class PostFormFilterFactory implements FactoryInterface{

    public function createService(ServiceLocatorInterface $serviceManager){

        $categories = $serviceManager->get('categories');

        $filter = new PostFilter();
        $filter->setCategories($categories);
        $filter->setExpireDays($serviceManager->get('market-expire-days'));
        $filter->buildFilter();

        return $filter;
    }
}