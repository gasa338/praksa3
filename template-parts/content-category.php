<div class="col-6 col-md-3 box-fade">
<a href="<?php echo get_permalink() ?>">
    <div class="box">
        <img src="<?php echo get_the_post_thumbnail_url( get_the_id(), 'full' ); ?>">
    </div>
    <p><?php echo the_title(); ?></p>
</a>
</div>