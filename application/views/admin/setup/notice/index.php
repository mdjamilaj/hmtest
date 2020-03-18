<script src="<?php echo base_url(); ?>assets/custom_js/custom_js_for_library.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/custom_css_for_library/custom_css_for_library.css">


<script type="text/javascript">
  $(document).ready(function() {
    $('#first_date').daterangepicker({
      singleDatePicker: true,
      calender_style: "picker_4"
    }, function(start, end, label) {
      console.log(start.toISOString(), end.toISOString(), label);
    });
    $('#last_date').daterangepicker({
      singleDatePicker: true,
      calender_style: "picker_4"
    }, function(start, end, label) {
      console.log(start.toISOString(), end.toISOString(), label);
    });
  });
</script>

<!-- page content -->
<div class="right_col" role="main">
  <div>
    <!-- start of body content -->
    <div class="page-title">
      <div class="title_left">
        <h3> Search Notice </h3>
      </div>
      <div class="title_right">
        <!-- <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for...">
            <span class="input-group-btn">
              <button class="btn btn-default" type="button">Go!</button>
            </span>
          </div>
        </div> -->
        <div class="col-md-12 col-sm-12 col-xs-12 form-group ">
          <a href="<?php echo  base_url() ?>notice_create" class="btn btn-primary btn-user btn-block">Notice Create</a>
        </div>
      </div>
    </div>

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2> Search <small></small></h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#">Settings 1</a>
                  </li>
                  <li><a href="#">Settings 2</a>
                  </li>
                </ul>
              </li>
              <!--
							<li><a class="close-link"><i class="fa fa-close"></i></a>
							</li>
							-->
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <div>
              <div class="row justify-content-center">
                <div class="col-lg-8">
                  <p class="bg-success text-center text-light"><?= $this->session->userdata('msg'); ?> </p>
                </div>
              </div>
            </div>


            <div class="container">

              <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                  <!-- Nested Row within Card Body -->
                  <div class="row justify-content-center">
                    <div class="col-lg-12 justify-content-center">
                      <div class="p-5">
                        <form class="user mt-5" action="<?php echo base_url() ?>jcpscAdmin/notice_index" method="post" enctype="multipart/form-data">

                          <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                              <label class="control-label col-md-3 col-sm-2 col-xs-12 label-text-control"> 
                              <i class="fa fa-calendar "></i> First Date <span class="required"></span>
                              </label>
                              <div class="col-md-9 col-sm-4 col-xs-12">
                                <input type="text" required autocomplete="off" name="first_date" class="form-control form-control-user" id="first_date" placeholder="First Date">
                              </div>
                            </div>
                            <div class="col-sm-6 mb-3 mb-sm-0">
                              <label class="control-label col-md-3 col-sm-2 col-xs-12 label-text-control"> 
                              <i class="fa fa-calendar"></i> Last Date <span class="required"></span>
                              </label>
                              <div class="col-md-9 col-sm-4 col-xs-12">
                              <input type="text" required autocomplete="off" name="last_date" class="form-control form-control-user " id="last_date" placeholder="Last Date">
                              </div>
                            </div>
                          </div>

                          <div class="form-group row">
                            <div class="col-sm-12 mb-4 mb-sm-0">
                              <button type="submit" class="btn btn-primary btn-user btn-block">Search</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>

        <div class="x_content">
          <div class="table-responsive">
            <table class="table table-bordered table-striped jambo_table">
              <thead class="bg-dark">
                <tr>
                  <th>SN</th>
                  <th class="text-center">Title</th>
                  <th class="text-center">Publish Date</th>
                  <th class="text-center">Notice Date</th>
                  <th class="text-center">Creator</th>
                  <th class="text-center">DOC</th>
                  <th class="text-center">Action</th>
                </tr>
              </thead>
              <tbody class="text-center">
              
              <?php $i = 0; foreach ($details as $show_data) { $i++;?>
                <?php if($show_data['showDocument'] == 0){ ?>
                  <tr style="background: #fbe6e6">
                    <td><?php echo $out = strlen($show_data['id']) > 20 ? substr($show_data['id'], 0, 20) . "..." : $show_data['id']; ?></td>
                    <td class="text-left" style="font-weight: 600"><?php echo $out = strlen($show_data['title_bangla']) > 200 ? substr($show_data['title_bangla'], 0, 200) . "..." : $show_data['title_bangla']; ?></td>
                    <td><?php echo $show_data['notice_publish_date_time'] ?></td>
                    <td><?php echo $show_data['notice_date']; ?></td>
                    <td><?php echo $out = strlen($show_data['creator']) > 20 ? substr($show_data['creator'], 0, 20) . "..." : $show_data['creator']; ?></td>
                    <td><?php echo $out = strlen($show_data['doc']) > 20 ? substr($show_data['doc'], 0, 20) . "..." : $show_data['doc']; ?></td>
                    <td class="edit_td" style="padding: 0 !important"><a href="<?php echo base_url(); ?>jcpscAdmin/notice_edit?edit=<?php echo $show_data['id'] ?>"><i class="fa fa-pencil-square-o"></i></a></td>
                  </tr>
                <?php }else{ ?>
                  <tr>
                    <td><?php echo $out = strlen($show_data['id']) > 20 ? substr($show_data['id'], 0, 20) . "..." : $show_data['id']; ?></td>
                    <td class="text-left" style="font-weight: 600"><?php echo $out = strlen($show_data['title_bangla']) > 200 ? substr($show_data['title_bangla'], 0, 200) . "..." : $show_data['title_bangla']; ?></td>
                    <td><?php echo $show_data['notice_publish_date_time'] ?></td>
                    <td><?php echo $show_data['notice_date']; ?></td>
                    <td><?php echo $out = strlen($show_data['creator']) > 20 ? substr($show_data['creator'], 0, 20) . "..." : $show_data['creator']; ?></td>
                    <td><?php echo $out = strlen($show_data['doc']) > 20 ? substr($show_data['doc'], 0, 20) . "..." : $show_data['doc']; ?></td>
                    <td class="edit_td" style="padding: 0 !important"><a href="<?php echo base_url(); ?>jcpscAdmin/notice_edit?edit=<?php echo $show_data['id'] ?>"><i class="fa fa-pencil-square-o"></i></a></td>
                  </tr>
                <?php } } ?>
               
              </tbody>
              <tbody class="text-center" id="load-more">

              </tbody>
            </table>
          </div>
        </div>
          <?php if ($i == 0) {?>
          <div class="dropDiv classRed">
              <p style="text-align:center; color:#FFF;">
              Sorry ! No Information Found.
              </p>
          </div>
          <?php } ?>
          <button type="button" onclick="loadmore()" class="btn btn-primary btn-user btn-block" style="width: 150px" value="loadmore" >Load More</button>
      </div>
    </div>
  </div>

</div>


<script type="text/javascript">
count = 0;
var base_url = "<?php echo base_url(); ?>";
function loadmore(){
    count += 1;
    $.ajax({
        url: "<?php echo base_url(); ?>jcpscAdmin/ajax_req",
				type: "POST",
        data:{
          offset :10*count,
          limit :10,
		      table : "notice"
        },
        cache: false,
        success :function(data){
          var data = JSON.parse(data);
            console.log(data.view);
            var view = data.view;
            var string1 = 0;

            $.each( view, function( key, value ) {
              if(value['title_bangla'].length > 200){
                var str1 = value['title_bangla'].substring(0, 200)+ ".......";
              }else{
                var str1 = value['title_bangla'];
              }
              if(value['showDocument'] == 0){
                string1 = string1 + "<tr style='background: #fbe6e6'><td>"+value['id'] +"</td><td class='text-left' style='font-weight: bold'>"+ str1 +"</td><td>"+value['notice_publish_date_time'] +"</td><td class='text-center'>"+ value['notice_date'] +"</td><td class='text-center'>"+ value['creator'] +"</td><td class='text-left'>"+ value['doc'] +"</td><td class='edit_td' style='padding: 0 !important'><a href="+base_url+"jcpscAdmin/notice_edit?edit="+value['id']+"><i class='fa fa-pencil-square-o'></i></a></td></tr>";
                
              }else{
                string1 = string1 + "<tr><td>"+value['id'] +"</td><td class='text-left' style='font-weight: bold'>"+ str1 +"</td><td>"+value['notice_publish_date_time'] +"</td><td class='text-center'>"+ value['notice_date'] +"</td><td class='text-center'>"+ value['creator'] +"</td><td class='text-left'>"+ value['doc'] +"</td><td class='edit_td' style='padding: 0 !important'><a href="+base_url+"jcpscAdmin/notice_edit?edit="+value['id']+"><i class='fa fa-pencil-square-o'></i></a></td></tr>";
              }   
          }); 
            // console.log(string1)
            $("#load-more").html(string1);
        }
    })
}
</script>