 while($row = $result->fetch_array(MYSQLI_NUM)){
        echo"<ul class='list-inline scoreboard'>
          <li class='labele'>".$i." </li>
           <li class='name'>".$row[1]."</li>
           <li class='lastname'>".$row[2]."</li>
           <li class='sex'>";if($row[3]=="M"){echo"<span class='label label-primary'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>";}elseif($row[3]=="F"){echo"<span class='label label-danger'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>";}else{}
          
          
     echo"</li>
          <li class='class'>".$year.".".$class."</li><li class='birth'>".$birth." | Věk: ".$vek."
          
         </li><li class='discipline'> <select name='discipline'>";foreach ($disciplines as &$discipline) {
   echo"<option value='".$discipline."'>".$discipline."</option>";
}

echo"</select></li> <li class='score'><input type='text' name='vykon' size='10'></input></li><li class='save'><input type='submit' class='btn btn-sm btn-default' value='Uložit'></input></li></ul>
        ";