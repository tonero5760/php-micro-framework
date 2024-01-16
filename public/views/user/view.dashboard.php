<?php
require_once 'partials/user_head_partials.php';
?>

 <title><?=SITE_TITLE?></title>
  </head>
  <body>
    <?php require_once 'partials/user_sidebar_partials.php';
  ?>

   <div class="jumbotron">
        <h1 class="display-5">Bob Joe Gossip Lounge</h1>
       
        <p class="lead">Welcome <?=Session::get('current_user')[0]['username']?></p>
        <hr class="my-2">
        <p>More info</p>
        <p class="lead">
            <form action="" method="post">
                <input type="hidden" name="logout">
                 <button type="submit" class="btn btn-danger btn-lg" href="Jumbo action link" role="button">Logout</button>
            </form>
           
        </p>
    </div>




<?php
require_once 'partials/user_footer_partials.php';
