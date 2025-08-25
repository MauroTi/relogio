<!DOCTYPE html>
<html class="container">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Relógio</title>
  
  <link href="logo.css" rel="">
</head>
<body>
  <div>
    <div id="header">
      <a href="http://www.alfatek.com.br"><img id="logo" src="logo.png" alt="Logo"></a>
      <label for="datetime" style="display: none;"></label>
    </div>
    <div id="clock">
      <input type="text" name="datetime" id="datetime" value="" readonly style="border: none; font-size: 6vw; text-align: center;">
    </div>

    <form id="alarm-form">
      <label for="alarm-time">Horário do alarme:</label>
      <input type="time" id="alarm-time">
      <button type="submit">Programar</button>
      <button type="button" class="cancel-alarm">Cancelar Alarme</button>
      <button onclick="stopColorChange()">Encerra alarme</button>


    </form>


    <script>
    function updateDateTime() {
  var date = new Date();
  var options = {
    weekday: 'short',
    year: 'numeric',
    month: 'numeric',
    day: 'numeric',
    hour: 'numeric',
    minute: 'numeric',
    second: 'numeric'
  };
  var dateString = date.toLocaleDateString('pt-BR', options);
  var dateTimeField = document.getElementById("datetime");
  dateTimeField.value = dateString;
}
setInterval(updateDateTime, 1000);

var alarmTime;

document.getElementById("alarm-form").addEventListener("submit", function (event) {
  event.preventDefault();
  var timeInput = document.getElementById("alarm-time");
  var timeString = timeInput.value;
  var now = new Date();
  var [hours, minutes] = timeString.split(":");
  alarmTime = new Date(now.getFullYear(), now.getMonth(), now.getDate(), hours, minutes);
});

function stopColorChange() {
  clearInterval(colorInterval);
  document.body.style.backgroundColor = ""; // Volta para a cor original (definida no CSS ou em outro lugar)
}


function checkAlarm() {
  var currentTime = new Date();
  if (alarmTime && currentTime >= alarmTime) {
   var body = document.body;
var colors = ["blue", "red", "yellow"];
var colorIndex = 0;

function changeColor() {
  body.style.backgroundColor = colors[colorIndex];
  colorIndex = (colorIndex + 1) % colors.length;
}

setInterval(changeColor, 1000);

    alarmTime.setDate(alarmTime.getDate() + 1); // add one day to the alarm to make it repeat
  }
}
const cancelButton = document.querySelector('.cancel-alarm');
cancelButton.addEventListener('click', cancelAlarm);
function cancelAlarm() {
  document.querySelector('#alarm-time').value = '';
}

setInterval(checkAlarm, 1000);


</script>
<div>
  <label for="invert-slider">Mudança de Tonalidade</label>
  <input type="range" id="invert-slider" min="0" max="100" value="100" step="1" oninput="document.documentElement.style.setProperty('--invert-value', this.value + '%');">
</div>

</div>
<body>


  <div class="weather-widget">

    <!-- <div class="weather-temp"></div>  -->
  </div>
  <!-- conteúdo da página -->

  

  <div id="rodape">
<!--   <strong><span id="temp" style="font-size: 5vw;"></span></strong>
  <div id="cont_c79162f30b9a216bb346ceac6ebf111c"><script type="text/javascript" async src="https://www.tempo.com/wid_loader/c79162f30b9a216bb346ceac6ebf111c"></script></div>  -->

  <div class="weather-icon"><script>
    const apiKey = '567867fead8ac7c32898e5f6e014159c';
    const city = 'Porto Alegre';

    const weatherIcon = document.querySelector('.weather-icon');
    const weatherTemp = document.querySelector('.weather-temp');

    function getWeather() {
      fetch(`https://api.openweathermap.org/data/2.5/weather?q=${city}&appid=${apiKey}&units=metric`)
      .then(response => response.json())
      .then(data => {
        console.log(data);
        const iconUrl = `https://openweathermap.org/img/w/${data.weather[0].icon}.png`;
        weatherIcon.style.backgroundImage = `url(${iconUrl})`;
        weatherTemp.textContent = `${Math.round(data.main.temp)}°C`;
      })
      .catch(error => console.log(error));
    }

    getWeather();
    setInterval(getWeather, 60000);

  </script></div>


  <div id="espaco-rodape">
    <!-- weather widget start --><script
    src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>  

    <img src='' id="icone" width="90px">
    <br/>
    <strong>PORTO ALEGRE</strong><br/>
    <strong><span id="temperatura" style="font-size: 5vw; color: black;"></span></strong><br/>
    <strong>Clima:<span id="clima"></span></strong>


    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>

    <!--<strong>Cidade:</strong> <span id="cidade"></span><br/>-->
    <!--<strong>Horário: <span id="horario"></span></strong><br/>-->


    <script>
      $(document).ready(function(){
        function getWeather() {
          $.get( "https://api.openweathermap.org/data/2.5/weather?q=Porto%20Alegre,br&lang=pt&units=metric&appid=567867fead8ac7c32898e5f6e014159c", function(data) {
      //$('#cidade').html(data.name);  
            var dataAtual = new Date();
            var horaAtual = ('0' + dataAtual.getHours()).slice(-2) + ':' + ('0' + dataAtual.getMinutes()).slice(-2) + ':' + ('0' + dataAtual.getSeconds()).slice(-2);
            $('#horario').html(horaAtual);
            $('#temperatura').html(data.main.temp + ' °C');
            $('#clima').html(data.weather[0].description);  
          }).fail(function() {
            $('#cidade').html('Erro ao carregar cidade');
            $('#horario').html('Erro ao carregar horário');
            $('#temperatura').html('Erro ao carregar temperatura');
            $('#clima').html('Erro ao carregar clima');
          });
        }
        getWeather();
        setInterval(getWeather, 10000);
        setInterval(function(){
          var dataAtual = new Date();
          var horaAtual = ('0' + dataAtual.getHours()).slice(-2) + ':' + ('0' + dataAtual.getMinutes()).slice(-2) + ':' + ('0' + dataAtual.getSeconds()).slice(-2);
          $('#horario').html(horaAtual);
        }, 1000);
      });

      function alternarDiv() {
        var div = document.getElementById("cont_1a99219bfe1681b8112996083265a113");
        var botao = document.getElementById("botao");

        if (div.style.display === "none") {
          div.style.display = "block";
          botao.textContent = "Ocultar";
        } else {
          div.style.display = "none";
          botao.textContent = "Mostrar";
        }
      }

// Verificar o estado inicial da div e atualizar o texto do botão
      window.addEventListener("DOMContentLoaded", function() {
        var div = document.getElementById("cont_1a99219bfe1681b8112996083265a113");
        var botao = document.getElementById("botao");

        if (getComputedStyle(div).display === "none") {
          botao.textContent = "Mostrar";
        } else {
          botao.textContent = "Ocultar";
        }
      });



    </script>



    <!-- weather widget end -->
  </div>
  
  
  <button onclick="alternarDiv()" id="botao">Mostrar</button>

  <div class="no-border" id="cont_1a99219bfe1681b8112996083265a113"><script type="text/javascript" async src="https://www.tempo.com/wid_loader/1a99219bfe1681b8112996083265a113"></script></div>
</div>
 <!-- <div class="clima">
   <div id="ww_3cb086f2ec02b" v='1.3' loc='id' a='{"t":"responsive","lang":"pt","sl_lpl":1,"ids":["wl3184"],"font":"Arial","sl_ics":"one_a","sl_sot":"celsius","cl_bkg":"#FFFFFF","cl_font":"#000000","cl_cloud":"#d4d4d4","cl_persp":"#2196F3","cl_sun":"#FFC107","cl_moon":"#FFC107","cl_thund":"#FF5722","cl_odd":"#0000000a"}'><a href="https://weatherwidget.org/ru/" id="ww_3cb086f2ec02b_u" target="_blank">Бесплатный информер погоды для сайта</a></div><script async src="https://app1.weatherwidget.org/js/?id=ww_3cb086f2ec02b"></script>  -->

 </div>



</body>

</body>
</html>