<?php

$p1 = $_POST['Player1'];
$p2 = $_POST['Player2'];
$t1 = $_POST['Tournament'];

$conn = mysqli_connect("localhost","username","password","ACM");
if(!$conn){
	die("Connection failed: ". mysqli_connect_error()."\n");
}
$sql = "select substring(tourney_date,1,4) as year,tourney_name,surface,round,winner_name from match_info,extra_info,tournament where match_info.match_id = extra_info.match_id and tournament.tourney_id = match_info.tourney_id and tournament.tourney_id = extra_info.tourney_id and tourney_name = '$t1' and (winner_name = '$p1' or winner_name = '$p2') and (loser_name = '$p1' or loser_name = '$p2');
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
    <th style="width:20%">Surface</th>
    <th style="width:10%">Round</th>
    <th style="width:30%">Winner</th>
  </tr>
';

$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result)){
	while($row = mysqli_fetch_assoc($result)){
		    $field1name = $row["year"];
        $field2name = $row["tourney_name"];
        $field3name = $row["surface"];
        $field4name = $row["round"];
        $field5name = $row["winner_name"];

        echo '<tr> 
                  <td>'.$field1name.'</td> 
                  <td>'.$field2name.'</td> 
                  <td>'.$field3name.'</td> 
                  <td>'.$field4name.'</td> 
                  <td>'.$field5name.'</td> 
              </tr>';
	}
}
else{
	echo "Sorry, No result";
}

mysqli_close($conn);
?>