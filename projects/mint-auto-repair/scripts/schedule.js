var currentID = '';
var pastID = '';

function showDate(id) {
    checkIfPassed(id);
    changeColor(id);
    var dateField = document.getElementById("date");
    var date = id.replace(/([a-z])\w-+/g, "");
    dateField.value = date;

}

function checkIfPassed(id) {
    var d = new Date();
    var date = id.replace(/([a-z])\w-+/g, "");
    var dateArr = date.split("-");
    console.log(dateArr);
    console.log(d.getDate() - 1);
    var lastDate = d.getDate() - 1;
    if (dateArr[2] < lastDate + 1) {
        alert ("Please Select a day that is after the " + lastDate);
    }
}

function changeColor(id) {
    currentID = id;
    if (currentID !== pastID) {
       // console.log("CURRENT " + currentID);
       document.getElementById(id).style.backgroundColor = '#42989d';
       document.getElementById(id).style.color = '#ffffff';

    } 
    if (pastID !== '') {
        //console.log("PAST " + pastID);
        document.getElementById(pastID).style.backgroundColor = '#dddddd';
        document.getElementById(pastID).style.color = '#000000';
    }
    
    pastID = id;
}