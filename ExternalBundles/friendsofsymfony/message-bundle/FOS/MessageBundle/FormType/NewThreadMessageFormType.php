<?php

namespace FOS\MessageBundle\FormType;

use FOS\MessageBundle\Util\LegacyFormHelper;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Message form type for starting a new conversation.
 *
 * @author Thibault Duplessis <thibault.duplessis@gmail.com>
 */
class NewThreadMessageFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('recipient', LegacyFormHelper::getType('FOS\UserBundle\Form\Type\UsernameFormType'), array(
                'label' => 'recipient',
                'translation_domain' => 'FOSMessageBundle',
                'attr' => array('class' => 'input1'),
            ))
            ->add('subject', LegacyFormHelper::getType('Symfony\Component\Form\Extension\Core\Type\TextType'), array(
                'label' => 'subject',

                'translation_domain' => 'FOSMessageBundle',
                'attr' => array('class' => 'input1'),

            ))
            ->add('body', LegacyFormHelper::getType('Symfony\Component\Form\Extension\Core\Type\TextareaType'), array(
                'label' => 'body',
                'translation_domain' => 'FOSMessageBundle',
                'attr' => array('class' => 'input1','type'=>'textarea'),
            ))->add('valider',submitType::class , array(
                'label' => 'send',
                'attr' => array('class' => 'contact1-form-btn')

            ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'intention' => 'message',
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'fos_message_new_thread';
    }

    /**
     * @deprecated To remove when supporting only Symfony 3
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $this->configureOptions($resolver);
    }

    /**
     * @deprecated To remove when supporting only Symfony 3
     */
    public function getName()
    {
        return $this->getBlockPrefix();
    }
}
