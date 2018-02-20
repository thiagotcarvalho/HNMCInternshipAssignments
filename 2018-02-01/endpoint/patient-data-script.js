/* AJAX Call to Request PHP File */
var xmlhttp = new XMLHttpRequest();

xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        var patientData = JSON.parse(this.responseText);
        // console.log(patientData);

        /* ADDS PATIENT'S FIRST AND LAST NAME */
        document.getElementById("patient-name").innerHTML = patientData['Patient']['firstName'] + ' ' + patientData['Patient']['lastName'];

        var html = '';
        /* LOOPS THROUGH ALL EXISTING TREATMENTS */
   		// console.log(patientData.Patient['Treatments']);
   		for(var treatmentInfo in patientData.Patient.Treatments) {
   			// console.log(patientData.Patient.Treatments[treatmentInfo]);

   			html += getFormLower(patientData.Patient.Treatments[treatmentInfo]);
   			html += createPayTable();
   			document.getElementById('form-bottom').innerHTML = html;

   			var tmpBalance = 0;
   			var treatTot = patientData.Patient.Treatments[treatmentInfo].treatmentCost;

   			/* LOOPS THROUGH ALL EXISITING PAYMENTS MADE FOR EACH TREATMENT */
   			for(var paymentInfo in patientData.Patient.Treatments[treatmentInfo].Payments) {
   				// console.log(patientData.Patient.Treatments[treatmentInfo].Payments[paymentInfo]);
   				
   				/* FINDS REMAINING BALANCE AFTER EACH PAYMENT */
   				tmpBalance += patientData.Patient.Treatments[treatmentInfo].Payments[paymentInfo].amount;
   				balance = treatTot - tmpBalance;

   				html += createPayTableRows(patientData.Patient.Treatments[treatmentInfo].Payments[paymentInfo], balance);
   				document.getElementById('form-bottom').innerHTML = html;
   			}
   			html += '</table>'
   			html += '<div class="row"><p></p></div>';
   		}
    }
};
xmlhttp.open("GET", "http://localhost/thiago/hnmc_assignments/2018-02-01/endpoint/patient-data-api.php", true);
xmlhttp.send();

/* ============================================================================================================ */

/* CREATES DATE, NAME, COST PART OF PATIENT DOC */
function getFormLower(treatmentObject) {
	var html = '<div class="row">';
	html +=	'<div class="col space"><div class="caption">DATE:</div> ' + treatmentObject['treatmentDate'] + '</div>';
	html +=	'<div class="col space"><div class="caption">NAME:</div> ' + treatmentObject['treatmentName'] + '</div>';
	html += '<div class="col"><div class="caption">COST:</div> $' + treatmentObject['treatmentCost'] + '.00</div>';
	html += '</div>';
	html += '<div class="row"><p></p></div>';
	html += '<div class="row"><div class="col half"><p></p></div>';

	return html;						
}

/* CREATES THE HEADER OF THE TABLE */
function createPayTable() {
	var html = '<table id="pay-table" class="half"><tr><th colspan="3">Payments</th></tr>';
	html += '<tr><th>Date</th><th>Amount</th><th>Balance</th></tr>';

	return html;
}

/* CREATES EACH ROW OF THE TABLE INCLUDING DATE, PAYMENTS, AND BALANCES */
function createPayTableRows(paymentObject, balance) {
	var html = '<tr><td>' + paymentObject['paymentDate'] + '</td>';
	html += '<td class="currency">$' + paymentObject['amount'] + '.00</td>';
	html += '<td class="currency">$' + balance + '.00</td></tr>';

	return html;
}