<?php

namespace App\Form;

use App\Entity\Article;
use App\Entity\Category;
use App\Entity\Tag;
use Doctrine\ORM\EntityRepository;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'Title',
                'attr' => [
                    'class' => 'form-control mb-3'
                ]
            ])
            ->add('content', CKEditorType::class, [
                'label' => 'Content',
                'attr' => [
                    'class' => 'form-control mb-3',
                    'rows' => '12'
                ]
            ])
            //->add('created_at')
            //->add('updated_at')
            //->add('is_active')
            ->add('image', UrlType::class, [
                'label' => 'Image URL',
                'attr' => [
                    'class' => 'form-control mb-3'
                ]
            ])
            //->add('slug')
            //->add('author')
            ->add('category', EntityType::class, [
                'label' => 'Article\'s categories. Choose one or more.',
                'class' => Category::class,
                'choice_label' => 'title',
                'multiple' => true,
                'attr' => [
                    'class' => 'form-control mb-3 select-categories'
                ],
                'query_builder' => function(EntityRepository $er) {
                    return $er->createQueryBuilder('c')
                        ->orderBy('c.title', 'ASC');
                }
            ])
            ->add('tag', EntityType::class, [
                'label' => 'Article\'s tags. Choose one or more.',
                'class' => Tag::class,
                'choice_label' => 'title',
                'multiple' => true,
                'attr' => [
                    'class' => 'form-control mb-3 select-tags'
                ],
                'query_builder' => function(EntityRepository $er) {
                    return $er->createQueryBuilder('t')
                        ->orderBy('t.title', 'ASC');
                },
                //'by_reference' => false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}
