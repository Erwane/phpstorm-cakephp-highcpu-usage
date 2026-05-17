<?php
declare(strict_types=1);

namespace App\Test\Factory;

use CakephpFixtureFactories\Factory\BaseFactory as CakephpBaseFactory;
use CakephpFixtureFactories\Generator\GeneratorInterface;

/**
 * GeoLevel1Factory
 *
 * @method \App\Model\Entity\GeoRegion getEntity()
 * @method array<\App\Model\Entity\GeoRegion> getEntities()
 * @method \App\Model\Entity\GeoRegion|array<\App\Model\Entity\GeoRegion> persist()
 * @method static \App\Model\Entity\GeoRegion get(mixed $primaryKey, array $options = [])
 */
class GeoRegionFactory extends CakephpBaseFactory
{
    /**
     * Defines the Table Registry used to generate entities with
     *
     * @return string
     */
    protected function getRootTableRegistryName(): string
    {
        return 'App.GeoRegions';
    }

    /**
     * Defines the factory's default values. This is useful for
     * not nullable fields. You may use methods of the present factory here too.
     *
     * @return void
     */
    protected function setDefaultTemplate(): void
    {
        $this->setDefaultData(function (GeneratorInterface $generator) {
            return [
                'id_v2' => $generator->randomNumber(),
                'name' => $generator->name(),
                'lng' => $generator->longitude(),
                'lat' => $generator->latitude(),
                'google_id' => $generator->lexify('?????????????????????????????'),
            ];
        });
    }

    public function withCountry($parameter = null, int $n = 1): static
    {
        return $this->with(
            'Country',
            GeoCountryFactory::make($parameter, $n),
        );
    }
}
