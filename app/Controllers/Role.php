<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Role_model;
use App\Models\User_model;
use App\Models\RoleAssign_model;
use App\Models\Rusun_model;


class Role extends BaseController
{

    protected $role;
    protected $users;
    protected $roleAssign;
    protected $rusun;

    public function __construct() //konstruktor
    {
        //memanggil dan menginstansiasi model role
        $this->role = new Role_model();
        //memanggil dan menginstansiasi model users
        $this->users = new User_model();
        $this->roleAssign = new RoleAssign_model();
        $this->rusun = new Rusun_model();
        helper(['string']);
    }

    public function index()
    {
        return redirect()->to('role/list');
    }

    public function list()
    {
        $data['users'] = $this->users->where('status', 'Aktif')->orderBy('user_nama', 'ASC')->findAll();
        $data['role'] = $this->role->orderBy('role_id', 'ASC')->findAll();
        $data["roleAssign"] = $this->roleAssign->getRoleAssign()->getResultArray();
        $data['rusun'] = $this->rusun->findAll();
        return view('role/list', $data);
    }

    public function save()
    {
        $id = ($this->request->getPost('userid') ? $this->request->getPost('userid') : "");
        $role = ($this->request->getPost('role') ? $this->request->getPost('role') : "");
        $rusun = ($role == 3 ? $this->request->getPost('rusun') : "");
        $rolecheck = $this->roleAssign->where(['id_user' => $id, 'id_role' => $role])->first();
        if (!empty($rolecheck)) {
            session()->setFlashdata([
                'status'    => 'Failed',
                'message'   => 'Input Role Gagal. User dengan role tersebut telah ada',
                'color'     => 'danger',
                'icon'      => 'ri-error-warning-line'
            ]);
            //redirect ke halaman program list
            return redirect()->to('role/list');
        } else {
            $form_data = [
                'id_user'  => $id,
                'id_role' => $role,
                'id_rusun' => $rusun
            ];

            if ($this->roleAssign->save($form_data)) {
                //inisiasi flashdata jika data berhasil disimpan
                session()->setFlashdata([
                    'status'    => 'Success',
                    'message'   => 'Input Role Berhasil',
                    'color'     => 'success',
                    'icon'      => 'ri-check-double-line'
                ]);
                //redirect ke halaman program list
                return redirect()->to('role/list');
            }
        }
    }

    public function delete($id)
    {
        if ($this->roleAssign->delete($id)) {
            //inisiasi flashdata jika data berhasil disimpan
            session()->setFlashdata([
                'status'    => 'Success',
                'message'   => 'Hapus Role Berhasil',
                'color'     => 'success',
                'icon'      => 'ri-delete-bin-2-line'
            ]);
            //redirect ke halaman program list
            return redirect()->to('role');
        } else {
            //inisiasi flashdata jika data gagal disimpan
            session()->setFlashdata([
                'status'    => 'Failed',
                'message'   => 'Hapus Role Gagal',
                'color'     => 'danger',
                'icon'      => 'ri-error-warning-line'
            ]);
            //redirect ke halaman program list
            return redirect()->to('role');
        }
    }
}
