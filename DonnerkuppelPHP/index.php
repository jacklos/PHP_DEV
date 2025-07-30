<?php



require_once 'classes/Fighter.php';

$f1 = new Fighter("Mad Max");
$f2 = new Fighter("Master Blaster");


echo '<table border="1">';
while($f1->isAlive() && $f2->isAlive()) {
    
    $f1->punch($f2);
    if($f2->isAlive()) {
        $f2->punch($f1);
    }
}

echo '<tr style="background: green"><td>';
if($f1->isAlive()) {
    echo $f1->getName()." hat gewonnen";
} else {
    echo $f2->getName()." hat gewonnen";
}
echo '</td></tr>';
echo '</table>';





echo '<pre>';
var_dump($f1);
var_dump($f2);
echo '</pre>';
