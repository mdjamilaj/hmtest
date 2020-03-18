					<!---------
					<div id="footerPartCustom">
						<p> <i class="fa fa-cog fa-spin fa-lg fa-fw"></i> Software Developed by 
							<span class="lead"> 
								<a href="http://www.itlabsolutions.com" target="_blank" id="companyTitle"> 
									<img id="footerLogo" style="width:30px;" src="<?php echo base_url();?>images/itlablogo.png"/> IT Lab Solutions Ltd.<sup>&reg;</sup> 
								</a>
							</span>
							
							<input type="hidden" id="session_show_link" value="<?php echo base_url();?>index.php/json/session_show">
						</p>
					</div> ------>
					<!-- footer content -->
				</div>
				<!-- /page content -->
			</div>
		</div>

		<div id="custom_notifications" class="custom-notifications dsp_none">
			<ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
			</ul>
			
			<div class="clearfix"></div>
			<div id="notif-group" class="tabbed_notifications"></div>
		</div>

		<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>

		<!-- gauge js -->
		<script type="text/javascript" src="<?php echo base_url();?>assets/js/gauge/gauge.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>assets/js/gauge/gauge_demo.js"></script>
		<!-- chart js -->
		<script src="<?php echo base_url();?>assets/js/chartjs/chart.min.js"></script>
		<!-- bootstrap progress js -->
		<script src="<?php echo base_url();?>assets/js/progressbar/bootstrap-progressbar.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/nicescroll/jquery.nicescroll.min.js"></script>
		<!-- icheck -->
		<script src="<?php echo base_url();?>assets/js/icheck/icheck.min.js"></script>
		<!-- daterangepicker -->
		<script type="text/javascript" src="<?php echo base_url();?>assets/js/moment.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>assets/js/datepicker/daterangepicker.js"></script>
		<script src="<?php echo base_url();?>assets/js/select/select2.full.js"></script>
		<script src="<?php echo base_url();?>assets/js/custom.js"></script>

		<!-- flot js -->
		<!--[if lte IE 8]><script type="text/javascript" src="<?php echo base_url();?>assets/js/excanvas.min.js"></script><![endif]-->
		<script type="text/javascript" src="<?php echo base_url();?>assets/js/flot/jquery.flot.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>assets/js/flot/jquery.flot.pie.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>assets/js/flot/jquery.flot.orderBars.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>assets/js/flot/jquery.flot.time.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>assets/js/flot/date.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>assets/js/flot/jquery.flot.spline.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>assets/js/flot/jquery.flot.stack.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>assets/js/flot/curvedLines.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>assets/js/flot/jquery.flot.resize.js"></script>
		<script>
			$(document).ready(function () {
				// [17, 74, 6, 39, 20, 85, 7]
				//[82, 23, 66, 9, 99, 6, 2]
				var data1 = [[gd(2012, 1, 1), 17], [gd(2012, 1, 2), 74], [gd(2012, 1, 3), 6], [gd(2012, 1, 4), 39], [gd(2012, 1, 5), 20], [gd(2012, 1, 6), 85], [gd(2012, 1, 7), 7]];

				var data2 = [[gd(2012, 1, 1), 82], [gd(2012, 1, 2), 23], [gd(2012, 1, 3), 66], [gd(2012, 1, 4), 9], [gd(2012, 1, 5), 119], [gd(2012, 1, 6), 6], [gd(2012, 1, 7), 9]];
				$("#canvas_dahs").length && $.plot($("#canvas_dahs"), [
					data1, data2
				], {
					series: {
						lines: {
							show: false,
							fill: true
						},
						splines: {
							show: true,
							tension: 0.4,
							lineWidth: 1,
							fill: 0.4
						},
						points: {
							radius: 0,
							show: true
						},
						shadowSize: 2
					},
					grid: {
						verticalLines: true,
						hoverable: true,
						clickable: true,
						tickColor: "#d5d5d5",
						borderWidth: 1,
						color: '#fff'
					},
					colors: ["rgba(38, 185, 154, 0.38)", "rgba(3, 88, 106, 0.38)"],
					xaxis: {
						tickColor: "rgba(51, 51, 51, 0.06)",
						mode: "time",
						tickSize: [1, "day"],
						//tickLength: 10,
						axisLabel: "Date",
						axisLabelUseCanvas: true,
						axisLabelFontSizePixels: 12,
						axisLabelFontFamily: 'Verdana, Arial',
						axisLabelPadding: 10
							//mode: "time", timeformat: "%m/%d/%y", minTickSize: [1, "day"]
					},
					yaxis: {
						ticks: 8,
						tickColor: "rgba(51, 51, 51, 0.06)",
					},
					tooltip: false
				});

				function gd(year, month, day) {
					return new Date(year, month - 1, day).getTime();
				}
			});
		</script>

		<script>
			NProgress.done();
			$body = $("body");

			$(document).on({
				ajaxStart: function() { $body.addClass("loading"); },
				ajaxStop: function() { $body.removeClass("loading"); }    
			});
		</script>
		<!-- /datepicker -->
		
		<!-- /footer content -->
		<div class="modals"><h1> Please Wait... </h1> </div>
	</body>
</html>
