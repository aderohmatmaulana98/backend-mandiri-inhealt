<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . "libraries/Format.php";
require APPPATH . "libraries/RestController.php";

use chriskacerguis\RestServer\RestController;

class Auth extends RestController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Base_model');
    }

    public function index_post()
    {
        $data = [
            'username' => trim($this->input->post('username', TRUE)),
            'password' => md5($this->input->post('password'))
        ];

        $cek = $this->db->get_where('users', ['username' => $this->input->post('username', TRUE)]);
        $row = $this->db->get_where('users', $data)->row();

        if ($cek->num_rows() >= 1) {
            if ($row) {
                $result = [
                    'username' => $row->username,
                    'password' => $row->password,
                    'name' => $row->name,
                    'address' => $row->address,
                    'bod' => $row->bod,
                    'email' => $row->email,
                ];
                $this->response(['error' => false, 'message' => 'Login Berhasil', 'Result' => $result], 401);
            } else {

                $this->response(['error' => true, 'message' => 'Login Gagal'], 401);
            }
        } else {
            $this->response(['error' => true, 'message' => 'username tidak terdaftar'], 401);
        }
    }
}
