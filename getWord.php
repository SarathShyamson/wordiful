<?php
$dblink = mysqli_connect("localhost", "root", "", "dictionary");
/* If connection fails throw an error */
if (mysqli_connect_errno()) {
    echo "Could  not connect to database: Error: ".mysqli_connect_error();
    exit();
}
$sqlquery = "SELECT word1, word2 FROM word WHERE 1";
if ($result = mysqli_query($dblink, $sqlquery)) {
    /* fetch associative array */
    while ($row = mysqli_fetch_assoc($result)) {
    //    $rolls[] = $row["item1"]."|".$row["item2"]."|".$row['item3']."|".$row['item4']."<br />";
    $rolls[] = $row["word1"]."|".$row["word2"]."|";
  }
    /* free result set */
    mysqli_free_result($result);
}
/* close connection */
mysqli_close($dblink);

//print_r($rolls);

$random_key=array_rand($rolls);
echo $rolls[$random_key];
?>
