<?php

namespace App\Controller;
use League\Plates\Engine as Engine;
use App\Controller\DB as DB;

class PublicController extends Controller
{
    private $view = null;
    public function __construct()
    {
        $vendorDir = dirname(dirname(__FILE__));
        $baseDir = dirname($vendorDir);
        $this->view =  Engine::create($baseDir . '/App/Views');
        $this->DB = new DB();
    }
    public function index() {
        echo $this->view->render('index', ['name' => 'Jonathan']);
    }
    public function create() {
        $this->DB->create();
    }
    public function parsDate() {
        $str = file_get_contents('http://vladlink/categories.json');
        $json = json_decode($str);
        $this->DB->insert($json);
    }
    public function printTxt() {
        $items = $this->DB->select();
        d($this->childrens($items));
    }
    private function childrens($items, $childrens = null) {
        $objects = [];
        $keys = array_keys(array_column($items, 'childrens'), $childrens);
        for ($i=0; $i < count($keys); $i++) {
            $object = (object)$items[$keys[$i]];
            $object->childrens =  $this->childrens($items, $items[$keys[$i]]['id']);
            $objects[] = $object;
        }
        return $objects;
    }
}