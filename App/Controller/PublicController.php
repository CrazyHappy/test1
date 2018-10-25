<?php

namespace App\Controller;
use League\Plates\Engine as Engine;

class PublicController extends Controller
{
    private $view = null;
    public function __construct()
    {
        $vendorDir = dirname(dirname(__FILE__));
        $baseDir = dirname($vendorDir);
        $this->view =  Engine::create($baseDir . '/App/Views');
    }
    public function index() {
        echo $this->view->render('index', ['name' => 'Jonathan']);
    }
}