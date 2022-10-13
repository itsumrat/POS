<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UniqueController extends Controller
{
    static public function uniqueId($uniqueId){
        
        $otp = strtotime(Carbon::now());       
        
        $check = User::where($uniqueId, $otp)->count();

        if($check > 0){
            $otp = self::uniqueId($uniqueId);
        }

        return $otp;
    }

// Barcode Issue
    static public function uqniqueCode($barcode, $tableName){
        
        return $otp = '000'.strtotime(Carbon::now());

        $check = DB::table($tableName)->where($barcode, $otp)->count();

        if($check > 0){
            $otp = self::uqniqueCode($barcode, $tableName);
        }

        return $otp;
    }


    static public function checkUniqueId($uniqueId, $table){
        
        $otp = strtotime(Carbon::now());       
        
        $check = $check = DB::table($table)->where($uniqueId, $otp)->count();;

        if($check > 0){
            $otp = self::uniqueId($uniqueId, $table);
        }

        return $otp;
    }
}
