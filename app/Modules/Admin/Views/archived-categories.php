 <!-- Categories -->
<p>Archived Categories</p>
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
                        <th scope="col">Actions</th>
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
                         <td>
                            <div class="d-flex justify-content-start align-items-center gap-3">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#restoreModal<?php echo $category['id']; ?>"><i class="bi bi-cloud me-1"></i></button>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo $category['id']; ?>"><i class="bi bi-trash me-1"></i></button>
                            </div>
                        </td>
                      </tr>

                      <div class="modal fade" id="deleteModal<?php echo $category['id']; ?>" tabindex="-1">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Remove <?php echo $category['name']; ?></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="g-3" method="post" action="<?= site_url('admin/categories/delete/' . $category['id']) ?>">
                                    <?= csrf_field() ?>
                                    <p class="mb-3">Are you sure you want to permanently delete this category? THIS ACTION CANNOT BE UNDONE!!!</p>
                                    <div class="d-flex justify-content-between">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </form>
                            </div>
                            </div>
                        </div>
                    </div>
                      <div class="modal fade" id="restoreModal<?php echo $category['id']; ?>" tabindex="-1">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Restore <?php echo $category['name']; ?></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="g-3" method="post" action="<?= site_url('admin/categories/restore/' . $category['id']) ?>">
                                    <?= csrf_field() ?>
                                    <p class="mb-3">Are you sure you want to restore this category?</p>
                                    <div class="d-flex justify-content-between">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </form>
                            </div>
                            </div>
                        </div>
                    </div>
                      <?php endforeach; ?>
                    </tbody>
                  </table>

                </div>

              </div>
            </div><!-- End Categories -->


            <div class="modal fade" id="saveModal" tabindex="-1">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">New Category</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="g-3" method="post" action="<?= site_url('admin/categories/save') ?>">
                                    <?= csrf_field() ?>
                                    <div class="row mb-3">
                                        <div class="col-12 mb-3">
                                            <label for="inputNanme4" class="form-label">Name</label>
                                            <input type="text" class="form-control" id="inputNanme4" name="name" required>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </form>
                            </div>
                            </div>
                        </div>
                    </div>