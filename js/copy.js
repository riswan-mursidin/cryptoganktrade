function copyReferral() {
    /* Get the text field */
    var copyText = document.getElementById("referral");

    /* Select the text field */
    copyText.select();
    copyText.setSelectionRange(0, 99999); /* For mobile devices */

     /* Copy the text inside the text field */
    navigator.clipboard.writeText(copyText.value);

    /* Alert the copied text */
    alert("Copied Url Invitation " + copyText.value);
}

function copyText(element) {
        var range, selection, worked;
    
        if (document.body.createTextRange) {
            range = document.body.createTextRange();
            range.moveToElementText(element);
            range.select();
        } else if (window.getSelection) {
            selection = window.getSelection();        
            range = document.createRange();
            range.selectNodeContents(element);
            selection.removeAllRanges();
            selection.addRange(range);
        }
        
        try {
            document.execCommand('copy');
            alert('text copied');
        }
            catch (err) {
            alert('unable to copy text');
        }
}