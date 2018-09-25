<?php
/*
Template Name: About Page 2018
*/
get_header();

//ACF Banner vars
$about_banner_background_image = get_field ( 'about_banner_background_image');
$about_banner_heading = get_field ( 'about_banner_heading' );
$about_banner_content = get_field ('about_banner_content' );
$about_banner_button = get_field ( 'about_banner_button' );

//ACF Feature Block vars
$about_feature_image = get_field ( 'about_feature_image' );
$about_feature_title = get_field ( 'about_feature_title' );

//ACF Tracks Block vars
$about_tracks_title = get_field ( 'about_tracks_title' );
$about_tracks_description = get_field ( 'about_tracks_description');

?>
<div class="about-page-wrapper">


<div class="hero hero--aboutPage" style="background-image:url(<?php echo $about_banner_background_image['url'];?>)">
    <div class="hero-wrapper hero-wrapper--aboutPage">
      <div class="hero-content">
        <?php if ( $about_banner_heading ){?>
          <h1 class="hero-title hero-title--aboutPage"><?php echo $about_banner_heading; ?></h1>
        <?php } ?>

        <?php if ( $about_banner_content ){?>
          <?php echo $about_banner_content ?>
        <?php } ?>

        <?php if ( $about_banner_button ) { ?>
        <a class="cta-button" href="<?php echo $banner_button['url']; ?>" target="<?php echo $banner_button['target']; ?>"><?php echo $banner_button['title']; ?></a>
        <?php } ?>
      </div>
    </div><!-- /.inner-wrap -->
</div><!-- /.about-banner -->

<section class="highlights-section">
    <div class="container">
      <div class="section-content">
      <?php if ( $about_feature_image ){ ?>
        <div class="content-left">
            <img src="<?php echo $about_feature_image['url']; ?>" alt="<?php echo $about_feature_image['alt']; ?>" />
        </div><!-- /.content-left -->
      <?php } ?>
        <div class="content-right">
          <?php if ( $about_feature_title ){?>
          <header>
            <h2><?php echo $about_feature_title; ?></h2>
          </header>

          <?php } ?>

          <?php if ( have_rows( 'about_feature_list' ) ) : ?>
            <ul>
          	<?php while ( have_rows( 'about_feature_list' ) ) : the_row(); ?>
          		<li> <?php the_sub_field( 'feature' ); ?> </li>
          	<?php endwhile; ?>
          <?php else : ?>
          	<?php // no rows found ?>
            </ul>
          <?php endif; ?>
        </div><!-- /.content-right -->
      </div><!-- /.container -->
    </div><!-- /.inner-wrap -->
</section><!-- /.highlights-section -->

<!-- ABOUT TRACKS BLOCK -->

<section class="tracks-section">
   <div class="inner-wrap">

     <header>
     <?php if ( $about_tracks_title ){ ?>
       <div class="container">
       <div class="section-title">
        <h2><?php echo $about_tracks_title; ?></h2>
      </div>
     <?php } ?>
     <?php if ( $about_tracks_description ){ ?>
       <div class="section-description">
       <?php echo $about_tracks_description; ?>
      </div>
     <?php } ?>
   </div>
   </header>

        <div class="container">
          <div class="section-content">

              <?php if ( have_rows( 'about_tracks_tracks' ) ) : ?>
              	<?php while ( have_rows( 'about_tracks_tracks' ) ) : the_row(); ?>
                  <section class="track">
                    <header>
                  		<?php $track_image = get_sub_field( 'track_image' ); ?>
                  		<?php if ( $track_image ) { ?>
                        <figure>
                          <img src="<?php echo $track_image['url']; ?>" alt="<?php echo $track_image['alt']; ?> "/>
                        </figure>
                    	<?php } ?>
                      <div class="track-header-full">
                    		<h2><?php the_sub_field( 'track_title' ); ?> </h2>
                    		<h4><?php the_sub_field( 'track_audience' ); ?> </h4>
                      </div>
                      <div class="track-header-short">
                          <h2><?php the_sub_field( 'short_title' ); ?></h2>
                      </div>
                    </header>
                    <p>	<?php the_sub_field( 'track_description' ); ?></p>
                  </section>

              	<?php endwhile; ?>
              <?php else : ?>
              	<?php // no rows found ?>
              <?php endif; ?>
            </div>
          </div> <!-- /.container -->

      </div><!-- /.inner-wrap -->
  </section><!-- /.tracks-section -->


<!-- BOTTOM BLOCK SECTION -->
  <section class="bottom-block-section">
    <div class="inner-wrap">
        <?php if ( have_rows( 'about-bottom-block-feature' ) ) : ?>
          <div class="container">
            <div class="section-content">
        	<?php while ( have_rows( 'about-bottom-block-feature' ) ) : the_row(); ?>
            <section>
              <div class="inner-content">

              <?php $image = get_sub_field( 'image' ); ?>
              <?php if ( $image ) { ?>
                <figure>
                  <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="conf18-about-bottom-img" />
                </figure>
              <?php } ?>

              <header>
                  <h3> <?php the_sub_field( 'title' ); ?> </h3>
                  <p> <?php the_sub_field( 'content' ); ?> </p>
              </header>
            </div><!-- /.inner-content -->
          </section> <!--/.conf18-about-bottom-block-col-->
        	<?php endwhile; ?>
            </div><!--/.conf-home-container-->
          </div><!--/.conf18-about-bottom-block-->
        <?php else : ?>
        	<?php // no rows found ?>
        <?php endif; ?>
      </div><!-- /.inner-wrap -->
  </section><!-- /.bottom-block-section -->
</div><!-- /.about-page-wrapper -->

    <?php get_footer(); ?>
