<!DOCTYPE html>
<html>

	<head>
		<meta charset="uft-8"/>
		<title>Zadanie 51</title>
	</head>
	
	<body>
		<?php
			//Napisz skrypt PHP, który wypisze na ekran, w postaci listy numerowanej, nazwiska i imiona wszystkich uczniów z klasy 3 TI posortowanych alfabetycznie nazwiskiem.
			
			$host = 'localhost';
			$user = 'root';
			$pass = '';
			$base = 'dziennik';
			
			$db = mysqli_connect($host, $user, $pass, $base);
			
			$zapytanie = 'SELECT uczen.imie, uczen.nazwisko FROM uczen JOIN klasa ON klasa.id=uczen.id_klasa WHERE klasa.id = "10" GROUP BY nazwisko';
			
			if(mysqli_connect_errno()){
				echo 'Błąd połączenia z baną danych' . mysqli_connect_errno();
				exit();
			}
		
			$result = mysqli_query($db,$zapytanie);

			echo "<ol>";
			
			if(mysqli_num_rows($result) > 0 ){
				while($row = mysqli_fetch_array($result)){
					echo "<li>Imię: ".$row["imie"]. "Nazwisko: " . $row["nazwisko"]. "</li>";
				}
					echo "</ol>";
			}
			
			mysqli_close();
			
		?>
	</body>

</html>