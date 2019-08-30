<!DOCTYPE html>
<html lang="jp" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>scheduler</title>
  </head>
  <body>
  <div>
    <p id="ClockArea"></p>
    <table>
      <tr>
        <th>日付</th>
        <th>内容</th>
        <th>削除</th>
      </tr>

      <dialog>
        <form method = 'post' action = 'insert.php'>
          時刻<br>
          <input type = 'datetime-local' name = 'time' value = ''><br>
          内容<br>
          <textarea name = 'comment'></textarea><br>
          <input type = 'submit' value = 'OK'>
        </form>
        <button id = 'close' type = "reset">キャンセル</button>
      </dialog>
      <h1><button id='show'>追加</button></h1>

      <?php
        try{
          $pdo = new PDO("mysql:; host=", "", ""); //データベース名記入
          $st = $pdo->query("SELECT * FROM ");　//テーブル名記入

          foreach($st -> fetchAll() as $row){
            echo '<tr>';
            echo '<td>', substr($row['schedule_time'], 0, -3), '</td>';
            echo '<td>', $row['comment'], '</td>';
            $id = $row['id'];
            echo "<form method='post' action='delete.php'>
                    <td>
                    <button type = 'submit' name='id' value = $id> delete </button>
                    </td>
                  </form>";
            echo '</tr>';
          }
        } catch(PDOException $e) {
          echo 'Connection failed: ' . $e->getMessage();
        }
      ?>
    </tabele>
    <script>
      var dialog = document.querySelector('dialog');
      var btn_show = document.getElementById('show');
      var btn_close = document.getElementById('close');
      btn_show.addEventListener('click', function() {
        dialog.showModal();
      }, false);
      btn_close.addEventListener('click', function() {
        dialog.close();
      }, false);

      function img_set(time){
        var str;
        if (time < 10) {str = "0" + time;}
        else {str = time;}
        return str;
      }

      function showClock1() {
        var nowTime = new Date();
        var nowYear = nowTime.getFullYear();
        var nowMonth = parseInt(nowTime.getMonth()) + 1;
        nowMonth = img_set(nowMonth);
        var nowDate = nowTime.getDate();
        var nowHour = img_set(nowTime.getHours());
        var nowMin  = img_set(nowTime.getMinutes());
        var nowSec  = img_set(nowTime.getSeconds());
        var msg = nowHour + ":" + nowMin + ":" + nowSec ;
        var datetime = nowYear + "-" + nowMonth + "-" + nowDate + " " + msg;
        document.getElementById("ClockArea").innerHTML = datetime;
      }
      setInterval('showClock1()',1000);
    </script>
  </div>
  </body>
  <style>
    body{
      background: #d3d3d3;
      font-family: Meityo;
    }
    button {

    }
    p {
      background: #ffffff;
      font-family: fantasy;
      font-size: 45px;
      text-align: center;
      margin: auto;
    }
    div {
      background: #ffffff;
      width: 570px;
      padding: 20px;
      text-align: center;
      margin: auto;
    }
    table {
       border-collapse: collapse;
       width: auto;
       background: #ffffff;
       margin: auto;
    }
    td {
      border: solid 1px;
      padding: 0.5em;
    }
  </style>
</html>
