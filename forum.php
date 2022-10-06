        <?php
        $link = mysqli_connect("localhost", "root", "root","university");

        $sql = "SELECT * FROM students ORDER BY Time DESC";

        if ($result= $link->query($sql)){
	foreach ($result as $row) {
 		$name=$row["Name"];
        $time=$row["Time"];
        $msg=$row["Msg"];

 		echo "<div ><a style='background-color:#B58B37' ><font size='4' style='color:#FAF2E4;'><b>".$name."</b></font></a><br>  <font style='color:#FAF2E4;'>".$msg."</div><div align='right'>".$time."</div></font><hr size='4' color='#2F3E44'>";
	}
}

?>
