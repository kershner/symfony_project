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
            ->add('author', 'text', ['required' => false, 'label' => false, 'data' => '', 'attr' => ['placeholder' => 'Author']])
            ->add('title', 'text', ['required' => false, 'label' => false, 'data' => '', 'attr' => ['placeholder' => 'Title']])
            ->add('data', 'text', ['required' => false, 'label' => false, 'attr' => array('class' => 'hidden')])
            ->add('save', 'submit')
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

