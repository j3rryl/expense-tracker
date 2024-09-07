<!DOCTYPE html>
<html lang="en">
<?php include_once __DIR__ . '/header.php'; ?>
<body class="index-page">
<nav class="navbar navbar-light bg-light navbar-expand-xl">
    <a href="/" class="navbar-brand ms-3">
    <h1 class="text-primary display-5">Expense Tracker</h1>
    </a>
    <button
    class="navbar-toggler py-2 px-3 me-3"
    type="button"
    data-bs-toggle="collapse"
    data-bs-target="#navbarCollapse"
    >
    <span class="fa fa-bars text-primary"></span>
    </button>
    <div class="collapse navbar-collapse bg-light mx-3" id="navbarCollapse">
        <div class="navbar-nav ms-auto">
            <a href="/" class="nav-item nav-link active">Home</a>
            <a href="#" class="nav-item nav-link">About</a>
            <a href="/login" class="nav-item nav-link">Login</a>
        </div>
    </div>
</nav>
<!-- FOOTER: DEBUG INFO + COPYRIGHTS -->
<!-- -->
  <!-- Vendor JS Files -->
  <script src="/assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/assets/vendor/chart.js/chart.umd.js"></script>
  <script src="/assets/vendor/echarts/echarts.min.js"></script>
  <script src="/assets/vendor/quill/quill.js"></script>
  <script src="/assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="/assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="/assets/js/main.js"></script>
</body>
</html>