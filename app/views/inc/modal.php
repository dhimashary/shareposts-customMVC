      <div class="modal fade" id="addPost" tabindex="-1" role="dialog" >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" >Upload a Post</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form  action="<?php echo URLROOT; ?>/posts/add" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label for="title">Title <sup>*</sup></label>
                <input type="text" name="title" class="form-control form-control-lg" required >
              </div>
              <div class="form-group">
                <label for="title">Image <sup>*</sup></label>
                <input type="file" name="image" class="form-control form-control-lg" required >
              </div>
              <div class="form-group">
                <label for="body">Description <sup>*</sup></label>
                <input type="text" name="body" class="form-control form-control-lg" required>
                <span class="invalid-feedback"><?php echo $data['body_err']; ?></span>
              </div>
              <div class="form-group">
                <label for="body">Section : </label>
              <select name="section">
                <option value="Animals">Animals</option>
                <option value="Anime">Anime</option>
                <option value="Cars">Cars</option>
                <option value="Cosplay">Cosplay</option>
                <option value="Movies">Movies</option>
                <option value="Sports">Sports</option>
                <option value="Gadgets">Gadgets</option>
                <option value="Games">Games</option>
                <option value="Footballs">Footballs</option>
              </select>
              </div>
                <div class="row">
                <div class="col">
                  <input type="submit" value="SUBMIT" class="btn btn-success btn-block mt-3">
                </div>
              </div>
          </form>
          </div>
        </div>
      </div>
    </div>