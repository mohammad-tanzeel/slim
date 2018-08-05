<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controllers;

/**
 * Description of Controller
 *
 * @author tanzeel
 */
class Controller {
    
    protected $container;
    
    public function __construct($container) {
        
        $this->container = $container;
    }
    
}
