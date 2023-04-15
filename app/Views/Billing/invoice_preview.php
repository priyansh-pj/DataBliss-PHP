<!DOCTYPE html>
<html>
<head>
	<title>Tax Invoice</title>
	<style>
		
		body {
			font-family: Arial, sans-serif;
			font-size: 14px;
			line-height: 1.5;
		}
		table {
			border-collapse: collapse;
			width: 100%;
		}
		
		th, td {
			text-align: left;
			padding: 8px;
		}
		
		th {
			background-color: #f2f2f2;
			color: black;
		}
		
		.header {
			text-align: center;
			font-size: 18px;
			font-weight: bold;
			margin-bottom: 20px;
		}
		.section-title {
			font-size: 16px;
			font-weight: bold;
			margin-bottom: 10px;
		}
		.container{
			display: grid;
			grid-template-columns: 1fr 1fr;
			grid-gap: 20px;
		}
		.customer-details {
			margin-bottom: 20px;
			display: flexbox;
			
		}
		.customer-details table {
			margin-bottom: 10px;
			display: flexbox;
		}

		.invoice-detail {
			margin-bottom: 20px;
			display: flexbox;
		}
		.invoice-detial table {
			margin-bottom: 10px;
			display: flexbox;
		}
		.order-details {
			margin-bottom: 20px;
		}
		.order-details table {
			margin-bottom: 10px;
		}
		.footer {
			margin-top: 20px;
			text-align: right;
		}
		.footer p {
			margin-bottom: 5px;
		}
		.footer h3 {
			margin: 0;
		}

	</style>

</head>
<body>
	<div class="header">
		<h1>Tax Invoice</h1>
	</div>
	<hr></hr>
	<div class="container">
        
        <div class="customer-details">
            <div class="row"><h2>Customer Details</h2></div>
            <table>
				<tr>
					<th>Customer ID:</th>
                    <td><?= $bill[0]->contact_id?></td>
                </tr>
                <tr>
                    <th>Customer Name:</th>
                    <td><?= $bill[0]->contact_name?></td>
                </tr>
                <tr>
                    <th>Customer Phone:</th>
                    <td><?= $bill[0]->contact_phone?></td>
                </tr>
                <tr>
                    <th>Customer Pincode:</th>
                    <td><?= $bill[0]->contact_pincode?></td>
                </tr>
				<tr>
                    <th>Customer GST:</th>
                    <td><?= $bill[0]->gst_number?></td>
                </tr>
            </table>
        </div>

        <div class="invoice-details">
            <div class="column"><h2>Invoice Details</h2></div>
            <table>
                <tr>
                    <th>Order No.:</th>
                    <td><?= $bill[0]->id?></td>
                </tr>
                <tr>
                    <th>Order Date:</th>
                    <td><?= $bill[0]->sales_date?></td>
                </tr>
                <tr>
                    <th>Payment Method:</th>
                    <td><?= $bill[0]->payment_method?></td>
                </tr>
                <tr>
                    <th>Transport:</th>
                    <td><?php if($bill[0]->transport_name OR $bill[0]->transport_number OR $bill[0]->vehical_number) { ?><?= $bill[0]->transport_name?> | <?= $bill[0]->transport_number?> | <?= $bill[0]->vehical_number?> <?php }?></td>
                </tr>

                
            </table>
        </div>
    </div>
	<hr></hr>
	<div class="order-details">
		<div class="section-title">Order Details</div>
		<table>
			<thead>
				<tr>
					<th>Description</th>
					<th>HSN</th>
					<th>Quantity</th>
					<th>Unit Price</th>
					<th>GST</th>
					<th>Subtotal</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($bill as $details){ ?>
					<tr>
						<td><?php if($details->product_name){echo $details->product_name." ( ".$details->sku_code." - ".$details->hsn.")"; } else{ echo $details->product_id;}?></td>						
						<td><?= $details->hsn?></td>
						<td><?= $details->quantity?> Nos</td>
						<td>₹ <?= $details->unit_price?></td>
						<td><?= $details->gst?> % </td>
						<td>₹ <?= $details->price?></td>
					</tr>
				<?php } ?>

				<tr><td colspan="6"><hr></td></tr>
				<tr>
					<td colspan="5"> <strong>Subtotal</strong></td>
					<td><strong>₹ <?= $bill[0]->amount - $bill[0]->taxable_amount?></strong></td>
				</tr>				
				<tr>
					<td colspan="5"><strong>Discount</strong></td>
					<td><strong>₹ <?= $bill[0]->discount?></strong></td>
				</tr>
				<tr>
					<td colspan="5"><strong>Taxable Amount</strong></td>
					<td><strong>₹ <?= $bill[0]->taxable_amount?></strong></td>
				</tr>

				<tr>
					<td colspan="5"><strong>Total</strong></td>
					<td><strong>₹ <?= $bill[0]->amount?></strong></td>
				</tr>
				<tr><td colspan="6"><hr></td></tr>
			</tbody>
		</table>
	</div>
	<!-- <footer>this if footer</footer> -->
</body>
</html>
