<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="card-body">
        <?php
        $session = \Config\Services::session();
        if ($session->getFlashdata('warning')) {
        ?>
            <div class="alert alert-warning">
                <ul>
                    <?php
                    foreach ($session->getFlashdata('warning') as $val) {
                    ?>
                        <li><?php echo $val ?></li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
        <?php
        }
        if ($session->getFlashdata('success')) {
        ?>
            <div class="alert alert-success"><?php echo $session->getFlashdata('success') ?></div>
        <?php
        }
        ?>
        <form action="/auth/signup" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required><br><br>
            <label for="fullname">Fullname:</label>
            <input type="text" id="fullname" name="fullname" required><br><br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br><br>
            <label for="phone">Phone:</label>
            <input type="text" id="phone" name="phone" required><br><br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br><br>
            <label for="confirm_password">Confirm Password:</label>
            <input type="password" id="confirm_password" name="confirm_password" required><br><br>
            <button type="submit">Register</button>
        </form>
</body>

</html>