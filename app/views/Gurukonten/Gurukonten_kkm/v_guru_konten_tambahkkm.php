<!--main content start-->
      <section id="main-content">
          <section class="wrapper">            
              <!--overview start-->
			<div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="icon_document_alt"></i><?php echo $namaCTRL;?></h3>
					<ol class="breadcrumb">
                                            <li><i class="icon_documents"></i><a href="<?php echo $url;?>datanilai-as-guru"><?php echo $breadcrumb;?></a></li>						  	
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
                          
                              <form class="form-horizontal" action="<?php echo $url;?>tambahnilai-as-guru" method="post">
                  
                                  <div class="form-group">
                                      <label class="col-sm-2 control-label">NIS atau Nama Siswa</label>
                                      <div class="col-sm-7">
                                          <p><?php echo $validasi->errorMessages('id_siswa', '<p style="color:red">', '</p>');?></p>
                                          <input id="id_siswa" name="id_siswa" type="text" placeholder="Ketikan Nama atau NIK Siswa" class="form-control round-input">
                                      </div>
                                  </div>
                                  
                                  <!--<div class="form-group">
                                      <label class="col-sm-2 control-label">Nama Mata Pelajaran</label>
                                      <div class="col-sm-7">
                                          <p><?php //echo $validasi->errorMessages('id_mapel', '<p style="color:red">', '</p>');?></p>
                                          <input id="id_mapel" name="id_mapel" type="text" placeholder="Ketikan Nama Mapel" class="form-control round-input">
                                      </div>
                                  </div>-->
                                  
                                  <div class="form-group">
                                      <label class="col-sm-2 control-label">Nilai Kopetensi Pengetahuan</label>
                                      <div class="col-sm-7">
                                           <p><?php echo $validasi->errorMessages('nilai_kop_pengetahuan', '<p style="color:red">', '</p>');?></p>
                                          <input type="text" value="<?php echo $validasi->value('nilai_kop_pengetahuan');?>" name="nilai_kop_pengetahuan" class="form-control round-input">
                                      </div>
                                  </div>
                                  
                                  <div class="form-group">
                                      <label class="col-sm-2 control-label">Nilai Kopetensi Keterampilan</label>
                                      <div class="col-sm-7">
                                          <p><?php echo $validasi->errorMessages('nilai_kop_keterampilan', '<p style="color:red">', '</p>');?></p>
                                          <input type="text" value="<?php echo $validasi->value('nilai_kop_keterampilan');?>" name="nilai_kop_keterampilan" class="form-control round-input">
                                      </div>
                                  </div>
                                  
                                  <div class="form-group">
                                      <label class="col-sm-2 control-label">Nilai Sikap</label>
                                      <div class="col-sm-7">
                                          <p><?php echo $validasi->errorMessages('nilai_sikap', '<p style="color:red">', '</p>');?></p>
                                          <input type="text" value="<?php echo $validasi->value('nilai_sikap');?>" name="nilai_sikap" class="form-control round-input">
                                      </div>
                                  </div>
                                  
                                  <div class="form-group">
                                      <label class="col-sm-2 control-label">Nilai Tugas</label>
                                      <div class="col-sm-7">
                                          <p><?php echo $validasi->errorMessages('nilai_tugas', '<p style="color:red">', '</p>');?></p>
                                          <input type="text" value="<?php echo $validasi->value('nilai_tugas');?>" name="nilai_tugas" class="form-control round-input">
                                      </div>
                                  </div>
                                  
                                  <div class="form-group">
                                      <label class="col-sm-2 control-label">Nilai UTS</label>
                                      <div class="col-sm-7">
                                          <p><?php echo $validasi->errorMessages('nilai_uts', '<p style="color:red">', '</p>');?></p>
                                          <input type="text" value="<?php echo $validasi->value('nilai_uts');?>" name="nilai_uts" class="form-control round-input">
                                      </div>
                                  </div>
                                  
                                  <div class="form-group">
                                      <label class="col-sm-2 control-label">Nilai UAS</label>
                                      <div class="col-sm-7">
                                          <p><?php echo $validasi->errorMessages('nilai_uas', '<p style="color:red">', '</p>');?></p>
                                          <input type="text" value="<?php echo $validasi->value('nilai_uas');?>" name="nilai_uas" class="form-control round-input">
                                      </div>
                                  </div>
                                  
                                  <!--<div class="form-group">
                                      <label class="col-sm-2 control-label">Input focus</label>
                                      <div class="col-sm-10">
                                          <input class="form-control" id="focusedInput" type="text" value="This is focused...">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 control-label">Disabled</label>
                                      <div class="col-sm-10">
                                          <input class="form-control" id="disabledInput" type="text" placeholder="Disabled input here..." disabled>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 control-label">Placeholder</label>
                                      <div class="col-sm-10">
                                          <input type="text"  class="form-control" placeholder="placeholder">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 control-label">Password</label>
                                      <div class="col-sm-10">
                                          <input type="password"  class="form-control" placeholder="">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-lg-2 control-label">Static control</label>
                                      <div class="col-lg-10">
                                          <p class="form-control-static">email@example.com</p>
                                      </div>
                                  </div>-->
                                  <div class="form-group">
                                      <label class="col-sm-2 control-label"></label>
                                      <div class="col-sm-7">
                                    
                                        <button <a class="btn btn-primary" name="login" type="submit" value="submit">Simpan</a></button>
                                        <button <a class="btn btn-danger" name="reset" type="reset" value="reset">Reset</a></button>
                                    
                                      </div>
                                  </div>
                              </form>
                          </div>
                      </section>
                      <!--<section class="panel">
                          <div class="panel-body">
                              <form class="form-horizontal " method="get">
                                  <div class="form-group has-success">
                                      <label class="control-label col-lg-2" for="inputSuccess">Input with success</label>
                                      <div class="col-lg-10">
                                          <input type="text" class="form-control" id="inputSuccess">
                                      </div>
                                  </div>
                                  <div class="form-group has-warning">
                                      <label class="control-label col-lg-2" for="inputWarning">Input with warning</label>
                                      <div class="col-lg-10">
                                          <input type="text" class="form-control" id="inputWarning">
                                      </div>
                                  </div>
                                  <div class="form-group has-error">
                                      <label class="control-label col-lg-2" for="inputError">Input with error</label>
                                      <div class="col-lg-10">
                                          <input type="text" class="form-control" id="inputError">
                                      </div>
                                  </div>
                              </form>
                          </div>
                      </section> -->
                      <!--<section class="panel">
                          <div class="panel-body">
                              <form class="form-horizontal " method="get">
                                  <div class="form-group">
                                      <label class="control-label col-lg-2" for="inputSuccess">Control sizing</label>
                                      <div class="col-lg-10">
                                          <input class="form-control input-lg m-bot15" type="text" placeholder=".input-lg">
                                          <input class="form-control m-bot15" type="text" placeholder="Default input">
                                          <input class="form-control input-sm m-bot15" type="text" placeholder=".input-sm">

                                          <select class="form-control input-lg m-bot15">
                                              <option>Option 1</option>
                                              <option>Option 2</option>
                                              <option>Option 3</option>
                                          </select>
                                          <select class="form-control m-bot15">
                                              <option>Option 1</option>
                                              <option>Option 2</option>
                                              <option>Option 3</option>
                                          </select>
                                          <select class="form-control input-sm m-bot15">
                                              <option>Option 1</option>
                                              <option>Option 2</option>
                                              <option>Option 3</option>
                                          </select>
                                      </div>
                                  </div>
                              </form>
                          </div>
                      </section> -->
                      <!--section class="panel">
                          <div class="panel-body">
                              <form class="form-horizontal " method="get">
                                  <div class="form-group">
                                      <label class="control-label col-lg-2" for="inputSuccess">Checkboxes and radios</label>
                                      <div class="col-lg-10">
                                          <div class="checkbox">
                                              <label>
                                                  <input type="checkbox" value="">
                                                  Option one is this and that&mdash;be sure to include why it's great
                                              </label>
                                          </div>

                                          <div class="checkbox">
                                              <label>
                                                  <input type="checkbox" value="">
                                                  Option one is this and that&mdash;be sure to include why it's great option one
                                              </label>
                                          </div>

                                          <div class="radio">
                                              <label>
                                                  <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                                                  Option one is this and that&mdash;be sure to include why it's great
                                              </label>
                                          </div>
                                          <div class="radio">
                                              <label>
                                                  <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                                                  Option two can be something else and selecting it will deselect option one
                                              </label>
                                          </div>

                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="control-label col-lg-2" for="inputSuccess">Inline checkboxes</label>
                                      <div class="col-lg-10">
                                          <label class="checkbox-inline">
                                              <input type="checkbox" id="inlineCheckbox1" value="option1"> 1
                                          </label>
                                          <label class="checkbox-inline">
                                              <input type="checkbox" id="inlineCheckbox2" value="option2"> 2
                                          </label>
                                          <label class="checkbox-inline">
                                              <input type="checkbox" id="inlineCheckbox3" value="option3"> 3
                                          </label>

                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="control-label col-lg-2" for="inputSuccess">Selects</label>
                                      <div class="col-lg-10">
                                          <select class="form-control m-bot15">
                                              <option>1</option>
                                              <option>2</option>
                                              <option>3</option>
                                              <option>4</option>
                                              <option>5</option>
                                          </select>

                                          <select multiple class="form-control">
                                              <option>1</option>
                                              <option>2</option>
                                              <option>3</option>
                                              <option>4</option>
                                              <option>5</option>
                                          </select>
                                      </div>
                                  </div>

                                  <div class="form-group">
                                      <label class="control-label col-lg-2" for="inputSuccess">Column sizing</label>
                                      <div class="col-lg-10">
                                          <div class="row">
                                              <div class="col-lg-2">
                                                  <input type="text" class="form-control" placeholder=".col-lg-2">
                                              </div>
                                              <div class="col-lg-3">
                                                  <input type="text" class="form-control" placeholder=".col-lg-3">
                                              </div>
                                              <div class="col-lg-4">
                                                  <input type="text" class="form-control" placeholder=".col-lg-4">
                                              </div>
                                          </div>

                                      </div>
                                  </div>

                              </form>
                          </div>
                      </section>-->
                  </div>
              </div>

          </section>
      </section>
      <!--main content end-->