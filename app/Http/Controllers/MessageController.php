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
                $title = "ABLAZE(アブレイズ) PR";
                $path = "data/1_ablaze.m4a";
                break;
            case 2:
                $title = "セトウチトノコヤ PR";
                $path = "data/2_tonokoya.m4a";
                break;
            case 3:
                $title = "株式会社ニシカイチ PR";
                $path = "data/3_nishikaichi.m4a";
                break;
            case 4:
                $title = "フレスタ PR";
                $path = "data/4_fresta.m4a";
                break;
            case 5:
                $title = "丸子硝子株式会社 PR";
                $path = "data/5_maruko.m4a";
                break;
            case 6:
                $title = "広栄水産 PR";
                $path = "data/6_suisan.m4a";
                break;
            case 7:
                $title = "寿屋珈琲 PR";
                $path = "data/7_kotobukiya.m4a";
                break;
            case 8:
                $title = "小麦屋 PR";
                $path = "data/8_komugiya.m4a";
                break;
            case 9:
                $title = "フラ＆オリタヒチ花花 PR";
                $path = "data/9_fura.m4a";
                break;
            case 10:
                $title = "株式会社ウエカド PR";
                $path = "data/10_uekado.m4a";
                break;
            case 11:
                $title = "新庄みそ PR";
                $path = "data/11_shinjyo_miso.m4a";
                break;
            case 12:
                $title = "香月産婦人科 PR";
                $path = "data/12_kogetsu.m4a";
                break;
            case 13:
                $title = "ジャンボショップ PR";
                $path = "data/13_jumboshop.m4a";
                break;
            case 14:
                $title = "ヒロマツホールディングス株式会社 PR";
                $path = "data/14_hiromatzu.m4a";
                break;
            case 15:
                $title = "ホライズン株式会社 PR";
                $path = "data/15_horizon.m4a";
                break;
            case 16:
                $title = "株式会社GAパートナーズ PR";
                $path = "data/16_ga.m4a";
                break;
            case 17:
                $title = "株式会社ロイヤルコーポレーション PR";
                $path = "data/17_royal.m4a";
                break;
            case 18:
                $title = "創作バル ぼんど PR";
                $path = "data/18_bondo.m4a";
                break;
            case 19:
                $title = "学校法人喜田学園　東林館高等学校 PR";
                $path = "data/19.m4a";
                break;
            case 20:
                $title = "株式会社永和 PR";
                $path = "data/20.m4a";
                break;
            case 21:
                $title = "チー坊 PR";
                $path = "data/21.m4a";
                break;
            case 22:
                $title = "西洋菓子処バイエルン PR";
                $path = "data/22.m4a";
                break;
            case 23:
                $title = "株式会社木の家サイエンスホーム広島店 PR";
                $path = "data/23.m4a";
                break;
            case 24:
                $title = "Nikutama PR";
                $path = "data/24.m4a";
                break;
            case 25:
                $title = "Lily PR";
                $path = "data/25.m4a";
                break;
            case 26:
                $title = "尾道国際ホテル PR";
                $path = "data/26.m4a";
                break;
            case 27:
                $title = "コムタテイシ PR";
                $path = "data/27.m4a";
                break;
            case 28:
                $title = "合人社グループ 株式会社G.FLEX PR";
                $path = "data/28.m4a";
                break;
            case 29:
                $title = "Spiral Garden OHZU PR";
                $path = "data/29.m4a";
                break;
        }


        return view (
            //'top',
            'message_v2',
            [
                'num' => $num,
                'title' => $title,
                'path' => $path,
                'url' => asset($path),
            ]
        );
    }
}
