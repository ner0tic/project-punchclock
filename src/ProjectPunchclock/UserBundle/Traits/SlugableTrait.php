<?php
namespace ProjectPunchclock\UserBundle\Traits;

trait SlugableTrait
{
    /**
    * @Gedmo\Slug(fields={"name"})
    * @ORM\Column(length=128, unique=true)
    */
    protected $slug;

    /**
     * Set slug
     *
     * @param string $slug
     * @return PunchKind
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
        return $this;
    }

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }
}
