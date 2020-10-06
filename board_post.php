<?php

if(strlen($_POST["content"]) == 0){
    exit("エラー:　内容が空白です。");
}else if(strlen($_POST["content"]) > 10000){
    exit("投稿内容が多すぎます");
}else{
    $content = htmlspecialchars($_POST["content"]);
    $ln = array("\r\n", "\n", "\r");
    $content = str_replace($ln, "<br />", $content);
}

if(strlen($_POST["name"] > 255)){
    exit("名前が長すぎます");
}else if(strlen($_POST["name"]) != 0){
    $name = htmlspecialchars($_POST["name"]);
}else{
    $name ="no name";
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
    
    date_default_timezone_set("Asia/Tokyo");
    $timestamp = date("Y/m/j H:i:s", time());
    
    $insert_sql = 
            "INSERT INTO board_posts (name, content, posted_at) 
            VALUES (:name, :content, :timestamp);";
    $query = $pdo->prepare($insert_sql);

    $query->bindParam(':name', $name);
    $query->bindParam(':content', $content);
    $query->bindParam(':timestamp', $timestamp);

    $query->execute();
    header("Location: board_show.php");
    exit();
}catch (PDOException $e) {
    echo $e->getMessage();
}

?>