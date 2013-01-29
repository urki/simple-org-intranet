<?php

namespace Muzej\SurveyBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SurveyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('time')
            ->add('temperature')
            ->add('moisture')
            ->add('note')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Muzej\SurveyBundle\Entity\Survey'
        ));
    }

    public function getName()
    {
        return 'muzej_surveybundle_surveytype';
    }
}
