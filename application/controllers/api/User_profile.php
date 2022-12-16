<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . "libraries/Format.php";
require APPPATH . "libraries/RestController.php";

use chriskacerguis\RestServer\RestController;

class User_profile extends RestController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Base_model');
    }

    public function GetUserProfileByUsername_get($username)
    {
        $profile = new Base_model;
        $resultProfile = $profile->get_profile_by_username($username);
        $this->response($resultProfile, 200);
    }

    public function Update_put($username)
    {
        $updt = new Base_model;
        $data = [
            'name' => $this->put('name'),
            'address' => $this->put('address'),
            'bod' => $this->put('bod'),
            'email' => $this->put('email'),
        ];
        $updt_profile = $updt->put_profile($username, $data);
        if ($updt_profile > 0) {
            $this->response(
                [
                    'status' => true,
                    'pesan' => 'Update berhasil',
                    'data' => $data
                ],
                RestController::HTTP_OK
            );
        } else {
            $this->response(
                [
                    'status' => false,
                    'pesan' => 'Update gagal'
                ],
                RestController::HTTP_BAD_REQUEST
            );
        }
    }
}
