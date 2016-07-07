<?php
/*echo "<pre>";
var_dump($all_users);
echo "</pre>";*/
$i = 1;
echo "<table border=1>";
foreach($all_users as $key => $value){
	echo "<tr>";
	echo '<td>'.$i++.'</td>';
	echo "<td>";
	echo $value['username'];
	echo "</td>";
	echo "<td>";
	echo $value['password'];
	echo "</td>";		
}
echo "</table>";
echo "<p>".anchor('login/insert-user', 'Insert new user')."</p>";
echo '<p>Time: ' .$this->benchmark->elapsed_time(). '</p>';
echo '<p>Memory: ' . $this->benchmark->memory_usage(). '</p>'; 