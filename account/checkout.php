<?php
	$page_title = "Checkout";
	include_once('../includes/header.php');

	$sql_cart = "SELECT od.DetailID, od.ProductID, p.Image,
		p.Name, c.Name AS Category, p.Price, od.Quantity,
		od.Amount FROM orderdetails od
		INNER JOIN products p ON od.productID = p.productID
		INNER JOIN categories c ON p.catID = c.CatID
		WHERE od.orderNo=0 AND od.userID=1";
	$result_cart = $con->query($sql_cart) or die(mysqli_error($con));
	$list_cart = "";
	while ($row = mysqli_fetch_array($result_cart))
	{
		$did = $row['DetailID'];
		$pid = $row['ProductID'];
		$image = $row['Image'];
		$pname = $row['Name'];
		$cat = $row['Category'];
		$price = number_format($row['Price'], 2, '.', ',');
		$qty = $row['Quantity'];
		$amount = number_format($row['Amount'], 2, '.', ',');

		$list_cart .=  "<tr>
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

$sql_cities = "SELECT cityID, name FROM cities
WHERE regionID = 1";
$result_cities = $con->query($sql_cities);
$list_cities = "";
while($row3 = mysqli_fetch_array($result_cities))
{
    $cityID = $row3['cityID'];
    $cityName = $row3['name'];
    
    $list_cities .= "<option value='$cityID'>$cityName</option>";
}

$userID = isset($_SESSION['userid']) ? SESSION['userid'] : 1;

$sql_user = "SELECT firstName, lastName, email, street, municipality, cityID, landline, mobile FROM users WHERE userID =$userID";
$result_user = $con->query($sql_user) or die(mysqli_error($con));
while($row4 = mysqli_fetch_array($result_user))
{
    $firstName = $row4['firstName'];
    $lastName = $row4['lastName'];
    $emailAdd = $row4['email'];
    $street = $row4['street'];
    $municipality = $row4['municipality'];
    $cityID = $row4['cityID'];
    $landline = $row['landline'];
    $mobile = $row['mobile'];
}
?>
	<div class="col-lg-8">
		<form class="form-horizontal" method="POST">
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
						<input name="fn" type="text" class="form-control" value='<?php echo $firstName; ?>' required />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-lg-4">Last Name</label>
					<div class="col-lg-8">
						<input name="ln" type="text" class="form-control" value='<?php echo $lastName; ?>' required />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-lg-4">Email Address</label>
					<div class="col-lg-8">
						<input name="email" type="email" class="form-control" value='<?php echo $emailAdd; ?>' required />
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="form-group">
					<label class="control-label col-lg-4">Street</label>
					<div class="col-lg-8">
						<input name="st" type="text" class="form-control" value='<?php echo $street; ?>' required />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-lg-4">Municipality</label>
					<div class="col-lg-8">
						<input name="muni" type="text" class="form-control" value='<?php echo $municipality; ?>' required />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-lg-4">City</label>
					<div class="col-lg-8">
						<select name="cities" class="form-control"  required>
                            
							<option value="">Select one...</option>
                            <?php echo $list_cities ?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-lg-4">Landline</label>
					<div class="col-lg-8">
						<input name="phone" type="text" class="form-control" value='<?php echo $landline; ?>' required />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-lg-4">Mobile</label>
					<div class="col-lg-8">
						<input name="mobile" type="text" class="form-control" value='<?php echo $mobile; ?>' required />
					</div>
				</div>
			</div>
		</form>
	</div>
	<div class="col-lg-4">
		<div class="well">
			<h3 class="text-center">Order Summary</h3>
			<table class="table table-hover">
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
			<select name='payment' class='form-control'>
				<option>Cash on Delivery</option>
				<option>Bank Deposit</option>
			</select>
			<br/>
			<label><input type='checkbox' required/> I have agreed to the terms and conditions.</label>
			<button name='checkout' class='btn btn-success btn-block btn-lg'
				onclick='return confirm("Submit order?");'>
				Checkout
			</button>
		</div>
	</div>
	<div class='row'></div>

<?php
	include_once('../includes/footer.php');
?>