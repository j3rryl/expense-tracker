<!DOCTYPE html>
<html lang="en">
<?php include_once __DIR__ . '/header.php'; ?>

<style>
    body{
        background: url("https://wallpapers.com/images/hd/an-expert-consultant-uvunln2kxmvuitgv.jpg") rgba(0, 0, 0, 0.8);
        background-blend-mode: multiply;
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
        height: 100vh;
        /* width: 100vw; */
    }
</style>
<body class="vh-100 overflow-hidden">
<nav class="navbar navbar-dark bg-transparent navbar-expand-xl">
    <a href="/" class="navbar-brand ms-3">
    <h6 class="text-primary display-6">Expense Tracker</h6>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse mx-5" id="navbarCollapse">
        <div class="navbar-nav ms-auto">
            <a href="/" class="nav-item nav-link active">Home</a>
            <a href="#" class="nav-item nav-link">About</a>
            <a href="/login" class="nav-item nav-link">Login</a>
        </div>
    </div>
</nav>

<div class="container-fluid mx-auto h-100">
    <div class="row justify-content-start align-items-center h-100 mx-5">
        <div class="col-md-6 mb-3 mt-5 mt-md-0">
            <h1 class="text-white display-2">
                Welcome to
                <span class="text-primary fw-bolder">Expense</span> <span class="text-secondary fw-bolder">Tracker!</span>
            </h1>
            <div>
                <p class="text-white lead">
                Take control of your finances with our easy-to-use expense tracker.
                </p>
                <div class="d-flex justify-content-start gap-2 gap-md-5 flex-md-row flex-column">
                    <button type="button" class="btn btn-primary btn-lg rounded">About us</button>
                    <a role="button" href="/login" class="btn btn-success btn-lg rounded">Login</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- FOOTER: DEBUG INFO + COPYRIGHTS -->
<!-- -->
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
</body>
</html>