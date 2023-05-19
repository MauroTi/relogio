<!DOCTYPE html>
<html class="container">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Relógio</title>
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
  position: fixed;
  bottom: 0;
  margin-bottom: 5vw;
  width: 100%;
  height: 10vh;
  background-color: #f4f4f4;
  text-align: center;
  padding: 20px;
  box-sizing: border-box;
}


  .weather-widget {
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  justify-content: center;
  background-color: #f4f4f4;
  border-radius: 10px;
  padding: 20px;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
  width: 100%;
  max-width: 200px;
  height: auto;
  margin-left: 20px;
}


.weather-icon {
  background-image: url('icons/01d.png');
  background-repeat: no-repeat;
  background-position: center;
  background-size: contain;
  width: 80px;
  height: 80px;
}

.weather-temp {
  font-size: 5vw;
  margin-top: 10px;
}

body, html {
  margin: 0;
  padding: 0;
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
    strong{
      font-size: 2vw;
      color: #4682B4;
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
  <input type="text" name="datetime" id="datetime" value="" readonly style="border: none; font-size: 5vw; text-align: center;">
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


  <div class="weather-widget">
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
    <div class="weather-temp"></div>
  </div>
  <!-- conteúdo da página -->
  <div id="espaco-rodape"></div>
  <!-- weather widget start --><script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>  
  
  <img src='' id="icone" width="90px">
  <br/>
  <strong>PORTO ALEGRE</strong><br/>
  <strong><span id="temperatura"></span></strong><br/>
  <strong>Clima:<span id="clima"></span></strong><br/>


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

</script>



  <!-- weather widget end -->

  <div id="rodape">

    <div id="cont_c79162f30b9a216bb346ceac6ebf111c"><script type="text/javascript" async src="https://www.tempo.com/wid_loader/c79162f30b9a216bb346ceac6ebf111c"></script></div>
  </div>



</body>

</body>
</html>