<?php

include_once("Database.php");

class Buku extends Database
{

    public function all()
    {
        $sql = "SELECT buku.id, buku.judul, buku.pengarang, penerbit.nama as penerbit, buku.j_buku_baik, buku.j_buku_rusak, buku.j_buku_baik + buku.j_buku_rusak as jumlah from buku, penerbit where buku.id_penerbit = penerbit.id";

        return $this->db->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function find($id)
    {
        $sql = "SELECT * from buku where id='$id'";

        return $this->db->query($sql)->fetch_assoc();
    }

    public function create($data)
    {
        $judul = $data["judul"];
        $pengarang = $data["pengarang"];
        $id_kategori = $data["id_kategori"];
        $id_penerbit = $data["id_penerbit"];
        $tahun_terbit = $data["tahun_terbit"];
        $isbn = $data["isbn"];
        $j_buku_baik = $data["j_buku_baik"];
        $j_buku_rusak = $data["j_buku_rusak"];

        $sql = "INSERT into buku(judul, pengarang, id_kategori, id_penerbit, tahun_terbit, isbn, j_buku_baik, j_buku_rusak) values('$judul', '$pengarang', '$id_kategori', '$id_penerbit', '$tahun_terbit', '$isbn', '$j_buku_baik', '$j_buku_rusak')";

        if ($this->db->query($sql) == true) {
            echo "Berhasil";
        } else {
            echo "Gagal";
        }
    }

    public function update($id, $data)
    {
        $judul = $data["judul"];
        $pengarang = $data["pengarang"];
        $id_kategori = $data["id_kategori"];
        $id_penerbit = $data["id_penerbit"];
        $tahun_terbit = $data["tahun_terbit"];
        $isbn = $data["isbn"];
        $j_buku_baik = $data["j_buku_baik"];
        $j_buku_rusak = $data["j_buku_rusak"];
        $foto = $data["foto"];

        if ($foto["error"] !== 4) {
            $targetFile = "../../../assets/images" . date("YmdHis") . basename($foto["name"]);
            move_uploaded_file($foto["tmp_name"], $targetFile);

            $sql = "UPDATE buku set judul='$judul', pengarang='$pengarang', id_kategori='$id_kategori', id_penerbit='$id_penerbit', tahun_terbit='$tahun_terbit', isbn='$isbn', j_buku_baik='$j_buku_baik', j_buku_rusak='$j_buku_rusak', foto='$targetFile' where id='$id'";
        } else {
            $sql = "UPDATE buku set judul='$judul', pengarang='$pengarang', id_kategori='$id_kategori', id_penerbit='$id_penerbit', tahun_terbit='$tahun_terbit', isbn='$isbn', j_buku_baik='$j_buku_baik', j_buku_rusak='$j_buku_rusak' where id='$id'";
        }


        if ($this->db->query($sql) == true) {
            echo "Berhasil";
        } else {
            echo "Gagal";
        }
    }

    public function delete($id)
    {

        $sql = "DELETE from buku where id='$id'";

        if ($this->db->query($sql) == true) {
            echo "Berhasil";
        } else {
            echo "Gagal";
        }
    }
}
