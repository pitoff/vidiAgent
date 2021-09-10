<section class="hero-wrap hero-wrap-2 ftco-degree-bg js-fullheight" style="background-image: url('/images/bg_1.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="overlay-2"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
          <div class="col-md-9 ftco-animate pb-5 mb-5 text-center">
            <h1 class="mb-3 bread">Properties</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Properties <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section goto-here">
    	<div class="container">
        <div class="row">
        <?php foreach($properties as $property): ?>
        	<div class="col-md-4">
        		<div class="property-wrap ftco-animate">
        			<div class="img d-flex align-items-center justify-content-center" style="background-image: url('/<?php echo $property->image;?>');">
        				<a href="properties-single.html" class="icon d-flex align-items-center justify-content-center btn-custom">
        					<span class="ion-ios-link"></span>
        				</a>
        				<div class="list-agent d-flex align-items-center">
        					
                            <?php if(loggedIn()):?>
        					<div class="tooltip-wrap d-flex">
        						<a href="/admin/updateproperty?id=<?php echo $property->id?>" class="icon-2 d-flex align-items-center justify-content-center" data-toggle="tooltip" data-placement="top" title="Edit">
        							<span class="ion-ios-book"><i class="sr-only">Edit</i></span>
        						</a>
                                <a href="#" class="icon-2 d-flex align-items-center justify-content-center" data-toggle="tooltip" data-placement="top" title="View">
        							<span class="ion-ios-eye"><i class="sr-only">View</i></span>
        						</a>

                                <form method="POST" action="/admin/removeproperty">
                                    <button type="submit" class="btn"><a href="" class="icon-2 d-flex align-items-center justify-content-center" data-toggle="tooltip" data-placement="top" title="Remove">
                                        <input type="hidden" name="id" value="<?php echo $property->id;?>">
                                        <span class="ion-ios-trash"><i class="sr-only">Remove</i></span>
                                    </a></button>
                                </form>
        					</div>
                            <?php else:?>
                                <div class="tooltip-wrap d-flex">
                                <a href="#" class="icon-2 d-flex align-items-center justify-content-center" data-toggle="tooltip" data-placement="top" title="View">
        							<span class="ion-ios-eye"><i class="sr-only">View</i></span>
        						</a>
        						
        					    </div>
                            <?php endif;?>

        				</div>
        			</div>
        			<div class="text">
        				<p class="price mb-3"><span class="orig-price">#<?php echo number_format($property->price, 2); ?></span></p>
        				<h3 class="mb-0"><a href="properties-single.html"><?= $property->property;?></a></h3>
        				<span class="location d-inline-block mb-3"><i class="ion-ios-pin mr-2"></i><?= $property->address;?></span>
        				<ul class="property_list">
        					<li><span class="flaticon-bed"></span><?=$property->bedroom;?></li>
        					<li><span class="flaticon-bathtub"></span><?= $property->toilet;?></li>
        					<li><span class="flaticon-kitchen">Kitchen:</span><?= $property->kitchen;?></li>
        				</ul>
        			</div>
        		</div>
        	</div>
        	<?php endforeach; ?>

        </div>
        
    	</div>
    </section>
