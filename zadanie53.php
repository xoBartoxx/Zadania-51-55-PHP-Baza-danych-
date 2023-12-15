<!DOCTYPE html>
<html>

	<head>
		<meta charset="uft-8"/>
		<title>Zadanie 53</title>
	</head>
	
	<body>
		<?php
		
			//Napisz skrypt PHP, który policzy ile osób (nauczycieli i uczniów) ma imię, które kończy się literą a.
			
			$host = 'localhost';
			$user = 'root';
			$pass = '';
			$base = 'dziennik';
			
			$db = mysqli_connect($host, $user, $pass, $base);
			
			$zapytanie1 = 'SELECT COUNT(imie) FROM nauczyciel WHERE imie LIKE "%a"';
			$zapytanie2 = 'SELECT COUNT(imie) FROM uczen WHERE imie LIKE "%a"';
			
			if(mysqli_connect_errno()){
				echo 'Błąd połączenia z baną danych' . mysqli_connect_errno();
				exit();
			}
		
			$result = mysqli_query($db, $zapytanie1);
			$result2 = mysqli_query($db, $zapytanie2);

			while($row = mysqli_fetch_array($result)){
					echo "Liczba nauczycieli kończących imię na literę a: " . $row['COUNT(imie)'];
				}
				
			echo "<br>";
				
			while($row = mysqli_fetch_array($result2)){
					echo "Liczba uczniów kończących imię na literę a: " . $row['COUNT(imie)'];
				}
			
			mysqli_close($db);
			
		?>
	</body>

</html>