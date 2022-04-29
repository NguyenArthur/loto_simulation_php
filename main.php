<?php
    include 'Player.php';
    if (($open = fopen("table_joueur.csv", "r")) !== FALSE)
    {
        $exit = fopen("resultats.csv", "w");
        $weekly_grid = generateGrid();
        while (($data = fgetcsv($open, 1000, ";")) !== FALSE)
        {
            $grids = array_slice($data, 1);
            for ($i = 0; $i < count($grids); $i++) {
                $grids[$i] = explode("-", $grids[$i]);
            }
            $player = new Player($data[0], $grids);
            $test_grid = [4,21,2,22,28,31,1];
            $player->calculateRank($weekly_grid);
            $dataResult = $player->getid() . "," . $player->rank . "\n";
            if($player->rank != NULL)  fwrite($exit, $dataResult);
        }

        fclose($open);
        fclose($exit);
    }

    function generateGrid()
    {
        $winning_grid = [];
        for ($i = 0; $i < 6; $i++) {
            $number = rand(1, 49);
            while (in_array($number, $winning_grid, true)) {
                $number = rand(1, 49);
            }
            $winning_grid[$i] = $number;
        }
        $winning_grid[6] = rand(1, 10);
        return $winning_grid;
    }

