    <!-- javascripts -->
    <script src="<?php echo $url;?>assets/js/jquery.js"></script>
    <script src="<?php echo $url;?>assets/js/jquery-ui-1.10.4.min.js"></script>
    <script src="<?php echo $url;?>assets/js/jquery-1.8.3.min.js"></script>
    <!--Select2 JS-->
    <script src="<?php echo $url;?>assets/dist/js/select2.min.js"></script>
    <script type="text/javascript" src="<?php echo $url;?>assets/js/jquery-ui-1.9.2.custom.min.js"></script>
    <!-- bootstrap -->
    <script src="<?php echo $url;?>assets/js/bootstrap.min.js"></script>
    
    <!-- nice scroll -->
    <script src="<?php echo $url;?>assets/js/jquery.scrollTo.min.js"></script>
    <script src="<?php echo $url;?>assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <!-- charts scripts -->
    <script src="<?php echo $url;?>assets/jquery-knob/js/jquery.knob.js"></script>
    <script src="<?php echo $url;?>assets/js/jquery.sparkline.js" type="text/javascript"></script>
    <script src="<?php echo $url;?>assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
    <script src="<?php echo $url;?>assets/js/owl.carousel.js" ></script>
    <!-- jQuery full calendar -->
    <!--<script src="<?php echo $url;?>assets/js/fullcalendar.min.js"></script> <!-- Full Google Calendar - Calendar
    <script src="<?php echo $url;?>assets/assets/fullcalendar/fullcalendar/fullcalendar.js"></script>-->
    <!--script for this page only-->
    <!--<script src="<?php echo $url;?>assets/js/calendar-custom.js"></script>-->
	<script src="<?php echo $url;?>assets/js/jquery.rateit.min.js"></script>
    <!-- custom select -->
    <script src="<?php echo $url;?>assets/js/jquery.customSelect.min.js" ></script>
	<script src="<?php echo $url;?>assets/chart-master/Chart.js"></script>
   
    <!--custome script for all page-->
    <script src="<?php echo $url;?>assets/js/scripts.js"></script>
    <!-- custom script for this page-->
    <script src="<?php echo $url;?>assets/js/sparkline-chart.js"></script>
    <script src="<?php echo $url;?>assets/js/easy-pie-chart.js"></script>
    <script src="<?php echo $url;?>assets/js/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="<?php echo $url;?>assets/js/jquery-jvectormap-world-mill-en.js"></script>
    <script src="<?php echo $url;?>assets/js/xcharts.min.js"></script>
    <script src="<?php echo $url;?>assets/js/jquery.autosize.min.js"></script>
    <script src="<?php echo $url;?>assets/js/jquery.placeholder.min.js"></script>
    <script src="<?php echo $url;?>assets/js/gdp-data.js"></script>	
    <script src="<?php echo $url;?>assets/js/morris.min.js"></script>
    <script src="<?php echo $url;?>assets/js/sparklines.js"></script>	
    <script src="<?php echo $url;?>assets/js/charts.js"></script>
    <script src="<?php echo $url;?>assets/js/jquery.slimscroll.min.js"></script>
    
    <script>
        var cariortu = [
	<?php
	foreach($getortuall as $dataortu)
	{
            echo "\"";
            echo $dataortu->ID_ORANGTUA.' - '.$dataortu->NIK_AYAH.' - '.$dataortu->NAMA_AYAH.' - '.$dataortu->NIK_IBU.' - '.$dataortu->NAMA_IBU;
            echo "\",";							   
        }
	?>
        ];
        
        $("#id_orangtua").autocomplete({
	 source: cariortu
	});
    </script>
    
    <!--<script>
        $('#nama_siswa').autocomplete({
	source: function( request, response ) {
		$.ajax({
			url: '<?php //echo $url;?>getsiswa',
			dataType: "json",
			method: 'post',
			data: {
				name_startsWith: request.term,
				type: 'nama_siswa'
			},
			success: function( data ) {
				response( $.map( data, function( item ) {
					console.log(item);
					//var code = item.split("|");
						return {
							label: item,
							value: item,
							data : item
						}
					}));
				}
			});
	},
	autoFocus: true,
	minLength: 1,
	select: function( event, ui ) {
		//on select
	}
});
    </script>-->
      
    <!--<script> 
        $(document).ready(function () {
        $(function () {
            $( "#nama_siswa" ).autocomplete({
                minLength:3,
                source: function(request, response) {
                    $.ajax({ 
                        url: "<?php //echo $url;?>getsiswa",
                        data: { term: $("#nama_siswa").val()},
    
                        dataType: "json",
                        type: "POST",
                        success: function(data){
                            response(data);
                        }    
                    });
                },
            });
        });
    });
    </script>-->
    
    
    <!--<script>
    $(document).ready(function() {
        $('#nama_siswa').select2();
        var district = $("#nama_siswa");
        district.change(function() {
            $.ajax({
                type: "post",
                url: "<?php //echo $url;?>getkelas"+district.val(),
//                data: "country=" + country,
                success: function(data) {
                    $("#id_kelas").html(data);
                }
            });
        });
    });
</script>-->
       
       <script>
      //knob
      $(function() {
        $(".knob").knob({
          'draw' : function () { 
            $(this.i).val(this.cv + '%')
          }
        })
      });

      //carousel
      $(document).ready(function() {
          $("#owl-slider").owlCarousel({
              navigation : true,
              slideSpeed : 300,
              paginationSpeed : 400,
              singleItem : true

          });
      });

      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });
	  
	  /* ---------- Map ---------- */
	$(function(){
	  $('#map').vectorMap({
	    map: 'world_mill_en',
	    series: {
	      regions: [{
	        values: gdpData,
	        scale: ['#000', '#000'],
	        normalizeFunction: 'polynomial'
	      }]
	    },
		backgroundColor: '#eef3f7',
	    onLabelShow: function(e, el, code){
	      el.html(el.html()+' (GDP - '+gdpData[code]+')');
	    }
	  });
	});



  </script>