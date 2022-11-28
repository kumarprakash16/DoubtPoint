<!DOCTYPE html>
<html>
<body style="background-image:url()" >
    <center><h1><i><u>DIFFERENT FUNCTIONS OF PHP</u></i></h1></center>
    <br>
    <br>
<div style="font-size=40px">
<?php

  //  Arithematic function

  function addNumbers(int $a, int $b) {
    return $a + $b;
  }
  echo "<br><h3> <i><u> Arithematic function:-</u></i></h3>";
  echo "<br>";
  echo "<br>Sum of 10 and 10 is:";
  echo addNumbers(10,10);
  echo "<br><br>";
  $c=-10;
  echo "<br><br>Variable c=-5<br>";
  echo "Absolute value of variable c is:";
  echo abs($c);

  // Date function
  
  echo "<i><u><br><br><h3>Date function:-</h3></u></i>";
  echo "<br>";
  echo "<br>";
  echo date("l jS \of F Y h:i:s A");
  echo "<br>";
  
  //  Usage if else
  echo "<br>";
  echo "<i><u> <h3>Usage of if else:-</h3></u></i>";
  $age=18;
  echo "<br>AGE=18<br>";
  if($age>=18){
    echo "<br>Satus:Eligile for voting.";
  }
  else
  {
    echo"<br>Status:Not eligible for voting.<br> ";
  }

  // Usage of Loop
  
  echo "<br><br><i><u><h3> Usage of Loop:-</h3></u></i>";
  echo "<br><i>#Numbers from 1 to 10 using for loop:-</i><br>";
  for ($x = 1; $x <= 10; $x++) {
    echo "The number is: $x <br>";
  }
  
  echo "<br><br><i>#Numbers from 1 to 10 using while loop:-</i><br>";
  $n=1;
  while($n<=10)
  {
    echo "The number is: $n <br>";
    $n++;
  }
  
  echo "<br><br><i>#Numbers from 1 to 10 using do while loop:-</i><br>";
  $m = 1;

do {
  echo "The number is: $m <br>";
  $m++;
} while ($m <= 10);
?>
</div>


</body>
</html>