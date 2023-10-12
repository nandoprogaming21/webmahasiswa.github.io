<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pendataan Akademik</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Sistem Akademik</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="dashboard.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="data-mahasiswa.php">Data Mahasiswa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="fakultas.php">Fakultas</a>

                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="jurusan.php">Jurusan</a>

                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="mahasiswa.php">Mahasiswa</a>

                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="my-3">
            <a href="../data-mahasiswa.php" class="btn btn-success">Kembali</a>
        </div>
    </div>
    <?php
    $host       = "localhost";
    $user       = "root";
    $pass       = "";
    $db         = "akademik";

    $koneksi    = mysqli_connect($host, $user, $pass, $db);
    if (!$koneksi) {
        die("tidak bisa terkoneksi database");
    }
    $nim        = "";
    $nama       = "";
    $alamat     = "";
    $fakultas   = "";
    $sukses     = "";
    $error      = "";

    if(isset($_GET['op'])){
        $op = $_GET['op'];
    }else{
        $op = "";
    }
    
    if($op == 'edit'){
        $id         = $_GET['id'];
        $sql1       = "select * from siswa where id = '$id'";
        $q1         = mysqli_query($koneksi,$sql1);
        $r1         = mysqli_fetch_array($q1);
        $nim        = $r1['nim'];
        $nama       = $r1['nama'];
        $alamat     = $r1['alamat'];
        $fakultas   = $r1['fakultas'];
    
        if($nim == ''){
            $error = "Data tidak ditemukan";
        }
    }
    

    if (isset($_POST['simpan'])) {
        $nim        = $_POST['nim'];
        $nama       = $_POST['nama'];
        $alamat     = $_POST['alamat'];
        $fakultas   = $_POST['fakultas'];

        if ($nim && $nama && $alamat && $fakultas) {
            $sql1 = "insert into siswa (nim,nama,alamat,fakultas) values ('$nim','$nama','$alamat','$fakultas')";
            $q1   = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $sukses     = "Berhasil memasukan data";
            } else {
                $error      = "gagal memasukan data";
            }
        } else {
            $error = "Silahkan Masukan Data";
        }
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Data Mahasiswa</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
        <style>
            .mx-auto {
                width: 800px
            }

            .card {
                margin-top: 10px;
            }
        </style>
    </head>

    <body>
        <div class="mx-auto">
            <!-- //untuk memasukan data -->
            <div class="card">
                <div class="card-header">
                    Create / Edit Data
                </div>
                <div class="card-body">
                    <?php
                    if ($error) {
                    ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $error ?>
                        </div>

                    <?php
                    }

                    ?>
                    <?php
                    if ($sukses) {
                    ?>
                        <div class="alert alert-succes" role="alert">
                            <?php echo $sukses ?>
                        </div>

                    <?php
                    }

                    ?>
                    <form action="" method="POST">
                        <div class="mb-3">
                            <label for="nim" class="form-label">NIM </label>
                            <input type="text" class="form-control" id="nim" name="nim" value="<?php echo $nim  ?>">
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">NAMA </label>
                            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama  ?>">
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">ALAMAT </label>
                            <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $alamat  ?>">
                        </div>
                        <div class="mb-3">
                            <label for="fakultas" class="form-label">FAKULTAS </label>
                            <select class="form-control" name="fakultas" id="fakultas">
                                <option value=""> -Pilih fakultas- </option>
                                <option value="saintek" <?php if ($fakultas == "saintek") echo "selected" ?>>saintek</option>
                                <option value="soshum" <?php if ($fakultas == "soshum") echo "selected" ?>>soshum</option>
                                <option value="kedokteran" <?php if ($fakultas == "kedokteran") echo "selected" ?>>
                                kedokteran</option>
                            <option value="komunikasi" <?php if ($fakultas == "komunikasi") echo "selected" ?>>
                                komunikasi</option>
                            <option value="psikologi" <?php if ($fakultas == "psikologi") echo "selected" ?>>psikologi
                            </option>
                            <option value="manajemen" <?php if ($fakultas == "manajemen") echo "selected" ?>>manajemen
                            </option>
                            </select>
                        </div>
                        <div class="col-12">
                            <input type="submit" name="simpan" value="Simpan data" class="btn btn-primary" />
                        </div>
                    </form>
                </div>
            </div>
            <!-- //untuk mengeluarkan data -->
            <div class="card">
                <div class="card-header text-white bg-secondary">
                    Data Mahasiswa
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">NIM</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Fakultas</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        <tbody>
                            <?php
                            $sql2 = "select * from siswa order by id desc";
                            $q2   = mysqli_query($koneksi, $sql2);
                            $urut = 1;
                            while ($r2 = mysqli_fetch_array($q2)) {
                                $id = $r2['id'];
                                $nim = $r2['nim'];
                                $nama = $r2['nama'];
                                $alamat = $r2['alamat'];
                                $fakultas = $r2['fakultas'];

                            ?>
                                <tr>
                                    <th scope="row"><?php echo $urut++ ?></th>
                                    <th scope="row"><?php echo $nim ?></th>
                                    <th scope="row"><?php echo $nama ?></th>
                                    <th scope="row"><?php echo $alamat ?></th>
                                    <th scope="row"><?php echo $fakultas ?></th>
                                    <td scope="row">
                                        <a href="index.php?op=edit&id=<?php echo $id?>"><button type="button" class="btn btn-warning">Edit</button></a>
                                        
                                        <button type="button" class="btn btn-danger">Delete</button>

                                    </td>
                                </tr>
                            <?php
                            }
                            ?>

                        </tbody>


                        </thead>



                    </table>

                </div>
            </div>
        </div>

    </body>

    </html>