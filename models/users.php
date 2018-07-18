<?php
define("MODEL_USERS_FILE",DOCROOT."data/users.json");
function model_newUser($name){
    if(!$_COOKIE["user"]){
        setcookie("user",$name,null,"/");
    }
}

function _model_saveUsersArr($users){
    file_put_contents(MODEL_USERS_FILE,json_encode($users));
    
}
function _model_createUser($user){
    return [
        "user"=>$user,
    ];
}
function model_getUsers(){
    $users =[];
    if(file_exists(MODEL_USERS_FILE)){
        $data = file_get_contents(MODEL_USERS_FILE);
        $users = json_decode($data,true);
    }
    return $users;
    
}
function model_appendUser($user){
    if($user==null){
        return;
    }

    $users = model_getUsers();

    if(!in_array(_model_createUser($user),$users)){
        $users[] = _model_createUser($user);
    }
    _model_saveUsersArr($users);
}