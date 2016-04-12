<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Xa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("mxa");
    }

    public function index()
    {
        /*$this->_data['subview'] = 'admin/xa_view';
        $this->_data['title'] = lang('town');
        if(isset($this->session->userdata['T_MA']))
        {
            $matinh = $this->session->userdata['T_MA'];
            $this->load->model("mtinh");
            $query = $this->mtinh->getList();
            $i = -1;
            if($query != false)
            {
                foreach ($query as $item) {
                    $i++;
                    if($matinh == $item["T_MA"])
                    {
                        $this->_data['indextinh'] = $i;
                    }
                }
            }
        }
        $this->load->view('main.php', $this->_data);*/

        $this->load->model("mquyen");
        $email = $this->session->userdata["email"];
        if($this->mquyen->testquyen($email, "3"))
        {
            $this->_data['subview'] = 'admin/xa_view';
            $this->_data['title'] = lang('town');
            if(isset($this->session->userdata['T_MA']))
            {
                $matinh = $this->session->userdata['T_MA'];
                $this->load->model("mtinh");
                $query = $this->mtinh->getList();
                $i = -1;
                if($query != false)
                {
                    foreach ($query as $item) {
                        $i++;
                        if($matinh == $item["T_MA"])
                        {
                            $this->_data['indextinh'] = $i;
                        }
                    }
                }
            }
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
        $tenhuyen = $_POST["H_TEN"];
        $ma = $_POST["X_MA"];
        $ten = $_POST['X_TEN'];
        $status = "error";
        $error = "";
        $msg = array();

        if(isset($this->session->userdata['T_MA']))
        {
            $matinh = $this->session->userdata['T_MA'];
        }
        else
        {
            $error = lang('please_input')." ".lang('town');
        }

        $this->load->model("mhuyen");
        $huyen = $this->mhuyen->getma($matinh, $tenhuyen);
        $mahuyen = $huyen["H_MA"];

        $data = array(
            "T_MA" => $matinh,
            "H_MA" => $mahuyen,
            //"X_MA" => $ma,
            "X_TEN" => $ten
        );
        
        /*if($this->mxa->testMa($matinh, $mahuyen, $ma))
        {
            $error .= lang("code_already_exists");
        }*/

        if($error == "")
        {
            $this->mxa->insert($data);
            $status = "success";
        }
        else
        {
            $msg["error"] = $error;
        }

        $response = array('status' => $status,'msg' => $msg,'data' => $data, 'add' => "0");
        $jsonString = json_encode($response);
        echo $jsonString;
    }

    public function data($matinh, $mahuyen)
    {

        $data = $this->mxa->getid($matinh, $mahuyen);

        //$data["tinh"] = $matinh;
        //$data["huyen"] = $mahuyen;

        $jsonString = json_encode($data);
        echo $jsonString;
    }

    public function chontinh($matinh, $tentinh)
    {
        $data = array( 
            'T_MA' => $matinh,
            'T_TEN' => $tentinh,
        );
        $this->session->set_userdata($data);
        redirect(site_url('xa'), 'refresh');
    }

    public function data0()
    {
        $matinh = "0";
        if(isset($this->session->userdata['T_MA']))
        {
            $matinh = $this->session->userdata['T_MA'];
        }
        if (isset($_POST['update'])) // code update
        {
            $ma = $_POST['X_MA'];
            $ten = $_POST['X_TEN'];
            $status = "error";
            $msg = array();

            $data = array(
                "X_MA" => $ma,
                "X_TEN" => $ten
            );
            if($this->mxa->update($ma, $data))
            {
                $status = "success";
            }
            $response = array('status' => $status,'msg' => $msg,'data' => $data);
            $jsonString = json_encode($response);
            echo $jsonString;
        }
        else
        {
            $pagenum = $_GET['pagenum'];
            $pagesize = $_GET['pagesize'];
            $start = $pagenum * $pagesize;
            $where = "";
            $sort = "";
            $total_rows = $this->mxa->countAll();
            
            $query = $where." LIMIT $start, $total_rows";
            $table = $this->mxa->getList2($query);

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
                    $where = " WHERE xa.T_MA = '".$matinh."' AND (";
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
                }
                else
                {
                    $where = " WHERE xa.T_MA = '".$matinh."'";
                }
            }

            $query2 = $where." ";
            $total_rows = $this->mxa->countAll2($query2);

            $query = $where." ".$sort." LIMIT $start, $total_rows";
            $table = $this->mxa->getList2($query);
             
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

        if(!($this->mxa->testMa($ma)))
        {
            $error = lang('code_does_not_exist');
        }

        if($this->mxa->xadiadiem($ma))
        {
            $error .= lang('have_data_relating_to_the_table')." \"DIADIEM\". <br/>";
        }

        if($this->mxa->xanguoidung($ma))
        {
            $error .= lang('have_data_relating_to_the_table')." \"NGUOIDUNG\".";
        }

        if($error == "")
        {
            $this->mxa->delete($ma);
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