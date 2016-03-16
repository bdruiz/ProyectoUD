<?php

namespace Proyecto\DeportesBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class InventarioDeportesType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('id')
            //->add('fecha')
            ->add('estado', 'choice', array(
                  'choices' => array(
                      'OK' => 'OK',
                      'Agotado' => 'Agotado'
                  )
            ))
            ->add('cantidad')
            ->add('elemendepor','entity', array(
                  'class' => 'DeportesBundle:ElementosDeportes',
                  'choice_label' => 'nombre',
                  'placeholder' => 'seleccione un elemento',
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Proyecto\DeportesBundle\Entity\InventarioDeportes'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'proyecto_deportesbundle_inventariodeportes';
    }
}
