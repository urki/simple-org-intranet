<?php

namespace Muzej\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class RegisterFormType extends AbstractType {

    public function buildForm(\Symfony\Component\Form\FormBuilderInterface $builder, array $options) {
        $builder->add('username', 'text')
        ->add('email', 'email')
        ->add('plainPassword', 'repeated', array(
        'type' => 'password'
        ));
    }
    public function setDefaultOptions(\Symfony\Component\OptionsResolver\OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class'=>'Muzej\UserBundle\Entity\User'
        ));
    }
 
    public function getName() {
        return 'user_register';
    }

}