<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . "libraries/Format.php";
require APPPATH . "libraries/RestController.php";

use chriskacerguis\RestServer\RestController;

class SKill_level extends RestController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Base_model');
    }
    public function GetSkillsLevel_get()
    {
        $skill_level = new Base_model;
        $resultSkillLevel = $skill_level->get_skill_level();
        $this->response($resultSkillLevel, 200);
    }
    public function skill_level_by_id_get($skill_level_id)
    {
        $skill_level = new Base_model;
        $resultSkillLevel = $skill_level->get_skill_level_by_id($skill_level_id);
        $this->response($resultSkillLevel, 200);
    }
    public function create_post()
    {
        $skl = new Base_model;
        $data = [
            'skill_level_id' => $this->input->post('skill_level_id'),
            'skill_level_name' => $this->input->post('skill_level_name'),
        ];
        $skillLevelResult = $skl->create_skill_level($data);
        if ($skillLevelResult > 0) {
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
    public function Update_put($skill_level_id)
    {
        $updt = new Base_model;
        $data = [
            'skill_level_name' => $this->put('skill_level_name'),
        ];
        $updt_profile = $updt->put_skill_level($skill_level_id, $data);
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
    public function delete_delete($skill_level_id)
    {
        $skl = new Base_model;
        $resultSkillLevel = $skl->delete_skill_level($skill_level_id);
        if ($resultSkillLevel > 0) {
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
