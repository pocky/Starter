<?php
/*
 * This file is part of the ${FILE_HEADER_PACKAGE}.
 *
 * ${FILE_HEADER_COPYRIGHT}
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Application\Website\Serializer\Normalizer;

use Black\Website\Application\DTO\WebsiteDTO;
use Domain\Entity\Website;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Normalizer\SerializerAwareNormalizer;

/**
 * Class WebsiteNormalizer
 */
class WebsiteNormalizer extends SerializerAwareNormalizer implements NormalizerInterface
{
    /**
     * @param Website $website
     * @param null $format
     * @param array $context
     * @return WebsiteDTO
     */
    public function normalize($website, $format = null, array $context = array())
    {
        $dto = new WebsiteDTO(
            $website->getWebsiteId()->getValue(),
            $website->getName(),
            $website->getDescription(),
            $website->getAuthor()->getValue()
        );

        return [
            'id' => $dto->getId(),
            "name" => $dto->getName(),
            "description" => $dto->getName(),
            "author" => $dto->getAuthor(),
        ];
    }

    /**
     * @param mixed $data
     * @param null $format
     * @return bool
     */
    public function supportsNormalization($data, $format = null)
    {
        return $data instanceOf Website;
    }
}
