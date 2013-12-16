<?php

namespace Andboson\FilmzBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CommentsType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('authorName')
            ->add('authorEmail')
            ->add('message')
            ->add('rate')
            ->add('film')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Andboson\FilmzBundle\Entity\Comments'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'andboson_filmzbundle_comments';
    }
}
