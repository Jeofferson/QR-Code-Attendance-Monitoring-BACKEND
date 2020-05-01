$(document).ready(function() {


    console.log("ready");


    $(".modalAdd").click(e => {
        
        $(".modalTitle").html("Add Student");
        $(".modalButtonSubmit").val("Create");

        $(".modalField1").val("");
        $(".modalField2").val("");
        $(".modalField3").val("");
        $(".modalField4").val("");
        $(".modalField5").val("");

    });


    $(".modalAddFaculty").click(e => {
        
        $(".modalTitle").html("Add Faculty");
        $(".modalButtonSubmit").val("Create");

        $(".modalField1").val("");
        $(".modalField2").val("");
        $(".modalField3").val("");
        $(".modalField4").val("");
        $(".modalField5").val("");

    });


    $(".modalEdit").click(e => {
        
        $(".modalTitle").html("Edit Student");
        $(".modalButtonSubmit").val("Edit");

        let textValues = displayData(e);

        console.log(textValues);

        $(".modalField1").val(textValues[0]);
        $(".modalField2").val(textValues[1]);
        $(".modalField3").val(textValues[2]);
        $(".modalField4").val(textValues[3]);
        $(".modalField5").val(textValues[4]);
        $(".modalField6").val(textValues[5]);

    });


    $(".modalEditFaculty").click(e => {
        
        $(".modalTitle").html("Edit Faculty");
        $(".modalButtonSubmit").val("Edit");

        let textValues = displayData(e);

        console.log(textValues);

        $(".modalField1").val(textValues[0]);
        $(".modalField2").val(textValues[1]);
        $(".modalField3").val(textValues[2]);
        $(".modalField4").val(textValues[3]);
        $(".modalField5").val(textValues[4]);
        $(".modalField6").val(textValues[5]);

    });


    function displayData(e) {

        let id = 0;

        const td = $("#tbody tr td");
        let textValues = [];

        console.log(td);

        for (const value of td) {

            if (value.dataset.id == e.target.dataset.id) {

                console.log("exec2");
                
                textValues[id++] = jQuery.trim(value.textContent);

            }

        }

        return textValues

    }


});