<?php

namespace ProjectPunchclock\PunchclockBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;
use ProjectPunchclock\PunchclockBundle\Traits\PunchDetailTrait;
use ProjectPunchclock\UserBundle\Traits\TimestampableTrait;
use ProjectPunchclock\UserBundle\Traits\SlugableTrait;

/**
 * ProjectPunchclock\PunchclockBundle\Entity\PunchDetail
 *
 * @ORM\Table(name="punch_detail")
 * @ORM\Entity(repositoryClass="ProjectPunchclock\PunchclockBundle\Entity\PunchDetailRepository")
 */
class PunchDetail
{
    use PunchDetailTrait;
    use TimestampableTrait;
    use SlugableTrait;
}
