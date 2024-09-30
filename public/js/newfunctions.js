//Array of options **TEST
var optArr = {}
//calcLanguage can change language for entire calculator
var calcLanguage, langCount, buildTry
//breakCipher is the highlighted cipher w/ Breakdown showing
var breakCipher = 0, initBuild = false, initOpt = false, customOnly = false
var loadedHistory = []
var numTimeout

function Page_Launch() {
	setSliders()
	IDLanguage()
	Load_Ciphers(calcLanguage)
	Option_Load()
}
function IDLanguage() {
	accLangs = ["english", "hebrew", "greek", "hebrewsoffits", "greek24"]
	calcLanguage = "english"

	const urlVars = window.location.search
	const urlParams = new URLSearchParams(urlVars)
	thisLang = urlParams.get('language')
	if (thisLang !== null) {thisLang = thisLang.toLowerCase()}

	if (thisLang !== null && accLangs.indexOf(thisLang) > -1) {
		calcLanguage = thisLang
	} else if (thisLang == "custom") {
		customOnly = true
	}

	if (calcLanguage !== "english") {
		if (!document.getElementById("cipherPresets") == false) {document.getElementById("cipherPresets").style.display = "none"}
	}
}
function TimeLaunch() {
	buildTry = setInterval(InitGemBuild, 100)
}
function InitGemBuild() {
	if (allCiphers.length > 0 && initBuild == false) {
		Build_GemTable(true)
		clearInterval(buildTry)
		document.getElementById("EntryField").disabled = false
	}
}

function Option_Load() {
	//Default options here
	optArr.Reduce = false; optArr.ShowSimple = true; optArr.Breakdown = "Chart"; optArr.IgnoreNonMatches = true
	optArr.LetterCount = true; optArr.ShowChart = true; optArr.Shortcuts = true; optArr.Headers = true;	optArr.NumCalc = "Smart"
	optArr.ShowBreakdown = true; optArr.HistoryPerPage = tblArr[0]; optArr.PerRow = 4; optArr.CompactHistory = false
	optArr.HistoryNames = ["Table 1", "Table 2", "Table 3", "Table 4"]; optArr.HistoryOn = [false, false, false, false, true, true]
	optArr.Sequences = "Regular"; optArr.RemoveDiacritics = true; optArr.AlwaysOverwrite == false; optArr.MatchContribute = true

	initOpt = true
	//Gather the user's ID and call Load_Options to get the user's options from SQL
	Load_Options()

	// If the user is on a mobile device, they may not know what's best for them, so we step in
	// if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent)) {
	// 	optArr.PerRow = 4
	// 	optArr.Quotes = false
	// 	optArr.CompactHistory = true
	// }
}

function Load_Options() {
	//Queries the SQL database for User Options
	let resArr, tArr
	let qText = "tools/calculator-advanced/php/useroptions.php"
	let xhttp = new XMLHttpRequest();
	optArr.CipherOrder = []; optArr.CipherSelection = []

	xhttp.open("GET", qText);
	xhttp.send();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			//Split the returned options into an Array
			if (xhttp.responseText !== "New user" && xhttp.responseText !== "Login required") {
				resArr = xhttp.responseText.split("&&&");

				//Set various options based on results returned in array
				if (resArr[0] == 1) {optArr.ShowBreakdown = true} else {optArr.ShowBreakdown = false}
				optArr.Breakdown = resArr[1]
				//!!!
				if (resArr[2] == 1) {optArr.RemoveDiacritics = true} else {optArr.RemoveDiacritics = false}
				if (resArr[3] == 1) {optArr.LetterCount = true} else {optArr.LetterCount = false}
				if (resArr[4] == 1) {optArr.ShowSimple = true} else {optArr.ShowSimple = false}
				if (resArr[5] == 1) {optArr.ShowChart = true} else {optArr.ShowChart = false}
				if (resArr[6] == 1) {optArr.Reduce = true} else {optArr.Reduce = false}
				if (resArr[7] == 1) {optArr.Headers = true} else {optArr.Headers = false}
				// if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent)) {optArr.PerRow = 4} else {optArr.PerRow = parseInt(resArr[6])}
			  optArr.PerRow = parseInt(resArr[8])
				optArr.NumCalc = resArr[9]
				//!!!
				optArr.Sequences = resArr[10]
				optArr.IgnoreNonMatches = resArr[11]
				let ciphOrder = resArr[12].split("%%%")
				let ciphSelection = resArr[13].split("%%%")
				optArr.CustomCiphers = resArr[14].split("|")
				if (resArr[15] == 1) {optArr.CompactHistory = true} else {optArr.CompactHistory = false}
				if (resArr[16] == 1) {optArr.Shortcuts = true} else {optArr.Shortcuts = false}
				if (calcLanguage == "english") {optArr.HistoryNames = resArr[17].split("|")}

				//Split the CipherOrder and CipherSelection data into smaller arrays
				for (let x = 0; x < ciphOrder.length; x++) {
					optArr.CipherOrder.push(ciphOrder[x].split("|"))
					optArr.CipherSelection.push(ciphSelection[x].split("|"))
				}
			}
			Build_CustomLists()
			TimeLaunch()
		}
	}
}
function Load_History() {
	for (let z = 0; z < 6; z++) {userHistory[z] = []}
	activeTable = 5
	if (calcLanguage !== "english") {Build_CustomLists(); return;}

	//Queries the SQL database for User Options
	let resArr, thisItem, newHist
	let qText = "tools/calculator-advanced/php/historyload.php"
	let xhttp = new XMLHttpRequest();

	xhttp.open("GET", qText);
	xhttp.send();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			savePhrase = document.getElementById("EntryField").value
			if (xhttp.responseText !== "") {
				resArr = xhttp.responseText.split("&&&");

				//Turn each result into a smaller array and use it to create a new history object w/ the PhraseID from the database
				for (let x = 0; x < resArr.length; x++) {
					thisItem = resArr[x].split("|")
					newHist = new HistoryItem(thisItem[1], thisItem[0])
					userHistory[parseInt(thisItem[2])].push(newHist)
				}
			}
			LoadEntry(savePhrase, false, true)
			Build_CustomLists()
		}
	}
}

function EntryValue() {
	//Pulls the data entered into the main text field
	let eBox = document.getElementById("EntryField")
	let eStr = eBox.value.trim()
	return eStr
}

function FieldChange(impVal = EntryValue()) {
	//Triggered whenever a key is pressed in the main text field
	let overRide = Calc_AllGem(impVal)
	Populate_GemTable()
	Build_Breakdown(overRide)
}

function Populate_GemTable(impBool = true) {
	let thisCipher, gSpot, iText
	let wSpot = document.getElementById("WordLetterCount")

	clearTimeout(numTimeout)
	Clear_SeqLists()

	//Once the GemTable has been created, this function loops through each cipher and if it's on, populates the corresponding cell
	//with the Gematria value. If impBool is set to false, simply place a dash in the cell (Used when a shortcut is in the field)
	for (let x = 0; x < allCiphers.length; x++) {
		thisCipher = allCiphers[x]
		if (thisCipher.isOn == true) {
			gSpot = document.getElementById("TableValue_" + thisCipher.Nickname.replaceAll(" ", "_"))
			if (gSpot === null) {continue}
			if (impBool == true) {
				gSpot.innerHTML = thisCipher.GemString(undefined, optArr.Reduce, optArr.Headers)
			} else {
				gSpot.innerHTML = thisCipher.GemString("-")
			}
		}
	}

	//If the Word/Letter count is turned on, build the data and populate it below the Breakdown
	if (optArr.LetterCount == true) {
		let wSuff, lSuff
		let countArr = WordLetterCounter()
		if (countArr[0] !== 1) {wSuff = "words"} else {wSuff = "word"}
		if (countArr[1] !== 1) {lSuff = "letters"} else {lSuff = "letter"}
		
		iText = '<div class="WordLetterCount">' + "(" + countArr[0] + " " + wSuff + ", " + countArr[1] + " " + lSuff + ")</div>"
		wSpot.innerHTML = iText
	} else {
		wSpot.innerHTML = ""
	}
	if (optArr.Sequences == "Off") {return} else {numTimeout = setTimeout(function() {Check_Seq()}, 1000)}
}

//--------------------------------------------------
//Number Property functions
function Check_Seq() {
	let seqArr, gSpot, newHTML

	for (let x = 0; x < allCiphers.length; x++) {
		thisCipher = allCiphers[x]
		if (thisCipher.isOn == false) {continue}

		thisName = thisCipher.Nickname
		gSpot = document.getElementById("TableValue_" + thisName.replaceAll(" ", "_"))
		thisG = thisCipher.gemTotal
		seqArr = Get_SeqSpots(thisG)

		for (let y = 0; y < seqArr.length; y++) {
			switch (seqArr[y][0]) {
				case "Prime":
					jQuery(gSpot).addClass("InPrimeList"); break;
				case "Fibonacci":
					jQuery(gSpot).addClass("InFibList"); break;
				case "Triangular":
					jQuery(gSpot).addClass("InTriList"); break;
				case "Square":
					jQuery(gSpot).addClass("InSquareList"); break;
				case "Cube":
					jQuery(gSpot).addClass("InCubeList"); break;
				default:
					jQuery(gSpot).addClass("InSeqList"); break;
			}
		}
	}
}
function Get_SeqSpots(impVal) {
	let retArr = []

	for (let x = 0; x < seqLists[0].length; x++) {
		this_SeqSpot = NumSeq[seqLists[0][x]].indexOf(impVal)
		if (this_SeqSpot > -1) {
			retArr.push([seqLists[0][x], this_SeqSpot + 1])
		}
	}

	if (optArr.Sequences == "All") {
		for (let y = 0; y < seqLists[1].length; y++) {
			this_SeqSpot = NumSeq[seqLists[1][y]].indexOf(impVal)
			if (this_SeqSpot > -1) {
				retArr.push([seqLists[1][y], this_SeqSpot + 1])
			}
		}
	}

	return retArr
}
function Clear_SeqLists() {
	//SeqLists stores whether or not a number is in a special sequence array
	for (let x = 0; x < allCiphers.length; x++) {
		thisCipher = allCiphers[x]
		gSpot = document.getElementById("TableValue_" + thisCipher.Nickname.replaceAll(" ", "_"))
		jQuery(gSpot).removeClass("InPrimeList")
		jQuery(gSpot).removeClass("InFibList")
		jQuery(gSpot).removeClass("InTriList")
		jQuery(gSpot).removeClass("InSquareList")
		jQuery(gSpot).removeClass("InCubeList")
		jQuery(gSpot).removeClass("InSeqList")
	}
}
//--------------------------------------------------

function Make_Numeric(impArr) {
	let tempArr = []
	for (let x = 0; x < impArr.length; x++) {
		tempArr.push(parseInt(impArr[x]))
	}
	return tempArr
}

function WordLetterCounter() {
	//Counts the number of words/letters in calcArr and returns an array of the sums
	let wCount = 0, lCount = 0, isWord = false

	for (let x = 0; x < calcArr.length; x++) {
		isWord = false
		for (let y = 0; y < calcArr[x].length; y++) {
			if (isNaN(calcArr[x][y]) == false) {
				lCount++
				if (isWord == false) {
					isWord = true; wCount++
				}
			}
		}
	}

	return [wCount, lCount]
}

function TableArray(impPerRow = optArr.PerRow) {
	//This function creates a two-dimensional array used to build the main Gematria table

	if (impPerRow == 2) {

	}

	//Count the open ciphers and create the number of table rows based on that and the PerRow option
	let cCount = CipherCount(2)
	let numRows = Math.ceil(cCount / impPerRow)
	let tableOrder = new Array(numRows)

	//Create a new array for each row in the table
	for (let x = 0; x < tableOrder.length; x++) {
		if (x !== tableOrder.length - 1) {
			tableOrder[x] = new Array(impPerRow)
		} else {
			tableOrder[x] = new Array(cCount % impPerRow)
		}
	}

	//If the cipher is on, add it to the table
	let currRow = 0; columnTally = 0
	for (let y = 0; y < allCiphers.length; y++) {
		if (allCiphers[y].isOn == true) {
			tableOrder[currRow][columnTally] = y
			if (columnTally >= impPerRow - 1) {
				currRow++; columnTally = 0
			} else {
				columnTally++
			}
		}
	}
	return tableOrder
}

function findNumber(impHTML) {
	//Returns the displayed number from a string of HTML by looking for the "</font>"" tag and cycling backwards
	let numEnd = impHTML.search("</font>")

	for (let x = numEnd - 1; x > 0; x--) {
		if (impHTML.substring(x, x + 1) == ">") {
			return Number(impHTML.substring(x + 1, numEnd))
		}
	}
	return false
}
function addHistListeners() {
	let numElements = document.querySelectorAll('.HistorySum')

	//Add a listener for right-clicks on the History table that hides the number by toggling the "b" class
	for (let x = 0; x < numElements.length; x++) {
		numElements[x].addEventListener('contextmenu', function(ev) {
			ev.preventDefault()
			jQuery(this).find(".justnumber").toggleClass('hideValue')
			return false
		}, false)
	}
}

function arraySum(total, num) {
	//Returns the sum of all numbers in an array
  	return parseInt(total) + parseInt(num);
}

function delay(time) {
  return new Promise(resolve => setTimeout(resolve, time));
}

function ToggleBreakdown(impType = 2) {
	//impType 2 to toggle on/off, 1 not set yet
	let newOpt
	if (impType == 2) {
		if (optArr.ShowBreakdown == true) {
			newOpt = false
		} else {
			newOpt = true
		}
	}
	optArr.ShowBreakdown = newOpt
	Build_Breakdown()
}

function ToggleGemChart(impType = 2) {
	//impType 2 to toggle on/off, 1 not set yet
	let newOpt
	if (impType == 2) {
		if (optArr.ShowChart == true) {newOpt = false} else {newOpt = true}
	}
	optArr.ShowChart = newOpt
	Build_GemChart()
}

