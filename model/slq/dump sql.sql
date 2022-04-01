ALTER TABLE `admin` ADD `admin_login` VARCHAR(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL AFTER `admin_role`;

INSERT INTO `role` (`role_id`, `role_name`) VALUES
                   (NULL, 'admin'),
                   (NULL, 'editor');

INSERT INTO `basicinfo` (`bi_id`, `bi_name`, `bi_content`) VALUES
                        (NULL, 'PhotographerName', 'AudricSan'),
                        (NULL, 'PhotographerAbout', 'content'),
                        (NULL, 'PhotographerMail', 'audricrosier@gmail.com'),

                        (NULL, 'facebook', ''),
                        (NULL, 'instagram', 'https://www.instagram.com/audric_san/'),
                        (NULL, 'twitch', 'https://www.twitch.tv/audric_san'),
                        (NULL, 'twitter', 'https://twitter.com/AudricSan'),
                        (NULL, 'linkedin', '');