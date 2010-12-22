<?php

class SectionController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // A list of all available sections
        $sections = Zend_Registry::get('em')
            -> createQuery('select s from \Application\Models\Section s')
            -> getResult();
                    
        $this -> view -> sections = $sections;
    }
}