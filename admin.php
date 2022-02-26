
<?php require("functions/functions.php")?>
<?php require("header.php")?>
<!-- tampilkan semua data, acc, pilih pelaksana dari list -->
<h1>Admin</h1>
    <h2>Permintaan</h2>
    <table border='1' cellpadding='10' cellspacing='0'>
        <tr>
            <th>Nama Unit</th>
            <th>Tanggal</th>
            <th>Jenis</th>
            <th>Keterangan</th>
            <th>Pelaksana</th>
            <th>Konfirmasi</th>
        </tr>
        <tr>
            <td>Reza</td>
            <td>17 Agustus 1945</td>
            <td>Tugas</td>
            <td>Keterangan</td>
            <td>
                <select name="pelaksana" id="pelaksana">
                    <?php for ($x = 0; $x <= 10; $x++):?>
                        <option value="<?= $x?>"><?= $x?></option>
                    <?php endfor?>
                </select>
            </td>
            <td><button>Yes</button> <button>No</button></td>


        </tr>
    </table>
<?php require("footer.php")?>