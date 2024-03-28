<?php

namespace App\Form;

use App\Entity\Category;
use App\Entity\Client;
use App\Entity\JobOffer;
use App\Entity\JobType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class JobOfferType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('reference')
            ->add('description')
            ->add('active')
            ->add('notes')
            ->add('jobTitle')
            ->add('location')
            ->add('closingDate', null, [
                'widget' => 'single_text',
            ])
            ->add('salary')
            ->add('createdDate', null, [
                'widget' => 'single_text',
            ])
            ->add('Client', EntityType::class, [
                'class' => Client::class,
                'choice_label' => 'id',
            ])
            ->add('Category', EntityType::class, [
                'class' => Category::class,
                'choice_label' => 'id',
            ])
            ->add('JobType', EntityType::class, [
                'class' => JobType::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => JobOffer::class,
        ]);
    }
}
