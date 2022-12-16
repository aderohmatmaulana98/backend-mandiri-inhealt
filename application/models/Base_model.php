<?php
class Base_model extends CI_Model
{
    public function register($data)
    {
        return $this->db->insert('users', $data);
    }
    public function get_profile_by_username($username)
    {
        $this->db->where('username', $username);
        $query = $this->db->get('users');
        return $query->row();
    }
    public function put_profile($username, $data)
    {
        $this->db->where('username', $username);
        return $this->db->update('users', $data);
    }
    public function get_skill()
    {
        $query = $this->db->get('skill');
        return $query->result();
    }
    public function get_skill_by_id($skill_id)
    {
        $sql = "SELECT *FROM skill WHERE skill_id = $skill_id";
        return $this->db->query($sql)->row();
    }
    public function create_skill($data)
    {
        return $this->db->insert('skill', $data);
    }
    public function put_skill($skill_id, $data)
    {
        $this->db->where('skill_id', $skill_id);
        return $this->db->update('skill', $data);
    }
    public function delete_skill($skill_id)
    {
        return $this->db->delete('skill', ['skill_id' => $skill_id]);
    }

    public function get_skill_level()
    {
        $query = $this->db->get('skill_level');
        return $query->result();
    }
    public function get_skill_level_by_id($skill_level_id)
    {
        $sql = "SELECT *FROM skill_level WHERE skill_level_id = $skill_level_id";
        return $this->db->query($sql)->row();
    }
    public function create_skill_level($data)
    {
        return $this->db->insert('skill_level', $data);
    }
    public function put_skill_level($skill_level_id, $data)
    {
        $this->db->where('skill_level_id', $skill_level_id);
        return $this->db->update('skill_level', $data);
    }
    public function delete_skill_level($skill_level_id)
    {
        return $this->db->delete('skill_level', ['skill_level_id' => $skill_level_id]);
    }


    public function get_user_skill()
    {
        $query = $this->db->get('user_skils');
        return $query->result();
    }
    public function get_user_skill_by_id($user_skills_id)
    {
        $sql = "SELECT *FROM user_skils WHERE user_skills_id = $user_skills_id";
        return $this->db->query($sql)->row();
    }
    public function create_user_skill($data)
    {
        return $this->db->insert('user_skils', $data);
    }
    public function put_user_skill($user_skills_id, $data)
    {
        $this->db->where('user_skills_id', $user_skills_id);
        return $this->db->update('user_skils', $data);
    }
    public function delete_user_skill($user_skills_id)
    {
        return $this->db->delete('user_skils', ['user_skills_id' => $user_skills_id]);
    }
}
