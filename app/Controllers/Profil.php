<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\User_model;

class Profil extends BaseController
{

    public $user;

    public function __construct()
    {
        $this->user = new User_model();
    }

    public function index()
    {
        $data['user'] = $this->user->where('user_id', session('userid'))->first();
        return view('profil/profile', $data);
    }

    public function update()
    {
        $userid = session('userid');
        //menggunakan model user untuk memanggil data user berdasarkan id
        $data["user"] = $this->user->find($userid);
        return view('profil/updateuser', $data);
    }

    public function updatepassword()
    {
        $data['user'] = $this->user->where('user_id', session('userid'))->first();
        return view('profil/updatepassword', $data);
    }

    public function updatefoto()
    {
        $data['user'] = $this->user->where('user_id', session('userid'))->first();
        return view('profil/updatefoto', $data);
    }

    public function profil_update()
    {
        //mengnisiasi post dari form ke dalam array
        $form_data = [
            'user_id'  => $this->request->getPost('user_id'),
            'user_nick'  => $this->request->getPost('username'),
            'user_nama'  => $this->request->getPost('user_nama'),
            'user_nik' => $this->request->getPost('user_nik'),
            'user_email' => $this->request->getPost('user_email'),
        ];
        $usercheck = $this->user->where(['user_nick' => $this->request->getPost('username'), 'user_id !=' => $this->request->getPost('user_id')])->first();
        if ($usercheck) {
            session()->setFlashdata([
                'status'    => 'Failed', 'message'   => 'Username telah digunakan orang lain', 'color'     => 'danger', 'icon'      => 'ri-error-warning-line'
            ]);
            return redirect()->to('profil/update/' . $this->request->getPost('user_id'));
        } else {
            if ($this->user->save($form_data)) {
                $sessiondata = [
                    'username'  => $this->request->getPost('username'),
                    'nama'      => $this->request->getPost('user_nama'),
                ];
                session()->set($sessiondata);
                session()->setFlashdata([
                    'status'    => 'Success', 'message'   => 'Update Data Berhasil', 'color'     => 'success', 'icon'      => 'ri-check-double-line'
                ]);
                return redirect()->to('profil/update/' . $this->request->getPost('user_id'));
            } else {
                session()->setFlashdata([
                    'status'    => 'Failed', 'message'   => 'Input Data Gagal', 'color'     => 'danger', 'icon'      => 'ri-error-warning-line'
                ]);
                return redirect()->to('profil/update/' . $this->request->getPost('user_id'));
            }
        }
    }



    public function password_update()
    {
        $userid = $this->request->getPost('user_id');
        $checkuser = $this->user->where('user_id', $userid)->first();
        $passwordlama = ($this->request->getPost('passwordlama') ? $this->request->getPost('passwordlama') : "");
        $passwordbaru = ($this->request->getPost('passwordbaru') ? $this->request->getPost('passwordbaru') : "");

        if (password_verify($passwordlama, $checkuser['password'])) {
            $form_data = [
                'user_id'  => $this->request->getPost('user_id'),
                'password'  => PASSWORD_HASH($passwordbaru, PASSWORD_DEFAULT)
            ];
            if ($this->user->save($form_data)) {
                $sessiondata = [
                    'logged_in' => false,
                ];
                session()->set($sessiondata);
                session()->setFlashdata(['status' => 'Success', 'message' => 'Update Password Berhasil. Sistem akan melakukan logout otomatis', 'color' => 'success', 'icon' => 'ri-check-double-line']);
                return redirect()->to('profil/updatepassword');
            } else {
                session()->setFlashdata(['status' => 'Failed', 'message' => 'Update Password Gagal', 'color' => 'danger', 'icon' => 'ri-error-warning-line']);
                return redirect()->to('profil/updatepassword');
            }
        } else {
            session()->setFlashdata(['status' => 'Failed', 'message' => 'Password lama anda salah', 'color' => 'danger', 'icon' => 'ri-error-warning-line']);
            return redirect()->to('profil/updatepassword');
        }
    }

    public function foto_update()
    {
        $userid = $this->request->getPost('user_id');
        if ($this->request->getFile('foto')->isValid()) {
            $validationRule = [
                'foto' => [
                    'label' => 'Foto File',
                    'rules' => 'uploaded[foto]' . '|mime_in[foto,image/jpg,image/JPG,image/jpeg,image/gif,image/png,image/webp]' . '|max_size[foto,5120]',
                ],
            ];
            if (!$this->validate($validationRule)) {
                session()->setFlashdata([
                    'status'    => 'Failed',
                    'message'   => 'Upload Foto Gagal. Ekstensi File tidak diperbolehkan atau ukuran file terlalu besar',
                    'color'     => 'danger',
                    'icon'      => 'ri-error-warning-line'
                ]);
                //redirect ke halaman program list
                return redirect()->to('profil/updatefoto');
            } else {
                $foto = $this->request->getFile('foto');
                $newName = $foto->getRandomName();
                $foto->move('./uploads/profil/', $newName);
                $data = [
                    'user_id'        => $userid,
                    'avatar'        => $newName
                ];
                if ($this->user->save($data)) {
                    $sessiondata = [
                        'avatar' => $newName
                    ];
                    session()->set($sessiondata);
                    session()->setFlashdata(['status' => 'Success', 'message' => 'Update Foto Berhasil', 'color' => 'success', 'icon' => 'ri-check-double-line']);
                    return redirect()->to('profil/updatefoto');
                } else {
                    session()->setFlashdata(['status' => 'Failed', 'message' => 'Update Foto Gagal', 'color' => 'danger', 'icon' => 'ri-error-warning-line']);
                    return redirect()->to('profil/updatefoto');
                }
            }
        }
    }
}
