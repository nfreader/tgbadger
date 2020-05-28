<?php 

require_once(__DIR__."/../config.php");

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CSS only -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

  <!-- JS, Popper.js, and jQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-typeahead/2.11.0/jquery.typeahead.css" integrity="sha256-N5LjnCD3sm17vjUaBNSBY/NCdnsUZpSrLurmlYiQgRI=" crossorigin="anonymous" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-typeahead/2.11.0/jquery.typeahead.min.js" integrity="sha256-q6QA5qUPfpeuxzP5D/wCMcvsYDsV6kQi5/tti+lcmlk=" crossorigin="anonymous"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/spectrum/1.8.0/spectrum.min.js" integrity="sha256-ZdnRjhC/+YiBbXTHIuJdpf7u6Jh5D2wD5y0SNRWDREQ=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/spectrum/1.8.0/spectrum.min.css" integrity="sha256-f83N12sqX/GO43Y7vXNt9MjrHkPc4yi9Uq9cLy1wGIU=" crossorigin="anonymous" />
  
</head>
<body>

<style>
body {
  padding: 60px 0 20px 0;
}
img {
  -ms-interpolation-mode: nearest-neighbor;
  image-rendering: pixelated;
}
</style>
<div class="container">

<style>
.skintone-sel {
  padding: 10px;
}
input[name=skinTone] {
  display: none;
}

input[name=skinTone] + label {
  border: 3px solid grey;
  border-radius: 4px;
  padding: 10px;
  margin: 0 2px 0 0;
}

input[name=skinTone]:checked + label {
  border-color: black;
}

input[name=skinTone]:disabled + label {
  opacity: .75;
}

label {
  margin-top: 7px;
}
</style>
<div class="row">
  <div class="col d-flex justify-content-center position-sticky sticky-top" id="output">
    <img src="/resources/bio/bg/fresh.png" width="320" height="65" class="render" />
    <img src="/icons/mob/human/human_basic-0.png" width="64" height="64" class="body" />
  </div>
</div>
<hr>
<form class="form-horizontal" id="generator">
  <div class="row">
    <div class="col-md-6">
    <h3>Badge Appearance</h3>
      <div class="form-group row">
        <label for="bg" class="col-md-6">Background and Color Scheme</label>
        <div class="col-md-6">
          <select name="bg" class="form-control field bg">
            <option value="default">Default</option>
            <option value="lava">Lava</option>
            <option value="ocean">Ocean</option>
            <option value="old">Old</option>
            <option value="ice">Ice</option>
            <option value="head">Head of Staff</option>
            <option value="captain">Captain</option>
            <?php if ($user->legit):?>
            <option value="centcom">Central Command</option>
            <?php endif;?>
          </select>
        </div>
      </div>
      <div class="form-group row">
        <label for="text3" class="col-md-4">Identification</label>
        <div class="col-md-8">
          <input name="text3" class="form-control field" type="text" placeholder="Employee of Nanotrasen" />
        </div>
      </div>
      <div class="form-group row">
        <label for="text1" class="col-md-4">Name</label>
        <div class="col-md-8">
          <input name="text1" class="form-control field" type="text" placeholder="A. Spaceman" />
        </div>
      </div>
      <div class="form-group row">
        <label for="text2" class="col-md-4">Title</label>
        <div class="col-md-8">
          <input name="text2" class="form-control field" type="text" placeholder="Bottom Text" />
        </div>
      </div>
      <hr>
      <h3>Character Appearance</h3>
      <div class="form-group row">
        <label for="bg" class="col-md-2">Facing</label>
        <div class="col-md-10">
          <select name="dir" class="form-control field bg">
            <option value="0">South</option>
            <option value="1">North</option>
            <option value="2">East</option>
            <option value="3">West</option>
          </select>
        </div>
      </div>

      <div class="form-group row">
        <label for="species" class="col-md-2">Species</label>
        <div class="col-md-10">
          <select name="species" class="form-control field species">
            <option value="human">Human</option>
            <option value="lizard">Lizard</option>
            <option value="pod">Podperson</option>
            <option value="jelly">Jellyperson</option>
            <option value="slime">Slimeperson</option>
            <option value="golem">Golem</option>
            <option value="snail">Snail</option>
            <option value="plant">Plant</option>
            <option value="mush">Mushroom</option>
            <option value="ethereal">Ethereal</option>
            <option value="stargazer">Stargazer</option>
            <option value="moth">Moth</option>
            <option value="fly">Fly</option>
            <option value="plasmaman">Plasmaman</option>
          </select>
        </div>
      </div>

      <div class="form-group row">
        <label for="gender" class="col-md-2">Gender</label>
        <div class="col-md-6">
          <label class="radio-inline">
            <input type="radio" name="gender" value="male" class='field c'> Male
          </label>
          <label class="radio-inline">
            <input type="radio" name="gender" value="female" class='field c'> Female
          </label>
        </div>
      </div>
      <div class="form-group row">
        <label for="eyeColor" class="col-md-2">Eyecolor</label>
        <div class="col-md-2">
          <input type='text' class='form-control field c' name='eyeColor' id='eyeColor' value="#6aa84f">
        </div>
      </div>
      <div class="form-group row">
        <label for="skintone" class="col-md-2">Skintone</label>
        <div class="col-md-10" id="skintone">
        </div>
      </div>
    </div>


    <!-- Second form column -->
    <div class="col-md-6">
    <h3>Accessories</h3>
      <div class="form-group row">
        <label for="hairStyle" class="col-md-3">Hair style</label>
        <div class="typeahead__container col-md-9">
            <div class="typeahead__field">
                <span class="typeahead__query">
                    <input name="hairStyle" id='hairStyle' type="search" placeholder="Hair style" autocomplete="off" class='form-control field c'>
                </span>
                <span class="typeahead__button">
                    <button type="submit">
                        <i class="typeahead__search-icon"></i>
                    </button>
                </span>
            </div>
        </div>
      </div>
      <div class="form-group row">
        <label for="hairColor" class="col-md-3">Color</label>
        <div class="col-md-9">
          <input type='text' class='form-control field c' name='hairColor' id='hairColor' value="#ffe599">
        </div>
      </div>

      <div class="form-group row">
        <label for="eyeWear" class="col-md-3">Eyewear</label>
        <div class="typeahead__container col-md-9">
            <div class="typeahead__field">
                <span class="typeahead__query">
                    <input name="eyeWear" id='eyeWear' type="search" placeholder="Eye Wear" autocomplete="off" class='form-control field c'>
                </span>
                <span class="typeahead__button">
                    <button type="submit">
                        <i class="typeahead__search-icon"></i>
                    </button>
                </span>
            </div>
        </div>
        </div>
        <div class="form-group row">
        <label for="mask" class="col-md-3">Mask</label>
        <div class="typeahead__container col-md-9">
            <div class="typeahead__field">
                <span class="typeahead__query">
                    <input name="mask" id='mask' type="search" placeholder="Mask" autocomplete="off" class='form-control field c'>
                </span>
                <span class="typeahead__button">
                    <button type="submit">
                        <i class="typeahead__search-icon"></i>
                    </button>
                </span>
            </div>
        </div>
      </div>

      <div class="form-group row">
        <label for="uniform" class="col-md-3">Uniform</label>
        <div class="typeahead__container col-md-9">
            <div class="typeahead__field">
                <span class="typeahead__query">
                    <input name="uniform" id='uniform' type="search" placeholder="Uniform" autocomplete="off" class='form-control field c'>
                </span>
                <span class="typeahead__button">
                    <button type="submit">
                        <i class="typeahead__search-icon"></i>
                    </button>
                </span>
            </div>
        </div>
        </div>
        <div class="form-group row">
        <label for="suit" class="col-md-3">Suit</label>
        <div class="typeahead__container col-md-9">
            <div class="typeahead__field">
                <span class="typeahead__query">
                    <input name="suit" id='suit' type="search" placeholder="Suit" autocomplete="off" class='form-control field c'>
                </span>
                <span class="typeahead__button">
                    <button type="submit">
                        <i class="typeahead__search-icon"></i>
                    </button>
                </span>
            </div>
        </div>
      </div>

      <div class="form-group row">
        <label for="head" class="col-md-3">Helmet/Head</label>
        <div class="typeahead__container col-md-9">
            <div class="typeahead__field">
                <span class="typeahead__query">
                    <input name="head" id='head' type="search" placeholder="Head" autocomplete="off" class='form-control field c'>
                </span>
                <span class="typeahead__button">
                    <button type="submit">
                        <i class="typeahead__search-icon"></i>
                    </button>
                </span>
            </div>
        </div>
      </div>
      <div class="form-group row">
        <label for="belt" class="col-md-3">Belt</label>
        <div class="typeahead__container col-md-9">
            <div class="typeahead__field">
                <span class="typeahead__query">
                    <input name="belt" id='belt' type="search" placeholder="Belt" autocomplete="off" class='form-control field c'>
                </span>
                <span class="typeahead__button">
                    <button type="submit">
                        <i class="typeahead__search-icon"></i>
                    </button>
                </span>
            </div>
        </div>
      </div>

      <div class="form-group row">
        <label for="gloves" class="col-md-3">Gloves</label>
        <div class="typeahead__container col-md-9">
            <div class="typeahead__field">
                <span class="typeahead__query">
                    <input name="gloves" id='gloves' type="search" placeholder="Gloves" autocomplete="off" class='form-control field c'>
                </span>
                <span class="typeahead__button">
                    <button type="submit">
                        <i class="typeahead__search-icon"></i>
                    </button>
                </span>
            </div>
        </div>
      </div>
      <div class="form-group row">
        <label for="shoes" class="col-md-3">Shoes</label>
        <div class="typeahead__container col-md-9">
            <div class="typeahead__field">
                <span class="typeahead__query">
                    <input name="shoes" id='shoes' type="search" placeholder="Shoes" autocomplete="off" class='form-control field c'>
                </span>
                <span class="typeahead__button">
                    <button type="submit">
                        <i class="typeahead__search-icon"></i>
                    </button>
                </span>
            </div>
        </div>
      </div>

      <div class="form-group row">
        <label for="lhand" class="col-md-3">Left Hand</label>
        <div class="typeahead__container col-md-9">
            <div class="typeahead__field">
                <span class="typeahead__query">
                    <input name="lhand" id='lhand' type="search" placeholder="Left Hand" autocomplete="off" class='form-control field c'>
                </span>
                <span class="typeahead__button">
                    <button type="submit">
                        <i class="typeahead__search-icon"></i>
                    </button>
                </span>
            </div>
        </div>
      </div>
      <div class="form-group row">
        <label for="rhand" class="col-md-3">Right Hand</label>
        <div class="typeahead__container col-md-9">
            <div class="typeahead__field">
                <span class="typeahead__query">
                    <input name="rhand" id='rhand' type="search" placeholder="Right Hand" autocomplete="off" class='form-control field c'>
                </span>
                <span class="typeahead__button">
                    <button type="submit">
                        <i class="typeahead__search-icon"></i>
                    </button>
                </span>
            </div>
        </div>
      </div>

      <div class="form-group row">
        <label for="back" class="col-md-3">Back</label>
        <div class="typeahead__container col-md-9">
            <div class="typeahead__field">
                <span class="typeahead__query">
                    <input name="back" id='back' type="search" placeholder="Back" autocomplete="off" class='form-control field c'>
                </span>
                <span class="typeahead__button">
                    <button type="submit">
                        <i class="typeahead__search-icon"></i>
                    </button>
                </span>
            </div>
        </div>
      </div>  
        <div class="form-group row">
          <label for="neck" class="col-md-3">Neck</label>
          <div class="typeahead__container col-md-9">
              <div class="typeahead__field">
                  <span class="typeahead__query">
                      <input name="neck" id='neck' type="search" placeholder="Neck" autocomplete="off" class='form-control field c'>
                  </span>
                  <span class="typeahead__button">
                      <button type="submit">
                          <i class="typeahead__search-icon"></i>
                      </button>
                  </span>
              </div>
          </div>

      </div>

      <div class="form-group row">
        <label for="stamp" class="col-md-3">Stamp</label>
        <div class="col-md-9">
          <select name="stamp" class="form-control field stamp">
            <option value="none">None</option>
            <option value="cap">Captain</option>
            <option value="ce">Chief Engineer</option>
            <option value="hop">Head of Personnel</option>
            <option value="cmo">Chief Medical Officer</option>
            <option value="rd">Research Director</option>
            <option value="qm">Quartermaster</option>
            <option value="ok">Approved</option>
            <option value="deny">Denied</option>
            <option value="clown">Clown</option>
          </select>
        </div>
      </div>
    </div>
  </div>

  <button class="btn btn-success btn-block">Render</button>
</form>
<script>

var colorPalette = [
["#000","#444","#666","#999","#ccc","#eee","#f3f3f3","#fff"],
["#f00","#f90","#ff0","#0f0","#0ff","#00f","#90f","#f0f"],
["#f4cccc","#fce5cd","#fff2cc","#d9ead3","#d0e0e3","#cfe2f3","#d9d2e9","#ead1dc"],
["#ea9999","#f9cb9c","#ffe599","#b6d7a8","#a2c4c9","#9fc5e8","#b4a7d6","#d5a6bd"],
["#e06666","#f6b26b","#ffd966","#93c47d","#76a5af","#6fa8dc","#8e7cc3","#c27ba0"],
["#c00","#e69138","#f1c232","#6aa84f","#45818e","#3d85c6","#674ea7","#a64d79"],
["#900","#b45f06","#bf9000","#38761d","#134f5c","#0b5394","#351c75","#741b47"],
["#600","#783f04","#7f6000","#274e13","#0c343d","#073763","#20124d","#4c1130"]
]

$('#eyeColor').spectrum({
    // showInput: true,
    // allowEmpty:true,
    // showPaletteOnly: true,
    // change: function(color) {
    //   $('input[name=eyeColor]').val(color);
    // },
    // preferredFormat: 'hex',
    palette: colorPalette
});
$('#hairColor').spectrum({
    showPalette:true,
    preferredFormat: 'hex'
});

var humanSkintones = {"caucasian1":"#ffe0d1","caucasian2":"#fcccb3","caucasian3":"#e8b59b","latino":"#d9ae96","mediterranean":"#c79b8b","asian1":"#ffdeb3","asian2":"#e3ba84","arab":"#c4915e","indian":"#b87840","african1":"#754523","african2":"#471c18","albino":"#fff4e6","orange":"#ffc905"};

$.each(humanSkintones,function(i,v){
  var option = "<input type='radio' name='skinTone' value='"+i+"' class='field c' id='skintone-"+i+"'><label for='skintone-"+i+"' style='background: "+v+"'></label>";
  $('#skintone').append(option);
});

// $('#hairStyle').typeahead({
//   order: 'asc',
//   searchOnFocus: true,
//   minLength: 0,
//   source: {
//     hair: '../icons/human_face/human_face.json'
//   },
//   backdrop: {
//     "background-color": "#3879d9",
//     "opacity": "0.1",
//     "filter": "alpha(opacity=10)"
//   },
//   callback: {
//     onInit: function (node) {
//       console.log('Typeahead Initiated on ' + node.selector);
//     }
//   },
//   debug: true
// });

$.typeahead({
  input: '#hairStyle',
  minLength: 0,
  order: "asc",
  mustSelectItem: true,
  searchOnFocus: true,
  dynamic: true,
  maxItem: 0,
  matcher: function(item, displayKey){
    if (item.display.includes('hair') || item.display.includes('bald') || item.display.includes('debrained')){
      return true;
    } else {
      return undefined;
    }
    return true;
  },
  source: {
      hair: "/icons/mob/human_face/human_face.json"
  }
});

$.typeahead({
  input: '#eyeWear',
  minLength: 0,
  order: "asc",
  mustSelectItem: true,
  searchOnFocus: true,
  dynamic: true,
  maxItem: 0,
  // matcher: function(item, displayKey){
  //   if (item.display.includes('hair') || item.display.includes('bald') || item.display.includes('debrained')){
  //     return true;
  //   } else {
  //     return undefined;
  //   }
  //   return true;
  // },
  source: {
    eyeWear: "/icons/mob/clothing/eyes/eyes.json"
  }
});

$.typeahead({
    input: '#mask',
    minLength: 0,
    order: "asc",
    mustSelectItem: true,
    searchOnFocus: true,
    dynamic: true,
    maxItem: 0,
    // matcher: function(item, displayKey){
    //   if (item.display.includes('hair') || item.display.includes('bald') || item.display.includes('debrained')){
    //     return true;
    //   } else {
    //     return undefined;
    //   }
    //   return true;
    // },
    source: {
      uniform: "/icons/mob/clothing/mask/mask.json"
    }
});

$.typeahead({
    input: '#uniform',
    minLength: 0,
    order: "asc",
    mustSelectItem: true,
    searchOnFocus: true,
    dynamic: true,
    maxItem: 0,
    // matcher: function(item, displayKey){
    //   if (item.display.includes('hair') || item.display.includes('bald') || item.display.includes('debrained')){
    //     return true;
    //   } else {
    //     return undefined;
    //   }
    //   return true;
    // },
    source: {
      uniform: "/icons/mob/clothing/under/under.json"
    }
});

$.typeahead({
    input: '#suit',
    minLength: 0,
    order: "asc",
    mustSelectItem: true,
    searchOnFocus: true,
    dynamic: true,
    maxItem: 0,
    // matcher: function(item, displayKey){
    //   if (item.display.includes('hair') || item.display.includes('bald') || item.display.includes('debrained')){
    //     return true;
    //   } else {
    //     return undefined;
    //   }
    //   return true;
    // },
    source: {
      suit: "/icons/mob/clothing/suit/suit.json"
    }
});

$.typeahead({
    input: '#head',
    minLength: 0,
    order: "asc",
    mustSelectItem: true,
    searchOnFocus: true,
    dynamic: true,
    maxItem: 0,
    // matcher: function(item, displayKey){
    //   if (item.display.includes('hair') || item.display.includes('bald') || item.display.includes('debrained')){
    //     return true;
    //   } else {
    //     return undefined;
    //   }
    //   return true;
    // },
    source: {
      head: "/icons/mob/clothing/head/head.json"
    }
});

$.typeahead({
    input: '#belt',
    minLength: 0,
    order: "asc",
    mustSelectItem: true,
    searchOnFocus: true,
    dynamic: true,
    maxItem: 0,
    // matcher: function(item, displayKey){
    //   if (item.display.includes('hair') || item.display.includes('bald') || item.display.includes('debrained')){
    //     return true;
    //   } else {
    //     return undefined;
    //   }
    //   return true;
    // },
    source: {
      head: "/icons/mob/clothing/belt/belt.json"
    }
});

$.typeahead({
    input: '#gloves',
    minLength: 0,
    order: "asc",
    mustSelectItem: true,
    searchOnFocus: true,
    dynamic: true,
    maxItem: 0,
    // matcher: function(item, displayKey){
    //   if (item.display.includes('hair') || item.display.includes('bald') || item.display.includes('debrained')){
    //     return true;
    //   } else {
    //     return undefined;
    //   }
    //   return true;
    // },
    source: {
      head: "/icons/mob/clothing/hands/hands.json"
    }
});

$.typeahead({
    input: '#shoes',
    minLength: 0,
    order: "asc",
    mustSelectItem: true,
    searchOnFocus: true,
    dynamic: true,
    maxItem: 0,
    // matcher: function(item, displayKey){
    //   if (item.display.includes('hair') || item.display.includes('bald') || item.display.includes('debrained')){
    //     return true;
    //   } else {
    //     return undefined;
    //   }
    //   return true;
    // },
    source: {
      head: "/icons/mob/clothing/feet/feet.json"
    }
});

$.typeahead({
    input: '#back',
    minLength: 0,
    order: "asc",
    mustSelectItem: true,
    searchOnFocus: true,
    dynamic: true,
    maxItem: 0,
    // matcher: function(item, displayKey){
    //   if (item.display.includes('hair') || item.display.includes('bald') || item.display.includes('debrained')){
    //     return true;
    //   } else {
    //     return undefined;
    //   }
    //   return true;
    // },
    source: {
      head: "/icons/mob/clothing/back/back.json"
    }
});

$.typeahead({
    input: '#neck',
    minLength: 0,
    order: "asc",
    mustSelectItem: true,
    searchOnFocus: true,
    dynamic: true,
    maxItem: 0,
    // matcher: function(item, displayKey){
    //   if (item.display.includes('hair') || item.display.includes('bald') || item.display.includes('debrained')){
    //     return true;
    //   } else {
    //     return undefined;
    //   }
    //   return true;
    // },
    source: {
      head: "/icons/mob/clothing/neck/neck.json"
    }
});

$.typeahead({
    input: '#lhand',
    minLength: 0,
    order: "asc",
    mustSelectItem: true,
    searchOnFocus: true,
    dynamic: true,
    maxItem: 0,
    matcher: function(item, key){
      if(/left/.test(key)) {
        return true
      } else {
        return false
      }
    },
    source: {
      items: "/icons/mob/inhands/inhands.json",
    },
    callback: {
      onSubmit: function(node, a, item, event){
        // console.log(item);
        $('#generate').submit();
      }
    }
});

$.typeahead({
    input: '#rhand',
    minLength: 0,
    order: "asc",
    mustSelectItem: true,
    searchOnFocus: true,
    dynamic: true,
    maxItem: 0,
    matcher: function(item, key){
      if(/right/.test(key)) {
        return true
      } else {
        return false
      }
    },
    source: {
      items: "/icons/mob/inhands/inhands.json",
    },
    callback: {
      onSubmit: function(node, a, item, event){
        // console.log(item);
        $('#generate').submit();
      }
    }
});

//Form processing
var clothedSpecies = [
  'human',
  'lizard',
  'pod',
  'jelly',
  'slime',
  'golem',
];

function arrayContains(needle, arrhaystack)
{
  if (arrhaystack.indexOf(needle) > -1){
    return false;
  }
  return true;
}
$('.field').on('change',function(e){
  $('#generator').submit();
})
$('#generator').submit(function(e){
  e.preventDefault();
  var data = {};
  $('.field').each(function(){
    data[$(this).attr("name")] = $(this).val();
  });
  data['gender'] = $('input[name=gender]:checked').val();
  data['skinTone'] = $('input[name=skinTone]:checked').val();
  console.log(data);
  $.ajax({
    url: 'img.php',
    data: data,
    method: 'POST',
    dataType: 'json'
  })
  .done(function(i){
    console.log(i)
    $('.render').attr('src','data:image/png;base64,'+i.bio);
    $('.body').attr('src','data:image/png;base64,'+i.body);
  })
})
$('#generator').submit();
</script>

<hr />
  <footer>
    <div class="row">
      <div class="col-md-4">
        <div class="page-footer">
          <h3>Status</h3>
        </div>
      </div>
      <div class="col-md-4">
        <h3>Current server time</h3>
        <div id="clock"><?php echo date("G:i:s d.m.Y");?></div>
      </div>
      <div class="col-md-4">
      <h3>Disclaimer</h3>
      <p>
        Data should be considered preliminary and non-operational.
      </p>
      </div>
    </div>
  </footer>
</div>
<script>
  setInterval(function() {
    var clock = document.querySelector('#clock');
    var date = new Date();
    var month = ('0'+(date.getUTCMonth()+1)).slice(-2);
    var days = ('0'+date.getUTCDate()+'').slice(-2);
    var seconds = ('0'+date.getUTCSeconds()+'').slice(-2);
    var minutes = ('0'+date.getUTCMinutes()+'').slice(-2);
    var hours = ('0'+date.getUTCHours()+'').slice(-2);
    var year = date.getUTCFullYear();
    clock.textContent = hours+':'+minutes+':'+seconds+' '+days+'.'+month+'.'+year;
  }, 1000);
</script>
</body>
</html>