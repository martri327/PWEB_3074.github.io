<?php 

$routes = [];

$routes['GET']['/'] = 'DashboardController@index';
$routes['GET']['/Barista'] = 'BaristaController@index';
$routes['GET']['/Baristacreate'] = 'BaristaController@formcreate';
$routes['GET']['/Baristaupdate/{id}'] = 'BaristaController@formupdate';
$routes['POST']['/createBarist'] = 'BaristaController@create';
$routes['POST']['/updateBarist/{id}'] = 'BaristaController@update';
$routes['GET']['/deleteBarist/{id}'] = 'BaristaController@delete';
?>