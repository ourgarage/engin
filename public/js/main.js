$(function () {
    $("[data-confirm]").on("click", function () {
        var confirm = $(this).data("confirm");
        return buttonConfirmation(event, confirm);
    });
});

function buttonConfirmation(e, text) {
    if (confirm(text)) {
        return true;
    }
    e.preventDefault();
    return false;
}
