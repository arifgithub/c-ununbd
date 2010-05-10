<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| SIG : Security Image Generator for CodeIgniter
|--------------------------------------------------------------------------
|
| Based on the one 
|  developped by : Baka Ebi (Stupid Shrimp)
|  you can find at : http://knide.dyquiangco.info/2007/09/28/captcha-for-code-igniter/#more-15
|
| Requirements:
| 1. Code Igniter framework (click here)
| 2. GD installed on your webserver
| 3. Session library is enabled on your ci controller or autoload
|
*/

/* $config['sig_image_type'] = 'png'; 
| 
| if you use a background image, specify the type of the image to use and to create.
| This system works only with PNG and JPEG images (extension '.png' and 'jpg').
| Specify thus here 'png' or 'jpeg' (! NOT 'jpg' or 'JPEG' or 'PNG').
| Default value : 'jpeg'.
*/
$config['sig_image_type'] = 'png';

/* $config['sig_image_path'] = 'path/to/background_image.png';
| 
| if you use a background image, specify how to access it.
| Do not use URL but path or relative path.
| Default value : (none).
*/
$config['sig_image_path'] = 'images/background_image.png';

/* $config['sig_image_width']  = 150;
|  $config['sig_image_heigth'] = 25;
|
| if you do not use a existing background image, specify the size of the image to build.
| Default values : 150 x 25.
*/
$config['sig_image_width']  = 150;
$config['sig_image_height'] = 30;

/* $config['sig_image_background_color_R'] = 255;
|  $config['sig_image_background_color_G'] = 255;
|  $config['sig_image_background_color_B'] = 255;
|
| If you do not use a existing background image, specify the background color (in RGB)
|  for the image to build.
| Specify the color value for R(ed), G(reen) and B(lue) 
|  in decimal (from 0 to 255) or in hexadecimal (from 0x00 to 0xFF).
| Default values : 255,255,255. 
*/
$config['sig_image_background_color_R'] = 0xff;
$config['sig_image_background_color_G'] = 0xff;
$config['sig_image_background_color_B'] = 0xff;

/* $config['sig_image_number_of_horizontal_jamming_lines'] = 0; 
|
| Jamming line are used to scramble OCR detection.
| Specify the number of horizontal jamming lines you want in the image.
| This number at zero (0) specify you do not want horizontal jamming lines.
| The maximum value of this number may not exceed the height of the image -1 divide in two.
| The positions of the jamming lines are automaticaly calculated.
| Default values : 0. 
*/
$config['sig_image_number_of_horizontal_jamming_lines'] = 0;

/* $config['sig_image_set_randomly_horizontal_jamming_lines'] = FALSE;
|
| Linked to the previous parameter, if horizontal jamming lines are used, indicate
|  that those lines have to be positionned randomly (true) or symetricaly (false).
| The avantage is you won't have following twice the same scrambling image.
| Attention, the lines stays strictly horizontaly (no angles - see further for angles lines).
| Attention, the possibility to have two or more lines on each other exist.
| Default values : TRUE. 
*/
$config['sig_image_set_randomly_horizontal_jamming_lines'] = FALSE;

/* $config['sig_image_number_of_vertical_jamming_lines'] = 0; 
|
| Jamming line are used to scramble OCR detection.
| Specify the number of vertical jamming lines you want in the image.
| This number at zero (0) specify you do not want vertical jamming lines.
| The maximum value of this number may not exceed the width of the image -1 divide in two.
| The positions of the jamming lines are automaticaly calculated.
| Default values : 0. 
*/
$config['sig_image_number_of_vertical_jamming_lines'] = 0;

/* $config['sig_image_set_randomly_vertical_jamming_lines'] = FALSE;
|
| Linked to the previous parameter, if vertical jamming lines are used, indicate
|  that those lines have to be positionned randomly (true) or symetricaly (false).
| The avantage is you won't have following twice the same scrambling image.
| Attention, the lines stays strictly verticaly (no angles - see further for angles lines).
| Attention, the possibility to have two or more lines on each other exist.
| Default values : TRUE. 
*/
$config['sig_image_set_randomly_vertical_jamming_lines'] = FALSE;

/* $config['sig_image_set_randomly_angle_jamming_lines'] = FALSE;  
|
| Linked to previous parameters, indicate, if the horizontal and vertical jamming lines 
|  have to be positionned randomly AND with different angles.
| That means thus they normally won't be parallel, that the horizontal lines always starts
|  from the left edge and ends on the right edge, and that the vertical lines always 
|  starts from the top edge and ends on the bottom edge.
| The avantage is you won't normaly have twice the same scrambling image.
| Default values : TRUE. 
*/
$config['sig_image_set_randomly_angle_jamming_lines'] = FALSE;

/* $config['sig_image_number_of_ellipse_jamming_lines'] = 0;  
|
| Jamming line are used to scramble OCR detection.
| Specify the number of elliptic jamming lines you want in the image.
| This number at zero (0) specify you do not want elliptic jamming lines.
| The maximum value of this number may not exceed the height of the image -1 divide in two.
| The first ellipse (idem number = 1) will take the maximum value of width and height.
| The positions of the jamming ellipses are automaticaly calculated.
| Default values : 0. 
*/
$config['sig_image_number_of_ellipse_jamming_lines'] = 0;

/* $config['sig_image_number_of_rectangle_jamming_lines'] = 0;  
|
| Jamming line are used to scramble OCR detection.
| Specify the number of rectangular jamming lines you want in the image.
| This number at zero (0) specify you do not want rectangular jamming lines.
| The maximum value of this number may not exceed the height of the image -1 divide in two.
| The first rectangle (idem number = 1) will take the maximum value of width and height.
| The positions of the jamming rectangles are automaticaly calculated.
| Default values : 0. 
*/
$config['sig_image_number_of_rectangle_jamming_lines'] = 0;

/* $config['sig_image_number_of_polygonal_jamming_lines'] = 3; 
|
| Jamming line are used to scramble OCR detection.
| Specify the number of polygonal jamming lines you want in the image.
| This number at zero (0) or lower than 3 specify you do not want polygonal jamming lines.
| The minimum value for this number is 3.
| The positions of the jamming lines are randomly calculated, what means you won't have
|  twice the same picture.
| Default values : 0. 
*/
$config['sig_image_number_of_polygonal_jamming_lines'] = 0;

/* $config['sig_image_lines_color_R'] = 0;
|  $config['sig_image_lines_color_G'] = 0;
|  $config['sig_image_lines_color_B'] = 0;
|
| Specify the color (in RGB) for the jamming lines to build in the image.
| Specify the color value for R(ed), G(reen) and B(lue) 
|  in decimal (from 0 to 255) or in hexadecimal (from 0x00 to 0xFF).
| Default values : 0,0,0. 
*/
$config['sig_image_jamming_lines_color_R'] = 0x00;
$config['sig_image_jamming_lines_color_G'] = 0x00;
$config['sig_image_jamming_lines_color_B'] = 0x00;

/* $config['sig_text_color_R'] = 0;
|  $config['sig_text_color_G'] = 0;
|  $config['sig_text_color_B'] = 0;
|
| Specify the color (in RGB) for the security code to build in the image.
| Specify the color value for R(ed), G(reen) and B(lue) 
|  in decimal (from 0 to 255) or in hexadecimal (from 0x00 to 0xFF).
| Default values : 0,0,0. 
*/
$config['sig_text_color_R'] = 0x00;
$config['sig_text_color_G'] = 0x00;
$config['sig_text_color_B'] = 0x00;

/* $config['sig_text_shadow_distance'] = 0;  
| 
| Specify the distance between the shadow text and the text.
| This number at zero (0) specify you do not want to shadow the text.
| The shadow character is used on each character and its position vary from 
|  left to right on the text character following the angle's random negative 
|  of positif value. 
| Default values : 0. 
*/
$config['sig_text_shadow_distance'] = 0;  

/* $config['sig_text_shadow_color_R'] = 255;
|  $config['sig_text_shadow_color_G'] = 255;
|  $config['sig_text_shadow_color_B'] = 255;
|
| Specify the color (in RGB) for the shadow of the security code text to build in the image.
| Specify the color value for R(ed), G(reen) and B(lue) 
|  in decimal (from 0 to 255) or in hexadecimal (from 0x00 to 0xFF).
| Default values : 255,255,255. 
*/
$config['sig_text_shadow_color_R'] = 0xff;
$config['sig_text_shadow_color_G'] = 0xff;
$config['sig_text_shadow_color_B'] = 0xff;

/* $config['sig_text_vspace'] = 1;
|
| Specify a vertical spacing border (like padding top and padding bottom) for the text.
| This enables you to align the text vertically and to prevent that it leave the image
|  following the (random) font size and the (random) angle.
| Default values : 1. 
*/
$config['sig_text_vspace'] = 1;

/* $config['sig_text_start_position'] = 0;
|
| Specify the horizontal position where text begin in the image.
| This is necessary following the random angle and the random size the character can take.
| Calculate a right start position so that the first character (and maybe the last one also)
|  won't be partialy out of the image (troncated).
| Default values : 0. 
*/
$config['sig_text_start_position'] = 0;

/* $config['sig_text_spacing'] = 0;
|
| Specify the spacing between the characters.
| This is necessary following the random angle and the random size the character can take.
| Calculate a correct spacing so that the characters don't touch each other
|  and that the last one won't be (partialy) out of the image (troncated).
| Default values : 0. 
*/
$config['sig_text_spacing'] = 0;

/* $config['sig_text_characters_string'] = '123456789abcdefghjkmnpqrstuvwxyz';
|
| Specify wich characters have to be used to build the security code.
| You'll bether not use special characters (/,*,$,%,@,...)
|  nor combinaison of confusing characters (0-o-O,1-l-L-i-I,g-9,...)
|  and this depend also on the font you will use.
| Default values : 1234567890. 
*/
$config['sig_text_characters_string'] = '123456789abcdefghjkmnpqrstuvwxyz';

/* $config['sig_text_number_of_characters'] = '4'; 
|
| Specify the number of characters that the code must contain.
| Default values : 4. 
*/
$config['sig_text_number_of_characters'] = '4';

/* $config['sig_text_font'] = '/path/to/arial.ttf';
| 
| Specify the style of characters to use. 
| Do not use URL but path or relative path.
| Default values : (system default). 
*/
$config['sig_text_font'] = 'system/fonts/texb.ttf';

/* $config['sig_text_font_size_min'] = 14;  
|  $config['sig_text_font_size_max'] = 16;  
| 
| Specify the sizes (minimum and maximum) to use for the characters.
| The size of the character to show will be randomly selected between those values. 
| Default values : 'none). 
*/
$config['sig_text_font_size_min'] = 14;  
$config['sig_text_font_size_max'] = 16;  

/* $config['sig_text_character_angle_min'] = -0;  
|  $config['sig_text_character_angle_max'] = +0;  
| 
| Specify the range of angle (minimum and maximum) to use to show each character.
| The angle of each character to show will be randomly selected between those values.
| The specified values must be in the range of -180 to 180. 
| Default values : 0,0. 
*/
$config['sig_text_character_angle_min'] = -0;  
$config['sig_text_character_angle_max'] = +0;  

?>
