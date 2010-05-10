<?php
/*
 * Created on Mar 4, 2010
 * Created By Development team Arena Mobile(BD)
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 class Template {
  var $name;	
  var $css_path;
  var $css_url;
  var $css;
  var $_embadded_css; 
  var $_embadded_js; 
  var $base_url;
  var $_css_files=array();
  var $_js_files=array();
  var $_data=array();
  var $_pagination_html;
  var $layout; 
  
  function __construct()
  {
  	 $this->base_url= base_url();
  	 $this->name=$this->get_current_template();
  	 $tplname=empty($this->name)?'':$this->name.'/';
  	 $this->css_url= $this->base_url.$tplname.'css/';
     $this->js_url= $this->base_url.$this->name.'js/';	
     $this->image_url= $this->base_url.$this->name.'images/';
     $this->upload_url=str_replace('admin','upload_images',$this->base_url);
     $this->front_end_url=str_replace('admin/','',$this->base_url);	
     $this->site_url= site_url().'/';	
     $this->_layout='default';	
     $this->_init_template();
  }
  	
  function get_current_template()
  {
  	 //$CI =& get_instance();
  	 $name='';
  	 return $name;
  }
  
  function set_page_title($title)
  {
     	$this->_data['page_title']=$title;
     	
  }
   
  function assign($key,$val='')
  {
  	 if(is_array($key))
  	 {
     	$this->_data=array_merge($this->_data,$key);
  	 }
  	 else
  	 {
  	 	$this->_data[$key]=$val;	
  	 }
  }
  
  function get_data()
  {
     return $this->_data;	
  }
  
  function set_pagination($html)
  {
  	$this->_pagination_html=$html;
  }
  
  function pagination()
  {
  	echo $this->_pagination_html;
  }
  
  function set_layout($layout)
  {
  	 $this->_layout=$layout;
  }
  
  function get_layout()
  {
  	 $tplname=empty($this->name)?'':$this->name.'/';
  	 $this->_layout=$tplname.'layouts/'.$this->_layout;
  	 return $this->_layout;
  }
  function _init_template()
  {
  	$this->_data['base_url']=$this->base_url;
  	$this->_data['site_url']=$this->site_url;
  	$this->_data['css_url']=$this->css_url;
  	$this->_data['js_url']=$this->js_url; 
    $this->_data['image_url']=$this->image_url;  
    $this->_data['root_url']=$this->root_url;
    $this->_data['upload_url']=$this->upload_url;
    $this->_data['front_end_url']=$this->front_end_url;	 	
  }
  
  function set_css($files)
  {
  	if(is_array($files))
  	{
  		$this->_css_files=array_merge($this->_css_files,$files);
  	}
  	elseif(strpos($files,',')===TRUE)
  	{
  		$this->_css_files=array_merge($this->_css_files,explode(',',$files));
  	}
  	else
  	{
  		array_push($this->_css_files,$files);
  	}
	
  	
  }
  
  function set_js($files)
  {
  	if(is_array($files))
  	{
  		$this->_js_files=array_merge($this->_js_files,$files);
  	}
  	elseif(strpos($files,',')===TRUE)
  	{
  		$this->_js_files=array_merge($this->_js_files,explode(',',$files));
  	}
  	else
  	{
  		array_push($this->_js_files,$files);
  	}
	
  	
  }
  
  function embed_css($text)
  {
  	$this->_embadded_css .=$text."\n";
  }
   function embed_js($text)
  {
  	$this->_embadded_js .=$text."\n";
  }
  
   function custom_head()
   {
   	
	   	$custom_head="\n";
		foreach($this->_css_files as $css)
		{
			$custom_head .= '<link rel="stylesheet" type="text/css" href="'.$this->css_url.$css.'.css" />'."\n"; 
			
		}
		foreach($this->_js_files as $js)
		{
			$custom_head .= '<script language="javascript" type="text/javascript" src="'.$this->js_url.$js.'.js"></script>'."\n"; 
			
			
		}
		unset($this->_css_files);
		unset($this->_css_files);
		if($this->_embadded_css)
		{
		      $custom_head .="\n".'<style type="text/css">'."\n";	
		      $custom_head .=$this->_embadded_css."\n";
		      $custom_head .='</style>';
		      unset($this->_embadded_css);
		}
		
		if($this->_embadded_js)
		{
		      $custom_head .="\n".'<script type="text/javascript">'."\n";	
		      $custom_head .=$this->_embadded_js."\n";
		      $custom_head .='</script>';
		      unset($this->_embadded_js);
		}
		echo  $custom_head."\n";
   }
   
  
 }
?>
