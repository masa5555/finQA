<?php

header("Content-Type: text/html;charset=utf-8");

//変数の名前をリファクタする
$id = htmlspecialchars($_POST["id"]);
$pw = htmlspecialchars($_POST["password"]);

$dest = "./index.php";

//制限する長さに変える
if(strcmp($id, "") == 0 || strcmp($pw, "" ) == 0){
    exit("エラー:　IDまたはPWが空白です。");
}

try {
    $db = parse_url(getenv("DATABASE_URL"));

    $pdo = new PDO("pgsql:" . sprintf(
        "host=%s;port=%s;user=%s;password=%s;dbname=%s",
        $db["host"],
        $db["port"],
        $db["user"],
        $db["pass"],
        ltrim($db["path"], "/")
    ));

}catch (PDOException $e) {
    echo $e->getMessage();
}

//　同じ名前を入力したときもDB登録されてしまう。fetchがうまく行ってない
$confirm_sql = "SELECT name FROM users WHERE :id == name;";
$query = $pdo->prepare($confirm_sql);
$query->bindParam(':id', $id);
$query->execute();
$result = $query->fetch();

if($result){
    exit("既に登録されています");
}else{
    $insert_sql = 
        "INSERT INTO users (name, password, created_at, updated_at) 
        VALUES (:id, :hash_pw, :timestamp, :timestamp);";
    $query = $pdo->prepare($insert_sql);

    $hash_pw = password_hash($pw, PASSWORD_DEFAULT);
    $timestamp = date('Y-m-d H:i:s', time());
    
    $query->bindParam(':id', $id);
    $query->bindParam(':hash_pw', $hash_pw);
    $query->bindParam(':timestamp', $timestamp);
    
    $query->execute();

    header("Location: $dest");
}

unset($pdo);


?>