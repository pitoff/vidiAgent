<section class="ftco-section contact-section">
      <h2 class="mb-2 justify-content-center" style="text-align: center;">Add new property</h2>
      <div class="container">

        <div class="row block-9 justify-content-center mb-5">
          <div class="col-md-6 align-items-stretch d-flex">

            <form action="/admin/createproperty" method="POST" class="bg-light p-5 contact-form">
              <div class="error">
                <?php if (!empty($errors)) : ?>
                  <div class="alert alert-danger">
                    <?php foreach ($errors as $error) : ?>
                      <div><em><?php echo $error ?></em></div>
                    <?php endforeach; ?>
                  </div>
                <?php endif; ?>
              </div>
              <div class="form-group">Property Image:</br>
                <input type="File" name="image">
              </div>

              <div class="form-group">Property type:
                <select name="type" id="" class="form-control">
                    <option value="Land">Land</option>
                    <option value="House">House</option>
                    <option value="Hotel">Hotel</option>
                </select>
              </div>

              <div class="form-group">Property For:
                <select name="for" id="" class="form-control">
                    <option value="sale">Sale</option>
                    <option value="rent">Rent</option>
                </select>
              </div>

              <div class="form-group">
                <input type="name" name="name" class="form-control" placeholder="Property Name">
              </div>
              <div class="form-group">
                <textarea name="description" id="" cols="30" rows="5" class="form-control" placeholder="Description"></textarea>
              </div>
              <div class="form-group">
                <input type="text" name="price" class="form-control" placeholder="Price">
              </div>
              <div class="form-group">
                <input type="number" name="bedroom" class="form-control" placeholder="Bedroom">
              </div>
              <div class="form-group">
                <input type="number" name="toilet" class="form-control" placeholder="Toilet">
              </div>
              <div class="form-group">
                <input type="number" name="kitchen" class="form-control" placeholder="Kitchen">
              </div>
              <div class="form-group">
                <input type="submit" value="Submit" class="btn btn-primary py-3 px-5">
              </div>
            </form>
          </div>

        </div>

      </div>
    </section>