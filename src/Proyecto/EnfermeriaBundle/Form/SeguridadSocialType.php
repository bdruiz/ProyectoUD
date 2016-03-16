<?php

namespace Proyecto\EnfermeriaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SeguridadSocialType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('id')
            ->add('eps')
            ->add('rh')
            ->add('telefonoContacto')
            ->add('users')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Proyecto\EnfermeriaBundle\Entity\SeguridadSocial'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'proyecto_enfermeriabundle_seguridadsocial';
    }
}
