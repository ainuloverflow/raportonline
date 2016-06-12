<!--main content start-->      
      <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><i class="icon_piechart"></i> Grafik Nilai <?php echo $nama_kelas;?></h3>
                </div>
            </div>
            <div class="row">
              <div class="col-lg-12">
                  <section class="panel">
<!--                      <br>
                      <br>
                      <div class="col-lg-6">
                          <label class="control-label col-lg-6" for="inputSuccess">Nama Mata Pelajaran</label>
                          <div class="col-lg-10">
                              <div class="row">
                                  <div class="col-lg-6">
                                      <form action="<?php //echo $url;?>tampil-mapel-dropdown" method="post">
                                      <select name="dropdown-mapel" onchange='this.form.submit()' class="form-control m-bot15">
                                          <option value="Matematika"> Matematika </option>
                                          <option value="Bahasa Inggris"> Bahasa Inggris </option>
                                          <option value="Bahasa Indonesia"> Bahasa Indonesia </option>
                                      </select>
                                          <noscript><input type="submit" value="Submit"></noscript>
                                      </form>
                                  </div>
                              </div>
                          </div>
                      </div>-->
                      <div id="output"></div>
                      <div class="panel-body">
                          <br>
                          <br>
                          <br>
                          <script type="text/javascript">
//                            function showUser(str) {
//                                if (str == "") {
//                                    document.getElementById("txtHint").innerHTML = "";
//                                    return;
//                                } else { 
//                                    if (window.XMLHttpRequest) {
//                                        // code for IE7+, Firefox, Chrome, Opera, Safari
//                                        xmlhttp = new XMLHttpRequest();
//                                    } else {
//                                        // code for IE6, IE5
//                                        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
//                                    }
//                                    xmlhttp.onreadystatechange = function() {
//                                        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
//                                            document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
//                                        }
//                                    };
//                                    xmlhttp.open("GET","getuser.php?q="+str,true);
//                                    xmlhttp.send();
//                                }
//                            }
                          </script>
                          <script type="text/javascript">                             
                            google.charts.load("current", {packages:["corechart"]});
                            google.charts.setOnLoadCallback(drawChart);
                            
                            function drawChart() {
                                var jsonData = $.ajax({
                                    url: "<?php echo $url;?>data-grafik-nilai",
                                    dataType: "json",
                                    async : false
                                 }).responseText;   

                                // Create our data table out of JSON data loaded from server.
                                var data = new google.visualization.DataTable(jsonData);
                                
                                var options = {
                                      hAxis: {
                                        title: 'NISN Siswa Kelas <?php echo $nama_kelas;?>'
                                      },
                                              
                                      vAxis: {
                                        title: 'Mata Pelajaran <?php echo $nama_mapel;?>'
                                      },
                                      
                                };
                                // Instantiate and draw our chart, passing in some options.
                                var chart = new google.visualization.LineChart(document.getElementById('linechart'));
                                chart.draw(data, options, {width: 1000, height: 500});                               
                            }
                           </script>
                           <body>
                                <div id="container">
                                    <div id="linechart" style="width: 1000px; height: 500px;"></div>
                                </div>
                           </body>
                      </div>
                  </section>
               </div>
            </div>
            </section>
      </section>
      <!--main content end-->
