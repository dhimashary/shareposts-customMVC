
  <?php foreach ($data['posts'] as $post): ?>
    <div class="card card-body mb-3" >
      <h4 class="card-title"><?php echo $post->title; ?></h4>
      <div class="bg-light p-2 mb-3">
        Written by <strong class="showuser"><?php echo $post->name; ?></strong> on <?php echo $post->postCreated; ?>
      </div>
      <img src="<?php echo URLROOT . "/public/img/" . $post->images; ?>"  class="img-fluid mb-2" alt="Responsive image">
      <div class="btn btn-dark" id="<?php echo $post->postId; ?>">More</div>
    </div>
  <?php endforeach;?>
