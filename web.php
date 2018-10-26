<?php


$router->get('/',           'PublicController@index');
$router->get('/create',     'PublicController@create');
$router->get('/pars-date',  'PublicController@parsDate');
$router->get('/print-txt',  'PublicController@printTxt');