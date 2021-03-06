<!--main content start-->
      <section id="main-content">
          <section class="wrapper">            
              <!--overview start-->
			<div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="icon_document_alt"></i><?php echo $namaCTRL;?></h3>
					<ol class="breadcrumb">
                                            <li><i class="icon_documents"></i><a href="<?php echo $url;?>data-kkm-kd"><?php echo $breadcrumb;?></a></li>					  	
					</ol>
				</div>
			</div>
              <!-- project team & activity end -->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                            <?php echo $namaCTRL;?> 
                          </header>
                          <div class="panel-body">
                              <form class="form-horizontal" action="<?php echo $url;?>tambah-kd" method="post">
                                  <h4 style="color:red">(NB : Saat penambahan Kopetensi Dasar parameter <strong>Mata Pelajaran</strong> otomatis sudah ditambahkan sesuai yang Anda ampu.</h4>                                                                    
                                  <br> 
                                  <div class="form-group">
                                        <label class="col-sm-2 control-label">Pilih KI-3(Pengetahuan)</label>
                                        <div class="col-sm-5">
                                            <p><?php echo $validasi->errorMessages('ki-3', '<p style="color:red">', '</p>');?></p>
                                            <select name="ki-3" value="" class="btn btn-default dropdown-toggle">                                               
                                                <option></option>
                                                <option value="3.1a">3.1a</option>                                 
                                                <option value="3.2a">3.2a</option>
                                                <option value="3.3">3.3</option>                                 
                                                <option value="3.4a">3.4a</option> 
                                                <option value="3.5a">3.5a</option>                                 
                                                <option value="3.6a">3.6a</option>
                                                <option value="3.7a">3.7a</option>                                 
                                                <option value="3.8a">3.8a</option>
                                                <option value="3.1b">3.1b</option>                                 
                                                <option value="3.2b">3.2b</option> 
                                                <option value="3.3b">3.3b</option>                                 
                                                <option value="3.4b">3.4b</option>
                                                <option value="3.5b">3.5b</option>                                 
                                                <option value="3.6b">3.6b</option>
                                                <option value="3.7b">3.7b</option>                                 
                                                <option value="3.8b">3.8b</option> 
                                                <option value="3.1c">3.1c</option>                                 
                                                <option value="3.2c">3.2c</option>
                                                <option value="3.3c">3.3c</option>                                 
                                                <option value="3.4c">3.4c</option>
                                                <option value="3.5c">3.5c</option>                                 
                                                <option value="3.6c">3.6c</option> 
                                                <option value="3.7c">3.7c</option>                                 
                                                <option value="3.8c">3.8c</option>
                                                <option value="3.1d">3.1d</option>                                 
                                                <option value="3.2d">3.2d</option>
                                                <option value="3.3d">3.3d</option>                                 
                                                <option value="3.4d">3.4d</option> 
                                                <option value="3.5d">3.5d</option>                                 
                                                <option value="3.6d">3.6d</option>
                                                <option value="3.7d">3.7d</option>                                 
                                                <option value="3.8d">3.8d</option>                                    
                                            </select>
                                        </div>
                                  </div>
                                  
                                  <div class="form-group ">
                                          <label for="deskripsi" class="control-label col-lg-2">Deskripsi singkat KI-3(Pengetahuan)</label>
                                          <div class="col-lg-10">
                                              <p><?php echo $validasi->errorMessages('deskripsiki-3', '<p style="color:red">', '</p>');?></p>
                                              <textarea class="form-control " id="deskripsi" name="deskripsiki-3"></textarea>
                                          </div>
                                  </div>
                                
                                  <div class="form-group">
                                        <label class="col-sm-2 control-label">Pilih KI-4(Keterampilan)</label>
                                        <div class="col-sm-5">
                                            <p style="color:green">Kopetensi dasar KI-4 boleh dikosongi dan disesuaikan dengan mapel yang bersangkutan</p>
                                            <select name="ki-4" value="" class="btn btn-default dropdown-toggle">
                                                <option></option>
                                                <option value="4.1a">4.1a</option>                                 
                                                <option value="4.2a">4.2a</option>
                                                <option value="4.3a">4.3a</option>                                 
                                                <option value="4.4a">4.4a</option> 
                                                <option value="4.5a">4.5a</option>                                 
                                                <option value="4.6a">4.6a</option>
                                                <option value="4.7a">4.7a</option>                                 
                                                <option value="4.8a">4.8a</option>
                                                <option value="4.1b">4.1b</option>                                 
                                                <option value="4.2b">4.2b</option> 
                                                <option value="4.3b">4.3b</option>                                 
                                                <option value="4.4b">4.4b</option>
                                                <option value="4.5b">4.5b</option>                                 
                                                <option value="4.6b">4.6b</option>
                                                <option value="4.7b">4.7b</option>                                 
                                                <option value="4.8b">4.8b</option> 
                                                <option value="4.1c">4.1c</option>                                 
                                                <option value="4.2c">4.2c</option>
                                                <option value="4.3c">4.3c</option>                                 
                                                <option value="4.4c">4.4c</option>
                                                <option value="4.5c">4.5c</option>                                 
                                                <option value="4.6c">4.6c</option> 
                                                <option value="4.7c">4.7c</option>                                 
                                                <option value="4.8c">4.8c</option>
                                                <option value="4.1d">4.1d</option>                                 
                                                <option value="4.2d">4.2d</option>
                                                <option value="4.3d">4.3d</option>                                 
                                                <option value="4.4d">4.4d</option> 
                                                <option value="4.5d">4.5d</option>                                 
                                                <option value="4.6d">4.6d</option>
                                                <option value="4.7d">4.7d</option>                                 
                                                <option value="4.8d">4.8d</option> 
                                            </select>
                                        </div>
                                  </div>
                                  
                                  <div class="form-group ">
                                          <label for="deskripsi" class="control-label col-lg-2">Deskripsi singkat KI-4(Keterampilan)</label>
                                          <div class="col-lg-10">
                                              <p style="color:green">Deskripsi kopetensi dasar KI-4 boleh dikosongi dan disesuaikan dengan mapel yang bersangkutan</p>
                                              <textarea class="form-control " id="deskripsi" name="deskripsiki-4"></textarea>
                                          </div>
                                  </div>
                                  
                                  <div class="form-group">
                                        <label class="col-sm-2 control-label">Pilih KI-1 (Kopetensi Dasar yang dikembangkan oleh sekolah)</label>
                                        <div class="col-sm-5">
                                            <p><?php echo $validasi->errorMessages('ki-1', '<p style="color:red">', '</p>');?></p>
                                            <select name="ki-1" value="" class="btn btn-default dropdown-toggle">
                                                <option></option>
                                                <?php $x=20;?>
                                                <?php for($i=1;$i<=$x;$i++){?>
                                                <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                                <?php }?>                               
                                            </select>
                                        </div>
                                  </div>
                                  
                                  <div class="form-group ">
                                          <label for="deskripsi" class="control-label col-lg-2">Deskripsi singkat KI-1 (Deskripsi Kopetensi Dasar yang dikembangkan oleh sekolah)</label>
                                          <div class="col-lg-10">
                                              <p><?php echo $validasi->errorMessages('deskripsiki-1', '<p style="color:red">', '</p>');?></p>
                                              <textarea class="form-control " id="deskripsi" name="deskripsiki-1"></textarea>
                                          </div>
                                  </div>
                                  
                                  <div class="form-group">
                                        <label class="col-sm-2 control-label">Pilih KI-2 (Kopetensi Dasar yang dikembangkan oleh sekolah)</label>
                                        <div class="col-sm-5">
                                            <p><?php echo $validasi->errorMessages('ki-2', '<p style="color:red">', '</p>');?></p>
                                            <select name="ki-2" value="" class="btn btn-default dropdown-toggle">
                                                <option></option>
                                                <?php $x=20;?>
                                                <?php for($i=1;$i<=$x;$i++){?>
                                                <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                                <?php }?>                               
                                            </select>
                                        </div>
                                  </div>
                                  
                                  <div class="form-group ">
                                          <label for="deskripsi" class="control-label col-lg-2">Deskripsi singkat KI-2 (Deskripsi Kopetensi Dasar yang dikembangkan oleh sekolah)</label>
                                          <div class="col-lg-10">
                                              <p><?php echo $validasi->errorMessages('deskripsiki-2', '<p style="color:red">', '</p>');?></p>
                                              <textarea class="form-control " id="deskripsi" name="deskripsiki-2"></textarea>
                                          </div>
                                  </div>
                                                                                                 
                                  <div class="form-group">
                                      <label class="col-sm-2 control-label"></label>
                                      <div class="col-sm-7">
                                    <td>
                                        <button <a class="btn btn-primary" name="login" type="submit" value="submit">Simpan</a></button>
                                        <button <a class="btn btn-danger" name="reset" type="reset" value="reset">Reset</a></button>
                                    </td>
                                      </div>
                                  </div>
                              </form>
                          </div>
                      </section>
                   
                  </div>
              </div>

          </section>
      </section>
      <!--main content end-->