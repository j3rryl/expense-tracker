 <!-- Expenses -->
 <div class="d-flex justify-content-end mb-3">
<a role="button" class="btn btn-danger" href="/admin/archived/expenses">
    Archived Expenses
</a>
 </div>
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
                <a role="button" href="/admin/expenses/view/<?php echo $expense['id']; ?>" class="btn btn-primary"><i class="bi bi-eye me-1"></i></a>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateModal<?php echo $expense['id']; ?>"><i class="bi bi-pencil-square me-1"></i></button>
                </div>
            </td>
            </tr>

            <div class="modal fade" id="updateModal<?php echo $expense['id']; ?>" tabindex="-1">
            <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Update <?php echo $expense['name']; ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="g-3" method="post" action="<?= site_url('admin/expenses/update/'. $expense['id']) ?>">
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
                                <div class="col-6 mb-3">
                                    <label for="inputNanme4" class="form-label">Date</label>
                                    <input type="date" class="form-control" id="inputNanme4" name="date"  value="<?php echo $expense['date']; ?>"required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-12 mb-3">
                                <label for="inputNanme4" class="form-label">Description</label>
                                <textarea class="form-control" id="inputNanme4" name="description"><?php echo $expense['description']; ?></textarea>
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

