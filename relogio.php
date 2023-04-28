<!DOCTYPE html>
<html class="container">
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

  .container{
    filter: invert(var(--invert-value, 100%));
    background-color: #FFFFFF;
  }
  #invert-slider {
  width: 200px;
  height: 20px;
  background-color: #ccc;
  border-radius: 10px;
  outline: none;
  margin-left: 10px;
  margin-right: 10px;
}

#invert-slider::-webkit-slider-thumb {
  width: 20px;
  height: 20px;
  background-color: #4682B4;
  border-radius: 50%;
  -webkit-appearance: none;
  margin-top: 0px;
}

#invert-slider::-moz-range-thumb {
  width: 20px;
  height: 20px;
  background-color: #4682B4;
  border-radius: 50%;
  appearance: none;
  margin-top: -8px;
}
.clima {
  position: fixed;
  bottom: 0;
  /*left: 0;*/
  width: 100%;
  text-align: center;
  /*background-color: #f2f2f2;*/
  /*color: #333;*/
  font-size: 16px;
  padding: 20px;
  border-top: 1px solid #ccc;
}

.clima a {
  color: #333;
}

.clima .ww-desc {
  font-size: 18px;
}

.clima .ww-temp {
  font-size: 36px;
  font-weight: bold;
}






  </style>
  <link href="logo.css" rel="">
</head>
<body>
  <div>
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
  <div>
  <label for="invert-slider">Mudança de Tonalidade</label>
  <input type="range" id="invert-slider" min="0" max="100" value="100" step="1" oninput="document.documentElement.style.setProperty('--invert-value', this.value + '%');">
</div>

</div>
<div class="clima">
 <div id="ww_3cb086f2ec02b" v='1.3' loc='id' a='{"t":"responsive","lang":"pt","sl_lpl":1,"ids":["wl3184"],"font":"Arial","sl_ics":"one_a","sl_sot":"celsius","cl_bkg":"#FFFFFF","cl_font":"#000000","cl_cloud":"#d4d4d4","cl_persp":"#2196F3","cl_sun":"#FFC107","cl_moon":"#FFC107","cl_thund":"#FF5722","cl_odd":"#0000000a"}'><a href="https://weatherwidget.org/ru/" id="ww_3cb086f2ec02b_u" target="_blank">Бесплатный информер погоды для сайта</a></div><script async src="https://app1.weatherwidget.org/js/?id=ww_3cb086f2ec02b"></script>
</div>

</body>

</html>