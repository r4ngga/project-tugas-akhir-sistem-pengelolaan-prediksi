<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>Nomer Faktur</th>
                <th>Urutan Masuk</th>
                <th>Id Barang</th>
                <th>Nama Barang</th>
                <th>Tanggal</th>
                <th>Harga Beli</th>
                <th>QTY</th>
                <th>Total Harga Beli</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tb_brg_msk as $dtbm) : ?>
                <tr>
                    <td><?php echo $dtbm['no_faktur']; ?></td>
                    <td><?php echo $dtbm['no_urut_masuk']; ?></td>
                    <td><?php echo $dtbm['id_barang']; ?></td>
                    <td><?php echo $dtbm['nama_barang']; ?></td>
                    <td><?php echo $dtbm['tgl_masuk']; ?></td>
                    <td><?php echo $dtbm['harga_beli']; ?></td>
                    <td><?php echo $dtbm['jumlah_brgmsk']; ?></td>
                    <td><?php echo $dtbm['total_harga_beli']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>