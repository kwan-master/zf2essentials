<?php
namespace Market\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Market\Form\PostForm;

class PostFormFactory implements FactoryInterface{

    public function createService(ServiceLocatorInterface $serviceManager){

        $categories = $serviceManager->get('categories');
        $date_expires = $serviceManager->get('date_expires');

        $post = new PostForm();
        $post->setCategories($categories);
        $post->setDate($date_expires);
        $post->buildForm();
        $post->setInputFilter($serviceManager->get("market-post-filter"));
        //  $post->setPostForm($service->get("market-post-form"));

        return $post;
    }
}