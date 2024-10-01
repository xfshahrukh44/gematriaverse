function updateDateDisplay(section) {
    const month = document.getElementById(`Month${section}`).value;
    const day = document.getElementById(`Day${section}`).value;
    const year = document.getElementById(`Year${section}`).value;

    if (month && day && year) {
        const date = new Date(year, month - 1, day);
        document.getElementById(`DateHeader${section}`).innerText = date.toDateString();
    }

    // Call function to handle the final date comparison and display
    showFinalDates();
    generateVariations();
    calculateDateValues1();
    calculateDateValues2();
}

function generateVariations() {

    const prevMonth = document.getElementById('Month1').value;
    const prevDay = document.getElementById('Day1').value;
    const prevYear = document.getElementById('Year1').value;

    const currMonth = document.getElementById('Month2').value;
    const currDay = document.getElementById('Day2').value;
    const currYear = document.getElementById('Year2').value;

    const includeEndDate = document.getElementById('Check_End').checked;

    const previousDate = moment(`${prevYear}-${prevMonth}-${prevDay}`);
    const currentDate = moment(`${currYear}-${currMonth}-${currDay}`);

    // Determine the correct start and end dates
    const fromDate = previousDate.isBefore(currentDate) ? previousDate : currentDate;
    let toDate = previousDate.isAfter(currentDate) ? previousDate : currentDate;

    // If "Include End Date" is checked, add 1 day to the `toDate`
    if (includeEndDate) {
        toDate.add(1, 'days');
    }

    let variationsHTML = '';

    // Calculate total duration in different units
    const totalYears = toDate.diff(fromDate, 'years');
    const totalMonths = toDate.diff(fromDate, 'months');
    const totalWeeks = toDate.diff(fromDate, 'weeks');
    const totalDays = toDate.diff(fromDate, 'days');

    // Add variations based on different breakdowns with your specific HTML structure
    variationsHTML += `
        <span><a href="javascript:void(0)">
            <font class="DurNum target_number">${totalYears}</font>
        </a> Year, </span><span><a href="javascript:void(0)">
            <font class="DurNum target_number">0</font>
        </a> Days</span><br>
    `;

    variationsHTML += `
        <span><a href="javascript:void(0)">
            <font class="DurNum target_number">${totalYears}</font>
        </a> Year, </span><span><a href="javascript:void(0)">
            <font class="DurNum target_number">0</font>
        </a> Months, <a href="javascript:void(0)">
            <font class="DurNum target_number">0</font>
        </a> Days</span><br>
    `;

    variationsHTML += `
        <span><a href="javascript:void(0)">
            <font class="DurNum target_number">${totalYears}</font>
        </a> Year, </span><span><a href="javascript:void(0)">
            <font class="DurNum target_number">0</font>
        </a> Weeks, <a href="javascript:void(0)">
            <font class="DurNum target_number">0</font>
        </a> Days</span><br>
    `;

    variationsHTML += `
        <span><a href="javascript:void(0)">
            <font class="DurNum target_number">${totalMonths}</font>
        </a> Months, <a href="javascript:void(0)">
            <font class="DurNum target_number">0</font>
        </a> Days</span><br>
    `;

    const remainingWeeks = totalWeeks % 52;
    const remainingDaysInWeeks = totalDays % 7;
    variationsHTML += `
        <span><a href="javascript:void(0)">
            <font class="DurNum target_number">${totalWeeks}</font>
        </a> Weeks, <a href="javascript:void(0)">
            <font class="DurNum target_number">${remainingDaysInWeeks}</font>
        </a> Days</span><br>
    `;

    variationsHTML += `
        <span><a href="javascript:void(0)">
            <font class="DurNum target_number">${totalDays}</font>
        </a> Days</span><br>
    `;

    document.getElementById('YearTable').innerHTML = variationsHTML;
}

function showFinalDates() {
    const prevMonth = document.getElementById('Month1').value;
    const prevDay = document.getElementById('Day1').value;
    const prevYear = document.getElementById('Year1').value;

    const currMonth = document.getElementById('Month2').value;
    const currDay = document.getElementById('Day2').value;
    const currYear = document.getElementById('Year2').value;

    const includeEndDate = document.getElementById('Check_End').checked;

    const previousDate = moment(`${prevYear}-${prevMonth}-${prevDay}`);
    const currentDate = moment(`${currYear}-${currMonth}-${currDay}`);

    // Determine the correct start and end dates
    const fromDate = previousDate.isBefore(currentDate) ? previousDate : currentDate;
    let toDate = previousDate.isAfter(currentDate) ? previousDate : currentDate;

    // If "Include End Date" is checked, add 1 day to the `toDate`
    if (includeEndDate) {
        toDate.add(1, 'days');
    }

    const selectedIntervals = [];
    const showDays = document.getElementById('showDays').checked;
    const showWeeks = document.getElementById('showWeeks').checked;
    const showMonths = document.getElementById('showMonths').checked;
    const showYears = document.getElementById('showYears').checked;

    // Add selected intervals to the array
    if (showYears) selectedIntervals.push('years');
    if (showMonths) selectedIntervals.push('months');
    if (showWeeks) selectedIntervals.push('weeks');
    if (showDays) selectedIntervals.push('days');

    const out = [];

    // Log the start and end dates
    // console.log("Start Date: ", fromDate.format('YYYY-MM-DD'));
    // console.log("End Date: ", toDate.format('YYYY-MM-DD'));

    // Calculate years if selected
    if (selectedIntervals.includes('years')) {
        let totalYears = toDate.diff(fromDate, 'years');
        out.push(totalYears + ' Year' + (totalYears !== 1 ? 's' : ''));
        fromDate.add(totalYears, 'years'); // Update start date
    }

    // Calculate months if selected
    if (selectedIntervals.includes('months')) {
        let totalMonths = toDate.diff(fromDate, 'months');
        out.push(totalMonths + ' Month' + (totalMonths !== 1 ? 's' : ''));
        fromDate.add(totalMonths, 'months'); // Update start date
    }

    // Calculate weeks if selected
    if (selectedIntervals.includes('weeks')) {
        let totalWeeks = toDate.diff(fromDate, 'weeks');
        out.push(totalWeeks + ' Week' + (totalWeeks !== 1 ? 's' : ''));
        fromDate.add(totalWeeks, 'weeks'); // Update start date
    }

    // Calculate days if selected
    if (selectedIntervals.includes('days')) {
        let totalDays = toDate.diff(fromDate, 'days');
        out.push(totalDays + ' Day' + (totalDays !== 1 ? 's' : ''));
    }

    // Handle the case where no intervals are selected
    if (out.length === 0) {
        out.push('0 Days');
    }

    // Join the output and update the displayed dates and duration
    const durationText = out.join(', ');

    // Update the date display
    document.querySelector('#DurationDetailsInner .DurationStringMain:nth-of-type(1)').innerText = fromDate.format('dddd, MMMM Do YYYY');
    document.querySelector('#DurationDetailsInner .DurationStringMain:nth-of-type(2)').innerText = toDate.format('dddd, MMMM Do YYYY');
    document.querySelector('#DurationDetailsInner .DurNumMain').innerText = durationText;
}

function initializeDateInputs() {
    const today = new Date();

    const previousYear = today.getFullYear() - 1;
    document.getElementById('Month1').value = today.getMonth() + 1;
    document.getElementById('Day1').value = today.getDate();
    document.getElementById('Year1').value = previousYear;
    updateDateDisplay(1);

    document.getElementById('Month2').value = today.getMonth() + 1;
    document.getElementById('Day2').value = today.getDate();
    document.getElementById('Year2').value = today.getFullYear();
    updateDateDisplay(2);
}

function formatDayOfYear(day, month) {
    const months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
                    "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

    const monthAbbreviation = months[month - 1];

    return `(${monthAbbreviation}-${day})`;
}

function calculateDateValues1() {
    const month = parseInt(document.getElementById('Month1').value, 10);
    const day = parseInt(document.getElementById('Day1').value, 10);
    const year = parseInt(document.getElementById('Year1').value, 10);
    const yearString = year.toString().split('').join('+');
    const monthString = month.toString().split('').join('+');
    const lastYearString = (year % 100).toString().split('').join('+');

    const lastYearStringMulti = (year % 100).toString().split('').filter(char => char !== '0').join('x');
    const lastyearSum7 = lastYearStringMulti.split('x').map(Number).reduce((acc, num) => acc * num, 1);

    const monthStringMulti = month.toString().split('').filter(char => char !== '0').join('x');
    const monthSum6 = monthStringMulti.split('x').map(Number).reduce((acc, num) => acc * num, 1);

    const dayStringMulti = day.toString().split('').filter(char => char !== '0').join('x');
    const daySum6 = dayStringMulti.split('x').map(Number).reduce((acc, num) => acc * num, 1);

    const yearStringMulti = year.toString().split('').filter(char => char !== '0').join('x');
    const yearSum6 = yearStringMulti.split('x').map(Number).reduce((acc, num) => acc * num, 1);

    const sumOfDigits = year
        .toString()
        .split('')
        .map(Number)
        .reduce((acc, curr) => acc + curr, 0);

    const monthfDigits = month
        .toString()
        .split('')
        .map(Number)
        .reduce((acc, curr) => acc + curr, 0);

    const lastYearfDigits = (year % 100)
        .toString()
        .split('')
        .map(Number)
        .reduce((acc, curr) => acc + curr, 0);

    const targetDate = new Date(year, month - 1, day);
    const startOfYear = new Date(year, 0, 1);

    const timeDiff = targetDate - startOfYear;
    const daysCount = Math.floor(timeDiff / (1000 * 60 * 60 * 24)) + 1;

    const sum1 = month + day + Math.floor(year / 100) + (year % 100);
    const sum2 = month + day + sumOfDigits;
    const sum3 = monthfDigits + day + sumOfDigits;
    const sum4 = month + day + (year % 100);
    const sum5 = monthfDigits + day + lastYearfDigits;
    const sum6 = monthSum6 * daySum6 * yearSum6;
    const sum7 = monthSum6 * daySum6 * lastyearSum7;

    const sum1Text = `(${month}) + (${day}) + (${Math.floor(year / 100)}) + (${(year % 100)})`;
    const sum2Text = `(${month}) + (${day}) + ${yearString}`;
    const sum3Text = `${monthString} + (${day}) + ${yearString}`;
    const sum4Text = `(${month}) + (${day}) + (${year % 100})`;
    const sum5Text = `${monthString} + ${day} + ${lastYearString}`;
    const sum6Text = `${monthStringMulti}x${dayStringMulti}x${yearStringMulti}`;
    const sum7Text = `${monthStringMulti}x${dayStringMulti}x${lastYearStringMulti}`;

    const dayOfYear = daysCount;
    const daysLeft = 365 - dayOfYear;

    const dayOfYearText = `Day of Year: ${formatDayOfYear(day, month)}`;
    const daysLeftText = `Days Left in Year: ${formatDayOfYear(day, month)}`;

    // Update HTML elements with the results
    document.getElementById('DateStr1').innerHTML = sum1Text;
    document.getElementById('DateNum1').innerHTML = `<a href="javascript:void(0)" class="target_number">${sum1}</a>`;

    const numsHtml = `
        <div><span class="dateNumSpan">
            <a href="javascript:void(0)" onclick="showFormulaAndChangeColor('sum1', ${sum1}, this)">
                <font color="#1862cf" id="link-sum1">${sum1}</font></a>
        </span><span class="dateNumSpan">
            <a href="javascript:void(0)" onclick="showFormulaAndChangeColor('sum2', ${sum2}, this)">
                <font color="white" id="link-sum2">${sum2}</font></a>
        </span><span class="dateNumSpan">
            <a href="javascript:void(0)" onclick="showFormulaAndChangeColor('sum3', ${sum3}, this)">
                <font color="white" id="link-sum3">${sum3}</font></a>
        </span><span class="dateNumSpan">
            <a href="javascript:void(0)" onclick="showFormulaAndChangeColor('sum4', ${sum4}, this)">
                <font color="white" id="link-sum4">${sum4}</font></a>
        </span><span class="dateNumSpan">
            <a href="javascript:void(0)" onclick="showFormulaAndChangeColor('sum5', ${sum5}, this)">
                <font color="white" id="link-sum5">${sum5}</font></a>
        </span><span class="dateNumSpan">
            <a href="javascript:void(0)" onclick="showFormulaAndChangeColor('dayOfYear', ${dayOfYear}, this)">
                <font color="yellow" id="link-dayOfYear">${dayOfYear}</font></a>
        </span><span class="dateNumSpan">
            <a href="javascript:void(0)" onclick="showFormulaAndChangeColor('daysLeft', ${daysLeft}, this)">
                <font color="yellow" id="link-daysLeft">${daysLeft}</font></a>
        </span><span class="dateNumSpan">
            <a href="javascript:void(0)" onclick="showFormulaAndChangeColor('sum6', ${sum6}, this)">
                <font color="lightblue" id="link-sum6">${sum6}</font></a>
        </span><span class="dateNumSpan">
            <a href="javascript:void(0)" onclick="showFormulaAndChangeColor('sum7', ${sum7}, this)">
                <font color="lightblue" id="link-sum7">${sum7}</font></a>
        </span></div>
    `;

    document.getElementById('DateNums1').innerHTML = numsHtml;

    window.formulas = {
        sum1: sum1Text,
        sum2: sum2Text,
        sum3: sum3Text,
        sum4: sum4Text,
        sum5: sum5Text,
        sum6: sum6Text,
        sum7: sum7Text,
        dayOfYear: dayOfYearText,
        daysLeft: daysLeftText
    };
}

function showFormula(sumKey, result) {
    document.getElementById('DateStr1').innerHTML = window.formulas[sumKey];
    const dateNumElement = document.getElementById('DateNum1');
    dateNumElement.innerHTML = result;
    dateNumElement.classList.add('target_number');
}

function showFormulaAndChangeColor(sumKey, result, element) {
    showFormula(sumKey, result);
    resetLinkColors();
    element.querySelector('font').setAttribute('color', '#1862cf');
}

function resetLinkColors() {
    const colors = {
        'sum1': 'white',
        'sum2': 'white',
        'sum3': 'white',
        'sum4': 'white',
        'sum5': 'white',
        'dayOfYear': 'yellow',
        'daysLeft': 'yellow',
        'sum6': 'lightblue',
        'sum7': 'lightblue'
    };

    for (const id in colors) {
        const fontElement = document.getElementById(`link-${id}`);
        if (fontElement) {
            fontElement.setAttribute('color', colors[id]);
        }
    }
}



function calculateDateValues2() {
    const month = parseInt(document.getElementById('Month2').value, 10);
    const day = parseInt(document.getElementById('Day2').value, 10);
    const year = parseInt(document.getElementById('Year2').value, 10);
    const yearString = year.toString().split('').join('+');
    const monthString = month.toString().split('').join('+');
    const lastYearString = (year % 100).toString().split('').join('+');

    const lastYearStringMulti = (year % 100).toString().split('').filter(char => char !== '0').join('x');
    const lastyearSum7 = lastYearStringMulti.split('x').map(Number).reduce((acc, num) => acc * num, 1);

    const monthStringMulti = month.toString().split('').filter(char => char !== '0').join('x');
    const monthSum6 = monthStringMulti.split('x').map(Number).reduce((acc, num) => acc * num, 1);

    const dayStringMulti = day.toString().split('').filter(char => char !== '0').join('x');
    const daySum6 = dayStringMulti.split('x').map(Number).reduce((acc, num) => acc * num, 1);

    const yearStringMulti = year.toString().split('').filter(char => char !== '0').join('x');
    const yearSum6 = yearStringMulti.split('x').map(Number).reduce((acc, num) => acc * num, 1);

    const sumOfDigits = year
        .toString()
        .split('')
        .map(Number)
        .reduce((acc, curr) => acc + curr, 0);

    const monthfDigits = month
        .toString()
        .split('')
        .map(Number)
        .reduce((acc, curr) => acc + curr, 0);

    const lastYearfDigits = (year % 100)
        .toString()
        .split('')
        .map(Number)
        .reduce((acc, curr) => acc + curr, 0);

    const targetDate = new Date(year, month - 1, day);
    const startOfYear = new Date(year, 0, 1);

    const timeDiff = targetDate - startOfYear;
    const daysCount = Math.floor(timeDiff / (1000 * 60 * 60 * 24)) + 1;

    const sum1 = month + day + Math.floor(year / 100) + (year % 100);
    const sum2 = month + day + sumOfDigits;
    const sum3 = monthfDigits + day + sumOfDigits;
    const sum4 = month + day + (year % 100);
    const sum5 = monthfDigits + day + lastYearfDigits;
    const sum6 = monthSum6 * daySum6 * yearSum6;
    const sum7 = monthSum6 * daySum6 * lastyearSum7;

    const sum1Text = `(${month}) + (${day}) + (${Math.floor(year / 100)}) + (${(year % 100)})`;
    const sum2Text = `(${month}) + (${day}) + ${yearString}`;
    const sum3Text = `${monthString} + (${day}) + ${yearString}`;
    const sum4Text = `(${month}) + (${day}) + (${year % 100})`;
    const sum5Text = `${monthString} + ${day} + ${lastYearString}`;
    const sum6Text = `${monthStringMulti}x${dayStringMulti}x${yearStringMulti}`;
    const sum7Text = `${monthStringMulti}x${dayStringMulti}x${lastYearStringMulti}`;

    const dayOfYear = daysCount;
    const daysLeft = 365 - dayOfYear;

    const dayOfYearText = `Day of Year: ${formatDayOfYear(day, month)}`;
    const daysLeftText = `Days Left in Year: ${formatDayOfYear(day, month)}`;

    // Update HTML elements with the results
    document.getElementById('DateStr2').innerHTML = sum1Text;
    document.getElementById('DateNum2').innerHTML = `<a href="javascript:void(0)" class="target_number">${sum1}</a>`;

    const numsHtml = `
        <div><span class="dateNumSpan">
            <a href="javascript:void(0)" onclick="showFormulaAndChangeColor2('sum1', ${sum1}, this)">
                <font color="#1862cf" id="link2-sum1">${sum1}</font></a>
        </span><span class="dateNumSpan">
            <a href="javascript:void(0)" onclick="showFormulaAndChangeColor2('sum2', ${sum2}, this)">
                <font color="white" id="link2-sum2">${sum2}</font></a>
        </span><span class="dateNumSpan">
            <a href="javascript:void(0)" onclick="showFormulaAndChangeColor2('sum3', ${sum3}, this)">
                <font color="white" id="link2-sum3">${sum3}</font></a>
        </span><span class="dateNumSpan">
            <a href="javascript:void(0)" onclick="showFormulaAndChangeColor2('sum4', ${sum4}, this)">
                <font color="white" id="link2-sum4">${sum4}</font></a>
        </span><span class="dateNumSpan">
            <a href="javascript:void(0)" onclick="showFormulaAndChangeColor2('sum5', ${sum5}, this)">
                <font color="white" id="link2-sum5">${sum5}</font></a>
        </span><span class="dateNumSpan">
            <a href="javascript:void(0)" onclick="showFormulaAndChangeColor2('dayOfYear', ${dayOfYear}, this)">
                <font color="yellow" id="link2-dayOfYear">${dayOfYear}</font></a>
        </span><span class="dateNumSpan">
            <a href="javascript:void(0)" onclick="showFormulaAndChangeColor2('daysLeft', ${daysLeft}, this)">
                <font color="yellow" id="link2-daysLeft">${daysLeft}</font></a>
        </span><span class="dateNumSpan">
            <a href="javascript:void(0)" onclick="showFormulaAndChangeColor2('sum6', ${sum6}, this)">
                <font color="lightblue" id="link2-sum6">${sum6}</font></a>
        </span><span class="dateNumSpan">
            <a href="javascript:void(0)" onclick="showFormulaAndChangeColor2('sum7', ${sum7}, this)">
                <font color="lightblue" id="link2-sum7">${sum7}</font></a>
        </span></div>
    `;

    document.getElementById('DateNums2').innerHTML = numsHtml;

    window.formulas = {
        sum1: sum1Text,
        sum2: sum2Text,
        sum3: sum3Text,
        sum4: sum4Text,
        sum5: sum5Text,
        sum6: sum6Text,
        sum7: sum7Text,
        dayOfYear: dayOfYearText,
        daysLeft: daysLeftText
    };
}

function showFormula2(sumKey, result) {
    document.getElementById('DateStr2').innerHTML = window.formulas[sumKey];
    const dateNumElement = document.getElementById('DateNum2');
    dateNumElement.innerHTML = result;
    dateNumElement.classList.add('target_number');
}

function showFormulaAndChangeColor2(sumKey, result, element) {
    showFormula2(sumKey, result);
    resetLinkColors2();
    element.querySelector('font').setAttribute('color', '#1862cf');
}

function resetLinkColors2() {
    const colors = {
        'sum1': 'white',
        'sum2': 'white',
        'sum3': 'white',
        'sum4': 'white',
        'sum5': 'white',
        'dayOfYear': 'yellow',
        'daysLeft': 'yellow',
        'sum6': 'lightblue',
        'sum7': 'lightblue'
    };

    for (const id in colors) {
        const fontElement = document.getElementById(`link2-${id}`);
        if (fontElement) {
            fontElement.setAttribute('color', colors[id]);
        }
    }
}

// Event listeners to detect changes in inputs
document.getElementById('Month1').addEventListener('input', () => updateDateDisplay(1));
document.getElementById('Day1').addEventListener('input', () => updateDateDisplay(1));
document.getElementById('Year1').addEventListener('input', () => updateDateDisplay(1));

document.getElementById('Month2').addEventListener('input', () => updateDateDisplay(2));
document.getElementById('Day2').addEventListener('input', () => updateDateDisplay(2));
document.getElementById('Year2').addEventListener('input', () => updateDateDisplay(2));

// Event listeners for checkboxes
document.getElementById('showDays').addEventListener('change', showFinalDates);
document.getElementById('showWeeks').addEventListener('change', showFinalDates);
document.getElementById('showMonths').addEventListener('change', showFinalDates);
document.getElementById('showYears').addEventListener('change', showFinalDates);

document.getElementById('Check_End').addEventListener('change', showFinalDates);

document.getElementById('Month1').addEventListener('change', calculateDateValues1);
document.getElementById('Day1').addEventListener('change', calculateDateValues1);
document.getElementById('Year1').addEventListener('change', calculateDateValues1);

document.getElementById('Month1').addEventListener('keyup', calculateDateValues1);
document.getElementById('Day1').addEventListener('keyup', calculateDateValues1);
document.getElementById('Year1').addEventListener('keyup', calculateDateValues1);

document.getElementById('Month2').addEventListener('change', calculateDateValues2);
document.getElementById('Day2').addEventListener('change', calculateDateValues2);
document.getElementById('Year2').addEventListener('change', calculateDateValues2);

document.getElementById('Month2').addEventListener('keyup', calculateDateValues2);
document.getElementById('Day2').addEventListener('keyup', calculateDateValues2);
document.getElementById('Year2').addEventListener('keyup', calculateDateValues2);

window.onload = initializeDateInputs;
