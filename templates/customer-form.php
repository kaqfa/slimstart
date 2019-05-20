<?php include "part_head.php"; ?>

<?php include "part_nav.php"; ?>

<main role="main" class="container">

    <h3>Form Film</h3>
    <form action="" method="post">
    <table class="table table-bordered">
        <tr>
            <th>No. Toko</th>
            <td> 
            <select class="form-control" name="store_id" id="">
                <option value="1">1</option>
                <option value="2">2</option>
            </select> 
            </td>
        </tr>
        <tr>
            <th>Nama Depan</th>
            <td> <input type="text" class="form-control" name="first_name" value=""> </td>
        </tr>
        <tr>
            <th>Nama Belakang</th>
            <td> <input type="text" class="form-control" name="last_name" value=""> </td>
        </tr>
        <tr>
            <th>Email</th>
            <td> <input type="email" class="form-control" name="email" value=""> </td>
        </tr>
        <tr>
            <th>Alamat</th>
            <td> 
            <select class="form-control" name="address_id" id="">
                <option value="0">Pilihan alamat</option>
            </select> 
            </td>
        </tr>
        <tr>
            <th>Aktif</th>
            <td> 
            <select class="form-control" name="active" id="">
                <option value="1">Aktif</option>
                <option value="0">Non Aktif</option>
            </select> 
            </td>
        </tr>
        <tr>
            <th>&nbsp;</th>
            <td> <input type="submit" class="btn btn-primary" name="save" value="Simpan"> </td>
        </tr>
    </table>    
    </form>
    </main>

<?php include "part_foot.php"; ?>