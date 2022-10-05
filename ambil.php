<?php
include 'include/header.php';
if (!isset($_SESSION['nim'])) {
    header("Location: login.php");
}

$result = mysqli_query($mysqli, "SELECT 
*
FROM matkul
LEFT JOIN dosen
ON matkul.nid = dosen.nid
LEFT JOIN waktu
ON matkul.idw = waktu.idw");
?>


<!-- Page Content -->
<div id="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1>Ambil KRS Mahasiswa</h1>
                <hr>
                <table class="table table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Mata Kuliah</th>
                            <th>Dosen</th>
                            <th>Semester</th>
                            <th>SKS</th>
                            <th>Waktu</th>
                            <th>Hari</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>


                    <tbody>
                        <?php
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "
                                <tr>
                            <td>" . $row['nama_mk'] . "</td>
                            <td>" . $row['nama_dsn'] . "</td>
                            <td>" . $row['semester'] . "</td>
                            <td>" . $row['sks'] . "</td>
                            <td>" . $row['waktu'] . "</td>
                            <td>" . $row['hari'] . "</td>
                            <td><input type='submit' type='button' class='btn btn-dark w-100' value='Ambil' /></td>
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