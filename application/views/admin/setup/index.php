<style>
  @charset "UTF-8";
  @import url(https://fonts.googleapis.com/css?family=Open+Sans:300,400,700);

  .container th {
    background-color: #000000;
    color: #ffffff;
    border-right: 1px solid #ebefe3;
    text-align: center;
  }
</style>

<script src="<?php echo base_url(); ?>assets/custom_js/custom_js_for_library.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/custom_css_for_library/custom_css_for_library.css">








<!-- page content -->
<div class="right_col" role="main">
  <div>
    <!-- start of body content -->
    <div class="page-title">
      <div class="title_left">
        <h3> Search Page </h3>
      </div>
      <div class="title_right">
      <div class="col-md-12 col-sm-12 col-xs-12 form-group ">
          <a href="#" class="btn btn-primary btn-user btn-block" style="opacity: 0">index</a>
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
           

            <div class="container">
            

              <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                  <!-- Nested Row within Card Body -->
                  <div class="row justify-content-center">
                    <div class="col-lg-12 justify-content-center">
                      <div class="p-5">
                        <form class="user mt-5" action="<?php echo base_url() ?>jcpscAdmin/notice_index" method="post" enctype="multipart/form-data">
                        <div>
                          <div class="row justify-content-center">
                            <div class="col-lg-8">
                              <p class="bg-success text-center text-light"><?= $this->session->userdata('msg'); ?> </p>
                            </div>
                          </div>
                        </div>
                          <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                              <label class="control-label col-md-3 col-sm-2 col-xs-12 label-text-control">
                                <i class="fa fa-calendar"></i> First Date <span class="required"></span>
                              </label>
                              <div class="col-md-9 col-sm-4 col-xs-12">
                                <input type="text" autocomplete="off" required name="first_date" class="form-control form-control-user" id="pubaslish_date" placeholder="First Date">
                              </div>
                            </div>
                            <div class="col-sm-6 mb-3 mb-sm-0">
                              <label class="control-label col-md-3 col-sm-2 col-xs-12 label-text-control">
                                <i class="fa fa-calendar"></i> Last Date <span class="required"></span>
                              </label>
                              <div class="col-md-9 col-sm-4 col-xs-12">
                                <input type="text" autocomplete="off" required name="last_date" class="form-control form-control-user " id="pubalish_time" placeholder="Last Date">
                              </div>
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                              <label class="control-label col-md-3 col-sm-2 col-xs-12 label-text-control">
                                <i class="fa fa-calendar"></i> First Date <span class="required"></span>
                              </label>
                              <div class="col-md-9 col-sm-4 col-xs-12">
                                <input type="text" autocomplete="off" required name="first_date" class="form-control form-control-user" id="pubaslish_date" placeholder="First Date">
                              </div>
                            </div>
                            <div class="col-sm-6 mb-3 mb-sm-0">
                              <label class="control-label col-md-3 col-sm-2 col-xs-12 label-text-control">
                                <i class="fa fa-calendar"></i> Last Date <span class="required"></span>
                              </label>
                              <div class="col-md-9 col-sm-4 col-xs-12">
                                <input type="text" autocomplete="off" required name="last_date" class="form-control form-control-user " id="pubalish_time" placeholder="Last Date">
                              </div>
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                              <label class="control-label col-md-3 col-sm-2 col-xs-12 label-text-control">
                                <i class="fa fa-calendar"></i> First Date <span class="required"></span>
                              </label>
                              <div class="col-md-9 col-sm-4 col-xs-12">
                                <input type="text" autocomplete="off" required name="first_date" class="form-control form-control-user" id="pubaslish_date" placeholder="First Date">
                              </div>
                            </div>
                            <div class="col-sm-6 mb-3 mb-sm-0">
                              <label class="control-label col-md-3 col-sm-2 col-xs-12 label-text-control">
                                <i class="fa fa-calendar"></i> Last Date <span class="required"></span>
                              </label>
                              <div class="col-md-9 col-sm-4 col-xs-12">
                                <input type="text" autocomplete="off" required name="last_date" class="form-control form-control-user " id="pubalish_time" placeholder="Last Date">
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
                  <th class="text-center">PAGES</th>
                  <th class="text-center">Page Title</th>
                  <th class="text-center">Page contant</th>
                  <!-- <th class="text-center">Creator</th>
                  <th class="text-center">DOC</th> -->
                  <th class="text-center">Action</th>
                </tr>
              </thead>
              <tbody class="text-center">
			  <?php $i = 0; foreach ($details as $show_data) { $i++;?>
                <?php if($show_data['showDocument'] == 0){ ?>
                  <tr style="background: #fbe6e6">
                    <td><?php echo $show_data['news_id']; ?></td>
                    <td class="text-left" style="font-weight: bold"><?php echo $show_data['news_type']; ?></td>
                    <td class="text-left"  style="font-weight: bold"><?php echo $out = strlen($show_data['news_title_bangla']) > 100 ? substr($show_data['news_title_bangla'], 0, 100) . "..." : $show_data['news_title_bangla'] ?></td>
                    <td><?php echo $out = strlen($show_data['news_details_bangla']) > 200 ? substr($show_data['news_details_bangla'], 0, 200) . "..." : $show_data['news_details_bangla']; ?></td>
                    <td class="edit_td" style="padding: 0 !important"><a href="<?php echo base_url(); ?>jcpscAdmin/edit?edit=<?php echo $show_data['news_id'] ?>"><i class="fa fa-pencil-square-o"></i></a></td>
                  </tr>
                <?php }else{ ?>
                  <tr>
				  <td><?php echo $show_data['news_id']; ?></td>
                    <td class="text-left" style="font-weight: bold"><?php echo $show_data['news_type']; ?></td>
                    <td class="text-left"  style="font-weight: bold"><?php echo $show_data['news_title_bangla'] ?></td>
                    <td><?php echo $out = strlen($show_data['news_details_bangla']) > 200 ? substr($show_data['news_details_bangla'], 0, 200) . "..." : $show_data['news_details_bangla']; ?></td>
                    <td class="edit_td" style="padding: 0 !important"><a href="<?php echo base_url(); ?>jcpscAdmin/edit?edit=<?php echo $show_data['news_id'] ?>"><i class="fa fa-pencil-square-o"></i></a></td>
                  </tr>
                <?php } } ?>
               
              </tbody>
              <tbody class="text-center" id="load-more">

              </tbody>

              </tbody>
            </table>
          </div>
        </div>
        <!-- <div class="container" style="text-align: center"><button class="btn" id="load_more" data-val="0">Load more..<img style="display: none" id="loader" src="<?php echo str_replace('index.php', '', base_url()) ?>jcpscAdmin"> </button></div> -->
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
		  table : "common_details"
        },
        cache: false,
        success :function(data){
          var data = JSON.parse(data);
            console.log(data.view);
            var view = data.view;
            var string1 = 0;

            $.each( view, function( key, value ) {
              if(value['news_title_bangla'].length > 40){
                var str1 = value['news_title_bangla'].substring(0, 50)+ ".......";
              }else{
                var str1 = value['news_title_bangla'];
              }
              if(value['showDocument'] == 0){
                string1 = string1 + "<tr style='background: #fbe6e6'><td>"+value['news_id'] +"</td><td class='text-left' style='font-weight: bold'>"+value['news_type'] +"</td><td class='text-left'>"+ str1 +"</td><td>"+value['news_details_bangla'].substring(0, 50) +"</td><td class='edit_td' style='padding: 0 !important'><a href="+base_url+"jcpscAdmin/edit?edit="+value['news_id']+"><i class='fa fa-pencil-square-o'></i></a></td></tr>";
                
              }else{
                string1 += "<tr><td>"+value['news_id'] +"</td><td class='text-left' style='font-weight: bold'>"+value['news_type'] +"</td><td class='text-left'>"+ str1 +"...</td><td>"+value['news_details_bangla'].substring(0, 50) +"</td><td class='edit_td' style='padding: 0 !important'><a href="+base_url+"jcpscAdmin/edit?edit="+value['news_id']+"><i class='fa fa-pencil-square-o'></i></a></td></tr>";
              }   
          }); 
            console.log(string1)
            $("#load-more").html(string1);
            

        }
    })
}
</script>