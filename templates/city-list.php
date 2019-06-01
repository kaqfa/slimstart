<?php
include "_header.php";
include "_nav.php";
?>

<div class="container-fluid">
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      City
    </li>
  </ol>

  <h1>List Kota</h1>
  <hr>
  
  <a href="<?=$baseUrl?>/city/add" class="btn btn-primary">Tambah Data Kota</a>
  <br><br>

  <?php if (isset($_SESSION['msg'])) : ?>
  <div class="alert alert-success alert-dismissible fade show" role="success">
    <?=$_SESSION['msg']?>  
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <?php unset($_SESSION['msg']); endif; ?>

  <table class="table table-bordered table-striped">
      <tr>
          <th>No.</th>
          <th>Kota</th>
          <th>Negara</th>
          <th>Aksi</th>
      </tr>
      <?php $no = 1; foreach($cities as $city): ?>
      <tr>
          <td><?=$no++?></td>
          <td><?=$city['city']?></td>
          <td><?=$city['country']?></td>
          <td>
            <a href="<?=$baseUrl?>/city/edit/<?=$city['city_id']?>">[Edit]</a>
            <a href="<?=$baseUrl?>/city/del/<?=$city['city_id']?>">[Del]</a>
          </td>
      </tr>
      <?php endforeach; ?>
  </table>

</div>

<?php
include "_footer.php";