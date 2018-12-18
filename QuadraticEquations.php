<?php

include 'ReusableFunctions.php';

function Equation_Generator()
{
    {
        $a = (double)0;//Temporary initialisation of Coefficient of x^2
        $b = (double)0;//Temporary initialisation of y intercept
        $c = (double)0;//Temporary initialisation of coefficient of x
        $d = (double)-20000;//Temporary initialisation of The discriminant i.e (((b^2)-(4*(a)*(c)))
        $R1 = (double)-50000;//Temporary initialisation of Root 1
        $R2 = (double)+50000;//Temporary initialisation of Root 2
    }// Initialisation of variables

    // i.e. (a=b=c=0) no zero coefficients or constants & d<
    do {
        try {
            $a = random_int(-10, 10);
        } catch (Exception $e) {
        }//Coefficient of x^2

        try {
            $b = random_int(-10, 10);
        } catch (Exception $e) {
        }//coefficient of x

        try {
            $c = random_int(-10, 10);
        } catch (Exception $e) {
        }//y intercept

        $d = ($b ** 2) - (4 * $a * $c);//The discriminant i.e b^2 -4*a*c

        if ($d = 0) {
            try {
                $R1 = ((-$b) / 2 * $a);/* This finds the root(s) to the quadratic equation */
            } catch (Exception $e) {
            }
            $root_type = 'This quadratic equation has a single real repeated root'; /* This can tell if the quadratic equation  has 1 or 2 roots.  */

        } else if ($d > 0) {
            try {
                $R1 = (-$b + sqrt($d)) / (2 * $a);/* This finds the root(s) to the quadratic equation */
                $R2 = (-$b - sqrt($d)) / (2 * $a);/* This finds the root(s) to the quadratic equation */
            } catch (Exception $e) {
            }
            $root_type = 'This quadratic equation has 2 distinct real roots'; /* This can tell if the quadratic equation  has 1 or 2 roots.  */
        }
        /* Could Make root_type  be display into a button or pop up*/

        /* while a=b=c=0 which make sure there can be no zero term and while d<0 makes sure it can have real roots */
    } while (($a === 0) || ($b === 0) || ($c === 0) || ($d < 0));

    $a = formatNum($a);
    $b = formatNum($b);
    $c = formatNum($c);
    $equation = $a . 'x^2 ' . $b . 'x ' . $c . ' = 0';

    echo $equation;
}

/* This generates a valid quadratic equation as well as a hint and its roots*/

function inputRoots()
{
    echo 'What do think x<sub>1</sub> is ? ';
    $userRoot1 = rtrim(fgets(STDIN));
    echo 'I got x<sub>1</sub> = ' . $userRoot1;
    if ($GLOBALS['d'] > 0)//If the discriminant is greater than 0 i.e. The quadratic equation has 2 distinct real roots
    {
        echo 'What do think x<sub>2</sub> is ? ';
        $userRoot2 = rtrim(fgets(STDIN));
        echo 'I got x<sub>2</sub> = ' . $userRoot2;
    }
}

//This stores the users submitted possible roots to the quadratic equation Make this into a pop up window or button

function verifyRoots()
{
    if ($GLOBALS['d'] = 0) {
        if ($GLOBALS['userRoot1'] = $GLOBALS['R1']) {
            echo "Well Done. You've successfully solved the quadratic equation : " . $GLOBALS['equation'];
        } else {
            echo 'Unfortunately your answer was incorrect. The correct value was ' . $GLOBALS('R1');
        }

    }//only one possible solution

    else if ($GLOBALS['d'] > 0) {
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


welcome('Quadratic Equations');
Equation_Generator();



/* This welcomes a user generates a quadratic equation for the user to solve  */


