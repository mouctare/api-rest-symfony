<?php
namespace App\Factory;

use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * class UserFactory
 * @package  App\Factory
 */

class UserFactory
{
     /**
     * @param UserPasswordEncoderInterface $userPasswordEncoder
     */
    private UserPasswordEncoderInterface $userPasswordEncoder;

    public static function create (UserPasswordEncoderInterface $userPasswordEncoder)
    {
        //$this->userPasswordEncoder = $userPasswordEncoder;
        
    }
}