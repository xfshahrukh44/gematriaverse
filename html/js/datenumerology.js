var numStr = [], sumStr = []

//-------------------------DATE NUMEROLOGY FUNCTIONS
function Create_DateNumbers(){
	let tDate, qDate1, qDate2, dayStart, dayEnd
	let rC = "yellow"; lC = "orange"

	numStr = []; sumStr = []
	wDate = [selDate1, selDate2]

	for (let y = 0; y < 2; y++) {
		tDate = wDate[y]
		qDate1 = new Date(tDate.getFullYear() - 1, 11, 31)
		qDate2 = new Date(tDate.getFullYear(), 11, 31)
		numStr[y] = new Array()
		sumStr[y] = new Array()

		dayStart = Math.round((tDate - qDate1) / 86400000)
		dayEnd = Math.round((qDate2 - tDate) / 86400000)

		numStr[y][0] = addStr(tDate, "m", 2) + " + " + addStr(tDate, "d", 2) + " + " + addStr(tDate, "y", 2)
		numStr[y][1] = addStr(tDate, "m", 2) + " + " + addStr(tDate, "d", 2) + " + " + addStr(tDate, "y", 1)
		numStr[y][2] = addStr(tDate, "m", 1) + " + " + addStr(tDate, "d", 1) + " + " + addStr(tDate, "y", 1)
		numStr[y][3] = addStr(tDate, "m", 2) + " + " + addStr(tDate, "d", 2) + " + " + addStr(tDate, "y", 2, false)
		numStr[y][4] = addStr(tDate, "m", 1) + " + " + addStr(tDate, "d", 1) + " + " + addStr(tDate, "y", 1, false)
		numStr[y][5] = "Day of Year: (" + monthNames(tDate.getMonth()) + "-" + tDate.getDate() + ")"
		numStr[y][6] = "Days Left in Year: (" + monthNames(tDate.getMonth()) + "-" + tDate.getDate() + ")"
		numStr[y][7] = addStr(tDate, "m", 2) + " + " + addStr(tDate, "d", 2)
		numStr[y][8] = addStr(tDate, "m", 1) + " + " + addStr(tDate, "d", 1) + " + " + addStr(tDate, "y", 2)
		numStr[y][9] = addStr(tDate, "m", 2) + " + " + addStr(tDate, "d", 2) + " + " + addStr(tDate, "y", 1, false)
		numStr[y][10] = addStr(tDate, "m", 1) + " + " + addStr(tDate, "d", 1) + " + " + addStr(tDate, "y", 2, false)
		numStr[y][11] = multiStr(tDate, true, 1)
		numStr[y][12] = multiStr(tDate, false, 1)

		sumStr[y][0] = tDate.getDate() + tDate.getMonth() + 1 + YearHalf(tDate, 1) + YearHalf(tDate, 2)
		sumStr[y][1] = tDate.getDate() + tDate.getMonth() + 1 + DateDigit(tDate, "y", 0) + DateDigit(tDate, "y", 1) + DateDigit(tDate, "y", 2) + DateDigit(tDate, "y", 3)
		sumStr[y][2] = DateDigit(tDate, "m", 0) + DateDigit(tDate, "m", 1) + DateDigit(tDate, "d", 0) + DateDigit(tDate, "d", 1) + DateDigit(tDate, "y", 0) + DateDigit(tDate, "y", 1) + DateDigit(tDate, "y", 2) + DateDigit(tDate, "y", 3)
		sumStr[y][3] = tDate.getDate() + tDate.getMonth() + 1 + YearHalf(tDate, 2)
		sumStr[y][4] = DateDigit(tDate, "m", 0) + DateDigit(tDate, "m", 1) + DateDigit(tDate, "d", 0) + DateDigit(tDate, "d", 1) + DateDigit(tDate, "y", 2) + DateDigit(tDate, "y", 3)
		sumStr[y][5] = dayStart
		sumStr[y][6] = dayEnd
		sumStr[y][7] = tDate.getDate() + tDate.getMonth() + 1
		sumStr[y][8] = DateDigit(tDate, "m", 0) + DateDigit(tDate, "m", 1) + DateDigit(tDate, "d", 0) + DateDigit(tDate, "d", 1) + YearHalf(tDate, 1) + YearHalf(tDate, 2)
		sumStr[y][9] = tDate.getDate() + tDate.getMonth() + 1 + DateDigit(tDate, "y", 2) + DateDigit(tDate, "y", 3)
		sumStr[y][10] = DateDigit(tDate, "m", 0) + DateDigit(tDate, "m", 1) + DateDigit(tDate, "d", 0) + DateDigit(tDate, "d", 1) + YearHalf(tDate, 2)
		sumStr[y][11] = multiStr(tDate, true, 2)
		sumStr[y][12] = multiStr(tDate, false, 2)
	}
	PopDateNumbers()
	PopSelNumbers()
}
function PopDateNumbers() {
	let tStr, thisColor
	let isLeap = [leapYear(selDate1.getFullYear()), leapYear(selDate2.getFullYear())]

	if (oArr.ShowDateTable == false) {

		for (let x = 0; x < 2; x++) {
			tStr = '<div>'

			for (let y = 0; y < sumStr[x].length; y++) {
				if (y > 6 && y < 11) {continue}
				switch (y) {
					case oArr.SelNum[x]: thisColor = "#1862cf"; break;
					case 5:
						if (isLeap[x] && sumStr[x][y] > 59) {
							thisColor = "orange"
						} else {
							thisColor = "yellow"
						}
						break;
					case 6:
						if (isLeap[x] && sumStr[x][y] > 305) {
							thisColor = "orange"
						} else {
							thisColor = "yellow"
						}
						break;
					case 11: case 12: thisColor = "lightblue"; break;
					default: thisColor = "white"; break;
				}

				tStr += '<span class="dateNumSpan">'
				if (y == oArr.SelNum[x]) {
					tStr += '<font color="' + thisColor + '">' + sumStr[x][y] + '</font></span>'
				} else {
					tStr += '<a href="javascript:Change_DateNum(' + x + ', ' + y + ')"><font color="' + thisColor + '">' + sumStr[x][y] + '</font></a>'
					tStr += '</span>'
				}
			}

			tStr += '</div>'
			document.getElementById("DateNums" + (x + 1)).innerHTML = tStr
		}
	} else {

		PopClassicTable()
	}

}
function BuildDateTable() {
	let dTable = document.getElementById("ClassicTableSpot")
	let tableStr = '<table class="ClassicDateTable">'; let tableStr2 = '<table class="ClassicDateTable">'

	for (let q = 0; q < sumStr[0].length; q++) {
		//if (q > 6 && q < 11) {continue}
		tableStr += '<tr>'
		tableStr += '<td id="Date0Spot' + q + '" class="NumString"></td>'
		tableStr += '<td id="Date0Sum' + q + '" class="SumString"></td>'
		tableStr += '</tr>'

		tableStr2 += '<tr>'
		tableStr2 += '<td id="Date1Spot' + q + '" class="NumString"></td>'
		tableStr2 += '<td id="Date1Sum' + q + '" class="SumString"></td>'
		tableStr2 += '</tr>'
	}

	tableStr += "</table>"; tableStr2 += "</table>"

	dTable.innerHTML = tableStr + " " + tableStr2
	PopClassicTable()
}
function Build_Num() {
	 let dNum = [], dSum = []

	for (let y = 0; y < 2; y++) {
			dNum[y] = new Array()
			dSum[y] = new Array()
		for (let x = 0; x < sumStr[0].length; x++) {
			dNum[y][x] = document.getElementById("Date" + y + "Spot" + x)
			dSum[y][x] = document.getElementById("Date" + y + "Sum" + x)
		}
	}

	return [dNum, dSum]
}
function PopClassicTable() {
	let x, y

	divArray = Build_Num()

	for (y = 0; y < 2; y++) {
		for (x = 0; x < sumStr[0].length; x++) {
			//if (x > 6 && x < 11) {continue}
			divArray[0][y][x].innerHTML = numStr[y][x]
			divArray[1][y][x].innerHTML = '<a href="javascript:Open_NumberProperties(' + sumStr[y][x] + ')">' + sumStr[y][x] + '</a>'
		}
	}
}

function PopSelNumbers() {
	let thisColor
	let dStr1 = document.getElementById("DateStr1")
	let dStr2 = document.getElementById("DateStr2")
	let dNum1 = document.getElementById("DateNum1")
	let dNum2 = document.getElementById("DateNum2")
	dStr1.innerHTML = numStr[0][oArr.SelNum[0]]
	dNum1.innerHTML = '<a href="javascript:Open_NumberProperties(' + sumStr[0][oArr.SelNum[0]] + ')">' + sumStr[0][oArr.SelNum[0]] + '</a>'
	dStr2.innerHTML = numStr[1][oArr.SelNum[1]]
	dNum2.innerHTML = '<a href="javascript:Open_NumberProperties(' + sumStr[1][oArr.SelNum[1]] + ')">' + sumStr[1][oArr.SelNum[1]] + '</a>'

	switch (oArr.SelNum[0]) {
		case 5:
			if (leapYear(selDate1.getFullYear()) && sumStr[0][5] > 59) {
				thisColor = "orange"
			} else {
				thisColor = "yellow"
			}
			break;
		case 6:
			if (leapYear(selDate1.getFullYear()) && sumStr[0][6] > 305) {
				thisColor = "orange"
			} else {
				thisColor = "yellow"
			}
			break;
		case 11: case 12: thisColor = "lightblue"; break;
		default: thisColor = "white"; break;
	}
	dNum1.style.color = thisColor

	switch (oArr.SelNum[1]) {
		case 5:
			if (leapYear(selDate2.getFullYear()) && sumStr[1][5] > 59) {
				thisColor = "orange"
			} else {
				thisColor = "yellow"
			}
			break;
		case 6:
			if (leapYear(selDate2.getFullYear()) && sumStr[1][6] > 305) {
				thisColor = "orange"
			} else {
				thisColor = "yellow"
			}
			break;
		case 11: case 12: thisColor = "lightblue"; break;
		default: thisColor = "white"; break;
	}
	dNum2.style.color = thisColor
}
function Change_DateNum(impX, impY) {
	oArr.SelNum[impX] = impY
	PopDateNumbers()
	PopSelNumbers()
}
function addStr(impDate, impDMY, impType, FullYear = true) {
	var dStr

	switch (impDMY.toLowerCase()) {
		case "d":
			dStr = String(impDate.getDate())
			break;
		case "m":
			dStr = String(impDate.getMonth() + 1)
			break;
		case "y":
			dStr = String(impDate.getFullYear())
			break;
	}

	switch (impType) {
		case 1:
			if (FullYear == true && impDMY.toLowerCase() == "y") {
				return dStr.substr(0, 1) + "+" + dStr.substr(1, 1) + "+" + dStr.substr(2, 1) + "+" + dStr.substr(3, 1)
			} else {
				if (dStr.length == 1) {
					return dStr.substr(0, 1)
				} else if (impDMY == "y") {
					return dStr.substr(2, 1) + "+" + dStr.substr(3, 1)
				} else {
					return dStr.substr(0, 1) + "+" + dStr.substr(1, 1)
				}
			}
			break;
		case 2:
			if (FullYear == true && impDMY.toLowerCase() == "y") {
				return "(" + dStr.substr(0, 1) + dStr.substr(1, 1) + ") + (" + dStr.substr(2, 1) + dStr.substr(3, 1) + ")"
			} else {
				if (impDMY == "y") {
					return "(" + dStr.substr(2, 2) + ")"
				} else {
					return "(" + dStr + ")"
				}
			}
			break;
	}
}
function leapYear(year) {
  return ((year % 4 == 0) && (year % 100 != 0)) || (year % 400 == 0);
}
function monthNames(impMonth) {
	let mNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]
	return mNames[impMonth]
}
function multiStr(impDate, impBool, impType) {
	let dateStr, x
	let dArr = []; dProduct = 1
	dateStr = impDate.getMonth() + 1
	dateStr += String(impDate.getDate())

	switch (impBool) {
		case true:
			dateStr += String(impDate.getFullYear())
			break;
		case false:
			if (String(impDate.getFullYear()).length > 3) {
				dateStr += String(impDate.getFullYear()).substr(2, 2)
			} else {
				dateStr += String(impDate.getFullYear()).substr(1, 2)
			}
			break;
	}
	for (x = 0; x < dateStr.length; x++) {
		if (dateStr.substr(x, 1) !== "0") {
			dArr[dArr.length] = dateStr.substr(x, 1)
		}
	}

	if (impType == 1) {
		return dArr.join(" &times; ")
	} else if (impType == 2) {
		for (x = 0; x < dArr.length; x++) {
			dProduct *= dArr[x]
		}
		return dProduct
	}
}
//Function for pulling a two-digit number from either half of a year
function YearHalf(impDate, impHalf) {
	var yh = String(impDate.getFullYear())
	if (impHalf == 1) {
		return Number(yh.substr(0, 2))
	} else {
		return Number(yh.substr(2, 2))
	}
}
//Function for pulling a single digit from a date
function DateDigit(impDate, impType, impDigit) {
	let dStr

	switch (impType.toLowerCase()) {
		case "m":
			dStr = String(impDate.getMonth() + 1)
			break;
		case "d":
			dStr = String(impDate.getDate())
			break;
		case "y":
			dStr = String(impDate.getFullYear())
			break;
	}

	if (dStr.length == 1) {
		dStr = "0" + dStr
	}

	if (impDigit > dStr.length) {
		return 0
	} else {
		return Number(dStr.substr(impDigit, 1))
	}
}
//Adam's attempt to run number properties
function Open_Properties(impNum) {
    if (impNum > 0 && impNum < 10000000) {
        window.open("/tools/numbers/index.php?Number=" + impNum, "Properties of " + impNum, "height=480,width=750")
    }
}