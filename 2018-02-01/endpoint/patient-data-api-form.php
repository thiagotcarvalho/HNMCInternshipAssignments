<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Holy Name Medical Center - Patient Info</title>
		<link rel="stylesheet" type="text/css" href="http://localhost/thiago/hnmc_assignments/2018-02-01/endpoint/patient-data-style.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
 	
 			<!-- Document is populated via JS -->
 			<!-- Including remainder of form -->
			<main>
				<!-- Top Half of Form -->
				<div class="row" id="patient-name">
					<div class="caption">NAME:</div>
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
				<!-- End of Top Half of Form-->

				<!-- Bottom Half of Form -->
				<div class="row">
					<div id="override" class="caption">TREATMENTS</div>
				</div>

				<div id="form-bottom"></div>
				<!-- End of Bottom Half of Form -->
			</main>

			<footer>
				<div id="amt-paid"></div>
				<div id='tot-bal'></div>
				<br />
				Logged User: Thiago Carvalho, IP: 122.16.23.15
			</footer>

			<script src="http://localhost/thiago/hnmc_assignments/2018-02-01/endpoint/patient-data-populate_jQ.js"></script>
			<!-- <script src="http://localhost/thiago/hnmc_assignments/2018-02-01/endpoint/patient-data-populate.js"></script> -->
			<script src="http://localhost/thiago/hnmc_assignments/2018-02-01/endpoint/patient-data-clock.js"></script>
		</div>
	</body>
</html>