<?php

require_once(__DIR__."/../config.php");

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CSS only -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

  <!-- JS, Popper.js, and jQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
    integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
  </script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-typeahead/2.11.0/jquery.typeahead.css"
    integrity="sha256-N5LjnCD3sm17vjUaBNSBY/NCdnsUZpSrLurmlYiQgRI=" crossorigin="anonymous" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-typeahead/2.11.0/jquery.typeahead.min.js"
    integrity="sha256-q6QA5qUPfpeuxzP5D/wCMcvsYDsV6kQi5/tti+lcmlk=" crossorigin="anonymous"></script>

</head>

<body>

  <style>
    body {
      padding: 20px 0 20px 0;
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

      input[name=skinTone]+label {
        border: 3px solid grey;
        border-radius: 4px;
        padding: 10px;
        margin: 0 2px 0 0;
      }

      input[name=skinTone]:checked+label {
        border-color: black;
      }

      input[name=skinTone]:disabled+label {
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
      <div class="col">
        <input id="json_out" class="form-control"></input>
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
          <div class="form-group row">
            <label for="stamp" class="col-md-3">Stamp</label>
            <div class="col-md-9">
              <select name="stamp" class="form-control field stamp">
                <option value="0">None</option>
                <option value="cap">Captain</option>
                <option value="ce">Chief Engineer</option>
                <option value="hop">Head of Personnel</option>
                <option value="cmo">Chief Medical Officer</option>
                <option value="rd">Research Director</option>
                <option value="qm">Quartermaster</option>
                <option value="chap">Chaplain</option>
                <option value="ok">Approved</option>
                <option value="deny">Denied</option>
                <option value="clown">Clown</option>
                <option value="mime">Mime</option>
                <option value="centcom">Centcom</option>
                <option value="syndicate">Syndicate</option>
              </select>
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
            <div class="col-md-10">
              <input type='color' class='form-control field c' name='eyeColor' id='eyeColor' value="#6aa84f">
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
          <p class="text-muted small mb-0 mt-2">Start typing the name of the object you want. Can't find what
            you're looking for? Use <a href="https://scrubby.melonmesa.com/icon/search
" class="link" target="_blank" rel="noopener noreferrer">Scrubby's Icon Search</a></p>
          <div class="row">
            <div class="col-md-6">
              <label for="hairStyle" class="form-label">Hair style</label>
              <div class="typeahead__container">
                <div class="typeahead__field">
                  <span class="typeahead__query">
                    <input name="hairStyle" id='hairStyle' type="search" placeholder="Hair style" autocomplete="off"
                      class='form-control field c'>
                  </span>
                  <span class="typeahead__button">
                    <button type="submit">
                      <i class="typeahead__search-icon"></i>
                    </button>
                  </span>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <label for="hairColor" class="form-label">Color</label>
              <div>
                <input type='color' class='form-control field c' name='hairColor' id='hairColor' value="#ffe599">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <label for="eyeWear" class="form-label">Eyewear</label>
              <div class="typeahead__container">
                <div class="typeahead__field">
                  <span class="typeahead__query">
                    <input name="eyeWear" id='eyeWear' type="search" placeholder="Eye Wear" autocomplete="off"
                      class='form-control field c'>
                  </span>
                  <span class="typeahead__button">
                    <button type="submit">
                      <i class="typeahead__search-icon"></i>
                    </button>
                  </span>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <label for="mask" class="form-label">Mask</label>
              <div class="typeahead__container">
                <div class="typeahead__field">
                  <span class="typeahead__query">
                    <input name="mask" id='mask' type="search" placeholder="Mask" autocomplete="off"
                      class='form-control field c'>
                  </span>
                  <span class="typeahead__button">
                    <button type="submit">
                      <i class="typeahead__search-icon"></i>
                    </button>
                  </span>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <label for="uniform" class="form-label">Uniform</label>
              <div class="typeahead__container">
                <div class="typeahead__field">
                  <span class="typeahead__query">
                    <input name="uniform" id='uniform' type="search" placeholder="Uniform" autocomplete="off"
                      class='form-control field c'>
                  </span>
                  <span class="typeahead__button">
                    <button type="submit">
                      <i class="typeahead__search-icon"></i>
                    </button>
                  </span>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <label for="suit" class="form-label">Suit</label>
              <div class="typeahead__container">
                <div class="typeahead__field">
                  <span class="typeahead__query">
                    <input name="suit" id='suit' type="search" placeholder="Suit" autocomplete="off"
                      class='form-control field c'>
                  </span>
                  <span class="typeahead__button">
                    <button type="submit">
                      <i class="typeahead__search-icon"></i>
                    </button>
                  </span>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <label for="head" class="form-label">Helmet/Head</label>
              <div class="typeahead__container">
                <div class="typeahead__field">
                  <span class="typeahead__query">
                    <input name="head" id='head' type="search" placeholder="Head" autocomplete="off"
                      class='form-control field c'>
                  </span>
                  <span class="typeahead__button">
                    <button type="submit">
                      <i class="typeahead__search-icon"></i>
                    </button>
                  </span>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <label for="belt" class="form-label">Belt</label>
              <div class="typeahead__container">
                <div class="typeahead__field">
                  <span class="typeahead__query">
                    <input name="belt" id='belt' type="search" placeholder="Belt" autocomplete="off"
                      class='form-control field c'>
                  </span>
                  <span class="typeahead__button">
                    <button type="submit">
                      <i class="typeahead__search-icon"></i>
                    </button>
                  </span>
                </div>
              </div>
            </div>
            <p class="col-md-12 text-muted small mb-0 mt-2">Head gear clashing with your helmet? Set your hairstyle to
              'bald'</p>
          </div>
          <div class="row">
            <div class="col-md-6">
              <label for="gloves" class="form-label">Gloves</label>
              <div class="typeahead__container">
                <div class="typeahead__field">
                  <span class="typeahead__query">
                    <input name="gloves" id='gloves' type="search" placeholder="Gloves" autocomplete="off"
                      class='form-control field c'>
                  </span>
                  <span class="typeahead__button">
                    <button type="submit">
                      <i class="typeahead__search-icon"></i>
                    </button>
                  </span>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <label for="shoes" class="form-label">Shoes</label>
              <div class="typeahead__container">
                <div class="typeahead__field">
                  <span class="typeahead__query">
                    <input name="shoes" id='shoes' type="search" placeholder="Shoes" autocomplete="off"
                      class='form-control field c'>
                  </span>
                  <span class="typeahead__button">
                    <button type="submit">
                      <i class="typeahead__search-icon"></i>
                    </button>
                  </span>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <label for="lhand" class="form-label">Left Hand</label>
              <div class="typeahead__container">
                <div class="typeahead__field">
                  <span class="typeahead__query">
                    <input name="lhand" id='lhand' type="search" placeholder="Left Hand" autocomplete="off"
                      class='form-control field c'>
                  </span>
                  <span class="typeahead__button">
                    <button type="submit">
                      <i class="typeahead__search-icon"></i>
                    </button>
                  </span>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <label for="rhand" class="form-label">Right Hand</label>
              <div class="typeahead__container">
                <div class="typeahead__field">
                  <span class="typeahead__query">
                    <input name="rhand" id='rhand' type="search" placeholder="Right Hand" autocomplete="off"
                      class='form-control field c'>
                  </span>
                  <span class="typeahead__button">
                    <button type="submit">
                      <i class="typeahead__search-icon"></i>
                    </button>
                  </span>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <label for="back" class="form-label">Back</label>
              <div class="typeahead__container">
                <div class="typeahead__field">
                  <span class="typeahead__query">
                    <input name="back" id='back' type="search" placeholder="Back" autocomplete="off"
                      class='form-control field c'>
                  </span>
                  <span class="typeahead__button">
                    <button type="submit">
                      <i class="typeahead__search-icon"></i>
                    </button>
                  </span>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <label for="neck" class="form-label">Neck</label>
              <div class="typeahead__container">
                <div class="typeahead__field">
                  <span class="typeahead__query">
                    <input name="neck" id='neck' type="search" placeholder="Neck" autocomplete="off"
                      class='form-control field c'>
                  </span>
                  <span class="typeahead__button">
                    <button type="submit">
                      <i class="typeahead__search-icon"></i>
                    </button>
                  </span>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>

      <button class="btn btn-success btn-block">Render</button>
    </form>
    <hr />
    <footer>
      <div class="row">
        <div class="col-md-4">
          <div class="page-footer">
            <h3>BadgeR</h3>
            <p>
              Support BadgeR on <a href="https://www.patreon.com/statbus" class="link" target="_blank"
                rel="noopener noreferrer">Patreon</a>! Report bugs on <a href="https://github.com/nfreader/tgbadger
" class="link" target="_blank" rel="noopener noreferrer">Github</a>! Check out <a href="https://atlantaned.space"
                class="link" target="_blank" rel="noopener noreferrer">Statbus</a>!
            </p>
          </div>
        </div>
        <div class="col-md-4">
          <h3>Current server time</h3>
          <div id="clock"><?php echo date("G:i:s d.m.Y");?>
          </div>
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
    var colorPalette = [
      ["#000", "#444", "#666", "#999", "#ccc", "#eee", "#f3f3f3", "#fff"],
      ["#f00", "#f90", "#ff0", "#0f0", "#0ff", "#00f", "#90f", "#f0f"],
      ["#f4cccc", "#fce5cd", "#fff2cc", "#d9ead3", "#d0e0e3", "#cfe2f3", "#d9d2e9", "#ead1dc"],
      ["#ea9999", "#f9cb9c", "#ffe599", "#b6d7a8", "#a2c4c9", "#9fc5e8", "#b4a7d6", "#d5a6bd"],
      ["#e06666", "#f6b26b", "#ffd966", "#93c47d", "#76a5af", "#6fa8dc", "#8e7cc3", "#c27ba0"],
      ["#c00", "#e69138", "#f1c232", "#6aa84f", "#45818e", "#3d85c6", "#674ea7", "#a64d79"],
      ["#900", "#b45f06", "#bf9000", "#38761d", "#134f5c", "#0b5394", "#351c75", "#741b47"],
      ["#600", "#783f04", "#7f6000", "#274e13", "#0c343d", "#073763", "#20124d", "#4c1130"]
    ]

    // $('#eyeColor').spectrum({
    //   // showInput: true,
    //   // allowEmpty:true,
    //   // showPaletteOnly: true,
    //   // change: function(color) {
    //   //   $('input[name=eyeColor]').val(color);
    //   // },
    //   // preferredFormat: 'hex',
    //   palette: colorPalette
    // });
    // $('#hairColor').spectrum({
    //   showPalette: true,
    //   preferredFormat: 'hex'
    // });

    var humanSkintones = {
      "caucasian1": "#ffe0d1",
      "caucasian2": "#fcccb3",
      "caucasian3": "#e8b59b",
      "latino": "#d9ae96",
      "mediterranean": "#c79b8b",
      "asian1": "#ffdeb3",
      "asian2": "#e3ba84",
      "arab": "#c4915e",
      "indian": "#b87840",
      "african1": "#754523",
      "african2": "#471c18",
      "albino": "#fff4e6",
      "orange": "#ffc905"
    };

    $.each(humanSkintones, function(i, v) {
      var option = "<input type='radio' name='skinTone' value='" + i + "' class='field c' id='skintone-" + i +
        "'><label for='skintone-" + i + "' style='background: " + v + "'></label>";
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

    var typeahead_options = {
      minLength: 1,
      order: "asc",
      mustSelectItem: true,
      searchOnFocus: true,
      dynamic: true,
      maxItem: 0,
      callback: {
        onClickAfter: function(node, a, item, event) {
          $('#generator').submit();
        }
      }
    }

    $.typeahead({
      ...typeahead_options,
      input: '#hairStyle',
      matcher: function(item, displayKey) {
        if (item.display.includes('hair') || item.display.includes('bald') || item.display.includes(
            'debrained')) {
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
      ...typeahead_options,
      input: '#eyeWear',
      source: {
        eyeWear: "/icons/mob/clothing/eyes/eyes.json"
      }
    });

    $.typeahead({
      ...typeahead_options,
      input: '#mask',
      source: {
        uniform: "/icons/mob/clothing/mask/mask.json"
      },
    });

    $.typeahead({
      ...typeahead_options,
      input: '#uniform',
      source: {
        uniform: "/icons/mob/clothing/under/under.json"
      },
    });

    $.typeahead({
      ...typeahead_options,
      input: '#suit',
      source: {
        suit: "/icons/mob/clothing/suit/suit.json"
      },
    });

    $.typeahead({
      ...typeahead_options,
      input: '#head',
      source: {
        head: "/icons/mob/clothing/head/head.json"
      },
    });

    $.typeahead({
      ...typeahead_options,
      input: '#belt',
      source: {
        head: "/icons/mob/clothing/belt/belt.json"
      },
    });

    $.typeahead({
      ...typeahead_options,
      input: '#gloves',
      source: {
        head: "/icons/mob/clothing/hands/hands.json"
      },
    });

    $.typeahead({
      ...typeahead_options,
      input: '#shoes',
      source: {
        head: "/icons/mob/clothing/feet/feet.json"
      },
    });

    $.typeahead({
      ...typeahead_options,
      input: '#back',
      source: {
        head: "/icons/mob/clothing/back/back.json"
      },
    });

    $.typeahead({
      ...typeahead_options,
      input: '#neck',
      source: {
        head: "/icons/mob/clothing/neck/neck.json"
      },
    });

    $.typeahead({
      ...typeahead_options,
      input: '#lhand',
      matcher: function(item, key) {
        if (/left/.test(key)) {
          return true
        } else {
          return false
        }
      },
      source: {
        items: "/icons/mob/inhands/inhands.json",
      },
    });

    $.typeahead({
      ...typeahead_options,
      input: '#rhand',
      matcher: function(item, key) {
        if (/right/.test(key)) {
          return true
        } else {
          return false
        }
      },
      source: {
        items: "/icons/mob/inhands/inhands.json",
      },
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

    function arrayContains(needle, arrhaystack) {
      if (arrhaystack.indexOf(needle) > -1) {
        return false;
      }
      return true;
    }
    $('.field').bind('input propertychange', function(e) {
      // $('#generator').submit();
      var data = {};
      $('.field').each(function() {
        data[$(this).attr("name")] = $(this).val();
      });
      data['gender'] = $('input[name=gender]:checked').val();
      data['skinTone'] = $('input[name=skinTone]:checked').val();
      $('#json_out').val(JSON.stringify(data));
      $.ajax({
          url: 'img.php',
          data: JSON.parse($('#json_out').val()),
          method: 'POST',
          dataType: 'json'
        })
        .done(function(i) {
          $('.render').attr('src', 'data:image/png;base64,' + i.bio);
          $('.body').attr('src', 'data:image/png;base64,' + i.body);
        })
    })
    $('#generator').submit(function(e) {
      e.preventDefault();
      var data = {};
      $('.field').each(function() {
        data[$(this).attr("name")] = $(this).val();
      });
      data['gender'] = $('input[name=gender]:checked').val();
      data['skinTone'] = $('input[name=skinTone]:checked').val();
      $('#json_out').val(JSON.stringify(data));
      $.ajax({
          url: 'img.php',
          data: JSON.parse($('#json_out').val()),
          method: 'POST',
          dataType: 'json'
        })
        .done(function(i) {
          $('.render').attr('src', 'data:image/png;base64,' + i.bio);
          $('.body').attr('src', 'data:image/png;base64,' + i.body);
        })
    })
    $('#generator').submit();

    $("#json_out").bind('input propertychange', function(e) {
      data = JSON.parse($(this).val());
      Object.keys(data).map(function(_) {
        console.log(_)
        console.log(data[_]);
      })
    })

    setInterval(function() {
      var clock = document.querySelector('#clock');
      var date = new Date();
      var month = ('0' + (date.getUTCMonth() + 1)).slice(-2);
      var days = ('0' + date.getUTCDate() + '').slice(-2);
      var seconds = ('0' + date.getUTCSeconds() + '').slice(-2);
      var minutes = ('0' + date.getUTCMinutes() + '').slice(-2);
      var hours = ('0' + date.getUTCHours() + '').slice(-2);
      var year = date.getUTCFullYear();
      clock.textContent = hours + ':' + minutes + ':' + seconds + ' ' + days + '.' + month + '.' + year;
    }, 1000);
  </script>
</body>

</html>