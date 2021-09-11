<?php

use app\config\MyConfig; ?>

<div class="hero-wrap" style="background-image: url('images/bg_2.jpg');" data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="overlay-2"></div>
  <div class="container">
    <div class="row no-gutters slider-text justify-content-center align-items-center">
      <div class="col-lg-8 col-md-6 ftco-animate d-flex align-items-end">
        <div class="text text-center w-100">
          <h1 class="mb-4"> <?= MyConfig::sitename(); ?> Properties</h1>
          <p><a href="#" class="btn btn-primary py-3 px-4">Search Properties</a></p>
        </div>
      </div>
    </div>
  </div>
  <div class="mouse">
    <a href="#" class="mouse-icon">
      <div class="mouse-wheel"><span class="ion-ios-arrow-round-down"></span></div>
    </a>
  </div>
</div>
<section class="ftco-section ftco-no-pb">
  <div class="container">
    <div class="row">
      <div class="col-md-12">

        <div class="error">
          <?php if (!empty($errors)) : ?>
            <div class="alert alert-danger">
              <?php foreach ($errors as $error) : ?>
                <div><em><?php echo $error ?></em></div>
              <?php endforeach; ?>
            </div>
          <?php endif; ?>
        </div>

        <div class="search-wrap-1 ftco-animate">
          <form action="" method="GET" class="search-property-1">
            <div class="row">
              <div class="col-lg align-items-end">
                <div class="form-group">
                  <label for="#">Location</label>
                  <div class="form-field">
                    <div class="icon"><span class="ion-ios-search"></span></div>
                    <input type="text" name="state" value="<?= $state ?>" class="form-control" placeholder="State">
                  </div>
                </div>
              </div>
              <div class="col-lg align-items-end">
                <div class="form-group">
                  <label for="#">Property Type</label>
                  <div class="form-field">
                    <div class="select-wrap">
                      <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                      <select name="type" id="" class="form-control">
                        <option value="">Type</option>
                        <option value="commercial">Commercial</option>
                        <option value="office">Office</option>
                        <option value="residential">Residential</option>
                        <option value="villa">Villa</option>
                        <option value="land">Land</option>
                        <option value="apartment">Apartment</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg align-items-end">
                <div class="form-group">
                  <label for="#">Property Status</label>
                  <div class="form-field">
                    <div class="select-wrap">
                      <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                      <select name="for" id="" class="form-control">
                        <option value="">Type</option>
                        <option value="rent">Rent</option>
                        <option value="sale">Sale</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg align-self-end">
                <div class="form-group">
                  <div class="form-field">
                    <input type="submit" value="Search Property" class="form-control btn btn-primary">
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="ftco-section goto-here">
  <div class="container">
    <div class="row">
      <?php foreach ($properties as $property) : ?>
        <div class="col-md-4">
          <div class="property-wrap ftco-animate">
            <div class="img d-flex align-items-center justify-content-center" style="background-image: url('/<?php echo $property['image']; ?>');">
              <a href="properties-single.html" class="icon d-flex align-items-center justify-content-center btn-custom">
                <span class="ion-ios-link"></span>
              </a>
              <div class="list-agent d-flex align-items-center">

                <div class="tooltip-wrap d-flex">
                  <a href="#" class="icon-2 d-flex align-items-center justify-content-center" data-toggle="tooltip" data-placement="top" title="View">
                    <span class="ion-ios-eye"><i class="sr-only">View</i></span>
                  </a>
                </div>

              </div>
            </div>
            <div class="text">
              <p class="price mb-3"><span class="orig-price">#<?php echo number_format($property['price'], 2); ?></span></p>
              <h3 class="mb-0"><a href="properties-single.html"><?= $property['property']; ?></a></h3>
              <span class="location d-inline-block mb-3"><i class="ion-ios-pin mr-2"></i><?= $property['address']; ?></span>
              <ul class="property_list">
                <li><span class="flaticon-bed"></span><?= $property['bedroom']; ?></li>
                <li><span class="flaticon-bathtub"></span><?= $property['toilet']; ?></li>
                <li><span class="flaticon-kitchen">Kitchen:</span><?= $property['kitchen']; ?></li>
              </ul>
            </div>
          </div>
        </div>
      <?php endforeach; ?>

    </div>

  </div>
</section>