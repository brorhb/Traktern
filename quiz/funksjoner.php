<?php
	function connectDB() {
		$servername = "db136146.mysql.sysedata.no";
		$username = "db136146";
		$password = "df7628d4";
		$dbname = "db136146";

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);

		// Check connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		//echo "Connected successfully";

		return $conn;
	}

	function nyKategori($kategorinavn) {
		connectDB();

		$kategorinavn = connectDB()->real_escape_string(utf8_decode($kategorinavn));

		$sql = "INSERT INTO qz_kategori (navn)
		VALUES ('$kategorinavn');";

		if (connectDB()->query($sql) === TRUE) {
			//echo "New record created successfully";
		} else {
			//echo "Error: " . $sql . "<br>" . connectDB()->error;
		}

		connectDB()->close();
	}
	
	function nyttSpørsmål($spørsmål,$kategoriID) {
		connectDB();

		$spørsmål = connectDB()->real_escape_string(utf8_decode($spørsmål));
		$kategoriID = connectDB()->real_escape_string(utf8_decode($kategoriID));

		$sql = "INSERT INTO qz_sporsmaal (sporsmaal, kategoriID)
		VALUES ('$spørsmål', '$kategoriID');";

		if (connectDB()->query($sql) === TRUE) {
			//echo "New record created successfully";
		} else {
			//echo "Error: " . $sql . "<br>" . connectDB()->error;
		}

		connectDB()->close();
	}

	// $svar = FALSE --> galt, $svar = TRUE --> riktig
	function nyttSvaralternativ($spørsmålID, $svaralternativ, $svar) {
		connectDB();

		$spørsmålID = connectDB()->real_escape_string(utf8_decode($spørsmålID));
		$svaralternativ = connectDB()->real_escape_string(utf8_decode($svaralternativ));
		$svar = connectDB()->real_escape_string(utf8_decode($svar));

		$sql = "INSERT INTO qz_svar (sporsmaalID, svaralternativ, svar)
		VALUES ('$spørsmålID', '$svaralternativ', '$svar');";

		if (connectDB()->query($sql) === TRUE) {
			//echo "New record created successfully";
		} else {
			//echo "Error: " . $sql . "<br>" . connectDB()->error;
		}

		connectDB()->close();
	}

	function HentKategorinavnFraKategoriID($kategoriID) {
		connectDB();

		$sql = "SELECT navn FROM qz_kategori WHERE id = '$kategoriID';";
		$result = connectDB()->query($sql);

		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				return utf8_encode($row["navn"]);
			}
		}
		connectDB()->close();
	}

	function HentSporsmaalFraSporsmaalID($sporsmaalID) {
		connectDB();

		$sql = "SELECT sporsmaal FROM qz_sporsmaal WHERE id = '$sporsmaalID';";
		$result = connectDB()->query($sql);

		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				return utf8_encode($row["sporsmaal"]);
			}
		}
		connectDB()->close();
	}

	function HentSvaralternativFraSvarID($svarID) {
		connectDB();

		$sql = "SELECT svaralternativ FROM qz_svar WHERE id = '$svarID';";
		$result = connectDB()->query($sql);

		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				return utf8_encode($row["svaralternativ"]);
			}
		}
		connectDB()->close();
	}

	function HentAntallSvaralternativerFraSporsmaalID($sporsmaalID) {
		connectDB();

		$sql = "SELECT COUNT(*) AS antall FROM qz_svar WHERE sporsmaalID = '$sporsmaalID';";
		$result = connectDB()->query($sql);

		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				return utf8_encode($row["antall"]);
			}
		}
		connectDB()->close();
	}

	function HentAntallRiktigeSvaralternativerFraSporsmaalID($sporsmaalID) {
		connectDB();

		$sql = "SELECT COUNT(*) AS antall FROM qz_svar WHERE sporsmaalID = '$sporsmaalID' AND svar = '1';";
		$result = connectDB()->query($sql);

		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				return utf8_encode($row["antall"]);
			}
		}
		connectDB()->close();
	}

	function sjekkOmSvaralternativErKorrekt($svarID) {
		connectDB();

		$sql = "SELECT svar FROM qz_svar WHERE id = '$svarID';";
		$result = connectDB()->query($sql);

		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				if ($row["svar"] == 1) {
					return TRUE;
				}
				else {
					return FALSE;
				}
			}
		}
		connectDB()->close();
	}

	function progresjon($brukerid)
	{
		echo '
			<h4>Kaffe latte</h4>
			<div class="progresjonBG">
				<div class="progresjon" style="width:3%;"></div>
			</div>
			<h4>Kaffe i Norge</h4>
			<div class="progresjonBG">
				<div class="progresjon" style="width:60%;"></div>
			</div>
			<h4>Chai latte</h4>
			<div class="progresjonBG">
				<div class="progresjon" style="width:3%;"></div>
			</div>
		';
	}
?>