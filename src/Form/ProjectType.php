<?php

namespace App\Form;

use App\Entity\Project;
use App\Entity\Team;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProjectType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('description')
            ->add('parentProject')
            ->add('team', EntityType::class, [
                'class' => Team::class,
                //display only those teams in which I participate
                'choices' => $options['teamRepository']->findMyTeams($options['userId']),
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Project::class,
            'teamRepository' => null,
            'userId' => null,
        ]);
    }
}
