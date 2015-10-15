<?php
/**
 * Created by PhpStorm.
 * User: formation.invite
 * Date: 06/10/2015
 * Time: 17:32
 */

Trait updateTimeTrait {
    /**
     * @var date
     *
     * @ORM\Column(name="age", type="date")
     */
    protected $updateAt;

    /**
     * @return date
     */
    public function getUpdateAt()
    {
        return $this->updateAt;
    }

    /**
     * @param date $updateAt
     */
    public function setUpdateAt($updateAt)
    {
        $this->updateAt = $updateAt;
    }


}