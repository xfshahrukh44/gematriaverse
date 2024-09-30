var breakArr = []
var currPage = 0

function Build_GemTable(impInitial = false) {
    //Builds the Main Gematria Table in the middle of the page
    let retStr = '<table id="GemTable">'
    let currCipher
    let tArr = []

    if (impInitial == true) {
        RestoreCipherSettings(0)
        activeTable = 5
    }

    //Create a two-dimensional array that decides where each cipher goes in the table.
    //Finds each cipher in allCiphers with isOn == true and drops it in
    tArr = TableArray(optArr.PerRow)
    for (let x = 0; x < tArr.length; x++) {
        //Don't show the header w/ cipher name if Headers option is off
        if (optArr.Headers == true) {
            retStr += '<tr>'
            for (y = 0; y < tArr[x].length; y++) {
                currCipher = tArr[x][y]
                retStr += '<td class="GemTableHeader">' + allCiphers[currCipher].NameLink(currCipher, "GemTableHeader") + '</td>'
            }
            retStr += '</tr>'
        }
        retStr += '<tr>'
        retStr += '<tr>'
        //Cycle through each item in this "row" of tArr and create a cell to drop the Gematria in later
        for (z = 0; z < tArr[x].length; z++) {
            currCipher = tArr[x][z]
            retStr += '<td class="GemTableValue" id="TableValue_' + allCiphers[currCipher].Nickname.replaceAll(" ", "_") + '">' + allCiphers[currCipher].GemString(undefined, undefined, optArr.Headers) + '</td>'
        }
        retStr += '</tr>'
    }

    retStr += '</table>'
    document.getElementById("Gematria_Table").innerHTML = retStr
    //Show the chart if you feel like taking a glance
    if (optArr.ShowChart == true) {Build_GemChart()}

    //Automatically build the Breakdown table, update History gematria arrays, and re-build the History table
    Build_Breakdown()
    UpdateOnArr()
    if (impInitial == false) {Build_HistoryTable()}
}
function Build_Breakdown(optOverride = false) {
    let bSpot = document.getElementById("breakdownInject")
    let bSpotCap = document.getElementById("breakdownCapture")
    document.getElementById("SimpleSpot").innerHTML = ""
    document.getElementById("breakdownCipherLabel").innerHTML = ""
    bSpot.innerHTML = ""
    imgFileName = "'" + allCiphers[breakCipher].gemTotal + "-" + TrimToHistory(EntryValue()).replaceAll(" ", "_") + "'"
    //Retrieve an array of values from the selected cipher to populate the Breakdown Table
    let bText = '<button class="buttonFunction" id="PrintBreak" onclick="javascript:OpenImg(' + imgFileName + ')">Breakdown</button>'
    let numChar
    let iText = ""

    if (optArr.ShowBreakdown == true) {
        document.getElementById("breakdownButton").style.color = "black";
        document.getElementById("breakdownCapture").style.display = "inline";
    } else {
        document.getElementById("breakdownButton").style.color = "#969696";
        document.getElementById("breakdownCapture").style.display = "none";
    }

    //Don't show anything if nothing is to be calculated
    if (calcArr.length == 0 || (optArr.ShowBreakdown == false && optOverride == false)) {bSpot.innerHTML = "";
     return}

    switch (optArr.Breakdown) {
        case "Chart":
            iText += Get_BreakdownChart()
        break;
        case "NextGen":
            iText += Get_BreakdownNextGen()
        break;
        case "Classic":
            iText += Get_BreakdownClassic()
        break;
    }

    bSpot.innerHTML = iText
    bSpotCap.innerHTML = bText
}
function Get_BreakdownChart() {
    let thisChar, iText = ""
    let breakArr = allCiphers[breakCipher].GetBreakdown(calcArr)
    
    if (optArr.ShowSimple == true) {
        document.getElementById("SimpleSpot").innerHTML = '"' + TrimToHistory(EntryValue()) + '" = ' + allCiphers[breakCipher].GemString(undefined, undefined, undefined, false) + ' ' + allCiphers[breakCipher].NameString(true)
    }

    iText += '<tr><td>'

    //Cycle through each item in calcArr, which is an array containing separate words
    for (let x = 0; x < calcArr.length; x++) {
        iText += '<table class="BreakTable"><tr>'
        //Cycle through each character of the word, which is stored in a second array

        for (let y = 0; y < calcArr[x].length; y++) {
            thisChar = calcArr[x][y]

            //If the item in the array starts with a pound sign, it is a number
            if (String(thisChar).substring(0, 1) == "#") {
                if (allCiphers[breakCipher].cipherType !== "alphanumeric") {
                    thisChar = thisChar.substring(1)
                    iText += '<td class="BreakChar">' + thisChar + '</td>'
                } else {
                    for (let z = 1; z < thisChar.length; z++) {
                        numChar = thisChar.substring(z, z + 1)
                        iText += '<td class="BreakChar">' + numChar + '</td>'
                    }
                }

            } else {
                thisChar = String.fromCharCode(CharSpot(thisChar))
                iText += '<td class="BreakChar">' + thisChar + '</td>'
            }
        }

        //Add the word's sum as the last cell of the word table
        if (calcArr.length > 1) {
            iText += '<td class="BreakSum" class="NumberClass" rowspan="2">' + allCiphers[breakCipher].GemString(breakArr[x].reduce(arraySum), undefined, undefined, false) + '</td>'
        }
        //Show the total Gematria sum if this is the last word
        if (x == calcArr.length - 1) {
            iText += '<td class="BreakTotal" class="NumberClass" rowspan="2">' + allCiphers[breakCipher].GemString(undefined, undefined, undefined, false) + '</td>'
        }

        iText += '</tr><tr>'
        //Cycle through each item in breakArr to populate the values under the letters
        for (y = 0; y < breakArr[x].length; y++) {
            iText += '<td class="BreakValue" class="NumberClass">' + breakArr[x][y] + '</td>'
        }

        iText += '</tr></table>'
    }
    iText += '</td></tr>'

    let cLabel = document.getElementById("breakdownCipherLabel")
    cLabel.innerHTML = allCiphers[breakCipher].NameString()
    //<table><tr id="cipherLabel"><td>' + allCiphers[breakCipher].NameString() + '</td></tr></table></tbody></table>'
    return iText
}
function Get_BreakdownNextGen() {
    let thisChar
    let breakArr = allCiphers[breakCipher].GetBreakdown(calcArr)
    let iText = '<tr><td>'
    if (optArr.ShowSimple) {iText += '<span class="nextGenText">' + '"' + TrimToHistory(EntryValue()) + '" = ' + allCiphers[breakCipher].GemString(undefined, undefined, undefined, false) + ' ' + allCiphers[breakCipher].NameString(true) + "</span><br>"}

    //Cycle through each item in calcArr, which is an array containing separate words
    for (let x = 0; x < calcArr.length; x++) {
        iText += '<table class="BreakTable"><tr>'

        //Cycle through each character of the word, which is stored in a second array
        for (let y = 0; y < calcArr[x].length; y++) {
            thisChar = calcArr[x][y]

            //If the item in the array starts with a pound sign, it is a number, so treat it as such
            if (String(thisChar).substring(0, 1) == "#") {
                if (allCiphers[breakCipher].cipherType !== "alphanumeric") {
                    thisChar = thisChar.substring(1)
                    iText += '<td class="BreakCharNG">' + thisChar + '</td>'
                } else {
                    for (let z = 1; z < thisChar.length; z++) {
                        numChar = thisChar.substring(z, z + 1)
                        iText += '<td class="BreakCharNG">' + numChar + '</td>'
                    }
                }

            } else {
                thisChar = String.fromCharCode(CharSpot(thisChar))
                iText += '<td class="BreakCharNG">' + thisChar + '</td>'
            }
        }

        //Add the word's sum as the last cell of the word table
        if (calcArr.length > 1) {
            iText += '<td class="BreakSum" class="NumberClass" rowspan="2">' + allCiphers[breakCipher].GemString(breakArr[x].reduce(arraySum), undefined, undefined, false) + '</td>'
        }
        //Show the total Gematria sum if this is the last word
        if (x == calcArr.length - 1) {
            iText += '<td class="BreakTotal" class="NumberClass" rowspan="2">' + allCiphers[breakCipher].GemString(undefined, undefined, undefined, false) + '</td>'
        }

        iText += '</tr><tr>'
        //Cycle through each item in breakArr to populate the values under the letters
        for (y = 0; y < breakArr[x].length; y++) {
            iText += '<td class="BreakValue" class="NumberClass">' + breakArr[x][y] + '</td>'
        }

        iText += '</tr></table>'
    }
    iText += '</td></tr>'

    let cLabel = document.getElementById("breakdownCipherLabel")
    cLabel.innerHTML = allCiphers[breakCipher].NameString()
    return iText
}
function Get_BreakdownClassic() {
    let thisChar
    let breakArr = allCiphers[breakCipher].GetBreakdown(calcArr)
    let iText = '<tr><td class="classicBreak">'
    iText += '"' + TrimToHistory(EntryValue()) + '" = '

    //Cycle through each character in breakArr
    for (let x = 0; x < breakArr.length; x++) {
        if (x > 0) {iText += " + "}

        //List each character with a + sign between them
        for (let y = 0; y < breakArr[x].length; y++) {
            if (y > 0) {iText += "+"}

            iText += breakArr[x][y]
        }

        if (calcArr.length > 1) {
            iText += " (" + allCiphers[breakCipher].GemString(breakArr[x].reduce(arraySum), undefined, undefined, false) + ")"
        }
    }

    iText += ' = <span style="font-size: 1.25em">' + allCiphers[breakCipher].GemString(undefined, undefined, undefined, false) + '</span>'

    let cLabel = document.getElementById("breakdownCipherLabel")
    cLabel.innerHTML = allCiphers[breakCipher].NameString()
    iText += '</td></tr>'
    return iText
}
function Build_CustomLists(impBool = false) {
    // if (window.matchMedia("(max-width: 991px)").matches) {
        let linkName
        let listSpot = document.getElementById("CustomLists")
        let iText = ""

        //Cycle through each table in userHistory and create a Link for it
        for (let x = 0; x < userHistory.length; x++) {
            if (x < userHistory.length - 2) {
                if (TablesEnabled == false) {continue;}
                linkName = optArr.HistoryNames[x]
            } else if (x == userHistory.length - 2) {
                if (HistoryEnabled == false) {continue;}
                linkName = "User History"
            } else if (x == userHistory.length - 1) {
                linkName = "This Session"
            }

            //Create links to access each of the History Tables
            if (HistoryEnabled == true) {
                iText += '<tr><td><input type="checkbox" onclick="Update_WhichHistory()" id="UserBox' + x + '"></input></td>'
                if (activeTable !== x || impBool == true) {
                    iText += '<td><a href="javascript:Change_History(' + x + ')">' + linkName + '</a></td><td>(' + userHistory[x].length + ')</td></tr>'
                } else if (x < userHistory.length - 2) {
                    iText += '<td><a id="OpenTable" href="javascript:Rename_History(' + x + ')">' + linkName + '</a></td><td> (' + userHistory[x].length + ')</td></tr>'
                } else {
                    iText += '<td>' + linkName + '</td>' + ' <td>(' + userHistory[x].length + ')</td></tr>'
                }
            }
        }

        listSpot.innerHTML = iText

        //If the array is included in searches, check the box
        for (let x = 0; x < userHistory.length; x++) {
            if (optArr.HistoryOn[x] == true) {
                if (document.getElementById("UserBox" + x)) {
                    document.getElementById("UserBox" + x).checked = true
                }
            }
        }
    // } else {
    //     let linkName
    //     let listSpot = document.getElementById("CustomLists")
    //     let iText = ""

        //Cycle through each table in userHistory and create a Link for it
        // for (let x = 0; x < userHistory.length; x++) {
        //     iText += '<tr><td><input type="checkbox" onclick="Update_WhichHistory()" id="UserBox' + x + '"></input></td>'

            //Use the name of the array for the link, unless it's the History or Session table
            // if (x < userHistory.length - 2) {
            //     linkName = optArr.HistoryNames[x]
            // } else if (x == userHistory.length - 2) {
            //     linkName = "User History"
            // } else if (x == userHistory.length - 1) {
            //     linkName = "This Session"
            // }

            //Create links to access each of the History Tables
        //     if (activeTable !== x || impBool == true) {
        //         iText += '<td><a title="Click to make this table active. Your entries will be added to this table when selected." href="javascript:Change_History(' + x + ')">' + linkName + '</a></td><td>(' + userHistory[x].length + ')</td></tr>'
        //     } else if (x < userHistory.length - 2) {
        //         iText += '<td><a id="OpenTable" title="Click again to rename table!" href="javascript:Rename_History(' + x + ')">' + linkName + '</a></td><td> (' + userHistory[x].length + ')</td></tr>'
        //     } else {
        //         iText += '<td>' + linkName + '</td>' + ' <td>(' + userHistory[x].length + ')</td></tr>'
        //     }
        // }

        // listSpot.innerHTML = iText 
    // }
}
function Build_HistoryTable(impPage = 0, impArr = userHistory[activeTable]) {
    currPage = impPage
    let cipherSpot
    let iText = ""
    Build_CustomLists()
    let hSpot = document.getElementById("MiscSpot")
    let hSpotCap = document.getElementById("historyCapture")

    let hText = '<button class="buttonFunction" id="PrintHistory" onclick="javascript:OpenHistoryImg()">History</button>'

    //If there are no items in the array, show an alert and cancel
    if (impArr.length < 1) {
        iText += '<br><br>'
        Show_Alert("<div id='noMessage'>No items in this History table.</div>", 2)
        // hSpotDesktop.innerHTML = "";
        return
    }

    let pp = optArr.HistoryPerPage
    //Show link to "Last" and/or "Next" pages of the table if applicable
    let numPages = Math.ceil(impArr.length / pp) - 1

    if (numPages > 0) {
        if (impPage > 0) {
            iText += '<a href="javascript:Build_HistoryTable(' + (impPage - 1) + ')"><<</a> •'
        } else {
            iText += '<< •'
        }
        for (let z = 0; z < numPages + 1; z++) {
            if (z > 0) {iText += ' • '}
            if (z !== impPage) {
                iText += '<a href="javascript:Build_HistoryTable(' + z + ')">' + (z + 1) + '</a>'
            } else {
                iText += z + 1
            }
        }
        if (impArr.length > (impPage + 1) * pp) {
            iText += ' • <a href="javascript:Build_HistoryTable(' + (impPage + 1) + ')">>></a>'
        } else {
            iText += ' • >>'
        }

        if (userHistory[activeTable].length > Math.min(...tblArr)) {iText += '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp•&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp'}
    }

    if (userHistory[activeTable].length > Math.min(...tblArr)) {
        iText += 'Show: '
        for (let p = 0; p < tblArr.length; p++) {
            if (p > 0) {iText += " • "}
            if (optArr.HistoryPerPage == tblArr[p]) {
                iText += tblArr[p]
            } else {
                iText += '<a href="javascript:Change_TableNum(' + p + ')">' + tblArr[p] + '</a>'
            }
        }
    }

    /*if (impPage > 0) {
        iText += '<div id="LastPage"><a href="javascript:Build_HistoryTable(' + (impPage - 1) + ')"><< Last</a></div>'
    }
    if (impArr.length > (impPage + 1) * pp) {
        iText += '<div id="NextPage"><a href="javascript:Build_HistoryTable(' + (impPage + 1) + ')">Next >></a></div>'
    }*/

    // iText += '<button class="buttonFunctionMobile1" id="PrintHistory" onclick="javascript:OpenHistoryImg()">History</button>'
    iText += '<div id="HistoryTableDiv"><table class="HistoryTable">'

    if (optArr.CompactHistory == false) {
        //Create the top-left cell of the table
        iText += '<tbody id="printHistoryTable"><tr><th id="HistoryWordPhrase">Entry</th>'
        //Cycle through each cipher and add its name as a new header cell if it is on
        for (let q = 0; q < allCiphers.length; q++) {
            if (allCiphers[q].isOn == true) {
                iText += '<th class="HistoryLabel">' + allCiphers[q].NameLink(q, "") + '</th>'
            }
        }
        iText += '</tr>'
    }

    //Cycle through the next 25 items in the history table and display each item
    for (let x = (impPage * pp); x < impArr.length && x < (impPage + 1) * pp; x++) {
        iText += '<tr>'
        //Code for creating the phrase cell w/ hidden dropdown is in history.js / PhraseLink()
        iText += '<td class="HistoryPhrase">' + impArr[x].PhraseLink(x) + '</td>'
        //Cycle through each cipher and if it is on, add the gematria of the phrase
        for (y = 0; y < allCiphers.length; y++) {
            if (allCiphers[y].isOn == true) {
                cipherSpot = impArr[x].ciphArr.indexOf(allCiphers[y].Nickname)
                iText += '<td class="HistorySum">' + allCiphers[y].GemString(impArr[x].gemArr[cipherSpot]) + '</td>'
            }
        }
        iText += '</tr>'
    }
    iText += '</tbody></table></div>'
    hSpot.innerHTML = iText
    hSpotCap.innerHTML = hText
    addHistListeners()
    activeType = "history"
}
function Build_GemChart(impCipher = breakCipher) {
    //The code to build each chart is located in the cipherbuilder.js file
    let cSpot = document.getElementById("ChartSpot")
    if (optArr.ShowChart == true) {
        document.getElementById("cipherChartButton").style.color = "black";
        cSpot.innerHTML = allCiphers[impCipher].GetChart()
    } else {
        document.getElementById("cipherChartButton").style.color = "#969696";
        cSpot.innerHTML = ""
    }
}
function Build_MatchTable(impPage = 0) {
    //Called when the user matches a phrase with the items in the userHistory tables

    currPage = impPage
    Build_CustomLists(true)
    let iText = ""
    hSpot = document.getElementById("MiscSpot")
    if (historyMatched.length < 1) {
        Show_Alert("Unable to find any matches.", 2)
        return
    }

    //Function for generating link to History table
    if (historyNumeric == false) {
        iText += HistoryLink()
    } else {
        iText += HistoryLink(2)
    }

    iText += '<button class="buttonFunction" onclick="Build_HistoryTable()">Show History</button>'
    iText += '<br>'

    let pp = Math.min(...tblArr)
    //Show link to "Last" and/or "Next" pages of the table if applicable
    let numPages = Math.ceil(historyMatched.length / pp) - 1

    //Build a navigation menu for the Match Table
    if (numPages > 0) {
        if (impPage > 0) {
            iText += '<a href="javascript:Build_MatchTable(' + (impPage - 1) + ')"><<</a> •'
        } else {
            iText += '<< •'
        }
        for (let z = 0; z < numPages + 1; z++) {
            if (z > 0) {iText += ' • '}
            if (z !== impPage) {
                iText += '<a href="javascript:Build_MatchTable(' + z + ')">' + (z + 1) + '</a>'
            } else {
                iText += z + 1
            }
        }
        if (historyMatched.length > (impPage + 1) * pp) {
            iText += ' • <a href="javascript:Build_MatchTable(' + (impPage + 1) + ')">>></a>'
        } else {
            iText += ' • >>'
        }
    }

    iText += '<div id="HistoryTableDiv"><table class="HistoryTable">'

    // if (historyNumeric) {iText += '<tr><th colspan="' + (historyCiphers.length + 1) + '" class="HistoryLabel">Matched Entries</th></tr>'}

    //Create the normal table headers
    iText+= '<tbody id="printHistoryTable"><tr><th class="HistoryLabel">Entry</th>'
    for (let q = 0; q < historyCiphers.length; q++) {
        iText += '<th class="HistoryLabel" onclick="javascript:Slide_MatchCipher(' + q + ', event)">' + historyCiphers[q].NameString() + '</th>'
    }
    iText += '</tr>'

    if (historyNumeric == false) {

        //Create a header row containing gematria of the phrase being matched
        iText += '<tr><td class="HistoryPhrase">' + historyMatch.phrase + '</td>'

        //Display the matched values from historyCiphers
        for (let z = 0; z < historyCiphers.length; z++) {

            //If the gematria in this cipher was matched to another phrase, color it and make it all big
            if (historyGems.indexOf(historyMatch.gemArr[z]) > -1) {
                iText += '<td class="HistoryTopSum HistorySum">' + historyCiphers[z].GemString(historyMatch.gemArr[z]) + '</td>'
            } else {

                if (optArr.IgnoreNonMatches == false) {
                    iText += '<td class="HistorySum"><span class="justnumber">' + historyMatch.gemArr[z] + '</span></td>'
                } else {
                    iText += '<td class="HistorySum"><span class="justnumber hideValue">' + historyMatch.gemArr[z] + '</span></td>'
                }
            }
        }

        iText += '</tr>'

        iText += '<tr id="MatchTextRow" onclick="javascript:HideMatchRow(event)"><th colspan="' + (historyCiphers.length + 1) + '" class="HistoryLabel">Matched Entries</th></tr>'
    }

    //Cycle through each matched item and display the values in each "on" cipher, highlighting it if matched
    for (let x = (impPage * pp); x < historyMatched.length && x < (impPage + 1) * pp; x++) {
        iText += '<tr>'
        iText += '<td class="HistoryPhrase">' + historyMatched[x].MatchLink(x) + '</td>'

        for (let y = 0; y < historyCiphers.length; y++) {

            if (historyGems.indexOf(historyMatched[x].gemArr[y]) > -1) {
                iText += '<td class="HistorySum">' + historyCiphers[y].GemString(historyMatched[x].gemArr[y]) + '</td>'
            } else {

                if (optArr.IgnoreNonMatches == false) {
                    iText += '<td class="HistorySum"><b class="justnumber">' + historyMatched[x].gemArr[y] + '</b></td>'
                } else {
                    iText += '<td class="HistorySum"><b class="justnumber hideValue">' + historyMatched[x].gemArr[y] + '</b></td>'
                }
            }
        }

        iText += '</tr>'
    }

    iText += '</tbody></table></div>'
    hSpot.innerHTML = iText
    addHistListeners()
    activeType = "match"
}
function HideMatchRow(impEvent) {
    if (impEvent.ctrlKey && impEvent.altKey) {
        document.getElementById("MatchTextRow").style.display = "none"
    }
}
function Build_AllMatches(impMatches) {
    //Called when user matches all numbers in the entire userHistory set of arrays

    Build_CustomLists(true)
    let mSpot = document.getElementById("MiscSpot")
    let iText = ""

    if (impMatches.length == 0) {
        Show_Alert("Unable to find any number matches.", 2)
        return
    }

    //Cycle through each item in the imported array of Matched Objects and populate them into a table
    iText = '<button class="buttonFunction" onclick="Build_HistoryTable()">Show History</button>'
    iText += '<table id="mostCommon">'
    for (let x = 0; x < 50 && x < impMatches.length; x++) {
        iText += '<tr><td class="MatchedNumber" class="NumberClass"><a href="javascript:LoadEntry(' + impMatches[x][0] + ', true, true)">' + impMatches[x][0] + ' </a>&nbsp;</td>'
        iText += '<td class="NumberOfMatches">' + impMatches[x][2] + ' matches</td></tr>'
    }
    iText += '</table>'
    mSpot.innerHTML = iText
}
function Build_DatabaseMatches() {
    //Called after the user matches a phrase or set of numbers to the SQL database

    Build_CustomLists(true)
    let colCounter, gemArr, thisMatch, thisCipher, thisSum
    let iText = ""
    let wArr = [], defArr = []
    hSpot = document.getElementById("MiscSpot")

    //If there are no items in the matched array, exit
    if (dbMatched.length < 1) {
        iText = '<div id="noMessage">No items Matched in Database.</div><br><button class="buttonFunction" onclick="Build_HistoryTable()">Show History</button>'
        hSpot.innerHTML = iText
        // Show_Alert("<div id='noMessage'>No items Matched in Database.</div>", 2)
        return
    }
    
    //Generate link to History table
    iText += HistoryLink()
    iText += '<button class="buttonFunction" onclick="Build_HistoryTable()">Show History</button><br><table class="HistoryTable">'

    //Create the normal table headers
    iText+= '<tr><th class="HistoryLabel">Entry</th>'

    for (let q = 0; q < lastMatchCiphers.length; q++) {
        thisCipher = lastMatchCiphers[q].replaceAll("_", " ")
        wArr.push(CipherSpot(undefined, thisCipher))
        iText += '<th class="HistoryLabel">' + allCiphers[wArr[wArr.length - 1]].NameString() + '</th>'
    }
    iText += '</tr>'

    //Cycle through each matched item and display the values in each "on" cipher, highlighting it if matched
    for (let x = 0; x < dbMatched.length; x++) {
        thisMatch = dbMatched[x]
        iText += '<tr>'
        iText += '<td class="HistoryPhrase">' + MatchPhraseLink(thisMatch.phrase, x) + '</td>'

        for (let y = 0; y < lastMatchCiphers.length; y++) {
            if (lastMatchNumbers.indexOf(thisMatch.NumArr[y]) > -1) {
                iText += '<td class="HistorySum">' + allCiphers[wArr[y]].GemString(thisMatch.NumArr[y]) + '</td>'
            } else {
                if (optArr.IgnoreNonMatches == false) {
                    iText += '<td class="HistorySum"><b class="justnumber">' + thisMatch.NumArr[y] + '</b></td>'
                } else {
                    iText += '<td class="HistorySum"><b class="justnumber hideValue">' + thisMatch.NumArr[y] + '</b></td>'
                }
            }
        }

        iText += '</tr>'
    }
    iText += '</table>'
    hSpot.innerHTML = iText
    addHistListeners()
    activeType = "database"
}
function Change_TableNum(impNum) {
    optArr.HistoryPerPage = tblArr[impNum]
    switch (activeType) {
        case "history": Build_HistoryTable(); break;
        case "match": Build_MatchTable(); break;
        case "database": Build_DatabaseMatches(); break;
    }
}
function Show_Alert(impText, impSpot = 1) {
    let aSpot
    if (impSpot == 1) {
        aSpot = document.getElementById("MiscSpot")
    } else if (impSpot == 2) {
        aSpot = document.getElementById("MiscSpot")
    }
    aSpot.innerHTML = impText
}

function HistoryLink(impType = 1) {
    //Creates a link to the regular history table
    let iText
    switch (impType) {
        case 1:
            iText = ''
            // iText = '<button class="buttonFunction" onclick="Build_HistoryTable()">Show History1</button><br>'
            // After editing, there were two "Show History" buttons showing up. Troubleshooting showed this was the one to remove.
        break;
        case 2:
            iText = '<button class="buttonFunction" onclick="matchAllHistory()">Back to List</button>'
        break;
    }
    return iText
}
function Open_Ciphers() {
    //----------This function is identical to the Bible Tool
    //Activates when the user clicks "Ciphers"
    let dropSpot = document.getElementById("cipherBox")
    let iText = ""
    let newOpt

    if (document.getElementById("PresetDropdown")) {
        let saveDrop = document.getElementById("PresetDropdown")
        let loadDrop = document.getElementById("PresetDropdown2")

        jQuery('#PresetDropdown').empty()
        jQuery('#PresetDropdown2').empty()

        newOpt = document.createElement("option"); newOpt.text = "Default"; saveDrop.add(newOpt) 
        newOpt = document.createElement("option"); newOpt.text = "Default"; loadDrop.add(newOpt)

        //Populate the dropdowns dynamically
        for (let z = 1; z < optArr.CipherOrder.length + 1 && z < 5; z++) {
            newOpt = document.createElement("option"); newOpt.text = "Preset " + z
            saveDrop.add(newOpt)
        }
        for (let y = 1; y < optArr.CipherOrder.length; y++) {
            newOpt = document.createElement("option"); newOpt.text = "Preset " + y
            loadDrop.add(newOpt)
        }

        let currSel = MatchCipherOrder()
        if (currSel == 0) {
            document.getElementById("PresetDropdown").value = "Default"
        } else if (currSel > 0) {
            document.getElementById("PresetDropdown").value = "Preset " + currSel
        }
    }

    //Cycle through each cipher and build a list of checkboxes for each
    for (let x = 0; x < allCiphers.length; x++) {
        iText += '<li><input type="checkbox" id="Cipher' + x + '"'
        if (allCiphers[x].isOn == true) {iText += ' checked'}
        iText += '> ' + allCiphers[x].NameString() + '</input></li>'
    }

    dropSpot.innerHTML = iText
}
function DisplayNumber(impItem) {
    //-------------impItem contains the HTML element containing the number being displayed
    let nSpot = document.getElementById("NumberSpot")
    let iText = ""
    let impNum = findNumber(impItem.innerHTML)
    iText = '<div id="MainNumber">' + impNum + '</div>'
    nSpot.innerHTML = iText
}
function Open_Options() {
    if (initOpt == false) {return;}
    
    //-------------oSpot should be a modal menu that the user needs to close out of before anything changes
    eText = EntryValue()
    let oSpot = document.getElementById("OptionSpot")
    let iText = "<div>"
    
    iText += '<label>Number Calculation</label><br><select name="NumCalcSel" id="NumCalcSel"><option value="Smart">Smart</option><option value="Reduced">Reduced</option><option value="Full">Full</option><option value="Off">Off</option></select><br>'
    iText += '<label>Ciphers per Row</label><br><select name="CiphersPerSel" id="CiphersPerSel"><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option>'
    iText += '<option value="6">6</option><option value="7">7</option><option value="8">8</option></select><br>'

    iText += '<label>Sequence Notifications</label><br><select name="NumSeqSel" id="NumSeqSel"><option value="Off">Off</option><option value="Regular">Regular</option><option value="All">All</option><select><br>'

    iText += '<br>'
    iText += '<input type="checkbox" id="ReductionCheck" value="ReductionCheck">&nbsp Display Reduction Value</input><br>'
    iText += '<input type="checkbox" id="CipherNamesCheck" value="CipherNamesCheck">&nbsp Display Cipher Names</input><br>'

    iText += '<br>'
    iText += '<input type="checkbox" id="LetterWordCheck" value="LetterWordCheck">&nbsp Display Letter/Word Count</input><br>'
    iText += '<input type="checkbox" id="SimpleResultCheck" value="SimpleResultCheck">&nbsp Display Simple Result</input><br>'     
    iText += '<input type="checkbox" id="ChartCheck" value="ChartCheck">&nbsp Show Cipher Chart</input><br>'
    iText += '<input type="checkbox" id="BreakdownCheck" onclick="javascript:modBreakList()" value="BreakdownCheck">&nbsp Show Breakdown</input><br>'    
    iText += '<label>Breakdown Chart Style</label><br><select name="BreakdownSel" id="BreakdownSel"><option value="Chart">Chart</option><option value="NextGen">NextGen</option><option value="Classic">Classic</option><select><br>'

    iText += '<br>'
    iText += '<input type="checkbox" id="DiacriticCheck" value="DiacriticCheck">&nbsp Remove Diacritics</input><br>'
    iText += '<input type="checkbox" id="ShortcutsCheck" value="ShortcutsCheck">&nbsp Keyboard Shortcuts On</input><br>'
    
    iText += '<br>'
    iText += '<input type="checkbox" id="CompactCheck" value="CompactCheck">&nbsp Compact History Table</input><br>'
    iText += '<input type="checkbox" id="NonMatchCheck" value="NonMatchCheck">&nbsp Ignore Non-Matches</input><br>'
    iText += '<input type="checkbox" id="ContributeCheck" value="ContributeCheck">&nbsp Contribute to Match DB</input><br>'

    iText += '</div>'
    iText += '<br><button class="buttonFunctionOptions" type="button" data-fancybox-close id="OptionClose" onclick="javascript:Close_Options(' + "'" + eText.replaceAll("'", "") + "'" + '),Update_Options(),jQuery.fancybox.close();" value="Close_Options">Close/Save</button>'

    oSpot.innerHTML = iText

    //With the options menu displayed, populate the values to match the user's current selected options
    document.getElementById("NumCalcSel").value = optArr.NumCalc
    document.getElementById("CiphersPerSel").value = optArr.PerRow
    document.getElementById("NumSeqSel").value = optArr.Sequences

    if (optArr.RemoveDiacritics == true) {document.getElementById("DiacriticCheck").checked = true}
    if (optArr.Reduce == true) {document.getElementById("ReductionCheck").checked = true}
    if (optArr.Headers == true) {document.getElementById("CipherNamesCheck").checked = true}
    if (optArr.LetterCount == true) {document.getElementById("LetterWordCheck").checked = true}
    if (optArr.ShowSimple == true) {document.getElementById("SimpleResultCheck").checked = true}

    if (optArr.CompactHistory == true) {document.getElementById("CompactCheck").checked = true}
    if (optArr.Shortcuts == true) {document.getElementById("ShortcutsCheck").checked = true}

    if (optArr.ShowChart == true) {document.getElementById("ChartCheck").checked = true}

    if (optArr.ShowBreakdown == true) {document.getElementById("BreakdownCheck").checked = true}    
    
    if (optArr.IgnoreNonMatches == true) {document.getElementById("NonMatchCheck").checked = true}
    document.getElementById("BreakdownSel").value = optArr.Breakdown

    if (document.getElementById("BreakdownCheck").checked == false) {document.getElementById("BreakdownSel").disabled = true}
    if (optArr.MatchContribute == true) {document.getElementById("ContributeCheck").checked = true}
}

function modBreakList() {
    if (document.getElementById("BreakdownCheck").checked == true) {
        document.getElementById("BreakdownSel").disabled = false
    } else {
        document.getElementById("BreakdownSel").disabled = true
    }
}

function Close_Options(impText) {
    //-------------Triggered when user clicks "Close" from Options menu. This should simply close the modal menu and return to the calculator
    let oSpot = document.getElementById("OptionSpot")
    let oModal = document.getElementById("optionsMod")

    optArr.NumCalc = document.getElementById("NumCalcSel").value
    if (!document.getElementById("CiphersPerSel") == false) {
        optArr.PerRow = document.getElementById("CiphersPerSel").value
    }
    optArr.Sequences = document.getElementById("NumSeqSel").value

    if (document.getElementById("DiacriticCheck").checked == true) {optArr.RemoveDiacritics = true} else {optArr.RemoveDiacritics = false}
    if (document.getElementById("ReductionCheck").checked == true) {optArr.Reduce = true} else {optArr.Reduce = false}
    if (!document.getElementById("CipherNamesCheck") == false) {
        if (document.getElementById("CipherNamesCheck").checked == true) {optArr.Headers = true} else {optArr.Headers = false}
    }
    if (document.getElementById("LetterWordCheck").checked == true) {optArr.LetterCount = true} else {optArr.LetterCount = false}
    if (document.getElementById("SimpleResultCheck").checked == true) {optArr.ShowSimple = true} else {optArr.ShowSimple = false}
   
    if (!document.getElementById("CompactCheck") == false && !document.getElementById("ShortcutsCheck") == false) {
        if (document.getElementById("CompactCheck").checked == true) {optArr.CompactHistory = true} else {optArr.CompactHistory = false}
        if (document.getElementById("ShortcutsCheck").checked == true) {optArr.Shortcuts = true} else {optArr.Shortcuts = false}
        
    }
    
    if (document.getElementById("ChartCheck").checked == true) {optArr.ShowChart = true} else {optArr.ShowChart = false}

    if (document.getElementById("BreakdownCheck").checked == true) {optArr.ShowBreakdown = true} else {optArr.ShowBreakdown = false}

    if (document.getElementById("NonMatchCheck").checked == true) {optArr.IgnoreNonMatches = true} else {optArr.IgnoreNonMatches = false}
    if (document.getElementById("ContributeCheck").checked == true) {optArr.MatchContribute = true} else {optArr.MatchContribute = false}

    if (!document.getElementById("BreakdownSel") == false) {
        optArr.Breakdown = document.getElementById("BreakdownSel").value
    }

    oSpot = document.getElementById("OptionSpot").innerHTML = ""
    oModal = document.getElementById("optionsMod").style.display = "none"

    //Update the options and rebuild the Gematria and History 
    Update_Options()
    Build_GemTable()
    Build_GemChart()
    Build_HistoryTable()
    LoadEntry(impText)
}

function Update_Options() {
    //When user clicks "Close/Save" in the options menu, this query sends all the user's options back to the SQL database

    let qText = "tools/calculator-advanced/php/updateoptions.php"
    qText += "?breakdown=" + optArr.Breakdown
    if (optArr.RemoveDiacritics == true) {qText += "&removedia=1"} else {qText += "&removedia=0"}
    if (optArr.LetterCount == true) {qText += "&counts=1"} else {qText += "&counts=0"}
    if (optArr.ShowSimple == true) {qText += "&simple=1"} else {qText += "&simple=0"}
    if (optArr.ShowChart == true) {qText += "&chart=1"} else {qText += "&chart=0"}
    if (optArr.ShowBreakdown == true) {qText += "&showbreak=1"} else {qText += "&showbreak=0"}
    if (optArr.Reduce == true) {qText += "&reduce=1"} else {qText += "&reduce=0"}
    if (optArr.Headers == true) {qText += "&headers=1"} else {qText += "&headers=0"}
    qText += "&perrow=" + optArr.PerRow
    qText += "&numcalc=" + optArr.NumCalc
    qText += "&numseq=" + optArr.Sequences
    if (optArr.IgnoreNonMatches == true) {qText += "&ignorenon=1"} else {qText += "&ignorenon=0"}
    if (optArr.CompactHistory == true) {qText += "&compact=1"} else {qText += "&compact=0"}
    if (optArr.Shortcuts == true) {qText += "&shortcuts=1"} else {qText += "&shortcuts=0"}
    qText += "&historynames=" + optArr.HistoryNames.join("|")

    let xhttp = new XMLHttpRequest();
    let respText

    xhttp.open("POST", qText, true);
    xhttp.send();
    
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            //
        }
    }

    jQuery('#PresetDropdown').empty()
    jQuery('#PresetDropdown2').empty()
}

function Update_Ciphers() {
    //Triggered when user clicks "Save ciphers". Sends a string back to the SQL database
    let thisBox, thisCipher
    let saveSpot = document.getElementById("PresetDropdown").value
    let warningMess = ""

    switch (saveSpot) {
        case "Default": saveSpot = 0; warningMess = "Default"; break;
        case "Preset 1": saveSpot = 1; break;
        case "Preset 2": saveSpot = 2; break;
        case "Preset 3": saveSpot = 3; break;
        case "Preset 4": saveSpot = 4; break;
    }

    if (warningMess == "") {
        if (optArr.CipherSelection[saveSpot]) {
            if (confirm('Are you sure you wish to overwrite Preset ' + saveSpot + "?") == false) {return}
        }
    } else {
        if (confirm('Are you sure you wish to overwrite your Default settings?') == false) {return}
    }

    optArr.CipherOrder[saveSpot] = []; optArr.CipherSelection[saveSpot] = []

    for (let x = 0; x < allCiphers.length; x++) {
        thisCipher = allCiphers[x]
        thisBox = document.getElementById("Cipher" + x)
        optArr.CipherOrder[saveSpot].push(thisCipher.Nickname)

        if (thisBox.checked == true) {
            thisCipher.isOn = true
            optArr.CipherSelection[saveSpot].push(1)
        } else {
            thisCipher.isOn = false
            optArr.CipherSelection[saveSpot].push(0)
        }
    }

    Send_Ciphers()
    jQuery('#PresetDropdown option').remove()
    jQuery('#PresetDropdown2 option').remove()
}
function Close_Ciphers() {
    for (let x = 0; x < allCiphers.length; x++) {
        thisCipher = allCiphers[x]
        thisBox = document.getElementById("Cipher" + x)

        if (thisBox.checked == true) {
            thisCipher.isOn = true
        } else {
            thisCipher.isOn = false
        }
    }
    document.getElementById("cipherBox").innerHTML = ""
    Build_GemTable()
}

function Send_Ciphers() {
    //Sends a text string of active ciphers and their order to the Save Query

    let qText = "tools/calculator-advanced/php/updateuserciphers.php?"
    let cOrder = Get_CipherOrder()
    let cOn = Get_CiphersOn()

    if (cOrder !== "" && cOn !== "") {

        qText += "order=" + cOrder
        qText += "&selections=" + cOn

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
    
    document.getElementById("cipherBox").innerHTML = ""
    Build_GemTable()
}

function Load_Preset(impVal = -1) {
    let loadBox, loadSpot

    if (impVal == -1) {
        loadBox = document.getElementById("PresetDropdown2").value
        switch (loadBox) {
            case "Default": loadSpot = 0; break;
            case "Preset 1": loadSpot = 1; break;
            case "Preset 2": loadSpot = 2; break;
            case "Preset 3": loadSpot = 3; break;
            case "Preset 4": loadSpot = 4; break;
        }
    } else {
        loadSpot = impVal
    }

    if (optArr.CipherOrder[loadSpot] == undefined) {
        alert("This preset has not yet been created.")
    } else {
        RestoreCipherSettings(loadSpot)
        jQuery('#PresetDropdown option').remove()
        jQuery('#PresetDropdown2 option').remove()
        jQuery.fancybox.close()
        Build_GemTable()
    }
    NewBreakCipher()
}

function Cancel_Ciphers() {
    jQuery('#PresetDropdown option').remove()
    jQuery('#PresetDropdown2 option').remove()
    jQuery.fancybox.close()
}

function Open_Properties(impNum) {
    if (impNum > 0 && impNum < 10000000) {
        //window.open("number-properties?number=" + impNum, "Properties of " + impNum)
        let iHTML = '<button class="buttonFunction" onclick="Build_HistoryTable()">Show History</button><BR>'
        iHTML += '<object id="numberProperty" type="text/html" data="tools/number-properties-inline/index.php?number=' + impNum + '#numPropAnchor" ></object>';
        document.getElementById("MiscSpot").innerHTML = iHTML
    }
}

function toggleUserTables(){
    var x = document.getElementById("tablesContainer");
    if (window.matchMedia("(max-width: 991px)").matches) {
        if (x.style.left === "-305px") {
            document.getElementById("tablesContainer").style.left = "-305px";
            document.getElementById("tablesContainer").style.left = "0px"
            document.getElementById("tablesContainer").style.visibility = "visible";
            // document.getElementById("tablesTab").style.display = "none";
        } else {
            document.getElementById("tablesContainer").style.left = "-305px";
            document.getElementById("tablesTab").style.display = "flex";
        }
    } else {
        if (x.style.left === "-30%") {
            document.getElementById("tablesContainer").style.left = "-30%";
            document.getElementById("tablesContainer").style.left = "0px"
            document.getElementById("tablesContainer").style.visibility = "visible";
            // document.getElementById("tablesTab").style.display = "none";
        } else {
            document.getElementById("tablesContainer").style.left = "-30%";
            document.getElementById("tablesTab").style.display = "flex";
        }
    }
}


function toggleFunctions(){
    var x = document.getElementById("functionsContainer");
    if (window.matchMedia("(max-width: 991px)").matches) {
        if (x.style.right === "-305px") {
            document.getElementById("functionsContainer").style.right = "-305px";
            document.getElementById("functionsContainer").style.right = "0px";
            document.getElementById("functionsContainer").style.visibility = "visible";
            // document.getElementById("functionsTab").style.display = "none";
        } else {
            document.getElementById("functionsContainer").style.right = "-305px";
            document.getElementById("functionsTab").style.display = "flex";
        }
    } else {
        if (x.style.right === "-30%") {
            document.getElementById("functionsContainer").style.right = "-30%";
            document.getElementById("functionsContainer").style.right = "0px"
            document.getElementById("functionsContainer").style.visibility = "visible";
            // document.getElementById("functionsTab").style.display = "none";
        } else {
            document.getElementById("functionsContainer").style.right = "-30%";
            document.getElementById("functionsTab").style.display = "flex";
        }
    }
}
function toggleMenu(){
    var x = document.getElementById("calc-menu");
    if (x.style.display === "block") {
        x.style.display = "none"
    } else {
        x.style.display = "block"
    }
}
function menuIcon(x) {
  x.classList.toggle("change");
}
function openCipherShortcuts(){
    var x = document.getElementById("cipher-list-colored");
    if (x.style.display === "block") {
        x.style.display === "none"
    } else {
        x.style.display = "block"
    }
}
function closeCipherShortcuts(){
    var x = document.getElementById("cipher-list-colored");
    if (x.style.display === "none") {
        x.style.display === "block"
    } else {
        x.style.display = "none"
    }
}