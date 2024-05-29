<?php
class FrontendModel extends CI_Model
{

	public function get_all_post()
	{
		//$result = $this->db->get_where('posts')->result();
       // $result =$this->db->get_where('posts', ['is_active' => 1])->result();
		//return $result;

        $this->db->select("posts.*,post_type.post_type_name");

        $this->db->from("posts");

        $this->db->join("post_type", "posts.post_type=post_type.id");

        $this->db->where(['posts.is_active' => 1]);

        $qry = $this->db->get();

        $res= $qry->result();

        return $res;
	}
    public function get_one_post($id)
	{
		$this->db->select("posts.*,post_type.post_type_name");

        $this->db->from("posts");

        $this->db->join("post_type", "posts.post_type=post_type.id");

        $this->db->where(['posts.id' => $id]);

        $qry = $this->db->get();

        $res= $qry->row();

        return $res;
	}

    public function get_gallery_image_by_post_id($id)
	{
        $result =$this->db->get_where('gallery',['post_id' => $id])->result();
		return $result;
	}
}