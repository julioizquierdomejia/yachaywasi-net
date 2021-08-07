<?php

namespace App\Superbalist\Overrides;

use Superbalist\Flysystem\GoogleStorage\GoogleStorageAdapter;
use League\Flysystem\Config;
use League\Flysystem\AdapterInterface;

class GoogleStorageAdapterOverrided extends GoogleStorageAdapter
{
    /**
     * Returns an array of options from the config.
     *
     * @param Config $config
     *
     * @return array
     */
    protected function getOptionsFromConfig(Config $config)
    {
        $options = [];

        if (empty($this->bucket->info()['iamConfiguration']['uniformBucketLevelAccess']['enabled'])) {
            if ($visibility = $config->get('visibility')) {
                $options['predefinedAcl'] = $this->getPredefinedAclForVisibility($visibility);
            } else {
                $options['predefinedAcl'] = $this->getPredefinedAclForVisibility(AdapterInterface::VISIBILITY_PRIVATE);
            }
        }

        if ($metadata = $config->get('metadata')) {
            $options['metadata'] = $metadata;
        }

        return $options;
    }

}
