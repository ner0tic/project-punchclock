<?php
namespace ProjectPunchclock\PunchclockBundle\Traits;

use Doctrine\Common\Collections\ArrayCollection;

trait PunchTrait
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string $name
     *
     * @ORM\Column(name="name", type="string", length=150)
     * @Assert\NotBlank()
     */
    protected $name;

    /**
     * @var datetime $punch_time
     *
     * @ORM\Column(name="punch_time", type="timestamp")
     */
    protected $punch_time;

    /**
     * @var ProjectPunchclock\Entity\PunchKind $punch_kind
     *
     * @ORM\ManyToOne(targetEntity="PunchKind", inversedBy="punch")
     * @ORM\JoinColumn(name="punch_kind_id", referencedColumnName="id")
     */
    protected $punch_kind;

    /**
     * @ORM\Column(name="punch_message", type="text")
     */
    protected $punch_message;

    /**
     * @var ProjectPunchclock\Model\Project $project
     * @ORM\ManyToOne(targetEntity="Project", inversedBy="punch")
     * @ORM\JoinColumn(name="project_id", referencedColumnName="id")
     */
    protected $project;

    /**
     * @var ProjectPunchclock\UserBundle\Entity\User $user A user to the system.
     *
     * @Gedmo\SortableGroup
     * @ORM\ManyToOne(targetEntity="ProjectPunchclock\UserBundle\Entity\User", inversedBy="punch")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected $user;

    /**
     * @ORM\OneToMany(targetEntity="PunchDetail", mappedBy="punch")
     */
    protected $punch_details;

    public function __construct()
    {
        $this->punch_details = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Punch
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
     * Set punch_time
     *
     * @param timestamp $punchTime
     * @return Punch
     */
    public function setPunchTime(\timestamp $punchTime)
    {
        $this->punch_time = $punchTime;
        return $this;
    }

    /**
     * Get punch_time
     *
     * @return timestamp
     */
    public function getPunchTime()
    {
        return $this->punch_time;
    }

    /**
     * Set punch_message
     *
     * @param text $punchMessage
     * @return Punch
     */
    public function setPunchMessage($punchMessage)
    {
        $this->punch_message = $punchMessage;
        return $this;
    }

    /**
     * Get punch_message
     *
     * @return text
     */
    public function getPunchMessage()
    {
        return $this->punch_message;
    }

    /**
     * Set punch_kind
     *
     * @param ProjectPunchclock\PunchclockBundle\Entity\PunchKind $punchKind
     * @return Punch
     */
    public function setPunchKind(\ProjectPunchclock\PunchclockBundle\Entity\PunchKind $punchKind = null)
    {
        $this->punch_kind = $punchKind;
        return $this;
    }

    /**
     * Get punch_kind
     *
     * @return ProjectPunchclock\PunchclockBundle\Entity\PunchKind
     */
    public function getPunchKind()
    {
        return $this->punch_kind;
    }

    /**
     * Set project
     *
     * @param ProjectPunchclock\PunchclockBundle\Entity\Project $project
     * @return Punch
     */
    public function setProject(\ProjectPunchclock\PunchclockBundle\Entity\Project $project = null)
    {
        $this->project = $project;
        return $this;
    }

    /**
     * Get project
     *
     * @return ProjectPunchclock\PunchclockBundle\Entity\Project
     */
    public function getProject()
    {
        return $this->project;
    }

    /**
     * Set user
     *
     * @param ProjectPunchclock\UserBundle\Entity\User $user
     * @return Punch
     */
    public function setUser(\ProjectPunchclock\UserBundle\Entity\User $user = null)
    {
        $this->user = $user;
        return $this;
    }

    /**
     * Get user
     *
     * @return ProjectPunchclock\UserBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Add punch_details
     *
     * @param ProjectPunchclock\PunchclockBundle\Entity\PunchDetail $punchDetails
     * @return Punch
     */
    public function addPunchDetail(\ProjectPunchclock\PunchclockBundle\Entity\PunchDetail $punchDetails)
    {
        $this->punch_details[] = $punchDetails;
        return $this;
    }

    /**
     * Remove punch_details
     *
     * @param ProjectPunchclock\PunchclockBundle\Entity\PunchDetail $punchDetails
     */
    public function removePunchDetail(\ProjectPunchclock\PunchclockBundle\Entity\PunchDetail $punchDetails)
    {
        $this->punch_details->removeElement($punchDetails);
    }

    /**
     * Get punch_details
     *
     * @return Doctrine\Common\Collections\Collection
     */
    public function getPunchDetails()
    {
        return $this->punch_details;
    }
}
