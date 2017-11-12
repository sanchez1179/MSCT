<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Howdy</title>
  </head>
  <body>
    <h1>Stuff</h1>
    <ul>
      <?php foreach($results as $result): ?>
        <li><?= $result->description; ?></li>
      <?php endforeach; ?>
    </ul>
  </body>
</html>
