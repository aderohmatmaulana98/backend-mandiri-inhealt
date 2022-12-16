<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . "libraries/Format.php";
require APPPATH . "libraries/RestController.php";

use chriskacerguis\RestServer\RestController;

class Skill extends RestController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Base_model');
    }
    public function GetSkills_get()
    {
        $skill = new Base_model;
        $resultSkill = $skill->get_skill();
        $this->response($resultSkill, 200);
    }
    public function skill_by_id_get($skill_id)
    {
        $skill = new Base_model;
        $resultSkill = $skill->get_skill_by_id($skill_id);
        var_dump($resultSkill);
        die;
        $this->response($resultSkill, 200);
    }
    public function create_post()
    {
        $skl = new Base_model;
        $data = [
            'skill_id' => $this->input->post('skill_id'),
            'skill_name' => $this->input->post('skill_name'),
        ];
        $skillResult = $skl->create_skill($data);
        if ($skillResult > 0) {
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
    public function Update_put($skill_id)
    {
        $updt = new Base_model;
        $data = [
            'skill_name' => $this->put('skill_name'),
        ];
        $updt_profile = $updt->put_skill($skill_id, $data);
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
    public function delete_delete($skill_id)
    {
        $skl = new Base_model;
        $resultSkill = $skl->delete_skill($skill_id);
        if ($resultSkill > 0) {
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
