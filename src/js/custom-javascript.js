
// Handle All Animations
var revealElements = document.getElementsByClassName("thanx-fade-in");
for (var i=0; i<revealElements.length; i++) { // create a scene for each element
		new ScrollMagic.Scene({
			triggerElement: revealElements[i], // y value not modified, so we can use element as trigger as well
			offset: 100,												 // start a little later
			triggerHook: 0.6,
		})
		.setClassToggle(revealElements[i], "thanx-fade-in-complete") // add class toggle
		// .addIndicators({name: "digit " + (i+1) }) // add indicators (requires plugin)
		.addTo(controller);
}

// Handle All Animations
var revealElements = document.getElementsByClassName("scroller-fade-in");
for (var i=0; i<revealElements.length; i++) { // create a scene for each element
		new ScrollMagic.Scene({
			triggerElement: revealElements[i], // y value not modified, so we can use element as trigger as well
			offset: 0,												 // start a little later
			triggerHook: 0.8,
			duration: '60%'
		})
		.setClassToggle(revealElements[i], "scroller-fade-in-complete") // add class toggle
		// .addIndicators({name: "digit " + (i+1) }) // add indicators (requires plugin)
		.addTo(controller);
}

var revealElements = document.getElementsByClassName("thanx-fade-out");
for (var i=0; i<revealElements.length; i++) { // create a scene for each element
		new ScrollMagic.Scene({
			triggerElement: revealElements[i], // y value not modified, so we can use element as trigger as well
			offset: 100,												 // start a little later
			triggerHook: 0.5,
		})
		.setClassToggle(revealElements[i], "thanx-fade-out-complete") // add class toggle
		// .addIndicators({name: "digit " + (i+1) }) // add indicators (requires plugin)
		.addTo(controller);
}


var revealElements = document.getElementsByClassName("thanx-bg-fade-dark");
for (var i=0; i<revealElements.length; i++) { // create a scene for each element
		new ScrollMagic.Scene({
			triggerElement: revealElements[i], // y value not modified, so we can use element as trigger as well
			offset: 100,												 // start a little later
			triggerHook: 0.9,
			duration: '200%'
		})
		.setClassToggle('.site', "thanx-bg-fade-site-dark" ) // add class toggle
		// .addIndicators({name: "digit " + (i+1) }) // add indicators (requires plugin)
		.addTo(controller);
}

var revealElements = document.getElementsByClassName("thanx-bg-fade-purple");
for (var i=0; i<revealElements.length; i++) { // create a scene for each element
		new ScrollMagic.Scene({
			triggerElement: revealElements[i], // y value not modified, so we can use element as trigger as well
			offset: 100,												 // start a little later
			triggerHook: 0.9,
			duration: '150%'
		})
		.setClassToggle('.site', "thanx-bg-fade-site-purple" ) // add class toggle
		// .addIndicators({name: "digit " + (i+1) }) // add indicators (requires plugin)
		.addTo(controller);
}

var revealElements = document.getElementsByClassName("thanx-bg-fade-cayenne");
for (var i=0; i<revealElements.length; i++) { // create a scene for each element
		new ScrollMagic.Scene({
			triggerElement: revealElements[i], // y value not modified, so we can use element as trigger as well
			offset: 100,												 // start a little later
			triggerHook: 0.9,
			duration: '150%'
		})
		.setClassToggle('.site', "thanx-bg-fade-site-cayenne" ) // add class toggle
		// .addIndicators({name: "digit " + (i+1) }) // add indicators (requires plugin)
		.addTo(controller);
}

var revealElements = document.getElementsByClassName("thanx-bg-fade-blue");
for (var i=0; i<revealElements.length; i++) { // create a scene for each element
		new ScrollMagic.Scene({
			triggerElement: revealElements[i], // y value not modified, so we can use element as trigger as well
			offset: 100,												 // start a little later
			triggerHook: 0.9,
			duration: '150%'
		})
		.setClassToggle('.site', "thanx-bg-fade-site-blue" ) // add class toggle
		// .addIndicators({name: "digit " + (i+1) }) // add indicators (requires plugin)
		.addTo(controller);
}

var revealElements = document.getElementsByClassName("thanx-bg-fade-yellow");
for (var i=0; i<revealElements.length; i++) { // create a scene for each element
		new ScrollMagic.Scene({
			triggerElement: revealElements[i], // y value not modified, so we can use element as trigger as well
			offset: 100,												 // start a little later
			triggerHook: 0.9,
			duration: '150%'
		})
		.setClassToggle('.site', "thanx-bg-fade-site-yellow" ) // add class toggle
		// .addIndicators({name: "digit " + (i+1) }) // add indicators (requires plugin)
		.addTo(controller);
}

var revealElements = document.getElementsByClassName("thanx-bg-fade-orange");
for (var i=0; i<revealElements.length; i++) { // create a scene for each element
		new ScrollMagic.Scene({
			triggerElement: revealElements[i], // y value not modified, so we can use element as trigger as well
			offset: 100,												 // start a little later
			triggerHook: 0.9,
			duration: '150%'
		})
		.setClassToggle('.site', "thanx-bg-fade-site-orange" ) // add class toggle
		// .addIndicators({name: "digit " + (i+1) }) // add indicators (requires plugin)
		.addTo(controller);
}


// Highlighter Text Animations
var revealElements = document.getElementsByTagName("mark");
for (var i=0; i<revealElements.length; i++) { // create a scene for each element
		new ScrollMagic.Scene({
			triggerElement: revealElements[i], // y value not modified, so we can use element as trigger as well
			offset: 100,												 // start a little later
			triggerHook: 0.9,
			duration: '90%',
			// reverse: false,
		})
		.setClassToggle(revealElements[i], 'mark-active' ) // add class toggle
		// .addIndicators({name: "digit " + (i+1) }) // add indicators (requires plugin)
		.addTo(controller);
	
}

// Hero BG Animations
var revealElements = document.getElementsByClassName("hero");
for (var i=0; i<revealElements.length; i++) { // create a scene for each element
		new ScrollMagic.Scene({
			triggerElement: revealElements[i], // y value not modified, so we can use element as trigger as well
			offset: 100,												 // start a little later
			triggerHook: 0.9,
			duration: '90%',
			// reverse: false,
		})
		.setClassToggle(revealElements[i], 'hero-active' ) // add class toggle
		// .addIndicators({name: "digit " + (i+1) }) // add indicators (requires plugin)
		.addTo(controller);
	
}
// Hero BG Animations
// var revealElements = document.getElementsByClassName("start-bucks");
// for (var i=0; i<revealElements.length; i++) { // create a scene for each element
// 		new ScrollMagic.Scene({
// 			triggerElement: revealElements[i], // y value not modified, so we can use element as trigger as well
// 			offset: 100,												 // start a little later
// 			triggerHook: 0.9,
// 			duration: '90%',
// 			// reverse: false,
// 		})
// 		.setClassToggle(revealElements[i], 'start-bucks-active' ) // add class toggle
// 		// .addIndicators({name: "digit " + (i+1) }) // add indicators (requires plugin)
// 		.addTo(controller);
	
// }

// Why thanx custom Animation
var revealElements = document.getElementsByClassName("why-thanx-anim-1");
for (var i=0; i<revealElements.length; i++) { // create a scene for each element
		new ScrollMagic.Scene({
			triggerElement: revealElements[i], // y value not modified, so we can use element as trigger as well
			offset: 100,												 // start a little later
			triggerHook: 0.9,
			duration: '90%',
			// reverse: false,
		})
		.setClassToggle(revealElements[i], 'active' ) // add class toggle
		// .addIndicators({name: "digit " + (i+1) }) // add indicators (requires plugin)
		.addTo(controller);
	
}

// Sticky tabs
// var revealElements = document.getElementById()   ClassName("#freeze-tabs");
// for (var i=0; i<revealElements.length; i++) { // create a scene for each element
	var scene = new ScrollMagic.Scene({triggerElement: "#freeze-tabs", triggerHook: 0,})
		.setPin("#freeze-tabs")
		// .addIndicators({name: "2 (duration: 0)"}) // add indicators (requires plugin)
		.addTo(controller);
	
// }

