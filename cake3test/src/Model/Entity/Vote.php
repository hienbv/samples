<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Vote Entity.
 *
 * @property int $user_id
 * @property \App\Model\Entity\User $user
 * @property int $post_id
 * @property \App\Model\Entity\Post $post
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 */
class Vote extends Entity
{

}
