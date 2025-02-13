<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User_model;
use App\Models\Role_model;
use App\Models\RoleAssign_model;
use App\Models\Rusun_model;

class Users extends BaseController
{
    protected $user_model;
    protected $role;
    protected $roleAssign;
    protected $rusun;

    public function __construct() //konstruktor
    {
        //memanggil dan menginstansiasi model program
        $this->user_model = new User_model();
        $this->role = new Role_model();
        $this->roleAssign = new RoleAssign_model();
        $this->rusun = new Rusun_model();
    }

    public function index()
    {
        //menggunakan model user
        $data["users"] = $this->user_model->findAll();

        //menampilkan view user
        return view('users/list', $data);
    }

    public function list()
    {
        //menggunakan model user
        $data["users"] = $this->user_model->findAll();

        //menampilkan view user
        return view('users/list', $data);
    }

    public function new()
    {
        //load_view('users/add');
        return view('users/new');
    }

    public function delete($id)
    {
        //mengupdate data ke database dan mengirimkan statusnya
        if ($this->user_model->delete($id)) {
            //inisiasi flashdata jika data berhasil disimpan
            session()->setFlashdata([
                'status'    => 'Success',
                'message'   => 'Hapus Data Berhasil',
                'color'     => 'success',
                'icon'      => 'ri-delete-bin-2-line'
            ]);
            //redirect ke halaman program list
            return redirect()->to('users/list');
        } else {
            //inisiasi flashdata jika data gagal disimpan
            session()->setFlashdata([
                'status'    => 'Failed',
                'message'   => 'Hapus Data Gagal',
                'color'     => 'danger',
                'icon'      => 'ri-error-warning-line'
            ]);
            //redirect ke halaman program list
            return redirect()->to('users/list');
        }
    }

    public function edit($id)
    {
        //menggunakan model user untuk memanggil data user berdasarkan id
        $data["user"] = $this->user_model->find($id);

        //menampilkan view edit program dan mengirimkan data program berdasarkan id
        return view('users/edit', $data);
    }

    public function save()
    {
        $data["user_check"] = $this->user_model->where('user_nick', $this->request->getPost('username'))->first();
        $data["email_check"] = $this->user_model->where('user_email', $this->request->getPost('email'))->first();
        //mengnisiasi post dari form ke dalam array
        if ($data["user_check"]) {
            session()->setFlashdata([
                'status'    => 'Failed',
                'message'   => 'Username sudah digunakan',
                'color'     => 'danger',
                'icon'      => 'ri-check-double-line'
            ]);
            //redirect ke halaman program list
            return redirect()->to('users/new');
        } elseif ($data["email_check"]) {
            session()->setFlashdata([
                'status'    => 'Failed',
                'message'   => 'Email sudah digunakan',
                'color'     => 'danger',
                'icon'      => 'ri-check-double-line'
            ]);
            //redirect ke halaman program list
            return redirect()->to('users/new');
        } else {
            $form_data = [
                'user_nick'  => strtolower(str_replace(' ', '', ($this->request->getPost('username') ? $this->request->getPost('username') : ""))),
                'user_nama'  => $this->request->getPost('user_nama'),
                'password'  => password_hash(($this->request->getPost('password') ? $this->request->getPost('password') : ""), PASSWORD_DEFAULT),
                'user_nik' => $this->request->getPost('user_nik'),
                'user_email' => $this->request->getPost('email'),
            ];
            //menyimpan data ke database dan mengirimkan statusnya
            if ($this->user_model->save($form_data)) {
                //inisiasi flashdata jika data berhasil disimpan
                session()->setFlashdata([
                    'status'    => 'Success',
                    'message'   => 'Input Data Berhasil',
                    'color'     => 'success',
                    'icon'      => 'ri-check-double-line'
                ]);
                //redirect ke halaman program list
                return redirect()->to('users/list');
            } else {
                //inisiasi flashdata jika data gagal disimpan
                session()->setFlashdata([
                    'status'    => 'Failed',
                    'message'   => 'Input Data Gagal',
                    'color'     => 'danger',
                    'icon'      => 'ri-error-warning-line'
                ]);
                //redirect ke halaman program list
                return redirect()->to('users/list');
            }
        }
    }

    public function update()
    {
        //mengnisiasi post dari form ke dalam array
        $form_data = [
            'user_id'  => $this->request->getPost('user_id'),
            'user_nick'  => $this->request->getPost('username'),
            'user_nama'  => $this->request->getPost('user_nama'),
            'user_nik' => $this->request->getPost('user_nik'),
            'user_email' => $this->request->getPost('user_email'),
        ];
        $usercheck = $this->user_model->where(['user_nick' => $this->request->getPost('username'), 'user_id !=' => $this->request->getPost('user_id')])->first();
        if ($usercheck) {
            session()->setFlashdata([
                'status'    => 'Failed', 'message'   => 'Username telah digunakan orang lain', 'color'     => 'danger', 'icon'      => 'ri-error-warning-line'
            ]);
            return redirect()->to('users/edit/' . $this->request->getPost('user_id'));
        } else {
            if ($this->user_model->save($form_data)) {
                $sessiondata = [
                    'username'  => $this->request->getPost('username'),
                    'nama'      => $this->request->getPost('user_nama'),
                ];
                session()->set($sessiondata);
                session()->setFlashdata([
                    'status'    => 'Success', 'message'   => 'Update Data Berhasil', 'color'     => 'success', 'icon'      => 'ri-check-double-line'
                ]);
                return redirect()->to('users/list/');
            } else {
                session()->setFlashdata([
                    'status'    => 'Failed', 'message'   => 'Input Data Gagal', 'color'     => 'danger', 'icon'      => 'ri-error-warning-line'
                ]);
                return redirect()->to('users/edit/' . $this->request->getPost('user_id'));
            }
        }
    }

    public function getUserDetailsJson()
    {
        $nip =  $this->request->getPost('nip');
        $data = $this->user_model->where(['user_nip' => $nip])->first();
        return json_encode($data);
    }

    public function aktifkan($id)
    {
        $form_data = [
            'user_id'  => $id,
            'status'  => 'Aktif'
        ];
        if ($this->user_model->save($form_data)) {
            session()->setFlashdata(['status' => 'Success', 'message' => 'User telah diaktifkan', 'color' => 'success', 'icon' => 'ri-check-double-line']);
        } else {
            session()->setFlashdata(['status' => 'Failed', 'message' => 'User belum dapat diaktifkan', 'color' => 'danger', 'icon' => 'ri-error-warning-line']);
        }
        return redirect()->to('users/list');
    }

    public function nonaktifkan($id)
    {
        $form_data = [
            'user_id'  => $id,
            'status'  => 'Nonaktif'
        ];
        if ($this->user_model->save($form_data)) {
            session()->setFlashdata(['status' => 'Success', 'message' => 'User telah diaktifkan', 'color' => 'success', 'icon' => 'ri-check-double-line']);
        } else {
            session()->setFlashdata(['status' => 'Failed', 'message' => 'User belum dapat diaktifkan', 'color' => 'danger', 'icon' => 'ri-error-warning-line']);
        }
        return redirect()->to('users/list');
    }

    public function role()
    {
        $data['users'] = $this->user_model->where('status', 'Aktif')->orderBy('user_nama', 'ASC')->findAll();
        $data['role'] = $this->role->orderBy('role_id', 'ASC')->findAll();
        $data["roleAssign"] = $this->roleAssign->getRoleAssign()->getResultArray();
        $data['rusun'] = $this->rusun->findAll();
        return view('users/role', $data);
    }
}
