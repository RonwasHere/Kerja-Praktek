<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->model('karyawan_model');
		$this->load->library('session');
	}

	public function index()
	{
		$x['karyawan'] = $this->karyawan_model->get_karyawan();
		$this->load->view('awal', $x);
	}
	public function login()
	{
		//fungsi untuk meload view login.php, http://localhost/KP/index.php/Welcome/about
		$x['karyawan'] = $this->karyawan_model->ambilKaryawan();
		$this->load->view('login.php', $x);
	}
	public function dua()
	{
		//fungsi untuk meload view awal2.php, http://localhost/KP/index.php/Welcome/awal2 daftar karyawan
		$x['jadwal'] = $this->karyawan_model->get_jadwal(); //baca data dari db
		$this->load->view('awal2', $x);
	}
	public function tiga()
	{
		//fungsi untuk meload view awal2.php, http://localhost/KP/index.php/Welcome/awal3 daftar jadwal
		$x['kehadiran'] = $this->karyawan_model->get_kehadiran(); //baca data dari db
		$this->load->view('awal3', $x);
	}
	public function empat()
	{
		//fungsi untuk meload view awal4.php, http://localhost/KP/index.php/Welcome/awal4 
		$x['kehadiran'] = $this->karyawan_model->get_laporan(); //baca data dari db
		$this->load->view('awal4', $x);
	}
	public function save()
	{
		$ID_KARYAWAN 	= $this->input->post('id_kar');
		$NAMA 			= $this->input->post('na');
		$TANGGAL_LAHIR	= $this->input->post('t_l');
		$JENIS_KELAMIN	= $this->input->post('jk');
		$ALAMAT 		= $this->input->post('alt');
		$NO_TELEPON 	= $this->input->post('n_t');
		$this->karyawan_model->save_karyawan($ID_KARYAWAN, $NAMA, $TANGGAL_LAHIR, $JENIS_KELAMIN, $ALAMAT, $NO_TELEPON);
		redirect('Welcome');
	}


	public function get_edit()
	{
		$ID_KARYAWAN = $this->input->post('idkar');
		$result = $this->karyawan_model->get_kar_id($ID_KARYAWAN);
		if ($result->num_rows() > 0) {
			$i = $result->row_array();
			$data = array(
				'id_kar' => $i['ID_KARYAWAN'],
				'na' => $i['NAMA'],
				't_l' => $i['TANGGAL_LAHIR'],
				'jk' => $i['JENIS_KELAMIN'],
				'alt' => $i['ALAMAT'],
				'n_t' => $i['NO_TELEPON'],
				'id_j' => $i['ID_JADWAL']
			);
			//$this->load->view('awal', $data);
			redirect('Welcome');
		} else {
			echo "Data Was Not Found";
		}
	}

	public function update()
	{
		$ID_KARYAWAN 	= $this->input->post('idkar');
		$NAMA 			= $this->input->post('nama');
		$TANGGAL_LAHIR  = $this->input->post('tgl');
		$JENIS_KELAMIN  = $this->input->post('jenis');
		$ALAMAT 		= $this->input->post('alamat');
		$NO_TELEPON 	= $this->input->post('notelp');
		$ID_JADWAL 		= $this->input->post('idjadwal');
		$this->karyawan_model->update($ID_KARYAWAN, $NAMA, $TANGGAL_LAHIR, $JENIS_KELAMIN, $ALAMAT, $NO_TELEPON, $ID_JADWAL);
		redirect('Welcome');
	}
	function hapus()
	{
		$id = $this->input->post('idhapus');
		$this->karyawan_model->hapus($id);
		redirect('Welcome');
	}
	//============================================================================================================
	//=================== TABEL JADWAL ===============
	//============================================================================================================

	public function savejad()
	{
		$ID_JADWAL 		= $this->input->post('id_jad');
		$HARI 			= $this->input->post('ha');
		$JAM_MASUK		= $this->input->post('j_m');
		$JAM_KELUAR		= $this->input->post('j_k');
		$STATUS 		= $this->input->post('sta');
		$ID_KARYAWAN 	= $this->input->post('id_kar');
		$ID_PRESENSI	= $this->input->post('id_p');
		$this->karyawan_model->save_jadwal($ID_JADWAL, $HARI, $JAM_MASUK, $JAM_KELUAR, $STATUS, $ID_KARYAWAN, $ID_PRESENSI);
		redirect('Welcome/dua');
	}
	public function get_edit_j()
	{ //di klik edit muncul di modal
		$ID_JADWAL = $this->input->post('idjad');
		$result = $this->karyawan_model->get_jad_id($ID_JADWAL);
		if ($result->num_rows() > 0) {
			$i = $result->row_array();
			$data = array(
				'id_jad' => $i['ID_JADWAL'],
				'ha' => $i['HARI'],
				'j_m' => $i['JAM_MASUK'],
				'j_k' => $i['JAM_KELUAR'],
				'sta' => $i['STATUS'],
				'id_kar' => $i['ID_KARYAWAN'],
				'id_p' => $i['ID_PRESENSI']
			);
			//yg kiri dari name di add modal baru, yg kanan nama kolom di db
			redirect('Welcome');
		} else {
			echo "Data Was Not Found";
		}
	}
	public function update_jad()
	{
		$ID_JADWAL 		= $this->input->post('idjad');
		$HARI 			= $this->input->post('hari');
		$JAM_MASUK  	= $this->input->post('jammasuk');
		$JAM_KELUAR  	= $this->input->post('jamkeluar');
		$STATUS 		= $this->input->post('status');
		$ID_KARYAWAN 	= $this->input->post('idkaryawan');
		$ID_PRESENSI 	= $this->input->post('idpresensi');
		$this->karyawan_model->update_jadwal($ID_JADWAL, $HARI, $JAM_MASUK, $JAM_KELUAR, $STATUS, $ID_KARYAWAN, $ID_PRESENSI);
		redirect('Welcome/dua');
	}
	function hapus_j()
	{
		$id = $this->input->post('idhapus_j');
		$this->karyawan_model->hapusjad($id);
		redirect('Welcome');
	}

	//============================================================================================================
	//=================== TABEL JADWAL ===============
	//============================================================================================================
	public function savekeh()
	{
		$ID_PRESENSI 		= $this->input->post('id_pre');
		$TANGGAL 			= $this->input->post('tgl');
		$CHECK_IN			= $this->input->post('ci');
		$STATUS_CHECK_IN	= $this->input->post('sci');
		$CHECK_OUT 			= $this->input->post('co');
		$STATUS_CHECK_OUT 	= $this->input->post('sco');
		$CATATAN			= $this->input->post('cat');
		$ID_JADWAL			= $this->input->post('id_j');
		$this->karyawan_model->save_hadir($ID_PRESENSI, $TANGGAL, $CHECK_IN, $STATUS_CHECK_IN, $CHECK_OUT, $STATUS_CHECK_OUT, $CATATAN, $ID_JADWAL);
		redirect('Welcome/tiga');
	}
	public function get_edit_k()
	{ //di klik edit muncul di modal
		$ID_PRESENSI = $this->input->post('id_pre');
		$result = $this->karyawan_model->get_pre_id($ID_PRESENSI);
		if ($result->num_rows() > 0) {
			$i = $result->row_array();
			$data = array(
				'id_pre' => $i['ID_PRESENSI'],
				'tgl' => $i['TANGGAL'],
				'ci' => $i['CHECK_IN'],
				'sci' => $i['STATUS_CHECK_IN'],
				'co' => $i['CHECK_OUT'],
				'sco' => $i['STATUS_CHECK_OUT'],
				'cat' => $i['CATATAN'],
				'id_j' => $i['ID_JADWAL']
			);
			//yg kiri dari name di add modal baru, yg kanan nama kolom di db
			redirect('Welcome');
		} else {
			echo "Data Was Not Found";
		}
	}
	public function update_keh()
	{
		$ID_PRESENSI 		= $this->input->post('idpresensi');
		$TANGGAL 			= $this->input->post('tanggal');
		$CHECK_IN  			= $this->input->post('checkin');
		$STATUS_CHECK_IN  	= $this->input->post('statusci');
		$CHECK_OUT 			= $this->input->post('checkout');
		$STATUS_CHECK_OUT 	= $this->input->post('statusco');
		$CATATAN 			= $this->input->post('catatan');
		$ID_JADWAL 			= $this->input->post('idjadwal');
		$this->karyawan_model->update_kehadiran($ID_PRESENSI, $TANGGAL, $CHECK_IN, $STATUS_CHECK_IN, $CHECK_OUT, $STATUS_CHECK_OUT, $CATATAN, $ID_JADWAL);
		redirect('Welcome/dua');
	}
	function hapus_k()
	{
		$id = $this->input->post('idhapus_k');
		$this->karyawan_model->hapuskeh($id);
		redirect('Welcome');
	}
	//============================================================================================================
	//=================== HALAMAN LOGIN ===============
	//============================================================================================================
	public function savelogin() //nyimpan check in 
	{
		$id_karyawan = $this->input->post('karyawan');
		$id_presensi = date("d/m/Y") . '_' . $id_karyawan;
		//pengecekan status status ini masih masalah, tidak bisa ngeprint status "on time" solusi ada di 
		$cek_hadir = $this->karyawan_model->cek_hadir($id_presensi);
		$id_jadwal = date('D');

		if ($cek_hadir == FALSE) {
			$awal  = time(); //atau pakek date("h:i:s") 		//dpt dr buttoon check in
			$akhir = strtotime('08:00:00');
			if ($awal > $akhir) {  //jam 1 lebih kecil dari jam 8
				$sts = 'TELAT';
			} else {
				$sts = 'ON TIME';
			}
			$this->karyawan_model->save_login($id_karyawan, $id_presensi, $sts, $id_jadwal);
			$this->session->set_flashdata('berhasil', 'TRUE');
			redirect('Welcome/login');
		} else {
			$this->session->set_flashdata('gagal', 'FALSE');
			redirect('Welcome/login');
		}
	}
	function upcheckout()
	{
		$id_karyawan = $this->input->post('id_pegawai');
		$id_presensi = date("d/m/Y") . '_' . $id_karyawan;
		$cek_hadir = $this->karyawan_model->cek_hadir2($id_presensi);
		if ($cek_hadir == TRUE) {
			$data = $this->karyawan_model->ganti_login($id_presensi);
			$output = true;
			echo json_encode($output);
		} else {
			$output = false;
			echo json_encode($output);
		}
	}
}
