<?php

namespace Muzej\SurveyBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SurveyType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('name', 'choice', array(
                    'choices' => array('klet'=>array('depo1'=>'Depo1 na gradu','depo2'=>'Depo2 na gradu'), 'pritličje'=>array('trgovina' => 'Trgovina', 'gostilna' => 'Gostilna','strazarnica'=>'Stražarnica','foit1'=>'Foitova zbirka 1','foit2'=>'Foitova zbirka 2','foit3'=>'Foitova zbirka 3'),'prvo nadstopje'=>array()),
                    'attr' => array('class' => 'span2 chzn-select')
                ))  
                 ->add('date', 'date', array(
                //  'input'  => 'timestamp',
                    'widget' => 'single_text',
                //  'format' => 'dd-MM-yyyy',
                    'attr' => array('class' => 'date datepicker'),
                    'data'=> new \DateTime('today'),
                ))
                ->add('time', 'time', array(
                 
                    'widget' => 'choice',
                    'label' => 'Čas začetka:',
                    'hours' => range(10, 18),
                    'data'=> new \DateTime('now')
                    ))
                 
                ->add('temperature', 'integer', array('attr' => array(
                        'class' => 'span2',
                        'placeholder' => 'stopinj',
                        'prepend_input' => 'Stopinj'
                        )))
                ->add('moisture', 'integer', array('attr' => array(
                        'class' => 'span2',
                        'placeholder' => 'procentov vlažnosti',
                        'prepend_input' => '0'
                        )))
                ->add('note', 'textarea', array('required'    => false,
                    'attr' => array('rows' => 3,
                        'placeholder' => 'Morebitne opombe',          
                        'help_inline' => 'Woohoo!',
                        'control_group_class' => 'success')))
                    
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Muzej\SurveyBundle\Entity\Survey'
        ));
    }

    public function getName() {
        return 'muzej_surveybundle_surveytype';
    }

}
