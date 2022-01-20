<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Chart extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('chart_m');
    }

    public function index()
    {
        $this->load->view('template', 'chart_view');
    }

    public function get_chart_data()
    {
        if (isset($_POST['start']) and isset($_POST['end'])) {
            $start_date = $_POST['start'];
            $end_date = $_POST['end'];
            $results = $this->chart_m->get_chart_data($start_date, $end_date);
            if ($results === NULL) {
                echo json_encode('No record found');
            } else {
                $json = '[';
                $counter = 1;
                foreach ($results as $result) {
                    $json .= '[';
                    $json .= strtotime($result->temp_date);
                    $json .= ',';
                    $json .= $result->temp_min;
                    $json .= ',';
                    $json .= $result->temp_max;
                    $json .= ']';
                    if ($counter < count($results)) {
                        $json .= ',';
                    }
                    $counter++;
                }
                $json .= ']';
                echo $json;
            }
        } else {
            echo json_encode('Date must be selected.');
        }
    }
}

/* End of file HighChart.php */
/* Location: ./application/controllers/HighChart.php */
    // public function __construct()
    // {
    //     parent::__construct();
    //     check_not_login();
    //     $this->load->model(['dashboard_m', 'sale_m', 'stock_m']);
    // }
    // public function index()
    // {
    //     $data['laris'] = $this->dashboard_m->laris();
    //     $this->template->load('template', 'chart_view', $data);
    // }
