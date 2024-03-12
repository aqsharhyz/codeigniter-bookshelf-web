<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Login</h3>
                                </div>
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
                                    <form action="/auth/signin" method="POST">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputUsername" type="text" placeholder="username" name="username" value="<?php if ($session->getFlashdata('username')) echo $session->getFlashdata('username') ?>" />
                                            <label for="inputUsername">Username</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputPassword" type="password" name="password" placeholder="Password" />
                                            <label for="inputPassword">Password</label>
                                        </div>
                                        <div class="form-check-inline mb-3">
                                            <input class="form-check-input" id="inputRememberPassword" name="remember_me" type="checkbox" value="1" />
                                            <label class="form-check-label" for="inputRememberPassword">Remember Me</label>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <a class="small" href="<?php echo site_url("#") ?>">Forgot Password?</a>
                                            <input type="submit" class="btn btn-primary" name="submit" value="LOGIN" />
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center py-3">
                                    <div class="small">
                                        <a href="<?= esc('/register', 'url') ?>">Need an account? Sign up!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
        </div>
    </div>
</body>

</html>