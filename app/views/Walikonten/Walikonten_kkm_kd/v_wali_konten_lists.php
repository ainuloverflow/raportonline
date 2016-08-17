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

              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-primary" href="<?php echo $url;?>tambah-kkm"><i class="icon_plus_alt2"></i> Tambah KKM</a>
              <br>
              <br>
              <div class="col-lg-12">
                      <section class="panel">         
                          <table class="table table-striped table-advance table-hover">
                            <tbody>
                              <tr>
                                 <th> No. </th>
                                 <th> Tingkat Kelas </th>
                                 <th> Tahun Ajaran </th>
                                 <th> Semester </th>
                                 <th> Nilai KKM </th>
                                 <th> Aksi </th>
                              </tr>
                              <tr>
                            <?php if($kkm_data) : $no = 1?>
                                <?php foreach ($kkm_data as $data_kkm) :?>
                                 <td><?php echo $no++ ;?></td>
                                 <td><?php echo $data_kkm->TINGKAT_KELAS;?></td>
                                 <td><?php echo $data_kkm->TAHUN_AJARAN;?></td>
                                 <td><?php echo $data_kkm->SEMESTER;?></td>
                                 <td><?php echo $data_kkm->NILAI_KKM;?></td>
                                 <td>
                                  <div class="btn-group">
                                      <a class="btn btn-success" href="<?php echo $url;?>edit-data-kkm/<?php echo $this->enkripsi->safe_b64encode($data_kkm->ID_KKM);?>"><i class="icon_check_alt2"></i> Edit</a>
                                      <a class="btn btn-danger" href="<?php echo $url;?>hapus-data-kkm/<?php echo $this->enkripsi->safe_b64encode($data_kkm->ID_KKM);?>"
                                      data-toggle="tooltip" value="delete" class="btn btn-danger" onclick="javascript: return confirm('<?php echo "Hapus data ?";?>')"><i class="icon_close_alt2"></i> Hapus</a>
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
              
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-primary" href="<?php echo $url;?>tambah-kd"><i class="icon_plus_alt2"></i> Tambah KD</a>
              <br>
              <br>
              <div class="col-lg-12">
                      <section class="panel">         
                          <table class="table table-striped table-advance table-hover">
                            <tbody>
                              <tr>
                                 <th> No. </th>
                                 <th> KI-3 (Pengetahuan)</th>
                                 <th> KI-4 (Keterampilan) </th>
                                 <th> KI-1 (Aspek kembangan dari sekolah)</th>
                                 <th> KI-2 (Aspek kembangan dari sekolah)</th>
                                 <th> Aksi </th>
                              </tr>
                              <tr>
                            <?php if($kd_data) : $no = 1?>
                                <?php foreach ($kd_data as $data_kd) :?>
                                 <td><?php echo $no++ ;?></td>
                                 <td><?php echo $data_kd->KI_3;?></td>
                                 <td><?php echo $data_kd->KI_4;?></td>
                                 <td><?php echo $data_kd->KI_1;?></td>
                                 <td><?php echo $data_kd->KI_2;?></td>
                                 <td>
                                  <div class="btn-group">
                                      <a class="btn btn-success" href="<?php echo $url;?>edit-kd/<?php echo $this->enkripsi->safe_b64encode($data_kd->ID_KOPDAR);?>"><i class="icon_check_alt2"></i> Edit</a>
                                      <a class="btn btn-danger" href="<?php echo $url;?>hapus-kd/<?php echo $this->enkripsi->safe_b64encode($data_kd->ID_KOPDAR);?>"
                                      data-toggle="tooltip" value="delete" class="btn btn-danger" onclick="javascript: return confirm('<?php echo "Hapus data ?";?>')"><i class="icon_close_alt2"></i> Hapus</a>
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