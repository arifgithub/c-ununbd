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
 
 
 function html_menu_options($cat_tree,$sel=array())
 {
 	$CI= &get_instance();
 	$CI->temp_html_menu_option="";
 	$sel = is_array($sel)? $sel: array($sel);
 	foreach($cat_tree as $pid=>$menu)
 	{
		if(in_array($pid,$sel))
		$CI->temp_html_menu_option .="<option value='$pid' selected class='op'>".$menu['title']."</option>";
		else
		$CI->temp_html_menu_option .="<option value='$pid' class='op'>".$menu['title']."</option>";
		if(array_key_exists('child',$menu))
		html_child_menu_options($menu['child'],0,$sel);
	}
	$html=$CI->temp_html_menu_option;
	unset($CI->temp_html_menu_option);
	return $html;
 }	
	
	function html_child_menu_options($menu_data,$depth,$sel){
		$depth++;
		$CI= &get_instance();
		$sel = is_array($sel)? $sel: array($sel);
		foreach($menu_data as $pid=>$menu){
			if(in_array($pid,$sel))
			$CI->temp_html_menu_option .="<option class='oc' selected value='$pid'>".str_repeat(" &#187",$depth)." ".$menu['title']."</option>";
			else
			$CI->temp_html_menu_option .="<option class='oc' value='$pid'>".str_repeat(" &#187",$depth)." ".$menu['title']."</option>";
			if(array_key_exists('child',$menu))
			html_child_menu_options($menu['child'],$depth,$sel);
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
				$CI->temp_html_menu_option .="<li><a href='$url/search/cat_search/null/$pid'  class='sub'>".$menu['title']."</a><ul>";
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

///--------------------------------------------------------------------------------------------------------------------
function createDays($id='day_select', $selected=null)
    {
        /*** range of days ***/
        $r = range(1, 31);

        /*** current day ***/
        $selected = is_null($selected) ? date('d') : $selected;

        $select = "<select name=\"$id\" id=\"$id\">\n";
	$select .= "<option value='-1' selected>day</option>";
        foreach ($r as $day)
        {
            $select .= "<option value=\"$day\"";
            $select .= ($day==$selected) ? ' selected="selected"' : '';
            $select .= ">$day</option>\n";
        }
        $select .= '</select>';
        return $select;
    }
//---------------------------------------------------------------------------------------------------------------------
function createMonths($id='month_select', $selected=null)
    {
        /*** array of months ***/
        $months = array(
                1=>'January',
                2=>'February',
                3=>'March',
                4=>'April',
                5=>'May',
                6=>'June',
                7=>'July',
                8=>'August',
                9=>'September',
                10=>'October',
                11=>'November',
                12=>'December');

        /*** current month ***/
        $selected = is_null($selected) ? date('m') : $selected;

        $select = '<select name="'.$id.'" id="'.$id.'">'."\n";
	$select .= "<option value='-1' selected>month</option>";
        foreach($months as $key=>$mon)
        {
            $select .= "<option value=\"$key\"";
            $select .= ($key==$selected) ? ' selected="selected"' : '';
            $select .= ">$mon</option>\n";
        }
        $select .= '</select>';
        return $select;
    }

//---------------------------------------------------------------------------------------------------------------------
function createYears($start_year, $end_year, $id='year_select', $selected=null)
    {

        /*** the current year ***/
        $selected = is_null($selected) ? date('Y') : $selected;

        /*** range of years ***/
        $r = range($start_year, $end_year);

        /*** create the select ***/
        $select = '<select name="'.$id.'" id="'.$id.'">';
	$select .= "<option value='-1' selected>year</option>";
        foreach( $r as $year )
        {
            $select .= "<option value=\"$year\"";
            $select .= ($year==$selected) ? ' selected="selected"' : '';
            $select .= ">$year</option>\n";
        }
        $select .= '</select>';
        return $select;
    }

//------------------------------------------------------------------------------------
function selectCombo($id='option_select',$options,$def_val='Select',$selected=null)
{
	$select = '<select name="'.$id.'" id="'.$id.'">'."\n";
	$select .= "<option value='-1' selected>$def_val</option>";
        foreach($options as $key=>$val)
        {
            $select .= "<option value=\"$key\"";
            $select .= ($key==$selected) ? ' selected="selected"' : '';
            $select .= ">$val</option>\n";
        }
        $select .= '</select>';
       return $select;
}
//------------------------------------------------------------------------------------
/**
 * Get value from array type post element
 * 
 * Author: S. M. ARIFUL ISLAM
 *
 * @access	public
 * @param	string  field_name    the field name
 * @param	string  index         field offset/index
 * @return	string
 */	
function set_post_value($field_name, $index="", $default='')
{
	if(isset($_POST[$field_name]) && is_array($_POST[$field_name])){
		return $_POST[$field_name][$index];
	}elseif(isset($_POST[$field_name])){
		return $_POST[$field_name];
	}else{
		return $default;
	}
}
/**
 * Get date string from multiple(3) combo input field as.
 * NOTE: Must name the combo fields as year, month, day - after the prefix
 * 
 * Author: S. M. ARIFUL ISLAM
 *
 * @access	public
 * @param	string  field_name_prefix    the combo field name prefix 
 * @param	string  index                field offset/index
 * @return	string
 */	
function get_date_string_from_combo($field_name_prefix, $index="")
{
	$str = "";
	$str .= sprintf( "%04d", set_post_value("{$field_name_prefix}year", $index) )."-";
	$str .= sprintf( "%02d", set_post_value("{$field_name_prefix}month", $index) )."-";
	$str .= sprintf( "%02d", set_post_value("{$field_name_prefix}day", $index) );
	return $str;
}
//------------------------------------------------------------------------------------
?>
