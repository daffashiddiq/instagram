<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home extends CI_Controller {

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
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
    function __construct(){
		parent::__construct();		
		$this->load->model('m_insta');
        $this->load->library('form_validation');
    }
    
	public function index()
	{
        $this->load->view('login');
    }
    public function login()
    {
        $this->load->model('m_insta');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $check = $this->m_insta->getUser($username,$password);
        
        if($check > 0){
            $this->session->set_userdata('username',$username);
            $this->session->set_userdata('password',$password);
            $data['prof'] = $this->m_insta->getProfile($username);
            $data['dat'] = $this->m_insta->getPhoto($username);
            $this->load->view('feed',$data);
        }
        else{
            $this->load->view('login');
        }
    }

    public function feed()
    {
        $username = $this->session->username;
        $data['prof'] = $this->m_insta->getProfile($username);
        $data['dat'] = $this->m_insta->getPhoto($username);
        $this->load->view('feed',$data);
    }
    public function profile()
    {
        $username = $this->session->username;
        $data['dat'] = $this->m_insta->getProfile($username);
        $data['pho'] = $this->m_insta->getPhoto($username);
        $this->load->view('profile',$data);
    }

    public function edit_profile()
    {
        $username = $this->session->username;
        $data['dat'] = $this->m_insta->getProfile($username);
        $this->load->view('edit-profile',$data);
    }

    public function update()
    {
        $username = $this->session->username;
        $this->form_validation->set_rules('nama','nama', 'required');
		$this->form_validation->set_rules('website','website', 'required');
        $this->form_validation->set_rules('bio','bio', 'required');
        $this->form_validation->set_rules('email','email', 'required');
        $this->form_validation->set_rules('phone','phone', 'required');

		if($this->form_validation->run() == false){
			$this->edit_profile();
		}else{
            $photo = $_FILES['photo'];
            if($photo != ''){    
                $config['upload_path']          =  './assets/uploads';
                $config['allowed_types']        =  'gif|jpg|png|jfif';

                $this->load->library('upload', $config);
                if ( !$this->upload->do_upload('photo'))
                {
                    $this->edit_profile();
                }
                else
                {
                $data = [
                    'name' => $this->input->post('nama'),
                    'website' => $this->input->post('website'),
                    'bio' => $this->input->post('bio'),
                    'phone_number' => $this->input->post('phone'),
                    'gender' => $this->input->post('gender'),
                    'photo' => $this->upload->data('file_name'),
                ];
                $this->m_insta->editProfile($username,$data);
                $this->profile();
                }
            }else{
                $this->edit_profile();
            }
        }
    }

    public function search()
    {
        $username = $this->session->username;
        $caption = $this->input->post('search');
        $data['dat'] = $this->m_insta->searchPhoto($caption);
        $data['prof'] = $this->m_insta->getProfile($username);
        $this->load->view('feed',$data);
    }

    public function explore()
    {
        $username = $this->session->username;
        $data['result'] = $this->m_insta->exploreUser($username);
        $this->load->view('explore',$data);
    }

    public function uploadPage()
    {
        $this->load->view('uploadImage');
    }
    public function uploadPhoto()
    {
        $image = $_FILES['image'];
        if($image != ''){    
            $config['upload_path']          =  './assets/uploads';
            $config['allowed_types']        =  'gif|jpg|png|jfif';

            $this->load->library('upload', $config);
            if ( !$this->upload->do_upload('image'))
            {
                $this->load->view('uploadImage');
            }
            else
            {
                $image = $this->upload->data('file_name');
                $caption = $this->input->post('caption');
                $this->m_insta->photo($image,$caption);
			    redirect('index.php/home/feed');
            }
        }    
       
    }
}
