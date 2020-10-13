<?php


namespace App\Traits;


trait SessionToken
{
    public function setSessionToken()
    {
        $this->attributes['session_token'] = mt_rand(0000, 9999);
        $this->save();
    }

    public function isHasSessionToken()
    {
        return $this->attributes['session_token'] != null;
    }

    public function checkSessionToken($token)
    {
        if( is_null($this->attributes['session_token']) ){
            return false;
        }

        return $this->attributes['session_token'] == $token;
    }

    public function isAuthenticated()
    {
        return $this->attributes['is_authenticated'] == true;
    }

    public function clearSessionToken()
    {
        $this->attributes['session_token'] = null;
        $this->attributes['is_authenticated'] = false;
        $this->save();
    }
}
