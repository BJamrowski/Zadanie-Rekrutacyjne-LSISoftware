<?php

namespace App\Form;

use App\Entity\Eksport;
use App\Repository\EksportRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Date;

class EksportType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('lokal', EntityType::class, [
                'class' => 'App\Entity\Eksport',
                'query_builder' => function (EksportRepository $er) {
                    return $er->createQueryBuilder('e')
                        ->orderBy('e.lokal', 'ASC');
                },
                'choice_label' => 'lokal',
            ])
            ->add('dataOd', DateType::class, [
                'widget' => 'single_text',
                'placeholder' => 'Data Od'
            ])
            ->add('dataDo', DateType::class, [
                'widget' => 'single_text',
                'placeholder' => 'Data Do'
            ])
            ->add('submit',SubmitType::class, [
                'label' => 'Zatwierdź',
                'attr'=>['class' => 'btn btn-primary m-1 ml-0']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {

    }
}
