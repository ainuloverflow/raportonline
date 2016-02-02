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

              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-primary" href="<?php echo $url;?>tambahortu"><i class="icon_plus_alt2"></i></a>
              <br>
              <br>
              <div class="col-lg-12">
                      <section class="panel">         
                          <table class="table table-striped table-advance table-hover">
                            <tbody>
                              <tr>
                                 <th><i class="icon_id"></i> Nama Siswa</th>
                                 <th><i class="icon_profile"></i> Nama Orang Tua</th>
                                 <th><i class="icon_pin_alt"></i> Alamat</th>
                                 <th><i class="icon_wallet"></i> Pekerjaan</th>
                                 <th><i class="icon_cogs"></i> Aksi</th>
                              </tr>
                              <tr>
                            <?php if($dataortu) : ?>
                                <?php foreach ($dataortu as $dataorangtua) :?> 
                                 <td><?php echo $dataorangtua->NAMA_SISWA;?></td>
                                 <td><?php echo $dataorangtua->NAMA;?></td>
                                 <td><?php echo $dataorangtua->ALAMAT;?></td>
                                 <td><?php echo $dataorangtua->PEKERJAAN;?></td>
                                 <td>
                                  <div class="btn-group">
                                      <!--<a class="btn btn-primary" href="#"><i class="icon_plus_alt2"></i></a>-->
                                      <a class="btn btn-success" href="<?php echo $url;?>editortu/<?php echo $dataorangtua->ID_ORANGTUA;?>"><i class="icon_check_alt2"></i></a>
                                      <a class="btn btn-danger" href="<?php echo $url;?>hapusortu/<?php echo $dataorangtua->ID_ORANGTUA;?>"
                                      data-toggle="tooltip" value="delete" class="btn btn-danger" onclick="javascript: return confirm('<?php echo "Hapus ".$dataorangtua->NAMA." ?";?>')">
                                      <i class="icon_close_alt2"></i></a>
                                      </div>
                                            <a class="btn btn-primary" href="<?php //echo $url;?>editsiswa/<?php //echo $datasiswasiswi->ID_SISWA;?>"><i class="icon_circle-slelected"></i></a>
                                      </div>
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