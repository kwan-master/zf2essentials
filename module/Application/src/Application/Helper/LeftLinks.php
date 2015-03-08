<?php
namespace Application\Helper;

use Zend\View\Helper\AbstractHelper;

class LeftLinks extends AbstractHelper{

    public function __invoke($values,$urlPrefix){

        $list = "<ul>";
        foreach($values as $value){
            $list.= "<li><a href='$urlPrefix/$value'>".$value."</li>";
        }
        $list.= "</ul>";

        return $list;
    }

}