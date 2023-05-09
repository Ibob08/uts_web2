<?php

require_once "app/func.php";

$func = new func();

$rows = $func->tampil();

if(isset($_GET["cari"])){
    $rows = $func->cari($_GET["alamat"]);
}
if(isset($_GET['simpan'])) $vsimpan =$_GET['simpan'];
else $vsimpan ='';
if(isset($_GET['update'])) $vupdate =$_GET['update'];
else $vupdate ='';
if(isset($_GET['reset'])) $vreset =$_GET['reset'];
else $vreset ='';

if(isset($_GET['aksi'])) $vaksi =$_GET['aksi'];
else $vaksi ='';
if(isset($_GET['idp'])) $vidp =$_GET['idp'];
else $vidp ='';
if(isset($_GET['nama'])) $vnama =$_GET['nama'];
else $vnama ='';
if(isset($_GET['alamat'])) $valamat =$_GET['alamat'];
else $valamat ='';
if(isset($_GET['telp'])) $vtelp =$_GET['telp'];
else $vtelp ='';

if($vsimpan=='simpan' && ($vidp <>''||$vnama <>''||$valamat <>''||$vtelp <>'')){
    $func->simpan();
    $rows = $func->tampil();
    $vidp ='';
    $vnama='';
    $valamat ='';
    $vtelp ='';
}

if($vaksi=="hapus")  {
    $func->hapus();
    $rows = $func->tampil();
}

 if($vaksi=="lihat_update")  {
    $urows = $func->tampil_update();
    foreach ($urows as $row) {
        $vidp = $row['pel_id'];
        $vnama = $row['pel_nama'];
        $valamat = $row['pel_alamat'];
        $vtelp = $row['pel_telp'];
    }
 }

if ($vupdate=="update"){
    $func->update($vidp,$vnama,$valamat,$vtelp);
    $rows = $func->tampil();
    $vidp ='';
    $vnama ='';
    $valamat ='';
    $vtelp ='';
}
if ($vreset=="reset"){
    $vidp ='';
    $vnama ='';
    $valamat ='';
    $vtelp ='';
}
if ($vaksi=="cari"){
    $rows = $func->cari("alamat");
    
    
    
}
?>

<form action="?" method="get">
<table>
    <tr><td>Id Pelanggan</td><td>:</td><td>
    <input type="text" name="idp" value="<?php echo $vidp; ?>" /></td></tr>
    <tr><td>Nama</td><td>:</td><td>
    <input type="text" name="nama" value="<?php echo $vnama; ?>" /></td></tr>
    <tr><td>Alamat</td><td>:</td><td><input type="text" name="alamat" value="<?php echo $valamat; ?>"/></td></tr>
    <tr><td>No. Telepon</td><td>:</td><td><input type="text" name="telp" value="<?php echo $vtelp; ?>"/></td></tr>
    <tr><td></td><td></td><td><input type="submit" name='simpan' value="simpan"/>
    <input type="submit" name='update' value="update"/><input type="submit" name='reset' value="reset"/>
    <input type="submit" name='cari' value="cari"/></td></tr>

</table>
</form>



    <table border="1px">
    <tr>
        <td>Id Pelanggan</td>
        <td>Nama</td>
        <td>Alamat</td>
        <td>No. Telepon</td>
        <td>AKSI</td>
    </tr>

    <?php foreach ($rows as $row) { ?>
        <tr>
            <td><?php echo $row['pel_id']; ?></td>
            <td><?php echo $row['pel_nama']; ?></td>
            <td><?php echo $row['pel_alamat']; ?></td>
            <td><?php echo $row['pel_telp']; ?></td>
            <td><a href="?pel_id=<?php echo $row['pel_id']; ?>&aksi=hapus">Hapus</a>&nbsp;&nbsp;&nbsp;
                <a href="?pel_id=<?php echo $row['pel_id']; ?>&aksi=lihat_update">Update</a>&nbsp;&nbsp;&nbsp;
                <a href="mobil.php">Mobil</a> ||
                <a href="rental.php">Rental</a></td>
        </tr>
    <?php } ?>
 </table>