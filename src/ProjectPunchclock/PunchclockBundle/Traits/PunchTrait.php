<?php
namespace ProjectPunchclock\PunchclockBundle\Traits;

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
}
