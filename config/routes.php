<?php
$routes = [
    '' => 'HomeController@index', 
    'about' => 'HomeController@about', 
    'cadastrar' => 'UserController@cadastrar',
    'usuario/login' => 'UserController@login',
    'usuario/logout' => 'UserController@logout',
    'admin' => 'AdminController@index',
    'admin/list-users' => 'AdminController@listUsers',
    'update_tipo_usuario' => 'AdminController@updateTipoUsuario',
    'produtos' => 'ProdutosController@index',
    'produtos/infantil' => 'ProdutosController@exibirInfantil',
    'produtos/masculino' => 'ProdutosController@exibirMasculino',
    'produtos/feminino' => 'ProdutosController@exibirFeminino'
    
];

return $routes;