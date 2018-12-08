<?php
/**
 * Created by Gabriel Ślawski
 * Date: 17.11.18
 * Time: 13:48
 */

namespace app\core;

use app\core\libs\JWT\JWT;
use app\models\Role;
use stdClass;
use Exception;

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

/**
 * Class ApiController
 * @package app\core
 */
class ApiController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->request = json_decode(file_get_contents("php://input"));
    }

    /**
     * @param int           $code
     * @param stdClass|null $data
     * @return bool
     */
    public function response(int $code, array $data = null): bool
    {
        http_response_code($code);
        echo json_encode((object)$data);

        return true;
    }

    /**
     * @return bool|object
     */
    public function getDataIfJwtIsCorrect()
    {
        if (!$jwt = $this->request->jwt ?? false) {
            return false;
        }

        try {
            return JWT::decode($jwt, API_KEY, ['HS256'])->data;
        } catch (Exception $e) {
            return false;
        }
    }

    /**
     * @return bool
     */
    public function onlyForAdmin()
    {
        if ($this->auth->who() === Role::ADMINISTRATOR) {
            return true;
        }

        if (!$data = $this->getDataIfJwtIsCorrect()) {
            return false;
        }

        $role = $this->role->getRoleName($data->role_id)->getFirst()->name;
        if (!$role || $role != Role::ADMINISTRATOR) {
            return false;
        }

        return true;
    }

    /**
     * @return bool
     */
    public function onlyForOwner(): bool
    {
        if (!$data = $this->getDataIfJwtIsCorrect()) {
            return false;
        }

        if (!$userId = $this->request->user_id ?? false) {
            return false;
        }

        if ($userId != $data->id) {
            return false;
        }

        return true;
    }
}

