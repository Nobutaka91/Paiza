<?php
    
    $count = trim(fgets(STDIN)); 
    $variableList = array(1 => 0, 2 => 0); 
    
   for ($i = 0; $i < $count; $i++) {
        [$command, $firstNum, $secondNum] = explode(" ", trim(fgets(STDIN))); 
       
        $variableList = outputAnswer($command, $variableList, $firstNum, $secondNum);
    }
    echo $variableList[1] . " " . $variableList[2];
    
    function outputAnswer($command,$variableList, $firstNum, $secondNum)
    {
        if ($command == 'SET'){
            $variableList[$firstNum] = $secondNum;
        }
        
        if($command == 'ADD') {
            $variableList[2] = $variableList[1] + $firstNum;
        }
        
        if($command == 'SUB'){
            $variableList[2] = $variableList[1] - $firstNum;
        }
        return $variableList;
    }
?>