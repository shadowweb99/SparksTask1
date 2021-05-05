<!DOCTYPE html>
<html>
	<head>
		<title>HHP Bank - Customers</title>
		<?php include 'link.php'; ?>
		<?php include 'style.php'; ?>
	</head>
	<body>
		
		<div class="container-fluid pt-5">
			<div class="text-center">
				<img src="images/logo.png" alt="HHP Bank" class="img-fluid"><br>
				<a href="index.php"><button class="button btn btn-primary text-center">Home</button></a>
				<a href="transrec.php"><button class="button btn btn-primary text-center">Transaction History</button></a>
			</div>
		</div>
		<div class="main_div pt-5 text-center">
			<h1 class="text-center brnd_name">Customers</h1>
			
			<div class="center_div mt-3">
				<div class="table-responsive">
					<table class="table table-bordered table-striped text-center table_style">
						<thead>
							<tr>
								<th>ID</th>
								<th>Customer Name</th>
								<th>E-mail</th>
								<th>Balance</th>
								<th>Operation</th>
							</tr>
						</thead>
						<tbody>
							<?php
													include 'dbcon.php';
													$selectquery = "select * from customers";
													$query = mysqli_query($con,$selectquery);
													$num = mysqli_num_rows($query);
													while($result = mysqli_fetch_array($query)){
													
							?>
							<tr>
								<td> <?php echo $result['id']; ?> </td>
								<td> <?php echo $result['name']; ?> </td>
								<td> <?php echo $result['email']; ?> </td>
								<td> <?php echo $result['balance']; ?> </td>
								<td ><a href="view.php?id=<?php echo $result['id']; ?>" data-toggle="tooltip"
									data-placement="top" title="View" style="color: #00cc66;">
									<button class="button btn btn-primary">
									View
								</button></a></td>
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