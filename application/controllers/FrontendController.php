

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FrontendController extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */

	public function __construct() {
	parent::__construct(); 
	$this->load->model('frontend/FrontendModel', 'frontend');

	}

	public function index()
	{
		//$this->load->view('welcome_message');

        $data['posts'] = $this->frontend->get_all_post();
        //echo "<pre>";print_r($data); die;
        $this->load->view('frontend/index', $data);
	}

	public function viewDetails($id)
	{ 
		$data['post'] = $this->frontend->get_one_post($id);
		$data['post_gallery_image'] = $this->frontend->get_gallery_image_by_post_id($id);
		$this->load->view('frontend/view_details',$data);
	}
}
