//All needed textarea options are here!
//Needs to be expanded and better!
//Gen_1
$(document).ready(function () {
    let textEditor = $("#note_text");
    let textEditorValue = null;
    let selectedText = "";
    let fontTypeSelectedValue = "";
    let fontSizeSelectedValue = "";
    $("#font_family_selector").on("change", function () {
        fontTypeSelectedValue = $(this).val();
        textEditor.css("font-family", fontTypeSelectedValue);
    });
    $("#font_size_selector").on("change", function () {
        fontSizeSelectedValue = $(this).val();
        textEditor.css("font-size", fontSizeSelectedValue);
        console.log(fontSizeSelectedValue);
    });
});
