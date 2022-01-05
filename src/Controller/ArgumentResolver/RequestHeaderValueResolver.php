<?php

namespace Jungi\FrameworkExtraBundle\Controller\ArgumentResolver;

use Jungi\FrameworkExtraBundle\Attribute\RequestHeader;
use Symfony\Component\HttpFoundation\Request;

/**
 * @author Piotr Kugla <piku235@gmail.com>
 */
final class RequestHeaderValueResolver extends AbstractNamedValueArgumentValueResolver
{
    protected static $attributeClass = RequestHeader::class;

    protected function getArgumentValue(NamedValueArgument $argument, Request $request)
    {
        if ('array' === $argument->getType()) {
            return $request->headers->all($argument->getName());
        }

        return $request->headers->get($argument->getName());
    }
}
