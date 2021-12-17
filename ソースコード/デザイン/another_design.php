<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/anotherdesign_main.css">
    <title>Another Design</title>
</head>
<body>

<?php require 'header.php';
if(!isset($_SESSION['name'])) {
    echo '<META http-equiv="Refresh" content="0.01;URL=toppage.php">';
}
?>

}
<main>
<h2>他のデザイン</h2>
<form action="another_design.php" method="post">
<?php
$pdo = new PDO('mysql:host=mysql153.phy.lolipop.lan; 
        dbname=LAA1290607-smartphone;charst=UTF8',
    'LAA1290607', 'Pass2525');

$text="";
$model="";
$type="";
$model_flag=false;
$type_flag=false;
if(isset($_POST['text'])){
    $text = $_POST['text'];
}
if(isset($_POST['model'])&&$_POST['model']!=0){
    $model = $_POST['model'];
    $model_flag = true;
}
if(isset($_POST['type'])&&$_POST['type']!=0){
    $type = $_POST['type'];
    $type_flag = true;
}

if(isset($_POST['text'])) {
    $text = $_POST['text'];
}
echo '<p>キーワード：<input type="text" name="text" value="',$text,'" placeholder="　キーワード入力">';

echo '  モデル：<select name="model">';
echo '<option value="0"></option>';
foreach ($pdo->query('select * from m_model order by model_name') as $item){
    echo '<option value="',$item['model_code'],'">',$item['model_name'],'</option>';
}
echo '</select>';

echo '  ケースタイプ：<select name="type">';
echo '<option value="0"></option>';
foreach ($pdo->query('select * from m_type order by type_name') as $item){
    echo '<option value="',$item['type_code'],'">',$item['type_name'],'</option>';
}
echo '</select>';
echo '<button type="submit"> 検索</button></p>';
echo '</form>';

$sql;
if($type_flag && $model_flag){
    $sql = $pdo->prepare('select design_code,design_image,design_name from d_design
                            where release_flag=0 and customer_code<>? and (design_code LIKE ? OR design_name LIKE ?)
                            and type_code=? and model_code=?');
    $sql->execute([$_SESSION['name'],'%'.$text.'%','%'.$text.'%',$type,$model]);
}else if($type_flag){
    $sql = $pdo->prepare('select design_code,design_image,design_name from d_design
                            where release_flag=0 and customer_code<>? and (design_code LIKE ? OR design_name LIKE ?)
                            and type_code=?');
    $sql->execute([$_SESSION['name'],'%'.$text.'%','%'.$text.'%',$type,]);
}else if($model_flag){
    $sql = $pdo->prepare('select design_code,design_image,design_name from d_design
                            where release_flag=0 and customer_code<>? and (design_code LIKE ? OR design_name LIKE ?)
                            and model_code=?');
    $sql->execute([$_SESSION['name'],'%'.$text.'%','%'.$text.'%',$model]);

}else{
    $sql = $pdo->prepare('select design_code,design_image,design_name from d_design
                            where customer_code<>? and release_flag=0 and (design_code LIKE ? OR design_name LIKE ?)');
    $sql->execute([$_SESSION['name'],'%'.$text.'%','%'.$text.'%']);
}


echo '<div class="content">';
foreach($sql as $item){
    echo '<div class="item">';
    echo '<form action="syousai.php" method="post">';
    echo '<input type="hidden" name="design" value="',$item['design_code'],'" >';
    echo '<input type="image" class="item_image" src="',$item['design_image'],'" alt="送信する">';
    echo '<p>',$item['design_name'],'</p>';
    echo '</form>';
    echo '</div>';
}

echo '</div>';

?>
</main>



</body>
</html>

