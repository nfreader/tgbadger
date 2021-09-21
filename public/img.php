<?php require_once('../config.php');
error_reporting(0);

header('Content-Type: application/json');
define("ICON_PATH", OUTPUT_DIR."/mob");
define("BIO_RESOURCES", __DIR__.'/resources/bio/');
define("CONSOLAS_FONT", BIO_RESOURCES.'/cascadia.otf');

$args = [
  'bg' => [
    'filter' => FILTER_SANITIZE_STRING,
    'flags' => FILTER_FLAG_STRIP_HIGH
  ],
  'dir' => [
    'filter' => FILTER_VALIDATE_INT,
    'options' => [
      'min' => 0,
      'max' => 3,
      'default' => 0
    ]
  ],
  'species' => [
    'filter' => FILTER_SANITIZE_STRING,
    'flags' => FILTER_FLAG_STRIP_HIGH
  ],
  'gender' => [
    'filter' => FILTER_SANITIZE_STRING,
    'flags' => FILTER_FLAG_STRIP_HIGH
  ],
  'skinTone' => [
    'filter' => FILTER_SANITIZE_STRING,
    'flags' => FILTER_FLAG_STRIP_HIGH
  ],
  'eyeColor' => [
    'filter' => FILTER_SANITIZE_STRING,
    'flags' => FILTER_FLAG_STRIP_HIGH
  ],
  'hairStyle' => [
    'filter' => FILTER_SANITIZE_STRING,
    'flags' => FILTER_FLAG_STRIP_HIGH
  ],
  'hairColor' => [
    'filter' => FILTER_SANITIZE_STRING,
    'flags' => FILTER_FLAG_STRIP_HIGH
  ],
  'eyeWear' => [
    'filter' => FILTER_SANITIZE_STRING,
    'flags' => FILTER_FLAG_STRIP_HIGH
  ],
  'mask' => [
    'filter' => FILTER_SANITIZE_STRING,
    'flags' => FILTER_FLAG_STRIP_HIGH
  ],
  'uniform' => [
    'filter' => FILTER_SANITIZE_STRING,
    'flags' => FILTER_FLAG_STRIP_HIGH
  ],
  'suit' => [
    'filter' => FILTER_SANITIZE_STRING,
    'flags' => FILTER_FLAG_STRIP_HIGH
  ],
  'head' => [
    'filter' => FILTER_SANITIZE_STRING,
    'flags' => FILTER_FLAG_STRIP_HIGH
  ],
  'belt' => [
    'filter' => FILTER_SANITIZE_STRING,
    'flags' => FILTER_FLAG_STRIP_HIGH
  ],
  'gloves' => [
    'filter' => FILTER_SANITIZE_STRING,
    'flags' => FILTER_FLAG_STRIP_HIGH
  ],
  'shoes' => [
    'filter' => FILTER_SANITIZE_STRING,
    'flags' => FILTER_FLAG_STRIP_HIGH
  ],
  'lhand' => [
    'filter' => FILTER_SANITIZE_STRING,
    'flags' => FILTER_FLAG_STRIP_HIGH
  ],
  'rhand' => [
    'filter' => FILTER_SANITIZE_STRING,
    'flags' => FILTER_FLAG_STRIP_HIGH
  ],
  'back' => [
    'filter' => FILTER_SANITIZE_STRING,
    'flags' => FILTER_FLAG_STRIP_HIGH
  ],
  'neck' => [
    'filter' => FILTER_SANITIZE_STRING,
    'flags' => FILTER_FLAG_STRIP_HIGH
  ],
  'text1' => [
    'filter' => FILTER_SANITIZE_STRING,
    'flags' => FILTER_FLAG_STRIP_HIGH
  ],
  'text2' => [
    'filter' => FILTER_SANITIZE_STRING,
    'flags' => FILTER_FLAG_STRIP_HIGH
  ],
  'text3' => [
    'filter' => FILTER_SANITIZE_STRING,
    'flags' => FILTER_FLAG_STRIP_HIGH
  ],
  'stamp' => [
    'filter' => FILTER_SANITIZE_STRING,
    'flags' => FILTER_FLAG_STRIP_HIGH
  ],
];

$data = (object) filter_input_array(INPUT_POST, $args, true);

$default = new stdClass;
$default->bg        = 'default';
$default->dir       = 0;
$default->species   = 'human';
$default->gender    = 'male';
$default->skinTone  = 'caucasian1';
$default->eyeColor  = '#6aa84f';
$default->hairStyle = 'bald_s';
$default->eyeWear   = false;
$default->mask      = false;
$default->uniform   = 'grey_s';
$default->suit      = false;
$default->head      = false;
$default->belt      = false;
$default->gloves    = false;
$default->shoes     = false;
$default->lhand     = false;
$default->rhand     = false;
$default->back      = false;
$default->neck      = false;
$default->text1     = "A. Spaceman";
$default->text2     = "Bottom Text";
$default->text3     = "Employee of Nanotrasen";
$default->stamp     = false;

foreach ($data as $k => $v) {
    if (empty($data->$k) || !isset($data->$k)) {
        $data->$k = $default->$k;
    }
}


//DIMENSIONS AND DEFAULTS
$bioW = 320;
$bioH = 65;

$mugshot_offset_x = 10;
$mugshot_offset_y = 13;

$pixelxoffset = 0;
$pixelyoffset = 0;

//Instantiate our image
$image = imagecreatetruecolor($bioW, $bioH);
imagesavealpha($image, true);
$alpha = imagecolorallocatealpha($image, 0, 0, 0, 127);
imagefill($image, 0, 0, $alpha);

//BIO BACKGROUND IMAGE
$useborder = false;
switch ($data->bg) {
  case 'default':
  default:
    $bg = BIO_RESOURCES."/bg/$data->bg.png";
    $text_color_title = imagecolorallocate($image, 0x3b, 0x3b, 0x3b);
    $text_color_title_b = imagecolorallocate($image, 0x93, 0x93, 0x93);
    $text_color1 = imagecolorallocate($image, 0x3b, 0x3b, 0x3b);
    $text_color1_b = imagecolorallocate($image, 0x93, 0x93, 0x93);
    $text_color2 = imagecolorallocate($image, 0x93, 0x93, 0x93);
    $text_color2_b = imagecolorallocate($image, 0x3b, 0x3b, 0x3b);
    $useborder = 1;
  break;

  case 'head':
    $bg = BIO_RESOURCES."/bg/$data->bg.png";
    $text_color_title = imagecolorallocate($image, 0xf5, 0xce, 0x68);
    $text_color_title_b = imagecolorallocate($image, 0x93, 0x93, 0x93);
    $text_color1 = imagecolorallocate($image, 0xf5, 0xce, 0x68);
    $text_color1_b = imagecolorallocate($image, 0x93, 0x93, 0x93);
    $text_color2 = imagecolorallocate($image, 0x93, 0x93, 0x93);
    $text_color2_b = imagecolorallocate($image, 0x3b, 0x3b, 0x3b);
    $useborder = 1;
  break;

  case 'centcom':
    $bg = BIO_RESOURCES."/bg/$data->bg.png";
    $text_color_title = imagecolorallocate($image, 0x5d, 0x00, 0x00);
    $text_color_title_b = imagecolorallocate($image, 0x93, 0x93, 0x93);
    $text_color1 = imagecolorallocate($image, 0x5d, 0x00, 0x00);
    $text_color1_b = imagecolorallocate($image, 0x93, 0x93, 0x93);
    $text_color2 = imagecolorallocate($image, 0x93, 0x93, 0x93);
    $text_color2_b = imagecolorallocate($image, 0x3b, 0x3b, 0x3b);
    $useborder = 1;
  break;

  case 'ocean':
    $bg = BIO_RESOURCES."/bg/$data->bg.png";
    $text_color_title = imagecolorallocate($image, 0xb7, 0xba, 0xce);
    $text_color1 = imagecolorallocate($image, 0xc8, 0xca, 0xd9);
    $text_color2 = imagecolorallocate($image, 0xb7, 0xba, 0xce);
  break;

  case 'lava':
    $bg = BIO_RESOURCES."/bg/$data->bg.png";
    $text_color_title = imagecolorallocate($image, 0xC4, 0xDF, 0xE1);
    $text_color1 = imagecolorallocate($image, 0xFF, 0xFF, 0xFF);
    $text_color2 = imagecolorallocate($image, 0xC4, 0xDF, 0xE1);
  break;

  case 'old':
    $bg = BIO_RESOURCES."/bg/$data->bg.png";
    $text_color_title = imagecolorallocate($image, 0xC4, 0xDF, 0xE1);
    $text_color1 = imagecolorallocate($image, 0xFF, 0xFF, 0xFF);
    $text_color2 = imagecolorallocate($image, 0xC4, 0xDF, 0xE1);
  break;

  case 'ice':
    $bg = BIO_RESOURCES."/bg/$data->bg.png";
    $text_color_title = imagecolorallocate($image, 0x3e, 0x46, 0x7a);
    $text_color1 = imagecolorallocate($image, 0x59, 0x64, 0xab);
    $text_color2 = imagecolorallocate($image, 0x3e, 0x46, 0x7a);
  break;

  case 'captain':
    $bg = BIO_RESOURCES."/bg/$data->bg.png";
    $text_color_title = imagecolorallocate($image, 0x4a, 0x38, 0x00);
    $text_color1 = imagecolorallocate($image, 0x4a, 0x38, 0x00);
    $text_color2 = imagecolorallocate($image, 0x6a, 0x55, 0x00);
    $data->text1 = strtoupper($data->text1);
  break;
}
if (file_exists($bg)) {
    $image = imagecreatefrompng($bg);
    imagesavealpha($image, true);
}

//MUGSHOT SQUARE
$mughostbgcolor = imagecolorallocate($image, 0xB0, 0xB0, 0xB0);
imagefilledrectangle($image, $mugshot_offset_x+$pixelxoffset, $mugshot_offset_y+$pixelyoffset - 3, $mugshot_offset_x+$pixelxoffset + 45-1, $mugshot_offset_y+$pixelyoffset + 42-1, $mughostbgcolor);

//BIO SPECIES
$clothing = true;
$path = ICON_PATH."/human_parts_greyscale";

function getSpeciesSprites($species, $gender='male', $dir='0', $path)
{
    $sprites = array(
    "rArm"=>"$path/".$species."_r_arm-$dir.png",
    "lArm"=>"$path/".$species."_l_arm-$dir.png",
    "lLeg"=>"$path/".$species."_l_leg-$dir.png",
    "rLeg"=>"$path/".$species."_r_leg-$dir.png",
    "rHand"=>"$path/".$species."_r_hand-$dir.png",
    "lHand"=>"$path/".$species."_l_hand-$dir.png",
  );
    if ($gender == 'male') {
        $sprites["head"] = "$path/".$species."_head_m-$dir.png";
        $sprites["chest"] = "$path/".$species."_chest_m-$dir.png";
    } else {
        $sprites["head"]  = "$path/".$species."_head_f-$dir.png";
        $sprites["chest"] = "$path/".$species."_chest_f-$dir.png";
    }
    return $sprites;
}

$humanSkinTones = array(
  'caucasian1'=>'#ffe0d1',
  'caucasian2'=>'#fcccb3',
  'caucasian3'=>'#e8b59b',
  'latino'=>'#d9ae96',
  'mediterranean'=>'#c79b8b',
  'asian1'=>'#ffdeb3',
  'asian2'=>'#e3ba84',
  'arab'=>'#c4915e',
  'indian'=>'#b87840',
  'african1'=>'#754523',
  'african2'=>'#471c18',
  'albino'=>'#fff4e6',
  'orange'=>'#ffc905',
);

//SET UP THE BASE MOB
$sprites = getSpeciesSprites($data->species, $data->gender, $data->dir, $path);
//SPECIES SPECIFIC SETTINGS
switch ($data->species) {
  case 'human':
  default:
    $species = 'human';
    $skinToneOpacity = 50;
  break;

  case 'lizard':
    $species = 'lizard';
    // $skinToneOpacity = 50;
  break;

  case 'pod':
    $species = 'pod';
    // $skinToneOpacity = 50;
  break;

  case 'jelly':
    $species = 'jelly';
    // $skinToneOpacity = 50;
  break;

  case 'slime':
    $species = 'slime';
    // $skinToneOpacity = 50;
  break;

  case 'golem':
    $species = 'golem';
    // $skinToneOpacity = 50;
  break;

  case 'snail':
    $species = 'snail';
    // $skinToneOpacity = 50;
    //No gender for these sprites
    $sprites['chest'] = "$path/snail_chest-$data->dir.png";
    $sprites['head'] = "$path/snail_head-$data->dir.png";
  break;

  case 'plant':
    $species = 'plant';
    $skinToneOpacity = 50;
  break;

  case 'mush':
    $species = 'mush';
    // $skinToneOpacity = 50;
  break;

  case 'ethereal':
    $species = 'ethereal';
    // $skinToneOpacity = 50;
  break;

  case 'stargazer':
    $species = 'stargazer';
    // $skinToneOpacity = 50;
  break;

  case 'moth':
    $sprites = getSpeciesSprites('moth', $data->gender, $data->dir, ICON_PATH."/human_parts");
  break;

  case 'fly':
    $sprites = getSpeciesSprites('fly', $data->gender, $data->dir, ICON_PATH."/human_parts");
  break;

  case 'plasmaman':
    $sprites = getSpeciesSprites('plasmaman', $data->gender, $data->dir, ICON_PATH."/human_parts");
    $sprites['chest'] = ICON_PATH."/human_parts/plasmaman_chest-$data->dir.png";
    $sprites['head'] = ICON_PATH."/human_parts/plasmaman_head-$data->dir.png";
  break;

}

if (!$clothing) {
    //SKIP MOB SETUP AND JUST RENDER THAT MOTHERFUCKER
    $body = imagecreatefrompng($body);
    imagesavealpha($body, true);
} else {
    //Create the canvas for the mob
    $body = imagecreatetruecolor(32, 32);
    imagesavealpha($body, true);
    $alpha = imagecolorallocatealpha($body, 0, 0, 0, 127);
    imagefill($body, 0, 0, $alpha);

    $head  = imagecreatefrompng($sprites['head']);
    $chest = imagecreatefrompng($sprites['chest']);
    $rArm  = imagecreatefrompng($sprites['rArm']);
    $lArm  = imagecreatefrompng($sprites['lArm']);
    $lLeg  = imagecreatefrompng($sprites['lLeg']);
    $rLeg  = imagecreatefrompng($sprites['rLeg']);
    $rHand  = imagecreatefrompng($sprites['rHand']);
    $lHand  = imagecreatefrompng($sprites['lHand']);

    if (null != $head) {
        imagecopy($body, $head, 0, 0, 0, 0, 32, 32);
    }
    imagedestroy($head);
    if (null != $chest) {
        imagecopy($body, $chest, 0, 0, 0, 0, 32, 32);
    }
    imagedestroy($chest);
    if (null != $rArm) {
        imagecopy($body, $rArm, 0, 0, 0, 0, 32, 32);
    }
    imagedestroy($rArm);
    if (null != $lArm) {
        imagecopy($body, $lArm, 0, 0, 0, 0, 32, 32);
    }
    imagedestroy($lArm);
    if (null != $lLeg) {
        imagecopy($body, $lLeg, 0, 0, 0, 0, 32, 32);
    }
    imagedestroy($lLeg);
    if (null != $rLeg) {
        imagecopy($body, $rLeg, 0, 0, 0, 0, 32, 32);
    }
    imagedestroy($rLeg);
    if (null != $rHand) {
        imagecopy($body, $rHand, 0, 0, 0, 0, 32, 32);
    }
    imagedestroy($rHand);
    if (null != $lHand) {
        imagecopy($body, $lHand, 0, 0, 0, 0, 32, 32);
    }
    imagedestroy($lHand);


    //SET SKIN TONE
    $skinTone = $humanSkinTones[$data->skinTone];
    $skinTone = str_replace('#', '', $skinTone);
    $skinTone = str_split($skinTone, 2);
    foreach ($skinTone as &$c) {
        $c = 255 - hexdec($c);
    }

    imagefilter($body, IMG_FILTER_NEGATE);
    imagefilter($body, IMG_FILTER_COLORIZE, $skinTone[0], $skinTone[1], $skinTone[2], $skinToneOpacity);
    imagefilter($body, IMG_FILTER_NEGATE);

    //SET EYE COLOR
    $eyeColor = str_replace('#', '', $data->eyeColor);
    $eyeColor = str_split($eyeColor, 2);
    foreach ($eyeColor as &$c) {
        $c = hexdec($c);
    }
    $eyeColor = imagecolorallocate($body, $eyeColor[0], $eyeColor[1], $eyeColor[2]);
    switch ($data->dir) {
    case '0':
    default:
      imagefilledrectangle($body, 14, 6, 14, 6, $eyeColor);//Left
      imagefilledrectangle($body, 16, 6, 16, 6, $eyeColor);//Right
    break;

    case '1':
      // imagefilledrectangle($body, 14, 6, 14, 6, $eyeColor);//Left
      // imagefilledrectangle($body, 16, 6, 16, 6, $eyeColor);//Right
    break;

    case '2':
      imagefilledrectangle($body, 18, 6, 18, 6, $eyeColor);
    break;

    case '3':
      imagefilledrectangle($body, 13, 6, 13, 6, $eyeColor);
    break;
  }

    //HAIR
    if ('human' === $species || ($data->hairStyle == 'debrained' && $clothing)) {
        $hair  = imagecreatefrompng(ICON_PATH."/human_face/".$data->hairStyle."-".$data->dir.".png");
        //HAIR COLOR
        $hairColor = str_replace('#', '', $data->hairColor);
        $output['hairColor'] = $hairColor;
        $hairColor = str_split($hairColor, 2);
        foreach ($hairColor as &$c) {
            $c = 255 - hexdec($c);
        }
        imagefilter($hair, IMG_FILTER_NEGATE);
        imagefilter($hair, IMG_FILTER_COLORIZE, $hairColor[0], $hairColor[1], $hairColor[2], 0);
        imagefilter($hair, IMG_FILTER_NEGATE);

        if (null != $hair) {
            imagecopy($body, $hair, 0, 0, 0, 0, 32, 32);
        }
        imagedestroy($hair);
    }

    //EYEWEAR
    if ($clothing && $data->eyeWear) {
        $eyeWear = imagecreatefrompng(ICON_PATH."/clothing/eyes/".$data->eyeWear."-".$data->dir.".png");
        $output['eyes'] = ICON_PATH."/eyes/".$data->eyeWear."-".$data->dir.".png";
        if (null != $eyeWear) {
            imagecopy($body, $eyeWear, 0, 0, 0, 0, 32, 32);
        }
        imagedestroy($eyeWear);
    }

    //MASK
    if ($clothing && $data->mask) {
        $mask = imagecreatefrompng(ICON_PATH."/clothing/mask/".$data->mask."-".$data->dir.".png");
        if (null != $mask) {
            imagecopy($body, $mask, 0, 0, 0, 0, 32, 32);
        }
        imagedestroy($mask);
    }

    //UNIFORM
    if ($clothing && $data->uniform) {
        $uniform = imagecreatefrompng(ICON_PATH."/clothing/under/".$data->uniform."-".$data->dir.".png");
        if (null != $uniform) {
            imagecopy($body, $uniform, 0, 0, 0, 0, 32, 32);
        }
        imagedestroy($uniform);
    }

    //BELT
    if ($clothing && $data->belt) {
        $belt = imagecreatefrompng(ICON_PATH."/clothing/belt/".$data->belt."-".$data->dir.".png");
        if (null != $belt) {
            imagecopy($body, $belt, 0, 0, 0, 0, 32, 32);
        }
        imagedestroy($belt);
    }

    //LEFT HAND
    if ($clothing && $data->lhand) {
        // $lhand = explode('/', $data->lhand);
        // $output['lhand'] = $lhand;
        // $data->lhand = str_reaplce('right','left', $data->lhand);
        $lhand = imagecreatefrompng(ICON_PATH."/inhands/".$data->lhand."-".$data->dir.".png");
        if (null != $lhand) {
            imagecopy($body, $lhand, 0, 0, 0, 0, 32, 32);
        }
        imagedestroy($lhand);
    }

    //RIGHT HAND
    if ($clothing && $data->rhand) {
        $rhand = imagecreatefrompng(ICON_PATH."/inhands/".$data->rhand."-".$data->dir.".png");
        if (null != $rhand) {
            imagecopy($body, $rhand, 0, 0, 0, 0, 32, 32);
        }
        imagedestroy($rhand);
    }

    //GLOVES
    if ($clothing && $data->gloves) {
        $gloves = imagecreatefrompng(ICON_PATH."/clothing/hands/".$data->gloves."-".$data->dir.".png");
        if (null != $gloves) {
            imagecopy($body, $gloves, 0, 0, 0, 0, 32, 32);
        }
        imagedestroy($gloves);
    }

    //SHOES
    if ($clothing && $data->shoes) {
        $shoes = imagecreatefrompng(ICON_PATH."/clothing/feet/".$data->shoes."-".$data->dir.".png");
        if (null != $shoes) {
            imagecopy($body, $shoes, 0, 0, 0, 0, 32, 32);
        }
        imagedestroy($shoes);
    }

    //BACK
    if ($clothing && $data->back) {
        $back = imagecreatefrompng(ICON_PATH."/clothing/back/".$data->back."-".$data->dir.".png");
        if (null != $back) {
            imagecopy($body, $back, 0, 0, 0, 0, 32, 32);
        }
        imagedestroy($back);
    }

    //NECK
    if ($clothing && $data->neck) {
        $neck = imagecreatefrompng(ICON_PATH."/clothing/neck/".$data->neck."-".$data->dir.".png");
        if (null != $neck) {
            imagecopy($body, $neck, 0, 0, 0, 0, 32, 32);
        }
        imagedestroy($neck);
    }

    //SUIT
    if ($clothing && $data->suit) {
        $suit = imagecreatefrompng(ICON_PATH."/clothing/suit/".$data->suit."-".$data->dir.".png");
        if (null != $suit) {
            imagecopy($body, $suit, 0, 0, 0, 0, 32, 32);
        }
        imagedestroy($suit);
    }

    //HELMET
    if ($clothing && $data->head) {
        $head = imagecreatefrompng(ICON_PATH."/clothing/head/".$data->head."-".$data->dir.".png");
        if (null != $head) {
            imagecopy($body, $head, 0, 0, 0, 0, 32, 32);
        }
        imagedestroy($head);
    }
}

//Generic mob without clothing
if ($body != null) {
    imagecopyresized($image, $body, 10, 13, 8, 0, 45, 42, 15, 14);
}

//CARD TEXT
$str_employee_size = 11;
$line1size = 15;
$line2size = 9;
$str_employee_x = 183;
$line1x = 183;
$line2x = 183;
$str_employee_y = 20;
$line1y = 40;
$line2y = 54;

$font = 4;
$height = imagefontheight($font) ;

$string1 = $data->text1;
$string2 = $data->text2;

$size1 = ImageTTFBBox($line1size, 0, CONSOLAS_FONT, $string1);
while ($size1[2] > 200) {
    $line1size -= 1;
    $size1 = ImageTTFBBox($line1size, 0, CONSOLAS_FONT, $string1);
}

$size2 = ImageTTFBBox($line2size, 0, CONSOLAS_FONT, $string2);
while ($size2[2] > 200) {
    $line2size -= 1;
    $size2 = ImageTTFBBox($line2size, 0, CONSOLAS_FONT, $string2);
}

$title = $data->text3;
$sizetitle = ImageTTFBBox($str_employee_size, 0, CONSOLAS_FONT, $title);
if ($useborder == 1) {
    imagettftext($image, $str_employee_size, 0, $str_employee_x - floor($sizetitle[2]/2) -1, $str_employee_y -1, $text_color_title_b, CONSOLAS_FONT, $title);
    imagettftext($image, $str_employee_size, 0, $str_employee_x - floor($sizetitle[2]/2) -1, $str_employee_y +1, $text_color_title_b, CONSOLAS_FONT, $title);
    imagettftext($image, $str_employee_size, 0, $str_employee_x - floor($sizetitle[2]/2) +1, $str_employee_y -1, $text_color_title_b, CONSOLAS_FONT, $title);
    imagettftext($image, $str_employee_size, 0, $str_employee_x - floor($sizetitle[2]/2) +1, $str_employee_y +1, $text_color_title_b, CONSOLAS_FONT, $title);
}
imagettftext($image, $str_employee_size, 0, $str_employee_x - floor($sizetitle[2]/2), $str_employee_y, $text_color_title, CONSOLAS_FONT, $title);
if ($useborder == 1) {
    imagettftext($image, $line1size, 0, $line1x - floor($size1[2]/2) -1, $line1y -1, $text_color1_b, CONSOLAS_FONT, $string1);
    imagettftext($image, $line1size, 0, $line1x - floor($size1[2]/2) -1, $line1y +1, $text_color1_b, CONSOLAS_FONT, $string1);
    imagettftext($image, $line1size, 0, $line1x - floor($size1[2]/2) +1, $line1y -1, $text_color1_b, CONSOLAS_FONT, $string1);
    imagettftext($image, $line1size, 0, $line1x - floor($size1[2]/2) +1, $line1y +1, $text_color1_b, CONSOLAS_FONT, $string1);
}
imagettftext($image, $line1size, 0, $line1x - floor($size1[2]/2), $line1y, $text_color1, CONSOLAS_FONT, $string1);
if ($useborder == 1) {
    imagettftext($image, $line2size, 0, $line2x - floor($size2[2]/2) -1, $line2y -1, $text_color2_b, CONSOLAS_FONT, $string2);
    imagettftext($image, $line2size, 0, $line2x - floor($size2[2]/2) -1, $line2y +1, $text_color2_b, CONSOLAS_FONT, $string2);
    imagettftext($image, $line2size, 0, $line2x - floor($size2[2]/2) +1, $line2y -1, $text_color2_b, CONSOLAS_FONT, $string2);
    imagettftext($image, $line2size, 0, $line2x - floor($size2[2]/2) +1, $line2y +1, $text_color2_b, CONSOLAS_FONT, $string2);
}
imagettftext($image, $line2size, 0, $line2x - floor($size2[2]/2), $line2y, $text_color2, CONSOLAS_FONT, $string2);

//STAMP
if ($data->stamp) {
    $stamp = imagecreatefrompng(DME_DIR."/icons/stamp_icons/large_stamp-".$data->stamp.".png");
    $output['stamp'] = DME_DIR."/icons/stamp_icons/large_stamp-".$data->stamp.".png";
    $alpha = imagecolorallocatealpha($stamp, 255, 255, 255, 127);
    $stamp = imagerotate($stamp, -8, $alpha);
    imagesavealpha($stamp, true);
    if (null != $stamp) {
        imagecopy($image, $stamp, 190, 0, 0, 0, imagesx($stamp), imagesy($stamp));
    }
    imagedestroy($stamp);
}

ob_start();
imagepng($image, null, 9);
$output['bio'] = base64_encode(ob_get_contents());
imagedestroy($image);
ob_end_clean();

ob_start();
$body = imagescale($body, 128, 128, IMG_NEAREST_NEIGHBOUR);
imagesavealpha($body, true);
imagepng($body, null, 9);
$output['body'] = base64_encode(ob_get_contents());
imagedestroy($body);
ob_end_clean();
$output['data'] = $data;
echo json_encode($output);
