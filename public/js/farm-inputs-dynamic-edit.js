$(function() {
    // Loop through object that is constructed when new inputs are added and update ul & li appropriately
    var updateFarmInputsList = function() {
        $('#farm_input_list').empty();
        var parsedFarmInputs = JSON.parse($("#_farminputs").val());
        for (var farmInput in parsedFarmInputs) {
            if (parsedFarmInputs.hasOwnProperty(farmInput)) {
                $("#farm_input_list").append('<li id=' + farmInput + '><i class="fa fa-close pull-right" style="color:red;margin-top:3px;cursor:pointer;"></i>' + farmInput + ' - ' + parsedFarmInputs[farmInput] + '</li>');
            }
        }
    };

    // initially set inputs and _farminputs to the value of the farmer's farm inputs
    var inputs = JSON.parse($("#_farminputs").val());
    $("#_farminputs").val(JSON.stringify(inputs));

    // call method and do initial setup of farm input lists
    updateFarmInputsList();

    // perform operations on add button click
    $("#farm_input_add").on("click", function() {
        // make sure fields are not empty
        if ($.trim($("#farm_input_name").val()) == "" || $.trim($("#farm_input_quantity").val()) == "") {
            $("#farm_input_error").text("Farm Input Name or Quantity cannot be empty");
        } else {
            // check if farm input has been added already and display appropriate error message
            var parsedFarmInputs = JSON.parse($("#_farminputs").val());
            if (parsedFarmInputs.hasOwnProperty($("#farm_input_name").val())) {
                $("#farm_input_error").text($("#farm_input_name").val() + " has already been added");
            } else {
                $("#farm_input_error").text("");
                inputs[$("#farm_input_name").val()] = $("#farm_input_quantity").val();
                $("#_farminputs").val(JSON.stringify(inputs));
                updateFarmInputsList();
            }
        }
    });

    // perform operations on remove button click
    $("#farm_input_list").on("click", "li", function() {
        // loop through current inputs and delete appropriate selection
        var parsedFarmInputs = JSON.parse($("#_farminputs").val());
        delete inputs[$(this).attr('id')];
        $("#_farminputs").val(JSON.stringify(inputs));
        updateFarmInputsList();
    });
});
