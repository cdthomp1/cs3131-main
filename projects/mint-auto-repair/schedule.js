function showDate(id) {
    showForm();
    var dateField = document.getElementById("date");
    var date = id.replace(/([a-z])\w-+/g, "");
    dateField.value = date;

}

function showForm() {
    document.getElementsByClassName("scheduleForm")[0].display = "block";
}