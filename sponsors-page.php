<?php
/*
Template Name: Sponsors Page
*/
get_header();

// ACF Banner vars
$banner_heading = get_field ( 'banner_heading' );
$banner_content = get_field ( 'banner_content' );
$banner_button = get_field ( 'banner_button' );
$banner_background_image = get_field ( 'sponsors_banner_background_image' );
?>

<div class="sponsors-page-wrapper">
  <main>
    <section>
      <div class="hero hero--sponsorsPage" style="background-image:url(<?php echo $banner_background_image['url']; ?>)">
      		<div class="hero-wrapper hero-wrapper--sponsorsPage">
      			<div class="hero-content">

      				<?php if ( $banner_heading ){ ?>
              <header>
      				      <h1 class="hero-title"><?php echo $banner_heading; ?></h1>
              </header>
              <?php } ?>

      				<?php if ( $banner_content ){ ?>
      				<p class="become-sponsor"><?php echo $banner_content; ?></p>
      				<?php } ?>

      				<?php if ( $banner_button ) { ?>
      				<a class="cta-button" href="<?php echo $banner_button['url']; ?>" target="<?php echo $banner_button['target']; ?>"><?php echo $banner_button['title']; ?></a>
      				<?php } ?>

      			</div>
      		</div><!-- end row-->
      </div>
    </section>
  </main>
</div>
<?php get_footer()?>
