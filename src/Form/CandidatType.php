<?php

namespace App\Form;

use App\Entity\Candidat;
use App\Entity\Experience;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class CandidatType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('gender', ChoiceType::class, [
                'choices'  => [
                    'Choose an option...' => null,
                    'Female' => true,
                    'Male' => true,
                    'Undefined' => true,
                ],
                'label' => false
            ])
            ->add('firstName')
            ->add('lastName')
            ->add('adress')
            ->add('country')
            ->add('nationality')
            ->add('passportFile', FileType::class, [
                'label' => false,
                'mapped' => false,
                'constraints' => [
                    new File([
                        'maxSize' => '1024k',
                        'mimeTypes' => [
                            'image/*',
                        ],
                        'mimeTypesMessage' => 'Please upload a valid document',
                    ])
                ]
            ])
            ->add('CV', FileType::class, [
                'label' => false,
                'mapped' => false,
                'constraints' => [
                    new File([
                        'maxSize' => '1024k',
                        'mimeTypes' => [
                            'image/*',
                        ],
                        'mimeTypesMessage' => 'Please upload a valid document',
                    ])
                ]
            ])
            ->add('profilPicture', FileType::class, [
                'label' => false,
                'mapped' => false,
                'constraints' => [
                    new File([
                        'maxSize' => '1024k',
                        'mimeTypes' => [
                            'image/*',
                        ],
                        'mimeTypesMessage' => 'Please upload a valid document',
                    ])
                ]
            ])
            ->add('currentLocation')
            ->add('dateOfBirth', null, [
                'widget' => 'single_text',
            ])
            ->add('availability', ChoiceType::class, [
                'label' => 'Disponible',
                'required' => false,
                'choices' => [
                    'Oui' => true,
                    'Non' => false,
                ],
                'expanded' => true, // Cette option va créer des boutons au lieu d'une liste déroulante
                'multiple' => false, // S'assure qu'un seul bouton peut être sélectionné
            ])
            ->add('description', TextType::class, [])
            ->add('notes')
            ->add('dateCreated', null, [
                'widget' => 'single_text',
            ])
            ->add('dateUpdated', null, [
                'widget' => 'single_text',
            ])
            ->add('dateDeleted', null, [
                'widget' => 'single_text',
            ])
            ->add('files')
            ->add('experience', EntityType::class, [
                'class' => Experience::class,
                'choice_label' => 'id',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Candidat::class,
        ]);
    }
}
