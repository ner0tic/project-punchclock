<?php

namespace ProjectPunchclock\ProjectBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;
use ProjectPunchclock\ProjectBundle\Traits\CategoryTrait;
use ProjectPunchclock\UserBundle\Traits\TimestampableTrait;
use ProjectPunchclock\UserBundle\Traits\SlugableTrait;

/**
 * ProjectPunchclock\PunchclockBundle\Entity\Project
 *
 * @ORM\Table(name="category")
 * @ORM\Entity(repositoryClass="ProjectPunchclock\ProjectBundle\Entity\CategoryRepository")
 */
class Category
{
    use CategoryTrait;
    use TimestampableTrait;
    use SlugableTrait;
}
