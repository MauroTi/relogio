<!DOCTYPE html>
<html>
<head>
  <style>
    #logo:hover {
      animation: shake 0.5s;
      animation-iteration-count: infinite;
    }
    @keyframes shake {
      0% { transform: translate(1px, 1px) rotate(0deg); }
      10% { transform: translate(-1px, -2px) rotate(-1deg); }
      20% { transform: translate(-3px, 0px) rotate(1deg); }
      30% { transform: translate(3px, 2px) rotate(0deg); }
      40% { transform: translate(1px, -1px) rotate(1deg); }
      50% { transform: translate(-1px, 2px) rotate(-1deg); }
      60% { transform: translate(-3px, 1px) rotate(0deg); }
      70% { transform: translate(3px, 1px) rotate(-1deg); }
      80% { transform: translate(-1px, -1px) rotate(1deg); }
      90% { transform: translate(1px, 2px) rotate(0deg); }
      100% { transform: translate(1px, -2px) rotate(-1deg); }
    }


    .transition
    {
      transition:  transform 1s;
    }

    .transition:hover
    {


      transform: scale(1.4);
    }

    #logo {
      width: 900px;
      height: 200px;
      margin: 0 auto;
      text-align: center;
    }

    #header {
      width: 100%;
      height: 100%;
      text-align: center;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    #clock {
      position: absolute;
     // bottom: 0;
     margin-top: 50px;
      width: 100%;
      text-align: center;
     color: blue;
    }

    #clock input {
  border: none;
  font-size: 70px;
  text-align: center;
  color:  #4682B4;
}


  </style>
  <link href="logo.css" rel="">
</head>
<body>
  <div id="header">
    <a href="http://www.alfatek.com.br"><img id="logo" src="logo.png" alt="Logo"></a>
    <label for="datetime" style="display: none;"></label>
    </div>
    <div id="clock">     
      <input type="text" name="datetime" id="datetime" value="" readonly style="border: none; font-size: 70px; text-align: center;">
    </div>
  
  <script>
   function updateDateTime() {
    var date = new Date();
    var options = {weekday: 'short', year: 'numeric', month: 'numeric', day: 'numeric', hour: 'numeric', minute: 'numeric', second: 'numeric'};
    var dateString = date.toLocaleDateString('pt-BR', options);
    var dateTimeField = document.getElementById("datetime");
    dateTimeField.value = dateString;
  }
  setInterval(updateDateTime, 1000);

</script>
</body>

</html>