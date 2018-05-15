<?php
$ad = $data['advert'];
 ?>
<div class="card bg-secondary mb-3" style="max-width: 30rem;" id="adv">
 <h3 class="card-header">Add Advertisement</h3>
 <div class="card-body">
   <div class="alert alert-dismissible alert-danger">
     <form action="<?= BASE_URL ?>ads/Adverts/updateADV/<?= $ad['id'] ?>" method="post" enctype="multipart/form-data">
       <div class="form-group">
        <label for="desc"></label>
        <textarea type="text" class="form-control" id="desc" name="desc" placeholder="Enter Description for AD" rows="3" value="<?= $ad['descr_ad'] ?>"></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Save</button>
     </form>
   </div>
 </div>
</div>
