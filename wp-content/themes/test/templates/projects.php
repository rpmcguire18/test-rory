<?php
$args = array(
  'post_type'       => 'project',
  'posts_per_page'  => 3,
  'order'           => 'ASC'
);
$projects = new WP_Query($args);
if ($projects->have_posts()): ?>
  <section class="project-wrap">
    <div class="container">
      <div class="row">

        <?php
        while ($projects->have_posts($projects)) {
          $projects->the_post();

          // Include individual project markup
          include 'project.php';

        }
        wp_reset_query();
        ?>

      </div>
    </div>
  </section>
<?php endif; ?>
