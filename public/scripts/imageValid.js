function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();      
        reader.onload = function (e) {          
            e.target.result.includes('image')?
            $('#img-container').html("<img  class='m-2 img-slice' src='"+e.target.result+ "'  alt='' >"):
            $('#img-container').html("<img  class='m-2' style='max-width:270px;' src='/public/images/noimage.png'  alt='noimage' >");             
        }
        reader.readAsDataURL(input.files[0]);
    }
}

$("#image").change(function () {    
    readURL(this);
});
