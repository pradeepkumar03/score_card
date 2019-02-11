

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
  $file = fopen("copyto3page.txt","r");
  $content = fread($file, filesize("copyto3page.txt"));
  $questionset = explode("\n", $content);
 
  for($i=1; $i < sizeof($questionset); $i++)
  {
  $question = explode("#",$questionset[$i-1]);
  ?>
  <tr>
    <td><?=$i?></td>
    <td><?=$question[0]?></td>
    <td><?=$_POST["answer" . $i]?></td>
    <td><?=$question[1]?></td>
    <td><?php echo ($_POST["answer" . $i] == $question[1])? "True" : "False";?></td>
  </tr>

<?}?>

</table>
</body>
</html>
