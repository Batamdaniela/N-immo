<?php

namespace App\Form;

use App\Entity\Article;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('description')
            ->add('cout')
            ->add('periodicite')
            ->add('quartier')
            ->add('ville')
            ->add('pays')
            ->add('disponible')
            ->add('latitude')
            ->add('longitude')
            ->add('date')
            ->add('vente')
            ->add('utilisateur')
            ->add('proprietaire')
            ->add('categorie')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}
