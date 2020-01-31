function getCustomerInfo(){
    var queryString = "";
    var name = document.getElementById("fname").value

    //firstname=Cameron&email=camthomp96@gmail.com&address=175 W 5th S, apt 108&city=Rexburg&state=ID&zip=83440

    jQuery.ajax({
        url: "order.php",
        data: queryString,
        type: "POST",
        error: function() { alert("THERE WAS AN ERROR PROCESSING YOUR REQUEST");}
    });
}