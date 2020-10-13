      var i;
      var KichThuoc = document.getElementsByClassName("slides")[0].clientWidth;
    var Chuyenslide = document.getElementsByClassName("content-slide")[0];
    var Img = Chuyenslide.getElementsByTagName('img');
    var dots = document.getElementsByClassName("dot");
    var Max = KichThuoc * Img.length;
      Max -= KichThuoc;
    var Chuyen = 0;
    function Next(){
      if(Chuyen < Max)
      Chuyen += KichThuoc;
      else Chuyen = 0;
      Chuyenslide.style.marginLeft = '-'+ Chuyen + 'px';
      for (i = 0; i < dots.length; i++) {
              dots[i].className = dots[i].className.replace(" active", "");
            }
            dots[Chuyen/KichThuoc].className += " active";
            if (Chuyen/KichThuoc > Img.length - 1) {
            slideIndex = 0
            }  
    }
    function Prev(){
      if(Chuyen == 0)
      Chuyen = Max;
      else Chuyen -= KichThuoc;
      Chuyenslide.style.marginLeft = '-'+ Chuyen + 'px';
        for (i = 0; i < dots.length; i++) {
              dots[i].className = dots[i].className.replace(" active", "");
            }
            dots[Chuyen/KichThuoc].className += " active";
            if (Chuyen/KichThuoc > Img.length - 1) {
            slideIndex = 0
            }  
    }
    setInterval(function(){
      Next();
      
    },3000);
    function showSlides(){
      for (i = 0; i < dots.length; i++) {
              dots[i].className = dots[i].className.replace(" active", "");
            }
            Chuyenslide.style.marginLeft = '-'+ slideIndex * KichThuoc + 'px';
            Chuyen = slideIndex * KichThuoc;
            dots[slideIndex].className += " active";
            slideIndex++;
            if (slideIndex > Img.length - 1) {
            slideIndex = 0
            }  
    }
    function currentSlide(n) {
        showSlides(slideIndex = n);
      }
    /* slide_content */
    var KichThuoc1 = document.getElementsByClassName("main-left")[0].clientWidth;
    var Chuyenslide1 = document.getElementsByClassName("product_content")[0];
    var Chuyenslide2 = document.getElementsByClassName("product_content")[1];
    var Chuyenslide3 = document.getElementsByClassName("product_content")[2];
    var Img1 = Chuyenslide1.getElementsByClassName('img_item');
      var Max1 = KichThuoc1/4 * Img1.length;
      Max1 -= KichThuoc1;
      var Chuyen1 = 0;
      var Chuyen2 = 0;
      var Chuyen3 = 0;
    function Next_img(){
      if(Chuyen1 < Max1)
      Chuyen1 += (KichThuoc1/4);
      else Chuyen1 = 0;
      Chuyenslide1.style.marginLeft = '-'+ Chuyen1 + 'px';

    }
     function Prev_img(){
      if(Chuyen1 == 0)
      Chuyen1 = Max1;
      else Chuyen1 -= KichThuoc1/4;
      Chuyenslide1.style.marginLeft = '-'+ Chuyen1 + 'px';

    }
    setInterval(function(){
      Next_img();
    },3000);
    function Next_img1(){
      if(Chuyen2 < Max1)
      Chuyen2 += (KichThuoc1/4);
      else Chuyen2 = 0;
      Chuyenslide2.style.marginLeft = '-'+ Chuyen2 + 'px';

    }
     function Prev_img1(){
      if(Chuyen2 == 0)
      Chuyen2 = Max1;
      else Chuyen2 -= KichThuoc1/4;
      Chuyenslide2.style.marginLeft = '-'+ Chuyen2 + 'px';

    }
    setInterval(function(){
      Next_img1();
    },3000);
    function Next_img2(){
      if(Chuyen3 < Max1)
      Chuyen3 += (KichThuoc1/4);
      else Chuyen3 = 0;
      Chuyenslide3.style.marginLeft = '-'+ Chuyen3 + 'px';

    }
     function Prev_img2(){
      if(Chuyen3 == 0)
      Chuyen3 = Max1;
      else Chuyen3 -= KichThuoc1/4;
      Chuyenslide3.style.marginLeft = '-'+ Chuyen3 + 'px';

    }
    setInterval(function(){
      Next_img2();
    },3000);
    function disableScrolling(){
    var x=window.scrollX;
    var y=window.scrollY;
    window.onscroll=function(){window.scrollTo(x, y);};
}
 
function enableScrolling(){
    window.onscroll=function(){};
}