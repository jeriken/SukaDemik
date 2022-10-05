<?php
include 'include/header.php';
if (!isset($_SESSION['nim'])) {
    header("Location: login.php");
}

$mhs = mysqli_query($mysqli, "SELECT 
*
FROM mahasiswa;");

$dsn = mysqli_query($mysqli, "SELECT 
*
FROM dosen;");

$dsn2 = mysqli_query($mysqli, "SELECT 
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

$wkt2 = mysqli_query($mysqli, "SELECT 
*
FROM waktu;");

if (isset($_POST['krs'])) {
    $mahasiswa = $_POST['mahasiswakrs'];
    $dosen = $_POST['dosenkrs'];
    $matkul = $_POST['matkulkrs'];
    $waktu = $_POST['waktukrs'];
    $result = mysqli_query($mysqli, "INSERT INTO jadwal(nim,nid,idm,idw) VALUES('$mahasiswa','$dosen','$matkul','$waktu')");
    header("Location:data.php");
}

if (isset($_POST['mahasiswa'])) {
    $nim = $_POST['nim'];
    $nama_mhs = $_POST['namamhs'];
    $password = $_POST['password'];
    $semester = $_POST['semester'];
    $jkmhs = $_POST['jkmhs'];
    $jurusan = $_POST['jurusan'];
    $result = mysqli_query($mysqli, "INSERT INTO mahasiswa(nim,nama_mhs,password,semester,jenkel,jurusan) VALUES('$nim','$nama_mhs','$password','$semester','$jkmhs','$jurusan')");
    header("Location:data.php");
}

if (isset($_POST['dosen'])) {
    $nid = $_POST['nid'];
    $namadsn = $_POST['namadsn'];
    $jkdsn = $_POST['jkdsn'];
    $result = mysqli_query($mysqli, "INSERT INTO dosen(nid,nama_dsn,jenkel) VALUES('$nid','$namadsn','$jkdsn')");
    header("Location:data.php");
}

if (isset($_POST['matkul'])) {
    $idm = $_POST['idm'];
    $namamk = $_POST['namamk'];
    $semestermk = $_POST['semestermk'];
    $jumlah = $_POST['jumlah'];
    $dosenmk = $_POST['dosenmk'];
    $waktumk = $_POST['waktumk'];
    $result = mysqli_query($mysqli, "INSERT INTO matkul(idm,nama_mk,semester,sks,nid,idw) VALUES('$idm','$namamk','$semestermk','$jumlah','$dosenmk','$waktumk')");
    header("Location:data.php");
}

if (isset($_POST['waktu'])) {
    $hari = $_POST['hari'];
    $jam = $_POST['jam'];
    $ruangan = $_POST['ruangan'];
    $result = mysqli_query($mysqli, "INSERT INTO waktu(hari,waktu,ruangan) VALUES('$hari','$jam','$ruangan')");
    header("Location:data.php");
}

?>

<!-- Page Content -->
<div id="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1>Tambah Data</h1>


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
                        <div class="card">
                            <form form method="POST" action="">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <div class="form-floating mb-3">
                                                <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="mahasiswakrs">
                                                    <option selected value="-">Mohon pilih mahasiswa</option>
                                                    <?php
                                                    if ($mhs->num_rows > 0) {
                                                        while ($row = $mhs->fetch_assoc()) {
                                                            echo "<option value=" . $row['nim'] . ">" . $row['nama_mhs'] . "</option>";
                                                        }
                                                    } else {
                                                        echo "0 results";
                                                    }
                                                    ?>
                                                </select>
                                                <label for="floatingSelect">Mahasiswa</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="dosenkrs">
                                                    <option selected value="-">Mohon pilih dosen</option>
                                                    <?php
                                                    if ($dsn->num_rows > 0) {
                                                        while ($row = $dsn->fetch_assoc()) {
                                                            echo "<option value=" . $row['nid'] . ">" . $row['nama_dsn'] . "</option>";
                                                        }
                                                    } else {
                                                        echo "0 results";
                                                    }
                                                    ?>
                                                </select>
                                                <label for="floatingSelect">Dosen</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="matkulkrs">
                                                    <option selected value="-">Mohon pilih mata kuliah</option>
                                                    <?php
                                                    if ($mkl->num_rows > 0) {
                                                        while ($row = $mkl->fetch_assoc()) {
                                                            echo "<option value=" . $row['idm'] . ">" . $row['nama_mk'] . "</option>";
                                                        }
                                                    } else {
                                                        echo "0 results";
                                                    }
                                                    ?>
                                                </select>
                                                <label for="floatingSelect">Mata Kuliah</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="waktukrs">
                                                    <option selected value="-">Mohon pilih waktu kuliah</option>
                                                    <?php
                                                    if ($wkt->num_rows > 0) {
                                                        while ($row = $wkt->fetch_assoc()) {
                                                            echo "<option value=" . $row['idw'] . ">" . $row['hari'] . ", " . $row['waktu'] . "</option>";
                                                        }
                                                    } else {
                                                        echo "0 results";
                                                    }
                                                    ?>
                                                </select>
                                                <label for="floatingSelect">Waktu</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="card">
                                                <div class="card-body">
                                                    <p class="mb-3">Mohon cek ulang data yang diisi dan pastikan data yang dimasukkan adalah benar</p>
                                                    <input type="submit" type="button" class="btn btn-dark w-100" value="Kirim" name="krs" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="mahasiswa" role="tabpanel" aria-labelledby="mahasiswa-tab">
                        <div class="card">
                            <form form method="POST" action="">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <div class="form-floating mb-3">
                                                <input type="number" class="form-control" id="floatingInput" name="nim">
                                                <label for="floatingInput">NIM</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="floatingPassword" name="namamhs">
                                                <label for="floatingPassword">Nama</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="password" class="form-control" id="floatingPassword" name="password">
                                                <label for="floatingPassword">Password</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="semester">
                                                    <option selected value="-">Mohon pilih semester</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>
                                                    <option value="9">9</option>
                                                    <option value="10">10</option>
                                                    <option value="11">11</option>
                                                    <option value="12">12</option>
                                                    <option value="13">13</option>
                                                    <option value="14">14</option>
                                                </select>
                                                <label for="floatingSelect">Semester</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="jkmhs">
                                                    <option selected value="-">Mohon pilih jenis kelamin</option>
                                                    <option value="Laki-laki">Laki-laki</option>
                                                    <option value="Perempuan">Perempuan</option>
                                                </select>
                                                <label for="floatingSelect">Jenis Kelamin</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="floatingPassword" name="jurusan">
                                                <label for="floatingPassword">Jurusan</label>
                                            </div>

                                        </div>
                                        <div class="col-sm-4">
                                            <div class="card">
                                                <div class="card-body">
                                                    <p class="mb-3">Mohon cek ulang data yang diisi dan pastikan data yang dimasukkan adalah benar</p>
                                                    <input type="submit" type="button" class="btn btn-dark w-100" value="Kirim" name="mahasiswa" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="dosen" role="tabpanel" aria-labelledby="dosen-tab">
                        <div class="card">
                            <form form method="POST" action="">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <div class="form-floating mb-3">
                                                <input type="number" class="form-control" id="floatingInput" name="nid">
                                                <label for="floatingInput">NID</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="floatingPassword" name="namadsn">
                                                <label for="floatingPassword">Nama</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="jkdsn">
                                                    <option selected value="-">Mohon pilih jenis kelamin</option>
                                                    <option value="Laki-laki">Laki-laki</option>
                                                    <option value="Perempuan">Perempuan</option>
                                                </select>
                                                <label for="floatingSelect">Jenis Kelamin</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="card">
                                                <div class="card-body">
                                                    <p class="mb-3">Mohon cek ulang data yang diisi dan pastikan data yang dimasukkan adalah benar</p>
                                                    <input type="submit" type="button" class="btn btn-dark w-100" value="Kirim" name="dosen" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="matkul" role="tabpanel" aria-labelledby="matkul-tab">
                        <div class="card">
                            <form form method="POST" action="">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <div class="form-floating mb-3">
                                                <input type="number" class="form-control" id="floatingInput" name="idm">
                                                <label for="floatingInput">ID Matkul</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="floatingInput" name="namamk">
                                                <label for="floatingInput">Nama Mata Kuliah</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="semestermk">
                                                    <option selected value="-">Mohon pilih semester</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>
                                                    <option value="9">9</option>
                                                    <option value="10">10</option>
                                                    <option value="11">11</option>
                                                    <option value="12">12</option>
                                                    <option value="13">13</option>
                                                    <option value="14">14</option>
                                                </select>
                                                <label for="floatingSelect">Semester</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="number" class="form-control" id="floatingInput" name="jumlah">
                                                <label for="floatingInput">Jumlah SKS</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="dosenmk">
                                                    <option selected value="-">Mohon pilih dosen</option>
                                                    <?php
                                                    if ($dsn2->num_rows > 0) {
                                                        while ($row = $dsn2->fetch_assoc()) {
                                                            echo "<option value=" . $row['nid'] . ">" . $row['nama_dsn'] . "</option>";
                                                        }
                                                    } else {
                                                        echo "0 results";
                                                    }
                                                    ?>
                                                </select>
                                                <label for="floatingSelect">Dosen</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="waktumk">
                                                    <option selected value="-">Mohon pilih waktu kuliah</option>
                                                    <?php
                                                    if ($wkt2->num_rows > 0) {
                                                        while ($row = $wkt2->fetch_assoc()) {
                                                            echo "<option value=" . $row['idw'] . ">" . $row['hari'] . " - " . $row['waktu'] . "</option>";
                                                        }
                                                    } else {
                                                        echo "0 results";
                                                    }
                                                    ?>
                                                </select>
                                                <label for="floatingSelect">Waktu</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="card">
                                                <div class="card-body">
                                                    <p class="mb-3">Mohon cek ulang data yang diisi dan pastikan data yang dimasukkan adalah benar</p>
                                                    <input type="submit" type="button" class="btn btn-dark w-100" value="Kirim" name="matkul" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="waktu" role="tabpanel" aria-labelledby="waktu-tab">
                        <div class="card">
                            <form form method="POST" action="">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <div class="form-floating mb-3">
                                                <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="hari">
                                                    <option selected value="-">Mohon pilih hari</option>
                                                    <option value="Senin">Senin</option>
                                                    <option value="Selasa">Selasa</option>
                                                    <option value="Rabu">Rabu</option>
                                                    <option value="Kamis">Kamis</option>
                                                    <option value="Jumat">Jumat</option>
                                                </select>
                                                <label for="floatingSelect">Semester</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="jam">
                                                    <option selected value="-">Mohon pilih jam</option>
                                                    <option value="07.00-09.00">07.00-09.00</option>
                                                    <option value="09.30-11.00">09.30-11.00</option>
                                                    <option value="13.00-15.00">13.00-15.00</option>
                                                    <option value="16.00-17.30">16.00-17.30</option>
                                                </select>
                                                <label for="floatingSelect">Waktu</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="floatingInput" name="ruangan">
                                                <label for="floatingInput">Ruangan</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="card">
                                                <div class="card-body">
                                                    <p class="mb-3">Mohon cek ulang data yang diisi dan pastikan data yang dimasukkan adalah benar</p>
                                                    <input type="submit" type="button" class="btn btn-dark w-100" value="Kirim" name="waktu" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
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