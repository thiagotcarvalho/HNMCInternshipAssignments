$(document).ready(() => {
	html = '';
	var totTreatCost = 0;
    var totAmtPaid = 0;
    var totBal = 0;

	$.get("http://localhost/thiago/hnmc_assignments/2018-02-01/endpoint/patientInfo.class.php", (patientData) => {
		$.each(JSON.parse(patientData), (patient, patientInfo) => {
			$('#patient-name').append(' ' + patientInfo['firstName'] + ' ' + patientInfo['lastName']);

			$.each(patientInfo['Treatments'], (treatmentName, treatmentInfo) => {
				var treatCost = treatmentInfo['treatmentCost'];
				var amtPaid = 0;

				html += $('#form-bottom').createFormLower(treatmentInfo);
				html += $('#form-bottom').createPayTable();
				$('#form-bottom').html(html);

				$.each(treatmentInfo['Payments'], (paymentKey, paymentInfo) => {
					amtPaid += paymentInfo['amount'];
					remainBalance = treatCost - amtPaid;

					html += $('#form-bottom').createPayTableRows(paymentInfo, remainBalance);
					$('#form-bottom').html(html);
				});
				// Total amount paid by patient and total cost of all treatments
				totAmtPaid += amtPaid;
				totTreatCost += treatCost;

				// Closes the payment table and adds a row to create space
				html += '</table><div class="row"><p></p></div>';
			});
			// Finds total balance remaining
		    totBal = totTreatCost - totAmtPaid;
		    console.log(totAmtPaid);
		    console.log(totBal);
		    // Adds the remaining 
		    $('#amt-paid').append("Total Amount Paid: $" + totAmtPaid + ".00");
		    $('#tot-bal').append("Total Balance Remaining: $" + totBal + ".00");
		});
	});
});

/********************************************************************************************************************************/

/* Format Date to mm/dd/yyyy */
function formatDate(date) {
	var date = new Date(date);
	var year = date.getFullYear();
	var month = (1 + date.getMonth()).toString();
	month = month.length > 1 ? month : '0' + month;
	var day = (1 + date.getDate()).toString();
	day = day.length > 1 ? day : '0' + day;

	return month + '/' + day + '/' + year;
};

/* Creates labels for botom of form */
$.fn.createFormLower = function(treatmentObject) {
	var html = '<div class="row" style="overflow: hidden">';
	html += '<div class="col space"><div class="caption">DATE:</div> ' + formatDate(treatmentObject['treatmentDate']) + '</div>';
	html +=	'<div class="col space"><div class="caption">NAME:</div> ' + treatmentObject['treatmentName'] + '</div>';
	html += '<div class="col"><div class="caption">COST:</div> $' + treatmentObject['treatmentCost'] + '.00</div>';
	html += '</div>';
	html += '<div class="row"><p></p></div>';
	html += '<div class="row"><div class="col half"><p></p></div>';

	return html;
};

/* Creates the top of the payment table */
$.fn.createPayTable = function() {
	var html = '<table id="pay-table" class="half"><tr><th colspan="3">Payments</th></tr>';
	html += '<tr><th>Date</th><th>Amount</th><th>Balance</th></tr>';

	return html;
}

/* Populates the payment table */
$.fn.createPayTableRows = function(paymentObject, balance) {
	var html = '<tr><td>' + formatDate(paymentObject['paymentDate']) + '</td>';
	html += '<td class="currency">$' + paymentObject['amount'] + '.00</td>';
	html += '<td class="currency">$' + balance + '.00</td></tr>';

	return html;
}