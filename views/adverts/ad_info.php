<?php
$coumments = $data['comments'];
$ad = $data['advert'];
 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Advertisement</title>
   </head>
   <body>
             <div class="card text-white bg-info mb-3" id="adv" style="width: 20rem;">
               <div class="card-body">
                 <img style="height: 200px; width: 100%; display: inline;" src="<?= BASE_URL ?>ads/uploads/<?= $ad['image_n'] ?>">
               </div>
               <h3 class="cardsd-header" style="text-align:center; margin:20px;"><?= $ad['descr_ad'] ?></h3>
             </div>
             <h4 id="com">Comments</h4>
             <div class="df">
               <?php if (($coumments) && (count($coumments) > 0)):?>
                 <?php foreach($coumments as $row):?>

               <div class="card border-success mb-3" style="width: 30rem;">
                <div class="card-header"> <?= substr($row['user']['username'],0,5) ?><span style="padding-left: 260px;"><?= $row['created_at'] ?></span></div>
                <div class="card-body">
                  <p class="card-text" style="text-align:center;"><?= $row['body'] ?></p>
                  <?php if (isset($_SESSION['user_id'])): ?>
                  <?php if (isset($_SESSION['logged_in']) || ($row['user_id'] === $_SESSION['user_id'])): ?>
                  <a class="btn btn-primary" href="<?= BASE_URL ?>ads/Adverts/deleteCOM/<?= $row['com_id'] ?>">Delete</a>
                <?php endif; ?>
                <?php endif; ?>
                </div>
              </div>
            <?php endforeach; ?>
              <?php endif; ?>
              <div class="ad">
                <div class="card text-white bg-success mb-3" style="width: 30rem;" id="ad">
                 <div class="card-body">
                   <div class="form-group">
                     <?php if (!isset($_SESSION['user_id'])): ?>
                      <a href="<?= BASE_URL ?>ads/Adverts/register" class="btn btn-info" style="margin-bottom:20px;margin-left:100px;">Register now to put Comments</a>
                      <?php endif; ?>
                      <?php if (isset($_SESSION['user_id'])): ?>
                      <form class="" action="<?= BASE_URL ?>ads/Adverts/createCOM/<?= $ad['id'] ?>/<?= $_SESSION['user_id'] ?>" method="post">
                        <textarea class="form-control" name="com_body" rows="3" placeholder="Enter You Comment"></textarea>
                        <button type="submit" class="btn btn-secondary" style="margin-top:20px;margin-left:170px;">Comment</button>
                      </form>
                      <?php endif; ?>
                    </div>
                 </div>
               </div>
              </div>
             </div>
