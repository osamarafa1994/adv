<?php
//Reading from Database back
$result= $data['adverts'];
?>
<div class="row">

  <?php if ($result->num_rows > 0): ?>
    <?php while($row = $result->fetch_assoc()): ?>
        <div class="col-md-3" style="margin:30px;">
          <div class="card text-white bg-info mb-3" style=" max-width: 20rem;margin:10px;">
          <div class="card-body">
            <a href="show_one/<?= $row['id'] ?>" class="alert-link"><img style="height: 200px; width: 100%;" src="../uploads/<?= $row['image_n'] ?>"></a>
          </div>
          <div class="card-header" style="text-align:center"><?= $row['descr_ad'] ?></div>
        </div>
        </div>
      <?php endwhile; ?>
  <?php endif; ?>
</div>
