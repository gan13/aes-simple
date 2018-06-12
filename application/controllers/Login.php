<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {


    public function __construct(){
            parent::__construct();
            $this->load->library('encryption');
            $this->load->library('Aes');
            $this->load->model('Crud_model');
            // if($this->session->userdata('isLogin') == FALSE){
    	    	// redirect('login');
    	    // }
            // $this->aesinitvector = openssl_random_pseudo_bytes(16);
    }

	public function index()
	{
		$cek_active_login = $this->session->userdata('id_users');
		if(!empty($cek_active_login))
			{ 
				return redirect(''.base_url().''); 
			}
		$data['judul'] = 'Login';
		$data['main_view'] = 'welcome_message';
		$this->load->view('login', $data);
	}
  
  public function register()
  {
		$this->form_validation->set_rules('users_name', 'users_name','required|min_length[8]|max_length[16]');
		$this->form_validation->set_rules('password', 'password','required|required|min_length[8]|max_length[16]');
		$this->form_validation->set_rules('nama_users', 'nama_users', 'required');
		$this->form_validation->set_rules('prodi', 'prodi', 'required');
		$this->form_validation->set_rules('angkatan', 'angkatan', 'required');
    if ($this->form_validation->run() == FALSE)
     {
      echo 0;
     }
    else
     {
     
       $where = array(
        'users_name' => trim($this->input->post('users_name'))
        );
        $this->db->from('users');
        $this->db->where($where);
        $b = $this->db->count_all_results();
        
      if( $b == 0 ){
        $password = $this->input->post("users_name");
        $passhash = hash("SHA256", $password, true);

        $fsrcmesg = $this->input->post("password");
        $hashmesg = base64_encode($passhash);

        $aes = new AesCtr();
        $emessage = $aes->encrypt($fsrcmesg, $passhash, 128);
        $encode = base64_encode($emessage);
        $result = $hashmesg.$encode;
        $password_enkrip_aes = $hashmesg.$encode;

        $data_input = array(
        
          'users_name' => $password,
          'password' => $password_enkrip_aes,
          'nama_users' => trim($this->input->post('nama_users')),
          'prodi' => trim($this->input->post('prodi')),
          'angkatan' => trim($this->input->post('angkatan')),
          'create_time' => date('Y-m-d H:i:s')
                  
          );
        $table_name = 'users';
        $id = $this->Crud_model->save_data($data_input, $table_name);
        // echo 1;
        echo $id;
      }else{
      echo 99;
      }
    }
	}
  
  public function login_users()
  {
		$this->form_validation->set_rules('users_name', 'users_name', 'required');
		$this->form_validation->set_rules('password', 'password', 'required');
    if ($this->form_validation->run() == FALSE)
     {
      echo 0;
     }else {
       $where = array(
        'users_name' => trim($this->input->post('users_name'))
        );
        $this->db->from('users');
        $this->db->where($where);
        $b = $this->db->count_all_results();
        if($b==0){
        echo 'gagal';
        }else{
          $where_p   = array(
          'users_name' => trim($this->input->post('users_name')),
            );
          $this->db->where($where_p);
          $query = $this->db->get('users');
          
          foreach ($query->result() as $row)
          {
            $password_enkrip_aes= $row->password;
            $id_users= $row->id_users;
            $users_name= $row->users_name;
            $nama_users= $row->nama_users;
            $prodi= $row->prodi;
            $angkatan= $row->angkatan;
          }
          $password = $this->input->post("users_name");
          $passhash = hash("SHA256", $password, true);
          $fsrcmesg = $password_enkrip_aes;
          $hashpass = base64_decode(substr($fsrcmesg,0,44));

          if($hashpass == $passhash){
              $pmessage = base64_decode(substr($fsrcmesg,44));
              $aes = new AesCtr();
              $emessage =$aes->decrypt($pmessage, $passhash, 128);
              if($emessage==trim($this->input->post('password'))){
								$this->session->set_userdata( array(
								'id_users' => $id_users,
								'users_name' => $users_name,
								'nama_users' => $nama_users,
								'prodi' => $prodi,
								'angkatan' => $angkatan,
								));
                echo 'berhasil';
              }else{
                echo 'gagal';
              }
          }else{
                echo 'gagal';
          }
        }
    }
  }
  
  public function logout(){
		$this->session->sess_destroy();
		return redirect(''.base_url().'login'); 
	}
	
}
