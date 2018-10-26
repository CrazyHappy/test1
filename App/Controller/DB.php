<?php
/**
 * Created by PhpStorm.
 * User: Mi
 * Date: 26.10.2018
 * Time: 13:10
 */

namespace App\Controller;


class DB
{
    private $sql;
    public function __construct()
    {
        $this->sql = new \mysqli("localhost", "root", "", "vladlink");
        if ($this->sql->connect_errno) {
            printf("Не удалось подключиться: %s\n", $this->sql->connect_error);
            exit();
        }
    }
    public function create() {
        $query = "
          CREATE TABLE menu (
            id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
            name varchar(255),
            alias varchar(255),
            childrens int,
            FOREIGN KEY (childrens) REFERENCES menu(id)
          );
        ";
        if ($this->sql->query($query) === TRUE) {
            printf("Таблица menu успешно создана.\n");
        } else {
            printf("Errormessage: %s\n", $this->sql->error);
        }
    }
    public function insert($array, $id = 'NULL') {
        foreach ($array as $item) {
            $query = "INSERT INTO menu (name, alias, childrens)
                      VALUES ('$item->name', '$item->alias', $id);";
            if ($this->sql->query($query) === TRUE) {
                d("Элемент menu успешно заполнена. $item->name \n");
            } else {
                d("Errormessage: %s\n", $this->sql->error);
            }
            if (isset($item->childrens)) {
                $this->insert($item->childrens, $this->sql->insert_id);
            }
        }
    }
    public function select() {
        if ($result = $this->sql->query("SELECT * FROM menu")) {
            $rows = [];
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
            return $rows;
        } else {
            d("Errormessage: %s\n", $this->sql->error);
            return 1;
        }
    }
}