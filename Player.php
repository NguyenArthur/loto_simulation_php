<?php

class Player
{
    protected $id;
    protected $grids;
    public $rank;
    public $results = [];
    function __construct($id, $grids){
        $this->id = $id;
        $this->grids=$grids;
    }
    public function getid(){
        return $this->id;
    }

    function calculateRank($winningGrid){
        $val = $winningGrid[6];
        for($x = 0; $x< count($this->grids); $x++){
            $chance = 0;
            $count = 0;
            $temp =0;
            /* Methode avec une seule boucle "for"
            if(count($winningGrid) < 7) array_push($winningGrid, $val);
            if($this->grids[$x][6] == $winningGrid[6]){
                $chance = 1;
            }
            array_pop($winningGrid);
            array_pop($this->grids[$x]);
            sort($winningGrid);
            sort($this->grids[$x]);
            for($i = 0; $i< count($winningGrid); $i++){
                if($this->grids[$x][$i] == $winningGrid[$i]){
                    $count = $count+1;
                }

            }
            */

            for ($i = 0; $i < count($winningGrid) - 1; $i++) {
                for ($j = 0; $j < count($this->grids[$x])-1; $j++) {
                    if ($this->grids[$x][$j] == $winningGrid[$i]) {
                        $count++;
                    }
                }
                if($this->grids[$x][6] == $winningGrid[6]){
                    $chance = 1;
                }
            }

            if($count ==7 && $chance == 1){
                $temp =1;
            } elseif ($count ==7 && $chance == 0) {
                $temp = 2;
            } elseif ($count ==6 && $chance == 1) {
                $temp = 3;
            } elseif ($count ==6 && $chance == 0) {
                $temp = 3;
            } elseif ($count ==5 && $chance == 1) {
                $temp = 4;
            } elseif ($count ==5 && $chance == 0) {
                $temp = 4;
            } elseif ($count ==4 && $chance == 1) {
                $temp = 4;
            } elseif ($count ==4 && $chance == 0) {
                $temp = 4;
            } elseif ($count ==3 && $chance == 1) {
                $temp = 5;
            } elseif ($count == 3 && $chance == 0) {
                $temp = 5;
            } elseif ($count ==2 && $chance == 1) {
                $temp = 6;
            } elseif ($count ==2 && $chance == 0) {
                $temp = 6;
            } else {
                $temp = NULL;
            }
            array_push($this->results, $temp);
        }

        $this->results = array_filter($this->results, fn($value) => !is_null($value));
        if (!empty($this->results))  $this->rank = min($this->results);

    }

}