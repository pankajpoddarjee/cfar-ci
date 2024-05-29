<?php
class AdminModel extends CI_Model
{


    public function get_active_users()
	{
        $result =  $this->db->get_where('admin', ['is_active' => 1])->result();
		return $result;
	}
    public function get_active_post()
	{
        $result =  $this->db->get_where('posts', ['is_active' => 1])->result();
		return $result;
	}

	public function insert_post_data($data){
        // $data=array(
        //     'banner_img'=>$data['banner_img'],
        //     'title'=>$data['title'],
        //     'sub_title'=>$data['sub_title'],
        //     'description'=>$data['description'],
        //     'is_active'=>1
        // );
        $result = $this->db->insert('posts', $data);
        $insert_id = $this->db->insert_id();
        if($insert_id){
            return $insert_id;
        }else{
            return false;
        }
		
    }
    public function insert_gallery_data($data){
       
        $result = $this->db->insert('gallery', $data);
        $insert_id = $this->db->insert_id();
       
		//return $insert_id;
    }

    public function get_all_post()
	{
		//$result = $this->db->get_where('posts')->result();
       // $result =$this->db->get_where('posts', ['is_active' => 1])->result();
		//return $result;

        $this->db->select("posts.*,post_type.post_type_name");

        $this->db->from("posts");

        $this->db->join("post_type", "posts.post_type=post_type.id");

       // $this->db->where(['posts.is_active' => 1]);

        $qry = $this->db->get();

        $res= $qry->result();

        return $res;
	}

    public function get_all_post_type()
	{
		//$result = $this->db->get_where('posts')->result();
        $result =$this->db->get_where('post_type', ['is_active' => 1])->result();
		return $result;

        
	}

    public function get_one_post($id)
	{
		//$result = $this->db->get_where('posts')->result();
        $result =  $this->db->get_where('posts', ['id' => $id])->row();
		return $result;
	}

    public function get_gallery_image_by_post_id($id)
	{
		//$result = $this->db->get_where('posts')->result();
        $result =$this->db->get_where('gallery',['post_id' => $id])->result();
		return $result;
	}

    public function update_post_data($id,$data){
        $result = $this->db->where('id', $id)->update('posts', $data);
		return $result;
    }

    public function delete_gallery_data($post_id){
        $galleryData = $this->db->get_where('gallery')->result();
        if($galleryData){
            foreach ($galleryData as  $gallery) {
                unlink($gallery->gallery_img);
            }
        }
        $result = $this->db->delete('gallery', ['post_id' => $post_id]);
		return $result;
    }

    public function get_all_testimonial()
	{
		//$result = $this->db->get_where('posts')->result();
        $result =$this->db->get_where('testimonials', ['is_active' => 1])->result();
		return $result;
	}

    public function delete_post($id,$data){
        $result = $this->db->where('id', $id)->update('posts', $data);
		return $result;
    }
    public function verify_user_password($user_id,$password)
	{
        $data=array(
            'id'=>$user_id,
            'password'=>$password
        );
        $query=$this->db->where($data);
        $login=$this->db->get('admin');
 
        if($login!=NULL){
            return $login->row();
        } 
        return false;
	}
    public function update_password($id,$data){
        $result = $this->db->where('id', $id)->update('admin', $data);
		return $result;
    }

    public function get_all_users()
	{		
        $result =$this->db->get('admin')->result();
		return $result;
	}
    public function insert_user_data($data){
        $result = $this->db->insert('admin', $data);
        $insert_id = $this->db->insert_id();
        if($insert_id){
            return $insert_id;
        }else{
            return false;
        }
		
    }
    public function update_user_data($id,$data){
        $result = $this->db->where('id', $id)->update('admin', $data);
		return $result;
    }
    public function get_one_user($id)
	{
        $result =  $this->db->get_where('admin', ['id' => $id])->row();
		return $result;
	}
    public function delete_user($id,$data){
        $result = $this->db->where('id', $id)->update('admin', $data);
		return $result;
    }
    public function check_email_exist($email)
	{	
        $this->db->select('*');	
        $this->db->where('email', '!=', $email);
        $qry = $this->db->get('admin');
        $result = $qry->result();
		return $result;
	}
    function check_unique_user_email($id , $email) {
        $this->db->where('email', $email);
        if($id) {
            $this->db->where_not_in('id', $id);
        }
        return $this->db->get('admin')->num_rows();
    }
    public function get_all_post_type_master()
	{
        $result =$this->db->get('post_type')->result();
		return $result;
	}
    public function get_one_post_type($id)
	{  
        $result =  $this->db->get_where('post_type', ['id' => $id])->row();
		return $result;
	}
    public function insert_post_type_data($data){
        $result = $this->db->insert('post_type', $data);
        $insert_id = $this->db->insert_id();
        if($insert_id){
            return $insert_id;
        }else{
            return false;
        }
    }
    public function update_post_type_data($id,$data){
        $result = $this->db->where('id', $id)->update('post_type', $data);
		return $result;
    }
    public function delete_post_type($id,$data){
        $result = $this->db->where('id', $id)->update('post_type', $data);
		return $result;
    }

}