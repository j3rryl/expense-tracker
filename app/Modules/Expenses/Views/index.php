 
<div class="d-flex justify-content-end mb-3">
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal">
    New Expense
</button>

 </div>
 <!-- Expenses -->
 <div class="col-12">
    <div class="card recent-sales overflow-auto">

    <div class="filter">
        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
        <li class="dropdown-header text-start">
            <h6>Filter</h6>
        </li>

        <li><a class="dropdown-item" href="#">Today</a></li>
        <li><a class="dropdown-item" href="#">This Month</a></li>
        <li><a class="dropdown-item" href="#">This Year</a></li>
        </ul>
    </div>

    <div class="card-body">
        <h5 class="card-title">Expenses <span>| Today</span></h5>

        <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Created At</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($expenses as $expense): ?>
            <tr>
            <th scope="row"><a href="#"><?php echo $expense['id']; ?></a></th>
            <td><?php echo $expense['name']; ?></td>
            <td><?php 
            $date = new DateTime($expense['created_at']);
            $formattedDate = $date->format('j F Y g.i a'); 
            echo $formattedDate; 
            ?></td>
            </tr>
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
