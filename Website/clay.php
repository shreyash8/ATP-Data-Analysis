<?php

$p1 = $_POST['Tournament'];

$conn = mysqli_connect("localhost","username","password","ACM");
if(!$conn){
	die("Connection failed: ". mysqli_connect_error()."\n");
}
$sql1 = " create view v1 as select match_info.match_id as id,surface,winner_name,loser_name from match_info,extra_info,tournament where match_info.match_id = extra_info.match_id and tournament.tourney_id = match_info.tourney_id and tournament.tourney_id = extra_info.tourney_id and surface = 'clay';
";

$sql2 = "select winner_name, count(id) as times from v1 group by winner_name order by times desc limit 20;
";

$sql = "drop view v1;";

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
    <th style="width:50%">Player Name</th>
    <th style="width:50%">No. of Times Won</th>
  </tr>
';

$resulttemp = mysqli_query($conn, $sql1);
$result = mysqli_query($conn, $sql2);

if(mysqli_num_rows($result)){
	while($row = mysqli_fetch_assoc($result)){
		    $field1name = $row["winner_name"];
        $field2name = $row["times"];

        echo '<tr> 
                  <td>'.$field1name.'</td> 
                  <td>'.$field2name.'</td> 
              </tr>';
	}
}
else{
	echo "Sorry, No result";
}

$resulttemp1 = mysqli_query($conn, $sql);

mysqli_close($conn);
?>