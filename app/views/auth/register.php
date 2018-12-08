<?php
/**
 * Created by Gabriel Ślawski
 * Date: 12.11.18
 * Time: 19:31
 */

use app\core\autoload\PathProvider;

require_once (new PathProvider())->view('inc/header');
?>
    <div class="container-fluid">
        <div class="row p-5">
            <div class="col-md-4 border border-primary p-0 mx-auto">
                <h5 class="p-3 w-100 border border-primary bg-primary text-light">
                    Register<br>
                    <small>Create a new account</small>
                </h5>
                <div class="p-3">
                    <?php require_once (new PathProvider())->view('inc/errors'); ?>
                </div>
                <form action="<?= APP_URL ?>/auth/register" method="post" class="p-3">
                    <div class="form-group">
                        <label for="name">
                            Name: <sup class="text-danger">*</sup>
                        </label>
                        <input type="text" name="name" placeholder="Enter your name..."
                               class="form-control" value="<?= $data->name ?? null ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="email">
                            E-mail address: <sup class="text-danger">*</sup>
                        </label>
                        <input type="email" name="email" placeholder="Enter your email..."
                               class="form-control" value="<?= $data->email ?? null ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="email">
                            Password: <sup class="text-danger">*</sup>
                        </label>
                        <input type="password" name="password" placeholder="Enter your password..."
                               class="form-control" value="<?= $data->password ?? null ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="email">
                            Confirm password: <sup class="text-danger">*</sup>
                        </label>
                        <input type="password" name="confirm" placeholder="Confirm password..."
                               class="form-control" value="<?= $data->confirm ?? null ?>" required>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="reset" class="btn btn-outline-secondary">Reset</button>
                    </div>
                    <div class="text-md-right mt-3">
                        <a href="<?= APP_URL ?>">Back to main page</a><br>
                        <a href="<?= APP_URL ?>/auth/login">Do you have an account?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php
require_once (new PathProvider())->view('inc/footer');