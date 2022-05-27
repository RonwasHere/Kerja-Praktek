<?php


class karyawan_model extends CI_Model
{
	function save_karyawan($ID_KARYAWAN, $NAMA, $TANGGAL_LAHIR, $JENIS_KELAMIN, $ALAMAT, $NO_TELEPON)
	{
		$data = array(
			'id_karyawan' 	=> $ID_KARYAWAN,
			'nama' 			=> $NAMA,
			'tanggal_lahir' => $TANGGAL_LAHIR,
			'jenis_kelamin' => $JENIS_KELAMIN,
			'alamat' 		=> $ALAMAT,
			'no_telepon' 	=> $NO_TELEPON
			
		);
		$this->db->insert('karyawan', $data); //ngesave data baru
	}

	function get_karyawan()
	{
		$result = $this->db->query("SELECT * FROM karyawan"); //untuk mngeload tabel 
		return $result->result();
	}

	function ambilKaryawan()
	{
		return $this->db->get('karyawan')->result_array();
	}
	//INSERT INTO karyawan (`id_karyawan`, `nama`, `tanggal_lahir`, `jenis_kelamin`, `alamat`, `no_telepon`) VALUES ('K001', 'Alex', '17 desember 2000', 'laki laki', 'surabaya ', '08981733711')

	function get_kar_id($ID_KARYAWAN)
	{ //edit diklik datamuncul di modal
		$query = $this->db->get_where('karyawan', array('id_karyawan' => $ID_KARYAWAN));
		return $query;
	}
	function update($ID_KARYAWAN, $NAMA, $TANGGAL_LAHIR, $JENIS_KELAMIN, $ALAMAT, $NO_TELEPON, $ID_JADWAL)
	{
		$data = array(
			'ID_KARYAWAN' 	=> $ID_KARYAWAN, //id kary ini dari baris 30 yg di dlm kurung
			'NAMA' 			=> $NAMA,
			'TANGGAL_LAHIR' => $TANGGAL_LAHIR,
			'JENIS_KELAMIN' => $JENIS_KELAMIN,
			'ALAMAT' 		=> $ALAMAT,
			'NO_TELEPON' 	=> $NO_TELEPON,
			'ID_JADWAL' 	=> $ID_JADWAL
			//jadi gini yg kiri nama kolom, yg kanan variabel valur dr brs 30, (ingat bangsat-riswan2020-)
		);
		$this->db->where('ID_KARYAWAN', $ID_KARYAWAN);
		$this->db->update('karyawan', $data);
	}
	function hapus($id) //untuk delete karyawan
	{
		$query = $this->db->query("delete from karyawan where  ID_KARYAWAN  = '$id'");
		return $query;
	}
	//============================================================================================================
	//=================== TABEL JADWAL ===============
	//============================================================================================================
	function get_jadwal()
	{
		$result = $this->db->query("SELECT * FROM jadwal"); //baca dari database
		return $result->result();
	}
	function save_jadwal($ID_JADWAL, $HARI, $JAM_MASUK, $JAM_KELUAR, $STATUS, $ID_KARYAWAN, $ID_PRESENSI)
	{
		$data = array(
			'id jadwal' 	=> $ID_JADWAL,
			'hari' 			=> $HARI,
			'jam masuk ' => $JAM_MASUK,
			'jam keluar' => $JAM_KELUAR,
			'status' 		=> $STATUS,
			'id karyawan' 	=> $ID_KARYAWAN,
			'id presensi' 	=> $ID_PRESENSI
		); //yg kiri dari nama kolom 
		$this->db->insert('jadwal', $data);
	}
	function get_jad_id($ID_JADWAL)
	{ //edit diklik datamuncul di modal
		$query = $this->db->get_where('jadwal', array('id_jadwal' => $ID_JADWAL));
		return $query;
	}
	function update_jadwal($ID_JADWAL, $HARI, $JAM_MASUK, $JAM_KELUAR, $STATUS, $ID_KARYAWAN, $ID_PRESENSI)
	{
		$data = array(
			'ID_JADWAL' 	=> $ID_JADWAL, //id kary ini dari baris 30 yg di dlm kurung
			'HARI' 			=> $HARI,
			'JAM_MASUK' 	=> $JAM_MASUK,
			'JAM_KELUAR' 	=> $JAM_KELUAR,
			'STATUS' 		=> $STATUS,
			'ID_KARYAWAN' 	=> $ID_KARYAWAN,
			'ID_PRESENSI' 	=> $ID_PRESENSI
			//jadi gini yg kiri nama kolom, yg kanan variabel valur dr brs 30, (ingat bangsat-riswan2020-)
		);
		$this->db->where('ID_JADWAL', $ID_JADWAL);
		$this->db->update('jadwal', $data);
	}
	function hapusjad($id) //untuk delete karyawan
	{
		$query = $this->db->query("delete from jadwal where  ID_JADWAL  = '$id'");
		return $query;
	}
	//============================================================================================================
	//=================== TABEL KEHADIRAN ===============
	//============================================================================================================
	function get_kehadiran()
	{
		$result = $this->db->query("SELECT * FROM kehadiran"); //untuk mngeload tabel 
		return $result->result();
	}
	function save_hadir($ID_PRESENSI, $TANGGAL, $CHECK_IN, $STATUS_CHECK_IN, $CHECK_OUT, $STATUS_CHECK_OUT, $CATATAN, $ID_JADWAL)
	{
		$data = array(
			'id presensi' 		=> $ID_PRESENSI,
			'tanggal' 			=> $TANGGAL,
			'check in '			=> $CHECK_IN,
			'status check in'	=> $STATUS_CHECK_IN,
			'checkk out' 		=> $CHECK_OUT,
			'status check out' 	=> $STATUS_CHECK_OUT,
			'catatan' 			=> $CATATAN,
			'id jadwal' 		=> $ID_JADWAL
		); //yg kiri dari nama kolom 
		$this->db->insert('kehadiran', $data);
	}
	function get_pre_id($ID_PRESENSI)
	{ //edit diklik datamuncul di modal
		$query = $this->db->get_where('kehadiran', array('id_presensi' => $ID_PRESENSI));
		return $query;
	}
	function update_kehadiran($ID_PRESENSI, $TANGGAL, $CHECK_IN, $STATUS_CHECK_IN, $CHECK_OUT, $STATUS_CHECK_OUT, $CATATAN, $ID_JADWAL)
	{
		$data = array(
			'ID_PRESENSI' 		=> $ID_PRESENSI, //id kary ini dari baris 30 yg di dlm kurung
			'TANGGAL' 			=> $TANGGAL,
			'CHECK_IN' 			=> $CHECK_IN,
			'STATUS_CHECK_IN' 	=> $STATUS_CHECK_IN,
			'CHECK_OUT' 		=> $CHECK_OUT,
			'STATUS_CHECK_OUT' 	=> $STATUS_CHECK_OUT,
			'CATATAN' 			=> $CATATAN,
			'ID_JADWAL' 		=> $ID_JADWAL
			//jadi gini yg kiri nama kolom, yg kanan variabel valur dr brs 30, (ingat bangsat-riswan2020-)
		);
		$this->db->where('ID_PRESENSI', $ID_PRESENSI);
		$this->db->update('kehadiran', $data);
	}
	function hapuskeh($id) //untuk delete kehadiran
	{
		$query = $this->db->query("delete from kehadiran where  ID_PRESENSI  = '$id'");
		return $query;
	}
	//============================================================================================================
	//=================== FUNGSI SAVE LOGIN ===============
	//============================================================================================================
	function save_login($id_karyawan, $kode, $sts, $id_jadwal)
	{

		$query = $this->db->query("INSERT INTO `kehadiran` (`ID_PRESENSI`, `TANGGAL`, `CHECK_IN`, `STATUS_CHECK_IN`, 
		`CHECK_OUT`, `STATUS_CHECK_OUT`, `CATATAN`, `ID_JADWAL`, `ID_KARYAWAN`) 
		VALUES ('$kode', CURRENT_DATE(), CURRENT_TIME(), '$sts', NULL, NULL, NULL, '$id_jadwal',
		'$id_karyawan')"); //ngesave nama presensi baru
		return $query;
		//pengecekan status

	}

	// CEK KEHADIRAN KARYAWAN PADA HARI INI
	function cek_hadir($ID_PRESENSI)
	{
		$hasil = $this->db->from('kehadiran')->where("ID_PRESENSI = '$ID_PRESENSI'")->get()->num_rows();
		//SELECT * FROM KEHADIRAN WHERE ID_PRESENSI = $ID_PRESENSI
		if ($hasil != 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	function cek_hadir2($ID_PRESENSI)
	{
		$hasil = $this->db->from('kehadiran')->where("ID_PRESENSI = '$ID_PRESENSI' AND CHECK_OUT IS NULL")->get()->num_rows();
		//SELECT * FROM KEHADIRAN WHERE ID_PRESENSI = $ID_PRESENSI
		if ($hasil != 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	// 

	//============================================================================================================
	//=================== FUNGSI UPDATE LOGIN ===============
	//============================================================================================================
	function ganti_login($id_presensi)
	{
		$query = $this->db->query("UPDATE `kehadiran` SET `CHECK_OUT`= CURRENT_TIME() WHERE ID_PRESENSI = '$id_presensi' AND `CHECK_OUT` IS NULL");
		return $query;
	}


	//select j.id_jadwal from jadwal j  join karyawan  k on j.id_karyawan=k.id_karyawan where nama = 'Alex_update';
	//============================================================================================================
	//=================== TABEL KEHADIRAN ===============
	//============================================================================================================
	function get_laporan()
	{
		$result = $this->db->query("select k.nama, keh.check_in, keh.check_out, keh.status_check_in from karyawan k  join kehadiran  keh on k.id_karyawan=keh.id_karyawan;"); //untuk mngeload tabel 
		return $result->result();
	}
	//select k.nama, keh.check_in, keh.check_out from karyawan k  join kehadiran  keh on k.id_karyawan=keh.id_karyawan;


}
