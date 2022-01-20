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

 Date: 20/01/2022 17:10:42
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
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of audios
-- ----------------------------
INSERT INTO `audios` VALUES (1, 'Alarm.mp3', '', '/assets/audios/alarm/Alarm.mp3', 1232151, 30, 1, '2021-12-22 13:53:33', '2021-12-22 13:53:33', NULL);
INSERT INTO `audios` VALUES (2, 'Alarm Clock Bells.mp3', '', '/assets/audios/alarm/Alarm Clock Bells.mp3', 450896, 11, 1, '2021-12-22 14:06:11', '2021-12-22 14:06:11', NULL);
INSERT INTO `audios` VALUES (3, 'Alarm Military.mp3', '', '/assets/audios/alarm/Alarm Military.mp3', 1191790, 29, 1, '2021-12-22 14:06:59', '2021-12-22 14:06:59', NULL);
INSERT INTO `audios` VALUES (4, 'Fire Alarm.mp3', '', '/assets/audios/alarm/Fire Alarm.mp3', 1419537, 35, 1, '2021-12-22 14:07:30', '2021-12-22 14:07:30', NULL);
INSERT INTO `audios` VALUES (5, 'Fire Alarm Bell.mp3', '', '/assets/audios/alarm/Fire Alarm Bell.mp3', 600803, 14, 1, '2021-12-22 14:08:04', '2021-12-22 14:08:04', NULL);
INSERT INTO `audios` VALUES (6, 'Explosion Dynamite.mp3', '', '/assets/audios/explosion/Explosion Dynamite.mp3', 584640, 14, 2, '2021-12-22 14:09:15', '2021-12-22 14:09:15', NULL);
INSERT INTO `audios` VALUES (7, 'Explosion Mortar.mp3', '', '/assets/audios/explosion/Explosion Mortar.mp3', 162606, 4, 2, '2021-12-22 14:09:44', '2021-12-22 14:09:44', NULL);
INSERT INTO `audios` VALUES (8, 'Explosion Multiple.mp3', '', '/assets/audios/explosion/Explosion Multiple.mp3', 433599, 10, 2, '2021-12-22 14:10:14', '2021-12-22 14:10:14', NULL);
INSERT INTO `audios` VALUES (9, 'Explosion Space.mp3', '', '/assets/audios/explosion/Explosion Space.mp3', 226560, 5, 2, '2021-12-22 14:10:45', '2021-12-22 14:10:45', NULL);
INSERT INTO `audios` VALUES (10, 'Explosive Boom.mp3', '', '/assets/audios/explosion/Explosive Boom.mp3', 305740, 7, 2, '2021-12-22 14:11:14', '2021-12-22 14:11:14', NULL);
INSERT INTO `audios` VALUES (11, 'Grenade Explosion.mp3', '', '/assets/audios/explosion/Grenade Explosion.mp3', 128640, 3, 2, '2021-12-22 14:11:43', '2021-12-22 14:11:43', NULL);

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
INSERT INTO `cards` VALUES (2, '123123', '2021-12-17 13:43:36', '2021-12-17 13:43:36', NULL);

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
-- Table structure for lights
-- ----------------------------
DROP TABLE IF EXISTS `lights`;
CREATE TABLE `lights`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `number` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 92 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of lights
-- ----------------------------
INSERT INTO `lights` VALUES (1, 1, 'Area1', '2022-01-17 14:55:54', '2022-01-17 14:55:54');
INSERT INTO `lights` VALUES (11, 11, 'FIRING RANGE', '2022-01-17 14:55:54', '2022-01-17 14:55:54');
INSERT INTO `lights` VALUES (12, 12, 'TARGET LIGHTS', '2022-01-17 14:55:54', '2022-01-17 14:55:54');
INSERT INTO `lights` VALUES (13, 13, 'STARBOARD READY ROOM', '2022-01-17 14:55:54', '2022-01-17 14:55:54');
INSERT INTO `lights` VALUES (14, 14, 'PORT READY ROOM', '2022-01-17 14:55:54', '2022-01-17 14:55:54');
INSERT INTO `lights` VALUES (21, 21, 'DECK 2 CORRIDOR', '2022-01-17 14:55:54', '2022-01-17 14:55:54');
INSERT INTO `lights` VALUES (31, 31, 'DECK TOWARDS AFT ENGINE ROOM', '2022-01-17 14:55:54', '2022-01-17 14:55:54');
INSERT INTO `lights` VALUES (32, 32, 'DECK 3 CQB AFT ENGINE ROOM', '2022-01-17 14:55:54', '2022-01-17 14:55:54');
INSERT INTO `lights` VALUES (33, 33, 'DECK 3 AFT READY ROOM', '2022-01-17 14:55:54', '2022-01-17 14:55:54');
INSERT INTO `lights` VALUES (34, 34, 'DECK 3 EXTG READY ROOM', '2022-01-17 14:55:54', '2022-01-17 14:55:54');
INSERT INTO `lights` VALUES (35, 35, 'DECK 3 AFT STAIRS', '2022-01-17 14:55:54', '2022-01-17 14:55:54');
INSERT INTO `lights` VALUES (36, 36, 'DECK 3 ENGINE ROOM', '2022-01-17 14:55:54', '2022-01-17 14:55:54');
INSERT INTO `lights` VALUES (37, 37, 'DECK 3 SHOTGUN BREECHING ROOM 1', '2022-01-17 14:55:54', '2022-01-17 14:55:54');
INSERT INTO `lights` VALUES (38, 38, 'DECK 3 SHOTGUN BREECHING ROOM 2', '2022-01-17 14:55:54', '2022-01-17 14:55:54');
INSERT INTO `lights` VALUES (41, 41, 'DECK 4 STARBOARD ROOMS', '2022-01-17 14:55:54', '2022-01-17 14:55:54');
INSERT INTO `lights` VALUES (42, 42, 'DECK 4 STARBOARD AFT CABIN', '2022-01-17 14:55:54', '2022-01-17 14:55:54');
INSERT INTO `lights` VALUES (43, 43, 'DECK 4 PORT AFT READY ROOM', '2022-01-17 14:55:54', '2022-01-17 14:55:54');
INSERT INTO `lights` VALUES (44, 44, 'DECK 4 AFT CORRIDOR', '2022-01-17 14:55:54', '2022-01-17 14:55:54');
INSERT INTO `lights` VALUES (45, 45, 'DECK 4 PORT CABIN', '2022-01-17 14:55:54', '2022-01-17 14:55:54');
INSERT INTO `lights` VALUES (46, 46, 'DECK 4 AFT STAIRS', '2022-01-17 14:55:54', '2022-01-17 14:55:54');
INSERT INTO `lights` VALUES (47, 47, 'DECK 4 FRONT STAIRS', '2022-01-17 14:55:54', '2022-01-17 14:55:54');
INSERT INTO `lights` VALUES (48, 48, 'DECK 4 PORT CREW CABIN', '2022-01-17 14:55:54', '2022-01-17 14:55:54');
INSERT INTO `lights` VALUES (49, 49, 'DECK 4 FRONT CORRIDOR', '2022-01-17 14:55:54', '2022-01-17 14:55:54');
INSERT INTO `lights` VALUES (51, 51, 'DECK 4 PORT ROOMS', '2022-01-17 14:55:55', '2022-01-17 14:55:55');
INSERT INTO `lights` VALUES (52, 52, 'DECK 4 STARBOARD CREWS CABIN', '2022-01-17 14:55:55', '2022-01-17 14:55:55');
INSERT INTO `lights` VALUES (53, 53, 'DECK 4 STARBOARD CREWS CABIN', '2022-01-17 14:55:55', '2022-01-17 14:55:55');
INSERT INTO `lights` VALUES (61, 61, 'DECK 5 STARBOARD AFT READY ROOM', '2022-01-17 14:55:55', '2022-01-17 14:55:55');
INSERT INTO `lights` VALUES (62, 62, 'DECK 5 15M RANGE', '2022-01-17 14:55:55', '2022-01-17 14:55:55');
INSERT INTO `lights` VALUES (63, 63, 'DECK 5 STARBOARD CENTER READY ROOM', '2022-01-17 14:55:55', '2022-01-17 14:55:55');
INSERT INTO `lights` VALUES (64, 64, 'Area 64', '2022-01-17 14:55:55', '2022-01-17 14:55:55');
INSERT INTO `lights` VALUES (65, 65, 'DECK 5 TARGET LIGHTS', '2022-01-17 14:55:55', '2022-01-17 14:55:55');
INSERT INTO `lights` VALUES (66, 66, 'DECK 5 AFT STAIRS', '2022-01-17 14:55:55', '2022-01-17 14:55:55');
INSERT INTO `lights` VALUES (71, 71, 'DECK 6 PORT CABIN 4 & STORE', '2022-01-17 14:55:55', '2022-01-17 14:55:55');
INSERT INTO `lights` VALUES (72, 72, 'DECK 6 SNR PORT OFFICER & CHIEF ENGR CABIN', '2022-01-17 14:55:55', '2022-01-17 14:55:55');
INSERT INTO `lights` VALUES (73, 73, 'DECK 6 STARBOARD CABIN 5 & 6', '2022-01-17 14:55:55', '2022-01-17 14:55:55');
INSERT INTO `lights` VALUES (74, 74, 'DECK 6 CAPT CABIN & DAY ROOM', '2022-01-17 14:55:55', '2022-01-17 14:55:55');
INSERT INTO `lights` VALUES (75, 75, 'DECK 6 CORRIDOR', '2022-01-17 14:55:55', '2022-01-17 14:55:55');
INSERT INTO `lights` VALUES (76, 76, 'DECK 6 PORT AFT READY ROOM', '2022-01-17 14:55:55', '2022-01-17 14:55:55');
INSERT INTO `lights` VALUES (77, 77, 'DECK 6 CQB', '2022-01-17 14:55:55', '2022-01-17 14:55:55');
INSERT INTO `lights` VALUES (78, 78, 'DECK 6 LFTP CORRIDOR', '2022-01-17 14:55:55', '2022-01-17 14:55:55');
INSERT INTO `lights` VALUES (80, 80, 'DECK 6 AFT STAIRS', '2022-01-17 14:55:55', '2022-01-17 14:55:55');
INSERT INTO `lights` VALUES (91, 91, 'DECK 7 ALL ROOMS', '2022-01-17 14:55:55', '2022-01-17 14:55:55');

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
) ENGINE = InnoDB AUTO_INCREMENT = 40 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

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
INSERT INTO `migrations` VALUES (28, '2022_01_12_054743_create_rts_scripts_table', 20);
INSERT INTO `migrations` VALUES (29, '2022_01_12_064653_create_scenarios_table', 21);
INSERT INTO `migrations` VALUES (30, '2022_01_12_065338_create_scenario_audio_table', 21);
INSERT INTO `migrations` VALUES (31, '2022_01_14_025000_add_deleted_at_to_scenarios', 22);
INSERT INTO `migrations` VALUES (32, '2022_01_14_025113_add_deleted_at_to_audios', 22);
INSERT INTO `migrations` VALUES (33, '2022_01_14_025202_add_deleted_at_to_rts_scripts', 22);
INSERT INTO `migrations` VALUES (34, '2022_01_17_114308_create_lights_table', 23);
INSERT INTO `migrations` VALUES (37, '2022_01_17_115726_add_number_to_lights', 24);
INSERT INTO `migrations` VALUES (38, '2022_01_17_150722_create_scenario_light_table', 25);
INSERT INTO `migrations` VALUES (39, '2022_01_18_114205_add_other_info_to_scenarios', 26);

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
) ENGINE = InnoDB AUTO_INCREMENT = 63 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------
INSERT INTO `personal_access_tokens` VALUES (31, 'App\\Models\\Administrator', 1, 'administrator', '1a99b8ec7dce4c8195bfe6d3b3a651cccc3b73f96b2bf30cd1256767f0338d38', '[\"*\"]', '2021-12-07 07:31:44', '2021-12-07 06:41:24', '2021-12-07 07:31:44');
INSERT INTO `personal_access_tokens` VALUES (59, 'App\\Models\\User', 1, 'wangxiao', 'fbf2012f2d1e1689006bf31df35a7b22cd48df0ae798a6570a7bdc3c9849b855', '[\"Operational\",\"Maintenance\",\"Admin\"]', '2022-01-11 06:26:14', '2022-01-11 06:22:49', '2022-01-11 06:26:14');
INSERT INTO `personal_access_tokens` VALUES (62, 'App\\Models\\User', 5, 'muge', '010680314b04d1341c599e73132b1b591d6f165f618e102af8a12ec63075f992', '[\"Operational\",\"Maintenance\",\"Admin\"]', '2022-01-19 16:03:33', '2022-01-13 03:48:46', '2022-01-19 16:03:33');

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
-- Table structure for rts_scripts
-- ----------------------------
DROP TABLE IF EXISTS `rts_scripts`;
CREATE TABLE `rts_scripts`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `range_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `index` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '脚本index',
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '脚本名称',
  `scenario_id` int(10) UNSIGNED NOT NULL COMMENT '场景id',
  `scenario_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '场景名称',
  `steps` json NOT NULL COMMENT '步骤',
  `participants` json NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of rts_scripts
-- ----------------------------
INSERT INTO `rts_scripts` VALUES (1, 'PCG-25m INDOOR', '1', 'Test.prg', 1, 'Test', '[{\"Name\": \"Step 1\", \"Index\": 1, \"Position\": 1}, {\"Name\": \"Step 2\", \"Index\": 2, \"Position\": 2}, {\"Name\": \"Step 3\", \"Index\": 3, \"Position\": 3}]', '[{\"Name\": \"Lane 1\", \"ParticipantIndex\": 2500}, {\"Name\": \"Lane 2\", \"ParticipantIndex\": 2501}, {\"Name\": \"Lane 3\", \"ParticipantIndex\": 2502}, {\"Name\": \"Lane 4\", \"ParticipantIndex\": 2503}, {\"Name\": \"Lane 5\", \"ParticipantIndex\": 2504}, {\"Name\": \"Lane 6\", \"ParticipantIndex\": 2505}, {\"Name\": \"Lane 7\", \"ParticipantIndex\": 2506}, {\"Name\": \"Lane 8\", \"ParticipantIndex\": 2507}]', '2022-01-12 14:09:07', '2022-01-12 14:09:07', NULL);
INSERT INTO `rts_scripts` VALUES (2, 'PCG-25m INDOOR', '2', 'Test2.prg', 1, 'Test', '[{\"Name\": \"Step 1\", \"Index\": 1, \"Position\": 1}, {\"Name\": \"Step 2\", \"Index\": 2, \"Position\": 2}, {\"Name\": \"Step 3\", \"Index\": 3, \"Position\": 3}, {\"Name\": \"Step 4\", \"Index\": 4, \"Position\": 4}, {\"Name\": \"Step 5\", \"Index\": 5, \"Position\": 5}]', '[{\"Name\": \"Lane 1\", \"ParticipantIndex\": 2500}, {\"Name\": \"Lane 2\", \"ParticipantIndex\": 2501}, {\"Name\": \"Lane 3\", \"ParticipantIndex\": 2502}, {\"Name\": \"Lane 4\", \"ParticipantIndex\": 2503}, {\"Name\": \"Lane 5\", \"ParticipantIndex\": 2504}, {\"Name\": \"Lane 6\", \"ParticipantIndex\": 2505}, {\"Name\": \"Lane 7\", \"ParticipantIndex\": 2506}, {\"Name\": \"Lane 8\", \"ParticipantIndex\": 2507}]', '2022-01-12 14:09:07', '2022-01-13 06:17:27', NULL);
INSERT INTO `rts_scripts` VALUES (3, 'PCG-25m INDOOR', '3', 'Test3.prg', 1, 'Test', '[{\"Name\": \"Step 1\", \"Index\": 1, \"Position\": 1}, {\"Name\": \"Step 2\", \"Index\": 2, \"Position\": 2}, {\"Name\": \"Step 3\", \"Index\": 3, \"Position\": 3}]', '[{\"Name\": \"Lane 1\", \"ParticipantIndex\": 2500}, {\"Name\": \"Lane 2\", \"ParticipantIndex\": 2501}, {\"Name\": \"Lane 3\", \"ParticipantIndex\": 2502}, {\"Name\": \"Lane 4\", \"ParticipantIndex\": 2503}, {\"Name\": \"Lane 5\", \"ParticipantIndex\": 2504}, {\"Name\": \"Lane 6\", \"ParticipantIndex\": 2505}, {\"Name\": \"Lane 7\", \"ParticipantIndex\": 2506}, {\"Name\": \"Lane 8\", \"ParticipantIndex\": 2507}]', '2022-01-12 14:09:07', '2022-01-12 14:09:07', NULL);

-- ----------------------------
-- Table structure for scenario_audio
-- ----------------------------
DROP TABLE IF EXISTS `scenario_audio`;
CREATE TABLE `scenario_audio`  (
  `scenario_id` int(10) UNSIGNED NOT NULL,
  `audio_id` int(10) UNSIGNED NOT NULL,
  `start_at` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '从哪一秒开始播放',
  `duration` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '持续播放多少秒',
  PRIMARY KEY (`scenario_id`, `audio_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of scenario_audio
-- ----------------------------
INSERT INTO `scenario_audio` VALUES (10, 1, 0, 30);
INSERT INTO `scenario_audio` VALUES (11, 1, 0, 30);

-- ----------------------------
-- Table structure for scenario_light
-- ----------------------------
DROP TABLE IF EXISTS `scenario_light`;
CREATE TABLE `scenario_light`  (
  `scenario_id` int(10) UNSIGNED NOT NULL,
  `light_id` int(10) UNSIGNED NOT NULL,
  `preset` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '亮度等级',
  `start_at` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '从哪一秒开始',
  `duration` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '持续多少秒',
  PRIMARY KEY (`scenario_id`, `light_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of scenario_light
-- ----------------------------
INSERT INTO `scenario_light` VALUES (11, 1, 2, 0, 30);

-- ----------------------------
-- Table structure for scenarios
-- ----------------------------
DROP TABLE IF EXISTS `scenarios`;
CREATE TABLE `scenarios`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `light_detail` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `audio_detail` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `rts_script_detail` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` tinyint(3) UNSIGNED NOT NULL COMMENT '培训类型[1：Group,2：Individual]',
  `rts_script_id` int(10) UNSIGNED NOT NULL COMMENT '关联rts_scripts表id',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of scenarios
-- ----------------------------
INSERT INTO `scenarios` VALUES (10, 'name of scenario', 'description of scenario', '', '', '', 1, 1, '2022-01-14 02:14:22', '2022-01-14 03:01:13', NULL);

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
INSERT INTO `user_mode` VALUES (5, 2);
INSERT INTO `user_mode` VALUES (5, 3);
INSERT INTO `user_mode` VALUES (9, 1);
INSERT INTO `user_mode` VALUES (9, 2);
INSERT INTO `user_mode` VALUES (9, 3);

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
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'wangxiao', '', 'wx497657341@qq.com', NULL, '$2y$10$kzMDdfFTrAqQK.ca1wgExOX1tKmzARJQnIi40W.cJ4FeKd0zy7UMO', NULL, 2, 1, 1, '2021-12-17 10:50:50', '2021-12-22 03:08:06', NULL);
INSERT INTO `users` VALUES (5, 'muge', '', '1639987982_leffler.zoila@gmail.com', NULL, '$2y$10$QCfpW2WqhW6/TJiiB15XMe/HZUCEAanezjXGpSZuU1Q10DfpbzGlW', NULL, 1, 2, 1, '2021-12-20 08:13:02', '2021-12-22 03:08:06', NULL);
INSERT INTO `users` VALUES (9, 'vector', 'S9208221E', '1641882374_pkreiger@gmail.com', NULL, '$2y$10$3L7qU1G.cW4aZB8.fGWat.hQ11JTH7iXZBdJNeLMW/MUpFmLipvWO', NULL, 1, 0, 1, '2022-01-11 06:26:14', '2022-01-11 06:26:14', NULL);

SET FOREIGN_KEY_CHECKS = 1;
