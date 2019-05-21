<?php
class News_model extends CI_Model{
    
    public function __construct() {
        $this->load->database();
    }
    
    public function get_news($uri = false) {
        if($uri == false){
            $query = $this->db->get('news') ;
            return $query->result_array();
        }else{
            $query = $this->db->get_where('news', array('uri' =>$uri));
            return $query->row_array();
        }
    }
    
    public function set_news() {
        $this->load->helper('url');
        $uri = url_title($this->input->post('title'), 'dash', true);
        $data = array(
                'title' => $this->input->post('title'),  
                'uri' => $uri,
                'text' => $this->input->post('text')
        );
        $this->db->insert('news', $data);
    }
}