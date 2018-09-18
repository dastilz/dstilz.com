<?php
//Change mysqli object to database "hub"
$mysqli->select_db("hub");

//SQL query strings
$left = "Left";
$right = "Right";	
//Load session URL query data
$display = $_SESSION['query3'];

//If display is for all, display main page
//Find subgroups in the left position and show the content associated to those subgroups
if ($display == "all"){
	echo "
	<div class=\"container_left_400px\">
	";
	//Find all subgroups in left position
	if($query1 = $mysqli->prepare("SELECT * FROM subgroups WHERE position=?")){
		$query1->bind_param('s', $left);
		$query1->execute();
		$result1 = $query1->get_result();		
		while($data1 = $result1->fetch_array(MYSQLI_NUM)){	
			$subgroup = $data1[0];
			//Find all available links to content in a given subgroup
			if($query2 = $mysqli->prepare("SELECT * FROM posts WHERE subgroup=?"))
				//Subgroup name
				echo "
				<div class=\"content_container_centered_400px\">
					<h1>$subgroup</h1>
				";
				$query2->bind_param('s', $subgroup);
				$query2->execute();
				$result2 = $query2->get_result();
				while($data2 = $result2->fetch_array(MYSQLI_NUM)){
					$linkName = $data2[1];
					$projectName = $data2[2];
					$content = $data2[3];
					//Subgroup link to content
					echo "
					<a href = \"../hub/$linkName\">$projectName</a><br>
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
	//Find subgroups in the right position and show the links to content associated to those subgroups
	echo "
	<div class=\"container_right_400px\">
	";
	//Find all subgroups in right position
	if($query1 = $mysqli->prepare("SELECT * FROM subgroups WHERE position=?")){
		$query1->bind_param('s', $right);
		$query1->execute();
		$result1 = $query1->get_result();		
		while($data1 = $result1->fetch_array(MYSQLI_NUM)){	
			$subgroup = $data1[0];
			//Find all available links to content in a given subgroup
			if($query2 = $mysqli->prepare("SELECT * FROM posts WHERE subgroup=?"))
				//Subgroup name
				echo "
				<div class=\"content_container_centered_400px\">
					<h1>$subgroup</h1>
				";
				$query2->bind_param('s', $subgroup);
				$query2->execute();
				$result2 = $query2->get_result();
				while($data2 = $result2->fetch_array(MYSQLI_NUM)){
					$linkName = $data2[1];
					$projectName = $data2[2];
					$content = $data2[3];
					//Subgroup link to content
					echo "
					<a href = \"../hub/$linkName\">$projectName</a><br>
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
}
else{
	if($query = $mysqli->prepare("SELECT * FROM posts WHERE name=?")){
		$query->bind_param('s', $display);
		$query->execute();
		$result = $query->get_result();
		$data = $result->fetch_array(MYSQLI_NUM);
		$content = $data[3];
		echo "$content";
	}
}

