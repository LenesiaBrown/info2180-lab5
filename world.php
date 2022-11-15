<?php header("Access-Control-Allow-Origin: *");
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$stmt = $conn->query("SELECT * FROM countries");
//$stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%e%'");

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
// $_GET['country'];
// $_GET["SELECT * FROM countries WHERE name LIKE 'Jamaica'"];

?>

<!-- code given -->
<!-- <ul> -->
<!-- <?php foreach ($results as $row): ?> -->
  <!-- <li><?= $row['name'] . ' is ruled by ' . $row['head_of_state']; ?></li> -->
<!-- <?php endforeach; ?> -->
<!-- </ul> -->

<ul>
<?php foreach ($results as $key): ?>
  <li><?= $key['name']; ?></li>
<?php endforeach; ?>
</ul>


<!-- <?php
echo 'Hello ' . htmlspecialchars($_GET['country']) . '!';
?> -->


<?php 
$outputtable = "";

if (isset($_POST['country'])) {
  $input = $_POST['lookup'];

  if (!empty($input)) {
    $query  = "SELECT * FROM countries WHERE name LIKE '%$input%'";

    $result1 = mysqli_query($conn, $query);

    $outputtable .= "
      <table class='table'>
        <tr>
          <th>Name</th>
          <th>Continent</th>
          <th>Independence</th>
          <th>Head of State</th>
        </tr>
    ";
  }
}
?>

<?php
  echo $outputtable;
?>
