
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
                                 <th>No.</th>
                                 <th><i class="icon_id"></i> NIS Siswa</th>
                                 <th><i class="icon_profile"></i> Nama</th>
                                 <th><i class="icon_pin"></i> Tempat Lahir</th>
                                 <th><i class="icon_calendar"></i> Tanggal Lahir</th>
                                 <th><i class="icon_pin_alt"></i> Alamat</th>
                                 <th><i class="icon_balance"></i> Jenis Kelamin</th>
                                 <th><i class="icon_cogs"></i> Aksi</th>
                              </tr>
                              <tr>
                            <?php if($datasiswa) : $no=1;?>
                                <?php foreach ($datasiswa as $datasiswasiswi) :?>
                                 <td><?php echo $no++.'.';?></td>
                                 <td><?php echo $datasiswasiswi->NIS_SISWA;?></td>
                                 <td><?php echo $datasiswasiswi->NAMA_SISWA;?></td>
                                 <td><?php echo $datasiswasiswi->TEMPAT_LAHIR_SISWA;?></td>
                                 <td><?php echo $datasiswasiswi->TGL_LAHIR_SISWA;?></td>
                                 <td><?php echo $datasiswasiswi->ALAMAT;?></td>
                                 <td><?php echo $datasiswasiswi->JENIS_KELAMIN;?></td>
                                 <td>
                                  <div class="btn-group">
                                      <a class="btn btn-success" href="<?php echo $url;?>editsiswa/<?php echo $this->enkripsi->safe_b64encode($datasiswasiswi->ID_SISWA);?>"><i class="icon_check_alt2"></i></a>
                                      <a class="btn btn-danger" href="<?php echo $url;?>hapusiswa/<?php echo $this->enkripsi->safe_b64encode($datasiswasiswi->ID_SISWA);?>"
                                      data-toggle="tooltip" value="delete" class="btn btn-danger" onclick="javascript: return confirm('<?php echo "Hapus ".$datasiswasiswi->NAMA_SISWA." ?";?>')"><i class="icon_close_alt2"></i></a>
                                      </div>
                                        <a class="btn btn-primary" href="<?php echo $url;?>resetpass-siswa/<?php echo $this->enkripsi->safe_b64encode($datasiswasiswi->ID_SISWA);?>
                                        "data-toggle="tooltip" value="delete" class="btn btn-danger" onclick="javascript: return confirm('<?php echo "Reset Password ".$datasiswasiswi->NAMA_SISWA." ?";?>')"><i class="icon_circle-slelected"></i></a>
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
                          <div class="container">                  
                                <ul class="pager">
                                    <?php if($pageLinks) : ?>
                                        <?php foreach($pageLinks as $paging) :?>
                                            <li><?php echo $paging;?></li>
                                        <?php endforeach;?>
                                    <?php endif;?>
                                </ul>
                          </div>

                      </section>
                  </div>
          </section>
      </section>
      <!--main content end-->