<?php
/**
 * 上传图片
 */
if(!empty($_FILES['imagefile']['size']))
{
	$maxSize = 3072;
	$fileExt = substr(strrchr($_FILES['imagefile']['name'],'.'),1);
	$fileType=array('jpg','gif','bmp','png');
	$imgurl = 'http://127.0.0.1/image/blogfile/';
	if(!in_array(strtolower($fileExt),$fileType))
	{
		die( "<script>alert('上传图片的格式只能是jpg、gif、bmp、png');history.back();</script>");
	}
	if($_FILES['imagefile']['size']> $maxSize*1024)
	{
		die( "<script>alert('文件过大！');history.back();</script>");
	}
	if($_FILES['imagefile']['error'] !=0)
	{
		die("<script>alert('未知错误，文件上传失败！');history.back();</script>");
	}
	$fst_dir = $_SERVER['DOCUMENT_ROOT'].'/image/blogfile/';
	$sec_dir = date('Ym').'/'.date('d').'/';
	$filename = time().rand(1000,99999).substr($_FILES['imagefile']['name'],-4);
	$path = $fst_dir.$sec_dir.$filename;
	if(!file_exists($fst_dir.date('Ym')))
	{
		mkdir($fst_dir.date('Ym'),0777);
	}
	if(!file_exists($fst_dir.$sec_dir))
	{
		mkdir($fst_dir.$sec_dir,0777);
	}
	if(function_exists('move_uploaded_file')){
		 move_uploaded_file($_FILES['imagefile']['tmp_name'],$path);
	}
	else{
		@copy($_FILES['imagefile']['tmp_name'],$path);
	}
	$imgurl .= $sec_dir.$filename;
	$allUrl = !empty($_POST['saveImageUrl']) ? urlencode($_POST['saveImageUrl'].'||'.$imgurl) : urlencode($imgurl);
	header("Location:upimage.php?allurl={$allUrl}");
	exit;
}
if(!empty($_GET['allurl']))
{
	$allUrl = urldecode($_GET['allurl']);
}
else
{
	$allUrl = '';
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<link href="editor_css/core.css" rel="stylesheet" type="text/css" />
</head>
<script type="text/javascript">
function Up_img_sub()
{
	if(document.upimgform.imagefile.value == '')
	{
		alert('请选择上传的图片');
		return false;
	}
	var ulObj = document.getElementById('show_pic');
	var picArrayObj = ulObj.getElementsByTagName('img');
	if(picArrayObj.length>=10)
	{
		alert('每次最多能添加10张图片');
		return false;
	}
	else
	{
		var urlStr = '';
		for(i=0;i<picArrayObj.length;i++)
		{
			var url = picArrayObj[i].getAttribute('src');
			urlStr += url+'||';
			
		}
		document.upimgform.saveImageUrl.value = urlStr;
	}
}
function delPic(num)
{
	var liObj = document.getElementById('pic_'+num);
	document.getElementById('show_pic').removeChild(liObj);
}
function insert_html()
{
	var ulObj = document.getElementById('show_pic');
	var picArrayObj = ulObj.getElementsByTagName('img');
	var pichtml = '';
	for(i=0;i<picArrayObj.length;i++)
	{
		var picsrc = picArrayObj[i].getAttribute('src');
		pichtml += '<img src="'+picsrc+'"/>';
	}
	if(pichtml != '')
	{
		if(window.isIE) {
			window.returnValue = pichtml;
		}
		else
		{
			window.opener.open_add_html(pichtml);
		}
	}
	window.close();
}
</script>
<body>
<div class="edt_pop" style="width:620px;">
<form action="upimage.php" method="post" enctype="multipart/form-data" name="upimgform" onsubmit="return(Up_img_sub())" target="_self">
	<h2 class="titlebar">插入图片</h2>
	<div class="edt_main">
		<!---标签页 start--->
			 <div class="tabs_header">
			 <div class="tabstitle">选择插入图片来源：</div>
			<ul>
				<li class="selected"><a href="upimage.php" target="_self"><span>我的电脑</span></a></li>
				<li ><a href="linkimage.html" target="_self"><span>网上图片</span></a></li>
			</ul>
			  <div class="tabs_border"></div>
			</div>
		 <!---标签页 end--->
		 <div class="tabs_upload">
		 	<p class="pic_add">选择本地图片：<input type="file" name="imagefile" id="imagefile" />
			<input name="" type="submit" value="上传" class="input_submit" />
			<input name="saveImageUrl" type="hidden" value="">
			</p>
			<p class="pic_tips">
                        <br /><strong>提示：</strong>选择的文件大小不超过3M，支持jpg、gif、png。为保证浏览速度和浏览效果，系统会自动为您优化压缩。
            </p>
		 </div>
		 <div class="up_area">
		 	<p>要插入的图片：(每次最多能添加10张图片)</p>
			<div class="view">
				<ul id="show_pic">
				<?php
				$allUrlArray = explode('||',$allUrl);
				$allUrlArrayNum = count($allUrlArray);
				for($i=0;$i<$allUrlArrayNum;$i++)
				{
					if(!empty($allUrlArray[$i]))
					{
						$upimgsize = getimagesize($allUrlArray[$i]);
						$x = 50;
						$y = 50;
						$upimg_w = $upimgsize[0];
						$upimg_h = $upimgsize[1];
							/* 判断图片是否达到缩放的条件 */
						if($upimg_w > $x || $upimg_h > $y)
						{
							$upimg_w_proportion = round($x/$upimg_w,2);
							$upimg_h_proportion = round($y/$upimg_h,2);
							if($upimg_w_proportion > $upimg_h_proportion)
							{
								$new_upimg_w = floor($upimg_w * $upimg_h_proportion);
								$new_upimg_h = $y;
							}
							else
							{
								$new_upimg_w = $x;
								$new_upimg_h = floor($upimg_h * $upimg_w_proportion);
							}
						}
						else
						{
							$new_upimg_w = $upimg_w;
							$new_upimg_h = $upimg_h;
						}
						echo('<li id="pic_'.$i.'"><img src="'.$allUrlArray[$i].'" width="'.$new_upimg_w.'" height="'.$new_upimg_h.'" /><br /><a href="javascript:delPic('.$i.')">取消</a></li>');
					}
				}
				?>
				</ul>
			</div>
			<p class="p_act"><input name="" type="button" value="插入图片" class="input_submit" onclick="insert_html()" /></p>
		 </div>
	</div>
</form>
</div>

</body>
</html>