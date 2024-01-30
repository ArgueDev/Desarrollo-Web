<?php include 'includes/header.php';

// while
$i = 0;

while($i < 10){
    echo $i . "<br>";
    $i++;
}

// Do While
$j = 0;

do {
    echo $j . "<br>";
    $j++;
}while($j < 10);

// For loop
for($k = 0; $k < 10; $k++){
    echo $k . "<br>";
}

include 'includes/footer.php';