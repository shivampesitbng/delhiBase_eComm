<?
        $connect=mysql_connect("localhost","groun19w_anky","z8X+hMB6HEyp") or die("Unable to Connect");
        mysql_select_db("groun19w_checkout") or die("Could not open the db");
        $showtablequery="SHOW TABLES FROM dbname";
        $query_result=mysql_query($showtablequery);
        while($showtablerow = mysql_fetch_array($query_result))
        {
        echo $showtablerow[0]." ";
        } 
        ?>