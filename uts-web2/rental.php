<?php

require_once "app/func.php";

$func = new func();

$rows = $func->tampil3();

if(isset($_GET["cari"])){
    $rows = $func->cari3($_GET["idr"]);
}
if(isset($_GET['simpan'])) $vsimpan =$_GET['simpan'];
else $vsimpan ='';
if(isset($_GET['update'])) $vupdate =$_GET['update'];
else $vupdate ='';
if(isset($_GET['reset'])) $vreset =$_GET['reset'];
else $vreset ='';
if(isset($_GET['aksi'])) $vaksi =$_GET['aksi'];
else $vaksi ='';
if(isset($_GET['idr'])) $vidr =$_GET['idr'];
else $vidr='';
if(isset($_GET['idp'])) $vidp =$_GET['idp'];
else $vidp ='';
if(isset($_GET['idm'])) $vidm =$_GET['idm'];
else $vidm ='';
if(isset($_GET['tgl_rental'])) $vtgl_rent =$_GET['tgl_rental'];
else $vtgl_rent ='';
if(isset($_GET['tgl_kembali'])) $vtgl_kbl =$_GET['tgl_kembali'];
else $vtgl_kbl ='';
if(isset($_GET['harga'])) $vhrg =$_GET['harga'];
else $vhrg ='';
if(isset($_GET['jml_hari'])) $vjml_hr =$_GET['jml_hari'];
else $vjml_hr ='';
if(isset($_GET['total_hrg'])) $vtot_hrg =$_GET['total_hrg'];
else $vtot_hrg ='';

if($vsimpan=='simpan' && ($vidr <>''||$vidp <>''||$vidm <>''||$vtgl_rent <>''||$vtgl_kbl <>''||
    $vhrg <>''||$vjml_hr <>''||$vtot_hrg <>'')){
    $func->simpan3();
    $rows = $func->tampil3();
    $vidr ='';
    $vidp ='';
    $vidm ='';
    $vtgl_rent ='';
    $vtgl_kbl ='';
    $vhrg ='';
    $vjml_hr ='';
    $vtot_hrg ='';
}

if($vaksi=="hapus")  {
    $func->hapus3();
    $rows = $func->tampil3();
}

 if($vaksi=="lihat_update")  {
    $urows = $func->tampil_update3();
    foreach ($urows as $row) {
        $vidr = $row['rent_id'];
        $vidp = $row['pel_id'];
        $vidm = $row['mob_id'];
        $vtgl_rent = $row['rent_tgl'];
        $vtgl_kbl = $row['rent_kbl'];
        $vhrg = $row['rent_hrg'];
        $vjml_hr = $row['jml_hari'];
        $vtot_hrg = $row['rent_tot'];
        
    }
 }

if ($vupdate=="update"){
    $func->update3($vidr,$vidp,$vidm,$vtgl_rent,$vtgl_kbl,$vhrg,$vjml_hr,$vtot_hrg);
    $rows = $func->tampil3();
    $vidr ='';
    $vidp ='';
    $vidm ='';
    $vtgl_rent ='';
    $vtgl_kbl ='';
    $vhrg ='';
    $vjml_hr ='';
    $vtot_hrg ='';
}
if ($vreset=="reset"){
    $vidr ='';
    $vidp ='';
    $vidm ='';
    $vtgl_rent ='';
    $vtgl_kbl ='';
    $vhrg ='';
    $vjml_hr ='';
    $vtot_hrg ='';
}
if ($vaksi=="cari"){
    $rows = $func->cari3("idr");
    
    
    
}
?>

<form action="?" method="get">
<table>
    <tr><td>Id Rental</td><td>:</td><td>
    <input type="integer" name="idr" value="<?php echo $vidr; ?>" /></td></tr>
    <tr><td>Id Pelanggan</td><td>:</td><td><input type="integer" name="idp" value="<?php echo $vidp; ?>"/></td></tr>
    <tr><td>Id Mobil</td><td>:</td><td><input type="integer" name="idm" value="<?php echo $vidm; ?>"/></td></tr>
    <tr><td>Tanggal Rental</td><td>:</td><td><input type="date" name="tgl_rental" value="<?php echo $vtgl_rent; ?>"/></td></tr>
    <tr><td>Tanggal Kembali</td><td>:</td><td><input type="date" name="tgl_kembali" value="<?php echo $vtgl_kbl; ?>"/></td></tr>
    <tr><td>Harga</td><td>:</td><td><input type="integer" name="harga" value="<?php echo $vhrg; ?>"/></td></tr>
    <tr><td>Jumlah Hari</td><td>:</td><td><input type="integer" name="jml_hari" value="<?php echo $vjml_hr; ?>"/></td></tr>
    <tr><td>Total Harga</td><td>:</td><td><input type="integer" name="total_hrg" value="<?php echo $vtot_hrg; ?>"/></td></tr>
    <tr><td></td><td></td><td><input type="submit" name='simpan' value="simpan"/>
    <input type="submit" name='update' value="update"/><input type="submit" name='reset' value="reset"/>
    <input type="submit" name='cari' value="cari"/></td></tr>
</table>
</form>



    <table border="1px">
    <tr>
        <td>Id Rental</td>
        <td>Id Pelanggan</td>
        <td>Id Mobil</td>
        <td>Tanggal Rental</td>
        <td>Tanggal Kembali</td>
        <td>Harga</td>
        <td>Jumlah Hari</td>
        <td>Total Harga</td>
        <td>AKSI</td>
    </tr>

    <?php foreach ($rows as $row) { ?>
        <tr>
            <td><?php echo $row['rent_id']; ?></td>
            <td><?php echo $row['pel_id']; ?></td>
            <td><?php echo $row['mob_id']; ?></td>
            <td><?php echo $row['rent_tgl']; ?></td>
            <td><?php echo $row['rent_kbl']; ?></td>
            <td><?php echo $row['rent_hrg']; ?></td>
            <td><?php echo $row['jml_hari']; ?></td>
            <td><?php echo $row['rent_tot']; ?></td>
            <td><a href="?rent_id=<?php echo $row['rent_id']; ?>&aksi=hapus">Hapus</a>&nbsp;&nbsp;&nbsp;
                <a href="?rent_id=<?php echo $row['rent_id']; ?>&aksi=lihat_update">Update</a>
                <a href="mobil.php">Kembali</a> ||
                <a href="index.php">Home</a> 
                </td>
        </tr>
    <?php } ?>
 </table>