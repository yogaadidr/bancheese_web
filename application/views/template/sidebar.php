<!-- Sidebar -->
    <aside class="sidebar sidebar-icons-right sidebar-icons-boxed sidebar-expand-lg">
      <header class="sidebar-header">
        <a class="logo-icon" href="<?= base_url()."dashboard" ?>">BC</a>
        <span class="logo">
          <a href="<?= base_url()."dashboard" ?>">BANCHEESE</a>
        </span>
        <span class="sidebar-toggle-fold"></span>
      </header>

      <nav class="sidebar-navigation">
        <ul class="menu">

          <li class="menu-category">Menu</li>

<!--           <li class="menu-item <?php if($menu == 'dashboard'): echo 'active'; endif;?>">
            <a class="menu-link" href="<?= base_url()?>">
              <span class="icon fa fa-home"></span>
              <span class="title">Dashboard</span>
            </a>
          </li> -->

          <?php
            foreach ($list_menu as $list) :
          ?>
          <li class="menu-item <?php if($menu == $list['id']): echo 'active'; endif;?>">
              <a class="menu-link" href="<?= base_url().$list['link']?>">
                <span class="<?= $list['icon'] ?>"></span>
                <span class="title"><?= $list['name'] ?></span>
              </a>
            </li>
          <?php
            endforeach;

          ?>

      <li class="menu-category">Trial</li>
      <li class="menu-item">
              <a class="menu-link" href="<?= base_url() ?>dashboard/kasir">
                <span class="icon fa fa-home"></span>
                <span class="title">Kasir</span>
              </a>
            </li>

          
<!-- 
          <li class="menu-item">
            <a class="menu-link" href="#">
              <span class="icon fa fa-tv"></span>
              <span class="title">Kelola Cabang</span>
              <span class="arrow"></span>
            </a>

            <ul class="menu-submenu">
              <li class="menu-item">
                <a class="menu-link" href="../samples/invoicer/index.html" target="_blank">
                  <span class="dot"></span>
                  <span class="title">Invoicer</span>
                </a>
              </li>

              <li class="menu-item">
                <a class="menu-link" href="../samples/job/index.html" target="_blank">
                  <span class="dot"></span>
                  <span class="title">Job Management</span>
                </a>
              </li>

              <li class="menu-item">
                <a class="menu-link" href="../samples/support/index.html" target="_blank">
                  <span class="dot"></span>
                  <span class="title">Support System</span>
                </a>
              </li>
            </ul>
          </li>



          <li class="menu-category">Framework</li>


          <li class="menu-item">
            <a class="menu-link" href="#">
              <span class="icon ti-layout"></span>
              <span class="title">Layout</span>
              <span class="arrow"></span>
            </a>

            <ul class="menu-submenu">
              <li class="menu-item">
                <a class="menu-link" href="../layout/grid.html">
                  <span class="dot"></span>
                  <span class="title">Grid</span>
                </a>
              </li>

              <li class="menu-item">
                <a class="menu-link" href="../layout/layout.html">
                  <span class="dot"></span>
                  <span class="title">Layout</span>
                </a>
              </li>

              <li class="menu-item">
                <a class="menu-link" href="../layout/sidebar.html">
                  <span class="dot"></span>
                  <span class="title">Sidebar</span>
                </a>
              </li>

              <li class="menu-item">
                <a class="menu-link" href="../layout/topbar.html">
                  <span class="dot"></span>
                  <span class="title">Topbar</span>
                </a>
              </li>

              <li class="menu-item">
                <a class="menu-link" href="../layout/header.html">
                  <span class="dot"></span>
                  <span class="title">Header</span>
                </a>
              </li>

              <li class="menu-item">
                <a class="menu-link" href="../layout/aside.html">
                  <span class="dot"></span>
                  <span class="title">Aside</span>
                </a>
              </li>

              <li class="menu-item">
                <a class="menu-link" href="../layout/card.html">
                  <span class="dot"></span>
                  <span class="title">Card</span>
                </a>
              </li>

              <li class="menu-item">
                <a class="menu-link" href="../layout/quickview.html">
                  <span class="dot"></span>
                  <span class="title">Quickview</span>
                </a>
              </li>

              <li class="menu-item">
                <a class="menu-link" href="../layout/footer.html">
                  <span class="dot"></span>
                  <span class="title">Footer</span>
                </a>
              </li>
            </ul>
          </li>


          <li class="menu-item">
            <a class="menu-link" href="#">
              <span class="icon fa fa-align-left"></span>
              <span class="title">Content</span>
              <span class="arrow"></span>
            </a>

            <ul class="menu-submenu">
              <li class="menu-item">
                <a class="menu-link" href="../content/typography.html">
                  <span class="dot"></span>
                  <span class="title">Typography</span>
                </a>
              </li>

              <li class="menu-item">
                <a class="menu-link" href="../content/colors.html">
                  <span class="dot"></span>
                  <span class="title">Colors</span>
                </a>
              </li>

              <li class="menu-item">
                <a class="menu-link" href="../content/icons.html">
                  <span class="dot"></span>
                  <span class="title">Icons</span>
                </a>
              </li>

              <li class="menu-item">
                <a class="menu-link" href="../content/images.html">
                  <span class="dot"></span>
                  <span class="title">Images</span>
                </a>
              </li>

              <li class="menu-item">
                <a class="menu-link" href="../content/tables.html">
                  <span class="dot"></span>
                  <span class="title">Tables</span>
                </a>
              </li>

              <li class="menu-item">
                <a class="menu-link" href="../content/media.html">
                  <span class="dot"></span>
                  <span class="title">Media</span>
                </a>
              </li>

              <li class="menu-item">
                <a class="menu-link" href="../content/code.html">
                  <span class="dot"></span>
                  <span class="title">Code</span>
                </a>
              </li>

              <li class="menu-item">
                <a class="menu-link" href="../content/utilities.html">
                  <span class="dot"></span>
                  <span class="title">Utilities</span>
                </a>
              </li>
            </ul>
          </li>


          <li class="menu-item">
            <a class="menu-link" href="#">
              <span class="icon fa fa-plus-circle"></span>
              <span class="title">Extention</span>
              <span class="arrow"></span>
            </a>

            <ul class="menu-submenu">
              <li class="menu-item">
                <a class="menu-link" href="../extension/ajax-loader.html">
                  <span class="dot"></span>
                  <span class="title">Ajax</span>
                </a>
              </li>

              <li class="menu-item">
                <a class="menu-link" href="../extension/animation-animate.html">
                  <span class="dot"></span>
                  <span class="title">Animation</span>
                </a>
              </li>

              <li class="menu-item">
                <a class="menu-link" href="../extension/framework-vuejs.html">
                  <span class="dot"></span>
                  <span class="title">JS Framework</span>
                </a>
              </li>

              <li class="menu-item">
                <a class="menu-link" href="../extension/pace.html">
                  <span class="dot"></span>
                  <span class="title">Pace</span>
                </a>
              </li>

              <li class="menu-item">
                <a class="menu-link" href="../extension/fullscreen.html">
                  <span class="dot"></span>
                  <span class="title">Fullscreen</span>
                </a>
              </li>

              <li class="menu-item">
                <a class="menu-link" href="../extension/tour.html">
                  <span class="dot"></span>
                  <span class="title">Tour</span>
                </a>
              </li>
            </ul>
          </li>


          <li class="menu-item">
            <a class="menu-link" href="#">
              <span class="icon ti-ruler-pencil"></span>
              <span class="title">UI Kit</span>
              <span class="arrow"></span>
            </a>

            <ul class="menu-submenu">
              <li class="menu-item">
                <a class="menu-link" href="../uikit/buttons.html">
                  <span class="dot"></span>
                  <span class="title">Buttons</span>
                </a>
              </li>

              <li class="menu-item">
                <a class="menu-link" href="../uikit/badges.html">
                  <span class="dot"></span>
                  <span class="title">Badges</span>
                </a>
              </li>

              <li class="menu-item">
                <a class="menu-link" href="../uikit/notification-alert.html">
                  <span class="dot"></span>
                  <span class="title">Notifications</span>
                </a>
              </li>

              <li class="menu-item">
                <a class="menu-link" href="../uikit/dialog-modal.html">
                  <span class="dot"></span>
                  <span class="title">Dialogs</span>
                </a>
              </li>

              <li class="menu-item">
                <a class="menu-link" href="../uikit/dropdown.html">
                  <span class="dot"></span>
                  <span class="title">Dropdown</span>
                </a>
              </li>

              <li class="menu-item">
                <a class="menu-link" href="../uikit/progress-progressbar.html">
                  <span class="dot"></span>
                  <span class="title">Progress</span>
                </a>
              </li>

              <li class="menu-item">
                <a class="menu-link" href="../uikit/panel-tab.html">
                  <span class="dot"></span>
                  <span class="title">Tabs & Accordion</span>
                </a>
              </li>

              <li class="menu-item">
                <a class="menu-link" href="../uikit/timeline.html">
                  <span class="dot"></span>
                  <span class="title">Timeline</span>
                </a>
              </li>

              <li class="menu-item">
                <a class="menu-link" href="../uikit/carousel.html">
                  <span class="dot"></span>
                  <span class="title">Carousel</span>
                </a>
              </li>

              <li class="menu-item">
                <a class="menu-link" href="../uikit/nav.html">
                  <span class="dot"></span>
                  <span class="title">Nav</span>
                </a>
              </li>

              <li class="menu-item">
                <a class="menu-link" href="../uikit/misc-bootstrap.html">
                  <span class="dot"></span>
                  <span class="title">Misc</span>
                </a>
              </li>
            </ul>
          </li>


          <li class="menu-item">
            <a class="menu-link" href="#">
              <span class="icon fa fa-check-square"></span>
              <span class="title">Forms</span>
              <span class="arrow"></span>
            </a>

            <ul class="menu-submenu">
              <li class="menu-item">
                <a class="menu-link" href="../form/input-default.html">
                  <span class="dot"></span>
                  <span class="title">Inputs</span>
                </a>
              </li>

              <li class="menu-item">
                <a class="menu-link" href="../form/control-checkbox.html">
                  <span class="dot"></span>
                  <span class="title">Controls</span>
                </a>
              </li>

              <li class="menu-item">
                <a class="menu-link" href="../form/picker-select.html">
                  <span class="dot"></span>
                  <span class="title">Pickers</span>
                </a>
              </li>

              <li class="menu-item">
                <a class="menu-link" href="../form/addon-slider.html">
                  <span class="dot"></span>
                  <span class="title">Addons</span>
                </a>
              </li>

              <li class="menu-item">
                <a class="menu-link" href="../form/upload.html">
                  <span class="dot"></span>
                  <span class="title">Upload</span>
                </a>
              </li>

              <li class="menu-item">
                <a class="menu-link" href="../form/editor-summernote.html">
                  <span class="dot"></span>
                  <span class="title">Editor</span>
                </a>
              </li>

              <li class="menu-item">
                <a class="menu-link" href="../form/lookup.html">
                  <span class="dot"></span>
                  <span class="title">Lookup</span>
                </a>
              </li>

              <li class="menu-item">
                <a class="menu-link" href="../form/publisher-single.html">
                  <span class="dot"></span>
                  <span class="title">Publisher</span>
                </a>
              </li>

              <li class="menu-item">
                <a class="menu-link" href="../form/layout.html">
                  <span class="dot"></span>
                  <span class="title">Layouts</span>
                </a>
              </li>

              <li class="menu-item">
                <a class="menu-link" href="../form/mask.html">
                  <span class="dot"></span>
                  <span class="title">Mask</span>
                </a>
              </li>

              <li class="menu-item">
                <a class="menu-link" href="../form/validation.html">
                  <span class="dot"></span>
                  <span class="title">Validation</span>
                </a>
              </li>

              <li class="menu-item">
                <a class="menu-link" href="../form/wizard.html">
                  <span class="dot"></span>
                  <span class="title">Wizard</span>
                </a>
              </li>
            </ul>
          </li>


          <li class="menu-item">
            <a class="menu-link" href="#">
              <span class="icon fa fa-pie-chart"></span>
              <span class="title">Charts</span>
              <span class="arrow"></span>
            </a>

            <ul class="menu-submenu">
              <li class="menu-item">
                <a class="menu-link" href="../chart/chartjs.html">
                  <span class="dot"></span>
                  <span class="title">Chartjs</span>
                </a>
              </li>

              <li class="menu-item">
                <a class="menu-link" href="../chart/morris.html">
                  <span class="dot"></span>
                  <span class="title">Morris</span>
                </a>
              </li>

              <li class="menu-item">
                <a class="menu-link" href="../chart/sparkline.html">
                  <span class="dot"></span>
                  <span class="title">Sparkline</span>
                </a>
              </li>

              <li class="menu-item">
                <a class="menu-link" href="../chart/peity.html">
                  <span class="dot"></span>
                  <span class="title">Peity</span>
                </a>
              </li>

              <li class="menu-item">
                <a class="menu-link" href="../chart/easypiechart.html">
                  <span class="dot"></span>
                  <span class="title">Easy pie chart</span>
                </a>
              </li>
            </ul>
          </li>


          <li class="menu-category">Pages</li>


          <li class="menu-item">
            <a class="menu-link" href="#">
              <span class="icon fa fa-puzzle-piece"></span>
              <span class="title">Widgets</span>
              <span class="arrow"></span>
            </a>

            <ul class="menu-submenu">
              <li class="menu-item">
                <a class="menu-link" href="../widget/statistic.html">
                  <span class="dot"></span>
                  <span class="title">Statistic</span>
                </a>
              </li>

              <li class="menu-item">
                <a class="menu-link" href="../widget/chart.html">
                  <span class="dot"></span>
                  <span class="title">Chart</span>
                </a>
              </li>

              <li class="menu-item">
                <a class="menu-link" href="../widget/list.html">
                  <span class="dot"></span>
                  <span class="title">List</span>
                </a>
              </li>

              <li class="menu-item">
                <a class="menu-link" href="../widget/social.html">
                  <span class="dot"></span>
                  <span class="title">Social</span>
                </a>
              </li>

              <li class="menu-item">
                <a class="menu-link" href="../widget/blog.html">
                  <span class="dot"></span>
                  <span class="title">Blog</span>
                </a>
              </li>

              <li class="menu-item">
                <a class="menu-link" href="../widget/form.html">
                  <span class="dot"></span>
                  <span class="title">Form</span>
                </a>
              </li>

              <li class="menu-item">
                <a class="menu-link" href="../widget/app.html">
                  <span class="dot"></span>
                  <span class="title">App</span>
                </a>
              </li>
            </ul>
          </li>


          <li class="menu-item">
            <a class="menu-link" href="#">
              <span class="icon ti-layout-grid3-alt"></span>
              <span class="title">Apps</span>
              <span class="arrow"></span>
            </a>

            <ul class="menu-submenu">
              <li class="menu-item">
                <a class="menu-link" href="../page-app/calendar.html">
                  <span class="dot"></span>
                  <span class="title">Calendar</span>
                </a>
              </li>

              <li class="menu-item">
                <a class="menu-link" href="../page-app/mailbox.html">
                  <span class="dot"></span>
                  <span class="title">Mailbox</span>
                  <span class="badge badge-pill badge-primary">4</span>
                </a>
              </li>

              <li class="menu-item">
                <a class="menu-link" href="../page-app/chat.html">
                  <span class="dot"></span>
                  <span class="title">Chat</span>
                </a>
              </li>

              <li class="menu-item">
                <a class="menu-link" href="../page-app/users.html">
                  <span class="dot"></span>
                  <span class="title">Users</span>
                </a>
              </li>
            </ul>
          </li>


          <li class="menu-item">
            <a class="menu-link" href="#">
              <span class="icon fa fa-file"></span>
              <span class="title">Pages</span>
              <span class="arrow"></span>
            </a>

            <ul class="menu-submenu">
              <li class="menu-item">
                <a class="menu-link" href="../page/gallery.html">
                  <span class="dot"></span>
                  <span class="title">Gallery</span>
                </a>
              </li>

              <li class="menu-item">
                <a class="menu-link" href="../page/map-google.html">
                  <span class="dot"></span>
                  <span class="title">Map</span>
                </a>
              </li>

              <li class="menu-item">
                <a class="menu-link" href="../page/profile.html">
                  <span class="dot"></span>
                  <span class="title">Profile</span>
                </a>
              </li>

              <li class="menu-item">
                <a class="menu-link" href="../page/pricing.html">
                  <span class="dot"></span>
                  <span class="title">Pricing</span>
                </a>
              </li>

              <li class="menu-item">
                <a class="menu-link" href="../page/invoice-1.html">
                  <span class="dot"></span>
                  <span class="title">Invoice</span>
                </a>
              </li>

              <li class="menu-item">
                <a class="menu-link" href="../page/userlist.html">
                  <span class="dot"></span>
                  <span class="title">User list</span>
                </a>
              </li>

              <li class="menu-item">
                <a class="menu-link" href="../page/search.html">
                  <span class="dot"></span>
                  <span class="title">Search result</span>
                </a>
              </li>

              <li class="menu-item">
                <a class="menu-link" href="../page/faq-1.html">
                  <span class="dot"></span>
                  <span class="title">FAQ</span>
                </a>
              </li>
            </ul>
          </li>


          <li class="menu-item">
            <a class="menu-link" href="#">
              <span class="icon fa fa-files-o"></span>
              <span class="title">Extras</span>
              <span class="arrow"></span>
            </a>

            <ul class="menu-submenu">
              <li class="menu-item">
                <a class="menu-link" href="../page-extra/user-login.html">
                  <span class="dot"></span>
                  <span class="title">Login</span>
                </a>
              </li>

              <li class="menu-item">
                <a class="menu-link" href="../page-extra/user-register.html">
                  <span class="dot"></span>
                  <span class="title">Register</span>
                </a>
              </li>

              <li class="menu-item">
                <a class="menu-link" href="../page-extra/user-pass.html">
                  <span class="dot"></span>
                  <span class="title">Forget pass</span>
                </a>
              </li>

              <li class="menu-item">
                <a class="menu-link" href="../page-extra/user-lock.html">
                  <span class="dot"></span>
                  <span class="title">Lock screen</span>
                </a>
              </li>

              <li class="menu-item">
                <a class="menu-link" href="../page-extra/maintenance.html">
                  <span class="dot"></span>
                  <span class="title">maintenance</span>
                </a>
              </li>

              <li class="menu-item">
                <a class="menu-link" href="../page-extra/coming-soon.html">
                  <span class="dot"></span>
                  <span class="title">coming soon</span>
                </a>
              </li>

              <li class="menu-item">
                <a class="menu-link" href="../page-extra/error.html">
                  <span class="dot"></span>
                  <span class="title">Error pages</span>
                </a>
              </li>

              <li class="menu-item">
                <a class="menu-link" href="../page-extra/blank.html">
                  <span class="dot"></span>
                  <span class="title">Blank page</span>
                </a>
              </li>
            </ul>
          </li>


          <li class="menu-item">
            <a class="menu-link" href="../email/index.html">
              <span class="icon fa fa-envelope"></span>
              <span class="title">Emails</span>
            </a>
          </li>


          <li class="menu-divider"></li>

          <li class="menu-item">
            <a class="menu-link" href="#">
              <span class="icon fa fa-question-circle"></span>
              <span class="title">Help</span>
              <span class="arrow"></span>
            </a>

            <ul class="menu-submenu">
              <li class="menu-item">
                <a class="menu-link" href="../help/articles.html">
                  <span class="dot"></span>
                  <span class="title">Articles</span>
                </a>
              </li>

              <li class="menu-item">
                <a class="menu-link" href="../help/faq.html">
                  <span class="dot"></span>
                  <span class="title">FAQ</span>
                </a>
              </li>

              <li class="menu-item">
                <a class="menu-link" href="../help/changelog.html">
                  <span class="dot"></span>
                  <span class="title">Changelog</span>
                </a>
              </li>
            </ul>
          </li>
 -->


        </ul>
      </nav>

    </aside>
    <!-- END Sidebar -->