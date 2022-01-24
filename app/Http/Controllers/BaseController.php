<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function get_userType($type)
    {
        switch($type)
        {
            case '1':return "کاربر ساده";
                        break;
            case '2':return 'مدیر';
                        break;
            default:return 'خطا';

        }
    }
}
