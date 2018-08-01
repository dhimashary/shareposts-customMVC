
<a href="<?php echo URLROOT; ?>/posts" class="btn btn-light"><i class="fa fa-backward"></i> Back</a>
<br>
<h1><?php echo $data['post']->title; ?></h1>
<div class="bg-secondary text-white p-2 mb-3">
  Written by <strong class="showuser"><?php echo $data['user']->name; ?></strong> on <?php echo $data['post']->created_at; ?>
</div>
<p><?php echo $data['post']->body; ?></p>
<div class="card card-body mb-3 border-0 p-0" >
    <img src="<?php echo URLROOT . "/public/img/" . $data['post']->images; ?>"  class="img-fluid mb-2" alt="Responsive image">
</div>
<?php
if (!empty($_SESSION['user_id'])) {?>
<?php if ($data['post']->user_id == $_SESSION['user_id']): ?>
  <hr>
  <a href="<?php echo URLROOT; ?>/posts/edit/<?php echo $data['post']->id; ?>" class="btn btn-dark mb-3">Edit</a>

  <form class="pull-right" action="<?php echo URLROOT; ?>/posts/delete/<?php echo $data['post']->id; ?>" method="post">
    <input type="submit" value="Delete" class="btn btn-danger mb-3">
  </form>
<?php endif;?>
<div class="row pr-2">
	<div class="col-2  d-none d-sm-block  mt-1">
		<img src="<?php echo URLROOT . "/public/img/" . $data['currentUser']->avatar; ?>" alt="userico" class="img-fluid rounded">
	</div>
	<div class="col-1  d-block d-sm-none mt-1 pr-0">
	</div>
	<div class="col-10 col-xs-12 border pl-0 pr-0">
		<div class="form-group mt-1">
		<form action="<?php echo URLROOT; ?>/posts/addComment" method="post">
		<input type="hidden" class="d-none" name="post_id" value="<?php echo $data['post']->id; ?>">
	    <textarea name="content" class="form-control border-0" rows="1" id="comment" placeholder="Type your comment here..." required></textarea>
	    <button id="addComment" class="btn btn-success pull-right btn-sm mt-1 mr-1 mb-1 " type="submit" value="submit" onclick="return false;">post</button>
		</form>
	</div>
	</div>
</div>
<?php }?>
	<div id ="result">
  </div>
<?php foreach ($data['comments'] as $comment): ?>
    <div class="row border-bottom mt-2" >
      <div class="col-1 p-0">
      	<img src="<?php echo URLROOT . "/public/img/" . $comment->avatar; ?>" alt="userico" class="img-fluid rounded-circle commentavatar mb-2">
      </div>
      <div class="col-11">
      	<strong class="pb-1 usercomment"><a class="showuser"><?php echo $comment->name; ?></a></strong>
      	<p><?php echo $comment->content; ?></p>
      </div>
    </div>
  <?php endforeach;?>

<?php require APPROOT . '/views/inc/footer.php';?>