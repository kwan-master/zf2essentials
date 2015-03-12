<?php

namespace Market\Form;

use Zend\Captcha as Capt;
use Zend\Form\Element\Captcha;
use Zend\Form\Element\Email;
use Zend\Form\Element\Number;
use Zend\Form\Element\Radio;
use Zend\Form\Element\Select;
use Zend\Form\Element\Text;
use Zend\Form\Element\Submit;
use Zend\Form\Element\Textarea;
use Zend\Form\Element\Url;
use Zend\Form\Form;


class PostForm extends Form{

    private $categories;
    private $date_expires;

    public function buildForm(){

        $this->setAttribute("method","POST");

        $category = new Select("category");
        $category->setValueOptions(array_combine($this->categories,$this->categories))
            ->setLabel("Category");


        $title = new Text("title");
        $title->setAttributes(array("size"=> 10,"maxLength"=> 20))
            ->setLabel("Title");

        $price = new Number("Price");
        $price->setAttributes(array("size"=> 10,"maxLength"=> 20))
            ->setLabel("Price");

        $date_expires = new Radio("date_expires");
        $date_expires->setValueOptions(array_combine($this->date_expires,$this->date_expires))
            ->setLabel("Date expires");


        $descrition = new Textarea("descrition");
        $descrition->setAttributes(array("size"=> 10,"maxLength"=> 20))
                   ->setLabel("Description");


        $photo_filename = new Url("photo_filename");
        $photo_filename->setLabel("Photo filename");

        $contact_name = new Text("contact_name");
        $contact_name->setAttributes(array("size"=> 10,"maxLength"=> 20))
            ->setLabel("Contact name");

        $contact_email = new Email("contact_email");
        $contact_email->setAttributes(array("size"=> 10,"maxLength"=> 20))
            ->setLabel("Contact email");

        $contact_phone= new Text("contact_phone");
        $contact_phone->setAttributes(array("size"=> 10,"maxLength"=> 20))
            ->setLabel("Contact phone");

        $cityCode = new Select("cityCode");
        $cityCode->setLabel("City code");

        $delete_code = new Number("delete_code");
        $delete_code->setLabel("Delete code");

        $captch = new Captcha("captcha");
        $captch->setCaptcha(new Capt\Dumb())
            ->setLabel('Please verify you are human');




        $input = new Submit("submit");
        $input->setAttribute("value","Submit");



        $this->add($category)
             ->add($title)
             ->add($price)
             ->add($date_expires)
             ->add($descrition)
             ->add($photo_filename)
             ->add($contact_name)
             ->add($contact_email)
             ->add($contact_phone)
             ->add($cityCode)
             ->add($delete_code)
             ->add($captch)
             ->add($input);




    }

    public function setCategories($categories){
        $this->categories = $categories;
    }

    public function setDate($date){
        $this->date_expires = $date;
    }

}