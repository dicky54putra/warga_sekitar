<?php 

class Wargaku extends Controller{

	public function index()
	{
		// memanggil view/tampilan
		$data['judul'] = "Home";
		$data['wrg'] = $this->model('Wargaku_model')->getAllWargaku();
		$this->view('templates/header',$data);
		$this->view('wargaku/index', $data);
		$this->view('templates/footer');
	}

	public function detail($id)
	{
		// memanggil view/tampilan
		$data['judul'] = "Detail Wargaku";
		$data['wrg'] = $this->model('Wargaku_model')->getWargakuById($id);
		$this->view('templates/header',$data);
		$this->view('wargaku/detail', $data);
		$this->view('templates/footer');
	}

	public function tambah()
	{
		if ( $this->model('Wargaku_model')->tambahDataWargaku($_POST) > 0) {
			header('location: '.base_url. '/wargaku');
			exit;
		}
	}

	public function hapus($id)
	{
		if ( $this->model('Wargaku_model')->hapusDataWargaku($id) > 0) {
			header('location: '.base_url.'/wargaku');
			exit;
		}
	}

	public function getedit()
	{
		echo json_encode($this->model('Wargaku_model')->getWargakuById($_POST['id']));
	}

	public function edit()
	{
		if ( $this->model('Wargaku_model')->editDataWargaku($_POST) > 0) {
			header('location: '.base_url. '/wargaku');
			exit;
		}
	}
	
	public function cari()
	{
		$data['judul'] = 'Daftar Wargaku';
		$data['wrg'] = $this->model('Wargaku_model')->cariDataWargaku();
		$this->view('templates/header', $data);
		$this->view('wargaku/index', $data);
		$this->view('templates/footer');

	}

}