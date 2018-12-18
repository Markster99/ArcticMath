<?php

function welcome($welcome)
{
    echo "I hope you'll enjoy learning about " . $welcome . "\r\n";
    //have sql to pull in info from a Database or Spec about topic using $_SERVER['PHP_SELF']
}

/*This is announces the topic.*/

function formatNum($num)
{

    if ($num > 0) {
        $num= sprintf("%+d",$num);
        return $num;
    }

    return $num;

}

//Make all positive variables show a plus sign
