var matchedResults = []; matchedMeasurements = []
var lookForNum

//-------------------------Measurement Search functions and classes
function AddToSearchArray(impX, impY, impType = 1, impBool = true) {
	let tempArr = []
	//matchedResults = []

	if (impType == 1 && yearDiff > 0) {
		tempArr.push(parseInt(String(yearDiff).replaceAll("0", "") + String(yearDays).replaceAll("0", "")))
		tempArr.push(parseInt(String(yearDiff).replaceAll("0", "") + String(yearMonths).replaceAll("0", "") + String(mDiff[1]).replaceAll("0", "")))
		tempArr.push(parseInt(String(yearDiff).replaceAll("0", "") + String(yearWeeks[0]).replaceAll("0", "") + String(yearWeeks[1]).replaceAll("0", "")))
	} else {tempArr.push(0, 0, 0)}

	if (mDiff[0] > 0) {
		tempArr.push(parseInt(String(mDiff[0]).replaceAll("0", "") + String(mDiff[1]).replaceAll("0", "")))
	} else {tempArr.push(0)}

	if (wDiff[0] > 0) {
		tempArr.push(parseInt(String(wDiff[0]).replaceAll("0", "") + String(wDiff[1]).replaceAll("0", "")))
	} else (tempArr.push(0))

	tempArr.push(parseInt(String(dDiff).replaceAll("0", "")))

	if (impType == 1) {
		tempArr.push(parseInt(String(yearDiff).replaceAll("0", "")))
		tempArr.push(parseInt(String(yearDiff).replaceAll("0", "") + String(yearMonths).replaceAll("0", "")))
		tempArr.push(parseInt(String(yearDiff).replaceAll("0", "") + String(yearMonths).replaceAll("0", "") + String(Math.floor(mDiff[1] / 7)).replaceAll("0", "")))
		tempArr.push(parseInt(String(yearDiff).replaceAll("0", "") + String(yearMonths).replaceAll("0", "") + String(Math.floor(mDiff[1] / 7)).replaceAll("0", "") + String(mDiff[1] % 7).replaceAll("0", "")))
		tempArr.push(parseInt(String(yearDiff).replaceAll("0", "") + String(yearWeeks[0]).replaceAll("0", "")))
		tempArr.push(parseInt(String(mDiff[0]).replaceAll("0", "")))
		tempArr.push(parseInt(String(mDiff[0]).replaceAll("0", "") + String(Math.floor(mDiff[1] / 7)).replaceAll("0", "")))
		tempArr.push(parseInt(String(mDiff[0]).replaceAll("0", "") + String(Math.floor(mDiff[1] / 7)).replaceAll("0", "") + String(mDiff[1] % 7).replaceAll("0", "")))
		tempArr.push(parseInt(String(wDiff[0]).replaceAll("0", "")))
	} else {tempArr.push(0, 0, 0, 0, 0, 0, 0, 0, 0)}

	//From anniversary of littleDate to bigDate
	if (impType == 1) {
		tempArr.push(parseInt(String(yearDays).replaceAll("0", "")))
		tempArr.push(parseInt(String(yearMonths).replaceAll("0", "") + String(mDiff[1]).replaceAll("0", "")))
		tempArr.push(parseInt(String(yearWeeks[0]).replaceAll("0", "") + String(yearWeeks[1]).replaceAll("0", "")))
	} else {tempArr.push(0, 0, 0)}

	if (impBool == false) {fullDurArr[impX][impY] = tempArr} else if (impBool == true) {fullDurArr2[impX][impY] = tempArr}
}
function FindMatchingMeasurements() {
	let varMax = allDates.length
	matchedMeasurements = new Array(3)
	matchedMeasurements[0] = []; matchedMeasurements[1] = []; matchedMeasurements[2] = []; 

	for (let x = 0; x < varMax; x++) {
		for (let y = 0; y < varMax; y++) {
			if (x !== y) {

				for (let z = 0; z < DurArr.length; z++) {
					lookForNum = fullDurArr[x][y][z]
					if (matchedMeasurements[0].indexOf(lookForNum) == -1) {
						for (let xSub = x; xSub < varMax; xSub++) {
							for (let ySub = y + 1; ySub < varMax; ySub++) {
								if (xSub !== ySub) {
									for (let zSub = 0; zSub < DurArr.length; zSub++) {
										if (fullDurArr[xSub][ySub][zSub] == lookForNum) {
											AddToMatched(lookForNum, z, zSub)
										}
										if (fullDurArr2[xSub][ySub][zSub] == lookForNum) {
											AddToMatched(lookForNum, z, zSub)
										}
									}			
								}
							}
						}
					}
				}

			}
		}
	}
	if (matchedMeasurements[0].length > 0) {matchedMeasurements[0].sort((a,b)=>b-a)}
	if (matchedMeasurements[1].length > 0) {matchedMeasurements[1].sort((a,b)=>b-a)}
	if (matchedMeasurements[2].length > 0) {matchedMeasurements[2].sort((a,b)=>b-a)}

	//document.getElementById("MatchedDates").innerHTML = matchedMeasurements
}
function SearchThroughArray(impNum = document.getElementById("MeasurementSearch").value) {
	let zMax, newSR
	let searchVal = parseInt(String(impNum).replace("0", ""))
	matchedResults = []

	if (oArr.IncludeCrap == false) {zMax = 6} else {zMax = DurArr.length}

	for (let x = 0; x < allDates.length; x++) {
		for (let y = x + 1; y < allDates.length; y++) {
			if (fullDurArr[x][y].indexOf(searchVal) > -1) {
				for (let z = 0; z < zMax; z++) {
					if (fullDurArr[x][y][z] == searchVal) {
						newSR = new SearchResult(x, y, impNum, DurArr[z], 1, false)
						matchedResults.push(newSR)
						break;
					}
				}
			}
			if (fullDurArr2[x][y].indexOf(searchVal) > -1) {
				for (let z = 0; z < zMax; z++) {
					if (fullDurArr2[x][y][z] == searchVal) {
						newSR = new SearchResult(x, y, impNum, DurArr[z], 1, true)
						matchedResults.push(newSR)
						break;
					}
				}
			}
		}
	}

	for (let x = 1; x < allDates.length; x++) {
		for (let y = x - 1; y > -1; y--) {
			if (fullDurArr[x][y].indexOf(searchVal) > -1) {
				for (let z = 0; z < zMax; z++) {
					if (fullDurArr[x][y][z] == searchVal) {
						newSR = new SearchResult(x, y, impNum, DurArr[z], 2, false)
						matchedResults.push(newSR)
						break;
					}
				}
			}
			if (fullDurArr2[x][y].indexOf(searchVal) > -1) {
				for (let z = 0; z < zMax; z++) {
					if (fullDurArr2[x][y][z] == searchVal) {
						newSR = new SearchResult(x, y, impNum, DurArr[z], 2, true)
						matchedResults.push(newSR)
						break;
					}
				}
			}
		}
	}

	if (matchedResults.length > 0) {PopSearchResults()}
}
function PopSearchResults() {
	let resX
	let dSpot = document.getElementById("DateTable")
	let iText = '<table>'

	for (q = 0; q < matchedResults.length; q++) {
		resX = matchedResults[q].xCo; resY = matchedResults[q].yCo; 
		iText += '<tr><td>' + matchedResults[q].LinkStr() + '</td>'
		iText += '<td>' + matchedResults[q].dFormat.join(", ") + '</td></tr>'
	}

	iText += '</table>'
	dSpot.innerHTML = iText
}
function ExpandDurationMin(impQ, impBool = false) {
	//This code runs any time either of the two Dates are changed to re-populate the time between dates
	let thisType, xSpot
	let durSpot = document.getElementById("DurationDetails")
	let iText = ""

	document.getElementById("Check_End").checked = impBool
	document.getElementById("Tether_Date").checked = false
	for (let x = 0; x < inpTypes.length; x++) {
		thisType = inpTypes[x]
		if (matchedResults[impQ].dFormat.indexOf(thisType) > -1) {
			document.getElementById("Check_" + thisType).checked = true
		} else {
			document.getElementById("Check_" + thisType).checked = false
		}
	}
	Set_Options()

	xSpot = matchedResults[impQ].xCo; ySpot = matchedResults[impQ].yCo
	selDate1 = allDates[xSpot]['newDate']
	selDate2 = allDates[ySpot]['newDate']

	if (xSpot < ySpot) {
		AddDatesToForm(allDates[xSpot]['dTitle'], allDates[ySpot]['dTitle'])
		activeSpot = [xSpot, ySpot]
	} else {
		tempDate = new Date(selDate2.getFullYear(), selDate2.getMonth(), selDate2.getDate(), 0, 0, 0, 0)
		tempDate.setFullYear(selDate1.getFullYear())
		if (tempDate < selDate1) {tempDate.setFullYear(tempDate.getFullYear() + 1)}
		selDate2 = tempDate
		AddDatesToForm(allDates[xSpot]['dTitle'], allDates[ySpot]['dTitle'] + " Anniversary")
		activeSpot = [xSpot, -1]
	}

	//Calculate the duration between selDate1 and selDate2
	Set_Durations()
	iText += '<center>' + get_DurString()
	if (oArr.FullDisplay == true) {
		iText += duration_length() + '</center>'	
	} else {
		iText += '<font style="size: 115%">' + get_Durations(true, 1) + '</font></center>'	
	}

	durSpot.innerHTML = iText
}
function AddToMatched(impNum, impZ1, impZ2) {
	let arr0Spot = matchedMeasurements[0].indexOf(lookForNum)
	let arr1Spot = matchedMeasurements[1].indexOf(lookForNum)
	let arr2Spot = matchedMeasurements[2].indexOf(lookForNum)

	if (impZ1 < 6 && impZ2 < 6) {
		if (arr0Spot == -1) {matchedMeasurements[0].push(lookForNum)}
		if (arr1Spot > -1) {matchedMeasurements[1].splice(arr1Spot, 1)}
		if (arr2Spot > -1) {matchedMeasurements[2].splice(arr2Spot, 1)}
	} else if (impZ1 < 6 || impZ2 < 6) {
		if (arr0Spot == -1) {
			if (arr1Spot == -1) {matchedMeasurements[1].push(lookForNum)}
			if (arr2Spot > -1) {matchedMeasurements[2].splice(arr2Spot, 1)}
		}
	} else {
		if (arr0Spot == -1 && arr1Spot == -1) {
			if (arr2Spot == -1) {matchedMeasurements[2].push(lookForNum)}
		}
	}
}
class SearchResult {
	constructor(impX, impY, impNum, impString, impType, impBool) {
		this.dFormat = []
		this.xCo = impX; this.yCo = impY
		this.matchedNum = impNum; this.dFormat = impString.split("|")
		this.MeasureType = impType
		this.EndDate = impBool
	}
	LinkStr() {
		let iText = ""
		if (this.MeasureType == 1) {
			iText += '<a class="resLink" href="javascript:ExpandDurationMin(' + q + ', ' + this.EndDate + ')">'
			iText += 'From ' + allDates[this.xCo]['dTitle'] + ' to ' + allDates[this.yCo]['dTitle'] + '</a>'
		} else if (this.MeasureType == 2) {
			iText += '<a class="resLink" href="javascript:ExpandDurationMin(' + q + ', ' + this.EndDate + ')">'
			iText += 'From ' + allDates[this.xCo]['dTitle'] + ' to the anniversary of ' + allDates[this.yCo]['dTitle'] + '</a>'
		}
		return iText
	}
}