<?php

use Symfony\Component\Translation\MessageCatalogue;

$catalogue = new MessageCatalogue('zh_CN', array (
  'validators' => 
  array (
    'This value should be false.' => '该变量的值应为 false 。',
    'This value should be true.' => '该变量的值应为 true 。',
    'This value should be of type {{ type }}.' => '该变量的类型应为 {{ type }} 。',
    'This value should be blank.' => '该变量值应为空。',
    'The value you selected is not a valid choice.' => '选定变量的值不是有效的选项。',
    'You must select at least {{ limit }} choice.|You must select at least {{ limit }} choices.' => '您至少要选择 {{ limit }} 个选项。',
    'You must select at most {{ limit }} choice.|You must select at most {{ limit }} choices.' => '您最多能选择 {{ limit }} 个选项。',
    'One or more of the given values is invalid.' => '一个或者多个给定的值无效。',
    'This field was not expected.' => '此字段是多余的。',
    'This field is missing.' => '此字段缺失。',
    'This value is not a valid date.' => '该值不是一个有效的日期（date）。',
    'This value is not a valid datetime.' => '该值不是一个有效的日期时间（datetime）。',
    'This value is not a valid email address.' => '该值不是一个有效的邮件地址。',
    'The file could not be found.' => '文件未找到。',
    'The file is not readable.' => '文件不可读。',
    'The file is too large ({{ size }} {{ suffix }}). Allowed maximum size is {{ limit }} {{ suffix }}.' => '文件太大 ({{ size }} {{ suffix }})。文件大小不可以超过 {{ limit }} {{ suffix }} 。',
    'The mime type of the file is invalid ({{ type }}). Allowed mime types are {{ types }}.' => '无效的文件类型 ({{ type }}) 。允许的文件类型有 {{ types }} 。',
    'This value should be {{ limit }} or less.' => '这个变量的值应该小于或等于 {{ limit }}。',
    'This value is too long. It should have {{ limit }} character or less.|This value is too long. It should have {{ limit }} characters or less.' => '字符串太长，长度不可超过 {{ limit }} 个字符。',
    'This value should be {{ limit }} or more.' => '该变量的值应该大于或等于 {{ limit }}。',
    'This value is too short. It should have {{ limit }} character or more.|This value is too short. It should have {{ limit }} characters or more.' => '字符串太短，长度不可少于 {{ limit }} 个字符。',
    'This value should not be blank.' => '该变量不应为空。',
    'This value should not be null.' => '该变量不应为 null 。',
    'This value should be null.' => '该变量应为空 null 。',
    'This value is not valid.' => '该变量值无效 。',
    'This value is not a valid time.' => '该值不是一个有效的时间。',
    'This value is not a valid URL.' => '该值不是一个有效的 URL 。',
    'The two values should be equal.' => '这两个变量的值应该相等。',
    'The file is too large. Allowed maximum size is {{ limit }} {{ suffix }}.' => '文件太大，文件大小不可以超过 {{ limit }} {{ suffix }}。 ',
    'The file is too large.' => '文件太大。',
    'The file could not be uploaded.' => '无法上传此文件。',
    'This value should be a valid number.' => '该值应该为有效的数字。',
    'This value is not a valid country.' => '该值不是有效的国家名。',
    'This file is not a valid image.' => '该文件不是有效的图片。',
    'This is not a valid IP address.' => '该值不是有效的IP地址。',
    'This value is not a valid language.' => '该值不是有效的语言名。',
    'This value is not a valid locale.' => '该值不是有效的区域值（locale）。',
    'This value is already used.' => '该值已经被使用。',
    'The size of the image could not be detected.' => '不能解析图片大小。',
    'The image width is too big ({{ width }}px). Allowed maximum width is {{ max_width }}px.' => '图片太宽 ({{ width }}px)，最大宽度为 {{ max_width }}px 。',
    'The image width is too small ({{ width }}px). Minimum width expected is {{ min_width }}px.' => '图片宽度不够 ({{ width }}px)，最小宽度为 {{ min_width }}px 。',
    'The image height is too big ({{ height }}px). Allowed maximum height is {{ max_height }}px.' => '图片太高 ({{ height }}px)，最大高度为 {{ max_height }}px 。',
    'The image height is too small ({{ height }}px). Minimum height expected is {{ min_height }}px.' => '图片高度不够 ({{ height }}px)，最小高度为 {{ min_height }}px 。',
    'This value should be the user\'s current password.' => '该变量的值应为用户当前的密码。',
    'This value should have exactly {{ limit }} character.|This value should have exactly {{ limit }} characters.' => '该变量应为 {{ limit }} 个字符。',
    'The file was only partially uploaded.' => '该文件的上传不完整。',
    'No file was uploaded.' => '没有上传任何文件。',
    'No temporary folder was configured in php.ini.' => 'php.ini 里没有配置临时文件目录。',
    'Cannot write temporary file to disk.' => '临时文件写入磁盘失败。',
    'A PHP extension caused the upload to fail.' => '某个 PHP 扩展造成上传失败。',
    'This collection should contain {{ limit }} element or more.|This collection should contain {{ limit }} elements or more.' => '该集合最少应包含 {{ limit }} 个元素。',
    'This collection should contain {{ limit }} element or less.|This collection should contain {{ limit }} elements or less.' => '该集合最多包含 {{ limit }} 个元素。',
    'This collection should contain exactly {{ limit }} element.|This collection should contain exactly {{ limit }} elements.' => '该集合应包含 {{ limit }} 个元素 element 。',
    'Invalid card number.' => '无效的信用卡号。',
    'Unsupported card type or invalid card number.' => '不支持的信用卡类型或无效的信用卡号。',
    'This is not a valid International Bank Account Number (IBAN).' => '该值不是有效的国际银行帐号（IBAN）。',
    'This value is not a valid ISBN-10.' => '该值不是有效的10位国际标准书号（ISBN-10）。',
    'This value is not a valid ISBN-13.' => '该值不是有效的13位国际标准书号（ISBN-13）。',
    'This value is neither a valid ISBN-10 nor a valid ISBN-13.' => '该值不是有效的国际标准书号（ISBN-10 或 ISBN-13）。',
    'This value is not a valid ISSN.' => '该值不是有效的国际标准期刊号（ISSN）。',
    'This value is not a valid currency.' => '该值不是有效的货币名（currency）。',
    'This value should be equal to {{ compared_value }}.' => '该值应等于 {{ compared_value }} 。',
    'This value should be greater than {{ compared_value }}.' => '该值应大于 {{ compared_value }} 。',
    'This value should be greater than or equal to {{ compared_value }}.' => '该值应大于或等于 {{ compared_value }} 。',
    'This value should be identical to {{ compared_value_type }} {{ compared_value }}.' => '该值应与 {{ compared_value_type }} {{ compared_value }} 相同。',
    'This value should be less than {{ compared_value }}.' => '该值应小于 {{ compared_value }} 。',
    'This value should be less than or equal to {{ compared_value }}.' => '该值应小于或等于 {{ compared_value }} 。',
    'This value should not be equal to {{ compared_value }}.' => '该值不应先等于 {{ compared_value }} 。',
    'This value should not be identical to {{ compared_value_type }} {{ compared_value }}.' => '该值不应与 {{ compared_value_type }} {{ compared_value }} 相同。',
    'The image ratio is too big ({{ ratio }}). Allowed maximum ratio is {{ max_ratio }}.' => '图片宽高比太大 ({{ ratio }})。允许的最大宽高比为 {{ max_ratio }}。',
    'The image ratio is too small ({{ ratio }}). Minimum ratio expected is {{ min_ratio }}.' => '图片宽高比太小 ({{ ratio }})。允许的最大宽高比为 {{ min_ratio }}。',
    'The image is square ({{ width }}x{{ height }}px). Square images are not allowed.' => '图片是方形的 ({{ width }}x{{ height }}px)。不允许使用方形的图片。',
    'The image is landscape oriented ({{ width }}x{{ height }}px). Landscape oriented images are not allowed.' => '图片是横向的 ({{ width }}x{{ height }}px)。不允许使用横向的图片。',
    'The image is portrait oriented ({{ width }}x{{ height }}px). Portrait oriented images are not allowed.' => '图片是纵向的 ({{ width }}x{{ height }}px)。不允许使用纵向的图片。',
    'An empty file is not allowed.' => '不允许使用空文件。',
    'The host could not be resolved.' => '主机名无法解析。',
    'This value does not match the expected {{ charset }} charset.' => '该值不符合 {{ charset }} 编码。',
    'This is not a valid Business Identifier Code (BIC).' => '这不是有效的业务标识符代码（BIC)。',
    'Error' => '错误',
    'This is not a valid UUID.' => '这不是有效的UUID。',
    'This value should be a multiple of {{ compared_value }}.' => '此值应为 {{ compared_value }} 的倍数。',
    'This Business Identifier Code (BIC) is not associated with IBAN {{ iban }}.' => '此业务标识符代码（BIC）与IBAN {{ iban }} 无关。',
    'This value should be valid JSON.' => '该值应该是有效的JSON。',
  ),
));

$catalogueZh = new MessageCatalogue('zh', array (
));
$catalogue->addFallbackCatalogue($catalogueZh);
$catalogueEn = new MessageCatalogue('en', array (
  'validators' => 
  array (
    'This value should be false.' => 'This value should be false.',
    'This value should be true.' => 'This value should be true.',
    'This value should be of type {{ type }}.' => 'This value should be of type {{ type }}.',
    'This value should be blank.' => 'This value should be blank.',
    'The value you selected is not a valid choice.' => 'The value you selected is not a valid choice.',
    'You must select at least {{ limit }} choice.|You must select at least {{ limit }} choices.' => 'You must select at least {{ limit }} choice.|You must select at least {{ limit }} choices.',
    'You must select at most {{ limit }} choice.|You must select at most {{ limit }} choices.' => 'You must select at most {{ limit }} choice.|You must select at most {{ limit }} choices.',
    'One or more of the given values is invalid.' => 'One or more of the given values is invalid.',
    'This field was not expected.' => 'This field was not expected.',
    'This field is missing.' => 'This field is missing.',
    'This value is not a valid date.' => 'This value is not a valid date.',
    'This value is not a valid datetime.' => 'This value is not a valid datetime.',
    'This value is not a valid email address.' => 'This value is not a valid email address.',
    'The file could not be found.' => 'The file could not be found.',
    'The file is not readable.' => 'The file is not readable.',
    'The file is too large ({{ size }} {{ suffix }}). Allowed maximum size is {{ limit }} {{ suffix }}.' => 'The file is too large ({{ size }} {{ suffix }}). Allowed maximum size is {{ limit }} {{ suffix }}.',
    'The mime type of the file is invalid ({{ type }}). Allowed mime types are {{ types }}.' => 'The mime type of the file is invalid ({{ type }}). Allowed mime types are {{ types }}.',
    'This value should be {{ limit }} or less.' => 'This value should be {{ limit }} or less.',
    'This value is too long. It should have {{ limit }} character or less.|This value is too long. It should have {{ limit }} characters or less.' => 'This value is too long. It should have {{ limit }} character or less.|This value is too long. It should have {{ limit }} characters or less.',
    'This value should be {{ limit }} or more.' => 'This value should be {{ limit }} or more.',
    'This value is too short. It should have {{ limit }} character or more.|This value is too short. It should have {{ limit }} characters or more.' => 'This value is too short. It should have {{ limit }} character or more.|This value is too short. It should have {{ limit }} characters or more.',
    'This value should not be blank.' => 'This value should not be blank.',
    'This value should not be null.' => 'This value should not be null.',
    'This value should be null.' => 'This value should be null.',
    'This value is not valid.' => 'This value is not valid.',
    'This value is not a valid time.' => 'This value is not a valid time.',
    'This value is not a valid URL.' => 'This value is not a valid URL.',
    'The two values should be equal.' => 'The two values should be equal.',
    'The file is too large. Allowed maximum size is {{ limit }} {{ suffix }}.' => 'The file is too large. Allowed maximum size is {{ limit }} {{ suffix }}.',
    'The file is too large.' => 'The file is too large.',
    'The file could not be uploaded.' => 'The file could not be uploaded.',
    'This value should be a valid number.' => 'This value should be a valid number.',
    'This file is not a valid image.' => 'This file is not a valid image.',
    'This is not a valid IP address.' => 'This is not a valid IP address.',
    'This value is not a valid language.' => 'This value is not a valid language.',
    'This value is not a valid locale.' => 'This value is not a valid locale.',
    'This value is not a valid country.' => 'This value is not a valid country.',
    'This value is already used.' => 'This value is already used.',
    'The size of the image could not be detected.' => 'The size of the image could not be detected.',
    'The image width is too big ({{ width }}px). Allowed maximum width is {{ max_width }}px.' => 'The image width is too big ({{ width }}px). Allowed maximum width is {{ max_width }}px.',
    'The image width is too small ({{ width }}px). Minimum width expected is {{ min_width }}px.' => 'The image width is too small ({{ width }}px). Minimum width expected is {{ min_width }}px.',
    'The image height is too big ({{ height }}px). Allowed maximum height is {{ max_height }}px.' => 'The image height is too big ({{ height }}px). Allowed maximum height is {{ max_height }}px.',
    'The image height is too small ({{ height }}px). Minimum height expected is {{ min_height }}px.' => 'The image height is too small ({{ height }}px). Minimum height expected is {{ min_height }}px.',
    'This value should be the user\'s current password.' => 'This value should be the user\'s current password.',
    'This value should have exactly {{ limit }} character.|This value should have exactly {{ limit }} characters.' => 'This value should have exactly {{ limit }} character.|This value should have exactly {{ limit }} characters.',
    'The file was only partially uploaded.' => 'The file was only partially uploaded.',
    'No file was uploaded.' => 'No file was uploaded.',
    'No temporary folder was configured in php.ini.' => 'No temporary folder was configured in php.ini, or the configured folder does not exist.',
    'Cannot write temporary file to disk.' => 'Cannot write temporary file to disk.',
    'A PHP extension caused the upload to fail.' => 'A PHP extension caused the upload to fail.',
    'This collection should contain {{ limit }} element or more.|This collection should contain {{ limit }} elements or more.' => 'This collection should contain {{ limit }} element or more.|This collection should contain {{ limit }} elements or more.',
    'This collection should contain {{ limit }} element or less.|This collection should contain {{ limit }} elements or less.' => 'This collection should contain {{ limit }} element or less.|This collection should contain {{ limit }} elements or less.',
    'This collection should contain exactly {{ limit }} element.|This collection should contain exactly {{ limit }} elements.' => 'This collection should contain exactly {{ limit }} element.|This collection should contain exactly {{ limit }} elements.',
    'Invalid card number.' => 'Invalid card number.',
    'Unsupported card type or invalid card number.' => 'Unsupported card type or invalid card number.',
    'This is not a valid International Bank Account Number (IBAN).' => 'This is not a valid International Bank Account Number (IBAN).',
    'This value is not a valid ISBN-10.' => 'This value is not a valid ISBN-10.',
    'This value is not a valid ISBN-13.' => 'This value is not a valid ISBN-13.',
    'This value is neither a valid ISBN-10 nor a valid ISBN-13.' => 'This value is neither a valid ISBN-10 nor a valid ISBN-13.',
    'This value is not a valid ISSN.' => 'This value is not a valid ISSN.',
    'This value is not a valid currency.' => 'This value is not a valid currency.',
    'This value should be equal to {{ compared_value }}.' => 'This value should be equal to {{ compared_value }}.',
    'This value should be greater than {{ compared_value }}.' => 'This value should be greater than {{ compared_value }}.',
    'This value should be greater than or equal to {{ compared_value }}.' => 'This value should be greater than or equal to {{ compared_value }}.',
    'This value should be identical to {{ compared_value_type }} {{ compared_value }}.' => 'This value should be identical to {{ compared_value_type }} {{ compared_value }}.',
    'This value should be less than {{ compared_value }}.' => 'This value should be less than {{ compared_value }}.',
    'This value should be less than or equal to {{ compared_value }}.' => 'This value should be less than or equal to {{ compared_value }}.',
    'This value should not be equal to {{ compared_value }}.' => 'This value should not be equal to {{ compared_value }}.',
    'This value should not be identical to {{ compared_value_type }} {{ compared_value }}.' => 'This value should not be identical to {{ compared_value_type }} {{ compared_value }}.',
    'The image ratio is too big ({{ ratio }}). Allowed maximum ratio is {{ max_ratio }}.' => 'The image ratio is too big ({{ ratio }}). Allowed maximum ratio is {{ max_ratio }}.',
    'The image ratio is too small ({{ ratio }}). Minimum ratio expected is {{ min_ratio }}.' => 'The image ratio is too small ({{ ratio }}). Minimum ratio expected is {{ min_ratio }}.',
    'The image is square ({{ width }}x{{ height }}px). Square images are not allowed.' => 'The image is square ({{ width }}x{{ height }}px). Square images are not allowed.',
    'The image is landscape oriented ({{ width }}x{{ height }}px). Landscape oriented images are not allowed.' => 'The image is landscape oriented ({{ width }}x{{ height }}px). Landscape oriented images are not allowed.',
    'The image is portrait oriented ({{ width }}x{{ height }}px). Portrait oriented images are not allowed.' => 'The image is portrait oriented ({{ width }}x{{ height }}px). Portrait oriented images are not allowed.',
    'An empty file is not allowed.' => 'An empty file is not allowed.',
    'The host could not be resolved.' => 'The host could not be resolved.',
    'This value does not match the expected {{ charset }} charset.' => 'This value does not match the expected {{ charset }} charset.',
    'This is not a valid Business Identifier Code (BIC).' => 'This is not a valid Business Identifier Code (BIC).',
    'Error' => 'Error',
    'This is not a valid UUID.' => 'This is not a valid UUID.',
    'This value should be a multiple of {{ compared_value }}.' => 'This value should be a multiple of {{ compared_value }}.',
    'This Business Identifier Code (BIC) is not associated with IBAN {{ iban }}.' => 'This Business Identifier Code (BIC) is not associated with IBAN {{ iban }}.',
    'This value should be valid JSON.' => 'This value should be valid JSON.',
    'This collection should contain only unique elements.' => 'This collection should contain only unique elements.',
    'This value should be positive.' => 'This value should be positive.',
    'This value should be either positive or zero.' => 'This value should be either positive or zero.',
    'This value should be negative.' => 'This value should be negative.',
    'This value should be either negative or zero.' => 'This value should be either negative or zero.',
    'This value is not a valid timezone.' => 'This value is not a valid timezone.',
    'This password has been leaked in a data breach, it must not be used. Please use another password.' => 'This password has been leaked in a data breach, it must not be used. Please use another password.',
    'This value should be between {{ min }} and {{ max }}.' => 'This value should be between {{ min }} and {{ max }}.',
    'This value is not a valid hostname.' => 'This value is not a valid hostname.',
    'The number of elements in this collection should be a multiple of {{ compared_value }}.' => 'The number of elements in this collection should be a multiple of {{ compared_value }}.',
    'This value should satisfy at least one of the following constraints:' => 'This value should satisfy at least one of the following constraints:',
    'Each element of this collection should satisfy its own set of constraints.' => 'Each element of this collection should satisfy its own set of constraints.',
  ),
  'KnpPaginatorBundle' => 
  array (
    'label_previous' => 'Previous',
    'label_next' => 'Next',
    'filter_searchword' => 'Searchword...',
  ),
));
$catalogueZh->addFallbackCatalogue($catalogueEn);

return $catalogue;
