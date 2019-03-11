<?php
if ( !function_exists( 'sendResponse' ) ) {

    /**
     * @param $status
     * @param null $data
     * @param null $errorMessage
     * @param int $http_code
     * @return \Illuminate\Http\JsonResponse
     */
    function sendResponse ($status, $data = null, $errorMessage = null, $http_code = 200)
    {
        $response = ['meta' => ['responseCode' => $http_code, 'message' => $status]];
        if ( $errorMessage ) $response['error'] = $errorMessage;
        if ( $data ) $response['data'] = $data;
        return response()->json( $response );
    }
}
