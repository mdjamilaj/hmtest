<style>
  form.user .form-control-user {
    border-radius: 3px;
  }
</style>

<script>
  $(document).ready(function() {
    $('#event_date').daterangepicker({
      singleDatePicker: true,
      calender_style: "picker_4"
    }, function(start, end, label) {
      console.log(start.toISOString(), end.toISOString(), label);
    });
  });
</script>

<script>
  count = 0;
  $(document).ready(function() {
    $("#plus").click(function() {
      count += 1;
      if (count >= 15) {
        alert("Image Not More Than 15");
      } else {
        var txt1 = '<div class="form-group row"><div class="col-sm-4 mb-3 mb-sm-0"><label for="#"><i class="fa fa-surprise"></i> Image Title :</label><input type="text"  autocomplete="off" name="img_title[]" class="form-control form-control-user"  id="publish_date" placeholder="Event Image Title"></div><div class="col-sm-4 mb-3 mb-sm-0"> <label for="#"><i class="fa fa-surprise"></i> Image Description :</label> <input type="text"  autocomplete="off" name="img_des[]" class="form-control form-control-user"  id="publish_date" placeholder="Event Image Description"></div> <div class="col-sm-4 mb-3 mb-sm-0"><label for="#"><i class="fa fa-surprise"></i> Image Uploads :</label> <input type="file" name="img[]"  multiple="multiple"   style="padding-top: 2px !important; padding-bottom: 20px !important;"  class="form-control form-control-user pb-4"> </div></div>';
        $("#plus_show").append(txt1);
        // alert(count);
      }
    });
  });
</script>


<!-- page content -->
<div class="right_col" role="main">
  <div>
    <!-- start of body content -->
    <div class="page-title">
      <div class="title_left">
        <h3> Edit <?php echo $edit_data[0]->title_english ?> Event </h3>
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
          <a href="<?php echo  base_url() ?>event_index" class="btn btn-primary btn-user btn-block">Event List</a>
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
                        <form class="user" action="<?php echo base_url() ?>jcpscAdmin/event_update" method="post" enctype="multipart/form-data">
                          <div class="form-group row">
                          <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="#"><i class="fa fa-exclamation-circle"></i> Event Title English :</label>
                            <input type="text"  autocomplete="off" value="<?php echo $edit_data[0]->title_english ?>" name="title_english" class="form-control form-control-user" id="dfsdf" placeholder="Enter Notice Title English">
                          </div>
                          <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="#"><i class="fa fa-exclamation-circle"></i> Event Title Bangla :</label>
                            <input type="text"  autocomplete="off" value="<?php echo $edit_data[0]->title_bangla ?>" name="title_bangla" class="form-control form-control-user" id="sdf" placeholder="Enter Notice Title Bangla">
                          </div>
                          </div>

                          <div class="form-group row">
                          <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="#"><i class="fa fa-exclamation-circle"></i> Event Description English :</label>
                            <textarea type="text"  autocomplete="off"name="des_english" class="form-control form-control-user" id="dsf" placeholder="Notice Description English"><?php echo $edit_data[0]->des_english ?></textarea>
                          </div>
                          <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="#"><i class="fa fa-exclamation-circle"></i> Event Description Bangla :</label>
                            <textarea type="text" autocomplete="off" name="des_bangla" class="form-control form-control-user" id="dsfhf" placeholder="Notice Description Bangla"><?php echo $edit_data[0]->des_bangla ?></textarea>
                          </div>
                          </div>

                          <div class="form-group row">
                          <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="#"><i class="fa fa-exclamation-circle"></i> Event Date :</label>
                            <input type="text" autocomplete="off" value="<?php echo $edit_data[0]->event_date ?>" name="event_date" class="form-control form-control-user" id="event_date" placeholder="Event Date">
                          </div>
                          <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="#" class="text-black"><i class="fa fa-exclamation-circle"></i> Event Status :</label>
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


                          <input type="hidden" value="<?php echo $edit_data[0]->id ?>" name="event_id" id="event_id">
                          <input type="hidden" value="<?php echo $edit_data[0]->event_img ?>" name="file_url" id="file_url">
                          <!-- Img Show  -->

                          <?php
                          $alphabet = range('A', 'Z');
                          for ($i = 0; $i < count($edit_img_data); $i++) {

                            $fileUrl = $edit_img_data[$i]->id . "_thumb." . $edit_img_data[$i]->img;
                          ?>

                            <div class="form-group row">
                              <div class="col-sm-4 mb-3 mb-sm-0">
                                <label for="#"><i class="fa fa-surprise"></i> Image Title :</label>
                                <p><?php echo $edit_img_data[$i]->img_title; ?></p>
                              </div>
                              <div class="col-sm-4 mb-3 mb-sm-0">
                                <label for="#"><i class="fa fa-surprise"></i> Image Description :</label>
                                <p><?php echo $edit_img_data[$i]->img_des; ?></p>
                              </div>
                              <div class="col-sm-3 mb-3 mb-sm-0">
                                <label for="#"><i class="fa fa-surprise"></i> Image :</label>
                                <?php if($edit_img_data[$i]->img == 'jpg' || $edit_img_data[$i]->img == 'jpeg' || $edit_img_data[$i]->img == 'png'){ ?>
                                <img src="<?php echo base_url(); ?>thumbnail/<?php echo $fileUrl; ?>" alt="Opps!!!" style="height: 65px; width: 70px;">
                                <?php }else{ ?>
                                  <div class="dropDiv classRed">
                                      <p style="text-align:center; color:#FFF;">
                                      <?php echo $edit_img_data[$i]->img; ?>
                                      </p>
                                  </div>
                                <?php } ?>
                              </div>
                              <div class="col-sm-1 mb-3 mb-sm-0">
                                <p class="text-danger" onclick="deleteImg(<?php echo $edit_img_data[$i]->id; ?>,<?php echo '\'' . $fileUrl . '\'' ?>)"><i class="fa fa-trash text-danger fa-2x mt-4 pt-3"></i></p>
                              </div>
                            </div>

                          <?php } ?>
                          <div id="plus_show">

                          </div>
                          <div class="form-group row">
                          <div class="col-sm-6 mb-3 mb-sm-0">
                            <p id="plus" class="btn btn-warning btn-user btn-block">Add Image Fileds</p>
                          </div>
                          <div class="col-sm-6 mb-3 mb-sm-0">
                            <button type="submit" class="btn btn-primary btn-user btn-block">Update</button>
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
  function deleteImg(id, path) {
    $.ajax({
      url: "<?php echo base_url(); ?>jcpscAdmin/deleteImg",
      type: "POST",
      data: {
        id: id,
        path: path
      },
      cache: false,
      success: function(data) {
        var data = JSON.parse(data);
        alert("Successfully Deleted ID NO : " + data);
        location.reload();
      }
    });
  }
</script>