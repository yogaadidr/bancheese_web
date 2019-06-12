<!-- Sidebar -->
    <aside class="sidebar sidebar-icons-right sidebar-icons-boxed sidebar-expand-lg sidebar-dark sidebar-color-warning">
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

        </ul>
      </nav>

    </aside>
    <!-- END Sidebar -->