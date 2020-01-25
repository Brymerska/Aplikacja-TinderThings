$(document).ready(function () {

});
function showAd(id){
    $.ajax({
        url: '?page=showAdOne',
        data:{id:id},
        dataType: 'json'
    })
        .done((res) => {
            console.log(res);
            var c=$("#ad");
            $("#ads").attr('style','display:none');
            c.empty();
            c.attr('style','display:');
            c.append(`<div class='col-12' style="border-style: solid; border-color:#AD1111;">
<div class="row">
<div class="col-3">Tytuł:</div>
<div class="col-9">${res.name}</div>
</div>
<br>
<div class="row">
<div class="col-3">Opis:</div>
<div class="col-9">${res.description}</div>
</div>
<br>
<div class="row">
<div class="col-3">Wystawiajacy:</div>
<div class="col-9">${res.username}</div>
</div>
<br>
<div class="row">
<div class="col-3">Miasto:</div>
<div class="col-9">${res.city}</div>
</div>
<br>
<div class="row">
<div class="col-3">Kategoria:</div>
<div class="col-9">${res.category}</div>
</div>
<br>
<div class="row">
<div class="col-2">Obrazek:</div>
<div class="col-10"><img src="uploads/${res.namefile}" width="200px;" height="200px;"></div>
</div>
<br>
<div class="row">
<div class="col-12"><button class="btn btn-info" style="width:40%; height:90%"  onclick="buyAd(${res.idad})"style="height:50px"<h2>Weź</button></div>
</div>
</div>`);

        });
}

function buyAd(id) {
    $.ajax({
        url: '?page=buyAd',
        data:{id:id},
        dataType: 'json'
    }).done((res) => {
        alert(res['result']);
    }).fail((res)=> {
        alert(res['result']);
    });
}