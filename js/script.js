$(document).ready(function () {
    $("#popupBack").hide();
    $("#popupConfirmBox").hide();
    $("#growl-box").hide();
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

function show_flash(msg, code) {
    $("#growl-box").html(msg);
    if (code === 'error') {
        $("#growl-box").css({
            'background-color': 'rgba(250, 0, 0, 0.7)',
            'color': '#fff'
        });
    } else {
        $("#growl-box").css({
            'background-color': 'rgba(230, 230, 0, 0.7)',
            'color': '#555'
        });
    }
    $("#growl-box").fadeIn('slow');
    setInterval(function () {
        $("#growl-box").fadeOut('slow');
    }, 5000);
}
