<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . "libraries/Format.php";
require APPPATH . "libraries/RestController.php";

use chriskacerguis\RestServer\RestController;

class User_skill extends RestController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Base_model');
    }
    public function GetUserSkills_get()
    {
        $user_skill = new Base_model;
        $resultUserSkill = $user_skill->get_user_skill();
        $this->response($resultUserSkill, 200);
    }
    public function user_skill_by_id_get($user_skills_id)
    {
        $user_skill = new Base_model;
        $resultUserSkill = $user_skill->get_user_skill_by_id($user_skills_id);
        $this->response($resultUserSkill, 200);
    }
    public function create_post()
    {
        $skl = new Base_model;
        $data = [
            'user_skills_id' => $this->input->post('user_skills_id'),
            'username' => $this->input->post('username'),
            'skill_id' => $this->input->post('skill_id'),
            'skill_level_id' => $this->input->post('skill_level_id'),
        ];
        $UserskillResult = $skl->create_user_skill($data);
        if ($UserskillResult > 0) {
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
    public function Update_put($user_skills_id)
    {
        $updt = new Base_model;
        $data = [
            'username' => $this->put('username'),
            'skill_id' => $this->put('skill_id'),
            'skill_level_id' => $this->put('skill_level_id'),
        ];
        $updt_profile = $updt->put_user_skill($user_skills_id, $data);
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
    public function delete_delete($user_skill_id)
    {
        $skl = new Base_model;
        $resultUserSkill = $skl->delete_skill($user_skill_id);
        if ($resultUserSkill > 0) {
            $this->response(
                [
                    'status' => true,
                    'pesan' => 'Delete berhasil',
                ],
                RestController::HTTP_OK
            );
        } else {
            $this->response(
                [
                    'status' => false,
                    'pesan' => 'Delete gagal'
                ],
                RestController::HTTP_BAD_REQUEST
            );
        }
    }
}
