<?php

include_once("Database.php");

class Peminjaman extends Database
{

    public function allPinjam()
    {
        $sql = "SELECT user.fullname as nama, buku.judul as judul, peminjaman.tanggal_peminjaman, peminjaman.tanggal_pengembalian, peminjaman.kondisi_buku_saat_dipinjam, peminjaman.kondisi_buku_saat_dikembalikan, peminjaman.denda from peminjaman, user, buku where peminjaman.id_buku = buku.id and peminjaman.id_user = user.id";

        return $this->db->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function all()
    {
        $sql = "SELECT user.fullname as nama, buku.judul as judul, peminjaman.tanggal_peminjaman, peminjaman.tanggal_pengembalian, peminjaman.kondisi_buku_saat_dipinjam, peminjaman.kondisi_buku_saat_dikembalikan, peminjaman.denda from peminjaman, user, buku where peminjaman.id_buku = buku.id and peminjaman.id_user = user.id and tanggal_pengembalian is null";

        return $this->db->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function allKembali()
    {
        $sql = "SELECT user.fullname as nama, buku.judul as judul, peminjaman.tanggal_peminjaman, peminjaman.tanggal_pengembalian, peminjaman.kondisi_buku_saat_dipinjam, peminjaman.kondisi_buku_saat_dikembalikan, peminjaman.denda from peminjaman, user, buku where peminjaman.id_buku = buku.id and peminjaman.id_user = user.id and tanggal_pengembalian is not null";

        return $this->db->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function find($id)
    {
        $sql = "SELECT peminjaman.id as id_peminjaman, buku.id as id_buku, buku.judul as judul, peminjaman.tanggal_peminjaman, peminjaman.kondisi_buku_saat_dipinjam, peminjaman.denda from peminjaman, buku where peminjaman.id_buku = buku.id and peminjaman.id_user=$id and tanggal_pengembalian is null";

        return $this->db->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function findKembali($id)
    {
        $sql = "SELECT buku.judul as judul, peminjaman.tanggal_pengembalian, peminjaman.kondisi_buku_saat_dikembalikan, peminjaman.denda  from peminjaman, buku where peminjaman.id_buku = buku.id and peminjaman.id_user= $id and tanggal_pengembalian is not null";

        return $this->db->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function getPeminjaman()
    {
        $sql = "SELECT * from peminjaman where tanggal_pengembalian is null";

        return $this->db->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function getPengembalian()
    {
        $sql = "SELECT * from peminjaman where tanggal_pengembalian is not null";

        return $this->db->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function create($data)
    {
        $id_user = $data["id_user"];
        $id_buku = $data["id_buku"];
        $tanggal_peminjaman = $data["tanggal_peminjaman"];
        $kondisi_buku_saat_dipinjam = $data["kondisi_buku_saat_dipinjam"];

        $sql = "INSERT into peminjaman(id_user, id_buku, tanggal_peminjaman, kondisi_buku_saat_dipinjam) values('$id_user', '$id_buku', '$tanggal_peminjaman', '$kondisi_buku_saat_dipinjam')";

        if ($this->db->query($sql) == true) {
            echo "Berhasil";
        } else {
            echo "Gagal";
        }
    }

    public function kembalikan($data)
    {
        $tanggal_pengembalian = date("Y-m-d H:i:s");
        $kondisi_buku_saat_dikembalikan = $data["kondisi_buku_saat_dikembalikan"];

        $sql = "UPDATE peminjaman set tanggal_pengembalian='$tanggal_pengembalian', kondisi_buku_saat_dikembalikan='$kondisi_buku_saat_dikembalikan' WHERE id ='$_GET[id_peminjaman]'";

        if ($this->db->query($sql) == true) {
            echo "Berhasil";
        } else {
            echo "Gagal";
        }
    }

    public function update($id, $data)
    {
        $id_user = $data["id_user"];
        $id_buku = $data["id_buku"];
        $tanggal_peminjaman = $data["tanggal_peminjaman"];
        $kondisi_buku_saat_dipinjam = $data["kondisi_buku_saat_dipinjam"];

        $sql = "UPDATE peminjaman set id_user='$id_user', id_buku='$id_buku', tanggal_peminjaman='$tanggal_peminjaman', kondisi_buku_saat_dipinjam='$kondisi_buku_saat_dipinjam' where id='$id'";

        if ($this->db->query($sql) == true) {
            echo "Berhasil";
        } else {
            echo "Gagal";
        }
    }

    public function delete($id)
    {

        $sql = "DELETE from peminjaman where id='$id'";

        if ($this->db->query($sql) == true) {
            echo "Berhasil";
        } else {
            echo "Gagal";
        }
    }

    public function denda()
    {
        $nominal = "100000";

        $sql = "UPDATE peminjaman set denda ='$nominal' where id ='$_GET[id_peminjaman]'";

        if ($this->db->query($sql) === TRUE) {
            return "Berhasil";
        }
        return "Gagal";
    }
}
