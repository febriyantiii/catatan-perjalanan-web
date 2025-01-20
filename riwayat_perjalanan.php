<?php
session_start();
$no = 1;
$data = file('config/catatan.txt', FILE_IGNORE_NEW_LINES);
$user = $_SESSION['nik'] . "|" . $_SESSION['nama_lengkap'];  // User format: NIK|Nama Lengkap

if (isset($_GET['edit'])) {
    $editIndex = $_GET['edit'];

    // Ensure the index exists and the data is properly formatted
    if (isset($data[$editIndex])) {
        $editData = explode("|", $data[$editIndex]);
        
        // Ensure there are enough elements after explode
        if (count($editData) >= 6) {
            // Store the data in variables for use in the edit form
            $nik = $editData[0];
            $nama = $editData[1];
            $tanggal = $editData[2];
            $jam = $editData[3];
            $lokasi = $editData[4];
            $suhu = $editData[5];
        }
    } else {
        echo "Invalid edit index.";
        exit;
    }
}

if (isset($_POST['update'])) {
    // Get the updated data from the form
    $editIndex = $_POST['editIndex'];
    $data[$editIndex] = $_SESSION['nik'] . "|" . $_SESSION['nama_lengkap'] . "|" . $_POST['tanggal'] . "|" . $_POST['jam'] . "|" . $_POST['lokasi'] . "|" . $_POST['suhu'];
    
    // Save the updated data back to the file
    file_put_contents('config/catatan.txt', implode("\n", $data));
    header("Location: ?page=riwayat_perjalanan");
    exit();
}

if (isset($_GET['delete'])) {
    $deleteIndex = $_GET['delete'];

    // Ensure the index exists and the data is properly formatted
    if (isset($data[$deleteIndex])) {
        unset($data[$deleteIndex]);  // Delete the entry
        file_put_contents('config/catatan.txt', implode("\n", $data)); // Save the data back to the file
        header("Location: ?page=riwayat_perjalanan");  // Refresh the page
        exit;
    } else {
        echo "Invalid delete index.";
        exit;
    }
}
?>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Riwayat Perjalanan</h3>
    </div>
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Jam</th>
                    <th>Lokasi Berkunjung</th>
                    <th>Suhu Tubuh</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($data as $key => $value) {
                    $pisah = explode("|", $value);
                    
                    // Ensure there are enough elements in the exploded data
                    if (count($pisah) >= 6) {
                        $userKey = $pisah[0] . "|" . $pisah[1]; // NIK|Nama Lengkap for comparison

                        // Only display the record if the user matches
                        if ($userKey == $user) { ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo htmlspecialchars($pisah[2]); ?></td>
                                <td><?php echo htmlspecialchars($pisah[3]); ?></td>
                                <td><?php echo htmlspecialchars($pisah[4]); ?></td>
                                <td><?php echo htmlspecialchars($pisah[5]); ?></td>
                                <td>
                                    <a href="?page=riwayat_perjalanan&edit=<?php echo $key; ?>" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="?page=riwayat_perjalanan&delete=<?php echo $key; ?>" class="btn btn-danger btn-sm">Hapus</a>
                                </td>
                            </tr>
                        <?php }
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php
// Edit form when editing a record
if (isset($_GET['edit'])) {
    ?>
    <form method="POST" action="?page=riwayat_perjalanan">
        <input type="hidden" name="editIndex" value="<?php echo $editIndex; ?>">
        <div class="form-group">
            <label for="tanggal">Tanggal</label>
            <input type="date" class="form-control" name="tanggal" value="<?php echo $tanggal; ?>" required>
        </div>
        <div class="form-group">
            <label for="jam">Jam</label>
            <input type="time" class="form-control" name="jam" value="<?php echo $jam; ?>" required>
        </div>
        <div class="form-group">
            <label for="lokasi">Lokasi</label>
            <input type="text" class="form-control" name="lokasi" value="<?php echo $lokasi; ?>" required>
        </div>
        <div class="form-group">
            <label for="suhu">Suhu Tubuh</label>
            <input type="text" class="form-control" name="suhu" value="<?php echo $suhu; ?>" required>
        </div>
        <button type="submit" name="update" class="btn btn-primary">Update</button>
    </form>
    <?php
}
?>
