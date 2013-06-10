<?php

namespace ProjectPunchclock\PunchclockBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use ProjectPunchclock\PunchclockBundle\Traits\ProjectTrait;

/**
 * ProjectPunchclock\PunchclockBundle\Entity\Project
 *
 * @ORM\Table(name="project")
 * @ORM\Entity(repositoryClass="ProjectPunchclock\PunchclockBundle\Entity\ProjectRepository")
 */
class Project
{
    use ProjectTrait;

    /**
    * @var datetime $created
    *
    * @Gedmo\Timestampable(on="create")
    * @ORM\Column(type="datetime")
    */
    protected $created;

    /**
    * @var datetime $updated
    *
    * @Gedmo\Timestampable(on="update")
    * @ORM\Column(type="datetime")
    */
    protected $updated;

    /**
    * @Gedmo\Slug(fields={"name"})
    * @ORM\Column(length=128, unique=true)
    */
    protected $slug;
}
