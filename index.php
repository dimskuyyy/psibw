<?php
include 'function.php';
$resID = getMahasiswa();
$listID = ';';
for ($i = 0; $i < count($resID); $i++) {
    $listID = $listID . $resID[$i][0] . ';';
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['tambah'])) {
        $success = tambah();
    } else if (isset($_POST['hapus'])) {
        delete();
    } else if (isset($_POST['edit'])) {
        $successEdit = edit();
    } else if (isset($_POST['CSVUpload'])) {
        importCSVmhs();
    }
}
if (isset($_GET)) {
    if (isset($_GET['id'])) {
        getData($_GET['id']);
        die;
    }
}
if (isset($_POST['search'])) {
    $mhs = tabelSearch('mhs_web', 'nama', $_POST['cari']);
} else {
    $mhs = tabel();
}
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="icon" type="svg" href="img/icon.svg" />
    <title>SIILKOM</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="script.js"></script>
    <script src="https://kit.fontawesome.com/6ade6421e7.js" crossorigin="anonymous"></script>
</head>

<body>
    <header>
        <div class="header-container">
            <div class="navbar-logo">
                <a href="index.php">
                    <img src="img/icon.svg" alt="logo">
                    <p><b>Sistem Informasi</b> Ilmu Komputer</p>
                </a>
            </div>
            <nav class="nav">
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <div class="container">
        <aside>
            <!-- <h2>Sidebar</h2> -->
            <ul>
                <li><a href="index.php" class="active"><i class='fas fa-solid fa-users-rectangle'></i> Data Mahasiswa</a></li>
                <li><a href="dosen.php"><i class='fas fa-solid fa-user-graduate'></i> Data Dosen</a></li>
                <li><a href="matakuliah.php"><i class='fas fa-book'></i> Data Mata Kuliah</a></li>
                <li><a href="ambilkuliah.php"><i class='fas fa-book-open'></i> Data Ambil Kuliah</a></li>
            </ul>
        </aside>
        <main>
            <h2>Data Mahasiswa</h2>
            <form method="post" action="http://localhost/psibw/index.php">
                <div style="display: flex; justify-content: space-between;">
                    <div>
                        <button class="button" type="button" onclick="openModal()">Tambah</button>
                        <button class="button" type="button" onclick="openCSVModal()">Import CSV</button>
                        <button class="button-danger" id="hapus" name="hapus" disabled>Hapus</button>

                    </div>
                    <div>
                        <input type="text" style="padding:8px; height: 38px; margin-right:4px; width:200px" name="cari">
                        <button type="submit" name="search" class="button">Cari</button>
                    </div>
                </div>


                <table id="mhs">
                    <tr>
                        <th style="text-align: center;">NO</th>
                        <th style="text-align: center;">NIM</th>
                        <th style="text-align: center;">NAMA</th>
                        <th style="text-align: center;">JENIS KELAMIN</th>
                        <th style="text-align: center;">AGAMA</th>
                        <th style="text-align: center;">TANGGAL LAHIR</th>
                        <th style="text-align: center;">PRODI</th>
                        <th style="text-align: center;">STATUS</th>
                        <th style="text-align: center;">ALAMAT</th>
                        <th style="text-align: center;">AKSI</th>
                        <th style="text-align: center;"><input type="checkbox" id="deleteAll" onchange="handleChange(this,'<?php echo $listID; ?>')"></th>
                    </tr>
                    <tr>
                        <?php
                        $no = 1;
                        foreach ($mhs as $row) {
                            $jenis_kelamin = $row['jenis_kelamin'] == '0' ? 'Perempuan' : 'Laki-Laki';
                            echo "<tr>
                                <td style='text-align:center;'>$no</td>
                                <td>" . $row['nim'] . "</td><td>" . $row['nama'] . "</td><td>" . $jenis_kelamin . "</td>";
                            if ($row['agama'] == 1) {
                                $agama = 'Islam';
                            } else if ($row['agama'] == 2) {
                                $agama = 'Kristen';
                            } else if ($row['agama'] == 3) {
                                $agama = 'Khatolik';
                            } else if ($row['agama'] == 4) {
                                $agama = 'Hindu';
                            } else if ($row['agama'] == 5) {
                                $agama = 'Budha';
                            }

                            echo "<td>" . $agama . "</td>";
                            if ($row['prodi'] == "603125") {
                                $prodi = "Manajemen Informatika";
                            } else if ($row['prodi'] == "603124") {
                                $prodi = "Sistem Informasi";
                            }

                            $dateFormatter = datefmt_create(
                                'id-ID',
                                IntlDateFormatter::FULL,
                                IntlDateFormatter::FULL,
                                'Asia/Jakarta',
                                IntlDateFormatter::GREGORIAN,
                                'dd MMMM yyyy'
                            );
                            $tanggalLahir = $dateFormatter->format(new DateTime($row['tanggal_lahir']));

                            echo "<td>" . $tanggalLahir . "</td>";
                            echo "<td>" . $prodi . "</td>";

                            if ($row['status'] == 1) {
                                $status = 'Aktif';
                            } else if ($row['status'] == 2) {
                                $status = 'Cuti';
                            } else if ($row['status'] == 3) {
                                $status = 'Alpa Studi';
                            } else if ($row['status'] == 4) {
                                $status = 'Semhas';
                            } else if ($row['status'] == 5) {
                                $status = 'Kompre';
                            } else if ($row['status'] == 6) {
                                $status = 'Alumni';
                            }
                            echo "<td>$status</td><td>$row[alamat]</td>
                                <td style='text-align:center;'>
                                <button class=" . '"button-warning"' . " type='button' onclick='reqData(" . $row['id_mahasiswa'] . ")' data-mhs='" . $row['id_mahasiswa'] . "'>Edit</button>
                                </td>";
                            echo "<td style='text-align:center;'><input type='checkbox' id='delete' name='delete[]' onclick='EnableDisableButton(this, " . $row['id_mahasiswa'] . ")' value='" . $row['id_mahasiswa'] . "'></td>";
                            $no++;
                        }
                        ?>
                    </tr>
                </table>
            </form>
            <!-- tambah -->
            <div id="myModal" class="modal">
                <div class="modal-content">
                    <span class="close" onclick="closeModal()">&times;</span>
                    <h2>Tambah Data Mahasiswa</h2>
                    <!-- <form>
                        <label for="name">Nama:</label>
                        <input type="text" id="name" name="name" required><br>

                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" required><br>

                        <input type="submit" value="Submit">
                    </form> -->
                    <div class="form-container">
                        <form action="http://localhost/psibw/index.php" method="post">
                            <div class="row">
                                <div class="col-25">
                                    <label for="no">ID</label>
                                </div>
                                <div class="col-75">
                                    <input type="text" id="no" name="no" value="<?= tampilData('mhs_web') ?>" placeholder="..." disabled>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-25">
                                    <label for="nim">NIM</label>
                                </div>
                                <div class="col-75">
                                    <input type="text" id="nim" name="nim" value="<?php echo $nim; ?>" placeholder="nim...">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-25">
                                    <label for="nama">Nama</label>
                                </div>
                                <div class="col-75">
                                    <input type="text" id="nama" name="nama" value="<?php echo $nama; ?>" placeholder="nama...">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-25">
                                    <label for="jenis_kelamin">Jenis Kelamin</label>
                                </div>
                                <?php
                                $selectedJenisKelamin = 0;
                                if (!empty($jenis_kelamin)) {
                                    switch ($jenis_kelamin) {
                                        case '0':
                                            $selectedJenisKelamin = 1;
                                            break;
                                        case '1':
                                            $selectedJenisKelamin = 0;
                                            break;
                                    }
                                }
                                ?>
                                <div class="col-75">
                                    <input type="radio" id="jenis_kelamin" name="jenis_kelamin" value="1" <?php echo ($selectedJenisKelamin == 0 ? 'checked' : ''); ?>>
                                    <label for="jenis_kelamin">Laki-laki</label>
                                    <input type="radio" id="jenis_kelamin" name="jenis_kelamin" value="0" <?php echo ($selectedJenisKelamin == 1 ? 'checked' : ''); ?>>
                                    <label for="jenis_kelamin">Perempuan</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-25">
                                    <label for="agama">Agama</label>
                                </div>
                                <div class="col-75">
                                    <select id="agama" name="agama">
                                        <option>Pilih Agama</option>
                                        <option value="1">Islam</option>
                                        <option value="2">Kristen</option>
                                        <option value="3">Khatolik</option>
                                        <option value="4">Hindu</option>
                                        <option value="5">Budha</option>
                                    </select>

                                    <?php
                                    $selectedAgama = 0;
                                    if (!empty($agama)) {
                                        switch ($agama) {
                                            case '1':
                                                $selectedAgama = 0;
                                                break;
                                            case '2':
                                                $selectedAgama = 1;
                                                break;
                                            case '3':
                                                $selectedAgama = 2;
                                                break;
                                            case '4':
                                                $selectedAgama = 3;
                                                break;
                                            case '5':
                                                $selectedAgama = 4;
                                                break;
                                        }
                                    }
                                    ?>
                                    <script>
                                        document.querySelector('#agama').selectedIndex = <?= $selectedAgama ?>;
                                    </script>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-25">
                                    <label for="tanggal_lahir">Tanggal Lahir</label>
                                </div>
                                <div class="col-75">
                                    <input type="date" id="tanggal_lahir" name="tanggal_lahir" <?php echo $tanggal_lahir; ?> style="height:38px">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-25">
                                    <label for="prodi">Prodi</label>
                                </div>
                                <div class="col-75">
                                    <input type="radio" id="prodi" name="prodi" value="603124" <?= ($prodi == '603124' ? 'checked' : '') ?>>
                                    <label for="prodi">Sistem Informasi</label>
                                    <input type="radio" id="prodi" name="prodi" value="603125" <?= ($prodi == '603125' ? 'checked' : '') ?>>
                                    <label for="prodi">Manajemen Informatika</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-25">
                                    <label for="status">Status</label>
                                </div>
                                <div class="col-75">
                                    <select id="status" name="status">
                                        <option>Pilih Status</option>
                                        <option value="1">Aktif</option>
                                        <option value="2">Cuti</option>
                                        <option value="3">Alpa Studi</option>
                                        <option value="4">Semhas</option>
                                        <option value="5">Kompre</option>
                                        <option value="6">Alumni</option>
                                    </select>

                                    <?php
                                    $selectedStatus = 0;
                                    if (!empty($status)) {
                                        switch ($status) {
                                            case '1':
                                                $selectedStatus = 0;
                                                break;
                                            case '2':
                                                $selectedStatus = 1;
                                                break;
                                            case '3':
                                                $selectedStatus = 2;
                                                break;
                                            case '4':
                                                $selectedStatus = 3;
                                                break;
                                            case '5':
                                                $selectedStatus = 4;
                                                break;
                                            case '6':
                                                $selectedStatus = 5;
                                                break;
                                        }
                                    }
                                    ?>
                                    <script>
                                        document.querySelector('#status').selectedIndex = <?=
                                                                                            $selectedStatus ?>;
                                    </script>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-25">
                                    <label for="alamat">Alamat</label>
                                </div>
                                <div class="col-75">
                                    <textarea id="alamat" name="alamat" value="<?php echo $alamat; ?>" placeholder="alamat..." style="height:100px"></textarea>
                                </div>
                            </div>
                            <br>

                            <?php
                            if (!empty($success)) {
                                echo "<script>alert('$success');</script>";
                                echo "<script> location.href ='http://localhost/psibw'; </script>";
                            }
                            ?>

                            <div class="row">
                                <input type="submit" name="tambah" value="Submit">
                                <button id="cancel-btn" type="button" onclick="closeModal()">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- edit -->
            <div id="myEdit" class="modal">
                <div class="modal-content">
                    <span class="close" onclick="closeEdit()">&times;</span>
                    <h2>Edit Data Mahasiswa</h2>
                    <div class="form-container">
                        <form action="http://localhost/psibw/index.php" method="post">
                            <div class="row" style="position: absolute;left:-9999px">
                                <div class="col-25">
                                    <label for="noEdit">ID</label>
                                </div>
                                <div class="col-75">
                                    <input type="text" id="noEdit" name="no" placeholder="...">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-25">
                                    <label for="nimEdit">NIM</label>
                                </div>
                                <div class="col-75">
                                    <input type="text" id="nimEdit" name="nim" placeholder="nim...">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-25">
                                    <label for="namaEdit">Nama</label>
                                </div>
                                <div class="col-75">
                                    <input type="text" id="namaEdit" name="nama" placeholder="nama...">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-25">
                                    <label for="jenis_kelaminEdit">Jenis Kelamin</label>
                                </div>
                                <div class="col-75">
                                    <input type="radio" id="laki" name="jenis_kelaminEdit" value="1">
                                    <label for="laki">Laki-laki</label>
                                    <input type="radio" id="perempuan" name="jenis_kelaminEdit" value="0">
                                    <label for="perempuan">Perempuan</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-25">
                                    <label for="agama">Agama</label>
                                </div>
                                <div class="col-75">
                                    <select id="agamaEdit" name="agama">
                                        <option>Pilih Agama</option>
                                        <option value="1">Islam</option>
                                        <option value="2">Kristen</option>
                                        <option value="3">Khatolik</option>
                                        <option value="4">Hindu</option>
                                        <option value="5">Budha</option>
                                    </select>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-25">
                                    <label for="tanggal_lahirEdit">Tanggal Lahir</label>
                                </div>
                                <div class="col-75">
                                    <input type="date" id="tanggal_lahirEdit" name="tanggal_lahir" style="height:38px">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-25">
                                    <label for="prodi">Prodi</label>
                                </div>
                                <div class="col-75">
                                    <input type="radio" id="prodi" name="prodiEdit" value="603124">
                                    <label for="prodi">Sistem Informasi</label>
                                    <input type="radio" id="prodi" name="prodiEdit" value="603125">
                                    <label for="prodi">Manajemen Informatika</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-25">
                                    <label for="status">Status</label>
                                </div>
                                <div class="col-75">
                                    <select id="statusEdit" name="status">
                                        <option>Pilih Status</option>
                                        <option value="1">Aktif</option>
                                        <option value="2">Cuti</option>
                                        <option value="3">Alpa Studi</option>
                                        <option value="4">Semhas</option>
                                        <option value="5">Kompre</option>
                                        <option value="6">Alumni</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-25">
                                    <label for="alamatEdit">Alamat</label>
                                </div>
                                <div class="col-75">
                                    <textarea id="alamatEdit" name="alamat" placeholder="alamat..." style="height:100px"></textarea>
                                </div>
                            </div>
                            <br>

                            <?php
                            if (!empty($successEdit)) {
                                echo "<script>alert('$successEdit');</script>";
                                echo "<script> location.href ='http://localhost/psibw'; </script>";
                            }
                            ?>

                            <div class="row">
                                <input type="submit" name="edit" value="Submit">
                                <button id="cancel-btn" type="button" onclick="closeEdit()">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- CSV -->
            <div id="CSVForm" class="modal">
                <div class="modal-content" style="width: 50%!important;">
                    <span class="close" onclick="closeCSVForm()">&times;</span>
                    <h2>Tambah Data Mahasiswa (CSV)</h2>
                    <div class="form-container">
                        <form action="http://localhost/psibw/index.php" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-25">
                                    <label for="csv">Input File CSV</label>
                                </div>
                                <div class="col-75">
                                    <input type="file" name="csv" id="csv" style="padding: 12px 0px;" required accept=".csv">
                                </div>
                            </div>
                            <?php
                            // if (!empty($successCSV)) {
                            //     echo "<script>alert('$successCSV');</script>";
                            //     echo "<script> location.href ='http://localhost/psibw'; </script>";
                            // }
                            ?>

                            <div class="row">
                                <input type="submit" name="CSVUpload" value="Submit">
                                <button id="cancel-btn" type="button" onclick="closeCSVForm()">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <footer>
        <div class="footer-container">
            <p>Copyright &copy; 2023 RZK</p>
            <!-- <ul>
                <li><a href="#">Privacy Policy</a></li>
                <li><a href="#">Terms of Service</a></li>
                <li><a href="#">Contact</a></li>
            </ul> -->
            <a>PSIBW #ProjectUAS</a>
        </div>
    </footer>
</body>

</html>