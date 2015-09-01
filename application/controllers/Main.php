<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller
{
	// public function __construct ()
	// {
	// 	parent::__construct ();
	// 	if (!$this->session->userdata('logged_in'))
	// 	{
	// 		redirect ('login');
	// 	}
	// }

	public function index()
	{
		$this->load->model('tenaga_medis_model');
		$data['pemetaan'] = $this->tenaga_medis_model->get_pemetaan();

		$this->load->view('master/header');
		$this->load->view('pemetaan', $data);
		$this->load->view('master/footer');
	}

	public function daftar_kab_kota()
	{
		$this->load->model('kab_kota_model');
		$data['kab_kota'] = $this->kab_kota_model->get();

		$this->load->view('master/header');
		$this->load->view('kab_kota/daftar', $data);
		$this->load->view('master/footer');		
	}

	public function tambah_kab_kota()
	{
		$this->load->model('bencana_model');
		$data['bencana'] = $this->bencana_model->get_min();

		$this->load->view('master/header');
		$this->load->view('kab_kota/tambah', $data);
		$this->load->view('master/footer');		
	}

	public function do_tambah_kab_kota()
	{
		$this->load->model('kab_kota_model');

		$nama_kota = $this->input->post('nama_kota');
		$bencana = $this->input->post('bencana');

		if($this->kab_kota_model->get_id_by_name($nama_kota) == null)
		{
			$this->kab_kota_model->insert($nama_kota, $bencana);
			echo "Penambahan kabupaten/kota berhasil.";
		}
		else
		{
			echo "Kabupaten/kota tersebut telah ada.";
		}
		echo '<br />Klik <a href="'.site_url('main/tambah_kab_kota').'">disini</a> untuk kembali ke halaman sebelumnya';
	}

	public function ubah_kab_kota($id)
	{
		$this->load->model('bencana_model');
		$data['bencana'] = $this->bencana_model->get_min();

		$this->load->model('kab_kota_model');
		$data['kota'] = $this->kab_kota_model->getById($id);

		$this->load->model('rawan_model');
		$data['rawan'] = $this->rawan_model->getByIdKota($id);
		$data['id_kota'] = $id;

		$this->load->view('master/header');
		$this->load->view('kab_kota/ubah', $data);
		$this->load->view('master/footer');		
	}

	public function do_ubah_kab_kota()
	{
		$this->load->model('kab_kota_model');

		$id_kota = $this->input->post('id_kota');
		$nama_kota = $this->input->post('nama_kota');
		$bencana = $this->input->post('bencana');

		$this->kab_kota_model->update($id_kota, $nama_kota, $bencana);
		echo "Perubahan kabupaten/kota berhasil.";
		echo '<br />Klik <a href="'.site_url('main/daftar_kab_kota').'">disini</a> untuk kembali ke halaman sebelumnya';
	}

	public function delete_kab_kota($id_kota)
	{
		$this->load->model('kab_kota_model');
		$this->kab_kota_model->delete($id_kota);
		echo "Penghapusan kabupaten/kota berhasil.";
		echo '<br />Klik <a href="'.site_url('main/daftar_kab_kota').'">disini</a> untuk kembali ke halaman sebelumnya';
	}

	public function daftar_bencana()
	{
		$this->load->model('bencana_model');
		$data['bencana'] = $this->bencana_model->get();

		$this->load->view('master/header');
		$this->load->view('bencana/daftar', $data);
		$this->load->view('master/footer');	
	}

	public function tambah_bencana()
	{
		$this->load->model('keahlian_model');
		$data['keahlian'] = $this->keahlian_model->get();

		$this->load->view('master/header');
		$this->load->view('bencana/tambah', $data);
		$this->load->view('master/footer');	
	}

	public function do_tambah_bencana()
	{
		$this->load->model('bencana_model');

		$nama_bencana = $this->input->post('nama_bencana');
		$keahlian = $this->input->post('keahlian');

		if($this->bencana_model->get_id_by_name($nama_bencana) == null)
		{
			$this->bencana_model->insert($nama_bencana, $keahlian);
			echo "Penambahan jenis bencana berhasil.";
		}
		else
		{
			echo "Jenis bencana tersebut telah ada.";
		}
		echo '<br />Klik <a href="'.site_url('main/tambah_bencana').'">disini</a> untuk kembali ke halaman sebelumnya';
	}

	public function ubah_bencana($id)
	{
		$this->load->model('keahlian_model');
		$data['keahlian'] = $this->keahlian_model->get();

		$this->load->model('bencana_model');
		$data['bencana'] = $this->bencana_model->getById($id);
		$data['memerlukan'] = $this->bencana_model->getMemerlukanById($id);
		$data['id_bencana'] = $id;

		$this->load->view('master/header');
		$this->load->view('bencana/ubah', $data);
		$this->load->view('master/footer');		
	}

	public function do_ubah_bencana()
	{
		$this->load->model('bencana_model');

		$id_bencana = $this->input->post('id_bencana');
		$nama_bencana = $this->input->post('nama_bencana');
		$keahlian = $this->input->post('keahlian');

		$this->bencana_model->update($id_bencana, $nama_bencana, $keahlian);
		echo "Perubahan jenis bencana berhasil.";
		echo '<br />Klik <a href="'.site_url('main/daftar_bencana').'">disini</a> untuk kembali ke halaman sebelumnya';
	}

	public function delete_bencana($id_bencana)
	{
		$this->load->model('bencana_model');
		$this->bencana_model->delete($id_bencana);
		echo "Penghapusan jenis bencana berhasil.";
		echo '<br />Klik <a href="'.site_url('main/daftar_bencana').'">disini</a> untuk kembali ke halaman sebelumnya';
	}

	public function daftar_tenaga_medis()
	{
		$this->load->model('tenaga_medis_model');
		$data['tenaga_medis'] = $this->tenaga_medis_model->get();

		$this->load->view('master/header');
		$this->load->view('tenaga_medis/daftar', $data);
		$this->load->view('master/footer');	
	}

	public function tambah_tenaga_medis()
	{
		$this->load->model('keahlian_model');
		$data['keahlian'] = $this->keahlian_model->get();

		$this->load->view('master/header');
		$this->load->view('tenaga_medis/tambah', $data);
		$this->load->view('master/footer');	
	}

	public function do_tambah_tenaga_medis()
	{
		$this->load->model('tenaga_medis_model');

		$nama_tenaga_medis = $this->input->post('nama_tenaga_medis');
		$keahlian = $this->input->post('keahlian');

		if($this->tenaga_medis_model->get_id_by_name($nama_tenaga_medis) == null)
		{
			$this->tenaga_medis_model->insert($nama_tenaga_medis, $keahlian);
			echo "Penambahan tenaga medis berhasil.";
		}
		else
		{
			echo "Tenaga medis tersebut telah ada.";
		}
		echo '<br />Klik <a href="'.site_url('main/tambah_tenaga_medis').'">disini</a> untuk kembali ke halaman sebelumnya';
	}

	public function delete_tenaga_medis($id_tenaga_medis)
	{
		$this->load->model('tenaga_medis_model');
		$this->tenaga_medis_model->delete($id_tenaga_medis);
		echo "Penghapusan tenaga medis berhasil.";
		echo '<br />Klik <a href="'.site_url('main/daftar_tenaga_medis').'">disini</a> untuk kembali ke halaman sebelumnya';
	}

	public function daftar_data_biaya()
	{
		$this->load->model('biaya_model');
		$data['biaya'] = $this->biaya_model->get();

		$this->load->view('master/header');
		$this->load->view('tenaga_medis/daftar_biaya', $data);
		$this->load->view('master/footer');	
	}

	public function tambah_data_biaya()
	{
		$this->load->model('tenaga_medis_model');
		$data['tenaga_medis'] = $this->tenaga_medis_model->get_min();

		$this->load->model('kab_kota_model');
		$data['kab_kota'] = $this->kab_kota_model->get_min();
		
		$this->load->view('master/header');
		$this->load->view('tenaga_medis/tambah_biaya', $data);
		$this->load->view('master/footer');	
	}

	public function do_tambah_data_biaya()
	{
		$this->load->model('biaya_model');

		$id_tenaga_medis = $this->input->post('id_tenaga_medis');
		$id_kota = $this->input->post('id_kota');
		$biaya = $this->input->post('biaya');

		if($this->biaya_model->get_id($id_tenaga_medis, $id_kota) == null)
		{
			$this->biaya_model->insert($id_tenaga_medis, $id_kota, $biaya);
			echo "Penambahan data biaya berhasil.";
		}
		else
		{
			echo "Data biaya tersebut telah ada.";
		}
		echo '<br />Klik <a href="'.site_url('main/tambah_data_biaya').'">disini</a> untuk kembali ke halaman sebelumnya';
	}

	public function delete_data_biaya($id_biaya)
	{
		$this->load->model('biaya_model');
		$this->biaya_model->delete($id_biaya);
		echo "Penghapusan data biaya berhasil.";
		echo '<br />Klik <a href="'.site_url('main/daftar_data_biaya').'">disini</a> untuk kembali ke halaman sebelumnya';
	}

	public function daftar_pusat_sdm_medis()
	{
		$this->load->model('psm_model');
		$data['psm'] = $this->psm_model->get();

		$this->load->view('master/header');
		$this->load->view('pusat_tenaga_medis/daftar', $data);
		$this->load->view('master/footer');	
	}

	public function tambah_pusat_sdm_medis()
	{
		$this->load->view('master/header');
		$this->load->view('pusat_tenaga_medis/tambah');
		$this->load->view('master/footer');	
	}

	public function do_tambah_pusat_sdm_medis()
	{
		$data = array (
			'nama_psm' => $this->input->post('nama_psm'),
			'alamat_psm' => $this->input->post('alamat'),
			'jumlah_sdm' => $this->input->post('jumlah_sdm')
		);

		$this->load->model('psm_model');
		
		if($this->psm_model->get_id_by_name($data['nama_psm']) == null)
		{
			$this->psm_model->insert($data);
			echo "Penambahan pusat SDM medis berhasil.";
		}
		else
		{
			echo "Pusat SDM medis tersebut telah ada.";
		}
		echo '<br />Klik <a href="'.site_url('main/tambah_pusat_sdm_medis').'">disini</a> untuk kembali ke halaman sebelumnya';
	}

	public function daftar_keahlian()
	{
		$this->load->model('keahlian_model');
		$data['keahlian'] = $this->keahlian_model->get();

		$this->load->view('master/header');
		$this->load->view('keahlian/daftar', $data);
		$this->load->view('master/footer');	
	}

	public function tambah_keahlian()
	{
		$this->load->view('master/header');
		$this->load->view('keahlian/tambah');
		$this->load->view('master/footer');
	}

	public function do_tambah_keahlian()
	{
		$this->load->model('keahlian_model');

		$nama_keahlian = $this->input->post('nama_keahlian');

		if($this->keahlian_model->get_id_by_name($nama_keahlian) == null)
		{
			$this->keahlian_model->insert($nama_keahlian);
			echo "Penambahan keahlian berhasil.";
		}
		else
		{
			echo "Keahlian tersebut telah ada.";
		}
		echo '<br />Klik <a href="'.site_url('main/tambah_keahlian').'">disini</a> untuk kembali ke halaman sebelumnya';
	}

	public function delete_keahlian($id_keahlian)
	{
		$this->load->model('keahlian_model');
		$this->keahlian_model->delete($id_keahlian);
		echo "Penghapusan keahlian berhasil.";
		echo '<br />Klik <a href="'.site_url('main/daftar_keahlian').'">disini</a> untuk kembali ke halaman sebelumnya';
	}

	public function process_from_modal()
	{
		$task = $this->input->post('task');
		$key = $this->input->post('key');

		if($task == 'delete_kab_kota')
		{
			$this->delete_kab_kota($key);
		}
		else if($task == 'delete_bencana')
		{
			$this->delete_bencana($key);
		}
		else if($task == 'delete_tenaga_medis')
		{
			$this->delete_tenaga_medis($key);
		}
		else if($task == 'delete_data_biaya')
		{
			$this->delete_data_biaya($key);
		}
		else if($task == 'delete_keahlian')
		{
			$this->delete_keahlian($key);
		}
		else
		{
			redirect('main');
		}
	}
}
