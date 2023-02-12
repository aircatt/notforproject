<?php

include_once("Database.php");

class Kategori extends Database{
    public function all(){
        $sql = "SELECT * from kategori";

        return $this->db->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function find($id){
        $sql = "SELECT * from kategori where id='$id'";

        return $this->db->query($sql)->fetch_assoc();
    }

    public function create($data){
        $kode = $data["kode"];
        $nama = $data["nama"];

        $sql = "INSERT into kategori(kode, nama) values('$kode', '$nama')";

        if($this->db->query($sql) == true){
            echo "Berhasil";
        } else{
            echo "Gagal";
        }
    }

    public function update($id, $data){
        $kode = $data["kode"];
        $nama = $data["nama"];

        $sql = "UPDATE kategori set kode='$kode', nama='$nama' where id='$id'";

        if($this->db->query($sql) == true){
            echo "Berhasil";
        } else{
            echo "Gagal";
        }
    }

    public function delete($id){

        $sql = "DELETE from kategori where id='$id'";

        if($this->db->query($sql) == true){
            echo "Berhasil";
        } else{
            echo "Gagal";
        }
    }
}