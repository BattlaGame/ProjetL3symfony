<?php

namespace App\Form;

use App\Entity\Poste;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class PosteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('namePoste', ChoiceType::class,[
                'choices' => [
                    'Libero' => 'Libero',
                    'Passeur' => 'Passeur',
                    'Récep./Attaque' => 'Récep./Attaque',
                    'Pointu' => 'Pointu',
                    'Central' => 'Central',
                    'Coach' => 'Coach',
                ]])

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Poste::class,
        ]);
    }
}
