function cartAction(action, product_code) {
    var queryString = "";
    if (action != "") {
        switch (action) {
            case "add":
                console.log(queryString)
                queryString = 'action=' + action + '&code=' + product_code +
                    '&quantity=' + $("#qty_" + product_code).val();
                    console.log(queryString)
                break;
            case "remove":
                console.log("CLICK REMOVE")
                console.log(queryString)
                queryString = 'action=' + action + '&code=' + product_code;
                console.log(queryString)
                break;
            case "empty":
                queryString = 'action=' + action;
                break;
        }
    }

    console.log(queryString);

    jQuery.ajax({
        url: "cart-action.php",
        data: queryString,
        type: "POST",
        success: function(data) {
            $("#cart-item").html(data);
            if (action == "add") {
                $("#add_" + product_code + " img").attr("src",
                    "images/icon-check.png");
                $("#add_" + product_code).attr("onclick", "");
            }
        },
        error: function() { alert("THERE WAS AN ERROR PROCESSING YOUR REQUEST");}
    });
}