$(document).ready(()=>{

    let bars = $('#bars');
    let sidebar = $('.sidebar');

bars.on('click',function(){
    if(bars.hasClass('fa-solid fa-x')){     
       bars.removeClass('fa-solid fa-x');
       bars.addClass('fa-sharp fa-solid fa-bars');
       sidebar.css("left","-200%"); 
    }else{
        bars.removeClass('fa-sharp fa-solid fa-bars');  
        bars.addClass('fa-solid fa-x');
        sidebar.css("left","0"); 
    }
})


//logout make session invalid
$('.logout').on('click',function(log){
	log.preventDefault;

    
	$.ajax({
		url: './actions/action.php',
		method: 'POST',
		data: {logout: $('.logout').val()},
		success: function(logoutRespo){
			window.location.href='index.php';
		}
	})

})





})