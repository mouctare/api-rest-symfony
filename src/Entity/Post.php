<?php
namespace App\Entity;
use DateTimeImmutable;

use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;



/**
 * class Post
 * @package App\Entity
 * @ORM\Entity
 */

 class Post
 {
     /**
      * @var int|null
      * @ORM\Id
      * @ORM\Column(type="integer")
      * @ORM\GeneratedValue
      * @Groups({"get"})
      */
   private ?int $id;

   /**
    * @var string
    * @ORM\Column(type="text")
    *@Groups({"get"})
    */
   private string $content;

   /**
    * @var DateTimeInterface
    * @ORM\Column(type="datetime_immutable")
    *@Groups({"get"})
    */
   private DateTimeInterface $postedAt;

   /**
    * @var User
    * @ORM\ManyToOne(targetEntity="User")
    */
   private User $author;

   /**
    * @var User[]|Collection
    * @ORM\ManyToMany(targetEntity="User")
    * @ORM\JoinTable(name="post_likes")
    */
   private Collection $likedBy;

   public static function create(string $content, User $author): self
  {
         $post = new self();
         $post->content = $content;
         $post->author = $author;

         return $post;
 }
   public function __construct()
   {
       $this->postedAt = new DateTimeImmutable();
       $this->likedBy = new ArrayCollection();
   }


   /**
    * Get the value of id
    *
    * @return  int|null
    */ 
   public function getId()
   {
      return $this->id;
   }

   
 

   /**
    * Get the value of content
    *
    * @return  string
    */ 
   public function getContent()
   {
      return $this->content;
   }

   /**
    * Set the value of content
    *
    * @param  string  $content
    *
    * @return  self
    */ 
   public function setContent(string $content)
   {
      $this->content = $content;

      return $this;
   }

   /**
    * Get the value of postedAt
    *
    * @return  DateTimeInterface
    */ 
   public function getPostedAt()
   {
      return $this->postedAt;
   }

   /**
    * Set the value of postedAt
    *
    * @param  DateTimeInterface  $postedAt
    *
    * @return  self
    */ 
   public function setPostedAt(DateTimeInterface $postedAt)
   {
      $this->postedAt = $postedAt;

      return $this;
   }

   /**
    * Get user
    */ 
   public function getAuthor()
   {
      return $this->author;
   }

   /**
    * Set user
    *
    * @return  self
    */ 
   public function setAuthor($author)
   {
      $this->author = $author;

      return $this;
   }

   /**
    * Get the value of likedBy
    *
    * @return User[]|Collection
    */ 
   public function getLikedBy(): Collection
   {
      return $this->likedBy;
   }

   /**
    * Set the value of likedBy
    *
    * @param User[]
    *
    * @return  self
    */ 
   public function likedBy(User $user): void
   {
       if ($this->likedBy->contains($user)) {
           // Si les likes contiennent un user , je return rien du tout
           return;
       }
      $this->likedBy->add($user);
}

 /**
* @param User[]
*      
*/ 
   public function dislikedBy(User $user): void
   {
    if ($this->likedBy->contains($user)) {
        // Si les likes contiennent un user , je return rien du totu
        return;
    }
  $this->likedBy->removeElement($user);
    
   }
 }