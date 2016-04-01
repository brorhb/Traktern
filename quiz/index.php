<?php
	include_once("funksjoner.php");

	connectDB();

	$sql = "SELECT id FROM qz_kategori;";
	$result = connectDB()->query($sql);

	if (@!$_GET['svar'] == 1) {
		echo '<a href="?svar=1">Fasit</a>';
	}
	else {
		echo '<a href="?">Tilbake</a>';
	}

	if ($result->num_rows > 0) {

		// output data of each row
		while($row = $result->fetch_assoc()) {

			$kategoriID = $row["id"];

			echo "<h2>" . HentKategorinavnFraKategoriID($kategoriID) . "</h2>";

			$sql2 = "SELECT * FROM qz_sporsmaal WHERE kategoriID = '$kategoriID';";
			$result2 = connectDB()->query($sql2);

			if ($result2->num_rows > 0) {
				// output data of each row
				while($row2 = $result2->fetch_assoc()) {

					$sporsmaalID = $row2["id"];

					echo "<p><strong>" . HentSporsmaalFraSporsmaalID($sporsmaalID) . "</strong></p>";

					$sql3 = "SELECT * FROM qz_svar WHERE sporsmaalID = '$sporsmaalID';";
					$result3 = connectDB()->query($sql3);

					if ($result3->num_rows > 0) {
						// output data of each row
						while($row3 = $result3->fetch_assoc()) {

							$svarID = $row3["id"];
							$svaralternativ = utf8_encode($row3["svaralternativ"]);
							$svar = utf8_encode($row3["svar"]);

							if (@!$_GET['svar']==1) {
								echo '<p><input type="checkbox" name="' . $svarID . '"> ' . $svaralternativ . '</p>';
							}
							else {
								if ($svar == FALSE) {
									echo '<p style="color:red;"><input type="checkbox" name="' . $svarID . '"> ' . $svaralternativ . '</p>';
								}
								else {
									echo '<p style="color:green;"><input type="checkbox" name="' . $svarID . '" checked> ' . $svaralternativ . '</p>';
								}
							}
						}
					}
				}
			}
		}
	}
	else {
		echo "0 results";
	}
	connectDB()->close();
?>