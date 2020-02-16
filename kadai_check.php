

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
      // この2行がないとpostで引数を持ってこれないのはどうして？
      require_once('../common/common.php');
      $post = sanitize($_POST);

      $onamae = $post['onamae'];
      $okflg = true;

      // if($onamae==''){
      //   echo '入力をして下さい。<br/><br/>';
      //   $okflg = false;
      // }else{
      //   echo 'お名前：';
      //   echo $onamae;
      //   echo '<br/>';
      // }


          if($onamae==''){
            echo '入力をして下さい。<br/><br/>';
            $okflg = false;
            // 英数字のみ許可
          }elseif(preg_match('/^[a-zA-Z0-9]+$/',$onamae)==0){
            echo '半角英数字で入力してください。<br/><br/>';
            $okflg = false;
          }else{
            echo 'お名前：';
            echo $onamae;
            echo '<br/>';
          }


          if($okflg == true){
            echo '<form method="post" action="kadai_done.php">';
            echo '<input type="hidden" name="onamae" value="'.$onamae.'">';
            echo '<br/>';
            echo '上記でお間違いないですか？<br/>';
            echo '<input type="button" onclick="history.back()" value="戻る">';
            echo '<input type="submit" value="OK"><br/>';
            echo '</form>';
          }else{
            echo '<form>';
            echo '<input type="button" onclick="history.back()" value="戻る">';
            echo '</form>';
          }
      ?>
  </body>
</html>
