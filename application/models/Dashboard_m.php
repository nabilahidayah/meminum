<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Dashboard_m extends CI_Model
{
    public function laris()
    {
        $query = $this->db->query("SELECT transaksi.item_id, p_item.nama, (SELECT sum(transaksi.qty)) AS sold FROM transaksi 
    INNER JOIN p_item ON transaksi.item_id = p_item.item_id
    -- WHERE MID(transaksi.tanggal, 6, 2) = DATE_FORMAT(CURDATE(), '%m')
    GROUP BY transaksi.item_id 
    ORDER BY sold DESC 
    LIMIT 10");
        $data = $query->result();
        return $data;
    }

    public function total_transaksi()
    {
        $this->db->select('Sum(transaksi.jml_uang) AS total_profit');
        $this->db->from('transaksi');
        $query = $this->db->get();
        return $query->row();
    }

    public function total_pengeluaran()
    {
        $this->db->select('Sum(t_stock.harga) AS total_pengeluaran');
        $this->db->from('t_stock');
        $query = $this->db->get();
        return $query->row();
    }

    public function total_hariini()
    {
        $this->db->select('Sum(t_sale.final_price) AS total_hariini
        WHERE DATE_FORMAT(CURDATE())
        ');
        $this->db->from('t_sale');
        $query = $this->db->get();
        return $query->row();
    }


    function filterbytanggal($tanggalAwal, $tanggalAkhir)
    {
        $query = $this->db->query("SELECT transaksi.item_id, p_item.nama, (SELECT sum(transaksi.qty)) AS sold FROM transaksi 
    INNER JOIN p_item ON transaksi.item_id = p_item.item_id
    WHERE tanggal BETWEEN '$tanggalAwal' and '$tanggalAkhir'
    GROUP BY transaksi.item_id 
    ORDER BY sold DESC 
    LIMIT 10");
        $data = $query->result();
        return $data;
    }

    // public function data_nama_barang()
    // {
    //     $query = $this->db->query("SELECT p_item.nama FROM t_sale_detail 
    // 	INNER JOIN t_sale on t_sale_detail.sale_id = t_sale.sale_id
    // 	INNER JOIN p_item ON t_sale_detail.item_id = p_item.item_id
    // 	Group by t_sale_detail.item_id
    // 	LIMIT 10");
    //     $data = $query->result();
    //     $this->load->view('dashboard', $data);
    // }

    // public function data_jumlah_barang()
    // {
    //     $query = $this->db->query("SELECT sum(t_sale_detail.qty) as sold FROM t_sale_detail 
    // 	Group by item_id LIMIT 10");
    //     $data = $query->result();
    //     $this->load->view('dashboard', $data);
    // }
}
