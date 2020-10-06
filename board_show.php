<!DOCTYPE html>
<html lang="ja"> 
    <head>
        <meta http-equiv="content-type" charset="utf-8">
        <?php include "template/bootstrap_head.html" ?>
    </head>
    <body>
        <?php include "template/header.php" ?>

        <header>
            <h1>掲示板</h1>
        </header>    
        <hr>

        <div>
            <p>投稿フォーム</p>
            <form method="POST" action="./board_post.php">
                　
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">名前</span>
                </div>
                <input type="text" class="form-control" name="name"　maxlength='50'>
            </div>
                
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">内容</span>
                    </div>
                    <textarea class="form-control" aria-label="内容" name="content" cols="30" rows="4" maxlength='400' required></textarea>
                </div>
                
                <br>
                <button type="submit" class="btn btn-primary" value="投稿">
                    投稿
                </button>
                <hr>
            </form>
        </div>

        <?php

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

        $sql = "SELECT * FROM board_posts;";
        $query = $pdo->prepare($sql);
        $query->execute();
        $post_array = $query->fetchALL();

        for($i = 0; $i < sizeOf($post_array); $i++){
            echo "<p style=\"text-align: left;\">".$post_array[$i]["id"];
            echo " <strong>名前: ".$post_array[$i]["name"]."</strong> ";
            echo "投稿日時: <time>".$post_array[$i]["posted_at"]."</time><br>".$post_array[$i]["content"]."</p>\n";
            echo "<hr>\n";
        }

        ?>

        <?php include "template/login_modal.html" ?>
        <?php include "template/bootstrap_script.html" ?>
    </body>
</html>