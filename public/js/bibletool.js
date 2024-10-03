//allResults holds all the searchResult objects, allVerses holds the names of the correlating bible verses
var allResults = []
var allVerses = []
//allBooks contains data from each Bible book populated in LoadBooks
var allBooks = []
//GematriaArr is used as a temporary array to store values that then get transferred to searchResult objects
var GematriaArr = []
//lastQueryArr holds a list of search options in case the user clicks "Next" or "Back"
var lastQueryArr = []
//Options, defaults, and selections
var OpenVerse, buildTry
var o_Verses = false, initBuild = false
var o_Type = "or"; groupNum = 0; rowCap = 50
var selBook, lastSearch, lastBack, lastCstring, lastNum
var letterArr = [" ", "a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z","A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z"]

//When a user runs either Search, a collection of Search Results are created as objects
class searchResult {
	constructor(impVerse, impNum) {
		var x
		this.GemArr = []

		//Take the imported variables upon object creation and apply them to object properties
		this.VerseID = impVerse
		this.VerseBible = impNum
		for (x = 0; x < allCiphers.length; x++) {
			this.GemArr[x] = GematriaArr[x]
		}
	}
	GemSum(impVal) {
		//This is a simple function that returns a text string (impVal) with a Font tag making it the right color
		var gString, gSum, RGB
		gSum = this.GemArr[impVal]
		RGB = allCiphers[impVal].RGB.join(", ")

		gString = '<font style="color: RGB(' + RGB + ')">' + gSum + '</font>'
		return gString
	}
	VerseString() {
		//This function pulls the name of the verse as a link to the OpenDetails function
		var gString
		gString = '<a class="verLink" href="javascript:OpenDetails('
		gString += "'" + this.VerseID.replaceAll(" ", "_") + "')"
		gString += '">' + this.VerseID + '</a>'
		return gString
	}
}
//When pulling the details for an individual verse, create a bibleVerse object for it
class bibleVerse {
	constructor (impVal, impArr) {
		this.VerseID = impVal.replaceAll("_", " ")
		this.Book = impArr[0]
		this.Chapter = impArr[1]
		this.Verse = impArr[2]
		this.BookArr = [impArr[3], impArr[4]]
		this.BibleArr = [impArr[5], impArr[6]]
		this.TestArr = [impArr[7], impArr[8]]
		this.Characters = impArr[9]
		this.Letters = impArr[10]
		this.Words = impArr[11]
		this.Text = impArr[12]
	}
}
//The LoadBooks function pulls all of the Bible's book details and creates a bibleBook object for each
class bibleBook {
	constructor (impBook, impNum, impVerses, impChapters, impArr) {
		var x

		this.Name = impBook
		this.BookNum = impNum
		this.VerseCount = impVerses
		this.ChapterCount = impChapters
		this.verseArr = impArr
		//Pull in the number of verses into an array of Integers
		for (x = 0; x < this.verseArr.length; x++) {
			this.verseArr[x] = parseInt(this.verseArr[x])
		}
	}
	ChapterMax() {
		//Returns the maximum number of verses from the array of chapter counts
		return Math.max(...this.verseArr)
	}
}

function Open_Page() {
	LoadCiphers()
	LoadBooks()
	TimeLaunch()
}
function TimeLaunch() {
	buildTry = setInterval(InitGemBuild, 100)
}
function InitGemBuild() {
	if (allCiphers.length > 0 && allBooks.length > 0 && initBuild == false) {
		SearchByBook()
		clearInterval(buildTry)
	}
}

function LoadBooks() {
	var resArr, tArr, countArr
	//Queries the SQL database for Cipher data
	var xhttp = new XMLHttpRequest();
	allBooks = []

	//After the allBooks array is cleared, call the bookdetails PHP function
	xhttp.open("GET", "https://gematrinator.com/tools/bible-search/php/bookdetails.php?");
	xhttp.send();
	xhttp.onreadystatechange = function() {

		if (this.readyState == 4 && this.status == 200) {
			resArr = xhttp.responseText.split("|");
			for (x = 0; x < resArr.length; x++) {
				//Split the data into arrays and create a new bibleBook object with details from the string
				tArr = resArr[x].split("-")
				countArr = tArr.slice(4)
				allBooks[allBooks.length] = new bibleBook(tArr[0], tArr[1], tArr[2], tArr[3], countArr)
				//Once the books are loaded, populate the dropdown items at the top of the page
			}
			BuildSelectBoxes()
		}
	}
}
function BuildSelectBoxes() {
	bookBox = document.getElementById("SelectBook")
	optArr = ["Any Book", "Old Testament", "New Testament"]

	//Cycle through the options in optArr and add them to the SelectBook document object
	for (y = 0; y < optArr.length; y++) {
		var nextBook = document.createElement('option')
		nextBook.text = nextBook.value = optArr[y]
		bookBox.add(nextBook, -1)
	}
	//Cycle through all of the bibleBook objects in allBooks and add them as dropdown options
	for (x = 0; x < allBooks.length; x++) {
		var nextBook = document.createElement('option')
		nextBook.text = nextBook.value = allBooks[x].Name
		bookBox.add(nextBook, -1)
	}
	//Put the default value in the SelectBook element and call the function that pulls up the Chapter/Verse counts
	bookBox.value = "Genesis"
	Change_Selection(0)
}
function RetrieveDetails(impVal) {
	var resArr, tArr
	delete OpenVerse
	//Queries the SQL database for Verse data
	var xhttp = new XMLHttpRequest();
	xhttp.open("GET", "https://gematrinator.com/tools/bible-search/php/versedetails.php?verse=" + impVal);
	lastSearch = "retrieve"
	xhttp.send();
	xhttp.onreadystatechange = function() {

		//Split the returned string into an array and create a bibleVerse object that also gets set as
		//OpenVerse, which stores the most recently-viewed verse
		if (this.readyState == 4 && this.status == 200) {
			resArr = xhttp.responseText.split("|");
			OpenVerse = new bibleVerse(impVal, resArr)
			BuildVerseTable()
		}
	}
}

function Change_Selection(impVal) {
	//Variables from selection dropdown boxes
	bookBox = document.getElementById("SelectBook")
	chapterBox = document.getElementById("SelectChapter")
	verseBox = document.getElementById("SelectVerse")
	selBook = bookBox.value
	selChapter = chapterBox.value
	selVerse = verseBox.value

	//Remove chapter and verse counts under certain circumstances
	if (bookBox.value == "Any Book" || bookBox.value == "Old Testament" || bookBox.value == "New Testament") {
		chapterBox.options.length = 0
		verseBox.options.length = 0
		return;
	}

	//Find the Book object selected by the user and set x as its identifier
	for (x = 0; x < allBooks.length; x++) {
		if (allBooks[x].Name == selBook) {
			break;
		}
	}

	//If user changes the Book name, run an operation that populates the number of chapters into SelectChapter
	if (impVal == 0) {
		chapterBox.options.length = 0
		var nextChapter = document.createElement('option')
		nextChapter.text = nextChapter.value = "All"
		chapterBox.add(nextChapter, -1)
		for (y = 0; y < allBooks[x].ChapterCount; y++) {
			var nextChapter = document.createElement('option')
			nextChapter.text = nextChapter.value = y + 1
			chapterBox.add(nextChapter, -1)
		}
		//Set defaults into the CHapter box
		selChapter = 1; chapterBox.value = selChapter
	}

	//If user changes the Book or Chapter dropdown, pull in the number of Verses
	if (impVal < 2) {
		verseBox.options.length = 0
		var nextVerse = document.createElement('option')
		nextVerse.text = nextVerse.value = "All"
		verseBox.add(nextVerse, -1)
		for (z = 0; z < allBooks[x].verseArr[selChapter - 1]; z++) {
			var nextVerse = document.createElement('option')
			nextVerse.text = nextVerse.value = z + 1
			verseBox.add(nextVerse, -1)
		}
		//Set default
		verseBox.value = "All"
	}
}
function Change_Options(impNum) {
	o_Verses = document.getElementById("Include_Verses").checked
	anyBox = document.getElementById("Match_Any")
	allBox = document.getElementById("Match_All")

	//If user clicks "Match Any" or "Match All", toggle the opposite checkbox automatically
	if (impNum == 0) {
		if (anyBox.checked == true) {o_Type = "or"; allBox.checked = false} else {o_Type = "and"; allBox.checked = true}
	} else if (impNum == 1) {
		if (allBox.checked == true) {o_Type = "and"; anyBox.checked = false} else {o_Type = "or"; anyBox.checked = true}
	}
}

function SearchByNumber(impNum = document.getElementById("wordPhraseNumber").value.trim().replaceAll(" ", "-")) {
	let arrayPop = false
	let impArr = impNum.split("-")
	for (let x = 0; x < impArr.length; x++) {
		if (impArr[x] == "") {
			impArr.splice(x, 1)
			x--
		} else {
			arrayPop = true
		}
	}
	if (arrayPop == false) {return;}
	impNum = impArr.join("-")

	//Clear main page arrays
	Clear_Arrays()

	groupNum = 0
	lastQueryArr = [impNum, o_Verses, o_Type, groupNum]
	RunNumberPHP()
}
function RunNumberPHP() {
	//Queries the SQL database for Cipher data
	var xhttp = new XMLHttpRequest();
	var resArr, tArr
	let dropSpot = document.getElementById("DropHere")
	let cString = CipherString()

	xhttp.open("GET", "https://gematrinator.com/tools/bible-search/php/kjvquery.php?number=" + lastQueryArr[0] + "&verses=" + lastQueryArr[1] + "&type=" + lastQueryArr[2] + "&group=" + lastQueryArr[3] + "&ciphers=" + cString);
	xhttp.send();
	lastSearch = "number"; lastBack = "number"
	dropSpot.innerHTML = "Trying to load..."
	xhttp.onreadystatechange = function() {

		if (this.readyState == 4 && this.status == 200) {
			//If no results are found, call the BuildNullTable function and end this one
			if (xhttp.responseText == "0") {BuildNullTable(); return}
			//Split the responding PHP text into smaller arrays
			resArr = xhttp.responseText.split("|");
			for (x = 0; x < resArr.length; x++) {
				//Split each item in the array into a smaller array and create a new searchResult object, adding it to allResults
				tArr = resArr[x].split("-")
				GematriaArr = tArr.slice(2)
				allResults[allResults.length] = new searchResult(tArr[0], tArr[1])
				//Add the verse name to the allVerses array and empty the GematriaArr
				allVerses.push(tArr[0])
				GematriaArr = []
			}
			BuildResultTable()
		}
	}
}
function SearchByBook () {
	bookBox = document.getElementById("SelectBook").value
	chapterBox = document.getElementById("SelectChapter").value
	verseBox = document.getElementById("SelectVerse").value

	//Clear main page arrays
	Clear_Arrays()

	//Based on the user's dropdown selections, change chaperBox to "1" if need be
	if (chapterBox == "All") {chapterBox = 1}
	if (bookBox == "Old Testament" || bookBox == "Any Book") {bookBox = "Genesis"; chapterBox = 1}
	if (bookBox == "New Testament") {bookBox = "Matthew"; chapterBox = 1}

	groupNum = 0
	lastQueryArr = [bookBox, chapterBox, o_Type, groupNum]
	RunBookPHP()
}
function RunBookPHP() {
	var xhttp = new XMLHttpRequest();
	var resArr, tArr
	let dropSpot = document.getElementById("DropHere")

	//Queries the SQL database for Cipher data
	xhttp.open("GET", "https://gematrinator.com/tools/bible-search/php/standardquery.php?book=" + lastQueryArr[0] + "&chapter=" + lastQueryArr[1] + "&verses=" + lastQueryArr[2] + "&group=" + lastQueryArr[3]);
	xhttp.send(); initBuild = true
	lastSearch = "book"; lastBack = "book"
	dropSpot.innerHTML = "Trying to load..."
	xhttp.onreadystatechange = function() {

		if (this.readyState == 4 && this.status == 200) {
			//If no results are found, call the BuildNullTable function and end this one
			if (xhttp.responseText == "0 results") {BuildNullTable(); return}
			resArr = xhttp.responseText.split("|");
			for (x = 0; x < resArr.length; x++) {
				//Split each item in the array into a smaller array and create a new searchResult object, adding it to allResults
				tArr = resArr[x].split("-")
				GematriaArr = tArr.slice(1)
				allResults[allResults.length] = new searchResult(tArr[0], 0)
				//Add the verse name to the allVerses array and empty the GematriaArr
				allVerses.push(tArr[0])
				GematriaArr = []
			}

			//If the user asks for a specific verse, call RetrieveDetails, otherwise build the normal Result table
			if (verseBox !== "All" && verseBox !== "") {
				RetrieveDetails(selBook + "_" + chapterBox + ":" + verseBox)
			} else {
				BuildResultTable(false)
			}
		}
	}
}
function SearchByVerseNumber () {
	let vBox = document.getElementById("verseNumber")
	let numVal = parseInt(vBox.value)
	lastNum = numVal
	if (numVal > 31102) {
		alert("There are only 31,102 verses in the Bible.")
		return
	}

	//Clear main page arrays
	Clear_Arrays()

	//Queries the SQL database for Cipher data
	var xhttp = new XMLHttpRequest();
	var resArr, tArr
	let dropSpot = document.getElementById("DropHere")

	lastQueryArr = []
	let qString = "https://gematrinator.com/tools/bible-search/php/versebynumber.php?num=" + numVal + "&verses=" + o_Verses
	xhttp.open("GET", qString);
	dropSpot.innerHTML = "Trying to load..."
	lastSearch = "versenumber"; lastBack = "versenumber"
	xhttp.send();
	xhttp.onreadystatechange = function() {

		if (this.readyState == 4 && this.status == 200) {
			//If no results are found, call the BuildNullTable function and end this one
			if (xhttp.responseText == "0 or multiple results found") {BuildNullTable(); return}
			resArr = xhttp.responseText.split("|");
			cString = CipherString(true)
			for (x = 0; x < resArr.length; x++) {
				//Split each item in the array into a smaller array and create a new searchResult object, adding it to allResults
				tArr = resArr[x].split("-")
				GematriaArr = tArr.slice(1)
				allResults[allResults.length] = new searchResult(tArr[0], 0)
				//Add the verse name to the allVerses array and empty the GematriaArr
				allVerses.push(tArr[0])
				GematriaArr = []
			}

			BuildResultTable(false)
		}
	}
}
function RunLastQuery(impVal = lastSearch) {
	//return;

	switch (impVal) {
		case "number":
			BuildResultTable()
		break;
		case "book":
		case "versenumber":
			BuildResultTable(false)
		break;
		case "retrieve":
			BuildVerseTable()
		break;
	}
}

function SearchNextLastNumber (impVal = 0) {
	//impVal is 0 for going "Back" and 1 for clicking "Forward"
	dropSpot = document.getElementById("DropHere")
	dropSpot.innerHTML = "Trying to load..."

	var resArr, tArr
	//Queries the SQL database for Cipher data
	var xhttp = new XMLHttpRequest();

	//Clear main page arrays
	Clear_Arrays()
	let cString = CipherString()

	if (impVal == 0) {groupNum--} else {groupNum++}
	xhttp.open("GET", "https://gematrinator.com/tools/bible-search/php/kjvquery.php?number=" + lastQueryArr[0] + "&verses=" + lastQueryArr[1] + "&type=" + lastQueryArr[2] + "&ciphers=" + cString + "&group=" + groupNum);
	xhttp.send();
	xhttp.onreadystatechange = function() {

		if (this.readyState == 4 && this.status == 200) {
			//If no results are found, call the BuildNullTable function and end this one
			if (xhttp.responseText == "0 results") {BuildNullTable(); return}
			//Split the responding PHP text into smaller arrays
			resArr = xhttp.responseText.split("|");
			for (x = 0; x < resArr.length; x++) {
				//Split each item in the array into a smaller array and create a new searchResult object, adding it to allResults
				tArr = resArr[x].split("-")
				GematriaArr = tArr.slice(2)
				allResults[allResults.length] = new searchResult(tArr[0], tArr[1])
				//Add the verse name to the allVerses array and empty the GematriaArr
				allVerses.push(tArr[0])
				GematriaArr = []
			}
			BuildResultTable()
			lastSearch = "number"
		}
	}
}
function SearchNextLastBook(impVal = 0) {
	//impVal is 0 for going "Back" and 1 for clicking "Forward"
	dropSpot = document.getElementById("DropHere")
	dropSpot.innerHTML = "Trying to load..."

	openBook = allResults[0].Book; openChapter = allResults[0].Chapter
	for (x = 0; x < allBooks.length; x++) {
		if (allBooks[x].Name == openBook) {
			break;
		}
	}

	if (impVal == 0) {
		if (openChapter > 1) {
			document.getElementById("SelectChapter").value = openChapter - 1
			Change_Selection(1)
			SearchByBook()
		} else {
			document.getElementById("SelectBook").value = allBooks[x - 1].Name
			Change_Selection(0)
			SearchByBook()
		}
	} else {
		if (openChapter == allBooks[x].ChapterCount) {
			document.getElementById("SelectBook").value = allBooks[x + 1].Name
			Change_Selection(0)
			SearchByBook()
		} else {
			document.getElementById("SelectChapter").value = openChapter + 1
			Change_Selection(1)
			SearchByBook()
		}
	}
}

function BuildResultTable(impBool = true) {
	//Builds the main Result table full of verse names and gematria
	var x, y, lastVerse
	var iText = ""
	dropSpot = document.getElementById("DropHere")
	//openArr will hold a list of selected ciphers by the user
	openArr = CipherString(true)

	if (allResults.length == 1) {resStr = " result "} else {resStr = " results "}

	switch (lastBack) {
		case "number":
			resStr += "for '" + lastQueryArr[0].split("-").join(" " + lastQueryArr[2].toUpperCase() + " ")
		break;
		case "versenumber":
			resStr += "for Verse # '" + lastNum
		break;
		case "book":
			resStr += "for Book '" + lastQueryArr[0] + ": Chapter " + lastQueryArr[1]
		break;
	}

	if (allResults.length > 50) {if (impBool == true) {iText = "50+"} else {iText += allResults.length}} else {iText += allResults.length}
	iText += resStr + "' found"

	iText += '<table id="MainTable" class="table">'

	if (impBool == true) {iText += nextLastPage(impBool)} else {iText += nextLastBook()}

	iText += '<thead><th>Verse</th>'
	if (impBool == true) {iText += '<th>Verses Between</th>'}

	//Cycle through each selected cipher and list them as a column header
	for (y = 0; y < openArr.length; y++) {
		iText += '<th>' + allCiphers[openArr[y]].Nickname + '</th>'
	}
	iText += '</thead>'

	//List out each bible verse from allResults into the main table
	for (x = 0; x < allResults.length; x++) {
		if (impBool == true && x > 50) {break;}
		iText += '<tr><td>' + allResults[x].VerseString() + '</td>'
		if (impBool == true) {
			if (x > 0) {
				iText += '<td>' + (allResults[x].VerseBible - lastVerse) + '</td>'
			} else {
				iText += '<td>-</td>'
			}
		}

		//Use the lastVerse variable to determine how many verses between this and the last result
		lastVerse = allResults[x].VerseBible
		for (y = 0; y < openArr.length; y++) {
			iText += '<td>' + allResults[x].GemSum(openArr[y]) + '</td>'
		}
		iText += '</tr>'
	}

	if (impBool == true) {iText += nextLastPage(impBool)} else {iText += nextLastBook()}

	iText += '</table>'

	dropSpot.innerHTML = iText
}
function BuildNullTable() {
	dropSpot = document.getElementById("DropHere")
	iText = '<h3><font style="color: red">0 Results Found!</font></h3>'
	dropSpot.innerHTML = iText
}
function BuildVerseTable() {
	//When a user clicks a bible verse name, open up a page showing all of its details
	var x, y, verseSpot
	var iText
	dropSpot = document.getElementById("DropHere")
	//Set thisBool based on which type of Search was done last (Book/Chapter or specific numbers/words)
	if (lastSearch == "book") {thisBool = false} else {thisBool = true}

	//Build the HTML for the table full of verse details
	iText = '<table id="MainTableVerse" class="table"><tr><td><button id="backToResultsBtn" class="buttonFunction" onclick="RunLastQuery(' + "'" + lastBack + "'" + ')">BACK TO RESULTS</button></td>'
	iText += '<td colspan=2>Verse of Bible: <span class="bibleCount">' + OpenVerse.BibleArr[0] + '</span> - ' + OpenVerse.BibleArr[1] + ' left<BR>'
	iText += 'Verse of Testament: <span class="bibleCount">' + OpenVerse.TestArr[0] + '</span> - ' + OpenVerse.TestArr[1] + ' left<BR>'
	iText += 'Verse of Book: <span class="bibleCount">' + OpenVerse.BookArr[0] + '</span> - ' + OpenVerse.BookArr[1] + ' left</td></tr>'

	iText += '<tr><th>Characters:</th><th>Letters:</th><th>Words:</th></tr>'
	iText += '<tr><td>' + OpenVerse.Characters + '</td><td>' + OpenVerse.Letters + '</td><td>' + OpenVerse.Words + '</td></tr>'

	iText += '<tr>'

	//Find the open verse in the full array of verses and use it to populate the links to the previous verse from the search results
	verseSpot = allVerses.indexOf(OpenVerse.VerseID)
	if (verseSpot > 0) {
		backVerse = allVerses[verseSpot - 1]
		iText += '<td><button class="buttonFunction width137" onclick="OpenDetails('
		iText += "'" + backVerse + "')"
		iText += '"><span><i style="font-size:1em;" class="fa">&#xf0a8;</i></span> ' + backVerse.replaceAll("_", " ") + '</button></td>'
	} else {
		iText += '<td></td>'
	}

	iText += '<td></td>'

	//Find the open verse in the full array of verses and use it to populate the links to the next verse from the search results
	if (verseSpot < allVerses.length - 1 && verseSpot < rowCap - 1) {
		nextVerse = allVerses[verseSpot + 1]
		iText += '<td><button class="buttonFunction width137" onclick="OpenDetails('
		iText += "'" + nextVerse + "')"
		iText += '">' + nextVerse.replaceAll("_", " ") + ' <span><i style="font-size:1em;" class="fa">&#xf0a9;</i></span></button></td>'
	} else {
		iText += '<td></td>'
	}

	iText += '</tr>'

	iText += '<tr><th colspan=3><span class="verseTitle">' + OpenVerse.VerseID + '</span></th></tr>'
	iText += '<tr><td colspan=3><span class="verseText">' + OpenVerse.Text + '</span></td></tr>'

	iText += '<tr>'

	iText += '</table>'

	iText += '<table id="MainTable" class="table"><thead>'

	//Create an array of selected ciphers
	openArr = CipherString(true)
	//Cycle through each cipher and make a small table with the verse's gematria in each
	for (x = 0; x < openArr.length; x++) {
		iText += '<td>' + allCiphers[openArr[x]].Nickname + '</td>'
	}

	iText += '</thead><tr>'

	for (y = 0; y < openArr.length; y++) {
		iText += '<td>' + allResults[verseSpot].GemSum(openArr[y]) + '</td>'
	}

	iText += '</tr></table>'
	dropSpot.innerHTML = iText
}
function BuildBookTable() {
	//Builds the HTML string that populates all the Bible Book data into a big table
	var x
	dropSpot = document.getElementById("bookDataBox")
	iText = '<table id="bookDatTable" class="table"><thead><td>Book</td><td>Number</td><td>Verses</td><td>Chapters</td><td>Longest Chapter</td></thead>'

	//Cycle through each book in allBooks and add the details as a new row
	for (x = 0; x < allBooks.length; x++) {
		iText += '<tr><td>' + allBooks[x].Name + '</td><td>' + (x + 1) + '</td><td>' + allBooks[x].VerseCount + '</td><td>'
		iText += allBooks[x].ChapterCount + '</td><td>' + allBooks[x].ChapterMax() + '</td></tr>'
	}

	iText += '</table>'
	dropSpot.innerHTML = iText
}

function OpenDetails(impVal){
	//Activated when a user clicks on the name of a Bible verse
	dropSpot = document.getElementById("DropHere")
	dropSpot.innerHTML = 'Loading...<p><button class="btn btn-primary" onclick="BuildResultTable()">Go Back</button>'
	lastRetrieve = impVal
	RetrieveDetails(impVal)
}
function Open_Ciphers() {
	lastCstring = CipherString()

	//Activates when the user clicks "Choose Ciphers"
	dropSpot = document.getElementById("cipherBox")
	if (lastSearch == "book") {thisBool = false} else {thisBool = true}
	var iText = ""

	//Cycle through each cipher and build a list of checkboxes for each
	for (x = 0; x < allCiphers.length; x++) {
		iText += '<li><input type="checkbox" id="Cipher' + x + '" value="Verses" onclick="Change_Ciphers(' + x + ')"'
		if (allCiphers[x].isOn == true) {iText += ' checked'}
		iText += '> ' + allCiphers[x].NameString() + '</input></li>'
	}

	dropSpot.innerHTML = iText
}

function Confirm_Same() {
	let numArr, thisChar
	numBox = document.getElementById("wordPhraseNumber"); oldStr = numBox.value
	newStr = ""; lastChar = " "; spaceCount = 0

	firstChar = oldStr.substring(0, 1)

	if (isNaN(firstChar)) {numArr = false} else {numArr = true}

	for (let x = 0; x < oldStr.length; x++) {
		thisChar = oldStr.substring(x, x + 1)

		if (numArr == true) {
			if (isNaN(thisChar) == false || (thisChar == " " && lastChar !== " ")) {
				newStr += thisChar
			}
		} else {
			if (letterArr.indexOf(thisChar) > -1) {
				newStr += thisChar
			}
		}
		lastChar = thisChar
	}

	if (newStr == " ") {newStr = ""}
	numBox.value = newStr
}
function nextLastPage(impBool = true) {
	var addText = ""
	if (groupNum > 0 || allResults.length > rowCap) {
		addText += '<tr><td style="text-align: left">'

		if (groupNum > 0) {addText += '<a class="verlink" href="javascript:SearchNextLastNumber(0)">Last ' + rowCap + '</a>'}

		addText += '</td><td colspan="'
		if (impBool == true) {addText += CipherString(true).length} else {addText += CipherString(true).length - 1}
		addText += '"></td><td style="text-align: right">'

		if (allResults.length > 50) {
			addText += '<a class="verlink" href="javascript:SearchNextLastNumber(1)">Next ' + rowCap + '</a>'
		}

		addText += '</td></tr>'

		return addText
	} else {
		return ""
	}
}
function nextLastBook(impBool = true) {
	var addText = ""

	// addText += '<tr><td style="text-align: left">' ---- ADAM DISABLED FOR NOW

	openBook = allResults[0].Book; openChapter = allResults[0].Chapter
	if (openBook !== "Genesis" && openChapter !== 1) {
		// addText += '<a class="verlink" href="javascript:SearchNextLastBook(0)">Last Chapter</a>' ---- ADAM DISABLED FOR NOW
	}

	// addText += '</td><td colspan="' + (CipherString(true).length - 1) + '"></td><td style="text-align: right">' ---- ADAM DISABLED FOR NOW

	if (openBook !== "Revelation" && openChapter !== 22) {
		// addText += '<a class="verlink" href="javascript:SearchNextLastBook(1)">Next Chapter</a>' ---- ADAM DISABLED FOR NOW
	}

	// addText += '</td></tr>' ---- ADAM DISABLED FOR NOW

	return addText
}
function CipherString(returnArr = false) {
	//This function checks which ciphers the user has turned on and returns an array of associated numbers
	var x
	var numArr = []
	for (x = 0; x < allCiphers.length; x++) {
		if (allCiphers[x].isOn == true) {
			numArr.push(x)
		}
	}
	if (numArr.length > 0) {
		if (returnArr == false) {
			return numArr.join("-")
		} else {
			return numArr
		}
	} else {
		//If no ciphers are selected, return a "False"
		return false
	}
}
function Change_Ciphers(impVal){
	//Toggles whether or not a cipher is on
	allCiphers[impVal].isOn = document.getElementById("Cipher" + impVal).checked
}
function GetBookSpot(impName) {
	//Find the position of the imported variable in the allBooks array
	for (x = 0; x < allBooks.length; x++) {
		if (allBooks.Name == impName) {return x}
	}
	return -1
}
function Clear_Arrays() {
	allResults = []
	allVerses = []
}
function delay(time) {
  return new Promise(resolve => setTimeout(resolve, time));
}

// Adam's JS
function hide(select){
   if(select.value=="Any Book" | select.value=="Old Testament" | select.value=="New Testament"){
    document.getElementById('chapterSelector').style.display = "none";
    document.getElementById('verseSelector').style.display = "none";
   } else{
    document.getElementById('chapterSelector').style.display = "inline-block";
    document.getElementById('verseSelector').style.display = "inline-block";
   }
}

