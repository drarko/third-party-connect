<?php
/**
 * Created by PhpStorm.
 * User: andreigabreanu
 * Date: 13/12/13
 * Time: 06:23
 */

namespace ThirdPartyConnect\Service;

interface Provider
{
    public function getReturnUrlData();
    public function getLoginUrl($returnUrl);
    public function getUserData();
    public function hasErrors();
}