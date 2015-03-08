<?php

namespace Market\Form;

use Zend\Form\Element\Select;
use Zend\Form\Element\Text;
use Zend\Form\Element\Submit;
use Zend\Form\Form;

class PostForm extends Form{

    private $categories;

    public function buildForm(){

        $this->setAttribute("method","POST");

        $category = new Select("category");
        $category->setValueOptions(array_combine($this->categories,$this->categories))
            ->setLabel("Category");


        $title = new Text("title");
        $title->setAttributes(array("size"=> 10,"maxLength"=> 20))
            ->setLabel("Title");


        $input = new Submit("submit");
        $input->setAttribute("value","Submit");



        $this->add($category)
             ->add($title)
             ->add($input);




    }

    public function setCategories($categories){
        $this->categories = $categories;
    }

}