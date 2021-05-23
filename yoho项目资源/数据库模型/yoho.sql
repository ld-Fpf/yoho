-- MySQL Script generated by MySQL Workbench
-- 01/19/15 17:05:32
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema yoho
-- -----------------------------------------------------
-- yoho数据库
DROP SCHEMA IF EXISTS `yoho` ;

-- -----------------------------------------------------
-- Schema yoho
--
-- yoho数据库
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `yoho` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `yoho` ;

-- -----------------------------------------------------
-- Table `yoho`.`yoho_admin_user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `yoho`.`yoho_admin_user` ;

CREATE TABLE IF NOT EXISTS `yoho`.`yoho_admin_user` (
  `user_id` INT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `username` VARCHAR(45) NOT NULL DEFAULT '' COMMENT '用户名',
  `password` CHAR(32) NOT NULL DEFAULT '' COMMENT '密码',
  `logintime` INT UNSIGNED NOT NULL DEFAULT 0 COMMENT '登陆时间',
  `loginip` VARCHAR(20) NOT NULL DEFAULT '' COMMENT '登录ip',
  PRIMARY KEY (`user_id`),
  UNIQUE INDEX `username_UNIQUE` (`username` ASC))
ENGINE = MyISAM
COMMENT = '管理员表';


-- -----------------------------------------------------
-- Table `yoho`.`yoho_user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `yoho`.`yoho_user` ;

CREATE TABLE IF NOT EXISTS `yoho`.`yoho_user` (
  `user_id` INT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '用户id',
  `username` VARCHAR(60) NULL COMMENT '用户名',
  `nickname` VARCHAR(60) NULL COMMENT '用户昵称',
  `password` CHAR(32) NOT NULL DEFAULT '' COMMENT '密码',
  `email` VARCHAR(60) NOT NULL DEFAULT '' COMMENT '邮箱',
  `address` VARCHAR(255) NULL COMMENT '地址',
  `mobile_phone` CHAR(11) NULL COMMENT '手机',
  `home_phone` VARCHAR(45) NULL COMMENT '固定电话',
  PRIMARY KEY (`user_id`),
  UNIQUE INDEX `username_UNIQUE` (`username` ASC),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC),
  UNIQUE INDEX `mobile_phone_UNIQUE` (`mobile_phone` ASC),
  UNIQUE INDEX `nickname_UNIQUE` (`nickname` ASC))
ENGINE = MyISAM
COMMENT = '用户表';


-- -----------------------------------------------------
-- Table `yoho`.`yoho_type`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `yoho`.`yoho_type` ;

CREATE TABLE IF NOT EXISTS `yoho`.`yoho_type` (
  `type_id` INT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '类型主键id',
  `name` VARCHAR(45) NOT NULL DEFAULT '' COMMENT '类型名称',
  PRIMARY KEY (`type_id`),
  UNIQUE INDEX `name_UNIQUE` (`name` ASC))
ENGINE = MyISAM
COMMENT = '类型表';


-- -----------------------------------------------------
-- Table `yoho`.`yoho_category`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `yoho`.`yoho_category` ;

CREATE TABLE IF NOT EXISTS `yoho`.`yoho_category` (
  `category_id` INT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `name` VARCHAR(45) NOT NULL DEFAULT '' COMMENT '分类名称',
  `pid` INT UNSIGNED NOT NULL DEFAULT 0 COMMENT '父级id',
  `sort` SMALLINT NULL DEFAULT 100 COMMENT '排序',
  `type_id` INT UNSIGNED NOT NULL COMMENT 'type表主键',
  `is_show` TINYINT UNSIGNED NOT NULL DEFAULT 0 COMMENT '是否显示',
  PRIMARY KEY (`category_id`),
  UNIQUE INDEX `name_UNIQUE` (`name` ASC),
  INDEX `fk_category_type1_idx` (`type_id` ASC))
ENGINE = MyISAM
COMMENT = '分类表';


-- -----------------------------------------------------
-- Table `yoho`.`yoho_brand`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `yoho`.`yoho_brand` ;

CREATE TABLE IF NOT EXISTS `yoho`.`yoho_brand` (
  `brand_id` INT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '品牌主键id',
  `name` VARCHAR(45) NOT NULL DEFAULT '' COMMENT '品牌名称',
  `logo` VARCHAR(100) NOT NULL DEFAULT '' COMMENT 'logo地址',
  `sort` CHAR(5) NOT NULL DEFAULT '' COMMENT '排序字段',
  `is_hot` TINYINT UNSIGNED NOT NULL DEFAULT 0 COMMENT '是否热门 默认为0',
  `category_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`brand_id`),
  UNIQUE INDEX `name_UNIQUE` (`name` ASC),
  INDEX `fk_yoho_brand_yoho_category1_idx` (`category_id` ASC))
ENGINE = MyISAM
COMMENT = '品牌表';


-- -----------------------------------------------------
-- Table `yoho`.`yoho_type_attr`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `yoho`.`yoho_type_attr` ;

CREATE TABLE IF NOT EXISTS `yoho`.`yoho_type_attr` (
  `taid` INT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `title` VARCHAR(60) NOT NULL DEFAULT '' COMMENT '属性名称',
  `show_type` CHAR(40) NOT NULL DEFAULT '' COMMENT '视图页显示类型\n0 文本框\n1 下拉列表框',
  `attr_type` TINYINT NOT NULL DEFAULT 0 COMMENT '属性类型：0表示属性、1表示规格',
  `type_id` INT UNSIGNED NOT NULL COMMENT '外键 type的主键',
  PRIMARY KEY (`taid`),
  UNIQUE INDEX `title_UNIQUE` (`title` ASC),
  INDEX `fk_type_attr_type_idx` (`type_id` ASC))
ENGINE = MyISAM
COMMENT = '类型属性表';


-- -----------------------------------------------------
-- Table `yoho`.`yoho_goods`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `yoho`.`yoho_goods` ;

CREATE TABLE IF NOT EXISTS `yoho`.`yoho_goods` (
  `good_id` INT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '主键',
  `name` VARCHAR(255) NOT NULL DEFAULT '' COMMENT '商品名称',
  `goods_sn` VARCHAR(45) NOT NULL DEFAULT '' COMMENT '货号',
  `unit` VARCHAR(10) NOT NULL DEFAULT '' COMMENT '单位',
  `marketprice` DECIMAL(7,3) NOT NULL DEFAULT 0 COMMENT '市场价',
  `shopprice` DECIMAL(7,3) NOT NULL DEFAULT 0 COMMENT '商城价',
  `number` INT UNSIGNED NOT NULL DEFAULT 0 COMMENT '总库存',
  `indexpic` VARCHAR(255) NOT NULL DEFAULT '' COMMENT '首页图片',
  `listpic` VARCHAR(255) NOT NULL DEFAULT '' COMMENT '列表图',
  `click` SMALLINT UNSIGNED NOT NULL DEFAULT 0 COMMENT '点击数',
  `addtime` INT UNSIGNED NOT NULL DEFAULT 0 COMMENT '上架时间',
  `type_id` INT UNSIGNED NOT NULL COMMENT '类型id',
  `category_id` INT UNSIGNED NOT NULL COMMENT '分类id',
  `brand_id` INT UNSIGNED NOT NULL COMMENT '品牌id',
  `admin_user_id` INT UNSIGNED NOT NULL COMMENT '管理员id',
  `is_new` TINYINT UNSIGNED NOT NULL DEFAULT 0 COMMENT '是否新品',
  `is_best` TINYINT UNSIGNED NOT NULL DEFAULT 0 COMMENT '是否精品',
  `is_hot` TINYINT UNSIGNED NOT NULL DEFAULT 0 COMMENT '是否热销',
  `is_show` TINYINT UNSIGNED NOT NULL DEFAULT 0 COMMENT '是否首页展示 0表示不展示',
  PRIMARY KEY (`good_id`),
  UNIQUE INDEX `name_UNIQUE` (`name` ASC),
  INDEX `fk_goods_type1_idx` (`type_id` ASC),
  INDEX `fk_goods_category1_idx` (`category_id` ASC),
  INDEX `fk_goods_brand1_idx` (`brand_id` ASC),
  INDEX `fk_goods_admin_user1_idx` (`admin_user_id` ASC))
ENGINE = MyISAM
COMMENT = '商品表';


-- -----------------------------------------------------
-- Table `yoho`.`yoho_goods_attr`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `yoho`.`yoho_goods_attr` ;

CREATE TABLE IF NOT EXISTS `yoho`.`yoho_goods_attr` (
  `gaid` INT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '主键',
  `avalue` VARCHAR(45) NOT NULL DEFAULT '' COMMENT '属性值',
  `taid` INT UNSIGNED NOT NULL COMMENT '类型属性id',
  `good_id` INT UNSIGNED NOT NULL COMMENT '商品id',
  `cid` INT UNSIGNED NOT NULL COMMENT '分类id',
  PRIMARY KEY (`gaid`),
  INDEX `fk_good_com_type_attr1_idx` (`taid` ASC),
  INDEX `fk_good_com_goods1_idx` (`good_id` ASC),
  INDEX `fk_yoho_good_attr_yoho_category1_idx` (`cid` ASC))
ENGINE = MyISAM
COMMENT = '商品属性表';


-- -----------------------------------------------------
-- Table `yoho`.`yoho_stock`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `yoho`.`yoho_stock` ;

CREATE TABLE IF NOT EXISTS `yoho`.`yoho_stock` (
  `stid` INT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '主键',
  `price` DECIMAL(7,3) NOT NULL DEFAULT 0 COMMENT '价格',
  `goods_sn` VARCHAR(20) NOT NULL DEFAULT '' COMMENT '货号',
  `stock` SMALLINT UNSIGNED NOT NULL DEFAULT 0 COMMENT '库存',
  `good_id` INT UNSIGNED NOT NULL COMMENT '商品id',
  PRIMARY KEY (`stid`),
  INDEX `fk_good_list_goods1_idx` (`good_id` ASC))
ENGINE = MyISAM
COMMENT = '货品列表';


-- -----------------------------------------------------
-- Table `yoho`.`yoho_goods_detail`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `yoho`.`yoho_goods_detail` ;

CREATE TABLE IF NOT EXISTS `yoho`.`yoho_goods_detail` (
  `gdid` INT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '主键',
  `small_pic` VARCHAR(255) NOT NULL DEFAULT '' COMMENT '小图图册',
  `mid_pic` VARCHAR(255) NOT NULL DEFAULT '' COMMENT '中图图册',
  `big_pic` VARCHAR(255) NOT NULL DEFAULT '' COMMENT '大图图册',
  `intro` TEXT NULL COMMENT '商品详细',
  `service` TEXT NULL COMMENT '售后服务',
  `good_id` INT UNSIGNED NOT NULL COMMENT '商品id',
  PRIMARY KEY (`gdid`),
  INDEX `fk_good_detail_goods1_idx` (`good_id` ASC))
ENGINE = MyISAM
COMMENT = '商品详细表';


-- -----------------------------------------------------
-- Table `yoho`.`yoho_comment`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `yoho`.`yoho_comment` ;

CREATE TABLE IF NOT EXISTS `yoho`.`yoho_comment` (
  `comid` INT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '主键',
  `title` VARCHAR(45) NOT NULL DEFAULT '' COMMENT '标题',
  `content` TEXT NULL COMMENT '内容',
  `level` TINYINT NOT NULL DEFAULT 0 COMMENT '星级',
  `addtime` INT UNSIGNED NOT NULL DEFAULT 0 COMMENT '评论时间',
  `state` TINYINT UNSIGNED NOT NULL DEFAULT 0 COMMENT '审核状态',
  `good_id` INT UNSIGNED NOT NULL COMMENT '商品id',
  `user_id` INT UNSIGNED NOT NULL COMMENT '用户id',
  PRIMARY KEY (`comid`),
  INDEX `fk_comment_goods1_idx` (`good_id` ASC),
  INDEX `fk_comment_user1_idx` (`user_id` ASC))
ENGINE = MyISAM
COMMENT = '评论表';


-- -----------------------------------------------------
-- Table `yoho`.`yoho_order`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `yoho`.`yoho_order` ;

CREATE TABLE IF NOT EXISTS `yoho`.`yoho_order` (
  `oid` INT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '主键',
  `ordernum` VARCHAR(45) NOT NULL DEFAULT '' COMMENT '订单号',
  `consignee` VARCHAR(45) NOT NULL DEFAULT '' COMMENT '收货人',
  `address` VARCHAR(255) NOT NULL DEFAULT '' COMMENT '地址',
  `tprice` DECIMAL(7,3) NOT NULL DEFAULT 0 COMMENT '价格总计',
  `addtime` INT UNSIGNED NOT NULL DEFAULT 0 COMMENT '生成时间',
  `remark` VARCHAR(45) NOT NULL DEFAULT '' COMMENT '备注',
  `state` ENUM('未付款','待发货','已发货','已完成') NULL COMMENT '状态',
  `user_id` INT UNSIGNED NOT NULL COMMENT '用户id',
  PRIMARY KEY (`oid`),
  INDEX `fk_order_user1_idx` (`user_id` ASC))
ENGINE = MyISAM
COMMENT = '订单表';


-- -----------------------------------------------------
-- Table `yoho`.`yoho_order_list`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `yoho`.`yoho_order_list` ;

CREATE TABLE IF NOT EXISTS `yoho`.`yoho_order_list` (
  `olid` INT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '主键',
  `count` SMALLINT NOT NULL DEFAULT 0 COMMENT '购买数量',
  `subprice` DECIMAL(7,3) NOT NULL DEFAULT 0 COMMENT '价格小计',
  `remark` VARCHAR(45) NOT NULL DEFAULT '' COMMENT '备注',
  `good_id` INT UNSIGNED NOT NULL COMMENT '商品id',
  `oid` INT UNSIGNED NOT NULL COMMENT '订单id',
  PRIMARY KEY (`olid`),
  INDEX `fk_order_list_goods1_idx` (`good_id` ASC),
  INDEX `fk_order_list_order1_idx` (`oid` ASC))
ENGINE = MyISAM
COMMENT = '订单列表';


-- -----------------------------------------------------
-- Table `yoho`.`yoho_attr_value`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `yoho`.`yoho_attr_value` ;

CREATE TABLE IF NOT EXISTS `yoho`.`yoho_attr_value` (
  `avid` INT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '主键',
  `attr_value` CHAR(30) NOT NULL DEFAULT '' COMMENT '属性值',
  `taid` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`avid`),
  INDEX `fk_yoho_attr_value_yoho_type_attr1_idx` (`taid` ASC))
ENGINE = MyISAM
COMMENT = '属性值表';


-- -----------------------------------------------------
-- Table `yoho`.`yoho_stock_attr`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `yoho`.`yoho_stock_attr` ;

CREATE TABLE IF NOT EXISTS `yoho`.`yoho_stock_attr` (
  `said` INT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '主键',
  `stid` INT UNSIGNED NOT NULL COMMENT '货品列表主键',
  `taid` INT UNSIGNED NOT NULL COMMENT '属性类型主键',
  `good_id` INT UNSIGNED NOT NULL COMMENT '商品主键',
  `cid` INT UNSIGNED NOT NULL COMMENT '分类主键',
  PRIMARY KEY (`said`),
  INDEX `fk_yoho_stock_attr_yoho_stock1_idx` (`stid` ASC),
  INDEX `fk_yoho_stock_attr_yoho_type_attr1_idx` (`taid` ASC),
  INDEX `fk_yoho_stock_attr_yoho_goods1_idx` (`good_id` ASC),
  INDEX `fk_yoho_stock_attr_yoho_category1_idx` (`cid` ASC))
ENGINE = MyISAM
COMMENT = '货品属性关联表';


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
