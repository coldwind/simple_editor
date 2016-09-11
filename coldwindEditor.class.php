<?php
/**
 * 编辑器调用类
 * 该类用于在PHP下调用在线编辑器
 * 实例化此类后，修改相关属性，调用getHtml方法
 * 
 * @author coldwind
 * @copyright 2009-07-29
 * @version 2.0
 */
class ColdwindEditor{
	private $editorPath;
	private $iframeHeight;
	private $iframeWidth;
	private $textareaName;
	private $value;
	
	/**
	 * 构造函数
	 * 
	 * 初始化相关属性
	 */
	public function ColdwindEditor()
	{
		$this->editorPath = './';
		$this->iframeHeight = 630;
		$this->iframeWidth = 720;
		$this->textareaName = 'content';
		$this->value = '';
	}
	
	/**
	 * 设置编辑器所在路径
	 * 
	 * @param String $path
	 */
	public function setPath($path)
	{
		$this->editorPath = $path;
	}
	
	/**
	 * 设置iframe的高度
	 * 
	 * @param integer $height
	 */
	public function setHeight($height)
	{
		$this->iframeHeight = $height;
	}
	
	/**
	 * 设置iframe的宽度
	 * 
	 * @param integer $width
	 */
	public function setWidth($width)
	{
		$this->iframeWidth = $width;
	}
	
	/**
	 * 设置textarea的名称
	 */
	public function setTextareaName($name)
	{
		$this->textareaName = $name;
	}
	
	/**
	 * 设置文本框内容
	 */
	public function setTextValue($value)
	{
		$this->value = $value;
	}
	
	/**
	 * 创建HTML
	 * 
	 * @return string
	 */
	public function getHtml()
	{
		$html = <<<eot
		<iframe src="{$this->editorPath}editor.html" height="{$this->iframeHeight}" width="{$this->iframeWidth}" frameBorder="0" marginHeight="0" marginWidth="0" scrolling="No"></iframe>
		<textarea name="{$this->textareaName}" id="{$this->textareaName}" style="display:none;" editortype="coldwind">{$this->value}</textarea>
eot;
		return $html;
	}
}
?>