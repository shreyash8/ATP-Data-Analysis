<?php

$conn = mysqli_connect("localhost","username","password","ACM");
if(!$conn){
  die("Connection failed: ". mysqli_connect_error()."\n");
}
$sql = "select substring(tourney_date,1,4),tourney_name,surface,winner_name from match_info,extra_info,tournament where match_info.match_id = extra_info.match_id and tournament.tourney_id = match_info.tourney_id and tournament.tourney_id = extra_info.tourney_id and tourney_level = 'M' and round = 'F'
";


echo '<style style="text/css">
    .hoverTable{
    width:100%; 
    border-collapse:collapse; 
  }

  .hoverTable th{ 
    padding:7px; border:#4e95f4 1px solid;
  }

  .hoverTable td{ 
    padding:7px; border:#4e95f4 1px solid;
  }
  /* Define the default color for all the table rows */
  .hoverTable tr{
    background: purple;
  }
  /* Define the hover highlight color for the table row */
    .hoverTable tr:hover {
          background-color: blue;
    }
</style>

<table class="hoverTable">
  <tr>
    <th style="width:10%">Year</th>
    <th style="width:30%">Tournament</th>
    <th style="width:10%">Surface</th>
    <th style="width:50%">Winner</th>
  </tr>
';


$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result)){
  while($row = mysqli_fetch_assoc($result)){
    $field1name = $row["substring(tourney_date,1,4)"];
        $field2name = $row["tourney_name"];
        $field4name = $row["surface"];
        $field3name = $row["winner_name"];

        echo '
            <tr> 
                  <td>'.$field1name.'</td> 
                  <td>'.$field2name.'</td> 
                  <td>'.$field4name.'</td> 
                  <td>'.$field3name.'</td> 
              </tr>
              ';
  }
}
else{
  echo "Sorry, No result";
}
mysqli_close($conn);
?>