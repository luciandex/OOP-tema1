<?php declare(strict_types=1);
require_once "Classes/ComplexNumber.php";
require_once "Classes/ComplexNoCalc.php";

$w1 = new ComplexNumber(-4, "3i");
$c1 = $w1->getComplexNo();

$w2 = new ComplexNumber(2, "-2i");
$c2 = $w2->getComplexNo();

$t1 = new ComplexNoCalc($c1, $c2);
var_dump("The SUM of your two complex numbers is: " . $t1->sum($c1,$c2));
var_dump("The DIFFERENCE of your two complex numbers is: " . $t1->difference($c1,$c2));
var_dump("The PRODUCT of your two complex numbers is: " . $t1->product($c1,$c2));
var_dump("The DIVISION of your two complex numbers is: " . $t1->division($c1,$c2));
