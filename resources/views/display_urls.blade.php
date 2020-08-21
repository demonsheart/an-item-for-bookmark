<?php 
global $bm_table;
$bm_table = true;
?>
<br>
<form name="bm_table" action="/delete_bms" method="post">
    <table width="300" cellpadding="2" cellspacing="0">
        <?php
            $color = "#cccccc";
            echo "<tr bgcolor=\"" . $color . "\"><td><strong>Bookmark</strong></td>";
            echo "<td><strong>Delete?</strong></td></tr>";
            if ((is_array($result)) && (count($result) > 0)) 
            {
                foreach ($result as  $url) 
                {
                    if ($color == "#cccccc") 
                    {
                        $color = "#ffffff";
                    } else 
                    {
                        $color = "#cccccc";
                    }
                    echo "<tr bgcolor=\"" . $color . "\"><td><a href=\"" . $url['bm_URL'] . "\">" . 
                            htmlspecialchars($url['bm_URL']) . "</a></td>
                    <td><input type=\"checkbox\" name=\"del_me[]\"
                        value=\"" . $url['bm_URL'] . "\"></td>
            </tr>";
                }
            } else 
            {
                $bm_table = false;
                echo "<tr><td>No bookmarks on record</td></tr>";
            }
            ?>
            {{ csrf_field() }}
    </table>
</form>