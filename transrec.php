<!DOCTYPE html>
<html>
	<head>
		<title>Transaction History</title>
		<?php include 'link.php'; ?>
		<?php include 'style.php'; ?>
	</head>
	<body>
		<div class="container-fluid pt-5">
			<div class="text-center">
				<img src="images/logo.png" alt="HHP Bank" class="img-fluid"><br>
				<a href="index.php"><button class=" button btn btn-primary text-center">Home</button></a>
			</div>
		</div>
		<div class="main_div pt-5 text-white text-center">
			<h1 class="text-center brnd_name">Transaction History</h1>
			
			<div class="center_div mt-3">
				<div class="table-responsive">
					<table class="table table-bordered table-striped text-center table_style">
						<thead>
							<tr>
								<th>ID</th>
								<th>Sender Name</th>
								<th>Receiver Name</th>
								<th>Amount Transfered</th>
							</tr>
						</thead>
						<tbody>
							<?php
													include 'dbcon.php';
													$selectquery = "select * from transaction";
													$query = mysqli_query($con,$selectquery);
													$num = mysqli_num_rows($query);
													while($result = mysqli_fetch_array($query)){
													
							?>
							<tr>
								<td> <?php echo $result['id']; ?> </td>
								<td class="text-capitalize"> <?php echo $result['sender']; ?> </td>
								<td class="text-capitalize"> <?php echo $result['receiver']; ?> </td>
								<td> <?php echo $result['amount']; ?> </td>
							</tr>
							<?php
								}
								
							?>
							
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</body>
</html>