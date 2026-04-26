<?php

if (isset($_FILES['file'])) {
    $file = $_FILES['file']['tmp_name'];
    $handle = fopen($file, "r");

    echo "<h2>Uploaded Data</h2>";
    echo "<table border='1'>";

    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        echo "<tr>";
        foreach ($data as $cell) {
            echo "<td>" . htmlspecialchars($cell) . "</td>";
        }
        echo "</tr>";
    }

    echo "</table>";

    echo "<form action='analyze.php' method='post'>
            <button type='submit'>Analyze with AI</button>
          </form>";
}
?>