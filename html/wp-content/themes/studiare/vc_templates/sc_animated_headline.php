<?php
// Atts
if ( function_exists( 'vc_map_get_attributes' ) ) {
	$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
}

        extract( $atts );
        
        // ID
		if ( ! $atts['id'] ) {
			$atts['id'] = "st_".rand(1,1000);
			$public = 1;
		}
$tid = $atts['id'];
			$css_id = '#' . $atts['id'];
			
			
			// Classes
		$classes = array();
		$classes[] = $atts['id'];
		$classes[] = $atts['xtraclass'];
		$classes[] = 'st_headline';
		$classes[] = str_replace( '_', ' ', $atts['fx'] );
	
		// Out
		$out = '<' . $atts['tag'] . ' id="' . $atts['id'] . '" data-time="' . $atts['time'] . '" class="'.implode(" ",$classes).'" >';
		$out .= $atts['before_text'] ? '<span class="st_before_text">' . $atts['before_text'] . '</span>' : '';
		
		$out .='<span class="st_words-wrapper">';
		$i = 1;
		$words = (array) explode( ',', $atts['words'] );
		foreach ( $words as $word ) {
			$visible = ( $i !== 1 ) ? ' class="is-hidden"' : ' class="is-visible"';
			$out .= '<b' . $visible . '>' . $word . '</b>';
			$i++;
		}
		$out .='</span>';
		
		$out .= $atts['after_text'] ? '<span class="st_after_text">' . $atts['after_text'] . '</span>' : '';
		$out .= '</'. $atts['tag'] .'>';

$mainColor = $atts['st_title'];
$wordsColor = $atts['st_words'];

$out .= "<style>
#{$tid}{color:$mainColor;}
#{$tid} .st_words-wrapper{color:$wordsColor;}
</style>";
		
$out .= <<<'HTML'


<style>

    .st_words-wrapper {
	display: inline-block;
	position: relative;
	text-align: left;
	margin:0 10px
}
.st_words-wrapper b {
	display: inline-block;
	position: absolute;
	white-space: nowrap;
	left: 0;
	top: 0;
	font-weight: inherit
}
.st_words-wrapper b.is-visible {
	position: static
}
.no-js .st_words-wrapper b {opacity: 0}
.no-js .st_words-wrapper b.is-visible {opacity: 1}
.st_headline b {
	width: 100%;
	text-align: center
}
.st_headline.rotate-1 .st_words-wrapper {
	perspective: 300px
}
.st_headline.rotate-1 b {
	opacity: 0;
	transform-origin: 50% 100%;
	transform: rotateX(180deg)
}
.st_headline.rotate-1 b.is-visible {
	opacity: 1;
	transform: rotateX(0deg) translateZ(0);
	animation: st_rotate-1-in 1.2s forwards
}
.st_headline.rotate-1 b.is-hidden {
	transform: rotateX(180deg) translateZ(0);
	animation: st_rotate-1-out 1.2s forwards
}
@keyframes st_rotate-1-in {
	0% {transform: rotateX(180deg);opacity: 0}
	35% {transform: rotateX(120deg);opacity: 0}
	65% {opacity: 0}
	100% {transform: rotateX(360deg);opacity: 1}
}
@keyframes st_rotate-1-out {
	0% {transform: rotateX(0deg);opacity: 1}
	35% {transform: rotateX(-40deg);opacity: 1}
	65% {opacity: 0}
	100% {transform: rotateX(180deg);opacity: 0}
}
.st_headline.type .st_words-wrapper {
	vertical-align: top;
	overflow: hidden
}
.st_headline.type .st_words-wrapper:after {
	content: '';
	position: absolute;
	right: 0;
	top: 50%;
	bottom: auto;
	transform: translateY(-50%);
	height: 90%;
	width: 1px;
	background-color: #aebcb9
}
.rtl .st_headline.type .st_words-wrapper:after {
	left: 0;
	right: auto
}
.st_headline.type .st_words-wrapper.waiting:after {
	transform: translateZ(0);
	animation: st_pulse 1s infinite
}
.st_headline.type .st_words-wrapper.selected {
	background-color: #333
}
.st_headline.type .st_words-wrapper.selected:after {
	visibility: hidden
}
.st_headline.type .st_words-wrapper.selected b {
	color: #eee
}
.st_headline.type b {
	visibility: hidden;
	width: auto
}
.st_headline.type b.is-visible {
	visibility: visible
}
.st_headline.type i {
	position: absolute;
	visibility: hidden;
	font-style: normal
}
.st_headline.type i.in {
	position: relative;
	visibility: visible
}
@keyframes st_pulse {
	0% {transform: translateY(-50%) scale(1);opacity: 1}
	40% {transform: translateY(-50%) scale(.9);opacity: 0}
	100% {transform: translateY(-50%) scale(0);opacity: 0}
}
.st_headline.rotate-2 .st_words-wrapper {
	perspective: 300px
}
.st_headline.rotate-2 i, .st_headline.rotate-2 em {
	display: inline-block;
	-webkit-backface-visibility: hidden;
	backface-visibility: hidden
}
.st_headline.rotate-2 b {
	opacity: 0
}
.st_headline.rotate-2 i {
	transform-style: preserve-3d;
	transform: translateZ(-20px) rotateX(90deg);
	opacity: 0;
	font-style: normal
}
.is-visible .st_headline.rotate-2 i {
	opacity: 1
}
.st_headline.rotate-2 i.in {
	animation: st_rotate-2-in .4s forwards
}
.st_headline.rotate-2 i.out {
	animation: st_rotate-2-out .4s forwards
}
.st_headline.rotate-2 em {
	transform: translateZ(20px);
	font-style: normal;
	font-weight: normal
}
.no-csstransitions .st_headline.rotate-2 i {
	transform: rotateX(0deg);
	opacity: 0
}
.no-csstransitions .st_headline.rotate-2 i em {
	transform: scale(1)
}
.no-csstransitions .st_headline.rotate-2 .is-visible i {
	opacity: 1
}
@keyframes st_rotate-2-in {
	0% {opacity: 0;transform: translateZ(-20px) rotateX(90deg)}
	60% {opacity: 1;transform: translateZ(-20px) rotateX(-10deg)}
	100% {opacity: 1;transform: translateZ(-20px) rotateX(0deg)}
}
@keyframes st_rotate-2-out {
	0% {opacity: 1;transform: translateZ(-20px) rotateX(0)}
	60% {opacity: 0;transform: translateZ(-20px) rotateX(-100deg)}
	100% {opacity: 0;transform: translateZ(-20px) rotateX(-90deg)}
}
.st_headline.loading-bar span {
	display: inline-block;
	padding: .2em 0
}
.st_headline.loading-bar .st_words-wrapper {
	overflow: hidden;
	vertical-align: top
}
.st_headline.loading-bar .st_words-wrapper:after {
	content: '';
	position: absolute;
	left: 0;
	bottom: 10px;
	height: 2px;
	width: 0;
	background: rgba(125,125,125,.5);
	z-index: 2;
	transition: width .3s -0.1s
}
.st_headline.loading-bar .st_words-wrapper.is-loading:after {
	width: 100%;
	transition: width 3s
}
.st_headline.loading-bar b {
	top: .2em;
	opacity: 0;
	transition: opacity .3s
}
.st_headline.loading-bar b.is-visible {
	opacity: 1;
	top: 0
}
.st_headline.slide span {
	display: inline-block;
	padding: .2em 0
}
.st_headline.slide .st_words-wrapper {
	overflow: hidden;
	vertical-align: top
}
.st_headline.slide b {
	opacity: 0;
	top: .2em
}
.st_headline.slide b.is-visible {
	top: 0;
	opacity: 1;
	animation: slide-in .6s forwards
}
.st_headline.slide b.is-hidden {
	animation: slide-out .6s forwards
}
@keyframes slide-in {
	0% {opacity: 0;transform: translateY(-100%)}
	60% {opacity: 1;transform: translateY(20%)}
	100% {opacity: 1;transform: translateY(0)}
}
@keyframes slide-out {
	0% {opacity: 1;transform: translateY(0)}
	60% {opacity: 0;transform: translateY(120%)}
	100% {opacity: 0;transform: translateY(100%)}
}
.st_headline.clip span {
	display: inline-block;
	padding: .2em 0
}
.st_headline.clip .st_words-wrapper {
	overflow: hidden;
	vertical-align: top
}
.st_headline.clip .st_words-wrapper:after {
	content: '';
	position: absolute;
	top: 20%;
	right: 0;
	width: 0;
	height: 60%;
	background-color: rgba(125,125,125,.7)
}
.st_headline.clip b {
	opacity: 0;
	width: auto
}
.st_headline.clip b.is-visible {
	opacity: 1
}
.st_headline.zoom .st_words-wrapper {perspective: 300px}
.st_headline.zoom b {opacity: 0}
.st_headline.zoom b.is-visible {opacity: 1;animation: zoom-in .8s forwards}
.st_headline.zoom b.is-hidden {animation: zoom-out .8s forwards}
@keyframes zoom-in {
	0% {opacity: 0;transform: translateZ(100px)}
	100% {opacity: 1;transform: translateZ(0)}
}
@keyframes zoom-out {
	0% {opacity: 1;transform: translateZ(0)}
	100% {opacity: 0;transform: translateZ(-100px)}
}
.st_headline.rotate-3 .st_words-wrapper {
	perspective: 300px
}
.st_headline.rotate-3 b {
	opacity: 0
}
.st_headline.rotate-3 i {
	display: inline-block;
	transform: rotateY(180deg);
	-webkit-backface-visibility: hidden;
	backface-visibility: hidden;
	font-style: normal
}
.is-visible .st_headline.rotate-3 i {
	transform: rotateY(0deg)
}
.st_headline.rotate-3 i.in {
	animation: st_rotate-3-in .6s forwards
}
.st_headline.rotate-3 i.out {
	animation: st_rotate-3-out .6s forwards
}
.no-csstransitions .st_headline.rotate-3 i {
	transform: rotateY(0deg);
	opacity: 0
}
.no-csstransitions .st_headline.rotate-3 .is-visible i {
	opacity: 1
}
@keyframes st_rotate-3-in {
	0% {transform: rotateY(180deg)}
	100% {transform: rotateY(0deg)}
}
@keyframes st_rotate-3-out {
	0% {transform: rotateY(0)}
	100% {transform: rotateY(-180deg)}
}
.st_headline.scale b {
	opacity: 0
}
.st_headline.scale i {
	display: inline-block;
	opacity: 0;
	transform: scale(0);
	font-style: normal
}
.is-visible .st_headline.scale i {
	opacity: 1
}
.st_headline.scale i.in {
	animation: scale-up .6s forwards
}
.st_headline.scale i.out {
	animation: scale-down .6s forwards
}
.no-csstransitions .st_headline.scale i {
	transform: scale(1);
	opacity: 0
}
.no-csstransitions .st_headline.scale .is-visible i {
	opacity: 1
}
@keyframes scale-up {
	0% {transform: scale(0);opacity: 0}
	60% {transform: scale(1.2);opacity: 1}
	100% {transform: scale(1);opacity: 1}
}
@keyframes scale-down {
	0% {transform: scale(1);opacity: 1}
	60% {transform: scale(0);opacity: 0}
}
.st_headline.push b {
	opacity: 0
}
.st_headline.push b.is-visible {
	opacity: 1;
	animation: push-in .6s forwards
}
.st_headline.push b.is-hidden {
	animation: push-out .6s forwards
}
@keyframes push-in {
	0% {opacity: 0;transform: translateX(-100%)}
	60% {opacity: 1;transform: translateX(10%)}
	100% {opacity: 1;transform: translateX(0)}
}
@keyframes push-out {
	0% {opacity: 1;transform: translateX(0)}
	60% {opacity: 0;transform: translateX(110%)}
	100% {opacity: 0;transform: translateX(100%)}
}
</style>

<script>
    ! function( s ) {
    "use strict";

    //animated_text = function() {
    function animated_text(){
        var e = s(".st_headline");
        if (e.length) {
            var i = e.data("time") || 3e3,
                a = i,
                t = i,
                n = t - 2e3,
                l = 50,
                d = 150,
                r = 500,
                o = r + 800,
                c = 600,
                h = i;
            e.length && (s(".st_headline.letters").find("b").each(function(e) {
                var i = s(this),
                    a = i.text().split(""),
                    t = i.hasClass("is-visible");
                for (e in a) i.parents(".rotate-2").length > 0 && (a[e] = "<em>" + a[e] + "</em>"), a[e] = t ? '<i class="in">' + a[e] + "</i>" : "<i>" + a[e] + "</i>";
                var n = a.join("");
                i.html(n).css("opacity", 1)
            }), e.each(function() {
                var e = s(this),
                    i = a;
                if (e.hasClass("loading-bar")) i = t, setTimeout(function() {
                    e.find(".st_words-wrapper").addClass("is-loading")
                }, n);
                else if (e.hasClass("clip")) {
                    var l = e.find(".st_words-wrapper"),
                        d = l.width();
                    l.css("width", d)
                } else if (!e.hasClass("type")) {
                    var r = e.find(".st_words-wrapper b"),
                        o = 0;
                    r.each(function() {
                        var e = s(this).width();
                        e > o && (o = e)
                    })
                }
                setTimeout(function() {
                    u(e.find(".is-visible").eq(0))
                }, i)
            }));

            function u(e) {
                var i = C(e);

    			// Switch classes
    			if ( ! i.closest( ".clip" ).length ) {

    				if ( i.closest( ".rotate-1" ).length ) {
    					setTimeout(function() {
    						i.parent().css( 'width', '' );
    					}, 750 );
    				}

    				i.addClass( 'is-visible' ).removeClass( 'is-hidden' ).siblings().addClass( 'is-hidden' ).removeClass( 'is-visible' );
    				
    				if ( i.closest( ".rotate-1" ).length ) {
    					setTimeout(function() {
    						i.parent().css( 'width', i.width() );
    					}, 1000 );
    				}
    				
    			}

                if (e.parents(".st_headline").hasClass("type")) {
                    var h = e.parent(".st_words-wrapper");
                    h.addClass("selected").removeClass("waiting"), setTimeout(function() {
                        h.removeClass("selected"), e.removeClass("is-visible").addClass("is-hidden").children("i").removeClass("in").addClass("out")
                    }, r), setTimeout(function() {
                        p(i, d)
                    }, o)
                } else if (e.parents(".st_headline").hasClass("letters")) {
                    var v = e.children("i").length >= i.children("i").length;
                    ! function e(i, t, n, l) {

                        i.removeClass("in").addClass("out");
                        i.is(":last-child") ? n && setTimeout(function() {
                            u(C(t))
                        }, a) : setTimeout(function() {
                            e(i.next(), t, n, l)
                        }, l);
                        if (i.is(":last-child") && s("html").hasClass("no-csstransitions")) {
                            var d = C(t);
                            m(t, d)
                        }
                    }(e.find("i").eq(0), e, v, l), f(i.find("i").eq(0), i, v, l)
                } else e.parents(".st_headline").hasClass("clip") ? e.parents(".st_words-wrapper").animate({
                    width: "2px"
                }, c, function() {
                    m(e, i), p(i)
                }) : e.parents(".st_headline").hasClass("loading-bar") ? (e.parents(".st_words-wrapper").removeClass("is-loading"), m(e, i), setTimeout(function() {
                    u(i)
                }, t), setTimeout(function() {
                    e.parents(".st_words-wrapper").addClass("is-loading")
                }, n)) : (m(e, i), setTimeout(function() {
                    u(i)
                }, a))
            }

            function p(s, e) {
                s.parents(".st_headline").hasClass("type") ? (f(s.find("i").eq(0), s, !1, e), s.addClass("is-visible").removeClass("is-hidden")) : s.parents(".st_headline").hasClass("clip") && s.parents(".st_words-wrapper").animate({
                    width: s.width()
                }, c, function() {
                    setTimeout(function() {
                        u(s)
                    }, h)
                })
            }

            function f(s, e, i, t) {
                s.addClass("in").removeClass("out"), s.is(":last-child") ? (e.parents(".st_headline").hasClass("type") && setTimeout(function() {
                    e.parents(".st_words-wrapper").addClass("waiting")
                }, 200), i || setTimeout(function() {
                    u(e)
                }, a)) : setTimeout(function() {
                    f(s.next(), e, i, t)
                }, t)
            }

            function C(s) {
                return s.is(":last-child") ? s.parent().children().eq(0) : s.next()
            }

            function m(s, e) {
                s.removeClass("is-visible").addClass("is-hidden"), e.removeClass("is-hidden").addClass("is-visible");
            }
        }
    } animated_text();
}(jQuery);
</script>
HTML;
return  $out;
ob_get_clean();
?>