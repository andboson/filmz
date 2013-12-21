<?php

namespace Andboson\FilmzBundle\Form;

use Andboson\FilmzBundle\Form\RateType;
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
            ->add('authorName', null,array('attr'=>array('placeholder'=>'Имя')))
            ->add('authorEmail', null,array('attr'=>array('placeholder'=>'Email')))
            ->add('message', null,array('attr'=>array('placeholder'=>'Комментарий')))
            ->add('rate',  'rate')
            ->add('film', null,array('attr'=>array('style'=>'display:none;')))
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

    public function configure()
    {
        // Let's add a helper to one of our fields so that we can see it in our decorator
        $this->widgetSchema->setHelp('rate', 'Your contact email address');
        $this->widgetSchema->setOption('form_formatter', 'list2');
    }
}
