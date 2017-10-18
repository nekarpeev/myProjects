	<?php
	header('Content-Type: text/html; charset=utf-8');

	// $floor;
	// $type;
	// $chek;
	// $limit;
	// $rooms = intval($rooms);
	// $price_max = intval($price_max);
	// $price_min = intval($price_min);
	// $area_max = intval($area_max);
	// $area_min = intval($area_min);
		$rooms = [];
		$array_where_in = [];
		
		if(!empty($_GET['floor-filter'])) {
			$floor = $_GET['floor-filter'];
		}
		else {
			$floor = 2;
		}
		if(!empty($_GET['type_filter'])) {
			$type = $_GET['type_filter'];
		}
		else {
			$type = 'Апартаменты';
		}
		
		
					//---------------------------default value---------------------------------
					//-------------------------------------------------------------------------
			$sql = "SELECT * FROM modx_odette_sheets_api";
			$placeholders = [':type' => $type, ':floor' => $floor];
			$where = ["type = :type AND floor = :floor"];
			
		
		
	if (!empty($_GET['rooms_1'])) {
		$rooms['rooms_1'] = $_GET['rooms_1'];
		$placeholders[':rooms_1'] = $rooms['rooms_1'];
		$array_where_in[] = ':rooms_1';
	}
	if (!empty($_GET['rooms_2'])) {
		$rooms['rooms_2'] = $_GET['rooms_2'];
		$placeholders[':rooms_2'] = $rooms['rooms_2'];
		$array_where_in[] = ':rooms_2';
	}
	if (!empty($_GET['rooms_3'])) {
		$rooms['rooms_3'] = $_GET['rooms_3'];
		$placeholders[':rooms_3'] = $rooms['rooms_3'];
		$array_where_in[] = ':rooms_3';
	}
	if (!empty($_GET['rooms_4'])) {
		$rooms['rooms_4'] = $_GET['rooms_4'];
		$placeholders[':rooms_4'] = $rooms['rooms_4'];
		$array_where_in[] = ':rooms_4';
	}
		if(!empty($rooms)) {
		$array_where_in = implode(", ", $array_where_in);
		$where[] = "rooms IN ($array_where_in)";
	}
	
	if (!empty($_GET['status'])) {
		$status_free = 'Свободно';
		print_r($status_free);
	    $where[] = "status = :status_free";
	    $placeholders[':status_free'] = $status_free;
	    //$where = implode(" AND ", $where);
	}
	if (!empty($_GET['price-filter'])) {
		
		$price = $_GET['price-filter'];
	    $price = explode(';', $price);
	    $price_min = $price[0];
	    $price_max = $price[1];
	    $price_min = intval($price_min);
	    $price_max = intval($price_max);
		
	    $where[] = "price_filter BETWEEN :price_min";
	    $where[] = ":price_max";
	    $placeholders[':price_max'] = $price_max;
	    $placeholders[':price_min'] = $price_min;
	    //$where = implode(" AND ", $where);
	}
	if (!empty($_GET['area-filter'])) {

	    $area = $_GET['area-filter'];
	    $area = explode(';', $area);
	    $area_min = $area[0];
	    $area_max = $area[1];
	    $area_min = intval($area_min);
	    $area_max = intval($area_max);
	    
	    $where[] = "area_filter BETWEEN :area_min";
	    $where[] = ":area_max";
	    $placeholders[':area_max'] = $area_max;
	    $placeholders[':area_min'] = $area_min;
	}


	

	$where = implode(" AND ", $where);
	$sql .= " WHERE " . $where;
	
	
			//---------------------------sort by---------------------------------
			//-------------------------------------------------------------------------
			
		if(!empty($_GET['sort_filter'])) {
			
			if($_GET['sort_filter'] === 'price_asc') {
				$sql .= " ORDER BY price_filter ASC";	
			}
			if($_GET['sort_filter'] === 'price_desc') {
				$sql .= " ORDER BY price_filter DESC";	
			}
			if($_GET['sort_filter'] === 'area_asc') {
				$sql .= " ORDER BY area_filter ASC";	
			}
			if($_GET['sort_filter'] === 'area_desc') {
				$sql .= " ORDER BY area_filter DESC";	
			}
			
		}

		else {
			
			$sql .= " ORDER BY number ASC";
			
		}
				
	echo '<br>';
	print_r($sql);
	echo '<br>';
	print_r($placeholders);

		

			//---------------------------request for DB---------------------------------
			//-------------------------------------------------------------------------
	$results = $modx->prepare($sql);
	$results->execute($placeholders);

	$data_arr = [];
	$i = 0;
	while ($row = $results->fetch(PDO::FETCH_ASSOC)) {

	    $data_arr[$i] = $row;
	    $i++;
	}
	?> <pre> <? //print_r($data_arr); ?> </pre>  <?


	$tpl = isset( $tpl ) ? $tpl : 'roomsTpl';
	$j = 0;
	$min = [];

	function getInteger($int_val) {
	$cena=str_replace(",",'.', $int_val);
	$cena=preg_replace("/[^x\d|*\.]/","",$cena);
	$cena = intval($cena);
	return $cena;
	}

	foreach ($data_arr as $val) {
	// $min[$j] = trim($val['price'], ',');
	//echo gettype($val['price']);



	}
	//print_r($min);
	//$min = asort($min, SORT_NUMERIC);
	//print_r($min);
	//echo '<br>';
	//print_r(max($min));

	foreach($data_arr as $val) {
	if($j == $limit) {
	break;
	}
	$int_val = $val['price'];
	$cena = getInteger($int_val);
	$placeholders = array(
	'number' => $val['number'],
	'floor' => $val['floor'],
	'type' => $val['type'],
	'rooms' => $val['rooms'],
	'area' => $val['area'],
	'areakitchen' => $val['area_kitchen'],
	'price' => $val['price'],
	'price_filter' => $cena,
	'status' => $val['status'],
	);

	$output = $modx->parseChunk($tpl, $placeholders);
	print_r($output);
	$j++;


	}