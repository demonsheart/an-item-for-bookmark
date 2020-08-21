<hr>
<a href="/menu">Home</a> &nbsp;|&nbsp;
<a href="/add_bm_form">Add BM</a> &nbsp;|&nbsp;
<?php
    // only offer the delete option if bookmark table is on this page
    global $bm_table;
    if ($bm_table == true) 
    {
        echo "<a href=\"#\" onClick=\"bm_table.submit();\">Delete BM</a> &nbsp;|&nbsp;";
    } else 
    {
        echo "<span style=\"color: #cccccc\">Delete BM</span> &nbsp;|&nbsp;";
    }
?>
<a href="/change_passwd_form">Change password</a><br>
<a href="/recommend">Recommend URLs to me</a> &nbsp;|&nbsp;
<a href="/logout">Logout</a>
<hr>