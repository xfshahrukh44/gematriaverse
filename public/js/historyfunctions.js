var userHistory = [], tblArr = [25, 50, 100]
var activeTable = 0, activeType = "history"

class HistoryItem {
	constructor(impPhrase, impID = -1) {
		let x, y, expPhrase, thisGem, thisChar, numAdd, addTotal
		this.onArr = []; this.gemArr = []; this.numArr = []; this.matchStrength = 0; this.ciphArr = []; this.submitted = false

		this.phrase = impPhrase
		this.phraseID = impID
		if (this.phraseID > -1) {this.submitted = true}
		this.numArr = Calc_AllGem(this.phrase)

		//Cycle through each cipher and add the phrase's gematria value to gemArr. If the cipher is on, also add it to addArr
		for (y = 0; y < allCiphers.length; y++) {
			thisGem = allCiphers[y].gemTotal
			this.gemArr.push(thisGem)
			this.ciphArr.push(allCiphers[y].Nickname)
			if (allCiphers[y].isOn == true) {this.onArr.push(thisGem)} else {this.onArr.push("")}
		}
	}

	PhraseLink(impPos) {
		//Creates a link to a dropdown menu from the item's phrase
		let moveText
		let expText = ""
		let histSpot = IsInSaveTables(this.phrase)

		if (activeTable == userHistory.length - 1 && histSpot == -1) {
			moveText = "Save"
		} else {
			moveText = "Move"
		}

		//Creates a button that displays a dropdown on hover
		expText += '<div class="historyDrop"><button class="historyBtn" onclick="javascript:Click_History(' + impPos + ', event)">' + this.phrase + '</button>'
  		expText += '<div class="historyOptions">'

  			expText += '<a href="javascript:LoadEntry(' + (impPos + 1) + ', false)">Place in Field</a>'

	  		//expText += '<a href="javascript:MoveHistory(' + impPos + ', 1)">Move Up</a>'
	  		//expText += '<a href="javascript:MoveHistory(' + impPos + ', 2)">Move Down</a>'
	  		expText += '<div class="TransferDrop"><a class="TransferBtn">Shift Phrase:</a>'
	  		expText += '<div id="shiftMenu" class="TransferOptions">'
	  			expText += '<a href="javascript:MoveHistory(' + impPos + ', 1)">Move Up</a>'
	  			expText += '<a href="javascript:MoveHistory(' + impPos + ', 2)">Move Down</a>'
	  			expText += '<a href="javascript:MoveHistory(' + impPos + ', 3)">Move to Top</a>'
	  			expText += '<a href="javascript:MoveHistory(' + impPos + ', 4)">Move to Bottom</a>'
	  		expText += '</div></div>'

	  		expText += '<a href="javascript:LoadEntry(' + (impPos + 1) + ', true)">Find Matches</a>'
	  		expText += '<a href="javascript:RemoveHistory(' + impPos + ')">Remove</a>'
	  		if (activeTable == userHistory.length - 1) {
	  			expText += '<a href="javascript:RemoveSession(' + impPos + ')">Remove All Below</a>'
	  		}	  		

	  		if (activeTable == userHistory.length - 2) {
	  			expText += '<a href="javascript:ChunkToSession(' + impPos + ')">Chunk to Session</a>'
	  		}

	  		//Creates another button that displays a different transfer dropdown on hover
	  		expText += '<div class="TransferDrop"><a class="TransferBtn">' + moveText + ' to Table:</a>'
	  		expText += '<div id="moveMenu" class="TransferOptions">'
	  			if (histSpot[1] !== 0) {expText += '<a href="javascript:TransferHistory(' + impPos + ', 1)">' + optArr.HistoryNames[0] + '</a>'}
	  			if (histSpot[1] !== 1) {expText += '<a href="javascript:TransferHistory(' + impPos + ', 2)">' + optArr.HistoryNames[1] + '</a>'}
	  			if (histSpot[1] !== 2) {expText += '<a href="javascript:TransferHistory(' + impPos + ', 3)">' + optArr.HistoryNames[2] + '</a>'}
	  			if (histSpot[1] !== 3) {expText += '<a href="javascript:TransferHistory(' + impPos + ', 4)">' + optArr.HistoryNames[3] + '</a>'}
	  			if (IsInTemp(this.phrase) == -1) {expText += '<a href="javascript:TransferHistory(' + impPos + ', 6)">This Session</a>'}
	  		expText += '</div></div>'

  		expText += '</div></div>'

		return expText
        // document.getElementById("historyDropSpot").innerHTML = expText
	}

	MatchLink(impPos) {
		//Creates a link to a dropdown menu from the item's phrase
		let moveText
		let expText = ""
		let histSpot = IsInSaveTables(this.phrase)

		if (histSpot == -1) {
			moveText = "Save"
		} else {
			moveText = "Move"
		}
		
		//Creates a button that displays a dropdown on hover
		expText += '<div class="historyDrop"><button class="historyBtn" onclick="javascript:Click_Match(' + impPos + ', event)">' + this.phrase + '</button>'
  		expText += '<div class="historyOptions">'

	  		expText += '<div class="TransferDrop"><a class="TransferBtn">Shift Phrase:</a>'
	  		expText += '<div id="shiftMenu" class="TransferOptions">'
	  			expText += '<a href="javascript:MoveHistory(' + impPos + ', 1, historyMatched)">Move Up</a>'
	  			expText += '<a href="javascript:MoveHistory(' + impPos + ', 2, historyMatched)">Move Down</a>'
	  			expText += '<a href="javascript:MoveHistory(' + impPos + ', 3, historyMatched)">Move to Top</a>'
	  			expText += '<a href="javascript:MoveHistory(' + impPos + ', 4, historyMatched)">Move to Bottom</a>'
	  		expText += '</div></div>'

	  		expText += '<a href="javascript:LoadEntry(' + (impPos + 1) + ', true, undefined, historyMatched)">Find Matches</a>'
	  		expText += '<a href="javascript:RemoveHistory(' + impPos + ', historyMatched, true)">Remove</a>'
	  		expText += '<a href="javascript:RemoveMatched(' + impPos + ')">Remove All Below</a>'
			
			//Creates another button that displays a different transfer dropdown on hover
	  		expText += '<div class="TransferDrop"><a class="TransferBtn">' + moveText + ' to Table:</a>'
	  		expText += '<div class="TransferOptions">'
	  			if (histSpot[1] !== 0) {expText += '<a href="javascript:TransferHistory(' + impPos + ', 1, undefined, 1)">' + optArr.HistoryNames[0] + '</a>'}
	  			if (histSpot[1] !== 1) {expText += '<a href="javascript:TransferHistory(' + impPos + ', 2, undefined, 1)">' + optArr.HistoryNames[1] + '</a>'}
	  			if (histSpot[1] !== 2) {expText += '<a href="javascript:TransferHistory(' + impPos + ', 3, undefined, 1)">' + optArr.HistoryNames[2] + '</a>'}
	  			if (histSpot[1] !== 3) {expText += '<a href="javascript:TransferHistory(' + impPos + ', 4, undefined, 1)">' + optArr.HistoryNames[3] + '</a>'}
	  			if (IsInHistory(this.phrase) == -1) {expText += '<a href="javascript:TransferHistory(' + impPos + ', 5, undefined, 1)">User History</a>'}
	  			if (IsInTemp(this.phrase) == -1) {expText += '<a href="javascript:TransferHistory(' + impPos + ', 6, undefined, 1)">This Session</a>'}
	  		expText += '</div></div>'

  		expText += '</div></div>'

		return expText
	}
}
function Click_History(impPos, impEvent) {
	if (window.matchMedia("(max-width: 770px)").matches) {return;}

	if (impEvent.ctrlKey) {
		if (impEvent.altKey) {
			//If Ctrl+Alt is pressed, delete from History
			RemoveHistory(impPos)
		} else if (impEvent.shiftKey) {
			//If Ctrl+Shift is pressed, move all the way up
			MoveHistory(impPos, 3)
		} else {
			//If just Ctrl is pressed, Move up
			MoveHistory(impPos, 1)
		}
		//If just Alt is pressed, Move down
	} else if (impEvent.altKey) {
		if (impEvent.shiftKey) {
			//If Alt+Shift is pressed, move all the way down
			MoveHistory(impPos, 4)
		} else {
			//If just Alt is pressed, Move up
			MoveHistory(impPos, 2)
		}
		//If just Shift is pressed, find matches
	} else if (impEvent.shiftKey) {
		LoadEntry(impPos + 1, true)
	} else {
		//If no key is pressed, simply place in field
		LoadEntry(impPos + 1)
	}
}
function Click_Match(impPos, impEvent) {
	if (impEvent.ctrlKey) {
		if (impEvent.altKey) {
			//If Ctrl+Alt is pressed, delete from History
			RemoveHistory(impPos, historyMatched, false)
		} else if (impEvent.shiftKey) {
			//If Ctrl+Shift is pressed, move all the way up
			MoveHistory(impPos, 3, historyMatched)
		} else {
			//If just Ctrl is pressed, Move up
			MoveHistory(impPos, 1, historyMatched)
		}
		//If just Alt is pressed, Move down
	} else if (impEvent.altKey) {
		if (impEvent.shiftKey) {
			//If Alt+Shift is pressed, move all the way down
			MoveHistory(impPos, 4, historyMatched)
		} else {
			//If just Alt is pressed, Move up
			MoveHistory(impPos, 2, historyMatched)
		}
		//If just Shift is pressed, find matches
	} else if (impEvent.shiftKey) {
		LoadEntry(impPos + 1, true, false, historyMatched)
	} else {
		//If no key is pressed, simply place in field
		LoadEntry(impPos + 1, false, false, historyMatched)
	}
}

function navHistTable(impEvent) {
	//If the user hits Enter, Up, or Delete while in the Entry field, run the associated function
	let histPlace, aText
	let scanArr = []
	let tVal = EntryValue()
	let phraseArr = tVal.split(" ")

	switch (impEvent.keyCode) {
		case 13: //Enter

			//If Enter and Shift are pressed
			if (impEvent.shiftKey) {

				//Just Enter and Shift
				if (EntryValue() == "") {
					matchAllHistory()
				} else {
					matchActive()
				}

			//If Enter and Ctrl are pressed
			} else if (impEvent.ctrlKey) {
				Build_HistoryTable()

			//If Enter and Alt are pressed
			} else if (impEvent.altKey) {

				if (phraseArr.length == 1 && TablesEnabled == true && AllNumbers(phraseArr)) {
					LoadEntry(NumberToText(phraseArr[0]))

				} else if (phraseArr.length == 1 && TablesEnabled == true && CouldBeDate(phraseArr[0])) {
					LoadEntry(DateToText(phraseArr[0]))

				} else {
					if (phraseArr.length < 6) {
						for (let x = phraseArr.length - 1; x > -1; x--) {
							//LoadEntry(phraseArr[x])
							newHistory(phraseArr[x])
						}
						LoadEntry(tVal)
					} else {
						newHistory(tVal)
					}
				}

			//If just Enter is pressed
			} else {
				newHistory(tVal)
			}
		break;

		case 38: //Up arrow
			switch (activeType) {
				case "history": scanArr = userHistory[activeTable]; break;
				case "match": scanArr = historyMatched; break;
				case "database": scanArr = dbMatched; break;
			}
			if (scanArr.length == 0) {return}

			histPlace = HistoryPlace()

			if (impEvent.shiftKey) {
				//If Ctrl, Shift, and Up are pressed
				if (impEvent.ctrlKey) {
					if (histPlace > -1) {MoveHistory(histPlace, 3, scanArr)} else {LoadEntry(scanArr[0].phrase, false, false, scanArr)}
				//If Shift and Up are pressed
				} else {
					if (histPlace > -1) {MoveHistory(histPlace, 1, scanArr)} else {LoadEntry(scanArr[0].phrase, false, false, scanArr)}
				}
			//If Ctrl and Up are pressed
			} else if (impEvent.ctrlKey) {
				LoadEntry(scanArr[0].phrase)
			//If just Up is pressed
			} else {x = Math.max(histPlace - 1, 0); LoadEntry(scanArr[x].phrase)}
		break;

		case 40: //Down arrow
			switch (activeType) {
				case "history": scanArr = userHistory[activeTable]; break;
				case "match": scanArr = historyMatched; break;
				case "database": scanArr = dbMatched; break;
			}
			if (scanArr.length == 0) {return}

			histPlace = HistoryPlace()

			if (impEvent.shiftKey) {
				//If Ctrl, Shift, and Down are pressed
				if (impEvent.ctrlKey) {
					if (histPlace > -1) {MoveHistory(histPlace, 4, scanArr)} else {LoadEntry(scanArr[scanArr.length].phrase, false, false, scanArr)}
				//If Shift and Down are pressed
				} else {
					if (histPlace > -1) {MoveHistory(histPlace, 2, scanArr)} else {LoadEntry(scanArr[scanArr.length].phrase, false, false, scanArr)}
				}
			//If Ctrl and Down are pressed
			} else if (impEvent.ctrlKey) {
				LoadEntry(scanArr[scanArr.length - 1].phrase)
			//If just Down is pressed
			} else {x = Math.min(histPlace + 1, scanArr.length - 1); LoadEntry(scanArr[x].phrase, false, false, scanArr)}
		break;

		case 46: //Delete
			switch (activeType) {
				case "history": scanArr = userHistory[activeTable]; break;
				case "match": scanArr = historyMatched; break;
				case "database": scanArr = dbMatched; break;
			}
			if (scanArr.length == 0) {return}

			if (impEvent.shiftKey) {
				histPlace = HistoryPlace(tVal)
				if (histPlace > -1)  {
					RemoveHistory(histPlace, scanArr)
					LoadEntry("")
				}
			} else if (impEvent.ctrlKey) {
				if (activeType == "match" || activeType == "database") {return}

				if (userHistory[activeTable].length == 1) {aText = "item"} else {aText = "items"}
				if (activeTable == userHistory.length - 2) {
					alert("Full deletion of History Table currently disabled.")
				} else {
					if (confirm("This will delete all the history in your selected table (" + userHistory[activeTable].length + " " + aText + "). Are you sure you wish to continue?") == true) {
						userHistory[activeTable] = []
						Delete_TableDB(activeTable)
						Build_HistoryTable()
					}
				}
			}
		break;
	}
}

function newHistory(impPhrase, impTable = activeTable) {
	//Adds the imported phrase as a new HistoryItem object
	let newHist, findTemp, findHistory, findSaved
	let phraseArr = impPhrase.split(" "), addHist = false

	//Trim impPhrase and return the function if there's nothing left
	impPhrase = TrimToHistory(impPhrase)
	if (impPhrase.length == 0) {return}	

	//If the imported phrase is entirely numeric, instead match the numbers to the existing History array
	if (AllNumbers(phraseArr) == true) {matchActive(); return}

	//Build variables that find if phrase already exists
	findTemp = IsInTemp(impPhrase)
	findHistory = IsInHistory(impPhrase)
	findSaved = IsInSaveTables(impPhrase)

	//If the user is in a Saved Table that's at its maximum...
	if (impTable < userHistory.length -2 && userHistory[impTable].length >= maxHistory && optArr.AlwaysOverwrite == false) {
		//...and if the phrase is not already in the table that's being added to, ask for confirmation
		if (findSaved !== -1) {
			if (findSaved[1] !== impTable) {
				if (confirm("Maximum " + maxHistory + " items already added. Remove last item and add this one?") == false) {
					return
				}
			}
		}
	}

	//Set the History object with impPhrase
	if (findSaved !== -1) {
		newHist = userHistory[findSaved[1]][findSaved[0]]
	} else if (findHistory !== -1) {
		newHist = userHistory[userHistory.length - 2][findHistory]
	} else if (findTemp !== -1) {
		newHist = userHistory[userHistory.length - 1][findTemp]
	} else {
		newHist = new HistoryItem(impPhrase)
		SubmitToDB(newHist, impTable)
	}

	//If the active table is a Saved Table, transfer any existing phrases to the new one
	if (impTable < userHistory.length - 2) {

		if (findSaved !== -1) {
			TransferHistory(findSaved[0], impTable + 1, findSaved[1])
		} else if (findHistory !== -1) {
			TransferHistory(findHistory, impTable + 1, userHistory.length - 2)
		} else {
			addHist = true
		}

	} else if (impTable == userHistory.length - 2) {
	} else if (impTable == userHistory.length - 1) {
		if (findTemp > -1) {userHistory[userHistory.length - 1].splice(findTemp, 1)}
		addHist = true
	}

	if (addHist == true) {
		userHistory[impTable].unshift(newHist)
	}

	//If the phrase is in the History table, first remove it
	//Add the phrase to the beginning of the History table and trim it if necessary
	if (findHistory > -1) {userHistory[userHistory.length - 2].splice(findHistory, 1)}
	if (HistoryEnabled == true) {userHistory[userHistory.length - 2].unshift(newHist)}

	while (userHistory[userHistory.length - 2].length > maxHistory) {
		userHistory[userHistory.length - 2].pop()
	}
	while (userHistory[impTable].length > maxHistory) {
		userHistory[impTable].pop()
	}

	Build_HistoryTable()
}

function IsInTemp(impPhrase) {
	//Returns the position of the entered phrase in the Session Table, -1 if not there
	let tempTable = userHistory[userHistory.length - 1]
	for (let x = 0; x < tempTable.length; x++) {
		if (tempTable[x].phrase == impPhrase) {
			return x
		}
	}
	return -1
}
function IsInHistory(impPhrase) {
	//Returns the position of the entered phrase in the History Table, -1 if not there
	impPhrase = TrimToHistory(impPhrase)
	let tempTable = userHistory[userHistory.length - 2]
	for (let x = 0; x < tempTable.length; x++) {
		if (tempTable[x].phrase == impPhrase) {
			return x
		}
	}
	return -1
}
function IsInSaveTables(impPhrase) {
	//Returns an array with the position of the entered phrase in the User Tables, -1 if not there
	for (let x = 0; x < userHistory.length - 2; x++) {
		for (let y = 0; y < userHistory[x].length; y++) {
			if (userHistory[x][y].phrase == impPhrase) {
				return [y, x]
			}
		}
	}
	return -1
}
function HistoryPlace(impPhrase = EntryValue()) {
	//Finds the imported phrase in "only" the active History table
	let scanArr = []

	switch (activeType) {
		case "history":
			scanArr = userHistory[activeTable]; break;
		case "match":
			scanArr = historyMatched; break;
		case "database":
			scanArr = dbMatched; break;
	}

	let x
	impPhrase = TrimToHistory(impPhrase)
	for (x = 0; x < scanArr.length; x++) {
		if (scanArr[x].phrase == impPhrase) {
			return x
		}
	}
	return -1
}

function RemoveHistory(impNum, impTable = userHistory[activeTable], impBool = true) {
	let delRow

	//If a phrase was used to call this function, find it in the History table and remove it
	if (isNaN(impNum)) {
		for (let x = 0; x < impTable.length; x++) {
			if (impTable[x].phrase == impNum) {
				delRow = x
				break;
			}
		}
	//If a number was used, simply remove that item
	} else {
		delRow = impNum
	}

	//Remove the item from the History DB and remove it from the JS array
	if (parseInt(impTable[delRow].phraseID) > -1 && impBool == true) {
		Delete_HistoryDB(impTable[delRow].phraseID)
	}
	impTable.splice(delRow, 1)
	
	//If the item is being deleted from a Match table, reorganize the results and build the appropriate table
	if (impTable == historyMatched) {
		if (historyNumeric == true) {
			SlimNumMatches()
		} else {
			RerankMatches()
		}
		Build_MatchTable(currPage)
	} else if (impTable == dbMatched) {
		Build_DatabaseMatches()
	} else {
		if (impTable.length <= currPage * optArr.HistoryPerPage) {currPage--}
		Build_HistoryTable(currPage)
	}
}
function RemoveMatched(impNum) {
	let numWiped = historyMatched.length - impNum - 1
	historyMatched.splice(impNum + 1, numWiped)
	if (historyNumeric == true) {
		SlimNumMatches()
	} else {
		RerankMatches()
	}
	Build_MatchTable()
}
function RemoveSession(impNum) {
	if (confirm("Remove all items under '" + userHistory[userHistory.length - 1][impNum].phrase + "' from Session table?") == false) {
		return
	}
	let numWiped = userHistory[userHistory.length - 1].length - impNum - 1
	userHistory[userHistory.length - 1].splice(impNum + 1, numWiped)
	Build_HistoryTable()
}
function Delete_HistoryDB(impID) {
	let xhttp = new XMLHttpRequest();
	let respText, sendTable, retArr

	//Deletes item from the HistoryDB
	xhttp.open("POST", "tools/calculator-advanced/php/deletefromhistory.php?phraseid=" + impID, true);
	xhttp.send();
	
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
		}
	}
}
function Delete_TableDB(impTable) {
	let xhttp = new XMLHttpRequest();
	let respText, sendTable, retArr

	//Deletes an entire history table from the History DB
	xhttp.open("POST", "tools/calculator-advanced/php/deletehistorytable.php?table=" + impTable, true);
	xhttp.send();
	
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
		}
	}
}

function MoveHistory(impNum, impType, impTable = userHistory[activeTable]) {
	//Moves an item in the active History array up or down
	//If a phrase was used to call this function, find it in the active table, otherwise simply use the number
	let saveSpot
	if (isNaN(impNum)) {
		for (let x = 0; x < impTable.length; x++) {
			if (impTable[x].phrase == impNum) {
				saveSpot = x
				break;
			}
		}
	} else {
		saveSpot = impNum
	}

	//Assign the history item being removed as a variable
	let saveHistory = impTable[saveSpot]

	//impType 1 moves the item up, impType2 moves the item down, impType3 moves it all the way to the top, impType4 moves it all the way to the bottom
	if (impType == 1) {
		if (saveSpot > 0) {
			impTable.splice(saveSpot, 1)
			impTable.splice(saveSpot - 1, 0, saveHistory)
		}
	} else if (impType == 2) {
		if (saveSpot < impTable.length) {
			impTable.splice(saveSpot, 1)
			impTable.splice(saveSpot + 1, 0, saveHistory)
		}
	} else if (impType == 3) {
		impTable.splice(saveSpot, 1)
		impTable.splice(0, 0, saveHistory)
	} else if (impType == 4) {
		impTable.splice(saveSpot, 1)
		impTable.splice(impTable.length, 0, saveHistory)
	}
	
	//Build the appropriate table
	if (impTable == historyMatched) {
		Build_MatchTable(currPage)
	} else if (impTable == dbMatched) {
		Build_DatabaseMatches()
	} else {
		Build_HistoryTable(currPage)
	}
}

function TransferHistory(impSpot, newTable, oldTable = activeTable, impMod = 0) {
	let saveItem
	let destTable = userHistory[newTable - 1]
	let eVal = TrimToHistory(EntryValue())

	if (destTable.length > (maxHistory - 1)) {
		alert("Maximum 500 items already in Table " + newTable)
	} else {

		//If a Matched table is open, set the saveItem as a History object
		if (impMod == 1) {
			saveItem = historyMatched[impSpot]
		} else if (impMod == 2) {
			saveItem = new HistoryItem(dbMatched[impSpot].phrase)
			Calc_AllGem(eVal)
		} else {
			saveItem = userHistory[oldTable][impSpot]
		}

		//Add the item into the new selected table and remove it from the old one
		if (newTable < userHistory.length - 1) {
			findSaved = IsInSaveTables(saveItem.phrase)
			if (findSaved !== -1) {
				userHistory[findSaved[1]].splice(findSaved[0], 1)
			}
		}
		destTable.unshift(saveItem)

		if (saveItem.phraseID == -1) {
			SubmitToDB(saveItem, newTable - 1)
		} else {
			if (newTable - 1 !== oldTable) {Update_HistoryDB(saveItem.phraseID, newTable - 1)}
		}

		//Rebuild the active table
		if (impMod == 1) {
			Build_MatchTable(currPage)
		} else if (impMod == 2) {
			Build_DatabaseMatches()
		} else {

			if (oldTable.length <= currPage * optArr.HistoryPerPage) {currPage--}
			Build_HistoryTable(currPage)
		}
	}
}
function Update_HistoryDB(impID, impTable) {
	//Updates which table a user's history item is in
	let saveTable
	let xhttp = new XMLHttpRequest()
	let respText, sendTable, retArr

	//Save to History table if Session table is active
	if (impTable > 4) {saveTable = 4} else {saveTable = impTable}

	xhttp.open("POST", "tools/calculator-advanced/php/updatehistory.php?phraseid=" + impID + "&table=" + saveTable, true);
	xhttp.send();
	
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
		}
	}
}

function LoadEntry(impPos, impSearch = false, impNum = false, impTable = userHistory[activeTable]) {
	let eBox = document.getElementById("EntryField")

	//If impPos is not a number, drop it into the Entry Field. If it is a number, find the item in the active History table and populate the phrase
	if (isNaN(impPos) || impPos == "" || impNum == true) {
		eBox.value = impPos
	} else {
		eBox.value = impTable[impPos - 1].phrase
	}

	//"True" is sent here when the user clicks "Find Matches" from the History dropdown
	FieldChange()
	if (impSearch == true) {
		matchActive()
	}
	if (impNum == false) {eBox.focus(); eBox.selectionStart = eBox.selectionEnd = eBox.value.length}
}
function LoadTop() {
	//Loads the top item from the active History table into the Entry Field
	const eBox = document.getElementById("EntryField")
	if (userHistory[activeTable].length > 0) {eBox.value = userHistory[activeTable][0].phrase} else {eBox.value = ""}
	eBox.select()
}

function ChunkToSession(impX) {
	let hTable = userHistory[userHistory.length - 2]
	let sTable = userHistory[userHistory.length - 1]

	if (maxHistory - sTable.length - (impX + 1) < 0) {
		alert("Cannot add a chunk this large to Session View. Try fewer items.")
		return
	}

	for (let x = impX; x > -1; x--) {
		if (IsInTemp(hTable[x].phrase) == -1) {
			sTable.unshift(hTable[x])
		}
	}

	activeTable = userHistory.length - 1
	Build_HistoryTable()
}

function TrimToHistory(impPhrase) {
	//Takes the imported phrase and eliminates all the non-numeric and non-character characters
	let thisChar
	let expPhrase = ""
	let acceptArr = charArr.concat(capArr)

	if (impPhrase == undefined || impPhrase == "") {return ""}

	if (optArr.RemoveDiacritics) {impPhrase = impPhrase.normalize("NFD").replace(/[\u0300-\u036f]/g, "")}

	for (x = 0; x < impPhrase.length; x++) {
		thisChar = String(impPhrase.substring(x, x + 1))
		if (acceptArr.includes(thisChar.charCodeAt(0)) || numArr.includes(String(thisChar))) {
			expPhrase += thisChar
		} else if (ignArr.includes(thisChar) == false && expPhrase.substring(expPhrase.length - 1, expPhrase.length) !== " ") {
			if (thisChar.charCodeAt(0) > 1450 && thisChar.charCodeAt(0) < 1488) {continue;}
			expPhrase += " "
		}
	}

	if (expPhrase.substring(expPhrase.length - 1) == " ") {expPhrase = expPhrase.substring(0, expPhrase.length - 1)}
	return expPhrase
}

function CouldBeDate(impVal) {
	const thisArr = impVal.split("/")

	if (thisArr.length == 2 && AllNumbers(thisArr)) {
		const thisMonth = parseInt(thisArr[0]); parseInt(thisDate = thisArr[1])
		if (thisMonth > 0 && thisMonth < 13) {
			if (thisDate > 0 && thisDate <= MonthMax(thisMonth)) {
				return true
			}
		}
	}

	return false
}
function MonthMax(mn) {
	//This function determines what the last day of any month is based on the month and year
	switch (mn) {
		case 1:
			return 31
			break;
		case 2:
			/*if (((yr % 4 == 0) && (yr % 100 != 0)) || (yr % 400 == 0)) {
				return 29
			} else {
				return 28
			}*/
			return 29
			break;
		case 3:
			return 31
			break;
		case 4:
			return 30
			break;
		case 5:
			return 31
			break;
		case 6:
			return 30
			break;
		case 7:
			return 31
			break;
		case 8:
			return 31
			break;
		case 9:
			return 30
			break;
		case 10:
			return 31
			break;
		case 11:
			return 30
			break;
		case 12:
			return 31
			break;
	}
}

function historySorter(a, b) {
	//Special sort function for sorting history matches by strength
    if (a.matchStrength === b.matchStrength) {
        return 0;
    }
    else {
        return (a.matchStrength > b.matchStrength) ? -1 : 1;
    }
}

function UpdateOnArr() {
	//Re-creates each history item's onArr values based on which ciphers are now on
	let thisHist, numAdd, cipherSpot

	for (let z = 0; z < userHistory.length; z++) {
		for (let x = 0; x < userHistory[z].length; x++) {
			thisHist = userHistory[z][x]
			thisHist.onArr = []
			for (let y = 0; y < allCiphers.length; y++) {
				if (allCiphers[y].isOn == true) {
					cipherSpot = thisHist.ciphArr.indexOf(allCiphers[y].Nickname)
					thisHist.onArr.push(thisHist.gemArr[cipherSpot])
				} else {
					thisHist.onArr.push("")
				}
			}
		}
	}
}

function SubmitToDB(impHist, impTable = activeTable) {
	//Default to remove diacritics for databsae submission
	let impPhrase = impHist.phrase.normalize("NFD").replace(/[\u0300-\u036f]/g, "")

	//If the phrase has any numbers, has fewer than three calculated characters,
	//or has already been added, don't submit it
	if (calcLanguage !== "english" || QualifySubmission(impPhrase) == false || impHist.submitted) {return}
	impPhrase = impPhrase.replaceAll(" ", "_")
	let xhttp = new XMLHttpRequest();
	let respText, sendTable, retArr, mainDB

	//Save to History table if Session table is active
	if (impTable > 4) {sendTable = 4} else {sendTable = impTable}
	if (optArr.MatchContribute) {mainDB = 1} else {mainDB = 0}

	xhttp.open("POST", "tools/calculator-advanced/php/updatematchdb.php?phrase=" + impPhrase + "&table=" + sendTable + "&submit=" + mainDB, true);
	xhttp.send();
	impHist.submitted = true
	
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			if (xhttp.responseText !== "") {
				retArr = xhttp.responseText.split("-")
				if (retArr[0] == "PhraseID") {impHist.phraseID = retArr[1]}
			}
		}
	}
}

function QualifySubmission(impPhrase) {
	//If the phrase has any numbers, or has fewer than 3 calculated characters, return false
	let thisChar, lastChar
	let charCount = 0, consecutiveChar = 0
	let expPhrase = ""

	//If any character in the phrase appears more than twice in a row, automatically disqualify it
	//This prevents the user from unveiling certain scripts
	for (let x = 0; x < impPhrase.length; x++) {
		thisChar = impPhrase.substring(x, x + 1)
		if (thisChar == lastChar) {
			consecutiveChar++
			if (consecutiveChar == 3) {
				return false
			}
		} else {
			consecutiveChar = 0
		}
		if (numArr.indexOf(thisChar) > -1) {
			return false
		} else if (thisChar !== " ") {
			charCount++
		}
		lastChar = thisChar
	}
	//Only submit phrases between 3 and 50 characters long
	if (charCount > 2 && charCount < 51) {return true} else {return false}
}

function Change_History(impNum) {
	//Change the active history array and re-build the table
	activeTable = impNum
	document.getElementById("UserBox" + impNum).checked = true
	Update_WhichHistory()
	Build_HistoryTable()
}

function Get_History(impNum) {
	//Build a text string of phrases for each item in the selected history array
	expArr = []
	for (let x = 0; x < userHistory[impNum].length; x++) {
		thisPhrase = userHistory[impNum][x].phrase
		if (thisPhrase.search("'") + thisPhrase.search('"') > -2) {
			thisPhrase = thisPhrase.replaceAll("'", "")
			thisPhrase = thisPhrase.replaceAll('"', '')
		}
		if (thisPhrase.length < 101) {expArr.push(thisPhrase)}
	}
	return expArr.join("|")
}

function Update_WhichHistory() {
	//Runs after the user selects a checkbox in User Tables
	for (let x = 0; x < userHistory.length; x++) {
		if (!document.getElementById("UserBox" + x)) {
			optArr.HistoryOn[x] = false
		} else {
			if (document.getElementById("UserBox" + x).checked == true) {
				optArr.HistoryOn[x] = true
			} else {
				optArr.HistoryOn[x] = false
			}
		}
	}
}

function Rename_History(impNum) {
	let histName = optArr.HistoryNames[impNum]
	let userText = prompt("Change name from " + histName + " to:", histName)
	if (userText == "") {return}
	
	userText = TrimToHistory(userText)

	//When the user clicks the active table link, offer a prompt to rename it
	if (userText.length < 3 || userText.length > 20) {
		alert("Name must be between 3 and 20 characters long.")
		return
	} else {
		for (let x = 0; x < optArr.HistoryNames.length; x++) {
			if (x !== impNum && userText == optArr.HistoryNames[x]) {
				alert("Name '" + userText + "' already in use.")
				return
			}
		}
		optArr.HistoryNames[impNum] = userText
		Update_HistoryNames()
	}

	Build_CustomLists()
}

function Update_HistoryNames() {
	//Sends a text string of the History table names to the Options table
    let qText = "tools/calculator-advanced/php/updatehistorynames.php?names=" + optArr.HistoryNames.join("|")

    let xhttp = new XMLHttpRequest();
    let respText

    xhttp.open("POST", qText, true);
    xhttp.send();
    
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            //
        }
    }
}