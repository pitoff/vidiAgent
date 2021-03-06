<form action="" method="POST" enctype="multipart/form-data" class="bg-light p-5 contact-form">
  <div class="error">
    <?php if (!empty($errors)) : ?>
      <div class="alert alert-danger">
        <?php foreach ($errors as $error) : ?>
          <div><em><?php echo $error ?></em></div>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
  </div>

  <?php if ($property['image']) : ?>
    <img src="/<?php echo $property['image'] ?>" class="img d-flex align-items-center justify-content-center">
  <?php endif; ?>

  <div class="form-group">Image:</br>
    <input type="File" name="image">
  </div>

  <div class="form-group">Property type:
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

  <div class="form-group">Property For:
    <select name="for" id="" class="form-control">
      <option value="sale">Sale</option>
      <option value="rent">Rent</option>
    </select>
  </div>

  <div class="form-group">
    <input type="name" name="name" class="form-control" value="<?= $property['property'] ?? '' ?>" placeholder="Property Name">
  </div>
  <div class="form-group">
    <select name="state" id="state" value="" onchange="toggleLGA(this)" class="form-control">
      <option value="" selected="selected">-- State --</option>
      <option value="Abia">Abia</option>
      <option value="Adamawa">Adamawa</option>
      <option value="AkwaIbom">AkwaIbom</option>
      <option value="Anambra">Anambra</option>
      <option value="Bauchi">Bauchi</option>
      <option value="Bayelsa">Bayelsa</option>
      <option value="Benue">Benue</option>
      <option value="Borno">Borno</option>
      <option value="Cross River">Cross River</option>
      <option value="Delta">Delta</option>
      <option value="Ebonyi">Ebonyi</option>
      <option value="Edo">Edo</option>
      <option value="Ekiti">Ekiti</option>
      <option value="Enugu">Enugu</option>
      <option value="FCT">FCT</option>
      <option value="Gombe">Gombe</option>
      <option value="Imo">Imo</option>
      <option value="Jigawa">Jigawa</option>
      <option value="Kaduna">Kaduna</option>
      <option value="Kano">Kano</option>
      <option value="Katsina">Katsina</option>
      <option value="Kebbi">Kebbi</option>
      <option value="Kogi">Kogi</option>
      <option value="Kwara">Kwara</option>
      <option value="Lagos">Lagos</option>
      <option value="Nasarawa">Nasarawa</option>
      <option value="Niger">Niger</option>
      <option value="Ogun">Ogun</option>
      <option value="Ondo">Ondo</option>
      <option value="Osun">Osun</option>
      <option value="Oyo">Oyo</option>
      <option value="Plateau">Plateau</option>
      <option value="Rivers">Rivers</option>
      <option value="Sokoto">Sokoto</option>
      <option value="Taraba">Taraba</option>
      <option value="Yobe">Yobe</option>
      <option value="Zamfara">Zamafara</option>
    </select>
  </div>
  <div class="form-group">
    <select name="local_govt" id="lga" class="form-control lga-select">

    </select>
  </div>
  <div class="form-group">
    <input type="text" name="address" class="form-control" value="<?php echo $property['address'] ?>" placeholder="Address">
  </div>
  <div class="form-group">
    <textarea name="description" id="" cols="30" rows="5" class="form-control" placeholder="Description"><?= $property['description']; ?></textarea>
  </div>
  <div class="form-group">
    <input type="text" name="price" class="form-control" value="<?php echo $property['price'] ?>" placeholder="Price">
  </div>
  <div class="form-group">
    <input type="number" name="bedroom" class="form-control" value="<?php echo $property['bedroom'] ?>" placeholder="Bedroom">
  </div>
  <div class="form-group">
    <input type="number" name="toilet" class="form-control" value="<?php echo $property['toilet'] ?>" placeholder="Toilet">
  </div>
  <div class="form-group">
    <input type="number" name="kitchen" class="form-control" value="<?php echo $property['kitchen'] ?>" placeholder="Kitchen">
  </div>
  <div class="form-group">
    <input type="submit" value="Submit" class="btn btn-primary py-3 px-5">
  </div>
</form>