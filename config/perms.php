<?php

$abilities = ['view', 'create', 'update', 'delete'];

$roles = [
  'common' => [
    'home' => ['view'],
  ],
  'admin' => [ 
    'users' => $abilities,
    'roles' => $abilities,
    'dashboard'=>$abilities,
    'events'=>$abilities,
    'application'=>$abilities,
    'remark'=>$abilities,
    'addremark'=>$abilities,
  ],
  'user' => [
    'dashboard'=>$abilities,
    'applications'=>$abilities
  ],
  'superadmin' => [
    'select'=>$abilities,
  ]
];

$permissions = [];

foreach($roles as $role => $types){
  foreach($types as $type => $ability){
    foreach($ability as $item){

        $perms = $role=='common'? $type.':'.$item : $role.':'.$type.':'.$item;

        array_push($permissions, $perms);

    }
  }
}

return $permissions;
