<?php defined('BASEPATH') or exit('No direct script access allowed');

class Perencanaan_kecamatan_model extends CI_Model
{
	protected $table = 'tbl_perencanaan_desa';

	const ENABLE = 1;
	const DISABLE = 0;

	const ORDER_ABLE = [
		1  => 'p.status',
		2  => 'p.tahun',
		3  => 'p.desa',
		4  => 'p.bidang_desa',
		5  => 'p.urutan_prioritas',
		6  => 'p.nama_program_kegiatan',
		7  => 'p.sdgs_ke',
		8  => 'p.lokasi',
		9  => 'p.sumber_dana',
	];

	public function get_data(string $search = '', $tahun = '')
	{
		$builder = $this->db->select([
			'p.*'
		])
			->from("{$this->table} p")
			->group_by('p.id');

		if (empty($search)) {
			$search = $builder;
		} else {
			$search = $builder->group_start()
				->like('p.tahun', $search)
				->or_like('p.desa', $search)
				->or_like('p.bidang_desa', $search)
				->or_like('p.urutan_prioritas', $search)
				->or_like('p.nama_program_kegiatan', $search)
				->or_like('p.sdgs_ke', $search)
				->or_like('p.lokasi', $search)
				->or_like('p.sumber_dana', $search)
				->group_end();
		}

		$condition = $tahun === 'semua'
			? $search
			: $search->where('p.tahun', $tahun);

		return $condition;
	}

	public function insert()
	{
		$post = $this->input->post();

		$data['sumber_dana']        = $post['sumber_dana'];
		$data['judul']              = $post['judul'];
		$data['volume']             = $post['volume'];
		$data['tahun']     = $post['tahun'];
		$data['pelaksana_kegiatan'] = $post['pelaksana_kegiatan'];
		$data['id_lokasi']          = $post['id_lokasi'] ?: null;
		$data['lokasi']             = $post['lokasi'] ?: null;
		$data['keterangan']         = $post['keterangan'];
		$data['created_at']         = date('Y-m-d H:i:s');
		$data['updated_at']         = date('Y-m-d H:i:s');
		$data['foto'] 						  = $this->upload_gambar_pembangunan('foto');
		$data['anggaran']     			= $post['anggaran'];

		if (empty($data['foto'])) unset($data['foto']);

		unset($data['file_foto']);
		unset($data['old_foto']);

		$outp = $this->db->insert('tbl_perencanaan_desa', $data);

		if ($outp) $_SESSION['success'] = 1;
		else $_SESSION['success'] = -1;
	}

	public function update($id = 0)
	{
		$post = $this->input->post();

		$data['sumber_dana']        = $post['sumber_dana'];
		$data['judul']              = $post['judul'];
		$data['volume']             = $post['volume'];
		$data['tahun']     = $post['tahun'];
		$data['pelaksana_kegiatan'] = $post['pelaksana_kegiatan'];
		$data['id_lokasi']          = $post['id_lokasi'] ?: null;
		$data['lokasi']             = $post['lokasi'] ?: null;
		$data['keterangan']         = $post['keterangan'];
		$data['created_at']         = date('Y-m-d H:i:s');
		$data['updated_at']         = date('Y-m-d H:i:s');
		$data['foto'] 						  = $this->upload_gambar_pembangunan('foto');
		$data['anggaran']     			= $post['anggaran'];

		if (empty($data['foto'])) unset($data['foto']);

		unset($data['file_foto']);
		unset($data['old_foto']);

		$this->db->where('id', $id);
		$outp = $this->db->update('tbl_perencanaan_desa', $data);

		if ($outp) $_SESSION['success'] = 1;
		else $_SESSION['success'] = -1;
	}

	public function delete($id)
	{
		return $this->db->where('id', $id)->delete($this->table);
	}

	public function find($id)
	{
		return $this->db->select([
			'p.*'
		])
			->from("{$this->table} p")
			->join('tweb_wilayah w', 'p.id_lokasi = w.id', 'left')
			->where('p.id', $id)
			->get()
			->row();
	}

	public function list_filter_tahun()
	{
		return $this->db->select('tahun')
			->distinct()
			->order_by('tahun', 'desc')
			->get($this->table)
			->result();
	}
	
	public function get_data_durkp_final(string $search = '', $tahun = '')
	{
		$builder = $this->db->select([
			'p.*',
		])
			->from("{$this->table} p")
			->where('p.status_rkpdes = 0 and p.status_vote = 1 and p.status_usulan_musrenbang_kecamatan = 1')
			->join('tbl_perencanaan_desa_polling d', 'd.id_perencanaan_desa = p.id', 'left')
			->group_by('p.id');

		if (empty($search)) {
			$search = $builder;
		} else {
			$search = $builder->group_start()
				->like('p.tahun', $search)
				->or_like('p.desa', $search)
				->or_like('p.bidang_desa', $search)
				->or_like('p.urutan_prioritas', $search)
				->or_like('p.nama_program_kegiatan', $search)
				->group_end();
		}

		$condition = $tahun === 'semua'
			? $search
			: $search->where('p.tahun', $tahun);

		return $condition;
	}

	public function get_data_daftar_polling_kecamatan(string $search = '', $tahun = '')
	{
		$builder = $this->db->select([
			'p.*',
			'(CASE WHEN SUM(CAST(d.id_pilihan as UNSIGNED INTEGER)) IS NOT NULL THEN CONCAT(SUM(CAST(d.id_pilihan as UNSIGNED INTEGER))) ELSE CONCAT("belum ada progres") END) AS sum_id_pilihan',
			'(CASE WHEN 
				COUNT(CAST(d.id_pilihan as UNSIGNED INTEGER)) IS NOT NULL 
				THEN CONCAT(COUNT(CAST(d.id_pilihan as UNSIGNED INTEGER))) 
				ELSE CONCAT("belum ada responden") END) AS count_id_pilihan',
		])
			->from("{$this->table} p")
			->where('p.status_usulan = 1 and p.status_rkpdes = 0 and p.status_polling_kecamatan = 1')
			->join('tbl_perencanaan_kecamatan_polling d', 'd.id_perencanaan_desa = p.id', 'left')
			->group_by('p.id');

		if (empty($search)) {
			$search = $builder;
		} else {
			$search = $builder->group_start()
				->like('p.tahun', $search)
				->or_like('p.desa', $search)
				->or_like('p.bidang_desa', $search)
				->or_like('p.urutan_prioritas', $search)
				->or_like('p.nama_program_kegiatan', $search)
				->or_like('p.sdgs_ke', $search)
				->or_like('p.lokasi', $search)
				->or_like('p.sumber_dana', $search)
				->group_end();
		}

		$condition = $tahun === 'semua'
			? $search
			: $search->where('p.tahun', $tahun);

		return $condition;
	}

	public function get_data_hasil_polling_kecamatan(string $search = '', $tahun = '')
	{
		$builder = $this->db->select([
			'p.*',
			'(CASE WHEN SUM(CAST(d.id_pilihan as UNSIGNED INTEGER)) IS NOT NULL THEN CONCAT(SUM(CAST(d.id_pilihan as UNSIGNED INTEGER))) ELSE CONCAT("belum ada progres") END) AS sum_id_pilihan',
			'(CASE WHEN 
				COUNT(CAST(d.id_pilihan as UNSIGNED INTEGER)) IS NOT NULL 
				THEN CONCAT(COUNT(CAST(d.id_pilihan as UNSIGNED INTEGER))) 
				ELSE CONCAT("belum ada responden") END) AS count_id_pilihan',
			'(CASE WHEN MIN(CAST(d.updated_at as DATETIME)) THEN CONCAT(MIN(CAST(d.updated_at as DATETIME))) ELSE CONCAT("belum ada progres") END) AS min_updated',
			'(CASE WHEN MAX(CAST(d.updated_at as DATETIME)) THEN CONCAT(MAX(CAST(d.updated_at as DATETIME))) ELSE CONCAT("belum ada progres") END) AS max_updated',
			'SUM(IF(d.id_pilihan=1,1,0)) AS sum_ts',
			'SUM(IF(d.id_pilihan=2,1,0)) AS sum_s',
			'SUM(IF(d.id_pilihan=3,1,0)) AS sum_ss',
		])
			->from("{$this->table} p")
			->where('p.status = 1 and p.status_usulan = 1 and p.status_vote = 1 and p.status_rkpdes = 0 and p.status_usulan_musrenbang_kecamatan = 1 and p.status_polling_kecamatan = 1')
			->join('tbl_perencanaan_kecamatan_polling d', 'd.id_perencanaan_desa = p.id', 'left')
			->group_by('p.id');

		if (empty($search)) {
			$search = $builder;
		} else {
			$search = $builder->group_start()
				->like('p.tahun', $search)
				->or_like('p.desa', $search)
				->or_like('p.bidang_desa', $search)
				->or_like('p.urutan_prioritas', $search)
				->or_like('p.nama_program_kegiatan', $search)
				->group_end();
		}

		$condition = $tahun === 'semua'
			? $search
			: $search->where('p.tahun', $tahun);

		return $condition;
	}
	
	public function get_prioritas_hasil_musrenbang(string $search = '', $tahun = '')
	{
		$builder = $this->db->select([
			'p.*',
			'(CASE WHEN SUM(CAST(d.id_pilihan as UNSIGNED INTEGER)) IS NOT NULL THEN CONCAT(SUM(CAST(d.id_pilihan as UNSIGNED INTEGER))) ELSE CONCAT("belum ada progres") END) AS sum_id_pilihan',
			'(CASE WHEN 
				COUNT(CAST(d.id_pilihan as UNSIGNED INTEGER)) IS NOT NULL 
				THEN CONCAT(COUNT(CAST(d.id_pilihan as UNSIGNED INTEGER))) 
				ELSE CONCAT("belum ada responden") END) AS count_id_pilihan',
			'(CASE WHEN MIN(CAST(d.updated_at as DATETIME)) THEN CONCAT(MIN(CAST(d.updated_at as DATETIME))) ELSE CONCAT("belum ada progres") END) AS min_updated',
			'(CASE WHEN MAX(CAST(d.updated_at as DATETIME)) THEN CONCAT(MAX(CAST(d.updated_at as DATETIME))) ELSE CONCAT("belum ada progres") END) AS max_updated',
			'SUM(IF(d.id_pilihan=1,1,0)) AS sum_ts',
			'SUM(IF(d.id_pilihan=2,1,0)) AS sum_s',
			'SUM(IF(d.id_pilihan=3,1,0)) AS sum_ss',
		])
			->from("{$this->table} p")
			->where('p.status = 1 and p.status_usulan = 1 and p.status_vote = 1 and p.status_rkpdes = 0 and p.status_usulan_musrenbang_kecamatan = 1 and p.status_polling_kecamatan = 1 and p.status_penetapan_musrenbang_kecamatan = 1')
			->join('tbl_perencanaan_kecamatan_polling d', 'd.id_perencanaan_desa = p.id', 'left')
			->group_by('p.id');

		if (empty($search)) {
			$search = $builder;
		} else {
			$search = $builder->group_start()
				->like('p.tahun', $search)
				->or_like('p.desa', $search)
				->or_like('p.bidang_desa', $search)
				->or_like('p.urutan_prioritas', $search)
				->or_like('p.nama_program_kegiatan', $search)
				->group_end();
		}

		$condition = $tahun === 'semua'
			? $search
			: $search->where('p.tahun', $tahun);

		return $condition;
	}

	public function get_belum_sepakat_musrenbang(string $search = '', $tahun = '')
	{
		$builder = $this->db->select([
			'p.*',
			'(CASE WHEN SUM(CAST(d.id_pilihan as UNSIGNED INTEGER)) IS NOT NULL THEN CONCAT(SUM(CAST(d.id_pilihan as UNSIGNED INTEGER))) ELSE CONCAT("belum ada progres") END) AS sum_id_pilihan',
			'(CASE WHEN 
				COUNT(CAST(d.id_pilihan as UNSIGNED INTEGER)) IS NOT NULL 
				THEN CONCAT(COUNT(CAST(d.id_pilihan as UNSIGNED INTEGER))) 
				ELSE CONCAT("belum ada responden") END) AS count_id_pilihan',
			'(CASE WHEN MIN(CAST(d.updated_at as DATETIME)) THEN CONCAT(MIN(CAST(d.updated_at as DATETIME))) ELSE CONCAT("belum ada progres") END) AS min_updated',
			'(CASE WHEN MAX(CAST(d.updated_at as DATETIME)) THEN CONCAT(MAX(CAST(d.updated_at as DATETIME))) ELSE CONCAT("belum ada progres") END) AS max_updated',
			'SUM(IF(d.id_pilihan=1,1,0)) AS sum_ts',
			'SUM(IF(d.id_pilihan=2,1,0)) AS sum_s',
			'SUM(IF(d.id_pilihan=3,1,0)) AS sum_ss',
		])
			->from("{$this->table} p")
			->where('p.status = 1 and p.status_usulan = 1 and p.status_vote = 1 and p.status_rkpdes = 0 and p.status_usulan_musrenbang_kecamatan = 1 and p.status_polling_kecamatan = 1 and p.status_penetapan_musrenbang_kecamatan = 0')
			->join('tbl_perencanaan_kecamatan_polling d', 'd.id_perencanaan_desa = p.id', 'left')
			->group_by('p.id');

		if (empty($search)) {
			$search = $builder;
		} else {
			$search = $builder->group_start()
				->like('p.tahun', $search)
				->or_like('p.desa', $search)
				->or_like('p.bidang_desa', $search)
				->or_like('p.urutan_prioritas', $search)
				->or_like('p.nama_program_kegiatan', $search)
				->group_end();
		}

		$condition = $tahun === 'semua'
			? $search
			: $search->where('p.tahun', $tahun);

		return $condition;
	}

	public function vote_kecamatan($id)
	{
		return $this->db->set('status_polling_kecamatan', static::ENABLE)
			->where('id', $id)
			->update($this->table);
	}

	public function unvote_kecamatan($id)
	{
		return $this->db->set('status_polling_kecamatan', static::DISABLE)
			->where('id', $id)
			->update($this->table);
	}
	
	public function prioritas_aktiv($id)
	{
		return $this->db->set('status_penetapan_musrenbang_kecamatan', static::ENABLE)
			->where('id', $id)
			->update($this->table);
	}

	public function belum_disepakati($id)
	{
		return $this->db->set('status_penetapan_musrenbang_kecamatan', static::DISABLE)
			->where('id', $id)
			->update($this->table);
	}
}
