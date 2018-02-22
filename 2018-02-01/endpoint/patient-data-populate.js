/* AJAX Call to Request PHP File */
var xmlhttp = new XMLHttpRequest();

xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        var patientData = JSON.parse(this.responseText);
        // console.log(patientData);

        /* ADDS PATIENT'S FIRST AND LAST NAME */
        htmlName = document.createTextNode(' ' + patientData['Patient']['firstName'] + ' ' + patientData['Patient']['lastName']);
        document.getElementById("patient-name").appendChild(htmlName);
        // document.getElementById("patient-name").innerHTML = patientData['Patient']['firstName'] + ' ' + patientData['Patient']['lastName'];

        var html = '';
        var tmpTreatCost = 0;
        var totAmtPaid = 0;
        var totBal = 0;
        /* LOOPS THROUGH ALL EXISTING TREATMENTS */
   		// console.log(patientData.Patient['Treatments']);
   		for(var treatmentInfo in patientData.Patient.Treatments) {
   			// console.log(patientData.Patient.Treatments[treatmentInfo]);

   			html += getFormLower(patientData.Patient.Treatments[treatmentInfo]);
   			html += createPayTable();
   			document.getElementById('form-bottom').innerHTML = html;

   			var amtPaid = 0;
   			var treatCost = patientData.Patient.Treatments[treatmentInfo].treatmentCost;

   			/* LOOPS THROUGH ALL EXISITING PAYMENTS MADE FOR EACH TREATMENT */
   			for(var paymentInfo in patientData.Patient.Treatments[treatmentInfo].Payments) {
   				// console.log(patientData.Patient.Treatments[treatmentInfo].Payments[paymentInfo]);
   				
   				/* FINDS REMAINING BALANCE AFTER EACH PAYMENT */
   				amtPaid += patientData.Patient.Treatments[treatmentInfo].Payments[paymentInfo].amount;
          // console.log(amtPaid);
   				balance = treatCost - amtPaid;

   				html += createPayTableRows(patientData.Patient.Treatments[treatmentInfo].Payments[paymentInfo], balance);
   				document.getElementById('form-bottom').innerHTML = html;
   			}
        // Finds total amount paid by patient
        totAmtPaid += amtPaid;

        // Finds total cost of all treatments together
        tmpTreatCost += treatCost;

        // Closes pay table
   			html += '</table>'
   			html += '<div class="row"><p></p></div>';
   		}
      // Finds total balance remaining
      totBal = tmpTreatCost - totAmtPaid;
      // Adds the remaining 
      htmlAmtPaid = document.createTextNode('Total Amount Paid: $' + totAmtPaid + '.00');
      htmlTotBal = document.createTextNode('Total Balance Remaining: $' + totBal + '.00');
      document.getElementById("amt-paid").appendChild(htmlAmtPaid);
      document.getElementById("tot-bal").appendChild(htmlTotBal);
    }
};
xmlhttp.open("GET", "http://localhost/thiago/hnmc_assignments/2018-02-01/endpoint/patient-data-api.php", true);
xmlhttp.send();

/* ============================================================================================================ */

function getFormattedDate(date) {
  var date = new Date(date);

  var year = date.getFullYear();
  var month = (1 + date.getMonth()).toString();
  month = month.length > 1 ? month : '0' + month;
  var day = (1 + date.getDate()).toString();
  day = day.length > 1 ? day : '0' + day;

  return month + '/' + day + '/' + year;
}

/* CREATES DATE, NAME, COST PART OF PATIENT DOC */
function getFormLower(treatmentObject) {
	var html = '<div class="row">';
	html +=  '<div class="col space"><div class="caption">DATE:</div> ' + getFormattedDate(treatmentObject['treatmentDate']) + '</div>';
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
	var html = '<tr><td>' + getFormattedDate(paymentObject['paymentDate']) + '</td>';
	html += '<td class="currency">$' + paymentObject['amount'] + '.00</td>';
	html += '<td class="currency">$' + balance + '.00</td></tr>';

	return html;
}