<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Profile Page</title>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,400;1,600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/user.css">
</head>
  <body>
    <form class="form" action="php/user.php" method="get">
      <hr class="form_line">
      <h2 class="form_write_me">ВАШИ ДАННЫЕ</h2>
      <hr class="form_line">
      <div class="form_cell form_cell_name">
        <p class="form_topic">Ваше имя</p>
        <div class="input_cell_name">
          <p class="data_answer"><?php  echo $_GET[name];?></p>
        </div>
      </div>
      <div class="form_cell form_cell_email">
        <p class="form_topic">Ваш email</p>
          <div class="input_cell_name">
            <p class="data_answer"><?php  echo $_GET[email];?></p>
          </div>
      </div>
      <div class="form_cell form_cell_email">
        <p class="form_topic_not_main">Откуда вы</p>
        <div class="input_cell_name">
          <p class="data_answer">
            <?php  
            if ($_GET[country] === 'rus') echo 'Россия'; 
            else echo 'USA';?>
          </p>
        </div>
      </div>
      <div class="form_cell form_cell_gender">
        <p class="form_topic_gender">Ваш пол</p>
        <div class="input_cell_name">
          <p class="data_answer">  
            <?php  
              if ($_GET[gender] === 'male') echo 'Мужской'; 
              else echo 'Женский';?>
          </p>    
        </div>      
      </div>
      <div class="form_cell input_text">
        <p class="form_topic">Ваше сообщение</p>
        <div class="input_cell_text">
          <p class="data_answer">
            <?php  echo $_GET[message];?>
          </p>
        </div>
      </div>
    </form>
  </body>
</html>