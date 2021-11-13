    $(document).ready(function(){
      var swiper = new Swiper('.swiper-container', {
      slidesPerView: 1,/*n�mero de slides por visualiza��o*/
      spaceBetween: 15,/*dist�ncia entre slides em px*/
      slidesPerGroup: 1,/*n�mero de slides para definir e ativar o deslizamento de grupo*/
      loop: true,/*ativa modo loop (repeti��o infinita)*/
      loopFillGroupWithBlank: true,/* ir� preencher grupos com n�mero insuficiente de slides com slides em branco*/
      autoplay: {
        delay: 5000,
        disableOnInteraction: false,
      },
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });
});