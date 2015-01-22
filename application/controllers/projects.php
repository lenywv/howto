<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');//this is to ensure that ci is running

/*

Project Details
===============
Project Creator: Leny WV
Facebook: http://www.facebook.com/Lenywv11
GitHub: https://github.com/lenywv/howto

This project was originally created as per the request of ECEA, to host details about various 
projects done by ECE students.

You're free to use this code for any project, but you should follow the license given below.

If you need any help with the code, or details about how to install it, feel free
to ping me on Facebook or Twitter. Cheers!

LICENSE:
This project is licensed under GNU GENERAL PUBLIC LICENSE Version 2.
You're free to use this project for any purpose, but you
SHOULD provide the source code of any derivation freely available,
along with the proper attribution to the original project creator.

*/
class Projects extends CI_Controller
{
	public function index($project=null)
	{

		if($project==null||$project=="")
		{
			redirect(base_url(),'location');
		}
		else
		{

			$this->load->model('Project_model');
			if(!is_numeric($project))
			{
				$projectid=$this->Project_model->getId($project);
				if($projectid==0)
				{
					show_404();
				}
			}
			else
			{
				$projectid=$project;
			}
			$projectdata=$this->Project_model->getProject($projectid);
			if($projectdata==null)
			{
				show_404();
			}
			else
			{
				$data['page']='project';
				$data['header_data']=$projectdata['name'];
				$data['project']=$projectdata;
				$this->load->view('template',$data);
			}
		}
	}
}

?>