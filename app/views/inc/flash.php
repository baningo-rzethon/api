<?php
/**
 * Created by Gabriel Ślawski
 * Date: 15.11.18
 * Time: 09:29
 */

use app\core\session\Flash;

$session = new Flash();
if ($session->isExists() && $flash = $session->get()): ?>
    <div class="alert <?= $flash->type ?>">
        <?= $flash->message ?>
    </div>
<?php endif;
$session->destroyFlash();