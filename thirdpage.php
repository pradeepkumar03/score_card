<html>
  <head>
    <style>
      table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
      }
      th, td {
        padding: 15px;
      }
    </style>
  </head>
  <body>
    <h2>Your Scorecard:</h2>
    <table style="width:50%">
      <tr>
        <th>Q.No</th>
        <th>Questions</th> 
        <th>User Answer</th>
        <th>Correct Answer</th>
        <th>Status</th>
      </tr>

      <?php
       
        $db = new PDO('sqlite:questions.db');

        $questions = $db->query('SELECT * FROM questionset');
        foreach ($questions as $question) {
       ?>
        <tr>
          <td><?=$question['id']?></td>
          <td><?= $question['question']?></td>
          <td><?=$_POST["answer" . $question['id']]?></td>
          <td><?=$question['answer']?></td>
          <td><?php echo ($_POST["answer" . $question['id']] == $question['answer'])? "True" : "False";?></td>
        </tr>
      <?php }?>
    </table>
  </body>
</html>
