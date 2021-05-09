<?php
// PDO("mysql:host_name,database_name,charset=UTF8,'user_name','password');
$pdo = new PDO("mysql:host=localhost;dbname=students;charset=UTF8;",'root','');

// [PDO] for single value
// if($pdo){
//     $stmt = $pdo->query("SELECT count(*) AS total FROM student WHERE class = 7 AND section = 'c'");
//     // print_r($stmt->fetch(PDO::FETCH_ASSOC));
//     $total = $stmt->fetchColumn();
//     echo $total;
// }


// [PDO] for multi[p]le  value
// $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); // DEFAULT MODE
// if($pdo){
//     $stmt = $pdo->query("SELECT count(*) AS total FROM student WHERE class = 7 AND section = 'c'");
//     // print_r($stmt->fetch(PDO::FETCH_ASSOC));
//     $result = $stmt->fetchAll(); // both mode show
//     print_r($result);
// }


// //  PDO USE IN PREPARE STATEMENT
// $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); // DEFAULT MODE
// if($pdo){
//     $stmt = $pdo->prepare("SELECT *  FROM student WHERE class = 7 AND section = 'c'");
//     $stmt->execute([7,'A']);
//     print_r($stmt->fetchAll());
// }

//  PDO USE to group base on first SELECT value
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); // DEFAULT MODE
if($pdo){
    $stmt = $pdo->prepare("SELECT gender, name, roll  FROM student WHERE section = 'c'");
    $stmt->execute(['C']);
    $data = $stmt->fetchAll(PDO::FETCH_GROUP);
    echo "Total Female is ". count($data['female']);
}

