var rows = $('tbody>tr');
let leng = rows.length;
for (let i = 0; i < leng; i++) {
    let id = rows[i].children[0].innerHTML;
    $(rows[i]).mouseenter(function () {
        $(rows[i]).css("background", "lightgrey");       
        $('#img-container').html("<img  class='m-2 img-slice' src='/public/images/" + id +".jpg'  alt='' >");
    }).mouseleave(function () {
        $(rows[i]).css("background", "white");
        $('#img-container').html("<img  class='m-2' style='max-width:270px;' src='/public/images/noimage.png'  alt='noimage' >");             
    });
    let colLeng = rows[i].children.length;
    for (let j = 0; j < colLeng - 1; j++) {
        $(rows[i].children[j]).click(function () {
            setTimeout(function () {
                window.location.href = '/admin/edit/' + id;
            }, 250);
        });
    }
}

