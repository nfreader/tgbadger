var clothedSpecies = [
  "human",
  "lizard",
  "pod",
  "jelly",
  "slime",
  "golem",
  "digitrade",
];
const colorableSpecies = [
  "lizard",
  "pod",
  "jelly",
  "slime",
  "golem",
  "ethereal",
  "digitrade",
];
function arrayContains(needle, arrhaystack) {
  if (arrhaystack.indexOf(needle) > -1) {
    return false;
  }
  return true;
}

$("#moth").hide();
$("#skincolor_control").hide();
$("#digitrade_select").hide();

var humanSkintones = {
  caucasian1: "#ffe0d1",
  caucasian2: "#fcccb3",
  caucasian3: "#e8b59b",
  latino: "#d9ae96",
  mediterranean: "#c79b8b",
  asian1: "#ffdeb3",
  asian2: "#e3ba84",
  arab: "#c4915e",
  indian: "#b87840",
  african1: "#754523",
  african2: "#471c18",
  albino: "#fff4e6",
  orange: "#ffc905",
};

$.each(humanSkintones, function (i, v) {
  var option =
    "<input type='radio' name='skinTone' value='" +
    i +
    "' class='field c' id='skintone-" +
    i +
    "'><label for='skintone-" +
    i +
    "' style='background: " +
    v +
    "'></label>";
  $("#skintone").append(option);
});

var typeahead_options = {
  minLength: 1,
  order: "asc",
  mustSelectItem: true,
  searchOnFocus: true,
  dynamic: true,
  maxItem: 0,
  callback: {
    onClickAfter: function (node, a, item, event) {
      $("#generator").submit();
    },
  },
};

$.typeahead({
  ...typeahead_options,
  input: "#hairStyle",
  matcher: function (item, displayKey) {
    if (
      item.display.includes("hair") ||
      item.display.includes("bald") ||
      item.display.includes("debrained")
    ) {
      return true;
    } else {
      return undefined;
    }
    return true;
  },
  source: {
    hair: "/icons/mob/human_face/human_face.json",
  },
});

$.typeahead({
  ...typeahead_options,
  input: "#facial",
  matcher: function (item, displayKey) {
    if (item.display.includes("facial")) {
      item.display = item.display.replace(/facial_/, "");
      return true;
    } else {
      return undefined;
    }
    return true;
  },
  source: {
    facial: "/icons/mob/human_face/human_face.json",
  },
});

$.typeahead({
  ...typeahead_options,
  input: "#eyeWear",
  source: {
    eyeWear: "/icons/mob/clothing/eyes/eyes.json",
  },
});

$.typeahead({
  ...typeahead_options,
  input: "#mask",
  source: {
    uniform: "/icons/mob/clothing/mask/mask.json",
  },
});

$.typeahead({
  ...typeahead_options,
  input: "#uniform",
  source: {
    uniform: "/icons/mob/clothing/under/under.json",
  },
});

$.typeahead({
  ...typeahead_options,
  input: "#suit",
  source: {
    suit: "/icons/mob/clothing/suit/suit.json",
  },
});

$.typeahead({
  ...typeahead_options,
  input: "#head",
  source: {
    head: "/icons/mob/clothing/head/head.json",
  },
});

$.typeahead({
  ...typeahead_options,
  input: "#belt",
  source: {
    head: "/icons/mob/clothing/belt/belt.json",
  },
});

$.typeahead({
  ...typeahead_options,
  input: "#gloves",
  source: {
    head: "/icons/mob/clothing/hands/hands.json",
  },
});

$.typeahead({
  ...typeahead_options,
  input: "#shoes",
  source: {
    head: "/icons/mob/clothing/feet/feet.json",
  },
});

$.typeahead({
  ...typeahead_options,
  input: "#back",
  source: {
    head: "/icons/mob/clothing/back/back.json",
  },
});

$.typeahead({
  ...typeahead_options,
  input: "#neck",
  source: {
    head: "/icons/mob/clothing/neck/neck.json",
  },
});

$.typeahead({
  ...typeahead_options,
  input: "#wings",
  source: {
    head: "/icons/mob/moth_wings/moth_wings.json",
  },
  matcher: function (item, displayKey) {
    if (/_BEHIND/.test(item.display)) {
      return false;
    }
    item.display = item.display.replace(/m_moth_wings_|\_BEHIND|\_FRONT/gi, "");
    return item;
  },
});

$.typeahead({
  ...typeahead_options,
  input: "#antennae",
  source: {
    head: "/icons/mob/moth_antennae/moth_antennae.json",
  },
  matcher: function (item, displayKey) {
    if (/_BEHIND/.test(item.display)) {
      return false;
    }
    item.display = item.display.replace(
      /m_moth_antennae_|\_BEHIND|\_FRONT/gi,
      ""
    );
    return item;
  },
});

$.typeahead({
  ...typeahead_options,
  input: "#lhand",
  matcher: function (item, key) {
    if (/64x64/.test(key)) {
      return false;
    }
    if (/left/.test(key)) {
      return true;
    } else {
      return false;
    }
  },
  source: {
    items: "/icons/mob/inhands/inhands.json",
  },
});

$.typeahead({
  ...typeahead_options,
  input: "#rhand",
  matcher: function (item, key) {
    if (/64x64/.test(key)) {
      return false;
    }
    if (/right/.test(key)) {
      return true;
    } else {
      return false;
    }
  },
  source: {
    items: "/icons/mob/inhands/inhands.json",
  },
});

$.typeahead({
  ...typeahead_options,
  input: "#hud",
  source: {
    icons: {
      data: [
        "wanted",
        "released",
        "parolled",
        "prisoner",
        "incarcerated",
        "discharged",
      ],
    },
  },
});

//Form processing

$(".field").bind("input propertychange", function (e) {
  // $('#generator').submit();
  var data = {};
  $(".field").each(function () {
    data[$(this).attr("name")] = $(this).val();
  });
  if ("moth" === data.species) {
    $("#moth").show();
    $("#skincolor_control").hide();
    $("#skintone_control").hide();
  } else {
    $("#moth").hide();
  }
  if (colorableSpecies.includes(data.species)) {
    $("#skincolor_control").show();
    $("#skintone_control").hide();
  }
  if ("human" === data.species) {
    $("#skincolor_control").hide();
    $("#skintone_control").show();
  }
  if ("digitrade" === data.species) {
    $("#digitrade_select").show();
  } else {
    $("#digitrade_select").hide();
  }
  data["gender"] = $("input[name=gender]:checked").val();
  data["digitrade_variant"] = $("input[name=digitrade_variant]:checked").val();
  data["skinTone"] = $("input[name=skinTone]:checked").val();
  $("#json_out").val(JSON.stringify(data));
  $.ajax({
    url: "img.php",
    data: JSON.parse($("#json_out").val()),
    method: "POST",
    dataType: "json",
  }).done(function (i) {
    $(".render").attr("src", "data:image/png;base64," + i.bio);
    $(".body").attr("src", "data:image/png;base64," + i.body);
  });
});
$("#generator").submit(function (e) {
  e.preventDefault();
  var data = {};
  $(".field").each(function () {
    data[$(this).attr("name")] = $(this).val();
  });
  data["gender"] = $("input[name=gender]:checked").val();
  data["skinTone"] = $("input[name=skinTone]:checked").val();
  $("#json_out").val(JSON.stringify(data));
  $.ajax({
    url: "img.php",
    data: JSON.parse($("#json_out").val()),
    method: "POST",
    dataType: "json",
  }).done(function (i) {
    $(".render").attr("src", "data:image/png;base64," + i.bio);
    $(".body").attr("src", "data:image/png;base64," + i.body);
  });
});
$("#generator").submit();

$("#json_out").bind("input propertychange", function (e) {
  data = JSON.parse($(this).val());
  Object.keys(data).map(function (_) {
    console.log(_);
    console.log(data[_]);
  });
});

setInterval(function () {
  var clock = document.querySelector("#clock");
  var date = new Date();
  var month = ("0" + (date.getUTCMonth() + 1)).slice(-2);
  var days = ("0" + date.getUTCDate() + "").slice(-2);
  var seconds = ("0" + date.getUTCSeconds() + "").slice(-2);
  var minutes = ("0" + date.getUTCMinutes() + "").slice(-2);
  var hours = ("0" + date.getUTCHours() + "").slice(-2);
  var year = date.getUTCFullYear();
  clock.textContent =
    hours +
    ":" +
    minutes +
    ":" +
    seconds +
    " " +
    days +
    "." +
    month +
    "." +
    year;
}, 1000);
