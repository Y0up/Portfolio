<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Continent;
use App\Entity\Country;
use App\Entity\Photo;
use App\Entity\Setting;
use Faker;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');

        $settingIsoList = [];
        for ($i = 0; $i < 10; $i++) {
            $settingIso = new Setting();
            $settingIso->setIso($faker->numberBetween($min = 100, $max = 6400));
            $manager->persist($settingIso);
            $settingIsoList[] = $settingIso;
        }

        $settingShutterList = [];
        for ($i = 0; $i < 10; $i++) {
            $settingShutter = new Setting();
            $settingShutter->setShutter($faker->randomFloat($nbMaxDecimals = 1, $min = 1, $max = 21));
            $manager->persist($settingShutter);
            $settingShutterList[] = $settingShutter;
        }

        $settingFocalList = [];
        for ($i = 0; $i < 10; $i++) {
            $settingFocal = new Setting();
            $settingFocal->setFocal($faker->randomFloat($nbMaxDecimals = 1, $min = 1, $max = 21));
            $manager->persist($settingFocal);
            $settingFocalList[] = $settingFocal;
        }

        $categoryList = [];
        for ($i = 0; $i < 10; $i++) {
            $category = new Category();
            $category->setName($faker->word);
            $category->setDescription($faker->paragraph($nbSentences = 3, $variableNbSentences = true));
            $manager->persist($category);
            $categoryList[] = $category;
        }

        $continentList = [];
        for ($i = 0; $i < 7; $i++) {
            $continent = new Continent();
            $continent->setName($faker->word);
            $manager->persist($continent);
            $continentList[] = $continent;
        }

        $countryList = [];
        for ($i = 0; $i < 15; $i++) {
            $country = new Country();
            $country->setName($faker->word);
            $country->setContinent($faker->randomElement($continentList));
            $manager->persist($country);
            $countryList[] = $country;
        }

        for ($i = 0; $i < 50; $i++) {
            $photo = new Photo();
            $photo->setImage($faker->imageUrl($width = 640, $height = 480));
            $photo->setTitle($faker->word);
            $photo->setDescription($faker->paragraph($nbSentences = 3, $variableNbSentences = true));
            $photo->setAddress($faker->city);
            $photo->setCountry($faker->randomElement($countryList));
            $photo->addCategory($faker->randomElement($categoryList));
            $photo->addSetting($faker->randomElement($settingFocalList));
            $photo->addSetting($faker->randomElement($settingIsoList));
            $photo->addSetting($faker->randomElement($settingShutterList));
            $photo->setCreatedAt(new \DateTime);
            $photo->setUpdatedAt(new \DateTime);
            $manager->persist($photo);
        }

        $manager->flush();
    }
}
