<?php

namespace App\Http\Traits;
//use App\Models\Product;


trait JSONTrait
{
    public function getCurrentLang()
    {
        return app()->getLocale();}

    public function returnError( $msg)
    {
        return response()->json([
            'status' => 0,
            'msg' => $msg
        ]);
    }
    public function returnSuccessMessage($msg = "")
    {
        return [
            'status' => 1,
            'msg' => $msg
        ];
    }

    public function returnData( $value, $msg = "")
    {
        return response()->json([
            'data'=> $value   ,        
            'status' => 1,
            'msg' => $msg,
        ]);
    }


}
