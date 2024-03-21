<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\queueModel;
use App\Models\CurrentQ;
use DB;

class Monitoring extends Controller
{
    //redirect to monitoring page
    public function monitorQ(){
        //variable initiation
        $category = \DB::table('CurrentQueue')->get('QType');
        $categoryN = \DB::table('CurrentQueue')->get();
        $cCount = \DB::table('CurrentQueue')->get()->count();
        $data = null; $data2 = null; $data3 = null; $data4 = null; $data5 = null;
        $dataNext = null; $dataNext2 = null; $dataNext3 = null; $dataNext4 = null; $dataNext5 = null;
        $cat1 = null; $cat2 = null; $cat3 = null; $cat4 = null; $cat5 = null;

        //category validator
        if ($cCount == 1) {
            //define category name
            $cat1 = $categoryN[0]->QName;
            //get current queue data for each category
            $data = queueModel::where('category',$cat1)->where('status','Active')->where('skipped','0')->whereDate('created_at','=',now())->orderBy('queue','ASC')->first();
            //get next queue data for each category
            $dataNext = queueModel::where('category',$cat1)->where('status','Active')->where('skipped','0')->whereDate('created_at','=',now())->orderBy('queue','ASC')->skip(1)->first();
        }else if($cCount == 2){
            $cat1 = $categoryN[0]->QName;
            $cat2 = $categoryN[1]->QName;
            $data = queueModel::where('category',$cat1)->where('status','Active')->where('skipped','0')->whereDate('created_at','=',now())->orderBy('queue','ASC')->first();
            $dataNext = queueModel::where('category',$cat1)->where('status','Active')->where('skipped','0')->whereDate('created_at','=',now())->orderBy('queue','ASC')->skip(1)->first();
            $data2 = queueModel::where('category',$cat2)->where('status','Active')->where('skipped','0')->whereDate('created_at','=',now())->orderBy('queue','ASC')->first();
            $dataNext2 = queueModel::where('category',$cat2)->where('status','Active')->where('skipped','0')->whereDate('created_at','=',now())->orderBy('queue','ASC')->skip(1)->first();
        }else if($cCount == 3){
            $cat1 = $categoryN[0]->QName;
            $cat2 = $categoryN[1]->QName;
            $cat3 = $categoryN[2]->QName;
            $data = queueModel::where('category',$cat1)->where('status','Active')->where('skipped','0')->whereDate('created_at','=',now())->orderBy('queue','ASC')->first();
            $dataNext = queueModel::where('category',$cat1)->where('status','Active')->where('skipped','0')->whereDate('created_at','=',now())->orderBy('queue','ASC')->skip(1)->first();
            $data2 = queueModel::where('category',$cat2)->where('status','Active')->where('skipped','0')->whereDate('created_at','=',now())->orderBy('queue','ASC')->first();
            $dataNext2 = queueModel::where('category',$cat2)->where('status','Active')->where('skipped','0')->whereDate('created_at','=',now())->orderBy('queue','ASC')->skip(1)->first();
            $data3 = queueModel::where('category',$cat3)->where('status','Active')->where('skipped','0')->whereDate('created_at','=',now())->orderBy('queue','ASC')->first();
            $dataNext3 = queueModel::where('category',$cat3)->where('status','Active')->where('skipped','0')->whereDate('created_at','=',now())->orderBy('queue','ASC')->skip(1)->first();
        }else if($cCount == 4){
            $cat1 = $categoryN[0]->QName;
            $cat2 = $categoryN[1]->QName;
            $cat3 = $categoryN[2]->QName;
            $cat4 = $categoryN[3]->QName;
            $data = queueModel::where('category',$cat1)->where('status','Active')->where('skipped','0')->whereDate('created_at','=',now())->orderBy('queue','ASC')->first();
            $dataNext = queueModel::where('category',$cat1)->where('status','Active')->where('skipped','0')->whereDate('created_at','=',now())->orderBy('queue','ASC')->skip(1)->first();
            $data2 = queueModel::where('category',$cat2)->where('status','Active')->where('skipped','0')->whereDate('created_at','=',now())->orderBy('queue','ASC')->first();
            $dataNext2 = queueModel::where('category',$cat2)->where('status','Active')->where('skipped','0')->whereDate('created_at','=',now())->orderBy('queue','ASC')->skip(1)->first();
            $data3 = queueModel::where('category',$cat3)->where('status','Active')->where('skipped','0')->whereDate('created_at','=',now())->orderBy('queue','ASC')->first();
            $dataNext3 = queueModel::where('category',$cat3)->where('status','Active')->where('skipped','0')->whereDate('created_at','=',now())->orderBy('queue','ASC')->skip(1)->first();
            $data4 = queueModel::where('category',$cat4)->where('status','Active')->where('skipped','0')->whereDate('created_at','=',now())->orderBy('queue','ASC')->first();
            $dataNext4 = queueModel::where('category',$cat4)->where('status','Active')->where('skipped','0')->whereDate('created_at','=',now())->orderBy('queue','ASC')->skip(1)->first();
        }else{
            $cat1 = $categoryN[0]->QName;
            $cat2 = $categoryN[1]->QName;
            $cat3 = $categoryN[2]->QName;
            $cat4 = $categoryN[3]->QName;
            $cat5 = $categoryN[4]->QName;
            $data = queueModel::where('category',$cat1)->where('status','Active')->where('skipped','0')->whereDate('created_at','=',now())->orderBy('queue','ASC')->first();
            $dataNext = queueModel::where('category',$cat1)->where('status','Active')->where('skipped','0')->whereDate('created_at','=',now())->orderBy('queue','ASC')->skip(1)->first();
            $data2 = queueModel::where('category',$cat2)->where('status','Active')->where('skipped','0')->whereDate('created_at','=',now())->orderBy('queue','ASC')->first();
            $dataNext2 = queueModel::where('category',$cat2)->where('status','Active')->where('skipped','0')->whereDate('created_at','=',now())->orderBy('queue','ASC')->skip(1)->first();
            $data3 = queueModel::where('category',$cat3)->where('status','Active')->where('skipped','0')->whereDate('created_at','=',now())->orderBy('queue','ASC')->first();
            $dataNext3 = queueModel::where('category',$cat3)->where('status','Active')->where('skipped','0')->whereDate('created_at','=',now())->orderBy('queue','ASC')->skip(1)->first();
            $data4 = queueModel::where('category',$cat4)->where('status','Active')->where('skipped','0')->whereDate('created_at','=',now())->orderBy('queue','ASC')->first();
            $dataNext4 = queueModel::where('category',$cat4)->where('status','Active')->where('skipped','0')->whereDate('created_at','=',now())->orderBy('queue','ASC')->skip(1)->first();
            $data5 = queueModel::where('category',$cat5)->where('status','Active')->where('skipped','0')->whereDate('created_at','=',now())->orderBy('queue','ASC')->first();
            $dataNext5 = queueModel::where('category',$cat5)->where('status','Active')->where('skipped','0')->whereDate('created_at','=',now())->orderBy('queue','ASC')->skip(1)->first();
        }

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
                                $Q5 = $category[4]->QType.'-'.$data5->queue;
                            }
                        }else{
                            $Q4 = $category[3]->QType.'-'.$data4->queue;
                        }

                        if($data5 == null){
                            $Q5 = '0';
                        }else{
                            $Q5 = $category[4]->QType.'-'.$data5->queue;
                        }
                    }else{
                        $Q3 = $category[2]->QType.'-'.$data3->queue;
                    }

                    if($data4 == null){
                        $Q4 = '0';
                        if($data5 == null){
                            $Q5 = '0';
                        }else{
                            $Q5 = $category[4]->QType.'-'.$data5->queue;
                        }
                    }else{
                        $Q4 = $category[3]->QType.'-'.$data4->queue;
                    }

                    if($data5 == null){
                        $Q5 = '0';
                    }else{
                        $Q5 = $category[4]->QType.'-'.$data5->queue;
                    }
                }else{
                    $Q2 = $category[1]->QType.'-'.$data2->queue;
                }

                if($data3 == null){
                    $Q3 = '0';
                    if($data4 == null){
                        $Q4 = '0';
                        if($data5 == null){
                            $Q5 = '0';
                        }else{
                            $Q5 = $category[4]->QType.'-'.$data5->queue;
                        }
                    }else{
                        $Q4 = $category[3]->QType.'-'.$data4->queue;
                    }

                    if($data5 == null){
                        $Q5 = '0';
                    }else{
                        $Q5 = $category[4]->QType.'-'.$data5->queue;
                    }
                }else{
                    $Q3 = $category[2]->QType.'-'.$data3->queue;
                }

                if($data4 == null){
                    $Q4 = '0'; 
                    if($data5 == null){
                        $Q5 = '0';
                    }else{
                        $Q5 = $category[4]->QType.'-'.$data5->queue;
                    }
                }else{
                    $Q4 = $category[3]->QType.'-'.$data4->queue;
                }

                if($data5 == null){
                    $Q5 = '0';
                }else{
                    $Q5 = $category[4]->QType.'-'.$data5->queue;
                }
            }else{
                $Q1 = $category[0]->QType.'-'.$data->queue;
                if($data2 == null){
                    $Q2 = '0';
                    if($data3 == null){
                        $Q3 = '0';
                        if($data4 == null){
                            $Q4 = '0';
                            if($data5 == null){
                                $Q5 = '0';
                            }else{
                                $Q5 = $category[4]->QType.'-'.$data5->queue;
                            }
                        }else{
                            $Q4 = $category[3]->QType.'-'.$data4->queue;
                        }
    
                        if($data5 == null){
                            $Q5 = '0';
                        }else{
                            $Q5 = $category[4]->QType.'-'.$data5->queue;
                        }
                    }else{
                        $Q3 = $category[2]->QType.'-'.$data3->queue;
                    }

                    if($data4 == null){
                        $Q4 = '0'; 
                        if($data5 == null){
                            $Q5 = '0';
                        }else{
                            $Q5 = $category[4]->QType.'-'.$data5->queue;
                        }
                    }else{
                        $Q4 = $category[3]->QType.'-'.$data4->queue;
                    }
    
                    if($data5 == null){
                        $Q5 = '0';
                    }else{
                        $Q5 = $category[4]->QType.'-'.$data5->queue;
                    }
                }else{
                    $Q2 = $category[1]->QType.'-'.$data2->queue;
                }

                if($data3 == null){
                    $Q3 = '0';
                    if($data4 == null){
                        $Q4 = '0';
                        if($data5 == null){
                            $Q5 = '0';
                        }else{
                            $Q5 = $category[4]->QType.'-'.$data5->queue;
                        }
                    }else{
                        $Q4 = $category[3]->QType.'-'.$data4->queue;
                    }

                    if($data5 == null){
                        $Q5 = '0';
                    }else{
                        $Q5 = $category[4]->QType.'-'.$data5->queue;
                    }
                }else{
                    $Q3 = $category[2]->QType.'-'.$data3->queue;
                }

                if($data4 == null){
                    $Q4 = '0'; 
                    if($data5 == null){
                        $Q5 = '0';
                    }else{
                        $Q5 = $category[4]->QType.'-'.$data5->queue;
                    }
                }else{
                    $Q4 = $category[3]->QType.'-'.$data4->queue;
                }

                if($data5 == null){
                    $Q5 = '0';
                }else{
                    $Q5 = $category[4]->QType.'-'.$data5->queue;
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
                            $Q5 = $category[4]->QType.'-'.$data5->queue;
                        }
                    }else{
                        $Q4 = $category[3]->QType.'-'.$data4->queue;
                    }

                    if($data5 == null){
                        $Q5 = '0';
                    }else{
                        $Q5 = $category[4]->QType.'-'.$data5->queue;
                    }
                }else{
                    $Q3 = $category[2]->QType.'-'.$data3->queue;
                }

                if($data4 == null){
                    $Q4 = '0'; 
                    if($data5 == null){
                        $Q5 = '0';
                    }else{
                        $Q5 = $category[4]->QType.'-'.$data5->queue;
                    }
                }else{
                    $Q4 = $category[3]->QType.'-'.$data4->queue;
                }

                if($data5 == null){
                    $Q5 = '0';
                }else{
                    $Q5 = $category[4]->QType.'-'.$data5->queue;
                }
            }else{
                $Q2 = $category[1]->QType.'-'.$data2->queue;
            }

            if($data3 == null){
                $Q3 = '0';
                if($data4 == null){
                    $Q4 = '0';
                    if($data5 == null){
                        $Q5 = '0';
                    }else{
                        $Q5 = $category[4]->QType.'-'.$data5->queue;
                    }
                }else{
                    $Q4 = $category[3]->QType.'-'.$data4->queue;
                }

                if($data5 == null){
                    $Q5 = '0';
                }else{
                    $Q5 = $category[4]->QType.'-'.$data5->queue;
                }
            }else{
                $Q3 = $category[2]->QType.'-'.$data3->queue;
            }

            if($data4 == null){
                $Q4 = '0'; 
                if($data5 == null){
                    $Q5 = '0';
                }else{
                    $Q5 = $category[4]->QType.'-'.$data5->queue;
                }
            }else{
                $Q4 = $category[3]->QType.'-'.$data4->queue;
            }

            if($data5 == null){
                $Q5 = '0';
            }else{
                $Q5 = $category[4]->QType.'-'.$data5->queue;
            }

            //validate and fill Next queue value
            if($dataNext == null){
                $SQ1 = '0';
                if($dataNext2 == null){
                    $SQ2 = '0';
                    if($dataNext3 == null){
                        $SQ3 = '0';
                        if($dataNext4 == null){
                            $SQ4 = '0';
                            if($dataNext5 == null){
                                $SQ5 = '0';
                            }else{
                                $SQ5 = $category[4]->QType.'-'.$dataNext5->queue;
                            }
                        }else{
                            $SQ4 = $category[3]->QType.'-'.$dataNext4->queue;
                        }

                        if($dataNext5 == null){
                            $SQ5 = '0';
                        }else{
                            $SQ5 = $category[4]->QType.'-'.$dataNext5->queue;
                        }
                    }else{
                        $SQ3 = $category[2]->QType.'-'.$dataNext3->queue;
                    }

                    if($dataNext4 == null){
                        $SQ4 = '0';
                        if($dataNext5 == null){
                            $SQ5 = '0';
                        }else{
                            $SQ5 = $category[4]->QType.'-'.$dataNext5->queue;
                        }
                    }else{
                        $SQ4 = $category[3]->QType.'-'.$dataNext4->queue;
                    }

                    if($dataNext5 == null){
                        $SQ5 = '0';
                    }else{
                        $SQ5 = $category[4]->QType.'-'.$dataNext5->queue;
                    }
                }else{
                    $SQ2 = $category[1]->QType.'-'.$dataNext2->queue;
                }

                if($dataNext3 == null){
                    $SQ3 = '0';
                    if($dataNext4 == null){
                        $SQ4 = '0';
                        if($dataNext5 == null){
                            $SQ5 = '0';
                        }else{
                            $SQ5 = $category[4]->QType.'-'.$dataNext5->queue;
                        }
                    }else{
                        $SQ4 = $category[3]->QType.'-'.$dataNext4->queue;
                    }

                    if($dataNext5 == null){
                        $SQ5 = '0';
                    }else{
                        $SQ5 = $category[4]->QType.'-'.$dataNext5->queue;
                    }
                }else{
                    $SQ3 = $category[2]->QType.'-'.$dataNext3->queue;
                }

                if($dataNext4 == null){
                    $SQ4 = '0';
                    if($dataNext5 == null){
                        $SQ5 = '0';
                    }else{
                        $SQ5 = $category[4]->QType.'-'.$dataNext5->queue;
                    }
                }else{
                    $SQ4 = $category[3]->QType.'-'.$dataNext4->queue;
                }

                if($dataNext5 == null){
                    $SQ5 = '0';
                }else{
                    $SQ5 = $category[4]->QType.'-'.$dataNext5->queue;
                }
            }else{
                $SQ1 = $category[0]->QType.'-'.$dataNext->queue;
                if($dataNext2 == null){
                    $SQ2 = '0';
                    if($dataNext3 == null){
                        $SQ3 = '0';
                        if($dataNext4 == null){
                            $SQ4 = '0';
                            if($dataNext5 == null){
                                $SQ5 = '0';
                            }else{
                                $SQ5 = $category[4]->QType.'-'.$dataNext5->queue;
                            }
                        }else{
                            $SQ4 = $category[3]->QType.'-'.$dataNext4->queue;
                        }

                        if($dataNext5 == null){
                            $SQ5 = '0';
                        }else{
                            $SQ5 = $category[4]->QType.'-'.$dataNext5->queue;
                        }
                    }else{
                        $SQ3 = $category[2]->QType.'-'.$dataNext3->queue;
                    }

                    if($dataNext4 == null){
                        $SQ4 = '0';
                        if($dataNext5 == null){
                            $SQ5 = '0';
                        }else{
                            $SQ5 = $category[4]->QType.'-'.$dataNext5->queue;
                        }
                    }else{
                        $SQ4 = $category[3]->QType.'-'.$dataNext4->queue;
                    }

                    if($dataNext5 == null){
                        $SQ5 = '0';
                    }else{
                        $SQ5 = $category[4]->QType.'-'.$dataNext5->queue;
                    }
                }else{
                    $SQ2 = $category[1]->QType.'-'.$dataNext2->queue;
                }

                if($dataNext3 == null){
                    $SQ3 = '0';
                    if($dataNext4 == null){
                        $SQ4 = '0';
                        if($dataNext5 == null){
                            $SQ5 = '0';
                        }else{
                            $SQ5 = $category[4]->QType.'-'.$dataNext5->queue;
                        }
                    }else{
                        $SQ4 = $category[3]->QType.'-'.$dataNext4->queue;
                    }

                    if($dataNext5 == null){
                        $SQ5 = '0';
                    }else{
                        $SQ5 = $category[4]->QType.'-'.$dataNext5->queue;
                    }
                }else{
                    $SQ3 = $category[2]->QType.'-'.$dataNext3->queue;
                }

                if($dataNext4 == null){
                    $SQ4 = '0';
                    if($dataNext5 == null){
                        $SQ5 = '0';
                    }else{
                        $SQ5 = $category[4]->QType.'-'.$dataNext5->queue;
                    }
                }else{
                    $SQ4 = $category[3]->QType.'-'.$dataNext4->queue;
                }

                if($dataNext5 == null){
                    $SQ5 = '0';
                }else{
                    $SQ5 = $category[4]->QType.'-'.$dataNext5->queue;
                }
            }

            if($dataNext2 == null){
                $SQ2 = '0';
                if($dataNext3 == null){
                    $SQ3 = '0';
                    if($dataNext4 == null){
                        $SQ4 = '0';
                        if($dataNext5 == null){
                            $SQ5 = '0';
                        }else{
                            $SQ5 = $category[4]->QType.'-'.$dataNext5->queue;
                        }
                    }else{
                        $SQ4 = $category[3]->QType.'-'.$dataNext4->queue;
                    }

                    if($dataNext5 == null){
                        $SQ5 = '0';
                    }else{
                        $SQ5 = $category[4]->QType.'-'.$dataNext5->queue;
                    }
                }else{
                    $SQ3 = $category[2]->QType.'-'.$dataNext3->queue;
                }

                if($dataNext4 == null){
                    $SQ4 = '0';
                    if($dataNext5 == null){
                        $SQ5 = '0';
                    }else{
                        $SQ5 = $category[4]->QType.'-'.$dataNext5->queue;
                    }
                }else{
                    $SQ4 = $category[3]->QType.'-'.$dataNext4->queue;
                }

                if($dataNext5 == null){
                    $SQ5 = '0';
                }else{
                    $SQ5 = $category[4]->QType.'-'.$dataNext5->queue;
                }
            }else{
                $SQ2 = $category[1]->QType.'-'.$dataNext2->queue;
            }

            if($dataNext3 == null){
                $SQ3 = '0';
                if($dataNext4 == null){
                    $SQ4 = '0';
                    if($dataNext5 == null){
                        $SQ5 = '0';
                    }else{
                        $SQ5 = $category[4]->QType.'-'.$dataNext5->queue;
                    }
                }else{
                    $SQ4 = $category[3]->QType.'-'.$dataNext4->queue;
                }

                if($dataNext5 == null){
                    $SQ5 = '0';
                }else{
                    $SQ5 = $category[4]->QType.'-'.$dataNext5->queue;
                }
            }else{
                $SQ3 = $category[2]->QType.'-'.$dataNext3->queue;
            }

            if($dataNext4 == null){
                $SQ4 = '0';
                if($dataNext5 == null){
                    $SQ5 = '0';
                }else{
                    $SQ5 = $category[4]->QType.'-'.$dataNext5->queue;
                }
            }else{
                $SQ4 = $category[3]->QType.'-'.$dataNext4->queue;
            }

            if($dataNext5 == null){
                $SQ5 = '0';
            }else{
                $SQ5 = $category[4]->QType.'-'.$dataNext5->queue;
            }

            //redirect to monitoring view with all queue data
            return view('monitoring', ['TotalCategory' => $cCount, 'antrian' => $Q1,'namaAntri' => $cat1,'antrian2' => $Q2,'namaAntri2' => $cat2,'antrian3' => $Q3,'namaAntri3' => $cat3, 'antrian4' => $Q4,'namaAntri4' => $cat4, 'antrian5' => $Q5,'namaAntri5' => $cat5],['nextAntri' => $SQ1, 'nextAntri2' => $SQ2, 'nextAntri3' => $SQ3, 'nextAntri4' => $SQ4, 'nextAntri5' => $SQ5]);

    }
}
