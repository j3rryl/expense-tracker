<!DOCTYPE html>
<html lang="en">
<?php include_once __DIR__ . '/../header.php'; ?>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-6 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/logo.png" alt="">
                  <span class="d-none d-lg-block">Expense Tracker</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                    <p class="text-center small">Enter your personal details to create account</p>
                  </div>

                  <?= show_errors() ?>
                  <form class="row g-3 needs-validation" action="<?= url_to('register') ?>" method="post">
                  <?= csrf_field() ?>

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Username</label>
                      <div class="input-group">
                        <input type="text" name="username" class="form-control" autocomplete="email" id="yourUsername" required
                        placeholder="<?= lang('Auth.username') ?>" value="<?= old('username') ?>">
                        
                      </div>
                    </div>
                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Email</label>
                      <div class="input-group">
                        <input type="email" name="email" class="form-control" autocomplete="email" id="yourUsername" required
                        placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>">
                        
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" id="yourPassword" required inputmode="text" 
                        autocomplete="new-password" placeholder="<?= lang('Auth.password') ?>">
                        
                      </div>
                    </div>
                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <div class="input-group mb-3">
                        <input type="password" name="password_confirm" class="form-control" id="yourPassword" required inputmode="text" 
                        autocomplete="new-password" placeholder="<?= lang('Auth.passwordConfirm') ?>">
                        
                      </div>
                    </div>

                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit"><?= lang('Auth.register') ?></button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0"><?= lang('Auth.haveAccount') ?> <a href="<?= url_to('login') ?>"><?= lang('Auth.login') ?></a></p>
                    </div>
                  </form>

                </div>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->
</body>

</html>