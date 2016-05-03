<?php
/**
 * This file is part of the <orientation> project.
 *
 * (c) <Hao TAN> <h.tan@kreactive.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Application\Sonata\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * Class ApplicationSonataUserBundle
 * @package Application\Sonata\UserBundle
 */
class ApplicationSonataUserBundle extends Bundle
{
    /**
     * {@inheritdoc}
     */
    public function getParent()
    {
        return 'SonataUserBundle';
    }
}