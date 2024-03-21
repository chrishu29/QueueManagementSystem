<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\queueModel;
use App\Models\CurrentQ;
use App\Helpers\ApiFormatter;

class QueueController extends Controller
{
    // public function index(){
    //     //Api Test
    //     $data = queueModel::all();

    //     if($data){
    //         return ApiFormatter::createApi(200,'success',$data);
    //     }else{
    //         return ApiFormatter::createApi(400,'failed');
    //     }
    // }

    //redirect to category selection page
    public function catHome(){
        $categories = currentQ::get();
        return view('category',['caties' => $categories]);
    }

    //show queue for selected category
    public function showIt($category){
        //variable and object initiation
        $queue = new queueModel;
        $current = new CurrentQ;
        $dates = date('y-m-d');
        //get all category name
        $categoryN = \DB::table('CurrentQueue')->get();
        //count total category
        $cCount = \DB::table('CurrentQueue')->get()->count();
        //update column on queuetable
        $queue -> category = $category;
        $queue -> status = "Active";
        $counter=0;
        //dd($dates);
        //validate total category
        if ($cCount == 1) {
            //define category name and id
            $c1=$categoryN[0]->QName;
            $cid1 = $categoryN[0]->id;
            //count total current queue for each category
            $counter = \DB::table('queueTable')->where('category',$c1)->whereDate('created_at','=',now())->count();
            //define queue number
            $queue -> queue = $counter+1;
            //insert new value to TotalQueue column on CurrentQueue table
            \DB::table('CurrentQueue')->where('id', $cid1)->update(['TotalQueue' => $counter+1]);
            //define wait_time value on queue table for new queue
            $queue -> wait_time = '0';
            //reset the counter back to 0
            $counter =0;
        } else if($cCount == 2){
            $c1=$categoryN[0]->QName;
            $c2=$categoryN[1]->QName;
            $cid1 = $categoryN[0]->id;
            $cid2 = $categoryN[1]->id;
            switch ($category) {
                case $c1:
                    $counter = \DB::table('queueTable')->where('category',$c1)->whereDate('created_at','=',now())->count();
                    $queue -> queue = $counter+1;
                    \DB::table('CurrentQueue')->where('id', $cid1)->update(['TotalQueue' => $counter+1]);
                    $queue -> wait_time = '0';
                    $counter =0;
                    break;
                case $c2:
                    $counter = \DB::table('queueTable')->where('category',$c2)->whereDate('created_at','=',now())->count();
                    $queue -> queue = $counter+1;
                    \DB::table('CurrentQueue')->where('id', $cid2)->update(['TotalQueue' => $counter+1]);
                    $queue -> wait_time = '0';
                    $counter =0;
                    break;
            }
        }else if($cCount == 3){
            $c1=$categoryN[0]->QName;
            $c2=$categoryN[1]->QName;
            $c3=$categoryN[2]->QName;
            $cid1 = $categoryN[0]->id;
            $cid2 = $categoryN[1]->id;
            $cid3 = $categoryN[2]->id;
            switch ($category) {
                case $c1:
                    $counter = \DB::table('queueTable')->where('category',$c1)->whereDate('created_at','=',now())->count();
                    $queue -> queue = $counter+1;
                    \DB::table('CurrentQueue')->where('id', $cid1)->update(['TotalQueue' => $counter+1]);
                    $queue -> wait_time = '0';
                    $counter =0;
                    break;
                case $c2:
                    $counter = \DB::table('queueTable')->where('category',$c2)->whereDate('created_at','=',now())->count();
                    $queue -> queue = $counter+1;
                    \DB::table('CurrentQueue')->where('id', $cid2)->update(['TotalQueue' => $counter+1]);
                    $queue -> wait_time = '0';
                    $counter =0;
                    break;
                case $c3:
                    $counter = \DB::table('queueTable')->where('category',$c3)->whereDate('created_at','=',now())->count();
                    $queue -> queue = $counter+1;
                    \DB::table('CurrentQueue')->where('id', $cid3)->update(['TotalQueue' => $counter+1]);
                    $queue -> wait_time = '0';
                    $counter =0;
                    break;
            }
        }else if($cCount == 4){
            $c1=$categoryN[0]->QName;
            $c2=$categoryN[1]->QName;
            $c3=$categoryN[2]->QName;
            $c4=$categoryN[3]->QName;
            $cid1 = $categoryN[0]->id;
            $cid2 = $categoryN[1]->id;
            $cid3 = $categoryN[2]->id;
            $cid4 = $categoryN[3]->id;
            switch ($category) {
                case $c1:
                    $counter = \DB::table('queueTable')->where('category',$c1)->whereDate('created_at','=',now())->count();
                    $queue -> queue = $counter+1;
                    $checkTotsQToday = \DB::table('CurrentQueue')->where('id', $cid1)->count();
                    if($checkTotsQToday == 0){
                        $counter =0;
                    }
                    //dd($checkTotsQToday);
                    \DB::table('CurrentQueue')->where('id', $cid1)->update(['TotalQueue' => $counter+1]);
                    $queue -> wait_time = '0';
                    $counter =0;
                    break;
                case $c2:
                    $counter = \DB::table('queueTable')->where('category',$c2)->whereDate('created_at','=',now())->count();
                    $queue -> queue = $counter+1;
                    \DB::table('CurrentQueue')->where('id', $cid2)->update(['TotalQueue' => $counter+1]);
                    $queue -> wait_time = '0';
                    $counter =0;
                    break;
                case $c3:
                    $counter = \DB::table('queueTable')->where('category',$c3)->whereDate('created_at','=',now())->count();
                    $queue -> queue = $counter+1;
                    \DB::table('CurrentQueue')->where('id', $cid3)->update(['TotalQueue' => $counter+1]);
                    $queue -> wait_time = '0';
                    $counter =0;
                    break;
                case $c4:
                    $counter = \DB::table('queueTable')->where('category',$c4)->whereDate('created_at','=',now())->count();
                    $queue -> queue = $counter+1;
                    \DB::table('CurrentQueue')->where('id', $cid4)->update(['TotalQueue' => $counter+1]);
                    $queue -> wait_time = '0';
                    $counter =0;
                    break;
            }
        }else{
            $c1=$categoryN[0]->QName;
            $c2=$categoryN[1]->QName;
            $c3=$categoryN[2]->QName;
            $c4=$categoryN[3]->QName;
            $c5=$categoryN[4]->QName;
            $cid1 = $categoryN[0]->id;
            $cid2 = $categoryN[1]->id;
            $cid3 = $categoryN[2]->id;
            $cid4 = $categoryN[3]->id;
            $cid5 = $categoryN[4]->id;
            switch ($category) {
                case $c1:
                    $counter = \DB::table('queueTable')->where('category',$c1)->whereDate('created_at','=',now())->count();
                    $queue -> queue = $counter+1;
                    \DB::table('CurrentQueue')->where('id', $cid1)->update(['TotalQueue' => $counter+1]);
                    $queue -> wait_time = '0';
                    $counter =0;
                    break;
                case $c2:
                    $counter = \DB::table('queueTable')->where('category',$c2)->whereDate('created_at','=',now())->count();
                    $queue -> queue = $counter+1;
                    \DB::table('CurrentQueue')->where('id', $cid2)->update(['TotalQueue' => $counter+1]);
                    $queue -> wait_time = '0';
                    $counter =0;
                    break;
                case $c3:
                    $counter = \DB::table('queueTable')->where('category',$c3)->whereDate('created_at','=',now())->count();
                    $queue -> queue = $counter+1;
                    \DB::table('CurrentQueue')->where('id', $cid3)->update(['TotalQueue' => $counter+1]);
                    $queue -> wait_time = '0';
                    $counter =0;
                    break;
                case $c4:
                    $counter = \DB::table('queueTable')->where('category',$c4)->whereDate('created_at','=',now())->count();
                    $queue -> queue = $counter+1;
                    \DB::table('CurrentQueue')->where('id', $cid4)->update(['TotalQueue' => $counter+1]);
                    $queue -> wait_time = '0';
                    $counter =0;
                    break;
                case $c5:
                    $counter = \DB::table('queueTable')->where('category',$c5)->whereDate('created_at','=',now())->count();
                    $queue -> queue = $counter+1;
                    \DB::table('CurrentQueue')->where('id', $cid5)->update(['TotalQueue' => $counter+1]);
                    $queue -> wait_time = '0';
                    $counter =0;
                    break;
            }
        }
        //save all data for new queue to DB
        $queue -> save();
        //get all data for new queue
        $result = \DB::table('queuetable')
        ->select('queuetable.id','queuetable.category','queuetable.queue','queuetable.status','CurrentQueue.QType','queuetable.created_at')
        ->join('currentqueue','currentqueue.QName','=','queuetable.category')
        ->where('status','Active')
        ->whereDate('queuetable.created_at','=',now())
        ->where('currentQueue.QName',$category)
        ->orderBy('queue','desc')
        ->limit(1)
        ->get();

        //estimate wait time
        $avgWaitQ = intval(queueModel::where('category',$category)->whereDate('created_at','=',now())->avg('wait_time')/60);

        return view('showQ',['showItQ' => $result, 'waitTime' => $avgWaitQ]);
    }

}
