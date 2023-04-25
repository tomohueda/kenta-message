<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessageController extends Controller
{
    //
    public function message() {
        return;
    }

    public function show(int $num) {

        $title = "";
        $path = "";

        switch ($num) {
            case 1:
                $title = "アブレイズPR";
                $path = "data/1_ablaze.m4a";
                break;
            case 2:
                $title = "セトウチトノコヤPR";
                $path = "data/2_tonokoya.m4a";
                break;
            case 3:
                $title = "ニシカイチPR";
                $path = "data/3_nishikaichi.m4a";
                break;
            case 4:
                $title = "フレスタPR";
                $path = "data/4_fresta.m4a";
                break;
            case 5:
                $title = "丸子ガラスPR";
                $path = "data/5_maruko.m4a";
                break;
            case 6:
                $title = "広栄水産PR";
                $path = "data/6_suisan.m4a";
                break;
            case 7:
                $title = "寿屋PR";
                $path = "data/7_kotobukiya.m4a";
                break;
            case 8:
                $title = "小麦屋PR";
                $path = "data/8_komugiya.m4a";
                break;
        }


        return view (
            //'top',
            'message',
            [
                'num' => $num,
                'title' => $title,
                'path' => $path,
                'url' => asset($path),
            ]
        );
    }
}
