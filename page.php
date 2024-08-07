<?php
  get_header();
  ?>
  <div class="header_back">
    <div class="section-header">
      <h1><?php the_title();?></h1>
    </div>
  </div>
  <?php
  if( is_page("About Us") ){ // About Page
    while(have_posts()){
      the_post();?>
      <div class="generic_content wrapper">
      <?php the_content();?>
      </div>
    <?php
    }
  }else if( is_page("Contact Us") ){ //Contact Page
    while(have_posts()){
      the_post();?>
      <div class="generic_content wrapper contact_page">
        <div class="container">
          <div class="row">
            <div class="col-lg-5">
              <?php the_content();?>
            </div>
            <div class="col-lg-7">
              <div class="google_map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d2939.951429089848!2d78.76573685373056!3d28.80278071155048!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x10ca233667ff48b3!2sRams+International!5e0!3m2!1sen!2sin!4v1551862707272" width="100%" height="100%" frameborder="0" style="border:0"></iframe>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php }
  }else{  // all Pages
    $args = array(
      'post_type' => 'post' ,
      'orderby' => 'date' ,
      'order' => 'DESC' ,
      'posts_per_page' => -1,
      'category_name'=> $_GET['category_name'],
      'paged' => get_query_var('paged'),
      'post_parent' => $parent
    ); 
    $query = new WP_Query($args);?>

<div class="gallery">
  <div class="gallery__wrapper">
    <div class="container text-center">
      <div class="row">
      
        <?php
          $count=1;
          while($query->have_posts()){
            $query->the_post();
            include '_POST.php';
            if ($count == 4){
              echo "</div>";
              echo '<div class="row">';
            }
            $count++;
          }
          wp_reset_query();
        ?>

      </div>
    </div>
  </div>
</div>
<?php
  }
  get_footer();
?>