<?php
/*
Template Name: Hotel and Travel
*/
get_header();

//ACF Banner Black vars
$hotel_banner_background_image = get_field( 'hotel_banner_background_image' );

//ACF Experience Block vars
$hotel_experience_title = get_field ( 'hotel_experience_title' );
$hotel_experience_description = get_field ( 'hotel_experience_description' );
$hotel_experience_image_01 = get_field ( 'hotel_experience_image_01' );
$hotel_experience_image_02 = get_field ( 'hotel_experience_image_02' );
$hotel_experience_button = get_field ( 'hotel_experience_button' );

//ACF Transportation Block vars
$hotel_transportation_title = get_field( 'hotel_transportation_title' );
$hotel_transportation_description = get_field( 'hotel_transportation_description' );
$hotel_transportation_lyft_logo = get_field( 'hotel_transportation_lyft_logo' );
$hotel_transportation_uber_logo = get_field( 'hotel_transportation_uber_logo' );
$hotel_transportation_hertz_logo = get_field( 'hotel_transportation_hertz_logo' );
$hotel_transportation_hertz_address = get_field( 'hotel_transportation_hertz_address' );
$hotel_transportation_mass_transit_logo = get_field( 'hotel_transportation_mass_transit_logo' );
$hotel_transportation_mass_transit_description = get_field( 'hotel_transportation_mass_transit_description' );

//ACF Bottom Block vars
$hotel_bottom_block_description = get_field( 'hotel_bottom_block_description');


//ACF Footer Block vars

 $hotel_bottom_block_title =  get_field( 'hotel_bottom_block_title' );

?>
<main>
  <div class="hotel-page-wrapper">

    <!-- BANNER BLOCK -->
    <section>
    	<div class="hotel-banner banner-wrap"
    	<?php if ( $hotel_banner_background_image ) { ?>
    		style="background: linear-gradient( <?php the_field( 'background_overlay' ); ?>,<?php the_field( 'background_overlay' ); ?>), url(<?php echo $hotel_banner_background_image['url'];?>);"
    	<?php } ?>
      >

      <div class="inner-wrap">

    		<div class="container">
          <div class="banner-top">
    					<?php if ( have_rows( 'hotel_banner_intro' ) ) : ?>
    						<div class="banner-intro">
    						<?php while ( have_rows( 'hotel_banner_intro' ) ) : the_row(); ?>
                  <header>
    							   <h1> <?php the_sub_field( 'hotel_banner_intro_title' ); ?> </h1>
                  </header>
    							<p> <?php the_sub_field( 'hotel_banner_intro_description' ); ?> </p>
    						<?php endwhile; ?>
    					</div>
    					<?php endif; ?>

          </div><!-- /.banner-top -->
    		        <div class="banner-bottom">
    		        	<div class="content-left">

    								<?php if ( have_rows( 'hotel_banner_book' ) ) : ?>
    								<?php while ( have_rows( 'hotel_banner_book' ) ) : the_row(); ?>
    									<h2><?php the_sub_field( 'hotel_banner_book_title' ); ?> </h2>
    									<p> <?php the_sub_field( 'hotel_banner_book_description' ); ?> </p>

    									<?php $hotel_banner_button = get_sub_field( 'hotel_banner_button' ); ?>
    									<?php if ( $hotel_banner_button ) { ?>
    										<a class="cta-button" href="<?php echo $hotel_banner_button['url']; ?>" target="<?php echo $hotel_banner_button['target']; ?>"><?php echo $hotel_banner_button['title']; ?></a>
    									<?php } ?>
    								<?php endwhile; ?>
    							<?php endif; ?>

    							<?php if ( have_rows( 'hotel_banner_location' ) ) : ?>
    								<?php while ( have_rows( 'hotel_banner_location' ) ) : the_row(); ?>
    									<h2><?php the_sub_field( 'hotel_banner_location_title' ); ?></h2>
    									<p><?php the_sub_field( 'hotel_banner_location_name' ); ?>
    										<br>
    									<?php
    									$address_01 = get_sub_field ( 'hotel_banner_location_address_01' );
    									$address_02 = get_sub_field ( 'hotel_banner_location_address_02' );
    									$address_03 = get_sub_field ( 'hotel_banner_location_address_03' );
    									?>
    										<?php if ( $address_01 ){
    											echo $address_01; ?>
    											<br>
    										<?php } ?>

    										<?php if ( $address_02 ){
    											echo $address_02; ?>
    											<br>
    										<?php } ?>

    										<?php if ( $address_03 ){
    											echo $address_03; ?>
    											<br>
    										<?php } ?>
    										</p>

    									<?php
    									$hotel_banner_location_address_button = get_sub_field( 'hotel_banner_location_address_button' );
    									if ( $hotel_banner_location_address_button ) {
    									?>
    										<a class="cta-button" href="<?php echo $hotel_banner_location_address_button['url']; ?>" target="<?php echo $hotel_banner_location_address_button['target']; ?>"><?php echo $hotel_banner_location_address_button['title']; ?></a>
    									<?php } ?>
    								<?php endwhile; ?>
    							<?php endif; ?>
    					</div><!-- /.content-left -->

              <div class="content-right">
    					<?php if ( have_rows( 'hotel_banner_location' ) ) : ?>
    						<?php while ( have_rows( 'hotel_banner_location' ) ) : the_row(); ?>
    							<div class="location-map">
    								<iframe src="		<?php the_sub_field( 'map_url' ); ?>" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
    							</div>
    						<?php endwhile; ?>
    					<?php endif; ?>
            </div><!-- /.content-right -->
    	    </div><!-- /.banner-bottom -->
    		</div><!-- /.container -->

      </div><!-- /.inner-wrap -->

    </div><!-- /.hotel-banner -->
  </section>

  <!-- LOCATION INFO BLOCK -->
  	<section class="location-info-section">
      <div class="container">
  	    <div class="inner-wrap">

  	        <div class="content-right">
  						<?php if ( $hotel_experience_title ){?>
  							<h2><?php echo $hotel_experience_title; ?></h2>
  						<?php } ?>

  						<?php if ( $hotel_experience_description ){?>
  							<?php echo $hotel_experience_description;?>
  						<?php } ?>

  						<?php if ( $hotel_experience_button ){?>
                <a class="cta-button" href="<?php echo $hotel_experience_button['url']; ?>" target="<?php echo $hotel_experience_button['target']; ?>"><?php echo $hotel_experience_button['title']; ?></a>
  						<?php } ?>
  	        </div><!-- /.content-right -->

            <div class="content-left">
              <?php if ( $hotel_experience_image_01 ) { ?>
                <img src="<?php echo $hotel_experience_image_01['url']; ?>" alt="<?php echo $hotel_experience_image_01['alt']; ?>" />
                <img src="<?php echo $hotel_experience_image_02['url']; ?>" alt="<?php echo $hotel_experience_image_02['alt']; ?>" />
              <?php } ?>
            </div><!-- /.content-left -->

  	    </div><!-- /.inner-wrap -->
      </div><!-- /.container -->
  	</section><!-- /.location-info-section -->

    <!-- TRANSPORTATION BLOCK -->
  	<section class="transportation-section">
      <div class="container">
  	    <div class="inner-wrap">
  	        <div class="content-left">
  						<?php if ( $hotel_transportation_title){ ?>
  	            <h2><?php echo $hotel_transportation_title;?></h2>
  						<?php } ?>
  						<?php if ( $hotel_transportation_description ){ ?>
  							<p><?php echo $hotel_transportation_description; ?></p>
  						<?php } ?>

            <div class="transportation-vehicles">
  						<div class="vehicles-left">
  							<?php if ( $hotel_transportation_lyft_logo ) { ?>
  								<img src="<?php echo $hotel_transportation_lyft_logo['url']; ?>" alt="<?php echo $hotel_transportation_lyft_logo['alt']; ?>"  style="height: 60px;" />
  							<?php } ?>
  							<?php if ( $hotel_transportation_uber_logo ) { ?>
  								<img src="<?php echo $hotel_transportation_uber_logo['url']; ?>" alt="<?php echo $hotel_transportation_uber_logo['alt']; ?>" style="height: 32px;" />
  							<?php } ?>
  						</div><!-- /.vehicles-left -->
    					<div class="vehicles-right">
    						<?php if ( $hotel_transportation_hertz_logo ) { ?>
    							<img src="<?php echo $hotel_transportation_hertz_logo['url']; ?>" alt="<?php echo $hotel_transportation_hertz_logo['alt']; ?>" />
    						<?php } ?>

    						<?php if ( $hotel_transportation_hertz_address){ ?>
    							<p><?php echo $hotel_transportation_hertz_address; ?></p>
    						<?php } ?>
    					</div><!-- /.vehicles-right -->
            </div><!-- /.transportation-vehicles -->
  	        </div><!-- /.content-left -->
  	        <div class="content-right">
  						<?php if ( $hotel_transportation_mass_transit_logo ) { ?>
  							<img src="<?php echo $hotel_transportation_mass_transit_logo['url']; ?>" alt="<?php echo $hotel_transportation_mass_transit_logo['alt']; ?>" />
  						<?php } ?>

  						<?php if ( $hotel_transportation_mass_transit_description ) {
   					 		echo $hotel_transportation_mass_transit_description;
  						}?>
  	        </div><!-- /.content-right -->

          </div><!-- /.inner-wrap -->
  	    </div><!-- /.container -->
  	</section><!-- /.transportation-section -->

    <!-- INTERNATIONAL ATTENDEES BLOCK -->
    <section>
    	<div class="intl-attendees-section">
        <div class="inner-wrap">
    		<?php if ( $hotel_bottom_block_title ){?>
          <header class="section-title">
            <h2><?php echo $hotel_bottom_block_title; ?></h2>
          </header>
    			<?php } ?>
          <div class="section-content">
    			<?php if ( $hotel_bottom_block_description ){?>
    				<p><?php echo $hotel_bottom_block_description; ?></p>
    			<?php }?>
        </div><!-- /.section-content -->
        </div><!-- /.inner-wrap -->
    	</div><!-- /.intl-attendees-section -->
    </section>
  </div><!-- /.hotel-page-wrapper -->
</main>
    <?php get_footer(); ?>
