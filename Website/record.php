<?php

$p1 = $_POST['Player'];
$p2 = $_POST['Tournament'];

$conn = mysqli_connect("localhost","username","password","ACM");
if(!$conn){
	die("Connection failed: ". mysqli_connect_error()."\n");
}
$sql1 = "create view v1 as select substring(tourney_date,1,4) as year,tourney_name,surface,round from match_info,extra_info,tournament where match_info.match_id = extra_info.match_id and tournament.tourney_id = match_info.tourney_id and tournament.tourney_id = extra_info.tourney_id and tourney_name = '$p2' and (winner_name = '$p1' or loser_name = '$p1' );
";

$sql2 = "select round, count(year) as cnt from v1 group by round order by cnt;
";

$sql = "drop view v1;";

$sql3 = "create view v1 as select winner_name,tourney_date from match_info,extra_info,tournament where match_info.match_id = extra_info.match_id and tournament.tourney_id = match_info.tourney_id and tournament.tourney_id = extra_info.tourney_id and (winner_name = '$p1' and tourney_name = '$p2' and round = 'F' );";

$sql4 = "select count(tourney_date) as onlyone from v1 group by winner_name having winner_name = '$p1';
";

echo '<style style="text/css">
    .hoverTable{
    width:40%; 
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
    <th style="width:10%">Round</th>
    <th style="width:30%">Count</th>
  </tr>
';

$resultfake = mysqli_query($conn, $sql1);
$result = mysqli_query($conn, $sql2);

if(mysqli_num_rows($result)){
	while($row = mysqli_fetch_assoc($result)){
		    $field1name = $row["round"];
        $field2name = $row["cnt"];
        echo '<tr> 
                  <td>'.$field1name.'</td> 
                  <td>'.$field2name.'</td> 
              </tr>';
	}
}

else{
	echo "Sorry, No result";
}

echo '</table>';

echo '<table class="hoverTable">
  <tr>
    <th style="width:10%">WON</th>
  </tr>
';

$result1 = mysqli_query($conn, $sql);

$resultfake1 = mysqli_query($conn, $sql3);
$result2 = mysqli_query($conn, $sql4);

if(mysqli_num_rows($result2)){
  while($row = mysqli_fetch_assoc($result2)){
         $field1name = $row["onlyone"];
          echo '<tr> 
                  <td>'.$field1name.'</td> 
              </tr>';
  }
}

else{
  echo "Sorry, No result";
}

$result3 = mysqli_query($conn, $sql);

mysqli_close($conn);
?>