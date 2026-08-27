<?php
// Simple HTML + PHP contact form
// Hindi comments: Ye file ek chhota contact form dikhati hai aur submissions ko messages.csv me save karti hai.
$success = '';
$name = $email = $message = '';
$errors = array();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $message = trim($_POST['message'] ?? '');

    if ($name === '') {
        $errors[] = 'Name zaroori hai.';
    }
    if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Sahi email address dein.';
    }
    if ($message === '') {
        $errors[] = 'Message khali nahi ho sakta.';
    }

    if (empty($errors)) {
        // XSS se bachne ke liye sanitize
        $nameSafe = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
        $emailSafe = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
        $messageSafe = htmlspecialchars($message, ENT_QUOTES, 'UTF-8');

        // CSV ke liye coma hatana aur newlines ko replace karna
        $nameCsv = str_replace(',', ' ', $nameSafe);
        $messageCsv = str_replace(array("\r", "\n"), ' ', $messageSafe);

        $entry = sprintf("%s,%s,%s\n", $nameCsv, $emailSafe, $messageCsv);
        @file_put_contents('messages.csv', $entry, FILE_APPEND | LOCK_EX);

        $success = 'Shukriya! Aapka message save ho gaya.';
        $name = $email = $message = '';
    }
}
?>

<!doctype html>
<html lang="hi">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Contact Form</title>
  <style>
    body{font-family:Arial,Helvetica,sans-serif;background:#f7f7f7;padding:20px}
    .container{max-width:600px;margin:40px auto;background:#fff;padding:20px;border-radius:6px;box-shadow:0 2px 6px rgba(0,0,0,0.1)}
    label{display:block;margin-top:12px;font-weight:600}
    input[type=text], input[type=email], textarea{width:100%;padding:10px;margin-top:6px;border:1px solid #ddd;border-radius:4px}
    button{margin-top:12px;padding:10px 16px;background:#28a745;color:#fff;border:none;border-radius:4px;cursor:pointer}
    .error{background:#ffe6e6;padding:10px;border:1px solid #ffb3b3;color:#900;border-radius:4px}
    .success{background:#e6ffed;padding:10px;border:1px solid #b3ffcf;color:#064;border-radius:4px}
    .small{font-size:0.9em;color:#666}
  </style>
</head>
<body>
  <div class="container">
    <h2>Contact Form</h2>
    <p class="small">Apna naam, email aur message bhejein. Yeh demo submissions ko <code>messages.csv</code> me save karega.</p>

    <?php if (!empty($errors)): ?>
      <div class="error">
        <strong>Error:</strong>
        <ul>
        <?php foreach ($errors as $e): ?>
          <li><?php echo htmlspecialchars($e, ENT_QUOTES, 'UTF-8'); ?></li>
        <?php endforeach; ?>
        </ul>
      </div>
    <?php endif; ?>

    <?php if ($success): ?>
      <div class="success"><?php echo $success; ?></div>
    <?php endif; ?>

    <form method="post" action="">
      <label for="name">Naam</label>
      <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($name, ENT_QUOTES, 'UTF-8'); ?>" required>

      <label for="email">Email</label>
      <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email, ENT_QUOTES, 'UTF-8'); ?>" required>

      <label for="message">Message</label>
      <textarea id="message" name="message" rows="6" required><?php echo htmlspecialchars($message, ENT_QUOTES, 'UTF-8'); ?></textarea>

      <button type="submit">Send</button>
    </form>

    <hr>
    <p class="small">Note: Agar aap CSV dekhna chahte hain, to repository ke root me <code>messages.csv</code> create ho jayega (agar server likhne ki permission ho).</p>
  </div>
</body>
</html>
