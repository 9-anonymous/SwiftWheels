<?php

namespace App\Form;

use App\Entity\Car;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CarType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('mark', TextType::class)
            ->add('model', TextType::class)
            ->add('price', NumberType::class)
            ->add('description', TextareaType::class)
            ->add('color', TextType::class)
            ->add('mileage', IntegerType::class) // Corrected field name
            ->add('quantity', IntegerType::class)
            ->add('pictures', FileType::class, [ // Corrected field name, mapped to 'pictures' property
                'mapped' => true,
                'required' => false,
            ])
            ->add('abs', CheckboxType::class, [
                'required' => false,
            ])
            ->add('epc', CheckboxType::class, [
                'required' => false,
            ])
            ->add('grayCard', CheckboxType::class, [
                'required' => false,
            ])
            ->add('autoGearBox', CheckboxType::class, [
                'required' => false,
            ])
            ->add('taxes', CheckboxType::class, [
                'required' => false,
            ])
            ->add('insurance', CheckboxType::class, [
                'required' => false,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Car::class,
        ]);
    }
}
