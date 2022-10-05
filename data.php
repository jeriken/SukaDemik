<?php
include 'include/header.php';
if (!isset($_SESSION['nim'])) {
    header("Location: login.php");
}

$krs = mysqli_query($mysqli, "SELECT 
*
FROM jadwal
LEFT JOIN mahasiswa
ON jadwal.nim = mahasiswa.nim
LEFT JOIN dosen
ON jadwal.nid = dosen.nid
LEFT JOIN matkul
ON jadwal.idm = matkul.idm
LEFT JOIN waktu
ON jadwal.idw = waktu.idw;");

$mhs = mysqli_query($mysqli, "SELECT 
*
FROM mahasiswa;");

$dsn = mysqli_query($mysqli, "SELECT 
*
FROM dosen;");

$mkl = mysqli_query($mysqli, "SELECT 
*
FROM matkul
LEFT JOIN dosen
ON matkul.nid = dosen.nid
LEFT JOIN waktu
ON matkul.idw = waktu.idw");

$wkt = mysqli_query($mysqli, "SELECT 
*
FROM waktu;");
?>


<!-- Page Content -->
<div id="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1>Semua Data</h1>

                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="krs-tab" data-toggle="tab" href="#krs" role="tab" aria-controls="krs" aria-selected="true">KRS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="mahasiswa-tab" data-toggle="tab" href="#mahasiswa" role="tab" aria-controls="mahasiswa" aria-selected="false">Mahasiswa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="dosen-tab" data-toggle="tab" href="#dosen" role="tab" aria-controls="dosen" aria-selected="false">Dosen</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="matkul-tab" data-toggle="tab" href="#matkul" role="tab" aria-controls="matkul" aria-selected="false">Mata Kuliah</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="waktu-tab" data-toggle="tab" href="#waktu" role="tab" aria-controls="waktu" aria-selected="false">Waktu</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="krs" role="tabpanel" aria-labelledby="krs-tab">
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
                                if ($krs->num_rows > 0) {
                                    while ($row = $krs->fetch_assoc()) {
                                        echo "
                                <tr>
                                <td>" . $row['nim'] . "</td>
                                <td>" . $row['nama_mhs'] . "</td>
                                <td>" . $row['nama_mk'] . "</td>
                                <td>" . $row['nama_dsn'] . "</td>
                                <td>" . $row['ruangan'] . "</td>
                                <td>" . $row['hari'] . "</td>
                                <td>" . $row['waktu'] . "</td>
                            <td></td>
                        </tr>";
                                    }
                                } else {
                                    echo "0 results";
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="mahasiswa" role="tabpanel" aria-labelledby="mahasiswa-tab">
                        <table class="table table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>NIM</th>
                                    <th>Nama</th>
                                    <th>Semester</th>
                                    <th>Jenkel</th>
                                    <th>Jurusan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($mhs->num_rows > 0) {
                                    while ($row = $mhs->fetch_assoc()) {
                                        echo "
                                <tr>
                                <td>" . $row['nim'] . "</td>
                                <td>" . $row['nama_mhs'] . "</td>
                                <td>" . $row['semester'] . "</td>
                                <td>" . $row['jenkel'] . "</td>
                                <td>" . $row['jurusan'] . "</td>
                                <td></td>
                        </tr>";
                                    }
                                } else {
                                    echo "0 results";
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="dosen" role="tabpanel" aria-labelledby="dosen-tab">
                        <table class="table table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>NID</th>
                                    <th>Nama</th>
                                    <th>Jenkel</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($dsn->num_rows > 0) {
                                    while ($row = $dsn->fetch_assoc()) {
                                        echo "
                                <tr>
                                <td>" . $row['nid'] . "</td>
                                <td>" . $row['nama_dsn'] . "</td>
                                <td>" . $row['jenkel'] . "</td>
                                <td></td>
                        </tr>";
                                    }
                                } else {
                                    echo "0 results";
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="matkul" role="tabpanel" aria-labelledby="matkul-tab">
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
                                if ($mkl->num_rows > 0) {
                                    while ($row = $mkl->fetch_assoc()) {
                                        echo "
                                <tr>
                            <td>" . $row['nama_mk'] . "</td>
                            <td>" . $row['nama_dsn'] . "</td>
                            <td>" . $row['semester'] . "</td>
                            <td>" . $row['sks'] . "</td>
                            <td>" . $row['waktu'] . "</td>
                            <td>" . $row['hari'] . "</td>
                            <td></td>
                        </tr>";
                                    }
                                } else {
                                    echo "0 results";
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="waktu" role="tabpanel" aria-labelledby="waktu-tab">
                        <table class="table table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Hari</th>
                                    <th>Waktu</th>
                                    <th>Ruangan</th>
                                </tr>
                            </thead>


                            <tbody>
                                <?php
                                if ($wkt->num_rows > 0) {
                                    while ($row = $wkt->fetch_assoc()) {
                                        echo "
                                <tr>
                            <td>" . $row['hari'] . "</td>
                            <td>" . $row['waktu'] . "</td>
                            <td>" . $row['ruangan'] . "</td>
                            <td></td>
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
    </div>
</div>
<!-- /#wrapper -->
<?php
include 'include/footer.php';
?>