<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Dashboard extends CI_Controller {

		public function __construct()
		{
			parent::__construct();

			ceksession();
			// load model
			$this->load->model('Dashboard_Model','dashboard');
		}

		public function index()
		{
			$data['title'] = 'SMA Negeri 1 Purwodadi';
			$data['sub_title'] = 'Dashboard';
			$this->load->view('templates/header.php',$data);
			$this->load->view('templates/sidebar.php');
			$this->load->view('templates/topbar.php');
			$this->load->view('dashboard/index.php',$data);
			$this->load->view('templates/footer.php');
		}

		public function getinfo()
		{
			$data = array(
							'jumlah_siswa' => $this->dashboard->getJumlahSiswa(),
							'siswa_baru'   => $this->dashboard->getJmlSiswaBaru(),
							'siswa_keluar' => $this->dashboard->getJmlSiswaKeluar(),
							'jumlah_user'  => $this->dashboard->getJumlahUser(),
							'user_online'  => $this->dashboard->getJmlUserOnline()
						);
			echo json_encode($data, JSON_PRETTY_PRINT);
		}
	}
