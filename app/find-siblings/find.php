
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<meta charset="UTF-8"/>
<head>
    <title></title>
    <link href='print.css' rel='stylesheet'>
    <link href='nice.css' rel='stylesheet'>
</head>
<body>
<?PHP include"../../functions/check.php";
include"../../functions/functions.php";

/**
 * Created by PhpStorm.
 * User: radim_000
 * Date: 22. 6. 2015
 * Time: 17:26
 */
include"../../functions/dbconnect.php";
$request = "SELECT * FROM  `event_score` WHERE  `event_id` =1";
$i=0;
$lastname=array();
$id=array();
$true=array();
$basName=array();
$result = $mysqli->query($request);
while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
    $lastname[$i]=$row["last_name"];
    $firstname[$i]=$row["first_name"];
    $id[$i]=$row["id"];
    $i++;
}
echo "<page size='A4'><div class='book'>
    <div class='page'>
        <div class='subpage'><h1>Gymtri Sport </strong></h1>";
echo " <h2>Sourozenecké dvojice ze startujících závodníků</h2>";
echo "<table class='thetable'><tr><th>Jméno</th><th>Příjmení</th><th>Jméno</th><th>Příjmení</th></tr>";
$x=0;
$y=0;
$count=0;
while($x<$i){
    //echo substr($lastname[$x], 0, 5)."<br>";
    $z=0;
    while($z<$i){
        if(substr($lastname[$z], 0, 5)==substr($lastname[$x], 0, 5) && $z!=$x && $firstname[$z]!=$firstname[$x]){
           /* $true[$y]=$id[$z];//echo$lastname[$z];
            $basName[$y]=$lastname[$z];
            $y++;*/
            echo "<tr> <td>".$firstname[$z]."</td><td>".$lastname[$z];
            echo"</td><td>";
            echo $firstname[$x]."</td><td>".$lastname[$x];
            echo"</tr>";
            if($count>24){$count=0;pageDivider(null,null,null,$disciplines[$discipline-1],null,"find");}
            $count++;
        }
        $z++;
    }

    $x++;
}echo "</table>";
// valueFormat();
printInfo();
copyright();
/*
echo"<h1>HIGHLY EXPERIMENTAL</h1><br>";
echo"Najít možné sourozence<br>";
foreach($true as $value){
    $request = "SELECT *    FROM  `event_score`WHERE  `id` =$value;";
    $result = $mysqli->query($request);
while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
    echo $row["first_name"].$row["last_name"].$row["class_name"]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>";


}
}*/