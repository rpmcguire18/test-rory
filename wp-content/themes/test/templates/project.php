<?php $hero = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); ?>

<a href="<?=get_the_permalink()?>" class="column">
  <div class="project-panel" style="background: url('<?php echo $hero['0'];?>') center top no-repeat; background-size: cover;">
    <div class="project-panel-inner" >
      <h2><?=the_title()?></h2>
    </div>
  </div>
</a>
