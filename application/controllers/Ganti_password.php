<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ganti_password extends CI_Controller {


    public function __construct(){
            parent::__construct();
            $this->load->library('encryption');
            $this->load->library('Aes');
            $this->load->model('Crud_model');
    }

	public function index()
	{
    	$data['main_view'] = 'ganti_password/home';
    	$this->load->view('back_bone', $data);
	}
  
  public function register()
  {
		$this->form_validation->set_rules('users_name', 'users_name', 'required');
		$this->form_validation->set_rules('password', 'password', 'required');
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
        echo 1;
      }else{
      echo 99;
      }
    }
	}
  
  public function ganti()
  {
		$this->form_validation->set_rules('password_lama', 'password_lama', 'required');
		$this->form_validation->set_rules('password_baru', 'password_baru', 'required');
    $users_name = $this->session->userdata('users_name');
    $password_lama = trim($this->input->post('password_lama'));
    $password_baru = trim($this->input->post('password_baru'));
    if ($this->form_validation->run() == FALSE)
     {
      echo 0;
     }else {
          $where_p   = array(
          'users_name' => $users_name
            );
          $this->db->where($where_p);
          $query = $this->db->get('users');
          
          foreach ($query->result() as $row)
          {
            $pass= $row->password;
          }
          $password = $users_name;
          $passhash = hash("SHA256", $password, true);
          $fsrcmesg = $pass;
          $hashpass = base64_decode(substr($fsrcmesg,0,44));
          if($hashpass == $passhash){
              $pmessage = base64_decode(substr($fsrcmesg,44));
              $aes = new AesCtr();
              $emessages =$aes->decrypt($pmessage, $passhash, 128);
              
              if($emessages == $password_lama){
                $passhash = hash("SHA256", $password, true);

                $fsrcmesg = $password_baru;
                $hashmesg = base64_encode($passhash);

                $aes = new AesCtr();
                $emessage = $aes->encrypt($fsrcmesg, $passhash, 128);
                $encode = base64_encode($emessage);
                $password_enkrip_aes = $hashmesg.$encode;

                $data_update = array(
                  'password' => $password_enkrip_aes,
                  );
                $table_name = 'users';
                $where  = array(
                'users_name' => $users_name
                  );
                $id = $this->Crud_model->update_data($data_update, $where, $table_name);
                echo '1';
              }else{
                echo 'gagal';
              }
          }else{
                echo 'gagal';
          }
    }
  }
  
}
