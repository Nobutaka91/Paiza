【試してみたこと】↓
関数checkMistakeByAlphabetを使わなくした。そしたら正しく出力された。

<?php
// ・正解の単語と完全一致→ ◯ 2 点
// ・正解の単語と長さ(文字数)が異なる→ × 0 点
// ・正解の単語と長さは同じだが 1 文字だけ異なる→ △ 1 点
// ・正解の単語と長さは同じだが 2 文字以上異なる→ × 0 点

$wordCount = trim(fgets(STDIN));
$score = [];

for ($i = 0; $i < $wordCount; $i++) {
    $stringList[] = explode(" ", trim(fgets(STDIN)));
}

$totalScore = calculateTotalScore($stringList);
echo $totalScore;

function calculateTotalScore($stringList)
{
    foreach ($stringList as $string) {

        $correct = $string[0];
        $myAnswer = $string[1];
        $string = [
            "correct" => $correct,
            "myAnswer" => $myAnswer
        ];

        $score[] = isCheckPerfectMatching($string);

        $alphabet_correct = str_split($string["correct"]);
        $alphabet_myAnswer = str_split($string["myAnswer"]);
        $count = count($alphabet_correct);

        $score[] = compareByAlphabet($string, $count, $alphabet_correct, $alphabet_myAnswer);
    }
    return array_sum($score);
}

function isCheckPerfectMatching($string)
{
    if ($string["correct"] == $string["myAnswer"]) return 2;
}

function compareByAlphabet($string, $count, $alphabet_correct, $alphabet_myAnswer)
{
    if (strlen($string["correct"]) == strlen($string["myAnswer"])) {

        $mistake = 0;
        for ($j = 0; $j < $count; $j++) {
            if ($alphabet_correct[$j] !== $alphabet_myAnswer[$j]) {
                $mistake += 1;
            }
        }

        if ($mistake == 1) return 1;
        if ($mistake >= 2) return 0;
    }
}
