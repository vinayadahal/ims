$(document).ready(function () {
    $("#popupBack").hide();
    $("#popupConfirmBox").hide();
    alert($("#url").attr('href'));
});

function showConfirmBox(message) {
    $("#popupBack").fadeIn();
    $("#popupConfirmBox").fadeIn(300);
    $("#messageArea").html(message);
}

function closeConfirmBox() {
    $("#popupBack").fadeOut(300);
    $("#popupConfirmBox").fadeOut();
}
