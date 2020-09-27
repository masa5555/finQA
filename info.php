<!DOCTYPE html>
<html lang="ja"> 
    <head>
        <meta http-equiv="content-type" charset="utf-8">
        <?php include "template/bootstrap_head.html" ?>
    </head>
    <body>
        <?php include "template/header.php" ?>

        <div class="list">
            <h1>お役立ち情報ページ</h1>
            <div class="list-element">
                <div class="list-element-node">
                    <img src="img/money_forward.png">
                </div>
                <div class="list-element-node">
                    <a href="https://moneyforward.com/">
                        <h2>Money Forward ME - 家計簿&資産管理アプリ</h2>
                    </a>
                    <p>キャッシュレス決済を使っていれば、家計簿を半自動化できる。</p>
                    <p>銀行口座や証券口座を同期することで、資産配分の視覚化をしてくれる。</p>
                </div>
            </div>
            <div class="list-element">
                <div class="list-element-node">
                    <img src="img/buffettcode.png">
                </div>
                <div class="list-element-node">
                    <a href="https://www.buffett-code.com/">
                        <h2>バフェット・コード</h2>
                    </a>
                    <p>企業のIR情報を一括で見れるアプリ</p>
                    <p>投資する企業を選ぶのに便利</p>
                </div>
            </div>
            <div class="list-element">
                <div class="list-element-node">
                    <img src="img/tradingview.png">
                </div>
                <div class="list-element-node">
                    <a href="https://jp.tradingview.com/">
                        <h2>TradingView</h2>
                    </a>
                    <p>株価チャートの分析に便利なアプリ</p>
                </div>
            </div>
        </div>

        <?php include "template/login_modal.html" ?>
        <?php include "template/bootstrap_script.html" ?>
    </body>
</html>