<?php

namespace App\Http\Controllers;

use App\Models\User_master;
use Illuminate\Http\Request;

class SampleController extends Controller
{
    public function model()
    {
        // Frameworksモデルのインスタンス化
        $md = new User_master();
        // データ取得
        $data = $md->getData();

        // ビューを返す
        return view('sample.model', ['data' => $data]);
    }
}
