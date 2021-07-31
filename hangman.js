var countTries = 0;
var word = "";
var correctlyGuessedChars = 0;
var domHangmanImgSrc = document.getElementById("hangmanimg");

function nextButtonFunction() {
    domHangmanImgSrc.src = "Images/Hangman-0.png";
    countTries = 0;
    correctlyGuessedChars = 0;
    word = "";
    for (let i = 1; i <= 26; i++) {
        let charbuttonid = "button" + i;
        document.getElementById(charbuttonid).disabled = false;
    }
    $.ajax({
        url: 'https://hangmanbackend.herokuapp.com/getword/',
        type: "GET",
        dataType: "text",
        data: {},
        success: function(result) {
            word = result.toUpperCase();
            var wordlength = result.length;
            var text = "";
            for (let i = 0; i < wordlength; i++) {
                text += "<div id=\"item" + i + "\"></div>";
            }
            document.getElementById("grid-container-id").innerHTML = text;
        },
        error: function() {
            alert("Could not fetch word from server. Please try again");
        }
    });
}

function charButtonFun(buttonRef) {
    if (word.length == 0) {
        alert("Could not fetch word from server. Please try again after refreshing page");
        let num = buttonRef.val().charCodeAt(0) - 64;
        let charbuttonid = "button" + num;
        document.getElementById(charbuttonid).disabled = false;
        return;
    }
    var char = buttonRef.val();
    var index = word.indexOf(char);
    if (index != -1) {
        document.getElementById("item" + index).innerText = char;
        correctlyGuessedChars++;
        var substring = word.substring(index + 1);
        var preIndex = index;
        index = substring.indexOf(char);
        while (index != -1) {
            preIndex = preIndex + index + 1;
            document.getElementById("item" + preIndex).innerText = char;
            substring = substring.substring(index + 1);
            correctlyGuessedChars++;
            index = substring.indexOf(char);
        }
    } else {
        countTries++;
        domHangmanImgSrc.src = "Images/Hangman-" + countTries + ".png";
    }
    if (correctlyGuessedChars == word.length) {
        alert("Correct, " + word + " is the word!" + " Heading to next word.");
        nextButtonFunction();
    } else if (countTries == 6) {
        alert("Hanged, " + word + " was the word! Press okay to start again.");
        nextButtonFunction();
    }
}