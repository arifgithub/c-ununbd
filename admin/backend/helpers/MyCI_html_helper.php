<?php 

 function html_options($opts,$selected)
 {
 	$html="";
 	if(is_array($opts))
 	{
 	 $selected = is_array($selected)? $selected: array($selected); 	 
 	 foreach($opts as $key=>$val){
      if( in_array($key,$selected))
      $html .= "<option  selected value='$key'>$val</option>";
      else
      $html .= "<option  value='$key'>$val</option>";   
    }
 		return $html;
 	}
 	
 }
 
 
 function html_menu_options($menu_data,$sel=array())
 {
 	$CI= &get_instance();
 	$CI->temp_menu_data=$menu_data;
 	$CI->temp_html_menu_option="";
 	$sel = is_array($sel)? $sel: array($sel);
 	foreach($CI->temp_menu_data as $id=>$menu)
 	{
 		if($menu['parent_id']==0)
 		{
			if(in_array($id,$sel))
				$CI->temp_html_menu_option .="<option value='$id' selected class='op'>".$menu['title']."</option>";
			else
				$CI->temp_html_menu_option .="<option value='$id' class='op'>".$menu['title']."</option>";
		
				unset($CI->temp_menu_data[$id]);
				$CI->temp_menu_data=array_filter($CI->temp_menu_data);
				if($menu['child_id'])
			html_child_menu_options($id,0,$sel);
 		}		
	}
	$html=$CI->temp_html_menu_option;
	unset($CI->temp_html_menu_option);
	unset($CI->temp_menu_data);
	return $html;
 }	
	
	function html_child_menu_options($pid,$depth,$sel){
		$depth++;
		$CI= &get_instance();
		$sel = is_array($sel)? $sel: array($sel);
		foreach($CI->temp_menu_data as $id=>$menu)
		{
			if($pid==$menu['parent_id'])
			{
				if(in_array($id,$sel))
				$CI->temp_html_menu_option .="<option class='oc' selected value='$id'>".str_repeat(" &#187",$depth)." ".$menu['title']."</option>";
				else
				$CI->temp_html_menu_option .="<option class='oc' value='$id'>".str_repeat(" &#187",$depth)." ".$menu['title']."</option>";
				unset($CI->temp_menu_data[$id]);
				$CI->temp_menu_data=array_filter($CI->temp_menu_data);
				if($menu['child_id'])
				html_child_menu_options($id,$depth,$sel);
			}	
		 }
 	}
 	
 	function menu_leftmenu($cat_tree)
 	{
 		
 		$CI= &get_instance();
 		$CI->temp_html_menu_option="<ul>";
 		$url=site_url();
 		foreach($cat_tree as $pid=>$menu)
 		{
 			if(is_array($menu['child']))
 			{
				$CI->temp_html_menu_option .="<li class='parent'><a href='$url/search/cat_search/null/$pid'>".$menu['title']."</a><ul>";
				child_menu_leftmenu($menu['child'],0);
				$CI->temp_html_menu_option .="</li></ul>";
 			}	
			else
			$CI->temp_html_menu_option .="<li class='child'><a href='$url/search/cat_search/null/$pid'>".$menu['title']."</a></li>";
		}
		$html=$CI->temp_html_menu_option.'</ul>';
		unset($CI->temp_html_menu_option);
		return $html;
 		
 	}
 	
	function child_menu_leftmenu($menu_data,$depth){
		$depth++;
		$CI= &get_instance();
		$url=site_url();
		foreach($menu_data as $pid=>$menu){
			if(is_array($menu['child']))
 			{
				$CI->temp_html_menu_option .="<li class='parent'><a href='$url/search/cat_search/null/$pid'>".$menu['title']."</a><ul>";
				child_menu_leftmenu($menu['child'],0);
				$CI->temp_html_menu_option .="</ul></li>";
 			}	
			else
			$CI->temp_html_menu_option .="<li class='child'><a href='$url/search/cat_search/null/$pid'>".$menu['title']."</a></li>";
		}
 	}
 	
 	function show_ad($cat_id)
 	{
 		 $CI= &get_instance();
 		 $CI->load->model('Admodel');
 		 $cat_id=empty($cat_id)?1:$cat_id;
 		 $ads=$CI->Admodel->get_ad_by_cat($cat_id);
 		 foreach($ads as $ad)
 		 {
 		 	$img_url=base_url().'/uploads/ad_images/'.$ad['file_name'];
 		 	$html .="<a href='http://".$ad['url']."' ><img src='$img_url' alt='".$ad['title']."'/></a> ";
 		 }
 		 
 		 echo $html;
 	} 	
 	
 	function printr($var)
 	{
 		echo "<pre>";
 		print_r($var);
 		echo "</pre>";
 		
 	}
?>