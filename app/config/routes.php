<?php
 return [
     //HomeController
    '' => [
        'controller'=>'home',
        'action' => 'index'
    ],
    '{page:\d+}' => [
        'controller'=>'home',
        'action' => 'index'
    ],
    //AdminController
    'admin/login' => [
        'controller'=>'admin',
        'action' => 'login'
    ],
    'admin/books' => [
        'controller'=>'admin',
        'action' => 'books'
    ], 
    'admin/add' => [
        'controller'=>'admin',
        'action' => 'add'
    ],
    'admin/logout' => [
        'controller'=>'admin',
        'action' => 'logout'
    ],
    'admin/edit/{id:\d+}' => [
        'controller'=>'admin',
        'action' => 'edit'
    ],
    'admin/delete/{id:\d+}' => [
        'controller'=>'admin',
        'action' => 'delete'
    ],    
     ];
?>