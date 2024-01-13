<?php
require_once 'partials/head_partials.php';
?>

 <title><?=SITE_TITLE?></title>
  </head>
  <body>
 <div class="container-fluid relative" style="background:url(./img/bg.jpeg); background-repeat:no-repeat; background-size:cover;background-position:center; height:100vh">

      <div class="row">
         <div class="col-md-4 offset-md-2 card px-2 py-3 mt-4 shadow-md absolute top-3">
            <div style="display:flex;justify-content:center;align-items:center;margin-bottom:30px;"><img src="<?=ROOT?>assets/img/logo.jpeg" alt="logo" style="border-radius:50%; width:20%;"></div>
          <form action="" method="post">
            <legend class="text-center"><?=$pageTitle?></legend>
            <div class="form-group">
              <label for="">Username</label>
              <input type="text"
                class="form-control" name="username" id="" aria-describedby="helpId" placeholder="">

              <?php if (isset($_GET['username'])): ?>
                 <small id="helpId" class="form-text text-danger"><?=$_GET['username']?></small>
              <?php endif;?>
               <?php if (Session::exist('username')): ?>
                 <small id="helpId" class="form-text text-danger"><?=$_SESSION['username']?></small>
              <?php endif;?>

            </div>

               <div class="form-group">
              <label for="">Email</label>
              <input type="email"
                class="form-control" name="email" id="" aria-describedby="helpId" placeholder="">
              <?php if (isset($_GET['email'])): ?>
                 <small id="helpId" class="form-text text-danger"><?=$_GET['email']?></small>
              <?php endif;?>
               <?php if (Session::exist('email')): ?>
                 <small id="helpId" class="form-text text-danger"><?=$_SESSION['email']?></small>
              <?php endif;?>
            </div>

               <div class="form-group">
              <label for="">Password</label>;
              <input type="password"
                class="form-control" name="password" id="" aria-describedby="helpId" placeholder="">
             <?php if (isset($_GET['password'])): ?>
                 <small id="helpId" class="form-text text-danger"><?=$_GET['password']?></small>
              <?php endif;?>
               <?php if (Session::exist('password')): ?>
                 <small id="helpId" class="form-text text-danger"><?=$_SESSION['password']?></small>
              <?php endif;?>
            </div>

               <div class="form-group">
              <label for="">Confirm</label>
              <input type="password"
                class="form-control" name="confirm" id="" aria-describedby="helpId" placeholder="">
              <small id="helpId" class="form-text text-muted">Help text</small>
               <?php if (Session::exist('confirm')): ?>
                 <small id="helpId" class="form-text text-danger"><?=$_SESSION['confirm']?></small>
              <?php endif;?>
            </div>

            <div class="form-group">

                <input type="hidden" class="form-control" name="register" id="inputName" placeholder="">
            </div>

            <button type="submit" class="btn btn-primary">Sign up</button>
          </form>

          <p>
            Already have an account? <a href="login">Login</a>
          </p>
         </div>
      </div>
    </div>



<?php
require_once 'partials/footer_partials.php';
