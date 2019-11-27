<div class="container-global">

<div class="container-fluid bg-light pt-3 pb-3">
     <form  action='add' method='post'>           
        <div class="card "  >
            <div class="card-header">
                <h5><?=$title?></h5>
            </div>    
            <div class="row">  
            <div class="d-none text-center w-100" id='validate-errorAdd'><small class="text-danger"><?=htmlspecialchars($errorAdd['message'],ENT_QUOTES)?></small></div>        
                                   
                <div class="col-sm-12 col-lg-6">
                    <div class="card-body"> 
                        <div class="form-group">
                            <label for="bookName">Название</label>
                            <input type="text" name='bookName' class="form-control" id="bookName">
                            <small id='validate-bookName' class="text-danger d-none"><?=htmlspecialchars($bookName['message'],ENT_QUOTES)?> </small>
                        </div>
                        <div class="form-group">
                            <label for="author">Автор</label>
                            <input type="text" name='author' class="form-control" id="author" >
                            <small id='validate-author' class="text-danger d-none"><?=htmlspecialchars($author['message'],ENT_QUOTES)?>  </small>
                        </div>                                     
                        <div class="form-group">
                            <label for="image">Изображение</label>                                       
                            <input type="file" name="image" class="form-control-file"  id="image">
                            <small id='validate-image' class='text-danger d-none' ><?=htmlspecialchars($image['message'],ENT_QUOTES)?></small>
                        </div>                                          
                    </div>                          
                </div> 
                <div class="col text-center"  id='img-container'>
                    <img  class='m-2 img-slice'  style='max-width:270px;' src='/public/images/noimage.png'  alt='noimage' >
                </div>                   
            </div> 
            <div class="card-footer">                                    
                <button type="submit"  class="btn btn-primary w-sm-100 w-lg-30 ">Сохранить</button>                        
            </div>
        </div>
        
    </form> 
</div>
</div>  
<script type='text/javascript' src='/public/scripts/imageValid.js'></script>   
