<?php

namespace ProjectPunchclock\PunchclockBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;
use ProjectPunchclock\ProjectBundle\Traits\ProjectTrait;
use ProjectPunchclock\UserBundle\Traits\TimestampableTrait;
use ProjectPunchclock\UserBundle\Traits\SlugableTrait;

/**
 * ProjectPunchclock\PunchclockBundle\Entity\Project
 *
 * @ORM\Table(name="project")
 * @ORM\Entity(repositoryClass="ProjectPunchclock\PunchclockBundle\Entity\ProjectRepository")
 */
class Project
{
    use ProjectTrait;
    use TimestampableTrait;
    use SlugableTrait;
}
