<?php
namespace RayMailer\Model\Entity;

use Cake\ORM\Entity;

/**
 * Layout Entity
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string $body
 * @property string $type
 * @property string $sender_name
 * @property string $sender_email
 * @property string $reply_to
 * @property string $description
 * @property bool $is_locked
 * @property string $status
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \RayMailer\Model\Entity\RaymailerTemplate[] $raymailer_templates
 */
class Layout extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}
