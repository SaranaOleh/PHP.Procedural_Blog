<?php
$user = isset($_COOKIE["user"])?$_COOKIE["user"]:$curUser;
$page = explode("?",$_SERVER["REQUEST_URI"]);
?>
<ul class="user">
    <li>
        <img src="<?=IMAGE_PATH."user.png"?>" alt="">
    </li>
    <li><?=$user?></li>
    <li>
        <a href="/phpBlog/showFav?id=<?=$params[$i]["id"]?>">Понравившиеся</a>
        <a href="/phpBlog/myPosts">Мои посты</a>
        <a href="/phpBlog/entrance?id=<?=$params[$i]["id"]?>">Стена</a>
    </li>
</ul>