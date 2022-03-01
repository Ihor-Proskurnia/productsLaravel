<?php

namespace App\Http\Library\Utility;

use Illuminate\Support\Facades\Auth;

trait AccessUtil
{
    /**
     * @return void
     */
    public function denyAccess()
    {
        abort(
            403,
            'Access token is missing or invalid, refresh portal 1 page to generate new one.'
        );
    }

    /**
     * @param int $userId
     *
     * @return void
     */
    public function storeSessionUserId($userId)
    {
        session(['session_user_id' => $userId]);
    }

    /**
     * @return int
     */
    public function getSessionUserId()
    {
        return Auth::id() ?? session('session_user_id');
    }
}
