<?php
function action_index(){
    load_view("start");
}
function action_panel(){

    load_model("users");
    model_newUser($_POST["user"]);
    model_appendUser($_POST["user"]);
    $curUser = $_POST["user"];
    load_view("panel",[],1,$curUser);
}
function action_entrance(){
    load_model("posts");
    $view = model_getPosts();
    $page = isset($_GET["page"])?$_GET["page"]:1;
    load_view("main",$view,$page);
}
function action_add(){
    $autor = $_COOKIE["user"];
    $content = $_POST["newPost"];
    load_model("posts");
    model_appendPost($autor,$content);
    header("Location:".$_SERVER["HTTP_REFERER"]);
}
function action_favorites(){
    $id = @$_GET["id"];
    if($id==null) die(":(");
    load_model("posts");
    model_addToFav($id);
    header("Location:".$_SERVER["HTTP_REFERER"]);
}
function action_showFav(){
    load_model("posts");
    $posts = model_getFavorites();
    $page = isset($_GET["page"])?$_GET["page"]:1;
    load_view("main",$posts,$page);

}
function action_myPosts(){
    $curUser = $_COOKIE["user"];
    load_model("posts");
    $myPosts = model_myPosts($curUser);
    $page = isset($_GET["page"])?$_GET["page"]:1;
    load_view("main",$myPosts,$page);

}