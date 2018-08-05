<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controllers;

use Slim\Views\Twig as View;

/**
 * Description of TestController
 *
 * @author tanzeel
 */
class TestController extends Controller  {
    //put your code here
    
    
    
    public function index($req, $response) {
        $user = $this->container->db->table('users')->find(1);
        var_dump($user);
        $this->container->view->render($response, 'test.twig');
    }
}
