<?php
  include './inc/header.php';
?>

<!-- ============================= HEADER ============================== -->


    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      <nav id="sidebar">
        <!-- Sidebar Header-->
        <div class="sidebar-header d-flex align-items-center p-4"><img class="avatar shadow-0 img-fluid rounded-circle" src="../img/avatar-6.jpg" alt="...">
          <div class="ms-3 title">
            <h1 class="h5 mb-1">VAN CUONG</h1>
            <p class="text-sm text-gray-700 mb-0 lh-1">Web Designer</p>
          </div>
        </div><span class="text-uppercase text-gray-600 text-xs mx-3 px-2 heading mb-2">Main</span>
        <ul class="list-unstyled">
      <li class="sidebar-item active"><a class="sidebar-link" href="index.php">
          <svg class="svg-icon svg-icon-sm svg-icon-heavy">
            <use xlink:href="#real-estate-1"> </use>
          </svg><span>Home </span></a></li>

      <?php
      if (isset($_GET['action']) && $_GET['action'] == 'logout') {
        Session::destroy();
      }
      ?>

      <li class="sidebar-item"><a class="sidebar-link active" data-bs-toggle="collapse">
          <svg class="svg-icon svg-icon-sm svg-icon-heavy">
            <use xlink:href="#browser-window-1"> </use>
          </svg><span>Tables </span></a>
        <ul class="list-unstyled " id="exampledropdownDropdown">
          <li class="sidebar-item"><a class="sidebar-link" href="tables.php">
              <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                <use xlink:href="#portfolio-grid-1"> </use>
              </svg><span>Categories </span></a></li>
          <li class="sidebar-item"><a class="sidebar-link" href="tables.php">
              <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                <use xlink:href="#portfolio-grid-1"> </use>
              </svg><span>Brands </span></a></li>
          <li class="sidebar-item"><a class="sidebar-link" href="tables.php">
              <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                <use xlink:href="#portfolio-grid-1"> </use>
              </svg><span>Product </span></a></li>
        </ul>
      <li class="sidebar-item"><a class="sidebar-link" href="?action=logout">
          <svg class="svg-icon svg-icon-sm svg-icon-heavy">
            <use xlink:href="#disable-1"> </use>
          </svg><span>Login page </span></a></li>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link" href="?action=logout"> 
                    <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                      <use xlink:href="#disable-1"></use>
                    </svg>
                    <span>Login page </span>
                </a>
              </li>
      </nav>
      <div class="page-content">
            <!-- Page Header-->
            <div class="bg-dash-dark-2 py-4">
              <div class="container-fluid">
                <h2 class="h5 mb-0">Dashboard</h2>
              </div>
            </div>
        <section>
          <div class="container-fluid">
            <div class="row gy-4">
              <div class="col-md-3 col-sm-6">
                <div class="card mb-0">
                  <div class="card-body">
                    <div class="d-flex align-items-end justify-content-between mb-2">
                      <div class="me-2">
                            <svg class="svg-icon svg-icon-sm svg-icon-heavy text-gray-600 mb-2">
                              <use xlink:href="#user-1"> </use>
                            </svg>
                        <p class="text-sm text-uppercase text-gray-600 lh-1 mb-0">New Clients</p>
                      </div>
                      <p class="text-xxl lh-1 mb-0 text-dash-color-1">27</p>
                    </div>
                    <div class="progress" style="height: 3px">
                      <div class="progress-bar bg-dash-color-1" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="card mb-0">
                  <div class="card-body">
                    <div class="d-flex align-items-end justify-content-between mb-2">
                      <div class="me-2">
                            <svg class="svg-icon svg-icon-sm svg-icon-heavy text-gray-600 mb-2">
                              <use xlink:href="#stack-1"> </use>
                            </svg>
                        <p class="text-sm text-uppercase text-gray-600 lh-1 mb-0">New Projects</p>
                      </div>
                      <p class="text-xxl lh-1 mb-0 text-dash-color-2">375</p>
                    </div>
                    <div class="progress" style="height: 3px">
                      <div class="progress-bar bg-dash-color-2" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="card mb-0">
                  <div class="card-body">
                    <div class="d-flex align-items-end justify-content-between mb-2">
                      <div class="me-2">
                            <svg class="svg-icon svg-icon-sm svg-icon-heavy text-gray-600 mb-2">
                              <use xlink:href="#survey-1"> </use>
                            </svg>
                        <p class="text-sm text-uppercase text-gray-600 lh-1 mb-0">New Invoices</p>
                      </div>
                      <p class="text-xxl lh-1 mb-0 text-dash-color-3">140</p>
                    </div>
                    <div class="progress" style="height: 3px">
                      <div class="progress-bar bg-dash-color-3" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="card mb-0">
                  <div class="card-body">
                    <div class="d-flex align-items-end justify-content-between mb-2">
                      <div class="me-2">
                            <svg class="svg-icon svg-icon-sm svg-icon-heavy text-gray-600 mb-2">
                              <use xlink:href="#paper-stack-1"> </use>
                            </svg>
                        <p class="text-sm text-uppercase text-gray-600 lh-1 mb-0">All Projects</p>
                      </div>
                      <p class="text-xxl lh-1 mb-0 text-dash-color-4">41</p>
                    </div>
                    <div class="progress" style="height: 3px">
                      <div class="progress-bar bg-dash-color-4" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
       
        <section class="pt-0">
          <div class="container-fluid">
            <div class="row gy-4">
              <div class="col-lg-6">
                <!-- Stat card-->
                <div class="card mb-4">
                  <div class="card-body">
                    <div class="row gx-sm-5">
                      <div class="col-6 border-sm-end border-dash-dark-1">
                            <!-- Stat item-->
                            <div class="d-flex"><i class="mt-3 fas fa-caret-down text-danger"></i>
                              <div class="ms-2">
                                <p class="text-xl fw-normal mb-0">5.657</p>
                                <p class="text-uppercase text-sm fw-light mb-2">Standard scans</p>
                                <div class="progress" style="height: 2px">
                                  <div class="progress-bar bg-dash-color-1" role="progressbar" style="width: 60%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                              </div>
                            </div>
                      </div>
                      <div class="col-6">
                            <!-- Stat item-->
                            <div class="d-flex"><i class="mt-3 fas fa-caret-up text-success"></i>
                              <div class="ms-2">
                                <p class="text-xl fw-normal mb-0">3.1459</p>
                                <p class="text-uppercase text-sm fw-light mb-2">Team Scans</p>
                                <div class="progress" style="height: 2px">
                                  <div class="progress-bar bg-dash-color-2" role="progressbar" style="width: 35%;" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                              </div>
                            </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Stat card-->
                <div class="card">
                  <div class="card-body">
                    <div class="row gx-5">
                      <div class="col-6 border-sm-end border-dash-dark-1">
                            <!-- Stat item-->
                            <div class="d-flex">
                              <div>
                                <p class="text-xl fw-normal mb-0">745</p>
                                <p class="text-uppercase text-sm fw-light mb-2">Total requests</p>
                                <div class="progress" style="height: 2px">
                                  <div class="progress-bar bg-dash-color-1" role="progressbar" style="width: 60%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                              </div>
                            </div>
                      </div>
                      <div class="col-6">
                        <div class="d-flex justify-content-center text-center">
                          <div class="px-3 px-lg-4">
                            <p class="text-lg fw-normal mb-0">4.124</p><span class="text-sm text-uppercase mb-0">Threats</span>
                            <hr class="border-dark-1 mx-auto my-2" style="max-width: 3rem"><small>+246</small>
                          </div>
                          <div class="px-3 px-lg-4">
                            <p class="text-lg fw-normal mb-0">2.147</p><span class="text-sm text-uppercase mb-0">Neutral</span>
                            <hr class="border-dark-1 mx-auto my-2" style="max-width: 3rem"><small>+416</small>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="card">
                  <div class="card-body">
                    <canvas id="lineChart1"></canvas>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <section class="pt-0">
          <div class="container-fluid">
            <div class="row gy-4">
              <div class="col-lg-4">
                    <!-- User block-->
                    <div class="card">
                      <div class="card-body">
                        <div class="text-center">
                          <div class="position-relative d-inline-block"><img class="avatar avatar-lg mb-3" src="../img/avatar-1.jpg" alt="Richard Nevoreski"><span class="avatar-badge bg-dash-color-1">1st</span></div>
                          <h3 class="h5 mb-0">Richard Nevoreski</h3>
                          <p class="text-sm fw-light">@richardnevo</p>
                          <div class="d-inline-block py-1 px-4 rounded-pill bg-dash-dark-3 fw-light text-sm mb-4">950 Contributions</div>
                          <ul class="list-inline text-center mb-0 d-flex justify-content-between text-sm mb-0">                
                            <li class="list-inline-item"><i class="fab fa-blogger-b me-2"></i>150</li>
                            <li class="list-inline-item"><i class="fas fa-code-branch me-2"></i>340</li>
                            <li class="list-inline-item"><i class="fab fa-gg me-2"></i>460</li>
                          </ul>
                        </div>
                      </div>
                    </div>
              </div>
              <div class="col-lg-4">
                    <!-- User block-->
                    <div class="card">
                      <div class="card-body">
                        <div class="text-center">
                          <div class="position-relative d-inline-block"><img class="avatar avatar-lg mb-3" src="../img/avatar-4.jpg" alt="Samuel Watson"><span class="avatar-badge bg-dash-color-2">2nd</span></div>
                          <h3 class="h5 mb-0">Samuel Watson</h3>
                          <p class="text-sm fw-light">@samwatson</p>
                          <div class="d-inline-block py-1 px-4 rounded-pill bg-dash-dark-3 fw-light text-sm mb-4">772 Contributions</div>
                          <ul class="list-inline text-center mb-0 d-flex justify-content-between text-sm mb-0">                
                            <li class="list-inline-item"><i class="fab fa-blogger-b me-2"></i>80</li>
                            <li class="list-inline-item"><i class="fas fa-code-branch me-2"></i>420</li>
                            <li class="list-inline-item"><i class="fab fa-gg me-2"></i>272</li>
                          </ul>
                        </div>
                      </div>
                    </div>
              </div>
              <div class="col-lg-4">
                    <!-- User block-->
                    <div class="card">
                      <div class="card-body">
                        <div class="text-center">
                          <div class="position-relative d-inline-block"><img class="avatar avatar-lg mb-3" src="../img/avatar-6.jpg" alt="Sebastian Wood"><span class="avatar-badge bg-dash-color-3">3rd</span></div>
                          <h3 class="h5 mb-0">Sebastian Wood</h3>
                          <p class="text-sm fw-light">@sebastian</p>
                          <div class="d-inline-block py-1 px-4 rounded-pill bg-dash-dark-3 fw-light text-sm mb-4">620 Contributions</div>
                          <ul class="list-inline text-center mb-0 d-flex justify-content-between text-sm mb-0">                
                            <li class="list-inline-item"><i class="fab fa-blogger-b me-2"></i>150</li>
                            <li class="list-inline-item"><i class="fas fa-code-branch me-2"></i>280</li>
                            <li class="list-inline-item"><i class="fab fa-gg me-2"></i>190</li>
                          </ul>
                        </div>
                      </div>
                    </div>
              </div>
              <div class="col-12">
                    <div class="card">
                      <div class="card-body">
                        <div class="row gy-3 align-items-center">
                          <div class="col-lg-4">
                            <div class="d-flex align-items-center"><strong class="text-sm d-none d-lg-block">4th</strong><img class="avatar ms-3" src="../img/avatar-1.jpg" alt="Tomas Hecktor">
                              <div class="ms-3">
                                <h3 class="h5 mb-0">Tomas Hecktor</h3>
                                <p class="text-sm fw-light mb-0">@tomhecktor</p>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-4 text-center">
                            <div class="d-inline-block py-1 px-4 rounded-pill bg-dash-dark-3 fw-light text-sm">410 Contributions</div>
                          </div>
                          <div class="col-lg-4">
                            <ul class="list-inline text-center mb-0 d-flex justify-content-between mb-0 text-sm">                 
                              <li class="list-inline-item"><i class="fab fa-blogger-b me-2"></i>110</li>
                              <li class="list-inline-item"><i class="fas fa-code-branch me-2"></i>200</li>
                              <li class="list-inline-item"><i class="fab fa-gg me-2"></i>100</li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
              </div>
              <div class="col-12">
                    <div class="card">
                      <div class="card-body">
                        <div class="row gy-3 align-items-center">
                          <div class="col-lg-4">
                            <div class="d-flex align-items-center"><strong class="text-sm d-none d-lg-block">5th</strong><img class="avatar ms-3" src="../img/avatar-2.jpg" alt="Alexander Shelby">
                              <div class="ms-3">
                                <h3 class="h5 mb-0">Alexander Shelby</h3>
                                <p class="text-sm fw-light mb-0">@alexshelby</p>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-4 text-center">
                            <div class="d-inline-block py-1 px-4 rounded-pill bg-dash-dark-3 fw-light text-sm">320 Contributions</div>
                          </div>
                          <div class="col-lg-4">
                            <ul class="list-inline text-center mb-0 d-flex justify-content-between mb-0 text-sm">                 
                              <li class="list-inline-item"><i class="fab fa-blogger-b me-2"></i>150</li>
                              <li class="list-inline-item"><i class="fas fa-code-branch me-2"></i>120</li>
                              <li class="list-inline-item"><i class="fab fa-gg me-2"></i>50</li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
              </div>
              <div class="col-12">
                    <div class="card">
                      <div class="card-body">
                        <div class="row gy-3 align-items-center">
                          <div class="col-lg-4">
                            <div class="d-flex align-items-center"><strong class="text-sm d-none d-lg-block">6th</strong><img class="avatar ms-3" src="../img/avatar-6.jpg" alt="Arther Kooper">
                              <div class="ms-3">
                                <h3 class="h5 mb-0">Arther Kooper</h3>
                                <p class="text-sm fw-light mb-0">@artherkooper</p>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-4 text-center">
                            <div class="d-inline-block py-1 px-4 rounded-pill bg-dash-dark-3 fw-light text-sm">170 Contributions</div>
                          </div>
                          <div class="col-lg-4">
                            <ul class="list-inline text-center mb-0 d-flex justify-content-between mb-0 text-sm">                 
                              <li class="list-inline-item"><i class="fab fa-blogger-b me-2"></i>60</li>
                              <li class="list-inline-item"><i class="fas fa-code-branch me-2"></i>70</li>
                              <li class="list-inline-item"><i class="fab fa-gg me-2"></i>40</li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
              </div>
            </div>
          </div>
        </section>
        
        
        

<!-- ====================== FOOTER =================== -->
<?php include './inc/footer.php'; ?>