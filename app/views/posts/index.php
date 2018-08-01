<?php require APPROOT . '/views/inc/header.php';?>
  <?php flash('post_message');?>
<?php require APPROOT . '/views/inc/modal.php';?>
  <div class="row mb-5 ">
  </div>
<?php require APPROOT . '/views/inc/sidebar.php';?>

  <div class="col-lg-7 col-md-10 col-sm-12">
    <div id="titleContainer" class="d-none">
      <div class="row mb-3">
        <div class="col-md-3 d-none d-md-block mr-auto"><img src="" class="img-fluid rounded" alt="thumbnail-1" id="thumbnail"></div>
          <div class="col-md-9 d-none d-sm-block ml-auto mt-4 mb-auto pl-0" >
            <div class="container">
              <div class="row" id="mainTitle"></div>
              <div class="row" id="subTitle"></div>
            </div>
          </div>
      </div>
    </div>
  <div id="postContainer" class="">
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
  </div>
  </div>
  <?php require APPROOT . '/views/inc/rightsidebar.php';?>
  </div>
<?php require APPROOT . '/views/inc/footer.php';?>