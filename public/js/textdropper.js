var savePhrase

function BuildFromText(impEvent) {
    let file

    //Set Entry field as target
    const eBox = document.getElementById("EntryField")
    eBox.value = savePhrase
    eBox.style.border = "1px solid white"

    impEvent.preventDefault()

    //Gather the first dragged file (only one that will register) and make sure it's .txt
    file = impEvent.dataTransfer.files[0]
    if (file.name.slice(-4).toLowerCase() !== ".txt") {return}
    var reader = new FileReader()

    reader.onload = (event) => {
        file = event.target.result
        txtArray = file.split(/\r\n|\n/)
        HistoryFromText(txtArray)
    }

    reader.onerror = (event) => {
        alert(event.target.error.name)
    };

    reader.readAsText(file)
}

function HistoryFromText(impArr) {
    let newHist, newArr
    const maxImps = maxHistory - userHistory[activeTable].length

    for (let x = Math.min(maxImps, impArr.length - 1); x > -1; x--) {
        thisPhrase = impArr[x]

        if (thisPhrase == "") {continue}
        thisPhrase = TrimToHistory(thisPhrase)
        if (IsInSaveTables(thisPhrase) !== -1 || HistoryPlace(thisPhrase) !== -1) {continue}

        newHist = new HistoryItem(thisPhrase)
        userHistory[activeTable].unshift(newHist)
    }

    Build_HistoryTable()
}

function ShowDropTarget() {
    const eBox = document.getElementById("EntryField")
    savePhrase = eBox.value
    eBox.value = "DROP .TXT FILE HERE"
    eBox.style.border = "3px solid green"
}
function RemoveDropTarget() {
    const eBox = document.getElementById("EntryField")
    eBox.value = savePhrase
    eBox.style.border = "1px solid white"
}