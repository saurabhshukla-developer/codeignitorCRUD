<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Blog_m extends CI_Model{

    function __construct()
    {
        parent::__construct();
      //  $this->load->database(); 
    }

    public function getBlog(){
        $this->db->order_by('created_at', 'desc');
        $query = $this->db->get('tbl_blogs')->result();  // $this->db->get()->result();
        return $query;
    }

    public function submit(){
        $field = array(
            'title'=>$this->input->post('txt_title'),
            'description'=>$this->input->post('txt_description')
        );
        $this->db->insert('tbl_blogs', $field);
        if($this->db->affected_rows() > 0){
            return true;
        }
        else {
            return false;
        }
    }

    public function getBlogById($id){
        $this->db->where('id', $id);
        $query = $this->db->get('tbl_blogs');
        if($query->num_rows() > 0){
            return $query->row();
        }
        else {
            return false;
        }
    }

    public function update(){
        $id = $this->input->post('txt_hidden_id');
        $field = array(
            'title' => $this->input->post('txt_title'),
            'description' => $this->input->post('txt_description'),
            'updated_at' => date('Y-m-d H:i:s')
        );
        $this->db->where('id', $id);
        $this->db->update('tbl_blogs ', $field);
        if($this->db->affected_rows() > 0){
            return true;
        }
        else {
            return false;
        }
    }

    public function delete($id){
        $this->db->where('id', $id);
        $this->db->delete('tbl_blogs');
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
}
?>