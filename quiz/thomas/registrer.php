<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
	include_once("../funksjoner.php");

	//Kode som skricer ut spørsmålene som blir sendt inn
	/*connectDB();

	$sql = "SELECT * FROM qz_spørsmål;";
	$result = connectDB()->query($sql);

	if (@$result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			echo "Id: " . $row["id"]. " - Spørsmål: " . $row["spørsmål"]. " kategoriID" . $row["kategoriID"]. "<br>";
		}
	}
	else {
		echo "0 results<br>";
	}
	connectDB()->close();*/


	if (@$_POST['registrer']['kategori']) {
		$kategorinavn = $_POST['kategorinavn'];
		//die($kategorinavn);
		nyKategori($kategorinavn);
	}


	if (@$_POST['registrer']['spørsmål']) {
		$spørsmål = $_POST['spørsmål'];
		$kategoriID = $_POST['kategoriID'];
		nyttSpørsmål($spørsmål,$kategoriID);
	}

	if (@$_POST['registrer']['svaralternativ']) {
		$spørsmålID = $_POST['spørsmålID'];

		$count = count($_POST['svaralternativ']);
		for ($i=0; $i<$count; $i++) {
			$svaralternativ = $_POST['svaralternativ'][$i];
			$svar = $_POST['svar'][$i];
			if ($svaralternativ != "") {
				echo "Svaralternativ: " . $svaralternativ . " Svar: " . $svar . "<br>";
				nyttSvaralternativ($spørsmålID, $svaralternativ, $svar);
			}
		}	
	}



?>

<h2>Legg til kategori:</h2>
<form action="" method="POST">
	Kategorinavn: <input type="text" name="kategorinavn" required></input><br>
	<input type="submit" name="registrer[kategori]" value="Legg til kategori"></input>
</form>

<h2>Legg til spørsmål:</h2>
<form action="" method="POST">
	Spørsmål: <input type="text" name="spørsmål" size="35" required></input><br>
	Kategori:
	<select name="kategoriID" required>
		<?php
			connectDB();

			$sql = "SELECT * FROM qz_kategori;";
			$result = connectDB()->query($sql);

			if ($result->num_rows > 0) {
				echo '<option selected disabled>Velg kategori</option>';
				// output data of each row
				while($row = $result->fetch_assoc()) {
					$id = utf8_encode($row["id"]);
					$navn = utf8_encode($row["navn"]);
					echo "<option value=" . $id . ">" . $navn . "</option>";
				}
			}
			else {
				echo "<option selected disabled>Ingen kategorier</option>";
			}
			connectDB()->close();
		?>
	</select><br>
	<input type="submit" name="registrer[spørsmål]" value="Legg til spøsmål"></input>
</form>

<h2>Legg til svaralternativ:</h2>
<form action="" method="POST">
	Spørsmål:
	<select name="spørsmålID" required>
		<?php
			connectDB();

			$sql = "SELECT * FROM qz_sporsmaal GROUP BY kategoriID;";
			$result = connectDB()->query($sql);

			if ($result->num_rows > 0) {
				echo '<option selected disabled>Velg spørsmål</option>';
				// output data of each row
				while($row = $result->fetch_assoc()) {
					$kategoriID = $row["kategoriID"];

					$sql2 = "SELECT * FROM qz_sporsmaal WHERE kategoriID = '$kategoriID';";
					$result2 = connectDB()->query($sql2);

					echo '<optgroup label="' . HentKategorinavnFraKategoriID($kategoriID) . '">';

					if ($result2->num_rows > 0) {
						while($row2 = $result2->fetch_assoc()) {
							$id2 = utf8_encode($row2["id"]);
							$sporsmaal2 = utf8_encode($row2["sporsmaal"]);
							echo "<option value=" . $id2 . ">" . $sporsmaal2 . "</option>";
						}
					}

					echo '</optgroup>';
				}
			}
			else {
				echo "<option selected disabled>Ingen spørsmål</option>";
			}
			connectDB()->close();
		?>
	</select>
	<table border="1">
		<tr>
			<th>Svartekst</th>
			<th>Svar</th>
		</tr>
		<?php
			$antall = 5;
			for ($i=0; $i < $antall; $i++) { 
				echo '
					<tr>
						<td><input type="text" name="svaralternativ[]" size="35"></input></td>
						<td><select name="svar[]"><option value="0">Galt</option><option value="1">Riktig</option></select></td>
					</tr>
				';
			}
		?>
	</table>
	<a href="">Legg til nytt svar felt</a><br><br>
	<input type="submit" name="registrer[svaralternativ]" value="Legg til alle svaralternativer i databasen"></input>
</form>