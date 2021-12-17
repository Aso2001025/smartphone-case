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
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<?php require 'header.php';
if(!isset($_SESSION['name'])) {
    echo '<META http-equiv="Refresh" content="0.01;URL=toppage.php">';
}?>
<main>

    <?php
    $flag=false;
    if($_POST['type_code']==0){
        echo '<p>ケースタイプが選択されていません';
        $flag=true;
    }else if(!isset($_POST['image_pass'])){
        echo '<p>デザイン画像が選択されていません';
        $flag=true;
    }else if(!isset($_POST['design_name'])){
        echo '<p>デザインネームが入力されていません';
        $flag=true;
    }
    $pdo = new PDO('mysql:host=mysql153.phy.lolipop.lan; 
                    dbname=LAA1290607-smartphone;charst=UTF8',
        'LAA1290607', 'Pass2525');
    if($flag){
        echo '<a href="customize.php">作成に戻る</a>';
    }else{
        $release_flag=1;
        if($_POST['release_flag']=='on'){
            $release_flag=0;
        }
        $sql=$pdo->prepare('insert into d_design values ("",?,?,?,?,?,?,?)');
        $date = date("y-m-d");
        $sql->execute([$_POST['design_name'],$_SESSION['name'],$_POST['model_code'],$_POST['type_code'],$_POST['image_pass']
            ,$release_flag,$date]);
        echo '<META http-equiv="Refresh" content="0.01;URL=mydesign.php">';
    }

    ?>
</main>
<footer id="footer">
</footer>
</body>
</html>