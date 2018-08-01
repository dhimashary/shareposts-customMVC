
<div class="row border-bottom mt-2" >
      <div class="col-1 p-0">
        <img src="<?php echo URLROOT . "/public/img/" . $data['avatar']; ?>" alt="userico" class="img-fluid rounded-circle commentavatar mb-2">
      </div>
      <div class="col-11">
        <strong class="pb-1 usercomment"><a class="showuser"><?php echo $data['name']; ?></a></strong>
        <p><?php echo $data['content']; ?></p>
      </div>
    </div>
