<?php

namespace App\Form;

use App\Entity\Adress;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AdressType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Vous pouvez modifier ou laisser l\'adresse pré-remplie.',
                'attr' => [
                    'placeholder' => 'Nommez votre adresse',
                    'value' => 'Adresse principale',
                ]
            ])
            ->add('firstname', TextType::class, [
                'label' => 'Votre Prénom',
                'attr' => [
                    'placeholder' => 'Votre Prénom',
                    'value' => 'Benjamin',

                ]
            ])
            ->add('lastname', TextType::class, [
                'label' => 'Votre Nom',
                'attr' => [
                    'placeholder' => 'Votre Nom',
                    'value' => 'Martin',
                ]
            ])
            ->add('company', TextType::class, [
                'label' => 'Nom de votre entreprise',
                'required' => false,
                'attr' => [
                    'placeholder' => 'Nom de votre entreprise',
                    'value' => 'myDev',
                ]
            ])
            ->add('adress', TextType::class, [
                'label' => 'Adresse ',
                'attr' => [
                    'placeholder' => 'ex : 3 rue des lilas',
                    'value' => '3 rue des lilas',
                ]
            ])
            ->add('postal', TextType::class, [
                'label' => 'Code postal',
                'attr' => [
                    'placeholder' => 'Code postal',
                    'value' => '33000'

                ]
            ])
            ->add('city', TextType::class, [
                'label' => 'Votre ville',
                'attr' => [
                    'placeholder' => 'Votre ville',
                    'value' => 'Bordeaux'

                ]
            ])
            ->add('country', CountryType::class, [
                'label' => 'Votre Pays',
                'attr' => [
                    'placeholder' => 'Votre Pays',
                    'class' => 'form-control',

                ],
                'preferred_choices' => ['France', 'FR'],


            ])
            ->add('phone', TelType::class, [
                'label' => 'Téléphone',
                'attr' => [
                    'placeholder' => 'Téléphone',
                    'value' => '0607080900'

                ]
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Valider',
                'attr' => [
                    'class' => 'btn pink-gradient-btn-into-black',
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Adress::class,
        ]);
    }
}
