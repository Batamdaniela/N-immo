<?php

namespace App\Form;

use App\Entity\Dossier;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DossierType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('quartiers')
            ->add('villes')
            ->add('pays')
            ->add('montant')
            ->add('montant_min')
            ->add('montant_max')
            ->add('cout')
            ->add('etat')
            ->add('date_expiration')
            ->add('date_creation')
            ->add('date_paiement')
            ->add('utilisateur')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Dossier::class,
        ]);
    }
}
