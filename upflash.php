<?php
$linkurl = $_POST['flashurl'];
$swf_style = array('youku'=>array('url'=>'http://www.youku.com/v/swf/qplayer.swf?VideoIDS=(LINK_URL)&isAutoPlay=true',
												'toformat'=>array('/^http:\/\/v\.youku\.com\/v_show\/id_([A-Za-z0-9_=]+)(\.html){0,1}/',
																	'/^http:\/\/player\.youku\.com\/player\.php\/sid\/([A-Za-z0-9_=]+)\/v\.swf/')),															
								'sina'=>array('url'=>'http://video.sina.com.cn/deco/2008/1118/flvPlayer1218.swf?vid=(LINK_URL)&auto=1',
												'toformat'=>array('/^http:\/\/you\.video\.sina\.com\.cn\/[A-Za-z]\/([0-9]+)-[0-9]+\.html$/','/^http:\/\/[A-Za-z]+\.[A-Za-z0-9\.]+\.sina\.com\.cn\/player\/outer_player\.swf\?auto=\d+&vid=([0-9]+)&uid=[0-9]+$/','/^http:\/\/you\.video\.sina\.com\.cn\/b\/([A-Za-z0-9_=\-]+)\-[A-Za-z0-9_=\-]+\.html/','/^http:\/\/you\.video\.sina\.com\.cn\/pg\/topicdetail\/topicPlay\.php\?[\w\-=\&]+#(\d+)/')),											

								'youtube'=>array('url'=>'http://www.youtube.com/v/(LINK_URL)&autoplay=1',
													'toformat'=>array('/^http:\/\/www\.youtube\.com\/watch\?v=([A-Za-z0-9_=\-]+).*/','/^http:\/\/www\.youtube\.com\/v\/([A-Za-z0-9_=\-]+)$/','/^http:\/\/www\.youtube\.com\/v\/([A-Za-z0-9_=\-]+)\&.*$/'),
													'vediopic'=>'http://i1.ytimg.com/vi/(PIC_URL)/default.jpg'),							
								'6cn'=>array('url'=>'http://6.cn/player.swf?flag=1&vid=(LINK_URL)/qg',
												'toformat'=>array('/^http:\/\/6\.cn\/p\/([A-Za-z0-9_]+)\.swf$/')),
												
								'6cnphoto'=>array('url'=>'http://6.cn/photoVideo.swf?pvid=(LINK_URL)',
												'toformat'=>array('/^http:\/\/6\.cn\/photoVideo\.swf\?pvid=(\d+)/')),							
								'tudou'=>array('url'=>'http://www.tudou.com/v/(LINK_URL)',
												'toformat'=>array('/^http:\/\/www\.tudou\.com\/v\/([A-Za-z0-9_\-]+)\/{0,1}.*$/','/^http:\/\/www\.tudou\.com\/programs\/view\/([A-Za-z0-9_\-]+)\/{0,1}.*$/')),							

								'google'=>array('url'=>'http://video.google.com/googleplayer.swf?docid=(LINK_URL)&fs=true&autoplay=1',
												'toformat'=>array('/^http:\/\/video\.google\.com\/videoplay\?docid=([0-9]+)/')),

								'ku6'=>array('url'=>'http://player.ku6.com/refer/(LINK_URL)/v.swf&auto=1',
												'toformat'=>array('/^http:\/\/player\.ku6\.com\/refer\/([A-Za-z0-9_\-]+)\/v\.swf$/','/^http:\/\/v\.ku6\.com\/show\/([A-Za-z0-9_\-]+)\.html/')),

								'56'=>array('url'=>'http://www.56.com/(LINK_URL)',
												'toformat'=>array('/^http:\/\/www\.56\.com\/([A-Za-z0-9_\.\/]+)$/')),						
								'sohu'=>array('url'=>'http://js1.pp.sohu.com.cn/ppp/mv/swf200811281417/Main.swf?id=(LINK_URL)&type=Singleton&domain=inner',
												'toformat'=>array('/^http:\/\/v\.blog\.sohu\.com\/u\/vw\/([0-9]+)$/','/^http:\/\/v\.blog\.sohu\.com\/fo\/v4\/([0-9]+)$/')),
								'qq'=>array('url'=>'http://cache.tv.qq.com/qqplayerout.swf?vid=(LINK_URL)&autoplay=1',
												
												'toformat'=>array('/^http:\/\/video\.qq\.com\/[A-Za-z0-9_\.\/]+\/videopl\?v=([A-Za-z0-9_\.\/]+)/','/^http:\/\/cache\.tv\.qq\.com\/qqplayerout\.swf\?vid=([A-Za-z0-9_\.\/]+)/'),
												'vediopic'=>'http://vpic.video.qq.com/1/(PIC_URL)_1.jpg'),
								'pomoho'=>array('url'=>'http://video.pomoho.com/swf/out_player.swf?flvid=(LINK_URL)&autoplay=1',
								
												'toformat'=>array('/^http:\/\/video\.pomoho\.com\/ent\/(\d+)/','/^http:\/\/video\.pomoho\.com\/swf\/out_player\.swf\?flvid=(\d+)/')),
								
								'cctv'=>array('url'=>'http://video.cctv.com/flash/cctv_player.swf?VideoID=(LINK_URL)&autoStart=true','toformat'=>array('/http:\/\/video\.cctv\.com\/opus\/(\d+)\.html/','/http:\/\/video\.cctv\.com\/opus\/subplay\.do\?opusid=(\d+)/')),
								
								'openv'=>array('url'=>'http://img.openv.tv/hd/swf/hd_player.swf?pid=(LINK_URL)&autostart=true',
								
												'toformat'=>array('/^http:\/\/hd\.openv\.com\/pro_play\-(\w+)\.html/','/^http:\/\/img\.openv\.tv\/hd\/swf\/hd_player\.swf\?pid=(\w+)/')),
												
								'ifeng'=>array('url'=>'http://v.ifeng.com/include/exterior.swf?guid=(LINK_URL)',
								
												'toformat'=>array('/^http:\/\/v\.ifeng\.com\/[\w\/]+\/([A-Za-z0-9_\-]+)\.shtml/')),								
								'vodone'=>array('url'=>'http://v.vodone.com/js/player/videoPlayer.swf?contentid=(LINK_URL)&autoplay=true',
												'toformat'=>array('/^http:\/\/v\.vodone\.com\/vodplayer\/content\/(\d+)\.shtml/')),								
								'espn'=>array('url'=>'http://espn.go.com/videohub/player.swf?mediaId=(LINK_URL)',
											
												'toformat'=>array('/^http:\/\/espn\.go\.com\/video\/clip\?id=(\d+)/','/^http:\/\/espn\.go\.com\/video\/clip\?id=(\d+)/')),
												
								'vimeo'=>array('url'=>'http://vimeo.com/moogaloop.swf?clip_id=(LINK_URL)&autoplay=1',
												
												'toformat'=>array('/^http:\/\/[A-Za-z\.]*vimeo\.com\/(\d+)/')),
												
								'baidu'=>array('url'=>'http://mv.baidu.com/export/flashplayer.swf?vid=(LINK_URL)&autoplay=true',
											
												'toformat'=>array('/^http:\/\/tieba\.baidu\.com\/.*\/shipin\/play\/([A-Za-z0-9]*)/','/^http:\/\/mv\.baidu\.com\/export\/flashplayer.swf\?vid=([A-Za-z0-9]*)/')));

$findedvideo = 0;
foreach($swf_style as $val)
{
	foreach($val['toformat'] as $secval)
	{
		$lsecval = preg_match_all($secval,$linkurl,$lu_arr);
		if(!empty($lu_arr[1][0]))
		{
			$return_url = str_replace('(LINK_URL)',$lu_arr[1][0],$val['url']);
			$findedvideo = 1;
			break;
		}
	}
	if($findedvideo == 1)
	{
		break;
	}
}
if(empty($return_url) && preg_match('/^https{0,1}:\/\/.+\.swf/',$linkurl))
{
	$return_url = $linkurl;
}
if(!empty($return_url))
{
	$return_url = '<embed src="'.$return_url.'" quality="high" width="480" height="400" align="middle" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" wmode="transparent"></embed>';
}
else 
{
	die( "<script>alert('输入的FLASH地址无法识别');history.back();</script>");
}
?>
<script type="text/javascript">
var flashhtml = '<?php echo($return_url); ?>';
window.isIE = (navigator.appName == "Microsoft Internet Explorer");
if(window.isIE) {
	window.returnValue = flashhtml;
}
else
{
	window.opener.open_add_html(flashhtml);
}
window.close();
</script>