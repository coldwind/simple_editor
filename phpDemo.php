<?php
/**
 * �½��༭��ʵ��
 */
if(!empty($_POST['content']))
{
	echo $_POST['content'];
}

require_once("coldwindEditor.class.php");
$demo = new ColdwindEditor();

$demo->setTextValue('����һ������');

$html = $demo->getHtml();
echo '<form method="post">';
echo $html;
echo '<br><input type="submit" value="�ύ">';
echo '</form>';
?>