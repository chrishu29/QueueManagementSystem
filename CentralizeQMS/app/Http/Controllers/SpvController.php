<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\queueModel;
use App\Models\CurrentQ;

class SpvController extends Controller
{
    //redirect to Supervisor home
    public function Home(){
        $data = null; $data2 = null; $data3 = null; $data4 = null; $data5 = null;
        $skiped = null; $skiped2 = null; $skiped3 = null; $skiped4 = null; $skiped5 = null;
        $catName = null; $catName2 = null; $catName3 = null; $catName4 = null; $catName5 = null;
        $type = null; $type2 = null; $type3 = null; $type4 = null; $type5 = null;
        
        $check = queueModel::where('skipped','0')->get();
        $category = \DB::table('CurrentQueue')->get();
        $categoryCount = \DB::table('CurrentQueue')->get('QType')->count();
        //dd($category);

        //total category validator and define category name and alias
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
        
        //get active queue and skipped queue value for each category
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

        //return to supervisor home with all data
        return view('spvHome', ['catsTotal' => $categoryCount,'NKocheng' => $catName,'NKocheng2' => $catName2,'NKocheng3' => $catName3, 'NKocheng4' => $catName4, 'NKocheng5' => $catName5, 'antrian' => $Q1,'antrian2' => $Q2,'antrian3' => $Q3, 'antrian4' => $Q4, 'antrian5' => $Q5],['skiped' => $skiped,'skiped2' => $skiped2,'skiped3' => $skiped3, 'skiped4' => $skiped4, 'skiped5' => $skiped5,'type' => $type, 'type2' => $type2, 'type3' => $type3, 'type4' => $type4, 'type5' => $type5]);
}

//redirect to edit employee page
    public function editEmployee(){
        //get all employee data
        $daftar = \DB::table('users')->where('role',1)->get();
        return view('spvEditEmployee',['daftar' => $daftar]);
    }

//edit selected employee data in edit form
    public function edit($id){
        $employee = User::find($id);
        return view('spvEEditForm',['karyawan' => $employee]);
    }
//update selected employee data
    public function update(Request $request,$id){
        $employee = User::find($id);
        $employee->update($request->all());
        return redirect()->route('SEdit');
    }
//skip queue
    public function skipp($category){
        $counter=0;
        $catName = null; $catName2 = null; $catName3 = null; $catName4 = null; $catName5 = null;
        
            $categories = \DB::table('CurrentQueue')->get();
            $categoryCount = \DB::table('CurrentQueue')->get('QType')->count();

            //total category validator and define category name
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
                //get last queue data on this category for today
                $check = \DB::table('queueTable')->where('category',$catName)->where('status','Active')->where('skipped','0')->whereDate('created_at','=',now())->orderBy('queue','ASC')->limit(1);
                //count how many skipped queue for today and update to CurrentQueue table
                $counter = \DB::table('queueTable')->where('category',$catName)->where('skipped','1')->whereDate('created_at','=',now())->count();
                \DB::table('CurrentQueue')->where('id', 1)->update(['SkippedQueue' => $counter+1]);
                //update skipped column for selected queue data
                $check->update(['skipped' => 1]);
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

        return redirect()->route('spvDashboard');
    }

//update queue to done
    public function donee($category){
        //variable initiation
        $catName = null; $catName2 = null; $catName3 = null; $catName4 = null; $catName5 = null;
        
            $categories = \DB::table('CurrentQueue')->get();
            $categoryCount = \DB::table('CurrentQueue')->get('QType')->count();

            //total category validator and define category name
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

        return redirect()->route('spvDashboard');
    }

//callback a skipped queue
    public function calll($category){
        $catName = null; $catName2 = null; $catName3 = null; $catName4 = null; $catName5 = null;
        
            $categories = \DB::table('CurrentQueue')->get();
            $categoryCount = \DB::table('CurrentQueue')->get('QType')->count();

            //total category validator and define category name
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
        //redirect back to supervisor home
        return redirect()->route('spvDashboard');
    }

//view Queue tracking table
    public function QTrack(){
        //variable initiation
        $avgWaitQ1 = null; $avgWaitQ2 = null; $avgWaitQ3 = null; $avgWaitQ4 = null; $avgWaitQ5 = null;
        $fastestQ1 = null; $fastestQ2 = null; $fastestQ3 = null; $fastestQ4 = null; $fastestQ5 = null;
        $longestQ1 = null; $longestQ2 = null; $longestQ3 = null; $longestQ4 = null; $longestQ5 = null;
        $totalQ1 = null; $totalQ2 = null; $totalQ3 = null; $totalQ4 = null; $totalQ5 = null;
        $skips1 = null; $skips2 = null; $skips3 = null; $skips4 = null; $skips5 = null; 
        $dones1 = null; $dones2 = null; $dones3 = null; $dones4 = null; $dones5 = null; 
        $overAvg1 = null; $overAvg2 = null; $overAvg3 = null; $overAvg4 = null; $overAvg5 = null;
        $overFast1 = null; $overFast2 = null; $overFast3 = null; $overFast4 = null; $overFast5 = null;
        $overLong1 = null; $overLong2 = null; $overLong3 = null; $overLong4 = null; $overLong5 = null;
        $categories = \DB::table('currentQueue')->get('QName');
        //calculate wait time from data DB by converting from sec(saved in DB) to minutes and seconds
        $avgmin = intval(queueModel::avg('wait_time')/60);
        $avgsec = intval(queueModel::avg('wait_time')%60);
        $avgWait = $avgmin.':'.$avgsec;
        $fastmin = intval(queueModel::min('wait_time')/60);
        $fastsec = intval(queueModel::min('wait_time')%60);
        $fastestQ = $fastmin.':'.$fastsec;
        $longmin = intval(queueModel::max('wait_time')/60);
        $longsec = intval(queueModel::max('wait_time')%60);
        $longestQ = $longmin.':'.$longsec;
    
        // dd($longsec);
        //to find avg,fastest and longest Time per queue and check how many category there is
        if ($categories->count() == 1) {
            $totalQ1 = queueModel::where('category',$categories[0]->QName)->whereDate('created_at','=',now())->count();
            $skips1 = queueModel::where('category',$categories[0]->QName)->where('skipped',1)->whereDate('created_at','=',now())->count();
            $dones1 = queueModel::where('category',$categories[0]->QName)->where('status','Inactive')->whereDate('created_at','=',now())->count();
            //convert wait time data from seconds to minute:seconds format
            $avgmin1 = intval(queueModel::where('category',$categories[0]->QName)->whereDate('created_at','=',now())->avg('wait_time')/60);
            $avgsec1 = intval(queueModel::where('category',$categories[0]->QName)->whereDate('created_at','=',now())->avg('wait_time')%60);
            $avgWaitQ1 = $avgmin1.':'.$avgsec1;
            $fastmin1 = intval(queueModel::where('category',$categories[0]->QName)->whereDate('created_at','=',now())->min('wait_time')/60);
            $fastsec1 = intval(queueModel::where('category',$categories[0]->QName)->whereDate('created_at','=',now())->min('wait_time')%60);
            $fastestQ1 = $fastmin1.':'.$fastsec1;
            $longmin1 = intval(queueModel::where('category',$categories[0]->QName)->whereDate('created_at','=',now())->max('wait_time')/60);
            $longsec1 = intval(queueModel::where('category',$categories[0]->QName)->whereDate('created_at','=',now())->max('wait_time')%60);
            $longestQ1 = $longmin1.':'.$longsec1;
            if ($avgWaitQ1 == null && $fastestQ1 == null && $longestQ1 == null) {
                $avgWaitQ1 = '0';
                $fastestQ1 = '0';
                $longestQ1 = '0';
            }
        }elseif($categories->count() == 2){
            $totalQ1 = queueModel::where('category',$categories[0]->QName)->whereDate('created_at','=',now())->count();
            $totalQ2 = queueModel::where('category',$categories[1]->QName)->whereDate('created_at','=',now())->count();
            $skips1 = queueModel::where('category',$categories[0]->QName)->where('skipped',1)->whereDate('created_at','=',now())->count();
            $skips2 = queueModel::where('category',$categories[1]->QName)->where('skipped',1)->whereDate('created_at','=',now())->count();
            $dones1 = queueModel::where('category',$categories[0]->QName)->where('status','Inactive')->whereDate('created_at','=',now())->count();
            $dones2 = queueModel::where('category',$categories[1]->QName)->where('status','Inactive')->whereDate('created_at','=',now())->count();
            $avgmin1 = intval(queueModel::where('category',$categories[0]->QName)->whereDate('created_at','=',now())->avg('wait_time')/60);
            $avgsec1 = intval(queueModel::where('category',$categories[0]->QName)->whereDate('created_at','=',now())->avg('wait_time')%60);
            $avgmin2 = intval(queueModel::where('category',$categories[1]->QName)->whereDate('created_at','=',now())->avg('wait_time')/60);
            $avgsec2 = intval(queueModel::where('category',$categories[1]->QName)->whereDate('created_at','=',now())->avg('wait_time')%60);
            $avgWaitQ1 = $avgmin1.':'.$avgsec1;
            $avgWaitQ2 = $avgmin2.':'.$avgsec2;
            $fastmin1 = intval(queueModel::where('category',$categories[0]->QName)->whereDate('created_at','=',now())->min('wait_time')/60);
            $fastsec1 = intval(queueModel::where('category',$categories[0]->QName)->whereDate('created_at','=',now())->min('wait_time')%60);
            $fastmin2 = intval(queueModel::where('category',$categories[1]->QName)->whereDate('created_at','=',now())->min('wait_time')/60);
            $fastsec2 = intval(queueModel::where('category',$categories[1]->QName)->whereDate('created_at','=',now())->min('wait_time')%60);
            $fastestQ1 = $fastmin1.':'.$fastsec1;
            $fastestQ2 = $fastmin2.':'.$fastsec2;
            $longmin1 = intval(queueModel::where('category',$categories[0]->QName)->whereDate('created_at','=',now())->max('wait_time')/60);
            $longsec1 = intval(queueModel::where('category',$categories[0]->QName)->whereDate('created_at','=',now())->max('wait_time')%60);
            $longmin2 = intval(queueModel::where('category',$categories[1]->QName)->whereDate('created_at','=',now())->max('wait_time')/60);
            $longsec2 = intval(queueModel::where('category',$categories[1]->QName)->whereDate('created_at','=',now())->max('wait_time')%60);
            $longestQ1 = $longmin1.':'.$longsec1;
            $longestQ2 = $longmin2.':'.$longsec2;
            if ($avgWaitQ1 == null && $fastestQ1 == null && $longestQ1 == null) {
                $avgWaitQ1 = '0';
                $fastestQ1 = '0';
                $longestQ1 = '0';
            }
            if ($avgWaitQ2 == null && $fastestQ2 == null && $longestQ2 == null) {
                $avgWaitQ2 = '0';
                $fastestQ2 = '0';
                $longestQ2 = '0';
            }
        }elseif($categories->count() == 3){
            $totalQ1 = queueModel::where('category',$categories[0]->QName)->whereDate('created_at','=',now())->count();
            $totalQ2 = queueModel::where('category',$categories[1]->QName)->whereDate('created_at','=',now())->count();
            $totalQ3 = queueModel::where('category',$categories[2]->QName)->whereDate('created_at','=',now())->count();
            $skips1 = queueModel::where('category',$categories[0]->QName)->where('skipped',1)->whereDate('created_at','=',now())->count();
            $skips2 = queueModel::where('category',$categories[1]->QName)->where('skipped',1)->whereDate('created_at','=',now())->count();
            $skips3 = queueModel::where('category',$categories[2]->QName)->where('skipped',1)->whereDate('created_at','=',now())->count();
            $dones1 = queueModel::where('category',$categories[0]->QName)->where('status','Inactive')->whereDate('created_at','=',now())->count();
            $dones2 = queueModel::where('category',$categories[1]->QName)->where('status','Inactive')->whereDate('created_at','=',now())->count();
            $dones3 = queueModel::where('category',$categories[2]->QName)->where('status','Inactive')->whereDate('created_at','=',now())->count();
            $avgmin1 = intval(queueModel::where('category',$categories[0]->QName)->whereDate('created_at','=',now())->avg('wait_time')/60);
            $avgsec1 = intval(queueModel::where('category',$categories[0]->QName)->whereDate('created_at','=',now())->avg('wait_time')%60);
            $avgmin2 = intval(queueModel::where('category',$categories[1]->QName)->whereDate('created_at','=',now())->avg('wait_time')/60);
            $avgsec2 = intval(queueModel::where('category',$categories[1]->QName)->whereDate('created_at','=',now())->avg('wait_time')%60);
            $avgmin3 = intval(queueModel::where('category',$categories[2]->QName)->whereDate('created_at','=',now())->avg('wait_time')/60);
            $avgsec3 = intval(queueModel::where('category',$categories[2]->QName)->whereDate('created_at','=',now())->avg('wait_time')%60);
            $avgWaitQ1 = $avgmin1.':'.$avgsec1;
            $avgWaitQ2 = $avgmin2.':'.$avgsec2;
            $avgWaitQ3 = $avgmin3.':'.$avgsec3;
            $fastmin1 = intval(queueModel::where('category',$categories[0]->QName)->whereDate('created_at','=',now())->min('wait_time')/60);
            $fastsec1 = intval(queueModel::where('category',$categories[0]->QName)->whereDate('created_at','=',now())->min('wait_time')%60);
            $fastmin2 = intval(queueModel::where('category',$categories[1]->QName)->whereDate('created_at','=',now())->min('wait_time')/60);
            $fastsec2 = intval(queueModel::where('category',$categories[1]->QName)->whereDate('created_at','=',now())->min('wait_time')%60);
            $fastmin3 = intval(queueModel::where('category',$categories[2]->QName)->whereDate('created_at','=',now())->min('wait_time')/60);
            $fastsec3 = intval(queueModel::where('category',$categories[2]->QName)->whereDate('created_at','=',now())->min('wait_time')%60);
            $fastestQ1 = $fastmin1.':'.$fastsec1;
            $fastestQ2 = $fastmin2.':'.$fastsec2;
            $fastestQ3 = $fastmin3.':'.$fastsec3;
            $longmin1 = intval(queueModel::where('category',$categories[0]->QName)->whereDate('created_at','=',now())->max('wait_time')/60);
            $longsec1 = intval(queueModel::where('category',$categories[0]->QName)->whereDate('created_at','=',now())->max('wait_time')%60);
            $longmin2 = intval(queueModel::where('category',$categories[1]->QName)->whereDate('created_at','=',now())->max('wait_time')/60);
            $longsec2 = intval(queueModel::where('category',$categories[1]->QName)->whereDate('created_at','=',now())->max('wait_time')%60);
            $longmin3 = intval(queueModel::where('category',$categories[2]->QName)->whereDate('created_at','=',now())->max('wait_time')/60);
            $longsec3 = intval(queueModel::where('category',$categories[2]->QName)->whereDate('created_at','=',now())->max('wait_time')%60);
            $longestQ1 = $longmin1.':'.$longsec1;
            $longestQ2 = $longmin2.':'.$longsec2;
            $longestQ3 = $longmin3.':'.$longsec3;
            if ($avgWaitQ1 == null && $fastestQ1 == null && $longestQ1 == null) {
                $avgWaitQ1 = '0';
                $fastestQ1 = '0';
                $longestQ1 = '0';
            }
            if ($avgWaitQ2 == null && $fastestQ2 == null && $longestQ2 == null) {
                $avgWaitQ2 = '0';
                $fastestQ2 = '0';
                $longestQ2 = '0';
            }
            if ($avgWaitQ3 == null && $fastestQ3 == null && $longestQ3 == null) {
                $avgWaitQ3 = '0';
                $fastestQ3 = '0';
                $longestQ3 = '0';
            }
        }elseif($categories->count() == 4){
            $totalQ1 = queueModel::where('category',$categories[0]->QName)->whereDate('created_at','=',now())->count();
            $totalQ2 = queueModel::where('category',$categories[1]->QName)->whereDate('created_at','=',now())->count();
            $totalQ3 = queueModel::where('category',$categories[2]->QName)->whereDate('created_at','=',now())->count();
            $totalQ4 = queueModel::where('category',$categories[3]->QName)->whereDate('created_at','=',now())->count();
            $skips1 = queueModel::where('category',$categories[0]->QName)->where('skipped',1)->whereDate('created_at','=',now())->count();
            $skips2 = queueModel::where('category',$categories[1]->QName)->where('skipped',1)->whereDate('created_at','=',now())->count();
            $skips3 = queueModel::where('category',$categories[2]->QName)->where('skipped',1)->whereDate('created_at','=',now())->count();
            $skips4 = queueModel::where('category',$categories[3]->QName)->where('skipped',1)->whereDate('created_at','=',now())->count();
            $dones1 = queueModel::where('category',$categories[0]->QName)->where('status','Inactive')->whereDate('created_at','=',now())->count();
            $dones2 = queueModel::where('category',$categories[1]->QName)->where('status','Inactive')->whereDate('created_at','=',now())->count();
            $dones3 = queueModel::where('category',$categories[2]->QName)->where('status','Inactive')->whereDate('created_at','=',now())->count();
            $dones4 = queueModel::where('category',$categories[3]->QName)->where('status','Inactive')->whereDate('created_at','=',now())->count();
            $avgmin1 = intval(queueModel::where('category',$categories[0]->QName)->whereDate('created_at','=',now())->avg('wait_time')/60);
            $avgsec1 = intval(queueModel::where('category',$categories[0]->QName)->whereDate('created_at','=',now())->avg('wait_time')%60);
            $avgmin2 = intval(queueModel::where('category',$categories[1]->QName)->whereDate('created_at','=',now())->avg('wait_time')/60);
            $avgsec2 = intval(queueModel::where('category',$categories[1]->QName)->whereDate('created_at','=',now())->avg('wait_time')%60);
            $avgmin3 = intval(queueModel::where('category',$categories[2]->QName)->whereDate('created_at','=',now())->avg('wait_time')/60);
            $avgsec3 = intval(queueModel::where('category',$categories[2]->QName)->whereDate('created_at','=',now())->avg('wait_time')%60);
            $avgmin4 = intval(queueModel::where('category',$categories[3]->QName)->whereDate('created_at','=',now())->avg('wait_time')/60);
            $avgsec4 = intval(queueModel::where('category',$categories[3]->QName)->whereDate('created_at','=',now())->avg('wait_time')%60);
            $avgWaitQ1 = $avgmin1.':'.$avgsec1;
            $avgWaitQ2 = $avgmin2.':'.$avgsec2;
            $avgWaitQ3 = $avgmin3.':'.$avgsec3;
            $avgWaitQ4 = $avgmin4.':'.$avgsec4;
            $fastmin1 = intval(queueModel::where('category',$categories[0]->QName)->whereDate('created_at','=',now())->min('wait_time')/60);
            $fastsec1 = intval(queueModel::where('category',$categories[0]->QName)->whereDate('created_at','=',now())->min('wait_time')%60);
            $fastmin2 = intval(queueModel::where('category',$categories[1]->QName)->whereDate('created_at','=',now())->min('wait_time')/60);
            $fastsec2 = intval(queueModel::where('category',$categories[1]->QName)->whereDate('created_at','=',now())->min('wait_time')%60);
            $fastmin3 = intval(queueModel::where('category',$categories[2]->QName)->whereDate('created_at','=',now())->min('wait_time')/60);
            $fastsec3 = intval(queueModel::where('category',$categories[2]->QName)->whereDate('created_at','=',now())->min('wait_time')%60);
            $fastmin4 = intval(queueModel::where('category',$categories[3]->QName)->whereDate('created_at','=',now())->min('wait_time')/60);
            $fastsec4 = intval(queueModel::where('category',$categories[3]->QName)->whereDate('created_at','=',now())->min('wait_time')%60);
            $fastestQ1 = $fastmin1.':'.$fastsec1;
            $fastestQ2 = $fastmin2.':'.$fastsec2;
            $fastestQ3 = $fastmin3.':'.$fastsec3;
            $fastestQ4 = $fastmin4.':'.$fastsec4;
            $longmin1 = intval(queueModel::where('category',$categories[0]->QName)->whereDate('created_at','=',now())->max('wait_time')/60);
            $longsec1 = intval(queueModel::where('category',$categories[0]->QName)->whereDate('created_at','=',now())->max('wait_time')%60);
            $longmin2 = intval(queueModel::where('category',$categories[1]->QName)->whereDate('created_at','=',now())->max('wait_time')/60);
            $longsec2 = intval(queueModel::where('category',$categories[1]->QName)->whereDate('created_at','=',now())->max('wait_time')%60);
            $longmin3 = intval(queueModel::where('category',$categories[2]->QName)->whereDate('created_at','=',now())->max('wait_time')/60);
            $longsec3 = intval(queueModel::where('category',$categories[2]->QName)->whereDate('created_at','=',now())->max('wait_time')%60);
            $longmin4 = intval(queueModel::where('category',$categories[3]->QName)->whereDate('created_at','=',now())->max('wait_time')/60);
            $longsec4 = intval(queueModel::where('category',$categories[3]->QName)->whereDate('created_at','=',now())->max('wait_time')%60);
            $longestQ1 = $longmin1.':'.$longsec1;
            $longestQ2 = $longmin2.':'.$longsec2;
            $longestQ3 = $longmin3.':'.$longsec3;
            $longestQ4 = $longmin4.':'.$longsec4;
            if ($avgWaitQ1 == null && $fastestQ1 == null && $longestQ1 == null) {
                $avgWaitQ1 = '0';
                $fastestQ1 = '0';
                $longestQ1 = '0';
            }
            if ($avgWaitQ2 == null && $fastestQ2 == null && $longestQ2 == null) {
                $avgWaitQ2 = '0';
                $fastestQ2 = '0';
                $longestQ2 = '0';
            }
            if ($avgWaitQ3 == null && $fastestQ3 == null && $longestQ3 == null) {
                $avgWaitQ3 = '0';
                $fastestQ3 = '0';
                $longestQ3 = '0';
            }
            if ($avgWaitQ4 == null && $fastestQ4 == null && $longestQ4 == null) {
                $avgWaitQ4 = '0';
                $fastestQ4 = '0';
                $longestQ4 = '0';
            }
        }elseif($categories->count() == 5){
            $totalQ1 = queueModel::where('category',$categories[0]->QName)->whereDate('created_at','=',now())->count();
            $totalQ2 = queueModel::where('category',$categories[1]->QName)->whereDate('created_at','=',now())->count();
            $totalQ3 = queueModel::where('category',$categories[2]->QName)->whereDate('created_at','=',now())->count();
            $totalQ4 = queueModel::where('category',$categories[3]->QName)->whereDate('created_at','=',now())->count();
            $totalQ5 = queueModel::where('category',$categories[4]->QName)->whereDate('created_at','=',now())->count();
            $skips1 = queueModel::where('category',$categories[0]->QName)->where('skipped',1)->whereDate('created_at','=',now())->count();
            $skips2 = queueModel::where('category',$categories[1]->QName)->where('skipped',1)->whereDate('created_at','=',now())->count();
            $skips3 = queueModel::where('category',$categories[2]->QName)->where('skipped',1)->whereDate('created_at','=',now())->count();
            $skips4 = queueModel::where('category',$categories[3]->QName)->where('skipped',1)->whereDate('created_at','=',now())->count();
            $skips5 = queueModel::where('category',$categories[4]->QName)->where('skipped',1)->whereDate('created_at','=',now())->count();
            $dones1 = queueModel::where('category',$categories[0]->QName)->where('status','Inactive')->whereDate('created_at','=',now())->count();
            $dones2 = queueModel::where('category',$categories[1]->QName)->where('status','Inactive')->whereDate('created_at','=',now())->count();
            $dones3 = queueModel::where('category',$categories[2]->QName)->where('status','Inactive')->whereDate('created_at','=',now())->count();
            $dones4 = queueModel::where('category',$categories[3]->QName)->where('status','Inactive')->whereDate('created_at','=',now())->count();
            $dones5 = queueModel::where('category',$categories[4]->QName)->where('status','Inactive')->whereDate('created_at','=',now())->count();
            $avgmin1 = intval(queueModel::where('category',$categories[0]->QName)->whereDate('created_at','=',now())->avg('wait_time')/60);
            $avgsec1 = intval(queueModel::where('category',$categories[0]->QName)->whereDate('created_at','=',now())->avg('wait_time')%60);
            $avgmin2 = intval(queueModel::where('category',$categories[1]->QName)->whereDate('created_at','=',now())->avg('wait_time')/60);
            $avgsec2 = intval(queueModel::where('category',$categories[1]->QName)->whereDate('created_at','=',now())->avg('wait_time')%60);
            $avgmin3 = intval(queueModel::where('category',$categories[2]->QName)->whereDate('created_at','=',now())->avg('wait_time')/60);
            $avgsec3 = intval(queueModel::where('category',$categories[2]->QName)->whereDate('created_at','=',now())->avg('wait_time')%60);
            $avgmin4 = intval(queueModel::where('category',$categories[3]->QName)->whereDate('created_at','=',now())->avg('wait_time')/60);
            $avgsec4 = intval(queueModel::where('category',$categories[3]->QName)->whereDate('created_at','=',now())->avg('wait_time')%60);
            $avgmin5 = intval(queueModel::where('category',$categories[4]->QName)->whereDate('created_at','=',now())->avg('wait_time')/60);
            $avgsec5 = intval(queueModel::where('category',$categories[4]->QName)->whereDate('created_at','=',now())->avg('wait_time')%60);
            $avgWaitQ1 = $avgmin1.':'.$avgsec1;
            $avgWaitQ2 = $avgmin2.':'.$avgsec2;
            $avgWaitQ3 = $avgmin3.':'.$avgsec3;
            $avgWaitQ4 = $avgmin4.':'.$avgsec4;
            $avgWaitQ5 = $avgmin5.':'.$avgsec5;
            $fastmin1 = intval(queueModel::where('category',$categories[0]->QName)->whereDate('created_at','=',now())->min('wait_time')/60);
            $fastsec1 = intval(queueModel::where('category',$categories[0]->QName)->whereDate('created_at','=',now())->min('wait_time')%60);
            $fastmin2 = intval(queueModel::where('category',$categories[1]->QName)->whereDate('created_at','=',now())->min('wait_time')/60);
            $fastsec2 = intval(queueModel::where('category',$categories[1]->QName)->whereDate('created_at','=',now())->min('wait_time')%60);
            $fastmin3 = intval(queueModel::where('category',$categories[2]->QName)->whereDate('created_at','=',now())->min('wait_time')/60);
            $fastsec3 = intval(queueModel::where('category',$categories[2]->QName)->whereDate('created_at','=',now())->min('wait_time')%60);
            $fastmin4 = intval(queueModel::where('category',$categories[3]->QName)->whereDate('created_at','=',now())->min('wait_time')/60);
            $fastsec4 = intval(queueModel::where('category',$categories[3]->QName)->whereDate('created_at','=',now())->min('wait_time')%60);
            $fastmin5 = intval(queueModel::where('category',$categories[4]->QName)->whereDate('created_at','=',now())->min('wait_time')/60);
            $fastsec5 = intval(queueModel::where('category',$categories[4]->QName)->whereDate('created_at','=',now())->min('wait_time')%60);
            $fastestQ1 = $fastmin1.':'.$fastsec1;
            $fastestQ2 = $fastmin2.':'.$fastsec2;
            $fastestQ3 = $fastmin3.':'.$fastsec3;
            $fastestQ4 = $fastmin4.':'.$fastsec4;
            $fastestQ5 = $fastmin5.':'.$fastsec5;
            $longmin1 = intval(queueModel::where('category',$categories[0]->QName)->whereDate('created_at','=',now())->max('wait_time')/60);
            $longsec1 = intval(queueModel::where('category',$categories[0]->QName)->whereDate('created_at','=',now())->max('wait_time')%60);
            $longmin2 = intval(queueModel::where('category',$categories[1]->QName)->whereDate('created_at','=',now())->max('wait_time')/60);
            $longsec2 = intval(queueModel::where('category',$categories[1]->QName)->whereDate('created_at','=',now())->max('wait_time')%60);
            $longmin3 = intval(queueModel::where('category',$categories[2]->QName)->whereDate('created_at','=',now())->max('wait_time')/60);
            $longsec3 = intval(queueModel::where('category',$categories[2]->QName)->whereDate('created_at','=',now())->max('wait_time')%60);
            $longmin4 = intval(queueModel::where('category',$categories[3]->QName)->whereDate('created_at','=',now())->max('wait_time')/60);
            $longsec4 = intval(queueModel::where('category',$categories[3]->QName)->whereDate('created_at','=',now())->max('wait_time')%60);
            $longmin5 = intval(queueModel::where('category',$categories[4]->QName)->whereDate('created_at','=',now())->max('wait_time')/60);
            $longsec5 = intval(queueModel::where('category',$categories[4]->QName)->whereDate('created_at','=',now())->max('wait_time')%60);
            $longestQ1 = $longmin1.':'.$longsec1;
            $longestQ2 = $longmin2.':'.$longsec2;
            $longestQ3 = $longmin3.':'.$longsec3;
            $longestQ4 = $longmin4.':'.$longsec4;
            $longestQ5 = $longmin5.':'.$longsec5;
            if ($avgWaitQ1 == null && $fastestQ1 == null && $longestQ1 == null) {
                $avgWaitQ1 = '0';
                $fastestQ1 = '0';
                $longestQ1 = '0';
            }
            if ($avgWaitQ2 == null && $fastestQ2 == null && $longestQ2 == null) {
                $avgWaitQ2 = '0';
                $fastestQ2 = '0';
                $longestQ2 = '0';
            }
            if ($avgWaitQ3 == null && $fastestQ3 == null && $longestQ3 == null) {
                $avgWaitQ3 = '0';
                $fastestQ3 = '0';
                $longestQ3 = '0';
            }
            if ($avgWaitQ4 == null && $fastestQ4 == null && $longestQ4 == null) {
                $avgWaitQ4 = '0';
                $fastestQ4 = '0';
                $longestQ4 = '0';
            }
            if ($avgWaitQ5 == null && $fastestQ5 == null && $longestQ5 == null) {
                $avgWaitQ5 = '0';
                $fastestQ5 = '0';
                $longestQ5 = '0';
            }
        }

        //calculate overall statistics
        if ($categories->count() == 1) {
            $avgmin1 = intval(queueModel::where('category',$categories[0]->QName)->avg('wait_time')/60);
            $avgsec1 = intval(queueModel::where('category',$categories[0]->QName)->avg('wait_time')%60);
            $overAvg1 = $avgmin1.':'.$avgsec1;
            $fastmin1 = intval(queueModel::where('category',$categories[0]->QName)->min('wait_time')/60);
            $fastsec1 = intval(queueModel::where('category',$categories[0]->QName)->min('wait_time')%60);
            $overFast1 = $fastmin1.':'.$fastsec1;
            $longmin1 = intval(queueModel::where('category',$categories[0]->QName)->max('wait_time')/60);
            $longsec1 = intval(queueModel::where('category',$categories[0]->QName)->max('wait_time')%60);
            $overLong1 = $longmin1.':'.$longsec1;
            if ($overAvg1 == null && $overFast1 == null && $overLong1 == null) {
                $overAvg1 = '0';
                $overFast1 = '0';
                $overLong1 = '0';
            }
        }elseif($categories->count() == 2){
            $avgmin1 = intval(queueModel::where('category',$categories[0]->QName)->avg('wait_time')/60);
            $avgsec1 = intval(queueModel::where('category',$categories[0]->QName)->avg('wait_time')%60);
            $avgmin2 = intval(queueModel::where('category',$categories[1]->QName)->avg('wait_time')/60);
            $avgsec2 = intval(queueModel::where('category',$categories[1]->QName)->avg('wait_time')%60);
            $overAvg1 = $avgmin1.':'.$avgsec1;
            $overAvg2 = $avgmin2.':'.$avgsec2;
            $fastmin1 = intval(queueModel::where('category',$categories[0]->QName)->min('wait_time')/60);
            $fastsec1 = intval(queueModel::where('category',$categories[0]->QName)->min('wait_time')%60);
            $fastmin2 = intval(queueModel::where('category',$categories[1]->QName)->min('wait_time')/60);
            $fastsec2 = intval(queueModel::where('category',$categories[1]->QName)->min('wait_time')%60);
            $overFast1 = $fastmin1.':'.$fastsec1;
            $overFast2 = $fastmin2.':'.$fastsec2;
            $longmin1 = intval(queueModel::where('category',$categories[0]->QName)->max('wait_time')/60);
            $longsec1 = intval(queueModel::where('category',$categories[0]->QName)->max('wait_time')%60);
            $longmin2 = intval(queueModel::where('category',$categories[1]->QName)->max('wait_time')/60);
            $longsec2 = intval(queueModel::where('category',$categories[1]->QName)->max('wait_time')%60);
            $overLong1 = $longmin1.':'.$longsec1;
            $overLong2 = $longmin2.':'.$longsec2;

            if ($overAvg1 == null && $overFast1 == null && $overLong1 == null) {
                $overAvg1 = '0';
                $overFast1 = '0';
                $overLong1 = '0';
            }

            if ($overAvg2 == null && $overFast2 == null && $overLong2 == null) {
                $overAvg2 = '0';
                $overFast2 = '0';
                $overLong2 = '0';
            }
        }elseif($categories->count() == 3){
            $avgmin1 = intval(queueModel::where('category',$categories[0]->QName)->avg('wait_time')/60);
            $avgsec1 = intval(queueModel::where('category',$categories[0]->QName)->avg('wait_time')%60);
            $avgmin2 = intval(queueModel::where('category',$categories[1]->QName)->avg('wait_time')/60);
            $avgsec2 = intval(queueModel::where('category',$categories[1]->QName)->avg('wait_time')%60);
            $avgmin3 = intval(queueModel::where('category',$categories[2]->QName)->avg('wait_time')/60);
            $avgsec3 = intval(queueModel::where('category',$categories[2]->QName)->avg('wait_time')%60);
            $overAvg1 = $avgmin1.':'.$avgsec1;
            $overAvg2 = $avgmin2.':'.$avgsec2;
            $overAvg3 = $avgmin3.':'.$avgsec3;
            $fastmin1 = intval(queueModel::where('category',$categories[0]->QName)->min('wait_time')/60);
            $fastsec1 = intval(queueModel::where('category',$categories[0]->QName)->min('wait_time')%60);
            $fastmin2 = intval(queueModel::where('category',$categories[1]->QName)->min('wait_time')/60);
            $fastsec2 = intval(queueModel::where('category',$categories[1]->QName)->min('wait_time')%60);
            $fastmin3 = intval(queueModel::where('category',$categories[2]->QName)->min('wait_time')/60);
            $fastsec3 = intval(queueModel::where('category',$categories[2]->QName)->min('wait_time')%60);
            $overFast1 = $fastmin1.':'.$fastsec1;
            $overFast2 = $fastmin2.':'.$fastsec2;
            $overFast3 = $fastmin3.':'.$fastsec3;
            $longmin1 = intval(queueModel::where('category',$categories[0]->QName)->max('wait_time')/60);
            $longsec1 = intval(queueModel::where('category',$categories[0]->QName)->max('wait_time')%60);
            $longmin2 = intval(queueModel::where('category',$categories[1]->QName)->max('wait_time')/60);
            $longsec2 = intval(queueModel::where('category',$categories[1]->QName)->max('wait_time')%60);
            $longmin3 = intval(queueModel::where('category',$categories[2]->QName)->max('wait_time')/60);
            $longsec3 = intval(queueModel::where('category',$categories[2]->QName)->max('wait_time')%60);
            $overLong1 = $longmin1.':'.$longsec1;
            $overLong2 = $longmin2.':'.$longsec2;
            $overLong3 = $longmin3.':'.$longsec3;

            if ($overAvg1 == null && $overFast1 == null && $overLong1 == null) {
                $overAvg1 = '0';
                $overFast1 = '0';
                $overLong1 = '0';
            }

            if ($overAvg2 == null && $overFast2 == null && $overLong2 == null) {
                $overAvg2 = '0';
                $overFast2 = '0';
                $overLong2 = '0';
            }

            if ($overAvg3 == null && $overFast3 == null && $overLong3 == null) {
                $overAvg3 = '0';
                $overFast3 = '0';
                $overLong3 = '0';
            }
        }elseif($categories->count() == 4){
            $avgmin1 = intval(queueModel::where('category',$categories[0]->QName)->avg('wait_time')/60);
            $avgsec1 = intval(queueModel::where('category',$categories[0]->QName)->avg('wait_time')%60);
            $avgmin2 = intval(queueModel::where('category',$categories[1]->QName)->avg('wait_time')/60);
            $avgsec2 = intval(queueModel::where('category',$categories[1]->QName)->avg('wait_time')%60);
            $avgmin3 = intval(queueModel::where('category',$categories[2]->QName)->avg('wait_time')/60);
            $avgsec3 = intval(queueModel::where('category',$categories[2]->QName)->avg('wait_time')%60);
            $avgmin4 = intval(queueModel::where('category',$categories[3]->QName)->avg('wait_time')/60);
            $avgsec4 = intval(queueModel::where('category',$categories[3]->QName)->avg('wait_time')%60);
            $overAvg1 = $avgmin1.':'.$avgsec1;
            $overAvg2 = $avgmin2.':'.$avgsec2;
            $overAvg3 = $avgmin3.':'.$avgsec3;
            $overAvg4 = $avgmin4.':'.$avgsec4;
            $fastmin1 = intval(queueModel::where('category',$categories[0]->QName)->min('wait_time')/60);
            $fastsec1 = intval(queueModel::where('category',$categories[0]->QName)->min('wait_time')%60);
            $fastmin2 = intval(queueModel::where('category',$categories[1]->QName)->min('wait_time')/60);
            $fastsec2 = intval(queueModel::where('category',$categories[1]->QName)->min('wait_time')%60);
            $fastmin3 = intval(queueModel::where('category',$categories[2]->QName)->min('wait_time')/60);
            $fastsec3 = intval(queueModel::where('category',$categories[2]->QName)->min('wait_time')%60);
            $fastmin4 = intval(queueModel::where('category',$categories[3]->QName)->min('wait_time')/60);
            $fastsec4 = intval(queueModel::where('category',$categories[3]->QName)->min('wait_time')%60);
            $overFast1 = $fastmin1.':'.$fastsec1;
            $overFast2 = $fastmin2.':'.$fastsec2;
            $overFast3 = $fastmin3.':'.$fastsec3;
            $overFast4 = $fastmin4.':'.$fastsec4;
            $longmin1 = intval(queueModel::where('category',$categories[0]->QName)->max('wait_time')/60);
            $longsec1 = intval(queueModel::where('category',$categories[0]->QName)->max('wait_time')%60);
            $longmin2 = intval(queueModel::where('category',$categories[1]->QName)->max('wait_time')/60);
            $longsec2 = intval(queueModel::where('category',$categories[1]->QName)->max('wait_time')%60);
            $longmin3 = intval(queueModel::where('category',$categories[2]->QName)->max('wait_time')/60);
            $longsec3 = intval(queueModel::where('category',$categories[2]->QName)->max('wait_time')%60);
            $longmin4 = intval(queueModel::where('category',$categories[3]->QName)->max('wait_time')/60);
            $longsec4 = intval(queueModel::where('category',$categories[3]->QName)->max('wait_time')%60);
            $overLong1 = $longmin1.':'.$longsec1;
            $overLong2 = $longmin2.':'.$longsec2;
            $overLong3 = $longmin3.':'.$longsec3;
            $overLong4 = $longmin4.':'.$longsec4;

            if ($overAvg1 == null && $overFast1 == null && $overLong1 == null) {
                $overAvg1 = '0';
                $overFast1 = '0';
                $overLong1 = '0';
            }

            if ($overAvg2 == null && $overFast2 == null && $overLong2 == null) {
                $overAvg2 = '0';
                $overFast2 = '0';
                $overLong2 = '0';
            }

            if ($overAvg3 == null && $overFast3 == null && $overLong3 == null) {
                $overAvg3 = '0';
                $overFast3 = '0';
                $overLong3 = '0';
            }

            if ($overAvg4 == null && $overFast4 == null && $overLong4 == null) {
                $overAvg4 = '0';
                $overFast4 = '0';
                $overLong4 = '0';
            }
        }elseif($categories->count() == 5){
            $avgmin1 = intval(queueModel::where('category',$categories[0]->QName)->avg('wait_time')/60);
            $avgsec1 = intval(queueModel::where('category',$categories[0]->QName)->avg('wait_time')%60);
            $avgmin2 = intval(queueModel::where('category',$categories[1]->QName)->avg('wait_time')/60);
            $avgsec2 = intval(queueModel::where('category',$categories[1]->QName)->avg('wait_time')%60);
            $avgmin3 = intval(queueModel::where('category',$categories[2]->QName)->avg('wait_time')/60);
            $avgsec3 = intval(queueModel::where('category',$categories[2]->QName)->avg('wait_time')%60);
            $avgmin4 = intval(queueModel::where('category',$categories[3]->QName)->avg('wait_time')/60);
            $avgsec4 = intval(queueModel::where('category',$categories[3]->QName)->avg('wait_time')%60);
            $avgmin5 = intval(queueModel::where('category',$categories[4]->QName)->avg('wait_time')/60);
            $avgsec5 = intval(queueModel::where('category',$categories[4]->QName)->avg('wait_time')%60);
            $overAvg1 = $avgmin1.':'.$avgsec1;
            $overAvg2 = $avgmin2.':'.$avgsec2;
            $overAvg3 = $avgmin3.':'.$avgsec3;
            $overAvg4 = $avgmin4.':'.$avgsec4;
            $overAvg5 = $avgmin5.':'.$avgsec5;
            $fastmin1 = intval(queueModel::where('category',$categories[0]->QName)->min('wait_time')/60);
            $fastsec1 = intval(queueModel::where('category',$categories[0]->QName)->min('wait_time')%60);
            $fastmin2 = intval(queueModel::where('category',$categories[1]->QName)->min('wait_time')/60);
            $fastsec2 = intval(queueModel::where('category',$categories[1]->QName)->min('wait_time')%60);
            $fastmin3 = intval(queueModel::where('category',$categories[2]->QName)->min('wait_time')/60);
            $fastsec3 = intval(queueModel::where('category',$categories[2]->QName)->min('wait_time')%60);
            $fastmin4 = intval(queueModel::where('category',$categories[3]->QName)->min('wait_time')/60);
            $fastsec4 = intval(queueModel::where('category',$categories[3]->QName)->min('wait_time')%60);
            $fastmin5 = intval(queueModel::where('category',$categories[4]->QName)->min('wait_time')/60);
            $fastsec5 = intval(queueModel::where('category',$categories[4]->QName)->min('wait_time')%60);
            $overFast1 = $fastmin1.':'.$fastsec1;
            $overFast2 = $fastmin2.':'.$fastsec2;
            $overFast3 = $fastmin3.':'.$fastsec3;
            $overFast4 = $fastmin4.':'.$fastsec4;
            $overFast5 = $fastmin5.':'.$fastsec5;
            $longmin1 = intval(queueModel::where('category',$categories[0]->QName)->max('wait_time')/60);
            $longsec1 = intval(queueModel::where('category',$categories[0]->QName)->max('wait_time')%60);
            $longmin2 = intval(queueModel::where('category',$categories[1]->QName)->max('wait_time')/60);
            $longsec2 = intval(queueModel::where('category',$categories[1]->QName)->max('wait_time')%60);
            $longmin3 = intval(queueModel::where('category',$categories[2]->QName)->max('wait_time')/60);
            $longsec3 = intval(queueModel::where('category',$categories[2]->QName)->max('wait_time')%60);
            $longmin4 = intval(queueModel::where('category',$categories[3]->QName)->max('wait_time')/60);
            $longsec4 = intval(queueModel::where('category',$categories[3]->QName)->max('wait_time')%60);
            $longmin5 = intval(queueModel::where('category',$categories[4]->QName)->max('wait_time')/60);
            $longsec5 = intval(queueModel::where('category',$categories[4]->QName)->max('wait_time')%60);
            $overLong1 = $longmin1.':'.$longsec1;
            $overLong2 = $longmin2.':'.$longsec2;
            $overLong3 = $longmin3.':'.$longsec3;
            $overLong4 = $longmin4.':'.$longsec4;
            $overLong5 = $longmin5.':'.$longsec5;

            if ($overAvg1 == null && $overFast1 == null && $overLong1 == null) {
                $overAvg1 = '0';
                $overFast1 = '0';
                $overLong1 = '0';
            }

            if ($overAvg2 == null && $overFast2 == null && $overLong2 == null) {
                $overAvg2 = '0';
                $overFast2 = '0';
                $overLong2 = '0';
            }

            if ($overAvg3 == null && $overFast3 == null && $overLong3 == null) {
                $overAvg3 = '0';
                $overFast3 = '0';
                $overLong3 = '0';
            }

            if ($overAvg4 == null && $overFast4 == null && $overLong4 == null) {
                $overAvg4 = '0';
                $overFast4 = '0';
                $overLong4 = '0';
            }

            if ($overAvg5 == null && $overFast5 == null && $overLong5 == null) {
                $overAvg5 = '0';
                $overFast5 = '0';
                $overLong5 = '0';
            }
        }

        //Handled case by Employee
        $employee = User::where('role',1)->get();
        $employeeCount = User::where('role',1)->count();
        //to get category name per user by assign category id
        $employeeCategory = \DB::table('users')
        ->select('users.name','users.email','users.Assign_Category','CurrentQueue.QName')
        ->join('currentqueue','currentqueue.id','=','users.Assign_Category')
        ->where('role',1)->get();
        //calculate handle time by each employee per category
        for ($i=0; $i < $employeeCount; $i++) { 
            $handlemin[$i] = intval(queueModel::where('category',$employeeCategory[$i]->QName)->whereDate('created_at','=',now())->sum('wait_time')/60);
            $handlesec[$i] = intval(queueModel::where('category',$employeeCategory[$i]->QName)->whereDate('created_at','=',now())->sum('wait_time')%60);
            $eHandleTime[] = $handlemin[$i].':'.$handlesec[$i];
        }
        //redirect to Qtrack view with all the data
        return view('spvQTracking',['employeeData' => $employeeCategory, 'eHandleTime' => $eHandleTime, 'categoriess' => $categories,'totalCats' => $categories->count(), 'avgQ' => $avgWait, 'fastQ' => $fastestQ, 'longQ' => $longestQ],['avg1' => $avgWaitQ1, 'avg2' => $avgWaitQ2, 'avg3' => $avgWaitQ3, 'avg4' => $avgWaitQ4, 'avg5' => $avgWaitQ5,
        'tot1' => $totalQ1, 'tot2' => $totalQ2, 'tot3' => $totalQ3, 'tot4' => $totalQ4, 'tot5' => $totalQ5,
        'skip1' => $skips1, 'skip2' => $skips2, 'skip3' => $skips3, 'skip4' => $skips4, 'skip5' => $skips5,
        'done1' => $dones1, 'done2' => $dones2, 'done3' => $dones3, 'done4' => $dones4, 'done5' => $dones5,
        'fast1' => $fastestQ1, 'fast2' => $fastestQ2, 'fast3' => $fastestQ3, 'fast4' => $fastestQ4, 'fast5' => $fastestQ5,
        'long1' => $longestQ1, 'long2' => $longestQ2, 'long3' => $longestQ3, 'long4' => $longestQ4, 'long5' => $longestQ5,
        'overAvg1' => $overAvg1, 'overAvg2' => $overAvg2, 'overAvg3' => $overAvg3, 'overAvg4' => $overAvg4, 'overAvg5' => $overAvg5,
        'overFast1' => $overFast1, 'overFast2' => $overFast2, 'overFast3' => $overFast3, 'overFast4' => $overFast4, 'overFast5' => $overFast5,
        'overLong1' => $overLong1, 'overLong2' => $overLong2, 'overLong3' => $overLong3, 'overLong4' => $overLong4, 'overLong5' => $overLong5]);
    }

//show statistics data based on selected date
    public function reportOnDate(Request $request){
        //variable initiation
        $avgWaitQ1 = null; $avgWaitQ2 = null; $avgWaitQ3 = null; $avgWaitQ4 = null; $avgWaitQ5 = null;
        $fastestQ1 = null; $fastestQ2 = null; $fastestQ3 = null; $fastestQ4 = null; $fastestQ5 = null;
        $longestQ1 = null; $longestQ2 = null; $longestQ3 = null; $longestQ4 = null; $longestQ5 = null;
        $totalQ1 = null; $totalQ2 = null; $totalQ3 = null; $totalQ4 = null; $totalQ5 = null;
        $skips1 = null; $skips2 = null; $skips3 = null; $skips4 = null; $skips5 = null; 
        $dones1 = null; $dones2 = null; $dones3 = null; $dones4 = null; $dones5 = null; 
        $overAvg1 = null; $overAvg2 = null; $overAvg3 = null; $overAvg4 = null; $overAvg5 = null;
        $overFast1 = null; $overFast2 = null; $overFast3 = null; $overFast4 = null; $overFast5 = null;
        $overLong1 = null; $overLong2 = null; $overLong3 = null; $overLong4 = null; $overLong5 = null;
        $selectedDate = $request->datepicker;
        $categories = \DB::table('currentQueue')->get('QName');
        //calculate overall avg,fastes,longest queue time from seconds to Minutes:second format
        $avgmin = intval(queueModel::avg('wait_time')/60);
        $avgsec = intval(queueModel::avg('wait_time')%60);
        $avgWait = $avgmin.':'.$avgsec;
        $fastmin = intval(queueModel::min('wait_time')/60);
        $fastsec = intval(queueModel::min('wait_time')%60);
        $fastestQ = $fastmin.':'.$fastsec;
        $longmin = intval(queueModel::max('wait_time')/60);
        $longsec = intval(queueModel::max('wait_time')%60);
        $longestQ = $longmin.':'.$longsec;

        // dd($fastmin);
        //to find avg,fastest and longest Time per Q
        if ($categories->count() == 1) {
            $totalQ1 = queueModel::where('category',$categories[0]->QName)->whereDate('created_at','=',$selectedDate)->count();
            $skips1 = queueModel::where('category',$categories[0]->QName)->where('skipped',1)->whereDate('created_at','=',$selectedDate)->count();
            $dones1 = queueModel::where('category',$categories[0]->QName)->where('status','Inactive')->whereDate('created_at','=',$selectedDate)->count();
            $avgmin1 = intval(queueModel::where('category',$categories[0]->QName)->whereDate('created_at','=',$selectedDate)->avg('wait_time')/60);
            $avgsec1 = intval(queueModel::where('category',$categories[0]->QName)->whereDate('created_at','=',$selectedDate)->avg('wait_time')%60);
            $avgWaitQ1 = $avgmin1.':'.$avgsec1;
            $fastmin1 = intval(queueModel::where('category',$categories[0]->QName)->whereDate('created_at','=',$selectedDate)->min('wait_time')/60);
            $fastsec1 = intval(queueModel::where('category',$categories[0]->QName)->whereDate('created_at','=',$selectedDate)->min('wait_time')%60);
            $fastestQ1 = $fastmin1.':'.$fastsec1;
            $longmin1 = intval(queueModel::where('category',$categories[0]->QName)->whereDate('created_at','=',$selectedDate)->max('wait_time')/60);
            $longsec1 = intval(queueModel::where('category',$categories[0]->QName)->whereDate('created_at','=',$selectedDate)->max('wait_time')%60);
            $longestQ1 = $longmin1.':'.$longsec1;
            if ($avgWaitQ1 == null && $fastestQ1 == null && $longestQ1 == null) {
                $avgWaitQ1 = '0';
                $fastestQ1 = '0';
                $longestQ1 = '0';
            }
        }elseif($categories->count() == 2){
            $totalQ1 = queueModel::where('category',$categories[0]->QName)->whereDate('created_at','=',$selectedDate)->count();
            $totalQ2 = queueModel::where('category',$categories[1]->QName)->whereDate('created_at','=',$selectedDate)->count();
            $skips1 = queueModel::where('category',$categories[0]->QName)->where('skipped',1)->whereDate('created_at','=',$selectedDate)->count();
            $skips2 = queueModel::where('category',$categories[1]->QName)->where('skipped',1)->whereDate('created_at','=',$selectedDate)->count();
            $dones1 = queueModel::where('category',$categories[0]->QName)->where('status','Inactive')->whereDate('created_at','=',$selectedDate)->count();
            $dones2 = queueModel::where('category',$categories[1]->QName)->where('status','Inactive')->whereDate('created_at','=',$selectedDate)->count();
            $avgmin1 = intval(queueModel::where('category',$categories[0]->QName)->whereDate('created_at','=',$selectedDate)->avg('wait_time')/60);
            $avgsec1 = intval(queueModel::where('category',$categories[0]->QName)->whereDate('created_at','=',$selectedDate)->avg('wait_time')%60);
            $avgmin2 = intval(queueModel::where('category',$categories[1]->QName)->whereDate('created_at','=',$selectedDate)->avg('wait_time')/60);
            $avgsec2 = intval(queueModel::where('category',$categories[1]->QName)->whereDate('created_at','=',$selectedDate)->avg('wait_time')%60);
            $avgWaitQ1 = $avgmin1.':'.$avgsec1;
            $avgWaitQ2 = $avgmin2.':'.$avgsec2;
            $fastmin1 = intval(queueModel::where('category',$categories[0]->QName)->whereDate('created_at','=',$selectedDate)->min('wait_time')/60);
            $fastsec1 = intval(queueModel::where('category',$categories[0]->QName)->whereDate('created_at','=',$selectedDate)->min('wait_time')%60);
            $fastmin2 = intval(queueModel::where('category',$categories[1]->QName)->whereDate('created_at','=',$selectedDate)->min('wait_time')/60);
            $fastsec2 = intval(queueModel::where('category',$categories[1]->QName)->whereDate('created_at','=',$selectedDate)->min('wait_time')%60);
            $fastestQ1 = $fastmin1.':'.$fastsec1;
            $fastestQ2 = $fastmin2.':'.$fastsec2;
            $longmin1 = intval(queueModel::where('category',$categories[0]->QName)->whereDate('created_at','=',$selectedDate)->max('wait_time')/60);
            $longsec1 = intval(queueModel::where('category',$categories[0]->QName)->whereDate('created_at','=',$selectedDate)->max('wait_time')%60);
            $longmin2 = intval(queueModel::where('category',$categories[1]->QName)->whereDate('created_at','=',$selectedDate)->max('wait_time')/60);
            $longsec2 = intval(queueModel::where('category',$categories[1]->QName)->whereDate('created_at','=',$selectedDate)->max('wait_time')%60);
            $longestQ1 = $longmin1.':'.$longsec1;
            $longestQ2 = $longmin2.':'.$longsec2;
            if ($avgWaitQ1 == null && $fastestQ1 == null && $longestQ1 == null) {
                $avgWaitQ1 = '0';
                $fastestQ1 = '0';
                $longestQ1 = '0';
            }
            if ($avgWaitQ2 == null && $fastestQ2 == null && $longestQ2 == null) {
                $avgWaitQ2 = '0';
                $fastestQ2 = '0';
                $longestQ2 = '0';
            }
        }elseif($categories->count() == 3){
            $totalQ1 = queueModel::where('category',$categories[0]->QName)->whereDate('created_at','=',$selectedDate)->count();
            $totalQ2 = queueModel::where('category',$categories[1]->QName)->whereDate('created_at','=',$selectedDate)->count();
            $totalQ3 = queueModel::where('category',$categories[2]->QName)->whereDate('created_at','=',$selectedDate)->count();
            $skips1 = queueModel::where('category',$categories[0]->QName)->where('skipped',1)->whereDate('created_at','=',$selectedDate)->count();
            $skips2 = queueModel::where('category',$categories[1]->QName)->where('skipped',1)->whereDate('created_at','=',$selectedDate)->count();
            $skips3 = queueModel::where('category',$categories[2]->QName)->where('skipped',1)->whereDate('created_at','=',$selectedDate)->count();
            $dones1 = queueModel::where('category',$categories[0]->QName)->where('status','Inactive')->whereDate('created_at','=',$selectedDate)->count();
            $dones2 = queueModel::where('category',$categories[1]->QName)->where('status','Inactive')->whereDate('created_at','=',$selectedDate)->count();
            $dones3 = queueModel::where('category',$categories[2]->QName)->where('status','Inactive')->whereDate('created_at','=',$selectedDate)->count();
            $avgmin1 = intval(queueModel::where('category',$categories[0]->QName)->whereDate('created_at','=',$selectedDate)->avg('wait_time')/60);
            $avgsec1 = intval(queueModel::where('category',$categories[0]->QName)->whereDate('created_at','=',$selectedDate)->avg('wait_time')%60);
            $avgmin2 = intval(queueModel::where('category',$categories[1]->QName)->whereDate('created_at','=',$selectedDate)->avg('wait_time')/60);
            $avgsec2 = intval(queueModel::where('category',$categories[1]->QName)->whereDate('created_at','=',$selectedDate)->avg('wait_time')%60);
            $avgmin3 = intval(queueModel::where('category',$categories[2]->QName)->whereDate('created_at','=',$selectedDate)->avg('wait_time')/60);
            $avgsec3 = intval(queueModel::where('category',$categories[2]->QName)->whereDate('created_at','=',$selectedDate)->avg('wait_time')%60);
            $avgWaitQ1 = $avgmin1.':'.$avgsec1;
            $avgWaitQ2 = $avgmin2.':'.$avgsec2;
            $avgWaitQ3 = $avgmin3.':'.$avgsec3;
            $fastmin1 = intval(queueModel::where('category',$categories[0]->QName)->whereDate('created_at','=',$selectedDate)->min('wait_time')/60);
            $fastsec1 = intval(queueModel::where('category',$categories[0]->QName)->whereDate('created_at','=',$selectedDate)->min('wait_time')%60);
            $fastmin2 = intval(queueModel::where('category',$categories[1]->QName)->whereDate('created_at','=',$selectedDate)->min('wait_time')/60);
            $fastsec2 = intval(queueModel::where('category',$categories[1]->QName)->whereDate('created_at','=',$selectedDate)->min('wait_time')%60);
            $fastmin3 = intval(queueModel::where('category',$categories[2]->QName)->whereDate('created_at','=',$selectedDate)->min('wait_time')/60);
            $fastsec3 = intval(queueModel::where('category',$categories[2]->QName)->whereDate('created_at','=',$selectedDate)->min('wait_time')%60);
            $fastestQ1 = $fastmin1.':'.$fastsec1;
            $fastestQ2 = $fastmin2.':'.$fastsec2;
            $fastestQ3 = $fastmin3.':'.$fastsec3;
            $longmin1 = intval(queueModel::where('category',$categories[0]->QName)->whereDate('created_at','=',$selectedDate)->max('wait_time')/60);
            $longsec1 = intval(queueModel::where('category',$categories[0]->QName)->whereDate('created_at','=',$selectedDate)->max('wait_time')%60);
            $longmin2 = intval(queueModel::where('category',$categories[1]->QName)->whereDate('created_at','=',$selectedDate)->max('wait_time')/60);
            $longsec2 = intval(queueModel::where('category',$categories[1]->QName)->whereDate('created_at','=',$selectedDate)->max('wait_time')%60);
            $longmin3 = intval(queueModel::where('category',$categories[2]->QName)->whereDate('created_at','=',$selectedDate)->max('wait_time')/60);
            $longsec3 = intval(queueModel::where('category',$categories[2]->QName)->whereDate('created_at','=',$selectedDate)->max('wait_time')%60);
            $longestQ1 = $longmin1.':'.$longsec1;
            $longestQ2 = $longmin2.':'.$longsec2;
            $longestQ3 = $longmin3.':'.$longsec3;
            if ($avgWaitQ1 == null && $fastestQ1 == null && $longestQ1 == null) {
                $avgWaitQ1 = '0';
                $fastestQ1 = '0';
                $longestQ1 = '0';
            }
            if ($avgWaitQ2 == null && $fastestQ2 == null && $longestQ2 == null) {
                $avgWaitQ2 = '0';
                $fastestQ2 = '0';
                $longestQ2 = '0';
            }
            if ($avgWaitQ3 == null && $fastestQ3 == null && $longestQ3 == null) {
                $avgWaitQ3 = '0';
                $fastestQ3 = '0';
                $longestQ3 = '0';
            }
        }elseif($categories->count() == 4){
            $totalQ1 = queueModel::where('category',$categories[0]->QName)->whereDate('created_at','=',$selectedDate)->count();
            $totalQ2 = queueModel::where('category',$categories[1]->QName)->whereDate('created_at','=',$selectedDate)->count();
            $totalQ3 = queueModel::where('category',$categories[2]->QName)->whereDate('created_at','=',$selectedDate)->count();
            $totalQ4 = queueModel::where('category',$categories[3]->QName)->whereDate('created_at','=',$selectedDate)->count();
            $skips1 = queueModel::where('category',$categories[0]->QName)->where('skipped',1)->whereDate('created_at','=',$selectedDate)->count();
            $skips2 = queueModel::where('category',$categories[1]->QName)->where('skipped',1)->whereDate('created_at','=',$selectedDate)->count();
            $skips3 = queueModel::where('category',$categories[2]->QName)->where('skipped',1)->whereDate('created_at','=',$selectedDate)->count();
            $skips4 = queueModel::where('category',$categories[3]->QName)->where('skipped',1)->whereDate('created_at','=',$selectedDate)->count();
            $dones1 = queueModel::where('category',$categories[0]->QName)->where('status','Inactive')->whereDate('created_at','=',$selectedDate)->count();
            $dones2 = queueModel::where('category',$categories[1]->QName)->where('status','Inactive')->whereDate('created_at','=',$selectedDate)->count();
            $dones3 = queueModel::where('category',$categories[2]->QName)->where('status','Inactive')->whereDate('created_at','=',$selectedDate)->count();
            $dones4 = queueModel::where('category',$categories[3]->QName)->where('status','Inactive')->whereDate('created_at','=',$selectedDate)->count();
            $avgmin1 = intval(queueModel::where('category',$categories[0]->QName)->whereDate('created_at','=',$selectedDate)->avg('wait_time')/60);
            $avgsec1 = intval(queueModel::where('category',$categories[0]->QName)->whereDate('created_at','=',$selectedDate)->avg('wait_time')%60);
            $avgmin2 = intval(queueModel::where('category',$categories[1]->QName)->whereDate('created_at','=',$selectedDate)->avg('wait_time')/60);
            $avgsec2 = intval(queueModel::where('category',$categories[1]->QName)->whereDate('created_at','=',$selectedDate)->avg('wait_time')%60);
            $avgmin3 = intval(queueModel::where('category',$categories[2]->QName)->whereDate('created_at','=',$selectedDate)->avg('wait_time')/60);
            $avgsec3 = intval(queueModel::where('category',$categories[2]->QName)->whereDate('created_at','=',$selectedDate)->avg('wait_time')%60);
            $avgmin4 = intval(queueModel::where('category',$categories[3]->QName)->whereDate('created_at','=',$selectedDate)->avg('wait_time')/60);
            $avgsec4 = intval(queueModel::where('category',$categories[3]->QName)->whereDate('created_at','=',$selectedDate)->avg('wait_time')%60);
            $avgWaitQ1 = $avgmin1.':'.$avgsec1;
            $avgWaitQ2 = $avgmin2.':'.$avgsec2;
            $avgWaitQ3 = $avgmin3.':'.$avgsec3;
            $avgWaitQ4 = $avgmin4.':'.$avgsec4;
            $fastmin1 = intval(queueModel::where('category',$categories[0]->QName)->whereDate('created_at','=',$selectedDate)->min('wait_time')/60);
            $fastsec1 = intval(queueModel::where('category',$categories[0]->QName)->whereDate('created_at','=',$selectedDate)->min('wait_time')%60);
            $fastmin2 = intval(queueModel::where('category',$categories[1]->QName)->whereDate('created_at','=',$selectedDate)->min('wait_time')/60);
            $fastsec2 = intval(queueModel::where('category',$categories[1]->QName)->whereDate('created_at','=',$selectedDate)->min('wait_time')%60);
            $fastmin3 = intval(queueModel::where('category',$categories[2]->QName)->whereDate('created_at','=',$selectedDate)->min('wait_time')/60);
            $fastsec3 = intval(queueModel::where('category',$categories[2]->QName)->whereDate('created_at','=',$selectedDate)->min('wait_time')%60);
            $fastmin4 = intval(queueModel::where('category',$categories[3]->QName)->whereDate('created_at','=',$selectedDate)->min('wait_time')/60);
            $fastsec4 = intval(queueModel::where('category',$categories[3]->QName)->whereDate('created_at','=',$selectedDate)->min('wait_time')%60);
            $fastestQ1 = $fastmin1.':'.$fastsec1;
            $fastestQ2 = $fastmin2.':'.$fastsec2;
            $fastestQ3 = $fastmin3.':'.$fastsec3;
            $fastestQ4 = $fastmin4.':'.$fastsec4;
            $longmin1 = intval(queueModel::where('category',$categories[0]->QName)->whereDate('created_at','=',$selectedDate)->max('wait_time')/60);
            $longsec1 = intval(queueModel::where('category',$categories[0]->QName)->whereDate('created_at','=',$selectedDate)->max('wait_time')%60);
            $longmin2 = intval(queueModel::where('category',$categories[1]->QName)->whereDate('created_at','=',$selectedDate)->max('wait_time')/60);
            $longsec2 = intval(queueModel::where('category',$categories[1]->QName)->whereDate('created_at','=',$selectedDate)->max('wait_time')%60);
            $longmin3 = intval(queueModel::where('category',$categories[2]->QName)->whereDate('created_at','=',$selectedDate)->max('wait_time')/60);
            $longsec3 = intval(queueModel::where('category',$categories[2]->QName)->whereDate('created_at','=',$selectedDate)->max('wait_time')%60);
            $longmin4 = intval(queueModel::where('category',$categories[3]->QName)->whereDate('created_at','=',$selectedDate)->max('wait_time')/60);
            $longsec4 = intval(queueModel::where('category',$categories[3]->QName)->whereDate('created_at','=',$selectedDate)->max('wait_time')%60);
            $longestQ1 = $longmin1.':'.$longsec1;
            $longestQ2 = $longmin2.':'.$longsec2;
            $longestQ3 = $longmin3.':'.$longsec3;
            $longestQ4 = $longmin4.':'.$longsec4;
            if ($avgWaitQ1 == null && $fastestQ1 == null && $longestQ1 == null) {
                $avgWaitQ1 = '0';
                $fastestQ1 = '0';
                $longestQ1 = '0';
            }
            if ($avgWaitQ2 == null && $fastestQ2 == null && $longestQ2 == null) {
                $avgWaitQ2 = '0';
                $fastestQ2 = '0';
                $longestQ2 = '0';
            }
            if ($avgWaitQ3 == null && $fastestQ3 == null && $longestQ3 == null) {
                $avgWaitQ3 = '0';
                $fastestQ3 = '0';
                $longestQ3 = '0';
            }
            if ($avgWaitQ4 == null && $fastestQ4 == null && $longestQ4 == null) {
                $avgWaitQ4 = '0';
                $fastestQ4 = '0';
                $longestQ4 = '0';
            }
        }elseif($categories->count() == 5){
            $totalQ1 = queueModel::where('category',$categories[0]->QName)->whereDate('created_at','=',$selectedDate)->count();
            $totalQ2 = queueModel::where('category',$categories[1]->QName)->whereDate('created_at','=',$selectedDate)->count();
            $totalQ3 = queueModel::where('category',$categories[2]->QName)->whereDate('created_at','=',$selectedDate)->count();
            $totalQ4 = queueModel::where('category',$categories[3]->QName)->whereDate('created_at','=',$selectedDate)->count();
            $totalQ5 = queueModel::where('category',$categories[4]->QName)->whereDate('created_at','=',$selectedDate)->count();
            $skips1 = queueModel::where('category',$categories[0]->QName)->where('skipped',1)->whereDate('created_at','=',$selectedDate)->count();
            $skips2 = queueModel::where('category',$categories[1]->QName)->where('skipped',1)->whereDate('created_at','=',$selectedDate)->count();
            $skips3 = queueModel::where('category',$categories[2]->QName)->where('skipped',1)->whereDate('created_at','=',$selectedDate)->count();
            $skips4 = queueModel::where('category',$categories[3]->QName)->where('skipped',1)->whereDate('created_at','=',$selectedDate)->count();
            $skips5 = queueModel::where('category',$categories[4]->QName)->where('skipped',1)->whereDate('created_at','=',$selectedDate)->count();
            $dones1 = queueModel::where('category',$categories[0]->QName)->where('status','Inactive')->whereDate('created_at','=',$selectedDate)->count();
            $dones2 = queueModel::where('category',$categories[1]->QName)->where('status','Inactive')->whereDate('created_at','=',$selectedDate)->count();
            $dones3 = queueModel::where('category',$categories[2]->QName)->where('status','Inactive')->whereDate('created_at','=',$selectedDate)->count();
            $dones4 = queueModel::where('category',$categories[3]->QName)->where('status','Inactive')->whereDate('created_at','=',$selectedDate)->count();
            $dones5 = queueModel::where('category',$categories[4]->QName)->where('status','Inactive')->whereDate('created_at','=',$selectedDate)->count();
            $avgmin1 = intval(queueModel::where('category',$categories[0]->QName)->whereDate('created_at','=',$selectedDate)->avg('wait_time')/60);
            $avgsec1 = intval(queueModel::where('category',$categories[0]->QName)->whereDate('created_at','=',$selectedDate)->avg('wait_time')%60);
            $avgmin2 = intval(queueModel::where('category',$categories[1]->QName)->whereDate('created_at','=',$selectedDate)->avg('wait_time')/60);
            $avgsec2 = intval(queueModel::where('category',$categories[1]->QName)->whereDate('created_at','=',$selectedDate)->avg('wait_time')%60);
            $avgmin3 = intval(queueModel::where('category',$categories[2]->QName)->whereDate('created_at','=',$selectedDate)->avg('wait_time')/60);
            $avgsec3 = intval(queueModel::where('category',$categories[2]->QName)->whereDate('created_at','=',$selectedDate)->avg('wait_time')%60);
            $avgmin4 = intval(queueModel::where('category',$categories[3]->QName)->whereDate('created_at','=',$selectedDate)->avg('wait_time')/60);
            $avgsec4 = intval(queueModel::where('category',$categories[3]->QName)->whereDate('created_at','=',$selectedDate)->avg('wait_time')%60);
            $avgmin5 = intval(queueModel::where('category',$categories[4]->QName)->whereDate('created_at','=',$selectedDate)->avg('wait_time')/60);
            $avgsec5 = intval(queueModel::where('category',$categories[4]->QName)->whereDate('created_at','=',$selectedDate)->avg('wait_time')%60);
            $avgWaitQ1 = $avgmin1.':'.$avgsec1;
            $avgWaitQ2 = $avgmin2.':'.$avgsec2;
            $avgWaitQ3 = $avgmin3.':'.$avgsec3;
            $avgWaitQ4 = $avgmin4.':'.$avgsec4;
            $avgWaitQ5 = $avgmin5.':'.$avgsec5;
            $fastmin1 = intval(queueModel::where('category',$categories[0]->QName)->whereDate('created_at','=',$selectedDate)->min('wait_time')/60);
            $fastsec1 = intval(queueModel::where('category',$categories[0]->QName)->whereDate('created_at','=',$selectedDate)->min('wait_time')%60);
            $fastmin2 = intval(queueModel::where('category',$categories[1]->QName)->whereDate('created_at','=',$selectedDate)->min('wait_time')/60);
            $fastsec2 = intval(queueModel::where('category',$categories[1]->QName)->whereDate('created_at','=',$selectedDate)->min('wait_time')%60);
            $fastmin3 = intval(queueModel::where('category',$categories[2]->QName)->whereDate('created_at','=',$selectedDate)->min('wait_time')/60);
            $fastsec3 = intval(queueModel::where('category',$categories[2]->QName)->whereDate('created_at','=',$selectedDate)->min('wait_time')%60);
            $fastmin4 = intval(queueModel::where('category',$categories[3]->QName)->whereDate('created_at','=',$selectedDate)->min('wait_time')/60);
            $fastsec4 = intval(queueModel::where('category',$categories[3]->QName)->whereDate('created_at','=',$selectedDate)->min('wait_time')%60);
            $fastmin5 = intval(queueModel::where('category',$categories[4]->QName)->whereDate('created_at','=',$selectedDate)->min('wait_time')/60);
            $fastsec5 = intval(queueModel::where('category',$categories[4]->QName)->whereDate('created_at','=',$selectedDate)->min('wait_time')%60);
            $fastestQ1 = $fastmin1.':'.$fastsec1;
            $fastestQ2 = $fastmin2.':'.$fastsec2;
            $fastestQ3 = $fastmin3.':'.$fastsec3;
            $fastestQ4 = $fastmin4.':'.$fastsec4;
            $fastestQ5 = $fastmin5.':'.$fastsec5;
            $longmin1 = intval(queueModel::where('category',$categories[0]->QName)->whereDate('created_at','=',$selectedDate)->max('wait_time')/60);
            $longsec1 = intval(queueModel::where('category',$categories[0]->QName)->whereDate('created_at','=',$selectedDate)->max('wait_time')%60);
            $longmin2 = intval(queueModel::where('category',$categories[1]->QName)->whereDate('created_at','=',$selectedDate)->max('wait_time')/60);
            $longsec2 = intval(queueModel::where('category',$categories[1]->QName)->whereDate('created_at','=',$selectedDate)->max('wait_time')%60);
            $longmin3 = intval(queueModel::where('category',$categories[2]->QName)->whereDate('created_at','=',$selectedDate)->max('wait_time')/60);
            $longsec3 = intval(queueModel::where('category',$categories[2]->QName)->whereDate('created_at','=',$selectedDate)->max('wait_time')%60);
            $longmin4 = intval(queueModel::where('category',$categories[3]->QName)->whereDate('created_at','=',$selectedDate)->max('wait_time')/60);
            $longsec4 = intval(queueModel::where('category',$categories[3]->QName)->whereDate('created_at','=',$selectedDate)->max('wait_time')%60);
            $longmin5 = intval(queueModel::where('category',$categories[4]->QName)->whereDate('created_at','=',$selectedDate)->max('wait_time')/60);
            $longsec5 = intval(queueModel::where('category',$categories[4]->QName)->whereDate('created_at','=',$selectedDate)->max('wait_time')%60);
            $longestQ1 = $longmin1.':'.$longsec1;
            $longestQ2 = $longmin2.':'.$longsec2;
            $longestQ3 = $longmin3.':'.$longsec3;
            $longestQ4 = $longmin4.':'.$longsec4;
            $longestQ5 = $longmin5.':'.$longsec5;
            if ($avgWaitQ1 == null && $fastestQ1 == null && $longestQ1 == null) {
                $avgWaitQ1 = '0';
                $fastestQ1 = '0';
                $longestQ1 = '0';
            }
            if ($avgWaitQ2 == null && $fastestQ2 == null && $longestQ2 == null) {
                $avgWaitQ2 = '0';
                $fastestQ2 = '0';
                $longestQ2 = '0';
            }
            if ($avgWaitQ3 == null && $fastestQ3 == null && $longestQ3 == null) {
                $avgWaitQ3 = '0';
                $fastestQ3 = '0';
                $longestQ3 = '0';
            }
            if ($avgWaitQ4 == null && $fastestQ4 == null && $longestQ4 == null) {
                $avgWaitQ4 = '0';
                $fastestQ4 = '0';
                $longestQ4 = '0';
            }
            if ($avgWaitQ5 == null && $fastestQ5 == null && $longestQ5 == null) {
                $avgWaitQ5 = '0';
                $fastestQ5 = '0';
                $longestQ5 = '0';
            }
        }

        //get overall statistics for each category
        if ($categories->count() == 1) {
            $avgmin1 = intval(queueModel::where('category',$categories[0]->QName)->avg('wait_time')/60);
            $avgsec1 = intval(queueModel::where('category',$categories[0]->QName)->avg('wait_time')%60);
            $overAvg1 = $avgmin1.':'.$avgsec1;
            $fastmin1 = intval(queueModel::where('category',$categories[0]->QName)->min('wait_time')/60);
            $fastsec1 = intval(queueModel::where('category',$categories[0]->QName)->min('wait_time')%60);
            $overFast1 = $fastmin1.':'.$fastsec1;
            $longmin1 = intval(queueModel::where('category',$categories[0]->QName)->max('wait_time')/60);
            $longsec1 = intval(queueModel::where('category',$categories[0]->QName)->max('wait_time')%60);
            $overLong1 = $longmin1.':'.$longsec1;
            if ($overAvg1 == null && $overFast1 == null && $overLong1 == null) {
                $overAvg1 = '0';
                $overFast1 = '0';
                $overLong1 = '0';
            }
        }elseif($categories->count() == 2){
            $avgmin1 = intval(queueModel::where('category',$categories[0]->QName)->avg('wait_time')/60);
            $avgsec1 = intval(queueModel::where('category',$categories[0]->QName)->avg('wait_time')%60);
            $avgmin2 = intval(queueModel::where('category',$categories[1]->QName)->avg('wait_time')/60);
            $avgsec2 = intval(queueModel::where('category',$categories[1]->QName)->avg('wait_time')%60);
            $overAvg1 = $avgmin1.':'.$avgsec1;
            $overAvg2 = $avgmin2.':'.$avgsec2;
            $fastmin1 = intval(queueModel::where('category',$categories[0]->QName)->min('wait_time')/60);
            $fastsec1 = intval(queueModel::where('category',$categories[0]->QName)->min('wait_time')%60);
            $fastmin2 = intval(queueModel::where('category',$categories[1]->QName)->min('wait_time')/60);
            $fastsec2 = intval(queueModel::where('category',$categories[1]->QName)->min('wait_time')%60);
            $overFast1 = $fastmin1.':'.$fastsec1;
            $overFast2 = $fastmin2.':'.$fastsec2;
            $longmin1 = intval(queueModel::where('category',$categories[0]->QName)->max('wait_time')/60);
            $longsec1 = intval(queueModel::where('category',$categories[0]->QName)->max('wait_time')%60);
            $longmin2 = intval(queueModel::where('category',$categories[1]->QName)->max('wait_time')/60);
            $longsec2 = intval(queueModel::where('category',$categories[1]->QName)->max('wait_time')%60);
            $overLong1 = $longmin1.':'.$longsec1;
            $overLong2 = $longmin2.':'.$longsec2;

            if ($overAvg1 == null && $overFast1 == null && $overLong1 == null) {
                $overAvg1 = '0';
                $overFast1 = '0';
                $overLong1 = '0';
            }

            if ($overAvg2 == null && $overFast2 == null && $overLong2 == null) {
                $overAvg2 = '0';
                $overFast2 = '0';
                $overLong2 = '0';
            }
        }elseif($categories->count() == 3){
            $avgmin1 = intval(queueModel::where('category',$categories[0]->QName)->avg('wait_time')/60);
            $avgsec1 = intval(queueModel::where('category',$categories[0]->QName)->avg('wait_time')%60);
            $avgmin2 = intval(queueModel::where('category',$categories[1]->QName)->avg('wait_time')/60);
            $avgsec2 = intval(queueModel::where('category',$categories[1]->QName)->avg('wait_time')%60);
            $avgmin3 = intval(queueModel::where('category',$categories[2]->QName)->avg('wait_time')/60);
            $avgsec3 = intval(queueModel::where('category',$categories[2]->QName)->avg('wait_time')%60);
            $overAvg1 = $avgmin1.':'.$avgsec1;
            $overAvg2 = $avgmin2.':'.$avgsec2;
            $overAvg3 = $avgmin3.':'.$avgsec3;
            $fastmin1 = intval(queueModel::where('category',$categories[0]->QName)->min('wait_time')/60);
            $fastsec1 = intval(queueModel::where('category',$categories[0]->QName)->min('wait_time')%60);
            $fastmin2 = intval(queueModel::where('category',$categories[1]->QName)->min('wait_time')/60);
            $fastsec2 = intval(queueModel::where('category',$categories[1]->QName)->min('wait_time')%60);
            $fastmin3 = intval(queueModel::where('category',$categories[2]->QName)->min('wait_time')/60);
            $fastsec3 = intval(queueModel::where('category',$categories[2]->QName)->min('wait_time')%60);
            $overFast1 = $fastmin1.':'.$fastsec1;
            $overFast2 = $fastmin2.':'.$fastsec2;
            $overFast3 = $fastmin3.':'.$fastsec3;
            $longmin1 = intval(queueModel::where('category',$categories[0]->QName)->max('wait_time')/60);
            $longsec1 = intval(queueModel::where('category',$categories[0]->QName)->max('wait_time')%60);
            $longmin2 = intval(queueModel::where('category',$categories[1]->QName)->max('wait_time')/60);
            $longsec2 = intval(queueModel::where('category',$categories[1]->QName)->max('wait_time')%60);
            $longmin3 = intval(queueModel::where('category',$categories[2]->QName)->max('wait_time')/60);
            $longsec3 = intval(queueModel::where('category',$categories[2]->QName)->max('wait_time')%60);
            $overLong1 = $longmin1.':'.$longsec1;
            $overLong2 = $longmin2.':'.$longsec2;
            $overLong3 = $longmin3.':'.$longsec3;

            if ($overAvg1 == null && $overFast1 == null && $overLong1 == null) {
                $overAvg1 = '0';
                $overFast1 = '0';
                $overLong1 = '0';
            }

            if ($overAvg2 == null && $overFast2 == null && $overLong2 == null) {
                $overAvg2 = '0';
                $overFast2 = '0';
                $overLong2 = '0';
            }

            if ($overAvg3 == null && $overFast3 == null && $overLong3 == null) {
                $overAvg3 = '0';
                $overFast3 = '0';
                $overLong3 = '0';
            }
        }elseif($categories->count() == 4){
            $avgmin1 = intval(queueModel::where('category',$categories[0]->QName)->avg('wait_time')/60);
            $avgsec1 = intval(queueModel::where('category',$categories[0]->QName)->avg('wait_time')%60);
            $avgmin2 = intval(queueModel::where('category',$categories[1]->QName)->avg('wait_time')/60);
            $avgsec2 = intval(queueModel::where('category',$categories[1]->QName)->avg('wait_time')%60);
            $avgmin3 = intval(queueModel::where('category',$categories[2]->QName)->avg('wait_time')/60);
            $avgsec3 = intval(queueModel::where('category',$categories[2]->QName)->avg('wait_time')%60);
            $avgmin4 = intval(queueModel::where('category',$categories[3]->QName)->avg('wait_time')/60);
            $avgsec4 = intval(queueModel::where('category',$categories[3]->QName)->avg('wait_time')%60);
            $overAvg1 = $avgmin1.':'.$avgsec1;
            $overAvg2 = $avgmin2.':'.$avgsec2;
            $overAvg3 = $avgmin3.':'.$avgsec3;
            $overAvg4 = $avgmin4.':'.$avgsec4;
            $fastmin1 = intval(queueModel::where('category',$categories[0]->QName)->min('wait_time')/60);
            $fastsec1 = intval(queueModel::where('category',$categories[0]->QName)->min('wait_time')%60);
            $fastmin2 = intval(queueModel::where('category',$categories[1]->QName)->min('wait_time')/60);
            $fastsec2 = intval(queueModel::where('category',$categories[1]->QName)->min('wait_time')%60);
            $fastmin3 = intval(queueModel::where('category',$categories[2]->QName)->min('wait_time')/60);
            $fastsec3 = intval(queueModel::where('category',$categories[2]->QName)->min('wait_time')%60);
            $fastmin4 = intval(queueModel::where('category',$categories[3]->QName)->min('wait_time')/60);
            $fastsec4 = intval(queueModel::where('category',$categories[3]->QName)->min('wait_time')%60);
            $overFast1 = $fastmin1.':'.$fastsec1;
            $overFast2 = $fastmin2.':'.$fastsec2;
            $overFast3 = $fastmin3.':'.$fastsec3;
            $overFast4 = $fastmin4.':'.$fastsec4;
            $longmin1 = intval(queueModel::where('category',$categories[0]->QName)->max('wait_time')/60);
            $longsec1 = intval(queueModel::where('category',$categories[0]->QName)->max('wait_time')%60);
            $longmin2 = intval(queueModel::where('category',$categories[1]->QName)->max('wait_time')/60);
            $longsec2 = intval(queueModel::where('category',$categories[1]->QName)->max('wait_time')%60);
            $longmin3 = intval(queueModel::where('category',$categories[2]->QName)->max('wait_time')/60);
            $longsec3 = intval(queueModel::where('category',$categories[2]->QName)->max('wait_time')%60);
            $longmin4 = intval(queueModel::where('category',$categories[3]->QName)->max('wait_time')/60);
            $longsec4 = intval(queueModel::where('category',$categories[3]->QName)->max('wait_time')%60);
            $overLong1 = $longmin1.':'.$longsec1;
            $overLong2 = $longmin2.':'.$longsec2;
            $overLong3 = $longmin3.':'.$longsec3;
            $overLong4 = $longmin4.':'.$longsec4;

            if ($overAvg1 == null && $overFast1 == null && $overLong1 == null) {
                $overAvg1 = '0';
                $overFast1 = '0';
                $overLong1 = '0';
            }

            if ($overAvg2 == null && $overFast2 == null && $overLong2 == null) {
                $overAvg2 = '0';
                $overFast2 = '0';
                $overLong2 = '0';
            }

            if ($overAvg3 == null && $overFast3 == null && $overLong3 == null) {
                $overAvg3 = '0';
                $overFast3 = '0';
                $overLong3 = '0';
            }

            if ($overAvg4 == null && $overFast4 == null && $overLong4 == null) {
                $overAvg4 = '0';
                $overFast4 = '0';
                $overLong4 = '0';
            }
        }elseif($categories->count() == 5){
            $avgmin1 = intval(queueModel::where('category',$categories[0]->QName)->avg('wait_time')/60);
            $avgsec1 = intval(queueModel::where('category',$categories[0]->QName)->avg('wait_time')%60);
            $avgmin2 = intval(queueModel::where('category',$categories[1]->QName)->avg('wait_time')/60);
            $avgsec2 = intval(queueModel::where('category',$categories[1]->QName)->avg('wait_time')%60);
            $avgmin3 = intval(queueModel::where('category',$categories[2]->QName)->avg('wait_time')/60);
            $avgsec3 = intval(queueModel::where('category',$categories[2]->QName)->avg('wait_time')%60);
            $avgmin4 = intval(queueModel::where('category',$categories[3]->QName)->avg('wait_time')/60);
            $avgsec4 = intval(queueModel::where('category',$categories[3]->QName)->avg('wait_time')%60);
            $avgmin5 = intval(queueModel::where('category',$categories[4]->QName)->avg('wait_time')/60);
            $avgsec5 = intval(queueModel::where('category',$categories[4]->QName)->avg('wait_time')%60);
            $overAvg1 = $avgmin1.':'.$avgsec1;
            $overAvg2 = $avgmin2.':'.$avgsec2;
            $overAvg3 = $avgmin3.':'.$avgsec3;
            $overAvg4 = $avgmin4.':'.$avgsec4;
            $overAvg5 = $avgmin5.':'.$avgsec5;
            $fastmin1 = intval(queueModel::where('category',$categories[0]->QName)->min('wait_time')/60);
            $fastsec1 = intval(queueModel::where('category',$categories[0]->QName)->min('wait_time')%60);
            $fastmin2 = intval(queueModel::where('category',$categories[1]->QName)->min('wait_time')/60);
            $fastsec2 = intval(queueModel::where('category',$categories[1]->QName)->min('wait_time')%60);
            $fastmin3 = intval(queueModel::where('category',$categories[2]->QName)->min('wait_time')/60);
            $fastsec3 = intval(queueModel::where('category',$categories[2]->QName)->min('wait_time')%60);
            $fastmin4 = intval(queueModel::where('category',$categories[3]->QName)->min('wait_time')/60);
            $fastsec4 = intval(queueModel::where('category',$categories[3]->QName)->min('wait_time')%60);
            $fastmin5 = intval(queueModel::where('category',$categories[4]->QName)->min('wait_time')/60);
            $fastsec5 = intval(queueModel::where('category',$categories[4]->QName)->min('wait_time')%60);
            $overFast1 = $fastmin1.':'.$fastsec1;
            $overFast2 = $fastmin2.':'.$fastsec2;
            $overFast3 = $fastmin3.':'.$fastsec3;
            $overFast4 = $fastmin4.':'.$fastsec4;
            $overFast5 = $fastmin5.':'.$fastsec5;
            $longmin1 = intval(queueModel::where('category',$categories[0]->QName)->max('wait_time')/60);
            $longsec1 = intval(queueModel::where('category',$categories[0]->QName)->max('wait_time')%60);
            $longmin2 = intval(queueModel::where('category',$categories[1]->QName)->max('wait_time')/60);
            $longsec2 = intval(queueModel::where('category',$categories[1]->QName)->max('wait_time')%60);
            $longmin3 = intval(queueModel::where('category',$categories[2]->QName)->max('wait_time')/60);
            $longsec3 = intval(queueModel::where('category',$categories[2]->QName)->max('wait_time')%60);
            $longmin4 = intval(queueModel::where('category',$categories[3]->QName)->max('wait_time')/60);
            $longsec4 = intval(queueModel::where('category',$categories[3]->QName)->max('wait_time')%60);
            $longmin5 = intval(queueModel::where('category',$categories[4]->QName)->max('wait_time')/60);
            $longsec5 = intval(queueModel::where('category',$categories[4]->QName)->max('wait_time')%60);
            $overLong1 = $longmin1.':'.$longsec1;
            $overLong2 = $longmin2.':'.$longsec2;
            $overLong3 = $longmin3.':'.$longsec3;
            $overLong4 = $longmin4.':'.$longsec4;
            $overLong5 = $longmin5.':'.$longsec5;

            if ($overAvg1 == null && $overFast1 == null && $overLong1 == null) {
                $overAvg1 = '0';
                $overFast1 = '0';
                $overLong1 = '0';
            }

            if ($overAvg2 == null && $overFast2 == null && $overLong2 == null) {
                $overAvg2 = '0';
                $overFast2 = '0';
                $overLong2 = '0';
            }

            if ($overAvg3 == null && $overFast3 == null && $overLong3 == null) {
                $overAvg3 = '0';
                $overFast3 = '0';
                $overLong3 = '0';
            }

            if ($overAvg4 == null && $overFast4 == null && $overLong4 == null) {
                $overAvg4 = '0';
                $overFast4 = '0';
                $overLong4 = '0';
            }

            if ($overAvg5 == null && $overFast5 == null && $overLong5 == null) {
                $overAvg5 = '0';
                $overFast5 = '0';
                $overLong5 = '0';
            }
        }

        //Handled case by Employee
        $employee = User::where('role',1)->get();
        $employeeCount = User::where('role',1)->count();
        //to get category name per user by assign category id
        $employeeCategory = \DB::table('users')
        ->select('users.name','users.email','users.Assign_Category','CurrentQueue.QName')
        ->join('currentqueue','currentqueue.id','=','users.Assign_Category')
        ->where('role',1)->get();

        //calculate handle time by each employee per category
        for ($i=0; $i < $employeeCount; $i++) { 
            $handlemin[$i] = intval(queueModel::where('category',$employeeCategory[$i]->QName)->whereDate('created_at','=',now())->sum('wait_time')/60);
            $handlesec[$i] = intval(queueModel::where('category',$employeeCategory[$i]->QName)->whereDate('created_at','=',now())->sum('wait_time')%60);
            $eHandleTime[] = $handlemin[$i].':'.$handlesec[$i];
        }

        // dd($eHandleTime);
        //redirect to spvQtracking view with all data
        return view('spvQTracking',['employeeData' => $employeeCategory, 'eHandleTime' => $eHandleTime, 'categoriess' => $categories,'totalCats' => $categories->count(), 'avgQ' => $avgWait, 'fastQ' => $fastestQ, 'longQ' => $longestQ],['avg1' => $avgWaitQ1, 'avg2' => $avgWaitQ2, 'avg3' => $avgWaitQ3, 'avg4' => $avgWaitQ4, 'avg5' => $avgWaitQ5,
        'tot1' => $totalQ1, 'tot2' => $totalQ2, 'tot3' => $totalQ3, 'tot4' => $totalQ4, 'tot5' => $totalQ5,
        'skip1' => $skips1, 'skip2' => $skips2, 'skip3' => $skips3, 'skip4' => $skips4, 'skip5' => $skips5,
        'done1' => $dones1, 'done2' => $dones2, 'done3' => $dones3, 'done4' => $dones4, 'done5' => $dones5,
        'fast1' => $fastestQ1, 'fast2' => $fastestQ2, 'fast3' => $fastestQ3, 'fast4' => $fastestQ4, 'fast5' => $fastestQ5,
        'long1' => $longestQ1, 'long2' => $longestQ2, 'long3' => $longestQ3, 'long4' => $longestQ4, 'long5' => $longestQ5,
        'overAvg1' => $overAvg1, 'overAvg2' => $overAvg2, 'overAvg3' => $overAvg3, 'overAvg4' => $overAvg4, 'overAvg5' => $overAvg5,
        'overFast1' => $overFast1, 'overFast2' => $overFast2, 'overFast3' => $overFast3, 'overFast4' => $overFast4, 'overFast5' => $overFast5,
        'overLong1' => $overLong1, 'overLong2' => $overLong2, 'overLong3' => $overLong3, 'overLong4' => $overLong4, 'overLong5' => $overLong5]);
    }

//show supervisor profile
    public function profile(){
        return view('spvProfile');
    }
}
