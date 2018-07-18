<?php
define("MODEL_POSTS_FILE",DOCROOT."data/posts.json");
function _model_savePostsArr($posts){
    file_put_contents(MODEL_POSTS_FILE,json_encode($posts));
    
}
function _model_createPost($autor,$content){
    return [
        "autor"=>$autor,
        "content"=>$content,
        "id"=>time().rand(1000,9999).rand(1000,9999)
    ];
}
function model_getPosts(){
    $posts =[];
    if(file_exists(MODEL_POSTS_FILE)){
        $data = file_get_contents(MODEL_POSTS_FILE);
        $posts = json_decode($data,true);
    }
    return $posts;
    
}
function model_appendPost($autor,$content){
    $posts = model_getPosts();
    $posts[] = _model_createPost($autor,$content);
    _model_savePostsArr($posts);
}
function model_addToFav($id){
    $fav = isset($_COOKIE["fav"])? json_decode($_COOKIE["fav"],true):[];
    $fav[] = $id;
    setcookie("fav",json_encode($fav),null,"/");
}
function model_getFavorites(){
    $fav = isset($_COOKIE["fav"])? json_decode($_COOKIE["fav"],true):[];
    $posts = model_getPosts();
    $posts = array_filter($posts,function ($elem) use($fav){
        return in_array($elem["id"],$fav);
    });
    $posts = array_values($posts);
    return $posts;
}
function model_myPosts($autor){
    $myPosts = model_getPosts();
    $myPosts = array_filter($myPosts,function ($elem) use($autor){
        return $elem["autor"]==$autor;
    });
    $myPosts = array_values($myPosts);
    return $myPosts;
}