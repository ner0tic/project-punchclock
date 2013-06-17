<?php
namespace ProjectPunchclock\PunchclockBundle\Traits;

trait PunchDetailTrait
{
    /**
     * @ORM\Column(name="name", type="string")
     */
    protected $name;

    /**
     * @ORM\Column(name="description", type="string")
     */
    protected $description;

    /**
     * @ORM\Column(name="source", type="string")
     * @Assert\NotBlank()
     */
    protected $source;

    /**
     * @ORM\Column(name="source_url", type="string")
     * @Assert\Url()
     */
    protected $source_url;

    /**
     * @ORM\ManyToOne(targetEntity="Punch", inversedBy="punch_detail")
     * @ORM\JoinColumn(name="punch_id", referencedColumnName="id")
     */
    protected $punch;

    /**
     * Set name
     *
     * @param string $name
     * @return PunchDetail
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
     * @param string $description
     * @return PunchDetail
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set source
     *
     * @param string $source
     * @return PunchDetail
     */
    public function setSource($source)
    {
        $this->source = $source;
        return $this;
    }

    /**
     * Get source
     *
     * @return string
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * Set source_url
     *
     * @param string $sourceUrl
     * @return PunchDetail
     */
    public function setSourceUrl($sourceUrl)
    {
        $this->source_url = $sourceUrl;
        return $this;
    }

    /**
     * Get source_url
     *
     * @return string
     */
    public function getSourceUrl()
    {
        return $this->source_url;
    }

    /**
     * Set punch
     *
     * @param ProjectPunchclock\PunchclockBundle\Entity\Punch $punch
     * @return PunchDetail
     */
    public function setPunch(\ProjectPunchclock\PunchclockBundle\Entity\Punch $punch = null)
    {
        $this->punch = $punch;
        return $this;
    }

    /**
     * Get punch
     *
     * @return ProjectPunchclock\PunchclockBundle\Entity\Punch
     */
    public function getPunch()
    {
        return $this->punch;
    }
}
