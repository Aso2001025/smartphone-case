<?php
if(is_uploaded_file($_FILES['file']['tmp_name'])){
    if(!file_exists('upload')){
        mkdir('upload');
    }
    //$file:'保存先のパス'.アップロード対象ファイル;
    $file='./img/'.basename($_FILES['file']['tmp_name']);
    //ディレクトリへの保存作業
    if(move_uploaded_file($_FILES['file']['tmp_name'],$file.'.png')){
        echo'ok';
        echo'<p><img src="',$file,'"></p>';
    }else{
        echo'false';
    }
}else{
    echo'choiceFile';
}
?>