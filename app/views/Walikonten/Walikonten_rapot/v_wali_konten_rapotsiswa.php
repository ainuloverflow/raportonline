
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
                                 <th><i class="icon_cogs"></i> Aksi</th>
                              </tr>
                              <tr>
                            <?php if($rapot_siswa) : $no=1;?>
                                <?php foreach ($rapot_siswa as $rapot) :?>
                                 <td><?php echo $no++.'.';?></td>
                                 <td><?php echo $rapot->NIS_SISWA;?></td>
                                 <td><?php echo $rapot->NAMA_SISWA;?></td>
                                 <td>
                                  <div class="btn-group">
                                      <a class="btn btn-info" href="<?php echo $url;?>cetak-rapot/<?php echo $this->enkripsi->safe_b64encode($rapot->ID_SISWA);?>"><i class="icon_check_alt2"></i>Cetak Rapot</a>
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