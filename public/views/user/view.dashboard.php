<?php
require_once 'partials/user_head_partials.php';
?>

 <title><?=SITE_TITLE?></title>
  </head>
  <body style="overflow:hidden;">
  
<div class="row position-relative">
      <div class='col-md-2'>
        <?php require_once 'partials/user_sidebar_partials.php';?>

      </div>

      <div class="col-md-10">
         <div class="jumbotron">
        <h1 class="display-5">Bob Joe Gossip Lounge</h1>

      


        <p class="lead">Welcome <?=Session::get('current_user')->username?></p>
        <hr class="my-2">
        <p>More info</p>
        <p class="lead">
            <form action="" method="post">
                <input type="hidden" name="logout">
                 <a href="logout" class="btn btn-danger btn-lg" href="Jumbo action link" role="button">Logout</a>
            </form>

        </p>

      
    </div>
      </div>


</div>




<?php
require_once 'partials/user_footer_partials.php';
