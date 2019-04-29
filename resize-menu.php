    <script>
        (function($, win) {
            $.fn.inViewport = function(cb) {
                return this.each(function(i,el){
                function visPx(){
                    var H = $(this).height(),
                        r = el.getBoundingClientRect(), t=r.top, b=r.bottom;
                    return cb.call(el, Math.max(0, t>0? H-t : (b<H?b:H)));  
                } visPx();
                $(win).on("resize scroll", visPx);
                });
            };
        }(jQuery, window));

        $(".sketch-img").inViewport(function(px){
            if(px) {
                $(this).removeClass("app-hidden");
                $(this).addClass("app-visible");
            }
        });
        $(".lower-section").inViewport(function(px){
            if(px) {
                $(this).removeClass("section-hidden");
                $(this).addClass("section-visible");
            }
        });
        $(document).scroll(function() {
            if($(window).scrollTop() > 30) {
                $(".navbar").css('padding', '0px 15px');

            } else {
                $(".navbar").css('padding', '15px 15px');


            }
        });
    </script>	