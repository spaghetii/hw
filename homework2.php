
<table border=1>
<?php
    /*將撲克牌排序排好(亦可用range(0,51))*/
    for($i=0;$i<52;$i++){
        $poker[$i] = $i;
    } 
    /*隨機抽牌 將抽到的牌跟最後一張交換 之後從剩下的n-1中再繼續抽牌 直到倒數第二張*/
    for($i=51;$i>0;$i--){
        $temp=0;
        $num = rand(0,$i);

        //swap 
        $temp = $poker[$i];
        $poker[$i]=$poker[$num];
        $poker[$num] =$temp; 

        //swap (限變數為數值時)
        // $a = $a + $b ;       $a = $a ^ $b ;
        // $b = $a - $b ;   OR  $b = $a ^ $b ;
        // $a = $a - $b ;       $a = $a ^ $b ;
    }

    $player = [[],[],[],[]];
    $suit =["&spades;","<font color = 'red'>&hearts;</font>","<font color = 'red'>&diams;</font>","&clubs;"];//4種花色
    $num = ['A',2,3,4,5,6,7,8,9,10,'J','Q','K'];//13張牌

    /*將洗好的牌發到玩家手上 */
    foreach($poker as $index => $v){
        $player[$index % 4][] = $v; 
    }

    /*顯示預設欄位 第一格為"玩家\第N張" 之後為玩家們手上的第N張牌*/
    for($i = 1; $i <= 14 ; $i++){
        $t = $i - 1 ;                           //補正
        if ($i != 1)                            //除了第一格以外都放數字
            echo "<td align='right'>{$t}</td>";
        else echo "<td>玩家\第N張</td>";
    }

    foreach($player as $Pid => $Pval){
        sort($Pval);                            //排序
        $playernum = $Pid + 1;                  //補正
        echo "<tr><td>玩家{$playernum}</td>";   //新增玩家欄位
        /*將排序好的陣列顯示出來 */
        foreach($Pval as $value){
            echo "<td align='right'>";
            echo "{$suit[(int)($value / 13)]}"; //顯示花色
            echo "{$num[$value % 13]}";         //顯示數值
            echo "</td>";
        }
        echo "</tr>";
    }
    
?>
</table>

<!--   //沒想到用陣列的時候的方法
    // foreach($poker as $index => $value){
    //     $color = (int)( $value / 13 ) ;  //4種花色
    //     $num = $value % 13 + 1 ;         //1~13
    //     switch ($num){
    //         case 1:
    //             $num = 'A';
    //             break;
    //         case 11:
    //             $num = 'J';
    //             break;
    //         case 12:
    //             $num = 'Q';
    //             break;
    //         case 13:
    //             $num = 'K';
    //             break;
            
    //     }
    //     switch ($color){
    //         case 0 :
    //             $player[$index % 4][] = "&spades;{$num}";
    //             break;
    //         case 1 :
    //             $player[$index % 4][] = "<font color = 'red'>&hearts;</font>{$num}";
    //             break;
    //         case 2 :
    //             $player[$index % 4][] = "<font color = 'red'>&diams;</font>{$num}";
    //             break;
    //         case 3 :
    //             $player[$index % 4][] = "&clubs;{$num}";
    //             break;
    //         default:
    //             echo 'error' ;
    //             break;
    //     }
    // } 
-->