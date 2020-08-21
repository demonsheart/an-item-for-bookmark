@include('header')
<br>
<table width="300" cellpadding="2" cellspacing="0">
<?php
    $color = "#cccccc";
    echo "<tr bgcolor=\"" . $color . "\">
    <td><strong>Recommendations</strong></td></tr>";
        foreach ($result as $url) 
        {
            if ($color == "#cccccc") 
            {
                $color = "#ffffff";
            } else 
            {
                $color = "#cccccc";
            }
        
            echo "<tr bgcolor=\"" . $color . "\">
    <td><a href=\"" . $url->bm_URL. "\">" . htmlspecialchars($url->bm_URL) . "</a></td></tr>";
        }
?>
</table>
@include('display_menu')
@include('footer')