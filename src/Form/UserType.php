<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;
<<<<<<< HEAD

=======
>>>>>>> 222e8e987b46904d76e3cca0323614f01c28a621
class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email')
            /*->add('roles')*/
            ->add('imageFile', VichImageType::class, array(
                'required' => false,
                'allow_delete' => true, // not mandatory, default is true
                'download_link' => true, // not mandatory, default is true
                ))
            ->add('name')
            ->add('surname')
            ->add('dateDeNaissance')

            ->add('password')
            ->add('adherent')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
