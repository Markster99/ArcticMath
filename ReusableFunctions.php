<?php

function welcome($welcome)
{
    echo "I hope you'll enjoy learning about " . $welcome . " \r\n";
    //have sql to pull in info from a Database or Spec about topic using $_SERVER['PHP_SELF']
}

/*This is announces the topic.*/

function formatNum($num)
{

    if ($num > 0) {
        $num = sprintf('%+d', $num);

        return $num;
    }


    return $num;

}

//Make all positive variables show a plus sign

function format1stCoe($num)
{
    if ($num === 1) {
        $num = '';
        return $num;
    }
    if ($num === -1) {
        $num = '- ';
        return $num;
    }
    return $num;
}

//Make all values of 1 turn into sole minus or blank space

