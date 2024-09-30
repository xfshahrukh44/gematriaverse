//dbMatched holds objects created from the text returned by the matchquery.php file. It contains the phrase and its gematria (only the searched ciphers)
//lastMatchNumbers holds an array of numbers that were last sent to matchquery.php. lastMatchCiphers holds an array of the ciphers sent.
var dbMatched = []
var lastMatchNumbers = []
var lastMatchCiphers = []

//historyMatched contains an array of History items returned by using the matchActive function.
var historyMatch
var historyMatched = []
var historyCiphers = []
var historyGems = []
var historyNumeric

function matchActive() {
	let retVal, holdHistArr = historyMatched, holdCiphArr = historyCiphers, holdHistGems = historyGems
	//Clear global variables
	delete historyMatch
	historyMatched = [], historyCiphers = [], historyGems = []

	//Figure out whether or not all of the data entered is numeric
	let eVal = EntryValue()
	let trimVal = TrimToHistory(eVal)
	let fieldArr = eVal.split(" ")
	historyNumeric = AllNumbers(fieldArr)

	//If only numbers were entered, call matchNumbers, otherwise call matchGematria
	if (historyNumeric == true) {
		retVal = matchNumbers(trimVal, MakeNumeric(fieldArr))
	} else {
		retVal = matchGematria(trimVal)
	}

	if (retVal == false) {
		historyMatched = holdHistArr
		historyCiphers = holdCiphArr
		historyGems = holdHistGems
	}
}

function matchGematria(impVal) {
	//Create the historyMatch object and clear the global variable
	historyMatch = new HistoryItem(impVal)
	historyGems = []

	//Set local variables
	let matchArr = [], matchedPhrases = [], historyCols = []
	let thisHitem, thisGem, tempItem, AddPoints, phraseAdded, arrSpot

	//Cycle through each History table
	for (let z = 0; z < userHistory.length; z++) {
		if (optArr.HistoryOn[z] == false) {continue}

		//Cycle through each item in the History table
		for (let x = 0; x < userHistory[z].length; x++) {
			thisHitem = userHistory[z][x]
			thisOnArr = thisHitem.onArr
			if (thisHitem.phrase == impVal || matchedPhrases.indexOf(thisHitem.phrase) > -1) {continue}
			phraseAdded = false

			//Cycle through each number in the gematria array
			for (let y = 0; y < historyMatch.onArr.length; y++) {
				thisGem = parseInt(historyMatch.onArr[y]); AddPoints = 0
				if (thisGem == "") {continue}

				//Add the cipher positions to historyCols and the matched gematria value to historyGems
				arrSpot = thisOnArr.indexOf(thisGem)
				while (arrSpot > -1) {
					if (isMatchOK(allCiphers[y], allCiphers[arrSpot], TrimToHistory(impVal), thisHitem.phrase)) {
						if (thisOnArr[y] == thisGem) {
							AddPoints += Number(thisGem) * 10
							historyCols.push(y)
						} else {
							AddPoints += Number(thisGem)
							historyCols.push(y, arrSpot)
						}
					}
					arrSpot = thisOnArr.indexOf(thisGem, arrSpot + 1)
				}

				if (AddPoints == 0) {continue}

				historyGems.push(thisGem)

				if (phraseAdded == false) {
					matchedPhrases.push(thisHitem.phrase); phraseAdded = true
					tempItem = new HistoryItem(thisHitem.phrase)
					tempItem.matchStrength = AddPoints
					historyMatched.push(tempItem)
				}
			}
		}
	}

	historyCols = historyCols.filter(FilterUnique)
	historyGems = historyGems.filter(FilterUnique)

	//Build an array of Ciphers to be included in the Match table and format the Matches appropriately
	for (let z = 0; z < allCiphers.length; z++) {
		if (historyCols.indexOf(z) > -1) {
			historyCiphers.push(allCiphers[z])
		}
	}
	SlimHistoryMatches(historyCols)

	//Reload the Entry Field--------------!!!--------------Might need? 
	LoadEntry(impVal)

	//Sort the new array of History items based on matchStrength
	historyMatched.sort(historySorter)

	//If matches were found, build the corresponding table
	if (historyMatched.length > 0 && historyCols.length > 0) {
		Build_MatchTable(0)
		return true
	} else {
		return false
	}
}

function matchNumbers(impVal, impArr) {
	hGems = impArr

	//Set local variables
	let matchArr = [], matchedPhrases = [], historyCols = []
	let thisHitem, thisGem, tempItem, AddPoints, phraseAdded, arrSpot

	//Cycle through each History table
	for (let z = 0; z < userHistory.length; z++) {
		if (optArr.HistoryOn[z] == false) {continue}

		//Cycle through each item in the History table
		for (let x = 0; x < userHistory[z].length; x++) {
			thisHitem = userHistory[z][x]
			thisOnArr = thisHitem.onArr
			if (matchedPhrases.indexOf(thisHitem.phrase) > -1) {continue}
			phraseAdded = false

			//Cycle through each number in the gematria array
			for (let y = 0; y < hGems.length; y++) {
				thisGem = parseInt(hGems[y]); AddPoints = 0
				if (thisGem == "") {continue}

				//Add the cipher positions to historyCols and the matched gematria value to historyGems
				arrSpot = thisOnArr.indexOf(thisGem)
				while (arrSpot > -1) {
					AddPoints += Number(thisGem)
					historyCols.push(arrSpot)
					arrSpot = thisOnArr.indexOf(thisGem, arrSpot + 1)
				}

				if (AddPoints == 0) {continue}

				historyGems.push(thisGem)

				if (phraseAdded == false) {
					matchedPhrases.push(thisHitem.phrase); phraseAdded = true
					tempItem = new HistoryItem(thisHitem.phrase)
					historyMatched.push(tempItem)
				}

				historyMatched[historyMatched.length - 1].matchStrength += AddPoints
			}
		}
	}

	historyCols = historyCols.filter(FilterUnique)
	historyGems = historyGems.filter(FilterUnique)

	//Build an array of Ciphers to be included in the Match table and format the Matches appropriately
	for (let z = 0; z < allCiphers.length; z++) {
		if (historyCols.indexOf(z) > -1) {
			historyCiphers.push(allCiphers[z])
		}
	}
	SlimHistoryMatches(historyCols, 1)

	//Sort the new array of History items based on matchStrength
	historyMatched.sort(historySorter)

	LoadEntry(impVal, false, true)

	//If matches were found, build the corresponding table
	if (historyMatched.length > 0 && historyCols.length > 0) {
		Build_MatchTable(0)
		return true
	} else {
		return false
	}
}

function matchAllHistory() {
	//This function looks through all items in the userHistory arrays and finds the best matches of ALL numbers
	let thisVal, compVal, thisPhrase

	//If nothing's in the history, give up. Otherwise, set default arrays
	if (userHistory.length == 0) {return}
	let matchedPhrases = []
	let matchedNums = []
	let matchArr = []

	//Cycle through each history array if it is on
	for (let z = 0; z < userHistory.length; z++) {
		if (optArr.HistoryOn[z] == false) {continue;}

		//Cycle through each History item in the selected table
		for (let x = 0; x < userHistory[z].length - 1; x++) {

			//If the History item's phrase has already been looped through, move on, or add it to matchedPhrases if not
			thisPhrase = userHistory[z][x].phrase
			if (matchedPhrases.indexOf(userHistory[z][x].phrase) > -1) {continue;}
			matchedPhrases.push(userHistory[z][x].phrase)

			//Cycle through each value in the item's gematria
			for (let y = 0; y < allCiphers.length; y++) {
				thisVal = userHistory[z][x].onArr[y]; valAdded = false
				//If the value is empty, or has already been added, move on
				if (thisVal == "" || matchedNums.indexOf(thisVal) > -1) {continue;}

				//With the number variable set, loop through each on History table and search for the gematria
				for (let z2 = z; z2 < userHistory.length; z2++) {
					if (optArr.HistoryOn[z2] == false) {continue;}

					for (let x2 = x + 1; x2 < userHistory[z2].length; x2++) {

						//If the phrase has already been reviewed, move on
						if (matchedPhrases.indexOf(userHistory[z2][x2].phrase) > -1) {continue;}

						//If a gematria match is found, move forward
						for (let y2 = 0; y2 < allCiphers.length; y2++) {
							compVal = userHistory[z2][x2].onArr[y2]
							if (compVal == thisVal) {
								//If the values match, create a new item for the array or increase its score
								if (valAdded == false) {
									matchedNums.push(thisVal); valAdded = true
									matchArr.push([thisVal, thisVal, 2])
								} else {
									matchArr[matchArr.length - 1][1] += thisVal
									matchArr[matchArr.length - 1][2]++
								}
							}
						}
					}
				}
			}
		}
	}

	//Sort the arrays based on score and build the Match table
	matchArr.sort(matchSorter)
	Build_AllMatches(matchArr)
}

function matchSorter(a, b) {
	//Special sort function for sorting history matches by strength
    if (a[1] === b[1]) {
        return 0;
    }
    else {
        return (a[1] > b[1]) ? -1 : 1;
    }
}

function AllNumbers(impArr) {
	//This function returns true or false based on whether or not all of the items in the imported array are numeric
	let thisVal
	for (let x = 0; x < impArr.length; x++) {
		thisVal = impArr[x]
		if (isNaN(Number(thisVal)) == true) {
			return false
		}
	}
	return true
}

function MakeNumeric(impArr) {
	//This function turns every item in the array into an Int object
	let tempArr = [], thisDigit
	for (let x = 0; x < impArr.length; x++) {
		thisDigit = parseInt(impArr[x])
		if (tempArr.indexOf(thisDigit) == -1) {
			tempArr.push(parseInt(impArr[x]))
		}
	}
	return tempArr
}

function matchToDB() {
	if (CipherCount(2) > 16) {
		alert('Select 16 or fewer ciphers to execute the Database Match.')
		return;
	}

	let resArr, matchNums, sendType, qText
	let matchCiphers = Get_CipherOrder(true).replaceAll(" ", "_").split("%%%")

	//Check to see if the Entry Field is full of numbers, or if there is text
	let eValArr = EntryValue().split(" ")
	if (AllNumbers(eValArr) == true) {
		//If the entire array is numeric, convert them all to Int objects
		for (let x = 0; x < eValArr.length; x++) {eValArr[x] = parseInt(eValArr[x])}
		matchNums = eValArr
		sendType = 0
	} else {
		//If not numeric, instead retrieve the gematria values from the table
		matchNums = AllGemArr(true)
		sendType = 1
	}
	
	//Remove empty items from the matchCiphers and matchNums arrays and re-assigns them to the global variables
	let queryCiphers = matchCiphers.filter(FilterEmpty)
	let queryNums = matchNums.filter(FilterEmpty)
	lastMatchCiphers = queryCiphers
	lastMatchNumbers = queryNums

	//Change matchType based on MatchSameCipher option
	if (optArr.MatchSameCipher == true) {matchType = 1} else {matchType = 0}

	qText = "tools/calculator-advanced/php/matchquery.php?match=" + matchType + "&type=" + sendType + "&ciphers=" + queryCiphers.join("|") + "&numbers=" + queryNums.join("|")

	Begin_Search()

	//Send the query and call Create_Matches to create the dbMatched array
	let xhttp = new XMLHttpRequest();
	xhttp.open("GET", qText);
	xhttp.send();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			if (xhttp.responseText == "Limit reached") {ShowLimitReached(); return}
			if (xhttp.responseText == "Over max ciphers") {ShowMaxCiphers(); return}
			if (xhttp.responseText == "Database maintenance") {ShowMaintenance(); return}
			//Split the returned text into smaller items in an array
			resArr = xhttp.responseText.split("&&&")
			Create_Matches(resArr)
		}
	}
}
function Begin_Search() {
	hSpot = document.getElementById("MiscSpot")
	hSpot.innerHTML = "Searching..."
}
function ShowLimitReached() {
	let iText = ""
	Build_CustomLists(true)
	hSpot = document.getElementById("MiscSpot")
	iText += '<button class="buttonFunction" onclick="Build_HistoryTable()">Show History</button><p style="margin-top:10px;">'
	iText += 'Limit reached. Make a <a href="/memberships" style="color:yellow;">Free Account or Upgrade</a> for more daily Matches!'
	hSpot.innerHTML = iText
}
function ShowMaxCiphers() {
	let iText = ""
	Build_CustomLists(true)
	hSpot = document.getElementById("MiscSpot")
	iText += '<button class="buttonFunction" onclick="Build_HistoryTable()">Show History</button><P>'
	iText += 'Cipher max for "Match" is 16.'
	hSpot.innerHTML = iText
}
function ShowMaintenance() {
	let iText = ""
	Build_CustomLists(true)
	hSpot = document.getElementById("MiscSpot")
	iText += '<button class="buttonFunction" onclick="Build_HistoryTable()">Show History</button><P>'
	iText += 'Sit tight! The Database is currently undergoing maintenance while I add more terms.'
	hSpot.innerHTML = iText
}
function Create_Matches(impArr) {
	//Once Matches are retrieved from the SQL database, create objects from the results
	let newMatch
	dbMatched = []
	eVal = TrimToHistory(EntryValue())

	//Cycle through each item in the array and create the phrase
	for (let x = 0; x < impArr.length; x++) {
		thisItem = impArr[x].split("|")
		newMatch = {}; tempNumArr = []; tempCipherArr = []

		if (thisItem[0] == eVal) {continue}
		newMatch.phrase = thisItem[0]

		//Add each item into the object's gematria array
		for (let y = 1; y < thisItem.length; y++) {
			thisArrItem = thisItem[y]
			if (isNaN(thisArrItem) == false) {
				tempNumArr.push(parseInt(thisArrItem))
			}
		}

		//Add this object into the full dbMatched array
		newMatch.NumArr = tempNumArr
		newMatch.CipherArr = lastMatchCiphers
		if (newMatch.phrase.length > 2) {
			dbMatched.push(newMatch)
		}
	}

	SlimDBMatches()
	//Show the table of database matches
	Build_DatabaseMatches()
}

function SlimDBMatches() {
	let thisMatch, thisNum
	let ciphersLeft = []
	let newNumArr = []; newCipherArr = []

	//Cycle through each matched item from the Database
	for (let x = 0; x < dbMatched.length; x++) {
		thisMatch = dbMatched[x]

		//Cycle through each gematria value and see if it's in the lastMatchNum array
		for (let y = 0; y < thisMatch.NumArr.length; y++) {
			if (ciphersLeft.indexOf(y) > -1) {continue;}
			thisNum = thisMatch.NumArr[y]

			if (lastMatchNumbers.indexOf(thisNum) > -1) {
				ciphersLeft.push(y)
			}
		}
	}

	//Rebuild the lastMatchCiphers array based on the ciphersLeft array created above
	for (let z = 0; z < lastMatchCiphers.length; z++) {
		if (ciphersLeft.indexOf(z) > -1) {
			newCipherArr.push(lastMatchCiphers[z])
		}
	}
	lastMatchCiphers = newCipherArr

	//Cycle through each matched item and rebuild the Number array based on the ciphers still left
	for (let p = 0; p < dbMatched.length; p++) {
		newNumArr = []

		for (q = 0; q < dbMatched[p].NumArr.length; q++) {
			if (ciphersLeft.indexOf(q) > -1) {
				newNumArr.push(dbMatched[p].NumArr[q])
			}
		}
		dbMatched[p].CipherArr = lastMatchCiphers
		dbMatched[p].NumArr = newNumArr
	}
}

function MatchPhraseLink(impPhrase, impPos) {
	//Creates a link to a dropdown menu from the item's phrase
	let moveText
	let expText = ""
	let histSpot = IsInSaveTables(impPhrase)

	if (histSpot == -1) {
		moveText = "Save"
	} else {
		moveText = "Move"
	}

	//Creates a button that displays a dropdown on hover
	expText += '<div class="historyDrop"><button class="historyBtn">' + impPhrase + '</button>'
		expText += '<div class="historyOptions">'

			expText += '<a href="javascript:MoveHistory(' + impPos + ', 1, dbMatched)">Move Up</a>'
			expText += '<a href="javascript:MoveHistory(' + impPos + ', 2, dbMatched)">Move Down</a>'
			expText += '<a href="javascript:LoadEntry(' + (impPos + 1) + ', undefined, undefined, dbMatched)">Place in Field</a>'
			expText += '<a href="javascript:LoadEntry(' + (impPos + 1) + ', true, undefined, dbMatched)">Find Matches</a>'
			expText += '<a href="javascript:RemoveHistory(' + impPos + ', dbMatched)">Remove</a>'

			//Creates another button that displays a different transfer dropdown on hover
			expText += '<div class="TransferDrop"><a class="TransferBtn">' + moveText + ' to Table:</a>'
			expText += '<div class="TransferOptions">'
				if (histSpot[1] !== 0) {expText += '<a href="javascript:TransferHistory(' + impPos + ', 1, undefined, 2)">' + optArr.HistoryNames[0] + '</a>'}
				if (histSpot[1] !== 1) {expText += '<a href="javascript:TransferHistory(' + impPos + ', 2, undefined, 2)">' + optArr.HistoryNames[1] + '</a>'}
				if (histSpot[1] !== 2) {expText += '<a href="javascript:TransferHistory(' + impPos + ', 3, undefined, 2)">' + optArr.HistoryNames[2] + '</a>'}
				if (histSpot[1] !== 3) {expText += '<a href="javascript:TransferHistory(' + impPos + ', 4, undefined, 2)">' + optArr.HistoryNames[3] + '</a>'}
				if (IsInHistory(impPhrase) == -1) {expText += '<a href="javascript:TransferHistory(' + impPos + ', 5, undefined, 2)">User History</a>'}
				if (IsInTemp(impPhrase) == -1) {expText += '<a href="javascript:TransferHistory(' + impPos + ', 6, undefined, 2)">This Session</a>'}
			expText += '</div></div>'

		expText += '</div></div>'

	return expText
}

function FilterEmpty(arrElement) {
	return arrElement !== ""
}
function FilterUnique(value, index, self) {
  return self.indexOf(value) === index;
}

function SlimHistoryMatches(impArr, impNum = 0) {
	//Removes unnecessary columns from the historyMatched items
	let cArr = [], tempArr = []
	let thisHist

	//Cycle through each Matched item
	for (x = 0; x < historyMatched.length; x++) {
		thisHist = historyMatched[x]
		tempArr = []; thisHist.onArr = []; thisHist.ciphArr = []

		//Cycle through each cipher and push its associated gematria value to tempArr if it's in impArr
		for (let y = 0; y < allCiphers.length; y++) {
			if (impArr.indexOf(y) > -1) {
				tempArr.push(thisHist.gemArr[y])
				thisHist.ciphArr.push(allCiphers[y].Nickname)
			}
		}
		//Assign tempArr to the matched item's gemArr
		thisHist.gemArr = tempArr
	}

	if (impNum == 1) {return}

	//Do the same thing for the historyMatch item
	tempArr = []; historyMatch.onArr = []; historyMatch.ciphArr = []
	for (z = 0; z < allCiphers.length; z++) {
		if (impArr.indexOf(z) > -1) {
			tempArr.push(historyMatch.gemArr[z])
			historyMatch.ciphArr.push(allCiphers[z].Nickname)
		}
	}
	historyMatch.gemArr = tempArr
}
function SlimMatchCiphers(impArr, impType) {
	//Use the imported numerical array to determine whether or not the cipher will remain in historyCiphers
	for (let x = historyCiphers.length - 1; x > -1; x--) {
		if (impArr.indexOf(x) == -1) {
			historyCiphers.splice(x, 1)
		}
	}
	//Cycle through each Matched item and delete any gematria/cipher indeces that are not in impArr
	for (let z = 0; z < historyMatched.length; z++) {
		for (let q = historyMatched[z].gemArr.length - 1; q > -1; q--) {
			if (impArr.indexOf(q) == -1) {
				historyMatched[z].gemArr.splice(q, 1)
				historyMatched[z].ciphArr.splice(q, 1)
			}
		}
	}

	if (impType == 1) {return}

	//If the Match function was used for a phrase, also slim the phrase's arrays based on impArr
	for (let y = historyMatch.gemArr.length - 1; y > -1; y--) {
		if (impArr.indexOf(y) == -1) {
			historyMatch.gemArr.splice(y, 1)
			historyMatch.ciphArr.splice(y, 1)
		}
	}
}

function RerankMatches() {
	let thisHist, thisGem, AddPoints, arrSpot, checkArr
	let hCols = [], hGems = []

	//checkArr becomes the array to compare gematria with
	checkArr = historyMatch.gemArr

	//Cycle through each Matched item
	for (let x = historyMatched.length - 1; x > -1; x--) {
		thisHist = historyMatched[x]
		thisHist.matchStrength = 0

		//Cycle through each gematria value and see if it's still in checkArr
		for (let y = 0; y < thisHist.gemArr.length; y++) {
			thisGem = thisHist.gemArr[y]
			arrSpot = checkArr.indexOf(thisGem)

			if (historyMatch.gemArr[y] == thisGem) {
				AddPoints = thisGem * 10
				hCols.push(y)
			} else if (arrSpot > -1) {
				AddPoints = thisGem
				hCols.push(y, arrSpot)
			} else {
				AddPoints = 0
				continue
			}

			//If the value is found, push the Cipher position and Gematria value to the corresponding arrays
			hGems.push(thisGem)
			thisHist.matchStrength += AddPoints
		}

		//If the score is still 0, just remove it from the array
		if (thisHist.matchStrength == 0) {
			historyMatched.splice(x, 1)
		}
	}

	//Remove any ciphers that no longer have any matching values to hGems (historyGems)
	for (let q = 0; q < checkArr.length; q++) {
		if (hGems.indexOf(checkArr[q]) > -1) {
			hCols.push(q)
		}
	}

	historyGems = hGems.filter(FilterUnique)

	//Sort the new array of History items and restore the original value to the main Entry box
	historyMatched.sort(historySorter)
	
	SlimMatchCiphers(hCols)

	//If matches were found, build the corresponding table
	if (historyMatched.length > 0) {
		Build_MatchTable(0)
	} else {
		Build_HistoryTable()
	}
}

function SlimNumMatches() {
	let thisHist, thisGem, deleteHist, hCols = []

	//Cycle through each history item
	for (let x = historyMatched.length - 1; x > -1; x--) {
		thisHist = historyMatched[x]
		deleteHist = true

		//If the item's gematria array still has any matching numbers with historyGems, don't delete it
		for (y = 0; y < thisHist.gemArr.length; y++) {
			thisGem = thisHist.gemArr[y]
			if (historyGems.indexOf(thisGem) > -1) {
				deleteHist = false
				hCols.push(y)
			}
		}

		if (deleteHist == true) {
			historyMatched.splice(x, 1)
		}
	}

	hCols = hCols.filter(FilterUnique)

	SlimMatchCiphers(hCols, 1)

	//Sort the new array of History items and restore the original value to the main Entry box
	historyMatched.sort(historySorter)

	//If matches still exist, build the corresponding table
	if (historyMatched.length > 0) {
		Build_MatchTable(0)
	} else {
		Build_HistoryTable()
	}
}