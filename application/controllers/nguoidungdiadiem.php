<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Nguoidungdiadiem extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("mnguoidungdiadiem");
	}

	public function checkin()
	{
		$ND_MA = $this->session->userdata('id');
		$DD_MA = $_POST["DD_MA"];
		$NDDD_DADEN = $_POST['NDDD_DADEN'];

		$msg = array();
		$status = "error";

		$data = array(
            "ND_MA" => $ND_MA,
       		"DD_MA" => $DD_MA,
       		"NDDD_DADEN" => $NDDD_DADEN
        );


		if($this->mnguoidungdiadiem->testMa($ND_MA, $DD_MA))
		{
			$this->mnguoidungdiadiem->update($ND_MA, $DD_MA, $data);
			$status = "success";
		}
		else
		{
			$this->mnguoidungdiadiem->insert($data);
			$status = "success";
		}

		$msg['count'] = $this->mnguoidungdiadiem->countcheckin($DD_MA); // dem so luong check in

        $response = array('status' => $status,'msg' => $msg,'data' => $data);
		$jsonString = json_encode($response);
        echo $jsonString;
	}

	public function yeuthich()
	{
		$ND_MA = $this->session->userdata('id');
		$DD_MA = $_POST["DD_MA"];
		$NDDD_YEUTHICH = $_POST['NDDD_YEUTHICH'];

		$msg = array();
		$status = "error";

		$data = array(
            "ND_MA" => $ND_MA,
       		"DD_MA" => $DD_MA,
       		"NDDD_YEUTHICH" => $NDDD_YEUTHICH
        );


		if($this->mnguoidungdiadiem->testMa($ND_MA, $DD_MA))
		{
			$this->mnguoidungdiadiem->update($ND_MA, $DD_MA, $data);
			$status = "success";
		}
		else
		{
			$this->mnguoidungdiadiem->insert($data);
			$status = "success";
		}

		$msg['count'] = $this->mnguoidungdiadiem->countyeuthich($DD_MA); // dem so luong yeu thich

        $response = array('status' => $status,'msg' => $msg,'data' => $data);
		$jsonString = json_encode($response);
        echo $jsonString;
	}

	public function muonden()
	{
		$ND_MA = $this->session->userdata('id');
		$DD_MA = $_POST["DD_MA"];
		$NDDD_MUONDEN = $_POST['NDDD_MUONDEN'];

		$msg = array();
		$status = "error";

		$data = array(
            "ND_MA" => $ND_MA,
       		"DD_MA" => $DD_MA,
       		"NDDD_MUONDEN" => $NDDD_MUONDEN
        );


		if($this->mnguoidungdiadiem->testMa($ND_MA, $DD_MA))
		{
			$this->mnguoidungdiadiem->update($ND_MA, $DD_MA, $data);
			$status = "success";
		}
		else
		{
			$this->mnguoidungdiadiem->insert($data);
			$status = "success";
		}

		$msg['count'] = $this->mnguoidungdiadiem->countmuonden($DD_MA); // dem so luong muon den

        $response = array('status' => $status,'msg' => $msg,'data' => $data);
		$jsonString = json_encode($response);
        echo $jsonString;
	}
}