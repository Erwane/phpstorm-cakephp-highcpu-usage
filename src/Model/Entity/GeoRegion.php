<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Behavior\Translate\TranslateTrait;
use Cake\ORM\Entity;

/**
 * GeoRegion Entity
 *
 * @property string $id
 * @property int|null $id_v2
 * @property string $parent_id
 * @property string $name
 * @property string|null $google_id
 * @property \App\Model\Entity\GeoCountry $country
 * @property \App\Model\Entity\GeoDepartment[] $departments
 * @property \Cake\ORM\Entity[] $_i18n
 * @property string $coords
 * @property string|null $bbox
 */
class GeoRegion extends Entity
{
    use GisEntityTrait;
    use TranslateTrait;

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'id_v2' => true,
        'parent_id' => true,
        'name' => true,
        'lng' => true,
        'lat' => true,
        'bounding' => true,
        'google_id' => true,
    ];
}
