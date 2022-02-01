<?php

namespace App\Form;

use App\Entity\Category;
use App\Entity\Group;
use App\Entity\Ressource;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RessourceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('label')
            ->add('image')
            ->add('description')
            ->add('quantity_total')
            ->add('category_id', EntityType::class, [
                'class' => Category::class,
                'choice_label'=> 'label',
                'multiple' => true,
                'expanded' => true,
            ])
            ->add('group_id', EntityType::class, [
                'class' => Group::class,
                'choice_label'=> 'label',
                'multiple' => true,
                'expanded' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Ressource::class,
        ]);
    }
}
