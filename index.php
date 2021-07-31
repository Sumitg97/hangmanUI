<html>

<head>
    <br />
    <center>
        <h1>HANGMAN</h1>
    </center>
    <link rel="stylesheet" href="style.css">
</head>

<body onload="nextButtonFunction()">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div style="width:100%;">
        <!-- Main Div -->
        <div style="float:left; margin-left: 5%; margin-top:5%; width:20%;">
            <img id="hangmanimg" src="Images/Hangman-0.png" alt="Hangman">
        </div>
        <div style="float:right; width:60%; margin-right: 5%;">
            <br />
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
<script type="text/javascript" src="hangman.js"></script>

</html>
