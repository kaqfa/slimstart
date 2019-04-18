<?php include "part_head.php"; ?>

<?php include "part_nav.php"; ?>

<main role="main" class="container">

    <h3>Form Film</h3>
    <form action="" method="post">
    <table class="table table-bordered">
        <tr>
            <th>Judul Film</th>
            <td> <input type="text" class="form-control" name="title" value="<?=@$film['title']?>"> </td>
        </tr>
        <tr>
            <th>Deskripsi</th>
            <td> <textarea name="desc" id="" class="form-control"><?=@$film['description']?></textarea> </td>
        </tr>
        <tr>
            <th>Tahun</th>
            <td> <input type="text" class="form-control" name="year" value="<?=@$film['release_year']?>"> </td>
        </tr>
        <tr>
            <th>Bahasa</th>
            <td> 
            <select class="form-control" name="lang" id="">
                <?php foreach($langs as $lang){ ?>
                <option value="<?=$lang['language_id']?>" 
                    <?=($lang['language_id'] == @$film['language_id'] ? "selected" : "")?>><?=$lang['name']?></option>
                <?php } ?>
            </select> 
            </td>
        </tr>
        <tr>
            <th>Durasi Pinjam</th>
            <td> <input type="text" class="form-control" name="duration" value="<?=@$film['rental_duration']?>"> </td>
        </tr>
        <tr>
            <th>Harga Sewa</th>
            <td> <input type="text" class="form-control" name="rate" value="<?=@$film['rental_rate']?>"> </td>
        </tr>
        <tr>
            <th>Durasi Film</th>
            <td> <input type="text" class="form-control" name="length" value="<?=@$film['length']?>"> </td>
        </tr>
        <tr>
            <th>Harga Penggantian</th>
            <td> <input type="text" class="form-control" name="rep_cost" value="<?=@$film['replacement_cost']?>"> </td>
        </tr>
        <tr>
            <th>Rating</th>
            <td> <select name="rating" id="" class="form-control">
                <?php foreach($rating as $rate){?>
                <option value="<?=$rate?>" <?=($rate == @$film['rating'] ? "selected" : "")?>><?=$rate?></option>
                <?php } ?>
            </select></td>
        </tr>
        <tr>
            <th>Fitur-fitur</th>
            <td> <select name="features" class="form-control">
                <?php foreach($features as $feature){?>
                <option value="<?=$feature?>" <?=($feature == @$film['special_features'] ? "selected" : "")?>><?=$feature?></option>
                <?php } ?>
            </select> </td>
        </tr>
        <tr>
            <th>&nbsp;</th>
            <td> <input type="submit" class="btn btn-primary" name="save" value="Simpan"> </td>
        </tr>
    </table>    
    </form>
    </main>

<?php include "part_foot.php"; ?>