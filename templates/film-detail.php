<?php include "part_head.php"; ?>

<?php include "part_nav.php"; ?>

<main role="main" class="container">

    <h3>Detail Film</h3>

    <hr>
    <a href="<?=$baseUrl?>/films" class="btn btn-success">List Film</a>
    <a href="<?=$baseUrl?>/add-film" class="btn btn-primary">Tambah Baru</a>
    <a href="<?=$baseUrl?>/edit-film/<?=$film['film_id']?>"  class="btn btn-warning">Edit Film</a>
    <a href="<?=$baseUrl?>/del-film/<?=$film['film_id']?>"  class="btn btn-danger">Hapus Film</a>
    <hr>

    <table class="table table-bordered">
        <tr>
            <th>Judul Film</th>
            <td colspan="7"><?=$film['title']?></td>
        </tr>
        <tr>
            <th>Deskripsi</th>
            <td colspan="7"><?=$film['description']?></td>
        </tr>
        <tr>
            <th>Tahun Rilis</th>
            <td><?=$film['release_year']?></td>
            <th>Durasi Pinjam</th>
            <td><?=$film['rental_duration']?></td>
            <th>Harga Sewa</th>
            <td>$ <?=$film['rental_rate']?></td>
            <th>Rating</th>
            <td><?=$film['rating']?></td>
        </tr>
    </table>    
    </main>

<?php include "part_foot.php"; ?>