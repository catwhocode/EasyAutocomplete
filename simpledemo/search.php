<?php 

$keyword = isset($_GET['country']) ? $_GET['country'] : '';

$connect = new PDO("mysql:host=localhost; dbname=test", "root", "");

$query = "SELECT country_code, country_name 
            FROM countries 
            WHERE country_name 
            LIKE '%$keyword%' 
            ORDER BY country_name ASC";

$result = $connect->query($query);

$data = [];

foreach($result as $row)
{
    $data[] = [
        'name' =>  $row["country_name"],
        'code' =>  $row["country_code"]
    ];
}

header('Content-Type: application/json; charset=utf-8');
echo json_encode($data);