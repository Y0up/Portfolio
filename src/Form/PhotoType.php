<?php

namespace App\Form;

use App\Entity\Photo;
use App\Entity\Country;
use App\Entity\Setting;
use App\Entity\Category;
use App\Repository\SettingRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\ChoiceList\ChoiceList;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class PhotoType extends AbstractType
{

    private $settingRepository;
    public function __construct(SettingRepository $settingRepository)
    {
        $this->settingRepository = $settingRepository;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('image')
            ->add('title')
            ->add('description')
            ->add('address')
            ->add('createdAt')
            ->add(
                'country',
                EntityType::class,
                [
                    'class' => Country::class,
                    'choice_label' => 'name'
                ]
            )




            ->add(
                'setting',
                ChoiceType::class,
                [
                    'choices' => $this->settingRepository->findAllIso(),
                    'choice_label' => 'iso',
                    'choices' => $this->settingRepository->findAllShutter(),
                    'choice_label' => 'shutter'
                ]
            )

            ->add(
                'category',
                EntityType::class,
                [
                    'class' => Category::class,
                    'choice_label' => 'name',
                    'expanded' => false,
                    'multiple' => true
                ]
            );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Photo::class,
        ]);
    }
}
