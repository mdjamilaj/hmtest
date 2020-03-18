<?php

// var_dump($edit_data);
$publish = $edit_data[0]->notice_publish_date_time;
$pub = explode("-", $publish);
$pub_date = $pub[0];
$pub_time = $pub[1];
?>

<style>
  form.user .form-control-user {
    border-radius: 3px;
  }
</style>

<script>
  $(document).ready(function() {
    $('#notice_date').daterangepicker({
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
        <h3> Edit <?php echo $edit_data[0]->title_english ?> Notice </h3>
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
          <a href="<?php echo  base_url() ?>notice_index" class="btn btn-primary btn-user btn-block">Notice List</a>
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
                    <div class="col-lg-8 justify-content-center x_panel">
                      <div class="p-5">
                        <form class="user" action="<?php echo base_url() ?>jcpscAdmin/notice_update" method="post" enctype="multipart/form-data">
                          <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                              <label for="#"><i class="fa fa-exclamation-circle"></i> Notice Title English :</label>
                              <input type="text"  autocomplete="off" value="<?php echo $edit_data[0]->title_english ?>" name="title_english" required class="form-control form-control-user" id="title_english" placeholder="Enter Notice Title English">
                            </div>
                            <div class="col-sm-6 mb-3 mb-sm-0">
                              <label for="#"><i class="fa fa-exclamation-circle"></i> Notice Title Bangla :</label>
                              <input type="text"  autocomplete="off" value="<?php echo $edit_data[0]->title_bangla ?>" name="title_bangla" required class="form-control form-control-user" id="title_bangla" placeholder="Enter Notice Title Bangla">
                            </div>
                          </div>

                          <div class="form-group row">
                          <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="#"><i class="fa fa-exclamation-circle"></i> Notice Description English :</label>
                            <textarea type="text" autocomplete="off" name="des_english" class="form-control form-control-user" id="des_english" required placeholder="Notice Description English"><?php echo $edit_data[0]->des_english ?></textarea>
                          </div>
                          <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="#"><i class="fa fa-exclamation-circle"></i> Notice Description Bangla :</label>
                            <textarea type="text" autocomplete="off" name="des_bangla" class="form-control form-control-user" id="des_bangla" required placeholder="Notice Description Bangla"><?php echo $edit_data[0]->des_bangla ?></textarea>
                          </div>
                          </div>

                          

                          <div class="form-group row">
                          <div class="col-sm-4 mb-4 mb-sm-0">
                            <label for="#"><i class="fa fa-exclamation-circle"></i> Notice Date :</label>
                            <input type="text" autocomplete="off" value="<?php echo $edit_data[0]->notice_date ?>" name="notice_date" class="form-control form-control-user" required id="notice_date" placeholder="Notice Date">
                          </div>
                          <div class="col-sm-4 mb-4 mb-sm-0">
                              <label for="#"><i class="fa fa-exclamation-circle"></i> Notice Publish Date :</label>
                              <input type="text" autocomplete="off" value="<?php echo $pub_date ?>" name="publish_date" class="form-control form-control-user" required id="publish_date" placeholder="Notice Publish Date">
                            </div>
                            <div class="col-sm-4 mb-3 mb-sm-0">
                              <label for="#"><i class="fa fa-exclamation-circle"></i> Notice Publish Time :</label>
                              <input type="text" autocomplete="off" value="<?php echo $pub_time ?>" name="publish_time" class="form-control form-control-user" required id="publish_time" placeholder="Notice Publish Time">
                            </div>
                          </div>
                          <input type="hidden" value="<?php echo $edit_data[0]->id ?>" name="notice_id" id="notice_id">
                          <input type="hidden" value="<?php echo $edit_data[0]->attachment ?>" name="file_url" id="file_url">

                          <div class="form-group row">
                           <div class="col-sm-4 mb-4 mb-sm-0">
                            <label for="#"><i class="fa fa-exclamation-circle"></i> Notice Attachment :</label>
                            <input type="file" name="attachment" class="form-control form-control-user pb-5" id="attachment"  style="padding-top: 2px !important; padding-bottom: 20px !important;" placeholder="Notice Description Bangla">
                          </div>
                          <div class="col-sm-4 mb-4 mb-sm-0">
                            <label for="#"><i class="fa fa-exclamation-circle"></i> Notice Creator Name :</label>
                            <input type="text" autocomplete="off" value="<?php echo $edit_data[0]->creator ?>" name="creator" class="form-control form-control-user" required id="creator" placeholder="Enter Creator Name">
                          </div>
                          <div class="col-sm-4 mb-4 mb-sm-0">
                            <label for="#" class="text-black"><i class="fa fa-exclamation-circle"></i> Notice Status :</label>
                            <select class="form-control" name="showDocument" >
                                <?php if($edit_data[0]->showDocument == 1){ ?>
                                  <option value="1" selected>Active</option>
                                  <option value="0">Inactive</option>
                                <?php }else{ ?>
                                  <option value="1">Active</option>
                                  <option value="0" selected>Inactive</option>
                                <?php } ?>
                              </select>
                          </div>
                          </div>


                          <div class="form-group row">
                            <div class="col-sm-4 mb-4 mb-sm-0">
                              <!-- <button  formaction="<?php echo base_url() ?>jcpscAdmin/notice_print" class="btn btn-primary btn-user btn-block">Print</button> -->
                              <button type="button" class="btn btn-warning btn-user btn-block" id="pre_view" data-toggle="modal" data-target=".bd-example-modal-lg">Pre View</a>
                            </div>
                            <div class="col-sm-4 mb-4 mb-sm-0">
                              <button type="submit" class="btn btn-primary btn-user btn-block">Update</button>
                            </div>
                            <div class="col-sm-4 mb-4 mb-sm-0">
                              <button formaction="<?php echo base_url() ?>jcpscAdmin/notice_update_and_print" class="btn btn-info btn-user btn-block">Update & Print</button>
                            </div>
                          </div>
                          <hr>
                        </form>
                        <hr>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>










<script>
  CKEDITOR.replace('des_english');
  CKEDITOR.replace('des_bangla');
</script>

<script>
  $('#publish_time').timepicker({
    timeFormat: 'h:mm p',
    interval: 60,
    minTime: '10',
    maxTime: '6:00pm',
    // defaultTime: '11',
    startTime: '10:00',
    dynamic: false,
    dropdown: true,
    scrollbar: true
  });
</script>





<script>
  $("#pre_view").on('click', function(event) {

    event.preventDefault();

    var title_english = $("#title_english").val();
    var title_bangla = $("#title_bangla").val();
    var des_english = CKEDITOR.instances['des_english'].getData()
    var des_bangla = CKEDITOR.instances['des_bangla'].getData()
    var notice_date = $("#notice_date").val();
    var creator = $("#creator").val();

    // console.log(des_english);
    // alert(des_english);
    // console.log(des_bangla);


    $("#title_english_print").text(title_english);
    $("#title_bangla_print").text(title_bangla);
    $("#des_english_print").html(des_english);
    $("#des_bangla_print").html(des_bangla);
    $("#notice_date_print").text("Date : " + notice_date);
    $("#creator_print").text(creator);


  });
</script>






<style>
  body {
    font-family: 'Roboto', sans-serif;
  }

  .type_notice {
    text-align: center;
    padding: 5px;
    margin: 0px;
    width: 100px;
    margin: auto;
    border-bottom-style: double;
    font-family: 'Lobster', cursive;
    letter-spacing: 3px;
    /* border-bottom: 1px solid; */
    margin-bottom: 15px;
  }

  .title_english {
    text-align: center;
    padding: 1px;
    padding-bottom: 0px;
    margin: 0;
    word-spacing: 2px;
    letter-spacing: 1px;
    font-weight: 600;
  }

  .title_bangla {
    text-align: center;
    padding: 7px 0px;
    margin: 0;
    font-weight: 600;
  }

  .des_bangla {
    margin-top: 30px;
    margin-bottom: 15px;
  }

  .creator_side {
    float: left;
    text-align: left;
  }

  .creator_side h4 {
    margin: 0;
    font-weight: 300;
    font-family: serif;
    font-size: 18px;
  }

  .creator_side h5 {
    text-align: center;
    margin: 0;
    margin-top: 5px;
    font-size: 15px;
    font-family: initial;
  }

  .date_side {
    float: right;
    text-align: right
  }

  h5#notice_date_print {
    font-size: 14px;
    margin-top: 14px;
  }
</style>
</style>

<!-- Large modal -->


<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <!-- <h5 class="modal-title" id="exampleModalLabel">Pre View Notice</h5> -->
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


        <div class="container">
          <h2 class="type_notice">Notice </h2>
          <h4 class="title_english" id="title_english_print"></h4>
          <h4 class="title_bangla" id="title_bangla_print"></h4>

          <div>
            <p class="des_bangla" id="des_english_print"></p>
            <p id="des_bangla_print"></p>
          </div>

          <div style="margin-top:40px;">
            <div class="creator_side">
              <h4>Name Of Creator</h4>
              <h5 id="creator_print"></h5>
            </div>
            <div class="date_side">
              <h5 id="notice_date_print"></h5>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>