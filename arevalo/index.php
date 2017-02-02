<html>
<body background="yes.jpg" style="width:1600px;height:900px;">>
<div style="float: right">
<form align="right" name="form1" method="post" action="login.php">
  <label class="logoutLblPos">
  <input name="submit2" type="submit" id="submit2" value="log out">
<div class="container">
<?php
	$c = oci_connect("janselarevalo", "jae900200", "localhost/xe");
	if (!$c) {
		$e = oci_error();
			trigger_error('Could not connect to Database:'. $e['message'], E_USER_ERROR);
		}

	$s = oci_parse($c, "select * from BOOKS");
	if (!$s) {
		$e = oci_error($c);
			trigger_error('Could not parse statement:'. $e ['message'], E_USER_ERROR);

		}
	$r = oci_execute($s);
	if (!$r) {
		$e = oci_error($s);
			trigger_error('Could not execute statement:'. $e['message'], E_USER_ERROR);
		}

		echo "<table border = '1'>\n";
		$ncols = oci_num_fields($s);
			echo "<tr>\n";

			for($i = 1; $i<=$ncols; ++$i){
			$colname = oci_field_name($s, $i);
			echo "<th><b>" .htmlentities($colname,ENT_QUOTES). "</b></th>\n";
		}

		echo "<tr>\n";
		while (($row = oci_fetch_array($s,OCI_ASSOC + OCI_RETURN_NULLS))!=FALSE) {
			echo "<tr>\n";
			foreach ($row as $item) {
				echo "<td>".($item!==null?htmlentities($item,ENT_QUOTES):"&nbsp;")."</td>\n";
			}
			echo "</tr>\n";
		}
		echo "</table>\n"

		?>
		</div>
		<style>
		div.container {
			background-color: green;
			color: green;

			width: 70%;
			opacity: .70;
			margin: 440px 90px 0px;
			padding:50 px;
		}
		table, td, th {
			border:1px solid black;
		}
		table {
			border-collapse: collapse;
			width: 98%;
		}
		th {

			height: 50px;
		}

		 </label>
</form>
</div>
	</body>
</html>