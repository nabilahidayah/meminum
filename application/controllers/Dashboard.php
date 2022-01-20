<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		//check_not_login();
		$this->load->model(['dashboard_m']);
	}
	public function index()
	{
		$data['laris'] = $this->dashboard_m->laris();
		$this->template->load('template', 'dashboard', $data);
	}

	// public function GetStokBarang()
	// {
	// 	$CekStok = $this->db->get_where('p_item', ['stock <' => 10])->num_rows();
	// 	$result['cek_stok'] = $CekStok;
	// 	echo json_encode($result);
	// }

	public function penjualan_bulan()
	{
		header('Content-type: application/json');
		$day = $this->input->post('day');
		foreach ($day as $key => $value) {
			$now = date($day[$value] . ' m Y');
			if ($qty = $this->dashboard_m->penjualanBulan($now) !== []) {
				$data[] = array_sum($this->dashboard_m->penjualanBulan($now));
			} else {
				$data[] = 0;
			}
		}
		echo json_encode($data);
	}

	public function tanggalFilter()
	{
		$tanggalAwal = $this->input->post('tanggalAwal');
		$tanggalAkhir = $this->input->post('tanggalAkhir');
		$data['dataFilter'] = $this->dashboard_m->filterbytanggal($tanggalAwal, $tanggalAkhir);
		$this->template->load('template', 'dashboard_filter', $data);
	}
}
