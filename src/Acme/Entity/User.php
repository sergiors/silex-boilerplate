<?php
namespace Acme\Acme\Entity;

/**
 * @Entity
 * @Table(name="user")
 */
class User
{
    /**
     * @Id @GeneratedValue
     * @Column(name="id", type="integer")
     *
     * @var int
     */
    protected $id;

    public function getId()
    {
        return $this->id;
    }
}
