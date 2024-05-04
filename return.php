<?php require_once __DIR__ . '/partials/functions.php'; ?>

<?php
session_start();
$passwordLength = $_SESSION['passLength'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>

    <title>User Password</title>
</head>

<body class="bg-yellow-100">

    <h1 class="mt-10 text-center text-3xl font-extrabold drop-shadow-xl">Password Generator 🔒</h1>
    <div class="m-10 p-4 bg-slate-50 rounded-md">
        <h2>Your Password is:</h2>
        <div>
            <span><?php echo passwordGenerator($passwordLength); ?></span>
        </div>
    </div>

</body>

</html>