<?php

namespace ProjectPunchclock\PunchclockBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;
use ProjectPunchclock\PunchclockBundle\Traits\PunchTrait;
use ProjectPunchclock\UserBundle\Traits\TimestampableTrait;
use ProjectPunchclock\UserBundle\Traits\SlugableTrait;

/**
 * ProjectPunchclock\PunchclockBundle\Entity\Punch
 *
 * @ORM\Table(name="punch")
 * @ORM\Entity(repositoryClass="ProjectPunchclock\PunchclockBundle\Entity\PunchRepository")
 */
class Punch
{
    use PunchTrait;
    use TimestampableTrait;
    use SlugableTrait;
}
