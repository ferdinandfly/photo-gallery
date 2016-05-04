<?php
/**
 * This file is part of the <orientation> project.
 *
 * (c) <Hao TAN> <ferdinandfly@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * File name:  MediaController.php
 * PHP version 5
 *
 * @category Product
 * @package  Application\Sonata\MediaBundle\Controller
 * @author   Hao TAN <ferdinandfly@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://sfere.com
 */

namespace Application\Sonata\MediaBundle\Controller;

use Sonata\MediaBundle\Controller\MediaAdminController as BaseController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class MediaAdminController  extends BaseController
{
    /**
     * Render JSON.
     *
     * @param mixed   $data
     * @param int     $status
     * @param array   $headers
     * @param Request $request
     *
     * @return Response with json encoded data
     */
    protected function renderJson($data, $status = 200, $headers = array(), Request $request = null)
    {
        return new JsonResponse($data, $status, $headers);
    }

}