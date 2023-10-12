<?php
$host       = "localhost";
$user       = "root";
$pass       = "";
$db         = "akademik";

$koneksi    = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) {
    die("tidak bisa terkoneksi database");
}
$namajurusan    = "";
$fakultas_id   = "";
$error          = "";
$sukses         = "";



if (isset($_POST['simpan'])) {
  
    $namajurusan        = $_POST['namajurusan'];

    $fakultas_id        = $_POST['fakultas_id'];

    if ($namajurusan && $fakultas_id) {
        $sql1 = "insert into jurusan (namajurusan,fakultas_id) values ('$namajurusan','$fakultas_id')";
        $q1   = mysqli_query($koneksi, $sql1);
        if ($q1) {
            $sukses     = "Berhasil memasukan data";
        } else {
            $error      = "gagal memasukan data";
        }
    }else{
        $error = "Silahkan Masukan Data";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Jurusan</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
    <style>
    .mx-auto {
        width: 400px
    }

    .card {
        margin-top: 10px;
    }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Sistem Akademik</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.html">Home</a>
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
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Pendaftaran </a>
                    </li>
                    <li class="nav-item">
                     <p>   <a class="nav-link active" aria-current="page" href="index.php">keluar </a></p>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="mx-auto">
        <!-- //untuk memasukan data -->
        <div class="card">
            <div class="card-header">
                Masukan Jurusan anda
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
                        <label for="namajurusan" class="form-label">NAMA JURUSAN </label>
                        <input type="text" class="form-control" id="namajurusan" name="namajurusan" value="<?php echo $namajurusan  ?>">
                    </div>
                    <div class="mb-3">
                        <label for="namafakultas " class="form-label">FAKULTAS </label>
                        <select class="form-control" name="namafakultas " id="namafakultas ">
                   
                        <?php
    echo "<option value = $data[id]>$data[namafakultas]</option>";
    $query = mysqli_query($koneksi,"SELECT * FROM fakultas") or die (mysqli_error($koneksi));
    while ($data = mysqli_fetch_array($query)){
        echo "<option value = $data[id]>$data[namafakultas]</option>";
    }
    ?>
                        </select>
                    </div>
                    <div class="col-12">
                        <input type="submit" name="simpan" value="Simpan data" class="btn btn-primary" />
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- //untuk mengeluarkan data -->
    <div class="container">
        <div class="row  justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-header text-white bg-secondary">
                        Data Mahasiswa
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama Jurusan</th>
                                    <th scope="col">Fakultas</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            <tbody>
                                <?php
                        $sql2 = "select * from jurusan order by id desc";
                        $q2   = mysqli_query($koneksi, $sql2);
                        $urut = 1;
                        while ($r2 = mysqli_fetch_array($q2)) {
                            $id = $r2['id'];
                            $namajurusan = $r2['namajurusan'];
                            $namafakultas = $r2['namafakultas'];
                            $fakultas_id = $r2['fakultas_id'];
                          
                                 ?>
                                <tr>
                                    <th scope="row"><?php echo $urut++ ?></th>
                                    <th scope="row"><?php echo $namajurusan ?></th>
                                    <th scope="row"><?php echo $namafakultas ?></th>
                                    <td scope="row">
                                        <a href="index.php?op=edit&id=<?php echo $id ?>"><button type="button"
                                                class="btn btn-warning">Edit</button></a>
                                        <a href="jurusan.php?op=delete&id=<?php echo $id ?>"
                                            onclick="return confrim('Yakin mau delete data')"> <button type="button"
                                                class="btn btn-danger">Delete</button></a>
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
        </div>
    </div>
    
</body>

</html>


