<?php
//hi
?>

<style>
    
   * {
	border: 0;
	box-sizing: border-box;
	margin: 0;
	padding: 0;
}
:root {
	--hue: 223;
	--bg: hsl(var(--hue),90%,90%);
	--fg: hsl(var(--hue),90%,10%);
	--trans-dur: 0.3s;
}
.pencil {
	display: block;
	width: 10em;
	height: 10em;
}
.pencil__body1,
.pencil__body2,
.pencil__body3,
.pencil__eraser,
.pencil__eraser-skew,
.pencil__point,
.pencil__rotate,
.pencil__stroke {
	animation-duration: 3s;
	animation-timing-function: linear;
	animation-iteration-count: infinite;
}
.pencil__body1,
.pencil__body2,
.pencil__body3 {
	transform: rotate(-90deg);
}
.pencil__body1 {
	animation-name: pencilBody1;
}
.pencil__body2 {
	animation-name: pencilBody2;
}
.pencil__body3 {
	animation-name: pencilBody3;
}
.pencil__eraser {
	animation-name: pencilEraser;
	transform: rotate(-90deg) translate(49px,0);
}
.pencil__eraser-skew {
	animation-name: pencilEraserSkew;
	animation-timing-function: ease-in-out;
}
.pencil__point {
	animation-name: pencilPoint;
	transform: rotate(-90deg) translate(49px,-30px);
}
.pencil__rotate {
	animation-name: pencilRotate;
}
.pencil__stroke {
	animation-name: pencilStroke;
	transform: translate(100px,100px) rotate(-113deg);
}

/* Animations */
@keyframes pencilBody1 {
	from,
	to {
		stroke-dashoffset: 351.86;
		transform: rotate(-90deg);
	}
	50% {
		stroke-dashoffset: 150.8; /* 3/8 of diameter */
		transform: rotate(-225deg);
	}
}
@keyframes pencilBody2 {
	from,
	to {
		stroke-dashoffset: 406.84;
		transform: rotate(-90deg);
	}
	50% {
		stroke-dashoffset: 174.36;
		transform: rotate(-225deg);
	}
}
@keyframes pencilBody3 {
	from,
	to {
		stroke-dashoffset: 296.88;
		transform: rotate(-90deg);
	}
	50% {
		stroke-dashoffset: 127.23;
		transform: rotate(-225deg);
	}
}
@keyframes pencilEraser {
	from,
	to {
		transform: rotate(-45deg) translate(49px,0);
	}
	50% {
		transform: rotate(0deg) translate(49px,0);
	}
}
@keyframes pencilEraserSkew {
	from,
	32.5%,
	67.5%,
	to {
		transform: skewX(0);
	}
	35%,
	65% {
		transform: skewX(-4deg);
	}
	37.5%, 
	62.5% {
		transform: skewX(8deg);
	}
	40%,
	45%,
	50%,
	55%,
	60% {
		transform: skewX(-15deg);
	}
	42.5%,
	47.5%,
	52.5%,
	57.5% {
		transform: skewX(15deg);
	}
}
@keyframes pencilPoint {
	from,
	to {
		transform: rotate(-90deg) translate(49px,-30px);
	}
	50% {
		transform: rotate(-225deg) translate(49px,-30px);
	}
}
@keyframes pencilRotate {
	from {
		transform: translate(100px,100px) rotate(0);
	}
	to {
		transform: translate(100px,100px) rotate(720deg);
	}
}
@keyframes pencilStroke {
	from {
		stroke-dashoffset: 439.82;
		transform: translate(100px,100px) rotate(-113deg);
	}
	50% {
		stroke-dashoffset: 164.93;
		transform: translate(100px,100px) rotate(-113deg);
	}
	75%,
	to {
		stroke-dashoffset: 439.82;
		transform: translate(100px,100px) rotate(112deg);
	}
} 
    
</style>

<div>
    <svg class="pencil" viewBox="0 0 200 200" width="200px" height="200px" xmlns="http://www.w3.org/2000/svg">
	<defs>
		<clipPath id="pencil-eraser">
			<rect rx="5" ry="5" width="30" height="30"></rect>
		</clipPath>
	</defs>
	<circle class="pencil__stroke" r="70" fill="none" stroke="currentColor" stroke-width="2" stroke-dasharray="439.82 439.82" stroke-dashoffset="439.82" stroke-linecap="round" transform="rotate(-113,100,100)" />
	<g class="pencil__rotate" transform="translate(100,100)">
		<g fill="none">
			<circle class="pencil__body1" r="64" stroke="hsl(223,90%,50%)" stroke-width="30" stroke-dasharray="402.12 402.12" stroke-dashoffset="402" transform="rotate(-90)" />
			<circle class="pencil__body2" r="74" stroke="hsl(223,90%,60%)" stroke-width="10" stroke-dasharray="464.96 464.96" stroke-dashoffset="465" transform="rotate(-90)" />
			<circle class="pencil__body3" r="54" stroke="hsl(223,90%,40%)" stroke-width="10" stroke-dasharray="339.29 339.29" stroke-dashoffset="339" transform="rotate(-90)" />
		</g>
		<g class="pencil__eraser" transform="rotate(-90) translate(49,0)">
			<g class="pencil__eraser-skew">
				<rect fill="hsl(223,90%,70%)" rx="5" ry="5" width="30" height="30" />
				<rect fill="hsl(223,90%,60%)" width="5" height="30" clip-path="url(#pencil-eraser)" />
				<rect fill="hsl(223,10%,90%)" width="30" height="20" />
				<rect fill="hsl(223,10%,70%)" width="15" height="20" />
				<rect fill="hsl(223,10%,80%)" width="5" height="20" />
				<rect fill="hsla(223,10%,10%,0.2)" y="6" width="30" height="2" />
				<rect fill="hsla(223,10%,10%,0.2)" y="13" width="30" height="2" />
			</g>
		</g>
		<g class="pencil__point" transform="rotate(-90) translate(49,-30)">
			<polygon fill="hsl(33,90%,70%)" points="15 0,30 30,0 30" />
			<polygon fill="hsl(33,90%,50%)" points="15 0,6 30,0 30" />
			<polygon fill="hsl(223,10%,10%)" points="15 0,20 10,10 10" />
		</g>
	</g>
</svg>
</div>