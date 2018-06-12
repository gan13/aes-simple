<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Profil extends CI_Controller
 {
   
  function __construct()
   {
    parent::__construct();
    $this->load->model('Crud_model');
   }
   
  public function index()
   {
    $data['total'] = 10;
    $data['main_view'] = 'Profil/home';
    $this->load->view('back_bone', $data);
   }
   
  public function json_all_profil()
   {
      $fields     = 
                   "
                   users.id_users,
                   users.users_name,
                   users.nama_users,
                   users.prodi,
                   users.angkatan,
                    
                  ";
        $where = array(
          'users.id_users' =>  $this->session->userdata('id_users')
          );
      $order_by   = 'users.nama_users';
      echo json_encode($this->Crud_model->json_all_profil($where, $fields, $order_by));
   }
   
 }