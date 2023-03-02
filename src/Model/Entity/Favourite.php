<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Favourite Entity
 *
 * @property int $favourites_id
 * @property int $bookmarks_id
 *
 * @property \App\Model\Entity\Bookmark $bookmark
 */
class Favourite extends Entity
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
        'bookmarks_id' => true,
        'bookmark' => true,
    ];
}
