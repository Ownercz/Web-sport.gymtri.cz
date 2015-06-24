
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
include "../../functions/dbconnect.php";
?>
<?PHP
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
    if (isset($_GET['discipline'])) {
    $discipline = $_GET['discipline'];
}
$request1 = "SELECT * FROM `discipline` ORDER by id ASC";
$result1 = $mysqli->query($request1);
$disciplines = array();
$disciplinesid = array();
$i = 0;
while ($row1 = $result1->fetch_array(MYSQLI_NUM)) {
    array_push($disciplines, $row1[1]);
    array_push($disciplinesid, $row1[0]);

}
    echo "<page size='A4'><div class='book'>
    <div class='page'>
        <div class='subpage'><h1>Gymtri výsledková listina - <strong> průběžné výsledky závodníků </strong></h1>";
    $foreachSingle=0;

$request = "SELECT * FROM `event_score` WHERE `event_id` LIKE $id AND `discipline_id` LIKE $discipline ORDER by last_name ASC;";
    //echo$request."<br>";
    $result = $mysqli->query($request);
    $i = 1;
    $count=0;
    if(mysqli_num_rows($result)== 0){}else{
    echo "<table class='thetable'><tr><th>Jméno</th><th>Příjmení</th><th>Třída</th><th>Výkon</th></tr>";
        echo"<h2>".$disciplines[$discipline-1]."</h2>";
    while ($row = $result->fetch_array(MYSQL_ASSOC)) {

        $count++;
        if($count>24){$count=0;pageDivider(null,null,null,$disciplines[$discipline-1],null,"stats-single");}
echo "
          <tr> <td>
           " . $row["first_name"] . "</td><td>
           " . $row["last_name"] . "</td><td>
           " . $row["class_name"] . "</td><td>
           " . printNice($disciplines[$discipline-1],$row["score_value"]) . "</td>
           </tr>";

        //echo "<td><strong>" . printNice($disciplines[$num],$row[5]) . "</strong></td><td><strong>" . printDot($row[6]) . "</td></tr>";
        $i++;
    }
    echo "</table>";
       // valueFormat();
        printInfo();
    copyright();


    }
