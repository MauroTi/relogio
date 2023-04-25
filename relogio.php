<!DOCTYPE html>
<html class="container">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

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

    #rodape {
      position: absolute;
      bottom: 0;
      width: 100%;
      height: 100px;
      
    }


    /*.cancel-alarm {
      background-color: #e74c3c;
      color: white;
      border: none;
      padding: 10px;
      font-size: 16px;
      cursor: pointer;
    }*/
    @media screen and (max-width: 768px) {
      #logo {
        width: 100%;
      }

      #clock {
        font-size: 7vw;
      }

      #clock input {
        font-size: 12vw;
      }
    }

    @media screen and (max-width: 480px) {
      #logo {
        width: 100%;
      }

      #clock {
        font-size: 10vw;
        margin-top: 10%;
      }

      #clock input {
        font-size: 18vw;
      }
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
    <form id="alarm-form">
      <label for="alarm-time">Horário do alarme:</label>
      <input type="time" id="alarm-time">
      <button type="submit">Programar</button>
      <button type="button" class="cancel-alarm">Cancelar Alarme</button>

    </form>


    <script>
     function updateDateTime() {
      var date = new Date();
      var options = {weekday: 'short', year: 'numeric', month: 'numeric', day: 'numeric', hour: 'numeric', minute: 'numeric', second: 'numeric'};
      var dateString = date.toLocaleDateString('pt-BR', options);
      var dateTimeField = document.getElementById("datetime");
      dateTimeField.value = dateString;
    }
    setInterval(updateDateTime, 1000);

    var alarmTime;

    document.getElementById("alarm-form").addEventListener("submit", function(event) {
      event.preventDefault();
      var timeInput = document.getElementById("alarm-time");
      var timeString = timeInput.value;
      var now = new Date();
      var [hours, minutes] = timeString.split(":");
      alarmTime = new Date(now.getFullYear(), now.getMonth(), now.getDate(), hours, minutes);
    });

    function checkAlarm() {
      var currentTime = new Date();
      if (alarmTime && currentTime >= alarmTime) {
        document.body.style.backgroundColor = document.body.style.backgroundColor == "red" ? "blue" : "red";
    alarmTime.setDate(alarmTime.getDate() + 1); // adicione mais um dia ao alarme para que ele continue a disparar
  }
  const cancelButton = document.querySelector('.cancel-alarm');
  cancelButton.addEventListener('click', cancelAlarm);
  function cancelAlarm() {
    document.querySelector('#alarm-time').value = '';
  }

  setTimeout(checkAlarm, 1000);
}

checkAlarm();

</script>
<div>
  <label for="invert-slider">Mudança de Tonalidade</label>
  <input type="range" id="invert-slider" min="0" max="100" value="100" step="1" oninput="document.documentElement.style.setProperty('--invert-value', this.value + '%');">
</div>

</div>
<body>
  <!-- conteúdo da página -->
  <div id="espaco-rodape"></div>
<!-- weather widget start --><div id="m-booked-prime-33718"> <div class="booked-wzsp-prime-in"> <div class="booked-wzsp-prime-data"> <div class="booked-wzsp-prime-img wt18"></div> <div class="booked-wzsp-day-val"> <div class="booked-wzsp-day-number"><span class="plus">+</span>24</div> <div class="booked-wzsp-day-dergee"> <div class="booked-wzsp-day-dergee-val">&deg;</div> <div class="booked-wzsp-day-dergee-name">C</div> </div> </div> </div> </div> </div> </div><script type="text/javascript"> var css_file=document.createElement("link"); var widgetUrl = location.href; css_file.setAttribute("rel","stylesheet"); css_file.setAttribute("type","text/css"); css_file.setAttribute("href",'https://s.bookcdn.com/css/w/booked-wzs-widget-prime.css?v=0.0.1'); document.getElementsByTagName("head")[0].appendChild(css_file); function setWidgetData_33718(data) { if(typeof(data) != 'undefined' && data.results.length > 0) { for(var i = 0; i < data.results.length; ++i) { var objMainBlock = document.getElementById('m-booked-prime-33718'); if(objMainBlock !== null) { var copyBlock = document.getElementById('m-bookew-weather-copy-'+data.results[i].widget_type); objMainBlock.innerHTML = data.results[i].html_code; if(copyBlock !== null) objMainBlock.appendChild(copyBlock); } } } else { alert('data=undefined||data.results is empty'); } } var widgetSrc = "https://widgets.booked.net/weather/info?action=get_weather_info;ver=7;cityID=43279;type=5;scode=44296;ltid=3458;domid=w209;anc_id=61960;countday=undefined;cmetric=1;wlangID=1;color=137AE9;wwidth=160;header_color=ffffff;text_color=333333;link_color=08488D;border_form=1;footer_color=ffffff;footer_text_color=333333;transparent=0;v=0.0.1";widgetSrc += ';ref=' + widgetUrl;widgetSrc += ';rand_id=33718';var weatherBookedScript = document.createElement("script"); weatherBookedScript.setAttribute("type", "text/javascript"); weatherBookedScript.src = widgetSrc; document.body.appendChild(weatherBookedScript) </script><!-- weather widget end -->
 
  <div id="rodape">
    
    <div id="cont_c79162f30b9a216bb346ceac6ebf111c"><script type="text/javascript" async src="https://www.tempo.com/wid_loader/c79162f30b9a216bb346ceac6ebf111c"></script></div>
  </div>
</body>

</body>
</html>