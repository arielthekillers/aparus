<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Penghuni_model;
use App\Models\User_model;
use App\Models\Role_model;
use App\Models\RoleAssign_model;

class Auth extends BaseController
{
    protected $user;
    protected $penghuni;
    protected $role;
    protected $roleassign;

    public function __construct()
    {
        helper(['auth', 'ruangWa']);
    }
    public function login()
    {
        if (session('logged_in')) {
            return redirect()->to('');
        }
        return view('auth/login');
    }
    public function signup()
    {
        if (session('logged_in')) {
            return redirect()->to('');
        }
        return view('auth/signup');
    }
    public function password_reset()
    {
        if (session('logged_in')) {
            return redirect()->to('');
        }
        return view('auth/password-reset');
    }
    public function confirmation()
    {
        if (session('logged_in')) {
            return redirect()->to('');
        } else {
            if (session()->getFlashdata('success')) {
                return view('auth/confirmation');
            } else {
                return redirect()->to('auth/login');
            }
        }
    }
    public function logout()
    {
        session_destroy();
        return redirect()->to('auth/login');
    }

    public function switcher()
    {
        $this->role = new Role_model();
        $data['role'] = $this->role->where('id_user', session('userid'))->findAll();
        session()->set('rolecount', count($data['role']));
        if (count($data['role']) == 1) {
            return redirect()->to('auth/switchTo/' . $data['role'][0]['type']);
        } else {
            return view('auth/roleswitcher', $data);
        }
    }
    public function switchTo($type)
    {
        session()->remove('role');
        session()->remove('subkegiatan');
        session()->remove('paket');
        $this->role = new Role_model();
        $rolecheck = $this->role->where(['id_user' => session('userid'), 'type' => $type])->first();
        if ($rolecheck) {
            session()->set('role', $rolecheck['type']);
            $this->roleassign = new Roleassign_model();
            if ($type == 'PPTK') {
                $subkegiatan = $this->roleassign->where(['role_user_id' => $rolecheck['user_role_id'], 'role_paket' => ''])->findAll();
                if ($subkegiatan) {
                    foreach ($subkegiatan as $value) {
                        $sub[] = $value['role_subkegiatan'];
                        session()->set('subkegiatan', $sub);
                    }
                }
            } elseif ($type == 'PPK') {
                $paket = $this->roleassign->where(['role_user_id' => $rolecheck['user_role_id'], 'role_subkegiatan' => ''])->findAll();
                if ($paket) {
                    foreach ($paket as $value) {
                        $sub[] = $value['role_paket'];
                    }
                    session()->set('paket', $sub);
                }
            }
            return redirect()->to('');
        }
    }

    public function verify()
    {
        $username = ($this->request->getPost('username') ? $this->request->getPost('username') : "");
        $password = ($this->request->getPost('password') ? $this->request->getPost('password') : "");
        if (empty($username)) {
            $error[] = 'Username atau No. Telepon harus diisi';
        }
        if (empty($password)) {
            $error[] = 'Password harus diisi';
        }
        if (!empty($error)) {
            session()->setFlashdata([
                'error'    => $error
            ]);
            return redirect()->to('auth/login');
        } else {
            if (checkIsUsernameOrPhone($username) == 'phone') {
                $usertype = 'penghuni';
                $this->penghuni = new Penghuni_model();
                $checkuser = $this->penghuni->where('kontak', $username)->first();
            } else {
                $usertype = 'pengelola';
                $this->user = new User_model();
                $checkuser = $this->user->where('user_nick', $username)->first();
            }
            if ($checkuser) {
                if (password_verify($password, $checkuser['password'])) {
                    if ($usertype == 'penghuni') {
                        $user_nick = $checkuser['kode_penghuni'];
                        $nama = $checkuser['nama'];
                        $user_id = $checkuser['kode_penghuni'];
                    } else {
                        $user_nick = $checkuser['user_nick'];
                        $nama = $checkuser['user_nama'];
                        $user_id = $checkuser['user_id'];
                    }
                    $sessiondata = [
                        'username'  => $user_nick,
                        'userid'    => $user_id,
                        'nama'      => $nama,
                        'avatar'    => $checkuser['avatar'],
                        'usertype'  => $usertype,
                        'logged_in' => true,
                    ];

                    session()->set($sessiondata);
                    return redirect()->to('');
                } else {
                    $error[] = 'Password Salah';
                    session()->setFlashdata([
                        'error'    => $error
                    ]);
                    return redirect()->to('auth/login');
                }
            } else {
                $error[] = 'User tidak terdaftar atau tidak aktif';
                session()->setFlashdata([
                    'error'    => $error
                ]);
                return redirect()->to('auth/login');
            }
        }
    }
    public function register()
    {
        $nik = ($this->request->getPost('nik') ? $this->request->getPost('nik') : "");
        $nama = ($this->request->getPost('nama') ? $this->request->getPost('nama') : "");
        $phone = ($this->request->getPost('phone') ? $this->request->getPost('phone') : "");
        $this->penghuni = new Penghuni_model();
        $checkuser = $this->penghuni->checkPenghuniEksist($phone, $nik)->getResult();
        if ($checkuser) {
            $error[] = 'NIK atau No. Handphone sudah terdaftar';
            session()->setFlashdata([
                'error'    => $error
            ]);
            return redirect()->to('auth/signup');
        } else {
            $kode_penghuni = substr(md5(microtime()), rand(0, 26), 10);
            $password = random_int(100000, 999999);
            $form_data = [
                'ktp'  => $nik,
                'nama' => $nama,
                'kontak' => $phone,
                'kode_penghuni' => $kode_penghuni,
                'password' => password_hash($password, PASSWORD_DEFAULT)
            ];

            if ($this->penghuni->save($form_data)) {
                $message = "Selamat Datang di *Aparus 2.0*%0a%0aTerima kasih telah melakukan pendaftaran akun di aplikasi Aparus.%0aBerikut kami kami kirimkan informasi akun anda%0aNama : *$nama*%0aNo. Telepon : *$phone*%0aSandi : *$password*%0a%0aMohon untuk tidak membagikan informasi ini kepada orang lain.%0aSalam kami, *Admin Aparus*.";
                send_message($phone, $message);
                //inisiasi flashdata jika data berhasil disimpan
                session()->setFlashdata([
                    'success'   => true,
                    'status'    => 'Success',
                    'message'   => '<strong>Pendaftaran User Berhasil</strong><br/> Kami telah mengirim informasi akun ke nomor whatsapp anda. Silahkan login dengan password yang terlah diberikan',
                    'color'     => 'success',
                    'icon'      => 'ri-check-double-line'
                ]);
                //redirect ke halaman program list
                return redirect()->to('auth/confirmation');
            }
        }
    }
    public function reset()
    {
        $phone = ($this->request->getPost('phone') ? $this->request->getPost('phone') : "");
        $this->penghuni = new Penghuni_model();
        $checkuser = $this->penghuni->where('kontak', $phone)->first();
        if (empty($checkuser)) {
            $error[] = 'No. Handphone anda belum terdaftar, Masukkan No. Handphone yang benar atau lakukan pendaftaran jika anda belum memiliki akun';
            session()->setFlashdata([
                'error'    => $error
            ]);
            return redirect()->to('auth/signup');
        } else {
            $password = random_int(100000, 999999);
            $form_data = [
                'id_penghuni'  => $checkuser['id_penghuni'],
                'password' => password_hash($password, PASSWORD_DEFAULT)
            ];

            if ($this->penghuni->save($form_data)) {
                $message = "*Aparus 2.0*%0aReset Password%0a%0aSandi baru : *$password*%0a%0aMohon untuk tidak membagikan informasi ini kepada orang lain.%0aSalam kami, *Admin Aparus*.";
                send_message($phone, $message);
                //inisiasi flashdata jika data berhasil disimpan
                session()->setFlashdata([
                    'success'   => true,
                    'status'    => 'Success',
                    'message'   => '<strong>Reset password Berhasil</strong><br/> Kami telah mengirim password baru ke nomor whatsapp anda. Silahkan login dengan password yang terlah diberikan',
                    'color'     => 'success',
                    'icon'      => 'ri-check-double-line'
                ]);
                //redirect ke halaman program list
                return redirect()->to('auth/confirmation');
            }
        }
    }
}
