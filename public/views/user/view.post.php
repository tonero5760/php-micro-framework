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

      <div class="col-md-6 offset-md-2">
          <?php if (Session::exist('success')): ?>
              <?php
$FLASH_SUCCESS = Session::get('success');
Session::pull('success');
?>
                   <div class="alert alert-success" role="alert">
                <?=$FLASH_SUCCESS?>
                   </div>

        <?php endif;?>

          <form method="POST" action="" enctype="multipart/form-data">
               <legend class="text-center">Create New Post</legend>
                <input type="hidden" name="new_post">

               <div class="form-group">
              <label for="">Title</label>
              <input type="text"
                class="form-control" name="title" id="" aria-describedby="helpId" placeholder="">
               <?php if (isset($_GET['title'])): ?>
                 <small id="helpId" class="form-text text-danger"><?=$_GET['title']?></small>
              <?php endif;?>
               <?php if (Session::exist('title')): ?>
                 <small id="helpId" class="form-text text-danger"><?=Session::get('title')?></small>
              <?php endif;?>
            </div>

               <div class="form-group">
              <label for="">Category</label>
                <div class="form-group">
                <select class="form-control" id="sel1" name="category">
                    <option value="gossip">Gossip</option>
                    <option value="celebrity">Celebrity</option>
                    <option value="news">News</option>
                    <option value="sport">Sports</option>
                </select>
                </div>
            
            </div>

            <div class="form-group">
            <!-- <label for="comment">Comment:</label> -->
            <textarea class="form-control" rows="5" id="comment" name="comment" placeholder="Post body"></textarea>
             <?php if (Session::exist('file')): ?>
                 <small id="helpId" class="form-text text-danger"><?=Session::get('file')?></small>
              <?php endif;?>
            </div>

             <div class="form-group">
                 <input type="file" name="file" class="form-control-file border">
             </div>
           



            <button type="submit" class="btn btn-primary">New Post</button>
          </form>
      </div>

     


</div>




<?php
require_once 'partials/user_footer_partials.php';
