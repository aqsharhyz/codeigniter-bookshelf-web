<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class Auth extends BaseController
{
    protected $userModel;
    protected $validation;
    function __construct()
    {
        $this->userModel = new UserModel();
        $this->validation = \Config\Services::validation();
        // helper(['cookie', 'emailer']);
        helper('cookie');
        // helper('emailer');
    }

    public function index()
    {
        return redirect()->to('/auth/login');
    }

    public function login() {
        if (!(get_cookie('cookie_username') && get_cookie('cookie_password') && get_cookie('cookie_id'))) {
            return view('auth2/login');
        }
        $username = get_cookie('cookie_username');
        $password = get_cookie('cookie_password');
        $id = get_cookie('cookie_id');
        $user = $this->userModel->getData($username);
        if ($user) {
            if (password_verify($password, $user['password'])) {
                if ($id == $user['id']) {
                    session()->set([
                        'username' => $user['username'],
                        'fullname' => $user['fullname'],
                        'email' => $user['email'],
                    ]);
                    return redirect()->to('/auth/success');
                }
                //id tidak sesuai
            }
        }
        $err[] = 'Username or password is incorrect';
        session()->setFlashdata('warning', $err);
        return redirect()->to('auth/login')->withInput();
    }

    public function signin() {
        $data = $this->request->getPost([
            'username',
            'password',
            'remember_me',
        ]);
        // dd($data);
        $rules = [
            'username' => 'required',
            'password' => 'required',
            'remember_me' => 'in_list[0,1]',
        ];
        if (!$this->validateData($data, $rules)) {
            session()->setFlashdata('warning', $this->validation->getErrors());
            return redirect()->to('/auth/login')->withInput();
        }
        $user = $this->userModel->getData($data['username']);
        if ($user) {
            if (password_verify($data['password'], $user['password'])) {
                session()->set([
                    'username' => $user['username'],
                    'fullname' => $user['fullname'],
                    'email' => $user['email'],
                    'id' => $user['id'],
                ]);
                if ($data['remember_me'] == 1) {
                    $this->set_auth_cookie($user['username'], $user['id'], $user['password']);
                }
                return redirect()->to('/auth/success')->withCookies();
            }
        }
        $err[] = 'Username or password is incorrect';
        session()->setFlashdata('username', $data['username']);
        session()->setFlashdata('warning', $err);
        return redirect()->to('/auth/login')->withInput();
    }

    public function success() {
        return redirect()->to('/books');
        // print_r(session()->get());
        // echo "ISIAN COOKIE USERNAME " . get_cookie("cookie_username") . " DAN PASSWORD " . get_cookie("cookie_password");   
    }

    public function register() {
        return view('auth2/register');
    }

    public function signup() {
        $data = $this->request->getPost([
            'username',
            'fullname',
            'email',
            'phone',
            'password',
            'confirm_password',
        ]);

        // dd($data);

        $rules = [
            'username' => 'required|is_unique[user.username]|alpha_numeric|min_length[4]|max_length[20]',
            'fullname' => 'required',
            'email' => 'required|valid_email|is_unique[user.email]',
            'phone' => 'required|numeric',
            'password' => 'required|min_length[6]',
            'confirm_password' => 'required|matches[password]',
        ];

        if (!$this->validateData($data, $rules)) {
            session()->setFlashdata('warning', $this->validation->getErrors());
            return redirect()->to('/auth/register')->withInput();
        }
        
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        $this->userModel->save($data);

        session()->set([
            'username' => $data['username'],
            'fullname' => $data['fullname'],
            'email' => $data['email'],
            'id' => $this->userModel->insertID(),
        ]);
        $this->set_auth_cookie($data['username'], $this->userModel->insertID(), $data['password']);
        session()->setFlashdata('success', 'Your account has been created');
        return redirect()->to('/auth/success')->withCookies();
    }

    public function logout() {
        delete_cookie('cookie_username');
        delete_cookie('cookie_password');
        delete_cookie('cookie_id');
        session()->destroy();
        echo view('auth2/login');
        redirect()->to('/auth/login');
    }

    public function forgot_password() {
        $err = [];
        if ($this->request->is('post')) {
            $username = $this->request->getVar('username');
            if ($username == '') {
                $err[] = 'Username is required';
            }
            if (empty($err)) {
                $user = $this->userModel->getData($username);
                if (empty($user)) {
                    $err[] = 'Username is not registered';
                } else {
                    $email = $user['email'];
                    $token = md5($email . date('ymdhis'));

                    $link = site_url('auth/reset-password?email=' . $email . '&token=' . $token);
                    $attachment = "";
                    $to = $email;
                    $title = "Reset Password";
                    $message = "Click this link to reset your password: <a href='" . $link . "'>Reset Password</a>";
                    
                    emailer($attachment, $to, $title, $message);

                    $data = [
                        'token' => $token,
                        'email' => $email,
                    ];

                    $this->userModel->updateData($data);
                    session()->setFlashdata('success', 'Please check your email to reset your password');
                }
                if ($err) {
                    session()->setFlashdata("username", $username);
                    session()->setFlashdata("warning", $err);
                }
                return redirect()->to('/auth/forgot-password');
            }
        }
        return view('auth/forgot_password');
    }

    public function reset_password() {
        $err = [];
        $email = $this->request->getVar('email');
        $token = $this->request->getVar('token');
        if ($email == '' || $token == '') {
            $err[] = 'Email and token are required';
        } else {
            $user = $this->userModel->getData($email);
            if (empty($user)) {
                $err[] = 'Email is not registered';
            } else {
                if ($token != $user['token']) {
                    $err[] = 'Token is invalid';
                }
            }
        }

        if ($err) {
            session()->setFlashdata('warning', $err);
        }

        if ($this->request->is('post')) {
            $rules = [
                'password' => [
                    'label' => 'Password',
                    'rules' => 'required|min_length[8]',
                    'errors' => [
                        'required' => '{field} is required',
                        'min_length' => '{field} must be at least 8 characters',
                    ],
                ],
                'confirm_password' => [
                    'label' => 'Confirm Password',
                    'rules' => 'required|matches[password]',
                    'errors' => [
                        'required' => '{field} is required',
                        'matches' => '{field} does not match with password',
                    ],
                ],
            ];

            if (!$this->validate($rules)) {
                session()->setFlashdata("warning", $this->validation->getErrors());
            } else {
                $dataUpdate = [
                    'email' => $email,
                    'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                    'token' => null,
                ];
                $this->userModel->updateData($dataUpdate);
                session()->setFlashdata('success', 'Password has been reset');

                delete_cookie('cookie_username');
                delete_cookie('cookie_password');

                return redirect()->to('/auth/login');
            }
        }
    }

    private function set_auth_cookie($username, $id, $password) {
        set_cookie('cookie_username', $username, 3600 * 24 * 30);
        set_cookie('cookie_id', $id, 3600 * 24 * 30);
        set_cookie('cookie_password', $password, 3600 * 24 * 30);
    }
}
