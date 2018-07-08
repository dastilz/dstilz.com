<?php

$mysqli->select_db("projects");


$query = $mysqli->prepare("SELECT * FROM subgroups");
$query->execute();
$result = $query->get_result();

$i = 0;
$j = 0;
$left = [];
$right = [];

while($data = $result->fetch_array(MYSQLI_NUM)){
	$check = $data[1];
	if($check == "Left"){
		$left[$i] = $data[0];		
		$i++;
	}
	else if ($check == "Right"){
		$right[$j] = $data[0];		
		$j++;
	}
}
echo "
<div class=\"blockLeft\">
";
for($i = 0; $i < count($left); $i++){	
	if($query = $mysqli->prepare("SELECT * FROM posts WHERE subgroup=?")){
		if ($query2 = $mysqli->prepare("SELECT * FROM subgroups WHERE names=?")){
			$query->bind_param('s', $left[$i]);
			$query->execute();
			$result = $query->get_result();			
			
			
			$query2->bind_param('s', $left[$i]);
			$query2->execute();
			$result2 = $query2->get_result();
			$data2 = $result2->fetch_array(MYSQLI_NUM);
			
			$title = $data2[0];
			echo "
			<div class=\"genericBlock\">
			<h1>$title</h1>
			";
		}
		while($data = $result->fetch_array(MYSQLI_NUM)){
			$subgroup = $data[0];
			$linkName = $data[1];
			$projectName = $data[2];
			$content = $data[3];	
			echo "
			<a href = \"../projects/$linkName\">$projectName</a><br>
			";
		}
		echo "
		</div>
		";
	}
}
echo "
</div>
";


echo "
<div class=\"blockRight\">
";
for($i = 0; $i < count($right); $i++){	
	if($query = $mysqli->prepare("SELECT * FROM posts WHERE subgroup=?")){
		if ($query2 = $mysqli->prepare("SELECT * FROM subgroups WHERE names=?")){
			$query->bind_param('s', $right[$i]);
			$query->execute();
			$result = $query->get_result();			
			
			
			$query2->bind_param('s', $right[$i]);
			$query2->execute();
			$result2 = $query2->get_result();
			$data2 = $result2->fetch_array(MYSQLI_NUM);
			
			$title = $data2[0];
			echo "
			<div class=\"genericBlock\">
			<h1>$title</h1>
			";
		}
		while($data = $result->fetch_array(MYSQLI_NUM)){
			$subgroup = $data[0];
			$linkName = $data[1];
			$projectName = $data[2];
			$content = $data[3];	
			echo "
			<a href = \"../projects/$linkName\">$projectName</a><br>
			";
		}
		echo "
		</div>
		";
	}
}
echo "
</div>
";

