<?php
namespace RayMailer\Model\Entity;

use Cake\ORM\Entity;

/**
 * Template Entity
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string $subject
 * @property string $body
 * @property string $default
 * @property string $sender_name
 * @property string $sender_email
 * @property string $reply_to
 * @property bool $is_locked
 * @property int $raymailer_layout_id
 * @property string $transport
 * @property string $notes
 * @property string $status
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \RayMailer\Model\Entity\RaymailerLayout $raymailer_layout
 */
class Template extends Entity
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
