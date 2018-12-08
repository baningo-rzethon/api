<?php
/**
 * Created by Gabriel Ślawski
 * Date: 14.11.18
 * Time: 13:00
 */

/**
 * @var $data
 */

if (isset($data) && $data->errors) {
    foreach ($data->errors as $error) {
        echo '
            <div class="alert alert-danger">
              <strong>Error!</strong> ' . $error . '
            </div>
        ';
    }
}