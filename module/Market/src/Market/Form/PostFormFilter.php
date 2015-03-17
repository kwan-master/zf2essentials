<?php

namespace Market\Form;


use Zend\InputFilter\Input;
use Zend\InputFilter\InputFilter;
use Zend\Validator\Regex;
use Zend\I18n\Validator\Alnum;

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


       $description = new Input("description");
        $description->getValidatorChain()
            ->attachByName("StringLength",array("min"=> 1, "max"=> 120));

        $name_regex = new Regex(array("pattern"=> '/^[a-zA-Z]*$/'));
        $name_regex->setMessage("Contact name should only contain letters for a to z");
        $contact_name = new Input("contact_name");

        $contact_name->getValidatorChain()
            ->attach($name_regex);

        $phone_regex = new Regex(array("pattern"=> '/^[\d-]+$/'));
        $contact_phone = new Input("contact_phone");

        $contact_phone->getValidatorChain()
                      ->attach($phone_regex);




        $email = new Input("contact_email");
        $email->getValidatorChain()->attachByName("EmailAddress");

        $validator = new Alnum(array('allowWhiteSpace' => true));
        $delete_code = new Input("delete_code");
        $delete_code->getValidatorChain()
                    ->attach($validator);



        $this->add($category)
            ->add($title)
            ->add($description)
            ->add($contact_name)
            ->add($contact_phone)
            ->add($delete_code)
            ->add($email);

    }

}