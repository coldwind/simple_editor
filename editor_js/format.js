var color_type = 1;
window.isIE = (navigator.appName == "Microsoft Internet Explorer");
function formats(style_value)
{
	if(style_value == 'Paste')
	{
		editor.document.execCommand(style_value);
	}
	else
	{
		editor.document.execCommand(style_value,false,'');
	}
}
function fontstyles(font_value)
{
	editor.document.execCommand("FontName",false,font_value);
}
function  fontsizes(font_value)
{
	editor.document.execCommand("FontSize",false,font_value);
}
function open_add_html(html)
{
	if(document.getElementById('editor').style.display == '')
	{
		editor.document.execCommand("insertHTML",false,html);
	}
	else
	{
		document.form1.html2text_area.value += html;
	}
}
function show_image_div()
{
	if(window.isIE)
	{
		returnpic=window.showModalDialog("iframe.php?type=picture","pic","dialogWidth:630px;dialogHeight:450px;center:yes;toolbar:no;location:no;status:no;scrollbars:no;");
		if(returnpic)
		{
			if(document.getElementById('editor').style.display == '')
			{
				editor.focus();
				var oRng = editor.document.selection.createRange();
				oRng.pasteHTML(returnpic);
			}
			else
			{
				document.form1.html2text_area.value += returnpic;
			}
		}
		
	}
	else
	{
		win = window.open("upimage.php", null, "Width=630,Height=450,left="+(window.screen.availWidth-400)/2+",top="+(window.screen.availHeight-200)/2+"");
	}
}
function show_flash_div()
{
	if(window.isIE)
	{
		returnflash=window.showModalDialog("iframe.php?type=flash","image","dialogWidth:350px;dialogHeight:160px;center:yes;toolbar:no;location:no;status:no;scrollbars:no;");
		
		if(returnflash)
		{
			if(document.getElementById('editor').style.display == '')
			{
				editor.focus();
				var oRng = editor.document.selection.createRange();
				oRng.pasteHTML(returnflash);
			}
			else
			{
				document.form1.html2text_area.value += returnflash;
			}
		}
		
	}
	else
	{
		win = window.open("upflash.html", null, "Width=350,Height=150,left="+(window.screen.availWidth-400)/2+",top="+(window.screen.availHeight-200)/2+"");
	}
}
function show_div_table()
{
	if(window.isIE)
	{
		returntable=window.showModalDialog("table.html","html","dialogWidth:360px;dialogHeight:300px;center:yes;toolbar:no;location:no;status:no;scrollbars:no;");
		if(returntable)
		{
			if(document.getElementById('editor').style.display == '')
			{
				editor.focus();
				var oRng = editor.document.selection.createRange();
				oRng.pasteHTML(returntable);
			}
			else
			{
				document.form1.html2text_area.value += returntable;
			}
		}
	}
	else
	{
		if(document.getElementById('table_id').style.display=="")
		{
			document.getElementById('table_id').style.display="none";
		}
		else
		{
			document.table_form.rows.value="";
			document.table_form.lgd.value="";
			document.table_form.table_w.value="100";
			document.table_form.table_u.value=2;
			document.table_form.table_border.value=1;
			document.table_form.table_cellp.value=0;
			document.table_form.table_cells.value=0;
			var x_y = get_page_center();
			document.getElementById('table_id').style.left=x_y[0]-200+'px';
			document.getElementById('table_id').style.top=x_y[1]-200+'px';
			document.getElementById('table_id').style.display="";
		}
	}

}
// 超级链接
function show_div_link()
{
	if(window.isIE)
	{
		returnlink=window.showModalDialog("link.html","html","dialogWidth:360px;dialogHeight:250px;center:yes;toolbar:no;location:no;status:no;scrollbars:no;");
		if(returnlink)
		{
			returntext = returnlink.split('|c@w|');
			if(returntext[1]!='' && returntext[1]!=undefined)
			{
				var html = "<a href='"+returntext[0]+"' target='_blank'>"+returntext[1]+"</a>";
			}
			else if(oRng.text != '')
			{
				var html = "<a href='"+returnlink+"' target='_blank'>"+oRng.text+"</a>";
			}
			else
			{
				var html = "<a href='"+returnlink+"' target='_blank'>"+returnlink+"</a>";
			}
			if(document.getElementById('editor').style.display == '')
			{
				editor.focus();
				var oRng = editor.document.selection.createRange();
				oRng.pasteHTML(html);
			}
			else
			{
				document.form1.html2text_area.value += html;
			}
		}
	}
	else
	{
		if(document.getElementById('link_id').style.display=="")
		{
			document.getElementById('link_id').style.display="none";
		}
		else
		{
			document.link_form.linkbody.value="";
			document.link_form.linkurl.value="http://";
			var left_value = document.documentElement.clientWidth;
			var top_value = document.documentElement.clientHeight;
			var x_y = get_page_center();
			document.getElementById('link_id').style.left=x_y[0]-200+'px';
			document.getElementById('link_id').style.top=x_y[1]-200+'px';
			document.getElementById('link_id').style.display="";
		}
	}
}
// 获取选中部份内容
function getSelectedText() {
	if (window.getSelection) {
		return editor.window.getSelection().toString();
	}
	else if (document.getSelection) {
		return editor.document.getSelection();
	}
	else if (document.selection) {
		return editor.document.selection.createRange().text;
	}
}
// 获取当前页面中心点位置
function get_page_center()
{
	var left_value = document.documentElement.clientWidth / 2;
	var top_value = document.documentElement.clientHeight / 2;
	var center = new Array(left_value,top_value);
	return center;
}
function show_colors(colorid)
{
	document.getElementById('color_id').innerHTML=colorid;
	document.getElementById('show_color').style.backgroundColor=colorid;
}
function clear_colors()
{
	document.getElementById('color_id').innerHTML="";
	document.getElementById('show_color').style.backgroundColor="";
}
function click_colors(color)
{
	editor.focus();
	if(color_type == 1)
	{
		editor.document.execCommand("foreColor",false,color);
	}
	else
	{
		editor.document.execCommand("BackColor",false,color);
	}
	document.getElementById('set_up_color_div').style.display='none';
}
function nocolors(colorid)
{
	editor.focus();
	if(color_type == 1)
	{
		editor.document.execCommand("foreColor",false,'#000000');
	}
	else
	{
		editor.document.execCommand("BackColor",false,'#ffffff');
	}
	document.getElementById('set_up_color_div').style.display='none';
}
function setcolor(colorid)
{
	color_type = colorid;
	if(document.getElementById('set_up_color_div').style.display == '')
	{
		document.getElementById('set_up_color_div').style.display='none';
	}
	else
	{
		if(color_type == 2)
		{
			document.getElementById('set_up_color_div').style.left = 270+'px';
		}
		else
		{
			document.getElementById('set_up_color_div').style.left = 240+'px';
		}
		document.getElementById('set_up_color_div').style.display='';
		
	}
}
function subeditor()
{
	document.form1.html2text_area.value+=editor.document.body.innerHTML;
	if(document.form1.html2text_area.value=="")
	{
		alert("发布的内容不能为空");
		editor.focus();
		return false;
	}
}
function browse()
{
	browse_body=window.open("");
	browse_body.document.open();
	if(document.getElementById('editor').style.display == '')
	{
		bro_text = editor.document.body.innerHTML;
	}
	else
	{
		bro_text = document.form1.html2text_area.value;
	}
	bro_body=new String(bro_text);
	browse_body.document.write(bro_body);
	m=0;
	bro_text="";
	bro_arr="";
	bro_arr_num="";
	bro_body="";
}
function div_link()
{
	search_body=/^\s+/;
	slink_body=new String(document.link_form.linkbody.value);
	if(document.link_form.linkurl.value=="" || document.link_form.linkurl.value=="http://")
	{
		alert("请输入超链接地址");
		document.link_form.linkurl.focus();
		return false;
	}
	else
	{
		if(document.link_form.linkbody.value != '')
		{
			var html = "<a href='"+document.link_form.linkurl.value+"' target='_blank'>"+document.link_form.linkbody.value+"</a>";
		}
		else
		{
			var seltext = getSelectedText();
			if(seltext != '')
			{
				var html = "<a href='"+document.link_form.linkurl.value+"' target='_blank'>"+seltext+"</a>";
			}
			else
			{
				var html = "<a href='"+document.link_form.linkurl.value+"' target='_blank'>"+document.link_form.linkurl.value+"</a>";
			}
		}
		editor.document.execCommand("insertHTML",false,html);
		document.link_form.linkurl.value="http://";
		document.link_form.linkbody.value="";
		document.getElementById('link_id').style.display="none";
	}
}
function div_table()
{
	if(document.table_form.rows.value=="" || document.table_form.rows.value.replace(/\d+/ig,"")!="")
	{
		alert("请输入表格列数且必须为数字");
		document.table_form.rows.focus();
		return false;
	}
	else if(document.table_form.lgd.value=="" || document.table_form.lgd.value.replace(/\d+/ig,"")!="")
	{
		alert("请输入表格行数且必须为数字");
		document.table_form.lgd.focus();
		return false;
	}
	else if(document.table_form.table_w.value=="" || document.table_form.table_w.value.replace(/\d+/ig,"")!="")
	{
		alert("请输入表格的宽度且必须为数字");
		document.table_form.table_w.focus();
		return false;
	}
else if(document.table_form.table_border.value=="" || document.table_form.table_border.value.replace(/\d+/ig,"")!="")
	{
		alert("请输入表格的边框粗细且必须为数字");
		document.table_form.table_border.focus();
		return false;
	}	
else if(document.table_form.table_cellp.value=="" || document.table_form.table_cellp.value.replace(/\d+/ig,"")!="")
	{
		alert("请输入单元格边距且必须为数字");
		document.table_form.table_cellp.focus();
		return false;
	}
else if(document.table_form.table_cells.value=="" || document.table_form.table_cells.value.replace(/\d+/ig,"")!="")
	{
		alert("请输入单元格间距且必须为数字");
		document.table_form.table_cells.focus();
		return false;
	}
	else
	{
		t_row=document.table_form.rows.value;
		t_lgd=document.table_form.lgd.value;
		var for_td="";
		var for_tr="";
		for(i=1;i<=t_row;i++)
		{
			for(w=1;w<=t_lgd;w++)
			{
				for_td+="<td>&nbsp;</td>";
			}
			for_tr+="<tr>"+for_td+"</tr>";
			for_td="";
		}
		if(document.table_form.table_u.value==1)
		{
			show_t_w=" width=\""+document.table_form.table_w.value+"\" ";
		}
		else
		{
			show_t_w=" width=\""+document.table_form.table_w.value+"%\" ";
		}
		showtable="<table"+show_t_w+" border=\""+document.table_form.table_border.value+"\" cellpadding=\""+document.table_form.table_cellp.value+"\" cellspacing=\""+document.table_form.table_cells.value+"\">"+for_tr+"</table>";
		editor.document.execCommand("insertHTML",false,showtable);
		document.getElementById('table_id').style.display="none";
	}
}
function show_src(div_obj)
{
	if(div_obj.checked == true)
	{
		document.getElementById('html2text_area').value = editor.document.body.innerHTML;
		document.getElementById('editor').style.display = 'none';
		document.getElementById('html2text_area').style.display = '';
	}
	else
	{
		editor.document.body.innerHTML = document.getElementById('html2text_area').value;
		document.getElementById('editor').style.display = '';
		document.getElementById('html2text_area').style.display = 'none';
	}
}
function ParentHtml(type)
{
	var textobj = parent.document.getElementsByTagName('textarea');
	var texttype = '';
	for(i=0;i<textobj.length;i++)
	{
		texttype = textobj[i].getAttribute('editortype');
		if(texttype == 'coldwind')
		{
			if(type == 1 && textobj[i].value != '')
			{
				document.getElementById('html2text_area').value = textobj[i].value;
				if(window.isIE)
				{
					editor.focus();
					var oRng = editor.document.selection.createRange();
					oRng.pasteHTML(document.getElementById('html2text_area').value);
				}
				else
				{
					editor.document.body.innerHTML = document.getElementById('html2text_area').value;
				}
			}
			else if(type == 2)
			{
				if(document.getElementById('editor').style.display == '')
				{
					textobj[i].value = editor.document.body.innerHTML;
				}
				else
				{
					textobj[i].value = document.getElementById('html2text_area').value;
				}
			}
			break;
		}
	}
}
var parentFormobj = parent.document.getElementsByTagName('form');
for(i=0;i<parentFormobj.length;i++)
{
	parentFormobj[i].onsubmit = function()
	{
		var textobj = this.getElementsByTagName('textarea');
		var texttype = '';
		for(m=0;m<textobj.length;m++)
		{
			texttype = textobj[m].getAttribute('editortype');
			if(texttype == 'coldwind')
			{
				isTextForm = 1;
			}
		}
		if(isTextForm == 1)
		{
			ParentHtml(2);
		}
	}
}
function windowLoad()
{
	if(window._isIE){
		editor.document.body.contentEditable = true;
	}else{
		editor.document.designMode = "on";
	}
	setTimeout("ParentHtml(1)",100);
}
