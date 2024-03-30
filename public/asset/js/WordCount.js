document.addEventListener("DOMContentLoaded", function () {
    var messageTextarea = document.getElementById("message");
    var wordCountDisplay = document.getElementById("wordCount");
    var maxWords = 50; // Change this value to set the maximum number of words

    messageTextarea.addEventListener("input", function () {
        var message = messageTextarea.value;
        var wordCount = message.split(/\s+/).length - 1; // Split text by spaces and count words

        if (wordCount > maxWords) {
            var wordsToRemove = wordCount - maxWords;
            var regex = new RegExp(
                "^\\s*(?:\\S+\\s+){" + wordsToRemove + "}(\\S+\\s+)"
            );
            message = message.replace(regex, "");

            // Update the textarea value and word count display
            messageTextarea.value = message;
            wordCount = maxWords;
        }

        wordCountDisplay.textContent = maxWords - wordCount;
    });
});
