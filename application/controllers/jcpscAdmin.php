<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class jcpscAdmin extends CI_Controller {




	public function index()
	{
		$this->load->view('admin/include/admin_header');
		$this->load->view('admin/include/admin_left_sidebar');


			$this->db->from('common_details');
    		$this->db->order_by("news_id", "desc");
       		$this->db->limit(10, 0);
			$data['details']  = $this->db->get()->result_array();

		// $data['details'] = $this->db->get('common_details')->result_array();
		

	// 	if($this->input->post('getresult') == ''){
	// 		$page = 0;
	// 	}else{
	// 		$page =  $this->input->post('getresult');
	// 	}
    //     $this->load->model('search');
	// 	$result = $this->search->getPages($page);
		
	// 	$i = 0;
	// 	foreach ($result as $show_data) {
	// 	echo $i++; 
	// 	if ($show_data->showDocument == 0) {

	// 	echo "<tr style='background: #fbe6e6'>
	// 		  <td>".$show_data->news_id."</td>
	// 		  <td class='text-left' style='font-weight: bold'>".$show_data->news_type."</td>
	// 		  <td class='text-left'>".$out = strlen($show_data->news_title_bangla) > 100 ? substr($show_data->news_title_bangla, 0, 100) . "..." : $show_data->news_title_bangla."</td>
	// 		  <td>".$out = strlen($show_data->news_details_bangla) > 100 ? substr($show_data->news_details_bangla, 0, 100) . "..." : $show_data->news_details_bangla."</td>
	// 		  <td class='edit_td' style='padding: 0 !important'><a href=".base_url()."jcpscAdmin/edit?edit=".$show_data->news_id."><i class='fa fa-pencil-square-o'></i></a></td>
	// 		</tr>";
	// 	 } else { 
	// 	echo "<tr>
	// 		<td>".$show_data->news_id."</td>
	// 		<td class='text-left' style='font-weight: bold'>".$show_data->news_type."</td>
	// 		<td class='text-left'>".$out = strlen($show_data->news_title_bangla) > 100 ? substr($show_data->news_title_bangla, 0, 100) . "..." : $show_data->news_title_bangla."</td>
	// 		<td>".$out = strlen($show_data->news_details_bangla) > 100 ? substr($show_data->news_details_bangla, 0, 100) . "..." : $show_data->news_details_bangla."</td>
	// 		<td class='edit_td' style='padding: 0 !important'><a href=".base_url()."jcpscAdmin/edit?edit=".$show_data->news_id."><i class='fa fa-pencil-square-o'></i></a></td>
	// 		</tr>";
	// 	}
	//  }
	//  if ($i == 0) { 
	// echo "<div class='dropDiv classRed'>
	// 	  <p style='text-align:center; color:#FFF;'>
	// 		Sorry ! No Information Found.
	// 	  </p>
	// 	</div>";
	// }

		$this->load->view('admin/setup/index', $data);
		

		$this->load->view('admin/include/admin_footer');
	}


	public function ajax_req()
	{
		$limit = $this->input->post('limit');
		$offset = $this->input->post('offset');
		$table = $this->input->post('table');
		// $event_row=$this->db->select('id')->order_by('id',"desc")->limit(1)->get($table)->row();
		// $last_id = $event_row->id;
		// $offset = $last_id - $offset1;
		// echo $limit;
		// echo $offset;
		if($limit=='' || $offset==''){
			$limit = 10;
			$offset = 0;
		}
			// $this->db->from($table);
    		// $this->db->order_by("id", "desc");
       		// $this->db->limit($limit, $offset);
			// $result = $this->db->get()->result_array();
		if($table == 'common_details'){
			$this->db->order_by("news_id", "desc");
		}else{
			$this->db->order_by("id", "desc");
		}
		$result = $this->db->get($table, $offset, $limit)->result_array();
		$data['view'] = $result;
		echo json_encode($data);
	}




	public function edit()
	{
		$this->load->view('admin/include/admin_header');
		$this->load->view('admin/include/admin_left_sidebar');

		$edit_id = $this->input->get('edit');
		$query = $this->db->select('*')
		->where('news_id', $edit_id)
		->get('common_details');
		$data['edit_data'] = $query->result();

		// var_dump($data);
		// echo $data;
		$this->load->view('admin/setup/edit', $data);

		// $data['details'] = $this->db->get('common_details')->result_array();
        // $this->load->view('admin/setup/index', $data);
		$this->load->view('admin/include/admin_footer');
	}



	public function update()
	{
		$news_id = $this->input->post('news_id');

		$data = array(
			'news_title' => $this->input->post('news_title'),
			'news_title_bangla' => $this->input->post('news_title_bangla'),
			'news_details' => $this->input->post('news_details'),
			'news_details_bangla' => $this->input->post('news_details_bangla'),
			'news_date' => $this->input->post('news_date'),
			'showDocument' => $this->input->post('showDocument'),
			);

		$this->db->where('news_id', $news_id);
		$this->db->update('common_details', $data);
		// echo $news_title ."<br>";
		// echo $news_title_bangla ."<br>";
		// echo $news_details ."<br>";
		// echo $news_details_bangla ."<br>";

		$this->session->set_flashdata('msg', 'Update Successfully !');
		redirect(base_url().'jcpscAdmin/index');
	}


	public function notice_index()
	{
		$this->load->view('admin/include/admin_header');
		$this->load->view('admin/include/admin_left_sidebar');

		$first_date = $this->input->post('first_date');
		$last_date = $this->input->post('last_date');

		if($first_date=='' || $last_date==''){
			$this->db->from('notice');
    		$this->db->order_by("id", "desc");
       		$this->db->limit(10, 0);
			$data['details']  = $this->db->get()->result_array();
			// $data['details'] = $this->db->get("notice", 0, 10)->result_array();
		}else{
			$query = $this->db->select('*')
				->order_by("id", "desc")
				->where('doc >=', $first_date)
				->where('doc <=', $last_date)
				->get('notice');
			
			$data['details'] = $query->result_array();
			// $data['details'] = $this->db->get('notice')->result_array();
		}

		$data['status'] 			= '';
		$data['book_records'] 		= '';
		$data['submit'] 			= false;
		$data['bd_date'] 			= date ('Y-m-d');
		$data['previous_date'] 		= date('Y-m-d', mktime(0, 0, 0, date("m"), date("d") - 30, date("y")));

		$data['class_records'] 		= array('' => 'Select One', 1 => 'Ten', 2 => 'Nine', 3 => 'Eight', 4 => 'Seven', 5 => 'Six');
		$data['writer_records']		= array('' => 'Select One', 1 => 'Writer 01', 2 => 'Writer 02');
		$data['type_records'] 		= array('' => 'Select One', 1 => 'Writer 01', 2 => 'Writer 02');
		$data['category_records'] 	= array('' => 'Select One', 1 => 'Writer 01', 2 => 'Writer 02');

		$this->load->view('admin/setup/notice/index', $data);
		$this->load->view('admin/include/admin_footer');
	}



	public function notice_create()
	{
		$this->load->view('admin/include/admin_header');
		// $this->load->view('admin/include/admin_left_sidebar');

		$data['details'] = $this->db->get('common_details')->result_array();
        $this->load->view('admin/setup/notice/notice_create', $data);
		$this->load->view('admin/include/admin_footer');
	}
	
	
	public function notice_store()
	{
		
		$config['upload_path'] = './uploads/';
	    $config['allowed_types'] = 'gif|jpg|png|csv|xlsx|xlx';
	    $config['max_size'] = '2000';
	    $config['max_width']  = '2200';
	    $config['max_height']  = '1800';
	    $config['overwrite'] = TRUE;
	    $config['encrypt_name'] = FALSE;
	    $config['remove_spaces'] = TRUE;
	    if ( ! is_dir($config['upload_path']) ) die("THE UPLOAD DIRECTORY DOES NOT EXIST");
	    $this->load->library('upload', $config);
	    if ( ! $this->upload->do_upload('attachment')) {
			echo $this->upload->display_errors();
			$error = 1;
	    } else {
			$error = 0;
	        $photo = $this->upload->data();
	        $file_name = $photo['file_name'];
	    }


	    
	    $title_english = $this->input->post('title_english');
		$title_bangla = $this->input->post('title_bangla');
		$des_english = $this->input->post('des_english');
		$des_bangla = $this->input->post('des_bangla');
		$notice_date = $this->input->post('notice_date');
		$publish_date = $this->input->post('publish_date');
		$publish_time = $this->input->post('publish_time');
		$showDocument = $this->input->post('showDocument');
		$notice_publish_date_time = $publish_date."-".$publish_time;
		$creator = $this->input->post('creator');
		if($error === 1){
			$attachment = '0';
		}else{
			$attachment = $file_name;
		}


		$data = array();
		$data = ['title_english' => $title_english, 'title_bangla' => $title_bangla, 'des_english' => $des_english, 'des_bangla' => $des_bangla, 'attachment' => $attachment, 'notice_date' => $notice_date, 'notice_publish_date_time' => $notice_publish_date_time, 'creator' => $creator, 'showDocument' => $showDocument];
		$this->db->insert('notice', $data);


	}


	public function notice_print()
	{    
		$publish_date = $this->input->post('publish_date');
		$publish_time = $this->input->post('publish_time');
		$notice_publish_date_time = $publish_date."-".$publish_time;


		$data['notice_info'] = array(
			'title_english' => $this->input->post('title_english'),
			'title_bangla' => $this->input->post('title_bangla'),
			'des_english' => $this->input->post('des_english'),
			'des_bangla' => $this->input->post('des_bangla'),
			'notice_date' => $this->input->post('notice_date'),
			'showDocument' => $this->input->post('showDocument'),
			'notice_publish_date_time' => $this->input->post('notice_publish_date_time'),
			'creator' => $this->input->post('creator'),
			);


			$this->load->view('admin/setup/notice/notice_print', $data);


	}



	public function notice_store_and_print()
	{
		$config['upload_path'] = './uploads/';
	    $config['allowed_types'] = 'gif|jpg|png|csv|xlsx|xlx';
	    $config['max_size'] = '2000';
	    $config['max_width']  = '2200';
	    $config['max_height']  = '1800';
	    $config['overwrite'] = TRUE;
	    $config['encrypt_name'] = FALSE;
	    $config['remove_spaces'] = TRUE;
	    if ( ! is_dir($config['upload_path']) ) die("THE UPLOAD DIRECTORY DOES NOT EXIST");
	    $this->load->library('upload', $config);
	    if ( ! $this->upload->do_upload('attachment')) {
			// echo $this->upload->display_errors();
			$error = 1;
	    } else {
			$error = 0;
	        $photo = $this->upload->data();
	        $file_name = $photo['file_name'];
	    }


	    
	    $title_english = $this->input->post('title_english');
		$title_bangla = $this->input->post('title_bangla');
		$des_english = $this->input->post('des_english');
		$des_bangla = $this->input->post('des_bangla');
		$notice_date = $this->input->post('notice_date');
		$publish_date = $this->input->post('publish_date');
		$publish_time = $this->input->post('publish_time');
		$showDocument = $this->input->post('showDocument');
		$notice_publish_date_time = $publish_date."-".$publish_time;
		$creator = $this->input->post('creator');
		if($error === 1){
			$attachment = '0';
		}else{
			$attachment = $file_name;
		}


		$data = array();
		$data = ['title_english' => $title_english, 'title_bangla' => $title_bangla, 'des_english' => $des_english, 'des_bangla' => $des_bangla, 'attachment' => $attachment, 'notice_date' => $notice_date, 'notice_publish_date_time' => $notice_publish_date_time, 'creator' => $creator, 'showDocument' => $showDocument];
		$this->db->insert('notice', $data);


		    $data['notice_info'] = array(
			'title_english' => $title_english,
			'title_bangla' => $title_bangla,
			'des_english' => $des_english,
			'des_bangla' => $des_bangla,
			'notice_date' => $notice_date,
			'notice_publish_date_time' => $notice_publish_date_time,
			'creator' => $creator,
			'showDocument' => $this->input->post('showDocument'),
			'file_name' => $attachment,
			);
			$this->load->view('admin/setup/notice/notice_print', $data);
	}


	public function notice_edit()
	{
		$this->load->view('admin/include/admin_header');
		$this->load->view('admin/include/admin_left_sidebar');

		$edit_id = $this->input->get('edit');
		$query = $this->db->select('*')
		->where('id', $edit_id)
		->get('notice');
		$data['edit_data'] = $query->result();
		$this->load->view('admin/setup/notice/edit', $data);

		$this->load->view('admin/include/admin_footer');
	}



	public function notice_update()
	{
		$error = 0;

		$config['upload_path'] = './uploads/';
	    $config['allowed_types'] = 'gif|jpg|png|csv|xlsx|xlx';
	    $config['max_size'] = '2000';
	    $config['max_width']  = '2200';
	    $config['max_height']  = '1800';
	    $config['overwrite'] = TRUE;
	    $config['encrypt_name'] = FALSE;
	    $config['remove_spaces'] = TRUE;
	    if ( ! is_dir($config['upload_path']) ) die("THE UPLOAD DIRECTORY DOES NOT EXIST");
	    $this->load->library('upload', $config);
	    if ( ! $this->upload->do_upload('attachment')) {
			// echo $this->upload->display_errors();
			$error = 1;
	    } else {

	        $photo = $this->upload->data();
	        $file_name = $photo['file_name'];
		}
		
		$notice_id = $this->input->post('notice_id');
		$file_url = $this->input->post('file_url');

		$publish_date = $this->input->post('publish_date');
		$publish_time = $this->input->post('publish_time');
		$notice_publish_date_time = $publish_date."-".$publish_time;
		
		if($error === 1){
			$attachment = $file_url;
		}else{
			$attachment = $file_name;
		}
		$data = array(
			'title_english' => $this->input->post('title_english'),
			'title_bangla' => $this->input->post('title_bangla'),
			'des_english' => $this->input->post('des_english'),
			'des_bangla' => $this->input->post('des_bangla'),
			'notice_date' => $this->input->post('notice_date'),
			'notice_publish_date_time' => $notice_publish_date_time,
			'creator' => $this->input->post('creator'),
			'showDocument' => $this->input->post('showDocument'),
			'attachment' => $attachment,
			);

		$this->db->where('id', $notice_id);
		$this->db->update('notice', $data);

		$this->session->set_flashdata('msg', 'Update Successfully !');
		redirect(base_url().'jcpscAdmin/notice_index');
	}




	public function notice_update_and_print()
	{
		$error = 0;

		$config['upload_path'] = './uploads/';
	    $config['allowed_types'] = 'gif|jpg|png|csv|xlsx|xlx';
	    $config['max_size'] = '2000';
	    $config['max_width']  = '2200';
	    $config['max_height']  = '1800';
	    $config['overwrite'] = TRUE;
	    $config['encrypt_name'] = FALSE;
	    $config['remove_spaces'] = TRUE;
	    if ( ! is_dir($config['upload_path']) ) die("THE UPLOAD DIRECTORY DOES NOT EXIST");
	    $this->load->library('upload', $config);
	    if ( ! $this->upload->do_upload('attachment')) {
			// echo $this->upload->display_errors();
			$error = 1;
	    } else {

	        $photo = $this->upload->data();
	        $file_name = $photo['file_name'];
		}
		
		$notice_id = $this->input->post('notice_id');
		$file_url = $this->input->post('file_url');

		$publish_date = $this->input->post('publish_date');
		$publish_time = $this->input->post('publish_time');
		$notice_publish_date_time = $publish_date."-".$publish_time;
		
		if($error === 1){
			$attachment = $file_url;
		}else{
			$attachment = $file_name;
		}
		$data = array(
			'title_english' => $this->input->post('title_english'),
			'title_bangla' => $this->input->post('title_bangla'),
			'des_english' => $this->input->post('des_english'),
			'des_bangla' => $this->input->post('des_bangla'),
			'notice_date' => $this->input->post('notice_date'),
			'notice_publish_date_time' => $notice_publish_date_time,
			'creator' => $this->input->post('creator'),
			'showDocument' => $this->input->post('showDocument'),
			'attachment' => $attachment,
			);

		$this->db->where('id', $notice_id);
		$this->db->update('notice', $data);

		// $this->session->set_flashdata('msg', 'Update Successfully !');
		// redirect(base_url().'jcpscAdmin/notice_index');

		$value['notice_info'] = $data;

		$this->load->view('admin/setup/notice/notice_print', $value);
	}

	//Event 

	public function event_index()
	{
		$this->load->view('admin/include/admin_header');
		$this->load->view('admin/include/admin_left_sidebar');

		$first_date = $this->input->post('first_date');
		$last_date = $this->input->post('last_date');

		if($first_date=='' || $last_date==''){
			$this->db->from('event');
    		$this->db->order_by("id", "desc");
       		$this->db->limit(10, 0);
			$data['details']  = $this->db->get()->result_array();
			//var_dump($dataa);
			// $data['details'] = $this->db->get("event", 0, 10)->result_array();
		}else{
			$query = $this->db->select('*')
				->where('doc >=', $first_date)
				->where('doc <=', $last_date)
				->get('event');
			
			$data['details'] = $query->result_array();
			// $data['details'] = $this->db->get('notice')->result_array();
		}

		$this->load->view('admin/setup/event/index', $data);
		$this->load->view('admin/include/admin_footer');
	}

	public function event_create()
	{
		$this->load->view('admin/include/admin_header');
		$this->load->view('admin/include/admin_left_sidebar');

		$data['details'] = $this->db->get('common_details')->result_array();
        $this->load->view('admin/setup/event/event_create', $data);
		$this->load->view('admin/include/admin_footer');
	}




	public function event_store()
	{
		$title_english = $this->input->post('title_english');
		$title_bangla = $this->input->post('title_bangla');
		$des_english = $this->input->post('des_english');
		$des_bangla = $this->input->post('des_bangla');
		$event_date = $this->input->post('event_date');
		$showDocument = $this->input->post('showDocument');


		$event_row=$this->db->select('id')->order_by('id',"desc")->limit(1)->get('event')->row();
		$event_id = $event_row->id + 1;

		$this->load->library('upload');
		$image = array();
		$img_title = $this->input->post('img_title');
		$img_des = $this->input->post('img_des');
		$ImageCount = count($_FILES['img']['name']);
        for($i = 0; $i < $ImageCount; $i++){

			$last_row=$this->db->select('id')->order_by('id',"desc")->limit(1)->get('event_img')->row();
			$new_id = $last_row->id + 1;

            $_FILES['file']['name']       = $_FILES['img']['name'][$i];
            $_FILES['file']['type']       = $_FILES['img']['type'][$i];
            $_FILES['file']['tmp_name']   = $_FILES['img']['tmp_name'][$i];
            $_FILES['file']['error']      = $_FILES['img']['error'][$i];
            $_FILES['file']['size']       = $_FILES['img']['size'][$i];

            // File upload configuration
            $uploadPath = './event_img/';
            $config['upload_path'] = $uploadPath;
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			$config['max_size'] = '4000';
			$config['max_width']  = '2200';
			$config['max_height']  = '1800';
			$config['overwrite'] = TRUE;
			$config['remove_spaces'] = TRUE;
			$name = $new_id;
			$dname = explode(".", $_FILES['file']['name']);
			$ext = end($dname);
			$new_name = $name.'.'.$ext;
			$config['file_name'] = $new_name;

            // Load and initialize upload library
            $this->load->library('upload', $config);
			$this->upload->initialize($config);
			
            // Upload file to server
            if($this->upload->do_upload('file')){
                // Uploaded file data
				$imageData = $this->upload->data();
				$query['path'] = $imageData['full_path'];
				$query['width'] = 200;
				$query['height'] = 115;
				$this->resizeImage($query);
				$new_ext = $ext;
			}else{
				$new_ext = $this->upload->display_errors();
				echo $this->upload->display_errors();
			}
			
			$img_des1 = $img_des[$i];
			$img_title1 = $img_title[$i];

			$data = array();
			$data = ['event_id' => $event_id, 'img_title' => $img_title1, 'img_des' => $img_des1, 'img' => $new_ext];
			$this->db->insert('event_img', $data);

		}

		$data = array();
		$data = ['title_english' => $title_english, 'title_bangla' => $title_bangla, 'des_english' => $des_english, 'des_bangla' => $des_bangla, 'event_date' => $event_date, 'showDocument' => $showDocument, 'dom' => "not edit"];
		$this->db->insert('event', $data);

		$this->session->set_flashdata('msg', 'Event Create Successfully !');
		redirect(base_url().'jcpscAdmin/event_index');

	}


	public function event_edit()
	{
		$this->load->view('admin/include/admin_header');
		$this->load->view('admin/include/admin_left_sidebar');

		$edit_id = $this->input->get('edit');
		$query = $this->db->select('*')
		->where('id', $edit_id)
		->get('event');
		$data['edit_data'] = $query->result();
		
		$q = $this->db->select('*')
		->where('event_id', $edit_id)
		->get('event_img');
		$data['edit_img_data'] = $q->result();
		
		$this->load->view('admin/setup/event/edit', $data);
		
		$this->load->view('admin/include/admin_footer');
	}

	// $new_name = time().$_FILES["userfiles"]['name'];
	// $config['file_name'] = $new_name;

	public function event_update()
	{
		$event_id = $this->input->post('event_id');
		
		$this->load->library('upload');
		$image = array();
		$img_title = $this->input->post('img_title');
		$img_des = $this->input->post('img_des');
		$ImageCount = count($_FILES['img']['name']);
        for($i = 0; $i < $ImageCount; $i++){

			$last_row=$this->db->select('id')->order_by('id',"desc")->limit(1)->get('event_img')->row();
			$new_id = $last_row->id + 1;

            $_FILES['file']['name']       = $_FILES['img']['name'][$i];
            $_FILES['file']['type']       = $_FILES['img']['type'][$i];
            $_FILES['file']['tmp_name']   = $_FILES['img']['tmp_name'][$i];
            $_FILES['file']['error']      = $_FILES['img']['error'][$i];
            $_FILES['file']['size']       = $_FILES['img']['size'][$i];

            // File upload configuration
            $uploadPath = './event_img/';
            $config['upload_path'] = $uploadPath;
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			$config['max_size'] = '2000';
			$config['max_width']  = '2200';
			$config['max_height']  = '1800';
			$config['overwrite'] = TRUE;
			$config['remove_spaces'] = TRUE;
			$name = $new_id;
			$dname = explode(".", $_FILES['file']['name']);
			$ext = end($dname);
			$new_name = $name.'.'.$ext;
			$config['file_name'] = $new_name;

            // Load and initialize upload library
            $this->load->library('upload', $config);
			$this->upload->initialize($config);
			
            // Upload file to server
            if($this->upload->do_upload('file')){
                // Uploaded file data
				$imageData = $this->upload->data();
				$query['path'] = $imageData['full_path'];
				$query['width'] = 200;
				$query['height'] = 115;
				$this->resizeImage($query);
				$new_ext = $ext;
			}else{
				$filename = $this->upload->display_errors();
			}
			
			$img_des1 = $img_des[$i];
			$img_title1 = $img_title[$i];

			$data = array();
			$data = ['event_id' => $event_id, 'img_title' => $img_title1, 'img_des' => $img_des1, 'img' => $new_ext];
			$this->db->insert('event_img', $data);

		}

		$data = array(
			'title_english' => $this->input->post('title_english'),
			'title_bangla' => $this->input->post('title_bangla'),
			'des_english' => $this->input->post('des_english'),
			'des_bangla' => $this->input->post('des_bangla'),
			'event_date' => $this->input->post('event_date'),
			'showDocument' => $this->input->post('showDocument'),
			);

		$this->db->where('id', $event_id);
		$this->db->update('event', $data);

		$this->session->set_flashdata('msg', 'Event Update Successfully !');
		redirect(base_url().'jcpscAdmin/event_index');
	}


	public function deleteImg()
	{
		$id = $this->input->post('id');
		$path = $this->input->post('path');
		$filename= base_url()."event_img/".$path;
		if (file_exists($filename))
        {
            unlink($filename);
        }
		$this->db->where('id', $id);
		$this->db->delete('event_img');
		echo json_decode($id);
	}





	function resizeImage($data)
	{
		$cropConfig['image_library'] = 'gd2';
		$cropConfig['source_image'] = $data['path'];
		$cropConfig['create_thumb'] = TRUE;
		$cropConfig['maintain_ratio'] = TRUE;
		$cropConfig['width'] = $data['width'];
		$cropConfig['height'] = $data['height'];
		$cropConfig['new_image'] = './thumbnail/';

		$this->load->library('image_lib');
		$this->image_lib->clear();
		$this->image_lib->initialize($cropConfig);
		$this->image_lib->resize();
	}


}
