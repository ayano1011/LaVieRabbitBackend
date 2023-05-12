<?php

namespace App\Http\Controllers;

use LINE\LINEBot\HTTPClient\CurlHTTPClient;
use LINE\LINEBot;
use LINE\LINEBot\MessageBuilder\TextMessageBuilder;
use Illuminate\Http\Request;

class LineMessengerController extends Controller
{

    public function message(Request $request)
    {
        // LINEBOTSDKの設定
        $http_client = new CurlHTTPClient(config('services.line.channel_token'));
        $bot = new LINEBot($http_client, ['channelSecret' => config('services.line.messenger_secret')]);

        // LINEユーザーID指定
        $userId = "U702207f57cdec590f64165c6c227900d";

        // メッセージ設定
        $testData = 240;
        if ($testData > 250) {
            $message = "前日のうさちゃんの健康状態：良好";
        } else {
            $message = "前日のうさちゃんの健康状態：注意";
        }

        // メッセージ送信
        $textMessageBuilder = new TextMessageBuilder($message);
        $response = $bot->pushMessage($userId, $textMessageBuilder);

        // return response()->json($response);
    }
}
