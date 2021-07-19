<html>
    <head>
        <br/>
        <center><h1>HANGMAN</h1></center>
        
        <style>
            .grid-container {
            display: grid;
            grid-auto-flow: column;
            grid-gap: 10px;
            background-color: #bcc0c03b;
            padding: 10px;
            margin-top: 5%;
            margin-right: 5%;
            border-radius: 12px;
            font-size: 30px;
            }
            
            .grid-container > div {
            background-color: rgba(255, 255, 255, 0.8);
            text-align: center;
            padding: 20px 0;
            font-size: 30px;
            }

            .grid-container-button {
            display: grid;
            grid-template-columns: auto auto auto auto auto auto auto auto auto;
            grid-gap: 10px;
            background-color: #0a0a0a3b;
            padding: 10px;
            margin-top: 7%;
            margin-right: 5%;
            }

            .grid-container-button > button {
            background-color: rgba(255, 255, 255, 0.8);
            text-align: center;
            padding: 4px 0;
            font-size: 20px;
            border-radius: 12px;
            }

            .grid-container-button > button:hover {
                background-color: grey; 
                color: white ;
            }

            .next {
                border-radius: 10px;
                background-color: #ffffff;
                color: green;
                height:50px;
                width:100px; position:relative; 
                left:41%; 
                margin-top: 30px; 
                font-size: 20px;
            }

            .next:hover {
                background-color: green; 
                color: white ;
            }

            #hangmanimg {
                display: block;
                margin-left: auto;
                margin-right: auto;
                width: 100%;
                height: auto;
            }
        </style>
    </head>
    <body onload="nextButtonFunction()">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
            var countTries = 0;
            var word = "";
            var correctlyGuessedChars = 0;
            

            function nextButtonFunction() {
              document.getElementById("hangmanimg").src="Images/Hangman-0.png";
              countTries = 0;
              correctlyGuessedChars = 0;
              word = "";
              for (let i = 1; i <= 26; i++) {
                    let charbuttonid = "button"+i;
                    document.getElementById(charbuttonid).disabled=false;
                }
              $.ajax({
                    url: 'https://hangmanbackend.herokuapp.com/getword/',
                    type: "GET",
                    dataType: "text",
                    data: {
                    },
                    success: function (result) {
                        word = result.toUpperCase();
                        var wordlength = result.length;
                        var text = "";
                        for (let i = 0; i < wordlength; i++) {
                            text += "<div id=\"item"+i+"\"></div>";
                        }
                        console.log(text);
                        document.getElementById("grid-container-id").innerHTML=text;
                    },
                    error: function () {
                        alert("Could not fetch word from server. Please try again");
                    }
                });
            }

            function charButtonFun(buttonRef) {
              if(word.length==0) {
                alert("Could not fetch word from server. Please try again after refreshing page");
                let num = buttonRef.val().charCodeAt(0)-64;
                console.log(num);
                let charbuttonid = "button"+num;
                document.getElementById(charbuttonid).disabled=false;
                return;
              }
              var char = buttonRef.val();
              
              console.log(char);
              console.log(countTries);
              console.log(word);
              var index = word.indexOf(char);
              if(index != -1) {
                document.getElementById("item"+index).innerText=char;
                correctlyGuessedChars++;
                var substring = word.substring(index+1);
                var preIndex = index;
                index = substring.indexOf(char);
                while(index!=-1) {
                    preIndex = preIndex + index + 1;
                    document.getElementById("item"+preIndex).innerText=char;
                    substring = substring.substring(index+1);
                    correctlyGuessedChars++;
                    index = substring.indexOf(char);
                }
              } else {
                countTries++;
                document.getElementById("hangmanimg").src="Images/Hangman-"+countTries+".png";
              }
              if(correctlyGuessedChars == word.length) {
                alert("Correct, "+word +" is the word!"+" Heading to next word.");
                nextButtonFunction();
              }
              else if(countTries == 6) {
                alert("Hanged, "+word+" was the word! Press okay to start again.");
                nextButtonFunction();
              }
            }
        </script>
        
        <div style="width:100%;"> <!-- Main Div -->
            <div style="float:left; margin-left: 5%; margin-top:5%; width:20%;">
                <img id="hangmanimg" src="Images/Hangman-0.png" alt="Hangman">
            </div>
            <div style="float:right; width:60%; margin-right: 5%;">
                <br/>
                <div class="grid-container" id="grid-container-id">
                </div>
                <div class="grid-container-button">
                    <button class="button1" id="button1" value="A" onclick="this.disabled=true;charButtonFun($(this))">A</button>
                    <button class="button2" id="button2" value="B" onclick="this.disabled=true;charButtonFun($(this))">B</button>
                    <button class="button3" id="button3" value="C" onclick="this.disabled=true;charButtonFun($(this))">C</button>
                    <button class="button4" id="button4" value="D" onclick="this.disabled=true;charButtonFun($(this))">D</button>
                    <button class="button5" id="button5" value="E" onclick="this.disabled=true;charButtonFun($(this))">E</button>
                    <button class="button6" id="button6" value="F" onclick="this.disabled=true;charButtonFun($(this))">F</button>
                    <button class="button7" id="button7" value="G" onclick="this.disabled=true;charButtonFun($(this))">G</button>
                    <button class="button8" id="button8" value="H" onclick="this.disabled=true;charButtonFun($(this))">H</button>
                    <button class="button9" id="button9" value="I" onclick="this.disabled=true;charButtonFun($(this))">I</button>
                    <button class="button10" id="button10" value="J" onclick="this.disabled=true;charButtonFun($(this))">J</button>
                    <button class="button11" id="button11" value="K" onclick="this.disabled=true;charButtonFun($(this))">K</button>
                    <button class="button12" id="button12" value="L" onclick="this.disabled=true;charButtonFun($(this))">L</button>
                    <button class="button13" id="button13" value="M" onclick="this.disabled=true;charButtonFun($(this))">M</button>
                    <button class="button14" id="button14" value="N" onclick="this.disabled=true;charButtonFun($(this))">N</button>
                    <button class="button15" id="button15" value="O" onclick="this.disabled=true;charButtonFun($(this))">O</button>
                    <button class="button16" id="button16" value="P" onclick="this.disabled=true;charButtonFun($(this))">P</button>
                    <button class="button17" id="button17" value="Q" onclick="this.disabled=true;charButtonFun($(this))">Q</button>
                    <button class="button18" id="button18" value="R" onclick="this.disabled=true;charButtonFun($(this))">R</button>
                    <button class="button19" id="button19" value="S" onclick="this.disabled=true;charButtonFun($(this))">S</button>
                    <button class="button20" id="button20" value="T" onclick="this.disabled=true;charButtonFun($(this))">T</button>
                    <button class="button21" id="button21" value="U" onclick="this.disabled=true;charButtonFun($(this))">U</button>
                    <button class="button22" id="button22" value="V" onclick="this.disabled=true;charButtonFun($(this))">V</button>
                    <button class="button23" id="button23" value="W" onclick="this.disabled=true;charButtonFun($(this))">W</button>
                    <button class="button24" id="button24" value="X" onclick="this.disabled=true;charButtonFun($(this))">X</button>
                    <button class="button25" id="button25" value="Y" onclick="this.disabled=true;charButtonFun($(this))">Y</button>
                    <button class="button26" id="button26" value="Z" onclick="this.disabled=true;charButtonFun($(this))">Z</button>
                </div>
                <button class="next" onclick="nextButtonFunction()">NEXT</button>
            </div>
        </div>
    </body>
</html>
