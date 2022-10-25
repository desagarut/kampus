<?php defined('BASEPATH') or exit('No direct script access allowed');

class Perencanaan_kecamatan extends Admin_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->modul_ini = 800;
		$this->sub_modul_ini = 801;
		$this->tab_ini = 1;
		$this->set_minsidebar(1);

		$this->load->library('upload');
		$this->load->model('perencanaan_desa_model', 'model');
		$this->load->model('perencanaan_kecamatan_model');
		$this->load->model('referensi_model');
		$this->load->model('config_model');
		$this->load->model('wilayah_model');
		$this->load->model('pamong_model');
	}

	private function clear_session()
	{
		$this->session->unset_userdata($this->_list_session);
		$this->session->status_dasar = 1; // default status dasar = hidup
		$this->session->per_page = $this->_set_page[0];
	}

	public function clear()
	{
		$this->clear_session();
		redirect('perencanaan_kecamatan');
	}

	public function index()
	{
		if ($this->input->is_ajax_request()) {
			$start = $this->input->post('start');
			$length = $this->input->post('length');
			$search = $this->input->post('search[value]');
			$order = $this->model::ORDER_ABLE[$this->input->post('order[0][column]')];
			$dir = $this->input->post('order[0][dir]');
			$tahun = $this->input->post('tahun');

			return $this->output
				->set_content_type('application/json')
				->set_output(json_encode([
					'draw'            => $this->input->post('draw'),
					'recordsTotal'    => $this->perencanaan_kecamatan_model->get_data_durkp_final()->count_all_results(),
					'recordsFiltered' => $this->perencanaan_kecamatan_model->get_data_durkp_final($search, $tahun)->count_all_results(),
					'data'            => $this->perencanaan_kecamatan_model->get_data_durkp_final($search, $tahun)->order_by($order, $dir)->limit($length, $start)->get()->result(),
				]));
		}

		$this->render('perencanaan_kecamatan/musrenbang/proses', [
			'list_tahun' => $this->model->list_filter_tahun(),
		]);
	}

	public function form_proses($id = '')
	{
		$this->tab_ini = 1;
		$this->sub_modul_ini = 801;

		if ($id) {
			$data['main'] = $this->model->find($id);
			$data['list_lokasi'] = $this->wilayah_model->list_semua_wilayah();
			$data['bidang_desa'] = $this->referensi_model->list_ref(BIDANG_DESA);
			$data['sumber_dana'] = $this->referensi_model->list_ref(SUMBER_DANA);
			$data['form_action'] = site_url("perencanaan_kecamatan/update_draf_musrenbang/$id");
		} else {
			$data['main'] = NULL;
			$data['list_lokasi'] = $this->wilayah_model->list_semua_wilayah();
			$data['bidang_desa'] = $this->referensi_model->list_ref(BIDANG_DESA);
			$data['sumber_dana'] = $this->referensi_model->list_ref(SUMBER_DANA);
			$data['form_action'] = site_url("perencanaan_kecamatan/insert_draf_musrenbang");
		}

		$this->load->view('perencanaan_kecamatan/musrenbang/form_proses', $data);
	}

	public function draft_musrenbang_kecamatan()
	{
		$this->tab_ini = 2;
		$this->sub_modul_ini = 801;

		if ($this->input->is_ajax_request()) {
			$start = $this->input->post('start');
			$length = $this->input->post('length');
			$search = $this->input->post('search[value]');
			$order = $this->model::ORDER_ABLE[$this->input->post('order[0][column]')];
			$dir = $this->input->post('order[0][dir]');
			$tahun = $this->input->post('tahun');

			return $this->output
				->set_content_type('application/json')
				->set_output(json_encode([
					'draw'            => $this->input->post('draw'),
					'recordsTotal'    => $this->perencanaan_kecamatan_model->get_data_durkp_final()->count_all_results(),
					'recordsFiltered' => $this->perencanaan_kecamatan_model->get_data_durkp_final($search, $tahun)->count_all_results(),
					'data'            => $this->perencanaan_kecamatan_model->get_data_durkp_final($search, $tahun)->order_by($order, $dir)->limit($length, $start)->get()->result(),
				]));
		}

		$this->render('perencanaan_kecamatan/musrenbang/draft', [
			'list_tahun' => $this->model->list_filter_tahun(),
		]);
	}

	public function dialog_daftar($id = 0, $aksi = '')
	{
		$this->load->view('global/ttd_pamong', [
			'aksi' => $aksi,
			'pamong' => $this->pamong_model->list_data(),
			'pamong_ttd' => $this->pamong_model->get_ub(),
			'pamong_ketahui' => $this->pamong_model->get_ttd(),
			'form_action' => site_url("perencanaan_kecamatan/musrenbang/daftar/$id/$aksi"),
		]);
	}

	public function daftar($id = 0, $aksi = '')
	{
		$request = $this->input->post();

		$desa_drpkd = $this->model->find($id);

		$data['musdus']    		= $musdus;
		$data['dokumentasi']    = $dokumentasi;
		$data['config']         = $this->header['desa'];
		$data['pamong_ttd']     = $this->pamong_model->get_data($request['pamong_ttd']);
		$data['pamong_ketahui'] = $this->pamong_model->get_data($request['pamong_ketahui']);
		$data['aksi']           = $aksi;
		$data['file']           = "Laporan Daftar Usulan";
		$data['isi']            = "perencanaan_kecamatan/musrenbang/cetak";

		$this->load->view('global/format_cetak', $data);
	}

	public function daftar_polling()
	{
		$this->tab_ini = 1;
		$this->sub_modul_ini = 802;

		if ($this->input->is_ajax_request()) {
			$start = $this->input->post('start');
			$length = $this->input->post('length');
			$search = $this->input->post('search[value]');
			$order = $this->model::ORDER_ABLE[$this->input->post('order[0][column]')];
			$dir = $this->input->post('order[0][dir]');
			$tahun = $this->input->post('tahun');

			return $this->output
				->set_content_type('application/json')
				->set_output(json_encode([
					'draw'            => $this->input->post('draw'),
					'recordsTotal'    => $this->perencanaan_kecamatan_model->get_data_daftar_polling_kecamatan()->count_all_results(),
					'recordsFiltered' => $this->perencanaan_kecamatan_model->get_data_daftar_polling_kecamatan($search, $tahun)->count_all_results(),
					'data'            => $this->perencanaan_kecamatan_model->get_data_daftar_polling_kecamatan($search, $tahun)->order_by($order, $dir)->limit($length, $start)->get()->result(),
				]));
		}

		$this->render('perencanaan_kecamatan/polling/daftar', [
			'list_tahun' => $this->model->list_filter_tahun(),
		]);
	}

	public function insert_draf_musrenbang()
	{
		$this->model->insert();
		redirect('perencanaan_kecamatan');
	}

	public function update_draf_musrenbang($id = '')
	{
		$this->model->update_draf_musrenbang($id);
		redirect("perencanaan_kecamatan");
	}

	public function hasil_polling()
	{
		$this->tab_ini = 2;
		$this->sub_modul_ini = 802;

		if ($this->input->is_ajax_request()) {
			$start = $this->input->post('start');
			$length = $this->input->post('length');
			$search = $this->input->post('search[value]');
			$order = $this->model::ORDER_ABLE[$this->input->post('order[0][column]')];
			$dir = $this->input->post('order[0][dir]');
			$tahun = $this->input->post('tahun');

			return $this->output
				->set_content_type('application/json')
				->set_output(json_encode([
					'draw'            => $this->input->post('draw'),
					'recordsTotal'    => $this->perencanaan_kecamatan_model->get_data_hasil_polling_kecamatan()->count_all_results(),
					'recordsFiltered' => $this->perencanaan_kecamatan_model->get_data_hasil_polling_kecamatan($search, $tahun)->count_all_results(),
					'data'            => $this->perencanaan_kecamatan_model->get_data_hasil_polling_kecamatan($search, $tahun)->order_by($order, $dir)->limit($length, $start)->get()->result(),
				]));
		}

		$this->render('perencanaan_kecamatan/polling/hasil', [
			'list_tahun' => $this->model->list_filter_tahun(),
		]);
	}

	public function penetapan()
	{
		$this->tab_ini = 1;
		$this->sub_modul_ini = 803;

		if ($this->input->is_ajax_request()) {
			$start = $this->input->post('start');
			$length = $this->input->post('length');
			$search = $this->input->post('search[value]');
			$order = $this->model::ORDER_ABLE[$this->input->post('order[0][column]')];
			$dir = $this->input->post('order[0][dir]');
			$tahun = $this->input->post('tahun');

			return $this->output
				->set_content_type('application/json')
				->set_output(json_encode([
					'draw'            => $this->input->post('draw'),
					'recordsTotal'    => $this->perencanaan_kecamatan_model->get_data_hasil_polling_kecamatan()->count_all_results(),
					'recordsFiltered' => $this->perencanaan_kecamatan_model->get_data_hasil_polling_kecamatan($search, $tahun)->count_all_results(),
					'data'            => $this->perencanaan_kecamatan_model->get_data_hasil_polling_kecamatan($search, $tahun)->order_by($order, $dir)->limit($length, $start)->get()->result(),
				]));
		}

		$this->render('perencanaan_kecamatan/rptk/index', [
			'list_tahun' => $this->model->list_filter_tahun(),
		]);
	}

	public function prioritas()
	{
		$this->tab_ini = 2;
		$this->sub_modul_ini = 803;

		if ($this->input->is_ajax_request()) {
			$start = $this->input->post('start');
			$length = $this->input->post('length');
			$search = $this->input->post('search[value]');
			$order = $this->model::ORDER_ABLE[$this->input->post('order[0][column]')];
			$dir = $this->input->post('order[0][dir]');
			$tahun = $this->input->post('tahun');

			return $this->output
				->set_content_type('application/json')
				->set_output(json_encode([
					'draw'            => $this->input->post('draw'),
					'recordsTotal'    => $this->perencanaan_kecamatan_model->get_prioritas_hasil_musrenbang()->count_all_results(),
					'recordsFiltered' => $this->perencanaan_kecamatan_model->get_prioritas_hasil_musrenbang($search, $tahun)->count_all_results(),
					'data'            => $this->perencanaan_kecamatan_model->get_prioritas_hasil_musrenbang($search, $tahun)->order_by($order, $dir)->limit($length, $start)->get()->result(),
				]));
		}

		$this->render('perencanaan_kecamatan/rptk/prioritas', [
			'list_tahun' => $this->model->list_filter_tahun(),
		]);
	}
	
	public function belum_sepakat()
	{
		$this->tab_ini = 3;
		$this->sub_modul_ini = 803;

		if ($this->input->is_ajax_request()) {
			$start = $this->input->post('start');
			$length = $this->input->post('length');
			$search = $this->input->post('search[value]');
			$order = $this->model::ORDER_ABLE[$this->input->post('order[0][column]')];
			$dir = $this->input->post('order[0][dir]');
			$tahun = $this->input->post('tahun');

			return $this->output
				->set_content_type('application/json')
				->set_output(json_encode([
					'draw'            => $this->input->post('draw'),
					'recordsTotal'    => $this->perencanaan_kecamatan_model->get_belum_sepakat_musrenbang()->count_all_results(),
					'recordsFiltered' => $this->perencanaan_kecamatan_model->get_belum_sepakat_musrenbang($search, $tahun)->count_all_results(),
					'data'            => $this->perencanaan_kecamatan_model->get_belum_sepakat_musrenbang($search, $tahun)->order_by($order, $dir)->limit($length, $start)->get()->result(),
				]));
		}

		$this->render('perencanaan_kecamatan/rptk/belum_sepakat', [
			'list_tahun' => $this->model->list_filter_tahun(),
		]);
	}

	// Start Vote Kecamatan//
	public function vote_kecamatan($id)
	{
		$this->perencanaan_kecamatan_model->vote_kecamatan($id);

		$this->session->success = 1;

		redirect('perencanaan_kecamatan/draft_musrenbang_kecamatan');
	}

	public function unvote_kecamatan($id)
	{
		$this->perencanaan_kecamatan_model->unvote_kecamatan($id);

		$this->session->success = 1;

		redirect('perencanaan_kecamatan/draft_musrenbang_kecamatan');
	}
	//End Vote Desa//
	
	// Start Vote Kecamatan//
	public function prioritas_aktiv($id)
	{
		$this->perencanaan_kecamatan_model->prioritas_aktiv($id);

		$this->session->success = 1;

		redirect('perencanaan_kecamatan/penetapan');
	}

	public function belum_disepakati($id)
	{
		$this->perencanaan_kecamatan_model->belum_disepakati($id);

		$this->session->success = 1;

		redirect('perencanaan_kecamatan/penetapan');
	}
	//End Vote Desa//
}
