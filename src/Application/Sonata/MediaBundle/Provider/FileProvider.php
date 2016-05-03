<?php
/**
 * Created by PhpStorm.
 * User: htan
 * Date: 9/10/14
 * Time: 3:58 PM
 */

namespace Application\Sonata\MediaBundle\Provider;

use Symfony\Component\Form\FormBuilder;

/**
 * Class FileProvider
 * @package Application\Sonata\MediaBundle\Provider
 */
class FileProvider extends \Sonata\MediaBundle\Provider\FileProvider
{
    /**
     * {@inheritdoc}
     */
    public function buildMediaType(FormBuilder $formBuilder)
    {
        $formBuilder->add('binaryContent', 'file', array('label' => false));
    }
}