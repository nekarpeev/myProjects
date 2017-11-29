<?php
  header('Content-Type: text/html; charset=utf-8');

    $rooms = [];
    $array_where_in = [];
    $type_filter;
    
    if(!empty($_GET['floor-filter'])) {
    $floor = $_GET['floor-filter'];
    //print_r($floor);
    }
    else {
      $floor = 2;
    }
    
    //---------------------------default value---------------------------------
    //-------------------------------------------------------------------------
    
    $sql = "SELECT * FROM modx_odette_sheets_api";
    $placeholders = [':floor' => $floor];
    //$placeholders = [':type' => $type, ':floor' => $floor];
    $where = ["floor = :floor"];
    
    if(!empty($_GET['type_filter'])) {
      $type = $_GET['type_filter'];
      $where[] = "type = :type";
        $placeholders[':type'] = $type;
    }
    else {
      $type = '';
    }
    
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
        
  // echo '<br>';
  // print_r($sql);
  // echo '<br>';
  // print_r($placeholders);

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

  $tpl = isset( $tpl ) ? $tpl : 'roomsTpl';
  $j = 0;
  $min = [];

  function getInteger($int_val) {
  $price_filter=str_replace(",",'.', $int_val);
  $price_filter=preg_replace("/[^x\d|*\.]/","",$price_filter);
  $price_filter = intval($price_filter);
  return $price_filter;
  }
    $type_filter;
  foreach($data_arr as $val) {
  if($j == $limit) {
  break;
  }
  
  if($val['status'] == 'Не продавать') {
    $val['status'] = 'Забронировано';
  }
    
  if($val['type'] === 'Апартаменты') {
    $type_filter = 'id-appart-';
    $img_type_filter = 'a-';
  }
  // elseif($val['type'] === 'офис') {
  //  $type_filter = 'id-office-';
  //  $img_by_layout = 'assets/app/img/rooms-img/o-' . $val['number'] . '.jpg';
  // }
  elseif($val['type'] === 'паркинг') {
    $type_filter = 'id-parking-';
    $img_type_filter = 'p-';
  }
  
  $img_by_layout = 'assets/app/img/rooms-img/' . $val['layout'] . '-min.png';
  
  if($val['type'] === 'офис') {
    $type_filter = 'id-office-';
    $img_by_layout = 'assets/app/img/rooms-img/o-' . $val['number'] . '.jpg';
  }
  
  $placeholders = array(
  'number' => $val['number'],
  'floor' => $val['floor'],
  'img_by_layout' => $img_by_layout,
  'type' => $val['type'],
  'rooms' => $val['rooms'],
  'area' => $val['area'],
  'area' => $val['area'],
  'areakitchen' => $val['area_kitchen'],
  'price' => $val['price'],
  'status' => $val['status'],
  'type_filter' => $type_filter,
  );

  $output = $modx->parseChunk($tpl, $placeholders);
  print_r($output);
  $j++;


  }