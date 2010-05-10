<?php
/*
 * Created on Mar 9, 2010
 * Created By Arena development team (@Reza Ahmed)
 *  
 */
 class MyCI_Model extends Model
 {
 	var $table; //contain table name
 	
 	function __construct()
 	{
 		parent::Model();
 		
 	}
 	
	function f($flield,$id,$table='')
	{
		$table=empty($table)?$this->table:$table;
		$this->db->select($flield);
		$this->db->from($table);
		$this->db->where('id',$id);
	    $query=$this->db->get();
	    $row=$query->result_array();
	    if(count($row[0])==1)
	    return $row[0][$flield];
	    else
	    return $row[0];
	}
	
	function get_row($table='')
	{
		$table=empty($table)?$this->table:$table;
		$query=$this->db->get($table);
		$rows=$query->result_array();
		if($rows)
		{
			return array_pop($rows);
		}
		else
		{
			return array();
		}
	}
	
	function get_assoc($table='')
	{
		$data=array();
		$table=empty($table)?$this->table:$table;
		$query=$this->db->get($table);
		$rows=$query->result_array();
		if(is_array($rows))
		{
			foreach($rows as $row)
 			{
				$temp=each($row);
				$num=count($row);
				if($num==1)
				{
					$data[$temp['value']]=$temp['value'];
				}
				elseif($num==2)
				{
					$data[$temp['value']]=array_pop($row);
				}
				else
				{
					$data[$temp['value']]=$row;
				}
 			}
 			return $data; 	
			
		}
	}
	
	function get_one($table='')
	{
		$row=$this->get_row($table);
		return array_pop($row);
	}
	
	function curdate()
	{
		return date("Y-m-d h:i:s");
	}
	
	function del_row($id)
	{
			$this->db->delete($this->table,array('id'=>$id));
		
	}
	function option_list($fields=array(),$tbl='',$where='')
	{
			if(is_array($fields))
			{
				$this->db->select(implode(',',$fields));
			}
			else
			{
				$this->db->select('id,'.$fields);
			}
			if($where)
			{
				$this->db->where($where);
			}
			return $this->get_assoc($tbl);	
	}
 }
?>
