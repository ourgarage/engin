function buttonConfirmation(e, text) {
    if (confirm(text)) {
        return true;
    }
    e.preventDefault();
    return false;
}
