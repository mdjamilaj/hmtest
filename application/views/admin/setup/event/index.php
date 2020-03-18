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
        <h3> Search Event </h3>
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
          <a href="<?php echo  base_url() ?>event_create" class="btn btn-primary btn-user btn-block">Event Create</a>
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
                        <form class="user mt-5" action="<?php echo base_url() ?>jcpscAdmin/event_index" method="post" enctype="multipart/form-data">

                          <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                              <label class="control-label col-md-3 col-sm-2 col-xs-12 label-text-control">
                              <i class="fa fa-calendar"></i> First Date <span class="required"></span>
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
                                <input type="text" autocomplete="off" required name="last_date" class="form-control form-control-user " id="last_date" placeholder="Last Date">
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
                  <th class="text-center">SN</th>
                  <th class="text-center">Event Title</th>
                  <th class="text-center">Event Description</th>
                  <th class="text-center">Event Date</th>
                  <th class="text-center">Creator</th>
                  <th class="text-center">Action</th>
                </tr>
              </thead>
              <tbody class="text-center">
                <?php $i = 0; foreach ($details as $show_data) { $i++; ?>
                    <?php if ($show_data['showDocument'] == 0) { ?>
                      <tr style="background: #fbe6e6">
                        <td><?php echo  $show_data['id']; ?></td>
                        <td class="text-left" style="font-weight: bold;"><?php echo $out = strlen($show_data['title_bangla']) > 1000 ? substr($show_data['title_bangla'], 0, 100) . "..." : $show_data['title_bangla']; ?></td>
                        <td class="text-left"><?php echo $out = strlen($show_data['des_bangla']) > 200 ? substr($show_data['des_bangla'], 0, 200) . "..." : $show_data['des_bangla']; ?></td>
                        <td><?php echo $show_data['event_date']; ?></td>
                        <td><?php echo $show_data['creator']; ?></td>
                        <td class="edit_td" style="padding: 0 !important"><a href="<?php echo base_url(); ?>jcpscAdmin/event_edit?edit=<?php echo $show_data['id'] ?>"><i class='fa fa-pencil-square-o'></i></a></td>
                      </tr>
                    <?php } else { ?>
                      <tr>
                        <td><?php echo  $show_data['id']; ?></td>
                        <td class="text-left" style="font-weight: bold;"><?php echo $out = strlen($show_data['title_bangla']) > 1000 ? substr($show_data['title_bangla'], 0, 100) . "..." : $show_data['title_bangla']; ?></td>
                        <td class="text-left"><?php echo $out = strlen($show_data['des_bangla']) > 200 ? substr($show_data['des_bangla'], 0, 200) . "..." : $show_data['des_bangla']; ?></td>
                        <td><?php echo $show_data['event_date']; ?></td>
                        <td><?php echo $show_data['creator']; ?></td>
                        <td class="edit_td" style="padding: 0 !important"><a href="<?php echo base_url(); ?>jcpscAdmin/event_edit?edit=<?php echo $show_data['id'] ?>"><i class='fa fa-pencil-square-o'></i></a></td>
                      </tr>
                  <?php }
                  } ?>
                  <tbody class="text-center" id="load-more">

                  </tbody>
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
		      table : "event"
        },
        cache: false,
        success :function(data){
          var data = JSON.parse(data);
            console.log(data.view);
            var view = data.view;
            var string1 = 0;

            $.each( view, function( key, value ) {
              if(value['des_bangla'].length > 200){
                var str1 = value['des_bangla'].substring(0, 200)+ ".......";
              }else{
                var str1 = value['des_bangla'];
              }
              if(value['showDocument'] == 0){
                string1 = string1 + "<tr style='background: #fbe6e6'><td>"+value['id'] +"</td><td class='text-left' style='font-weight: bold'>"+value['title_bangla'] +"</td><td class='text-left'>"+ str1 +"</td><td class='text-center'>"+ value['event_date'] +"</td><td class='text-center'>"+ value['creator'] +"</td><td class='edit_td' style='padding: 0 !important'><a href="+base_url+"jcpscAdmin/event_edit?edit="+value['id']+"><i class='fa fa-pencil-square-o'></i></a></td></tr>";
                
              }else{
                string1 = string1 + "<tr><td>"+value['id'] +"</td><td class='text-left' style='font-weight: bold'>"+value['title_bangla'] +"</td><td class='text-left'>"+ str1 +"</td><td class='text-center'>"+ value['event_date'] +"</td><td class='text-center'>"+ value['creator'] +"</td><td class='edit_td' style='padding: 0 !important'><a href="+base_url+"jcpscAdmin/event_edit?edit="+value['id']+"><i class='fa fa-pencil-square-o'></i></a></td></tr>";
              }   
          }); 
            // console.log(string1)
            $("#load-more").html(string1);
            

        }
    })
}
</script>





