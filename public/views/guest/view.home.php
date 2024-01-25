<?php
require_once 'partials/head_partials.php';
?>

 <title><?=SITE_TITLE?></title>
  </head>
  <body>
    <?php
require_once 'partials/nav_partials.php';?>

<div class="container">
  <div class="row" style="padding-top:50px;">
    <div class="col-md-8">
      <?php foreach($res as $post): ?>
     <div class="card mb-3">
      <img class="card-img-top" src="<?=$post->img?>" alt="">
      <div class="card-body">
        <h4 class="card-title"><?=$post->title?></h4>
        <p class="card-text">
         <?=$post->body?>
       
        </p>
      </div>
     </div>
     <?php endforeach;?>
    </div>
  </div>
</div>


<?php
require_once 'partials/footer_partials.php';
