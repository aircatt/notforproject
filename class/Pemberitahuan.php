<?php
include_once("Database.php");

class Pemberitahuan extends Database
{

    public function all()
    {
        $sql = "SELECT * FROM pemberitahuan";

        return $this->db->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function find($id)
    {
        $sql = "SELECT * FROM pemberitahuan  WHERE id = '$id'";

        return $this->db->query($sql)->fetch_assoc();
    }

    // 
    // FUNCTION CREATE DATA
    //  
    public function create($data)
    {
        $isi = $data["isi"];
        $level = "admin";
        $status = $data["status"];
        $sql = "INSERT INTO pemberitahuan(isi, level, status) VALUES('$isi', '$level', '$status')";

        if ($this->db->query($sql) === TRUE) {
            return "Berhasil menambah data";
        } else {
            return "Gagal menambah data";
        }
    }

    // 
    // FUNCTION UPDATE DATA
    //  
    public function update($id, $data)
    {
        $isi = $data["isi"];
        $status = $data["status"];
        $sql = "UPDATE pemberitahuan SET isi = '$isi', status = '$status' WHERE id = '$id'";

        if ($this->db->query($sql) === TRUE) {
            return "Berhasil memperbaharui data";
        } else {
            return "Gagal memperbaharui data";
        }
    }

    // 
    //FUNCTION DELETE DATA
    //  
    public function delete($id)
    {
        $sql = "DELETE FROM pemberitahuan WHERE id = '$id'";

        if ($this->db->query($sql) === TRUE) {
            return "Berhasil mengahapus data";
        } else {
            return "Gagal menghapus data";
        }
    }

    public function notifAktif()
    {
        $sql = "SELECT * from pemberitahuan where status = 'aktif'";

        return $this->db->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function notifBuku($data)
    {
        include_once("../class/Buku.php");
        include_once("../class/User.php");

        $buku = new Buku;
        $buku = $buku->find($data["id_buku"]);

        $user = new User;
        $user = $user->find($data["id_user"]);


        $level = "admin";
        $isi = "BUKU " . $buku["judul"] . " SEDANG DI PINJAM OLEH " . $user["fullname"];
        $status = "aktif";

        // $isi = $data["isi"];
        // $level_user = $data["level_user"];
        // $status = $data["status"];

        $sql = "INSERT INTO pemberitahuan (isi, level, status) VALUES ('$isi','$level','$status')";

        if ($this->db->query($sql) === TRUE) {
            return "BERHASIL MENGHAPUS DATA";
        }
        return "GAGAL MENGHAPUS DATA";
    }

    public function bacaNotif($id)
    {
        $isi_status = "nonaktif";

        $sql = "UPDATE pemberitahuan SET status = '$isi_status' WHERE id ='$id' ";

        if ($this->db->query($sql) === TRUE) {
            return "BERHASIL MENGHAPUS DATA";
        } else {
            return "GAGAL MENGHAPUS DATA";
        }
    }

    public function bacaNotifAll()
    {
        $isi_status = "nonaktif";

        $sql = "UPDATE pemberitahuan SET status = '$isi_status'";

        if ($this->db->query($sql) === TRUE) {
            return "Berhasil";
        } else {
            return "Gagal";
        }
    }
}
