<!DOCTYPE html>
<html lang="en">
<?php include_once __DIR__ . '/header.php'; ?>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="/assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">Expense Tracker</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="/assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2 text-capitalize"><?= session()->get("user_name")?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6 class="text-capitalize"><?= session()->get("user_name")?></h6>
              <span class="text-capitalize"><?= session()->get("user_group")?></span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="/logout">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link <?= $page_header == 'Dashboard' ? "" : "collapsed" ?>" href="/admin/dashboard">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-item">
        <a class="nav-link <?= $page_header == 'Users' ? "" : "collapsed" ?>" href="/admin/users">
          <i class="bi bi-people"></i>
          <span>Users</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?= $page_header == 'Categories' ? "" : "collapsed" ?>" href="/admin/categories">
          <i class="bi bi-layers"></i>
          <span>Categories</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?= $page_header == 'Expenses' ? "" : "collapsed" ?>" href="/admin/expenses">
          <i class="bi bi-cash"></i>
          <span>Expenses</span>
        </a>
      </li>

    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1><?= $page_header ?></h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active"><?= $page_header ?></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
    <?= show_errors() ?>
    <?php if (session('message') !== null) : ?>
      <div class="alert alert-success d-flex justify-content-between" role="alert">
      <p><?= session('message') ?></p>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php endif ?>
    <?php if (isset($contents) && is_array($contents)) :
        foreach ($contents as $content) {
            echo view($content);
        }  endif; ?>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>Expense Tracker</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Theme by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="/assets/libs/apexcharts/apexcharts.min.js"></script>
  <script src="/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/assets/libs/chart.js/chart.umd.js"></script>
  <script src="/assets/libs/echarts/echarts.min.js"></script>
  <script src="/assets/libs/quill/quill.js"></script>
  <script src="/assets/libs/simple-datatables/simple-datatables.js"></script>
  <script src="/assets/libs/tinymce/tinymce.min.js"></script>
  <script src="/assets/libs/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="/assets/js/main.js"></script>
    <!-- Javascript Files -->
    <?php if (isset($js) && is_array($js)) {
            foreach ($js as $file) {
                echo '<script src="' . $file . '"></script>';
            }
        } ?>

    <!-- Script Files -->
    <?php if (isset($scripts) && is_array($scripts)) : ?>
    <?php
        foreach ($scripts as $script) {
            echo view($script);
        }
        ?>
    <?php endif; ?>
</body>

</html>