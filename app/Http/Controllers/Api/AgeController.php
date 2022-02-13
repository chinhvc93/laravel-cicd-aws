<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AgeController extends Controller
{
    /**
     * Show the profile for a given user.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function showAge(Request $request)
    {
        $age = $request->get("age");
        if ($age == null || !is_numeric($age)) {
            $message = "ERROR";
            return response()->json([
                "status" => "failed",
                "message" => $message
            ], 500);
        }

        if ($age <= 0) {
            $message = "ERROR";
        } elseif ($age > 0 && $age < 6) {
            $message = "無料";
        } elseif ($age >= 6 && $age < 13) {
            $message = "500円";
        } elseif ($age >= 13 && $age < 18) {
            $message = "1,000円";
        } elseif ($age >= 18 && $age <= 120) {
            $message = "1,500円";
        } else {
            $message = "ERROR";
        }

        if ($message == "ERROR") {
            return response()->json([
                "status" => "failed",
                "message" => $message
            ], 500);
        }

        return response()->json([
            "status" => "success",
            "message" => $message
        ], 200);
    }
}
