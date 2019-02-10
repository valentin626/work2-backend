<!DOCTYPE html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title></title>
</head>
<body>
	<form action="index.php" method="POST" >
		    <p> Телефонный справочник</p>
		    <label>ФИО:</label>
		    <input type="text" name="fio" placeholder="ФИО"/>
		    <label>Телефон:</label>
		    <input type="text" name="telepfon" placeholder="Телефон" />
			<label>Адрес:</label>
			<input type="text" name="address" placeholder="Адрес"/>
			<input type="submit" value=" Поиск " name="search" />
			<input type="submit" value=" + " name="add" />
			<input type="submit" value=" - " name="delete" />
			<input type="submit" value=" Изменить " name="change" />	
	</form>
</body>
</html>

<?php
		$conn = new mysqli ("localhost", "root", "", "phonebook");
		$conn->query ("SET NAMES 'utf8'");
		if (mysqli_connect_errno()) {
			echo 'Ошибка подключения. Неудалось подключиться к БД('.mysqli_connect_errno().'): '.mysqli_connect_error();
			exit();
		}
	//Search
	if (isset($_POST['search'])) {
			$fio = $_POST["fio"];
			$telepfon = $_POST["telepfon"];
			$address = $_POST["address"];
		if ($_POST["fio"] != "") {
			$result_set = $conn->query("SELECT * FROM `telphone` WHERE `fio` LIKE '%$fio%'");
			echo "<b>Результат поиска: </b>$fio<br>";
			 echo "<b>Найдено:</b> ".$result_set->num_rows."<br>";
			 printResult($result_set);
			echo "<br><br><br>";
		}
		elseif ($_POST["telepfon"] != "") {
			$result_set = $conn->query("SELECT * FROM `telphone` WHERE `telepfon` LIKE '%$telepfon%'");
			echo "<b>Результат поиска:  </b>$telepfon<br>";
			echo "Найдено:".$result_set->num_rows."<br>";
			 printResult($result_set);
		}
		elseif ($_POST["address"] != "") {
			$result_set = $conn->query("SELECT * FROM `telphone` WHERE `address` LIKE '%$address%'");
			echo "<b>Результат поиска:  </b>$address<br>";
			echo "Найдено:".$result_set->num_rows."<br>";
			 printResult($result_set);
		}
		else {
			echo "Введите ФИО,адрес,номер чтобы  <b>найти</b>  запись. <a href ='/'>Исправить данные</a> <br><br>";
		}
	}
	//Add
	if (isset($_POST['add'])) {
			$fio = preg_replace('#(.*)\s+(.).*\s+(.).*#usi', '$1 $2.$3.', $fio = mb_strtoupper($fio = $_POST["fio"]));
			$telepfon = $_POST["telepfon"];
			$address = $_POST["address"];
		if ($_POST["fio"] == "" || $_POST["telepfon"] == ""||$_POST["address"] == "")  {
			echo "Введите данные чтобы <b>добавить</b> запись. <a href ='/'>Исправить данные</a> <br><br>";
		} 
		else {
			$conn->query("INSERT INTO `telphone` (`fio`,`telepfon`,`address`) VALUES ('$fio','$telepfon','$address');");
			echo "Запись <b>$fio</b> добавлена. <br><br>";	
		}	
	}
	//Delete
	if (isset($_POST['delete'])) {
			$fio = $_POST["fio"];
			$telepfon = $_POST["telepfon"];
			$address = $_POST["address"];
		if ($_POST["fio"] != "") {
			$conn->query ("DELETE FROM `telphone` WHERE `telphone`.`fio` = '$fio'");
			echo "Запись <b>$fio</b>  удалена.<br><br>";
		} 
		elseif ($_POST["telepfon"] != "") {
			$conn->query ("DELETE FROM `telphone` WHERE `telphone`.`telepfon` = '$telepfon'");
			echo "Запись c номером телефона <b>$telepfon</b>  удалена.<br><br>";
		}
		elseif ($_POST["address"] != "") {
			$conn->query ("DELETE FROM `telphone` WHERE `telphone`.`address` = '$address'");
			echo "Запись c адресом <b>$address</b>  удалена.<br><br> ";
		}
		else {
			echo "Введите ФИО,адрес,номер чтобы  <b>удалить</b>  запись. <a href ='/'>Исправить данные</a> <br><br>";
		}
					
	}
	//Change
	if (isset($_POST['change'])) {
		$fio = $_POST["fio"]; 
		$telepfon = $_POST["telepfon"]; 
		$address = $_POST["address"];
		if ($_POST["address"] != "") {
				$conn->query ("UPDATE `telphone` SET `address` = '$address' WHERE `telphone`.`fio` = '$fio';");
				echo "Адрес <b>$fio</b>  изменен. <br><br>";
			}
			elseif ($_POST["telepfon"] != "") {
				$conn->query ("UPDATE `telphone` SET `telepfon` = '$telphone' WHERE `telphone`.`fio` = '$fio';");
				echo "Номер телефона <b>$fio</b>  изменен. <br><br>";
			}
			else{
				echo "Введите ФИО, затем адрес или номер на который хотите  <b>изменить</b>. <a href ='/'>Исправить данные</a> <br><br>";
			}		
	}
	//Ouput of the result
		$result_set = $conn->query("SELECT * FROM  `telphone` ");
		echo "<b>Кoличecтвo данных: ".$result_set->num_rows."</b><br><br>";
			printResult ($result_set);

				function printResult ($result_set) {
						while ($row = mysqli_fetch_assoc($result_set))  
						{	
							echo '<b>Данные владельца  </b>  '.$row["id"]."<br>".'<b>ФИО:</b> '.$row["fio"]."<br>".' <b>Номер телефона:</b> '.$row["telepfon"]."<br>".' <b>Адрес:</b> '.$row["address"].'<br><br><br>';
							}
			}
$conn->close();
 ?>
