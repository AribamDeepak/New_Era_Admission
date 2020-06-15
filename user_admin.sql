/*
 Navicat Premium Data Transfer

 Source Server         : ExtraedgeDemo
 Source Server Type    : MySQL
 Source Server Version : 100413
 Source Host           : mobimp.com:3306
 Source Schema         : u699038125_extraedge_demo

 Target Server Type    : MySQL
 Target Server Version : 100413
 File Encoding         : 65001

 Date: 13/06/2020 12:08:40
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for fee_payment_details
-- ----------------------------
DROP TABLE IF EXISTS `fee_payment_details`;
CREATE TABLE `fee_payment_details`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_no` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `student_id` int(11) NULL DEFAULT NULL,
  `fee_id` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `added_on` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `isActive` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 24 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of fee_payment_details
-- ----------------------------
INSERT INTO `fee_payment_details` VALUES (2, 'EXTS00001', 1, 'a:3:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"5\";}', '2020-06-11 13:24:48', 1);
INSERT INTO `fee_payment_details` VALUES (3, 'EXTS00002', 1, 'a:3:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"5\";}', '2020-06-11 13:35:22', 1);
INSERT INTO `fee_payment_details` VALUES (4, 'EXTS00003', 1, 'a:3:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"5\";}', '2020-06-11 13:38:10', 1);
INSERT INTO `fee_payment_details` VALUES (5, 'EXTS00004', 1, 'a:3:{i:0;s:1:\"1\";i:1;s:1:\"3\";i:2;s:1:\"5\";}', '2020-06-11 13:39:41', 1);
INSERT INTO `fee_payment_details` VALUES (6, 'EXTS00005', 1, 'a:3:{i:0;s:1:\"1\";i:1;s:1:\"3\";i:2;s:1:\"5\";}', '2020-06-11 13:42:04', 1);
INSERT INTO `fee_payment_details` VALUES (7, 'EXTS00006', 1, 'a:2:{i:0;s:1:\"1\";i:1;s:1:\"2\";}', '2020-06-11 13:45:00', 1);
INSERT INTO `fee_payment_details` VALUES (8, 'EXTS00007', 1, 'a:2:{i:0;s:1:\"1\";i:1;s:1:\"2\";}', '2020-06-11 15:29:42', 1);
INSERT INTO `fee_payment_details` VALUES (9, 'EXTS00008', 1, 'a:2:{i:0;s:1:\"2\";i:1;s:1:\"3\";}', '2020-06-11 15:32:05', 1);
INSERT INTO `fee_payment_details` VALUES (10, 'EXTS00009', 1, 'a:2:{i:0;s:1:\"1\";i:1;s:1:\"3\";}', '2020-06-11 16:31:17', 1);
INSERT INTO `fee_payment_details` VALUES (11, 'EXTS00010', 1, 's:1:\"4\";', '2020-06-11 17:46:45', 1);
INSERT INTO `fee_payment_details` VALUES (12, 'EXTS00011', 1, 's:1:\"4\";', '2020-06-11 17:47:21', 1);
INSERT INTO `fee_payment_details` VALUES (13, 'EXTS00012', 1, 's:1:\"4\";', '2020-06-11 18:17:35', 1);
INSERT INTO `fee_payment_details` VALUES (14, 'EXTS00013', 2, 'a:3:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"5\";}', '2020-06-11 20:05:07', 1);
INSERT INTO `fee_payment_details` VALUES (15, 'EXTS00014', 2, 's:1:\"4\";', '2020-06-11 20:15:28', 1);
INSERT INTO `fee_payment_details` VALUES (16, 'EXTS00015', 2, 's:1:\"3\";', '2020-06-11 20:16:43', 1);
INSERT INTO `fee_payment_details` VALUES (17, 'EXTS00016', 3, 'a:3:{i:0;s:1:\"3\";i:1;s:1:\"4\";i:2;s:1:\"5\";}', '2020-06-12 00:08:04', 1);
INSERT INTO `fee_payment_details` VALUES (18, 'EXTS00017', 3, 'a:2:{i:0;s:1:\"1\";i:1;s:1:\"2\";}', '2020-06-12 00:08:34', 1);
INSERT INTO `fee_payment_details` VALUES (19, 'EXTS00018', 6, 's:1:\"3\";', '2020-06-12 11:28:45', 1);
INSERT INTO `fee_payment_details` VALUES (20, 'EXTS00019', 6, 's:1:\"5\";', '2020-06-12 11:29:38', 1);
INSERT INTO `fee_payment_details` VALUES (21, 'EXTS00020', 6, 's:1:\"4\";', '2020-06-12 11:31:08', 1);
INSERT INTO `fee_payment_details` VALUES (22, 'EXTS00021', 4, 'a:2:{i:0;s:1:\"1\";i:1;s:1:\"3\";}', '2020-06-12 14:44:10', 1);
INSERT INTO `fee_payment_details` VALUES (23, 'EXTS00022', 4, 's:1:\"5\";', '2020-06-12 14:45:39', 1);

-- ----------------------------
-- Table structure for fees
-- ----------------------------
DROP TABLE IF EXISTS `fees`;
CREATE TABLE `fees`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `amount` int(10) NULL DEFAULT NULL,
  `isActive` int(1) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of fees
-- ----------------------------
INSERT INTO `fees` VALUES (1, 'School Admission Fee', 19500, 1);
INSERT INTO `fees` VALUES (2, 'School Admission Fee and Bus (1st Installment)', 27900, 1);
INSERT INTO `fees` VALUES (3, 'School Admission Fee and Hostel Admission Fee', 38500, 1);
INSERT INTO `fees` VALUES (4, 'Girl\'s Uniform', 4890, 1);
INSERT INTO `fees` VALUES (5, 'Boy\'s Uniform', 5240, 1);

-- ----------------------------
-- Table structure for instamojo_table
-- ----------------------------
DROP TABLE IF EXISTS `instamojo_table`;
CREATE TABLE `instamojo_table`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `phone` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `buyer_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `amount` decimal(16, 2) NOT NULL,
  `purpose` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `expires_at` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `send_sms` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'false',
  `send_email` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'false',
  `sms_status` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `email_status` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `shorturl` mediumtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `longurl` mediumtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `redirect_url` mediumtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `webhook` mediumtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `allow_repeated_payments` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'false',
  `customer_id` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `created_at` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `modified_at` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of instamojo_table
-- ----------------------------
INSERT INTO `instamojo_table` VALUES (1, '+917005164939', 'rajeevbbqq@gmail.com', 'rbbqq', 20.00, 'TEST', NULL, 'Pending', '1', '1', 'Pending', 'Pending', NULL, 'https://test.instamojo.com/@deepakari04/8005d8353b624ee9a22ab62a8ea8343f', 'http://websitedemo.mobimp.com/extraedge_admission/success_payment', NULL, '0', NULL, '2020-06-13T06:30:58.480899Z', '2020-06-13T06:30:58.480924Z');

-- ----------------------------
-- Table structure for payment_details
-- ----------------------------
DROP TABLE IF EXISTS `payment_details`;
CREATE TABLE `payment_details`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `registration_id` int(11) NULL DEFAULT NULL,
  `link_id` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `payment_id` varchar(225) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `currency` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `amount` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `mac` varchar(225) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `datetime` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for registration
-- ----------------------------
DROP TABLE IF EXISTS `registration`;
CREATE TABLE `registration`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `isAdmission` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `payment_status_id` int(11) NULL DEFAULT NULL,
  `application_id` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `student_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `aadhaar_number` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `blood_group` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `religion` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `caste` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `identification_mark` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `school_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `passed_board` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `roll_no` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `percentage` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `permanent_address` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `permanent_district` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `permanent_address_pin` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `present_address` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `present_district` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `persent_address_pin` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `father_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `mother_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `watsapp_no` varbinary(20) NOT NULL,
  `guardian_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `transportation` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `transport_bus_route` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `subject_combination` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `photo_profile` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `admitcard_photo` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `marksheet_photo` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `added_on` datetime(0) NOT NULL,
  `isActive` int(1) NOT NULL,
  `admission_id` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 8 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of registration
-- ----------------------------
INSERT INTO `registration` VALUES (1, '1', 1, '5edf7bb0af5a4', 'Mohan', 'KHJUYG9009', '2020-06-02', 'Male', 'A+', 'Hindu', 'General', 'Mole on left cheek', 'MANIPUR PUBLIC SCHOOL', 'CBSE', '3232', '44', 'THANGMEIBAND LOURUNG PUREL LEIKAI', NULL, '343443', 'THANGMEIBAND LOURUNG PUREL KEIKAI', NULL, '32323', 'ARIBAM BRAJAGOPLA SHARMA', 'ARIBAM ACHOUBI DEVI', 0x33323332333233323233, 'MAMA', 'Van', NULL, 'GROUP-C', 'http://websitedemo.mobimp.com/extraedge_admission/assets/ExtraEdge/Photo/1591704496AribamDeepakSharma.jpg', 'http://websitedemo.mobimp.com/extraedge_admission/assets/ExtraEdge/marksheet/1591704496pan.jpeg', 'http://websitedemo.mobimp.com/extraedge_admission/assets/ExtraEdge/admitcard/1591704496z1.png', '2020-06-08 17:38:16', 1, NULL);
INSERT INTO `registration` VALUES (2, '1', 1, '5edf7c630496e', 'Fisher', '23423423434', '1991-06-04', 'Male', 'O+', 'Hindu', 'ST', 'Black mole', 'Little Master', 'CBSE', '1234', '65', 'Lalambung Makhong', NULL, '795001', 'Lalalmbung RIMS', NULL, '795001', 'Ladu', 'Ibetombi', 0x37353036303433393936, 'NA', 'Bus', '2', 'GROUP-B', 'http://websitedemo.mobimp.com/extraedge_admission/assets/ExtraEdge/Photo/1591704675RFO-1400x919-Spiced-Roast-Chicken-09a6012a-910c-4cd0-b20d-a16bb16e7d57-0-1400x919.jpg', 'http://websitedemo.mobimp.com/extraedge_admission/assets/ExtraEdge/marksheet/1591704675certificate_lakhan_compressed.pdf', 'http://websitedemo.mobimp.com/extraedge_admission/assets/ExtraEdge/admitcard/1591704675certificate_lakhan_compressed.pdf', '2020-06-09 17:41:15', 1, NULL);
INSERT INTO `registration` VALUES (3, '1', 1, 'EB3E7', 'JIJ', 'JHKHK', '2001-06-05', 'Male', 'B+', 'HINDU', 'OBC', 'HIIHIHIHH', 'XTRAEDGE ', 'BOSEM', '79791', '78', 'URIPOK', NULL, '795001', 'URIPOK', NULL, '795001', 'JJO', 'MKJKJK', 0x39363132383635313437, 'UFUFYUGYU', 'Bus', '1', 'GROUP-A', 'http://websitedemo.mobimp.com/extraedge_admission/assets/ExtraEdge/Photo/1591712250Jellyfish.jpg', 'http://websitedemo.mobimp.com/extraedge_admission/assets/ExtraEdge/marksheet/1591712250Koala.jpg', 'http://websitedemo.mobimp.com/extraedge_admission/assets/ExtraEdge/admitcard/1591712250Lighthouse.jpg', '2020-06-10 19:47:30', 1, NULL);
INSERT INTO `registration` VALUES (4, '1', NULL, 'D32EA', 'Fisher', '23423423434', '1996-06-03', 'Male', 'B-', 'Hindu', 'ST', 'Black mole', 'Little Master', 'CBSE', '1234', '56', 'Lalambung Makhong', NULL, '795001', 'Lalalmbung RIMS', NULL, '795001', 'Ladu', 'Ibetombi', 0x313233313234353335, '', 'Bus', '1', 'GROUP-A', 'http://websitedemo.mobimp.com/extraedge_admission/assets/ExtraEdge/Photo/1591713029fisher_Passport_Photo.JPG', 'http://websitedemo.mobimp.com/extraedge_admission/assets/ExtraEdge/marksheet/1591713029certificate_lakhan_compressed.pdf', 'http://websitedemo.mobimp.com/extraedge_admission/assets/ExtraEdge/admitcard/1591713029certificate_lakhan_compressed.pdf', '2020-06-09 20:00:29', 1, NULL);
INSERT INTO `registration` VALUES (5, NULL, NULL, '0DDE3', 'qwqw', '1311', '1955-10-05', 'Male', 'B+', 'HINDU', 'General', 'HIIHIHIHH', 'XTRAEDGE ', 'BOSEM', '79791', '87', 'URIPOK', NULL, '795001', 'URIPOK', NULL, '795001', 'JJO', 'MKJKJK', 0x39363132383635313437, 'UFUFYUGYU', 'Hosteler', NULL, 'GROUP-B', 'http://websitedemo.mobimp.com/extraedge_admission/assets/ExtraEdge/Photo/1591714273Jellyfish.jpg', 'http://websitedemo.mobimp.com/extraedge_admission/assets/ExtraEdge/marksheet/1591714273Koala.jpg', 'http://websitedemo.mobimp.com/extraedge_admission/assets/ExtraEdge/admitcard/1591714273Lighthouse.jpg', '2020-06-09 20:21:16', 0, NULL);
INSERT INTO `registration` VALUES (6, '1', 1, '55F3C', 'Aribam Deepak Sharma', '5214-5214-5365', '2003-01-03', 'Male', 'A+', 'Hindu', 'OBC', 'Mole on left cheek', 'MANIPUR PUBLIC SCHOOL', 'CBSE', '3232', '23', 'THANGMEIBAND LOURUNG PUREL LEIKAI', NULL, '795001', 'THANGMEIBAND LOURUNG PUREL KEIKAI', NULL, '795001', 'ARIBAM BRAJAGOPLA SHARMA', 'ARIBAM ACHOUBI DEVI', 0x37383934353631323330, 'Aribam memchoubi Devi', 'Bus', '3', 'GROUP-D', 'http://localhost/ExtraEdgeAdmission/assets/ExtraEdge/Photo/1591937576AribamDeepakSharma.jpg', 'http://localhost/ExtraEdgeAdmission/assets/ExtraEdge/marksheet/1591937576pan.jpeg', 'http://localhost/ExtraEdgeAdmission/assets/ExtraEdge/admitcard/1591937576z1.png', '2020-06-12 10:22:56', 1, NULL);
INSERT INTO `registration` VALUES (7, NULL, 1, '77852', 'William', '8809-8098-0809', '2020-06-02', 'Male', 'A+', 'Islam', 'General', 'Mole on left cheek', 'MANIPUR PUBLIC SCHOOL', 'CBSE', '3232', '44', 'THANGMEIBAND LOURUNG PUREL LEIKAI', 'Imphal West', '44343', 'THANGMEIBAND LOURUNG PUREL KEIKAI', 'Imphal West', '323332', 'ARIBAM BRAJAGOPLA SHARMA', 'ARIBAM ACHOUBI DEVI', 0x323432343332343233343332, 'MAMA', 'Hosteller', NULL, 'GROUP-B', 'http://localhost/ExtraEdgeAdmission/assets/ExtraEdge/Photo/1592027154AribamDeepakSharma.jpg', 'http://localhost/ExtraEdgeAdmission/assets/ExtraEdge/marksheet/1592027154pan.jpeg', 'http://localhost/ExtraEdgeAdmission/assets/ExtraEdge/admitcard/1592027154z1.png', '2020-06-13 11:15:54', 1, NULL);

-- ----------------------------
-- Table structure for user_admin
-- ----------------------------
DROP TABLE IF EXISTS `user_admin`;
CREATE TABLE `user_admin`  (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `User_Name` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `Email` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `Password` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `Role` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `Mode` int(1) NULL DEFAULT NULL,
  `Added_on` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `Modified_on` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `isActive` int(1) NULL DEFAULT NULL,
  PRIMARY KEY (`ID`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user_admin
-- ----------------------------
INSERT INTO `user_admin` VALUES (1, 'admin', 'admin@admin.com', '1', 'admin', 1, '2020-06-11 19:14:09', '2020-06-11 19:14:09', 1);

SET FOREIGN_KEY_CHECKS = 1;
