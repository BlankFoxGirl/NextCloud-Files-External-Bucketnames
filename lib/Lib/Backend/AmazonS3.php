<?php

/**
 * @copyright Copyright (c) 2016, ownCloud, Inc.
 *
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Robin Appelman <robin@icewind.nl>
 * @author Robin McCorkell <robin@mccorkell.me.uk>
 * @author Roeland Jago Douma <roeland@famdouma.nl>
 *
 * @license AGPL-3.0
 *
 * This code is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License, version 3,
 * as published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License, version 3,
 * along with this program. If not, see <http://www.gnu.org/licenses/>
 *
 */

namespace OCA\Files_External1\Lib\Backend;

use OCA\Files_External1\Lib\Auth\AmazonS3\AccessKey;
use OCA\Files_External1\Lib\Auth\AuthMechanism;
use OCA\Files_External1\Lib\DefinitionParameter;
use OCA\Files_External1\Lib\LegacyDependencyCheckPolyfill;
use OCP\IL10N;

class AmazonS3 extends Backend
{
    use LegacyDependencyCheckPolyfill;

    public function __construct(IL10N $l, AccessKey $legacyAuth)
    {
        $this
            ->setIdentifier('amazons3')
            ->addIdentifierAlias('\OC\Files\Storage\AmazonS3') // legacy compat
            ->setStorageClass('\OCA\Files_External1\Lib\Storage\AmazonS3')
            ->setText($l->t('Amazon S3'))
            ->addParameters([
                new DefinitionParameter('bucket', $l->t('Bucket')),
                (new DefinitionParameter('name', $l->t('Name')))
                    ->setFlag(DefinitionParameter::FLAG_OPTIONAL),
                (new DefinitionParameter('acl', $l->t('Acl')))
                    ->setFlag(DefinitionParameter::FLAG_OPTIONAL)
                    ->setType(DefinitionParameter::VALUE_SELECT)
                    ->setOptions([
                        ''                          => $l->t('None'),
                        'private'                   => $l->t('Private'),
                        'public-read'               => $l->t('Public Read'),
                        'public-read-write'         => $l->t('Public Read/Write'),
                        'authenticated-read'        => $l->t('Authenticated Read'),
                        'bucket-owner-read'         => $l->t('Bucket Owner Read'),
                        'bucket-owner-full-control' => $l->t('Bucket Owner Full Control'),
                    ]),
                (new DefinitionParameter('hostname', $l->t('Hostname')))
                    ->setFlag(DefinitionParameter::FLAG_OPTIONAL),
                (new DefinitionParameter('port', $l->t('Port')))
                    ->setFlag(DefinitionParameter::FLAG_OPTIONAL),
                (new DefinitionParameter('region', $l->t('Region')))
                    ->setFlag(DefinitionParameter::FLAG_OPTIONAL),
                (new DefinitionParameter('storageClass', $l->t('Storage Class')))
                    ->setFlag(DefinitionParameter::FLAG_OPTIONAL),
                (new DefinitionParameter('use_ssl', $l->t('Enable SSL')))
                    ->setType(DefinitionParameter::VALUE_BOOLEAN)
                    ->setDefaultValue(true),
                (new DefinitionParameter('use_path_style', $l->t('Enable Path Style')))
                    ->setType(DefinitionParameter::VALUE_BOOLEAN),
                (new DefinitionParameter('legacy_auth', $l->t('Legacy (v2) authentication')))
                    ->setType(DefinitionParameter::VALUE_BOOLEAN),
            ])
            ->addAuthScheme(AccessKey::SCHEME_AMAZONS3_ACCESSKEY)
            ->addAuthScheme(AuthMechanism::SCHEME_NULL)
            ->setLegacyAuthMechanism($legacyAuth);
    }
}
