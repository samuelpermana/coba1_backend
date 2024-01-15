<?php

/**
 * Global Function untuk response success
 *
 * @param Array||String $result
 * @param Array||String $message
 * @param Integer $code
 * @return Symfony\Component\HttpFoundation\Response
 */
function response_success($result = null, $message = null)
{
    return response()->json([
        'status' => true,
        'message' => $message,
        'result' => $result
    ]);
}

/**
 * Global Function untuk response error
 *
 * @param Array||String $result
 * @param Array||String $message
 * @param Integer $code
 * @return Symfony\Component\HttpFoundation\Response
 */
function response_error($result = null, $message = null, $code = 400)
{
    if (!(app()->environment('local')) && !is_int($code)) {
        $message = 'Internal Server Errror';
    }

    return response()->json([
        'status' => false,
        'message' => $message,
        'result' => $result
    ],  is_int($code) && $code != 0 ? $code : 500);
}
