<?php
return array (	
		//应用ID,您的APPID。
		'app_id' => "2016101800717623",

		//商户私钥，您的原始格式RSA私钥
		'merchant_private_key' =>"MIIEogIBAAKCAQEAhqk4trki4Z6WPyZIWRNAsyC/7gSrIQoB5u+r/M55zBPfdzgPK/bIMS2wF06EEBt8+0uGj66GXtQ3wG/tlwPG16baVAPlJJPGVWD9T1z20cSfGnEU3UBMhxYeNLOxDHbU3rex39SXj56wb5X3a6GADq1OQd6/rMfsbhSgM5S3NDw0g8exqXbnWPmuux7xeowF1B9TBL8aZzi/h/NgXPM5mAfsvMwB0UcWr65WizHNRdOpmrubuZYTwzuNLQhFind1rhWXIkHfz/FOScDTnqk+taINO42nQ/aisZjI1SL+6xyRSeuHzMKpH1o1NBjS2aG1lBYBegLhoxl2RJAyTFlDNQIDAQABAoIBAHsb/AB5E12nSX7kNeJRiqX4+97Tn8vtxT1mwhq2fX1IcdUhiCVOUUk8lq9IFc5QAxwOuS9kg+3wICQrb8/PIRuIrDOA+B1PiFQH/q1utSujkT1wQn3fydb6LpVJ7kQR45zV3aVfS0x+7JinRvK8TEGeyVvJE/0XLZyZ+LgPbsouKETVy9x7VjrXxcB65Ieisiz/dBrYG8gu/k7K8Ce0K+o+25J2vEP6/hEqZY67j/GDEYk2BDuyzWTYPdkLHr2026NLtKGyFoRwp3eB1A8JoVsqVIitB5jy7JpN2wAAcXl4tisvXRSWkxZ6ExGxOUygPzNW4eNi04ECVAcFPSYd5GECgYEAxYTOAgm2gTSiKaeeBTjlJWIfE/+40y9B8yebHXxeFDs2fx0MRjCzeXUluAg0WHCL3SGepEHhfxMgwX/oRrl/dlfxjnY5ZxZ4jX7Dgs2TMxIaY8yU0GavnsvLbYkddDOLmRPLfReJlYNWeAM7ltOYIKjfMzSsuJzvdKMBFJ/eonkCgYEArogH9U1nD9qGv3hp+EPKobS8960/xxzYl6bi5f1oxE9reBYnO28eaLQT5wlJEEQL4L3fJaX7qmhb1P1VJiBEklWgZnX0WJ31e5QVdEJwPJM7GJNQOUuLp3O+hlQATkVw7yu5HGJku3v/mK+NqMyTV+6InDpEZQ52YY5yL0I8150CgYBlLMvhm1wS/wT51VRKVIR8C7Djq5/e/VwI04bPKb9/GX2myxhYc+XbFzjE9d7qVmwuT2RVuzFoyEGFHKG8aJRz6ERhtwlcVtRVllNLk0YNaP5/lHG99nuLGdUQPKYLucOOG+emIgJlxarrOqyxa52HTTlXn2nB/xFha4XILMP78QKBgCLAMR11mPS+JSBQoIDvNpR2AT4rf8xsgO/JKdpzV33m9lYFyy/5Uwuz91aEMckMU3UfOSQs5WwrtUU2X9Lkj+K3K+XazJkscml1tcPdSq20/wpIoquV0Cu6TxA9/4WWLANjKEtvh/EQonbLVaBrg1b5xrecnmuksouAKlogjS69AoGAGhODqRz/06YlZh+mIJCw+oDl3d2p6ASZKQXwuwjxBnhWuDzc4o9/ZuhCfpl9f/3MHghWFspg2TWguKH0shjOUQIG66Oa11FDClVijL8mNfYz+N9T2BaArYwEhoAzYQwJOohF7uXwocf3g4KylNsEPezUxsUHX28qbxCkCDLr2P0=",
		
		//异步通知地址
		'notify_url' => "http://工程公网访问地址/alipay.trade.wap.pay-PHP-UTF-8/notify_url.php",
		
		//同步跳转
		'return_url' => "http://www.blog.com/return_url",

		//编码格式
		'charset' => "UTF-8",

		//签名方式
		'sign_type'=>"RSA2",

		//支付宝网关
		'gatewayUrl' => "https://openapi.alipaydev.com/gateway.do",

		//支付宝公钥,查看地址：https://openhome.alipay.com/platform/keyManage.htm 对应APPID下的支付宝公钥。
		'alipay_public_key' =>"MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAhscH8zp7hTf1ITTBzKq11iICDRi5QbELCthsJgZWnysaaELh3CfSLQ+tivoBrNCpG3Zj1q1DVo1AOIq4RjPbYXF1ItZ6tqiuRwlTeQihcQIJbigt2N9cKvoQjCgB3vErhJuq/C3EhbB5kFcCj+dTSgtk4BFsLoZHAhR1TuA8q5bRZOAJLeo/cv8CH770VSfzzF+pyRHBIordhMt0tIrtBUMTiMJbovF8TO/ki6Cb60/vr0LCWcPljtdWcCtOzYhkJVBTKUbyLgdwJPp+wJodd1JoLAZ4Iig/vz1+gLAhaUU6A1efReDPKRZMGmmaPHhXRXUyY7mJ5pWCqWVyvUQI2wIDAQAB",
		
	
);