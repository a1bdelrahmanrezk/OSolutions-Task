<?php

namespace App\Modules\Shared\Enums;

enum HttpStatusCodeEnum: int
{
    case SUCCESS = 200;
    case CREATED = 201;
    case ACCEPTED = 202;
    case NOT_FOUND = 404;
    case BAD_REQUEST = 400;
    case UNAUTHORIZED = 401;
    case FORBIDDEN = 403;
    case METHOD_NOT_ALLOWED = 405;
    case REQUEST_TIMEOUT = 408;
    case UNPROCESSABLE_CONTENT = 422;
    case NO_RESPONSE = 444;
    case SERVER_ERROR = 500;
    case BAD_GATEWAY = 502;

    public static function values(): array
    {

        return array_column(self::cases(), 'value');
    }
}
