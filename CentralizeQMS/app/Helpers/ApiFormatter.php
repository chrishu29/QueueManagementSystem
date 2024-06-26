<?php
namespace App\Helpers;

class ApiFormatter{

    protected static $response =[
        'code' => null,
        'message' => null,
        'data' =>null
    ];

    public static function createApi($code=null,$msg=null,$data=null){
        self::$response['code'] = $code;
        self::$response['message'] = $msg;
        self::$response['data'] = $data;
        
        return response()->json(self::$response,self::$response['code']);
    }
}

?>