<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Start</title>
		<link rel="stylesheet" type="text/css" href="<?=CSS_PATH.$view.".css"?>">
	</head>
	<body>
        <div class="basis"><?php include $file?></div>
    <?php
    if($_SERVER["REQUEST_URI"]=="/phpBlog/"): ?>
        <script src="<?=JS_PATH."script.js"?>"></script>
    <?php endif; ?>
	</body>
</html>


