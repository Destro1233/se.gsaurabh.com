<?php
/**
 * Created by PhpStorm.
 * User: Saurabh
 * Date: 5/18/2015
 * Time: 11:39 PM
 */

/*
 *  This is comment
 */

$variable = '<h1>Learning PHP</h1>';
echo $variable;
echo '<p>This is the echo command.</p>';
// This is an inline comment
print '<h2>This is the print command.</h2>';
$variable = 22 + 4;
echo $variable;
echo '<br>';
$variable = 22.345 + 4;
echo $variable;
echo '<br>';
// Does not print false only prints true
$variable = TRUE;
echo $variable;
echo '<br>';
$name = 'Saurabh';
$variable = 'Hello, my name is:' . '<p>' . $name . '</p>';
echo $variable;
echo '<br>';
$variable = 5 - 1;
echo $variable;
echo '<br><br>';

/*
  * Using Operators: Assignment and Comparison.
  */
$variable = (3 + 2) * 5;
var_dump($variable);
$first = 6;
$second = 4;
var_dump($first == $second);
$first = 'Cold';
$second = 'Cold';
var_dump($first == $second);


?>