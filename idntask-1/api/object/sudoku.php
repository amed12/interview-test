<?php

class Sudoku
{

    // object properties
    public $arraysudoku;
    function canPlaceNumber($grid, $x, $y, $i)
    {
        // check columns
        for ($index = 0; $index < 9; $index++) {
            if ($grid[$y][$index] == $i){
                return false;
            }

        }
        // check rows
        for ($index = 0; $index < 9; $index++) {
            if ($grid[$index][$x] == $i){
                return false;
            }
        }
        // check box
        $indexY = (int) ($y / 3) * 3;
        $indexX = (int) ($x / 3) * 3;
        $flagY = $indexY;
        $flagX = $indexX;
        for (; $indexY < $flagY + 3; $indexY++) {
            for ($indexX = $flagX; $indexX < $flagX + 3; $indexX++)
                if ($grid[$indexY][$indexX] == $i){
                    return false;
                }
        }
        return true;
    }

    /* Condition */
    /* $grid is the 9x9 grid, values have to be int or result will be unexpected */
    /* return false if failed to solve the grid */
    /* still cannot fit with car "A" - "I" Input*/
    /* Cannot give error message when condition not same with sudoku rules */
    function sudokuSolver(&$grid, $x = 0, $y = 0)
    {
        // if number already set in the grid
        if ($grid[$y][$x] > 0) {
            // if last number is already in the grid
            if ($x === 8 && $y === 8) return true;
            else if ($x === 8 && $y < 8) return self::sudokuSolver($grid, 0, $y + 1);
            return self::sudokuSolver($grid, $x + 1, $y);
        }
        // otherwise, we need to find a number that match
        else {
            $ret = false;
            for ($i = 1; $i < 10 && !$ret; $i++) {
                if (self::canPlaceNumber($grid, $x, $y, $i)) {
                    $grid[$y][$x] = $i;
                    // stop the recursive calls when we completed the grid
                    if ($x === 8 && $y === 8) return true;
                    else if ($x === 8 && $y < 8) $ret = self::sudokuSolver($grid, 0, $y + 1);
                    else $ret = self::sudokuSolver($grid, $x + 1, $y);
                }
                // this will be executed in every call when the grid is complete
                if ($ret) return true;
            }
            // couldn't find a matching number
            $grid[$y][$x] = 0;
            return false;
        }
    }

    function displayProblemGrid($grid)
    {
        echo ("Problem : <br />");
        for ($i = 0; $i < 9; $i++) {
            if ($i % 3 == 0)
                echo ("+------+------+------+ <br />");

            for ($j = 0; $j < 9; $j++) {
                if ($j % 3 == 0)
                    echo ("| ");

                if ($grid[$i][$j] == 0)
                    echo ("0");

                else
                    echo ($grid[$i][$j]);

                echo (" ");
            }

            echo ("| <br />");
        }

        echo ("+------+------+------+ <br />");
    }
    function displayGrid($grid)
    {
        echo("Solusi : <br />");
        for ($i = 0; $i < 9; $i++) {
            if ($i % 3 == 0)
                echo("+------+------+------+ <br />");

            for ($j = 0; $j < 9; $j++) {
                if ($j % 3 == 0)
                    echo("| ");

                if ($grid[$i][$j] == 0)
                    echo("0");

                else
                    echo($grid[$i][$j]);

                echo(" ");

            }

            echo("| <br />");
        }

        echo("+------+------+------+ <br />");
    }
}
