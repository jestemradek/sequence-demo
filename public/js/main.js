$(document).ready(function() {
    $("#sequence_form").on("submit", function(event) {
        event.preventDefault();
        let data = $('#sequence_numbers').val();
        $.post(
            "/ajax",
            { sequence_numbers: data },
            function(data) {
                $("#outputTbl").html(data);
            }
        );
    });
    $("#clearBtn").on("click", function() {
        $("#sequence_numbers").val("");
        $("#outputTbl").empty();
    });
 });