<?php
/*
Template Name: Hotel Page 2018
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

<div class="conf18-hotel-wrap">

<!-- BANNER BLOCK -->
	<div class="conf18-hotel-banner-wrap"
	<?php if ( $hotel_banner_background_image ) { ?>
		style="background-image: url(<?php echo $hotel_banner_background_image; ?> )"
	<?php } ?>
  >
		<div class="conf18-hotel-banner-inner">
		    <div class="conf-home-container">
					<?php if ( have_rows( 'hotel_banner_intro' ) ) : ?>
						<div class="conf18-hotel-banner-top">
						<?php while ( have_rows( 'hotel_banner_intro' ) ) : the_row(); ?>
							<h1> <?php the_sub_field( 'hotel_banner_intro_title' ); ?> </h1>
							<p> <?php the_sub_field( 'hotel_banner_intro_description' ); ?> </p>
						<?php endwhile; ?>
					</div>
					<?php endif; ?>

		        <div class="conf18-hotel-banner-footer">
		        	<div class="conf18-hotel-banner-booking">

								<?php if ( have_rows( 'hotel_banner_book' ) ) : ?>
								<?php while ( have_rows( 'hotel_banner_book' ) ) : the_row(); ?>
									<h2><?php the_sub_field( 'hotel_banner_book_title' ); ?> </h2>
									<p> <?php the_sub_field( 'hotel_banner_book_description' ); ?> </p>

									<?php $hotel_banner_button = get_sub_field( 'hotel_banner_button' ); ?>
									<?php if ( $hotel_banner_button ) { ?>
										<a class="navbar-single-button" href="<?php echo $hotel_banner_button['url']; ?>" target="<?php echo $hotel_banner_button['target']; ?>"><?php echo $hotel_banner_button['title']; ?></a>
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
										<a class="navbar-single-button" href="<?php echo $hotel_banner_location_address_button['url']; ?>" target="<?php echo $hotel_banner_location_address_button['target']; ?>"><?php echo $hotel_banner_location_address_button['title']; ?></a>
									<?php } ?>
								<?php endwhile; ?>
							<?php endif; ?>

					</div>

					<?php if ( have_rows( 'hotel_banner_location' ) ) : ?>
						<?php while ( have_rows( 'hotel_banner_location' ) ) : the_row(); ?>
							<div class="conf18-hotel-banner-map">
								<iframe src="		<?php the_sub_field( 'map_url' ); ?>" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
							</div>
						<?php endwhile; ?>
					<?php endif; ?>

		        </div>
		    </div>
		</div>
	</div>

<!-- EXPERIENCE BLOCK -->
	<section class="conf18-experience-block">
	    <div class="conf-home-container">
	        <div class="conf18-experience-block-desc">
						<?php if ( $hotel_experience_title ){?>
							<h2><?php echo $hotel_experience_title; ?></h2>
						<?php } ?>

						<?php if ( $hotel_experience_description ){?>
							<?php echo $hotel_experience_description;?>
						<?php } ?>

						<?php if ( $hotel_experience_button ){?>
              <a class="navbar-single-button" href="<?php echo $hotel_experience_button['url']; ?>" target="<?php echo $hotel_experience_button['target']; ?>"><?php echo $hotel_experience_button['title']; ?></a>
						<?php } ?>
	        </div>
	        <div class="conf18-experience-block-image">
            <?php if ( $hotel_experience_image_01 ) { ?>
            	<img src="<?php echo $hotel_experience_image_01['url']; ?>" alt="<?php echo $hotel_experience_image_01['alt']; ?>" />
              <img src="<?php echo $hotel_experience_image_02['url']; ?>" alt="<?php echo $hotel_experience_image_02['alt']; ?>" />
            <?php } ?>
	        </div>
	    </div>
	</section>

  <!-- TRANSPORTATION BLOCK -->
	<section class="conf18-getting-around-wrap">
	    <div class="conf-home-container">
	        <div class="conf18-getting-around-col">
						<?php if ( $hotel_transportation_title){ ?>
	            <h2><?php echo $hotel_transportation_title;?></h2>
						<?php } ?>
						<?php if ( $hotel_transportation_description ){ ?>
							<p><?php echo $hotel_transportation_description; ?></p>
						<?php } ?>

          <div class="conf18-getting-trans-wrap">
						<div class="conf18-getting-trans-block">
							<?php if ( $hotel_transportation_lyft_logo ) { ?>
								<img src="<?php echo $hotel_transportation_lyft_logo['url']; ?>" alt="<?php echo $hotel_transportation_lyft_logo['alt']; ?>"  style="height: 60px;" />
							<?php } ?>
							<?php if ( $hotel_transportation_uber_logo ) { ?>
								<img src="<?php echo $hotel_transportation_uber_logo['url']; ?>" alt="<?php echo $hotel_transportation_uber_logo['alt']; ?>" style="height: 32px;" />
							<?php } ?>
						</div>
					<div class="conf18-getting-trans-block">
						<?php if ( $hotel_transportation_hertz_logo ) { ?>
							<img src="<?php echo $hotel_transportation_hertz_logo['url']; ?>" alt="<?php echo $hotel_transportation_hertz_logo['alt']; ?>" />
						<?php } ?>

						<?php if ( $hotel_transportation_hertz_address){ ?>
							<p><?php echo $hotel_transportation_hertz_address; ?></p>
						<?php } ?>
					</div>
	            </div>
	        </div>
	        <div class="conf18-getting-around-col conf18-getting-around-col2">
						<?php if ( $hotel_transportation_mass_transit_logo ) { ?>
							<img src="<?php echo $hotel_transportation_mass_transit_logo['url']; ?>" alt="<?php echo $hotel_transportation_mass_transit_logo['alt']; ?>" />
						<?php } ?>

						<?php if ( $hotel_transportation_mass_transit_description ) {
 					 		echo $hotel_transportation_mass_transit_description;
						}?>
	        </div>
	    </div>
	</section>

  <!-- INTERNATIONAL ATTENDEES BLOCK -->
	<div class="conf-18-attendees">
		<?php if ( $hotel_bottom_block_title ){?>
        <h2><?php echo $hotel_bottom_block_title; ?></h2>
			<?php } ?>

			<?php if ( $hotel_bottom_block_description ){?>
				<?php echo $hotel_bottom_block_description; ?>
			<?php }?>

	</div>
</div>
    <?php get_footer(); ?>
