<?php

namespace Jungi\FrameworkExtraBundle\Controller\ArgumentResolver;

use Jungi\FrameworkExtraBundle\Annotation\RequestBodyParam;
use Jungi\FrameworkExtraBundle\Converter\ConverterInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * @author Piotr Kugla <piku235@gmail.com>
 */
final class RequestBodyParamValueResolver extends AbstractRequestFieldValueResolver
{
    public function __construct(ConverterInterface $converter)
    {
        parent::__construct(RequestBodyParam::class, $converter);
    }

    public function getFieldValue(Request $request, string $name, ?string $type)
    {
        if ($this !== $result = $request->files->get($name, $this)) {
            return $result;
        }

        return $request->request->get($name);
    }
}
