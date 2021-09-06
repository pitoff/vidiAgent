    <section class="ftco-section contact-section">
      <h2 class="mb-2 justify-content-center" style="text-align: center;">Administrator Login</h2>
      <div class="container">

        <div class="row block-9 justify-content-center mb-5">
          <div class="col-md-6 align-items-stretch d-flex">

            <form action="/admin/login" method="POST" class="bg-light p-5 contact-form">
              <div class="error">
                <?php if (!empty($errors)) : ?>
                  <div class="alert alert-danger">
                    <?php foreach ($errors as $error) : ?>
                      <div><em><?php echo $error ?></em></div>
                    <?php endforeach; ?>
                  </div>
                <?php endif; ?>
              </div>
              <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="Your Email">
              </div>
              <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Your Password">
              </div>
              <div class="form-group">
                <input type="submit" value="Login" class="btn btn-primary py-3 px-5">
              </div>
            </form>
          </div>

        </div>

      </div>
    </section>