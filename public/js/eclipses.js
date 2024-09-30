//Holds an array of date objects retrieved from the PHP request in GetEclipseDates, lastDate is last date ran for eclipses
var eclipseArr = []
var lastDate
var orbitArr = []; synodicArr = []; pDayArr = []

//-------------------------ECLIPSE FUNCTIONS
function UpdateEclipses() {
	let newDate

	//Verify a real date is in the entry boxes and call the GetEclipseDates function
	if (mVal > 0 && mVal < 13 && dVal > 0 && dVal <= MonthMax(mVal, yVal) && yVal > 100 && yVal <= 9999) {
		newDate = new Date(yVal, mVal - 1, dVal, 0, 0, 0, 0)
		lastDate = newDate
	}
	GetEclipseDates()
}
function GetEclipseDates() {
	let cVal, tArr, tDate

	//Queries the SQL database for solar eclipses and retrieves the last and next ones of each type, placing them into the global eclipseArr
	let xhttp = new XMLHttpRequest();
	xhttp.open("GET", "EclipseQuery.php?year=" + lastDate.getFullYear() + "&month=" + lastDate.getMonth() + "&day=" + lastDate.getDate(), true);
	xhttp.send();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			eclipseArr = []
			cVal = xhttp.responseText.split("|");
			for (x = 0; x < cVal.length; x++) {
				tArr = cVal[x].split("-")
				tDate = new Date(tArr[0], tArr[1] - 1, tArr[2], 0, 0, 0, 0)
				eclipseArr.push(tDate)
			}
			BuildEclipseTable(lastDate)
		}
	}
}
function BuildEclipseTable(impDate = lastDate) {
	let iText = ""
	let eDates = document.getElementById("DateTable")

	//Fill the Eclipse table by cycling through each date in eclipseArr and measuring to the most recently-entered date
	iText += '<table id="EclipseTable"><tr><td style="text-align: center" colspan=8>Nearest Eclipses to ' + showDate(lastDate) + '</td></tr>'
	iText+= '<tr><td colspan=2>Total Eclipses</td><td colspan=2>Annular Eclipses</td><td colspan=2>Partial Eclipses</td><td colspan=2>Hybrid Eclipses</td></tr>'
	iText += '<tr><td>Last:</td><td>' + eclipseArr[0].toDateString().substr(4, 100) + '</td><td>Last:</td><td>' + eclipseArr[2].toDateString().substr(4, 100) + '</td><td>Last:</td><td>' + eclipseArr[4].toDateString().substr(4, 100) + '</td><td>Last:</td><td>' + eclipseArr[6].toDateString().substr(4, 100) + '</td></tr>'
	Set_Durations(eclipseArr[0], impDate)
	iText += '<tr><td colspan=2><a class="durLink" href="javascript:PopulateDate(0)">' + get_Durations() + '</a></td>'
	Set_Durations(eclipseArr[2], impDate)
	iText += '<td colspan=2><a class="durLink" href="javascript:PopulateDate(2)">' + get_Durations() + '</a></td>'
	Set_Durations(eclipseArr[4], impDate)
	iText += '<td colspan=2><a class="durLink" href="javascript:PopulateDate(4)">' + get_Durations() + '</a></td>'
	Set_Durations(eclipseArr[6], impDate)
	iText += '<td colspan=2><a class="durLink" href="javascript:PopulateDate(6)">' + get_Durations() + '</a></td></tr>'
	iText += '<tr><td>Next:</td><td>' + eclipseArr[1].toDateString().substr(4, 100) + '</td><td>Next:</td><td>' + eclipseArr[3].toDateString().substr(4, 100) + '</td><td>Next:</td><td>' + eclipseArr[5].toDateString().substr(4, 100) + '</td><td>Next:</td><td>' + eclipseArr[7].toDateString().substr(4, 100) + '</td></tr>'
	Set_Durations(eclipseArr[1], impDate)
	iText += '<tr><td colspan=2><a class="durLink" href="javascript:PopulateDate(1)">' + get_Durations() + '</a></td>'
	Set_Durations(eclipseArr[3], impDate)
	iText += '<td colspan=2><a class="durLink" href="javascript:PopulateDate(3)">' + get_Durations() + '</a></td>'
	Set_Durations(eclipseArr[5], impDate)
	iText += '<td colspan=2><a class="durLink" href="javascript:PopulateDate(5)">' + get_Durations() + '</a></td>'
	Set_Durations(eclipseArr[7], impDate)
	iText += '<td colspan=2><a class="durLink" href="javascript:PopulateDate(7)">' + get_Durations() + '</a></td></tr></table>'

	eDates.innerHTML = iText
}