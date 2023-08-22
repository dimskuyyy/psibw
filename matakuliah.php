<?php
include 'function.php';
$resID = getMahasiswa();
$listID = ';';
for ($i = 0; $i < count($resID); $i++) {
    $listID = $listID . $resID[$i][0] . ';';
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['tambah'])) {
        $success = tambahMK();
    } else if (isset($_POST['hapus'])) {
        deleteMK();
    } else if (isset($_POST['edit'])) {
        $successEdit = editMK();
    } else if (isset($_POST['CSVUpload'])) {
        importCSVMK();
    }
}
if (isset($_GET)) {
    if (isset($_GET['id'])) {
        getDataMK($_GET['id']);
        die;
    }
}
if (isset($_POST['search'])) {
    $mk = tabelSearch('matakuliah', 'mata_kuliah', $_POST['cari']);
} else {
    $mk = tabelMK();
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
                <a href="index.html">
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
                <li><a href="index.php"><i class='fas fa-solid fa-users-rectangle'></i> Data Mahasiswa</a></li>
                <li><a href="dosen.php"><i class='fas fa-solid fa-user-graduate'></i> Data Dosen</a></li>
                <li><a href="matakuliah.php" class="active"><i class='fas fa-book'></i> Data Mata Kuliah</a></li>
                <li><a href="ambilkuliah.php"><i class='fas fa-book-open'></i> Data Ambil Kuliah</a></li>
            </ul>
        </aside>
        <main>
            <h2>Data Mata Kuliah</h2>
            <form method="post" action="http://localhost/psibw/matakuliah.php">
                <div style="display: flex; justify-content: space-between;">
                    <div>
                        <button class="button" type="button" onclick="openModal()">Tambah</button>
                        <button class="button" type="button" onclick="openCSVModal()">Import CSV</button>
                        <button class="button-danger" id="hapus" name="hapus" disabled>Hapus</button>
                    </div>
                    <div style="display: flex; align-items: center;">
                        <input type="text" style="padding:8px; height: 38px; margin-right:4px; width:200px" name="cari">
                        <button type="submit" name="search" class="button">Cari</button>
                    </div>
                </div>

                <table id="mhs">
                    <tr>
                        <th style="text-align: center;">NO</th>
                        <th style="text-align: center;">KODE</th>
                        <th style="text-align: center;">MATA KULIAH</th>
                        <th style="text-align: center;">DOSEN</th>
                        <th style="text-align: center;">KELAS</th>
                        <th style="text-align: center;">JENIS KELAS</th>
                        <th style="text-align: center;">SKS</th>
                        <th style="text-align: center;">SEMESTER</th>
                        <th style="text-align: center;">AKSI</th>
                        <th style="text-align: center;"><input type="checkbox" id="deleteAll" onchange="handleChange(this,'<?php echo $listID; ?>')"></th>
                    </tr>
                    <tr>
                        <?php
                        $no = 1;
                        foreach ($mk as $row) {
                            echo "<tr>
                                <td style='text-align:center;'>$no</td>
                                <td>" . $row['kode'] . "</td><td>" . $row['mata_kuliah'] . "</td><td>" . $row['dosen'] . "</td><td>" . $row['kelas'] . "</td><td>" . $row['jenis_kelas'] . "</td><td>" . $row['sks'] . " SKS</td><td>Semester " . $row['semester'] . "</td>";
                            echo "
                                <td style='text-align:center;'>
                                <button class=" . '"button-warning"' . " type='button' onclick='reqDataMK(" . $row['id_matkul'] . ")' data-mhs='" . $row['id_matkul'] . "'>Edit</button>
                                </td>";
                            echo "<td style='text-align:center;'><input type='checkbox' id='delete' name='delete[]' onclick='EnableDisableButton(this, " . $row['id_matkul'] . ")' value='" . $row['id_matkul'] . "'></td>";
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
                    <h2>Tambah Data Mata Kuliah</h2>
                    <!-- <form>
                        <label for="name">Nama:</label>
                        <input type="text" id="name" name="name" required><br>

                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" required><br>

                        <input type="submit" value="Submit">
                    </form> -->
                    <div class="form-container">
                        <form action="http://localhost/psibw/matakuliah.php" method="post">
                            <div class="row">
                                <div class="col-25">
                                    <label for="no">ID</label>
                                </div>
                                <div class="col-75">
                                    <input type="text" id="no" name="no" value="<?= tampilData('matakuliah') ?>" placeholder="..." disabled>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-25">
                                    <label for="kode">Kode MK</label>
                                </div>
                                <div class="col-75">
                                    <input type="text" id="kode" name="kode" placeholder="kode...">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-25">
                                    <label for="mata_kuliah">Mata Kuliah</label>
                                </div>
                                <div class="col-75">
                                    <input type="text" id="mata_kuliah" name="mata_kuliah" placeholder="mata_kuliah...">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-25">
                                    <label for="dosen">Dosen Pengampu</label>
                                </div>
                                <div class="col-75">
                                    <input type="text" id="dosen" name="dosen" placeholder="dosen...">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-25">
                                    <label for="kelas">Kelas</label>
                                </div>
                                <div class="col-75">
                                    <input type="text" id="kelas" name="kelas" placeholder="kelas...">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-25">
                                    <label for="jenis_kelas">Jenis Kelas</label>
                                </div>
                                <div class="col-75">
                                    <input type="radio" id="reguler" name="jenis_kelas" value="Reguler">
                                    <label for="reguler">Reguler</label>
                                    <input type="radio" id="bersyarat" name="jenis_kelas" value="Bersyarat">
                                    <label for="bersyarat">Bersyarat</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-25">
                                    <label for="sks">SKS</label>
                                </div>
                                <div class="col-75">
                                    <select id="sks" name="sks">
                                        <option>Pilih SKS</option>
                                        <option value="1">1 SKS</option>
                                        <option value="2">2 SKS</option>
                                        <option value="3">3 SKS</option>
                                        <option value="4">4 SKS</option>
                                        <option value="6">6 SKS</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-25">
                                    <label for="semester">semester</label>
                                </div>
                                <div class="col-75">
                                    <select id="semester" name="semester">
                                        <option>Pilih semester</option>
                                        <option value="1">Semester 1</option>
                                        <option value="2">Semester 2</option>
                                        <option value="3">Semester 3</option>
                                        <option value="4">Semester 4</option>
                                        <option value="5">Semester 5</option>
                                        <option value="6">Semester 6</option>
                                        <option value="7">Semester 7</option>
                                        <option value="8">Semester 8</option>
                                    </select>
                                </div>
                            </div>
                            <br>

                            <?php
                            if (!empty($success)) {
                                echo "<script>alert('$success');</script>";
                                echo "<script> location.href ='http://localhost/psibw/matakuliah.php'; </script>";
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
                    <h2>Edit Data Mata Kuliah</h2>
                    <div class="form-container">
                        <form action="http://localhost/psibw/matakuliah.php" method="post">
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
                                    <label for="kodeEdit">Kode MK</label>
                                </div>
                                <div class="col-75">
                                    <input type="text" id="kodeEdit" name="kode" placeholder="kode...">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-25">
                                    <label for="mata_kuliahEdit">Mata Kuliah</label>
                                </div>
                                <div class="col-75">
                                    <input type="text" id="mata_kuliahEdit" name="mata_kuliah" placeholder="mata_kuliah...">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-25">
                                    <label for="dosenEdit">Dosen Pengampu</label>
                                </div>
                                <div class="col-75">
                                    <input type="text" id="dosenEdit" name="dosen" placeholder="dosen...">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-25">
                                    <label for="kelasEdit">Kelas</label>
                                </div>
                                <div class="col-75">
                                    <input type="text" id="kelasEdit" name="kelas" placeholder="kelas...">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-25">
                                    <label for="jenis_kelas">Jenis Kelas</label>
                                </div>
                                <div class="col-75">
                                    <input type="radio" id="reguler" name="jenis_kelasEdit" value="Reguler">
                                    <label for="reguler">Reguler</label>
                                    <input type="radio" id="bersyarat" name="jenis_kelasEdit" value="Bersyarat">
                                    <label for="bersyarat">Bersyarat</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-25">
                                    <label for="sksEdit">SKS</label>
                                </div>
                                <div class="col-75">
                                    <select id="sksEdit" name="sks">
                                        <option>Pilih SKS</option>
                                        <option value="1">1 SKS</option>
                                        <option value="2">2 SKS</option>
                                        <option value="3">3 SKS</option>
                                        <option value="4">4 SKS</option>
                                        <option value="6">6 SKS</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-25">
                                    <label for="semesterEdit">semester</label>
                                </div>
                                <div class="col-75">
                                    <select id="semesterEdit" name="semester">
                                        <option>Pilih semester</option>
                                        <option value="1">Semester 1</option>
                                        <option value="2">Semester 2</option>
                                        <option value="3">Semester 3</option>
                                        <option value="4">Semester 4</option>
                                        <option value="5">Semester 5</option>
                                        <option value="6">Semester 6</option>
                                        <option value="7">Semester 7</option>
                                        <option value="8">Semester 8</option>
                                    </select>
                                </div>
                            </div>
                            <br>

                            <?php
                            if (!empty($successEdit)) {
                                echo "<script>alert('$successEdit');</script>";
                                echo "<script> location.href ='http://localhost/psibw/matakuliah.php'; </script>";
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
                    <h2>Tambah Data Dosen (CSV)</h2>
                    <div class="form-container">
                        <form action="http://localhost/psibw/matakuliah.php" method="post" enctype="multipart/form-data">
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