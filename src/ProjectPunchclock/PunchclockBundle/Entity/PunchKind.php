<?php

namespace ProjectPunchclock\PunchclockBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;
use ProjectPunchclock\PunchclockBundle\Traits\PunchKindTrait;
use ProjectPunchclock\UserBundle\Traits\TimestampableTrait;
use ProjectPunchclock\UserBundle\Traits\SlugableTrait;

/**
 * ProjectPunchclock\PunchclockBundle\Entity\PunchKind
 *
 * @ORM\Table(name="punch_kind")
 * @ORM\Entity(repositoryClass="ProjectPunchclock\PunchclockBundle\Entity\PunchKindRepository")
 */
class PunchKind
{
    use PunchKindTrait;
    use TimestampableTrait;
    use SlugableTrait;
}
