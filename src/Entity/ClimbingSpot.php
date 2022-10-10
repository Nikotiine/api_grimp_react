<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use App\Controller\SpotNamingController;
use App\Repository\ClimbingSpotRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;


#[ORM\Entity(repositoryClass: ClimbingSpotRepository::class)]
#[ApiResource(
    operations: [
        new Get(),
        new GetCollection(
            uriTemplate: '/climbing_data/naming',
            controller: SpotNamingController::class,
            openapiContext: [
                'summary'=>'Recupere les nomenclatures d\'un site de grimpe',
                'response'=>[
                    '200'=>[
                        'description'=>'OK',
                        'content'=>[
                            'application/json'=>[
                                'schema'=>[
                                    'type'=>'array'
                                ]
                            ]
                        ]
                    ]
                ]
                ],
            paginationEnabled: false,
            normalizationContext: ['groups'=>['read:naming']],
            read: false,
            name: 'naming',),
       new Post(
          // denormalizationContext: ['groups'=>['write:spot']]
       )
    ],denormalizationContext: ['groups'=>['write:spot']]
)]
class ClimbingSpot
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    #[Groups('write:spot')]
    private ?string $name = null;

    #[ORM\ManyToOne(targetEntity: Level::class)]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups('write:spot')]
    private ?Level $minLevel = null;

    #[ORM\ManyToOne(targetEntity: Level::class)]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups('write:spot')]
    private ?Level $maxLevel = null;

    #[ORM\ManyToOne(targetEntity: Exposure::class)]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups('write:spot')]
    private ?Exposure $exposure = null;

    #[ORM\ManyToOne(targetEntity: Engagement::class)]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups('write:spot')]
    private ?Engagement $engagement = null;

    #[ORM\ManyToOne(targetEntity: Equimpent::class)]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups('write:spot')]
    private ?Equimpent $equipment = null;

    #[ORM\ManyToOne(targetEntity: RockType::class)]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups('write:spot')]
    private ?RockType $rockType = null;

    #[ORM\ManyToOne(targetEntity: RoutProfil::class)]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups('write:spot')]
    private ?RoutProfil $routProfil = null;

    #[ORM\ManyToOne(targetEntity: ApprochType::class)]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups('write:spot')]
    private ?ApprochType $approach = null;

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

    public function getMinLevel(): ?Level
    {
        return $this->minLevel;
    }

    public function setMinLevel(?Level $minLevel): self
    {
        $this->minLevel = $minLevel;

        return $this;
    }

    public function getMaxLevel(): ?Level
    {
        return $this->maxLevel;
    }


    public function setMaxLevel(?Level $maxLevel): self
    {
        $this->maxLevel = $maxLevel;

        return $this;
    }

    public function getExposure(): ?Exposure
    {
        return $this->exposure;
    }


    public function setExposure(?Exposure $exposure): self
    {
        $this->exposure = $exposure;

        return $this;
    }

    public function getEngagement(): ?Engagement
    {
        return $this->engagement;
    }


    public function setEngagement(?Engagement $Engagement): self
    {
        $this->engagement = $Engagement;

        return $this;
    }

    public function getEquipment(): ?Equimpent
    {
        return $this->equipment;
    }


    public function setEquipment(?Equimpent $equipment): self
    {
        $this->equipment = $equipment;

        return $this;
    }

    public function getRockType(): ?RockType
    {
        return $this->rockType;
    }


    public function setRockType(?RockType $rockType): self
    {
        $this->rockType = $rockType;

        return $this;
    }

    public function getRoutProfil(): ?RoutProfil
    {
        return $this->routProfil;
    }


    public function setRoutProfil(?RoutProfil $routProfil): self
    {
        $this->routProfil = $routProfil;

        return $this;
    }

    public function getApproach(): ?ApprochType
    {
        return $this->approach;
    }


    public function setApproach(?ApprochType $approach): self
    {
        $this->approach = $approach;

        return $this;
    }
}
