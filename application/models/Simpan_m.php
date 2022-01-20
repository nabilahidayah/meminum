<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Simpan_m extends CI_Model
{
    function saveData($dataSimpan)
    {
        $this->db->insert('transaksi', $dataSimpan);
        return TRUE;
    }

    public function get_alat($id = null)
    {
        $this->db->select('*, user.username as user_name, p_item.nama as item_name');
        $this->db->from('transaksi');
        $this->db->join('p_item', 'transaksi.item_id = p_item.item_id');
        $this->db->join('user', 'transaksi.user_id = user.user_id');
        if ($id != null) {
            $this->db->where('transaksi_id', $id);
        }
        $this->db->order_by('tanggal', 'desc');
        $query = $this->db->get();
        return $query;
    }
    public function del_alat($id)
    {
        $this->db->where('transaksi_id', $id);
        $this->db->delete('transaksi');
    }
    
}
