<?php
/**
 * Created by PhpStorm.
 * User: andreigabreanu
 * Date: 13/12/13
 * Time: 06:47
 */

namespace ThirdPartyConnect\Service;

class NormalizedData
{
    const PROVIDER_TYPE_FACEBOOK = 'facebook';
    const PROVIDER_TYPE_TWITTER  = 'twitter';
    const PROVIDER_TYPE_GOOGLE   = 'google';
    const PROVIDER_TYPE_LINKEDIN = 'linkedin';

    protected $data;

    /**
     * @param string $type
     * @param array $denormalizedData
     */
    public function __construct($type, $denormalizedData)
    {
        $normalizedData = array(
            'id'          => null,
            'full_name'   => null,
            'first_name'  => null,
            'last_name'   => null,
            'username'    => null,
            'location'    => null,
            'bio'         => null,
            'gender'      => null,
            'email'       => null,
            'timezone'    => null,
            'locale'      => null,
            'verified'    => null,
            'picture_url' => null,
            'birthday'    => null,
            'token'       => null
        );

        switch ($type)
        {
            case self::PROVIDER_TYPE_FACEBOOK:
                $normalizedData['id']          = isset($denormalizedData['id']) ? $denormalizedData['id'] : null;
                $normalizedData['full_name']   = isset($denormalizedData['name']) ? $denormalizedData['name'] : null;
                $normalizedData['first_name']  = isset($denormalizedData['first_name']) ? $denormalizedData['first_name'] : null;
                $normalizedData['last_name']   = isset($denormalizedData['last_name']) ? $denormalizedData['last_name'] : null;
                $normalizedData['username']    = isset($denormalizedData['username']) ? $denormalizedData['username'] : null;
                $normalizedData['location']    = isset($denormalizedData['location']) ? $denormalizedData['location'] : null;
                $normalizedData['bio']         = isset($denormalizedData['bio']) ? $denormalizedData['bio'] : null;
                $normalizedData['gender']      = isset($denormalizedData['gender']) ? $denormalizedData['gender'] : null;
                $normalizedData['email']       = isset($denormalizedData['email']) ? $denormalizedData['email'] : null;
                $normalizedData['timezone']    = isset($denormalizedData['timezone']) ? $denormalizedData['timezone'] : null;
                $normalizedData['locale']      = isset($denormalizedData['locale']) ? $denormalizedData['locale'] : null;
                $normalizedData['verified']    = isset($denormalizedData['verified']) ? (bool)$denormalizedData['verified'] : null;
                $normalizedData['picture_url'] = isset($denormalizedData['username']) ? 'http://graph.facebook.com/' . $denormalizedData['username'] . '/picture' : null;
                $normalizedData['token']       = isset($denormalizedData['token']) ? $denormalizedData['token'] : null;

                if (isset($denormalizedData['birthday']))
                {
                    $bday = explode('/', $denormalizedData['birthday']);
                    $normalizedData['birthday'] = $bday[2] . '-' . $bday[0] . '-' . $bday[1];
                }
                else
                {
                    $normalizedData['birthday'] = null;
                }
                break;
            case self::PROVIDER_TYPE_TWITTER:
                $normalizedData['id']          = isset($denormalizedData['id']) ? (string)$denormalizedData['id'] : null;
                $normalizedData['full_name']   = isset($denormalizedData['name']) ? (string)$denormalizedData['name'] : null;

                if (!is_null($normalizedData['full_name']))
                {
                    $name = explode(' ', $normalizedData['full_name']);
                    $normalizedData['first_name']  = isset($name[0]) ? $name[0] : null;
                    $normalizedData['last_name']   = isset($name[1]) ? $name[1] : null;
                }
                $normalizedData['username']    = isset($denormalizedData['screen_name']) ? (string)$denormalizedData['screen_name'] : null;
                $normalizedData['location']    = isset($denormalizedData['location']) ? (string)$denormalizedData['location'] : null;
                $normalizedData['bio']         = isset($denormalizedData['description']) ? (string)$denormalizedData['description'] : null;
                $normalizedData['timezone']    = isset($denormalizedData['utc_offset']) ? $denormalizedData['utc_offset'] / 3600 : null;
                $normalizedData['locale']      = isset($denormalizedData['lang']) ? (string)$denormalizedData['lang'] : null;
                $normalizedData['verified']    = isset($denormalizedData['verified']) ? (string)$denormalizedData['verified'] : null;

                if ($normalizedData['verified'] == 'false')
                {
                    $normalizedData['verified'] = false;
                }
                elseif ($normalizedData['verified'] == 'true')
                {
                    $normalizedData['verified'] = true;
                }

                $normalizedData['picture_url'] = isset($denormalizedData['profile_image_url']) ? (string)$denormalizedData['profile_image_url'] : null;
                $normalizedData['token']       = isset($denormalizedData['token']) ? $denormalizedData['token'] : null;
                break;

            default:
                throw new \Exception('Invalid provider type');
                break;
        }

        $this->data =  $normalizedData;

//            case self::PROVIDER_TYPE_GOOGLE:
//                $normalizedData['id']          = isset($this->_data['id']) ? $this->_data['id'] : null;
//                $normalizedData['full_name']   = isset($this->_data['name']) ? $this->_data['name'] : null;
//                $normalizedData['first_name']  = isset($this->_data['given_name']) ? $this->_data['given_name'] : null;
//                $normalizedData['last_name']   = isset($this->_data['family_name']) ? $this->_data['family_name'] : null;
//                $normalizedData['gender']      = isset($this->_data['gender']) ? $this->_data['gender'] : null;
//                $normalizedData['email']       = isset($this->_data['email']) ? $this->_data['email'] : null;
//                $normalizedData['locale']      = isset($this->_data['locale']) ? $this->_data['locale'] : null;
//                $normalizedData['verified']    = isset($this->_data['verified_email']) ? (bool)$this->_data['verified_email'] : null;
//                $normalizedData['picture_url'] = isset($this->_data['picture']) ? $this->_data['picture'] : null;
//                $normalizedData['birthday']    = isset($this->_data['birthday']) ? $this->_data['birthday'] : null;
//                $normalizedData['token']       = isset($this->_data['token']) ? $this->_data['token'] : null;
//                break;
//
//            case self::PROVIDER_TYPE_LINKEDIN:
//                $normalizedData['id']          = isset($this->_data['id']) ? $this->_data['id'] : null;
//                $normalizedData['full_name']   = (isset($this->_data['firstName']) && isset($this->_data['lastName'])) ? $this->_data['firstName'] . ' ' . $this->_data['lastName'] : null;
//                $normalizedData['first_name']  = isset($this->_data['firstName']) ? $this->_data['firstName'] : null;
//                $normalizedData['last_name']   = isset($this->_data['lastName']) ? $this->_data['lastName'] : null;
//                $normalizedData['location']    = isset($this->_data['location']['name']) ? $this->_data['location']['name'] : null;
//                $normalizedData['bio']         = isset($this->_data['summary']) ? $this->_data['summary'] : null;
//                $normalizedData['picture_url'] = isset($this->_data['pictureUrl']) ? $this->_data['pictureUrl'] : null;
//                $normalizedData['token']       = isset($this->_data['token']) ? $this->_data['token'] : null;
//                break;
    }

    /**
     * @return array
     */
    public function retrieveInformation()
    {
        return $this->data;
    }

}