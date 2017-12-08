<?php

namespace AppBundle\Form;

use AppBundle\Helper\ChoiceHelper;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ThreatType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('threat', TextareaType::class)
            ->add('vulnerability', TextareaType::class)
            ->add('likelihood', ChoiceType::class, [
                'choices' => ChoiceHelper::getPercentChoices()
            ])
            ->add('value', ChoiceType::class, [
                'choices' => ChoiceHelper::getZeroToHundredChoices()
            ])
            ->add('mitigation', ChoiceType::class, [
                'choices' => ChoiceHelper::getPercentChoices()
            ])
            ->add('uncertainty', ChoiceType::class, [
                'choices' => ChoiceHelper::getPercentChoices()
            ]);
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Threat'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_threat';
    }


}
