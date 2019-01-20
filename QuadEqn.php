<?php

include 'ReusableFunctions.php';

function Equation_Generator(){


   do {

        try {
            $a = random_int(-10, 10);
        } catch (Exception $e) {
        }//Coefficient of x^2

        try {
            $b = random_int(-50, 50);
        } catch (Exception $e) {
        }//coefficient of x

        try {
            $c = random_int(-25, 25);
        } catch (Exception $e) {
        }//y intercept

       $d = $b**2-4*$a*$c;

    } while (($a === 0) || ($b === 0) || ($c === 0) || ($d < 0));
    /* while a=0 b=0 c=0  make sure that all terms are non-zero and
    while d<0 makes sure that the equation can have real roots */

    if ($d = 0) {
        try {
            $R1 = ((-$b) / 2 * $a);/* This finds the root(s) to the quadratic equation */
        } catch (Exception $e) {
        }
        $root_type = 'This quadratic equation has a single real repeated root';
        $eqation_end='Find the possible value of x when y crosses the x-axis.';

    } else if ($d > 0) {
        try {
            $R1 = ((-$b + sqrt($d)) / (2 * $a));/* This finds the root(s) to the quadratic equation */
            $R2 = ((-$b - sqrt($d)) / (2 * $a));/* This finds the root(s) to the quadratic equation */
        } catch (Exception $e) {
        }
        $root_type = 'This quadratic equation has 2 distinct real roots'; /* This can tell if the quadratic equation  has 1 or 2 roots.  */
        $equation_end='Find the possible values of x when y crosses the x-axis.';

    }
    /* Could Make root_type be displayed into a button or pop up*/
    $xtp = -$b / 2 * $a;
    $ytp = $c - (($b / (2 * $a)) ** 2);
    $tp = 'The turning point at ( ' . $xtp . ' , ' . $ytp . ' ) is a';

    $concavity = 2 * $a;// The 2nd Derivative

    if ($concavity > 0) {
        $ttp = $tp . ' local minimum.';
    } else if ($concavity < 0) {
        $ttp = $tp . ' local maximum.';
    }

    $b = formatNum($b);
    $c = formatNum($c);

    $gradient = 2 * $a . 'x ' . $b;
    echo "\r\n".$d . "\r\n";
    $equation = 'y = ' . $a . 'x^2 ' . $b . 'x ' . $c ."\r\n". $equation_end;
    echo $equation ;

}

/* This generates a valid quadratic equation as well as a hint and its roots*/

function inputRoots()
{
    $d = $GLOBALS['d'];
    if ($d = 0) {
        echo 'What do think x is ? ';
        $userRoot1 = rtrim(fgets(STDIN));
        echo 'I got x = ' . $userRoot1;
    } else //If the discriminant is greater than 0 i.e. The quadratic equation has 2 distinct real roots
    {
        echo 'What do think a value of x is ? ';
        $userRoot1 = rtrim(fgets(STDIN));
        echo 'I got your 1st value of x = ' . $userRoot1;
        echo 'What do think another value of x is ? ';
        $userRoot2 = rtrim(fgets(STDIN));
        echo 'I got your 2nd value of x  = ' . $userRoot2;
    }
}

//This stores the users submitted possible roots to the quadratic equation Make this into a pop up window or button

function verifyRoots()
{
    $d = $GLOBALS['d'];

    if ($d = 0) {
        if ($GLOBALS['userRoot1'] = $GLOBALS['R1']) {
            echo "Well Done. You've successfully solved the quadratic equation : " . $GLOBALS['equation'];
        } else {
            echo 'Unfortunately your answer was incorrect. The correct value was ' . $GLOBALS('R1');
        }

    }//only one possible solution

    else if ($d > 0) {
        if ((($GLOBALS['userRoot1'] = $GLOBALS['R1']) && ($GLOBALS['userRoot2'] = $GLOBALS['R2'])) || (($GLOBALS['userRoot1'] = $GLOBALS['R2']) && ($GLOBALS['userRoot2'] = $GLOBALS['R1']))) {
            echo "Well Done. You've successfully solved the quadratic equation : " . $GLOBALS['equation'];

        }//both solutions are correct
    } else if ((($GLOBALS['userRoot1'] = $GLOBALS['R1']) || ($GLOBALS['userRoot2'] = $GLOBALS['R2'])) xor (($GLOBALS['userRoot1'] = $GLOBALS['R2']) || ($GLOBALS['userRoot2'] = $GLOBALS['R1']))) {
        echo "Almost there. You've successfully solved the quadratic equation : " . $GLOBALS['equation'];
        if ($GLOBALS['userRoot1'] = $GLOBALS['R1']) {
            echo $GLOBALS['userRoot1'] . ' was correct. Unfortunately your second answer was wrong. The second root of ' . $GLOBALS['equation'] . ' was ' . $GLOBALS['R2'];
        } else if ($GLOBALS['userRoot1'] = $GLOBALS['R2']) {
            echo $GLOBALS['userRoot1'] . ' was correct. Unfortunately your second answer was wrong. The second root of ' . $GLOBALS['equation'] . ' was ' . $GLOBALS['R1'];
        } else if ($GLOBALS['userRoot2'] = $GLOBALS['R1']) {
            echo $GLOBALS['userRoot2'] . ' was correct. Unfortunately your second answer was wrong. The second root of ' . $GLOBALS['equation'] . ' was ' . $GLOBALS['R2'];
        } else if ($GLOBALS['userRoot2'] = $GLOBALS['R2']) {
            echo $GLOBALS['userRoot2'] . ' was correct. Unfortunately your second answer was wrong. The second root of ' . $GLOBALS['equation'] . ' was ' . $GLOBALS['R1'];
        }

    }//one solution is correct

    else {
        echo 'Unfortunately both ' . $GLOBALS['userRoot1'] . ' and ' . $GLOBALS['userRoot2'] . ' are incorrect answers to the equation ' . $GLOBALS['equation'] . ' . The correct roots were ' . $GLOBALS['R1'] . ' and ' . $GLOBALS['R2'] . ' .';
    }//no correct solutions

}

/* This checks the user roots against the actual roots and then shows messages apt to the validity of the provided User Roots*/
