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
        $message = "Testメッセージ!";

        // メッセージ送信
        $textMessageBuilder = new TextMessageBuilder($message);
        $response = $bot->pushMessage($userId, $textMessageBuilder);

        // return response()->json($response);
    }
}
