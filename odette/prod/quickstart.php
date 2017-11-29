<!DOCTYPE html>
<html lang="en">
        <head>
            <meta charset="UTF-8">
            <title>title</title>
        </head>
    <body>

<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require_once __DIR__ . '/vendor/autoload.php';

define('APPLICATION_NAME', 'Google Sheets API PHP Quickstart');
define('CREDENTIALS_PATH', __DIR__ . '/token.json');
define('CLIENT_SECRET_PATH', __DIR__ . '/client_secret.json');
// If modifying these scopes, delete your previously saved credentials
// at ~/.credentials/sheets.googleapis.com-php-quickstart.json
define('SCOPES', implode(' ', array(
  Google_Service_Sheets::SPREADSHEETS_READONLY)
));

/*
if (php_sapi_name() != 'cli') {
  throw new Exception('This application must be run on the command line.');
}
*/

/**
 * Returns an authorized API client.
 * @return Google_Client the authorized client object
 */
function getClient() {
  $client = new Google_Client();
  $client->setApplicationName(APPLICATION_NAME);
  $client->setScopes(SCOPES);
  $client->setAuthConfig(CLIENT_SECRET_PATH);
  $client->setAccessType('offline');

  // Load previously authorized credentials from a file.
  $credentialsPath = expandHomeDirectory(CREDENTIALS_PATH);
  if (file_exists($credentialsPath)) {
    $accessToken = json_decode(file_get_contents($credentialsPath), true);
  } else {
    // Request authorization from the user.
    $authUrl = $client->createAuthUrl();
    printf("Open the following link in your browser:\n%s\n", $authUrl);
    print 'Enter verification code: ';
    $authCode = trim(fgets(STDIN));

    // Exchange authorization code for an access token.
    $accessToken = $client->fetchAccessTokenWithAuthCode($authCode);

    // Store the credentials to disk.
    if(!file_exists(dirname($credentialsPath))) {
      mkdir(dirname($credentialsPath), 0700, true);
    }
    file_put_contents($credentialsPath, json_encode($accessToken));
    printf("Credentials saved to %s\n", $credentialsPath);
  }
  $client->setAccessToken($accessToken);

   // Refresh the token if it's expired.
  if ($client->isAccessTokenExpired()) {
      
    $refresh_token = $accessToken['refresh_token'];
    $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
    $new_token = $client->getAccessToken();
    if(!isset($new_token['refresh_token'])) {
        $new_token['refresh_token'] = $refresh_token;
    }
    file_put_contents($credentialsPath, json_encode($new_token));
  }
  return $client;
}

/**
 * Expands the home directory alias '~' to the full path.
 * @param string $path the path to expand.
 * @return string the expanded path.
 */
function expandHomeDirectory($path) {
  $homeDirectory = getenv('HOME');
  if (empty($homeDirectory)) {
    $homeDirectory = getenv('HOMEDRIVE') . getenv('HOMEPATH');
  }
  return str_replace('~', realpath($homeDirectory), $path);
}

// Get the API client and construct the service object.
$client = getClient();
$service = new Google_Service_Sheets($client);

// Prints the names and majors of students in a sample spreadsheet:
// https://docs.google.com/spreadsheets/d/1BxiMVs0XRA5nFMdKvBdBZjgmUUqptlbs74OgvE2upms/edit
$spreadsheetId = '1NN4rxlpV6b-keNqVHm5gVFejwxNHXX8Jeua-pyY-pxQ';
//$range = 'O1:FL';
$range = 'Odette (Батурина)!B2:FL';
/*
$sheetId = '432750555';
$params = array(
  'ranges' => $range,
  'majorDimension' => 'ROWS'
);
*/
$response = $service->spreadsheets_values->get($spreadsheetId, $range);

//$resp = $service->spreadsheets->get($spreadsheetId, $sheets);

$values = $response->getValues();
//$response = $service->spreadsheets_values->batchGet($spreadsheetId, $params);

//$values = $response; 

//новый 1NN4rxlpV6b-keNqVHm5gVFejwxNHXX8Jeua-pyY-pxQ
//старый 1BxiMVs0XRA5nFMdKvBdBZjgmUUqptlbs74OgvE2upms
    //delete title row
    //unset($values[0]);

if (count($values) == 0) {
  print "No data found.\n";
} else {
  print "Name, Major:\n";
  $array = [];
  $data_array = [];
  $i = 0;
  
  foreach ($values as $row) {

      $array[$i] = $row;
      
      ?> <pre> <? //print_r($array); ?> </pre> <?
      
      foreach($array[$i] as $key => $val) {
              
          if($key == 0) {
              $prom_val['type'] = $val;
          }
          if($key == 2) {
              $prom_val['layout'] = $val;
          }
          if($key == 3) {
              if($val !== 0) {
              $prom_val['number'] = $val;
              }
          }
          if($key == 4) {
              $prom_val['floor'] = $val;
          }
          if($key === 6) {
              $prom_val['rooms'] = $val;
          }
          if($key === 7) {
              $prom_val['area'] = $val;
          }
          if($key === 8) {
              $prom_val['area_kitchen'] = $val;
          }
          if($key === 10) {
              $prom_val['price'] = $val;
          }
          if($key === 13) {
              $prom_val['status'] = $val;
          }
          
          $data_array[$i] = $prom_val;
          
      }
      
      $i++;
  }

      ?> <pre> <? //print_r($data_array); ?> </pre> <?
   
}


    //insertInto($data_array);
        
    update($data_array);
    
    function getLayout($data_array) {
        
    
    
        $replace = ['/А/', '/Б/', '/В/', '/Г/', '/Д/'];
        $pattern = ['a', 'b', 'v', 'g', 'd'];
    
    
        foreach($data_array as $key => &$val) { 
            
            if(!empty($val['layout']) and $val['type'] !== 'паркинг') {
                
                $true_layout = preg_replace($replace, $pattern, $val['layout']); 
                
                $super_true_layout = $val['floor'] . '-'. $true_layout;
                
            }
               $val['layout'] = $super_true_layout;
        }
        
        ?> <pre> <? //print_r($data_array); ?> </pre> <?
        
        return $data_array;
    }

    

    function getPriceInt($int_price = '', $int_area = '') {
                        
                        if(!empty($int_price)) {
        					$cena=str_replace(",",'.', $int_price);
        					$cena=preg_replace("/[^x\d|*\.]/","",$cena);
        					$int_price = intval($cena);
        					return $int_price;
                        }
                        elseif(!empty($int_area)) {
                            $cena=str_replace(",",'.', $int_area);
        				    $int_area = floatval($cena);
        					return $int_area;
                        }
    				}
    				
    				
        /**
         * 
         * main function
         * 
        */
        
    function insertInto($data_array) {
        
        getLayout($data_array);
            
       include_once 'db_config.php'; 
        
        if($db == false) {
            echo 'Baaaad';
        }
        else { 
            $db_array = [];
            $i = 0;
            $result = $db->query('SELECT * FROM `modx_odette_sheets_api`');
            $db->exec('SET NAMES utf8');
            
           while($row = $result->fetch(PDO::FETCH_ASSOC)) {
               $db_array[$i] = $row; 
               $i++;
           }
           
           //print_r($db_array);
            
            $j = 1;
            $arr = [];
            $val_end = [];
            
            
        foreach($data_array as $key => $val) {
      
                $arr[$j] = $val;
                $arr_end = $arr[$j];
                
                    //get price int
                $int_price = $arr_end['price'];
                $price_filter = getPriceInt($int_price);
                    
                    //get area int
                $int_area = $arr_end['area'];
                $area_filter = getPriceInt($int_area);
                
                    //get area_kitchen int
                $int_area = $arr_end['area_kitchen'];
                $area_kitchen_filter = getPriceInt($int_area); 
                
                $val_end['number'] = $arr_end['number'];
                $val_end['floor'] = $arr_end['floor'];
                $val_end['layout'] = $arr_end['layout'];
                $val_end['type']   = $arr_end['type'];
                $val_end['rooms'] = $arr_end['rooms'];
                $val_end['area'] = $arr_end['area'];
                $val_end['area_kitchen']   = $arr_end['area_kitchen'];
                $val_end['price'] = $arr_end['price'];
                $val_end['status'] = $arr_end['status'];
                $val_end['price_filter'] = $price_filter;
                $val_end['area_filter'] = $area_filter;
                $val_end['area_kitchen_filter'] = $area_kitchen_filter;
                
                ?> <pre> <? //print_r($val_end); ?> </pre> <?
                
                  // first char to uppercase
                  if(!empty($val_end['status'])) {
                      
                  $str = $val_end['status'];
                  $string = $str;
                  $char = mb_strtoupper(substr($string,0,2), "utf-8"); // это первый символ
                  $string[0] = $char[0];
                  $string[1] = $char[1];
                  $val_end['status'] =  $string;  
                  }  
                  
                  
                  
                /*check new data

                foreach($db_array as $db_val) {
                    
                    if($db_val['number'] == $val_end['number']) {
                        unset($data_array[$key]);
                    }
                    
                }
                */

                $result = $db->prepare('INSERT INTO `modx_odette_sheets_api`(number, floor, layout, type, rooms, area, area_kitchen, price, status, price_filter, area_filter, area_kitchen_filter) '
                . 'VALUES(:number, :floor, :layout, :type, :rooms, :area, :area_kitchen, :price, :status, :price_filter, :area_filter, :area_kitchen_filter)');
                
                $result->execute(array(
                ':number'   => $val_end['number'],
                ':floor'   => $val_end['floor'],
                ':layout'   => $val_end['layout'],
                ':type'     => $val_end['type'],
                ':rooms'   => $val_end['rooms'],
                ':area'   => $val_end['area'],
                ':area_kitchen'     => $val_end['area_kitchen'],
                ':price'   => $val_end['price'],
                ':status'   => $val_end['status'],
                ':price_filter'     => $val_end['price_filter'],
                ':area_filter'   => $val_end['area_filter'],
                ':area_kitchen_filter'   => $val_end['area_kitchen_filter']
              ));
              $j++;
                  
                }
                 ?> <pre> <? print_r($data_array); ?> </pre> <?
            }
        }    
    
    
    
        
        
        
        
    function update($data_array) {
        
        $data_array = getLayout($data_array);
            
       include_once 'db_config.php'; 
        
        if($db == false) {
            echo 'Baaaad';
        }
        else { 
            $db_array = [];
            $i = 0;
            $result = $db->query('SELECT * FROM `modx_odette_sheets_api`');
            $db->exec('SET NAMES utf8');
            
           while($row = $result->fetch(PDO::FETCH_ASSOC)) {
               $db_array[$i] = $row; 
               $i++;
           }
           
           //print_r($db_array);
            
            $j = 1;
            $arr = [];
            $val_end = [];
            
            
        foreach($data_array as $key => $val) {
      
                $arr[$j] = $val;
                $arr_end = $arr[$j];
                
                    //get price int
                $int_price = $arr_end['price'];
                $price_filter = getPriceInt($int_price);
                    
                    //get area int
                $int_area = $arr_end['area'];
                $area_filter = getPriceInt($int_area);
                
                    //get area_kitchen int
                $int_area = $arr_end['area_kitchen'];
                $area_kitchen_filter = getPriceInt($int_area); 
                
                $val_end['number'] = $arr_end['number'];
                $val_end['floor'] = $arr_end['floor'];
                $val_end['layout'] = $arr_end['layout'];
                $val_end['type']   = $arr_end['type'];
                $val_end['rooms'] = $arr_end['rooms'];
                $val_end['area'] = $arr_end['area'];
                $val_end['area_kitchen']   = $arr_end['area_kitchen'];
                $val_end['price'] = $arr_end['price'];
                $val_end['status'] = $arr_end['status'];
                $val_end['price_filter'] = $price_filter;
                $val_end['area_filter'] = $area_filter;
                $val_end['area_kitchen_filter'] = $area_kitchen_filter;
                
                
                  // first char to uppercase
                  if(!empty($val_end['status'])) {
                      
                  $str = $val_end['status'];
                  $string = $str;
                  $char = mb_strtoupper(substr($string,0,2), "utf-8"); // это первый символ
                  $string[0] = $char[0];
                  $string[1] = $char[1];
                  $val_end['status'] =  $string;  
                  }  
                  
                  
                  
                /*check new data

                foreach($db_array as $db_val) {
                    
                    if($db_val['number'] == $val_end['number']) {
                        unset($data_array[$key]);
                    }
                    
                }
                */
                
                $result = $db->prepare('UPDATE modx_odette_sheets_api SET number = :number, floor = :floor, layout = :layout, type = :type, rooms = :rooms, area = :area, area_kitchen = :area_kitchen, '
                . 'price = :price, status = :status, price_filter = :price_filter, area_filter = :area_filter, area_kitchen_filter = :area_kitchen_filter WHERE id = :id');
               
                $result->execute(array(
                ':id' => $j,    
                ':number'   => $val_end['number'],
                ':floor'   => $val_end['floor'],
                ':layout'   => $val_end['layout'],
                ':type'     => $val_end['type'],
                ':rooms'   => $val_end['rooms'],
                ':area'   => $val_end['area'],
                ':area_kitchen'     => $val_end['area_kitchen'],
                ':price'   => $val_end['price'],
                ':status'   => $val_end['status'],
                ':price_filter'     => $val_end['price_filter'],
                ':area_filter'   => $val_end['area_filter'],
                ':area_kitchen_filter'   => $val_end['area_kitchen_filter']
              ));
              $j++;
                  
                }
                 ?> <pre> <? print_r($data_array); ?> </pre> <?
            }
        }
 
        
        
?>
</body>
