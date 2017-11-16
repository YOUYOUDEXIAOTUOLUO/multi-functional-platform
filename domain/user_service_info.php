<?php
/**
 * Created by IntelliJ IDEA.
 * User: Gao
 * Date: 2017/10/18
 * Time: 23:20
 */

class user_service_info
{
    var $email;                           //用户登录email;
    var $service_email;                  //用户业务使用email;
    var $service_start_time;            //用户业务起始时间;
    var $service_end_time;              //用户业务结束时间;
    var $service_remain_time;           //用户业务剩余时间;
    var $service_state;                  //用户业务当前状态;

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getServiceEmail()
    {
        return $this->service_email;
    }

    /**
     * @param mixed $service_email
     */
    public function setServiceEmail($service_email)
    {
        $this->service_email = $service_email;
    }

    /**
     * @return mixed
     */
    public function getServiceStartTime()
    {
        return $this->service_start_time;
    }

    /**
     * @param mixed $service_start_time
     */
    public function setServiceStartTime($service_start_time)
    {
        $this->service_start_time = $service_start_time;
    }

    /**
     * @return mixed
     */
    public function getServiceEndTime()
    {
        return $this->service_end_time;
    }

    /**
     * @param mixed $service_end_time
     */
    public function setServiceEndTime($service_end_time)
    {
        $this->service_end_time = $service_end_time;
    }

    /**
     * @return mixed
     */
    public function getServiceRemainTime()
    {
        return $this->service_remain_time;
    }

    /**
     * @param mixed $service_remain_time
     */
    public function setServiceRemainTime($service_remain_time)
    {
        $this->service_remain_time = $service_remain_time;
    }

    /**
     * @return mixed
     */
    public function getServiceState()
    {
        return $this->service_state;
    }

    /**
     * @param mixed $service_state
     */
    public function setServiceState($service_state)
    {
        $this->service_state = $service_state;
    }


}