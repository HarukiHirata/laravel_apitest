<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//忘れずにuseしておきましょう
use RakutenRws_Client;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        //楽天APIを扱うRakutenRws_Clientクラスのインスタンスを作成します
        $client = new RakutenRws_Client();

        //定数化
        define("RAKUTEN_APPLICATION_ID"     , config('app.rakuten_id'));
        define("RAKUTEN_APPLICATION_SEACRET", config('app.rakuten_key'));

        //アプリIDをセット！
        $client->setApplicationId(RAKUTEN_APPLICATION_ID);

        $keyword = $request->keyword;

        // IchibaItemSearch API から、指定条件で検索
        $response = $client->execute('IchibaItemSearch', array(
            //入力パラメーター
            'keyword' => $keyword,
        ));
        // レスポンスが正しいかを isOk() で確認することができます
        if ($response->isOk()) {
            $items = array();
            //配列で結果をぶち込んで行きます
            foreach ($response as $item){
                //画像サイズを変えたかったのでURLを整形します
                $str = str_replace("_ex=128x128", "_ex=175x175", $item['mediumImageUrls'][0]['imageUrl']);
                $items[] = array(
                    'itemName' => $item['itemName'],
                    'itemPrice' => $item['itemPrice'],
                    'itemUrl' => $item['itemUrl'],
                    'mediumImageUrls' => $str,
                    'siteIcon' => "../images/rakuten_logo.png",
                );
            }
            return view('index', compact('items'));
        } else {
            echo 'Error:'.$response->getMessage();
        }
    }
}
