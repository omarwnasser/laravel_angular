<?php

namespace App\Traits;

trait HttpResponses{
    protected function success($data , $message=null, $code=200){
        return response()->json([
            "status" => true,
            "message" => $message,
            "data" => $data
        ],$code);
    }
    protected function error($error , $message= null, $code){
        return response()->json([
            "status" => false,
            "message" => $message,
            "error" => $error
        ],$code);
    }

    protected function table_list($data ,$pagination ,$message='' ,$code=200 ){
        return response()->json([
            "status" => true,
            "message" => $message,
            "data" => $data,
            "pagination" => $pagination
        ],$code);
    }
}


// $data []
// $pagination [ total => num , current_page => num , limit_page => num , total_pages => num ]