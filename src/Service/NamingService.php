<?php

namespace App\Service;

use App\Entity\ApprochType;
use App\Entity\Engagement;
use App\Entity\Equimpent;
use App\Entity\Exposure;
use App\Entity\Level;
use App\Entity\RockType;
use App\Entity\RoutProfil;
use App\Repository\ApprochTypeRepository;
use App\Repository\EngagementRepository;
use App\Repository\EquimpentRepository;
use App\Repository\ExposureRepository;
use App\Repository\LevelRepository;
use App\Repository\RockTypeRepository;
use App\Repository\RoutProfilRepository;

class NamingService
{


    public function __construct(
            private ApprochTypeRepository $approchTypeRepository,
            private EngagementRepository $engagementRepository,
            private EquimpentRepository $equimpentRepository,
            private ExposureRepository $exposureRepository,
            private LevelRepository $levelRepository,
            private RockTypeRepository $rockTypeRepository,
            private RoutProfilRepository $profilRepository,)
    {
    }
    public function getNaming():array
    {
        $namings = [];
        $namings[ApprochType::JSON_NAMING] = $this->approchTypeRepository->findAll();
        $namings[Engagement::JSON_NAMING] = $this->engagementRepository->findAll();
        $namings[Equimpent::JSON_NAMING] = $this->equimpentRepository->findAll();
        $namings[Exposure::JSON_NAMING] = $this->exposureRepository->findAll();
        $namings[Level::JSON_NAMING] = $this->levelRepository->findAll();
        $namings[RockType::JSON_NAMING] = $this->rockTypeRepository->findAll();
        $namings[RoutProfil::JSON_NAMING] = $this->profilRepository->findAll();

        return $namings;
    }

}