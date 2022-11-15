function prikazi() {
  var bg = document.getElementById("form-bg");
  var form = document.getElementById("form-prikaz");

  bg.style.display = "block";
  form.style.display = "block";
}

$("#form").submit(function (event) {
  event.preventDefault();

  const $form = $(this);
  const serijalizacija = $form.serialize();
  console.log(serijalizacija);

  if (izUrediForme) {
    urediAjax(serijalizacija);
    return;
  }

  req = $.ajax({
    url: "handler/add.php",
    type: "post",
    data: serijalizacija,
  });

  req.done(function (res, textStatus, jqXHR) {
    location.reload(true);
  });

  req.fail(function (jqXHR, textStatus, errorThrown) {
    console.error("Sledeca greska se desila> " + textStatus, errorThrown);
  });

  activeItem = false;
});

var izUrediForme = false;

function ponisti() {
  izUrediForme = false;

  var bg = document.getElementById("form-bg");
  var form = document.getElementById("form-prikaz");

  bg.style.display = "none";
  form.style.display = "none";
}

function uredi(id, naslov, opis, lokacija, vremeod, vremedo) {
  prikazi();

  izUrediForme = true;

  document.getElementById("form-id").value = id;
  document.getElementById("form-naslov").value = naslov;
  document.getElementById("form-opis").value = opis;
  document.getElementById("form-lokacija").value = lokacija;

  var vremeod2 = Date.parse(vremeod) + 1000 * 60 * 60;
  vremeod2 = new Date(vremeod2).toISOString().slice(0, 16);
  document.getElementById("form-vremeod").value = vremeod2;

  var vremedo2 = Date.parse(vremedo) + 1000 * 60 * 60;
  vremedo2 = new Date(vremedo2).toISOString().slice(0, 16);
  document.getElementById("form-vremedo").value = vremedo2;
}

function urediAjax(serijalizacija) {
  req = $.ajax({
    url: "handler/update.php",
    type: "post",
    data: serijalizacija,
  });

  req.done(function (res, textStatus, jqXHR) {
    location.reload(true);
  });

  req.fail(function (jqXHR, textStatus, errorThrown) {
    console.error("Sledeca greska se desila> " + textStatus, errorThrown);
  });

  izUrediForme = false;
}

function obrisi(id1) {
  req = $.ajax({
    url: "handler/delete.php",
    type: "post",
    data: { id: id1 },
  });

  req.done(function (res, textStatus, jqXHR) {
    location.reload(true);
  });

  req.fail(function (jqXHR, textStatus, errorThrown) {
    console.error("Sledeca greska se desila> " + textStatus, errorThrown);
  });

  activeItem = false;
}

let tipSortiranja = 1;



const nizDogadjaja = [...document.getElementById("data").children];
const container = document.getElementById("data");
var pretraga = document.getElementById("pretraga");

function pretrazi() {
  container.innerHTML = "";

  for (let i = 0; i < nizDogadjaja.length; i++) {
    if (
      nizDogadjaja[i].children[0].innerHTML
        .toLowerCase()
        .includes(pretraga.value)
    ) {
      container.appendChild(nizDogadjaja[i]);
    }
  }
}
