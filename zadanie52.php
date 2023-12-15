<!DOCTYPE html>
<html>

	<head>
		<meta charset="uft-8"/>
		<title>Zadanie 52</title>
		<style>
		table{
			border: 1px solid black;
		}
		th{
			border: 2px solid black;
		}
		
		</style>
	</head>
	
	<body>
		<?php
			//Napisz skrypt PHP, który wypisze na ekran w postaci tabeli składającej się z 3 kolumn: imie, nazwisko, data urodzenia, wszystkich nauczycieli. Dane posortowane mają być po dacie urodzenia malejąco. Pierwszy wiersz tabeli ma być wierszem informacyjnym, co w danej kolumnie się znajduje.
			
			$host = 'localhost';
			$user = 'root';
			$pass = '';
			$base = 'dziennik';
			
			$db = mysqli_connect($host, $user, $pass, $base);
			
			$zapytanie = 'SELECT imie, nazwisko, data_urodzenia FROM nauczyciel ORDER BY data_urodzenia DESC';
			
			if(mysqli_connect_errno()){
				echo 'Błąd połączenia z baną danych' . mysqli_connect_errno();
				exit();
			}
		
			$result = mysqli_query($db,$zapytanie);

			echo "<table style='border: 1 px solid black'>";
			echo "<tr style='border: 1px solid black'>";
			echo "<th>" . "Imię:" . "</th>";
			echo "<th>" . "Nazwisko:" . "</th>";
			echo "<th>" . "Data Urodzenia:" . "</th>";
			echo "</tr>";
			
			if(mysqli_num_rows($result) > 0 ){
				while($row = mysqli_fetch_array($result)){
					
					echo "<tr><td>"; 
					echo $row["imie"] . " ";
					echo "</td>";
					echo "<td>";
					echo $row["nazwisko"] . " ";
					echo "</td>";
					echo "<td>";
					echo $row["data_urodzenia"] . " ";
					echo "</td>";
					echo "</tr>";
				}
			}
			
			echo "</table>";
			
			mysqli_close($db);
			
		?>
	</body>

</html>