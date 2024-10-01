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
            <font class="DurNum">${totalYears}</font>
        </a> Year, </span><span><a href="javascript:void(0)">
            <font class="DurNum">0</font>
        </a> Days</span><br>
    `;

    variationsHTML += `
        <span><a href="javascript:void(0)">
            <font class="DurNum">${totalYears}</font>
        </a> Year, </span><span><a href="javascript:void(0)">
            <font class="DurNum">0</font>
        </a> Months, <a href="javascript:void(0)">
            <font class="DurNum">0</font>
        </a> Days</span><br>
    `;

    variationsHTML += `
        <span><a href="javascript:void(0)">
            <font class="DurNum">${totalYears}</font>
        </a> Year, </span><span><a href="javascript:void(0)">
            <font class="DurNum">0</font>
        </a> Weeks, <a href="javascript:void(0)">
            <font class="DurNum">0</font>
        </a> Days</span><br>
    `;

    variationsHTML += `
        <span><a href="javascript:void(0)">
            <font class="DurNum">${totalMonths}</font>
        </a> Months, <a href="javascript:void(0)">
            <font class="DurNum">0</font>
        </a> Days</span><br>
    `;

    const remainingWeeks = totalWeeks % 52;
    const remainingDaysInWeeks = totalDays % 7;
    variationsHTML += `
        <span><a href="javascript:void(0)">
            <font class="DurNum">${totalWeeks}</font>
        </a> Weeks, <a href="javascript:void(0)">
            <font class="DurNum">${remainingDaysInWeeks}</font>
        </a> Days</span><br>
    `;

    variationsHTML += `
        <span><a href="javascript:void(0)">
            <font class="DurNum">${totalDays}</font>
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

    return `Day of Year: (${monthAbbreviation}-${day})`;
}

function calculateDateValues() {
    const month = parseInt(document.getElementById('Month1').value, 10);
    const day = parseInt(document.getElementById('Day1').value, 10);
    const year = parseInt(document.getElementById('Year1').value, 10);
    const yearString = year.toString().split('').join('+');
    const monthString = month.toString().split('').join('+');
    const lastYearString = (year % 100).toString().split('').join('+');
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

    // Calculate the difference in time and convert to days
    const timeDiff = targetDate - startOfYear; // Difference in milliseconds
    const daysCount = Math.floor(timeDiff / (1000 * 60 * 60 * 24)) + 1; // Convert to days and add 1


    // Calculations
    const sum1 = month + day + Math.floor(year / 100) + (year % 100); // 10 + 1 + 20 + 23 = 54
    const sum2 = month + day + sumOfDigits; // 10 + 1 + 2 + 0 + 2 + 3 = 18
    const sum3 = monthfDigits + day + sumOfDigits; // 1 + 0 + 1 + 2 + 0 + 2 + 3 = 9
    const sum4 = month + day + (year % 100); // (10) + (1) + (23) = 34
    const sum5 = monthfDigits + day + lastYearfDigits; // 1 + 0 + 1 + 2 + 3 = 7

    const sum1Text = `(${month}) + (${day}) + (${Math.floor(year / 100)}) + (${(year % 100)})`;
    const sum2Text = `(${month}) + (${day}) + ${yearString}`;
    const sum3Text = `${monthString} + (${day}) + ${yearString}`;
    const sum4Text = `(${month}) + (${day}) + (${year % 100})`;
    const sum5Text = `${monthString} + ${day} + ${lastYearString}`;

    // Day of Year Calculation
    const dayOfYear = daysCount;
    const daysLeft = 365 - dayOfYear;

    const dayOfYearText = `${formatDayOfYear(day, month)} = ${dayOfYear}`;
    const daysLeftText = `${formatDayOfYear(day, month)} = ${dayOfYear}`;

    console.log(sum5Text);
    return {
        sum1,
        sum2,
        sum3,
        sum4,
        sum5,
        dayOfYear,
        daysLeft
    };
}

const results = calculateDateValues();
console.log(results);


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

window.onload = initializeDateInputs;
