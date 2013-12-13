<?php
namespace ThirdPartyConnect\Config;

class FacebookConfig
{
    /**
     * @var bool
     */
    private $isEnabled = false;

    /**
     * @var string
     */
    private $privateKey;

    /**
     * @var string
     */
    private $publicKey;

    /**
     * @var bool
     */
    private $extendedToken;

    /**
     * @var array
     */
    private $permissions = array();

    /**
     * @var array
     */
    private $returnUrl = array();

    /**
     * @param array $config
     */
    public function __construct(array $config)
    {
        if (array_key_exists('facebook', $config))
        {
            if (array_key_exists('app_secret', $config['facebook']) &&
                array_key_exists('app_id', $config['facebook']) &&
                array_key_exists('permissions', $config['facebook']) &&
                !empty($config['facebook']['permissions']) &&
                array_key_exists('return_url', $config['facebook']) &&
                !empty($config['facebook']['return_url']))
            {
                $this->isEnabled       = true;
                $this->extendedToken   = array_key_exists('extended_token', $config['facebook']) ? (bool)$config['facebook']['extended_token'] : false; ;
                $this->privateKey      = $config['facebook']['app_secret'];
                $this->publicKey       = $config['facebook']['app_id'];
                $this->permissions     = $config['facebook']['permissions'];
                $this->returnUrl       = $config['facebook']['return_url'];
            }
            else
            {
                throw new \Exception('Facebook config needs the app_secret, app_id, the permissions array & the return url data.');
            }
        }
    }

    /**
     * @return bool
     */
    public function needsExtendedToken()
    {
        return $this->extendedToken;
    }

    /**
     * @return bool
     */
    public function isEnabled()
    {
        return (bool) $this->isEnabled;
    }

    /**
     * @return string
     */
    public function getSecretKey()
    {
        return $this->privateKey;
    }

    /**
     * @return string
     */
    public function getPublicKey()
    {
        return $this->publicKey;;
    }

    /**
     * @return array
     */
    public function getPermissions()
    {
        return $this->permissions;;
    }

    /**
     * @return array
     */
    public function getReturnUrlData()
    {
        return $this->returnUrl;
    }
}