<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Thunghiem extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('mtinh');
	}

	public function index1()
	{
       	/*$this->load->view('gmaps/thunghiem_view');*/
       	$this->load->library('googlemaps');
       	$vitri = "can tho";

		$config['center'] = $vitri;
		$config['zoom'] = 'auto';
		$config['places'] = TRUE;
		$config['placesAutocompleteInputID'] = 'myPlaceTextBox';
		$config['placesAutocompleteBoundsMap'] = TRUE; // set results biased towards the maps viewport
		$config['placesAutocompleteOnChange'] = "

			var place = placesAutocomplete.getPlace();
			map.setCenter(place.geometry.location);
		    map.setZoom(15);
		    markers_map[0].setPosition(place.geometry.location);
		    markers_map[0].setVisible(true);

			/*markers_map[0].setVisible(false);
		    var place = placesAutocomplete.getPlace();
		    if (!place.geometry) {
		      return;
		    }

		    if (place.geometry.viewport) {
		      map.fitBounds(place.geometry.viewport);
		      map.setZoom(15);
		    } else {
		      map.setCenter(place.geometry.location);
		      map.setZoom(15);
		    }

		    markers_map[0].setPosition(place.geometry.location);
		    markers_map[0].setVisible(true);

		    var address = '';
		    if (place.address_components) {
		      address = [
		        (place.address_components[0] && place.address_components[0].short_name || ''), (place.address_components[1] && place.address_components[1].short_name || ''), (place.address_components[2] && place.address_components[2].short_name || '')
		      ].join(' ');
		    }*/

		";
		$this->googlemaps->initialize($config);

		$marker = array();
		$marker['position'] = '10.021555, 105.764830';
		$marker['draggable'] = TRUE;
		$marker['animation'] = 'DROP';
		$marker['icon'] = base_url().'/assets/images/movelocal.png';
		$marker['onmouseup'] = " 

			/*alert(event.latLng.lat() + ' , ' + event.latLng.lng());*/ 
			var lat = event.latLng.lat();
			var lng = event.latLng.lng();

			document.getElementById('lat').value = lat;
			document.getElementById('lng').value = lng;

		";
		$this->googlemaps->add_marker($marker);

		$data['map'] = $this->googlemaps->create_map();

		$this->load->view('gmaps/thunghiem_view', $data);
	}

	public function index()
	{
		//$this->lang->load("vi", "vietnamese");
		//$this->lang->load("en", "english");
		$this->load->view('gmaps/thunghiem_view');
	}

	public function data()
	{
		if (isset($_GET['update']))
		{
			// UPDATE COMMAND 
			/*$update_query = "UPDATE `employees` SET `FirstName`='".$_GET['FirstName']."',
			`LastName`='".$_GET['LastName']."',
			`Title`='".$_GET['Title']."',
			`Address`='".$_GET['Address']."',
			`City`='".$_GET['City']."',
			`Country`='".$_GET['Country']."',
			`Notes`='".$_GET['Notes']."' WHERE `EmployeeID`='".$_GET['EmployeeID']."'";
			 $result = mysql_query($update_query) or die("SQL Error 1: " . mysql_error());*/
			$ma = $_GET['T_MA'];
			$ten = $_GET['T_TEN'];
			$data = array(
               "T_MA" => $ma,
               "T_TEN" => $ten
            );
			$result = "0";
            if($this->mtinh->update($ma, $data))
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
			$total_rows = $this->mtinh->countAll();
			
			$query = "SELECT * FROM tinh ".$where." LIMIT $start, $total_rows";
			$employees = $this->mtinh->getList2($query);

			if (isset($_GET['sortdatafield']))
			{
				$sortfield = $_GET['sortdatafield'];
				$sortorder = $_GET['sortorder'];
				/*$result = mysql_query($query) or die("SQL Error 1: " . mysql_error());
				$sql = "SELECT FOUND_ROWS() AS `found_rows`;";
				$rows = mysql_query($sql);
				$rows = mysql_fetch_assoc($rows);
				$total_rows = $rows['found_rows'];*/
				
				if ($sortfield != NULL)
				{
					
					if ($sortorder == "desc")
					{
						$query = "SELECT * FROM tinh ORDER BY" . " " . $sortfield . " DESC LIMIT $start, $pagesize";
						$sort = " ORDER BY ".$sortfield." DESC ";
					}
					else if ($sortorder == "asc")
					{
						$query = "SELECT * FROM tinh ORDER BY" . " " . $sortfield . " ASC LIMIT $start, $pagesize";
						$sort = " ORDER BY ".$sortfield." ASC ";
					}
					/*$employees = $this->mtinh->getList2($query);*/			
					/*$result = mysql_query($query) or die("SQL Error 1: " . mysql_error());*/
				}
			}
			else
			{
				/*$result = mysql_query($query) or die("SQL Error 1: " . mysql_error());
				$sql = "SELECT FOUND_ROWS() AS `found_rows`;";
				$rows = mysql_query($sql);
				$rows = mysql_fetch_assoc($rows);
				$total_rows = $rows['found_rows'];	*/
			}

			if (isset($_GET['filterscount']))
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
					/*$result = mysql_query($query) or die("SQL Error 1: " . mysql_error());
					$sql = "SELECT FOUND_ROWS() AS `found_rows`;";
					$rows = mysql_query($sql);
					$rows = mysql_fetch_assoc($rows);
					$total_rows = $rows['found_rows'];*/
				
					/*$query = "SELECT * FROM tinh ".$where." LIMIT $start, $total_rows";
					$employees = $this->mtinh->getList2($query);*/			
				}
			}

			/*$query = "SELECT SQL_CALC_FOUND_ROWS * FROM employees LIMIT $start, $pagesize";
			$result = mysql_query($query) or die("SQL Error 1: " . mysql_error());
			$sql = "SELECT FOUND_ROWS() AS `found_rows`;";
			$rows = mysql_query($sql);
			$rows = mysql_fetch_assoc($rows);
			$total_rows = $rows['found_rows'];
			
			while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
				$employees[] = array(
					'EmployeeID' => $row['EmployeeID'],
					'FirstName' => $row['FirstName'],
					'LastName' => $row['LastName'],
					'Title' => $row['Title'],
					'Address' => $row['Address'],
					'City' => $row['City'],
					'Country' => $row['Country'],
					'Notes' => $row['Notes']
				  );
			}*/

			$query = "SELECT * FROM tinh ".$where." ".$sort." LIMIT $start, $total_rows";
			$employees = $this->mtinh->getList2($query);
			
			 
			$data[] = array(
			   'TotalRows' => $total_rows,
			   'Rows' => $employees
			);
			echo json_encode($data);
		}
	}
}