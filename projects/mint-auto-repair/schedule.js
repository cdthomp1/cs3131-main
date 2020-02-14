function showDate(id) {
    var dateField = document.getElementById("date");
    var date = id.replace(/([a-z])\w-+/g, "");
    dateField.value = date;

}