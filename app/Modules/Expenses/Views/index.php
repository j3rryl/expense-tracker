 
<div class="d-flex justify-content-end mb-3">
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal">
    New Expense
</button>

 </div>
 <!-- Expenses -->
 <div class="col-12">
    <div class="card recent-sales overflow-auto">
    <div class="card-body">
        <h5 class="card-title">Expenses</h5>

        <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Amount</th>
            <th scope="col">Category</th>
            <th scope="col">Created At</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($expenses as $expense): ?>
            <tr>
            <th scope="row"><a href="#"><?php echo $expense['id']; ?></a></th>
            <td><?php echo $expense['name']; ?></td>
            <td><?php echo number_format($expense['amount'],2); ?></td>
            <td><?php echo $expense['category_name']; ?></td>
            <td>
                <?php 
                $date = new DateTime($expense['created_at']);
                $formattedDate = $date->format('j F Y g.i a'); 
                echo $formattedDate; 
                ?>
            </td>
            <td>
                <div class="d-flex justify-content-start align-items-center gap-3">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateModal<?php echo $expense['id']; ?>"><i class="bi bi-pencil-square me-1"></i></button>
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo $expense['id']; ?>"><i class="bi bi-trash me-1"></i></button>

                </div>
            </td>
            </tr>

            <div class="modal fade" id="deleteModal<?php echo $expense['id']; ?>" tabindex="-1">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Remove <?php echo $expense['name']; ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="g-3" method="post" action="<?= site_url('expenses/delete/' . $expense['id']) ?>">
                            <?= csrf_field() ?>
                            <p class="mb-3">Are you sure you want to remove this expense ?</p>
                            <div class="d-flex justify-content-between">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="updateModal<?php echo $expense['id']; ?>" tabindex="-1">
            <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Update <?php echo $expense['name']; ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="g-3" method="post" action="<?= site_url('expenses/update/'. $expense['id']) ?>">
                            <?= csrf_field() ?>
                            <div class="row mb-3">
                                <div class="col-6 mb-3">
                                    <label for="inputNanme4" class="form-label">Expense Name</label>
                                    <input type="text" class="form-control" id="inputNanme4" name="name" value="<?php echo $expense['name']; ?>" required>
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="inputNanme4" class="form-label">Amount</label>
                                    <input type="number" step="0.01" class="form-control" id="inputNanme4" name="amount" value="<?php echo $expense['amount']; ?>" required>
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="inputNanme4" class="form-label">Category</label>
                                    <select id="inputState" class="form-select" required name="category_id">
                                        <?php foreach ($categories as $category): ?>
                                            <option value="<?php echo $category['id']; ?>" 
                                            <?php if ($expense['category_id'] == $category['id']): ?>
                                                selected
                                            <?php endif; ?>
                                            >
                                                <?php echo $category['name']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
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
            <?php endforeach; ?>
        </tbody>
        </table>

    </div>

    </div>
 </div><!-- End Expenses -->


<div class="modal fade" id="basicModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">New Expense</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form class="g-3" method="post" action="<?= site_url('expenses/save') ?>">
                <?= csrf_field() ?>
                <input type="text" class="form-control" id="inputNanme4" name="user_id" value="<?= session()->get("user_id")?>" hidden>
                <div class="row mb-3">
                    <div class="col-6 mb-3">
                        <label for="inputNanme4" class="form-label">Expense Name</label>
                        <input type="text" class="form-control" id="inputNanme4" name="name" required>
                    </div>
                    <div class="col-6 mb-3">
                        <label for="inputNanme4" class="form-label">Amount</label>
                        <input type="number" class="form-control" id="inputNanme4" name="amount" required>
                    </div>
                    <div class="col-6 mb-3">
                        <label for="inputNanme4" class="form-label">Category</label>
                        <select id="inputState" class="form-select" required name="category_id">
                            <?php foreach ($categories as $category): ?>
                                <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
                            <?php endforeach; ?>
                        </select>
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
