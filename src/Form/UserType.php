<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class, [
                'label' => false,
                'attr' => [
                    'class' => 'form-control mb-3',
                    'placeholder' => 'Email'
                ]
            ])
            //->add('roles')
            //->add('password')
            ->add('username', TextType::class, [
                'label' => false,
                'attr' => [
                    'class' => 'form-control mb-3',
                    'placeholder' => 'Username'
                ]
            ])
            ->add('image', UrlType::class, [
                'label' => false,
                'attr' => [
                    'class' => 'form-control mb-3',
                    'placeholder' => 'Profile image'
                ]
            ])
            //->add('isVerified')
            ->add('presentation', TextareaType::class, [
                'label' => false,
                'required' => false,
                'attr' => [
                    'class' => 'form-control mb-3',
                    'rows' => '3',
                    'placeholder' => 'Presentation'
                ]
            ])
            ->add('facebook', UrlType::class, [
                'label' => false,
                'required' => false,
                'attr' => [
                    'class' => 'form-control mb-3',
                    'placeholder' => 'Your Facebook profile'
                ]
            ])
            ->add('twitter', UrlType::class, [
                'label' => false,
                'required' => false,
                'attr' => [
                    'class' => 'form-control mb-3',
                    'placeholder' => 'Your Twitter profile'
                ]
            ])
            ->add('instagram', UrlType::class, [
                'label' => false,
                'required' => false,
                'attr' => [
                    'class' => 'form-control mb-3',
                    'placeholder' => 'Your Instagram profile'
                ]
            ])
            ->add('linkedin', UrlType::class, [
                'label' => false,
                'required' => false,
                'attr' => [
                    'class' => 'form-control mb-3',
                    'placeholder' => 'Your LinkedIn profile'
                ]
            ])
            ->add('github', UrlType::class, [
                'label' => false,
                'required' => false,
                'attr' => [
                    'class' => 'form-control mb-3',
                    'placeholder' => 'Your Github profile'
                ]
            ])
            ->add('youtube', UrlType::class, [
                'label' => false,
                'required' => false,
                'attr' => [
                    'class' => 'form-control mb-3',
                    'placeholder' => 'Your Youtube profile'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
