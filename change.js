$(document).ready(function() {
    $("#drp_dwn").change(function () {
        var str = "";

        $("selected").each(function () {
            str += $(this).text() + " ";
            });
        $("textArea").text(str);
        }).change();
});