<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Huyen extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("mhuyen");
    }

    public function index()
    {
        $this->_data['subview'] = 'admin/huyen_view';
        $this->_data['title'] = lang('district');
        $this->_data['info'] = $this->mhuyen->getList();
        $this->load->view('main.php', $this->_data);
    }

    public function add()
    {
        $tentinh = $_POST["T_TEN"];
        $ma = $_POST["H_MA"];
        $ten = $_POST['H_TEN'];
        $status = "error";
        $error = "";
        $msg = array();

        $this->load->model("mtinh");
        $tinh = $this->mtinh->getma($tentinh);
        $matinh = $tinh["T_MA"];

        $data = array(
            "T_MA" => $matinh,
            "H_MA" => $ma,
            "H_TEN" => $ten,
        );

        if($this->mhuyen->testMa($ma))
        {
            $error = lang("code_already_exists");
        }

        if($error == "")
        {
            $this->mhuyen->insert($data);
            $status = "success";
        }
        else
        {
            $msg["error"] = $error;
        }

        $response = array('status' => $status,'msg' => $msg,'data' => $data);
        $jsonString = json_encode($response);
        echo $jsonString;
    }

    public function data($id)
    {
        $data = $this->mhuyen->getid($id);
        if(!($data))
        {
            $arrayName = array('0' => "Không có huyện", );
            $data = $arrayName;
        }

        $jsonString = json_encode($data);
        echo $jsonString;
    }

    public function data0()
    {
        if (isset($_GET['update'])) // code update
        {
            $result = "0";
            $ma = $_GET['H_MA'];
            $ten = $_GET['H_TEN'];
            $data = array(
               "H_MA" => $ma,
               "H_TEN" => $ten
            );
            if($this->mhuyen->update($ma, $data))
            {
                $result = "1";
            }
            echo $result;
        }
        else
        {
            $pagenum = $_GET['pagenum'];
            $pagesize = $_GET['pagesize'];
            $start = $pagenum * $pagesize;
            $where = "";
            $sort = "";
            $total_rows = $this->mhuyen->countAll();
            
            $query = $where." LIMIT $start, $total_rows";
            $table = $this->mhuyen->getList2($query);

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

            $query2 = $where." ";
            $total_rows = $this->mhuyen->countAll2($query2);

            $query = $where." ".$sort." LIMIT $start, $total_rows";
            $table = $this->mhuyen->getList2($query);
             
            $data[] = array(
               'TotalRows' => $total_rows,
               'Rows' => $table
            );
            echo json_encode($data);
        }
    }

    public function data1()
    {
        $data = $this->mhuyen->getList();

        $jsonString = json_encode($data);
        echo $jsonString;
    }

    public function data2()
    {
        $matinh = "1";
        if(isset($this->session->userdata['T_MA']))
        {
            $matinh = $this->session->userdata['T_MA'];
        }

        $data = $this->mhuyen->getid($matinh);

        $jsonString = json_encode($data);
        echo $jsonString;
    }

    public function delete()
    {
        //$matinh = $_POST["T_MA"];
        $ma = $_POST["ma"];
        $msg = array();
        $status = "error";
        $error = "";

        if(!($this->mhuyen->testMa($ma)))
        {
            $error = lang('code_does_not_exist');
        }

        if($this->mhuyen->huyenxa($ma))
        {
            $error .= lang('have_data_relating_to_the_table')." \"HUYEN\".";
        }

        if($this->mhuyen->huyendiadiem($ma))
        {
            $error .= lang('have_data_relating_to_the_table')." \"DIADIEM\".";
        }

        if($this->mhuyen->huyennguoidung($ma))
        {
            $error .= lang('have_data_relating_to_the_table')." \"NGUOIDUNG\".";
        }

        if($error == "")
        {
            $this->mhuyen->delete($ma);
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