<script>
// returns a function that calculates lanczos weight
function lanczosCreate(lobes) {
    return function(x) {
        if (x > lobes)
            return 0;
        x *= Math.PI;
        if (Math.abs(x) < 1e-16)
            return 1;
        var xx = x / lobes;
        return Math.sin(x) * Math.sin(xx) / x / xx;
    };
}

// elem: canvas element, img: image element, sx: scaled width, lobes: kernel radius
function thumbnailer(elem, img, sx, lobes) {
    this.canvas = elem;
    elem.width = img.width;
    elem.height = img.height;
    elem.style.display = "none";
    this.ctx = elem.getContext("2d");
    this.ctx.drawImage(img, 0, 0);
    this.img = img;
    this.src = this.ctx.getImageData(0, 0, img.width, img.height);
    this.dest = {
        width : sx,
        height : Math.round(img.height * sx / img.width),
    };
    this.dest.data = new Array(this.dest.width * this.dest.height * 3);
    this.lanczos = lanczosCreate(lobes);
    this.ratio = img.width / sx;
    this.rcp_ratio = 2 / this.ratio;
    this.range2 = Math.ceil(this.ratio * lobes / 2);
    this.cacheLanc = {};
    this.center = {};
    this.icenter = {};
    setTimeout(this.process1, 0, this, 0);
}

thumbnailer.prototype.process1 = function(self, u) {
    self.center.x = (u + 0.5) * self.ratio;
    self.icenter.x = Math.floor(self.center.x);
    for (var v = 0; v < self.dest.height; v++) {
        self.center.y = (v + 0.5) * self.ratio;
        self.icenter.y = Math.floor(self.center.y);
        var a, r, g, b;
        a = r = g = b = 0;
        for (var i = self.icenter.x - self.range2; i <= self.icenter.x + self.range2; i++) {
            if (i < 0 || i >= self.src.width)
                continue;
            var f_x = Math.floor(1000 * Math.abs(i - self.center.x));
            if (!self.cacheLanc[f_x])
                self.cacheLanc[f_x] = {};
            for (var j = self.icenter.y - self.range2; j <= self.icenter.y + self.range2; j++) {
                if (j < 0 || j >= self.src.height)
                    continue;
                var f_y = Math.floor(1000 * Math.abs(j - self.center.y));
                if (self.cacheLanc[f_x][f_y] == undefined)
                    self.cacheLanc[f_x][f_y] = self.lanczos(Math.sqrt(Math.pow(f_x * self.rcp_ratio, 2)
                            + Math.pow(f_y * self.rcp_ratio, 2)) / 1000);
                weight = self.cacheLanc[f_x][f_y];
                if (weight > 0) {
                    var idx = (j * self.src.width + i) * 4;
                    a += weight;
                    r += weight * self.src.data[idx];
                    g += weight * self.src.data[idx + 1];
                    b += weight * self.src.data[idx + 2];
                }
            }
        }
        var idx = (v * self.dest.width + u) * 3;
        self.dest.data[idx] = r / a;
        self.dest.data[idx + 1] = g / a;
        self.dest.data[idx + 2] = b / a;
    }

    if (++u < self.dest.width)
        setTimeout(self.process1, 0, self, u);
    else
        setTimeout(self.process2, 0, self);
};
thumbnailer.prototype.process2 = function(self) {
    self.canvas.width = self.dest.width;
    self.canvas.height = self.dest.height;
    self.ctx.drawImage(self.img, 0, 0, self.dest.width, self.dest.height);
    self.src = self.ctx.getImageData(0, 0, self.dest.width, self.dest.height);
    var idx, idx2;
    for (var i = 0; i < self.dest.width; i++) {
        for (var j = 0; j < self.dest.height; j++) {
            idx = (j * self.dest.width + i) * 3;
            idx2 = (j * self.dest.width + i) * 4;
            self.src.data[idx2] = self.dest.data[idx];
            self.src.data[idx2 + 1] = self.dest.data[idx + 1];
            self.src.data[idx2 + 2] = self.dest.data[idx + 2];
        }
    }
    self.ctx.putImageData(self.src, 0, 0);
    self.canvas.style.display = "block";
};
</script>








<style>
  form.user .form-control-user {
    border-radius: 3px;
  }
</style>

<script type="text/javascript">
  $(document).ready(function() {
    $('#publish_date').daterangepicker({
      singleDatePicker: true,
      calender_style: "picker_4"
    }, function(start, end, label) {
      console.log(start.toISOString(), end.toISOString(), label);
    });
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
        <h3> Create Notice </h3>
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
                        <!-- <div class="text-center">
                          <h1 class="h4 text-gray-900 mb-4"> Create Notice</h1>
                        </div> -->
                        <form    name="uploadForm" class="user" action="<?php echo base_url() ?>jcpscAdmin/notice_store" method="post" enctype="multipart/form-data">
                          <div class="form-group row">
                          <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="#"><i class="fa fa-exclamation-circle"></i> Notice Title English :</label>
                            <input type="text"  autocomplete="off" name="title_english" class="form-control form-control-user" required id="title_english" placeholder="Enter Notice Title English">
                          </div>
                          <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="#"><i class="fa fa-exclamation-circle"></i> Notice Title Bangla :</label>
                            <input type="text" autocomplete="off" name="title_bangla" class="form-control form-control-user" required id="title_bangla" placeholder="Enter Notice Title Bangla">
                          </div>
                          </div>

                          <div class="form-group">
                          <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="#"><i class="fa fa-exclamation-circle"></i> Notice Description English :</label>
                            <textarea type="text" autocomplete="off" name="des_english" class="form-control form-control-user des_english" required id="des_english" placeholder="Notice Description English"></textarea>
                          </div>
                          <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="#"><i class="fa fa-exclamation-circle"></i> Notice Description Bangla :</label>
                            <textarea type="text" autocomplete="off" name="des_bangla" class="form-control form-control-user" required id="des_bangla" placeholder="Notice Description Bangla"></textarea>
                          </div>
                          </div>

                          <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                              <label for="#"><i class="fa fa-exclamation-circle"></i> Notice Attachment :</label>
                              <input type="file"  id="file"  accept="image/*" name="attachment" class="form-control form-control-user pb-5" placeholder="Notice Description Bangla">
                            </div>
                            <img src=""  id="upload-Preview" alt="">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                              <label for="#"><i class="fa fa-exclamation-circle"></i> Notice Date :</label>
                              <input type="text" autocomplete="off" name="notice_date"  class="form-control form-control-user" required id="notice_date" placeholder="Notice Date">
                            </div>
                          </div>
                          <!-- <textarea name="" id="jamil" cols="30" rows="10"></textarea> -->

                          <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                              <label for="#"><i class="fa fa-exclamation-circle"></i> Notice Publish Date :</label>
                              <input type="text" autocomplete="off"  name="publish_date" class="form-control form-control-user" required id="publish_date" placeholder="Notice Publish Date">
                            </div>
                            <div class="col-sm-6 mb-3 mb-sm-0">
                              <label for="#"><i class="fa fa-exclamation-circle"></i> Notice Publish Time :</label>
                              <input type="text" autocomplete="off"  name="publish_time" class="form-control form-control-user" required id="publish_time" placeholder="Notice Publish Time">
                            </div>
                          </div>


                          <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                              <label for="#"><i class="fa fa-exclamation-circle"></i> Notice Creator Name :</label>
                              <input type="text" autocomplete="off" name="creator"  class="form-control form-control-user" required id="creator" placeholder="Enter Creator Name">
                            </div>
                            <div class="col-sm-6 mb-3 mb-sm-0">
                              <label for="#"><i class="fa fa-exclamation-circle"></i> Notice Status :</label>
                              <select class="form-control" name="showDocument" >
                                  <option value="1" selected>Active</option>
                                  <option value="0">Inactive</option>
                              </select>
                            </div>
                          </div>

                          <div class="form-group row">
                            <div class="col-sm-4 mb-4 mb-sm-0">
                              <!-- <button  formaction="<?php echo base_url() ?>jcpscAdmin/notice_print" class="btn btn-primary btn-user btn-block">Print</button> -->
                              <button type="button" class="btn btn-warning btn-user btn-block" id="pre_view" data-toggle="modal" data-target=".bd-example-modal-lg">Pre View</a>
                            </div>
                            <div class="col-sm-4 mb-4 mb-sm-0">
                              <button type="submit" class="btn btn-primary btn-user btn-block">Save</button>
                            </div>
                            <div class="col-sm-4 mb-4 mb-sm-0">
                              <button formaction="<?php echo base_url() ?>jcpscAdmin/notice_store_and_print" class="btn btn-info btn-user btn-block">Save & Print</button>
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
    defaultTime: '11',
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


