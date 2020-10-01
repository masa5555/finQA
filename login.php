<?php

header("Content-Type: text/html;charset=utf-8");

$post_id = htmlspecialchars($_POST["id"]);
$post_pw = htmlspecialchars($_POST["password"]);

$dest = "./index.php";

// 制限する長さを返る
if(strcmp($post_id, "") == 0 || strcmp($post_pw, "") == 0){
    exit("エラー:post_idまたはpost_pwが空白です。");
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

$confirm_sql = "SELECT password FROM users WHERE :post_id == name;";
$query = $pdo->prepare($confirm_sql);
$query->bindParam(':post_id', $post_id);
$query->execute();
$db_pw = $query->fetch();

echo $db_pw;

if(password_verify($post_pw, $db_pw)){
    //TODO:フラッシュメッセージ：ログインに成功しました
    
    // sessionを使う（脆弱性）
    setcookie("post_id", $post_id, time()+60*60);
    header("Location: $dest");
    exit;
}else{
    exit("post_idまたはパスワードが違います");
}

?>