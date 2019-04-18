<?php include "part_head.php"; ?>

<?php include "part_nav.php"; ?>

<main role="main" class="container">

    <h3>List Film yang Tersedia <a href="<?=$baseUrl?>/add-film" class="btn btn-primary">Tambah Baru</a></h3> 

    <table class="table">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Tahun</th>
                <th>Bahasa</th>
                <th>Harga Sewa</th>
                <th>Rating</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($films as $film): ?>
            <tr>
                <td>
                    <a href="<?=$baseUrl?>/film/<?=$film['film_id']?>"><?=$film['title']?></a>
                </td>
                <td><?=$film['release_year']?></td>
                <td><?=$film['name']?></td>
                <td><?=$film['rental_rate']?></td>
                <td><?=$film['rating']?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    </main>

<?php include "part_foot.php"; ?>