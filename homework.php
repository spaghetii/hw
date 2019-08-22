<table border= 3px >
    <?php
        define("ROW", 10);  //有N列
        define("DPR", 10);  //每列有N格
        define("INI", 1);   //初始值
        // final = INI + DPR + ( ROW * DPR ) - 1 
        
        for ($k = 0; $k < ROW; $k++) {
            echo '<tr>';
            $start = INI+($k*DPR);          //開始的值
            $final = INI+DPR+($k*DPR)-1;    //結束的值
            
            for ($i = $start; $i <= $final; $i++) {
                $flag=true;        //旗標 是否為質數

                if ($i <= 1) {     //質數是不含1跟0的正整數
                    $flag=false;
                }else{
                    for($j = 2;$j <= (int)sqrt($i);$j++){   //從2開始除 直到該數開根號的值
                        if ($i % $j == 0){                  //當餘數為0時就代表被整除 (0是不會進到這個迴圈的)
                            $flag = false;
                            break;
                        }
                    }
                }
                //若為質數將背景塗黃 不是的話為粉紅色
                if ($flag) echo '<td bgcolor="yellow">';
                else echo '<td bgcolor="pink">';

                echo substr($i + 1000,1,3);   //不滿3位數時補0
                echo '</td>';
            }
            echo '</tr>';
        }
    ?>
</table>