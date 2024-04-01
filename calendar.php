<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>Calendar</title>
    <link rel="stylesheet" href="./style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container">
<?php  
        //今月を取得（例：2022年11月）
        $now_month = date("Y年n月");
        //本日を取得（例：2022-11-12）
        $today = date("Y-m-d");
        //今月の 1 日を取得（例：2022-11-01）
        $start_date = date('Y-m-01');
        //今月の最終日を取得（例：2022-11-30）
        $end_date = date("Y-m-t");
        //今月の 1 日の曜日を取得（日:0 月:1 火:2 水:3 木:4 金:5 土:6）
        $start_week = date("w",strtotime($start_date));
        //今月の最終日の曜日を取得（日:0 月:1 火:2 水:3 木:4 金:5 土:6）
        $end_week = date("w",strtotime($end_date));
?>
        <h3 class="mb-5"><?php echo $now_month ?></h3>
        <table class="table table-bordered">
            <tr>
                <th>日</th>
                <th>月</th>
                <th>火</th>
                <th>水</th>
                <th>木</th>
                <th>金</th>
                <th>土</th>
            </tr>
            <tr>
                <?php
                    //1日目より前の空白セル
                    $week_fast_spase = 6 - $start_week;
                    for($i = $week_fast_spase; $i < 6; $i++){
                        echo '<td></td>';
                    }

                    //カレンダーデータ表示
                    $end_day = date("t");
                    $now_day = date("d");
                    for($i = 1; $i <= $end_day; $i++){
                        //本日ならテーブルオレンジにしたい
                        if($i == $now_day){
                            echo "<td class='today'>{$i}</td>";
                        } else {
                            //日付の数字を出したい
                            echo "<td>{$i}</td>";
                        }

                        //土曜ならテーブル改行
                        $it_day = date('Y-m-'.$i);
                        //backdate→ $it_day = date('Y-m-$i'); $iが文字列になってた？
                        $it_week = date("w",strtotime($it_day));
                        if($it_week == 6){
                            echo "</tr><tr>";
                        }
                    }

                    //最終日より後の空白セル
                    $week_end_spase = 6 - $end_week;
                    for($i = $week_end_spase; $i < 6; $i++){
                        echo "<td></td>";
                    }

                ?>

            </tr>
        </table>
    </div>
</body>
</html>