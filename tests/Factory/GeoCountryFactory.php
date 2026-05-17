<?php
declare(strict_types=1);

namespace App\Test\Factory;

use CakephpFixtureFactories\Factory\BaseFactory as CakephpBaseFactory;
use CakephpFixtureFactories\Generator\GeneratorInterface;

/**
 * GeoCountryFactory
 *
 * @method \App\Model\Entity\GeoCountry getEntity()
 * @method array<\App\Model\Entity\GeoCountry> getEntities()
 * @method \App\Model\Entity\GeoCountry|array<\App\Model\Entity\GeoCountry> persist()
 * @method static \App\Model\Entity\GeoCountry get(mixed $primaryKey, array $options = [])
 */
class GeoCountryFactory extends CakephpBaseFactory
{
    /**
     * Defines the Table Registry used to generate entities with
     *
     * @return string
     */
    protected function getRootTableRegistryName(): string
    {
        return 'App.GeoCountries';
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
                'name' => $generator->country(),
                'lng' => $generator->longitude(),
                'lat' => $generator->latitude(),
                'iso2' => $generator->lexify('??'),
                'iso3' => $generator->countryISOAlpha3(),
                'enabled' => true,
                'can_registration' => true,
                'google_id' => $generator->lexify('?????????????????????????????'),
            ];
        });
    }
}
