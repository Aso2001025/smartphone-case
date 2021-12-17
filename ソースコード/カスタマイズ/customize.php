<?php
session_start();
?>
<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title></title>
    <meta name=”viewport” content=”width=device-width,initial-scale=1.0″>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/Customize_main.css">
    <script src="js/customize.js"></script>
</head>
<body>
<?php require 'header.php';
if(!isset($_SESSION['name'])) {
    echo '<META http-equiv="Refresh" content="0.01;URL=toppage.php">';
}?>
<main>
    <div class="content">
        <div class="material-area">
            <form action="uplode.php" name="upload" method="post" enctype="multipart/form-data">
                <div onclick="obj=document.getElementById('material').style; obj.display=(obj.display=='none')?'block':'none';">
                    <p class="textlink"><a style="cursor:pointer;border-bottom: black solid 2px">▼ 素材一覧</a></p>

                </div>
                <div id="material" style="display:none;clear:both;">
                    <?php
                    if(isset($_POST['model_name'])){
                        $_SESSION['model']=$_POST['model_name'];
                    }
                    $pdo = new PDO('mysql:host=mysql153.phy.lolipop.lan; 
                            dbname=LAA1290607-smartphone;charst=UTF8',
                        'LAA1290607', 'Pass2525');

                    $sql=$pdo->prepare('select material_name,material_deta from m_material where cotegory_code=?');
                    $sql->execute(['IM']);

                    foreach ($sql as $item){
                        echo '<div class="item">';
                        echo '<img src="',$item['material_deta'],'" onclick="changeImage(this)">';
                        echo '<p>',$item['material_name'];
                        echo '</div>';
                    }
                    ?>

                </div>
                <div onclick="obj=document.getElementById('user_image').style; obj.display=(obj.display=='none')?'block':'none';">
                    <p class="textlink"><a style="cursor:pointer;border-bottom: black solid 2px">▼ ユーザー画像</a></p>

                </div>





                <div id="user_image" style="display:none;clear:both;">
                    <?php
                    $pdo = new PDO('mysql:host=mysql153.phy.lolipop.lan; 
                            dbname=LAA1290607-smartphone;charst=UTF8',
                        'LAA1290607', 'Pass2525');

                    $sql=$pdo->prepare('select image_name,image_data from d_image where customer_code=?');
                    $sql->execute([$_SESSION['name']]);

                    foreach ($sql as $item){
                        echo '<div class="item">';
                        echo '<img src="',$item['image_data'],'" onclick="changeImage(this)">';
                        echo '<p>',$item['image_name'];
                        echo '</div>';
                    }
                    ?>

                </div>
                <p>画像を追加する<input type="file" name="file"></p>
                <a href="javascript:upload.submit()" class="upload">-アップロード-</a>


            </form>
        </div>
        <div class="customize-area">
            <form action="create.php" name="save" method="post">
                <h1>デザイン名：<input type="text" class="design_name" name="design_name"></h1>
                <div class="preview-area">

                    <img src="img/noimage" id="image" name="image" alt="画像を選択してください">
                    <input type="hidden" id="image_pass" name="image_pass" value="">

                </div>
                <div class="select-area">
                    <?php
                    $sql=$pdo->prepare('select model_name,model_code from m_model where model_code=?');
                    $sql->execute([$_SESSION['model']]);
                    foreach ($sql as $item){
                        echo '<p>モデル<input type="text" value="',$item['model_name'],'">';
                        echo '<input type="hidden" name="model_code" value="',$item['model_code'],'"></p>';
                    }
                    echo '<p>ケースタイプ<select name="type_code">';
                    echo '<option value="0">選択してください</option>';
                    foreach ($pdo->query('select * from m_type order by type_name') as $item){
                        echo '<option value="',$item['type_code'],'">',$item['type_name'],'</option>';
                    }
                    echo '</select></p>';

                    ?>
                    <p>他のユーザーに公開：<input type="checkbox" name="release_flag"></p>
<!--                    <a href="javascript:save.submit()">保存</a>-->
                    <button type="submit">保存</button>
                </div>
            </form>
        </div>
    </div>
</main>
<footer id="footer">
</footer>
</body>
</html>