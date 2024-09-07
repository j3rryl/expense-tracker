<div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">Expenses </h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-cart"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $expense_count; ?></h6>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

                <div class="card-body">
                  <h5 class="card-title">Expenditure </h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-currency-dollar"></i>
                    </div>
                    <div class="ps-3 overflow-hidden">
                      <h6><?php echo number_format($expense_amount, 2); ?></h6>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

            <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-12">

              <div class="card info-card customers-card">


                <div class="card-body">
                  <h5 class="card-title">Categories</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-tags"></i>
                    </div>
                    <div class="ps-3">
                    <h6><?php echo $expense_categories; ?></h6>
                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->

            <!-- Reports -->
            <div class="col-12">
              <div class="card">

                <div class="card-body">
                  <h5 class="card-title">Reports </h5>

                  <!-- Line Chart -->
                  <div id="reportsChart"></div>

                  <script>
                document.addEventListener("DOMContentLoaded", () => {
                    new ApexCharts(document.querySelector("#reportsChart"), {
                    series: <?= json_encode($chartSeries) ?>,
                    chart: {
                        height: 350,
                        type: 'area',
                        toolbar: {
                        show: false
                        },
                    },
                    markers: {
                        size: 4
                    },
                    colors: ['#4154f1', '#2eca6a', '#ff771d'], // Update with your colors
                    fill: {
                        type: "gradient",
                        gradient: {
                        shadeIntensity: 1,
                        opacityFrom: 0.3,
                        opacityTo: 0.4,
                        stops: [0, 90, 100]
                        }
                    },
                    dataLabels: {
                        enabled: false
                    },
                    stroke: {
                        curve: 'smooth',
                        width: 2
                    },
                    xaxis: {
                        type: 'category',
                        categories: <?= json_encode($months) ?>
                    },
                    tooltip: {
                        x: {
                        format: 'MMM YYYY'
                        },
                    }
                    }).render();
                });
                </script>



                  <!-- End Line Chart -->

                </div>

              </div>
            </div><!-- End Reports -->

            <!-- Recent Sales -->
            <div class="col-12">
                
              <!-- Budget Report -->
          <div class="card">
            <div class="card-body pb-0">
              <h5 class="card-title">Budget Report </h5>

              <div id="categoryPieChart" style="min-height: 400px;" class="echart"></div>

              <script>
                document.addEventListener("DOMContentLoaded", () => {
                    new ApexCharts(document.querySelector("#categoryPieChart"), {
                    series: <?= json_encode(array_column($pieSeries, 'data')) ?>,
                    labels: <?= json_encode(array_column($pieSeries, 'name')) ?>,
                    chart: {
                        type: 'pie',
                        height: 350
                    },
                    colors: ['#4154f1', '#2eca6a', '#ff771d', '#ff6347', '#ffc107'], // Update with your colors
                    legend: {
                        position: 'bottom'
                    },
                    dataLabels: {
                        formatter: function (val, opts) {
                        return opts.w.globals.labels[opts.seriesIndex] + ": " + val.toFixed(1) + "%";
                        }
                    }
                    }).render();
                });
                </script>


            </div>
          </div><!-- End Budget Report -->

            </div><!-- End Recent Sales -->

          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">

          <!-- Recent Activity -->
          <div class="card">

            <div class="card-body">
              <h5 class="card-title">Recent Activity </h5>

              <div class="activity">

            <?php foreach ($activities as $activity): ?>

                <div class="activity-item d-flex">
                  <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                  <div class="activity-content">
                    <p><?php echo ucfirst($activity['user_name']) ." ".$activity['activity']; ?></p>
                  </div>
                </div><!-- End activity item-->
            <?php endforeach; ?>

              </div>

            </div>
          </div><!-- End Recent Activity -->

          
        </div><!-- End Right side columns -->

      </div>