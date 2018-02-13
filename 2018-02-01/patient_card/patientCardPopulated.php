<?php
	require 'C:\xampp\htdocs\thiago\hnmc_assignments\2018-02-01\php_tasks\patientData.php'
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Holy Name Medical Center - Patient Info</title>
		<link rel="stylesheet" type="text/css" href="patientCardStyle.css">
	</head>

	<body>
		<div id="container">
			<header>
				<div id="header-company">
					Holy Name Medical Center
				</div>
				<div id="header-datetime">
					{Insert Date and Time}
				</div>
				<div id="header-pagename">
					<p class="title">Patient Info</p>
				</div>
			</header>

			<main>
				<!-- <div class="row"> -->

					<?php
						foreach ($patientArray as $patientInfo) {
					?>
					<!-- Top Half of Form -->
					<div class="row">
						<div class="caption">NAME:</div> <?php print_r($patientInfo['firstName'].' '.$patientInfo['lastName']); ?>
					</div>
					<div class="row">
						<div class="caption">ADDRESS:</div> 718 Main Street, Teaneck, NJ
					</div>
					<div class="row">
						<div class="col space">
							<div class="caption">PHONE:</div> 201-833-3124
						</div>
						<div class="col">
							<div class="caption">CELL:</div> 973-301-4567
						</div>
					</div>
					<div class="row">
						<div class="caption">MEDICAL RECORD #:</div> 123-456-789
					</div>
					<!-- Top Half of Form End -->
					<?php } ?>

					<!-- Loop through array to retrieve Treatment information -->
					<?php
						foreach ($patientArray['Patient']['Treatments'] as $treatmentName) {?>
							<!-- Bottom Half of Form -->
							<div class="row">
								<div id="override" class="caption">TREATMENTS</div>
							</div>

							<?php 
								// echo "<pre>";
								// print_r($treatmentName['Payments']);
							?>

							<div class="row">
								<div class="col space">
									<div class="caption">DATE:</div> <?php print_r($treatmentName['treatmentDate']); ?>
								</div>
								<div class="col space">
									<div class="caption">NAME:</div> <?php print_r($treatmentName['treatmentName']); ?>
								</div>
								<div class="col">
									<div class="caption">COST:</div> $<?php print_r($treatmentName['treatmentCost']); ?>.00
								</div>
							</div>
							<!-- Blank Row to create distance between previous row and table -->
							<div class="row">
								<p></p>
							</div>
							<!-- End Blank Row -->
							<div class="row">
								<!-- Blank Column to offset table from left side -->
								<div class="col half">
									<p></p>
								</div>
								<!-- End Blank Column -->

								<!-- Table with Treatment Info -->
								<table class="half">
									<tr>
										<th colspan="3">Payments</th>
									</tr>
									<tr>
										<th>Date</th>
										<th>Amount</th>
										<th>Balance</th>
									</tr>

									<!-- Loop through array to retrieve Payment information -->
									<?php
										$tempArray['amountPaid'] = 0;

										foreach ($treatmentName['Payments'] as $paymentNum) {
											$tempArray['amountPaid'] += $paymentNum['amount'];

											$tempArray['remainingBalance'] = $treatmentName['treatmentCost'] - $tempArray['amountPaid'];
									?>
											<tr>
												<td><?php print_r($paymentNum['paymentDate']) ?></td>
												<td class="currency">$<?php print_r($paymentNum['amount']) ?>.00</td>
												<td class="currency">$<?php print_r($tempArray['remainingBalance']) ?>.00</td>
											</tr>
										<?php } ?>
										<!-- End Payment Loop -->
								</table>
								<!-- Table with Treatment Info -->
							</div>
							<!-- Bottom Half of Form End -->
						<?php } ?>
						<!-- End Treatment Loop -->

				<!-- </div> -->
			</main>

			<footer>
				Logged User: Thiago Carvalho, IP: 122.16.23.15
			</footer>

			<script src="patientCardScript.js"></script>
		</div>
	</body>
</html>