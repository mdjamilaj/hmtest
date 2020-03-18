$(function(){
	/* start: select2 		*/
	$('.select2_entry_type').select2({
		placeholder 	: 'Select Entry Type',
		allowClear 		: true
	});

	$('.select2_writer').select2({
		placeholder 	: 'Select Writer',
		allowClear 		: true
	});
	$('.select2_class_code').select2({
		placeholder 	: 'Select Class',
		allowClear 		: true
	});
	$('.select2_type').select2({
		placeholder 	: 'Select Type',
		allowClear 		: true
	});
	$('.select2_category').select2({
		placeholder 	: 'Select Category',
		allowClear 		: true
	});

	$('.select2_session_code').select2({
		placeholder 	: 'Select Session',
		allowClear 		: true
	});
	$('.select2_section_code').select2({
		placeholder 	: 'Select Section',
		allowClear 		: true
	});
	$('.select2_shift_code').select2({
		placeholder 	: 'Select Shift',
		allowClear 		: true
	});
	$('.select2_group_code').select2({
		placeholder 	: 'Select Group',
		allowClear 		: true
	});
	/* end: select2 		*/

	 // $('.data_table_writer_category_type').DataTable();

	/* Date Picker*/
		$('#return_date').daterangepicker({
			    singleDatePicker    : true,
			    calender_style      : "picker_1",
			}, function (start, end, label) {
		    console.log(start.toISOString(), end.toISOString(), label);
		});
	/* end of datepicker */

	/*Start: form submit */
	$('#book_entry_form').on('click', '#book_entry_btn', function(ev){
		
		var book_title 		= $("[name='book_title']").val();
		var writer_id 		= $("[name='writer_id']").val();
		var class_code 		= $(".select2_class_code").val();
		var book_quantity 	= $("[name='book_quantity']").val();

		if(book_title == '' && writer_id == '' && class_code == '' && book_quantity == ''){
			ev.preventDefault();
			alert('Plz fillup the form');
		}
		else{
			// ev.preventDefault();
			// alert('Plz fillup the form');
			//var url = $(this).attr('action');
			//$(location).attr('href', url);
			//window.open(url, '_blank');

			setTimeout(function(){

				$('#book_entry_form').trigger('reset');
				$(".select2_category").select2("val", "All");
				$(".select2_type").select2("val", "All");
				$(".select2_writer").select2("val", "All");
				$(".select2_class_code").select2("val", "All");

			}, 2000);
		}

	});	// end of book_entry_form

	$('#book_search_form').on('submit', function(ev){
		var book_title 		= $("[name='book_title']").val();
		var writer_id 		= $("[name='writer_id']").val();
		// var class_code 		= $("[name='class_code']").val();
		var class_code 		= $(".select2_class").val();
		var category_code 	= $("[name='category_code']").val();
		var type_code 		= $("[name='type_code']").val();

		//alert('name: ' + book_title + 'writer_id: ' + writer_id + 'class_code: ' + class_code +'category_code: ' + category_code + 'type_code:' + type_code);
		if(book_title == '' && writer_id == '' && class_code == '' && category_code == '' && type_code == ''){
			// ev.preventDefault();
			// alert('Plz fill up at lest one gap.');
		}

	});// end of book_search_form

	$('#borrower_entry_form').on('submit', function(ev){
		ev.preventDefault();

		var class_code 		= $('.select2_class_code').val();
		var session_code 	= $('.select2_session_code').val();
		var section_code 	= $('.select2_section_code').val();
		var shift_code 		= $('.select2_shift_code').val();
		var gruop_code 		= $('.select2_group_code').val();
		var roll 			= $('.std_roll').val();

		//var log = class_code + '<>' +session_code + '<>' +section_code + '<>' +shift_code + '<>' +gruop_code + '<>' +roll; 
		//alert(log);

		if(class_code == '')class_code 		= 'null';
		if(session_code == '')session_code 	= 'null';
		if(section_code == '')section_code 	= 'null';
		if(shift_code == '')shift_code 		= 'null';
		if(gruop_code == '')gruop_code 		= 'null';
		if(roll == '')roll 					= 'null';

		if(class_code != 'null' && session_code != 'null'){
			var url = $(this).attr('action');
			url += '/' + class_code + '/' + session_code + '/' + section_code + '/' + shift_code + '/' + gruop_code + '/' + roll;
			$(location).attr('href', url);
			//location.reload();
			//window.open(url, '_blank');
			
		}
		else{
			alert('Plz fill up the form!!!');
		}

	});// end of borrower_entry_form

	$('#lending_entry_form').on('submit', function(ev){
		ev.preventDefault();

		var class_code 		= $('.select2_class_code').val();
		var session_code 	= $('.select2_session_code').val();
		var section_code 	= $('.select2_section_code').val();
		var shift_code 		= $('.select2_shift_code').val();
		var gruop_code 		= $('.select2_group_code').val();
		var roll 			= $('.std_roll').val();

		if(class_code == '')class_code 		= 'null';
		if(session_code == '')session_code 	= 'null';
		if(section_code == '')section_code 	= 'null';
		if(shift_code == '')shift_code 		= 'null';
		if(gruop_code == '')gruop_code 		= 'null';
		if(roll == '')roll 					= 'null';

		// var log = class_code + '<>' +session_code + '<>' +section_code + '<>' +shift_code + '<>' +gruop_code + '<>' +roll; 
		// alert(log);

		if(class_code == 'null' || session_code == 'null' || roll == 'null'){
			alert('Plz fill up Class, Session & Roll field.');
		}
		else{
			var url 	= $(this).attr('action');
			url 		+= '/'+class_code+'/'+session_code+'/'+section_code+'/'+shift_code+'/'+gruop_code+'/'+roll;
			$(location).attr('href', url);
		}

	});
	//

	$('#book_return_entry_form').on('submit', function(ev){
		ev.preventDefault();

		var invoice_id 					= $('#invoice_id').val();
		var reg_id 						= ''; //$('#reg_id').val();
		var class_code 					= $('.select2_class_code').val();
		var session_code 				= $('.select2_session_code').val();
		var section_code 				= $('.select2_section_code').val();
		var shift_code 					= $('.select2_shift_code').val();
		var group_code 					= $('.select2_group_code').val();
		var roll 						= $('#roll').val();
		var url 						= $(this).attr('action');
		var student_registration_code 	= 'null';

		if(invoice_id == ''){ invoice_id = 'null'; }
		if(reg_id == ''){ reg_id = 'null'; }
		if(class_code == ''){ class_code = 'null'; }
		if(session_code == ''){ session_code = 'null'; }
		if(section_code == ''){ section_code = 'null'; }
		if(shift_code == ''){ shift_code = 'null'; }
		if(group_code == ''){ group_code = 'null'; }
		if(roll == ''){ roll = 'null'; }
		
		if(invoice_id != 'null' || (class_code != 'null' && session_code != 'null' && roll  != 'null'))
		{
			url += '/'+class_code+'/'+session_code+'/'+section_code+'/'+shift_code+'/'+group_code+'/'+roll+'/'+invoice_id+'/'+reg_id+'/'+student_registration_code;
			$(location).attr('href', url);
		}
		else { alert('Plz fill up the form'); return; }

	});

	$('#return_entry_form').on('click', '#return_entry_btn',function(ev){

		var url 	= js_base_url + 'library/return_entry';
		var sure 	= confirm('Are you sure?');

		if(sure){ $(location).attr('href', url); }
		if(!sure){ ev.preventDefault(); }

	});

	$('#borrower_searching_form').on('submit', function(ev){
		ev.preventDefault();

		var class_code 		= $('.select2_class_code').val();
		var session_code 	= $('.select2_session_code').val();
		var section_code 	= $('.select2_section_code').val();
		var shift_code 		= $('.select2_shift_code').val();
		var group_code 		= $('.select2_group_code').val();
		var roll_number 	= $('.roll').val();
		var receipt_id 		= ''; //$('.receipt_id').val();
		var url 			= $(this).attr('action');

		if(class_code == '')class_code 		= 'null';
		if(session_code == '')session_code 	= 'null';
		if(section_code == '')section_code 	= 'null';
		if(shift_code == '')shift_code 		= 'null';
		if(group_code == '')group_code 		= 'null';
		if(roll_number == '')roll_number 	= 'null';
		if(receipt_id == '')receipt_id 		= 'null';

		if(session_code != 'null')
		{
			//alert(class_code +'<>'+ session_code +'<>'+ section_code +'<>'+ shift_code +'<>'+ group_code +'<>'+ roll_number +'<>'+ receipt_id);
			url += '/'+class_code+'/'+session_code+'/'+section_code+'/'+shift_code+'/'+group_code+'/'+roll_number+'/'+receipt_id;
			$(location).attr('href', url);
		}
		else{
			alert('Plz select  Session!');
		}
	});

	$('#damage_book_search_form').on('submit', function(ev){
		ev.preventDefault();

		var book_id 		= $('.book_id').val();
		var writer_code 	= $('.select2_writer').val();
		var class_code 		= $('.select2_class_code').val();
		var type_code 		= $('.select2_type').val();
		var category_code 	= $('.select2_category').val();
		var url 			= $(this).attr('action');
		
		

		if(book_id == '')book_id = 'null';
		if(writer_code == '')writer_code = 'null';
		if(class_code == '')class_code = 'null';
		if(type_code == '')type_code = 'null';
		if(category_code == '')category_code = 'null';

		if(book_id != 'null' || writer_code != 'null' || class_code != 'null' || type_code != 'null' || category_code != 'null'){
			url += '/'+book_id+'/'+writer_code+'/'+class_code+'/'+type_code+'/'+category_code;
			$(location).attr('href', url);
		}
		

	});
	$('#lost_book_search_form').on('submit', function(ev){
		ev.preventDefault();

		var book_id 		= $('.book_id').val();
		var writer_code 	= $('.select2_writer').val();
		var class_code 		= $('.select2_class_code').val();
		var type_code 		= $('.select2_type').val();
		var category_code 	= $('.select2_category').val();
		var url 			= $(this).attr('action');
		
		

		if(book_id == '')book_id = 'null';
		if(writer_code == '')writer_code = 'null';
		if(class_code == '')class_code = 'null';
		if(type_code == '')type_code = 'null';
		if(category_code == '')category_code = 'null';

		if(book_id != 'null' || writer_code != 'null' || class_code != 'null' || type_code != 'null' || category_code != 'null'){
			url += '/'+book_id+'/'+writer_code+'/'+class_code+'/'+type_code+'/'+category_code;
			$(location).attr('href', url);
		}
		

	});

	$('#old_book_entry_form').on('submit', function(ev){
		
		var class_code 	= $('.select2_class_code').val();
		var writer 		= $('.select2_writer').val();
		var type 		= $('.select2_type').val();
		var category 	= $('.select2_category').val();

		if(class_code == ''){
			ev.preventDefault();
			alert('Plz Select Class!');
		}

	});
	$('#old_book_entry_form_2').on('click', '#old_book_entry_btn', function(ev){
		
		var book_quantity 	= $("[name='book_quantity']").val();
		var book_id 		= $("[name='book_id']").val();

		if(book_quantity != '' && book_id != '' && !isNaN(book_quantity) && !isNaN(book_id)){
			ev.preventDefault();
			alert('Plz fill up form!');
		}
		else{
			setTimeout(function(){
				$('#old_book_entry_form_2').trigger('reset');
				$("[name='book_id']").select2('val', 'All');
			}, 2000);
		}

	});

	$('#reg_std_from').on('submit', function(ev){
		ev.preventDefault();

		var url 			= $(this).attr('action');
		var class_code 		= $('.select2_class_code').val();
		var session_code 	= $('.select2_session_code').val();
		var section_code 	= $('.select2_section_code').val();
		var shift_code  	= $('.select2_shift_code').val();
		var group_code  	= $('.select2_group_code').val();
		var std_roll  		= $('.std_roll').val();

		if(class_code == ''){ class_code = 'null'; }
		if(session_code == ''){ session_code = 'null'; }
		if(section_code == ''){ section_code = 'null'; }
		if(shift_code == ''){ shift_code = 'null'; }
		if(group_code == ''){ group_code = 'null'; }
		if(std_roll == ''){ std_roll = 'null'; }

		if(session_code == 'null'){
			alert('Plz fill up the form!');
		}
		else{
			url += '/'+class_code+'/'+session_code+'/'+section_code+'/'+shift_code+'/'+group_code+'/'+std_roll;
			$(location).attr('href', url);
		}
	});

	$('#update_book_info').on('submit', function(ev){
		ev.preventDefault();

		//alert($(this).serialize());
		
		if(confirm('Are you sure?'))
		{
			var url = $(this).attr('action');
			$.ajax({
				url 		: url,
				type 		: 'POST',
				data 		: $(this).serialize(),
				success 	: function(result){
					alert(result);
				}
			});
		}
	});
	/*End: form submit */

	/*on click event*/
	$('#book_submit_btn').on('click', function(ev){
		var return_date 				= $('#return_date').val();
		var student_registration_code 	= $('#student_registration_code').val();
		var tmp_book_lending_info_id 	= $('#tmp_book_lending_info_id').val();

		if(student_registration_code == ''){ 
			student_registration_code = 'null'; 
		}
		if(tmp_book_lending_info_id == ''){
			tmp_book_lending_info_id = 'null';
		}
		if(return_date == ''){
			return_date = 'null';
			alert('Plz Select Return Date!');
			return; 
		}

		var submit_url 	= $('#submit_url').val()+'/'+student_registration_code+'/'+return_date+'/'+tmp_book_lending_info_id;
		var refresh_url = $('#refresh_url').val();

		if(confirm('Are you sure?')){
			 window.open(submit_url, '_blank');
			 $(location).attr('href', refresh_url);
		}


	});

	$('#calcel_btn').on('click', function(ev){

		if(confirm('Are you sure'))
		{	
			var base_url 					= $('#base_url').val();
			var tmp_book_lending_info_id 	= $('#tmp_book_lending_info_id').val();

			base_url += 'library/cancel_book_lending_request/'+tmp_book_lending_info_id;
			$(location).attr('href', base_url);
		}

	});

	/*end of on click event*/


	/*disable */
		$('#invoice_id').on('keyup', function(){

			if($(this).val() == '')
			{
				$('#reg_id').removeAttr("disabled");
				$('.select2_class_code').removeAttr("disabled");
				$('.select2_session_code').removeAttr("disabled");
				$('.select2_section_code').removeAttr("disabled");
				$('.select2_shift_code').removeAttr("disabled");
				$('.select2_group_code').removeAttr("disabled");
				$('#roll').removeAttr("disabled");
			}
			else 
			{ 
				$('#reg_id').attr('disabled', 'disabled');
				$('.select2_class_code').attr('disabled', 'disabled');
				$('.select2_session_code').attr('disabled', 'disabled');
				$('.select2_section_code').attr('disabled', 'disabled');
				$('.select2_shift_code').attr('disabled', 'disabled');
				$('.select2_group_code').attr('disabled', 'disabled');
				$('#roll').attr('disabled', 'disabled');
			}
		});
		$('#reg_id').on('keyup', function(){

			if($(this).val() == '')
			{
				$('#invoice_id').removeAttr("disabled");
				$('.select2_class_code').removeAttr("disabled");
				$('.select2_session_code').removeAttr("disabled");
				$('.select2_section_code').removeAttr("disabled");
				$('.select2_shift_code').removeAttr("disabled");
				$('.select2_group_code').removeAttr("disabled");
				$('#roll').removeAttr("disabled");
			}
			else 
			{ 
				$('#invoice_id').attr('disabled', 'disabled');
				$('.select2_class_code').attr('disabled', 'disabled');
				$('.select2_session_code').attr('disabled', 'disabled');
				$('.select2_section_code').attr('disabled', 'disabled');
				$('.select2_shift_code').attr('disabled', 'disabled');
				$('.select2_group_code').attr('disabled', 'disabled');
				$('#roll').attr('disabled', 'disabled');
			}
		});
	/*disable */

});// end of jQuery