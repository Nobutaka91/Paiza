<?php
//ボタンの数、ゲームオーバーになる誤ったボタンを押す回数
[$totalBotton, $limitedNumberOfError] = explode(" ", trim(fgets(STDIN)));
//ボタンを押した回数
$pushCount = trim(fgets(STDIN));
//操作ログ
$activityLogs = explode(" ", trim(fgets(STDIN)));

$success = $failure = $bottonNum = 0;

for($i = 0; $i < $pushCount; $i++) {

    $bottonNum++;
    //正しいボタンであれば$successに+1する
    if ($activityLogs[$i] == $bottonNum) {
        $success++;
    }
    
    //1 ~ N 番目の全ボタンを押したら、 1 番目のボタンに戻るための処理(例: 1 → 2 → ... → N → 1 → ...)
    $bottonNum %= $totalBotton;
}

$failure = count($activityLogs) - $success;
//ゲームオーバーの時は-1を出力し、そうでなければスコアを算出する
if ($failure >= $limitedNumberOfError) {
echo -1;
} else {
echo $success * 1000;
}
