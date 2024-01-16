<?php
require_once 'partials/head_partials.php';
?>

 <title><?=SITE_TITLE?></title>
  </head>
  <body>
    <div class="container">
           <div class="container-fluid relative" style="background:url(./img/bg.jpeg); background-repeat:no-repeat; background-size:cover;background-position:center; height:100vh">

      <div class="row">
         <div class="col-md-4 offset-md-2 card px-2 py-3 mt-4 shadow-md absolute top-3">

          <?php if (Session::exist('success')): ?>
              <?php $FLASH_SUCCESS = Session::get('success');
Session::pull('success');?>
                   <div class="alert alert-success" role="alert">
                <?=$FLASH_SUCCESS?>
                   </div>
                <?php ?>
            <?php endif;?>

              <?php if (Session::exist('fail')): ?>
                   <div class="alert alert-danger" role="alert">
                     <?php $FLASH_FAIL = Session::get('fail');
Session::pull('fail');?>
                <?=$FLASH_FAIL?>
                   </div>
                <?php ?>
            <?php endif;?>

              <?php if (isset($_GET['success'])): ?>
                   <div class="alert alert-<?php echo isset($_GET['success']) ? 'success' : '' ?>" role="alert">
                <?=$_GET['success']?>
                   </div>
                <?php ?>
            <?php endif;?>

              <?php if (isset($_GET['danger'])): ?>
                   <div class="alert alert-<?php echo isset($_GET['danger']) ? 'danger' : '' ?>" role="alert">
                <?=$_GET['danger']?>
                   </div>
                <?php ?>
            <?php endif;?>

            <div style="display:flex;justify-content:center;align-items:center;margin-bottom:30px;"><img src="<?=ROOT?>assets/img/logo.jpeg" alt="logo" style="border-radius:50%; width:20%;"></div>
          <form method="POST">
               <legend class="text-center"><?=$pageTitle?></legend>
                <input type="hidden" name="login">

               <div class="form-group">
              <label for="">Email</label>
              <input type="email"
                class="form-control" name="email" id="" aria-describedby="helpId" placeholder="">
               <?php if (isset($_GET['email'])): ?>
                 <small id="helpId" class="form-text text-danger"><?=$_GET['email']?></small>
              <?php endif;?>
               <?php if (Session::exist('email')): ?>
                 <small id="helpId" class="form-text text-danger"><?=Session::get('email')?></small>
              <?php endif;?>
            </div>

               <div class="form-group">
              <label for="">Password</label>
              <input type="text"
                class="form-control" name="password" id="" aria-describedby="helpId" placeholder="">
             <?php if (isset($_GET['password'])): ?>
                 <small id="helpId" class="form-text text-danger"><?=$_GET['password']?></small>
              <?php endif;?>
               <?php if (Session::exist('password')): ?>
                 <small id="helpId" class="form-text text-danger"><?=Session::get('password')?></small>
              <?php endif;?>
            </div>



            <button type="submit" class="btn btn-primary">Login</button>
          </form>
          <p>
            Don't have an account? <a href="register">Register</a>
          </p>
         </div>
      </div>
    </div>
    </div>




<?php
require_once 'partials/footer_partials.php';
