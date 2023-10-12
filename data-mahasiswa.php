<!-- <?php
$host       = "localhost";
$user       = "root";
$pass       = "";
$db         = "akademik";

$koneksi    = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) {
    die("tidak bisa terkoneksi database");
}
if(isset($_GET['op'])){
    $op = $_GET['op'];
}else{
    $op = "";
}
if($op == 'delete'){
    $id        = $_GET['id'];
    $sql1       = "delete from mahasiswa,fakultas,jurusan where id = $id";
    $q1         = mysqli_query($koneksi,$sql1);
   if($q1){
    $sukses     ="berhasil";
   }else{
    $error      ="gagal melakukan delete data";
   }
   
}

if($op == 'edit'){
    $id         = $_GET['id'];
    $sql1       = "select * from mahasiswa where id = '$id'";
    $q1         = mysqli_query($koneksi,$sql1);
    $r1         = mysqli_fetch_array($q1);
    $nim        = $r1['nim'];
    $nama       = $r1['nama'];
    $alamat     = $r1['alamat'];
    $jurusan_id = $r1['jurusan_id'];
   
    $namafakultas   = $r1['namafakultas'];
    $namajurusan = $r1['namajurusan'];
    // $fakultas   = $r1['fakultas'];

    if($nim == ''){
        $error = "Data tidak ditemukan";
    }
}




?> -->
<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   ="akademik";

$koneksi  = mysqli_connect($host,$user,$pass,$db);
if (!$koneksi) {
    die("Could not connect to");
}

$nim = "";
$nama = "";
$alamat = "";
$jurusan_id = "";

if (isset($_POST['simpan'])) {
    $jurusan_id      = $_POST['jurusan_id'];
   

    if ($namafakultas ) {
        $sql1 = "insert into mahasiswa1 (nim,nama,alamat,jurusan_id) values ('$nim,$nama,$alamat,$jurusan_id')";
        $q1   = mysqli_query($koneksi, $sql1);
    
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pendataan Akademik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
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
                        <a class="nav-link active" aria-current="page" href="index.php">keluar </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="my-3">
            <a href="data-mahasiswa/mahasiswa.php/jurusans.php"></a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <td>#</td>
                    <td>NIM</td>
                    <td>Nama</td>
                    <td>Alamat</td>
                    <td>Jurusan</td>
                    <td>Fakultas</td>
                    <td>Aksi</td>
                </tr>
            </thead>
            <tbody>
                <?php
                 $sql2 = "select * from mahasiswa order by id desc";
                 $q2   = mysqli_query($koneksi, $sql2);
                $urut = 1;
                while ($r2 = mysqli_fetch_array($q2)) {
                    $nim = $r2['nim'];
                    $nama = $r2['nama'];
                    $alamat = $r2['alamat'];
                
               $jurusan_id = $r2['jurusan_id'];
                ?>
                    <tr>
                        <td><?php echo $urut++ ?></td>
                        <td><?php echo $nim ?></td>
                        <td><?php echo $nama ?></td>
                        <td><?php echo $alamat ?></td>
                   
                        <td><?php echo $namajurusan?></td>
                        <td scope="row">
                            <a href="dataedit.php?op=edit&id=<?php echo $id ?>"><button type="button" class="btn btn-warning">Edit</button></a>
                            <a href="dataedit.php?op=delete&id=<?php echo $id ?>" onclick="return confrim('Yakin mau delete data')"> <button type="button" class="btn btn-danger">Delete</button></a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>