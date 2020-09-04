<?php

namespace App\Entity;

use App\Repository\SettingRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SettingRepository::class)
 */
class Setting
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $iso;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $shutter;

    /**
     * @ORM\Column(type="decimal", precision=2, scale=1, nullable=true)
     */
    private $focal;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIso(): ?int
    {
        return $this->iso;
    }

    public function setIso(?int $iso): self
    {
        $this->iso = $iso;

        return $this;
    }

    public function getShutter(): ?string
    {
        return $this->shutter;
    }

    public function setShutter(?string $shutter): self
    {
        $this->shutter = $shutter;

        return $this;
    }

    public function getFocal(): ?string
    {
        return $this->focal;
    }

    public function setFocal(?string $focal): self
    {
        $this->focal = $focal;

        return $this;
    }
}
