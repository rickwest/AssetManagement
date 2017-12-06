<?php

namespace AppBundle\Form;

use AppBundle\Helper\ChoiceHelper;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AssetType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('shortCode', TextType::class)
            ->add('name', TextType::class)
            ->add('make', TextType::class)
            ->add('model', TextType::class)
            ->add('serial', TextType::class)
            ->add('location', ChoiceType::class, [
                'choices' => ChoiceHelper::getLocationChoices()
            ])
            ->add('category', ChoiceType::class, [
                'choices' => ChoiceHelper::getCategoryChoices()
            ])
            ->add('classification', ChoiceType::class, [
                'choices' => ChoiceHelper::getClassificationChoices()
            ])
            ->add('specification', TextareaType::class)
            ->add('notes', TextareaType::class)
            ->add('impactRevenue', NumberType::class)
            ->add('impactProfitability', NumberType::class)
            ->add('impactImage', NumberType::class)
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Asset'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_asset';
    }


}
