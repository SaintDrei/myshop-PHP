<?php
    if (isset($_REQUEST['no']))
    {
    $orderNo = $_REQUEST['no'];
    
	$page_title = "Order # Details";	include_once('../../includes/header_admin.php');

	$sql_order = "SELECT od.DetailID, od.ProductID, p.Image,
		p.Name, c.Name AS Category, p.Price, od.Quantity,
		od.Amount FROM orderdetails od
		INNER JOIN products p ON od.productID = p.productID
		INNER JOIN categories c ON p.catID = c.CatID
		WHERE od.orderNo=0 AND od.userID=1";
	$result_order = $con->query($sql_order) or die(mysqli_error($con));

	$list_order = "";
	while ($row = mysqli_fetch_array($list_order))
	{
		$did = $row['DetailID'];
		$pid = $row['ProductID'];
		$image = $row['Image'];
		$pname = $row['Name'];
		$cat = $row['Category'];
		$price = number_format($row['Price'], 2, '.', ',');
		$qty = $row['Quantity'];
		$amount = number_format($row['Amount'], 2, '.', ',');

		$list_order .=  "<tr>
							<td><img src='../images/products/$image' width='150' /></td>
							<td><h3>$pname</h3>
								<small><em>$cat</em></small>
							</td>
							<td>P$price</td>
							<td>$qty<td/>
							<td>P$amount</td>
						</tr>";
	}

	$sql_compute = "SELECT SUM(amount) FROM orderdetails
		WHERE orderNo=0 AND userID=1";
	$result_compute = $con->query($sql_compute) or die(mysqli_error($con));
	while ($row2 = mysqli_fetch_array($result_compute))
	{
		$total = $row2[0];
		$gross = $total * .88;
		$VAT = $total * .12;
	}

	$userID = isset($_SESSION['userid']) ? SESSION['userid'] : 1;

	$sql_user = "SELECT firstName, lastName, email,
		street, municipality, cityID, landline,
		mobile FROM users WHERE userID=$userID";

	$result_user = $con->query($sql_user) or die(mysqli_error($con));
	while ($row3 = mysqli_fetch_array($result_user))
	{
		$firstName = $row3['firstName'];
		$lastName = $row3['lastName'];
		$emailAdd = $row3['email'];
		$street = $row3['street'];
		$municipality = $row3['municipality'];
		$city = $row3['cityName'];
		$landline = $row3['landline'];
		$mobile = $row3['mobile'];
	} 
    }
?>
	<form class="form-horizontal" method="POST">
	<div class="col-lg-8">
		
			<table class="table table-hover">
				<thead>
					<th colspan="2">Item</th>
					<th>Price</th>
					<th>Quantity</th>
					<th>Amount</th>
				</thead>
				<tbody>
					<?php echo $list_cart; ?>
				</tbody>
			</table>
			<hr/>
			<h2>Billing and Delivery Details</h2>
			<div class="col-lg-6">
				<div class="form-group">
					<label class="control-label col-lg-4">First Name</label>
					<div class="col-lg-8">
						<input name="fn" type="text" class="form-control" 
						value="<?php echo $firstName ?>" disabled />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-lg-4">Last Name</label>
					<div class="col-lg-8">
						<input name="ln" type="text" class="form-control" 
						value="<?php echo $lastName ?>" disabled />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-lg-4">Email Address</label>
					<div class="col-lg-8">
						<input name="email" type="email" class="form-control"
						value="<?php echo $emailAdd ?>" disabled />
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="form-group">
					<label class="control-label col-lg-4">Street</label>
					<div class="col-lg-8">
						<input name="st" type="text" class="form-control" 
						value="<?php echo $street ?>" disabled />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-lg-4">Municipality</label>
					<div class="col-lg-8">
						<input name="muni" type="text" class="form-control"
						value="<?php echo $municipality ?>" disabled />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-lg-4">City</label>
					<div class="col-lg-8">
						<input name="muni" type="text" class="form-control"
						value="<?php echo $cityName ?>" disabled />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-lg-4">Landline</label>
					<div class="col-lg-8">
						<input name="phone" type="text" class="form-control"
						value="<?php echo $landline ?>" disabled />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-lg-4">Mobile</label>
					<div class="col-lg-8">
						<input name="mobile" type="text" class="form-control"
						value="<?php echo $mobile ?>" disabled />
					</div>
				</div>
			</div>
	</div>
	<div class="col-lg-4">
		<div class="well">
			<h3 class="text-center">Order Summary</h3>
			<table class="table table-hover">
				<tr>
					<td>Status</td>
					<td><?php echo $status; ?></td>
				</tr>
				<tr>
					<td>Order Date</td>
					<td><?php echo $odate; ?></td>
				</tr>
				<tr>
					<td>Payment Method</td>
					<td><?php echo $payment; ?></td>
				</tr>
				<tr>
					<td>Approval Date</td>
					<td><?php echo $adate; ?></td>
				</tr>
				<tr>
					<td>Gross Amount</td>
					<td align='right'>P<?php echo number_format($gross, 2, '.', ','); ?></td>
				</tr>
				<tr>
					<td>VAT</td>
					<td align='right'><?php echo number_format($VAT, 2, '.', ','); ?></td>
				</tr>
				<tr>
					<td><b>Total Amount</b></td>
					<td align='right'><b>P<?php echo number_format($total, 2, '.', ','); ?></b></td>
				</tr>
			</table>
			<hr/>
			<button name='approve' class='btn btn-success btn-block btn-lg'
				onclick='return confirm("Approve order?");'>
				Approve
			</button>
			<button name='deliver' class='btn btn-success btn-block btn-lg'
				onclick='return confirm("Deliver order?");'>
				Deliver Items
			</button>
		</div>
	</div>
	</form>
	<div class='row'></div>

<?php
	include_once('../../includes/footer.php');
?>