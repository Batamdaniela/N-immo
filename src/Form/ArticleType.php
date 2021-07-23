<?php

namespace App\Form;

use App\Entity\Article;
use App\Entity\Caracteristique;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\ChoiceList\ChoiceList;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Choice;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('description')
            ->add('cout')
            ->add('periodicite', ChoiceType::class,[
                'choices' => [
                    'Jour' => 1,
                    'Mois' => 2,
                    'An' => 3
                ]
            ])
            ->add('quartier')
            ->add('ville', ChoiceType::class,[
                'choices' => [
                    'Douala' => 1,
                    'Yaounde' => 2,
                    'Kribi' => 3
                ]
            ])
            ->add('pays', ChoiceType::class, [
                'choices' => [
                    'Cameroun' => 1
                ]
            ])
            ->add('disponible')
            ->add('latitude')
            ->add('longitude')
            //->add('date')
            ->add('vente')
            ->add('utilisateur')
            ->add('proprietaire')
            ->add('categorie')
            ->add('photo', FileType::class, [
                'required' => false
            ])
          /*   ->add('caracteristique', CollectionType::class, [
                'entry_type' => Caracteristique::class,
                'allow_add' => true,
                'allow_delete' => true,
            ]) */
/*             ->add('caracteristique', ChoiceType::class, [
                'choices' => [
                    'Balcon' => 1
                ] 
            ]) */
/*          ->add('caracteristique', Caracteristique::class, [
                'nom' => Caracteristique::class,
                'choice_label' => function($caracteristique) {
                    return $caracteristique->getDisplayName();
                }
            ]) */
        ;
    }


    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}
