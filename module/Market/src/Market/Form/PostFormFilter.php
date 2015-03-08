<?php

namespace Market\Form;

use Zend\InputFilter\Input;
use Zend\InputFilter\InputFilter;

class PostFormFilter extends InputFilter{

    private $categories;

    public function setCategories($categories){
        $this->categories = $categories;
    }

    public function buildFilter(){

        $category = new Input("category");

        $category->getFilterChain()
                 ->attachByName("StringTrim")
                 ->attachByName("StripTags")
                 ->attachByName("StringToLower");

        $category->getValidatorChain()
                 ->attachByName("InArray",array("haystack"=> $this->categories));

        $title = new Input("title");
        $title->getFilterChain()
              ->attachByName("StringTrim")
              ->attachByName("StripTags")
              ->attachByName("StringToLower");

        $title->getValidatorChain()
              ->attachByName("StringLength",array("min"=> 1, "max"=> 120));

        $this->add($category)
            ->add($title);

    }

}