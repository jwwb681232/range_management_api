/*
 Navicat Premium Data Transfer

 Source Server         : 127.0.0.1
 Source Server Type    : MySQL
 Source Server Version : 50733
 Source Host           : localhost:3306
 Source Schema         : range_management

 Target Server Type    : MySQL
 Target Server Version : 50733
 File Encoding         : 65001

 Date: 10/01/2022 09:38:37
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for administrator_role
-- ----------------------------
DROP TABLE IF EXISTS `administrator_role`;
CREATE TABLE `administrator_role`  (
  `admin_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`admin_id`, `role_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of administrator_role
-- ----------------------------

-- ----------------------------
-- Table structure for administrators
-- ----------------------------
DROP TABLE IF EXISTS `administrators`;
CREATE TABLE `administrators`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `administrators_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of administrators
-- ----------------------------
INSERT INTO `administrators` VALUES (1, 'administrator', 'administrator@google.com', NULL, '$2y$10$xEojtcEUf3nHQrkSjHbjvuveXPFXpdheseeOciN8jDNoM7Pjx/i/.', NULL, '2021-12-07 14:26:01', '2021-12-07 14:26:01');

-- ----------------------------
-- Table structure for audios
-- ----------------------------
DROP TABLE IF EXISTS `audios`;
CREATE TABLE `audios`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '音频名称',
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '描述',
  `path` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '音频存放地址',
  `size` int(10) UNSIGNED NOT NULL COMMENT '字节',
  `duration` int(10) UNSIGNED NOT NULL COMMENT '时长(秒)',
  `type` tinyint(3) UNSIGNED NOT NULL COMMENT '类型(1:Alarm,2:Explosion)',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of audios
-- ----------------------------
INSERT INTO `audios` VALUES (1, 'Alarm.mp3', '', '/assets/audios/alarm/Alarm.mp3', 1232151, 30, 1, '2021-12-22 13:53:33', '2021-12-22 13:53:33');
INSERT INTO `audios` VALUES (2, 'Alarm Clock Bells.mp3', '', '/assets/audios/alarm/Alarm Clock Bells.mp3', 450896, 11, 1, '2021-12-22 14:06:11', '2021-12-22 14:06:11');
INSERT INTO `audios` VALUES (3, 'Alarm Military.mp3', '', '/assets/audios/alarm/Alarm Military.mp3', 1191790, 29, 1, '2021-12-22 14:06:59', '2021-12-22 14:06:59');
INSERT INTO `audios` VALUES (4, 'Fire Alarm.mp3', '', '/assets/audios/alarm/Fire Alarm.mp3', 1419537, 35, 1, '2021-12-22 14:07:30', '2021-12-22 14:07:30');
INSERT INTO `audios` VALUES (5, 'Fire Alarm Bell.mp3', '', '/assets/audios/alarm/Fire Alarm Bell.mp3', 600803, 14, 1, '2021-12-22 14:08:04', '2021-12-22 14:08:04');
INSERT INTO `audios` VALUES (6, 'Explosion Dynamite.mp3', '', '/assets/audios/explosion/Explosion Dynamite.mp3', 584640, 14, 2, '2021-12-22 14:09:15', '2021-12-22 14:09:15');
INSERT INTO `audios` VALUES (7, 'Explosion Mortar.mp3', '', '/assets/audios/explosion/Explosion Mortar.mp3', 162606, 4, 2, '2021-12-22 14:09:44', '2021-12-22 14:09:44');
INSERT INTO `audios` VALUES (8, 'Explosion Multiple.mp3', '', '/assets/audios/explosion/Explosion Multiple.mp3', 433599, 10, 2, '2021-12-22 14:10:14', '2021-12-22 14:10:14');
INSERT INTO `audios` VALUES (9, 'Explosion Space.mp3', '', '/assets/audios/explosion/Explosion Space.mp3', 226560, 5, 2, '2021-12-22 14:10:45', '2021-12-22 14:10:45');
INSERT INTO `audios` VALUES (10, 'Explosive Boom.mp3', '', '/assets/audios/explosion/Explosive Boom.mp3', 305740, 7, 2, '2021-12-22 14:11:14', '2021-12-22 14:11:14');
INSERT INTO `audios` VALUES (11, 'Grenade Explosion.mp3', '', '/assets/audios/explosion/Grenade Explosion.mp3', 128640, 3, 2, '2021-12-22 14:11:43', '2021-12-22 14:11:43');

-- ----------------------------
-- Table structure for cards
-- ----------------------------
DROP TABLE IF EXISTS `cards`;
CREATE TABLE `cards`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '卡编号',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cards
-- ----------------------------
INSERT INTO `cards` VALUES (1, '20210202155', '2021-12-17 13:30:32', '2021-12-22 03:07:52', NULL);
INSERT INTO `cards` VALUES (2, '20210202156', '2021-12-17 13:43:36', '2021-12-17 13:43:36', NULL);

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for menus
-- ----------------------------
DROP TABLE IF EXISTS `menus`;
CREATE TABLE `menus`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `menus_key_unique`(`key`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of menus
-- ----------------------------
INSERT INTO `menus` VALUES (1, 'dashboard', 'Dashboard', 0, '2021-12-07 15:12:41', '2021-12-07 15:12:41');
INSERT INTO `menus` VALUES (2, 'system', 'System', 0, '2021-12-07 15:13:09', '2021-12-07 15:13:09');
INSERT INTO `menus` VALUES (3, 'menu', 'Menu', 2, '2021-12-07 15:13:31', '2021-12-07 15:13:31');
INSERT INTO `menus` VALUES (4, 'permission', 'Permission', 2, '2021-12-07 15:13:47', '2021-12-07 15:13:47');
INSERT INTO `menus` VALUES (5, 'role', 'Role', 2, '2021-12-07 15:14:01', '2021-12-07 15:14:01');
INSERT INTO `menus` VALUES (6, 'administrator', 'Administrator', 2, '2021-12-07 15:14:34', '2021-12-07 15:14:34');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 28 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (4, '2019_12_14_000001_create_personal_access_tokens_table', 1);
INSERT INTO `migrations` VALUES (6, '2021_12_02_054747_create_administrators_table', 2);
INSERT INTO `migrations` VALUES (7, '2021_12_07_065212_create_menus_table', 3);
INSERT INTO `migrations` VALUES (8, '2021_12_07_065521_create_roles_table', 4);
INSERT INTO `migrations` VALUES (9, '2021_12_07_065730_create_permissions_table', 5);
INSERT INTO `migrations` VALUES (11, '2021_12_07_070149_create_role_permission_table', 6);
INSERT INTO `migrations` VALUES (12, '2021_12_07_070644_create_administrator_role_table', 7);
INSERT INTO `migrations` VALUES (13, '2021_12_15_015219_create_modes_table', 8);
INSERT INTO `migrations` VALUES (14, '2021_12_15_015345_create_user_mode_table', 9);
INSERT INTO `migrations` VALUES (15, '2021_12_15_020111_create_units_table', 10);
INSERT INTO `migrations` VALUES (17, '2021_12_17_013548_add_unit_id_to_users', 11);
INSERT INTO `migrations` VALUES (18, '2021_12_17_013849_create_cards_table', 12);
INSERT INTO `migrations` VALUES (19, '2021_12_17_015246_add_status_to_users', 12);
INSERT INTO `migrations` VALUES (20, '2021_12_17_020126_add_card_id_to_users', 13);
INSERT INTO `migrations` VALUES (21, '2021_12_17_075354_add_status_to_units', 14);
INSERT INTO `migrations` VALUES (22, '2021_12_17_084349_add_soft_delete_to_units', 15);
INSERT INTO `migrations` VALUES (23, '2021_12_17_084546_add_soft_delete_to_cards', 16);
INSERT INTO `migrations` VALUES (24, '2021_12_17_084627_add_soft_delete_to_users', 16);
INSERT INTO `migrations` VALUES (25, '2021_12_22_033201_add_nric_to_users', 17);
INSERT INTO `migrations` VALUES (26, '2021_12_22_052556_create_audios_table', 18);
INSERT INTO `migrations` VALUES (27, '2021_12_22_062928_add_description_to_audios', 19);

-- ----------------------------
-- Table structure for modes
-- ----------------------------
DROP TABLE IF EXISTS `modes`;
CREATE TABLE `modes`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of modes
-- ----------------------------
INSERT INTO `modes` VALUES (1, 'Operational', '2021-12-15 09:55:37', '2021-12-15 09:55:37');
INSERT INTO `modes` VALUES (2, 'Maintenance', '2021-12-15 09:55:37', '2021-12-15 09:55:37');
INSERT INTO `modes` VALUES (3, 'Admin', '2021-12-15 09:55:37', '2021-12-15 09:55:37');

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `menu_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `permission` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of permissions
-- ----------------------------

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `personal_access_tokens_token_unique`(`token`) USING BTREE,
  INDEX `personal_access_tokens_tokenable_type_tokenable_id_index`(`tokenable_type`, `tokenable_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 59 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------
INSERT INTO `personal_access_tokens` VALUES (31, 'App\\Models\\Administrator', 1, 'administrator', '1a99b8ec7dce4c8195bfe6d3b3a651cccc3b73f96b2bf30cd1256767f0338d38', '[\"*\"]', '2021-12-07 07:31:44', '2021-12-07 06:41:24', '2021-12-07 07:31:44');
INSERT INTO `personal_access_tokens` VALUES (58, 'App\\Models\\User', 1, 'wangxiao', 'a2286a0732b10107676df7923638c8a132754d3c28fa5dc4de37b2268bc30252', '[\"Operational\",\"Maintenance\",\"Admin\"]', '2021-12-24 08:45:02', '2021-12-22 08:08:56', '2021-12-24 08:45:02');

-- ----------------------------
-- Table structure for role_permission
-- ----------------------------
DROP TABLE IF EXISTS `role_permission`;
CREATE TABLE `role_permission`  (
  `role_id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`role_id`, `permission_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of role_permission
-- ----------------------------

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '唯一Key',
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '名称',
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '状态（0：禁用，1：启用）',
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '描述',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `roles_key_unique`(`key`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of roles
-- ----------------------------

-- ----------------------------
-- Table structure for units
-- ----------------------------
DROP TABLE IF EXISTS `units`;
CREATE TABLE `units`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '状态(1:正常，0:禁用)',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of units
-- ----------------------------
INSERT INTO `units` VALUES (1, '公安厅', 1, '2021-12-17 10:53:01', '2021-12-17 10:53:01', NULL);
INSERT INTO `units` VALUES (2, '公安局', 1, '2021-12-17 10:53:01', '2021-12-17 10:53:01', NULL);
INSERT INTO `units` VALUES (3, '公安处', 1, '2021-12-17 10:53:01', '2021-12-17 10:53:01', NULL);
INSERT INTO `units` VALUES (4, '公安分局', 1, '2021-12-17 10:53:01', '2021-12-17 10:53:01', NULL);
INSERT INTO `units` VALUES (5, '派出所', 1, '2021-12-17 10:53:01', '2021-12-17 08:54:38', NULL);

-- ----------------------------
-- Table structure for user_mode
-- ----------------------------
DROP TABLE IF EXISTS `user_mode`;
CREATE TABLE `user_mode`  (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `mode_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`user_id`, `mode_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user_mode
-- ----------------------------
INSERT INTO `user_mode` VALUES (1, 1);
INSERT INTO `user_mode` VALUES (1, 2);
INSERT INTO `user_mode` VALUES (1, 3);
INSERT INTO `user_mode` VALUES (5, 1);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nric` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '身份证号',
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `unit_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `card_id` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT '卡id',
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '状态(1:正常，0:禁用)',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'wangxiao', '', 'wx497657341@qq.com', NULL, '$2y$10$kzMDdfFTrAqQK.ca1wgExOX1tKmzARJQnIi40W.cJ4FeKd0zy7UMO', NULL, 2, 1, 1, '2021-12-17 10:50:50', '2021-12-22 03:08:06', NULL);
INSERT INTO `users` VALUES (5, 'muge', '', '1639987982_leffler.zoila@gmail.com', NULL, '$2y$10$QCfpW2WqhW6/TJiiB15XMe/HZUCEAanezjXGpSZuU1Q10DfpbzGlW', NULL, 1, 2, 1, '2021-12-20 08:13:02', '2021-12-22 03:08:06', NULL);

SET FOREIGN_KEY_CHECKS = 1;
