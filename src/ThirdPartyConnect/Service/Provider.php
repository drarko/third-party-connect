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
    public function getLoginUrl();
    public function getData();
}