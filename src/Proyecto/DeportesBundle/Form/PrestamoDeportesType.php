<?php

namespace Proyecto\DeportesBundle\Form;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PrestamoDeportesType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('ideportes', 'entity', array(
                'class' => 'DeportesBundle:InventarioDeportes',
                'choice_label' => 'id',
                'placeholder' => 'seleccione un elemento del inventario'
            ))
            //->add('fechaEntrega')
            //->add('fechaDevolucion')
            ->add('users')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Proyecto\DeportesBundle\Entity\PrestamoDeportes'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'proyecto_deportesbundle_prestamodeportes';
    }
}
