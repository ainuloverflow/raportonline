    <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <!--overview start-->
			<div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="icon_document_alt"></i> <?php echo $namaCTRL;?></h3>
                                </div>
                        </div>
              <!-- project team & activity end -->

              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-primary" href="<?php echo $url;?>tambahsiswa"><i class="icon_plus_alt2"></i></a>
              <br>
              <br>
              <div class="col-lg-12">
                      <section class="panel">         
                          <table class="table table-striped table-advance table-hover">
                            <tbody>
                              <tr>
                                 <th><i class="icon_profile"></i> ID Siswa</th>
                                 <th><i class="icon_calendar"></i> Nama</th>
                                 <th><i class="icon_pin_alt"></i> Alamat</th>
                                 <th><i class="icon_mobile"></i> Nomor Handphone</th>
                                 <!--<th><i class="icon_cogs"></i> Kelas</th>-->
                                 <th><i class="icon_cogs"></i> Aksi</th>
                              </tr>
                              <tr>
                            <?php if($datasiswa) : ?>
                                <?php foreach ($datasiswa as $datasiswasiswi) :?> 
                                 <td><?php echo $datasiswasiswi->ID_SISWA;?></td>
                                 <td><?php echo $datasiswasiswi->NAMA_SISWA;?></td>
                                 <td><?php echo $datasiswasiswi->ALAMAT;?></td>
                                 <td><?php echo $datasiswasiswi->NO_TELP;?></td>
                                 <td>
                                  <div class="btn-group">
                                      <!--<a class="btn btn-primary" href="#"><i class="icon_plus_alt2"></i></a>-->
                                      <a class="btn btn-success" href="<?php echo $url;?>editsiswa/<?php echo $datasiswasiswi->ID_SISWA;?>"><i class="icon_check_alt2"></i></a>
                                      <a class="btn btn-danger" href="#"><i class="icon_close_alt2"></i></a>
                                  </div>
                                  </td>
                              </tr>
                                <?php endforeach;?>
                                <?php else : ?>
                                    <tr><td colspan='7'>Tidak ada data.</td></tr>
                                <?php endif;?>                  
                           </tbody>
                        </table>
                      </section>
                  </div>
          </section>
      </section>
      <!--main content end-->