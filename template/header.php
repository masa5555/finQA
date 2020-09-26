<div class="fixed-top">
<nav class="navbar navbar-expand-lg navbar-light shadow" style="background-color: rgb(220, 236, 182);">
    <a class="navbar-brand" href="#">finQA</a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="./index.php">トップ<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="./quiz_show.php">クイズ<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="./board_show.php">掲示板<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="./info.php"">お役立ち情報<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="./stat_show.php"">統計<span class="sr-only">(current)</span></a>
            </li>
        </ul>

        <form class="form-inline my-2 my-lg-0">
            
            <?php
                if(isset($_COOKIE["id"])){
                    echo "ユーザー名:<b>".$_COOKIE["id"]."</b>さん"; 
                }else{
                    echo "<button type=\"button\" class=\"btn btn-outline-success my-2 my-sm-0\" data-toggle=\"modal\" data-target=\"#exampleModal\">";
                    echo "ログイン/登録";
                    echo "</button>";
                }
            ?>
        </form>
    </div>
</nav>
</div>