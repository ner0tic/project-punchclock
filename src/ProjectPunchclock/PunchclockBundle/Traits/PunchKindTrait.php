<?php
namespace ProjectPunchclock\PunchclockBundle\Traits;

use Doctrine\Common\Collections\ArrayCollection;

trait PunchKindTrait
{
    /**
     * @ORM\Column(name="name", type="string")
     */
    protected $name;

    /**
     * @ORM\Column(name="description", type="text")
     */
    protected $description;

    /**
     * @ORM\Column(name="billable", type="boolean")
     */
    protected $billable = false;

    /**
     * @ORM\ManyToOne(targetEntity="PunchKind", inversedBy="punch_kind")
     * @ORM\JoinColumn(name="parent_id", referencedColumnName="id")
     */
    protected $parent;

    /**
     * Set name
     *
     * @param string $name
     * @return PunchKind
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param text $description
     * @return PunchKind
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * Get description
     *
     * @return text
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set billable
     *
     * @param boolean $billable
     * @return PunchKind
     */
    public function setBillable($billable)
    {
        $this->billable = $billable;
        return $this;
    }

    /**
     * Get billable
     *
     * @return boolean
     */
    public function getBillable()
    {
        return $this->billable;
    }

    /**
     * Set parent
     *
     * @param ProjectPunchclock\PunchclockBundle\Entity\PunchKind $parent
     * @return PunchKind
     */
    public function setParent(\ProjectPunchclock\PunchclockBundle\Entity\PunchKind $parent = null)
    {
        $this->parent = $parent;
        return $this;
    }

    /**
     * Get parent
     *
     * @return ProjectPunchclock\PunchclockBundle\Entity\PunchKind
     */
    public function getParent()
    {
        return $this->parent;
    }
}
