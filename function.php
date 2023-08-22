<?php
include 'koneksi.php';

$no = "";
$nim = "";
$nama = "";
$jenis_kelamin = "";
$agama = "";
$tanggal_lahir = "";
$prodi = "";
$status = "";
$alamat = "";

$errorMessage = "";
$successMessage = "";

function tambah()
{
    // die(var_dump($_POST));
    $nim = $_POST["nim"];
    $nama = $_POST["nama"];
    $jenis_kelamin = $_POST["jenis_kelamin"];
    $agama = $_POST["agama"];
    $tanggal_lahir = $_POST["tanggal_lahir"];
    $prodi = $_POST["prodi"];
    $status = $_POST["status"];
    $alamat = $_POST["alamat"];
    global $connection;
    global $kon;

    do {
        if (empty($nim) || empty($nama) || !($jenis_kelamin == "1" || $jenis_kelamin == "0") || empty($agama) || empty($tanggal_lahir) || empty($prodi) || empty($status) || empty($alamat)) {
            $errorMessage = "Semua data wajib diisi!";
            break;
        }

        $sql = "INSERT INTO mhs_web (nim, nama, jenis_kelamin, agama, tanggal_lahir, prodi, status, alamat) " .
            "VALUES ('$nim', '$nama', '$jenis_kelamin', '$agama', '$tanggal_lahir', '$prodi', '$status', '$alamat' )";
        // $result =  $connection->query($sql);
        $result = mysqli_query($kon, $sql);

        if (!$result) {
            $errorMessage = "Invalid query: " .  $connection->error;
            break;
        }

        // add new data

        $nim = "";
        $nama = "";
        $jenis_kelamin = "";
        $agama = "";
        $tanggal_lahir = "";
        $prodi = "";
        $status = "";
        $alamat = "";

        $successMessage = "Data berhasil ditambah!";

        // header("location: /websi/index.php")
        // exit;
        return $successMessage;
    } while (false);
}

function tambahDosen()
{
    // die(var_dump($_POST));
    $nidn = $_POST["nidn"];
    $nama = $_POST["nama"];
    $jenis_kelamin = $_POST["jenis_kelamin"];
    $agama = $_POST["agama"];
    $tanggal_lahir = $_POST["tanggal_lahir"];
    $prodi = $_POST["dosen_prodi"];
    $status = $_POST["status"];
    $alamat = $_POST["alamat"];
    global $connection;
    global $kon;

    do {
        if (empty($nidn) || empty($nama) || !($jenis_kelamin == "1" || $jenis_kelamin == "0") || empty($agama) || empty($tanggal_lahir) || empty($prodi) || empty($status) || empty($alamat)) {
            $errorMessage = "Semua data wajib diisi!";
            break;
        }

        $sql = "INSERT INTO dosen (nidn, nama, jenis_kelamin, agama, tanggal_lahir, dosen_prodi, status, alamat) " .
            "VALUES ('$nidn', '$nama', '$jenis_kelamin', '$agama', '$tanggal_lahir', '$prodi', '$status', '$alamat' )";
        // $result =  $connection->query($sql);
        $result = mysqli_query($kon, $sql);

        if (!$result) {
            $errorMessage = "Invalid query: " .  $connection->error;
            break;
        }

        // add new data

        $nidn = "";
        $nama = "";
        $jenis_kelamin = "";
        $agama = "";
        $tanggal_lahir = "";
        $prodi = "";
        $status = "";
        $alamat = "";

        $successMessage = "Data berhasil ditambah!";

        // header("location: /websi/index.php")
        // exit;
        return $successMessage;
    } while (false);
}

function tambahMK()
{
    // die(var_dump($_POST));
    $kode = $_POST["kode"];
    $mata_kuliah = $_POST["mata_kuliah"];
    $dosen = $_POST["dosen"];
    $kelas = $_POST["kelas"];
    $jenis_kelas = $_POST["jenis_kelas"];
    $sks = $_POST["sks"];
    $semester = $_POST["semester"];
    global $connection;
    global $kon;


    do {
        if (empty($kode) || empty($mata_kuliah) || !($jenis_kelas == "Reguler" || $jenis_kelas == "Bersyarat") || empty($dosen) || empty($kelas) || empty($sks) || empty($semester)) {
            $errorMessage = "Semua data wajib diisi!";
            return $errorMessage;
            break;
        }

        $sql = "INSERT INTO matakuliah (kode, mata_kuliah, dosen, kelas, jenis_kelas, sks, semester) " .
            "VALUES ('$kode', '$mata_kuliah', '$dosen', '$kelas', '$jenis_kelas', '$sks', '$semester')";
        // $result =  $connection->query($sql);
        $result = mysqli_query($kon, $sql);

        if (!$result) {
            $errorMessage = "Invalid query: " .  $connection->error;
            return $errorMessage;
            break;
        }

        $successMessage = "Data berhasil ditambah!";
        return $successMessage;
    } while (false);
}

function tambahambilMK()
{
    // die(var_dump($_POST));
    $kode = $_POST["kode"];
    $mata_kuliah = $_POST["mata_kuliah"];
    $dosen = $_POST["dosen"];
    $jenis_kelas = $_POST["jenis_kelas"];
    $hari = $_POST['hari'];
    $mulai = $_POST['mulai'];
    $akhir = $_POST['akhir'];
    $ruangan = $_POST['ruangan'];
    $sks = $_POST["sks"];
    global $connection;
    global $kon;


    do {
        if (empty($kode) || empty($mata_kuliah) || empty($dosen) || !($jenis_kelas == "Reguler" || $jenis_kelas == "Bersyarat") || empty($hari) || empty($mulai) || empty($akhir) || empty($ruangan) || empty($sks)) {
            $errorMessage = "Semua data wajib diisi!";
            return $errorMessage;
            break;
        }
        $waktu = $mulai . "-" . $akhir;
        $sql = "INSERT INTO ambilkuliah (kode, mata_kuliah, dosen, jenis_kelas, hari, waktu, ruangan, sks) " .
            "VALUES ('$kode', '$mata_kuliah', '$dosen', '$jenis_kelas', '$hari', '$waktu','$ruangan','$sks')";
        $result = mysqli_query($kon, $sql);

        if (!$result) {
            $errorMessage = "Invalid query: " .  $connection->error;
            return $errorMessage;
            break;
        }

        $successMessage = "Data berhasil ditambah!";
        return $successMessage;
    } while (false);
}

function tampilData($table)
{
    global $kon;
    // Dapatkan ID mahasiswa terakhir
    $sql = 'SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE TABLE_SCHEMA = "psibw" AND TABLE_NAME = "' . $table . '"';
    $rows = mysqli_query($kon, $sql);
    // die(var_dump());
    $idTerakhir = mysqli_fetch_assoc($rows)['AUTO_INCREMENT'];
    return $idTerakhir;
}

function tabelDosen()
{
    global $kon;
    $dosen = mysqli_query($kon, "SELECT * FROM dosen");
    return $dosen;
}

function tabelMK()
{
    global $kon;
    $matakuliah = mysqli_query($kon, "SELECT * FROM matakuliah");
    return $matakuliah;
}

function tabel()
{
    global $kon;
    $mahasiswa = mysqli_query($kon, "SELECT * from mhs_web");
    return $mahasiswa;
}

function tabelambilMK()
{
    global $kon;
    $ambilmk = mysqli_query($kon, "SELECT * from ambilkuliah");
    return $ambilmk;
}

function tabelSearch($table, $field, $data)
{
    global $kon;
    $sql = "SELECT * FROM " . $table . " WHERE " . $field . " like '%" . $data . "%'";
    return mysqli_query($kon, $sql);
}

function delete()
{
    $delete = $_POST['delete'];
    global $kon;
    // var_dump(count($delete));die;
    for ($i = 0; $i < count($delete); $i++) {
        $sql = 'DELETE FROM mhs_web WHERE id_mahasiswa = ' . $delete[$i];
        mysqli_query($kon, $sql);
        if (mysqli_affected_rows($kon)) {
            echo "<script>
                alert('Data berhasil dihapus');
                document.location.href='http://localhost/psibw';
            </script>";
        } else {
            echo "<script>
                alert('Data gagal dihapus');
                document.location.href='http://localhost/psibw';
            </script>";
        }
    }
}

function deleteDosen()
{
    $delete = $_POST['delete'];
    global $kon;
    // var_dump(count($delete));die;
    for ($i = 0; $i < count($delete); $i++) {
        $sql = 'DELETE FROM dosen WHERE id_dosen = ' . $delete[$i];
        mysqli_query($kon, $sql);
        if (mysqli_affected_rows($kon)) {
            echo "<script>
                alert('Data berhasil dihapus');
                document.location.href='http://localhost/psibw/dosen.php';
            </script>";
        } else {
            echo "<script>
                alert('Data gagal dihapus');
                document.location.href='http://localhost/psibw/dosen.php';
            </script>";
        }
    }
}

function deleteMK()
{
    $delete = $_POST['delete'];
    global $kon;
    for ($i = 0; $i < count($delete); $i++) {
        $sql = 'DELETE FROM matakuliah WHERE id_matkul = ' . $delete[$i];
        mysqli_query($kon, $sql);
        if (mysqli_affected_rows($kon)) {
            echo "<script>
                alert('Data berhasil dihapus');
                document.location.href='http://localhost/psibw/matakuliah.php';
            </script>";
        } else {
            echo "<script>
                alert('Data gagal dihapus');
                document.location.href='http://localhost/psibw/matakuliah.php';
            </script>";
        }
    }
}

function deleteambilMK()
{
    $delete = $_POST['delete'];
    global $kon;
    for ($i = 0; $i < count($delete); $i++) {
        $sql = 'DELETE FROM ambilkuliah WHERE id_ambilmk = ' . $delete[$i];
        mysqli_query($kon, $sql);
        if (mysqli_affected_rows($kon)) {
            echo "<script>
                alert('Data berhasil dihapus');
                document.location.href='http://localhost/psibw/ambilkuliah.php';
            </script>";
        } else {
            echo "<script>
                alert('Data gagal dihapus');
                document.location.href='http://localhost/psibw/ambilkuliah.php';
            </script>";
        }
    }
}

function getData($id)
{
    global $kon;
    $sql = "SELECT * FROM mhs_web WHERE id_mahasiswa = " . $id;
    $rows = mysqli_query($kon, $sql);
    echo json_encode(mysqli_fetch_assoc($rows));
}

function getDataDosen($id)
{
    global $kon;
    $sql = "SELECT * FROM dosen WHERE id_dosen = " . $id;
    $rows = mysqli_query($kon, $sql);
    echo json_encode(mysqli_fetch_assoc($rows));
}

function getDataMK($id)
{
    global $kon;
    $sql = "SELECT * FROM matakuliah WHERE id_matkul = " . $id;
    $rows = mysqli_query($kon, $sql);
    echo json_encode(mysqli_fetch_assoc($rows));
}

function getDataambilMK($id)
{
    global $kon;
    $sql = "SELECT * FROM ambilkuliah WHERE id_ambilmk = " . $id;
    $rows = mysqli_query($kon, $sql);
    echo json_encode(mysqli_fetch_assoc($rows));
}

function getMahasiswa()
{
    global $kon;
    $sql = "SELECT id_mahasiswa FROM mhs_web";
    $rows = mysqli_query($kon, $sql);
    return $rows->fetch_all();
}

function edit()
{
    $id = $_POST['no'];
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $jenis_kelamin = $_POST['jenis_kelaminEdit'];
    $agama = $_POST['agama'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $prodi = $_POST['prodiEdit'];
    $status = $_POST['status'];
    $alamat = $_POST['alamat'];
    global $kon;
    global $connection;
    do {
        if (empty($nim) || empty($nama) || !($jenis_kelamin == "1" || $jenis_kelamin == "0") || empty($agama) || empty($tanggal_lahir) || empty($prodi) || empty($status) || empty($alamat)) {
            $errorMessage = "Semua data wajib diisi!";
            break;
        }

        $sql = "UPDATE mhs_web SET nim='$nim', nama='$nama', jenis_kelamin='$jenis_kelamin', tanggal_lahir='$tanggal_lahir', agama='$agama', prodi='$prodi', status='$status', alamat='$alamat' WHERE id_mahasiswa='$id'";

        $result = mysqli_query($kon, $sql);

        if (!$result) {
            $errorMessage = "Invalid query: " .  $connection->error;
            break;
        }
        $successMessage = "Data berhasil diupdate!";
        return $successMessage;
    } while (false);
}

function editDosen()
{
    $id = $_POST['no'];
    $nidn = $_POST['nidn'];
    $nama = $_POST['nama'];
    $jenis_kelamin = $_POST['jenis_kelaminEdit'];
    $agama = $_POST['agama'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $prodi = $_POST['dosen_prodiEdit'];
    $status = $_POST['status'];
    $alamat = $_POST['alamat'];
    global $kon;
    global $connection;
    do {
        if (empty($nidn) || empty($nama) || !($jenis_kelamin == "1" || $jenis_kelamin == "0") || empty($agama) || empty($tanggal_lahir) || empty($prodi) || empty($status) || empty($alamat)) {
            $errorMessage = "Semua data wajib diisi!";
            break;
        }

        $sql = "UPDATE dosen SET nidn='$nidn', nama='$nama', jenis_kelamin='$jenis_kelamin', tanggal_lahir='$tanggal_lahir', agama='$agama', dosen_prodi='$prodi', status='$status', alamat='$alamat' WHERE id_dosen='$id'";

        $result = mysqli_query($kon, $sql);

        if (!$result) {
            $errorMessage = "Invalid query: " .  $connection->error;
            break;
        }
        $successMessage = "Data berhasil diupdate!";
        return $successMessage;
    } while (false);
}

function editMK()
{
    $id = $_POST['no'];
    $kode = $_POST['kode'];
    $mata_kuliah = $_POST['mata_kuliah'];
    $dosen = $_POST['dosen'];
    $jenis_kelas = $_POST['jenis_kelasEdit'];
    $kelas = $_POST['kelas'];
    $sks = $_POST['sks'];
    $semester = $_POST['semester'];
    global $kon;
    global $connection;
    do {
        if (empty($kode) || empty($mata_kuliah) || empty($dosen) || !($jenis_kelas == "Reguler" || $jenis_kelas == "Bersyarat") || empty($kelas) || empty($sks) || empty($semester)) {
            $errorMessage = "Semua data wajib diisi!";
            return $errorMessage;
            break;
        }

        $sql = "UPDATE matakuliah SET kode='$kode', mata_kuliah='$mata_kuliah',  dosen='$dosen', jenis_kelas='$jenis_kelas', sks='$sks', kelas='$kelas', semester='$semester' WHERE id_matkul='$id'";

        $result = mysqli_query($kon, $sql);

        if (!$result) {
            $errorMessage = "Invalid query: " .  $connection->error;
            return $errorMessage;
            break;
        }
        $successMessage = "Data berhasil diupdate!";
        return $successMessage;
    } while (false);
}

function editambilMK()
{
    $id = $_POST['no'];
    $kode = $_POST['kode'];
    $mata_kuliah = $_POST['mata_kuliah'];
    $dosen = $_POST['dosen'];
    $jenis_kelas = $_POST['jenis_kelasEdit'];
    $hari = $_POST['hari'];
    $mulai = $_POST['mulai'];
    $akhir = $_POST['akhir'];
    $sks = $_POST['sks'];
    $ruangan = $_POST['ruangan'];
    global $kon;
    global $connection;
    do {
        if (empty($kode) || empty($mata_kuliah) || empty($dosen) || !($jenis_kelas == "Reguler" || $jenis_kelas == "Bersyarat") || empty($hari) || empty($sks) || empty($mulai) || empty($akhir) || empty($ruangan)) {
            $errorMessage = "Semua data wajib diisi!";
            return $errorMessage;
            break;
        }
        $waktu = $mulai . "-" . $akhir;
        $sql = "UPDATE ambilkuliah SET kode='$kode', mata_kuliah='$mata_kuliah', jenis_kelas='$jenis_kelas', sks='$sks', hari='$hari', waktu='$waktu', ruangan='$ruangan' WHERE id_ambilmk='$id'";

        $result = mysqli_query($kon, $sql);

        if (!$result) {
            $errorMessage = "Invalid query: " .  $connection->error;
            return $errorMessage;
            break;
        }
        $successMessage = "Data berhasil diupdate!";
        return $successMessage;
    } while (false);
}

function importCSVmhs()
{
    global $kon;
    // Allowed mime types
    $fileMimes = array(
        'text/x-comma-separated-values',
        'text/comma-separated-values',
        'application/octet-stream',
        'application/vnd.ms-excel',
        'application/x-csv',
        'text/x-csv',
        'text/csv',
        'application/csv',
        'application/excel',
        'application/vnd.msexcel',
        'text/plain'
    );

    // var_dump($_FILES);die;
    // Validate whether selected file is a CSV file
    if (!empty($_FILES['csv']['name']) && in_array($_FILES['csv']['type'], $fileMimes)) {

        // Open uploaded CSV file with read-only mode
        $csvFile = fopen($_FILES['csv']['tmp_name'], 'r');

        // Skip the first line
        fgetcsv($csvFile);

        // Parse data from CSV file line by line
        // Parse data from CSV file line by line
        while (($getData = fgetcsv($csvFile, 500, ",")) !== FALSE) {
            // Get row data
            $nim = $getData[0];
            $nama = $getData[1];
            $jenis_kelamin = $getData[2];
            $tanggal_lahir = $getData[3];
            $agama = $getData[4];
            $prodi = $getData[5];
            $status = $getData[6];
            $alamat = $getData[7];
            // If user already exists in the database with the same nim
            $sql = "SELECT nim FROM mhs_web WHERE nim = '" . $nim . "'";
            $checkRows = mysqli_query($kon, $sql);
            if ($checkRows->num_rows > 0) {
                mysqli_query($kon, "UPDATE mhs_web SET nama = '$nama', jenis_kelamin = '$jenis_kelamin', tanggal_lahir = '$tanggal_lahir', agama='$agama', prodi='$prodi', status='$status', alamat='$alamat' WHERE nim = '$nim'");
            } else {
                mysqli_query($kon, "INSERT INTO mhs_web (nim,nama,jenis_kelamin,tanggal_lahir,agama,prodi,status,alamat) VALUES ('$nim', '$nama', '$jenis_kelamin', '$tanggal_lahir', '$agama', '$prodi', '$status', '$alamat')");
            }
        }
        // Close opened CSV file
        fclose($csvFile);
        echo "<script>alert('Data Berhasil di Import');</script>";
        echo "<script> location.href ='http://localhost/psibw'; </script>";
    }
}

function importCSVdosen()
{
    global $kon;
    // Allowed mime types
    $fileMimes = array(
        'text/x-comma-separated-values',
        'text/comma-separated-values',
        'application/octet-stream',
        'application/vnd.ms-excel',
        'application/x-csv',
        'text/x-csv',
        'text/csv',
        'application/csv',
        'application/excel',
        'application/vnd.msexcel',
        'text/plain'
    );

    // var_dump($_FILES);die;
    // Validate whether selected file is a CSV file
    if (!empty($_FILES['csv']['name']) && in_array($_FILES['csv']['type'], $fileMimes)) {

        // Open uploaded CSV file with read-only mode
        $csvFile = fopen($_FILES['csv']['tmp_name'], 'r');

        // Skip the first line
        fgetcsv($csvFile);

        // Parse data from CSV file line by line
        // Parse data from CSV file line by line
        while (($getData = fgetcsv($csvFile, 500, ",")) !== FALSE) {
            // Get row data
            $nidn = $getData[0];
            $nama = $getData[1];
            $jenis_kelamin = $getData[2];
            $tanggal_lahir = $getData[3];
            $agama = $getData[4];
            $dosen_prodi = $getData[5];
            $status = $getData[6];
            $alamat = $getData[7];
            // If user already exists in the database with the same nidn
            $sql = "SELECT nidn FROM dosen WHERE nidn = '" . $nidn . "'";
            $checkRows = mysqli_query($kon, $sql);
            if ($checkRows->num_rows > 0) {
                mysqli_query($kon, "UPDATE dosen SET nama = '$nama', jenis_kelamin = '$jenis_kelamin', tanggal_lahir = '$tanggal_lahir', agama='$agama', dosen_prodi='$dosen_prodi', status='$status', alamat='$alamat' WHERE nidn = '$nidn'");
            } else {
                mysqli_query($kon, "INSERT INTO dosen (nidn,nama,jenis_kelamin,tanggal_lahir,agama,dosen_prodi,status,alamat) VALUES ('$nidn', '$nama', '$jenis_kelamin', '$tanggal_lahir', '$agama', '$dosen_prodi', '$status', '$alamat')");
            }
        }
        // Close opened CSV file
        fclose($csvFile);
        echo "<script>alert('Data Berhasil di Import');</script>";
        echo "<script> location.href ='http://localhost/psibw/dosen.php'; </script>";
    }
}

function importCSVMK()
{
    global $kon;
    // Allowed mime types
    $fileMimes = array(
        'text/x-comma-separated-values',
        'text/comma-separated-values',
        'application/octet-stream',
        'application/vnd.ms-excel',
        'application/x-csv',
        'text/x-csv',
        'text/csv',
        'application/csv',
        'application/excel',
        'application/vnd.msexcel',
        'text/plain'
    );

    // var_dump($_FILES);die;
    // Validate whether selected file is a CSV file
    if (!empty($_FILES['csv']['name']) && in_array($_FILES['csv']['type'], $fileMimes)) {

        // Open uploaded CSV file with read-only mode
        $csvFile = fopen($_FILES['csv']['tmp_name'], 'r');

        // Skip the first line
        fgetcsv($csvFile);

        // Parse data from CSV file line by line
        // Parse data from CSV file line by line
        while (($getData = fgetcsv($csvFile, 500, ",")) !== FALSE) {
            // Get row data
            $kode = $getData[0];
            $mata_kuliah = $getData[1];
            $dosen = $getData[2];
            $kelas = $getData[3];
            $jenis_kelas = $getData[4];
            $sks = $getData[5];
            $semester = $getData[6];
            // If user already exists in the database with the same kode
            $sql = "SELECT kode FROM matakuliah WHERE kode = '" . $kode . "'";
            $checkRows = mysqli_query($kon, $sql);
            if ($checkRows->num_rows > 0) {
                mysqli_query($kon, "UPDATE matakuliah SET mata_kuliah = '$mata_kuliah', dosen = '$dosen', kelas = '$kelas', jenis_kelas='$jenis_kelas', sks='$sks', semester='$semester'WHERE kode = '$kode'");
            } else {
                mysqli_query($kon, "INSERT INTO matakuliah (kode,mata_kuliah,dosen,kelas,jenis_kelas,sks,semester) VALUES ('$kode', '$mata_kuliah', '$dosen', '$kelas', '$jenis_kelas', '$sks', '$semester')");
            }
        }
        // Close opened CSV file
        fclose($csvFile);
        echo "<script>alert('Data Berhasil di Import');</script>";
        echo "<script> location.href ='http://localhost/psibw/matakuliah.php'; </script>";
    }
}

function importCSVambilMK()
{
    global $kon;
    // Allowed mime types
    $fileMimes = array(
        'text/x-comma-separated-values',
        'text/comma-separated-values',
        'application/octet-stream',
        'application/vnd.ms-excel',
        'application/x-csv',
        'text/x-csv',
        'text/csv',
        'application/csv',
        'application/excel',
        'application/vnd.msexcel',
        'text/plain'
    );

    // var_dump($_FILES);die;
    // Validate whether selected file is a CSV file
    if (!empty($_FILES['csv']['name']) && in_array($_FILES['csv']['type'], $fileMimes)) {

        // Open uploaded CSV file with read-only mode
        $csvFile = fopen($_FILES['csv']['tmp_name'], 'r');

        // Skip the first line
        fgetcsv($csvFile);

        // Parse data from CSV file line by line
        // Parse data from CSV file line by line
        while (($getData = fgetcsv($csvFile, 500, ",")) !== FALSE) {
            // Get row data
            $kode = $getData[0];
            $mata_kuliah = $getData[1];
            $dosen = $getData[2];
            $jenis_kelas = $getData[3];
            $hari = $getData[4];
            $waktu = $getData[5];
            $ruangan = $getData[6];
            $sks = $getData[7];
            // If user already exists in the database with the same kode
            $sql = "SELECT kode FROM ambilkuliah WHERE kode = '" . $kode . "'";
            $checkRows = mysqli_query($kon, $sql);
            if ($checkRows->num_rows > 0) {
                mysqli_query($kon, "UPDATE ambilkuliah SET mata_kuliah = '$mata_kuliah', dosen = '$dosen', jenis_kelas='$jenis_kelas', hari='$hari', waktu='$waktu', ruangan='$ruangan',sks='$sks'WHERE kode = '$kode'");
            } else {
                mysqli_query($kon, "INSERT INTO ambilkuliah (kode,mata_kuliah,dosen, jenis_kelas, hari, waktu, ruangan, sks) VALUES ('$kode', '$mata_kuliah', '$dosen', '$jenis_kelas', '$hari', '$waktu', '$ruangan', '$sks')");
            }
        }
        // Close opened CSV file
        fclose($csvFile);
        echo "<script>alert('Data Berhasil di Import');</script>";
        echo "<script> location.href ='http://localhost/psibw/ambilkuliah.php'; </script>";
    }
}
