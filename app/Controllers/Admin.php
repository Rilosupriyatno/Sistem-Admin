<?php

namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\HistoriModel;
use App\Models\HaModel;
use App\Models\AkunModel;
use App\Models\JabatanModel;

class Admin extends BaseController
{
    protected $adminModel, $historiModel, $HaModel, $akunModel, $jabatanModel;
    public function __construct()
    {
        $this->session = service('session');
        $this->config = config('Auth');
        $this->auth = service('authentication');
        $this->adminModel = new AdminModel();
        $this->historiModel = new HistoriModel();
        $this->haModel = new HaModel();
        $this->akunModel = new AkunModel();
        $this->jabatanModel = new JabatanModel();
    }

    public function index()
    {
        // $data = [
        //     'config' => $this->config
        // ];
        // return view('admin/index', $data);
        $jumlah = $this->adminModel->data();
        $data['jumlah'] = $jumlah;
        $data['title'] = 'Dashboard';
        // $users = new \Myth\Auth\Models\UserModel();
        // $data['users'] = $users->findAll();
        // $this->adminModel->select('pegawai.id as pegawaiid, NIK, users.foto, nama, tanggal, jabatan, pendikte, email, name');
        // $this->adminModel->select('users', 'users.id = pegawai.id');
        // $this->adminModel->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        // $this->adminModel->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        // $query = $this->adminModel->get();
        // $data['users'] = $query->getResult();
        return view('admin/index', $data);
    }
    public function create()
    {
        $data = [
            'title' => 'Tambah Data',
            'validation' => \Config\Services::validation(),
            'jabatan' => $this->historiModel->findAll()
        ];
        return view('admin/create', $data);
    }

    public function save()
    {
        helper(['form', 'url']);
        // validasi
        if (!$this->validate([
            'NIK' => [
                'rules' => 'required|is_unique[data_pegawai.NIK]',
                'errors' => [
                    'required' => 'NIK harus diisi',
                    'is_unique' => 'NIK sudah ada'
                ]
            ],
            'nama' => [
                'rules' => 'required[data_pegawai.nama]',
                'errors' => [
                    'required' => 'Nama harus diisi',
                ]
            ],
            'foto' => [
                'rules' => 'max_size[foto,2048]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png,image/svg]',
                'errors' => [
                    'max_size' => 'Ukuran foto terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ],
            'tanggal' => [
                'rules' => 'required[data_pegawai.tanggal_lahir]',
                'errors' => [
                    'required' => 'tanggal harus diisi'
                ]
            ],
            'alamat' => [
                'rules' => 'required[data_pegawai.alamat]',
                'errors' => [
                    'required' => 'tanggal harus diisi'
                ]
            ],
            'pendikte' => [
                'rules' => 'required[data_pegawai.pendikte]',
                'errors' => [
                    'required' => 'pendidikan terakhir harus diisi',
                ]
            ],
        ])) {
            // $validation = \Config\Services::validation();
            // return redirect()->to('/admin/create')->withInput()->with('validation', $validation);
            return redirect()->to('/admin/create')->withInput();
        }
        // // Ambil gambar
        $fileFoto = $this->request->getFile('foto');
        // Apakah tidak ada gambar yang diupload
        if ($fileFoto->getError() == 4) {
            $namaFoto = 'default.svg';
        } else {
            // Ambil nama file
            $namaFoto = $fileFoto->getRandomName();
            // Pindahkan gambar ke folder public
            $fileFoto->move('img', $namaFoto);
        }
        $this->adminModel->save([
            'NIK' => $this->request->getVar('NIK'),
            'nama' => $this->request->getVar('nama'),
            'foto' => $namaFoto,
            'tanggal_lahir' => $this->request->getVar('tanggal'),
            'alamat' => $this->request->getVar('alamat'),
            'pendikte' => $this->request->getVar('pendikte'),
            'jenkel' => $this->request->getVar('jenkel'),
        ]);
        // $jb = $this->historiModel->find();
        // if ($jb['id_jabatan']) {
        //     $data = [
        //         'id_jabatan' => $this->request->getVar('id_jabatan')
        //     ];
        //     $this->historiModel->insert($data);
        //     session()->setFlashdata('pesan', 'Data berhasil direstore');
        //     return redirect()->to('/admin/trash');
        // }

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
        return redirect()->to('/admin/mutasi_pegawai');
    }
    public function edit($id)
    {
        $data = [
            'title' => 'Edit Data',
            'validation' => \Config\Services::validation(),
            'pegawai' => $this->adminModel->where('id', $id)->first()
        ];
        return view('admin/edit', $data);
    }
    public function update($id)
    {

        // helper(['form', 'url']);
        // $dataLama = $this->adminModel->getPegawai($this->request->getVar('id'));
        // if ($dataLama['NIK'] == $this->request->getVar('NIK')) {
        //     $rule = 'required';
        // } else {
        //     $rule = 'required|is_unique[data_pegawai.NIK]';
        // }
        // // validasi
        // if (!$this->validate([
        //     'NIK' => [
        //         'rules' => $rule,
        //         'errors' => [
        //             'required' => 'NIK harus diisi',
        //             'is_unique' => 'NIK sudah ada'
        //         ]
        //     ],
        //     'nama' => [
        //         'rules' => 'required[data_pegawai.nama]',
        //         'errors' => [
        //             'required' => 'Nama harus diisi',
        //         ]
        //     ],
        //     'foto' => [
        //         'rules' => 'max_size[foto,2048]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png,image/svg]',
        //         'errors' => [
        //             'max_size' => 'Ukuran foto terlalu besar',
        //             'is_image' => 'Yang anda pilih bukan gambar',
        //             'mime_in' => 'Yang anda pilih bukan gambar'
        //         ]
        //     ],
        //     'tanggal' => [
        //         'rules' => 'required[data_pegawai.tanggal_lahir]',
        //         'errors' => [
        //             'required' => 'tanggal harus diisi'
        //         ]
        //     ],
        //     'alamat' => [
        //         'rules' => 'required[data_pegawai.alamat]',
        //         'errors' => [
        //             'required' => 'tanggal harus diisi'
        //         ]
        //     ],
        //     'pendikte' => [
        //         'rules' => 'required[data_pegawai.pendikte]',
        //         'errors' => [
        //             'required' => 'pendidikan terakhir harus diisi',
        //         ]
        //     ],
        //     'id_jabatan' => [
        //         'rules' => 'required[data_pegawai.jabatan]',
        //         'errors' => [
        //             'required' => 'Jabatan harus dipilih'
        //         ]
        //     ]
        // ])) {
        //     // $validation = \Config\Services::validation();
        //     // return redirect()->to('/admin/create')->withInput()->with('validation', $validation);
        //     return redirect()->to('/admin/edit/' . $this->request->getVar('id'))->withInput();
        // }
        $foto = $this->adminModel->find($id);
        $fileFoto = $this->request->getFile('foto');
        // Apakah tidak ada gambar yang diupload
        if ($fileFoto->getError() == 4) {
            $namaFoto = 'default.svg';
        } else {
            // Ambil nama file
            $namaFoto = $fileFoto->getRandomName();
            // Pindahkan gambar ke folder public
            $fileFoto->move('img', $namaFoto);
        }
        $this->adminModel->save([
            'id' => $id,
            'NIK' => $this->request->getVar('NIK'),
            'nama' => $this->request->getVar('nama'),
            'foto' => $namaFoto,
            'tanggal_lahir' => $this->request->getVar('tanggal'),
            'alamat' => $this->request->getVar('alamat'),
            'pendikte' => $this->request->getVar('pendikte'),
            'jenkel' => $this->request->getVar('jenkel'),
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah');
        return redirect()->to('/admin/daftar_pegawai');
    }
    public function hapusJB($id)
    {
        $this->historiModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/admin/mutasi');
    }
    public function mutasi($id)
    {
        $data = [
            'title' => 'Mutasi Jabatan',
            'validation' => \Config\Services::validation(),
            'jabatan' => $this->jabatanModel->findAll(7),
            'NIK' => $this->adminModel->findAll(),
            'jabat' => $this->historiModel->where('id', $id)->first()

        ];
        return view('admin/mutasi', $data);
    }
    public function mutate($id)
    {
        $fileSK = $this->request->getFile('SK');
        // Apakah tidak ada gambar yang diupload
        // Ambil nama file
        $namaFile = $fileSK->getRandomName();
        // Pindahkan gambar ke folder public
        $fileSK->move('SK', $namaFile);
        $this->historiModel->save([
            'id' => $id,
            'NIK' => $this->request->getVar('NIK'),
            'id_jabatan' => $this->request->getVar('id_jabatan'),
            'no_sk' => $this->request->getVar('no_sk'),
            'sk' => $namaFile,
            'tgl_mulai' => $this->request->getVar('tgl_mulai'),
            'creator' => $this->request->getVar('creator'),
        ]);
        $del = $this->historiModel->find($id);
        if ($del['tgl_berakhir'] != null) {
            $data = [
                'tgl_berakhir' => null,
                'updator' => null
            ];
            $this->historiModel->update($id, $data);
        }
        session()->setFlashdata('pesan', 'Jabatan Berhasil di Ubah');
        return redirect()->to('/admin/daftar_pegawai');
    }
    public function editJabatan($id)
    {
        $data = [
            'title' => 'Edit Jabatan',
            'validation' => \Config\Services::validation(),
            'jabat' => $this->historiModel->where('id', $id)->first()
        ];
        return view('admin/edit_histori', $data);
    }
    public function updateMutasi($id)
    {
        $this->historiModel->save([
            'id' => $id,
            'NIK' => $this->request->getVar('NIK'),
            'id_jabatan' => $this->request->getVar('id_jabatan'),
            'tgl_berakhir' => $this->request->getVar('tgl_berakhir'),
            'updator' => $this->request->getVar('updator'),
        ]);
        $del = $this->historiModel->find($id);
        if ($del['tgl_berakhir'] != null) {
            $data = [
                'id_jabatan' => 8
            ];
            $this->historiModel->update($id, $data);
        }

        session()->setFlashdata('pesan', 'Data berhasil diubah');
        return redirect()->to('/admin/mutasi_pegawai');
    }
    public function delete($id)
    {
        // $pegawai = $this->adminModel->find($id);
        // if ($pegawai['foto'] != 'default.svg') {
        //     unlink('img/' . $pegawai['foto']);
        // }
        $this->adminModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/admin/daftar_pegawai');
    }
    public function daftar_pegawai()
    {
        $currentPage = $this->request->getVar('page_data_pegawai') ? $this->request->getVar('page_data_pegawai') : 1;
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $data_pegawai = $this->adminModel->search($keyword);
        } else {
            $data_pegawai = $this->adminModel;
        }
        $data = [
            'title' => 'Daftar Pegawai',
            'currentPage' => $currentPage
        ];
        // $dataPegawai = $this->adminModel->select('data_pegawai.id pegawaiid, foto, nama, data_pegawai.id_jabatan, jabatan')->join('jabatan', 'data_pegawai.id_jabatan = jabatan.id_jabatan');

        // $dataPegawai = $this->adminModel->select('data_pegawai.id pegawaiid, foto, data_pegawai.nama, data_pegawai.NIK, jenkel');
        $dataPegawai = $this->adminModel->select('data_pegawai.id pegawaiid, foto, data_pegawai.nama, data_pegawai.NIK, histori.id_jabatan, jabatan')->join('histori', 'data_pegawai.NIK = histori.NIK', 'left')->join('jabatan', 'jabatan.id_jabatan = histori.id_jabatan', 'left');
        // $datahistori = $this->historiModel->select('histori.id pegawaiid, foto, data_pegawai.nama, data_pegawai.NIK, histori.id_jabatan, jabatan')->join('histori', 'data_pegawai.NIK = histori.NIK')->join('jabatan', 'jabatan.id_jabatan = histori.id_jabatan');
        // $data['datahistori'] = $datahistori;
        $data['data_pegawai'] = $dataPegawai->paginate(5, 'data_pegawai');
        $data['pager'] = $this->adminModel->pager;
        return view('admin/daftar_pegawai', $data);
    }
    public function detail($id = 0)
    {
        $data['title'] = 'User Detail';
        // $this->adminModel->select('data_pegawai.id_usr as pegawaiid, NIK, foto, nama, tangla, templa, alamat, id_jabatan, pendikte, name');
        // $this->adminModel->join('users', 'users.id = pegawai.id');
        // $this->adminModel->join('auth_groups_users', 'auth_groups_users.user_id = data_pegawai.id_usr');
        // $this->adminModel->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        // $this->adminModel->where('data_pegawai.id_usr', $id);
        // $query = $this->adminModel->get();
        $this->adminModel->select('data_pegawai.id pegawaiid, foto, data_pegawai.nama, data_pegawai.NIK, jenkel, jabatan, histori.id_jabatan');
        $this->adminModel->join('histori', 'data_pegawai.NIK = histori.NIK');
        $this->adminModel->join('jabatan', 'jabatan.id_jabatan = histori.id_jabatan');
        $this->adminModel->where('data_pegawai.id', $id);
        // $this->adminModel->select('data_pegawai.id pegawaiid, NIK, foto, nama, data_pegawai.id_jabatan, jabatan');
        // $this->adminModel->join('jabatan', 'jabatan.id_jabatan = data_pegawai.id_jabatan');
        // $this->adminModel->where('data_pegawai.id', $id);
        $query = $this->adminModel->get();
        $data['data_pegawai'] = $query->getRow();
        if (empty($data['data_pegawai'])) {
            return redirect()->to('/admin');
        }
        return view('admin/detail', $data);
    }
    public function mutasi_pegawai()
    {
        $currentPage = $this->request->getVar('page_data_pegawai') ? $this->request->getVar('page_data_pegawai') : 1;
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $data_pegawai = $this->historiModel->search($keyword);
        } else {
            $data_pegawai = $this->historiModel;
        }
        $data = [
            'title' => 'Mutasi Pegawai',
            'currentPage' => $currentPage
        ];
        $logHistori = $this->historiModel->select('histori.id,histori.NIK,nama, histori.id_jabatan, jabatan, tgl_mulai, tgl_berakhir, histori.creator, histori.updator')->join('data_pegawai', 'data_pegawai.NIK = histori.NIK')->join('jabatan', 'jabatan.id_jabatan = histori.id_jabatan');
        $data['logHistori'] = $logHistori->paginate(5, 'histori');
        $data['pager'] = $this->historiModel->pager;
        return view('admin/mutasi_pegawai', $data);
    }

    //  Query akun managamennt

    public function histori_akun()
    {
        $currentPage = $this->request->getVar('page_data_pegawai') ? $this->request->getVar('page_data_pegawai') : 1;
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $data_pegawai = $this->haModel->search($keyword);
        } else {
            $data_pegawai = $this->haModel;
        }
        $data = [
            'title' => 'Histori Akun',
            'currentPage' => $currentPage
        ];
        $logHistori = $this->haModel->select('keterangan, username, user_image, waktu');
        $data['logHistoriAkun'] = $logHistori->paginate(5, 'histori');
        $data['pager'] = $this->haModel->pager;
        return view('admin/histori_akun', $data);
    }
    public function daftar_akun()
    {
        $currentPage = $this->request->getVar('page_data_pegawai') ? $this->request->getVar('page_data_pegawai') : 1;
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $data_pegawai = $this->akunModel->search($keyword);
        } else {
            $data_pegawai = $this->akunModel;
        }
        $data = [
            'title' => 'Daftar Akun',
            'currentPage' => $currentPage
        ];
        // $users = new \Myth\Auth\Models\UserModel();
        // $data['users'] = $users->findAll();
        // $this->akunModel->select('users.id as userid, username, email, name');
        // $this->akunModel->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        // $this->akunModel->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        // $dataPegawai = $this->akunModel->findAll();
        // $this->akunModel->select('data_pegawai.id pegawaiid, foto, nama, data_pegawai.id_jabatan, jabatan');
        // $this->akunModel->join('jabatan', 'data_pegawai.id_jabatan = jabatan.id_jabatan');
        // $query = $this->akunModel->get();
        // $data['data_pegawai'] = $query->getResult();
        $data['data_akun'] = $this->akunModel->paginate(5, 'users');
        $data['pager'] = $this->akunModel->pager;
        // $data['data_pegawai'] = $query->getResult();
        return view('admin/daftar_akun', $data);
    }
    public function hapus($id)
    {
        $pegawai = $this->akunModel->find($id);
        // if ($pegawai['foto'] != 'default.svg') {
        //     unlink('img/' . $pegawai['foto']);
        // }
        $this->akunModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/admin/daftar_akun');
    }
    public function trash()
    {
        $currentPage = $this->request->getVar('page_data_pegawai') ? $this->request->getVar('page_data_pegawai') : 1;
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $data_pegawai = $this->adminModel->search($keyword);
        } else {
            $data_pegawai = $this->adminModel;
        }
        $data = [
            'title' => 'Trash',
            'currentPage' => $currentPage
        ];
        // $dataPegawai = $this->adminModel->select('data_pegawai.id pegawaiid, foto, nama, data_pegawai.id_jabatan, jabatan')->join('jabatan', 'data_pegawai.id_jabatan = jabatan.id_jabatan');
        $dataPegawai = $this->adminModel->select('data_pegawai.id, foto, data_pegawai.nama, data_pegawai.NIK, histori.id_jabatan, jabatan')->join('histori', 'data_pegawai.NIK = histori.NIK')->join('jabatan', 'jabatan.id_jabatan = histori.id_jabatan')->onlyDeleted();

        $data['data_pegawai'] = $dataPegawai->paginate(5, 'data_pegawai');
        $data['pager'] = $this->adminModel->pager;
        return view('admin/trash', $data);
    }
    public function restore($id)
    {
        $del = $this->adminModel->onlyDeleted()->find($id);
        if ($del['deleted_at']) {
            $data = [
                'deleted_at' => null
            ];
            $this->adminModel->update($id, $data);
            session()->setFlashdata('pesan', 'Data berhasil direstore');
            return redirect()->to('/admin/trash');
        }
    }
    public function delete2($id)
    {
        $pegawai = $this->adminModel->onlyDeleted()->find($id);
        if ($pegawai['foto'] != 'default.svg') {
            unlink('img/' . $pegawai['foto']);
        }
        $del = $this->adminModel->onlyDeleted()->find($id);
        if ($del['deleted_at'] != null) {
            $this->adminModel->purgeDeleted();
            session()->setFlashdata('pesan', 'Data berhasil dihapus');
            return redirect()->to('/admin/trash');
        }
    }
}
