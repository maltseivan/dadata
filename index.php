<html>
<head>
    <title>Тестовое на джуна</title>
</head>
<body>
    <pre id="result" class="result">
      <!--Тут должен быть ответ от сервера-->
    </pre>
    <form id="form" class="form" action="dadata.php" method="post">
        <label for="lastName">Фамилия:</label>
        <input type="text" name="lastName" id="lastName"><br><br>
        <label for="firstName">Имя:</label>
        <input type="text" name="firstName" id="firstName"><br><br>
        <label for="secondName">Отчество:</label>
        <input type="text" name="secondName" id="secondName"><br><br>
        <label for="secondName">Фото:</label>
        <input type="file" name="photo" id="photo"><br><br>
        <input class="jsBtnSubmit" value="Отправить" style="cursor: pointer">
    </form>

    <footer>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script>
          //jQuery.ajax(), fetch, axios или любой удобный вам способ сделать ajax вызов формы.

          /**
           * Ловим клик по кнопке с классоам jsBtnSubmit.
           * Считываем поля формы.
           */
          let btnSubmit = document.querySelector('.jsBtnSubmit');

          btnSubmit.addEventListener('click', function(e) {

              let form      = document.querySelector('.form'),
                  formData  = new FormData(form);
              /**
               * Вызываем асинхронную функцию,
               * отправлем данные для обработки.
               */
              getDataUser(formData);

          })

          async function getDataUser(formData) {

              let firstname  = formData.get('firstName'),
                  lastName   = formData.get('lastName'),
                  secondName = formData.get('secondName'),
                  photo      = formData.get('photo');

              let response = await fetch(`./dadata.php/?LASTNAME=${lastName}&FIRSTNAME=${firstname}&SECONDNAME=${secondName}`)
                  .then(result => {
                      return result.json();
                  })
                  .then(data => {

                      /**
                       * Результат отправляем в resultData.
                       */
                      resultData(data, photo);
                  })

          }
          /**
           * Выодим данные на экран
           */
          function resultData(data){

              let resultBlock =  document.querySelector('.result');

              resultBlock.innerHTML = JSON.stringify(data);

          }
      </script>
    </footer>
</body>
</html>
