/*
 Navicat Premium Data Transfer

 Source Server         : local
 Source Server Type    : MySQL
 Source Server Version : 80021
 Source Host           : 127.0.0.1:3306
 Source Schema         : fara_refa

 Target Server Type    : MySQL
 Target Server Version : 80021
 File Encoding         : 65001

 Date: 10/03/2021 20:21:56
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for cities
-- ----------------------------
DROP TABLE IF EXISTS `cities`;
CREATE TABLE `cities`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `father` int UNSIGNED NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cities
-- ----------------------------
INSERT INTO `cities` VALUES (1, 0, 'آذربایجان شرقی', NULL);
INSERT INTO `cities` VALUES (2, 0, 'آذربایجان غربی', NULL);
INSERT INTO `cities` VALUES (3, 0, 'اردبیل', NULL);
INSERT INTO `cities` VALUES (4, 0, 'اصفهان', NULL);
INSERT INTO `cities` VALUES (5, 0, 'ایلام', NULL);
INSERT INTO `cities` VALUES (6, 0, 'بوشهر', NULL);
INSERT INTO `cities` VALUES (7, 0, 'تهران', NULL);
INSERT INTO `cities` VALUES (8, 0, 'چهارمحال و بختیاری', NULL);
INSERT INTO `cities` VALUES (9, 0, 'خراسان جنوبی', NULL);
INSERT INTO `cities` VALUES (10, 0, 'خراسان رضوی', NULL);
INSERT INTO `cities` VALUES (11, 0, 'خراسان شمالی', NULL);
INSERT INTO `cities` VALUES (12, 0, 'خوزستان', NULL);
INSERT INTO `cities` VALUES (13, 0, 'زنجان', NULL);
INSERT INTO `cities` VALUES (14, 0, 'سمنان', NULL);
INSERT INTO `cities` VALUES (15, 0, 'سیستان و بلوچستان', NULL);
INSERT INTO `cities` VALUES (16, 0, 'شيراز', NULL);
INSERT INTO `cities` VALUES (17, 0, 'قزوین', NULL);
INSERT INTO `cities` VALUES (18, 0, 'قم', NULL);
INSERT INTO `cities` VALUES (19, 0, 'کردستان', NULL);
INSERT INTO `cities` VALUES (20, 0, 'کرمان', NULL);
INSERT INTO `cities` VALUES (21, 0, 'کرمانشاه', NULL);
INSERT INTO `cities` VALUES (22, 0, 'کهگیلویه و بویراحمد', NULL);
INSERT INTO `cities` VALUES (23, 0, 'گلستان', NULL);
INSERT INTO `cities` VALUES (24, 0, 'گیلان', NULL);
INSERT INTO `cities` VALUES (25, 0, 'لرستان', NULL);
INSERT INTO `cities` VALUES (26, 0, 'مازندران', NULL);
INSERT INTO `cities` VALUES (27, 0, 'مرکزی', NULL);
INSERT INTO `cities` VALUES (28, 0, 'هرمزگان', NULL);
INSERT INTO `cities` VALUES (29, 0, 'همدان', NULL);
INSERT INTO `cities` VALUES (30, 0, 'یزد', NULL);
INSERT INTO `cities` VALUES (31, 1, 'آذرشهر', NULL);
INSERT INTO `cities` VALUES (32, 1, 'اسکو', NULL);
INSERT INTO `cities` VALUES (33, 1, 'اهر', NULL);
INSERT INTO `cities` VALUES (34, 1, 'بستان‌آباد', NULL);
INSERT INTO `cities` VALUES (35, 1, 'بناب', NULL);
INSERT INTO `cities` VALUES (36, 1, 'تبریز ', NULL);
INSERT INTO `cities` VALUES (37, 1, 'جلفا', NULL);
INSERT INTO `cities` VALUES (38, 1, 'چاراویماق', NULL);
INSERT INTO `cities` VALUES (39, 1, 'سراب', NULL);
INSERT INTO `cities` VALUES (40, 1, 'شبستر', NULL);
INSERT INTO `cities` VALUES (41, 1, 'عجب‌شیر', NULL);
INSERT INTO `cities` VALUES (42, 1, 'کلیبر', NULL);
INSERT INTO `cities` VALUES (43, 1, 'مراغه', NULL);
INSERT INTO `cities` VALUES (44, 1, 'مرند', NULL);
INSERT INTO `cities` VALUES (45, 1, 'ملکان', NULL);
INSERT INTO `cities` VALUES (46, 1, 'میانه', NULL);
INSERT INTO `cities` VALUES (47, 1, 'ورزقان', NULL);
INSERT INTO `cities` VALUES (48, 1, 'هریس', NULL);
INSERT INTO `cities` VALUES (49, 1, 'هشترود', NULL);
INSERT INTO `cities` VALUES (50, 2, 'ارومیه', NULL);
INSERT INTO `cities` VALUES (51, 2, 'اشنویه', NULL);
INSERT INTO `cities` VALUES (52, 2, 'بوکان', NULL);
INSERT INTO `cities` VALUES (53, 2, 'پیرانشهر', NULL);
INSERT INTO `cities` VALUES (54, 2, 'تکاب', NULL);
INSERT INTO `cities` VALUES (55, 2, 'چالدران', NULL);
INSERT INTO `cities` VALUES (56, 2, 'خوی', NULL);
INSERT INTO `cities` VALUES (57, 2, 'سردشت', NULL);
INSERT INTO `cities` VALUES (58, 2, 'سلماس', NULL);
INSERT INTO `cities` VALUES (59, 2, 'شاهین‌دژ', NULL);
INSERT INTO `cities` VALUES (60, 2, 'ماکو', NULL);
INSERT INTO `cities` VALUES (61, 2, 'مهاباد', NULL);
INSERT INTO `cities` VALUES (62, 2, 'میاندوآب', NULL);
INSERT INTO `cities` VALUES (63, 2, 'نقده', NULL);
INSERT INTO `cities` VALUES (64, 3, 'اردبیل', NULL);
INSERT INTO `cities` VALUES (65, 3, 'بیله‌سوار', NULL);
INSERT INTO `cities` VALUES (66, 3, 'پارس‌آباد', NULL);
INSERT INTO `cities` VALUES (67, 3, 'خلخال', NULL);
INSERT INTO `cities` VALUES (68, 3, 'کوثر ', NULL);
INSERT INTO `cities` VALUES (69, 3, 'گِرمی', NULL);
INSERT INTO `cities` VALUES (70, 3, 'مِشگین‌شهر', NULL);
INSERT INTO `cities` VALUES (71, 3, 'نَمین', NULL);
INSERT INTO `cities` VALUES (72, 3, 'نیر', NULL);
INSERT INTO `cities` VALUES (73, 4, 'آران و بیدگل', NULL);
INSERT INTO `cities` VALUES (74, 4, 'اردستان', NULL);
INSERT INTO `cities` VALUES (75, 4, 'اصفهان ', NULL);
INSERT INTO `cities` VALUES (76, 4, 'برخوار و میمه', NULL);
INSERT INTO `cities` VALUES (77, 4, 'تیران و کرون', NULL);
INSERT INTO `cities` VALUES (78, 4, 'چادگان', NULL);
INSERT INTO `cities` VALUES (79, 4, 'خمینی‌شهر', NULL);
INSERT INTO `cities` VALUES (80, 4, 'خوانسار', NULL);
INSERT INTO `cities` VALUES (81, 4, 'سمیرم', NULL);
INSERT INTO `cities` VALUES (82, 4, 'شهرضا', NULL);
INSERT INTO `cities` VALUES (83, 4, 'سمیرم سفلی', NULL);
INSERT INTO `cities` VALUES (84, 4, 'فریدن', NULL);
INSERT INTO `cities` VALUES (85, 4, 'فریدون‌شهر', NULL);
INSERT INTO `cities` VALUES (86, 4, 'فلاورجان', NULL);
INSERT INTO `cities` VALUES (87, 4, 'کاشان', NULL);
INSERT INTO `cities` VALUES (88, 4, 'گلپایگان', NULL);
INSERT INTO `cities` VALUES (89, 4, 'لنجان', NULL);
INSERT INTO `cities` VALUES (90, 4, 'مبارکه', NULL);
INSERT INTO `cities` VALUES (91, 4, 'نائین', NULL);
INSERT INTO `cities` VALUES (92, 4, 'نجف‌آباد ', NULL);
INSERT INTO `cities` VALUES (93, 4, 'نطنز', NULL);
INSERT INTO `cities` VALUES (94, 5, 'آبدانان', NULL);
INSERT INTO `cities` VALUES (95, 5, 'ایلام', NULL);
INSERT INTO `cities` VALUES (96, 5, 'ایوان', NULL);
INSERT INTO `cities` VALUES (97, 5, 'دره‌شهر', NULL);
INSERT INTO `cities` VALUES (98, 5, 'دهلران', NULL);
INSERT INTO `cities` VALUES (99, 5, 'شیروان و چرداول', NULL);
INSERT INTO `cities` VALUES (100, 5, 'مهران', NULL);
INSERT INTO `cities` VALUES (101, 6, 'بوشهر', NULL);
INSERT INTO `cities` VALUES (102, 6, 'تنگستان ', NULL);
INSERT INTO `cities` VALUES (103, 6, 'جم', NULL);
INSERT INTO `cities` VALUES (104, 6, 'دشتستان', NULL);
INSERT INTO `cities` VALUES (105, 6, 'دشتی', NULL);
INSERT INTO `cities` VALUES (106, 6, 'دیر', NULL);
INSERT INTO `cities` VALUES (107, 6, 'دیلم', NULL);
INSERT INTO `cities` VALUES (108, 6, 'کنگان ', NULL);
INSERT INTO `cities` VALUES (109, 6, 'گناوه', NULL);
INSERT INTO `cities` VALUES (110, 7, 'اسلام‌شهر', NULL);
INSERT INTO `cities` VALUES (111, 7, 'پاکدشت', NULL);
INSERT INTO `cities` VALUES (112, 7, 'تهران', NULL);
INSERT INTO `cities` VALUES (113, 7, 'دماوند', NULL);
INSERT INTO `cities` VALUES (114, 7, 'رباط‌کریم', NULL);
INSERT INTO `cities` VALUES (115, 7, 'ری', NULL);
INSERT INTO `cities` VALUES (116, 7, 'ساوجبلاغ', NULL);
INSERT INTO `cities` VALUES (117, 7, 'شمیرانات', NULL);
INSERT INTO `cities` VALUES (118, 7, 'شهریار', NULL);
INSERT INTO `cities` VALUES (119, 7, 'فیروزکوه', NULL);
INSERT INTO `cities` VALUES (120, 7, 'کرج ', NULL);
INSERT INTO `cities` VALUES (121, 7, 'نظرآباد', NULL);
INSERT INTO `cities` VALUES (122, 7, 'ورامین', NULL);
INSERT INTO `cities` VALUES (123, 8, 'اردل', NULL);
INSERT INTO `cities` VALUES (124, 8, 'بروجن', NULL);
INSERT INTO `cities` VALUES (125, 8, 'شهرکرد', NULL);
INSERT INTO `cities` VALUES (126, 8, 'فارسان', NULL);
INSERT INTO `cities` VALUES (127, 8, 'کوهرنگ', NULL);
INSERT INTO `cities` VALUES (128, 8, 'لردگان', NULL);
INSERT INTO `cities` VALUES (129, 9, 'بیرجند', NULL);
INSERT INTO `cities` VALUES (130, 9, 'درمیان', NULL);
INSERT INTO `cities` VALUES (131, 9, 'سرایان', NULL);
INSERT INTO `cities` VALUES (132, 9, 'سربیشه', NULL);
INSERT INTO `cities` VALUES (133, 9, 'فردوس', NULL);
INSERT INTO `cities` VALUES (134, 9, 'قائنات', NULL);
INSERT INTO `cities` VALUES (135, 9, 'نهبندان', NULL);
INSERT INTO `cities` VALUES (136, 10, 'بردسکن', NULL);
INSERT INTO `cities` VALUES (137, 10, 'تایباد', NULL);
INSERT INTO `cities` VALUES (138, 10, 'تربت جام', NULL);
INSERT INTO `cities` VALUES (139, 10, 'تربت حیدریه', NULL);
INSERT INTO `cities` VALUES (140, 10, 'چناران', NULL);
INSERT INTO `cities` VALUES (141, 10, 'خلیل‌آباد', NULL);
INSERT INTO `cities` VALUES (142, 10, 'خواف ', NULL);
INSERT INTO `cities` VALUES (143, 10, 'درگز', NULL);
INSERT INTO `cities` VALUES (144, 10, 'رشتخوار', NULL);
INSERT INTO `cities` VALUES (145, 10, 'سبزوار ', NULL);
INSERT INTO `cities` VALUES (146, 10, 'سرخس', NULL);
INSERT INTO `cities` VALUES (147, 10, 'فریمان', NULL);
INSERT INTO `cities` VALUES (148, 10, 'قوچان', NULL);
INSERT INTO `cities` VALUES (149, 10, 'کاشمر', NULL);
INSERT INTO `cities` VALUES (150, 10, 'کلات', NULL);
INSERT INTO `cities` VALUES (151, 10, 'گناباد', NULL);
INSERT INTO `cities` VALUES (152, 10, 'مشهد', NULL);
INSERT INTO `cities` VALUES (153, 10, 'مه ولات', NULL);
INSERT INTO `cities` VALUES (154, 10, 'نیشابور', NULL);
INSERT INTO `cities` VALUES (155, 11, 'اسفراین', NULL);
INSERT INTO `cities` VALUES (156, 11, 'بجنورد ', NULL);
INSERT INTO `cities` VALUES (157, 11, 'جاجرم', NULL);
INSERT INTO `cities` VALUES (158, 11, 'شیروان', NULL);
INSERT INTO `cities` VALUES (159, 11, 'فاروج', NULL);
INSERT INTO `cities` VALUES (160, 11, 'مانه و سملقان', NULL);
INSERT INTO `cities` VALUES (161, 12, 'آبادان', NULL);
INSERT INTO `cities` VALUES (162, 12, 'امیدیه', NULL);
INSERT INTO `cities` VALUES (163, 12, 'اندیمشک', NULL);
INSERT INTO `cities` VALUES (164, 12, 'اهواز', NULL);
INSERT INTO `cities` VALUES (165, 12, 'ایذه', NULL);
INSERT INTO `cities` VALUES (166, 12, 'باغ‌ملک', NULL);
INSERT INTO `cities` VALUES (167, 12, 'بندر ماهشهر', NULL);
INSERT INTO `cities` VALUES (168, 12, 'بهبهان', NULL);
INSERT INTO `cities` VALUES (169, 12, 'خرمشهر', NULL);
INSERT INTO `cities` VALUES (170, 12, 'دزفول', NULL);
INSERT INTO `cities` VALUES (171, 12, 'دشت آزادگان', NULL);
INSERT INTO `cities` VALUES (172, 12, 'رامشیر', NULL);
INSERT INTO `cities` VALUES (173, 12, 'رامهرمز', NULL);
INSERT INTO `cities` VALUES (174, 12, 'شادگان', NULL);
INSERT INTO `cities` VALUES (175, 12, 'شوش', NULL);
INSERT INTO `cities` VALUES (176, 12, 'شوشتر', NULL);
INSERT INTO `cities` VALUES (177, 12, 'گتوند', NULL);
INSERT INTO `cities` VALUES (178, 12, 'لالی', NULL);
INSERT INTO `cities` VALUES (179, 12, 'مسجد سلیمان', NULL);
INSERT INTO `cities` VALUES (180, 12, 'هندیجان', NULL);
INSERT INTO `cities` VALUES (181, 13, 'ابهر', NULL);
INSERT INTO `cities` VALUES (182, 13, 'ایجرود', NULL);
INSERT INTO `cities` VALUES (183, 13, 'خدابنده', NULL);
INSERT INTO `cities` VALUES (184, 13, 'خرمدره', NULL);
INSERT INTO `cities` VALUES (185, 13, 'زنجان ', NULL);
INSERT INTO `cities` VALUES (186, 13, 'طارم', NULL);
INSERT INTO `cities` VALUES (187, 13, 'ماه‌نشان', NULL);
INSERT INTO `cities` VALUES (188, 14, 'دامغان', NULL);
INSERT INTO `cities` VALUES (189, 14, 'سمنان', NULL);
INSERT INTO `cities` VALUES (190, 14, 'شاهرود', NULL);
INSERT INTO `cities` VALUES (191, 14, 'گرمسار', NULL);
INSERT INTO `cities` VALUES (192, 14, 'مهدی‌شهر', NULL);
INSERT INTO `cities` VALUES (193, 15, 'ایرانشهر ', NULL);
INSERT INTO `cities` VALUES (194, 15, 'چابهار', NULL);
INSERT INTO `cities` VALUES (195, 15, 'خاش', NULL);
INSERT INTO `cities` VALUES (196, 15, 'دلگان', NULL);
INSERT INTO `cities` VALUES (197, 15, 'زابل', NULL);
INSERT INTO `cities` VALUES (198, 15, 'زاهدان', NULL);
INSERT INTO `cities` VALUES (199, 15, 'زهک', NULL);
INSERT INTO `cities` VALUES (200, 15, 'سراوان', NULL);
INSERT INTO `cities` VALUES (201, 15, 'سرباز', NULL);
INSERT INTO `cities` VALUES (202, 15, 'کنارک', NULL);
INSERT INTO `cities` VALUES (203, 15, 'نیک‌شهر', NULL);
INSERT INTO `cities` VALUES (204, 16, 'آباده ', NULL);
INSERT INTO `cities` VALUES (205, 16, 'ارسنجان', NULL);
INSERT INTO `cities` VALUES (206, 16, 'استهبان ', NULL);
INSERT INTO `cities` VALUES (207, 16, 'اقلید', NULL);
INSERT INTO `cities` VALUES (208, 16, 'بوانات', NULL);
INSERT INTO `cities` VALUES (209, 16, 'پاسارگاد', NULL);
INSERT INTO `cities` VALUES (210, 16, 'جهرم', NULL);
INSERT INTO `cities` VALUES (211, 16, 'خرم‌بید', NULL);
INSERT INTO `cities` VALUES (212, 16, 'خنج', NULL);
INSERT INTO `cities` VALUES (213, 16, 'داراب', NULL);
INSERT INTO `cities` VALUES (214, 16, 'زرین‌دشت', NULL);
INSERT INTO `cities` VALUES (215, 16, 'سپیدان', NULL);
INSERT INTO `cities` VALUES (216, 16, 'شیراز', NULL);
INSERT INTO `cities` VALUES (217, 16, 'فراشبند', NULL);
INSERT INTO `cities` VALUES (218, 16, 'فسا', NULL);
INSERT INTO `cities` VALUES (219, 16, 'فیروزآباد', NULL);
INSERT INTO `cities` VALUES (220, 16, 'قیر و کارزین', NULL);
INSERT INTO `cities` VALUES (221, 16, 'کازرون', NULL);
INSERT INTO `cities` VALUES (222, 16, 'لارستان', NULL);
INSERT INTO `cities` VALUES (223, 16, 'لامِرد', NULL);
INSERT INTO `cities` VALUES (224, 16, 'مرودشت ', NULL);
INSERT INTO `cities` VALUES (225, 16, 'ممسنی', NULL);
INSERT INTO `cities` VALUES (226, 16, 'مهر', NULL);
INSERT INTO `cities` VALUES (227, 16, 'نی‌ریز', NULL);
INSERT INTO `cities` VALUES (228, 17, 'آبیک', NULL);
INSERT INTO `cities` VALUES (229, 17, 'البرز', NULL);
INSERT INTO `cities` VALUES (230, 17, 'بوئین‌زهرا', NULL);
INSERT INTO `cities` VALUES (231, 17, 'تاکستان', NULL);
INSERT INTO `cities` VALUES (232, 17, 'قزوین', NULL);
INSERT INTO `cities` VALUES (233, 18, 'قم', NULL);
INSERT INTO `cities` VALUES (234, 19, 'بانه ', NULL);
INSERT INTO `cities` VALUES (235, 19, 'بیجار', NULL);
INSERT INTO `cities` VALUES (236, 19, 'دیواندره', NULL);
INSERT INTO `cities` VALUES (237, 19, 'سروآباد', NULL);
INSERT INTO `cities` VALUES (238, 19, 'سقز ', NULL);
INSERT INTO `cities` VALUES (239, 19, 'سنندج', NULL);
INSERT INTO `cities` VALUES (240, 19, 'قروه', NULL);
INSERT INTO `cities` VALUES (241, 19, 'کامیاران', NULL);
INSERT INTO `cities` VALUES (242, 19, 'مریوان', NULL);
INSERT INTO `cities` VALUES (243, 20, 'بافت', NULL);
INSERT INTO `cities` VALUES (244, 20, 'بردسیر', NULL);
INSERT INTO `cities` VALUES (245, 20, 'بم', NULL);
INSERT INTO `cities` VALUES (246, 20, 'جیرفت', NULL);
INSERT INTO `cities` VALUES (247, 20, 'راور', NULL);
INSERT INTO `cities` VALUES (248, 20, 'رفسنجان', NULL);
INSERT INTO `cities` VALUES (249, 20, 'رودبار جنوب', NULL);
INSERT INTO `cities` VALUES (250, 20, 'زرند', NULL);
INSERT INTO `cities` VALUES (251, 20, 'سیرجان', NULL);
INSERT INTO `cities` VALUES (252, 20, 'شهر بابک', NULL);
INSERT INTO `cities` VALUES (253, 20, 'عنبرآباد', NULL);
INSERT INTO `cities` VALUES (254, 20, 'قلعه گنج ', NULL);
INSERT INTO `cities` VALUES (255, 20, 'کرمان', NULL);
INSERT INTO `cities` VALUES (256, 20, 'کوهبنان', NULL);
INSERT INTO `cities` VALUES (257, 20, 'کهنوج', NULL);
INSERT INTO `cities` VALUES (258, 20, 'منوجان', NULL);
INSERT INTO `cities` VALUES (259, 21, 'اسلام‌آباد غرب', NULL);
INSERT INTO `cities` VALUES (260, 21, 'پاوه', NULL);
INSERT INTO `cities` VALUES (261, 21, 'ثلاث باباجانی', NULL);
INSERT INTO `cities` VALUES (262, 21, 'جوانرود', NULL);
INSERT INTO `cities` VALUES (263, 21, 'دالاهو', NULL);
INSERT INTO `cities` VALUES (264, 21, 'روانسر', NULL);
INSERT INTO `cities` VALUES (265, 21, 'سرپل ذهاب', NULL);
INSERT INTO `cities` VALUES (266, 21, 'سنقر', NULL);
INSERT INTO `cities` VALUES (267, 21, 'صحنه', NULL);
INSERT INTO `cities` VALUES (268, 21, 'قصر شیرین', NULL);
INSERT INTO `cities` VALUES (269, 21, 'کرمانشاه ', NULL);
INSERT INTO `cities` VALUES (270, 21, 'کنگاور', NULL);
INSERT INTO `cities` VALUES (271, 21, 'گیلان غرب', NULL);
INSERT INTO `cities` VALUES (272, 21, 'هرسین', NULL);
INSERT INTO `cities` VALUES (273, 22, 'بویراحمد', NULL);
INSERT INTO `cities` VALUES (274, 22, 'بهمئی', NULL);
INSERT INTO `cities` VALUES (275, 22, 'دنا', NULL);
INSERT INTO `cities` VALUES (276, 22, 'کهگیلویه', NULL);
INSERT INTO `cities` VALUES (277, 22, 'گچساران', NULL);
INSERT INTO `cities` VALUES (278, 23, 'آزادشهر', NULL);
INSERT INTO `cities` VALUES (279, 23, 'آزادشهر', NULL);
INSERT INTO `cities` VALUES (280, 23, 'آق‌قلا', NULL);
INSERT INTO `cities` VALUES (281, 23, 'بندر گز', NULL);
INSERT INTO `cities` VALUES (282, 23, 'ترکمن ', NULL);
INSERT INTO `cities` VALUES (283, 23, 'رامیان', NULL);
INSERT INTO `cities` VALUES (284, 23, 'علی‌آباد', NULL);
INSERT INTO `cities` VALUES (285, 23, 'کردکوی', NULL);
INSERT INTO `cities` VALUES (286, 23, 'کلاله', NULL);
INSERT INTO `cities` VALUES (287, 23, 'گرگان ', NULL);
INSERT INTO `cities` VALUES (288, 23, 'گنبد کاووس', NULL);
INSERT INTO `cities` VALUES (289, 23, 'مراوه‌تپه', NULL);
INSERT INTO `cities` VALUES (290, 23, 'مینودشت', NULL);
INSERT INTO `cities` VALUES (291, 24, 'آستارا', NULL);
INSERT INTO `cities` VALUES (292, 24, 'آستانه اشرفیه', NULL);
INSERT INTO `cities` VALUES (293, 24, 'اَملَش', NULL);
INSERT INTO `cities` VALUES (294, 24, 'بندر انزلی', NULL);
INSERT INTO `cities` VALUES (295, 24, 'رشت', NULL);
INSERT INTO `cities` VALUES (296, 24, 'رضوانشهر', NULL);
INSERT INTO `cities` VALUES (297, 24, 'رودبار', NULL);
INSERT INTO `cities` VALUES (298, 24, 'رودسر', NULL);
INSERT INTO `cities` VALUES (299, 24, 'سیاهکل', NULL);
INSERT INTO `cities` VALUES (300, 24, 'شَفت', NULL);
INSERT INTO `cities` VALUES (301, 24, 'صومعه‌سرا', NULL);
INSERT INTO `cities` VALUES (302, 24, 'طوالش', NULL);
INSERT INTO `cities` VALUES (303, 24, 'فومَن', NULL);
INSERT INTO `cities` VALUES (304, 24, 'لاهیجان ', NULL);
INSERT INTO `cities` VALUES (305, 24, 'لنگرود', NULL);
INSERT INTO `cities` VALUES (306, 24, 'ماسال', NULL);
INSERT INTO `cities` VALUES (307, 25, 'ازنا', NULL);
INSERT INTO `cities` VALUES (308, 25, 'اليگودرز', NULL);
INSERT INTO `cities` VALUES (309, 25, 'بروجرد', NULL);
INSERT INTO `cities` VALUES (310, 25, 'پل‌دختر', NULL);
INSERT INTO `cities` VALUES (311, 25, 'خرم‌آباد ', NULL);
INSERT INTO `cities` VALUES (312, 25, 'دورود', NULL);
INSERT INTO `cities` VALUES (313, 25, 'دلفان ', NULL);
INSERT INTO `cities` VALUES (314, 25, 'سلسله', NULL);
INSERT INTO `cities` VALUES (315, 25, 'کوهدشت', NULL);
INSERT INTO `cities` VALUES (316, 26, 'آمل', NULL);
INSERT INTO `cities` VALUES (317, 26, 'بابل', NULL);
INSERT INTO `cities` VALUES (318, 26, 'بابلسر', NULL);
INSERT INTO `cities` VALUES (319, 26, 'بهشهر', NULL);
INSERT INTO `cities` VALUES (320, 26, 'تنکابن', NULL);
INSERT INTO `cities` VALUES (321, 26, 'جويبار', NULL);
INSERT INTO `cities` VALUES (322, 26, 'چالوس', NULL);
INSERT INTO `cities` VALUES (323, 26, 'رامسر', NULL);
INSERT INTO `cities` VALUES (324, 26, 'ساري', NULL);
INSERT INTO `cities` VALUES (325, 26, 'سوادکوه ', NULL);
INSERT INTO `cities` VALUES (326, 26, 'قائم‌شهر', NULL);
INSERT INTO `cities` VALUES (327, 26, 'گلوگاه', NULL);
INSERT INTO `cities` VALUES (328, 26, 'محمودآباد', NULL);
INSERT INTO `cities` VALUES (329, 26, 'نکا', NULL);
INSERT INTO `cities` VALUES (330, 26, 'نور', NULL);
INSERT INTO `cities` VALUES (331, 26, 'نوشهر', NULL);
INSERT INTO `cities` VALUES (332, 27, 'آشتيان', NULL);
INSERT INTO `cities` VALUES (333, 27, 'اراک', NULL);
INSERT INTO `cities` VALUES (334, 27, 'تفرش', NULL);
INSERT INTO `cities` VALUES (335, 27, 'خمين', NULL);
INSERT INTO `cities` VALUES (336, 27, 'دليجان ', NULL);
INSERT INTO `cities` VALUES (337, 27, 'زرنديه', NULL);
INSERT INTO `cities` VALUES (338, 27, 'ساوه', NULL);
INSERT INTO `cities` VALUES (339, 27, 'شازند', NULL);
INSERT INTO `cities` VALUES (340, 27, 'کميجان', NULL);
INSERT INTO `cities` VALUES (341, 27, 'محلات', NULL);
INSERT INTO `cities` VALUES (342, 28, 'ابوموسي', NULL);
INSERT INTO `cities` VALUES (343, 28, 'بستک', NULL);
INSERT INTO `cities` VALUES (344, 28, 'بندر عباس', NULL);
INSERT INTO `cities` VALUES (345, 28, 'بندر لنگه', NULL);
INSERT INTO `cities` VALUES (346, 28, 'جاسک', NULL);
INSERT INTO `cities` VALUES (347, 28, 'حاجي‌آباد', NULL);
INSERT INTO `cities` VALUES (348, 28, 'خمير ', NULL);
INSERT INTO `cities` VALUES (349, 28, 'رودان', NULL);
INSERT INTO `cities` VALUES (350, 28, 'قشم', NULL);
INSERT INTO `cities` VALUES (351, 28, 'گاوبندي', NULL);
INSERT INTO `cities` VALUES (352, 28, 'ميناب', NULL);
INSERT INTO `cities` VALUES (353, 29, 'اسدآباد', NULL);
INSERT INTO `cities` VALUES (354, 29, 'بهار', NULL);
INSERT INTO `cities` VALUES (355, 29, 'تويسرکان', NULL);
INSERT INTO `cities` VALUES (356, 29, 'رزن ', NULL);
INSERT INTO `cities` VALUES (357, 29, 'کبودرآهنگ', NULL);
INSERT INTO `cities` VALUES (358, 29, 'ملاير', NULL);
INSERT INTO `cities` VALUES (359, 29, 'نهاوند', NULL);
INSERT INTO `cities` VALUES (360, 29, 'همدان', NULL);
INSERT INTO `cities` VALUES (361, 30, 'ابرکوه', NULL);
INSERT INTO `cities` VALUES (362, 30, 'اردکان', NULL);
INSERT INTO `cities` VALUES (363, 30, 'بافق ', NULL);
INSERT INTO `cities` VALUES (364, 30, 'تفت', NULL);
INSERT INTO `cities` VALUES (365, 30, 'خاتم', NULL);
INSERT INTO `cities` VALUES (366, 30, 'صدوق', NULL);
INSERT INTO `cities` VALUES (367, 30, 'طبس', NULL);
INSERT INTO `cities` VALUES (368, 30, 'مهريز', NULL);
INSERT INTO `cities` VALUES (369, 30, 'میبد', NULL);
INSERT INTO `cities` VALUES (370, 30, 'يزد', NULL);

SET FOREIGN_KEY_CHECKS = 1;
