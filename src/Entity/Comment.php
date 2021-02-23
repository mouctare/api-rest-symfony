<?php
namespace App\Entity;
use App\Entity\Post;
use App\Entity\User;
use Doctrine\ORM\Mapping as ORM;
use DateTimeImmutable;
use DateTimeInterface;


/**
 * class Comment
 * @package App\Entity
 * @ORM\Entity
 */

 class Comment
 {
     /**
          * @var int|null
          *  @ORM\Id
          * @ORM\Column(type="integer")
          * @ORM\GeneratedValue
          */
          private ?int $id;

          /**
           * @var string
           * @ORM\Column(type="text")
           */
          private string $message;
   
          /**
           * @var DateTimeInterface
           * @ORM\Column(type="datetime_immutable")
           */
          private DateTimeInterface $publishedAt;
   
          /**
           * @var User
           * @ORM\ManyToOne(targetEntity="User")
           */
          private User $author;

          /**
           * @var Post
           * @ORM\ManyToOne(targetEntity="Post")
           * @ORM\JoinColumn(onDelete="CASCADE")
           * 
           */
          private Post $post;
          /**
           * @param  string $message
           * @param User $author
           * @param Post $post
           * @param static
           */

          public static function create(string $message, User $author, Post $post): self
          {
                 $comment = new self();
                 $comment->message = $message;
                 $comment->author = $author;
                 $comment->post = $post;

                 return $comment;
         }
         
          public function __construct()
          {
              $this->publishedAt = new DateTimeImmutable();
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
           * Get the value of message
           *
           * @return  string
           */ 
          public function getMessage()
          {
                    return $this->message;
          }

          /**
           * Set the value of message
           *
           * @param  string  $message
           *
           * @return  self
           */ 
          public function setMessage(string $message)
          {
                    $this->message = $message;

                    return $this;
          }

          /**
           * Get the value of publishedAt
           *
           * @return  DateTimeInterface
           */ 
          public function getPublishedAt()
          {
                    return $this->publishedAt;
          }

          /**
           * Set the value of publishedAt
           *
           * @param  DateTimeInterface  $publishedAt
           *
           * @return  self
           */ 
          public function setPublishedAt(DateTimeInterface $publishedAt)
          {
                    $this->publishedAt = $publishedAt;

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
           * Get the value of post
           */ 
          public function getPost()
          {
                    return $this->post;
          }

          /**
           * Set the value of post
           *
           * @return  self
           */ 
          public function setPost($post)
          {
                    $this->post = $post;

                    return $this;
          }
 }