<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . "libraries/Format.php";
require APPPATH . "libraries/RestController.php";

use chriskacerguis\RestServer\RestController;

class Register extends RestController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Base_model');
    }

    public function index_post()
    {
        $regist = new Base_model;
        $data = [
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password')),
            'name' => $this->input->post('name'),
            'address' => $this->input->post('address'),
            'bod' => $this->input->post('bod'),
            'email' => $this->input->post('email'),
        ];
        $register = $regist->register($data);
        if ($register > 0) {
            $this->response(
                [
                    'status' => true,
                    'pesan' => 'insert berhasil',
                    'data' => $data
                ],
                RestController::HTTP_OK
            );
        } else {
            $this->response(
                [
                    'status' => false,
                    'pesan' => 'insert gagal'
                ],
                RestController::HTTP_BAD_REQUEST
            );
        }
    }
}
