<?php

namespace Andboson\RateBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class RateType extends AbstractType
{
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'choices' => array(
                '1' => '1',
                '2' => '2',
                '3' => '3',
                '4' => '4',
                '5' => '5',
            ),
            'expanded' => true
        ));
    }

    public function getParent()
    {
        return 'choice';
    }

    public function getName()
    {
        return 'rate';
    }
}