<?php
namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DoodleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('author', 'text', ['required' => false, 'label' => false, 'data' => '', 'attr' => ['placeholder' => 'Author', 'maxlength' => '20']])
            ->add('title', 'text', ['required' => false, 'label' => false, 'data' => '', 'attr' => ['placeholder' => 'Title', 'maxlength' => '15']])
            ->add('data', 'text', ['required' => false, 'label' => false, 'attr' => array('class' => 'hidden')])
            ->add('save', 'submit', ['attr' => array('class' => 'submit-btn')])
        ;
    }

    public function getName()
    {
        return 'title';
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
           'data_class' => 'AppBundle\Entity\Doodle',
        ));
    }
}

