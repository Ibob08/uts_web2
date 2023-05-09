<?php

require_once "app/func.php";

$func = new func();

$rows = $func->tampil2();

if(isset($_GET["cari"])){
    $rows = $func->cari2($_GET["nama"]);
}
if(isset($_GET['simpan'])) $vsimpan =$_GET['simpan'];
else $vsimpan ='';
if(isset($_GET['update'])) $vupdate =$_GET['update'];
else $vupdate ='';
if(isset($_GET['reset'])) $vreset =$_GET['reset'];
else $vreset ='';

if(isset($_GET['aksi'])) $vaksi =$_GET['aksi'];
else $vaksi ='';
if(isset($_GET['idm'])) $vidm =$_GET['idm'];
else $vidm ='';
if(isset($_GET['nama'])) $vnama =$_GET['nama'];
else $vnama ='';
if(isset($_GET['jenis'])) $vjenis =$_GET['jenis'];
else $vjenis ='';
if(isset($_GET['warna'])) $vwarna =$_GET['warna'];
else $vwarna ='';
if(isset($_GET['tahun'])) $vtahun =$_GET['tahun'];
else $vtahun ='';
if(isset($_GET['status'])) $vstatus =$_GET['status'];
else $vstatus ='';

if($vsimpan=='simpan' && ($vidm <>''||$vnama <>''||$vjenis <>''||$vwarna <>''
    ||$vtahun <>''||$vstatus <>'')){
    $func->simpan2();
    $rows = $func->tampil2();
    $vidm ='';
    $vnama='';
    $vjenis ='';
    $vwarna ='';
    $vtahun ='';
    $vstatus ='';

}

if($vaksi=="hapus")  {
    $func->hapus2();
    $rows = $func->tampil2();
}

 if($vaksi=="lihat_update")  {
    $urows = $func->tampil_update2();
    foreach ($urows as $row) {
        $vidm = $row['mob_id'];
        $vnama = $row['mob_nama'];
        $vjenis = $row['mob_jenis'];
        $vwarna = $row['mob_warna'];
        $vtahun = $row['mob_tahun'];
        $vstatus = $row['mob_status'];
    }
 }

if ($vupdate=="update"){
    $func->update2($vidm,$vnama,$vjenis,$vwarna,$vtahun,$vstatus);
    $rows = $func->tampil2();
    $vidm ='';
    $vnama ='';
    $vjenis ='';
    $vwarna ='';
    $vtahun ='';
    $vstatus ='';
}
if ($vreset=="reset"){
    $vidm ='';
    $vnama ='';
    $vjenis ='';
    $vwarna ='';
    $vtahun ='';
    $vstatus ='';
}
if ($vaksi=="cari"){
    $rows = $func->cari2("nama");
    
    
    
}
?>

<form action="?" method="get">
<table>
    <tr><td>Id Mobil</td><td>:</td><td>
    <input type="text" name="idm" value="<?php echo $vidm; ?>" /></td></tr>   
    <tr><td>Nama Mobil</td><td>:</td><td>
        <input type="text" name="nama" value="<?php echo $vnama; ?>" /></td></tr>
    <tr><td>Jenis Mobil</td><td>:</td><td>
        <input type="text" name="jenis" value="<?php echo $vjenis; ?>"/></td></tr>
    <tr><td>Warna Mobil</td><td>:</td><td>
        <input type="text" name="warna" value="<?php echo $vwarna; ?>"/></td></tr>
    <tr><td>Tahun Mobil</td><td>:</td><td>
        <input type="text" name="tahun" value="<?php echo $vtahun; ?>"/></td></tr>
    <tr><td>Status</td><td>:</td><td>
        <input type="text" name="status" value="<?php echo $vstatus; ?>"/></td></tr>
    <tr><td></td><td></td><td><input type="submit" name='simpan' value="simpan"/>
    <input type="submit" name='update' value="update"/><input type="submit" name='reset' value="reset"/>
    <input type="submit" name='cari' value="cari"/></td></tr>
</table>
</form>



    <table border="1px">
    <tr>
        <td>Id Mobil</td>
        <td>Nama Mobil</td>
        <td>Jenis Mobil</td>
        <td>Warna Mobil</td>
        <td>Tahun Mobil</td>
        <td>Status </td>
        <td>AKSI</td>
    </tr>

    <?php foreach ($rows as $row) { ?>
        <tr>
            <td><?php echo $row['mob_id']; ?></td>
            <td><?php echo $row['mob_nama']; ?></td>
            <td><?php echo $row['mob_jenis']; ?></td>
            <td><?php echo $row['mob_warna']; ?></td>
            <td><?php echo $row['mob_tahun']; ?></td>
            <td><?php echo $row['mob_status']; ?></td>
            <td><a href="?mob_id=<?php echo $row['mob_id']; ?>&aksi=hapus">Hapus</a>&nbsp;&nbsp;&nbsp;
                <a href="?mob_id=<?php echo $row['mob_id']; ?>&aksi=lihat_update">Update</a>&nbsp;&nbsp;&nbsp;
                <a href="index.php">Kembali</a> ||
                <a href="rental.php">Rental</a></td>
        </tr>
    <?php } ?>
 </table>