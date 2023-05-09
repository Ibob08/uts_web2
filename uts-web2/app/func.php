<?php
 class func {
 private $db;
 public function __construct()
     {
   try {
 $this->db = new PDO("mysql:host=localhost;dbname=rental_mobil", "root", ""); } catch (PDOException $e) { die ("Error " . $e->getMessage());
        }
    }

    public function tampil()
    {
    $sql = "SELECT * FROM tb_pelanggan";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    $data = [];
    while ($rows = $stmt->fetch()) {
        $data[] = $rows;
        }
 return $data;
    }
    public function tampil2()
    {
    $sql = "SELECT * FROM tb_mobil";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    $data = [];
    while ($rows = $stmt->fetch()) {
        $data[] = $rows;
        }
 return $data;
    }
    public function tampil3()
    {
    $sql = "SELECT * FROM tb_rental";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    $data = [];
    while ($rows = $stmt->fetch()) {
        $data[] = $rows;
        }
 return $data;
    }
    public function simpan()
    {
        $sql = "insert into tb_pelanggan values ('".$_GET['idp']."','".$_GET['nama']."','".$_GET['alamat']."','".$_GET['telp']."')";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        echo "DATA BERHASIL DISIMPAN !";
    }
    public function simpan2()
    {
        $sql = "insert into tb_mobil values ('".$_GET['idm']."','".$_GET['nama']."','".$_GET['jenis']."','".$_GET['warna']."','".$_GET['tahun']."','".$_GET['status']."')";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        echo "DATA BERHASIL DISIMPAN !";
    }
    public function simpan3()
    {
        $sql = "insert into tb_rental values ('".$_GET['idr']."','".$_GET['idp']."','".$_GET['idm']."','".$_GET['tgl_rental']."','".$_GET['tgl_kembali']."','".$_GET['harga']."'
        ,'".$_GET['jml_hari']."','".$_GET['total_hrg']."')";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        echo "DATA BERHASIL DISIMPAN !";
    }
    public function hapus()
    {
        $sql = "delete FROM tb_pelanggan where pel_id='".$_GET['pel_id']."'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        echo "DATA BERHASIL DIHAPUS !";
    }      
    public function hapus2()
    {
        $sql = "delete FROM tb_mobil where mob_id='".$_GET['mob_id']."'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        echo "DATA BERHASIL DIHAPUS !";
    }  
    public function hapus3()
    {
        $sql = "delete FROM tb_rental where rent_id='".$_GET['rent_id']."'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        echo "DATA BERHASIL DIHAPUS !";
    }     
    public function tampil_update()
    {
        $sql = "SELECT * FROM tb_pelanggan where pel_id='".$_GET['pel_id']."'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $data = [];
        while ($rows = $stmt->fetch()) {
            $data[] = $rows;
            }
        return $data;
    }
    public function tampil_update2()
    {
        $sql = "SELECT * FROM tb_mobil where mob_id='".$_GET['mob_id']."'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $data = [];
        while ($rows = $stmt->fetch()) {
            $data[] = $rows;
            }
        return $data;
    }
    public function tampil_update3()
    {
        $sql = "SELECT * FROM tb_rental where rent_id='".$_GET['rent_id']."'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $data = [];
        while ($rows = $stmt->fetch()) {
            $data[] = $rows;
            }
        return $data;
    }
    public function update($idp,$nama,$alamat,$telp)
    {
        $sql = "update tb_pelanggan set pel_nama='".$nama."', pel_alamat='".$alamat."', pel_telp='".$telp."' where pel_id='".$idp."'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        echo "DATA BERHASIL DIUPDATE !";
    }   
    public function update2($idm,$nama,$jenis,$warna,$tahun,$status)
    {
        $sql = "update tb_mobil set mob_nama='".$nama."', mob_jenis='".$jenis."', mob_warna='".$warna."' , mob_jenis='".$jenis."' , mob_tahun='".$tahun."' , mob_status='".$status."' where mob_id='".$idm."'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        echo "DATA BERHASIL DIUPDATE !";
    }   
    public function update3($idr,$idp,$idm,$tglrent,$tglkbl,$hrg,$jhari,$tot_hrg)
    {
        $sql = "update tb_rental set pel_id='".$idp."', mob_id='".$idm."' , rent_tgl='".$tglrent."' , rent_kbl='".$tglkbl."' , rent_hrg='".$hrg."', jml_hari='".$jhari."' ,rent_tot='".$tot_hrg."' where rent_id='".$idr."'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        echo "DATA BERHASIL DIUPDATE !";
    }   
    public function cari($alamat)
    {
        $sql = "SELECT * FROM tb_pelanggan WHERE pel_alamat LIKE '%".$alamat."%'
        ";
        $stmt = $this->db->prepare($sql);
    $stmt->execute();
    $data = [];
    while ($rows = $stmt->fetch()) {
        $data[] = $rows;
        }
 return $data;
    }   
    public function cari2($nama)
    {
        $sql = "SELECT * FROM tb_mobil WHERE mob_nama LIKE '%".$nama."%'
        ";
        $stmt = $this->db->prepare($sql);
    $stmt->execute();
    $data = [];
    while ($rows = $stmt->fetch()) {
        $data[] = $rows;
        }
 return $data;
    }   
    public function cari3($idr)
    {
        $sql = "SELECT * FROM tb_rental WHERE rent_id LIKE '%".$idr."%'
        ";
        $stmt = $this->db->prepare($sql);
    $stmt->execute();
    $data = [];
    while ($rows = $stmt->fetch()) {
        $data[] = $rows;
        }
 return $data;
    }   
 }