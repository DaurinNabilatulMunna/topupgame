<?php
include 'Client_topup.php';
include 'Client_detail.php';

session_start();

// Cek apakah pengguna sudah login atau belum
if (!isset($_SESSION['login'])) {
    header("Location: login.php"); // Arahkan ke halaman login jika belum login
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>CinaShop</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.php">CinaShop || Top Up Games</a>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="detailgame.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Detail Game
                            </a>
                            <a class="nav-link" href="topup.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Top Up
                            </a>
                            <a class="nav-link" href="game.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Game
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Admin
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Top Up</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Top Up</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header py-3">
                                <div class="row">
                                    <div class="col-6">
                                        <h6 class="m-0 font-weight-bold text-primary">Tabel Top Up Game</h6>                                             
                                    </div>
                                    <div class="col-6 text-end">
                                        <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambah">Tambah Top Up Game</button>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>ID Top Up</th>
                                            <th>Nama Game</th>
                                            <th>Top Up</th>
                                            <th>Harga</th>
                                            <th>Pembayaran</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        $data_array = $api_topup->tampil_semua_topup();
                                        foreach ($data_array as $r) {
                                        ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $r->nama_game ?></td>
                                            <td><?= $r->topup ?></td>
                                            <td><?= $r->harga ?></td>
                                            <td><?= $r->pembayaran ?></td>
                                            <td>
                                                <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#edit<?= $r->id_topup ?>">Edit</a>
                                                <a href="proses_topup.php?aksi=hapus&id_topup=<?= $r->id_topup ?>" onclick="return confirm('Apakah Anda ingin menghapus data ini?')" class="btn btn-danger">Hapus</a>
                                            </td>
                                        </tr>
                                        <!-- Edit Anggota Modal -->
                                        <div class="modal fade" id="edit<?= $r->id_topup ?>" role="dialog">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Edit Top Up Game</h5>
                                                            <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <form action="proses_topup.php" method="POST" enctype="multipart/form-data">
                                                            <div class="modal-body">
                                                                <input type="hidden" class="form-control" name="aksi" value="ubah" required>
                                                                <input type="hidden" class="form-control" name="id_topup" value="<?= $r->id_topup ?>" required>
                                                                <div class="form-group">
                                                                    <select class="form-select" aria-label="Default select example" name="id_detailgame">
                                                                        <option selected>Pilih Game</option>
                                                                        <?php
                                                                            $data_array = $api_detail->tampil_semua_detailgame();
                                                                            foreach ($data_array as $s) {
                                                                        ?>
                                                                        <option value="<?= $s->id_detailgame ?>"><?= $s->nama_game ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label" for="topup">Top Up Game</label>
                                                                    <input type="text" class="form-control" name="topup" value="<?= $r->topup ?>" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label" for="harga">Harga Top Up Game</label>
                                                                    <input type="text" class="form-control" name="harga" value="<?= $r->harga ?>" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label" for="pembayaran">Pembayaran Top Up Game</label>
                                                                    <input type="text" class="form-control" name="pembayaran" value="<?= $r->pembayaran ?>" required>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button class="btn btn-danger" type="reset">Reset</button>
                                                                    <button class="btn btn-primary" type="submit" name="bsimpan">Simpan</button>
                                                                </div>                    
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <!-- Tambah Anggota Modal -->
        <div class="modal fade" id="tambah" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Top Up Game</h5>
                        <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <form action="proses_topup.php" method="POST" enctype="multipart/form-data">
                        <div class="modal-body">
                            <input type="hidden" class="form-control" name="aksi" value="tambah" required>
                            <div class="form-group">
                            <select class="form-select" aria-label="Default select example" name="id_detailgame">
                                <option selected>Pilih Game</option>
                                <?php
                                    $data_array = $api_detail->tampil_semua_detailgame();
                                    foreach ($data_array as $r) {
                                ?>
                                <option value="<?= $r->id_detailgame ?>"><?= $r->nama_game ?></option>
                                <?php } ?>
                            </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="topup">Top Up Game</label>
                                <input type="text" class="form-control" name="topup" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="harga">Harga Top Up Game</label>
                                <input type="text" class="form-control" name="harga" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="pembayaran">Pembayaran Top Up Game</label>
                                <input type="text" class="form-control" name="pembayaran" required>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-danger" type="reset">Reset</button>
                                <button class="btn btn-primary" type="submit" name="bsimpan">Simpan</button>
                            </div>                    
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
