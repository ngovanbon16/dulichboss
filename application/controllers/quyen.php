<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Quyen extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("mquyen");
    }

    public function index()
    {
        /*$this->_data['subview'] = 'admin/quyen_view';
        $this->_data['title'] = lang('authority');
        $this->_data['info'] = $this->mquyen->getList();
        $this->load->view('main.php', $this->_data);*/
        $email = $this->session->userdata["email"];
        if($this->mquyen->testquyen($email, "8"))
        {
            $this->_data['subview'] = 'admin/quyen_view';
            $this->_data['title'] = lang('authority');
            $this->load->view('main.php', $this->_data);
        }
        else
        {
            $this->_data['subview'] = 'home';
            $this->_data['title'] = lang('home');
            $this->load->view('main.php', $this->_data);
        }
    }

    public function add()
    {
        $ma = $this->db->escape_like_str($_POST["Q_MA"]);
        $ten = $this->db->escape_like_str($_POST['Q_TEN']);
        $status = "error";
        $error = "";
        $msg = array();

        $data = array(
            "Q_MA" => $ma,
            "Q_TEN" => $ten,
        );

        if($this->mquyen->testTen($ten))
        {
            $error = lang("name_not_be_repeated")."<br/>";
        }

        if($this->mquyen->testMa($ma))
        {
            $error .= lang("code_already_exists");
        }

        if($error != "")
        {
            $msg["error"] = $error;
        }
        else
        {
            $this->mquyen->insert($data);
            $status = "success";
        }

        $response = array('status' => $status,'msg' => $msg,'data' => $data);
        $jsonString = json_encode($response);
        echo $jsonString;
    }

    public function data()
    {
        $data = $this->mquyen->getList();

        $jsonString = json_encode($data);
        echo $jsonString;
    }

    public function getidnhomquyen()
    {
        $id = $_POST['ma'];
        $data = $this->mquyen->getList();

        $query = "SELECT * FROM quyen_nhomquyen JOIN quyen ON quyen_nhomquyen.Q_MA = quyen.Q_MA JOIN nhomquyen ON quyen_nhomquyen.NQ_MA = nhomquyen.NQ_MA";
        $data1 = $this->mquyen->gettimkiem($query);

        $response = array('data' => $data,'data1' => $data1);
        $jsonString = json_encode($response);
        echo $jsonString;
    }

    public function data0()
    {
        if (isset($_GET['update'])) // code update
        {
            $result = "0";
            $ma = $this->db->escape_like_str($_GET['Q_MA']);
            $ten = $this->db->escape_like_str($_GET['Q_TEN']);
            /*if(!$this->mquyen->testTen($ten))
            {*/
                $data = array(
                   "Q_MA" => $ma,
                   "Q_TEN" => $ten
                );
                if($this->mquyen->update($ma, $data))
                {
                    $result = "1";
                }
            /*}*/
            echo $result;
        }
        else
        {
            $pagenum = $_GET['pagenum'];
            $pagesize = $_GET['pagesize'];
            $start = $pagenum * $pagesize;
            $where = "";
            $sort = "";
            $total_rows = $this->mquyen->countAll();
            
            $query = $where." LIMIT $start, $total_rows";
            $table = $this->mquyen->getList2($query);

            if (isset($_GET['sortdatafield'])) // code sap xep
            {
                $sortfield = $_GET['sortdatafield'];
                $sortorder = $_GET['sortorder'];
                
                if ($sortfield != NULL)
                {
                    
                    if ($sortorder == "desc")
                    {
                        /*$query = "SELECT * FROM tinh ORDER BY" . " " . $sortfield . " DESC LIMIT $start, $pagesize";*/
                        $sort = " ORDER BY ".$sortfield." DESC ";
                    }
                    else if ($sortorder == "asc")
                    {
                        /*$query = "SELECT * FROM tinh ORDER BY" . " " . $sortfield . " ASC LIMIT $start, $pagesize";*/
                        $sort = " ORDER BY ".$sortfield." ASC ";
                    }
                    /*$table = $this->mtinh->getList2($query);*/            
                }
            }
            else
            {
                /* code neu khong tim thay du lieu */
            }

            if (isset($_GET['filterscount'])) // code tim kiem
            {
                $filterscount = $_GET['filterscount'];
                
                if ($filterscount > 0)
                {
                    $where = " WHERE (";
                    $tmpdatafield = "";
                    $tmpfilteroperator = "";
                    for ($i=0; $i < $filterscount; $i++)
                    {
                        // get the filter's value.
                        $filtervalue = $_GET["filtervalue" . $i];
                        // get the filter's condition.
                        $filtercondition = $_GET["filtercondition" . $i];
                        // get the filter's column.
                        $filterdatafield = $_GET["filterdatafield" . $i];
                        // get the filter's operator.
                        $filteroperator = $_GET["filteroperator" . $i];
                        
                        if ($tmpdatafield == "")
                        {
                            $tmpdatafield = $filterdatafield;           
                        }
                        else if ($tmpdatafield <> $filterdatafield)
                        {
                            $where .= ")AND(";
                        }
                        else if ($tmpdatafield == $filterdatafield)
                        {
                            if ($tmpfilteroperator == 0)
                            {
                                $where .= " AND ";
                            }
                            else $where .= " OR ";  
                        }
                        
                        // build the "WHERE" clause depending on the filter's condition, value and datafield.
                        switch($filtercondition)
                        {
                            case "CONTAINS":
                                $where .= " " . $filterdatafield . " LIKE '%" . $filtervalue ."%'";
                                break;
                            case "DOES_NOT_CONTAIN":
                                $where .= " " . $filterdatafield . " NOT LIKE '%" . $filtervalue ."%'";
                                break;
                            case "EQUAL":
                                $where .= " " . $filterdatafield . " = '" . $filtervalue ."'";
                                break;
                            case "NOT_EQUAL":
                                $where .= " " . $filterdatafield . " <> '" . $filtervalue ."'";
                                break;
                            case "GREATER_THAN":
                                $where .= " " . $filterdatafield . " > '" . $filtervalue ."'";
                                break;
                            case "LESS_THAN":
                                $where .= " " . $filterdatafield . " < '" . $filtervalue ."'";
                                break;
                            case "GREATER_THAN_OR_EQUAL":
                                $where .= " " . $filterdatafield . " >= '" . $filtervalue ."'";
                                break;
                            case "LESS_THAN_OR_EQUAL":
                                $where .= " " . $filterdatafield . " <= '" . $filtervalue ."'";
                                break;
                            case "STARTS_WITH":
                                $where .= " " . $filterdatafield . " LIKE '" . $filtervalue ."%'";
                                break;
                            case "ENDS_WITH":
                                $where .= " " . $filterdatafield . " LIKE '%" . $filtervalue ."'";
                                break;
                        }
                                        
                        if ($i == $filterscount - 1)
                        {
                            $where .= ")";
                        }
                        
                        $tmpfilteroperator = $filteroperator;
                        $tmpdatafield = $filterdatafield;           
                    }
                    // build the query.
                
                    /*$query = "SELECT * FROM tinh ".$where." LIMIT $start, $total_rows";
                    $table = $this->mtinh->getList2($query);*/          
                }
            }

            $query = $where." ".$sort." LIMIT $start, $total_rows";
            $table = $this->mquyen->getList2($query);
             
            $data[] = array(
               'TotalRows' => $total_rows,
               'Rows' => $table
            );
            echo json_encode($data);
        }
    }

    public function delete()
    {
        $ma = $_POST["ma"];
        $msg = array();
        $status = "error";
        $error = "";

        if(!($this->mquyen->testMa($ma)))
        {
            $error = lang('code_does_not_exist');
        }

        if($this->mquyen->quyennhomquyen($ma))
        {
            $error .= lang('have_data_relating_to_the_table')." \"QUYEN_NHOMQUYEN\".";
        }

        if($error == "")
        {
            $this->mquyen->delete($ma);
            $status = "success";      
        }
        else
        {
            $msg["error"] = $error;
        }

        $response = array('status' => $status,'msg' => $msg);
        $jsonString = json_encode($response);
        echo $jsonString;
    }
}