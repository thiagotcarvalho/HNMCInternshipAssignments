/* AJAX Call to Request PHP File */
var xmlhttp = new XMLHttpRequest();

xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        var patientData = JSON.parse(this.responseText);
        console.log(patientData);

        /* ADDS PATIENT'S FIRST AND LAST NAME */
        document.getElementById("patient-name").innerHTML = patientData['Patient']['firstName'] + ' ' + patientData['Patient']['lastName'];

        var html = '';
        /* LOOPS THROUGH ALL EXISTING TREATMENTS */
   		// console.log(patientData.Patient['Treatments']);
   		for(var treatmentInfo in patientData.Patient.Treatments) {
   			console.log(patientData.Patient.Treatments[treatmentInfo]);

   			html += getFormLower(patientData.Patient.Treatments[treatmentInfo]);
   			document.getElementById('form-bottom').innerHTML = html;

   			/* LOOPS THROUGH ALL EXISITING PAYMENTS MADE FOR EACH TREATMENT */
   			for(var paymentInfo in patientData.Patient.Treatments[treatmentInfo].Payments) {
   				// console.log(patientData.Patient.Treatments[treatmentInfo].Payments[paymentInfo]);

   				html += createPayTable(patientData.Patient.Treatments[treatmentInfo].Payments[paymentInfo]);
   				document.getElementById('form-bottom').innerHTML = html
   			}
   		}
    }
};
xmlhttp.open("GET", "http://localhost/thiago/hnmc_assignments/2018-02-01/endpoint/patient-data-api.php", true);
xmlhttp.send();

function getFormLower(treatmentObject) {
	var html = '<div class="row">';
	html +=	'<div class="col space"><div class="caption">DATE:</div>' + treatmentObject['treatmentDate'] + '</div>';
	html +=	'<div class="col space"><div class="caption">NAME:</div>' + treatmentObject['treatmentName'] + '</div>';
	html += '<div class="col"><div class="caption">COST:</div>' + treatmentObject['treatmentCost'] + '</div>';
	html += '</div>';
	html += '<div class="row"><p></p></div>';
	html += '<div class="row"><div class="col half"><p></p></div>';

	return html;						
}

function createPayTable(paymentObject) {
	var html = '<table id="pay-table" class="half"><tr><th colspan="3">Payments</th></tr>';
	html += '<tr><th>Date</th><th>Amount</th><th>Balance</th></tr>';
	html += '<tr><td>' + paymentObject['paymentDate'] + '</td>';
	html += '<td class="currency">$' + paymentObject['amount'] + '.00</td>';
	html += '<td class="currency">$0.00</td></tr></table>';
	html += '<div class="row"><p></p></div>';

	return html;
}