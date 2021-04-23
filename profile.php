<?php
$id =$_POST['id'];

$connection = new mysqli('localhost' , 'root' , '' ,  'habib');
$data = $connection->query("SELECT * FROM ajtable WHERE id='$id' ");


$profile_data = $data->fetch_object();
?>
	<div class="wrap shadow">
		<div class="card">
			<div class="card-body">
				<h2>User profile: <?php echo $profile_data-> name; ?></h2>
				<img style="width:300px; height:200px; border-radius:50%; margin: 50px auto; display:block;" 
				src="photos/<?php echo $profile_data-> photo; ?>" alt="">
				<h1><?php echo $profile_data-> name; ?></h1>
				<h2><?php echo $profile_data-> cell; ?></h2>

				<table class="table">
					<tr>
						<td>Name</td>
						<td><?php echo $profile_data-> name; ?></td>
					</tr>
					<tr>
						<td>Email</td>
						<td><?php echo $profile_data-> email; ?></td>
					</tr><tr>
						<td>Username</td>
						<td><?php echo $profile_data-> name; ?></td>
					</tr><tr>
						<td>Cell</td>
						<td><?php echo $profile_data-> name; ?></td>
					</tr>
				</table>

				<a id="profile_back" class="btn btn-sm btn-primary" href="#">Back</a>

			</div>
		</div>
	</div>
	