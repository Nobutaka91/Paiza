<?php

    [$atk, $def, $agi] = explode (" " , rtrim(fgets(STDIN)));

    $monsterNum = rtrim(fgets(STDIN));

    for ($i = 0; $i < $monsterNum; $i ++ ) {
        [$name, $minAtk, $maxAtk, $minDef, $maxDef, $minAgi, $maxAgi]= explode(" " , rtrim(fgets(STDIN)));

        $requirement = new EvolutionRequirement($name, $minAtk, $maxAtk, $minDef, $maxDef, $minAgi, $maxAgi);
        $evolvableMonsterList = new EvolvableMonsterChecker($requirement, $atk, $def, $agi);
        $evolvableMonsters[] = $evolvableMonsterList->velifyEvolvableMonster();
    }
    $monsters= array_filter($evolvableMonsters);

    echo (empty($monsters)) ? "no evolution" : implode("\n", $monsters);

    class EvolutionRequirement
    {
        private $name;
        private $minAtk;
        private $maxAtk;
        private $minDef;
        private $maxDef;
        private $minAgi;
        private $maxAgi;

        public function __construct(string $name, int $minAtk, int $maxAtk, int $minDef, int $maxDef, int $minAgi, int $maxAgi)
        {
            $this-> name   = $name;
            $this-> minAtk = $minAtk;
            $this-> maxAtk = $maxAtk;
            $this-> minDef = $minDef;
            $this-> maxDef = $maxDef;
            $this-> minAgi = $minAgi;
            $this-> maxAgi = $maxAgi;
        }

        public function name() : string
        {
            return $this-> name;
        }

        public function minAtk() : int
        {
            return $this-> minAtk;
        }

        public function maxAtk() : int
        {
            return $this-> maxAtk;
        }

        public function minDef() : int
        {
            return $this-> minDef;
        }

        public function maxDef() : int
        {
            return $this-> maxDef;
        }

        public function minAgi() : int
        {
            return $this-> minAgi;
        }

        public function maxAgi() : int
        {
            return $this-> maxAgi;
        }
    }

    class EvolvableMonsterChecker
    {

        private $requirement;
        private $atk;
        private $def;
        private $agi;

        public function __construct(EvolutionRequirement $requirement, int $atk, int $def, int $agi)
        {
            $this->requirement = $requirement;
            $this->atk = $atk;
            $this->def = $def;
            $this->agi = $agi;
        }

        public function velifyEvolvableMonster()
        {
            if ( $this->condition( $this->requirement->minAtk(), $this->atk, $this->requirement->maxAtk())
                 && $this->condition( $this->requirement->minDef(), $this->def, $this->requirement->maxDef() )
                 && $this->condition( $this->requirement->minAgi(), $this->agi, $this->requirement->maxAgi() ) )  return $this->requirement->name();
        }

        public function condition($evolutionMin, $parameter, $evolutionMax) : bool
        {
            return $evolutionMin <= $parameter && $parameter <= $evolutionMax;
        }
    }
