<script src="{{asset('js/extra/bootstrap/bootstrap.bundle.min.js')}}"  ></script>
<script src="{{asset('js/extra/jquery/jquery.min.js')}}"  ></script>
<script src="{{asset('js/extra/plugin/owl.carousel.min.js')}}"  ></script>
<script src="{{asset('adminTemp/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
<script src="{{asset('js/extra/view-bigimg.js')}}"  ></script>
<script>
  var viewer = new ViewBigimg();

var wrap = document.getElementById('wrap')
wrap.onclick = function (e) {
  $('#header').css('z-index','1');
  if (e.target.nodeName === 'IMG') {
    viewer.show(e.target.src)
  }
}



</script>

<script>


$(document).ready(function(){
  $('.owl-carousel').owlCarousel({
    center: true,
    
    items:2,
    loop:true,
    autoplay: true,
    autoWidth:true,
    responsiveClass: true,
    autoPlaySpeed: 12000,
    autoPlayTimeout: 12000,
    autoplayHoverPause: true,
    navigation: true,
    navigationText: ["h", "uh"]
   
});
});

$(document).ready(function() {
  $('form#cartform').on('submit', function(e){
 
    event.preventDefault();
        var form=$(this);
        var formData = new FormData($(this)[0]);
         $.ajax({
          url: form.attr('action'),
          type: form.attr('method'),
          data: formData,
          success: function (data) {
          //  $("#cartmodal").modal('show');

            var totaltem= $("#cartb").text();
            totaltem++;
            $("#cartb").text(totaltem);

            $("#cart-panel").css('display','block');

            
           
        },
          error: function (err) {
            console.log("error=>"+err); 
          
          
          
          },
          cache: false,
          contentType: false,
          processData: false
         });

    
  });
});
$('#exitBtn').click(function(){
  $("#cart-panel").css('display','none');
  
    
});


function valueupdate(id,price){
  var quantityid="quantity"+id;
  var totalid="total"+id;

  var quantity=$("#"+quantityid).val();


  quantity++;

  var newtotal=quantity*price;

  $("#"+quantityid).val(quantity);
  $("#"+totalid).text(newtotal);

 

}
 function dcrease(){
   var quantity=$("#quan").val();
  quantity--;
 $("#quan").val(quantity);
 if(quantity<1){
  $("#quan").val("1");
 }

 }
 function increase(){
  var quantity=$("#quan").val();
  quantity++;
 $("#quan").val(quantity);


 }

function valueupdatem(id,price){
  var quantityid="quantity"+id;
  var totalid="total"+id;

  var quantity=$("#"+quantityid).val();

  quantity--;

  if(quantity<1){

    quantity=1;
  }
  var newtotal=quantity*price;

  $("#"+quantityid).val(quantity);
  $("#"+totalid).text(newtotal);

 

}


$('.imgview').click(function(){
  var image = $(this).attr('src');
  
   $('#imgbig').attr('src',image);
    
});


function getCollectionr(id){

              $.ajax({
              url: '',
                    type: 'GET',
                    data: {'id':id},
				  	        dataType: 'json',
					          cache:false,
					      success: function (data) {

                  var customHtml = '';
                  var response = data.success;
    for (var i in response) {
      customHtml = ""



      
    }
                     

     
     
                         }
                        });

  }

         
  $('.itemnavr').click(function (event) {
    $('.itemnavr').css('background-color','rgb(222, 222, 222)');
    $(this).css('background-color','rgb(248, 128, 0)');
event.preventDefault();

// Load the content from the link's href attribute
$('.content').load($(this).attr('href'));
});
$('.itemnavr').eq(0).trigger('click'); 
 
</script>
<script>
  (function (window, document) {
      var loader = function () {
          var script = document.createElement("script"), tag = document.getElementsByTagName("script")[0];
          script.src = "https://sandbox.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7);
          tag.parentNode.insertBefore(script, tag);
      };

      window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload", loader);
  })(window, document);
</script>
