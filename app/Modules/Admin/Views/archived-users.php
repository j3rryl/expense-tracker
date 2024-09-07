 
<p>Archived users</p>
<div class="d-flex justify-content-end mb-3">

 </div>
 <!-- users -->
 <div class="col-12">
    <div class="card recent-sales overflow-auto">
    <div class="card-body">
        <h5 class="card-title">users</h5>

        <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Username</th>
            <th scope="col">Created At</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($users as $user): ?>
            <tr>
            <th scope="row"><a href="#"><?php echo $user['id']; ?></a></th>
            <td><?php echo $user['username']; ?></td>
            <td>
                <?php 
                $date = new DateTime($user['created_at']);
                $formattedDate = $date->format('j F Y g.i a'); 
                echo $formattedDate; 
                ?>
            </td>
            <td>
                <div class="d-flex justify-content-start align-items-center gap-3">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#restoreModal<?php echo $user['id']; ?>"><i class="bi bi-cloud me-1"></i></button>
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo $user['id']; ?>"><i class="bi bi-trash me-1"></i></button>

                </div>
            </td>
            </tr>

            <div class="modal fade" id="deleteModal<?php echo $user['id']; ?>" tabindex="-1">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Permanently <?php echo $user['username']; ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="g-3" method="post" action="<?= site_url('admin/users/remove/' . $user['id']) ?>">
                            <?= csrf_field() ?>
                            <p class="mb-3">Are you sure you want to permanently delete this user? THIS ACTION CANNOT BE UNDONE!!!</p>
                            <div class="d-flex justify-content-between">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="restoreModal<?php echo $user['id']; ?>" tabindex="-1">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Restore <?php echo $user['username']; ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="g-3" method="post" action="<?= site_url('admin/users/restore/' . $user['id']) ?>">
                            <?= csrf_field() ?>
                            <p class="mb-3">Are you sure you want to permanently restore this user?</p>
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
 </div><!-- End users -->

