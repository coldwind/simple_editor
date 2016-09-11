<?php
/**
 * 新建编辑器实例
 */
if(!empty($_POST['content']))
{
	echo $_POST['content'];
}

require_once("coldwindEditor.class.php");
$demo = new ColdwindEditor();

$demo->setTextValue('这是一个例子');

$html = $demo->getHtml();
echo '<form method="post">';
echo $html;
echo '<br><input type="submit" value="提交">';
echo '</form>';
?>