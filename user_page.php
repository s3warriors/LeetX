


<!DOCTYPE html>
<html>
<head>
	<title>LeetCode User Profile</title>
   <link rel="stylesheet" href="css/navbar.css">
  <link rel="stylesheet" href="up.css">
</head>
<body>
<header>
     <nav class="navbar">  
        <a href="index.html">Home</a>
    <a href="courses.html">Courses</a>
    <a href="problems.html">Problems</a>
    <img  id="logo" src="css/logo.png" alt=""> 
    <img  src="css/user3.jpeg" alt="">
  </nav>
</header>
<?php
require 'config.php';

session_start();

if(!isset($_SESSION['user_name'])){

   header('location:index.php');

}else{

   $user_name = $_SESSION['user_name'];

   // Retrieve user data from database
   $select = "SELECT * FROM user_form WHERE name = '$user_name'";
   $result = mysqli_query($conn, $select);

   if($result instanceof mysqli_result && mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_assoc($result);
$user_name=$row['name'];
      $email = $row['email'];
      // $user_type = $row['user_type'];

      // Display user data on page
      echo "<h1>Welcome, $user_name!</h1>";
      // echo "<p>Email: $email</p>";
      // echo "<p>User Type: $user_type</p>";

   }else{
      echo "Error retrieving user data.";
   }

}
?>
	<!-- <h1>LeetCode User Profile</h1> -->
	<div class="container">
	
			<img class="profile-pic" src="css/user1.jpeg" alt="Profile picture">
	
		<div class="info">
			<?php
				// Connect to database
				$servername = "localhost";
				$username = "username";
				$password = "password";
				$dbname = "user_db";
				
				// $conn = mysqli_connect($servername, $username, $password, $dbname);
				if (!$conn) {
					die("Connection failed: " . mysqli_connect_error());
				}
				
				// Retrieve user's name
            $select = "SELECT * FROM user_form WHERE name = '$user_name'";
            $result = mysqli_query($conn, $select);
				
				
				// Print user's name
				// if ($result instanceof mysqli_result &&mysqli_num_rows($result) > 0) {
				// 	$row = mysqli_fetch_assoc($result);
				// 	echo "<h2>" . $row["name"] . "</h2>";
				// } else {
				// 	echo "No results";
				// }
				
				// Generate random statistics
				$problem_streak = rand(0, 100);
				$contest_attendee = rand(0, 50);
				$num_problems_solved = rand(0, 1000);
				$rating = rand(0, 5000);
			?>
			<p>Problem Streak: <?php echo $problem_streak; ?></p>
			<p>Contest Attendee: <?php echo $contest_attendee; ?></p>
			<p>Number of Problems Solved: <?php echo $num_problems_solved; ?></p>
			<p>Rating: <?php echo $rating; ?></p>
			<a href="#" class="btn">Edit Profile</a>
		</div>
	</div>

<br>
<br>
<br>
	<table class="table">
		<thead>
			<tr>
				<th>Topic</th>
				<th>Solved Problems</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Array</td>
				<td><?php echo rand(50, 150); ?></td>
			</tr>
			<tr>
				<td>Linked List</td>
				<td><?php echo rand(30, 100); ?></td>
			</tr>
			<tr>
				<td>Tree</td>
				<td><?php echo rand(20, 80); ?></td>
			</tr>
			<tr>
				<td>Map/Set</td>
				<td><?php echo rand(10, 50); ?></td>
			</tr>
			<tr>
				<td>Graph</td>
				<td><?php echo rand(5, 30); ?></td>
			</tr>
			<tr>
				<td>Dynamic Programming</td>
				<td><?php echo rand(50, 150); ?></td>
			</tr>
			<tr>
				<td>Bit Manipulation</td>
				<td><?php echo rand(5, 20); ?></td>
			</tr>
			<tr>
				<td>Math</td>
				<td><?php echo rand(10, 50); ?></td>
			</tr>
			<tr>
				<td>String</td>
				<td><?php echo rand(30, 100); ?></td>
			</tr>
			<tr>
				<td>Greedy</td>
				<td><?php echo rand(10, 30); ?></td>
			</tr>
		</tbody>
	</table>
	<!-- <a href="#" class="btn">View All Problems</a> -->
</body>
</html>
</div>
</body>
</html>











