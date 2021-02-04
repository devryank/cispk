<?php

namespace App\Models;

use CodeIgniter\Model;

class Master_model extends Model
{
    protected $tbl_kasus = 'kasus';
    protected $tbl_kriteria = 'kriteria';
    protected $tbl_alternatif = 'alternatif';
    protected $tbl_pengujian = 'pengujian';
    protected $tbl_users = 'users';

    public function get_all_data($tbl)
    {
        $query = $this->db->table($tbl);
        return $query;
    }

    public function get_by_id($tbl, $where, $id)
    {
        $query = $this->db->table($tbl)
            ->where($where, $id)
            ->get();
        return $query;
    }

    public function count_get_by_id($tbl, $where, $id)
    {
        $query = $this->db->table($tbl)
            ->where($where, $id);
        return $query;
    }

    public function get_where($tbl, $where)
    {
        $query = $this->db->table($tbl)
            ->where($where)
            ->get();
        return $query;
    }

    public function get_join($tbl, $tbl2, $join, $where, $id)
    {
        $query = $this->db->table($tbl)
            ->join($tbl2, $join)
            ->where($where, $id);
        return $query;
    }

    public function delete_row($tbl, $where)
    {
        $query = $this->db->table($tbl)
            ->where($where)
            ->delete();
        return $query;
    }

    public function tambah_kasus($data)
    {
        $query = $this->db->table($this->tbl_kasus)->insert($data);
        return $query;
    }

    public function edit_kasus($data, $slug)
    {
        $query = $this->db->table($this->tbl_kasus)
            ->where('slug', $slug)
            ->update($data);
        return $query;
    }

    public function delete_kasus($slug)
    {
        $query = $this->db->table($this->tbl_kasus)
            ->where('slug', $slug)
            ->delete();
        return $query;
    }

    public function tambah_kriteria($data)
    {
        $query = $this->db->table($this->tbl_kriteria)->insert($data);
        return $query;
    }

    public function edit_kriteria($data, $id)
    {
        $query = $this->db->table($this->tbl_kriteria)
            ->where('id_kriteria', $id)
            ->update($data);
        return $query;
    }

    public function delete_kriteria($slug)
    {
        $query = $this->db->table($this->tbl_kriteria)
            ->where('slug', $slug)
            ->delete();
        return $query;
    }

    public function get_kriteria($where)
    {
        $query = $this->db->table($this->tbl_kriteria)
            ->where($where)
            ->get();
        return $query;
    }

    public function get_alternatif($idKasus, $slug)
    {
        $query = $this->db->table($this->tbl_alternatif)
            ->where('id_kasus', $idKasus)
            ->where('slug', $slug)
            ->get();
        return $query;
    }

    public function tambah_alternatif($data)
    {
        $query = $this->db->table($this->tbl_alternatif)
            ->insert($data);
        return $query;
    }

    public function edit_alternatif($data, $id)
    {
        $query = $this->db->table($this->tbl_alternatif)
            ->where('id_alternatif', $id)
            ->update($data);
        return $query;
    }

    public function delete_alternatif($slug)
    {
        $id = $this->db->table($this->tbl_alternatif)
            ->where('slug', $slug)
            ->get()->getRow()->id_alternatif;
        $deletePengujian = $this->db->table($this->tbl_pengujian)
            ->where('id_alternatif', $id)
            ->delete();
        if ($deletePengujian) {
            $query = $this->db->table($this->tbl_alternatif)
                ->where('id_alternatif', $id)
                ->delete();
            return $query;
        } else {
            return FALSE;
        }
    }

    public function detail_pengujian($id)
    {
        $query = $this->db->table($this->tbl_pengujian)
            ->select('kriteria.nama_kriteria, kriteria.bobot, kriteria.slug, pengujian.nilai')
            ->join('kriteria', 'kriteria.id_kriteria=pengujian.id_kriteria')
            ->where('pengujian.id_alternatif', $id)
            ->get();
        return $query;
    }

    public function tambah_pengujian($data)
    {
        $query = $this->db->table($this->tbl_pengujian)
            ->insert($data);
        return $query;
    }

    public function edit_pengujian($data, $id)
    {
        $query = $this->db->table($this->tbl_pengujian)
            ->where('id_alternatif', $id)
            ->update($data);
        return $query;
    }

    public function delete_pengujian($alternatif, $kriteria)
    {
        $query = $this->db->table($this->tbl_pengujian)
            ->where('id_alternatif', $alternatif)
            ->where('id_kriteria', $kriteria)
            ->delete();
        return $query;
    }

    public function tester($id)
    {
        // SELECT kasus.nama_kasus, kriteria.nama_kriteria, kriteria.bobot, MIN(nilai) as nilai_minimal, MAX(nilai) as nilai_maximal from kasus
        // INNER JOIN kriteria ON kriteria.id_kasus = kasus.id_kasus 
        // INNER JOIN alternatif ON alternatif.id_kasus = kasus.id_kasus 
        // INNER JOIN pengujian ON pengujian.id_kriteria = kriteria.id_kriteria AND pengujian.id_alternatif = alternatif.id_alternatif 
        // WHERE kasus.id_kasus = 5 
        // GROUP BY pengujian.id_kriteria
        $query = $this->db->table($this->tbl_kasus)
            ->select("kasus.nama_kasus, kriteria.nama_kriteria, kriteria.tipe, kriteria.bobot, MIN(nilai) as nilai_minimal, MAX(nilai) as nilai_maksimal")
            ->join('kriteria', 'kriteria.id_kasus=kasus.id_kasus')
            ->join('alternatif', 'alternatif.id_kasus=kasus.id_kasus')
            ->join('pengujian', 'pengujian.id_kriteria=kriteria.id_kriteria AND pengujian.id_alternatif=alternatif.id_alternatif')
            ->where('kasus.id_kasus', $id)
            ->orderBy('kriteria.nama_kriteria', 'ASC')
            ->groupBy('pengujian.id_kriteria');
        return $query->get()->getResult();
    }

    public function tester2($id)
    {
        $query = $this->db->query("SELECT alternatif.nama_alternatif, kriteria.nama_kriteria, kriteria.tipe, kriteria.bobot, pengujian.nilai 
        FROM `alternatif` 
        INNER JOIN pengujian ON alternatif.id_alternatif=pengujian.id_alternatif 
        INNER JOIN kriteria ON kriteria.id_kriteria = pengujian.id_kriteria 
        INNER JOIN kasus ON kasus.id_kasus = alternatif.id_kasus 
        WHERE kasus.id_kasus = $id 
        ORDER BY alternatif.nama_alternatif ASC, kriteria.nama_kriteria ASC");
        return $query->getResult();
    }


    public function hitungAlternatif($id)
    {
        $query = $this->db->table($this->tbl_alternatif)
            ->select('COUNT(alternatif.nama_alternatif) as jumlahAlternatif')
            ->where('id_kasus', $id);
        return $query->get()->getResult();
    }

    public function hitungKriteria($id)
    {
        $query = $this->db->table($this->tbl_kriteria)
            ->select('COUNT(kriteria.nama_kriteria) as jumlahKriteria')
            ->where('id_kasus', $id);
        return $query->get()->getResult();
    }

    public function edit_profile($username, $input)
    {
        $query = $this->db->table($this->tbl_users)
            ->where('username', $username)
            ->update($input);
        return $query;
    }
}
