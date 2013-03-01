<?php

namespace Muzej\SurveyBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SurveyType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {

   
        $choices = array('zunanjost' => array('kapela' => 'Grajska kapela',
                'zbirka4145' => 'Zbirka 1941-1945',
                'mastodont' => 'Mastodont',
                'rondelaS' => 'Rondela spodaj',
                'rondelaZ' => 'Rondela zgoraj',
            ),
            'klet' => array(
                'depo1' => 'Depo1 na gradu',
                'depo2' => 'Depo2 na gradu'),
            'pritličje' => array('strazarnica' => 'Stražarnica',
                'foit1' => 'Foitova zbirka 1',
                'foit2' => 'Foitova zbirka 2',
                'foit3' => 'Foitova zbirka 3',
                'foit4' => 'Foitova zbirka 4',
                'trgovina' => 'Trgovina',
                'gostilna' => 'Gostilna',
                'prehodne1' => 'Prehodne razstave 1',
                'prehodne2' => 'Prehodne razstave 2',
            ),
            'prvo nadstopje' => array('županova1' => 'Županova soba 1',
                'županova2' => 'Županova soba 2',
                'nastajanjeV1' => 'Nastanjanje Velenja 1',
                'nastajanjeV2' => 'Nastanjanje Velenja 2',
                'nastajanjeV3' => 'Nastanjanje Velenja 3',
            ),
            'drugo nadstopje' => array('romanika1' => 'Romanika 1 - vitrina',
                'romanika2' => 'Romanika 2 - freska',
                'romanika3' => 'Romanika 3',
                'učilnica' => 'Učilnica',
            ),
            'podstrešje' => array('arhiv' => 'Arhiv podstrešje')
        );


        $builder->add('name', 'choice', array('choices' => $choices,
            'attr' => array('class' => 'span2 chzn-select'),
            'data' => 'trgovina',
        ));

        /*

          $builder->add('name', 'text');
         */
        $builder->add('date', 'date', array(
                    //  'input'  => 'timestamp',
                    'widget' => 'single_text',
                    //  'format' => 'dd-MM-yyyy',
                    'attr' => array('class' => 'date datepicker'),
                    'data' => new \DateTime('today'),
                ))
                ->add('time', 'time', array(
                    'widget' => 'choice',
                    'label' => 'Čas začetka:',
                    'hours' => range(10, 18),
                    'data' => new \DateTime('now')
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
                ->add('note', 'textarea', array('required' => false,
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
