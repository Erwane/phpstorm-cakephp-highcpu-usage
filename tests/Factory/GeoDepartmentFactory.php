<?php
declare(strict_types=1);

namespace App\Test\Factory;

use CakephpFixtureFactories\Factory\BaseFactory as CakephpBaseFactory;
use CakephpFixtureFactories\Generator\GeneratorInterface;

/**
 * GeoLevel2Factory
 *
 * @method \App\Model\Entity\GeoDepartment getEntity()
 * @method array<\App\Model\Entity\GeoDepartment> getEntities()
 * @method \App\Model\Entity\GeoDepartment|array<\App\Model\Entity\GeoDepartment> persist()
 * @method static \App\Model\Entity\GeoDepartment get(mixed $primaryKey, array $options = [])
 */
class GeoDepartmentFactory extends CakephpBaseFactory
{
    /**
     * Defines the Table Registry used to generate entities with
     *
     * @return string
     */
    protected function getRootTableRegistryName(): string
    {
        return 'App.GeoDepartments';
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
                'short' => $generator->numberBetween(10, 89),
                'timezone' => $generator->timezone(),
                'google_id' => $generator->lexify('?????????????????????????????'),
            ];
        });
    }

    /**
     * @param \Cake\Datasource\EntityInterface|callable|array|string|int|null $parameter Associated entities parameter
     * @param int $n Generated count
     * @return static
     */
    public function withRegion(mixed $parameter = null, int $n = 1): static
    {
        return $this->with(
            'Region',
            GeoRegionFactory::make($parameter, $n),
        );
    }

    /**
     * Create department chain factory. With region and country.
     *
     * @return static
     */
    public static function makeChain(): GeoDepartmentFactory
    {
        $country = GeoCountryFactory::make()
            ->getEntity();

        $region = GeoRegionFactory::make()
            ->withCountry($country)
            ->getEntity();

        return static::make()
            ->withRegion($region);
    }
}
