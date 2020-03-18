<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

	class Library extends CI_controller{
		
		private $cur_bd_date;
		
		public function __construct()
		{
	        parent::__construct();
	
			date_default_timezone_set('Asia/Dhaka');
			$this->cur_bd_date = date('Y-m-d');
			//$this->load->library(array('tank_auth', 'form_validation'));
			$this->output->set_header("Expires: Thu, 19 Nov 1981 08:52:00 GMT");
			$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
			//$this->is_logged_in();
			$this->load->helper(array('url', 'form'));
			$this ->load-> model('library_model');
		}
		
		public function index()
		{
			redirect('library/search_book');
			//echo 'Welcome';
		}
		
		public function search_book()
		{
			$data['status'] 			= '';
			$data['book_records'] 		= '';
			$data['submit'] 			= false;
			$data['bd_date'] 			= date ('Y-m-d');
			$data['previous_date'] 		= date('Y-m-d', mktime(0, 0, 0, date("m"), date("d") - 30, date("y")));
			//$data['user_type'] 			= $this->tank_auth->get_usertype();
			//$data['user_name'] 			= $this->tank_auth->get_username();

			$data['class_records'] 		= array('' => 'Select One', 1 => 'Ten', 2 => 'Nine', 3 => 'Eight', 4 => 'Seven', 5 => 'Six');
			$data['writer_records']		= array('' => 'Select One', 1 => 'Writer 01', 2 => 'Writer 02');
			$data['type_records'] 		= array('' => 'Select One', 1 => 'Writer 01', 2 => 'Writer 02');
			$data['category_records'] 	= array('' => 'Select One', 1 => 'Writer 01', 2 => 'Writer 02');

			$data['main_content'] 		= 'admin/library/search_book';
			$data['tricker_content'] 	= 'admin/include/admin_left_sidebar';
			$this->load->view('admin/include/admin_template',$data);
		}
		
		function db_check(){
			$result = $this->library_model->demo_check();
			print_r($result);
		}
	}/* end of library class */