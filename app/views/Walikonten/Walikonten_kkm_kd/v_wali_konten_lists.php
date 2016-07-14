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

              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-primary" href="<?php echo $url;?>tambah-data-kkm"><i class="icon_plus_alt2"></i></a>
              <br>
              <br>
              <div class="col-lg-12">
                      <section class="panel">         
                          <table class="table table-striped table-advance table-hover">
                            <tbody>
                              <tr>
                                 <th> No. </th>
                                 <th> Nama Mapel </th>
                                 <th> Tingkat Kelas</th>
                                 <th> Tahun Ajaran</th>
                                 <th> Semester </th>
                                 <th> Batas Nilai KKM</th>
                                 <th> Aksi</th>
                              </tr>
                              <tr>
                            <?php if($datakkm) : $no = 1?>
                                <?php foreach ($datakkm as $data_kkm) :?>
                                 <td><?php echo $no++ ;?></td>
                                 <td><?php echo $data_kkm->ID_MAPEL;?></td>
                                 <td><?php echo $data_kkm->TINGKAT_KELAS;?></td>
                                 <td><?php echo $data_kkm->TAHUN_AJARAN;?></td>
                                 <td><?php echo $data_kkm->SEMESTER;?></td>
                                 <td><?php echo $data_kkm->NILAI_KKM;?></td>
                                 <td>
                                  <div class="btn-group">
                                      <a class="btn btn-success" href="<?php echo $url;?>edit-data-kkm/<?php echo $data_kkm->ID_KKM;?>"><i class="icon_check_alt2"></i></a>
                                      <a class="btn btn-danger" href="<?php echo $url;?>hapus-data-kkm/<?php echo $data_kkm->ID_KKM;?>"
                                      data-toggle="tooltip" value="delete" class="btn btn-danger" onclick="javascript: return confirm('<?php echo "Hapus data ?";?>')"><i class="icon_close_alt2"></i></a>
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