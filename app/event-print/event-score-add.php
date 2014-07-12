


<?PHP include $_SERVER['DOCUMENT_ROOT']."/Web-sport.gymtri.cz/functions/check.php"; ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<meta charset="UTF-8" />
<head>
    <title></title>
    <style type="text/css">
        body {
        margin: 0;
        padding: 0;
        background-color: #FAFAFA;
        font: 12pt "Tahoma";
    }
    h1 {
    font-size:15pt;
    text-align:center;
    
    }
    h2 {
    font-size:11pt;
    text-align:center;
    border-bottom:1px solid black;

    }
table { 
color: #333;
font-family: Helvetica, Arial, sans-serif;
width: 640px; 
border-collapse: 
collapse; border-spacing: 0; 
}

td, th { 
border: 1px solid transparent; /* No more visible border */
height: 30px; 
transition: all 0.3s;  /* Simple transition for hover effect */
}

th {
background: #DFDFDF;  /* Darken header a bit */
font-weight: bold;
}

td {
background: #FAFAFA;
text-align: center;
}

/* Cells in even rows (2,4,6...) are one color */ 
tr:nth-child(even) td { background: #F1F1F1; }   

/* Cells in odd rows (1,3,5...) are another (excludes header cells)  */ 
tr:nth-child(odd) td { background: #FEFEFE; }  

tr td:hover { background: #666; color: #FFF; } /* Hover cell effect! */
    
    * {
        box-sizing: border-box;
        -moz-box-sizing: border-box;
    }
    .page {
        width: 21cm;
        min-height: 29.7cm;
        padding: 2cm;
        margin: 1cm auto;
        border: 1px #D3D3D3 solid;
        border-radius: 5px;
        background: white;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }
    .subpage {
        padding: 0,5cm;
        
        height: 267mm;
       
    }
    
    @page {
        size: A4;
        margin: 0;
    }
    @media print {
        .page {
            margin: 0;
            border: initial;
            border-radius: initial;
            width: initial;
            min-height: initial;
            box-shadow: initial;
            background: initial;
            page-break-after: always;
        }
    }
    
    
    </style>
</head>
<body>

<?PHP
        




      if(isset($_GET['id'])){$id= $_GET['id'];}else{}
      if(isset($_GET['trida'])){$trida= $_GET['trida'];}else{}
      if(isset($_GET['class'])){$class= $_GET['class'];}else{}
      if(isset($_GET['classid'])){$classid= $_GET['classid'];}else{}
      if(isset($_GET['beginyear'])){$beginyear= $_GET['beginyear'];}else{}
       include $_SERVER['DOCUMENT_ROOT']."/Web-sport.gymtri.cz/functions/dbconnect.php";
     $request2="SELECT * FROM `event` WHERE `id` = $id ORDER BY `event_date` DESC";
      $result2 = $mysqli->query($request2);
      $row2 = $result2->fetch_array(MYSQLI_NUM);
      
   
     
      if(isset($_GET['id'])){
      
      $request1= "SELECT * FROM `discipline`"  ; 
      $result1 = $mysqli->query($request1);
      $disciplines = array(); $disciplinesid=array();
      $i = 0;
      while($row1 = $result1->fetch_array(MYSQLI_NUM)){
      array_push($disciplines,  $row1[1]);
      array_push($disciplinesid,  $row1[0]);
      
      }  

      
     
     
     
     echo"<div class='book'>
    <div class='page'>
        <div class='subpage'><h1>Gymtri výsledková listina - <strong>".$row2[1]."</strong></h1> 
        Soutěž konána dne: ".$row2[4]." <br>Vytvořil: ".$row2[2]." <br>Zapisovali: ".$row2[3]." <br> <h2>Třída: ".$trida."</h2>";
        $request= "SELECT * FROM `event_score` WHERE `event_id` = $id AND `class_id` = '$classid' ORDER BY `event_score`.`score_points` DESC"  ; 
      $result = $mysqli->query($request);
     $i = 1;
     echo"<table class='thetable'><tr><th>#</th><th>Jméno</th><th>Příjmení</th><th>Disciplína</th><th>Výkon</th><th>Body</th></tr>";
      while($row = $result->fetch_array(MYSQLI_NUM)){
echo"
          <tr><td>".$i.". </td><td>
           ".$row[10]."</td><td>
           ".$row[11]."</td><td>
           ";
          
          
     echo"
          ";
          foreach ($disciplinesid as &$discipline) {if ($discipline == $row[4]){ $num = -1+$row[4];echo$disciplines[$num]; }}echo"
         ";
         

echo"</td><td><strong>".$row[5]."</strong></td><td><strong>".$row[6]."</td></tr>";
$i++;}
   }
   echo"</table>";
      
      
      
     echo" <h2>Formát výkonů</h2>  
     <table><tr><th>Název disciplíny</th><th>jednotky</th><th>formát</th></tr>
     <tr><td>60m,100m,1500m,3000m sprint</td><td>sekundy</td><td>[s]</td></tr>
     <tr><td>granát, míč</td><td>metry</td><td>[m]</td></tr>
     <tr><td>dálka, výška</td><td>centimetry</td><td>[cm]</td></tr>
     <tr><td>šplh</td><td>sekundy</td><td>[s]</td></tr>
     <tr><td>25m,50m,100m plavání</td><td>sekundy</td><td>[s]</td></tr>

     </table>
     
    </div></div>
</div>";
        
        
        ?>
     

</body>
</html>

     