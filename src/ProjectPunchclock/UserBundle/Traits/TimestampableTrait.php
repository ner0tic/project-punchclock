<?php
namespace ProjectPunchclock\UserBundle\Traits;

trait TimestampableTrait
{
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
     * Set created
     *
     * @param datetime $created
     * @return PunchKind
     */
    public function setCreated($created)
    {
        $this->created = $created;
        return $this;
    }

    /**
     * Get created
     *
     * @return datetime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set updated
     *
     * @param datetime $updated
     * @return PunchKind
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;
        return $this;
    }

    /**
     * Get updated
     *
     * @return datetime
     */
    public function getUpdated()
    {
        return $this->updated;
    }
}
