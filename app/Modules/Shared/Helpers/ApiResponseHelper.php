<?php

use App\Modules\Shared\Enums\HttpStatusCodeEnum;


function successResponse($data, $message = "Request was successful", $statusCode = HttpStatusCodeEnum::SUCCESS->value)
{
    return response()->json([
        'status' => 'success',
        'statusCode' => $statusCode,
        'message' => $message,
        'data' => $data
    ], $statusCode);
}

function errorResponse($message = "An error occurred", $statusCode = HttpStatusCodeEnum::SERVER_ERROR->value, $errors = null)
{
    $response = [
        'status' => 'error',
        'message' => $message,
    ];

    if ($errors) {
        $response['errors'] = $errors;
    }

    return response()->json($response, $statusCode);
}
