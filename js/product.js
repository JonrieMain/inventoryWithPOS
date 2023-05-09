$(document).ready(()=>{


    // show add Product form
let addProduct = $('.addProduct')
let addProductForm = $('.addProductForm')
addProduct.on('click',function(){
    addProductForm.css("left","50%")
    setTimeout(function(){
        addProductForm.css("opacity","1")
    },900)
})

// hide add Product form
let closeAddProductForm = $('#closeAddProductForm')
closeAddProductForm.on('click',function(){
    addProductForm.css("opacity","0")
    setTimeout(function(){
        addProductForm.css("left","-200%")
    },1000)
})





// on click submit add product
submitAddProduct = (sapPrevent)=>{

    // ajax for add Product
    $.ajax({
        url: './actions/productAction.php',
        method: 'POST',
        data: {
            addProductName: $('[name="addProductName"]').val(),
            addProductType: $('[name="addProductType"]').val(),
            addProductQuantity: $('[name="addProductQuantity"]').val(),
            addProductPrice: $('[name="addProductPrice"]').val(),
            submitAddProduct: $('.submitAddProduct').val()

        },

    success: function(addProductRespo){
        // check if valid
        if(addProductRespo == "Successfully Add"){
            // display message
            $('.addProductFormError').text(addProductRespo).css("color","#fff").css("fontSize","1.3rem").css("background","green").css("padding", "2px 5px")
            // then reload
            setTimeout(()=>{
                location.reload();
            },1500)

        }else{
            // display error message
            $('.addProductFormError').text(addProductRespo).css("color","red").css("background", "#fff").css("padding", "2px 5px").css("fontSize", "1.3rem").css("textAlign", "center")
            
        }

    }

})




} //on click add product submit end





//for search product
$('#searchProduct').keypress(()=>{

    // ajax for search product
    $.ajax({
        method: 'POST',
        url: './actions/productAction.php',
        data: {searchProductValue: $('#searchProduct').val()},
        success: function(searchProductValueRespo){
            $('.productList').html(searchProductValueRespo)
        }
    })

})









    // for edit Product


    
     let editProduct = $('.productListEdit')
     let editProductForm = $('.editProductForm')
     let closeEditProductForm = $('#closeEditForm')
                        

        editProductShow = ()=>{

            // show edit Product form
         editProductForm.css("left","50%")
         setTimeout(function(){
             editProductForm.css("opacity","1")
         },900)

        }



                closeEditForm = ()=>{
                    editProductForm.css("opacity","0")
                    setTimeout(function(){
                        editProductForm.css("left","-200%")
                    },1000)
                }
        
              

    // get product id
    productListEditFunc = ()=>{
 $('.productListEdit').each(function(){
    $(this).on('click',function(editProductDefa){
         
            

                editProductDefa.preventDefault();
                // select id of product
            let productId = $(this).parent().children(":first").val();
       

                $.ajax({
                    url: './actions/productAction.php',
                    method: 'POST',
                    data: {productId: productId,productEditBtn: $('.productListEdit').val()},
                    success: function(productEditRespo){
                        $('.editProductForm').html(productEditRespo)
                    }
                })

           

            })

        

        })

        

    }
    // call productListEditFunc
    productListEditFunc();
    
           
  

   






// edit product info submit
updateProductInfo = (updateProductInfoDefa)=>{

    $.ajax({
        url: './actions/productAction.php',
        method: 'POST',
        data: {
            updateProductInfoBtn: $('.submitEditProduct').val(), //btn

            //product id
            editProductId: $('.editProductId').val(),

            //other data
            editProductName: $('[name="editProductName"]').val(),

            editProductType: $('[name="editProductType"]').val(),
            
            editProductQuantity: $('[name="editProductQuantity"]').val(),

            editProductPrice: $('[name="editProductPrice"]').val()  
        },

        success: function(editProductRespo){
           if(editProductRespo === "Successfully Update! Please wait.."){
                $('.editFormError').html(editProductRespo).css("color","green")
                setTimeout(function(){
                    location.reload();
                },1200)
           }else{
            $('.editFormError').html(editProductRespo).css("color","red")
           }
        }
    
    
    })

}






showProductListDeleteFunc = ()=>{
     //show animation
     $('.deleteConfirmation').css("top","50%")
     setTimeout(function(){
         $('.deleteConfirmation').css("opacity","1")
     },1200)

}

 // delete no
 deleteNo = ()=>{

    $('.deleteConfirmation').css("opacity","0")
        setTimeout(function(){
            $('.deleteConfirmation').css("top","-200%")
        },1200)

} //deleteNo end


     //make deleteProductId reset or null to avoid multiple deleting outside
    let deleteProductId = null;

//show delete confirmation
productListDeleteFunc = ()=>{
    //make deleteProductId reset or null to avoid multiple deleting inside
   deleteProductId = null;

$('.productListDelete').each(function(){

    
        $(this).on('click',function(){
            $(this).off('click');
            // get id of selected product
            
            deleteProductId =  $(this).parent().children(":first").val()

            console.log(deleteProductId)

            //concatenate existing product
            $('.showDelete').html('Are you sure you want to delete '+$(this).parent().children(":nth-child(2)").val()+' ?')

            

                // delete yes
        $('.deleteYes').on('click',function(){
            $.ajax({

                url: './actions/productAction.php',
                method: 'POST',
                data: {deleteYes: $('.deleteYes').val(),
                    deleteProductId: deleteProductId},
                success: function(deleteProductRespo){
                    location.reload();
                }       


            })
        })


    }) //loop this click end


           




}) // end loop of delete button

}
//call delete func
productListDeleteFunc();
















}) //document ready end