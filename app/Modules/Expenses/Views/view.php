<div class="card">
    <div class="card-body">
        <h5 class="card-title"><?php echo $expense['name']; ?></h5>
        <div class="row mb-3">
            <div class="col-md-3">
                <p class="text-muted">Date: <span class="text-dark"><?php echo $expense['date']; ?></span></p>
            </div>
            <div class="col-md-3">
                <p class="text-muted">Amount: <span class="text-dark"><?php echo $expense['amount']; ?></span></p>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-3">
                <p class="text-muted">Description:</p>
                <p> <?php echo $expense['description']; ?></p>
            </div>
        </div>
    </div>
</div>