<?phpif (!defined('BASEPATH'))    exit('No direct script access allowed');class Csv_currentrole_report extends Admin_Controller {    /* .. */    public function index() {        /* Select currentrole all *///      $this->db->select('*');//      $this->db->from('currentrole');//      $this->db->where('status', '1');//      $this->db->where('id !=',1 );//      $data['get_currentrole']=$this->db->get()->result();//      /*Select currentrole with bettwen data*/        $this->db->select('*');        $this->db->from('currentrole');        $this->db->where('status', '1');        $this->db->where('id !=', 21);        //$this->db->where('id !=', 16);        $this->db->where("id NOT IN (11,12,13,14,18,19,21,22)");        $this->db->order_by('ordering','ASC');                $data['get_currentrole'] = $this->db->get()->result();//      /*Select currentrole leader data */        $this->db->select('*');        $this->db->from('currentrole');        $this->db->where('status', '1');//      $this->db->where('id !=',1 );        $this->db->where("id BETWEEN 1 and 4");        $data['get_currentrole_leader'] = $this->db->get()->result();        $this->load->view('header');        $this->load->view('csv_currentrole_report/index', $data);        $this->load->view('footer');    }    /* current rule report by province */    public function cr_report_province() {        //      /*Select currentrole with bettwen data*/        $this->db->select('*');        $this->db->from('currentrole');        $this->db->where('status', '1');                //$this->db->where("id NOT BETWEEN 1 AND 8");        $this->db->where("id NOT IN (1,2,3,4,5,6,7,8,13,14,20,22)");        $this->db->order_by("command_province_current_role_code");        $data['get_currentrole'] = $this->db->get()->result();                $this->load->view("header");        $this->load->view("csv_currentrole_report/cr_report_province", $data);        $this->load->view("footer");    }    public function report_pdf(){         $this->db->select('*');        $this->db->from('currentrole');        $this->db->where('status', '1');         $this->db->where('id !=',13  );         $this->db->where('id !=',14 );        // $this->db->where('id !=',16 );         $this->db->where('id !=',20 );        //$this->db->where("id NOT BETWEEN 1 AND 8");         $this->db->where("id NOT IN (1,2,3,4,5,6,7,8,22)");        $this->db->order_by("command_province_current_role_code");        $data['get_currentrole'] = $this->db->get()->result();                $this->load->view('csv/csv_currentrole_report/report_pdf', $data);            }    public function positionbyofficial(){        $this->db->select('*');        $this->db->from('currentrole');        $this->db->where('status', '1');        $this->db->where('id !=', 21);       // $this->db->where('id !=', 16);                $this->db->where("id NOT IN (11,12,13,14,18,19,21,22)");        $data['get_currentrole'] = $this->db->get()->result();//      /*Select currentrole leader data */        $this->db->select('*');        $this->db->from('currentrole');        $this->db->where('status', '1');//      $this->db->where('id !=',1 );        $this->db->where("id BETWEEN 1 and 4");        $data['get_currentrole_leader'] = $this->db->get()->result();               $this->load->view('csv_currentrole_report/prositionreport', $data);         }    }