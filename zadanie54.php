<!DOCTYPE html>
<html>

	<head>
		<meta charset="uft-8"/>
		<title>Zadanie 54</title>
	</head>
	
	<body>
		<?php
		
			//Napisz skrypt PHP, który zwiększy wartość każdej oceny w tabeli ocena o 1.
			
			$host = 'localhost';
			$user = 'root';
			$pass = '';
			$base = 'dziennik';
			
			$db = mysqli_connect($host, $user, $pass, $base);
			
			$zapytanie = 'UPDATE ocena SET ocena = ocena+1';
			
			if(mysqli_connect_errno()){
				echo 'Błąd połączenia z baną danych' . mysqli_connect_errno();
				exit();
			}
		
			
			if(mysqli_query($db, $zapytanie) === TRUE) {
				
						echo "Zaaktualizowano rekordy";
				} else {
						echo "Błąd podczas zaaktualizowania rekordów " . $db->error;
				}

 	
			mysqli_close($db);
			
		?>
	</body>

</html>