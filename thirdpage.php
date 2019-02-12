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
      $file = fopen("questions.csv","r");
      $i = 0;
      while(true){
        $question_sets = fgetcsv($file);
        $i++;
        if($question_sets == false){
          break;
        }
         ?>
      <tr>
        <td><?=$i?></td>
        <td><?=$question_sets[0]?></td>
        <td><?=$_POST["answer" . $i]?></td>
        <td><?=$question_sets[1]?></td>
        <td><?php echo ($_POST["answer" . $i] == $question_sets[1])? "True" : "False";?></td>
      </tr>
      <?}?>
    </table>
  </body>
</html>
