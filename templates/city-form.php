<?php
include "_header.php";
include "_nav.php";
?>

<div class="container-fluid">
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="<?=$baseUrl?>/city">Kota</a> 
    </li>
    <li class="breadcrumb-item">
      <?php if(@$city): ?>
      Edit Kota
      <?php else: ?>
      Tambah Kota
      <?php endif; ?>
    </li>
  </ol>

  <form action="" method="post">
  <table style="width: 90%;">
    <tr>
        <th style="width: 200px;">Nama Kota</th>
        <td>
            <input type="text" name="city" value="<?=@$city['city']?>" class="form-control">
        </td>
    </tr>
    <tr>
        <th>Negara</th>
        <td>
            <select name="country_id" id="" class="form-control">
                <?php foreach ($countries as $data) :?>
                <option value="<?=$data['country_id']?>" 
                    <?php if ($data['country_id'] == @$city['country_id']){ echo "selected";} ?>>
                    <?=$data['country']?>
                </option>
                <?php endforeach; ?>
            </select>
        </td>
    </tr>
    <tr>
        <th>&nbsp;</th>
        <td>
            <input type="submit" value="Simpan Data" class="btn btn-primary">
        </td>
    </tr>
  </table>
  </form>
</div>

<?php
include "_footer.php";