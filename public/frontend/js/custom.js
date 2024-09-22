$(function(){

    $(window).on("load",function(){
        $("#preloader").delay(400).fadeOut(500)
      })

  
    $(window).scroll(function(){
        var scrolling = $(this).scrollTop()
         if(scrolling > 50){
          $(".navbar").addClass("nav-bg")
         }else{
          $(".navbar").removeClass("nav-bg")
         }
      
         if(scrolling > 30){
          $(".back-to-top").fadeIn(500)
         }else{
          $(".back-to-top").fadeOut(500)
         }
      })


     


  


})
function toggleOtherField() {
    var otherCheckbox = document.getElementById("other");
    var otherField = document.getElementById("otherField");

    if (otherCheckbox.checked) {
        otherField.style.display = "block";
    } else {
        otherField.style.display = "none";
    }
}

$('.concern-slide').slick({
    infinite: true,
    slidesToShow: 5,
    slidesToScroll: 1,
    speed: 500,
    autoplay: true,  // Corrected here
    autoplaySpeed: 2000,  // You can set the interval for autoplay (default is 3000 ms)
    nextArrow: ".next",
    prevArrow: ".prev",
    responsive: [
        {
            breakpoint: 991.98,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1,
                speed: 500,
                arrows: false,
                dots: false
            }
        },
        {
            breakpoint: 766.98,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1,
                speed: 500,
                arrows: false,
                dots: false
            }
        },
        {
            breakpoint: 575.98,
            settings: {
                infinite: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                speed: 500,
                arrows: false,
                dots: false
            }
        }
    ]
});
