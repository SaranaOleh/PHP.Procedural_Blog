<?php
define("DOCROOT",$_SERVER["DOCUMENT_ROOT"]."/phpBlog/");
define("PROJROOT","/phpBlog/");
define("VIEW_PATH",DOCROOT."views/");
define("CSS_PATH","media/css/");
define("JS_PATH","media/js/");
define("IMAGE_PATH","media/images/");
$entrance = explode("?",$_SERVER["REQUEST_URI"])[0];

$ROUTES = [
    "/phpBlog/"        =>["ctrl"=>"main","action"=>"index"],
    "/phpBlog/404"     =>["ctrl"=>"404","action"=>"index"],
    "/phpBlog/entrance"=>["ctrl"=>"main","action"=>"entrance"],
    "/phpBlog/main"    =>["ctrl"=>"main","action"=>"add"],
    "/phpBlog/favorites"  =>["ctrl"=>"main","action"=>"favorites"],
    "/phpBlog/showFav"    =>["ctrl"=>"main","action"=>"showFav"],
    "/phpBlog/panel"    =>["ctrl"=>"main","action"=>"panel"],
    "/phpBlog/myPosts"  =>["ctrl"=>"main","action"=>"myPosts"]
];
function load_model($modelname){
    include DOCROOT."models/".$modelname.".php";
}
function load_view($view,$params=[],$curPage=1,$curUser=""){
    $file = VIEW_PATH.$view.".php";
    include "template.php";
}
function route($direction){

        global $ROUTES;
        if(isset($ROUTES[$direction])){
            include DOCROOT."controllers/".$ROUTES[$direction]["ctrl"].".php";
            call_user_func("action_".$ROUTES[$direction]["action"]);        
        }else{
            route("/phpBlog/404");
        }
}
route($entrance);
