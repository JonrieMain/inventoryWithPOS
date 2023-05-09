$(document).ready(function(){

    // add Sales input
    $('#add').on('click',()=>{
        // clone existing
        $('#productSales').clone().appendTo($('.addSalesForm'));
    });

    $('.submitSale').on('click', () => {
        let salesArr = [];
        let buyerName = $('.nameSale').val();
       
      
        $('.productSales').each((ind,elem) => {
          let quantitySale = $(elem).find('.quantitySale').val();
          let priceSale = $(elem).find('.priceSale').val();
          let select = $(elem).find('.select').val();


            // push
            salesArr.push({
                quantitySale: quantitySale,
                select: select,
                priceSale: priceSale
            });

        });



        
        $.ajax({
            url: './actions/salesAction.php',
            method: 'POST',
            data: {
                buyerName: buyerName,
                salesProduct: salesArr
            },
            success: (submitSalesRespo)=>{
                console.log(submitSalesRespo);
            }

        });


      });


	});