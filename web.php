<?php

//PublicController Описания функций находиться в папке App/Controller а дальше как в Laravel

$router->get('/',           'PublicController@index'); //Главная страница
$router->get('/create',     'PublicController@create'); //Создания таблицы
$router->get('/pars-date',  'PublicController@parsDate'); //Чтения JSON
$router->get('/list-menu',  'PublicController@printTxt'); //list_menu.php выводит в столбец список меню из БД с отсупами
$router->get('/read',       'PublicController@readFile'); // Чтения и запись в файл