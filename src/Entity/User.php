<?php
namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;


/**
 * class User
 * @package App\Entity
 * @ORM\Entity
 */

 class User  implements UserInterface
 {
     /**
      * @var int|null
      * @ORM\Id
      * @ORM\Column(type="integer")
      * @ORM\GeneratedValue
      */
     private ?int $id;

     /**
      * @var string
      * @ORM\Column(unique=true)
      */
     private string $email;

      /**
      * @var string
      * @ORM\Column
      */
     private string $password;

      /**
      * @var string
      * @ORM\Column
      */
     private string $name;
    


     /**
      * Get the value of id
      *
      * @return  int
      */ 
     public function getId()
     {
          return $this->id;
     }

       /**
      * Get the value of email
      *
      * @return  string
      */ 
     public function getEmail()
     {
          return $this->email;
     }

     /**
      * Set the value of email
      *
      * @param  string  $email
      *
      * @return  self
      */ 
     public function setEmail(string $email)
     {
          $this->email = $email;

          return $this;
     }

     /**
      * Get the value of password
      *
      * @return  string
      */ 
     public function getPassword()
     {
          return $this->password;
     }

     /**
      * Set the value of password
      *
      * @param  string  $password
      *
      * @return  self
      */ 
     public function setPassword(string $password)
     {
          $this->password = $password;

          return $this;
     }

     /**
      * Get the value of name
      *
      * @return  string
      */ 
     public function getName()
     {
          return $this->name;
     }

     /**
      * Set the value of name
      *
      * @param  string  $name
      *
      * @return  self
      */ 
     public function setName(string $name)
     {
          $this->name = $name;

          return $this;
     }
      /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles()
    {
    return ['ROLE_USER'];
    
    }
     /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }
 
 }