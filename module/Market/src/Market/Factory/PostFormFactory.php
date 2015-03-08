<?php
namespace Market\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Market\Form\PostForm;

class PostFormFactory implements FactoryInterface{

    public function createService(ServiceLocatorInterface $serviceManager){

        $categories = $serviceManager->get('categories');

        $post = new PostForm();
        $post->setCategories($categories);
        $post->buildForm();
        //  $post->setPostForm($service->get("market-post-form"));

        return $post;
    }
}