<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Chart_m extends CI_Model
{

    private $temperature = 'temperature';

    function __construct()
    {
    }

    function get_chart_data($start_date, $end_date)
    {
        $sql = 'SELECT * 
                FROM ' . $this->temperature . '
				WHERE DATE(temp_date)>=' . $this->db->escape($start_date) .
            ' AND DATE(temp_date)<=' . $this->db->escape($end_date);
        $query = $this->db->query($sql);
        $results = $query->result();
        return $results;
    }
}

    // public function laris()
    // {
    //     $query = $this->db->query("SELECT transaksi.item_id, p_item.nama, (SELECT sum(transaksi.qty)) AS sold FROM transaksi 
    // INNER JOIN t_sale on transaksi.sale_id = t_sale.sale_id
    // INNER JOIN p_item ON transaksi.item_id = p_item.item_id
    // WHERE MID(transaksi.tanggal, 6, 2) = DATE_FORMAT(CURDATE(), '%m')
    // GROUP BY transaksi.item_id 
    // ORDER BY sold DESC 
    // LIMIT 10");
    //     $data = $query->result();
    //     return $data;
    // }
