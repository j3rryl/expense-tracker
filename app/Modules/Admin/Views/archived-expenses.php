 <!-- Expenses -->

 <p>Archived Expenses</p>
 <div class="col-12">
    <div class="card recent-sales overflow-auto">
    <div class="card-body">
        <h5 class="card-title">Expenses</h5>

        <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">User</th>
            <th scope="col">Name</th>
            <th scope="col">Amount</th>
            <th scope="col">Category</th>
            <th scope="col">Date</th>
            <th scope="col">Description</th>
            <th scope="col">Created At</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($expenses as $expense): ?>
            <tr>
            <th scope="row"><a href="#"><?php echo $expense['id']; ?></a></th>
            <td class="text-capitalize"><?php echo $expense['user_name']; ?></td>
            <td><?php echo $expense['name']; ?></td>
            <td><?php echo number_format($expense['amount'],2); ?></td>
            <td><?php echo $expense['category_name']; ?></td>
            <td><?php echo $expense['date']; ?></td>
            <td><?php echo substr($expense['description'], 0, 20). '...'; ?></td>
            <td>
                <?php 
                $date = new DateTime($expense['created_at']);
                $formattedDate = $date->format('j F Y g.i a'); 
                echo $formattedDate; 
                ?>
            </td>
            <td>
                <div class="d-flex justify-content-start align-items-center gap-3">
                <button role="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#restoreModal<?php echo $expense['id']; ?>"><i class="bi bi-cloud me-1"></i></button>
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo $expense['id']; ?>"><i class="bi bi-trash me-1"></i></button>
                </div>
            </td>
            </tr>

            <div class="modal fade" id="deleteModal<?php echo $expense['id']; ?>" tabindex="-1">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Permanently Delete <?php echo $expense['name']; ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="g-3" method="post" action="<?= site_url('admin/expenses/delete/'. $expense['id']) ?>">
                            <?= csrf_field() ?>
                            <div class="row mb-3">
                                <p>Are you sure you want to permanently delete this? THIS ACTION CANNOT BE UNDONE!!!</p>
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
            <div class="modal fade" id="restoreModal<?php echo $expense['id']; ?>" tabindex="-1">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Restore <?php echo $expense['name']; ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="g-3" method="post" action="<?= site_url('admin/expenses/restore/'. $expense['id']) ?>">
                            <?= csrf_field() ?>
                            <div class="row mb-3">
                                <p>Are you sure you want restore this?</p>
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
            <?php endforeach; ?>
        </tbody>
        </table>

    </div>

    </div>
 </div><!-- End Expenses -->

