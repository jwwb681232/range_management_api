ALTER TABLE `range_management`.`scenarios` CHANGE COLUMN `rts_script_id` `rts_script_index` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '关联rts_scripts表index';
ALTER TABLE `range_management`.`rts_script_door` CHANGE COLUMN `rts_script_id` `rts_script_index` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '关联rts_scripts表index';
ALTER TABLE `range_management`.`rts_script_camera` CHANGE COLUMN `rts_script_id` `rts_script_index` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '关联rts_scripts表index';
ALTER TABLE `range_management`.`training` CHANGE COLUMN `rts_script_id` `rts_script_index` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '关联rts_scripts表index';
ALTER TABLE `range_management`.`rts_scripts` MODIFY COLUMN `index` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '脚本index';
