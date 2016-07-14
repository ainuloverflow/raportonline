<!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu">                
                  <li class="active">
                      <a class="" href="<?php echo $url;?>dashboard_wali">
                          <i class="icon_house_alt"></i>
                          <span>Home</span>
                      </a>
                  </li>
                  <!--<li>                     
                      <a class="" href="chart-chartjs.html">
                          <i class="icon_piechart"></i>
                          <span>Profil</span>
                          
                      </a>
                  </li>-->
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_document_alt"></i>
                          <span>Data Master</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="<?php echo $url;?>list-siswa">Data Siswa</a></li>
                          <li><a class="" href="<?php echo $url;?>list-ortu">Data Orang Tua Siswa</a></li>
                          <li><a class="" href="<?php echo $url;?>data-nilai">Data Nilai Siswa</a></li>
                          <li><a class="" href="<?php echo $url;?>data-kkm-kd">Data KKM dan KD</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                        <a class="" href="<?php echo $url;?>rapot-siswa-as-wali">
                            <i class="icon_document_alt"></i>
                            <span>Rapot Siswa</span>
                        </a>
                  </li>  
                  <li>
                        <a class="sub-menu" href="<?php echo $url;?>grafik-nilai">
                            <i class="icon_piechart"></i>
                            <span>Grafik Nilai Kelas</span>
                        </a>
                  </li>      
                  </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->