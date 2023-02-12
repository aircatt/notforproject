<?php
include_once("Database.php");

class Pesan extends Database
{
    public function all()
    {
        $sql = "SELECT pesan.id_penerima, user.fullname , pesan.judul, pesan.isi, pesan.status, pesan.tanggal_kirim from user, pesan where pesan.id_penerima = user.id";

        return $this->db->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function find($id)
    {
        $sql = "SELECT * FROM pesan  WHERE id = '$id'";

        return $this->db->query($sql)->fetch_assoc();
    }

    public function findByUserId($id)
    {
        $sql = "SELECT * FROM pesan  WHERE id_penerima = '$id'";

        return $this->db->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function create($data)
    {
        $now = date("Y-m-d H:i:s");
        $status = "terkirim";
        $id_penerima = $data["id_penerima"];
        $id_pengirim = $data["id_pengirim"];
        $judul = $data["judul"];
        $isi = $data["isi"];

        $sql = "INSERT INTO pesan (id_penerima, id_pengirim, judul, isi, status, tanggal_kirim) VALUES ('$id_penerima', '$id_pengirim', '$judul', '$isi', '$status', '$now') ";

        if ($this->db->query($sql) === TRUE) {
            return "Berhasil menambah data";
        } else {
            return "Gagal menambah data";
        }
    }

    public function update($id, $data)
    {
        $kode = $data["kode"];
        $nama = $data["nama"];

        $sql = "UPDATE pesan SET kode='$kode', nama='$nama' WHERE id='$id'";

        if ($this->db->query($sql) === TRUE) {
            return "Berhasil memperbaharui data";
        } else {
            return "Gagal memperbaharui data";
        }
    }

    public function delete($id)
    {
        $sql = "DELETE FROM pesan WHERE id = '$id'";

        if ($this->db->query($sql) === TRUE) {
            return "Berhasil mengahapus data";
        } else {
            return "Gagal menghapus data";
        }
    }

    public function read($id)
    {
        // $isi_status = "dibaca";

        $sql = "UPDATE pesan set status='dibaca' where id='$id'";

        if ($this->db->query($sql) === TRUE) {
            return "Berhasil";
        } else {
            return "Gagal";
        }
    }
}
