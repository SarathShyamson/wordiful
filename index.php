<!DOCTYPE html>
<html>
<head>
  <style>
  #myProgress {
    width: 44%;
    background-color: #ddd;
  }

  #myBar {
    width: 0%;
    height: 30px;
    background-color: #4CAF50;
  }
  </style>
<script type="text/javascript">
  var res;
  var string1;
  var string2;
  var compareNum;
  var one_prog=0;
  var elem;
  var width;
  var id;

function showHint(str) {
    elem = document.getElementById("myBar");
    elem.style.width = 0 + "%";
  document.getElementById("guess").disabled=false;
  document.getElementById("enter").disabled=true;
  document.getElementById("guess").focus();
    if (str.length == 0) {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                //document.getElementById("txtDebug").innerHTML = this.responseText;
                var roll = this.responseText;
                res = roll.split("|");

                    document.getElementById("txtHint").innerHTML = res[1];
                    document.getElementById("txtDebug").innerHTML = res[0];
                  //  document.getElementById("txtDebug").innerHTML = roll;

            }
        };
        xmlhttp.open("GET", "getWord.php?q=" + str, true);
      //xmlhttp.open("GET", "getdatabase.php", true);
        xmlhttp.send();
    }
}

function validate()
{

//  if (document.getElementById("guess").value == res[0])
    {
      //  elem.style.width =  '100%';

  //  }
  //  else
  //  {
      string1 = res[0];
      string2 = document.getElementById("guess").value;
      compareNum = 0;
      elem = document.getElementById("myBar");

      for(i=0; i<string1.length; i++)
{
    for(j=i; j<string2.length; j++)
    {
    if (string1.charAt(i) == string2.charAt(j))
{

        one_prog=100/string1.length;
        compareNum++;
        one_prog=one_prog*compareNum;

        width = 0;
        id = setInterval(frame, 10);
        function frame() {
          if (width >= 100) {
            clearInterval(id);
          } else {
            if(string1.includes(string2))
            {
          // document.getElementById("stringCompare").innerHTML = one_prog;
            width=one_prog;
            //width=compareNum;
            elem.style.width = width + '%';
            if (string2.length == 0)
            {
              elem.style.width = 0 + '%';
            }
            if (string1 == string2)
            {
              elem.style.width = 100 + "%";
              //document.getElementById("txtHint").innerHTML = document.getElementById("guess").value + " is right. Press enter for next.";
              document.getElementById("txtHint").innerHTML = document.getElementById("guess").value;
              document.getElementById("guess").value = "";
              document.getElementById("guess").disabled=true;
              document.getElementById("enter").disabled=false;
              document.getElementById("enter").focus();
            }


            }

          }
        }
        break;
}
    }
};

    }
}
</script>
</head>
<body background="wordiful.jpg">



<form>
  <br><br><br><br><br><br><br><br><br><br>
  <table style="width:25%" align="center" bgcolor="#ffffff">
    <tr><th>
      <center><IMG SRC="wordiful_logo.jpg" ALT="some text" WIDTH=80 HEIGHT=60></center>
      <!--<center><p><b>Wordiful</b></p></center>-->
  <center><p><span id="txtHint">|</span></p></center>
  <center><div id="myProgress">
  <div id="myBar"></div>
  </div></center><br>
<center><input id="guess" type="text" onkeyup="validate()" autocomplete="off"></center><br>
<center><input autofocus id="enter" type="button" name="button" onclick="showHint(this.value)" value="Play"></input></center><br>
<!--<center><p><span id="txtDebug"></span></p></center>-->
</th></tr></table>
</form>


<center><p><span id="txtDebug"></span></p></center>
<center><p><span id="stringCompare"></span></p></center>
</body>
</html>
