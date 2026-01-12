<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Sort Student Records</title>
<style>
body 
{ 
    font-family: Arial, sans-serif; 
    text-align: center; 
    margin-top: 20px; 
}
table 
{ 
    margin: auto; 
    border-collapse: collapse; 
    width: 80%; 
}
th, td 
{ 
    padding: 10px; 
    border: 1px solid #ddd; 
}
th 
{ 
    background-color: #f4f4f4; 
}
</style>
</head>
<body>
<h1>Sorted Student Records</h1>
<table>
<tr><th>ID</th><th>Name</th><th>Grade</th></tr>
<?php
$conn = new mysqli("localhost", "root", "1239", "students1234");
$students = $conn->query("SELECT * FROM students1234.students124;")->fetch_all(MYSQLI_ASSOC);
for ($i = 0; $i < count($students) - 1; $i++) 
{
    $min = $i;
    for ($j = $i + 1; $j < count($students); $j++) 
    {
        if ($students[$j]['name'] < $students[$min]['name']) 
            $min = $j;
    }
    $temp = $students[$min];
    $students[$min] = $students[$i];
    $students[$i] = $temp;
 }
foreach ($students as $student) 
{
    echo 
        "<tr><td>{$student['id']}</td>
        <td>{$student['name']}</td>
        <td>{$student['grade']}</td></tr>";
}
 $conn->close();
 ?>
</table>
</body>
</html>
