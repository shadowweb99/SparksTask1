<?php 

include 'dbcon.php';

if(isset($_POST['submit']))
{
    $from = $_GET['id'];
    $toUser = $_POST['to'];
    $amnt = $_POST['amount'];

    $sql = "SELECT * from customers where id=$from";
    $query = mysqli_query($con,$sql);
    $sql1 = mysqli_fetch_array($query); 

    $sql = "SELECT * from customers where id=$toUser";
    $query = mysqli_query($con,$sql);
    $sql2 = mysqli_fetch_array($query);

  
 if($amnt > $sql1['balance']) 
    {
        
        echo '<script type="text/javascript">';
        echo ' alert("Insufficient Balance")'; 
        echo '</script>';
    }
    
 else if($amnt == 0){
     echo "<script type='text/javascript'>alert('Enter Amount Greater than Zero');
</script>";
 }
    else {
        
       
        $newbalance = $sql1['balance'] - $amnt;
        $sql = "UPDATE customers set balance=$newbalance where id=$from";
        mysqli_query($con,$sql);
     


        $newbalance = $sql2['balance'] + $amnt;
        $sql = "UPDATE customers set balance=$newbalance where id=$toUser";
        mysqli_query($con,$sql);
           
        $sender = $sql1['name'];
        $receiver = $sql2['name'];
        $sql = "INSERT INTO `transaction`(`sender`,`receiver`, `amount`) VALUES ('$sender','$receiver','$amnt')";
        $tns=mysqli_query($con,$sql);
        if($tns){
           echo "<script type='text/javascript'>alert('Transaction Successfull!');
window.location='transrec.php';
</script>";
        }
       
        $newbalance= 0;
        $amnt =0;
       
     
    }
    
}
?>


<!DOCTYPE html>
<html>
	<head>
		<title>View Customer</title>
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
		<div class="row">
			<div class="col-lg-5 col-md-6 col-12 pt-5 mt-5 text-center left_img">
				<img src="images/main.svg" class="img-fluid logo_style">
			</div>
			
			<div class="col-lg-6 col-md-6 col-12 mt-5 pt-5 pb-3" >
				<div>
					<h1 class="brnd_name">Money Transfer Process</h1>
					<form method="post" name="tbal"><br/>
						<?php
						include 'dbcon.php';
						$sid = $_GET['id'];
						$sql = "SELECT * FROM  customers where id=$sid";
						$query=mysqli_query($con,$sql);
						if(!$query)
						{
						echo "Error ".$sql."<br/>".mysqli_error($con);
						}
						$rows=mysqli_fetch_array($query);
						?>
						<label style="color: #DAA520; font-family: 'Volkhov', serif;"> Money Transfer From: </label><br/>
						<div class="table-responsive">
							<table class="table text-center table_style">
								<tr>
									<th>Id</th>
									<th>Name</th>
									<th>Email</th>
									<th>Balance</th>
								</tr>
								<tr>
									<td><?php echo $rows['id']?></td>
									<td><?php echo $rows['name'] ;?></td>
									<td><?php echo $rows['email'] ;?></td>
									<td><?php echo $rows['balance'] ;?></td>
								</tr>
								
							</table>
						</div>
						<label style="color: #DAA520; font-family: 'Volkhov', serif;">Money Transfer To:</label>
						<select class=" form-control" name="to" style="margin-bottom:5%;" required>
							<option value="" disabled selected> To </option>
							<?php
							include 'dbcon.php';
							$sid=$_GET['id'];
							$sql = "SELECT * FROM customers where id!=$sid";
							$query=mysqli_query($con,$sql);
							if(!$query)
							{
							echo "Error ".$sql."<br/>".mysqli_error($con);
							}
							while($rows = mysqli_fetch_array($query)) {
							?>
							<option class="table text-center table-striped " value="<?php echo $rows['id'];?>" >
								
								<?php echo $rows['name'] ;?> (Balance:
								<?php echo $rows['balance'] ;?> )
								
							</option>
							<?php
							}
							?>
						</select> <br>
						<label style="color: #DAA520; font-family: 'Volkhov', serif;">Enter Number of Money to be Transferred:</label>
						<input type="number" id="amm" class="form-control" name="amount" min="0" required /> <br/>
						<div class="text-center btn3">
							<button class="btn button" name="submit" type="submit" >Transfer</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>