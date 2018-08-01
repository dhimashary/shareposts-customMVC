<div id="accountContainer" >
      <div class="row mb-3">
        <div class="col-3  mr-auto"><img src="<?php echo URLROOT . "/public/img/" . $data['user']->avatar; ?>" class="img-fluid rounded" alt="thumbnail-1" id="thumbnail"></div>
          <div class="col-9  ml-auto mt-4 mb-auto pl-0" >
            <div class="container">
              <div class="row" id="mainTitle"><?php echo $data['user']->name; ?></div>
              <div class="row" id="subTitle">My Posts Collection</div>
            </div>
          </div>
      </div>
    </div>
<div id="postContainer" class="">
  <?php foreach ($data['posts'] as $post): ?>
    <div class="card card-body mb-3" >
      <h4 class="card-title"><?php echo $post->title; ?></h4>
      <div class="bg-light p-2 mb-3">
        Written by <?php echo $post->name; ?> on <?php echo $post->postCreated; ?>
      </div>
      <img src="<?php echo URLROOT . "/public/img/" . $post->images; ?>"  class="img-fluid mb-2" alt="Responsive image">
      <div class="btn btn-dark" id="<?php echo $post->postId; ?>">More</div>
    </div>
  <?php endforeach;?>
  </div>
  <?php require APPROOT . '/views/inc/footer.php';?>