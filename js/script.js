$(document).ready(function () {
    $("#popupBack").hide();
    $("#popupConfirmBox").hide();

});

function showConfirmBox(message, url) {
    $("#popupBack").fadeIn();
    $("#popupConfirmBox").fadeIn(300);
    $("#messageArea").html(message);
    $("#url").attr("href", url);
}

function closeConfirmBox() {
    $("#popupBack").fadeOut(300);
    $("#popupConfirmBox").fadeOut();
}
