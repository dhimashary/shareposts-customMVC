
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <div class="container p-0">
      <a class="navbar-brand" href="<?php echo URLROOT; ?>"><?php echo SITENAME; ?></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbars">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>" >Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" id="about"> About</a>
          </li>
        </ul>

        <ul class="navbar-nav ml-auto">
          <?php if (isset($_SESSION['user_id'])): ?>
          <li class="nav-item mt-auto"><button type="button" class="btn btn-primary btn-sm " data-toggle="modal"
            data-target="#addPost"><i class="fa fa-pencil"></i> Add Post</button>
          </li>
          <li class="nav-item d-none d-sm-block ml-2 mt-auto">
              <img src="<?php echo URLROOT . "/public/img/" . $data['user']->avatar; ?>" alt="usericon" class="rounded-circle img-fluid userico">
            </li>
          <li class="nav-item">
              <a class="nav-link" href="#" id="user-btn"><?php echo $_SESSION['user_name']; ?></a>
            </li>
          <li class="nav-item">
              <a class="nav-link" href="<?php echo URLROOT; ?>/users/logout">Logout</a>
            </li>
          <?php else: ?>
            <li class="nav-item" >
              <a class="nav-link"  href="<?php echo URLROOT; ?>/users/register">Register</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo URLROOT; ?>/users/login">Login</a>
            </li>
          <?php endif;?>
        </ul>
      </div>
    </div>
  </nav>