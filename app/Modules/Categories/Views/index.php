 <!-- Categories -->
 <div class="col-12">
              <div class="card recent-sales overflow-auto">
                <div class="card-body">
                  <h5 class="card-title">Categories</h5>

                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Created At</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($categories as $category): ?>
                      <tr>
                        <th scope="row"><a href="#"><?php echo $category['id']; ?></a></th>
                        <td><?php echo $category['name']; ?></td>
                        <td><?php 
                        $date = new DateTime($category['created_at']);
                        $formattedDate = $date->format('j F Y g.i a'); 
                        echo $formattedDate; 
                        ?></td>
                      </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>

                </div>

              </div>
            </div><!-- End Categories -->