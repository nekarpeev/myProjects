<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PostController extends Controller
{
    public function index() {
        //echo 'privet';
        return view('post.index');
        
            // Пример простого запроса к БД
        //$users = DB::table('articles')->get();

//        foreach ($users as $user) {
//            echo '<pre>';
//            print_r($user);
//            echo '</pre>';
//        }
        //return view('user.index', ['users' => $users]);
    
        
    }
    
//    function weekOfMonth($today = null, $scheduleMonths = 6) {
//        $today = !is_null($today) ?
//            Carbon::createFromFormat('Y-m-d', $today)->timezone(Session::get('timezone')) :
//            Carbon::now()->timezone(Session::get('timezone'));
// 
//        $startDate = Carbon::instance($today)
//            ->timezone(Session::get('timezone'))
//            ->startOfMonth()
//            ->startOfWeek();
// 
//        $endDate = Carbon::instance($startDate)
//            ->timezone(Session::get('timezone'))
//            ->addMonths($scheduleMonths)
//            ->endOfMonth();
//        $endDate->addDays(6 - $endDate->dayOfWeek);
// 
//        $epoch = Carbon::createFromTimestamp(0) ->timezone(Session::get('timezone'));
//        $firstDay = $epoch->diffInDays($startDate);
//        $lastDay = $epoch->diffInDays($endDate);
// 
//        $week = 0;
//        $monthNum = $today->month;
//        $yearNum = $today->year;
//        $prevDay = null;
//        $theDay = $startDate;
//        $prevMonth = $monthNum;
// 
//        $data = array();
// 
//        while ($firstDay < $lastDay) {
// 
//            if (($theDay->dayOfWeek == Carbon::MONDAY) && (($theDay->month > $monthNum) || ($theDay->month == 1))) $monthNum = $theDay->month;
//            if ($prevMonth > $monthNum) $yearNum++;
// 
//            $theMonth = Carbon::createFromFormat("Y-m-d", $yearNum . "-" . $monthNum . "-01")->timezone(Session::get('timezone'))->format('F Y');
// 
//            if (!array_key_exists($theMonth, $data)) $data[$theMonth] = array();
//            if (!array_key_exists($week, $data[$theMonth])) $data[$theMonth][$week] = array(
//                'day_range' => '',
//            );
// 
//            if ($theDay->dayOfWeek == Carbon::MONDAY) $data[$theMonth][$week]['day_range'] = sprintf("%d-", $theDay->day);
//            if ($theDay->dayOfWeek == Carbon::SUNDAY) $data[$theMonth][$week]['day_range'] .= sprintf("%d", $theDay->day);
// 
//            $firstDay++;
//            if ($theDay->dayOfWeek == Carbon::SUNDAY) $week++;
//            $theDay = $theDay->copy()->addDay();
//            $prevMonth = $monthNum;
//        }
// 
//        $totalWeeks = $week;
// 
//        return array(
//            'startDate' => $startDate,
//            'endDate' => $endDate,
//            'totalWeeks' => $totalWeeks,
//            'schedule' => $data,
//        );
//    }
}



