<?php

namespace ProjectPunchclock\ProjectBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;
use ProjectPunchclock\ProjectBundle\Traits\StatusTrait;
use ProjectPunchclock\UserBundle\Traits\TimestampableTrait;
use ProjectPunchclock\UserBundle\Traits\SlugableTrait;

/**
 * ProjectPunchclock\PunchclockBundle\Entity\Status
 *
 * @ORM\Table(name="status")
 * @ORM\Entity(repositoryClass="ProjectPunchclock\ProjectBundle\Entity\StatusRepository")
 */
class Status
{
    use StatusTrait;
    use TimestampableTrait;
    use SlugableTrait;
}
