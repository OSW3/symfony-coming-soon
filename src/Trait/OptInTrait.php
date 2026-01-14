<?php 
namespace OSW3\ComingSoon\Trait;

use Doctrine\ORM\Mapping as ORM;

trait OptInTrait
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $optinAt = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getOptinAt(): ?\DateTimeImmutable
    {
        return $this->optinAt;
    }

    public function setOptinAt(\DateTimeImmutable $optinAt): static
    {
        $this->optinAt = $optinAt;

        return $this;
    }
}