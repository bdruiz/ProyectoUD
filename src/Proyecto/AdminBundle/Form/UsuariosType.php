<?php

namespace Proyecto\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UsuariosType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('id')
            ->add('username')
            ->add('idCarnet')
            ->add('nombres')
            ->add('apellidos')
            ->add('password')
            //->add('salt')
            ->add('email')
            ->add('estado')
            ->add('foto', 'file', array(
                'data_class' => null
            ))
            ->add('isActive')
            ->add('roles')
            ->add('dependencia')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Proyecto\AdminBundle\Entity\Usuarios'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'proyecto_adminbundle_usuarios';
    }
}
