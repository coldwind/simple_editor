<?php
/**
 * �༭��������
 * ����������PHP�µ������߱༭��
 * ʵ����������޸�������ԣ�����getHtml����
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
	 * ���캯��
	 * 
	 * ��ʼ���������
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
	 * ���ñ༭������·��
	 * 
	 * @param String $path
	 */
	public function setPath($path)
	{
		$this->editorPath = $path;
	}
	
	/**
	 * ����iframe�ĸ߶�
	 * 
	 * @param integer $height
	 */
	public function setHeight($height)
	{
		$this->iframeHeight = $height;
	}
	
	/**
	 * ����iframe�Ŀ��
	 * 
	 * @param integer $width
	 */
	public function setWidth($width)
	{
		$this->iframeWidth = $width;
	}
	
	/**
	 * ����textarea������
	 */
	public function setTextareaName($name)
	{
		$this->textareaName = $name;
	}
	
	/**
	 * �����ı�������
	 */
	public function setTextValue($value)
	{
		$this->value = $value;
	}
	
	/**
	 * ����HTML
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