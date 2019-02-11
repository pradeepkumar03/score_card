<!DOCTYPE html>
<html>

<head>
    <style>
        button {
            background-color: green;
            text-align: center;
            color: white;
            padding: 6px;
            border-radius: 5px;
            border: none;
            margin: 30px;
            font-size: 20px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
        }
    </style>
</head>

<body>
    <form method="post" action="thirdpage.php">
    <?php
        $file = fopen("copyto3page.txt","w");
        for($i=1; $i <= $_POST["question_count"]; $i++)
        {
            $questionvariable1 = rand(20,50);
            $questionvariable2 = rand(10,40);
            $answer = $questionvariable1 + $questionvariable2;
            fwrite($file, $questionvariable1."+".$questionvariable2."=?#".$answer."\n");
    ?>
        <p><?= $i ?>. <?= $questionvariable1 ?> + <?= $questionvariable2 ?> = ?</p>
        <p>Enter your answer: <input type="number" name="answer<?= $i ?>" min="20" max="100"></p>
        <br>
    <? } ?>
    
        <button class="button">submit</button>
    </form>
</body>

</html>