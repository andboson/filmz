<?php

namespace Andboson\FilmzBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class FilmType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('director')
            ->add('poster')
            ->add('description')
            ->add('rating')
            ->add('releaseDate')
            ->add('link')
            ->add('genre')
            ->add('category', null)
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Andboson\FilmzBundle\Entity\Film'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'andboson_filmzbundle_film';
    }
}
