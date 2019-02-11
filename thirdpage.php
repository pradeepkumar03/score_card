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
      $file = fopen("questions.txt","r");
      $content = fread($file, filesize("questions.txt"));
      $question_sets = explode("\n", $content);
    
      for($i=1; $i < sizeof($question_sets); $i++)
      {
        $question_set = explode("#",$question_sets[$i-1]);
      ?>
      <tr>
        <td><?=$i?></td>
        <td><?=$question_set[0]?></td>
        <td><?=$_POST["answer" . $i]?></td>
        <td><?=$question_set[1]?></td>
        <td><?php echo ($_POST["answer" . $i] == $question_set[1])? "True" : "False";?></td>
      </tr>
      <?}?>
    </table>
  </body>
</html>
