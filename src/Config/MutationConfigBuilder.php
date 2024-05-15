<?php

namespace Softonic\GraphQL\Config;

class MutationConfigBuilder
{
    const CHILDREN_PROPERTY_NAME = 'children';

    public function build(array $config): array
    {
        $mutationConfig = [];
        foreach ($config as $variable => $typeConfig) {
            $mutationConfig[$variable] = $this->buildMutationTypeConfig($typeConfig);
        }

        return $mutationConfig;
    }

    private function buildMutationTypeConfig(array $typeConfig): MutationTypeConfig
    {
        $mutationTypeConfig = new MutationTypeConfig();

        foreach ($typeConfig as $propertyName => $propertyValue) {
            $this->setMutationTypeConfig($mutationTypeConfig, $propertyName, $propertyValue);
        }

        return $mutationTypeConfig;
    }

    private function setMutationTypeConfig(
        MutationTypeConfig $mutationTypeConfig,
        string $propertyName,
        $propertyValue
    ): void {
        if ($propertyName === self::CHILDREN_PROPERTY_NAME) {
            foreach ($propertyValue as $childName => $childConfig) {
                $mutationTypeConfig->children[$childName] = $this->buildMutationTypeConfig($childConfig);
            }
        } else {
            $mutationTypeConfig->{$propertyName} = $propertyValue;
        }
    }
}
