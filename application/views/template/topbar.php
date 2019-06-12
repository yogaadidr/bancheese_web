<!-- Topbar -->
    <header class="topbar">
      <div class="topbar-left">
        <span class="topbar-btn sidebar-toggler"><i>&#9776;</i></span>

        <a class="topbar-btn d-none d-md-block" href="#" data-provide="fullscreen tooltip" title="Fullscreen">
          <i class="material-icons fullscreen-default">fullscreen</i>
          <i class="material-icons fullscreen-active">fullscreen_exit</i>
        </a>

       

        <div class="topbar-divider d-none d-md-block"></div>

        <!-- <div class="lookup d-none d-md-block topbar-search" id="theadmin-search">
          <input class="form-control w-300px" type="text">
          <div class="lookup-placeholder">
            <i class="ti-search"></i>
            <span data-provide="typing" data-type="<strong>Type</strong> Button|<strong>Type</strong> Slider|<strong>Type</strong> Layout|<strong>Type</strong> Modal|<strong>Try</strong> typing any keyword..." data-loop="false" data-type-speed="90" data-back-speed="50" data-show-cursor="false"></span>
          </div>
        </div> -->
      </div>

      <div class="topbar-right">
        <!-- <a class="topbar-btn" href="#qv-global" data-toggle="quickview"><i class="ti-align-right"></i></a> -->

        <ul class="topbar-btns">
          <li class="dropdown">
            <?=$this->session->userdata("userdataLogin")["username"];?>
            <span class="topbar-btn" data-toggle="dropdown"><img class="avatar" src="<?= base_url() ?>vendor/theadmin/assets/img/avatar/1.jpg" alt="..."></span>
            <div class="dropdown-menu dropdown-menu-right">
              <!-- <a class="dropdown-item" href="page/profile.html"><i class="ti-user"></i> Profile</a>
             
              <a class="dropdown-item" href="#"><i class="ti-settings"></i> Settings</a> -->
              <!-- <div class="dropdown-divider"></div> -->
              <a class="dropdown-item" href="<?= base_url('user/Logout')?>"><i class="ti-power-off"></i> Logout</a>
            </div>
          </li>
          <div class="topbar-divider"></div>

          <!-- Notifications -->
          <!-- <li class="dropdown d-none d-md-block">
            <span class="topbar-btn has-new" data-toggle="dropdown"><i class="ti-bell"></i></span>
            <div class="dropdown-menu dropdown-menu-right">

              <div class="media-list media-list-hover media-list-divided media-list-xs">
                <a class="media media-new" href="#">
                  <span class="avatar bg-success"><i class="ti-user"></i></span>
                  <div class="media-body">
                    <p>New user registered</p>
                    <time datetime="2017-07-14 20:00">Just now</time>
                  </div>
                </a>

                <a class="media" href="#">
                  <span class="avatar bg-info"><i class="ti-shopping-cart"></i></span>
                  <div class="media-body">
                    <p>New order received</p>
                    <time datetime="2017-07-14 20:00">2 min ago</time>
                  </div>
                </a>

                <a class="media" href="#">
                  <span class="avatar bg-warning"><i class="ti-face-sad"></i></span>
                  <div class="media-body">
                    <p>Refund request from <b>Ashlyn Culotta</b></p>
                    <time datetime="2017-07-14 20:00">24 min ago</time>
                  </div>
                </a>

                <a class="media" href="#">
                  <span class="avatar bg-primary"><i class="ti-money"></i></span>
                  <div class="media-body">
                    <p>New payment has made through PayPal</p>
                    <time datetime="2017-07-14 20:00">53 min ago</time>
                  </div>
                </a>
              </div>

              <div class="dropdown-footer">
                <div class="left">
                  <a href="#">Read all notifications</a>
                </div>
                <div class="right">
                  <a href="#" data-provide="tooltip" title="Mark all as read"><i class="fa fa-circle-o"></i></a>
                  <a href="#" data-provide="tooltip" title="Update"><i class="fa fa-repeat"></i></a>
                  <a href="#" data-provide="tooltip" title="Settings"><i class="fa fa-gear"></i></a>
                </div>
              </div>

            </div>
          </li> -->
          <!-- END Notifications -->

          <!-- Messages -->
          
          <!-- END Messages -->

        </ul>

      </div>
    </header>
    <!-- END Topbar -->

    
    <!-- Main container -->
    <main class="main-container">