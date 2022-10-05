<?php
include 'include/header.php';
$nim = $_SESSION['nim'];
if (!isset($_SESSION['nim'])) {
    header("Location: login.php");
}

$result = mysqli_query($mysqli, "SELECT 
*
FROM jadwal
LEFT JOIN mahasiswa
ON jadwal.nim = mahasiswa.nim
LEFT JOIN dosen
ON jadwal.nid = dosen.nid
LEFT JOIN matkul
ON jadwal.idm = matkul.idm
LEFT JOIN waktu
ON jadwal.idw = waktu.idw
WHERE jadwal.nim = '.$nim.';");
?>


<!-- Page Content -->
<div id="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1>Data KRS Saya</h1>
                <hr>
                <table class="table table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Mata Kuliah</th>
                            <th>Dosen</th>
                            <th>Ruang</th>
                            <th>Hari</th>
                            <th>Waktu</th>
                        </tr>
                    </thead>


                    <tbody>
                        <?php
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "
                                <tr>
                            <td>" . $row['nim'] . "</td>
                            <td>" . $row['nama_mhs'] . "</td>
                            <td>" . $row['nama_mk'] . "</td>
                            <td>" . $row['nama_dsn'] . "</td>
                            <td>" . $row['ruangan'] . "</td>
                            <td>" . $row['hari'] . "</td>
                            <td>" . $row['waktu'] . "</td>
                        </tr>";
                            }
                        } else {
                            echo "0 results";
                        }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /#page-content-wrapper -->

<!-- /#wrapper -->
<?php
include 'include/footer.php';
?>