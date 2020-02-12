<?php

namespace EventBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ContratType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('numcontrat')
            ->add('sponsor',EntityType::class,
            ['class'=> 'EventBundle\Entity\Sponsor',
                'choice_label' =>'nomsponsor',//il va afficher tout les noms qui existe dans club (on peut chousir n'import quelle attribut)
                'multiple' =>false,//on peut choisir qu'un seul nom
                'expanded'=>false,


            ]);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'EventBundle\Entity\Contrat'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'eventbundle_contrat';
    }


}
