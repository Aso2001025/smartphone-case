<?php session_start();


$pdo = new PDO('mysql:host=mysql153.phy.lolipop.lan;
    dbname=LAA1290607-smartphone;charset=utf8;', 'LAA1290607', 'Pass2525');

$flag=false;
foreach ($pdo->query('select * from d_cart') as $item) {
    if($item['customer_code'] == $_SESSION['name'] && $item['design_code'] == $_POST['design'] && $item['del_flag']!=1){
        $flag = true;
        break;
    }else if($item['customer_code'] == $_SESSION['name'] &&  $item['design_code'] == $_POST['design']){
        $sql = $pdo->prepare('delete from d_cart where design_code=? and customer_code=?');
        $sql->execute([$_POST['design'],$_SESSION['name']]);

    }
}

if($flag){
    $sql = $pdo->prepare('select num from d_cart where design_code=?');
    $sql->execute([$_POST['design']]);
    $num;
    foreach ($sql as $item){
        $num = $item['num'] + 1;
    }
    $sql = $pdo->prepare('update d_cart set num=? where design_code=?');
    $sql->execute([$num,$_POST['design']]);

}else{
    $sql = $pdo->prepare('insert into d_cart values (?,?,?,1,0,?)');
    $date = date("y-m-d");
    $sql->execute([$_SESSION['name'],$_POST['design'],$_POST['price'],$date]);
}
$pdo=null;
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>register-out</title>
</head>
<body>
<META http-equiv="Refresh" content="0.01;URL=cart.php">
</body>
</html>
