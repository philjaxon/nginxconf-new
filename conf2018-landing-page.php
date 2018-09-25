<?php
/*
* Template Name: Home Page 2018
*
* @see understrap-child/conf2018-landing-page.php
*/
get_header();


// ACF Banner Block vars
$banner_background_image = get_field( 'banner_background_image' );
$banner_video =  get_field( 'background_video' );
$banner_image = get_field( 'banner_image' );
$banner_heading = get_field( 'banner_heading' );
$banner_sub_title_01 = get_field( 'banner_sub_title_01');
$banner_sub_title_02 = get_field( 'banner_sub_title_02');
$banner_description = get_field( 'banner_description' );
$banner_button_register = get_field( 'banner_button_register' );
$banner_button_footer = get_field( 'banner_button_footer' );
$banner_footer_title = get_field( 'banner_footer_title' );


// ACF Video Block vars
$video_block_URL = get_field( 'video_url' );

// ACF Speakers Block vars
$speakers_block_title = get_field( 'speakers_block_title' );

// ACF Schedule Block vars
$schedule_block_title = get_field ( 'schedule_block_title' );

// ACF Twitter Feed Block vars
$twitter_feed_title = get_field ( 'twitter_feed_title' );
$twitter_feed_URL = get_field ( 'twitter_feed_url' );
$twitter_timeline_header = get_field ( 'twitter_timeline_header' );

// ACF Video Highlights Block vars
$video_highlights_block_title = get_field ( 'video_highlight_block_title' );
?>

<!-- helper functions for generating page sections-->
<?php
function generate_heading_text(){
  global $banner_heading;

    if ( $banner_heading ) {
      ?>
      <h1 class="hero-title hero-title--homePage"><?php echo $banner_heading; ?></h1>
      <?php
    }
}

function generate_subtitle01_text(){
  global $banner_sub_title_01;

  if ( $banner_sub_title_01 ) {
    ?>
  <h2 class="hero-subTitle01--homePage"><?php echo $banner_sub_title_01; ?></h2>
    <?php
  }
}

function generate_subtitle02_text(){
  global $banner_sub_title_02;

  if ( $banner_sub_title_02 ) {
    ?>
  <h3 class="hero-subTitle02--homePage"><?php echo $banner_sub_title_02 ?></h3>
    <?php
  }
}

function generate_banner_description(){
  global $banner_description;
  if ( $banner_description ) {
  ?>
  <p class="hero-text"> <?php echo $banner_description; ?> </p>
  <?php
  }
}

function generate_banner_schedule(){
if ( have_rows( 'banner_schedule' ) ) : ?>
  <?php while ( have_rows( 'banner_schedule' ) ) : the_row(); ?>
  <h4>
  <?php echo get_sub_field ( 'date' ) . ": " . get_sub_field ( 'description' );?>
  </h4>
  <?php endwhile; ?>
  <?php else : ?>
  <?php // no rows found ?>
  <?php endif;
}

function generate_banner_register_btn(){
  global $banner_button_register;
  if ( $banner_button_register ) { ?>
    <a class="cta-button hero-ctaButton button-right" href="<?php echo  $banner_button_register['url']; ?>" target="<?php echo  $banner_button_register['target']; ?>"><?php echo  $banner_button_register['title']; ?></a>
  <?php
  }
}
?>

<div class="home-page-wrapper">

  <main>
  <!-- Banner Block -->
    <section class="hero hero--homePage"
    <?php if ( $banner_background_image ) { ?>
    	style="background-image: url( <?php echo $banner_background_image['url']; ?>)"
    <?php } ?>>

      <div class="hero-wrapper hero-wrapper--homePage">

        <?php if ( $banner_video ) { ?>
        <video class="hero-videoBackground" autoplay muted loop poster="<?php echo $banner_background_image['url'];?>">
            <source src="<?php echo $banner_video; ?>" type="video/mp4">
        </video>
        <?php } ?>

          <div class="hero-content">

              <div class="hero-bannerLeft">
                        <!-- show heading only on mobile -->
                <header>
                  <div class="mobile d-sm-block d-lg-none col-12 text-center">
                    <?php
                    generate_heading_text();
                    generate_subtitle01_text();
                    generate_subtitle02_text();
                    ?>
                  </div>
                </header>
      <!-- show banner image -->
            <?php
            if ( $banner_image ) {
            ?>
              <figure class="hero-image">
                <img  class="img-fluid" src="<?php echo $banner_image['url']; ?>" alt="<?php echo $banner_image['alt']; ?>" />
              </figure>
            <?php
            }
            ?>

            <!-- show description, schedule and register button only on mobile -->
            <div class="d-sm-block d-lg-none text-center">
            <?php
            generate_banner_description();
            generate_banner_schedule();
            generate_banner_register_btn();
            ?>
            </div>
          </div> <!-- /.banner-left -->
          <div class="hero-bannerRight hero-bannerRight--homePage">
            <!--the heading and subtitles -->
            <header>
              <hgroup>
                <?php
                generate_heading_text();
                generate_subtitle01_text();
                generate_subtitle02_text();
                ?>
              </hgroup>
            </header>
                <?php
                generate_banner_description();
                ?>

            <!-- the schedule-->
            <?php
            generate_banner_schedule();
            ?>

            <!-- the register button -->
            <?php
            generate_banner_register_btn();
            ?>
          </div> <!-- /.banner-right -->
          <footer class="hero-footer">
            <?php if ( $banner_footer_title ){?>
              <p class="hero-text"> <?php echo $banner_footer_title; ?> </p>
            <?php
            }

            if ( $banner_button_footer ){?>
              <a class="cta-button" href="<?php echo $banner_button_footer['url']; ?>" target="<?php echo $banner_button_footer['target']; ?>"><?php echo $banner_button_footer['title']; ?></a>
            <?php
            }
            ?>
          </footer>
        </div> <!-- /.inner-wrap -->

      </div>

    </section><!-- ./home-banner -->

    <!-- Cost Block -->
    <section class="pricing">
        <div class="pricing-innerWrap">
              <?php if ( have_rows( 'cost_level_1' ) ) : ?>
    	           <?php while ( have_rows( 'cost_level_1' ) ) : the_row(); ?>
                   <div class="pricing-level" style="color:<?php the_sub_field( 'text_color' ); ?>!important">
                    <h3 class="pricing-cost"><span class="pricing-currencySign">$</span><?php the_sub_field( 'price' ); ?></h3>
                    <p class="pricing-description"> <?php the_sub_field( 'description' ); ?> </p>
                    <?php $subtext = get_sub_field('sub_text');
                    if ($subtext){ ?>
                    <p class="pricing-subText"> <?php echo $subtext;?> </p>
                  <?php } ?>
                  </div> <!-- /.price -->
                 <?php endwhile; ?>
              <?php endif; ?>

              <?php if ( have_rows( 'cost_level_2' ) ) : ?>
              	<?php while ( have_rows( 'cost_level_2' ) ) : the_row(); ?>
                  <div class="pricing-level" style="color:<?php the_sub_field( 'text_color' ); ?>!important">
                    <h3 class="pricing-cost"><span class="pricing-currencySign">$</span><?php the_sub_field( 'price' ); ?></h3>
                    <p class="pricing-description"> <?php the_sub_field( 'description' ); ?> </p>
                    <?php $subtext = get_sub_field('sub_text');
                    if ($subtext){ ?>
                    <p class="pricing-subText"> <?php echo $subtext;?> </p>
                  <?php } ?>
                  </div> <!-- /.price -->
                <?php endwhile; ?>
              <?php endif; ?>

              <?php if ( have_rows( 'cost_level_3' ) ) : ?>
              	<?php while ( have_rows( 'cost_level_3' ) ) : the_row(); ?>
                  <div class="pricing-level" style="color:<?php the_sub_field( 'text_color' ); ?>!important">
                    <h3 class="pricing-cost"><span class="pricing-currencySign">$</span><?php the_sub_field( 'price' ); ?></h3>
                    <p class="pricing-description"> <?php the_sub_field( 'description' ); ?> </p>
                    <?php $subtext = get_sub_field('sub_text');
                    if ($subtext){ ?>
                    <p class="pricing-subText"> <?php echo $subtext;?> </p>
                  <?php } ?>
                </div> <!-- /.price -->
              	<?php endwhile; ?>
              <?php endif; ?>

              <?php if ( have_rows( 'cost_level_4' ) ) : ?>
              	<?php while ( have_rows( 'cost_level_4' ) ) : the_row(); ?>

                  <div class="pricing-level" style="color:<?php the_sub_field( 'text_color' ); ?>!important">
                    <h3 class="pricing-cost">+ <span class="pricing-currencySign">$</span><?php the_sub_field( 'price' ); ?></h3>
                    <p class="pricing-description"> <?php the_sub_field( 'description' ); ?> </p>
                    <?php $subtext = get_sub_field('sub_text');
                    if ($subtext){ ?>
                    <p class="pricing-subText"> <?php echo $subtext;?> </p>
                  <?php } ?>
                  </div> <!-- /.price -->
              	<?php endwhile; ?>
              <?php endif; ?>
        </div> <!-- /.inner-wrap -->
    </section> <!-- /.pricing-section -->

    <!-- Speakers Block -->
    <section class="speakers-section">
      <?php if ($speakers_block_title) {?>
      <header>
        <h2><?php echo $speakers_block_title ?> </h2>
      </header>
      <?php } ?>
      <div class="container">
        <div class="inner-wrap">
              <?php if ( have_rows( 'speaker' ) ) : ?>
              	<?php while ( have_rows( 'speaker' ) ) : the_row(); ?>
                  <div class="speaker-content">
                    <div class="speaker-card">
                      <div class="container">
                        <div class="row">
                      		<?php $image = get_sub_field( 'image' ); ?>
                      		<?php if ( $image ) { ?>
                          <div class="speaker-img" style="background-image: url( <?php echo $image['url']; ?>"></div>
                  		      <?php } ?>
                          <div class="speaker-details">
                            <h4><?php the_sub_field( 'name' ); ?></h4>
                            <p><?php the_sub_field( 'title' ); ?></p><p><?php the_sub_field( 'company' ); ?></p>
                            <div class="speaker-social-link">
                              <a href="" style="background-image: url(<?php echo NGINXCONF_THEME_CDN_URI; ?>/assets/images/twitter_icon_128_grey.png)">twitter</a>
                              <a href="" style="background-image: url(<?php echo NGINXCONF_THEME_CDN_URI; ?>/assets/images/linkedin_icon_128_grey.png)">linkedin</a>
                            </div> <!-- /.speaker-social-link -->
                          </div> <!--/.speaker-details-->
                        </div> <!-- /.row -->
                      </div> <!-- /.container -->
                    </div> <!-- /.speaker-card -->
                  </div> <!-- /.speaker-content -->

              	<?php endwhile; ?>

              <?php else : ?>
              	<?php // no rows found ?>
              <?php endif; ?>

    <!--
                <h2 class="special-speaker-title">Special Guest</h2>
                <div class="conf17-single-speaker special-speaker">
                    <h3>Special Guest</h3>
                    <div class="speaker-img" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/Conf2018-The-Proxies-137x149.png);"></div>
                    <div class="speaker-details">
                        <h4>The Proxies</h4>
                        <span class="designation">Band<br>NGINX</span>
                        <div class="speaker-social-link">
                            <a href="" style="background-image: url(<?php echo NGINXCONF_THEME_CDN_URI; ?>/assets/images/twitter_icon_128_grey.png)">twitter</a>
                            <a href="" style="background-image: url(<?php echo NGINXCONF_THEME_CDN_URI; ?>/assets/images/linkedin_icon_128_grey.png)">linkedin</a>
                        </div>
                    </div>
                </div>
    -->
    <!--
            <a href="/nginxconf/2018/speakers/list" class="see-more-btn">see more speakers</a>
    -->
        </div>

    </div>

  </section> <!-- /.speakers-section-->


    <!-- Sponsors Block -->
    <section class="sponsors-section">
        <div class="inner-wrap">
          <div class="container">

            <header class="section-title">
              <h2><?php the_field( 'sponsors_block_title' ); ?></h2>
            </header>
            <?php /*<div class="headline-sponsore">
            <h2>Previous sponsors</h2>
            <div class="headline-sponsore">
                <h3>Headline Sponsor</h3>
                <img src="<?php echo get_template_directory_uri() ?>/assets/images/sponsors/Conf2018-logos-RedHat-268x86.svg" alt="">
            </div>
            <a href="#" class="navbar-single-button">sponsor us</a>
            */?>
            <div class="">
            <!--<h3 class='col'> Gold Sponsors</h3>-->
            </div>
            <div class="section-content">

                <?php if ( have_rows( 'sponsor_logo' ) ) : ?>
                	<?php while ( have_rows( 'sponsor_logo' ) ) : the_row(); ?>
                    <figure>
                		<?php $sponsor_logo = get_sub_field( 'sponsor_logo' ); ?>
                		<?php if ( $sponsor_logo ) { ?>
                			<img class="img-fluid" src="<?php echo $sponsor_logo['url']; ?>" alt="<?php echo $sponsor_logo['alt']; ?>" />
                		<?php } ?>
                		<?php the_sub_field( 'link_url' ); ?>
                  </figure>

                	<?php endwhile; ?>
                <?php else : ?>
                	<?php // no rows found ?>
                <?php endif; ?>
            </div> <!-- /.sponsors-content -->
          </div> <!-- /.container -->
        </div> <!-- /.inner-wrap -->
    </section>

    <!-- Social Block -->
    <section class="social-section">
        <div class="inner-wrap">
            <header>
              <h2><?php the_field( 'social_block_title' ); ?></h2>
            </header>
            <?php if ( have_rows( 'social_media_item' ) ) : ?>
            	<?php while ( have_rows( 'social_media_item' ) ) : the_row(); ?>
            		<?php $logo = get_sub_field( 'logo' ); ?>
            		<?php if ( $logo ) { ?>
                <figure>
                  <a href="<?php the_sub_field( 'url_link' ); ?>" target="_blank">
                    <img src="<?php echo $logo['url'];?>"/>
                  </a>
                </figure>
            		<?php } ?>
            	<?php endwhile; ?>
            <?php else : ?>
            	<?php // no rows found ?>
            <?php endif; ?>
        </div> <!-- /.inner-wrap -->
    </section>

    <!-- Video Block -->
    <section class="video-section">
        <div class="inner-wrap">
          <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" width="100%" height="340" src="<?php echo $video_block_URL; ?>" frameborder="0" allowfullscreen></iframe>
          </div>
        </div> <!-- /.inner-wrap -->
    </section>

    <!-- Schedule Block -->
    <section class="schedule-section">
      <div class="inner-wrap">
      <?php
      if ( $schedule_block_title ){
        ?>
        <header class="section-title">
          <h2><?php echo $schedule_block_title; ?></h2>
        </header>
      <?php
      }
      ?>
          <?php if ( have_rows( 'schedule_block' ) ): ?>
            <div class="section-content flex-column">
                <div class="col-auto">
                  <div class="row flex-column flex-lg-row justify-content-center">
          	<?php while ( have_rows( 'schedule_block' ) ) : the_row(); ?>
          		<?php if ( get_row_layout() == 'schedule_item' ) : ?>

                <div class="schedule-column">
          			<h3><?php the_sub_field( 'day_title' ); ?></h3>
          			<?php if ( have_rows( 'list_items' ) ) : ?>
                  <ul>
          				<?php while ( have_rows( 'list_items' ) ) : the_row(); ?>
                    <li> <?php the_sub_field( 'item' ); ?> </li>
          				<?php endwhile; ?>
                  </ul>
          			<?php else : ?>
          				<?php // no rows found ?>
          			<?php endif; ?>
              </div> <!-- /.schedule-column -->
          		<?php endif; ?>
          	<?php endwhile; ?>
          </div>
              </div>
          </div> <!-- /.section-content -->
          <?php else: ?>
          	<?php // no layouts found ?>
          <?php endif; ?>
        </div> <!-- /.inner-wrap -->
    </section>

    <!-- Twitter Feed Block -->
    <div class="review-section container-fluid">
        <section class="conf-18-review-block row">
                <div class="content-left">
                  <div class="review-content">
                    <div class="inner-content inner-content-left">
                  <?php if ( $twitter_feed_title ){?>
                    <h2><?php echo $twitter_feed_title; ?></h2>
                  <?php } ?>
                  <?php if ( $twitter_feed_URL ){?>
                    <a class="twitter-timeline" data-chrome="nofooter" data-width="100%" data-height="440" data-theme="light" href="<?php echo $twitter_feed_URL;?> "> </a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                  <?php } ?>
                </div> <!-- /.inner-content -->
              </div> <!-- /.review-content -->
            </div> <!-- /.content-left -->

  <!-- Video Highlights Feed Block -->
              <div class="content-right">
                <div class="review-content">
                  <div class="inner-content inner-content-right">
                    <?php if ( $video_highlights_block_title ) { ?>
                      <h2> <?php echo $video_highlights_block_title; ?> </h2>
                      <?php } ?>

                      <?php if ( have_rows( 'video' ) ) : ?>
                      	<?php while ( have_rows( 'video' ) ) : the_row(); ?>
                          <div class="highlight-videos">

                            <iframe width="100%" height="200" src="<?php the_sub_field( 'highlight_video_url' ); ?>" frameborder="0" allowfullscreen></iframe>
                      		<?php $highlight_video_link = get_sub_field( 'highlight_video_link' ); ?>
                      		<?php if ( $highlight_video_link ) { ?>
                            <h5><a href="<?php echo $highlight_video_link['url']; ?>" target="<?php echo $highlight_video_link['target']; ?>"><?php echo $highlight_video_link['title']; ?></a></h5>
                      		<?php } ?>
                        </div> <!-- /.highlight-videos -->
                      	<?php endwhile; ?>
                      <?php else : ?>
                      	<?php // no rows found ?>
                      <?php endif; ?>
                  </div> <!-- /.inner-content -->
                </div> <!-- /.review-content -->
              </div> <!-- /.content-right -->
      </section>
    </div> <!-- /.review-section -->
  </main>
</div> <!-- ./home-page-wrapper -->


    <?php get_footer(); ?>
