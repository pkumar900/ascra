<?php

defined('BASEPATH') OR exit('No direct script access allowed');

function dashboard($view,$data='')
{
	$ci =& get_instance();
	$ci->load->view('dashboard/header',$data);
	$ci->load->view('dashboard/topbar',$data);
	$ci->load->view('dashboard/leftsidebar',$data);
	$ci->load->view('dashboard/rightsidebar',$data);
	$ci->load->view($view,$data);
	$ci->load->view('dashboard/footer',$data);
	
}

function template($view,$data='')
{
	$ci =& get_instance();
	$ci->load->view('templates/header',$data);
	$ci->load->view('templates/topbar',$data);
	$ci->load->view('templates/leftsidebar',$data);
	$ci->load->view('templates/rightsidebar',$data);
	$ci->load->view($view,$data);
	$ci->load->view('templates/footer',$data);
	
}