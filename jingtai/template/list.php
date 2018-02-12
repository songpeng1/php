<html>
<head>
<title>静态化实例</title>
<meta chartset="utf-8"/>
<link rel="stylesheet" type="text/css" href="./template/index.css">
</head>
<body>
<div class="head">页头</div>

<ul>
<?php

foreach ($data as $key => $value) {
	echo "<li>{$value['name']}</li>";
}

?>
</ul>

<div class="head">页脚</div>

</body>

</html>