<?php
	$debug = FALSE;

	// Hvilke(n) kategori(er) quizen skal gjelde
	//$kategoriargument = 1;
	$totalt_antall_sporsmaal_per_kategori = 100;

	include_once("../funksjoner.php");

	connectDB();

	/* Script info */
		/*session_start();
		print_r($_SERVER);
		echo "<br><br><br>Session:";
		print_r($_SESSION);
		echo "Session slutt<br><br>";*/

	// Hvis brukeren leverer quizen
	if (@$_POST['lever']) {

		$poeng = 0;
		$poeng_per_sporsmaal = 10;
		$antall_sporsmaal = 0;

		$sporsmaalIDer = $_POST['sporsmaalID'];
		$antall = count($sporsmaalIDer);
			if ($debug === TRUE) { echo "Antall: " . $antall . "<br>"; }

		// For hvert spørsmål
		for ($i=0; $i<$antall; $i++) {
			$sporsmaalIDsvar = $_POST['sporsmaalID'][$i];
			if ($debug === TRUE) { echo "Spørsmål ID: " . $sporsmaalIDsvar . "<br>"; }

			$svarIDer = $_POST['svar'][$sporsmaalIDsvar];
			$antall1 = count($svarIDer);
			if ($debug === TRUE) { echo "Antall svar: " . $antall1 . "<br>"; }

			// Finne antall mulige poeng for gitt spørsmål
			$antall_alternativer = HentAntallSvaralternativerFraSporsmaalID($sporsmaalIDsvar);

			// Hindrer at det legges til poeng i totalsumen hvis spørsmålet ikke har noen svaralternativer
			// Spørsmålet må tas med i og med at det har allerede blitt vist til brukeren
			if ($antall_alternativer > 0) {

				$antall_riktige_fasit = HentAntallRiktigeSvaralternativerFraSporsmaalID($sporsmaalIDsvar);
				$antall_feil_fasit = $antall_alternativer - $antall_riktige_fasit;

				$antall_riktige_bruker = 0;
				$antall_feil_bruker = 0;

				// Kjører for hver alternativ brukeren har huket av
				for ($j=0; $j<$antall1; $j++) {
					$svarIDersvar = $_POST['svar'][$sporsmaalIDsvar][$j];
					if ($debug === TRUE) { echo "Svar: " . $svarIDersvar . "<br>"; }

					// Hvis det riktige 
					if (sjekkOmSvaralternativErKorrekt($svarIDersvar)) {
						$antall_riktige_bruker++;
					}
					else {
						$antall_feil_bruker++;
					}

				}

				$antall_korrekte_rikitge = $antall_riktige_bruker;
				$antall_korrekte_feil = $antall_feil_fasit - $antall_feil_bruker;
				$antall_rikitge_svar = $antall_korrekte_rikitge + $antall_korrekte_feil;
				$poengprosent = round($antall_rikitge_svar / $antall_alternativer * 100);
				$antall_poeng = round($poeng_per_sporsmaal * $poengprosent / 100);
				$poeng += $antall_poeng;
				$antall_sporsmaal++;

			}

			if ($debug === TRUE) {
				echo "<br><h4>Antall spørsmål: " . $antall_sporsmaal . "<br> Poeng: " . $poeng . "/". $antall_sporsmaal * $poeng_per_sporsmaal . " (" . $poengprosent . "%)</h4><br>";

				echo "<br><br>";
			}

		}

		$totalt_mulige_poeng = $antall_sporsmaal * $poeng_per_sporsmaal;
		$total_prosent = round($poeng / $totalt_mulige_poeng * 100, 1);
		echo "<h1>Antall spørsmål: " . $antall_sporsmaal . "<br> Poeng: " . $poeng . "/". $totalt_mulige_poeng . " (" . $total_prosent . "%)</h1>";

	}
	else {

		if (isset($kategoriargument)) {
			$sql = "SELECT id FROM qz_kategori WHERE id = $kategoriargument ORDER BY RAND();";
		}
		else {
			$sql = "SELECT id FROM qz_kategori ORDER BY RAND();";
		}
		
		$result = connectDB()->query($sql);

		/*if (@!$_GET['svar'] == 1) {
			echo '<a href="?svar=1">Fasit</a>';
		}
		else {
			echo '<a href="">Tilbake</a>';
		}*/

		if ($result->num_rows > 0) {

			echo '<form action="" method="POST">';

			// output data of each row
			while($row = $result->fetch_assoc()) {

				$kategoriID = $row["id"];

				echo "<h2>" . HentKategorinavnFraKategoriID($kategoriID) . "</h2>";

				$sql2 = "SELECT * FROM qz_sporsmaal WHERE kategoriID = '$kategoriID' ORDER BY RAND() LIMIT " . $totalt_antall_sporsmaal_per_kategori . ";";
				$result2 = connectDB()->query($sql2);

				if ($result2->num_rows > 0) {
					// output data of each row
					while($row2 = $result2->fetch_assoc()) {

						$sporsmaalID = $row2["id"];

						echo "<p><strong>" . HentSporsmaalFraSporsmaalID($sporsmaalID) . "</strong></p>";
						echo '<input type="hidden" name="sporsmaalID[]" value="' . $sporsmaalID . '">'; // Spørsmål ID

						$sql3 = "SELECT * FROM qz_svar WHERE sporsmaalID = '$sporsmaalID' ORDER BY RAND();";
						$result3 = connectDB()->query($sql3);

						if ($result3->num_rows > 0) {
							// output data of each row
							while($row3 = $result3->fetch_assoc()) {

								$svarID = $row3["id"];
								$svaralternativ = utf8_encode($row3["svaralternativ"]);
								$svar = utf8_encode($row3["svar"]);

								if (@!$_GET['svar']==1) {
									echo '<p><input type="checkbox" name="svar[' . $sporsmaalID . '][]" value="' . $svarID . '"> ' . $svaralternativ . '</p>';
								}
								else {
									if ($svar == FALSE) {
										echo '<p style="color:red;"><input type="checkbox" name="svar[' . $sporsmaalID . '][]" value="' . $svarID . '"> ' . $svaralternativ . '</p>';
									}
									else {
										echo '<p style="color:green;"><input type="checkbox" name="svar[' . $sporsmaalID . '][]" value="' . $svarID . '" checked> ' . $svaralternativ . '</p>';
									}
								}
							}
						}
					}
				}
			}
			echo '<input type="submit" value="Lever svar" name="lever">';
			echo "</form>";
		}
		else {
			echo "0 results";
		}
	}
	connectDB()->close();
?>