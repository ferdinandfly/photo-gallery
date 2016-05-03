<?php
/*
 * This file is part of the Sonata project.
 *
 * (c) Thomas Rabaix <thomas.rabaix@sonata-project.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Application\Sonata\MediaBundle\Provider;

use Symfony\Component\Form\FormBuilder;

/**
 * Class ImageProvider
 * @package Application\Sonata\MediaBundle\Provider
 */
class ImageProvider extends \Sonata\MediaBundle\Provider\ImageProvider
{
    /**
     * {@inheritdoc}
     */
    public function buildMediaType(FormBuilder $formBuilder)
    {
        $formBuilder->add('binaryContent', 'file', array('label' => false));
    }
}
