    <form method="post" enctype="multipart/form-data" action="">
        <p><input type="file" name="files"></p>
        <p><input type="submit" value="アップロード"></p>
    </form>
    <?php
        error_reporting(E_ALL & ~E_NOTICE);
    ?>
    <?php
        if(is_uploaded_file($_FILES['files']['tmp_name'])){
            if(!file_exists('upload')){
                mkdir('upload');
            }
        $file='upload/'.basename($_FILES['files']['name']);
        if(move_uploaded_file($_FILES['files']['tmp_name'],$file)){
            echo $file,'のアップロードに成功しました。';
            echo'<p><img src="',$file,'"></p>';
        }else{
            echo'アップロードに失敗しました。';
        }
    }
    ?>
