<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Simpan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //check_not_login();
        //check_admin(); 
        //(tergantung mau category hanya bisa dilihat admin atau kasir juga. kalau dimatikan berarti kasir dpt melihat)
        $this->load->model(['simpan_m', 'sale_m']);
    }
    public function index()
    {
        $this->template->load('template', 'report/alat_report');
    }

    public function insert()
    {
        isset($_GET['item_id']);
        isset($_GET['qty']);
        isset($_GET['jml_uang']);
        isset($_GET['user_id']);
        //echo "OK";

        $item_id = $this->input->get('item_id');
        $qty = $this->input->get('qty');
        $jml_uang = $this->input->get('jml_uang');
        $user_id = $this->input->get('user_id');

        $dataSimpan = array(
            'item_id' => $item_id,
            'qty' => $qty,
            'jml_uang' => $jml_uang,
            'user_id' => $user_id
        );

        if ($this->simpan_m->saveData($dataSimpan)) {
            echo "BERHASIL";
        } else {
            echo "ERROR";
        }
    }
    public function sale_alat()
    {
        $data['row'] = $this->simpan_m->get_alat();
        $this->template->load('template', 'report/alat_report', $data);
    }

    public function del($id)
    {
        $this->simpan_m->del_alat($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
            redirect('simpan/sale_alat');
        } else {
            echo "<script>alert('Data penjualan gagal dihapus');
			window.location='" . site_url('simpan/sale_alat') . "';</script>";
        }
    }
}
