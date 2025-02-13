<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Penghuni_model;

class Profile extends BaseController
{

    public $penghuni;

    public function __construct()
    {
        $this->penghuni = new Penghuni_model();
        helper(['ruangWa']);
    }

    public function index()
    {
        $data['user'] = $this->penghuni->where('user_id', session('userid'))->first();
        return view('profile/profile', $data);
    }

    public function update()
    {
        $userid = session('userid');
        //menggunakan model user untuk memanggil data user berdasarkan id
        $data["user"] = $this->penghuni->where('user_id', $userid)->first();
        return view('profile/updateuser', $data);
    }

    public function updatepassword()
    {
        $data['user'] = $this->penghuni->where('user_id', session('userid'))->first();
        return view('profile/updatepassword', $data);
    }

    public function updatefoto()
    {
        $data['user'] = $this->penghuni->where('user_id', session('userid'))->first();
        return view('profile/updatefoto', $data);
    }

    public function profil_update()
    {
        //mengnisiasi post dari form ke dalam array
        $form_data = [
            'id_penghuni'  => $this->request->getPost('id_penghuni'),
            'user_id'  => $this->request->getPost('user_id'),
            'nama'  => $this->request->getPost('nama'),
            'nik' => $this->request->getPost('ktp'),
            'kontak' => $this->request->getPost('telepon'),
            'email' => $this->request->getPost('email'),
        ];

        if ($this->penghuni->save($form_data)) {
            $sessiondata = [
                'nama'      => $this->request->getPost('nama'),
            ];
            session()->set($sessiondata);
            session()->setFlashdata([
                'status'    => 'Success', 'message'   => 'Update Data Berhasil', 'color'     => 'success', 'icon'      => 'ri-check-double-line'
            ]);
            return redirect()->to('profile/update/' . $this->request->getPost('user_id'));
        } else {
            session()->setFlashdata([
                'status'    => 'Failed', 'message'   => 'Input Data Gagal', 'color'     => 'danger', 'icon'      => 'ri-error-warning-line'
            ]);
            return redirect()->to('profile/update/' . $this->request->getPost('user_id'));
        }
    }



    public function password_update($userid)
    {
        $checkuser = $this->penghuni->where('kode_penghuni', $userid)->first();
        $newpassword = random_int(100000, 999999);
        $form_data = [
            'id_penghuni'  => $checkuser['id_penghuni'],
            'password' => password_hash($newpassword, PASSWORD_DEFAULT)
        ];
        if ($this->penghuni->save($form_data)) {
            $message = "*Aparus 2.0*%0aReset Password%0a%0aSandi baru : *$newpassword*%0a%0aMohon untuk tidak membagikan informasi ini kepada orang lain.%0aSalam kami, *Admin Aparus*.";
            send_message($checkuser['kontak'], $message);
            $sessiondata = [
                'logged_in' => false,
            ];
            session()->set($sessiondata);
            //inisiasi flashdata jika data berhasil disimpan
            session()->setFlashdata([
                'success'   => true,
                'status'    => 'Success',
                'message'   => 'Update password Berhasil',
                'color'     => 'success',
                'icon'      => 'ri-check-double-line'
            ]);
            return redirect()->to('profile/updatepassword');
        } else {
            session()->setFlashdata(['status' => 'Failed', 'message' => 'Update Password Gagal', 'color' => 'danger', 'icon' => 'ri-error-warning-line']);
            return redirect()->to('profil/updatepassword');
        }
    }

    public function foto_update()
    {
        $idpenghuni = $this->request->getPost('id_penghuni');
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
                return redirect()->to('profile/updatefoto');
            } else {
                $foto = $this->request->getFile('foto');
                $newName = $foto->getRandomName();
                $foto->move('./uploads/profil/', $newName);
                $data = [
                    'id_penghuni'        => $idpenghuni,
                    'avatar'        => $newName
                ];
                if ($this->penghuni->save($data)) {
                    $sessiondata = [
                        'avatar' => $newName
                    ];
                    session()->set($sessiondata);
                    session()->setFlashdata(['status' => 'Success', 'message' => 'Update Foto Berhasil', 'color' => 'success', 'icon' => 'ri-check-double-line']);
                    return redirect()->to('profile/updatefoto');
                } else {
                    session()->setFlashdata(['status' => 'Failed', 'message' => 'Update Foto Gagal', 'color' => 'danger', 'icon' => 'ri-error-warning-line']);
                    return redirect()->to('profile/updatefoto');
                }
            }
        }
    }
}
