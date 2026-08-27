<?php
// Bahut hi simple PHP + HTML file
// Sirf ek greeting aur current server time dikhayega.
?>
<!doctype html>
<html lang="hi">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Simple Page</title>
</head>
<body>
  <?php
    echo "<h1>Hello, world!</h1>";
    echo "<p>Aaj ki tareekh: " . date('Y-m-d H:i:s') . "</p>";
  ?>
</body>
</html>
