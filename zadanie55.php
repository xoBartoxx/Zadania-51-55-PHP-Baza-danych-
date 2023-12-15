<!DOCTYPE html>
<html>

	<head>
		<meta charset="uft-8"/>
		<title>Zadanie 55</title>
	</head>
	
	<body>
		<?php
		
			//Napisz skrypt PHP, który usunie z tabeli nauczyciele wszystkich nauczycieli urodzonych wcześniej niż w roku 1950. Skrypt ma wypisać na ekran ilość takich nauczycieli oraz informację o prawidłowym ich usunięciu z bazy.
			
			$host = 'localhost';
			$user = 'root';
			$pass = '';
			$base = 'dziennik';
			
			$db = mysqli_connect($host, $user, $pass, $base);		
			
			if(mysqli_connect_errno()){
				echo 'Błąd połączenia z baną danych' . mysqli_connect_errno();
				exit();
			}
			
			//$db -> query("SELECT * FROM nauczyciel");

			mysqli_query($db, "SELECT * FROM nauczyciel");
			echo "Dostępne wiersze: " . mysqli_affected_rows($db);
			
			mysqli_query($db, "ALTER TABLE ocena ADD CONSTRAINT id_nauczyciel FOREIGN KEY (id_nauczyciel) REFERENCES nauczyciel(id) ON DELETE CASCADE");
			echo "<br>" . "Zmieniono strukturę tabeli";
			
			mysqli_query($db, "DELETE FROM nauczyciel WHERE data_urodzenia < '1950-01-01'");
			echo "<br>" . "Usunięte wiersze: " . mysqli_affected_rows($db);
				
			mysqli_close($db);
			
		?>
	</body>

</html>