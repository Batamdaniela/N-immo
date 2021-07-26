<?php

namespace App\Form;

use App\Entity\OptionArticle;
use Symfony\Component\Form\AbstractType;
// use Symfony\Component\Form\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OptionArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('valeur')
            ->add('caracteristique');
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => OptionArticle::class,
        ]);
    }
}
