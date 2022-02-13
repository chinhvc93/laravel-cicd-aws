<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class AgeController extends Controller
{
    /**
     * Show the profile for a given user.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function showAge($age)
    {
        if ($age == null || !is_numeric($age)) {
            return "ERROR";
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
        return $message;
    }
}
