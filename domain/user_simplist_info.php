<?php
/**
 * Created by IntelliJ IDEA.
 * User: Gao
 * Date: 2017/10/18
 * Time: 23:11
 */

class user_simplist_info
{
    var $email;
    var $psw;

    public function setEmail($email){
        $this->$email = email;
    }
    function getEmail() {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getPsw()
    {
        return $this->psw;
    }

    /**
     * @param mixed $psw
     */
    public function setPsw($psw)
    {
        $this->psw = $psw;
    }


}