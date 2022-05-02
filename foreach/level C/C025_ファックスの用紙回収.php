<?php
//1度に運べる紙の最大枚数
$holdablePaper = trim(fgets(STDIN));
//ファックスが届く回数
$faxNum = trim(fgets(STDIN));

//時間ごとの合計枚数を配列に入れる
$totalPaperNum = [];
for ($i = 0; $i < $faxNum; $i++) {
   [$hh, $mm, $sentPaper] = explode(" ", trim(fgets(STDIN)));
   $totalPeperNum[$hh] += $sentPaper;
}

//紙を取りに行く回数を求める
foreach ($totalPeperNum as $paperNum) {
   $goGetNum += ceil($paperNum / $holdablePaper);
}
echo $goGetNum;
