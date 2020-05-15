<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Profile Page</title>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,400;1,600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../css/feedbacks.css">
</head>
  <body>
    <form class="form" method="GET">
      <hr class="form_line">
      <h2 class="form_write_me">ПОИСК EMAIL</h2>
      <hr class="form_line">
      <form action="../feedbacks.php">
        <div class="form_cell form_cell_name">
          <p class="form_topic">Введите email</p>
          <input type="text" name="email" class="input_cell_name form_data_input" value="<?php echo $args['email'] ?? ''; ?>">
        </div>
        <input type="submit" value=Отправить class="btn btn_submit"/>
      </form>
      <div class="clear"></div>
      <div class="form_cell form_cell_name">
        <p class="form_topic">Ваше имя</p>
        <div class="input_cell_name">
          <p class="data_answer"><?php echo isset($args['name']) ? $args['name'] : 'None';?></p>
        </div>
      </div>
      <div class="form_cell form_cell_email">
        <p class="form_topic">Ваш email</p>
          <div class="input_cell_name">
            <p class="data_answer"><?php echo isset($args['email']) ? $args['email'] : 'None';?></p>
          </div>
      </div>
      <div class="form_cell form_cell_email">
        <p class="form_topic_not_main">Откуда вы</p>
        <div class="input_cell_name">
          <p class="data_answer">
            <?php  
            if (isset($args['country']) == 'rus') echo 'Россия';
            else echo 'USA';?>
          </p>
        </div>
      </div>
      <div class="form_cell form_cell_gender">
        <p class="form_topic_gender">Ваш пол</p>
        <div class="input_cell_name">
          <p class="data_answer">  
            <?php  
              if (isset($args['gender']) == 'male') echo 'Мужской';
              else echo 'Женский';?>
          </p>    
        </div>      
      </div>
      <div class="form_cell input_text">
        <p class="form_topic">Ваше сообщение</p>
        <div class="input_cell_text">
          <p class="data_answer">
            <?php echo isset($args['message']) ? $args['message'] : 'None';?></p>
        </div>
      </div>
    </form>
  </body>
</html>