var currentID = '';
var pastID = '';

function showDate(id) {
    changeColor(id);
    var dateField = document.getElementById("date");
    var date = id.replace(/([a-z])\w-+/g, "");
    dateField.value = date;

}

function changeColor(id) {
    currentID = id;
    if (currentID !== pastID) {
        console.log("CURRENT " + currentID);
        document.getElementById(id).style.backgroundColor = '#42989d';
    } 
    if (pastID !== '') {
        console.log("PAST " + pastID);
        document.getElementById(pastID).style.backgroundColor = '#dddddd';
    }
    
    pastID = id;
}