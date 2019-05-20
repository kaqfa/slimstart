<?php include "part_head.php"; ?>

<?php include "part_nav.php"; ?>

<main role="main" class="container">

    <h3>List Data Customer <a href="<?=$baseUrl?>/add-cust" class="btn btn-primary">Tambah</a></h3> 

    <table class="table">
        <thead>
            <tr>
                <th>No. Toko</th>
                <th>Nama Lengkap</th>
                <th>Email</th>
                <th>Alamat</th>
                <th>Aktif</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td> 1 </td>
                <td>Nama Depan Belakang</td>
                <td>email@email.com</td>
                <td>Alamat lengkap</td>
                <td>Aktif / Non Aktif</td>
                <td>
                    <a href="<?=$baseUrl?>/del-cust/1" class="btn btn-small btn-danger">Hapus</a>
                </td>
            </tr>
        </tbody>
    </table>

    </main>

<?php include "part_foot.php"; ?>