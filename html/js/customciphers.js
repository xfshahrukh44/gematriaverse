var charArr = [], capArr = []
var allCiphers = []
var activeCipher
var activeArray
var numArr = ["48", "49", "50", "51", "52", "53", "54", "55", "56", "57"]
var rootDir = "tools/custom-ciphers/php"
var CiphersLoaded = false

class cipher {
	constructor(impName, impVals, capVals, impR, impG, impB, impID) {
		//Sets default values based on the imported variables
		let x

		this.Nickname = impName.replaceAll("_", " ")
		this.RGB = [impR, impG, impB]
		this.vArr = impVals.split("_")
		this.vArr.push(...capVals.split("_"))
		this.cipherID = impID

		//If "Alphanumeric" is in the cipher name, set the cipher type as such
		if (this.Nickname.search("Alphanumeric") > -1) {
			this.cipherType = "alphanumeric"
		} else {
			for (x = 0; x < this.vArr.length; x++) {
				if (this.vArr[x] > 10 && ReduceNum(this.vArr[x], true, true) == false) {
					this.cipherType = "normal"
					break;
				}
				this.cipherType = "reduction"
			}
		}
	}
}

//----------------------------------------------------------------------------------------------------
//Page functions
function List_Ciphers() {
	let rText = "", thisCipher
	const cSpot = document.getElementById("CipherMenu")
	activeCipher = undefined; activeArray = undefined

	//Cycle through each loaded cipher and list 
	for (let x = 0; x < allCiphers.length; x++) {
		if (x < maxCiphers) {classStr = "CipherSelection ActiveCipher"} else {classStr = "CipherSelection"}
		thisCipher = allCiphers[x]

		rText += '<div class="' + classStr + '">' + thisCipher.Nickname + " - "
		rText += '<a href="javascript:Prioritize_Cipher(' + x + ')">Move Up</a> - '
		rText += '<a href="javascript:Edit_Cipher(' + x + ')">Edit</a> - '
		rText += '<a href="javascript:Delete_Cipher(' + x + ')">Remove</a></div>'
	}

	rText += '<div class="CipherSelection"><button class="buttonFunction" onclick="javascript:New_Cipher()">Create New</button></div>'

	cSpot.innerHTML = rText
	document.getElementById("ButtonSpot").innerHTML = ""
	initBuild = true
}

function Build_CharTable(impCaps = true) {
	const cSpot = document.getElementById("CipherMenu")
	const halfChar = Math.ceil(charArr.length / 2)
	let rText = "", cType = ""

	rText += '<div id="cipherName"><span>Name your custom cipher below:</span></div>'
	rText += '<input class="u_Inp" id="NameField" oninput="javascript:Verify_CipherName()" maxlength=25></input><br>'
	rText += '<table id="MainTable"><tr id="lower1">'

	//Cycle through half of charArr and build the table cells
	for (let x = 0; x < halfChar; x++) {
		rText += '<td class="LetterBox">' + String.fromCharCode(charArr[x]) + '<BR>'
		rText += '<input oninput="javascript:Define_ActiveArray()" class="CharBox" id="CharBox' + x + '" type="number" min="0" max="9999"></td>'
	}
	rText += '</tr><tr id="lower2">'

	//Cycle through the second half of charArr and build the table cells
	for (let y = halfChar; y < charArr.length; y++) {
		rText += '<td class="LetterBox">' + String.fromCharCode(charArr[y]) + '<BR>'
		rText += '<input oninput="javascript:Define_ActiveArray()" class="CharBox" id="CharBox' + y + '" type="number" min="0" max="9999"></td>'
	}
	rText += '</tr>'

	//Create checkbox for capital values
	if (impCaps == true) {cType = " checked"}
	rText += '<tr><td colspan="' + halfChar + '">'
	rText += '<div id="uniqueCapsText"><input id="Cap_Check" type="checkbox" value="CapsOn" onclick="Check_CapBox()"' + cType + '>&nbsp; Unique Capital Values</input></td></tr></div>'

	//If impCaps is set to true, perform the same function for capArr
	if (impCaps == true) {
		rText += '<tr id="caps1">'
		for (let x = 0; x < halfChar; x++) {
			rText += '<td class="LetterBoxCaps">' + String.fromCharCode(capArr[x]) + '<BR>'
			rText += '<input oninput="javascript:Define_ActiveArray()" class="CharBox" id="CapBox' + x + '" type="number" min="0" max="9999"></td>'
		}
		rText += '</tr><tr id="caps2">'
		for (let y = halfChar; y < charArr.length; y++) {
			rText += '<td class="LetterBoxCaps">' + String.fromCharCode(capArr[y]) + '<BR>'
			rText += '<input oninput="javascript:Define_ActiveArray()" class="CharBox" id="CapBox' + y + '" type="number" min="0" max="9999"></td>'
		}
		rText += '</tr>'
	} else {
		rText += '<tr id="caps1">'
		for (let x = 0; x < halfChar; x++) {
			rText += '<td class="LetterBoxCaps">' + String.fromCharCode(capArr[x]) + '<BR>'
			rText += '<input oninput="javascript:Define_ActiveArray()" class="CharBox" id="CapBox' + x + '" type="number" min="0" max="9999" disabled></td>'
		}
		rText += '</tr><tr id="caps2">'
		for (let y = halfChar; y < charArr.length; y++) {
			rText += '<td class="LetterBoxCaps">' + String.fromCharCode(capArr[y]) + '<BR>'
			rText += '<input oninput="javascript:Define_ActiveArray()" class="CharBox" id="CapBox' + y + '" type="number" min="0" max="9999" disabled></td>'
		}
		rText += '</tr>'
	}

	rText += '<tr><td colspan="' + halfChar + '"><div id="colorSection"><span id="rgbText">Color of Cipher (in RGB): </span>'
	rText += '<input class="ColorBox" id="RedBox" oninput="javascript:Change_Color()" type="number" min="0" max="255" value="255"></input>&nbsp&nbsp&nbsp'
	rText += '<input class="ColorBox" id="GreenBox" oninput="javascript:Change_Color()" type="number" min="0" max="255" value="255"></input>&nbsp&nbsp&nbsp'
	rText += '<input class="ColorBox" id="BlueBox" oninput="javascript:Change_Color()" type="number" min="0" max="255" value="255"></input>&nbsp&nbsp&nbsp'
	rText += '<div id="ColorDiv"><br class="mo"><br class="mo">Cipher Color</div></div></td></tr>'

	rText += '</table>'

	cSpot.innerHTML = rText
}
function Pop_CharTable() {
	let cBox

	//Cycle through each item in the activeCipher's charArr and populate the corresponding cell in the table
	for (let x = 0; x < charArr.length; x++) {
		charBox = document.getElementById("CharBox" + x)
		charBox.value = activeArray[x]
	}

	for (let y = 0; y < capArr.length; y++) {
		capBox = document.getElementById("CapBox" + y)
		capBox.value = activeArray[y + charArr.length]
	}
}
function Pop_Details() {
	document.getElementById("NameField").value = activeCipher.Nickname
	document.getElementById("RedBox").value = activeCipher.RGB[0]
	document.getElementById("GreenBox").value = activeCipher.RGB[1]
	document.getElementById("BlueBox").value = activeCipher.RGB[2]
	Change_Color()
}

function Build_Button(impType) {
	const bSpot = document.getElementById("ButtonSpot")
	let rText = ""

	switch (impType) {
		case 1:
			rText += '<button class="buttonFunction" onclick="Send_NewCipher()" value="AddCipher">Add Cipher</button>'
			break;
		case 2:
			rText += '<button class="buttonFunction" onclick="Update_Cipher()" value="UpdateCipher">Update Cipher</button>'
			break;
	}

	rText += '&nbsp&nbsp&nbsp<button class="buttonFunction" onclick="List_Ciphers()" value="CancelCipher">Cancel</button>'

	bSpot.innerHTML = rText
}

function New_Cipher() {
	document.getElementById("ConfirmDiv").innerHTML = ""
	Build_CharTable(false)
	Create_BlankArray()
	Pop_CharTable()
	Change_Color()
	Build_Button(1)
}
function Edit_Cipher(impX) {
	document.getElementById("ConfirmDiv").innerHTML = ""
	let uniqueCaps = false

	activeCipher = allCiphers[impX]
	activeArray = activeCipher.vArr

	for (let x = 0; x < charArr.length; x++) {
		if (activeArray[x] !== activeArray[x + charArr.length]) {
			uniqueCaps = true; break;
		}
	}

	Build_CharTable(uniqueCaps)
	Pop_CharTable()
	Pop_Details()
	Build_Button(2)
}

function Define_ActiveArray() {
	const cCheck = document.getElementById("Cap_Check").checked
	let thisBox

	for (let x = 0; x < charArr.length; x++) {
		thisBox = document.getElementById("CharBox" + x)
		activeArray[x] = parseInt(thisBox.value)
	}

	if (cCheck == true) {
		for (let y = 0; y < capArr.length; y++) {
			thisBox = document.getElementById("CapBox" + y)
			activeArray[y + charArr.length] = parseInt(thisBox.value)
		}
	} else {
		for (let y = 0; y < capArr.length; y++) {
			thisBox = document.getElementById("CapBox" + y)
			thisBox.value = activeArray[y]
		}
	}
}

function Check_CapBox() {
	let capsOn, thisBox
	let caps = document.getElementById("caps1");
	if (document.getElementById("Cap_Check").checked) {
		capsOn = true; 
		document.getElementById("caps1").style.display = "block"; 
		document.getElementById("caps2").style.display = "block";} 
	else {
		capsOn == false;
		document.getElementById("caps1").style.display = "none";
		document.getElementById("caps2").style.display = "none";}

	if (capsOn == true) {
		for (let x = 0; x < capArr.length; x++) {
			thisBox = document.getElementById("CapBox" + x)
			thisBox.disabled = false
			thisBox.value = activeArray[x + charArr.length]
		}
	} else {
		for (let x = 0; x < capArr.length; x++) {
			thisBox = document.getElementById("CapBox" + x)
			thisBox.value = activeArray[x]
			thisBox.disabled = true
		}
	}
}

function Change_Color() {
	const dBox = document.getElementById("ColorDiv")
	const rgbArr = ColorArray()
	dBox.style.color = 'RGB(' + rgbArr[0] + ', ' + rgbArr[1] + ', ' + rgbArr[2] + ')'
}

function DataSubmission() {
	document.getElementById("CipherMenu").innerHTML = ""
	document.getElementById("ButtonSpot").innerHTML = ""
	cSpot = document.getElementById("ConfirmDiv")
	cSpot.innerHTML = '<h2><font color="lightblue">Submitting data...</font></h2>'
}
function ConfirmSubmission(impText, impBool) {
	let hText
	
	if (impBool == 1) {
		hText = '<h5><font color="green">'
	} else if (impBool == 2) {
		hText = '<h4><font color="red">'
	}

	hText += impText
	hText += '</font></h>'

	document.getElementById("ConfirmDiv").innerHTML = hText
}

//----------------------------------------------------------------------------------------------------
//PHP Calls
function Load_Ciphers() {
	//Queries the SQL database for Cipher data
	let resArr, tArr
	let xhttp = new XMLHttpRequest();

	xhttp.open("GET", rootDir + "/pullcustoms.php");
	xhttp.send();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			//Split the returned text into smaller items in an array
			resArr = xhttp.responseText.split("|");
			charArr = resArr[0].split("_");
			capArr = resArr[1].split("_");
			for (x = 2; x < resArr.length; x++) {
				//Split each item in the array into a smaller array and create a new cipher object, adding it to allCiphers
				tArr = resArr[x].split("-")
				allCiphers[allCiphers.length] = new cipher(tArr[0], tArr[1], tArr[2], tArr[3], tArr[4], tArr[5], tArr[6])
			}
			CiphersLoaded = true
		}
	}
}

function Send_NewCipher() {
	let letterString = "", capString = ""
	const thisName = document.getElementById("NameField").value
	const thisNameUnder = thisName.replaceAll(" ", "_").trim()

	if (CipherNameExists(thisNameUnder) > 0) {
		alert('Cipher name ' + thisName + ' already exists.')
		return
	}

	const cCheck = document.getElementById("Cap_Check").checked
	const halfCount = Math.ceil(activeArray.length / 2)
	const rgbArr = ColorArray()

	for (let x = 0; x < halfCount; x++) {
		if (x > 0) {letterString += "_"; capString += "_"}
		letterString += activeArray[x]
		if (cCheck == true) {
			capString += activeArray[x + halfCount]
		} else {
			capString += activeArray[x]
		}
	}

	DataSubmission()

	let xhttp = new XMLHttpRequest();
	xhttp.open("POST", rootDir + "/newcipher.php?name=" + thisNameUnder + "&letters=" + letterString + "&caps=" + capString + "&red=" + rgbArr[0] + "&green=" + rgbArr[1] + "&blue=" + rgbArr[2]);
	xhttp.send();
	xhttp.onreadystatechange = function() {

		if (this.readyState == 4 && this.status == 200) {
			let respArr = xhttp.responseText.split("-")
			if (respArr[0] == "Success") {
				let newCipher = new cipher(thisNameUnder, letterString, capString, rgbArr[0], rgbArr[1], rgbArr[2], respArr[1])
				allCiphers.unshift(newCipher)
				ConfirmSubmission('Cipher "' + thisName + '" has been created!', 1)
				List_Ciphers()
			} else {
				alert('There was an error when attempting to create cipher "' + thisName + '".')
			}
		}
	}
}

function Update_Cipher() {
	let letterString = "", capString = ""
	const thisName = document.getElementById("NameField").value
	const thisNameUnder = thisName.replaceAll(" ", "_").trim()

	if (CipherNameExists(thisNameUnder) > 1) {
		alert('Cipher name ' + thisName + ' already exists.')
		return
	}

	const cCheck = document.getElementById("Cap_Check").checked
	const halfCount = Math.ceil(activeArray.length / 2)
	const rgbArr = ColorArray()
	const newNick = document.getElementById("NameField").value

	for (let x = 0; x < halfCount; x++) {
		if (x > 0) {letterString += "_"; capString += "_"}
		letterString += activeArray[x]
		if (cCheck == true) {
			capString += activeArray[x + halfCount]
		} else {
			capString += activeArray[x]
		}
	}

	DataSubmission()

	let xhttp = new XMLHttpRequest();
	xhttp.open("POST", rootDir + "/updatecipher.php?cipherid=" + activeCipher.cipherID + "&name=" + thisNameUnder + "&letters=" + letterString + "&caps=" + capString + "&red=" + rgbArr[0] + "&green=" + rgbArr[1] + "&blue=" + rgbArr[2]);
	xhttp.send();
	xhttp.onreadystatechange = function() {

		if (this.readyState == 4 && this.status == 200) {
			if (xhttp.responseText == "Success") {

				activeCipher.Nickname = newNick
				if (cCheck == true) {
					activeCipher.vArr = activeArray
				} else {
					let newArr = letterString.split("_")
					newArr.push(...newArr)
					activeCipher.vArr = newArr
				}
				activeCipher.RGB = rgbArr

				ConfirmSubmission('Cipher "' + thisName + '" has been updated!', 1)
				List_Ciphers()
				
			} else {
				alert('Either no changes were made, or there was an error when attempting to update cipher "' + thisName + '".')
			}
		}
	}
}

function Delete_Cipher(impX) {
	document.getElementById("ConfirmDiv").innerHTML = ""
	const thisCipher = allCiphers[impX]
	const thisName = thisCipher.Nickname
	const thisNameUnder = thisName.replaceAll(" ", "_")

	//Sends a query to deletecipher.php that removes the cipher from the table
	if (confirm('Are you sure you wish to delete the cipher named ' + thisName + '?') == true) {
		DataSubmission()

		let xhttp = new XMLHttpRequest();
		xhttp.open("POST", rootDir + "/deletecipher.php?cipherid=" + parseInt(thisCipher.cipherID));
		xhttp.send();
		xhttp.onreadystatechange = function() {

			if (this.readyState == 4 && this.status == 200) {
				if (xhttp.responseText == "Success") {
					allCiphers.splice(impX, 1)
					ConfirmSubmission('Cipher "' + thisName + '" has been deleted.', 1)
					List_Ciphers()
				} else {
					alert('There was an error when attempting to delete cipher "' + thisName + '". ' + xhttp.responseText)
				}
			}
		}
	}
}

function Prioritize_Cipher(impX) {
	const thisID = allCiphers[impX].cipherID

	DataSubmission()

	let xhttp = new XMLHttpRequest();
	xhttp.open("POST", rootDir + "/prioritizecipher.php?cipherid=" + thisID);
	xhttp.send();

	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			if (xhttp.responseText == "Success") {
				let saveCipher = allCiphers[impX]
				allCiphers.splice(impX, 1)
				allCiphers.unshift(saveCipher)
			} else {
				alert('There was an error when attempting to move the cipher.')
			}
			document.getElementById("ConfirmDiv").innerHTML = ""
			List_Ciphers()
		}
	}
}

//----------------------------------------------------------------------------------------------------
//Basic functions
function ReduceNum(impNum, impBool = true, boolReturn = false) {
	//This function reduces impNum and returns it. impBool determines if Master Numbers are acceptable as Reduced numbers.
	//If boolReturn is true, then this function only returns true/false based on whether or not the number is already reduced.
	//Otherwise it will return the Reduced number
	let x, s
	let cn = 0
	let tempNum = impNum
	while (tempNum > 9) {
		if (impBool == true) {
			if (impNum == 11 || impNum == 22 || impNum == 33) {
				return tempNum
			}
		}
		cn = 0
		for (x = 0; x < String(tempNum).length; x++) {
			s = Number(String(tempNum).slice(x, x + 1))
			cn += s
		}
		tempNum = cn
	}
	if (boolReturn == true) {
		 if (tempNum == impNum) {return true} else {return false}
	} else {
		return tempNum
	}
}
function Verify_CipherName() {
	let thisChar, rText = ""
	const thisBox = document.getElementById("NameField")
	const thisString = thisBox.value
	const acceptArr = charArr.concat(charArr, capArr, numArr)

	for (let x = 0; x < thisString.length; x++) {
		thisChar = String(thisString.substring(x, x + 1))
		thisCharCode = String(thisChar.charCodeAt(0))

		if (acceptArr.indexOf(thisCharCode) > -1) {
			rText += thisChar
		} else if (thisChar == " " && rText.substring(rText.length - 1, rText.length) !== " ") {
			rText += " "
		}
	}

	thisBox.value = rText
}
function Create_BlankArray() {
	activeArray = []
	for (let x = 0; x < charArr.length; x++) {
		activeArray.push(0)
	}
	for (let y = 0; y < capArr.length; y++) {
		activeArray.push(0)
	}
}
function ColorArray() {
	const redVal = document.getElementById("RedBox").value
	const greenVal = document.getElementById("GreenBox").value
	const blueVal = document.getElementById("BlueBox").value
	return [parseInt(redVal), parseInt(greenVal), parseInt(blueVal)]
}
function CipherNameExists(impName, impX) {
	let thisCipher
	let numExisting = 0

	for (let x = 0; x < allCiphers.length; x++) {
		thisCipher = allCiphers[x]
		if (thisCipher.Nickname.replaceAll(" ", "_") == impName) {
			numExisting++
		}
	}

	return numExisting
}