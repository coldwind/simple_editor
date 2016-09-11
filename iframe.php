<?php
$type=$_GET['type'];
if(empty($type))
{
	echo("<script>\nwindow.close();\n</script>");
	exit;
}
switch ($type){
	case "picture":
        $src="upimage.php";
        break;
    case "flash":
        $src="upflash.html";
        break;
}
?>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style><iframe src="<?=$src?>" width="100%" height="100%" scrolling="no" marginheight="0" marginwidth="0"></iframe>