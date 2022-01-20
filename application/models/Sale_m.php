<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Sale_m extends CI_Model
{
    public function invoice_no()
    {
        //2 = tahun , 2 = bulan , 2=tanggal , 4 = counter penjualan sehari
        $sql = "SELECT MAX(MID(invoice,9,4)) AS invoice_no FROM t_sale WHERE MID(invoice,3,6) = DATE_FORMAT(CURDATE(),'%y%m%d')";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $n = ((int)$row->invoice_no) + 1;
            $no = sprintf("%'.04d", $n);
        } else {
            $no = "0001";
        }
        $invoice = "MP" . date('ymd') . $no;
        return $invoice;
    }

    public function get_cart($params = null)
    {
        $this->db->select('*, p_item.nama as item_name, t_cart.price as cart_price');
        $this->db->from('t_cart');
        $this->db->join('p_item', 't_cart.item_id = p_item.item_id');
        if ($params != null) {
            $this->db->where($params);
        }
        $this->db->where('user_id', $this->session->userdata('userid'));
        $query = $this->db->get();
        return $query;
    }
    public function add_cart($post)
    {
        $query = $this->db->query("SELECT MAX(cart_id) AS cart_no FROM t_cart");
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $car_no = ((int)$row->cart_no) + 1;
        } else {
            $car_no = "1";
        }
        $params = array(
            //dari field database --- dari script data java dalam ''
            'cart_id' => $car_no,
            'item_id' => $post['item_id'],
            'price' => $post['price'],
            'qty' => $post['qty'],
            'total' => ($post['price'] * $post['qty']),
            'user_id' => $this->session->userdata('userid'),
        );
        //dimasukkan ke db t_cart dengan parameternya
        $this->db->insert('t_cart', $params);
    }

    function update_cart_qty($post)
    {
        $sql = "UPDATE t_cart SET price = '$post[price]',
                qty = qty + '$post[qty]',
                total = '$post[price]' * qty
                WHERE item_id = '$post[item_id]'";
        $this->db->query($sql);
    }

    public function del_cart($params = null)
    {
        if ($params != null) {
            $this->db->where($params);
        }
        $this->db->delete('t_cart');
    }

    public function edit_cart($post)
    {
        $params = array(
            //field database -- nama dari data di edit cart javascript
            'price' => $post['price'],
            'qty' => $post['qty'],
            'discount_item' => $post['discount'],
            'total' => $post['total'],
        );
        $this->db->where('cart_id', $post['cart_id']);
        $this->db->update('t_cart', $params);
    }
    public function add_sale($post)
    {
        $params = array(
            //field database -- nama dari data di edit cart javascript
            'invoice' => $this->invoice_no(),
            'customer_id' => $post['customer_id'] == "" ? null : $post['customer_id'],
            'total_price' => $post['subtotal'],
            'discount' => $post['discount'],
            'final_price' => $post['grandtotal'],
            'cash' => $post['cash'],
            'remaining' => $post['change'],
            'note' => $post['note'],
            'date' => $post['date'],
            'user_id' => $this->session->userdata('userid')
        );
        $this->db->insert('t_sale', $params);
        return $this->db->insert_id();
    }
    function add_sale_detail($params)
    {
        $this->db->insert_batch('t_sale_detail', $params);
    }
    //BUAT ALAT BISA SAMA
    public function get_sale($id = null)
    {
        $this->db->select('*, customer.nama as customer_name, user.username as user_name, t_sale.created as sale_created');
        $this->db->from('t_sale');
        $this->db->join('customer', 't_sale.customer_id = customer.customer_id', 'left');
        $this->db->join('user', 't_sale.user_id = user.user_id');
        if ($id != null) {
            $this->db->where('sale_id', $id);
        }
        $this->db->order_by('date', 'desc');
        $query = $this->db->get();
        return $query;
    }
    //BUAT ALAT
    public function get_sale_detail($sale_id = null)
    {
        $this->db->select('*, t_sale_detail.price as detail_price');
        $this->db->from('t_sale_detail');
        $this->db->join('p_item', 't_sale_detail.item_id = p_item.item_id');
        if ($sale_id != null) {
            $this->db->where('t_sale_detail.sale_id', $sale_id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function del_sale($id)
    {
        $this->db->where('sale_id', $id);
        $this->db->delete('t_sale');
    }

    // public function GetProfitHariIni()
    // {
    //     date_default_timezone_set('Asia/Jakarta');
    //     $TanggalHariIni = date('Y-m-d');
    //     $this->db->select('*');
    //     $this->db->from('t_sale_detail');
    //     $this->db->join('p_item', 't_sale_detail.item_id = p_item.item_id', 'left');
    //     $this->db->where('date', $TanggalHariIni);

    //     return $this->db->get();
    // }
}
