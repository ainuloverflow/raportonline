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
                                  
                                   <div class="form-group">
                                        <label class="col-sm-2 control-label">Jenis Kopetensi Dasar</label>
                                        <div class="col-sm-5">
                                            <p></p>
                                            <select name="kd" value="" class="btn btn-default dropdown-toggle">
                                                <option>Pilih</option>
                                            </select>
                                        </div>
                                  </div>
                                  
                                   <div class="form-group">
                                        <label class="col-sm-2 control-label">Nomor Kopetensi Dasar</label>
                                        <div class="col-sm-5">
                                            <p></p>
                                            <select name="nomorkd" value="" class="btn btn-default dropdown-toggle">
                                                <option>Pilih</option>>                                                
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
                                          <label for="deskripsi" class="control-label col-lg-2">Deskripsi</label>
                                          <div class="col-lg-10">
                                              <textarea class="form-control " id="deskripsi" name="deskripsi" required></textarea>
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