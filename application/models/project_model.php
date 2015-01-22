<?php
class Project_model extends CI_Model
{
	function _construct()
	{
		parent::_construct();
	}

	function getId($url)
	{
		$url= (strlen($url)>30)?substr($answer,0,30):$url;
		$url= strtolower($url);
		$url= preg_replace("/[^a-z0-9\-]/", "", $url);
		$sql="SELECT id FROM project WHERE url=?";
		$query=$this->db->query($sql,$url);
		if($query->num_rows()>0)
		{
			$row=$query->row();
			$id=$row->id;
			return $id;
		}
		else
		{
			return 0;
		}
	}

	function getProject($id)
	{
		$id= (strlen($id)>11)?substr($id,0,11):$id;
		$sql= "SELECT userid,name,content,views,created,validate FROM project where id= ?";
		$query= $this->db->query($sql,$id);
		if($query->num_rows>0)
		{
			$row=$query->row();
			$validate=$row->validate;
			if($validate==0)
			{
				return null;
			}
			else
			{
				$projectdata['userid']=$row->userid;
				$projectdata['name']=$row->name;
				$projectdata['content']=$row->content;
				$projectdata['views']=$row->content;//not yet implemented
				$projectdata['created']=$row->created;
			}
		}
		else
		{
			return null;
		}
	}
}