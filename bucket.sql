-- ////////// ADMIN //////////

-- 1, create the admin bucket.
INSERT INTO `oc_external_mounts` (`mount_point`,`storage_backend`,`auth_backend`,`priority`, `type`) VALUES('/BucketName', 'amazons3', 'null::null', 100, 1);
-- 2, get the mount_id

-- 3, create the bucket config
INSERT INTO `oc_external_options` (`mount_id`,`key`,`value`) VALUES(1, 'encrypt', 'true'), (1, 'previews', 'true'), (1, 'enable_sharing', 'true'),(1, 'filesystem_check_changes', '1'),(1, 'encoding_compatibility', 'false'),(1, 'readonly', 'false');
INSERT INTO `oc_external_config` (`mount_id`,`key`,`value`) VALUES(1, 'bucket', ''),(1, 'hostname', ''),(1, 'port', ''),(1, 'region', 'ap-southeast-2'),(1, 'storageClass', ''),(1, 'use_ssl', '1'),(1, 'use_path_style', ''),(1, 'legacy_auth', ''),(1, 'name', 'bucket 1');
INSERT INTO `oc_external_applicable` (`mount_id`,`type`,`value`) VALUES (1, 2, 'SAML_az.right.aws.sandbox-cloud-platform.admin')



-- ////////// READ ONLY //////////

-- 1, create the readonly bucket.
INSERT INTO `oc_external_mounts` (`mount_point`,`storage_backend`,`auth_backend`,`priority`, `type`) VALUES('/BucketName', 'amazons3', 'null::null', 100, 1);
-- 2, get the mount_id

-- 3, create the bucket config
INSERT INTO `oc_external_options` (`mount_id`,`key`,`value`) VALUES(1, 'encrypt', 'true'), (1, 'previews', 'true'), (1, 'enable_sharing', 'false'),(1, 'filesystem_check_changes', '1'),(1, 'encoding_compatibility', 'false'),(1, 'readonly', 'true');
INSERT INTO `oc_external_config` (`mount_id`,`key`,`value`) VALUES(1, 'bucket', ''),(1, 'hostname', ''),(1, 'port', ''),(1, 'region', 'ap-southeast-2'),(1, 'storageClass', ''),(1, 'use_ssl', '1'),(1, 'use_path_style', ''),(1, 'legacy_auth', ''),(1, 'name', 'bucket 1');
INSERT INTO `oc_external_applicable` (`mount_id`,`type`,`value`) VALUES (1, 2, 'SAML_az.right.aws.sandbox-cloud-platform.readonly')



-- ////////// DEVELOPER //////////

-- 1, create the developer bucket.
INSERT INTO `oc_external_mounts` (`mount_point`,`storage_backend`,`auth_backend`,`priority`, `type`) VALUES('/BucketName', 'amazons3', 'null::null', 100, 1);
-- 2, get the mount_id

-- 3, create the bucket config
INSERT INTO `oc_external_options` (`mount_id`,`key`,`value`) VALUES(1, 'encrypt', 'true'), (1, 'previews', 'true'), (1, 'enable_sharing', 'false'),(1, 'filesystem_check_changes', '1'),(1, 'encoding_compatibility', 'false'),(1, 'readonly', 'false');
INSERT INTO `oc_external_config` (`mount_id`,`key`,`value`) VALUES(1, 'bucket', ''),(1, 'hostname', ''),(1, 'port', ''),(1, 'region', 'ap-southeast-2'),(1, 'storageClass', ''),(1, 'use_ssl', '1'),(1, 'use_path_style', ''),(1, 'legacy_auth', ''),(1, 'name', 'bucket 1');
INSERT INTO `oc_external_applicable` (`mount_id`,`type`,`value`) VALUES (1, 2, 'SAML_az.right.aws.sandbox-cloud-platform.developer')