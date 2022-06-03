<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;

class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname', HiddenType::class, [
                'constraints' => new Length([
                    'min' => 2,
                    'max' => 30
                ]),

                'attr' => [
                    'placeholder' => 'Merci de saisir votre Prénom'
                ]
            ])
            ->add('lastname', HiddenType::class, [
                'constraints' => new Length([
                    'min' => 2,
                    'max' => 30
                ]),
                'attr' => [
                    'placeholder' => 'Merci de saisir votre Nom'
                ]
            ])
            ->add('pseudo', TextType::class, [
                'required' => true,
                'attr' => [
                    'placeholder' => 'Pseudo',
                    'autocomplete' => 'off',
                    'class' => 'form-control',

                ],

            ])
            ->add('email', EmailType::class, [
                'required' => true,
                'constraints' => new Length([
                    'min' => 6,
                    'max' => 60
                ]),
                'attr' => [
                    'placeholder' => 'Email',
                    'class' => 'form-control',

                ],
                'label_attr' => [
                    'class' => 'd-none',
                ],
            ])
            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'constraints' => new Length([
                    'min' => 8,
                    'max' => 30
                ]),
                'invalid_message' => 'Le mot de passe et la confirmation ne correspondent pas',
                'required' => true,
                'first_options' => [
                    'label' => 'Mot de passe',
                    'attr' => [
                        'placeholder' => 'Mot de passe',
                        'class' => 'form-control',

                    ],
                ],
                'second_options' => [
                    'label' => 'Confirmation',
                    'attr' => [
                        'placeholder' => 'Confirmation mot de passe',
                        'class' => 'form-control',

                    ],
                ],
            ])

            ->add('submit', SubmitType::class, [
                'label' => "Inscription",
                'attr' => [
                    'class' => 'btn pink-gradient-btn-into-black'
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
            'csrf_protection' => false,
        ]);
    }
}
