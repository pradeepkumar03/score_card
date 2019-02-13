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
      $file = fopen("questions.json","r");
      $content = fread($file, filesize("questions.json"));
      $question_sets = json_decode($content, True)['questions'];
      foreach($question_sets as $i => $question_set)
      {
       ?>
      <tr>
        <td><?=$i+1?></td>
        <td><?= $question_set['question']?></td>
        <td><?=$_POST["answer" . (string)($i+1)]?></td>
        <td><?=$question_set['answer']?></td>
        <td><?php echo ($_POST["answer" . (string)($i+1)] == $question_set['answer'])? "True" : "False";?></td>
      </tr>
      <?}?>
    </table>
  </body>
</html>
