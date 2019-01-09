<?php
/**
 * Created by PhpStorm.
 * User: sally
 * Date: 2019-01-09
 * Time: 15:27
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asana;
use App\Http\Requests;

class Ajax_add_asana extends Controller{
    public function index(){

        //TODO 中間テーブルに追加
        //TODO もしくは、ajax飛ばさずに画面だけでDOM構築
        //TODO LaravelでのAjaxの書き方ググる

        $return_array['status'] = 200;
        header('Content-type: application/json');
        echo \GuzzleHttp\json_encode($return_array);
        exit;
    }
}