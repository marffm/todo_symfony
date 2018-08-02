<?php
declare(strict_types=1);

namespace TodoBundle\Domain\User\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class User
 * @ORM\Entity
 * @ORM\Table(name="user", options={"charset"="utf8"})
 * @package TodoBundle\Domain\User\Entity
 */
class User
{

    /**
     * @var integer
     * @ORM\Id
     * @ORM\Column(type="integer", unique=true, nullable=false, name="id")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(type="string", length=100, nullable=false)
     */
    private $name;

    /**
     * @var string
     * @ORM\Column(type="string", length=100, name="last_name", nullable=false)
     */
    private $lastName;

    /**
     * @var null|string
     * @ORM\Column(type="string", length=255, name="email", nullable=false)
     */
    private $email;

    /**
     * @var null|string
     * @ORM\Column(type="string", length=15, name="phone", nullable=false)
     */
    private $phone;

    /**
     * User constructor.
     * @param string $name
     * @param string $lastName
     * @param null|string $email
     * @param null|string $phone
     */
    public function __construct(
        string $name,
        string $lastName,
        ?string $email,
        ?string $phone
    ) {
        $this->name = $name;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->phone = $phone;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @return null|string
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @return null|string
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }


}