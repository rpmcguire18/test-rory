<?php if (have_rows('flexible_fields')): ?>
  <div class="flexible-layout-wrapper">
    <?php
      while (have_rows('flexible_fields')):
      the_row();
      $slug = str_replace('_', '-', get_row_layout());
    ?>

      <div class="flexible-layout <?=$slug?>">
        <div class="container">
          <div class="row">
            <?php include 'modules/' . $slug . '.php'; ?>
          </div>
        </div>
      </div>

    <?php endwhile; ?>
  </div><!-- /flexible-layout-wrapper -->
<?php endif; ?>
