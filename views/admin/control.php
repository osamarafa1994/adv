<?php
if (!isset($_SESSION['logged_in'])) {
  header("location:http://localhost/ads/Adverts/show_adverts");
}
  $result = $data['adverts'];
?>

<div class="card bg-secondary mb-3" style="max-width: 50rem;margin:20px;">
  <div class="card-header">Advertisements</div>
  <div class="card-body">
    <a href="<?= BASE_URL ?>ads/Adverts/addADV/<?= $_SESSION['logged_in']  ?>" class="btn btn-info"> Add </a>
    <hr>
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Description</th>
          <th scope="col">Control</th>
        </tr>
      </thead>
      <tbody>
        <?php if ($result->num_rows >0): ?>
          <?php while($row = $result->fetch_assoc()): ?>
        <tr class="table-light">
          <td><?= $row['id'] ?></td>
          <td><?= $row['descr_ad'] ?></td>
          <td>
            <a href="<?= BASE_URL ?>ads/Adverts/editADV/<?= $row['id'] ?>/<?= $_SESSION['logged_in'] ?>" class="btn btn-success"> Edit </a>
            <a href="<?= BASE_URL ?>ads/Adverts/deleteADV/<?= $row['id'] ?>" class="btn btn-primary">Delete</a>
          </td>
        </tr>
          <?php endwhile; ?>
      <?php else:?>
        <tr class="table-light"><td colspan="3">NO Advertisements in Dataase</td><tr>
      <?php endif; ?>
      </tbody>
    </table>
  </div>
</div>
