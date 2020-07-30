CREATE TABLE `p_goods_video` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `goods_id` int(10) unsigned DEFAULT NULL COMMENT '商品ID',
  `path` varchar(256) COLLATE utf8mb4_bin DEFAULT NULL COMMENT '原视频文件',
  `m3u8` varchar(32) COLLATE utf8mb4_bin DEFAULT NULL COMMENT '转码后 m3u8文件路径',
  `status` tinyint(3) unsigned DEFAULT '0' COMMENT '0未转码 1转码中 2转码完成',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;
