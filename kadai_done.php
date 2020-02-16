


<!DOCTYPE html>
<html>
  <head>
    <!-- 文字 -->
    <meta charset="UTF-8">
    <link type="text/css" rel="stylesheet"  href="css/kadai.css">
    <script type="text/javascript" src="js/kadai.js"></script>

  </head>

  <body>
    <h2>入力フォーム</h2>

      <?php


        try{
            require_once('../common/common.php');

            $post = sanitize($_POST);
            $onamae = $post['onamae'];

            $dsn = 'mysql:dbname=kadai;host=localhost;charset=utf8';
            $user = 'root';
            $password = '';
            $dbh = new PDO($dsn,$user,$password);
            $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            $sql='INSERT INTO kadai(onamae)
            VALUES(?)';
            $stmt=$dbh->prepare($sql);
            $data=array();

            $data[]=$onamae;
            $stmt->execute($data);

            $dbh=null;
            echo 'お名前の入力が完了いたしました。<br/>';

          }catch(Exception $e){
            echo 'ただいま障害により大変ご迷惑をおかけしております。';
            exit();
          }



      if(preg_match('/^[0-9]+$/',$onamae)==1){
        // もし数字のみだったら
        if( $onamae <  100){
          echo '私は：';
          echo $onamae.'才です';
          echo '<br/>';
        }elseif($onamae < 200){
          echo '私の身長は：';
          echo $onamae.'cmです';
          echo '<br/>';
        }else{
          echo '今は';
          echo $onamae * 100 .'円持っています。';
          echo '<br/>';
        }


      }else{

          if($onamae == 'abe'){
            echo '私の名前は：';
            echo 'あべ'.'です';
            echo '<br/>';
          }elseif($onamae == 'komiyama'){
            echo 'こんにちは：';
            echo 'こみやま'.'さん';
            echo '<br/>';
          }else{
            echo 'すみません、'.$onamae.'は分かりません';
            echo '<br/>';
          }

      }


      ?>
      <form method="post" action="kadai.php">
        <input type="submit" name="clear" value="初期画面へ">
      </form>

  </body>
</html>
