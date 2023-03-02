<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Bookmark Entity
 *
 * @property int $bookmarks_id
 * @property int|null $categories_id
 * @property string $bookmarks_hash
 * @property string $bookmarks_name
 * @property string $bookmarks_url
 * @property bool $bookmarks_type
 *
 * @property \App\Model\Entity\Category $category
 */
class Bookmark extends Entity
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
        'categories_id' => true,
        'bookmarks_hash' => true,
        'bookmarks_name' => true,
        'bookmarks_url' => true,
        'bookmarks_type' => true,
        'category' => true,
    ];
}
