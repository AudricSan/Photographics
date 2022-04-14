INSERT INTO `role` (`role_id`, `role_name`) VALUES
                   (NULL, 'admin'),
                   (NULL, 'editor'),
                   (NULL, 'photographer');

INSERT INTO `basicinfo` (`bi_id`, `bi_name`, `bi_content`) VALUES
                        (NULL, 'PhotographerName', 'AudricSan'),
                        (NULL, 'PhotographerAbout', 'content'),
                        (NULL, 'PhotographerMail', 'audricrosier@gmail.com'),

                        (NULL, 'facebook', ''),
                        (NULL, 'instagram', 'https://www.instagram.com/audric_san/'),
                        (NULL, 'twitch', 'https://www.twitch.tv/audric_san'),
                        (NULL, 'twitter', 'https://twitter.com/AudricSan'),
                        (NULL, 'linkedin', '');

INSERT INTO `picture` (`picture_id`, `picture_name`, `picture_description`, `picture_link`, `picture_tag`, `picture_sharable`) VALUES 
                      (NULL, 'testimg1', 'img description', '1.jpg', '0', '0'),
                      (NULL, 'testimg2', 'img description', '2.jpg', '0', '0'),
                      (NULL, 'testimg3', 'img description', '3.jpg', '0', '0'),
                      (NULL, 'testimg4', 'img description', '4.jpg', '0', '0'),
                      (NULL, 'testimg5', 'img description', '5.jpg', '0', '0'),
                      (NULL, 'testimg6', 'img description', '6.jpg', '0', '0');

INSERT INTO `picturetag` (`pt_id`, `pt_picture`, `pt_tag`) VALUES
                         (NULL, '1', '1'),
                         (NULL, '1', '1'),
                         (NULL, '5', '5'),
                         (NULL, '4', '5'),
                         (NULL, '3', '6'),
                         (NULL, '3', '6'),
                         (NULL, '2', '6'),
                         (NULL, '2', '6'),
                         (NULL, '2', '7'),
                         (NULL, '2', '7'),
                         (NULL, '6', '2'),
                         (NULL, '6', '2'),
                         (NULL, '2', '3');

INSERT INTO `tag` (`tag_id`, `tag_name`, `tag_description`) VALUES
                  (NULL, 'tag1', 'description'),
                  (NULL, 'tag2', 'description'),
                  (NULL, 'tag3', 'description'),
                  (NULL, 'tag4', 'description'),
                  (NULL, 'tag5', 'description'),
                  (NULL, 'tag6', 'description'),
                  (NULL, 'tag7', 'description');