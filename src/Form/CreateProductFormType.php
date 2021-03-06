<?php

namespace App\Form;

use App\Entity\Product;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CreateProductFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class,[
                'attr'=> ['class'=> 'form-control',"placeholder"=>"Titre de l'annonce"],
                'label' => false,
                'required' => true,
            ])
            ->add('description',TextareaType::class,[
                'attr' =>['class'=> 'form-control w-100',"placeholder"=>"Description précise et complète de l'annonce et des conditions de vente", "cols"=>"30", "rows"=>"10"],
                'label' => false,
                'required' => true,])
            ->add('price',IntegerType::class,[
                'attr'=> ['class'=> 'form-control',"placeholder"=>"Prix"],
                'label' => false,
                'required' => true,])
            ->add('category',ChoiceType::class,[
                'choices' => [
                    'IMMOBILIER' => 'IMMOBILIER',
                    'MEUBLE' => 'MEUBLE' ,
                    'VEHICULE' => 'VEHICULE' ,
                    'LOISIR' => 'LOISIR' ,
                    'MULTIMEDIA' => 'MULTIMEDIA' ,
                    'MATERIEL' => 'MATERIEL' ,
                ],
                'attr'=> ['class'=> 'form-control',"placeholder"=>"Catégorie votre produit"],
                'label' => false,
                'required' => true,])
            ->add('state',ChoiceType::class,[
                'choices' => [
                    'neuf' => 'neuf',
                    'bon état' => 'bon état' ,
                    'mauvais état' => 'mauvais état',
                    "Mais c'etait sur" => "Mais c'etait sur",
                    'label' => false,
                ],
                'attr'=> ['class'=> 'form-control',"placeholder"=>"Etat de votre produit"],
                'label' => false,
                'required' => true,])
            ->add('productImages',CollectionType::class,[
                'entry_type' =>ImportImageProductFormType::class,
                'allow_add' => true,
                'allow_delete' => true,
                'prototype' => true,
                'by_reference' => false,
                'label' => false,

            ])
            ->add('submit',SubmitType::class,[
                'attr'=> ['class'=> 'btn amado-btn w-100'],
                    'label'=> "Publier"
                    ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
        ]);
    }
}
