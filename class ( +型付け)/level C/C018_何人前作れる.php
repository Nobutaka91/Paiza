<?php

    //レシピに書かれている食材の数
    $recipefoodNum = trim(fgets(STDIN));
    //レシピの食材名と必要な数のリスト
    $recipeFoodList = [];
    for($i = 0; $i < $recipefoodNum; $i++) {
        //食材の名前、その食材が必要な数
        [$foodName, $foodNeedNum] = explode(" ", trim(fgets(STDIN)));
        $recipeFoodList[$foodName] = $foodNeedNum;
    }
    //所持している食材の数
    $possessFoodNum = trim(fgets(STDIN));
    //所持している食材と数のリスト
    $possessFoodList = [];
    for($i = 0; $i < $possessFoodNum; $i++) {
        //所持している食材の名前、その食材の数
        [$possessFoodName, $possessFoodNum] = explode(" ", trim(fgets(STDIN)));
        $possessFoodList[$possessFoodName] = $possessFoodNum;
    }

    $commonFoodList = array_intersect_key($recipeFoodList, $possessFoodList);  //二つの配列で共通するキー(=料理名)を取り出す

    $foodList = new FoodList($commonFoodList, $recipeFoodList, $possessFoodList, $possessFoodName);
    echo $foodList->verifyCookableFoodNum();

    class FoodList
    {
        private $commonFoodList;
        private $recipeFoodList;
        private $possessFoodList;
        private $possessFoodName;

        public function __construct(array $commonFoodList, array $recipeFoodList, array $possessFoodList, string $possessFoodName)
        {
            $this->commonFoodList = $commonFoodList;
            $this->recipeFoodList = $recipeFoodList;
            $this->possessFoodList = $possessFoodList;
            $this->possessFoodName = $possessFoodName;
        }

        public function verifyCookableFoodNum() : int
        {
            if (count($this->commonFoodList) != count($this->recipeFoodList)) {
                $foodList = 0;
            } else {
                $servingList = [];
                foreach ($this->possessFoodList as $this->possessFoodName => $possessFood) {
                    if (empty($this->recipeFoodList[$this->possessFoodName])) continue;
                    $servingList[$this->possessFoodName] = $possessFood / $this->recipeFoodList[$this->possessFoodName];
                }
                $minFoodNum = min($servingList);
                $foodList = floor($minFoodNum);
            }
            return $foodList;
        }
    }
