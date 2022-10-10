<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\EngagementRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: EngagementRepository::class)]
#[ApiResource]
class Engagement
{
    const JSON_NAMING = 'engagement';
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['read:naming'])]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    #[Groups(['read:naming'])]
    private ?string $name = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }
}
