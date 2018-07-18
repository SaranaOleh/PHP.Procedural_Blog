<?php
$user = isset($_COOKIE["user"])?$_COOKIE["user"]:$currUser[0];
$page = explode("?",$_SERVER["REQUEST_URI"]);
?>
<ul class="user">
    <li>
        <a href="/phpBlog/panel"><img src="<?=IMAGE_PATH."user.png"?>" alt=""></a>
    </li>
    <li><?=$user?></li>
    <li>
        <a href="/phpBlog/showFav?id=<?=$params[$i]["id"]?>">Понравившиеся</a>
        <a href="/phpBlog/entrance?id=<?=$params[$i]["id"]?>">Стена</a>
    </li>
    <form action="/phpBlog/main" method="post" class="writeForm">
        <textarea name="newPost" id="postMess"></textarea>
        <input type="submit" value="OK">
    </form>
</ul>
<ul class="wall">
    <?php
    if(count($params)>5){
        for($i=($curPage-1)*5;$i<(count($params)<(5*$curPage)? count($params):5*$curPage);$i++): ?>
            <li><?php if($page[0]=="/phpBlog/entrance" || $page[0]=="/phpBlog/" || $page[0]=="/phpBlog/showFav"): ?>
                    <p class="autor"><?=$params[$i]["autor"]?></p>
                <?php endif; ?>
                <p class="content"><?=$params[$i]["content"]?></p>
                <?php if($page[0]=="/phpBlog/entrance" || $page[0]=="/"): ?>
                    <a href="/phpBlog/favorites?id=<?=$params[$i]["id"]?>" class="like">Нравится</a>
                <?php endif; ?>
            </li>
        <?php endfor;
        $pages=(int)(($pages=count($params)-1)/5) ?>
            <li class="page_nav">
                <?php for($i=0;$i<$pages+1;$i++): ?>
                    <a href="<?=($page[0]=="/phpBlog/entrance" || $page[0]=="/")?"/phpBlog/entrance":(($page[0]=="/phpBlog/showFav")?"/phpBlog/showFav":"/phpBlog/myPosts")?>?page=<?=1+$i?>" class="page"><?=1+$i?></a>
                <?php endfor; ?>
            </li>
        <?php
    }else{
        for($i=0;$i<count($params);$i++): ?>
            <li><?php if($page[0]=="/phpBlog/entrance" || $page[0]=="/phpBlog/" || $page[0]=="/phpBlog/showFav"): ?>
                    <p class="autor"><?=$params[$i]["autor"]?></p>
                <?php endif; ?>
                <p class="content"><?=$params[$i]["content"]?></p>
                <?php if($page[0]=="/phpBlog/entrance" || $page[0]=="/"): ?>
                    <a href="/phpBlog/favorites?id=<?=$params[$i]["id"]?>" class="like">Нравится</a>
                <?php endif; ?>
            </li>
        <?php endfor;
    }
    ?>
</ul>

