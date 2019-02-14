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
        $db = new PDO('sqlite:questions.db');
        $db->exec("DROP TABLE IF EXISTS questionset");
        $db->exec(
            "CREATE TABLE IF NOT EXISTS questionset (
                id INTEGER PRIMARY KEY, 
                question TEXT, 
                answer INTEGER)"
            );
        $listOfQuestions = [];
        for($i=1; $i <= $_POST["question_count"]; $i++)
        {
            $question_variable1 = rand(20,50);
            $question_variable2 = rand(10,40);
            $answer = $question_variable1 + $question_variable2;
            array_push($listOfQuestions, ['question' => $question_variable1."+".$question_variable2."=?" ,'answer' => $answer]);
             ?>
        <p><?= $i ?>. <?= $question_variable1 ?> + <?= $question_variable2 ?> = ?</p>
        <p>Enter your answer: <input type="number" name="answer<?= $i ?>" min="20" max="100"></p>
        <br>
    <?php
    }
     $insert = "INSERT INTO questionset (question, answer) VALUES (:question, :answer)";
     $stmt = $db->prepare($insert);
     
     if($stmt == false) {
         return "Invalid table name";
     }
 
     $stmt->bindParam(':question', $question);
     $stmt->bindParam(':answer', $answer);
     
     foreach ($listOfQuestions as $item) {
         $question = $item['question'];
         $answer = $item['answer'];
         $stmt->execute();
     }
    ?>

        <button class="button">submit</button>
    </form>
</body>

</html>