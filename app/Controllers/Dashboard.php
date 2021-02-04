<?php

namespace App\Controllers;

use App\Models\Master_model;
use CodeIgniter\Controller;

class Dashboard extends Controller
{
    public function __construct()
    {
        $this->master = new Master_model();
    }

    public function index()
    {
        $user_id = session()->get('id_user');
        $data = array(
            'title' => 'Dashboard',
            'segment' => $this->request->uri->getSegments(),
            'jmlUser' => $this->master->get_all_data('users')->countAllResults(),
            'jmlKasus' => $this->master->count_get_by_id('kasus', 'id_user', $user_id)->countAllResults(),
            'jmlAlternatif' => $this->master->get_join('alternatif', 'kasus', 'kasus.id_kasus = alternatif.id_kasus', 'kasus.id_user', $user_id)->countAllResults(),
        );

        echo view('dashboard/index', $data);
    }

    public function kasus()
    {
        $data = array(
            'title' => 'Kasus',
            'segment' => $this->request->uri->getSegments(),
            'listKasus' => $this->master->get_by_id('kasus', 'id_user', session()->get('id_user'))
        );
        echo view('dashboard/kasus/view', $data);
    }

    public function tambah_kasus()
    {
        helper('form');
        $data = array(
            'title' => 'Tambah Kasus',
            'segment' => $this->request->uri->getSegments(),
        );
        echo view('dashboard/kasus/add', $data);
    }

    public function proses_tambah_kasus()
    {
        helper('form');
        $validation = \Config\Services::validation();
        $input = array(
            'nama_kasus' => $this->request->getPost('nama_kasus'),
            'slug' => url_title(strtolower($this->request->getPost('nama_kasus'))),
            'id_user' => session()->get('id_user')
        );
        if ($validation->run($input, 'kasus') == FALSE) {
            $data = array(
                'title' => 'Tambah Kasus',
                'segment' => $this->request->uri->getSegments(),
            );
            helper('form');
            echo view('dashboard/kasus/add', $data);
        } else {
            $query = $this->master->tambah_kasus($input);
            if ($query) {
                session()->setFlashdata('message', '<p class="alert alert-success">Berhasil menambah kasus</p>');
                return redirect()->route('dashboard/kasus');
            } else {
                session()->setFlashdata('message', '<p class="alert alert-danger">Gagal menambah kasus</p>');
                return redirect()->route('dashboard/kasus/tambah');
            }
        }
    }

    public function edit_kasus($slug)
    {
        helper('form');
        $data = array(
            'title' => 'Edit Kasus',
            'segment' => $this->request->uri->getSegments(),
            'kasus' => $this->master->get_by_id('kasus', 'slug', $slug)->getRow()
        );

        echo view('dashboard/kasus/edit', $data);
    }

    public function proses_edit_kasus($slug)
    {
        helper('form');
        $old_slug = $slug;
        $validation = \Config\Services::validation();
        $input = array(
            'nama_kasus' => $this->request->getPost('nama_kasus'),
            'slug' => url_title(strtolower($this->request->getPost('nama_kasus')))
        );
        if ($validation->run($input, 'kasus') == FALSE) {
            $data = array(
                'title' => 'Edit Kasus',
                'segment' => $this->request->uri->getSegments(),
                'kasus' => $this->master->get_by_id('kasus', 'slug', $old_slug)->getRow()
            );
            helper('form');
            echo view('dashboard/kasus/edit', $data);
        } else {
            $query = $this->master->edit_kasus($input, $slug);
            if ($query) {
                session()->setFlashdata('message', '<p class="alert alert-success">Berhasil mengubah nama kasus</p>');
                return redirect()->route('dashboard/kasus');
            } else {
                session()->setFlashdata('message', '<p class="alert alert-danger">Gagal menambah kasus</p>');
                return $this->response->redirect(site_url('dashboard/kasus/edit/' . $old_slug));
            }
        }
    }

    public function delete_kasus($slug)
    {
        $query = $this->master->delete_kasus($slug);
        if ($query) {
            session()->setFlashdata('message', '<p class="alert alert-success">Berhasil menghapus kasus</p>');
            return $this->response->redirect(site_url('dashboard/kasus/lihat/' . $slug));
        } else {
            session()->setFlashdata('message', '<p class="alert alert-danger">Gagal menghapus kasus</p>');
            return $this->response->redirect(site_url('dashboard/kasus/lihat/' . $slug));
        }
    }

    public function kriteria($slug)
    {
        $getId = $this->master->get_by_id('kasus', 'slug', $slug)->getRow();
        $id = $getId->id_kasus;
        $data = array(
            'title' => 'Kriteria',
            'segment' => $this->request->uri->getSegments(),
            'listKriteria' => $this->master->get_by_id('kriteria', 'id_kasus', $id)
        );
        echo view('dashboard/kasus/kriteria/view', $data);
    }

    public function tambah_kriteria($slug)
    {
        helper('form');
        $getId = $this->master->get_by_id('kasus', 'slug', $slug)->getRow();
        $id = $getId->id_kasus;
        $allData = $this->master->get_by_id('kriteria', 'id_kasus', $id);
        $count = 0;
        foreach ($allData->getResult() as $row) {
            $count += $row->bobot;
        }
        $max = sprintf("%.2f", 1 - $count);
        $data = array(
            'title' => 'Tambah Kriteria',
            'segment' => $this->request->uri->getSegments(),
            'id_kasus' => $this->master->get_by_id('kasus', 'slug', $slug)->getRow()->id_kasus,
            'max' => $max
        );
        echo view('dashboard/kasus/kriteria/add', $data);
    }

    public function proses_tambah_kriteria($slug, $id)
    {
        $validation = \Config\Services::validation();
        $input = array(
            'nama_kriteria' => $this->request->getPost('nama_kriteria'),
            'id_kasus' => $id,
            'slug' => url_title(strtolower($this->request->getPost('nama_kriteria'))),
            'tipe' => $this->request->getPost('tipe'),
            'bobot' => $this->request->getPost('bobot'),
        );
        if ($validation->run($input, 'kriteria') == FALSE) {
            $allData = $this->master->get_by_id('kriteria', 'id_kasus', $id);
            $count = 0;
            foreach ($allData->getResult() as $row) {
                $count += $row->bobot;
            }
            $max = sprintf("%.2f", 1 - $count);
            $data = array(
                'title' => 'Tambah Kasus',
                'segment' => $this->request->uri->getSegments(),
                'id_kasus' => $id,
                'max' => $max
            );
            helper('form');
            echo view('dashboard/kasus/kriteria/add', $data);
        } else {
            $query = $this->master->tambah_kriteria($input);
            if ($query) {
                session()->setFlashdata('message', '<p class="alert alert-success">Berhasil menambah kriteria</p>');
                return $this->response->redirect(site_url('dashboard/kriteria/lihat/' . $slug));
            } else {
                session()->setFlashdata('message', '<p class="alert alert-danger">Gagal menambah kriteria</p>');
                return $this->response->redirect(site_url('dashboard/kriteria/tambah/' . $slug));
            }
        }
    }

    public function edit_kriteria($kasus, $slug)
    {
        helper('form');
        $getIdKasus = $this->master->get_by_id('kasus', 'slug', $kasus)->getRow();
        $idKasus = $getIdKasus->id_kasus;
        $getIdKriteria = $this->master->get_kriteria(['id_kasus' => $idKasus, 'slug' => $slug])->getRow();

        $hitungBobot = $this->master->get_by_id('kriteria', 'id_kasus', $idKasus);
        $count = 0;
        foreach ($hitungBobot->getResult() as $row) {
            $count += $row->bobot;
        }
        $max = sprintf("%.2f", 1 - $count);
        $data = array(
            'title' => 'Tambah Kriteria',
            'segment' => $this->request->uri->getSegments(),
            'kriteria' => $getIdKriteria,
            'max' => $max,
        );
        echo view('dashboard/kasus/kriteria/edit', $data);
    }

    public function proses_edit_kriteria($slug, $id)
    {
        $validation = \Config\Services::validation();
        $getIdKasus = $this->master->get_by_id('kasus', 'slug', $slug)->getRow();
        $id_kasus = $getIdKasus->id_kasus;
        $get_kriteria = $this->master->get_kriteria(['id_kasus' => $id_kasus, 'id_kriteria' => $id])->getRow();
        $hitungBobot = $this->master->get_by_id('kriteria', 'id_kasus', $id_kasus);
        $count = 0;
        foreach ($hitungBobot->getResult() as $row) {
            $count += $row->bobot;
        }
        $max = sprintf("%.2f", 1 - $count);
        $input = array(
            'nama_kriteria' => $this->request->getPost('nama_kriteria'),
            'id_kasus' => $id_kasus,
            'slug' => url_title(strtolower($this->request->getPost('nama_kriteria'))),
            'tipe' => $this->request->getPost('tipe'),
            'bobot' => $this->request->getPost('bobot'),
        );
        if ($validation->run($input, 'kriteria') == FALSE) {
            $data = array(
                'title' => 'Edit Kriteria',
                'segment' => $this->request->uri->getSegments(),
                'kriteria' => $get_kriteria,
                'max' => $max,
            );
            helper('form');
            echo view('dashboard/kasus/kriteria/edit', $data);
        } else {
            $query = $this->master->edit_kriteria($input, $id);
            if ($query) {
                session()->setFlashdata('message', '<p class="alert alert-success">Berhasil mengubah kriteria</p>');
                return $this->response->redirect(site_url('dashboard/kriteria/lihat/' . $slug));
            } else {
                session()->setFlashdata('message', '<p class="alert alert-danger">Gagal mengubah kriteria</p>');
                return $this->response->redirect(site_url('dashboard/kriteria/edit/' . $slug));
            }
        }
    }

    public function delete_kriteria($slug1, $slug2)
    {
        $query = $this->master->delete_kriteria($slug2);
        if ($query) {
            session()->setFlashdata('message', '<p class="alert alert-success">Berhasil menghapus kriteria</p>');
            return $this->response->redirect(site_url('dashboard/kriteria/lihat/' . $slug1));
        } else {
            session()->setFlashdata('message', '<p class="alert alert-danger">Gagal menghapus kriteria</p>');
            return $this->response->redirect(site_url('dashboard/kriteria/lihat/' . $slug1));
        }
    }

    public function alternatif($slug)
    {
        $getId = $this->master->get_by_id('kasus', 'slug', $slug)->getRow();
        $allData = $this->master->get_by_id('alternatif', 'id_kasus', $getId->id_kasus)->getResult();
        $data = array(
            'title' => 'Alternatif',
            'segment' => $this->request->uri->getSegments(),
            'listAlternatif' => $allData
        );
        echo view('dashboard/kasus/alternatif/view', $data);
    }

    public function tambah_alternatif($slug)
    {
        helper('form');
        $getId = $this->master->get_by_id('kasus', 'slug', $slug)->getRow();
        $id = $getId->id_kasus;
        $data = array(
            'title' => 'Tambah Kriteria',
            'segment' => $this->request->uri->getSegments(),
            'id_kasus' => $getId->id_kasus
        );
        echo view('dashboard/kasus/alternatif/add', $data);
    }

    public function proses_tambah_alternatif($slug, $id)
    {
        $validation = \Config\Services::validation();
        $input = array(
            'nama_alternatif' => $this->request->getPost('nama_alternatif'),
            'id_kasus' => $id,
            'slug' => url_title(strtolower($this->request->getPost('nama_alternatif'))),
        );
        if ($validation->run($input, 'alternatif') == FALSE) {
            $data = array(
                'title' => 'Tambah Kriteria',
                'segment' => $this->request->uri->getSegments(),
                'id_kasus' => $id,
            );
            helper('form');
            echo view('dashboard/kasus/alternatif/add', $data);
        } else {
            $query = $this->master->tambah_alternatif($input);
            if ($query) {
                session()->setFlashdata('message', '<p class="alert alert-success">Berhasil menambah alternatif</p>');
                return $this->response->redirect(site_url('dashboard/alternatif/lihat/' . $slug));
            } else {
                session()->setFlashdata('message', '<p class="alert alert-danger">Gagal menambah alternatif</p>');
                return $this->response->redirect(site_url('dashboard/alternatif/tambah/' . $slug));
            }
        }
    }

    public function edit_alternatif($slug1, $slug2)
    {
        helper('form');
        $getIdKasus = $this->master->get_by_id('kasus', 'slug', $slug1)->getRow();
        $getSlug = $this->master->get_alternatif($getIdKasus->id_kasus, $slug2)->getRow();

        $data = array(
            'title' => 'Tambah Kriteria',
            'segment' => $this->request->uri->getSegments(),
            'alternatif' => $getSlug,
        );
        echo view('dashboard/kasus/alternatif/edit', $data);
    }

    public function proses_edit_alternatif($slug1, $slug2)
    {
        $validation = \Config\Services::validation();
        $getIdKasus = $this->master->get_by_id('kasus', 'slug', $slug1)->getRow();
        $id_kasus = $getIdKasus->id_kasus;
        $alternatif = $this->master->get_alternatif($id_kasus, $slug2)->getRow();
        $input = array(
            'nama_alternatif' => $this->request->getPost('nama_alternatif'),
            'id_kasus' => $id_kasus,
            'slug' => url_title(strtolower($this->request->getPost('nama_alternatif'))),
        );
        if ($validation->run($input, 'alternatif') == FALSE) {
            $data = array(
                'title' => 'Edit Alternatif',
                'alternatif' => $alternatif,
                'segment' => $this->request->uri->getSegments(),
            );
            helper('form');
            echo view('dashboard/kasus/alternatif/edit', $data);
        } else {
            $query = $this->master->edit_alternatif($input, $alternatif->id_alternatif);
            if ($query) {
                session()->setFlashdata('message', '<p class="alert alert-success">Berhasil mengubah alternatif</p>');
                return $this->response->redirect(site_url('dashboard/alternatif/lihat/' . $slug1));
            } else {
                session()->setFlashdata('message', '<p class="alert alert-danger">Gagal mengubah alternatif</p>');
                return $this->response->redirect(site_url('dashboard/alternatif/edit/' . $slug1));
            }
        }
    }

    public function delete_alternatif($slug1, $slug2)
    {
        $query = $this->master->delete_alternatif($slug2);
        if ($query) {
            session()->setFlashdata('message', '<p class="alert alert-success">Berhasil menghapus alternatif</p>');
            return $this->response->redirect(site_url('dashboard/alternatif/lihat/' . $slug1));
        } else {
            session()->setFlashdata('message', '<p class="alert alert-danger">Gagal menghapus alternatif</p>');
            return $this->response->redirect(site_url('dashboard/alternatif/lihat/' . $slug1));
        }
    }

    public function detail_alternatif($slug1, $slug2)
    {
        $getId = $this->master->get_by_id('alternatif', 'slug', $slug2)->getRow();
        $allData = $this->master->detail_pengujian($getId->id_alternatif)->getResult();

        $data = array(
            'title' => 'Alternatif',
            'segment' => $this->request->uri->getSegments(),
            'detailAlternatif' => $allData
        );
        echo view('dashboard/kasus/alternatif/detail', $data);
    }

    public function tambah_nilai_alternatif($slug1, $slug2)
    {
        helper('form');
        $getIdKasus = $this->master->get_by_id('kasus', 'slug', $slug1)->getRow();
        $getIdAlternatif = $this->master->get_by_id('alternatif', 'slug', $slug2)->getRow();
        $listKriteria = $this->master->get_kriteria(['id_kasus' => $getIdKasus->id_kasus])->getResult();
        $data = array(
            'title' => 'Tambah Kriteria',
            'segment' => $this->request->uri->getSegments(),
            'listKriteria' => $listKriteria,
            'id_alternatif' => $getIdAlternatif->id_alternatif,
        );
        echo view('dashboard/kasus/alternatif/detail-add', $data);
    }

    public function proses_tambah_nilai_alternatif($slug1, $slug2)
    {
        $validation = \Config\Services::validation();
        $getIdAlternatif = $this->master->get_by_id('alternatif', 'slug', $slug2)->getRow();
        $input = array(
            'nilai' => $this->request->getPost('nilai'),
            'id_alternatif' => $getIdAlternatif->id_alternatif,
            'id_kriteria' => $this->request->getPost('id_kriteria')
        );
        $cekPengujian = $this->master->get_where('pengujian', [
            'id_alternatif' => $getIdAlternatif->id_alternatif,
            'id_kriteria' => $this->request->getPost('id_kriteria')
        ])->getRow();

        if ($validation->run($input, 'tambah_nilai') == FALSE) {
            $getIdKasus = $this->master->get_by_id('kasus', 'slug', $slug1)->getRow();
            $listKriteria = $this->master->get_kriteria(['id_kasus' => $getIdKasus->id_kasus])->getResult();
            $data = array(
                'title' => 'Tambah Kriteria',
                'segment' => $this->request->uri->getSegments(),
                'listKriteria' => $listKriteria,
                'id_alternatif' => $getIdAlternatif->id_alternatif,
            );
            helper('form');
            echo view('dashboard/kasus/alternatif/detail-add', $data);
        } else {
            if ($cekPengujian == FALSE) {
                $query = $this->master->tambah_pengujian($input);
                if ($query) {
                    session()->setFlashdata('message', '<p class="alert alert-success">Berhasil menambah alternatif</p>');
                    return $this->response->redirect(site_url('dashboard/alternatif/detail/' . $slug1 . '/' . $slug2));
                } else {
                    session()->setFlashdata('message', '<p class="alert alert-danger">Gagal menambah alternatif</p>');
                    return $this->response->redirect(site_url('dashboard/alternatif/tambah-nilai/' . $slug1 . '/' . $slug2));
                }
            } else {
                session()->setFlashdata('message', '<p class="alert alert-danger">Nilai alternatif sudah ada</p>');
                return $this->response->redirect(site_url('dashboard/alternatif/tambah-nilai/' . $slug1 . '/' . $slug2));
            }
        }
    }

    public function edit_nilai_alternatif($slug1, $slug2, $slug3)
    {
        helper('form');
        $idKriteria = $this->master->get_by_id('kriteria', 'slug', $slug3)->getRow();
        $idAlternatif = $this->master->get_by_id('alternatif', 'slug', $slug2)->getRow();
        $pengujian = $this->master->get_where('pengujian', ['id_kriteria' => $idKriteria->id_kriteria, 'id_alternatif' => $idAlternatif->id_alternatif])->getRow();
        $data = array(
            'title' => 'Edit Kriteria',
            'segment' => $this->request->uri->getSegments(),
            'pengujian' => $pengujian,
        );
        echo view('dashboard/kasus/alternatif/detail-edit', $data);
    }

    public function proses_edit_nilai_alternatif($slug1, $slug2, $slug3)
    {
        $validation = \Config\Services::validation();
        $getIdAlternatif = $this->master->get_by_id('alternatif', 'slug', $slug2)->getRow();
        $getIdKriteria = $this->master->get_by_id('kriteria', 'slug', $slug3)->getRow();
        $input = array(
            'nilai' => $this->request->getPost('nilai'),
            'id_alternatif' => $getIdAlternatif->id_alternatif,
            'id_kriteria' => $getIdKriteria->id_kriteria
        );
        if ($validation->run($input, 'edit_nilai') == FALSE) {
            helper('form');
            $pengujian = $this->master->get_where('pengujian', ['id_kriteria' => $getIdKriteria->id_kriteria, 'id_alternatif' => $getIdAlternatif->id_alternatif])->getRow();
            $data = array(
                'title' => 'Edit Kriteria',
                'segment' => $this->request->uri->getSegments(),
                'pengujian' => $pengujian,
            );
            echo view('dashboard/kasus/alternatif/detail-edit', $data);
        } else {
            $query = $this->master->edit_pengujian($input, $getIdAlternatif->id_alternatif);
            if ($query) {
                session()->setFlashdata('message', '<p class="alert alert-success">Berhasil mengubah nilai</p>');
                return $this->response->redirect(site_url('dashboard/alternatif/detail/' . $slug1 . '/' . $slug2));
            } else {
                session()->setFlashdata('message', '<p class="alert alert-danger">Gagal mengubah nilai</p>');
                return $this->response->redirect(site_url('dashboard/alternatif/edit-nilai/' . $slug1 . '/' . $slug2 . '/' . $slug3));
            }
        }
    }

    public function delete_nilai_alternatif($slug1, $slug2, $slug3)
    {
        $getIdAlternatif = $this->master->get_by_id('alternatif', 'slug', $slug2)->getRow();
        $getIdKriteria = $this->master->get_by_id('kriteria', 'slug', $slug3)->getRow();
        $query = $this->master->delete_pengujian($getIdAlternatif->id_alternatif, $getIdKriteria->id_kriteria);
        if ($query) {
            session()->setFlashdata('message', '<p class="alert alert-success">Berhasil menghapus nilai</p>');
            return $this->response->redirect(site_url('dashboard/alternatif/detail/' . $slug1 . '/' . $slug2));
        } else {
            session()->setFlashdata('message', '<p class="alert alert-danger">Gagal menghapus nilai</p>');
            return $this->response->redirect(site_url('dashboard/alternatif/detail/' . $slug1 . '/' . $slug2));
        }
    }

    // public function user()
    // {
    //     $data = array(
    //         'title' => 'User',
    //         'listUser' => $this->master->get_all_data('users')->get(),
    //         'segment' => $this->request->uri->getSegments(),
    //     );
    //     echo view('dashboard/user/view', $data);
    // }

    // public function delete_user($username)
    // {
    //     $query = $this->master->delete_row('users', ['username' => $username]);
    //     if ($query) {
    //         session()->setFlashdata('message', '<p class="alert alert-success">Berhasil menghapus user</p>');
    //         return $this->response->redirect(site_url('dashboard/user/'));
    //     } else {
    //         session()->setFlashdata('message', '<p class="alert alert-danger">Gagal menghapus user</p>');
    //         return $this->response->redirect(site_url('dashboard/user/'));
    //     }
    // }

    public function hasil()
    {
        $data = array(
            'title' => 'Hasil',
            'segment' => $this->request->uri->getSegments(),
            'listHasil' => $this->master->get_by_id('kasus', 'id_user', session()->get('id_user'))->getResult()
        );
        echo view('dashboard/hasil/view', $data);
    }

    public function detail_hasil($slug)
    {
        $nilai_minimal = [];
        $nilai_maksimal = [];
        $getIdKasus = $this->master->get_by_id('kasus', 'slug', $slug)->getRow();
        $query1 = $this->master->tester($getIdKasus->id_kasus);

        foreach ($query1 as $key => $row) {
            array_push($nilai_minimal, $row->nilai_minimal);
            array_push($nilai_maksimal, $row->nilai_maksimal);
        }
        $query2 = $this->master->tester2($getIdKasus->id_kasus);

        $jumlahAlternatif = $this->master->hitungAlternatif($getIdKasus->id_kasus);
        $jumlahKriteria = $this->master->hitungKriteria($getIdKasus->id_kasus);

        $minimal = [];
        $maksimal = [];
        for ($i = 0; $i < $jumlahAlternatif[0]->jumlahAlternatif; $i++) {
            $minimal = array_merge($minimal, $nilai_minimal);
            $maksimal = array_merge($maksimal, $nilai_maksimal);
        }
        $total = array();
        foreach ($query2 as $key => $row) {
            $total[$key] = 0;
            if ($row->tipe == 'benefit') {
                $total[$key] += $row->bobot * ($row->nilai / $maksimal[$key]);
            } else if ($row->tipe == 'cost') {
                $total[$key] += $row->bobot * ($minimal[$key] / $row->nilai);
            }
        }
        // var_dump($total);
        $totalSemua = [];
        for ($x = 0; $x <= $jumlahAlternatif[0]->jumlahAlternatif - 1; $x++) {
            $totalSemua[$x] = 0;
            for ($i = 0 + ($x * ($jumlahKriteria[0]->jumlahKriteria - 1)); $i <= ($jumlahKriteria[0]->jumlahKriteria - 1) + ($x * ($jumlahKriteria[0]->jumlahKriteria - 1)); $i++) {
                $totalSemua[$x] += $total[$i];
            }
        }
        // var_dump($totalSemua);
        $data = array(
            'title' => 'User',
            'hasil' => $this->master->get_by_id('alternatif', 'id_kasus', $getIdKasus->id_kasus)->getResult(),
            'minimal' => $minimal,
            'maksimal' => $maksimal,
            'totalSemua' => $totalSemua,
            'segment' => $this->request->uri->getSegments(),
        );
        echo view('dashboard/hasil/detail', $data);
    }
}
