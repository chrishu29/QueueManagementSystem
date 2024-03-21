<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\queueModel;
use App\Models\CurrentQ;
use App\Models\User;

use DB;

class EmployeeController extends Controller
{
    //redirect to Employee Dashboard
    public function dashboard(){
        //variable initiation
        $data = null; $data2 = null; $data3 = null; $data4 = null; $data5 = null;
        $skiped = null; $skiped2 = null; $skiped3 = null; $skiped4 = null; $skiped5 = null;
        $catName = null; $catName2 = null; $catName3 = null; $catName4 = null; $catName5 = null;
        $type = null; $type2 = null; $type3 = null; $type4 = null; $type5 = null;
        
            // $check = queueModel::where('skipped','0')->get();
            $category = \DB::table('CurrentQueue')->get();
            $categoryCount = \DB::table('CurrentQueue')->get('QType')->count();
            //dd($category);

            //total category validator
            if($categoryCount == 1){
                $type = $category[0]->QType;
                $catName = $category[0]->QName;
            }else if($categoryCount == 2){
                $catName = $category[0]->QName;
                $catName2 = $category[1]->QName;
                $type = $category[0]->QType;
                $type2 = $category[1]->QType;
            }else if($categoryCount == 3){
                $catName = $category[0]->QName;
                $catName2 = $category[1]->QName;
                $catName3 = $category[2]->QName;
                $type = $category[0]->QType;
                $type2 = $category[1]->QType;
                $type3 = $category[2]->QType;                
            }else if($categoryCount == 4){
                $catName = $category[0]->QName;
                $catName2 = $category[1]->QName;
                $catName3 = $category[2]->QName;
                $catName4 = $category[3]->QName;
                $type = $category[0]->QType;
                $type2 = $category[1]->QType;
                $type3 = $category[2]->QType;    
                $type4 = $category[3]->QType;                
            }else{
                $catName = $category[0]->QName;
                $catName2 = $category[1]->QName;
                $catName3 = $category[2]->QName;
                $catName4 = $category[3]->QName;
                $catName5 = $category[4]->QName;
                $type = $category[0]->QType;
                $type2 = $category[1]->QType;
                $type3 = $category[2]->QType;       
                $type4 = $category[3]->QType;            
                $type5 = $category[4]->QType;       
            }
            
            //initialize queue and skipped queue data for each category
            $data = queueModel::where('category',$catName)->where('status','Active')->where('skipped','0')->whereDate('created_at','=',now())->orderBy('queue','ASC')->first();
            $data2 = queueModel::where('category',$catName2)->where('status','Active')->where('skipped','0')->whereDate('created_at','=',now())->orderBy('queue','ASC')->first();
            $data3 = queueModel::where('category',$catName3)->where('status','Active')->where('skipped','0')->whereDate('created_at','=',now())->orderBy('queue','ASC')->first();
            $data4 = queueModel::where('category',$catName4)->where('status','Active')->where('skipped','0')->whereDate('created_at','=',now())->orderBy('queue','ASC')->first();
            $data5 = queueModel::where('category',$catName5)->where('status','Active')->where('skipped','0')->whereDate('created_at','=',now())->orderBy('queue','ASC')->first();
            $skiped = queueModel::where('category',$catName)->where('status','Active')->where('skipped','1')->whereDate('created_at','=',now())->orderBy('queue','ASC')->get('queue');
            $skiped2 = queueModel::where('category',$catName2)->where('status','Active')->where('skipped','1')->whereDate('created_at','=',now())->orderBy('queue','ASC')->get('queue');
            $skiped3 = queueModel::where('category',$catName3)->where('status','Active')->where('skipped','1')->whereDate('created_at','=',now())->orderBy('queue','ASC')->get('queue');
            $skiped4 = queueModel::where('category',$catName4)->where('status','Active')->where('skipped','1')->whereDate('created_at','=',now())->orderBy('queue','ASC')->get('queue');
            $skiped5 = queueModel::where('category',$catName5)->where('status','Active')->where('skipped','1')->whereDate('created_at','=',now())->orderBy('queue','ASC')->get('queue');

            //dd($skiped);
            //validate and fill Current Queue value
            if($data == null){
                $Q1 = '0';
                if($data2 == null){
                    $Q2 = '0';
                    if($data3 == null){
                        $Q3 = '0';
                        if($data4 == null){
                            $Q4 = '0';
                            if($data5 == null){
                                $Q5 = '0';
                            }else{
                                $Q5 = $type5.'-'.$data5->queue;
                            }
                        }else{
                            $Q4 = $type4.'-'.$data4->queue;
                        }

                        if($data5 == null){
                            $Q5 = '0';
                        }else{
                            $Q5 = $type5.'-'.$data5->queue;
                        }
                    }else{
                        $Q3 = $type3.'-'.$data3->queue;
                    }

                    if($data4 == null){
                        $Q4 = '0';
                        if($data5 == null){
                            $Q5 = '0';
                        }else{
                            $Q5 = $type5.'-'.$data5->queue;
                        }
                    }else{
                        $Q4 = $type4.'-'.$data4->queue;
                    }

                    if($data5 == null){
                        $Q5 = '0';
                    }else{
                        $Q5 = $type5.'-'.$data5->queue;
                    }
                }else{
                    $Q2 = $type2.'-'.$data2->queue;
                }

                if($data3 == null){
                    $Q3 = '0';
                    if($data4 == null){
                        $Q4 = '0';
                        if($data5 == null){
                            $Q5 = '0';
                        }else{
                            $Q5 = $type5.'-'.$data5->queue;
                        }
                    }else{
                        $Q4 = $type4.'-'.$data4->queue;
                    }

                    if($data5 == null){
                        $Q5 = '0';
                    }else{
                        $Q5 = $type5.'-'.$data5->queue;
                    }
                }else{
                    $Q3 = $type3.'-'.$data3->queue;
                }

                if($data4 == null){
                    $Q4 = '0';
                    if($data5 == null){
                        $Q5 = '0';
                    }else{
                        $Q5 = $type5.'-'.$data5->queue;
                    }
                }else{
                    $Q4 = $type4.'-'.$data4->queue;
                }

                if($data5 == null){
                    $Q5 = '0';
                }else{
                    $Q5 = $type5.'-'.$data5->queue;
                }
            }else{
                $Q1 = $type.'-'.$data->queue;
                if($data2 == null){
                    $Q2 = '0';
                    if($data3 == null){
                        $Q3 = '0';
                        if($data4 == null){
                            $Q4 = '0';
                            if($data5 == null){
                                $Q5 = '0';
                            }else{
                                $Q5 = $type5.'-'.$data5->queue;
                            }
                        }else{
                            $Q4 = $type4.'-'.$data4->queue;
                        }

                        if($data5 == null){
                            $Q5 = '0';
                        }else{
                            $Q5 = $type5.'-'.$data5->queue;
                        }
                    }else{
                        $Q3 = $type3.'-'.$data3->queue;
                    }

                    if($data4 == null){
                        $Q4 = '0';
                        if($data5 == null){
                            $Q5 = '0';
                        }else{
                            $Q5 = $type5.'-'.$data5->queue;
                        }
                    }else{
                        $Q4 = $type4.'-'.$data4->queue;
                    }

                    if($data5 == null){
                        $Q5 = '0';
                    }else{
                        $Q5 = $type5.'-'.$data5->queue;
                    }
                }else{
                    $Q2 = $type2.'-'.$data2->queue;
                }

                if($data3 == null){
                    $Q3 = '0';
                    if($data4 == null){
                        $Q4 = '0';
                        if($data5 == null){
                            $Q5 = '0';
                        }else{
                            $Q5 = $type5.'-'.$data5->queue;
                        }
                    }else{
                        $Q4 = $type4.'-'.$data4->queue;
                    }

                    if($data5 == null){
                        $Q5 = '0';
                    }else{
                        $Q5 = $type5.'-'.$data5->queue;
                    }
                }else{
                    $Q3 = $type3.'-'.$data3->queue;
                }

                if($data4 == null){
                    $Q4 = '0';
                    if($data5 == null){
                        $Q5 = '0';
                    }else{
                        $Q5 = $type5.'-'.$data5->queue;
                    }
                }else{
                    $Q4 = $type4.'-'.$data4->queue;
                }

                if($data5 == null){
                    $Q5 = '0';
                }else{
                    $Q5 = $type5.'-'.$data5->queue;
                }
            }

            if($data2 == null){
                $Q2 = '0';
                if($data3 == null){
                    $Q3 = '0';
                    if($data4 == null){
                        $Q4 = '0';
                        if($data5 == null){
                            $Q5 = '0';
                        }else{
                            $Q5 = $type5.'-'.$data5->queue;
                        }
                    }else{
                        $Q4 = $type4.'-'.$data4->queue;
                    }

                    if($data5 == null){
                        $Q5 = '0';
                    }else{
                        $Q5 = $type5.'-'.$data5->queue;
                    }
                }else{
                    $Q3 = $type3.'-'.$data3->queue;
                }

                if($data4 == null){
                    $Q4 = '0';
                    if($data5 == null){
                        $Q5 = '0';
                    }else{
                        $Q5 = $type5.'-'.$data5->queue;
                    }
                }else{
                    $Q4 = $type4.'-'.$data4->queue;
                }

                if($data5 == null){
                    $Q5 = '0';
                }else{
                    $Q5 = $type5.'-'.$data5->queue;
                }
            }else{
                $Q2 = $type2.'-'.$data2->queue;
            }

            if($data3 == null){
                $Q3 = '0';
                if($data4 == null){
                    $Q4 = '0';
                    if($data5 == null){
                        $Q5 = '0';
                    }else{
                        $Q5 = $type5.'-'.$data5->queue;
                    }
                }else{
                    $Q4 = $type4.'-'.$data4->queue;
                }

                if($data5 == null){
                    $Q5 = '0';
                }else{
                    $Q5 = $type5.'-'.$data5->queue;
                }
            }else{
                $Q3 = $type3.'-'.$data3->queue;
            }

            if($data4 == null){
                $Q4 = '0';
                if($data5 == null){
                    $Q5 = '0';
                }else{
                    $Q5 = $type5.'-'.$data5->queue;
                }
            }else{
                $Q4 = $type4.'-'.$data4->queue;
            }

            if($data5 == null){
                $Q5 = '0';
            }else{
                $Q5 = $type5.'-'.$data5->queue;
            }

            //redirect to employee home page with all data
            return view('EDashboard', ['NKocheng' => $catName,'NKocheng2' => $catName2,'NKocheng3' => $catName3, 'NKocheng4' => $catName4, 'NKocheng5' => $catName5, 'antrian' => $Q1,'antrian2' => $Q2,'antrian3' => $Q3, 'antrian4' => $Q4, 'antrian5' => $Q5],['skiped' => $skiped,'skiped2' => $skiped2,'skiped3' => $skiped3, 'skiped4' => $skiped4, 'skiped5' => $skiped5,'type' => $type, 'type2' => $type2, 'type3' => $type3, 'type4' => $type4, 'type5' => $type5]);
    }
    //skipp current queue
    public function skipp($category){
        //variable initiation
        $counter=0;
        $catName = null; $catName2 = null; $catName3 = null; $catName4 = null; $catName5 = null;
        
            $categories = \DB::table('CurrentQueue')->get();
            $categoryCount = \DB::table('CurrentQueue')->get('QType')->count();

            //total category validator and category definition
            if($categoryCount == 1){
                $catName = $categories[0]->QName;
            }else if($categoryCount == 2){
                $catName = $categories[0]->QName;
                $catName2 = $categories[1]->QName;
            }else if($categoryCount == 3){
                $catName = $categories[0]->QName;
                $catName2 = $categories[1]->QName;
                $catName3 = $categories[2]->QName;               
            }else if($categoryCount == 4){
                $catName = $categories[0]->QName;
                $catName2 = $categories[1]->QName;
                $catName3 = $categories[2]->QName;
                $catName4 = $categories[3]->QName;             
            }else{
                $catName = $categories[0]->QName;
                $catName2 = $categories[1]->QName;
                $catName3 = $categories[2]->QName;
                $catName4 = $categories[3]->QName;
                $catName5 = $categories[4]->QName;  
            }
            //dd($category);

        switch ($category) {
            case $catName:
                //get last queue data on this category for today
                $check = \DB::table('queueTable')->where('category',$catName)->where('status','Active')->where('skipped','0')->whereDate('created_at','=',now())->orderBy('queue','ASC')->limit(1);
                //count how many skipped queue for today and update to CurrentQueue table
                $counter = \DB::table('queueTable')->where('category',$catName)->where('skipped','1')->whereDate('created_at','=',now())->count();
                \DB::table('CurrentQueue')->where('id', 1)->update(['SkippedQueue' => $counter+1]);
                //update skipped column for selected queue data
                $check->update(['skipped' => 1]);
                // dd($currentSkipped);
                break;
            case $catName2:
                $check = \DB::table('queueTable')->where('category',$catName2)->where('status','Active')->where('skipped','0')->whereDate('created_at','=',now())->orderBy('queue','ASC')->limit(1);
                $counter = \DB::table('queueTable')->where('category',$catName2)->where('skipped','1')->whereDate('created_at','=',now())->count();
                \DB::table('CurrentQueue')->where('id', 2)->update(['SkippedQueue' => $counter+1]);
                $check->update(['skipped' => 1]);
                break;
            case $catName3:
                $check = \DB::table('queueTable')->where('category',$catName3)->where('status','Active')->where('skipped','0')->whereDate('created_at','=',now())->orderBy('queue','ASC')->limit(1);
                $counter = \DB::table('queueTable')->where('category',$catName3)->where('skipped','1')->whereDate('created_at','=',now())->count();
                \DB::table('CurrentQueue')->where('id', 3)->update(['SkippedQueue' => $counter+1]);
                $check->update(['skipped' => 1]);
                break;
            case $catName4:
                $check = \DB::table('queueTable')->where('category',$catName4)->where('status','Active')->where('skipped','0')->whereDate('created_at','=',now())->orderBy('queue','ASC')->limit(1);
                $counter = \DB::table('queueTable')->where('category',$catName4)->where('skipped','1')->whereDate('created_at','=',now())->count();
                \DB::table('CurrentQueue')->where('id', 3)->update(['SkippedQueue' => $counter+1]);
                $check->update(['skipped' => 1]);
                break;
            case $catName5:
                $check = \DB::table('queueTable')->where('category',$catName5)->where('status','Active')->where('skipped','0')->whereDate('created_at','=',now())->orderBy('queue','ASC')->limit(1);
                $counter = \DB::table('queueTable')->where('category',$catName5)->where('skipped','1')->whereDate('created_at','=',now())->count();
                \DB::table('CurrentQueue')->where('id', 3)->update(['SkippedQueue' => $counter+1]);
                $check->update(['skipped' => 1]);
                break;
        }
        
        //$nextAction->save();
        return redirect()->route('HomeEmployee');
    }
    //complete current queue
    public function donee($category){
        $catName = null; $catName2 = null; $catName3 = null; $catName4 = null; $catName5 = null;
        
            $categories = \DB::table('CurrentQueue')->get();
            $categoryCount = \DB::table('CurrentQueue')->get('QType')->count();

            //total category validator
            if($categoryCount == 1){
                $catName = $categories[0]->QName;
            }else if($categoryCount == 2){
                $catName = $categories[0]->QName;
                $catName2 = $categories[1]->QName;
            }else if($categoryCount == 3){
                $catName = $categories[0]->QName;
                $catName2 = $categories[1]->QName;
                $catName3 = $categories[2]->QName;               
            }else if($categoryCount == 4){
                $catName = $categories[0]->QName;
                $catName2 = $categories[1]->QName;
                $catName3 = $categories[2]->QName;
                $catName4 = $categories[3]->QName;             
            }else{
                $catName = $categories[0]->QName;
                $catName2 = $categories[1]->QName;
                $catName3 = $categories[2]->QName;
                $catName4 = $categories[3]->QName;
                $catName5 = $categories[4]->QName;  
            }
        switch ($category) {
            case $catName:
                //select last queue data on this category for today and update the updated_at column
                \DB::table('queueTable')->where('category',$catName)->where('status','Active')->where('skipped','0')->whereDate('created_at','=',now())->orderBy('queue','ASC')->limit(1)->update(['updated_at' => now()->format('Y-m-d G:i:s')]);
                //get the last queue data on this category for today
                $check = \DB::table('queueTable')->where('category',$catName)->where('status','Active')->where('skipped','0')->whereDate('created_at','=',now())->orderBy('queue','ASC')->limit(1);
                //count all current inactive queue data for today
                $counter = \DB::table('queueTable')->where('category',$catName)->where('status','Inactive')->whereDate('created_at','=',now())->count();
                //calculate wait time in seconds
                $startQ = \DB::table('queueTable')->where('category',$catName)->where('status','Active')->where('skipped','0')->whereDate('created_at','=',now())->orderBy('queue','ASC')->limit(1)->get('created_at');
                $endQ = \DB::table('queueTable')->where('category',$catName)->where('status','Active')->where('skipped','0')->whereDate('created_at','=',now())->orderBy('queue','ASC')->limit(1)->get('updated_at');
                $startQTime = date('H:i:s',strtotime($startQ[0]->created_at));
                $endQTime = date('H:i:s',strtotime($endQ[0]->updated_at));
                $timeDiff =intval(strtotime($endQTime) - strtotime($startQTime));
                //update all
                $check->update(['wait_time' => $timeDiff]);
                \DB::table('CurrentQueue')->where('id', 1)->update(['DoneQueue' => $counter+1]);
                $check->update(['status' => 'Inactive']);
                break;
            case $catName2:
                \DB::table('queueTable')->where('category',$catName2)->where('status','Active')->where('skipped','0')->whereDate('created_at','=',now())->orderBy('queue','ASC')->limit(1)->update(['updated_at' => now()->format('Y-m-d G:i:s')]);
                $check = \DB::table('queueTable')->where('category',$catName2)->where('status','Active')->where('skipped','0')->whereDate('created_at','=',now())->orderBy('queue','ASC')->limit(1);
                $counter = \DB::table('queueTable')->where('category',$catName2)->where('status','Inactive')->whereDate('created_at','=',now())->count();
                //calculate wait time
                $startQ = \DB::table('queueTable')->where('category',$catName2)->where('status','Active')->where('skipped','0')->whereDate('created_at','=',now())->orderBy('queue','ASC')->limit(1)->get('created_at');
                $endQ = \DB::table('queueTable')->where('category',$catName2)->where('status','Active')->where('skipped','0')->whereDate('created_at','=',now())->orderBy('queue','ASC')->limit(1)->get('updated_at');
                $startQTime = date('H:i:s',strtotime($startQ[0]->created_at));
                $endQTime = date('H:i:s',strtotime($endQ[0]->updated_at));
                $timeDiff =intval(strtotime($endQTime) - strtotime($startQTime));
                //update all
                $check->update(['wait_time' => $timeDiff]);
                \DB::table('CurrentQueue')->where('id', 2)->update(['DoneQueue' => $counter+1]);
                $check->update(['status' => 'Inactive']);
                break;
            case $catName3:
                \DB::table('queueTable')->where('category',$catName3)->where('status','Active')->where('skipped','0')->whereDate('created_at','=',now())->orderBy('queue','ASC')->limit(1)->update(['updated_at' => now()->format('Y-m-d G:i:s')]);
                $check = \DB::table('queueTable')->where('category',$catName3)->where('status','Active')->where('skipped','0')->orderBy('queue','ASC')->whereDate('created_at','=',now())->limit(1);
                $counter = \DB::table('queueTable')->where('category',$catName3)->where('status','Inactive')->whereDate('created_at','=',now())->count();
                //calculate wait time
                $startQ = \DB::table('queueTable')->where('category',$catName3)->where('status','Active')->where('skipped','0')->whereDate('created_at','=',now())->orderBy('queue','ASC')->limit(1)->get('created_at');
                $endQ = \DB::table('queueTable')->where('category',$catName3)->where('status','Active')->where('skipped','0')->whereDate('created_at','=',now())->orderBy('queue','ASC')->limit(1)->get('updated_at');
                $startQTime = date('H:i:s',strtotime($startQ[0]->created_at));
                $endQTime = date('H:i:s',strtotime($endQ[0]->updated_at));
                $timeDiff =intval(strtotime($endQTime) - strtotime($startQTime));
                //update all
                $check->update(['wait_time' => $timeDiff]);
                \DB::table('CurrentQueue')->where('id', 3)->update(['DoneQueue' => $counter+1]);
                $check->update(['status' => 'Inactive']);
                break;
            case $catName4:
                \DB::table('queueTable')->where('category',$catName4)->where('status','Active')->where('skipped','0')->whereDate('created_at','=',now())->orderBy('queue','ASC')->limit(1)->update(['updated_at' => now()->format('Y-m-d G:i:s')]);
                $check = \DB::table('queueTable')->where('category',$catName4)->where('status','Active')->where('skipped','0')->orderBy('queue','ASC')->whereDate('created_at','=',now())->limit(1);
                $counter = \DB::table('queueTable')->where('category',$catName4)->where('status','Inactive')->whereDate('created_at','=',now())->count();
                //calculate wait time
                $startQ = \DB::table('queueTable')->where('category',$catName4)->where('status','Active')->where('skipped','0')->whereDate('created_at','=',now())->orderBy('queue','ASC')->limit(1)->get('created_at');
                $endQ = \DB::table('queueTable')->where('category',$catName4)->where('status','Active')->where('skipped','0')->whereDate('created_at','=',now())->orderBy('queue','ASC')->limit(1)->get('updated_at');
                $startQTime = date('H:i:s',strtotime($startQ[0]->created_at));
                $endQTime = date('H:i:s',strtotime($endQ[0]->updated_at));
                $timeDiff =intval(strtotime($endQTime) - strtotime($startQTime));
                //update all
                $check->update(['wait_time' => $timeDiff]);
                \DB::table('CurrentQueue')->where('id', 4)->update(['DoneQueue' => $counter+1]);
                $check->update(['status' => 'Inactive']);
                break;
            case $catName5:
                \DB::table('queueTable')->where('category',$catName5)->where('status','Active')->where('skipped','0')->whereDate('created_at','=',now())->orderBy('queue','ASC')->limit(1)->update(['updated_at' => now()->format('Y-m-d G:i:s')]);
                $check = \DB::table('queueTable')->where('category',$catName5)->where('status','Active')->where('skipped','0')->orderBy('queue','ASC')->whereDate('created_at','=',now())->limit(1);
                $counter = \DB::table('queueTable')->where('category',$catName5)->where('status','Inactive')->whereDate('created_at','=',now())->count();
                //calculate wait time
                $startQ = \DB::table('queueTable')->where('category',$catName5)->where('status','Active')->where('skipped','0')->whereDate('created_at','=',now())->orderBy('queue','ASC')->limit(1)->get('created_at');
                $endQ = \DB::table('queueTable')->where('category',$catName5)->where('status','Active')->where('skipped','0')->whereDate('created_at','=',now())->orderBy('queue','ASC')->limit(1)->get('updated_at');
                $startQTime = date('H:i:s',strtotime($startQ[0]->created_at));
                $endQTime = date('H:i:s',strtotime($endQ[0]->updated_at));
                $timeDiff =intval(strtotime($endQTime) - strtotime($startQTime));
                //update all
                $check->update(['wait_time' => $timeDiff]);
                \DB::table('CurrentQueue')->where('id', 5)->update(['DoneQueue' => $counter+1]);
                $check->update(['status' => 'Inactive']);
                break;
        }

        //redirect back to employee home
        return redirect()->route('HomeEmployee');
    }
    //callback a skipped queue
    public function calll($category){
        //variable initiation
        $catName = null;  $catName2 = null; $catName3 = null; $catName4 = null; $catName5 = null;
        
            $categories = \DB::table('CurrentQueue')->get();
            $categoryCount = \DB::table('CurrentQueue')->get('QType')->count();

            //total category validator
            if($categoryCount == 1){
                $catName = $categories[0]->QName;
            }else if($categoryCount == 2){
                $catName = $categories[0]->QName;
                $catName2 = $categories[1]->QName;
            }else if($categoryCount == 3){
                $catName = $categories[0]->QName;
                $catName2 = $categories[1]->QName;
                $catName3 = $categories[2]->QName;               
            }else if($categoryCount == 4){
                $catName = $categories[0]->QName;
                $catName2 = $categories[1]->QName;
                $catName3 = $categories[2]->QName;
                $catName4 = $categories[3]->QName;             
            }else{
                $catName = $categories[0]->QName;
                $catName2 = $categories[1]->QName;
                $catName3 = $categories[2]->QName;
                $catName4 = $categories[3]->QName;
                $catName5 = $categories[4]->QName;  
            }
            switch ($category) {
            case $catName:
                //get the last skipped queue from DB
                $check = \DB::table('queueTable')->where('category',$catName)->where('status','Active')->where('skipped','1')->whereDate('created_at','=',now())->orderBy('queue','ASC')->limit(1);
                //update skipped column back to 0 to exclude current data from skipped queue
                $check->update(['skipped' => '0']);
                break;
            case $catName2:
                $check = \DB::table('queueTable')->where('category',$catName2)->where('status','Active')->where('skipped','1')->whereDate('created_at','=',now())->orderBy('queue','ASC')->limit(1);
                $check->update(['skipped' => '0']);
                break;
            case $catName3:
                $check = \DB::table('queueTable')->where('category',$catName3)->where('status','Active')->where('skipped','1')->whereDate('created_at','=',now())->orderBy('queue','ASC')->limit(1);
                $check->update(['skipped' => '0']);
                break;
            case $catName4:
                $check = \DB::table('queueTable')->where('category',$catName4)->where('status','Active')->where('skipped','1')->whereDate('created_at','=',now())->orderBy('queue','ASC')->limit(1);
                $check->update(['skipped' => '0']);
                break;
            case $catName5:
                $check = \DB::table('queueTable')->where('category',$catName5)->where('status','Active')->where('skipped','1')->whereDate('created_at','=',now())->orderBy('queue','ASC')->limit(1);
                $check->update(['skipped' => '0']);
                break;
            }

        //redirect back to employee home
        return redirect()->route('HomeEmployee');
    }

    // public function generateReport($assignCat){
    //     $fastestQ = 0;
    //     $longestQ = 0;
    //     $totalQ = CurrentQ::where('id',$assignCat)->get('TotalQueue');
    //     $skips = CurrentQ::where('id',$assignCat)->get('SkippedQueue');
    //     $dones = CurrentQ::where('id',$assignCat)->get('DoneQueue');
    //     $categories = \DB::table('currentQueue')->select('QName','QType')->where('id',$assignCat)->get();
    //     $dates = now()->format('d-m-Y');
    //     $times = now()->format('h:i:s');
    //     $avgWait = round(queueModel::where('category',$categories[0]->QName)->whereDate('created_at','=',now())->avg('wait_time'));
    //     $fastestQ = queueModel::where('category',$categories[0]->QName)->whereDate('created_at','=',now())->min('wait_time');
    //     $longestQ = queueModel::where('category',$categories[0]->QName)->whereDate('created_at','=',now())->max('wait_time');
    //     if ($fastestQ == null) {
    //         $fastestQ = 0;
    //     }
    //     if ($longestQ == null) {
    //         $longestQ = 0;
    //     }
    //     //dd($fastestQ);
    //     return view('Reports/employeeReportD',['category' => $categories,'dates' => $dates, 'times' => $times, 'totalQ' => $totalQ, 'skips' => $skips, 'dones' => $dones, 'avgQ' => $avgWait, 'fastQ' => $fastestQ, 'longQ' => $longestQ]);
    // }

    //redirect to employee profile page
    public function profile(){
        return view('userProfile');
    }
}
