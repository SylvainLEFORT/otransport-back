<?php

namespace App\Entity;

use App\Repository\CustomerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;


/**
 * @ORM\Entity(repositoryClass=CustomerRepository::class)
 */
class Customer
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
<<<<<<< Updated upstream
     * @Groups("api_deliveries_pending_list") 
=======
     * @Groups("api_deliveries_list")
     * @Groups("api_deliveries_details")
>>>>>>> Stashed changes
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
<<<<<<< Updated upstream
     * @Groups("api_deliveries_pending_list") 
=======
     * @Groups("api_deliveries_list") 
     * @Groups("api_deliveries_details")
>>>>>>> Stashed changes
     */
    private $address;

    /**
<<<<<<< Updated upstream
=======
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups("api_deliveries_list")
     * @Groups("api_deliveries_details") 
     */
    private $phoneNumber;

    /**
>>>>>>> Stashed changes
     * @ORM\OneToMany(targetEntity=Delivery::class, mappedBy="customer")
     */
    private $deliveries;

    public function __construct()
    {
        $this->deliveries = new ArrayCollection();
    }

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

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    /**
     * @return Collection<int, Delivery>
     */
    public function getDeliveries(): Collection
    {
        return $this->deliveries;
    }

    public function addDelivery(Delivery $delivery): self
    {
        if (!$this->deliveries->contains($delivery)) {
            $this->deliveries[] = $delivery;
            $delivery->setCustomer($this);
        }

        return $this;
    }

    public function removeDelivery(Delivery $delivery): self
    {
        if ($this->deliveries->removeElement($delivery)) {
            // set the owning side to null (unless already changed)
            if ($delivery->getCustomer() === $this) {
                $delivery->setCustomer(null);
            }
        }

        return $this;
    }
}
